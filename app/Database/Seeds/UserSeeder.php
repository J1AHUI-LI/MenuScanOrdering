<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'FirstName' => 'John',
                'LastName' => 'Doe',
                'Role' => 'Admin',
                'Phone' => '123456789',
                'Address' => '123 Main St',
            ],
            [
                'FirstName' => 'Jane',
                'LastName' => 'Smith',
                'Role' => 'User',
                'Phone' => '987654321',
                'Address' => '456 Oak St',
            ],
            // Add more users as needed
        ];

        $this->db->table('User')->insertBatch($data);
    }
}