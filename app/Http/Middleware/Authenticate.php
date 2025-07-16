<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request) : ?string
    {
        // if (! $request->expectsJson()) {
        //     // session()->flash('error', 'Please login to access this page.');
        //     return route('admin.login');
        // }
        if ($request->is('admin/*')) {
            if (!Auth::guard('admin')->check()) {
                return route('admin.login');
            }
        }
        return $next($request);
    }
}
