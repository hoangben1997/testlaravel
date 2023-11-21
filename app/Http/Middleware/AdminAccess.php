<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;


class AdminAccess
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
        if( Auth::check() ){
            if ( Auth::user()->level == 0 ){
                dd('đây ko phải là tài khoản admin');
                return route('login');
            }
        }
        return $next($request);
        
        
         
        
        
    }
}
