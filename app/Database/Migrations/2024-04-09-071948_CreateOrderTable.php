<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderTable extends Migration
{
    public function up()
    {
        // Define the Order table
        $this->forge->addField([
            'OrderID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'UserID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'TableID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'Status' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'OrderTime' => [
                'type' => 'TIMESTAMP',
                'null' => TRUE,
            ],            
        ]);

        $this->forge->addKey('OrderID', TRUE); // Set OrderID as primary key
        $this->forge->addForeignKey('UserID', 'User', 'UserID', 'CASCADE', 'CASCADE'); // Add foreign key to UserID referencing User table
        $this->forge->addForeignKey('TableID', 'Tables', 'TableID', 'CASCADE', 'CASCADE'); // Add foreign key to TableID referencing Tables table
        $this->forge->createTable('Order'); // Create the Order table
    }

    public function down()
    {
        // Drop the Order table if needed
        $this->forge->dropTable('Order');
    }
}

