<?php

namespace Tests\Feature;

use App\Models\CartItem;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CheckoutProcessTest extends TestCase
{
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        config()->set('database.default', 'sqlite');
        config()->set('database.connections.sqlite.database', ':memory:');

        // สร้างตารางที่จำเป็นแบบมินิมอลสำหรับทดสอบ
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

        Schema::create('stock_logs', function ($table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->decimal('old_quantity', 10, 2)->nullable();
            $table->decimal('new_quantity', 10, 2)->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });

        // สำหรับ middleware ComingSoon
        Schema::create('setting', function ($table) {
            $table->id();
            $table->tinyInteger('comingsoon')->default(0);
            $table->timestamps();
        });

        \DB::table('setting')->insert([
            'comingsoon' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function test_checkout_process_creates_order_without_reducing_stock()
    {
        $customer = Customer::create([
            'name' => 'Test Customer',
            'email' => 'test@example.com',
            'password' => null,
        ]);

        $product = Product::create([
            'name' => 'Sample Product',
            'price' => 100,
            'stock_quantity' => 10,
            'availability' => 'In Stock',
        ]);

        $variant = ProductVariant::create([
            'product_id' => $product->id,
            'type' => 'Red',
            'price' => 120,
            'stock_quantity' => 5,
        ]);

        CartItem::create([
            'customer_id' => $customer->id,
            'product_id' => $product->id,
            'variant_id' => $variant->id,
            'quantity' => 3,
            'price' => 120,
        ]);

        $this->actingAs($customer, 'customer');

        $response = $this->post(route('checkout.process'), [
            'billing_first_name' => 'Test',
            'billing_house_number' => '123',
            'billing_subdistrict' => 'Sub',
            'billing_district' => 'Dist',
            'billing_province' => 'Prov',
            'billing_postcode' => '10000',
            'billing_phone' => '0800000000',
            'billing_email' => 'test@example.com',
            'payment_type' => 'cod',
        ]);

        $response->assertRedirect(route('home'));
        $response->assertSessionHas('success');

        $product->refresh();
        $variant->refresh();

        // ไม่ลดสต็อกใน checkout อีกต่อไป
        $this->assertSame(10, (int) $product->stock_quantity);
        $this->assertSame(5, (int) $variant->stock_quantity);

        $this->assertDatabaseHas('orders', [
            'customer_id' => $customer->id,
            'status' => 'pending',
        ]);

        $this->assertDatabaseHas('order_items', [
            'product_id' => $product->id,
            'variant_id' => $variant->id,
            'quantity' => 3,
        ]);
    }
}
