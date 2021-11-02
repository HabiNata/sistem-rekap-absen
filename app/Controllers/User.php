<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    // protected $user;
    // public function __contruct()
    // {
    //     $this->user = new UserModel();
    // }
    public function index()
    {
        $data = ['title' => 'List Data User', 'user_active' => 'active'];
        return view('user/index', $data);
    }

    public function create()
    {
        session();
        $data = [
            'title' => 'Create User',
            'user_active' => 'active',
            'validation' => \Config\Services::validation(),
        ];
        return view('user/create', $data);
    }

    public function store()
    {
        $user = new UserModel();
        $validation = $this->validate([
            'foto' => ['uploaded[foto]', 'max_size[foto,5024]', 'is_image[foto]'],
            'nama' => ['required', 'alpha_numeric_space'],
            'tanggal_lahir' => ['required', 'valid_date'],
            'nip' => ['required', 'numeric', 'is_unique[user.nip]'],
            'jabatan' => ['required', 'alpha_numeric_space'],
            'unit' => ['required', 'alpha_numeric_space'],
            'password' => ['required'],
            'role' => ['required', 'in_list[admin,asn,honorer]'],
        ]);

        if (!$validation) {
            return redirect()->to(route_to('create_user'))->withInput();
        }
        $file = $this->request->getFile('foto');
        if ($file->getError()) {
            session()->setFlasdata('failed', 'Terjadi Kesalahan Upload Foto');
            return redirect()->to(route_to('create_user'));
        }
        $fileName = time() . '~' . $file->getName('foto');
        if ($file->isValid() && !$file->hasMoved()) {
            $file->move('image', $fileName);
        }

        $data = [
            'foto' => $fileName,
            'nama' => $this->request->getVar('nama'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'nip' => $this->request->getVar('nip'),
            'jabatan' => $this->request->getVar('jabatan'),
            'unit' => $this->request->getVar('unit'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getVar('role'),
        ];

        $insert = $user->save($data);
        if ($insert) {
            echo "Data Berhasil diinsert";
        } else {
            echo "<pre>";
            echo print_r($this->user->errors());
            echo "</pre>";
        }
    }

    public function edit()
    {
        $data = ['title' => 'Edit User', 'user_active' => 'active'];
        return view('user/edit', $data);
    }
}
