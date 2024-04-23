<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablesTable extends Migration
{
    public function up()
    {
        // Define the Tables table
        $this->forge->addField([
            'TableID' => [
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
            'Seats' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'Status' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);

        $this->forge->addKey('TableID', TRUE); // Set TableID as primary key
        $this->forge->addForeignKey('VendorID', 'Vendor', 'VendorID', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Tables'); // Create the Tables table
    }

    public function down()
    {
        // Drop the Tables table if needed
        $this->forge->dropTable('Tables');
    }
}

