<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;


class VendorSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'VendorName' => 'Vendor 1',
                'TotalTable' => 10,
                'Email' => 'vendor1@example.com',
                'Phone' => '111111111',
                'Address' => '789 Elm St',
            ],
            [
                'VendorName' => 'Vendor 2',
                'TotalTable' => 5,
                'Email' => 'vendor2@example.com',
                'Phone' => '222222222',
                'Address' => '456 Oak St',
            ],
            // Add more vendors as needed
        ];

        $this->db->table('Vendor')->insertBatch($data);
    }
}