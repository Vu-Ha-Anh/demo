<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function __construct(){

    }
    public function handle(Request $request, Closure $next):Response
    {
        if (! Auth::guard('cus')->check()) {
            // chuyển hướng về form đăng nhập
            return redirect()->route('customer.logon');
        }
        return $next($request);
        
    }
}
