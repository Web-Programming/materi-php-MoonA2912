<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        //cek apakah user sudah login
        if(Auth::check()){
            //cek apakah level admin atau uses (sesuai dengan roles yang di passing)
            if(Auth::user()->level === $roles){
                return $next($request);
            }
        }

        return redirect('login')->withErrors(['failed' => 'Anda tidak memiliki akses!']);
    }
}