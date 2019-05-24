<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EsAdministradorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user() === null || Auth::user()->esAdmin !== 1){
            return redirect()
            ->route('inicio')
            ->with(
                ['mensaje' => 'No tienes la autoridad para entrar en la ruta']);
        }
        return $next($request);
    }
}
