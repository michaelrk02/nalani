<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model {

    protected $table = 'member';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = FALSE;
    protected $returnType = 'object';
    protected $allowedFields = ['default_shipping_address', 'default_credit_card'];

    public function insertCart($id, $product, $data) {
        $data['member'] = $id;
        $data['product'] = $product;
        $sql = $this->builder('member_cart');
        return $sql->insert($data);
    }

    public function getCartSubtotal($id) {
        $data = $this->builder('member_cart_subtotal')->where('id', $id)->get()->getRow();
        return isset($data) ? $data->subtotal : 0;
    }

    public function viewCart($id, $product = NULL) {
        $sql = $this->builder('member_cart');
        $sql->select('
            member_cart.product,
            product.name product_name,
            member_cart.finish,
            member_cart.property,
            member_cart.size,
            member_cart.quantity,
            (product.price + member_cart_additive.additive) unit_price,
            (CASE WHEN member_cart.uses_painter_service THEN 20000 ELSE 0 END) painter_service_fee,
            (member_cart.quantity * (product.price + member_cart_additive.additive) + (CASE WHEN member_cart.uses_painter_service THEN 20000 ELSE 0 END)) subtotal
        ', FALSE);
        $sql->join('member_cart_additive', '(member_cart_additive.member = member_cart.member) AND (member_cart_additive.product = member_cart.product)');
        $sql->join('product', 'product.id = member_cart.product');
        $sql->where('member_cart.member', $id);
        if (isset($product)) {
            $sql->where('member_cart.product', $product);
            return $sql->get()->getRow();
        }
        return $sql->get()->getResult();
    }

    public function updateCart($id, $product, $data) {
        $sql = $this->builder('member_cart');
        $sql->where([
            'member' => $id,
            'product' => $product
        ]);
        return $sql->update($data);
    }

    public function deleteCart($id, $product = NULL) {
        $sql = $this->builder('member_cart');
        $sql->where('member', $id);
        if (isset($product)) {
            $sql->where('product', $product);
        }
        return $sql->delete();
    }

}
