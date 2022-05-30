<?php

namespace App\Models;

use CodeIgniter\Model;

class ShippingAddressPointModel extends Model {

    protected $table = 'shipping_address_point';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = FALSE;
    protected $returnType = 'object';

}
