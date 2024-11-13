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
            return redirect()->route('home'); 
        } else {
            dd('eerror');
            return redirect()->back()->withErrors(['Invalid email or password']);
        }
    }

    public function logout()
    {
        // Cierra la sesión del usuario
        Auth::logout();

        // Elimina la sesión del usuario para asegurarse de que se haya cerrado correctamente
        session()->flush();

        // Redirige al usuario a la página de inicio o donde desees
        return redirect()->route('home');
    }
}
