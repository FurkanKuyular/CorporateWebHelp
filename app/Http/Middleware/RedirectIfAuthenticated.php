<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * @param $request
     * @param Closure $next
     * @param null $guard
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->role;

            switch ($role) {
                case 'admin':
                    return redirect('/admin_dashboard');
                    break;
                case 'seller':
                    return redirect('/seller_dashboard');
                    break;
                default:
                    return redirect('/home');
                    break;
            }
        }

        return $next($request);
    }
}
