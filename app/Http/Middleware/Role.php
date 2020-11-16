<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Middleware\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $admin, $guest)
    {
        if (\Auth::user()->role == $admin) {
            return $next($request);
        } elseif (\Auth::user()->role == $guest) {
            return redirect('redirect');
        }
    }
}