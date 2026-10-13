<x-guest-layout>
    <div class="bb-auth-page">
        <section class="bb-auth-card" aria-labelledby="reset-title">
            <div class="bb-auth-brand">BUFFBRIDGE</div>
            <h1 class="bb-auth-title" id="reset-title">Set new password</h1>
            <p class="bb-auth-copy">Choose a new password with at least eight characters.</p>

            @if ($errors->any())
                <div class="bb-auth-error" role="alert">
                    @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="bb-auth-field">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autocomplete="email" autofocus>
                </div>
                <div class="bb-auth-field">
                    <label for="password">New password</label>
                    <input id="password" type="password" name="password" required minlength="8" autocomplete="new-password">
                </div>
                <div class="bb-auth-field">
                    <label for="password_confirmation">Confirm new password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required minlength="8" autocomplete="new-password">
                </div>
                <div class="bb-auth-actions">
                    <button class="bb-auth-button" type="submit">Reset password</button>
                    <a class="bb-auth-link" href="{{ route('password.request') }}">Request another link</a>
                </div>
            </form>
        </section>
    </div>
    @include('auth.partials.customer-card-styles')
</x-guest-layout>
