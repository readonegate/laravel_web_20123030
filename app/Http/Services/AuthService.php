<?php


namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthService
{
    public function authenticate($req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $req['email'])->first();

        if ($user) {
            $res = $this->doLogin($req, $user);
        } else {
            $res['status'] = false;
            $res['message'] = 'Mohon maaf, email tidak ditemukan !';
        }

        $result = (object) [
            'status' => $res['status'],
            'message' => $res['message'],
        ];

        return $result;
    }



    public function doLogin($req, $admin)
    {
        if (Hash::check($req['password'], $admin->password)) {
            $res['status'] = true;
            $res['message'] = 'Selamat, login berhasil';
            Session::put('name', $admin->name);
            Session::put('email', $admin->email);
        } else {
            $res['status'] = false;
            $res['message'] = 'Mohon maaf, password salah !';
        }
        return $res;
    }
}
