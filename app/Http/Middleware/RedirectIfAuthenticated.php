<?php

namespace App\Http\Middleware;

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
                if (Auth::user()->admin) {
                    return redirect('/admin');
                } elseif (Auth::user()->student) {
                    return redirect('/student');
                } elseif (Auth::user()->pracovnik) {
                    return redirect('/pracovnik');
                } else {
                    return '/sk';
                }
        }

        return $next($request);
    }
}
