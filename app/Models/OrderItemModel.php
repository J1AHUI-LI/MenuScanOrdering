<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderItemModel extends Model
{
    protected $table = 'OrderItem';
    protected $primaryKey = 'OrderItemID';
    protected $allowedFields = ['MenuID', 'OrderID', 'Quantity', 'ItemName', 'Price'];
    protected $returnType = 'array';
}