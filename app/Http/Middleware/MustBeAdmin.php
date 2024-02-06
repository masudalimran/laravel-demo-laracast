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
        $reqPathArr = explode('/', request()->path());

        if ($reqPathArr[0] !== $adminPath) {
            abort(404);
        } else if (auth()->user()) {
            if (auth()->user()?->isAdmin !== 1) {
                abort(403);
            } else if (request()->path() === $adminPath) {
                return redirect()
                    ->route('dashboard', ['adminRoute' => $adminPath]);
            }
        } else if ($reqPathArr[0] === $adminPath && isset($reqPathArr[1])) {
            return redirect($adminPath);
        }
        return $next($request);
    }
}
