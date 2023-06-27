<?php
namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class NewPasswordController extends Controller
{
    public function create(Request $request)
    {
        return view('admin.auth.reset-password', ['request' => $request]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('admin.login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
}
// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Password;

// class PasswordResetLinkController extends Controller
// {
//     /**
//      * Display the password reset link request view.
//      *
//      * @return \Illuminate\View\View
//      */
//     public function create()
//     {
//         return view('auth.forgot-password');
//     }

//     /**
//      * Handle an incoming password reset link request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\RedirectResponse
//      *
//      * @throws \Illuminate\Validation\ValidationException
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             'email' => ['required', 'email'],
//         ]);

//         // We will send the password reset link to this user. Once we have attempted
//         // to send the link, we will examine the response then see the message we
//         // need to show to the user. Finally, we'll send out a proper response.
//         $status = Password::sendResetLink(
//             $request->only('email')
//         );

//         return $status == Password::RESET_LINK_SENT
//                     ? back()->with('status', __($status))
//                     : back()->withInput($request->only('email'))
//                             ->withErrors(['email' => __($status)]);
//     }
// }
