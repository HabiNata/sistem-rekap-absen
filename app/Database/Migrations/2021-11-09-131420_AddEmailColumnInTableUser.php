<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEmailColumnInTableUser extends Migration
{
    public function up()
    {
        $this->forge->addColumn('user', [
            'email' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
                'after' => 'nip',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('user', 'email');
    }
}
