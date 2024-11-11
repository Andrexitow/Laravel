<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function login(){
        return view('register.login');
    }

    public function singup(){
        return view('register.singup');
    }

    public function login_validate(Request $request){
        return $request->all();
    }

    public function singup_validate(Request $request){

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $confirm_password = $request->confirm_password;

        if(true){

            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            $user->save();

             return redirect()->route('home_log');
        }

    }
}
