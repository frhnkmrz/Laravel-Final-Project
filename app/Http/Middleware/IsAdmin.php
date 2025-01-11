<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() && auth()->user()->userCategory === 'admin') {
            return $next($request);
        }

        // Log unauthorized access attempt
        Log::warning('Unauthorized admin access attempt by user: ' . auth()->user()->id);

        // Redirect or abort if not admin
        abort(403, 'You do not have admin access');
    }
}
