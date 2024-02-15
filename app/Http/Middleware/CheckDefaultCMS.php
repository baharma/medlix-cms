<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDefaultCMS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       // Check if the user is authenticated and if the default_cms attribute is null or 0
        if (auth()->check() && (is_null(auth()->user()->default_cms))) {
            // Redirect the user to the set.cms route
           return redirect('/login');
        }

        // If the default_cms is not null or 0, proceed with the request
        return $next($request);
    }
}
