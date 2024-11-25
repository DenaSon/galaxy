<?php

namespace App\Http\Middleware;

use App\Notifications\UnauthorizedAccessAlert;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        // Check if the user is authenticated
        if (! $request->user() || ! $request->user()->hasRole($role))
        {
            Log::warning('Unauthorized access attempt', [
                'user_id' => $request->user()?->id,
                'required_role' => $role,
                'IP' => $request->ip() ?? 0,
                'url' => $request->fullUrl(),
                'payload' => $request->all(),
                'User-Agent' => $request->header('User-Agent') ?? 'Unknown',
                'timestamp' => now()->toDateTimeString(),
                'token' => $request->bearerToken() ?? 'No Token',
                'referrer' => $request->header('Referer') ?? 'No Referrer',


            ]);

            $details = [
                'user_id' => $request->user()?->id,
                'role' => $role,
                'ip' => $request->ip(),
                'url' => $request->fullUrl(),
            ];
            $master_email = getSetting('admin_email') ?? 'info@denapax.com';

            Notification::route('mail', $master_email)->notify(new UnauthorizedAccessAlert($details));


            abort(403, 'Forbidden: Insufficient permissions');
        }

        return $next($request);
    }
}
