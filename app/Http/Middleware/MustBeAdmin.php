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
        $reqFirstPath = request()->segment(1);
        $pathCount = count(request()->segments());

        if ($reqFirstPath !== getAdminUrl()) {
            abort(404);
        } else if (auth()->user()) {
            if (auth()->user()?->isAdmin !== 1) {
                abort(403);
            } else if ($reqFirstPath === getAdminUrl() && $pathCount === 1) {
                return redirect()
                    ->route('backend-dashboard')->with('success', "Welcome Back, Mr. " . auth()->user()->name);
            }
        } else if ($reqFirstPath === getAdminUrl() && $pathCount > 1) {
            return redirect(getAdminUrl());
        }
        return $next($request);
    }
}
