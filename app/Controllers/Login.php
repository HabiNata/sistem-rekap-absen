<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        session();

        $data = [
            'validation' => \Config\Services::validation(),
        ];

        return view('login', $data);
    }

    public function auth()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->route('home');
        }
        $user = new UserModel();

        $validation = $this->validate([
            'username' => ['required', 'valid_email'],
            'password' => ['required'],
        ]);

        if (!$validation) {
            return redirect()->to(route_to('login'))->withInput();
        }
        $userData = $user->where('email', $this->request->getVar('username'))->first();

        if ($userData && password_verify($this->request->getVar('password'), $userData['password'])) {
            $data = [
                'id' => $userData['id'],
                'nama' => $userData['nama'],
                'nip' => $userData['nip'],
                'email' => $userData['email'],
                'foto' => $userData['foto'],
                'role' => $userData['role'],
                'isLoggedIn' => true,
            ];
            session()->set($data);
            return redirect()->to(route_to('home'));
        } else {
            session()->setFlashdata('failed', 'Wrong Username & Password');
            return redirect()->back();
        }
    }

    function logout()
    {
        // dd();
        session()->destroy();
        return redirect()->route('login');
    }
}
