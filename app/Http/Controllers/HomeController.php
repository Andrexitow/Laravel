<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke() {
        // Verifica si el usuario está autenticado
        if (Auth::check()) {
            // Si está autenticado, redirige a la vista 'log.log_home'
            return view('log.log_home');
        } else {
            // Si no está autenticado, redirige a la vista de bienvenida
            return view('welcome');
        }
    } 
    
}
