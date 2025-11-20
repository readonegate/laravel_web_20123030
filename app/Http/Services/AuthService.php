<?php


namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function authenticate($credentials)
    {
        if (Auth::attempt($credentials)) {
            return true;
        }

        return false;
    }
}
