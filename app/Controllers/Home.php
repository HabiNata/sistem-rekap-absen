<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function index()
    {
        $data = ['title' => 'Dashboard', 'dash_active' => 'active'];
        return view('home', $data);
    }
}
