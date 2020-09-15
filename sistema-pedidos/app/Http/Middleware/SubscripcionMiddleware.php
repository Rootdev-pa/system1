<?php

namespace App\Http\Middleware;

use Closure;

class SubscripcionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $plan = null)
    {   
        $user = $request->user();

        if($user && $user->subscribedToPlan($plan)) {
           return $next($request);
        }

        return redirect('/');
       
    }
}
