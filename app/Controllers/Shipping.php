<?php

namespace App\Controllers;

class Shipping extends BaseController {

    public function options() {
        $shippingAddresses = $this->shippingAddressModel->where('member', $this->member->id)->findAll();

        $this->render('Choose Shipping Address', 'shipping/options', [
            'member' => $this->member,
            'shippingAddresses' => $shippingAddresses,
            'subtotal' => $this->memberModel->getCartSubtotal($this->member->id),
            'shippingFee' => 4000
        ]);
    }

    public function choose($id) {
        $this->memberModel->update($this->member->id, ['default_shipping_address' => $id]);
        return redirect()->to('shipping/options');
    }

    public function addAddress() {
        $address = new \stdClass();
        $address->member = $this->member->id;
        $address->place_name = set_value('place_name', '', FALSE);
        $address->first_name = set_value('first_name', '', FALSE);
        $address->last_name = set_value('last_name', '', FALSE);
        $address->address = set_value('address', '', FALSE);
        $address->city = set_value('city', '', FALSE);
        $address->province = set_value('province', '', FALSE);
        $address->postal_code = set_value('postal_code', '', FALSE);
        $address->country = set_value('country', '', FALSE);
        $address->phone_number = set_value('phone_number', '', FALSE);
        $address->email = set_value('email', '', FALSE);

        if (!empty($this->request->getPost('submit'))) {
            $this->shippingAddressModel->insert((array)$address);
            return redirect()->to('shipping/options');
        }

        $this->render('Add Shipping Address', 'shipping/addressForm', [
            'action' => 'add',
            'address' => $address
        ]);
    }

    public function editAddress($id) {
        $address = $this->shippingAddressModel->find($id);
        $address->place_name = set_value('place_name', $address->place_name, FALSE);
        $address->first_name = set_value('first_name', $address->first_name, FALSE);
        $address->last_name = set_value('last_name', $address->last_name, FALSE);
        $address->address = set_value('address', $address->address, FALSE);
        $address->city = set_value('city', $address->city, FALSE);
        $address->province = set_value('province', $address->province, FALSE);
        $address->postal_code = set_value('postal_code', $address->postal_code, FALSE);
        $address->country = set_value('country', $address->country, FALSE);
        $address->phone_number = set_value('phone_number', $address->phone_number, FALSE);
        $address->email = set_value('email', $address->email, FALSE);

        if (!empty($this->request->getPost('submit'))) {
            $this->shippingAddressModel->update($id, (array)$address);
            return redirect()->to('shipping/options');
        }

        $this->render('Edit Shipping Address', 'shipping/addressForm', [
            'action' => 'edit',
            'address' => $address
        ]);
    }

    public function deleteAddress($id) {
        $this->shippingAddressModel->delete($id);
        return redirect()->to('shipping/options');
    }

}
