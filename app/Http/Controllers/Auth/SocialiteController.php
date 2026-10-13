<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToGoogle(Request $request): RedirectResponse
    {
        if (! $this->hasGoogleConfiguration()) {
            return back()
                ->withErrors([
                    'google' => 'Google Login is not configured yet. Please use email and password for now.',
                ], 'login')
                ->with('showLoginModal', true);
        }

        $request->session()->put('url.intended', url()->previous());

        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request): RedirectResponse
    {
        if (! $this->hasGoogleConfiguration()) {
            return redirect()->route('home')
                ->withErrors([
                    'google' => 'Google Login is not configured yet. Please use email and password for now.',
                ], 'login')
                ->with('showLoginModal', true);
        }

        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Throwable $exception) {
            report($exception);

            return redirect()->route('home')
                ->withErrors([
                    'google' => 'Google Login could not be completed. Please try again.',
                ], 'login')
                ->with('showLoginModal', true);
        }

        $email = Str::lower(trim((string) $googleUser->getEmail()));
        $googleId = $googleUser->getId();

        if (! $email || ! $googleId) {
            return redirect()->route('home')
                ->withErrors([
                    'google' => 'Google did not provide the account information required to sign in.',
                ], 'login')
                ->with('showLoginModal', true);
        }

        if (! $this->hasVerifiedGoogleEmail($googleUser)) {
            return redirect()->route('home')
                ->withErrors([
                    'google' => 'Google could not confirm ownership of this email address. Please use email and password instead.',
                ], 'login')
                ->with('showLoginModal', true);
        }

        $customer = Customer::where('google_id', $googleId)->first();

        $customer ??= Customer::where('email', $email)->first();

        if ($customer) {
            if ($customer->google_id && $customer->google_id !== $googleId) {
                return redirect()->route('home')
                    ->withErrors([
                        'google' => 'This customer account is already linked to another Google account.',
                    ], 'login')
                    ->with('showLoginModal', true);
            }

            if (! $customer->google_id) {
                $customer->forceFill(['google_id' => $googleId])->save();
            }

            if (! $customer->hasVerifiedEmail()) {
                $customer->markEmailAsVerified();
            }
        } else {
            $customer = Customer::create([
                'name' => $googleUser->getName() ?: Str::before($email, '@'),
                'email' => $email,
                'google_id' => $googleId,
                'password' => Hash::make(Str::random(64)),
                'email_verified_at' => now(),
            ]);
        }

        Auth::guard('customer')->login($customer);
        $request->session()->regenerate();

        return redirect()->intended(route('home', absolute: false));
    }

    private function hasGoogleConfiguration(): bool
    {
        return filled(config('services.google.client_id'))
            && filled(config('services.google.client_secret'))
            && filled(config('services.google.redirect'));
    }

    private function hasVerifiedGoogleEmail(object $googleUser): bool
    {
        $raw = method_exists($googleUser, 'getRaw') ? $googleUser->getRaw() : [];
        $verified = data_get($raw, 'email_verified');

        return $verified === true || $verified === 1 || $verified === 'true' || $verified === '1';
    }
}
