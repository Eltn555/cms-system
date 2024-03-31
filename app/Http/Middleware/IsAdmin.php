<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
            if (auth()->user()->role === 1) {
                return $next($request);
            } else {
            return redirect()->route('front..index')->with('error', 'You don\'t have permission to access this page');
            }
        }

}
