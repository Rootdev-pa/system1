<?php

namespace App\Http\Middleware;

use Closure;

class RolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */ 
    public function handle($request, Closure $next, $rol, $permiso = null)
    {
        if(!$request->user()->hasRol($rol)) {

             abort(404);

        }

        if($permiso !== null && !$request->user()->can($permiso)) {

              abort(404);
        }

        return $next($request);

    }
}
