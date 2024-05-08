<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'UserID' => 8,
                'TableID' => 1,
                'Status' => 'Pending',
                'OrderTime' => '',
            ],
            [
                'UserID' => 9,
                'TableID' => 32,
                'Status' => 'Completed',
                'OrderTime' => '',
            ],
            // Add more orders as needed
        ];

        $this->db->table('Order')->insertBatch($data);
    }
}
