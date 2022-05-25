<?php

namespace App\Controllers;

class Home extends BaseController {

    public function index() {
        $products = $this->productModel->findAll();
        $this->render('Home', 'home/index', ['products' => $products]);
    }

}
