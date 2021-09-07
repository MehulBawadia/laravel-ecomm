<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminExists
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
        if (\App\Models\User::withTrashed()->first() != null) {
            return $next($request);
        }

        return redirect(route('admin.generate'));
    }
}
