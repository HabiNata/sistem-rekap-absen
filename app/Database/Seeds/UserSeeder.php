<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new UserModel();

        $user->insertBatch(
            [
                [
                    'foto' => '1635925649~1.jpeg',
                    'nama' => 'admin',
                    'tanggal_lahir' => '1999-01-10',
                    'nip' => 'admin020',
                    'email'=>'admin@gmail.com',
                    'jabatan' => 'admin',
                    'unit' => 'admin',
                    'password' => password_hash('admin', PASSWORD_DEFAULT),
                    'role' => 'admin',
                ],
                [
                    'foto' => '1635925649~1.jpeg',
                    'nama' => 'asn',
                    'tanggal_lahir' => '1999-01-10',
                    'nip' => 13131313,
                    'email'=>'asn@gmail.com',
                    'jabatan' => 'asn',
                    'unit' => 'asn',
                    'password' => password_hash('asn', PASSWORD_DEFAULT),
                    'role' => 'asn',
                ],
                [
                    'foto' => '1635925649~1.jpeg',
                    'nama' => 'honorer',
                    'tanggal_lahir' => '1999-01-10',
                    'nip' => 'honorer921',
                    'email'=>'honorer@gmail.com',
                    'jabatan' => 'honorer',
                    'unit' => 'honorer',
                    'password' => password_hash('honorer', PASSWORD_DEFAULT),
                    'role' => 'honorer',
                ],
            ]
        );
    }
}
