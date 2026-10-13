<x-guest-layout>
    <div class="bb-auth-page">
        <section class="bb-auth-card" aria-labelledby="verification-error-title">
            <div class="bb-auth-brand">BUFFBRIDGE</div>
            <h1 class="bb-auth-title" id="verification-error-title">Link unavailable</h1>
            <div class="bb-auth-error" role="alert">This verification link is invalid, has expired, or was already replaced.</div>
            <p class="bb-auth-copy">Sign in to your BuffBridge account and request a fresh verification email.</p>
            <div class="bb-auth-actions">
                @auth('customer')
                    <a class="bb-auth-button" href="{{ route('verification.notice') }}">Request a new link</a>
                @else
                    <a class="bb-auth-button" href="{{ route('login') }}">Log in</a>
                @endauth
                <a class="bb-auth-link" href="{{ route('home') }}">Back to home</a>
            </div>
        </section>
    </div>
    @include('auth.partials.customer-card-styles')
</x-guest-layout>
