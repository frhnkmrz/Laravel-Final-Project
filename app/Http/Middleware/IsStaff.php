<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class IsStaff
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
        if (auth()->user() && auth()->user()->userCategory === 'staff') {
            return $next($request);
        }

        // Log unauthorized access attempt
        Log::warning('Unauthorized staff access attempt by user: ' . auth()->user()->id);

        // Redirect or abort if not staff
        abort(403, 'You do not have staff access');
    }
}
