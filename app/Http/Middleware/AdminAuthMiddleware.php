<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        logger()->info($request->url());
        if ($this->isLoginPage($request)) {
            return $next($request);
        }

        if (!Auth::guard('admin')->check()) {
            abort(404);
        }

        return $next($request);
    }

    /**
     * @param Request $request
     * @return bool
     */
    private function isLoginPage(Request $request): bool
    {
        return $request->is('admin/login') ||
            $request->is('admin/login/submit') ||
            $request->is('admin/logout');
    }
}
