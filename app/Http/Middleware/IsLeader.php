<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class IsLeader
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
        if (auth()->user() && auth()->user()->userCategory === 'leader') {
            return $next($request);
        }

        // Log unauthorized access attempt
        Log::warning('Unauthorized leader access attempt by user: ' . auth()->user()->id);

        // Redirect or abort if not leader
        abort(403, 'You do not have leader access');
    }
}
