<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class chef
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
         if (auth()->user()->admin == 0 && auth()->user()->chef ==1) {
            return $next($request);
        } else {
            abort(401);
        }
    }
}
