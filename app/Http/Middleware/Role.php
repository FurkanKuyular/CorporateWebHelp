<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * @param $request
     * @param \Closure $next
     * @param string $role
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next, string $role) {
        if (!Auth::check())
            return redirect('/home');

        $user = Auth::user();
        if($user->role == $role)
            return $next($request);

        return redirect('/home');
    }
}
