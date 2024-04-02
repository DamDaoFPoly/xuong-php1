<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // auth::check để kiểm tra đăng nhập hay chx và và kiểm tra cem đó có phải là admin ko neeyus ko thì trả về 401
        if (Auth::check() && Auth::user()->is_admin) {

            return $next($request);
        } else {
            abort(401);
        }
    }
}
