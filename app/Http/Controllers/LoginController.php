<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_validate(Request $request)
    {
        return redirect()->route('home');
        // return view('log.log_home');
        // return $request->all();
    }
}
