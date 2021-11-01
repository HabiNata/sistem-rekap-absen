<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        $data = ['title' => 'List Data User', 'user_active' => 'active'];
        return view('user/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Create User', 'user_active' => 'active'];
        return view('user/create', $data);
    }

    public function edit()
    {
        $data = ['title' => 'Edit User', 'user_active' => 'active'];
        return view('user/edit', $data);
    }
}
