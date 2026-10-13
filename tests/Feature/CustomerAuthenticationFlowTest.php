<?php

namespace Tests\Feature;

use App\Http\Middleware\ComingSoon;
use App\Models\Customer;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Laravel\Socialite\Contracts\Provider;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as GoogleUser;
use Tests\TestCase;

class CustomerAuthenticationFlowTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware(ComingSoon::class);
        $this->rebuildCustomerAuthSchema();
    }

    public function test_verification_migration_preserves_existing_customer_and_adds_nullable_timestamp(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('email_verified_at');
        });
        $customerId = DB::table('customers')->insertGetId([
            'name' => 'Legacy Customer',
            'email' => 'legacy@example.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $migration = require database_path('migrations/2026_10_12_000000_add_email_verified_at_to_customers_table.php');
        $migration->up();

        $this->assertTrue(Schema::hasColumn('customers', 'email_verified_at'));
        $this->assertDatabaseHas('customers', [
            'id' => $customerId,
            'email' => 'legacy@example.com',
            'email_verified_at' => null,
        ]);
    }

    public function test_registration_normalizes_email_authenticates_customer_and_sends_verification(): void
    {
        Notification::fake();

        $response = $this->post('/register', [
            'name' => 'New Customer',
            'email' => '  NEW.Customer@Example.COM  ',
            'password' => 'password',
            'password_confirmation' => 'password',
            'registration_agree' => '1',
        ]);

        $customer = Customer::firstOrFail();

        $response->assertRedirect(route('verification.notice'));
        $this->assertAuthenticatedAs($customer, 'customer');
        $this->assertGuest('web');
        $this->assertSame('new.customer@example.com', $customer->email);
        $this->assertNull($customer->email_verified_at);
        Notification::assertSentTo($customer, VerifyEmail::class);
    }

    public function test_authenticated_customer_cannot_register_another_account(): void
    {
        $customer = $this->customer();

        $response = $this->actingAs($customer, 'customer')->post('/register', [
            'name' => 'Second Account',
            'email' => 'second@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'registration_agree' => '1',
        ]);

        $response->assertRedirect('/');
        $this->assertSame(1, Customer::count());
    }

    public function test_verified_and_unverified_customers_use_only_the_customer_guard(): void
    {
        $unverified = $this->customer('unverified@example.com');

        $this->post('/customer/login', [
            'email' => ' UNVERIFIED@EXAMPLE.COM ',
            'password' => 'password',
        ])->assertRedirect(route('verification.notice'));

        $this->assertAuthenticatedAs($unverified, 'customer');
        $this->assertGuest('web');
        $this->get('/verify-email')->assertOk()->assertSee('Verify your email');
        $this->post('/logout')->assertRedirect('/');

        $verified = $this->customer('verified-login@example.com', true);

        $this->post('/customer/login', [
            'email' => $verified->email,
            'password' => 'password',
        ])->assertRedirect(route('home'));

        $this->assertAuthenticatedAs($verified, 'customer');
        $this->assertGuest('web');
        $this->post('/login')->assertMethodNotAllowed();
    }

    public function test_customer_login_is_throttled_after_repeated_failures(): void
    {
        $customer = $this->customer('throttle@example.com');

        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->post('/customer/login', [
                'email' => $customer->email,
                'password' => 'wrong-password',
            ])->assertSessionHasErrors('email', null, 'login');
        }

        $this->post('/customer/login', [
            'email' => $customer->email,
            'password' => 'wrong-password',
        ])->assertSessionHasErrors('email', null, 'login');

        $this->assertGuest('customer');
    }

    public function test_duplicate_email_registration_is_rejected_after_normalization(): void
    {
        $this->customer('duplicate@example.com');

        $response = $this->post('/register', [
            'name' => 'Duplicate',
            'email' => ' DUPLICATE@EXAMPLE.COM ',
            'password' => 'password',
            'password_confirmation' => 'password',
            'registration_agree' => '1',
        ]);

        $response->assertSessionHasErrors('email', null, 'register');
        $this->assertSame(1, Customer::count());
    }

    public function test_valid_signed_link_verifies_only_the_authenticated_customer(): void
    {
        Event::fake();
        $customer = $this->customer();

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $customer->id, 'hash' => sha1($customer->getEmailForVerification())]
        );

        $response = $this->actingAs($customer, 'customer')->get($verificationUrl);

        $response->assertRedirect(route('home'));
        $this->assertTrue($customer->fresh()->hasVerifiedEmail());
        Event::assertDispatched(Verified::class);
    }

    public function test_tampered_and_expired_verification_links_are_rejected(): void
    {
        $customer = $this->customer();
        $validUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $customer->id, 'hash' => sha1($customer->email)]
        );
        $tamperedUrl = str_replace(
            sha1($customer->email),
            sha1('other@example.com'),
            $validUrl
        );

        $this->actingAs($customer, 'customer')
            ->get($tamperedUrl)
            ->assertForbidden()
            ->assertSee('invalid, has expired');

        $expiredUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->subMinute(),
            ['id' => $customer->id, 'hash' => sha1($customer->email)]
        );

        $this->actingAs($customer, 'customer')->get($expiredUrl)->assertForbidden();
        $this->assertFalse($customer->fresh()->hasVerifiedEmail());
    }

    public function test_signed_link_cannot_verify_a_different_authenticated_customer(): void
    {
        $linkOwner = $this->customer('owner@example.com');
        $otherCustomer = $this->customer('other@example.com');
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $linkOwner->id, 'hash' => sha1($linkOwner->email)]
        );

        $this->actingAs($otherCustomer, 'customer')->get($verificationUrl)->assertForbidden();
        $this->assertFalse($linkOwner->fresh()->hasVerifiedEmail());
        $this->assertFalse($otherCustomer->fresh()->hasVerifiedEmail());
    }

    public function test_verification_resend_is_throttled(): void
    {
        Notification::fake();
        $customer = $this->customer();
        $this->actingAs($customer, 'customer');

        for ($attempt = 0; $attempt < 6; $attempt++) {
            $this->post('/email/verification-notification')->assertRedirect();
        }

        $this->post('/email/verification-notification')->assertTooManyRequests();
        Notification::assertSentToTimes($customer, VerifyEmail::class, 6);
    }

    public function test_verification_middleware_gates_sensitive_commerce_but_keeps_cart_available(): void
    {
        $unverified = $this->customer();
        $productId = DB::table('products')->insertGetId([
            'name' => 'Test product',
            'price' => 100,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->actingAs($unverified, 'customer')->get('/checkout')
            ->assertRedirect(route('verification.notice'));
        $this->actingAs($unverified, 'customer')->get('/order-history')
            ->assertRedirect(route('verification.notice'));
        $this->actingAs($unverified, 'customer')->post("/products/{$productId}/reviews", [
            'rating' => 5,
            'comment' => 'Great',
        ])->assertRedirect(route('verification.notice'));
        $this->actingAs($unverified, 'customer')->get('/profile')
            ->assertRedirect(route('verification.notice'));
        $this->actingAs($unverified, 'customer')->get('/cart')->assertOk();

        $verified = $this->customer('verified@example.com', true);
        $this->actingAs($verified, 'customer')->get('/checkout')->assertOk();
        $this->actingAs($verified, 'customer')->get('/order-history')->assertOk();
        $this->actingAs($verified, 'customer')->post("/products/{$productId}/reviews", [
            'rating' => 5,
            'comment' => 'Verified review',
        ])->assertRedirect();

        $this->assertDatabaseHas('reviews', [
            'customer_id' => $verified->id,
            'product_id' => $productId,
        ]);
    }

    public function test_password_recovery_is_neutral_and_resets_customer_password(): void
    {
        Notification::fake();
        $customer = $this->customer('reset@example.com');

        $known = $this->post('/forgot-password', ['email' => ' RESET@EXAMPLE.COM ']);
        $unknown = $this->post('/forgot-password', ['email' => 'missing@example.com']);

        $known->assertSessionHas('status');
        $unknown->assertSessionHas('status', $known->getSession()->get('status'));
        Notification::assertSentTo($customer, ResetPassword::class, function (ResetPassword $notification) use ($customer) {
            $this->get(route('password.reset', [
                'token' => $notification->token,
                'email' => $customer->email,
            ]))->assertOk()->assertSee('Set new password');

            $response = $this->post('/reset-password', [
                'token' => $notification->token,
                'email' => strtoupper($customer->email),
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ]);

            $response->assertRedirect(route('home'));

            return true;
        });

        $this->assertTrue(Hash::check('new-password', $customer->fresh()->password));
    }

    public function test_invalid_password_reset_token_has_clear_recovery_error(): void
    {
        $customer = $this->customer('invalid-reset@example.com');

        $this->post('/reset-password', [
            'token' => 'invalid-token',
            'email' => $customer->email,
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ])->assertSessionHasErrors('email');

        $this->assertTrue(Hash::check('password', $customer->fresh()->password));
    }

    public function test_verified_customer_account_deletion_logs_out_customer_guard(): void
    {
        $customer = $this->customer('delete@example.com', true);

        $this->actingAs($customer, 'customer')->delete('/profile', [
            'password' => 'password',
        ])->assertRedirect('/');

        $this->assertGuest('customer');
        $this->assertGuest('web');
        $this->assertNull($customer->fresh());
    }

    public function test_google_rejects_unverified_provider_email_and_accepts_verified_email(): void
    {
        config()->set('services.google', [
            'client_id' => 'test-client',
            'client_secret' => 'test-secret',
            'redirect' => 'https://store.example.test/auth/google/callback',
        ]);

        $existing = $this->customer('google@example.com');
        $unverifiedGoogleUser = $this->googleUser('google-unverified', $existing->email, false);
        $provider = $this->mock(Provider::class);
        $provider->shouldReceive('user')->once()->andReturn($unverifiedGoogleUser);
        Socialite::shouldReceive('driver')->with('google')->once()->andReturn($provider);

        $this->get('/auth/google/callback')->assertRedirect(route('home'));
        $this->assertSame(1, Customer::count());
        $this->assertNull($existing->fresh()->google_id);
        $this->assertFalse($existing->fresh()->hasVerifiedEmail());

        $verifiedGoogleUser = $this->googleUser('google-verified', 'verified-google@example.com', true);
        $provider = $this->mock(Provider::class);
        $provider->shouldReceive('user')->once()->andReturn($verifiedGoogleUser);
        Socialite::shouldReceive('driver')->with('google')->once()->andReturn($provider);

        $this->get('/auth/google/callback')->assertRedirect(route('home'));

        $customer = Customer::where('google_id', 'google-verified')->firstOrFail();
        $this->assertTrue($customer->hasVerifiedEmail());
        $this->assertAuthenticatedAs($customer, 'customer');
    }

    private function customer(string $email = 'customer@example.com', bool $verified = false): Customer
    {
        return Customer::create([
            'name' => 'Customer',
            'email' => $email,
            'password' => 'password',
            'email_verified_at' => $verified ? now() : null,
        ]);
    }

    private function googleUser(string $id, string $email, bool $verified): GoogleUser
    {
        return (new GoogleUser)
            ->setRaw(['sub' => $id, 'email' => $email, 'email_verified' => $verified])
            ->map(['id' => $id, 'name' => 'Google Customer', 'email' => $email]);
    }

    private function rebuildCustomerAuthSchema(): void
    {
        Schema::disableForeignKeyConstraints();

        foreach (['reviews', 'cart_items', 'orders', 'products', 'categories', 'customer_password_reset_tokens', 'customers'] as $table) {
            Schema::dropIfExists($table);
        }

        Schema::enableForeignKeyConstraints();

        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->string('google_id')->nullable()->unique();
            $table->string('phone')->nullable();
            $table->string('house_number')->nullable();
            $table->string('village')->nullable();
            $table->string('subdistrict')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('membership_status')->nullable();
            $table->timestamps();
        });

        Schema::create('customer_password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('parent_id')->nullable();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('variant_id')->nullable();
            $table->integer('quantity')->default(1);
            $table->decimal('price', 10, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->decimal('total_price', 10, 2)->default(0);
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('rating');
            $table->text('review');
            $table->timestamps();
        });
    }
}
