<?php

namespace App\Http\Controllers;

use App\Http\Requests\SingUpRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function login()
    {
        return view('register.login');
    }

    public function singup()
    {
        return view('register.singup');
    }

    public function login_validate(Request $request)
    {

        return redirect()->route('home');
        // return view('log.log_home');
        // return $request->all();
    }

    public function singup_validate(SingUpRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        // Redirigir al usuario a la página de inicio de sesión con un mensaje de éxito
        return redirect()->route('login')->with('success', 'Cuenta creada exitosamente. Inicia sesión con tus credenciales.');
    }
}
