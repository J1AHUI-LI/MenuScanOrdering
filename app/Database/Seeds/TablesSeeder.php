<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TablesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'VendorID' => 1,
                'Seats' => 4,
                'Status' => 'Available',
            ],
            [
                'VendorID' => 1,
                'Seats' => 6,
                'Status' => 'Available',
            ],
            [
                'VendorID' => 2,
                'Seats' => 2,
                'Status' => 'Occupied',
            ],
            // Add more tables as needed
        ];

        $this->db->table('Tables')->insertBatch($data);
    }
}