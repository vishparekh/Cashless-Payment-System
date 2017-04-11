<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        echo $role;
        if(!Auth::check())
        {
            //Redirect to Login
            return redirect()->route('login');
        }
        if(Auth::user()->role_id!=$role)
        {
            //Not authorized to use the page
            abort(403);
        }
        return $next($request);
    }
}
