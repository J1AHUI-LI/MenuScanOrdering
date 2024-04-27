<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsernameToUserTable extends Migration
{
    public function up()
    {
        $fields = [
            'Username' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
                'default' => 'default_username', // Set a default value
            ]
        ];
        $this->forge->addColumn('User', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('User', 'Username');
    }
}