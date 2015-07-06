<?php

namespace Appzcoder\LaravelRoles\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $redirect_path = 'auth/login')
    {
        if (auth()->check() && auth()->user()->hasRole($role)) {
            return $next($request);
        }

        return redirect($redirect_path);
    }
}
