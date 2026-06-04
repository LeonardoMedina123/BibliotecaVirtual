<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario está autenticado y tiene rol de admin
        if (auth()->check() && auth()->user()->rol === 'admin') {
            return $next($request);
        }

        // Si no es admin, redirigir al dashboard
        return redirect()->route('dashboard')->with('error', 'No tienes permisos para acceder a esta sección.');
    }
}
