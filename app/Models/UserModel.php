<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'User';
    protected $primaryKey = 'UserID';
    protected $allowedFields = ['UserID','FirstName', 'LastName', 'Role', 'Phone', 'Address'];
    protected $returnType = 'array';
}