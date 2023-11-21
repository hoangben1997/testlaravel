<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;


class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->level == 0 ){
            return $next($request);
        }
        if(!Auth::check()){
            return $next($request);
            return redirect('homeindex');
        }
        return redirect('logoutmember');
        
        
         
        
        
    }
}
