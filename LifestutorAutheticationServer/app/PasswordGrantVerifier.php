<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use EntityManager;

class PasswordGrantVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        // $user = EntityManager::getRepository('Services\User\Data\Entities\User\User')->find($username);

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}
