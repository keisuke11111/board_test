<?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Auth\Events\Verified;
// use Illuminate\Foundation\Auth\EmailVerificationRequest;

// class VerifyEmailController extends Controller
// {
//     /**
//      * Mark the authenticated user's email address as verified.
//      *
//      * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
//      * @return \Illuminate\Http\RedirectResponse
//      */
//     public function __invoke(EmailVerificationRequest $request)
//     {
//         if ($request->user()->hasVerifiedEmail()) {
//             return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
//         }

//         if ($request->user()->markEmailAsVerified()) {
//             event(new Verified($request->user()));
//         }

//         return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
//     }
// }
namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('admin.auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::ADMIN_HOME);
    }
}