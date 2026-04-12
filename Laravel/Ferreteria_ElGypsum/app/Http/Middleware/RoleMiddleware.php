<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * Accepts a role name as parameter, e.g. role:admin
     */
    public function handle(Request $request, Closure $next, string $role = null): Response
    {
        $user = $request->user();

        if (! $user) {
            abort(403);
        }

        if ($role && method_exists($user, 'hasRole')) {
            if (! $user->hasRole($role)) {
                abort(403);
            }
        }

        return $next($request);
    }
}
