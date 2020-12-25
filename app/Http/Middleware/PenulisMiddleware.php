<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PenulisMiddleware
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
        if (auth()->user()) {
            if (auth()->user()->penulis) {
                return $next($request);
            }

            return redirect('admin/dashboard');
        }

        return redirect('login');
    }
}
