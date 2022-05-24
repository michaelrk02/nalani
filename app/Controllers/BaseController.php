<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class BaseController extends Controller {

    protected $member;

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
        $this->shippingAddressModel = model('App\Models\ShippingAddressModel');
        $this->creditCardModel = model('App\Models\CreditCardModel');
        $this->orderModel = model('App\Models\OrderModel');

        $this->member = $this->memberModel->find($_ENV['nalani.memberID']);
    }

    protected function render($title, $page, $data = []) {
        echo view('main', ['title' => $title, 'page' => $page, 'data' => $data]);
    }

}
