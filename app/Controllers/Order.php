<?php

namespace App\Controllers;

class Order extends BaseController {

    public function place() {
        if (
            ($this->member->default_shipping_address_type == NULL) ||
            ($this->member->default_shipping_address_id == NULL) ||
            ($this->member->default_credit_card == NULL)
        ) {
            die('Incorrect shipping address or credit card');
        }

        $cart = $this->memberModel->viewCart($this->member->id);
        if (count($cart) == 0) {
            die('Cart is empty');
        }

        $order = [];
        $order['member'] = $this->member->id;
        $order['subtotal'] = $this->memberModel->getCartSubtotal($this->member->id);
        $this->orderModel->insert($order);
        $orderID = $this->orderModel->getInsertID();
        $this->orderModel->insertCart($orderID, $cart);

        $address = NULL;
        switch ($this->member->default_shipping_address_type) {
        case 'home':
            $address = $this->shippingAddressHomeModel->find($this->member->default_shipping_address_id);
            break;
        case 'point':
            $address = $this->shippingAddressPointModel->find($this->member->default_shipping_address_id);
            break;
        }
        $this->orderModel->insertShippingAddress($this->member->default_shipping_address_type, $orderID, $address);
        $this->orderModel->insertCreditCard($orderID, $this->creditCardModel->find($this->member->default_credit_card));
        $this->clearCart();

        return redirect()->to(site_url('payment/successful/'.$orderID));
    }

    public function viewAll() {
        $orders = $this->orderModel->where('member', $this->member->id)->orderBy('placed_at', 'DESC')->findAll();
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
