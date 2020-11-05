<?php

namespace App\Http\Middleware;

use Closure;

class CheckUser
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
        if (!auth()->check() || !auth()->user()->student){
            return redirect('/student');
        }
        else if (!auth()->check() || !auth()->user()->pracovnik){
            return redirect('/pracovnik');
        }
        return $next($request);
    }
}
