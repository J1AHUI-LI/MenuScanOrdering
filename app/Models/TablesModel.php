<?php

namespace App\Models;

use CodeIgniter\Model;

class TablesModel extends Model
{
    protected $table = 'Tables';
    protected $primaryKey = 'TableID';
    protected $allowedFields = ['TableID', 'VendorID', 'Seats', 'Status'];
    protected $returnType = 'array';
}