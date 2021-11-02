<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\type;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'null' => false,
            ],
            'foto' => [
                'type' => 'text',
                'null' => false,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'tanggal_lahir' => [
                'type' => 'date',
                'null' => false,
            ],
            'nip' => [
                'type' => 'INT',
                'constraint' => '15',
                'null' => false,
            ],
            'jabatan' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
            ],
            'unit' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
            ],
            'role' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'datetime',
                'null' => true
            ],
        ]);


        $this->forge->addKey('id', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
