<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'MenuID' => 1,
                'OrderID' => 1,
                'Quantity' => 2,
                'ItemName' => 'Spaghetti Carbonara',
                'Price' => 12.99,
            ],
            [
                'MenuID' => 2,
                'OrderID' => 2,
                'Quantity' => 1,
                'ItemName' => 'Chicken Parmesan',
                'Price' => 14.99,
            ],
            // Add more order items as needed
        ];

        $this->db->table('OrderItem')->insertBatch($data);
    }
}
