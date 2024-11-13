<?php

namespace App\Http\Controllers;

use App\Http\Requests\SingUpRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.singup');
    }

    public function singup_validate(SingUpRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        session()->flash('success', '¡Registro exitoso! Por favor inicia sesión.');

        return redirect()->route('login');  
    }
}
