<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permissionName): Response
    {
        if(!auth()->check() || !auth()->user()->hasPermission($permissionName)){
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        return $next($request);
    }
}
