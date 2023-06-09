<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // dd(Auth::guard($guard)->check());
            if ($guard == "web" && Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }

            if ($guard == "admin" && Auth::guard($guard)->check()) {
                return redirect('/admin/dashboard');
            }

            if ($guard == "pakar" && Auth::guard($guard)->check()) {
                return redirect('/pakar/dashboard');
            }
        }

        return $next($request);
    }

    // public function handle(Request $request, Closure $next, ...$guard)
    // {
    //     // dd($guard);
    //     if ($guard == "admin" && Auth::guard($guard)->check()) {
    //         return redirect('/admin/dashboard');
    //     }
    //     if (Auth::guard($guard)->check()) {
    //         return redirect(RouteServiceProvider::HOME);
    //     }

    //     return $next($request);
    // }
}
