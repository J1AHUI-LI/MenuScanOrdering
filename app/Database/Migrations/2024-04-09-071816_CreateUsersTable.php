<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        // Define the User table
        $this->forge->addField([
            'UserID' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],

            'Username' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
                'default' => 'default_username', // Set a default value
            ],
            'FirstName' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'LastName' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'Role' => [
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

        $this->forge->addKey('UserID', TRUE); // Set UserID as primary key
        $this->forge->createTable('User'); // Create the User table
    }

    public function down()
    {
        // Drop the User table if needed
        $this->forge->dropTable('User');
    }
}

