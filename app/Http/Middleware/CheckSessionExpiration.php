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
    public function handle(Request $request, Closure $next): Response
    {
        // if (session()->has('expires_at') && now()->greaterThan(session('expires_at'))) {
        //     Auth::logout(); 
        //     session()->flush(); 
        //     return redirect()->route('login');
        // }

        // return $next($request);
        return $next($request);
    }
}
