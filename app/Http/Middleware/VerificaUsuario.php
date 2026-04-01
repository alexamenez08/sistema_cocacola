<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class VerificaUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //? verificar si la sesión es activa
        if(!Auth::check()){
            //* Enviar al usuario a que se registre
            return redirect() -> route('registro')->with('error', 'Se debe registrar e iniciar sesión');
        }

        return $next($request);
    }
}
