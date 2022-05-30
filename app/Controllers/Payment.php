<?php

namespace App\Controllers;

class Payment extends BaseController {

    public function options() {
        if (
            ($this->member->default_shipping_address_type == NULL) ||
            ($this->member->default_shipping_address_id == NULL)
        ) {
            die('Incorrect shipping address');
        }

        $creditCards = $this->creditCardModel->where('member', $this->member->id)->findAll();

        $this->render('Choose Payment Option', 'payment/options', [
            'member' => $this->member,
            'creditCards' => $creditCards,
            'subtotal' => $this->memberModel->getCartSubtotal($this->member->id),
            'shippingFee' => $this->session->get('shipping_fee')
        ]);
    }

    public function choose($id) {
        $this->memberModel->update($this->member->id, ['default_credit_card' => $id]);
        return redirect()->to('payment/options');
    }

    public function successful($id) {
        $order = $this->orderModel->find($id);

        $this->render('Payment Successful', 'payment/successful', [
            'member' => $this->member,
            'order' => $order
        ]);
    }

    public function addCard() {
        $card = new \stdClass();
        $card->member = $this->member->id;
        $card->name_on_card = set_value('name_on_card', '', FALSE);
        $card->card_number = set_value('card_number', '', FALSE);
        $card->expire_date = set_value('expire_date', '', FALSE);
        $card->cvv = set_value('cvv', '', FALSE);

        if (!empty($this->request->getPost('submit'))) {
            $this->creditCardModel->insert((array)$card);
            return redirect()->to('payment/options');
        }

        $this->render('Add New Card', 'payment/cardForm', ['action' => 'add', 'card' => $card]);
    }

    public function editCard($id) {
        $card = $this->creditCardModel->find($id);
        $card->name_on_card = set_value('name_on_card', $card->name_on_card, FALSE);
        $card->card_number = set_value('card_number', $card->card_number, FALSE);
        $card->expire_date = set_value('expire_date', $card->expire_date, FALSE);
        $card->cvv = set_value('cvv', $card->cvv, FALSE);

        if (!empty($this->request->getPost('submit'))) {
            $this->creditCardModel->update($id, (array)$card);
            return redirect()->to('payment/options');
        }

        $this->render('Edit Card Details', 'payment/cardForm', ['action' => 'edit', 'card' => $card]);
    }

    public function deleteCard($id) {
        $this->creditCardModel->delete($id);
        return redirect()->to('payment/options');
    }

}
