<?php

namespace App;

use Illuminate\Support\Facades\Auth;

/**
 * Oauth password grant verifier
 */
class PasswordGrantVerifier
{
    /**
     * This is used in Authentication Server, no need to implement here in store app.
     *
     * @param  string $username
     * @param  string $password
     *
     * @return boolean|user
     */
    /*public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }*/
}
