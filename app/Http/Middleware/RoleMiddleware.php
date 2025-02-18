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

        if (!$user || !$user->hasRole($role))
        {
            abort(403, 'Forbidden: Insufficient permissions');
        }

        // If the user has the "master" role, redirect them
        if ($user->hasRole('master')) {
            return redirect()->route('master.dashboard'); // Change to your desired route
        }

        return $next($request);


    }
}
