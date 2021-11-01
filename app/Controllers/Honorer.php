<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Honorer extends BaseController
{
    public function index()
    {
        $data = ['title' => 'List Absen Honorer', 'hr_active' => 'active'];
        return view('honorer/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Create Absen Honorer', 'hr_active' => 'active'];
        return view('honorer/create', $data);
    }

    public function edit()
    {
        $data = ['title' => 'Edit Absen Honorer', 'hr_active' => 'active'];
        return view('honorer/edit', $data);
    }
}
