<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVendorTable extends Migration
{
    public function up()
    {
        // Define the Vendor table
        $this->forge->addField([
            'VendorID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'VendorName' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'TotalTable' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'Email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'Phone' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'Address' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);

        $this->forge->addKey('VendorID', TRUE); // Set VendorID as primary key
        $this->forge->createTable('Vendor'); // Create the Vendor table
    }

    public function down()
    {
        // Drop the Vendor table if needed
        $this->forge->dropTable('Vendor');
    }
}


