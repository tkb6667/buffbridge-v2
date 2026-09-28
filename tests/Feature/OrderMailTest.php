<?php

namespace Tests\Feature;

use App\Mail\OrderPlacedAdmin;
use App\Models\CartItem;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class OrderMailTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config()->set('database.default', 'sqlite');
        config()->set('database.connections.sqlite.database', ':memory:');

        Schema::create('customers', function ($table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->timestamps();
        });

        Schema::create('products', function ($table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 2)->default(0);
            $table->integer('stock_quantity')->nullable();
            $table->string('availability')->nullable();
            $table->timestamps();
        });

        Schema::create('product_variants', function ($table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('type')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->integer('stock_quantity')->nullable();
            $table->timestamps();
        });

        Schema::create('cart_items', function ($table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('variant_id')->nullable();
            $table->integer('quantity')->default(1);
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });

        Schema::create('orders', function ($table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->decimal('total_price', 10, 2)->default(0);
            $table->string('billing_first_name')->nullable();
            $table->string('billing_house_number')->nullable();
            $table->string('billing_subdistrict')->nullable();
            $table->string('billing_district')->nullable();
            $table->string('billing_province')->nullable();
            $table->string('billing_postcode')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('status')->default('pending');
            $table->string('payment_type')->nullable();
            $table->string('payment_slip')->nullable();
            $table->timestamps();
        });

        Schema::create('order_items', function ($table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('variant_id')->nullable();
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });

        Schema::create('setting', function ($table) {
            $table->id();
            $table->tinyInteger('comingsoon')->default(0);
            $table->text('cc_emails')->nullable();
            $table->timestamps();
        });

        \DB::table('setting')->insert([
            'comingsoon' => 0,
            'cc_emails' => 'admin1@example.com,admin2@example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function test_send_mail_to_multiple_recipients_after_checkout()
    {
        $customer = Customer::create([
            'name' => 'Admin',
            'email' => 'customer@example.com',
        ]);

        $product = Product::create([
            'name' => 'P',
            'price' => 50,
            'stock_quantity' => 10,
            'availability' => 'In Stock',
        ]);
        $variant = ProductVariant::create([
            'product_id' => $product->id,
            'type' => 'Default',
            'price' => 50,
            'stock_quantity' => 10,
        ]);

        CartItem::create([
            'customer_id' => $customer->id,
            'product_id' => $product->id,
            'variant_id' => $variant->id,
            'quantity' => 2,
            'price' => 50,
        ]);

        $this->actingAs($customer, 'customer');

        Mail::fake();

        $this->post(route('checkout.process'), [
            'billing_first_name' => 'x',
            'billing_house_number' => '1',
            'billing_subdistrict' => 'a',
            'billing_district' => 'b',
            'billing_province' => 'c',
            'billing_postcode' => '10000',
            'billing_phone' => '000',
            'billing_email' => 'e@example.com',
        ]);

        Mail::assertSent(OrderPlacedAdmin::class, function ($mail) {
            return $mail->hasTo('admin1@example.com') && $mail->hasCc('admin2@example.com');
        });
    }
}
