<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_validate(Request $request)
    {
        $credential = $request->only('email', 'password');
        $user = User::where('email', $credential['email'])->first();
        if ($user && Hash::check($credential['password'], $user->password)) {
            Auth::login($user);
            session(['expires_at' => now()->addMinutes(15)]);
            return redirect()->route('home')->with('message', 'Sesion iniciada');
        } else {
            return redirect()->back()->withErrors(['Invalid email or password']);
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('home');
    }
}
