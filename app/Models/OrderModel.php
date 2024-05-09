<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'Order';
    protected $primaryKey = 'OrderID';
    protected $allowedFields = ['UserID', 'TableID', 'Status', 'OrderTime','MenuIDs'];
    protected $returnType = 'array';
}