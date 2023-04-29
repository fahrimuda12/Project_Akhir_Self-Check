<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {

        if (!$request->expectsJson()) {
            // dd($request);
            return route('auth.login');
        }
        // dd($request);

        // if (Auth::user()) {
        //     return $next($request);
        // }
    }

    // public function handle($request, Closure $next, ...$guards)
    // {
    //     if (!Auth::guard('pakar')->check()) {
    //         return route('auth.login');
    //     }
    //     dd($next($request));
    //     return $next($request);
    // }
}
