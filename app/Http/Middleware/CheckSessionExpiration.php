<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckSessionExpiration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // Verifica si la sesión ha expirado
            if (session('expires_at') && now()->greaterThanOrEqualTo(session('expires_at'))) {
                Auth::logout();
                session()->flush();

                // Pasar un mensaje de expiración de sesión a la vista
                return redirect()->route('login')->with('session_expired', 'Tu sesión ha expirado, por favor inicia sesión nuevamente');
            }
            // session(['expires_at' => now()->addSeconds(5)]);
            session(['expires_at' => now()->addMinutes(15)]);
        }

        return $next($request);
    }
}
