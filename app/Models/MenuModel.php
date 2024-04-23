<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'Menu';
    protected $primaryKey = 'MenuID';
    protected $allowedFields = ['MenuID','VendorID', 'Category', 'ItemName', 'Price'];
    protected $returnType = 'array';
}