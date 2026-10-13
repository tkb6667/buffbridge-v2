<x-guest-layout>
    <div class="bb-auth-page">
        <section class="bb-auth-card" aria-labelledby="verification-title">
            <div class="bb-auth-brand">BUFFBRIDGE</div>
            <h1 class="bb-auth-title" id="verification-title">Verify your email</h1>
            <p class="bb-auth-copy">
                We sent a verification link to <strong>{{ auth('customer')->user()->email }}</strong>.
                Verify this address before checking out, viewing order history, submitting reviews, or changing account security settings.
            </p>

            @if (session('status') === 'verification-link-sent')
                <div class="bb-auth-status" role="status">
                    A new verification link has been sent. It will expire in 60 minutes.
                </div>
            @endif

            <div class="bb-auth-actions">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button class="bb-auth-button" type="submit">Resend verification email</button>
                </form>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="bb-auth-link" type="submit">Log out</button>
                </form>
            </div>

            <p class="bb-auth-note">If the message does not arrive, check your spam folder and confirm that the address above is correct.</p>
        </section>
    </div>
    @include('auth.partials.customer-card-styles')
</x-guest-layout>
