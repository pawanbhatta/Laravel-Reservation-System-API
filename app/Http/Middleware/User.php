<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class User
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
        if(!Auth::check()){
            return redirect()->route('login');
        }

        // is_admin = 0 => user
        if(Auth::user()->is_admin == 0){
            return $next($request);
        }
        // is_admin = 1 => admin
        if(Auth::user()->is_admin == 1){
            return redirect()->route('admin.dashboard');
        }
    }
}