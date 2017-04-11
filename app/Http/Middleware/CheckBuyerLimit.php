<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Org;
use Illuminate\Http\Response;

class CheckBuyerLimit
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
        if(!$org->checklimit_buyer())
            return new Response(view('errors.maxlimit'));
        return $next($request);
    }
}
