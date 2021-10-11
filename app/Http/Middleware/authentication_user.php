<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class authentication_user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('adminUser') || session()->has('userUser')) {
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
