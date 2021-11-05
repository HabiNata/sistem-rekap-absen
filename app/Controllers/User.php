<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        $userDatas = $user->findAll();
        $data = [
            'title' => 'List Data User',
            'user_active' => 'active',
            'userDatas' =>  $userDatas,
        ];
        // dd($userDatas);
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
        // if ($this->request->getVar('role') == 'honorer') {
        //     $nipRule = ['numeric', 'is_unique[user.nip]', 'permit_empty'];
        // } else {
        //     $nipRule = ['required', 'numeric', 'is_unique[user.nip]'];
        // }

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

        if ($file->getError() == 4) {
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
            session()->setFlashdata('success', 'Berhasil Input Data');
            return redirect()->to(route_to('list_user'));
        } else {
            session()->setFlasdata('failed', 'Gagal Input Data');
            return redirect()->to(route_to('create_user'));
        }
    }

    public function edit($id)
    {
        $user = new UserModel();
        $userData = $user->find($id);
        $data = [
            'title' => 'Edit User',
            'user_active' => 'active',
            'userData' => $userData,
            'validation' => \Config\Services::validation(),
        ];
        return view('user/edit', $data);
    }

    public function update($id)
    {
        $user = new UserModel();

        $userData = $user->find($id);

        // if ($this->request->getVar('role') == 'honorer') {
        //     $nipRule = ['numeric', 'is_unique[user.nip,nip,' . $userData["nip"] . ']', 'permit_empty'];
        // } else {
        //     $nipRule = ['required', 'numeric', 'is_unique[user.nip,nip,' . $userData["nip"] . ']'];
        // }

        $validation = $this->validate([
            'foto' => ['max_size[foto,5024]', 'is_image[foto]'],
            'nama' => ['required', 'alpha_numeric_space'],
            'tanggal_lahir' => ['required', 'valid_date'],
            'nip' => ['required', 'numeric', 'is_unique[user.nip,nip,' . $userData["nip"] . ']'],
            'jabatan' => ['required', 'alpha_numeric_space'],
            'unit' => ['required', 'alpha_numeric_space'],
            'password' => ['required'],
            'role' => ['required', 'in_list[admin,asn,honorer]'],
        ]);

        if (!$validation) {
            return redirect()->to(route_to('edit_user', $id))->withInput();
        }

        $file = $this->request->getFile('foto');

        if ($file->getError() == 4) {
            $fileName = $userData['foto'];
        } else {
            $fileName = time() . '~' . $file->getName('foto');

            if ($file->isValid() && !$file->hasMoved()) {
                $file->move('image', $fileName);
                unlink('image/' . $userData['foto']);
            }
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

        $update = $user->update($id, $data);

        if ($update) {
            session()->setFlashdata('success', 'Berhasil Update Data');
            return redirect()->to(route_to('list_user'));
        } else {
            session()->setFlasdata('failed', 'Gagal Update Data');
            return redirect()->to(route_to('create_user'));
        }
    }

    public function delete($id)
    {
        $user = new UserModel();

        $userData = $user->find($id);
        // unlink('image/' . $userData['foto']);
        $delete = $user->delete($id);

        if ($delete) {
            return $this->response->setJSON(['data' => $userData['nama'], 'status' => 200]);
        } else {
            return $this->response->setJSON(['data' => $userData['nama'], 'status' => 500]);
        }
    }
}
