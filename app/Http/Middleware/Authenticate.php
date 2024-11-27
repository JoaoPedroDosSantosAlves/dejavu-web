<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
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
        // Se o usuário não estiver autenticado, redireciona para a página de login
        if (!Auth::check()) {
            return redirect()->route('login'); // Rota de login
        }

        return $next($request);
    }
}
