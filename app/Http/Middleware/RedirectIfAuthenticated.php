<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            switch (Auth::user()->is_admin) {
                case 1:
                    if(Auth::check())
                    {
                        return redirect()->route('admin.dashboard');
                    }
                    break;
                
                default:
                    if (Auth::check()) 
                    {
                        return redirect(RouteServiceProvider::HOME);
                    }
                    break;
            }
        }

        // switch ($guard) {
        //     case 'admin':
        //         if(Auth::guard($guard)->check())
        //         {
        //             return redirect()->route('admin.dashboard');
        //         }
        //         break;
            
        //     default:
        //         if (Auth::guard($guard)->check()) {
        //             return redirect(RouteServiceProvider::HOME);
        //         }
        //         break;
        // }
        
        return $next($request);
    }
}