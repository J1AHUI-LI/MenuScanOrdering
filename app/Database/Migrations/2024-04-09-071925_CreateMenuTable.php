<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMenuTable extends Migration
{
    public function up()
    {
        // Define the Menu table
        $this->forge->addField([
            'MenuID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'VendorID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'Category' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'ItemName' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'Price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
        ]);

        $this->forge->addKey('MenuID', TRUE); // Set MenuID as primary key
        $this->forge->addForeignKey('VendorID', 'Vendor', 'VendorID', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Menu'); // Create the Menu table
    }

    public function down()
    {
        // Drop the Menu table if needed
        $this->forge->dropTable('Menu');
    }
}


