<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model {

    protected $table = 'order';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = FALSE;
    protected $returnType = 'object';
    protected $allowedFields = [
        'member',
        'subtotal'
    ];

    protected $beforeInsert = ['generateID', 'generateTimestamp', 'initData'];

    protected function initialize() {
        helper(['text']);
    }

    public function insertCart($id, $data) {
        foreach ($data as &$row) {
            $row = (array)$row;
            $row['order'] = $id;
            unset($row['product_name']);
        }
        return $this->builder('order_cart')->insertBatch($data);
    }

    public function insertShippingAddress($id, $data) {
        $data = (array)$data;
        $data['order'] = $id;
        unset($data['id']);
        unset($data['member']);
        return $this->builder('order_shipping_address')->insert($data);
    }

    public function findShippingAddress($id) {
        return $this->builder('order_shipping_address')->where('order', $id)->get()->getRow();
    }

    public function insertCreditCard($id, $data) {
        $data = (array)$data;
        $data['order'] = $id;
        unset($data['id']);
        unset($data['member']);
        return $this->builder('order_credit_card')->insert($data);
    }

    public function findCreditCard($id) {
        return $this->builder('order_credit_card')->where('order', $id)->get()->getRow();
    }

    public function viewCart($id) {
        $sql = $this->builder('order_cart');
        $sql->select('order_cart.product, product.name product_name, order_cart.finish, order_cart.property, order_cart.size, order_cart.quantity, order_cart.unit_price, order_cart.painter_service_fee, order_cart.subtotal');
        $sql->join('product', 'product.id = order_cart.product');
        $sql->where('order', $id);
        return $sql->get()->getResult();
    }

    protected function generateID($data) {
        $data['data']['id'] = $this->db->query('SELECT UUID() value')->getRow()->value;
        $data['data']['code'] = '#MO'.random_string('numeric', 4);
        return $data;
    }

    protected function generateTimestamp($data) {
        $data['data']['placed_at'] = $this->db->query('SELECT NOW() value')->getRow()->value;
        return $data;
    }

    protected function initData($data) {
        $data['data']['shipping_fee'] = 4000;
        $data['data']['total'] = $data['data']['subtotal'] + $data['data']['shipping_fee'];
        $data['data']['tracking_status'] = 'mixing';
        $data['data']['estimate_delivery'] = $this->db->query('SELECT DATE_ADD(NOW(), INTERVAL 14 DAY) value')->getRow()->value;
        return $data;
    }

}
