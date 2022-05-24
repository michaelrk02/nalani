<?php

namespace App\Models;

use CodeIgniter\Model;

class ShippingAddressModel extends Model {

    protected $table = 'shipping_address';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = FALSE;
    protected $returnType = 'object';
    protected $allowedFields = [
        'member',
        'place_name',
        'first_name',
        'last_name',
        'address',
        'city',
        'province',
        'postal_code',
        'country',
        'phone_number',
        'email'
    ];

    protected $beforeInsert = ['generateID'];

    protected function generateID($data) {
        $data['data']['id'] = $this->db->query('SELECT UUID() value')->getRow()->value;
        return $data;
    }

}
