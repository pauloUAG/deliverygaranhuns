<?php

namespace App\Http\Middleware;

use Closure;

class ListasMiddleware
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
        $modalidades = \App\Modalidade::where('nome', '<>', 'null')->orderByRaw('unaccent(nome) asc')->get();
        $cidades = \App\Cidade::all();
        \View::share('modalidades', $modalidades);
        \View::share('cidades', $cidades);
        return $next($request);
    }
}
