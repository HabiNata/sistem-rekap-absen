<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profile extends BaseController
{
    public function index($nip)
    {
        session();

        $user = new UserModel();
        $userData = $user->where('nip', $nip)->first();

        $data = [
            'title' => 'Profile',
            'validation' => \Config\Services::validation(),
            'userData' => $userData,
        ];
        return view('profile/profile', $data);
    }

    public function update_profile($id)
    {
        $user = new UserModel();

        $userData = $user->find($id);

        $validation = $this->validate([
            'nama' => ['required', 'alpha_numeric_space'],
            'tanggal_lahir' => ['required', 'valid_date'],
        ]);

        if (!$validation) {
            return redirect()->to(route_to('profile', $userData['nip']))->withInput();
        }

        $data = [
            'nama' => $this->request->getVar('nama'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
        ];
        // dd($data);

        $update = $user->update($id, $data);

        if ($update) {
            session()->setFlashdata('success', 'Profile Update');
            return redirect()->to(route_to('profile', $userData['nip']));
        } else {
            session()->setFlashdata('failed', 'Failed Profile Update');
            return redirect()->to(route_to('profile', $userData['nip']));
        }
    }

    public function update_password($id)
    {
        $user = new UserModel();

        $userData = $user->find($id);
        // dd($id);
        $validation = $this->validate([
            'old_password' => ['required', 'old_password[' . $id . ',' . $this->request->getvar('password') . ']'],
            'new_password' => ['required'],
            'confirm_password' => ['required', 'matches[new_password]'],
        ], [
            'old_password' => [
                'old_password' => 'Password wrong, please input valid password',
            ]
        ]);

        if (!$validation) {
            return redirect()->to(route_to('profile', $userData['nip']))->withInput();
        }

        $data = ['password' => password_hash($this->request->getVar('new_password'), PASSWORD_DEFAULT)];
        // dd($data);
        $update = $user->update($id, $data);

        if ($update) {
            session()->setFlashdata('success', 'Password Update');
            return redirect()->to(route_to('profile', $userData['nip']));
        } else {
            session()->setFlashdata('failed', 'Failed Password Update');
            return redirect()->to(route_to('profile', $userData['nip']));
        }
    }
}
