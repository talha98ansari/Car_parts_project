<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // User is logged in
            // You can perform additional checks or actions if needed
            // For example, update the "last_seen" timestamp here
        } else {
            // User is not logged in
            // You can redirect them to the login page or perform other actions
            return redirect('/');
        }

        return $next($request);
    }
}
