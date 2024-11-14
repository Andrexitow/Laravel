<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\User;

class HomeController extends Controller
{
    public function __invoke() {

        if (Auth::check()) {
            $users = Auth::user();

            return view('welcome-user', compact('users'));
        } else {
            return view('welcome-app');
        }
    } 
    
}
