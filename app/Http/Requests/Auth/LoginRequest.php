<?php

<<<<<<< HEAD
=======
// namespace App\Http\Requests\Auth;

// use Illuminate\Auth\Events\Lockout;
// use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\RateLimiter;
// use Illuminate\Support\Str;
// use Illuminate\Validation\ValidationException;

// class LoginRequest extends FormRequest
// {
//     /**
//      * Determine if the user is authorized to make this request.
//      *
//      * @return bool
//      */
//     public function authorize()
//     {
//         return true;
//     }

//     /**
//      * Get the validation rules that apply to the request.
//      *
//      * @return array
//      */
//     public function rules()
//     {
//         return [
//             'email' => ['required', 'string', 'email'],
//             'password' => ['required', 'string'],
//         ];
//     }

//     /**
//      * Attempt to authenticate the request's credentials.
//      *
//      * @return void
//      *
//      * @throws \Illuminate\Validation\ValidationException
//      */
//     public function authenticate()
//     {
//         $this->ensureIsNotRateLimited();

//         if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
//             RateLimiter::hit($this->throttleKey());

//             throw ValidationException::withMessages([
//                 'email' => trans('auth.failed'),
//             ]);
//         }

//         RateLimiter::clear($this->throttleKey());
//     }

//     /**
//      * Ensure the login request is not rate limited.
//      *
//      * @return void
//      *
//      * @throws \Illuminate\Validation\ValidationException
//      */
//     public function ensureIsNotRateLimited()
//     {
//         if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
//             return;
//         }

//         event(new Lockout($this));

//         $seconds = RateLimiter::availableIn($this->throttleKey());

//         throw ValidationException::withMessages([
//             'email' => trans('auth.throttle', [
//                 'seconds' => $seconds,
//                 'minutes' => ceil($seconds / 60),
//             ]),
//         ]);
//     }

//     /**
//      * Get the rate limiting throttle key for the request.
//      *
//      * @return string
//      */
//     public function throttleKey()
//     {
//         return Str::lower($this->input('email')).'|'.$this->ip();
//     }
// }


>>>>>>> 2bd6d2f6e08b12142d5a4f8fc6f83bc75a8e70f5
namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
<<<<<<< HEAD

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
=======
use App\Common\Route\RouteInfo;

class LoginRequest extends FormRequest
{
>>>>>>> 2bd6d2f6e08b12142d5a4f8fc6f83bc75a8e70f5
    public function authorize()
    {
        return true;
    }

<<<<<<< HEAD
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
=======
    public function rules()
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];
    }

>>>>>>> 2bd6d2f6e08b12142d5a4f8fc6f83bc75a8e70f5
    public function authenticate()
    {
        $this->ensureIsNotRateLimited();

<<<<<<< HEAD
        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
=======
        $guard = RouteInfo::getRouteInfo($this);

        if (! Auth::guard($guard)->attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
>>>>>>> 2bd6d2f6e08b12142d5a4f8fc6f83bc75a8e70f5
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

<<<<<<< HEAD
    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
=======
>>>>>>> 2bd6d2f6e08b12142d5a4f8fc6f83bc75a8e70f5
    public function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

<<<<<<< HEAD
    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
=======
>>>>>>> 2bd6d2f6e08b12142d5a4f8fc6f83bc75a8e70f5
    public function throttleKey()
    {
        return Str::lower($this->input('email')).'|'.$this->ip();
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 2bd6d2f6e08b12142d5a4f8fc6f83bc75a8e70f5
