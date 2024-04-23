<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorModel extends Model
{
    protected $table = 'Vendor';
    protected $primaryKey = 'VendorID';
    protected $allowedFields = ['VendorName', 'TotalTable', 'Email', 'Phone', 'Address'];
    protected $returnType = 'array';
}