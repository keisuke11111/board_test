<?php

// namespace App\Http\Middleware;

// use Illuminate\Auth\Middleware\Authenticate as Middleware;

// class Authenticate extends Middleware
// {
//     /**
//      * Get the path the user should be redirected to when they are not authenticated.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return string|null
//      */
//     protected function redirectTo($request)
//     {
//         if (! $request->expectsJson()) {
//             return route('login');
//         }
//     }
// }


// namespace App\Http\Middleware;

// use App\Providers\RouteServiceProvider;
// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// namespace App\Http\Middleware;

// use Illuminate\Auth\Middleware\Authenticate as Middleware;
// use Illuminate\Support\Facades\Route;


// class RedirectIfAuthenticated
// {
//     private const GUARD_USER = 'users';
//     private const GUARD_ADMIN = 'admins';

//     public function handle(Request $request, Closure $next, ...$guards)
//     {
//         if (Auth::guard(self::GUARD_ADMIN)->check() && $request->routIs('admin.*')) {
//                 return redirect(RouteServiceProvider::ADMIN_HOME);
//             }
//         if (Auth::guard(self::GUARD_USER)->check() && $request->routIs('user.*')) {
//                 return redirect(RouteServiceProvider::HOME);
//             }
//         return $next($request);
namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
             if (Route::is(config('route.admin_wild'))) {
               return route(config('route.admin_login_route'));
            }
             return route(config('route.user_login_route'));
        }
    }
}


//     }
// }