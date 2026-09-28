<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlacedAdmin;
use App\Models\Setting;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Console\Attributes\AsCommand;
use App\Models\Customer;
use App\Models\Product;

#[AsCommand(name: 'mail:test', description: 'Send a test order email using current mail configuration and recipients')]
class TestMailCommand extends Command
{
    protected $signature = 'mail:test {--to=}';
    protected $description = 'Send a test order email using current mail configuration and recipients';

    public function handle(): int
    {
        $to = $this->option('to');

        $setting = Setting::first();
        $raw = $setting?->cc_emails;
        $emails = array_values(array_filter(array_map('trim', preg_split('/[,;]+/', (string) $raw))));

        if (!$to && count($emails) === 0) {
            $this->error('No recipients provided. Use --to=you@example.com or fill setting.cc_emails');
            return self::FAILURE;
        }

        if (!$to) {
            $to = array_shift($emails);
        }

        $customer = Customer::firstOrCreate(
            ['email' => 'mailtest@example.com'],
            ['name' => 'Mail Tester', 'password' => null]
        );

        $order = Order::create([
            'customer_id' => $customer->id,
            'total_price' => 123.45,
            'billing_first_name' => 'Test',
            'billing_house_number' => '1',
            'billing_subdistrict' => 'Sub',
            'billing_district' => 'Dist',
            'billing_province' => 'Prov',
            'billing_postcode' => '10000',
            'billing_phone' => '0000000000',
            'billing_email' => 'test@example.com',
            'status' => 'pending',
        ]);

        $product = Product::firstOrCreate(
            ['name' => 'Test Product'],
            [
                'product_code' => 'TEST-001',
                'brand' => 'Test',
                'price' => 123.45,
                'stock_quantity' => 100,
                'availability' => 'In Stock',
            ]
        );

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'variant_id' => null,
            'quantity' => 1,
            'price' => 123.45,
        ]);

        $order->load(['orderItems.product', 'orderItems.variant']);

        Mail::to($to)->cc($emails)->send(new OrderPlacedAdmin($order));

        $this->info("Test email sent to {$to}" . (count($emails) ? ' (cc: ' . implode(', ', $emails) . ')' : ''));
        return self::SUCCESS;
    }
}
