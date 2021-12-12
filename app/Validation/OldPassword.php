<?php

namespace App\Validation;

use App\Models\UserModel;

class OldPassword
{
    public function old_password(string $password = null, string $id = null): bool
    {
        // dd($id, $password);
        $user = new UserModel();

        $userData = $user->find($id);

        if (password_verify($password, $userData['password'])) {
            return true;
        }
        return false;
    }
}
