<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke() {

        if (Auth::check()) {
            $users = Auth::user();
            // $profile = $users->profile;

            return view('welcome-user', compact('users'));
        } else {
            return view('welcome-app');
        }
    } 
    
}
