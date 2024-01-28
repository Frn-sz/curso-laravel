<?php

namespace App\Http\Controllers;

use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController
{

    public function index(): View
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->all())) {
            redirect()->back('403')->withErrors(['Usuário ou senha inválidos']);
        }
    }
}
