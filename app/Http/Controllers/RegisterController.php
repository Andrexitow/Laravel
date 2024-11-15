<?php

namespace App\Http\Controllers;

use App\Http\Requests\SingUpRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.singup');
    }

    public function signup_validate(SingUpRequest $request)
{
    // Crear el usuario
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);

    $user->save();

    // Asignar el rol de 'student'
    $studentRole = Role::where('name', 'student')->first();

    if ($studentRole) {
        $user->roles()->attach($studentRole->id);
    } else {
        // Si no existe el rol 'student', puedes manejar el error
        session()->flash('error', 'El rol de estudiante no está configurado en el sistema.');
        return redirect()->back();
    }

    // Mensaje de éxito
    session()->flash('success', '¡Registro exitoso! Por favor inicia sesión.');

    return redirect()->route('login');
}

}
