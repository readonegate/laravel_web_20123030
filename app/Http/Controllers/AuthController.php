<?php

namespace App\Http\Controllers;

use App\Http\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        return view('pages.login');
    }

    public function authenticate(Request $req)
    {
        $result = $this->authService->authenticate($req);
        if ($result->status == false) {
            return redirect()->route('auth.login')->with('error', $result->message);
        } else {
            return redirect()->route('welcome');
        }
    }
}
