<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class AccessControlMiddleware
{
    use AuthorizesRequests;

    public function handle(Request $request, Closure $next)
    {

        $ignoredResources = config('accesscontrollist')['ignore.resources'];

        $routeName = $request->route()->getName();
        if (!in_array($routeName, $ignoredResources)) {
            $this->authorize($routeName);
        }

        return $next($request);
    }
}
