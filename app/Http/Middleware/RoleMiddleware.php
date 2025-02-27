<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = auth()->user();
        $rolesArray = explode(',', $role);


        if (!$user || !$user->hasAnyRole($rolesArray)) {
            abort(403, 'Forbidden: Insufficient Permissions');
        }

        return $next($request);


    }
}
