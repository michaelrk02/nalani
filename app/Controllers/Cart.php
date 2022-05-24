<?php

namespace App\Controllers;

class Cart extends BaseController {

    public function index() {
        $items = $this->memberModel->viewCart($this->member->id);
        $this->render('Your Cart', 'cart/index', [
            'items' => $items,
            'subtotal' => $this->memberModel->getCartSubtotal($this->member->id),
            'shippingFee' => 4000
        ]);
    }

    public function add($product) {
        if (!empty($this->request->getPost('submit'))) {
            $data = [];
            $data['finish'] = $this->request->getPost('finish');
            $data['property'] = $this->request->getPost('property');
            $data['size'] = $this->request->getPost('size');
            $data['quantity'] = 1;
            $data['uses_painter_service'] = FALSE;
            $this->memberModel->insertCart($this->member->id, $product, $data);
        }
        return redirect()->to('cart');
    }

    public function change($product) {
        $amount = $this->request->getGet('amount') ?? 0;
        $usePainterService = $this->request->getGet('painter_service');
        $usePainterService = isset($usePainterService) ? !empty($usePainterService) : NULL;

        $item = $this->memberModel->viewCart($this->member->id, $product);

        $data = [];
        $data['quantity'] = $item->quantity + $amount;
        $data['uses_painter_service'] = $usePainterService ?? ($item->painter_service_fee > 0);

        if ($data['quantity'] > 0) {
            $this->memberModel->updateCart($this->member->id, $product, $data);
        } else {
            $this->memberModel->deleteCart($this->member->id, $product);
        }

        return redirect()->to('cart');
    }

    public function checkout() {
        return redirect()->to('shipping/options');
    }

}
