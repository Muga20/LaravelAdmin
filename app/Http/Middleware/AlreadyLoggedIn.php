<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AlreadyLoggedIn
{
    public function handle(Request $request, Closure $next): Response
    {
        $isLoggedIn = session()->has('LoggedUser');
        $isOnLoginPage = url('login') === $request->url();
        $isOnRegisterPage = url('register') === $request->url();
        $isOnDashboardPage = url('dashboard') === $request->url();

        if ($isLoggedIn && ($isOnLoginPage || $isOnRegisterPage)) {
            return redirect('/dashboard');
        }

        if ($isLoggedIn && !$isOnDashboardPage) {
            return redirect('/dashboard');
        }

        if (!$isLoggedIn && !$isOnLoginPage && !$isOnRegisterPage) {
            return redirect('/login');
        }

        return $next($request);
    }
}
