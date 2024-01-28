<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        if (!Auth::attempt($request->only('email','password'))) {
            redirect()->back()->withErrors('Usuário ou senha inválidos');
        }

        return to_route('series.index');
    }

    public function destroy(){
        Auth::logout();

        return to_route('login');
    }
}
