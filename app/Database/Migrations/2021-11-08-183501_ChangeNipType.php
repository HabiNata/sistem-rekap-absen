<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeNipType extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('user', [
            'nip' => [
                'name' => 'nip',
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('user', [
            'nip' => [
                'name' => 'nip',
                'type' => 'INT',
                'null' => false,
            ],
        ]);
    }
}
