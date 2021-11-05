<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HonorerModel;
use App\Models\UserModel;

class Honorer extends BaseController
{
    public function __construct()
    {
        helper('text');
    }

    public function index()
    {
        $honorer = new HonorerModel();

        if (session()->get('role') == 'admin') {
            $honorerDatas = $honorer->select('honorer.*, user.nama, user.jabatan, user.nip')->join('user', 'user.id=honorer.user_id')->findAll();
        }
        if (session()->get('role') == 'honorer') {
            $honorerDatas = $honorer->select('honorer.*, user.nama, user.jabatan, user.nip')->join('user', 'user.id=honorer.user_id')->where('user.nip', session()->get('nip'))->findAll();
        }

        $data = [
            'title' => 'List Absen Honorer',
            'hr_active' => 'active',
            'honorerDatas' => $honorerDatas,
        ];

        return view('honorer/index', $data);
    }

    public function create()
    {
        session();

        $user = new UserModel();

        $userDatas = $user->select('id, nama')->where('role', 'honorer')->findAll();

        $data = [
            'title' => 'Create Absen Honorer',
            'hr_active' => 'active',
            'validation' => \Config\Services::validation(),
            'userDatas' => $userDatas,
        ];

        return view('honorer/create', $data);
    }

    public function store()
    {
        $honorer = new HonorerModel();

        $validation = $this->validate([
            'nama' => ['required', 'numeric'],
            'absen' => ['required', 'valid_date'],
            'jumlah' => ['required', 'numeric'],
            'keterangan' => ['required'],
        ]);

        if (!$validation) {
            return redirect()->to(route_to('create_honorer'))->withInput();
        }

        $data = [
            'user_id' => $this->request->getVar('nama'),
            'absen' => $this->request->getVar('absen'),
            'jumlah' => $this->request->getVar('jumlah'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        // dd($data);
        $insert = $honorer->save($data);

        if ($insert) {
            session()->setFlashdata('success', 'Berhasil Input Data');
            return redirect()->to(route_to('list_honorer'));
        } else {
            session()->setFalshdata('failed', 'Gagal Input Data');
            return redirect()->to(route_to('create_honorer'));
        }
    }

    public function edit($id)
    {
        session();

        $user = new UserModel();
        $honorer = new HonorerModel();

        $userDatas = $user->select('id, nama')->where('role', 'honorer')->findAll();
        $honorerData = $honorer->select('honorer.*, user.jabatan')->join('user', 'user.id=honorer.user_id')->find($id);

        $data = [
            'title' => 'Edit Absen Honorer',
            'hr_active' => 'active',
            'validation' => \Config\Services::validation(),
            'userDatas' => $userDatas,
            'honorerData' => $honorerData,
        ];

        return view('honorer/edit', $data);
    }

    public function update($id)
    {
        $honorer = new HonorerModel();

        $validation = $this->validate([
            'nama' => ['required', 'numeric'],
            'absen' => ['required', 'valid_date'],
            'jumlah' => ['required', 'numeric'],
            'keterangan' => ['required'],
        ]);

        if (!$validation) {
            return redirect()->to(route_to('create_honorer'))->withInput();
        }

        $data = [
            'user_id' => $this->request->getVar('nama'),
            'absen' => $this->request->getVar('absen'),
            'jumlah' => $this->request->getVar('jumlah'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        // dd($data);

        $insert = $honorer->update($id, $data);

        if ($insert) {
            session()->setFlashdata('success', 'Berhasil Input Data');
            return redirect()->to(route_to('list_honorer'));
        } else {
            session()->setFalshdata('failed', 'Gagal Input Data');
            return redirect()->to(route_to('create_honorer'));
        }
    }

    public function delete($id)
    {
        $honorer = new HonorerModel();

        $honorerData = $honorer->select('user_id')->find($id);

        $delete = $honorer->delete($id);

        if ($delete) {
            return $this->response->setJSON(['data' => $honorerData['user_id'], 'status' => 200]);
        } else {
            return $this->response->setJSON(['data' => $honorerData['user_id'], 'status' => 500]);
        }
    }

    public function show($id)
    {
        $honorer = new HonorerModel();

        $honorerData = $honorer->select('honorer.*, user.jabatan, user.nama')->join('user', 'user.id=honorer.user_id')->find($id);

        $data = [
            'title' => 'Show Detail  Honorer',
            'hr_active' => 'active',
            'honorerData' => $honorerData,
        ];

        return view('honorer/show', $data);
    }

    public function data($id)
    {
        $user = new UserModel();
        $userDatas = $user->find($id);
        return json_encode($userDatas);
    }
}
