<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isAuthenticatedAdmin = (Auth::check());

        //This will be excecuted if the new authentication fails.
        if (!$isAuthenticatedAdmin) {
            return redirect('/login');
        }

        return $next($request);
    }
}