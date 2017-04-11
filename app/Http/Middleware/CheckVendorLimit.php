<?php

namespace App\Http\Middleware;

use Closure;

class CheckVendorLimit
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
        $org=Org::find(\Auth::user()->id);
        if(!$org->checklimit_vendor())
            return new Response(view('errors.maxlimit'));
        return $next($request);
    }
}
