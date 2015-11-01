<?php

namespace App;

use Illuminate\Support\Facades\Auth;

/**
 * Oauth password grant verifier
 */
class PasswordGrantVerifier
{
    /**
     * [verify description]
     *
     * @param  string $username
     * @param  string $password
     *
     * @return boolean|user
     */
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}
