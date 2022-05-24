<?php

namespace App\Controllers;

class Product extends BaseController {

    public function view($id) {
        $product = $this->productModel->find($id);

        $this->render('Product Details', 'product/view', ['product' => $product]);
    }

}
