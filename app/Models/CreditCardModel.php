<?php

namespace App\Models;

use CodeIgniter\Model;

class CreditCardModel extends Model {

    protected $table = 'credit_card';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = FALSE;
    protected $returnType = 'object';
    protected $allowedFields = [
        'member',
        'name_on_card',
        'card_number',
        'expire_date',
        'cvv'
    ];

    protected $beforeInsert = ['generateID'];

    protected function generateID($data) {
        $data['data']['id'] = $this->db->query('SELECT UUID() value')->getRow()->value;
        return $data;
    }

}
