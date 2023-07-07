<?php

<<<<<<< HEAD
=======
// 
>>>>>>> 2bd6d2f6e08b12142d5a4f8fc6f83bc75a8e70f5
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
<<<<<<< HEAD
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
=======
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::ADMIN_HOME.'?verified=1');
>>>>>>> 2bd6d2f6e08b12142d5a4f8fc6f83bc75a8e70f5
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

<<<<<<< HEAD
        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }
}
=======
        return redirect()->intended(RouteServiceProvider::ADMIN_HOME.'?verified=1');
    }
}
>>>>>>> 2bd6d2f6e08b12142d5a4f8fc6f83bc75a8e70f5
