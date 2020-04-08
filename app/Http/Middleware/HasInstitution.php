<?php

namespace App\Http\Middleware;

use Closure;

class HasInstitution
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
        if (!$request->has('institution')) {
            return redirect('/api');
        }

        return $next($request);
    }
}
