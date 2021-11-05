<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        session();

        // if (session()->get('isLoggedIn')) {
        //     return redirect()->route('home');
        // }

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
            'username' => ['required', 'alpha_numeric_punct'],
            'password' => ['required'],
        ]);

        if (!$validation) {
            return redirect()->to(route_to('login'))->withInput();
        }
        $userData = $user->where('nip', $this->request->getVar('username'))->first();
        // dd($userData);
        if ($userData && password_verify($this->request->getVar('password'), $userData['password'])) {
            $data = [
                'nama' => $userData['nama'],
                'nip' => $userData['nip'],
                'foto' => $userData['foto'],
                'role' => $userData['role'],
                'jabatan' => $userData['jabatan'],
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
        session()->destroy();
        return redirect()->route('login');
    }
}
