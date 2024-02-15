<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventRedirectLoop
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the request is being redirected
        if ($request->isRedirected()) {
            // Prevent further redirections
            return abort(500, 'Too many redirections detected.');
        }

        return $next($request);
    }
}
