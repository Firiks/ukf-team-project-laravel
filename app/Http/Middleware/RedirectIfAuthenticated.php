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
                if (Auth::user()->admin == 1) {
                    return redirect('/admin');
                } elseif (Auth::user()->student == 1) {
                    return redirect(route('web.student', 'sk'));
                } elseif (Auth::user()->pracovnik == 1) {
                    return redirect(route('web.pracovnik', 'sk'));
                } else {
                    return '/sk';
                }
        }

        return $next($request);
    }
}
