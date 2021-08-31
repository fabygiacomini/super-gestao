<?php

namespace App\Http\Middleware;

use Closure;
use http\Env\Response;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $metodoAutenticacao)
    {
        session_start();
        if (isset($_SESSION['email']) && !empty($_SESSION)) {
            return $next($request);
        } else {
            // não estando autenticado no sistema, volta à tela de login e mostra mensagem para realizar login
            return redirect()->route('site.login', ['erro' => 2]);
        }
    }
}
