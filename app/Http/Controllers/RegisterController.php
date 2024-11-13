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
        dd('El método singup_validate se está ejecutando');

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        // Redirigir al usuario a la página de inicio de sesión con un mensaje de éxito
        return redirect()->route('login');
    }
}
