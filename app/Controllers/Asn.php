<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AsnModel;
use App\Models\UserModel;

class Asn extends BaseController
{
    public function __construct()
    {
        helper('text');
    }

    public function index()
    {
        $asn = new AsnModel();

        if (session()->get('role') == 'admin') {
            $asnDatas = $asn->select('asn.*, asn.user_id, user.nama, user.jabatan, user.nip')->join('user', 'asn.user_id=user.id')->findAll();
        }
        if (session()->get('role') == 'asn') {
            $asnDatas = $asn->select('asn.*, asn.user_id, user.nama, user.jabatan, user.nip')->join('user', 'asn.user_id=user.id')->where('user.nip', session()->get('nip'))->findAll();
        }
        // dd($asnDatas);

        $data = [
            'title' => 'List Absen ASN',
            'asn_active' => 'active',
            'asnDatas' => $asnDatas,
        ];

        return view('asn/index', $data);
    }

    public function create()
    {
        session();

        $user = new UserModel();

        $userDatas = $user->where('role', 'asn')->findAll();

        $data = [
            'title' => 'Create Absen ASN',
            'asn_active' => 'active',
            'userDatas' => $userDatas,
            'validation' => \Config\Services::validation(),
        ];

        return view('asn/create', $data);
    }

    public function store()
    {
        $asn = new AsnModel();

        $validation = $this->validate([
            'nama' => ['required', 'numeric'],
            'absen' => ['required', 'valid_date'],
            'jumlah' => ['required', 'numeric'],
            'keterangan' => [],
        ]);

        if (!$validation) {
            return redirect()->to(route_to('create_asn'))->withInput();
        }

        $data = [
            'user_id' => $this->request->getVar('nama'),
            'absen' => $this->request->getVar('absen'),
            'jumlah' => $this->request->getVar('jumlah'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        // dd($data);
        $insert = $asn->save($data);

        if ($insert) {
            session()->setFlashdata('success', 'Berhasil Input Data');
            return redirect()->to(route_to('list_asn'));
        } else {
            session()->setFalshdata('failed', 'Gagal Input Data');
            return redirect()->to(route_to('create_asn'));
        }
    }

    public function edit($id)
    {
        $user = new UserModel();
        $asn = new AsnModel();

        $userDatas = $user->select('id, nama')->where('role', 'asn')->findAll();
        $asnData = $asn->select('asn.*, user.nama, user.nip, user.jabatan')->join('user', 'asn.user_id=user.id')->find($id);

        $data = [
            'title' => 'Edit Absen ASN',
            'asn_active' => 'active',
            'validation' => \Config\Services::validation(),
            'userDatas' => $userDatas,
            'asnData' => $asnData,
        ];

        return view('asn/edit', $data);
    }

    public function update($id)
    {
        $asn = new AsnModel();
        $asnData = $asn->find($id);
        // dd($asnData);
        $validation = $this->validate([
            'nama' => ['required', 'numeric'],
            'absen' => ['required', 'valid_date'],
            'jumlah' => ['required', 'numeric'],
            'keterangan' => [],
        ]);

        if (!$validation) {
            return redirect()->to(route_to('create_asn'))->withInput();
        }

        $data = [
            'user_id' => $this->request->getVar('nama'),
            'absen' => $this->request->getVar('absen'),
            'jumlah' => $this->request->getVar('jumlah'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];

        $insert = $asn->update($id, $data);

        if ($insert) {
            session()->setFlashdata('success', 'Berhasil Input Data');
            return redirect()->to(route_to('list_asn'));
        } else {
            session()->setFalshdata('failed', 'Gagal Input Data');
            return redirect()->to(route_to('create_asn'));
        }
    }

    public function delete($id)
    {
        $asn = new AsnModel();

        $asnData = $asn->select('user_id')->find($id);

        $delete = $asn->delete($id);

        if ($delete) {
            return $this->response->setJSON(['data' => $asnData['user_id'], 'status' => 200]);
        } else {
            return $this->response->setJSON(['data' => $asnData['user_id'], 'status' => 500]);
        }
    }

    public function show($id)
    {
        $asn = new AsnModel();

        $asnData = $asn->select('asn.*, user.nama, user.nip, user.jabatan')->join('user', 'asn.user_id=user.id')->find($id);

        $data = [
            'title' => 'Show Detail ASN',
            'asn_active' => 'active',
            'asnData' => $asnData,
        ];

        return view('asn/show', $data);
    }

    public function data($id)
    {
        $user = new UserModel();
        $userDatas = $user->find($id);
        return json_encode($userDatas);
    }
}
