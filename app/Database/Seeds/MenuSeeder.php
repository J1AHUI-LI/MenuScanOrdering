<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'VendorID' => 1,
                'Category' => 'Main Course',
                'ItemName' => 'Spaghetti Carbonara',
                'Price' => 12.99,
            ],
            [
                'VendorID' => 1,
                'Category' => 'Main Course',
                'ItemName' => 'Chicken Parmesan',
                'Price' => 14.99,
            ],
            [
                'VendorID' => 2,
                'Category' => 'Main Course',
                'ItemName' => 'Grilled Salmon',
                'Price' => 16.99,
            ],
            // Add more menu items as needed
        ];

        $this->db->table('Menu')->insertBatch($data);
    }
}