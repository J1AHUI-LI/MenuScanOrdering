<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderItemTable extends Migration
{
    public function up()
    {
        // Define the OrderItem table
        $this->forge->addField([
            'OrderItemID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'MenuID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'OrderID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'Quantity' => [
                'type' => 'INT',
                'constraint' => 11,
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

        $this->forge->addKey('OrderItemID', TRUE); // Set OrderItemID as primary key
        $this->forge->addForeignKey('MenuID', 'Menu', 'MenuID', 'CASCADE', 'CASCADE'); // Add foreign key to MenuID referencing Menu table
        $this->forge->addForeignKey('OrderID', 'Order', 'OrderID', 'CASCADE', 'CASCADE'); // Add foreign key to OrderID referencing Order table
        $this->forge->createTable('OrderItem'); // Create the OrderItem table
    }

    public function down()
    {
        // Drop the OrderItem table if needed
        $this->forge->dropTable('OrderItem');
    }
}

