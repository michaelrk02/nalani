<?php

namespace App\Controllers;

class Order extends BaseController {

    public function place() {
        if (($this->member->default_shipping_address == NULL) || ($this->member->default_credit_card == NULL)) {
            die('Incorrect shipping address or credit card');
        }

        $order = [];
        $order['member'] = $this->member->id;
        $order['subtotal'] = $this->memberModel->getCartSubtotal($this->member->id);
        $this->orderModel->insert($order);
        $orderID = $this->orderModel->getInsertID();
        $this->orderModel->insertCart($orderID, $this->memberModel->viewCart($this->member->id));
        $this->orderModel->insertShippingAddress($orderID, $this->shippingAddressModel->find($this->member->default_shipping_address));
        $this->orderModel->insertCreditCard($orderID, $this->creditCardModel->find($this->member->default_credit_card));

        return redirect()->to(site_url('payment/successful/'.$orderID));
    }

    public function viewAll() {
        $orders = $this->orderModel->where('member', $this->member->id)->findAll();
        foreach ($orders as &$order) {
            $order->cart = $this->orderModel->viewCart($order->id);
            $order->estimate_delivery = date_format(date_create($order->estimate_delivery), 'j M Y');
        }

        $this->render('My Orders', 'order/viewAll', ['orders' => $orders]);
    }

    public function view($id) {
        $order = $this->orderModel->find($id);
        $order->cart = $this->orderModel->viewCart($order->id);
        $order->estimate_delivery = date_format(date_create($order->estimate_delivery), 'j M Y');

        $this->render('Order Details', 'order/view', [
            'order' => $order,
            'address' => $this->orderModel->findShippingAddress($id),
            'card' => $this->orderModel->findCreditCard($id)
        ]);
    }

}
