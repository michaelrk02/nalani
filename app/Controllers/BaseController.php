<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class BaseController extends Controller {

    protected $member;
    protected $session;

    protected $productModel;
    protected $memberModel;
    protected $shippingAddressModel;
    protected $creditCardModel;
    protected $orderModel;

    public function initController($request, $response, $logger) {
        parent::initController($request, $response, $logger);

        helper(['form', 'util']);

        $this->productModel = model('App\Models\ProductModel');
        $this->memberModel = model('App\Models\MemberModel');
        $this->shippingAddressHomeModel = model('App\Models\ShippingAddressHomeModel');
        $this->shippingAddressPointModel = model('App\Models\ShippingAddressPointModel');
        $this->creditCardModel = model('App\Models\CreditCardModel');
        $this->orderModel = model('App\Models\OrderModel');

        $this->member = $this->memberModel->find($_ENV['nalani.memberID']);

        $this->session = \Config\Services::session();

        if ($this->session->get('shipping_address_id') === NULL) {
            $address = $this->shippingAddressHomeModel->where('member', $this->member->id)->first();
            $this->setShippingAddress('home', isset($address) ? $address->id : NULL);
        }

        $this->member->default_shipping_address_type = $this->session->get('shipping_address_type');
        $this->member->default_shipping_address_id = $this->session->get('shipping_address_id');
    }

    protected function render($title, $page, $data = []) {
        echo view('main', ['title' => $title, 'page' => $page, 'data' => $data]);
    }

    protected function setShippingAddress($type, $id) {
        $this->session->set('shipping_address_type', $type);
        $this->session->set('shipping_address_id', $id);
        $this->session->set('shipping_fee', isset($id) && ($type == 'home') ? 20000 : 0);
    }

    protected function clearCart() {
        $this->memberModel->deleteCart($this->member->id);
    }

}
