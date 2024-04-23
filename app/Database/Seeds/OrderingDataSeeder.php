<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrderingDataSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('VendorSeeder');
        $this->call('MenuSeeder');
        $this->call('TablesSeeder');
        $this->call('OrderSeeder');
        $this->call('OrderItemSeeder');
    }
}


