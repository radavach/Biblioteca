<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class InicioSessionMiddleware
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
        if(Auth::user() !== null and Auth::user()->esAdmin !== 1){
            return redirect()
            ->back()
            ->with(
                ['mensaje' => 'No tienes la autiridad para entrar en la ruta']);
        }
        return $next($request);
    }
}
