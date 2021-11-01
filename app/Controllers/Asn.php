<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Asn extends BaseController
{
    public function index()
    {
        $data = ['title' => 'List Absen ASN', 'asn_active' => 'active'];
        return view('asn/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Create Absen ASN', 'asn_active' => 'active'];
        return view('asn/create', $data);
    }

    public function edit()
    {
        $data = ['title' => 'Edit Absen ASN', 'asn_active' => 'active'];
        return view('asn/create', $data);
    }
}
