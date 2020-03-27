<?php

namespace App\Http\Middleware;

use Closure;

class CidadeMiddleware
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
        if(!$request->session()->has('cidade')) {
            $request->session(['cidade' => 'Garanhuns']);
        }

        return $next($request);
    }
}
