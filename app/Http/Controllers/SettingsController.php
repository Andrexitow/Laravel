<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return view('userMenu.settings', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile;

        if ($request->hasFile('foto_perfil') && $request->file('foto_perfil')->isValid()) {
            if ($profile->foto_perfil && file_exists(public_path($profile->foto_perfil))) {
                unlink(public_path($profile->foto_perfil));
            }

            $fileName = time() . '_' . $request->file('foto_perfil')->getClientOriginalName();
            $request->file('foto_perfil')->move(public_path('user_img'), $fileName);

            $profile->foto_perfil = 'user_img/' . $fileName;
        }
        $profile->nombre = $request->nombre;
        $profile->apellido = $request->apellido;
        $profile->telefono = $request->telefono;
        $profile->direccion = $request->direccion;
        $profile->fecha_nacimiento = $request->fecha_nacimiento;
        $profile->bio = $request->bio;
        $profile->save();

        return redirect()->route('home')->with('success', 'Perfil actualizado correctamente.');
    }
}
