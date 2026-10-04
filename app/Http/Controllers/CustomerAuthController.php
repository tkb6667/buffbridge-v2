<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CustomerAuthController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator, 'login')
                ->withInput($request->only('email'))
                ->with('showLoginModal', true);
        }

        $throttleKey = Str::transliterate(Str::lower($request->string('email')).'|'.$request->ip());

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            return back()
                ->withErrors([
                    'email' => 'Too many login attempts. Please try again in '.RateLimiter::availableIn($throttleKey).' seconds.',
                ], 'login')
                ->withInput($request->only('email'))
                ->with('showLoginModal', true);
        }

        $remember = $request->filled('rememberme');

        if (! Auth::guard('customer')->attempt($request->only('email', 'password'), $remember)) {
            RateLimiter::hit($throttleKey, 60);

            return back()
                ->withErrors([
                    'email' => 'The email or password is incorrect.',
                ], 'login')
                ->withInput($request->only('email'))
                ->with('showLoginModal', true);
        }

        RateLimiter::clear($throttleKey);
        $request->session()->regenerate();

        return redirect()->intended(url()->previous());
    }
}
