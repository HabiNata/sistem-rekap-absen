<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAsnTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'auto_increment' => true,
                'null' => false,
            ],
            'user_id' => [
                'type' => 'int',
                'null' => false,
            ],
            'absen' => [
                'type' => 'date',
                'null' => false,
            ],
            'jumlah' => [
                'type' => 'int',
                'null' => false,
            ],
            'keterangan' => [
                'type' => 'text',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'datetime',
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('asn');
    }

    public function down()
    {
        $this->forge->dropTable('asn');
    }
}
