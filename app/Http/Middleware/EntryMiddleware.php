<?php

namespace App\Http\Middleware;

use Closure;

class EntryMiddleware
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
        if(!\Auth::check())
            return redirect()->route('login');
        return $next($request);
    }
}
