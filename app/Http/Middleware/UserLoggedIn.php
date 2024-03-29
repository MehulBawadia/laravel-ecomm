<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserLoggedIn
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
        if (auth()->check() && auth()->id() >= 2) {
            return $next($request);
        }

        return redirect(route('homePage'));
    }
}
