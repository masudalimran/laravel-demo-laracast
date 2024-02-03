<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $adminPath = 'admin';
        if (request()->path() !== $adminPath) {
            abort(404);
        } else if (auth()->user()?->isAdmin !== 1) {
            abort(403);
        }
        return $next($request);
    }
}
