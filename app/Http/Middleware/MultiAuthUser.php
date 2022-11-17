<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MultiAuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userType)
    
    {
        if (Auth::user()->type == $userType) {
            return $next($request);
        } 
        //tidak trotorisasi 
        abort(401);
       
    }
}
