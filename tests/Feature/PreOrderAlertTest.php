<?php

namespace Tests\Feature;

use App\Http\Middleware\ComingSoon;
use App\Models\PreOrderAlert;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PreOrderAlertTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();
        $this->assertSame('buffbridge_testing', DB::connection()->getDatabaseName());
        $this->withoutMiddleware(ComingSoon::class);
        $this->ensureSupportTablesExist();
        $this->ensureFeatureTableExists();
        PreOrderAlert::query()->delete();
    }

    public function test_public_page_is_available_without_authentication_and_has_empty_state(): void
    {
        $this->get('/pre-order-alert')
            ->assertOk()
            ->assertSee('PRE-ORDER ALERT')
            ->assertSee('NO PRE-ORDER UPDATES AVAILABLE');
    }

    public function test_records_are_sorted_and_status_and_eta_are_rendered_without_pax(): void
    {
        $late = $this->alert(['product_name' => 'Delayed Product', 'pax' => 'K.Axxx', 'status' => 'delayed', 'display_order' => 2]);
        $cancelled = $this->alert(['product_name' => 'Cancelled Product', 'pax' => null, 'eta' => '2030-01-02', 'status' => 'cancelled', 'display_order' => 3]);
        $onTime = $this->alert(['product_name' => 'On Time Product', 'eta' => '2026-10-20', 'status' => 'on_time', 'display_order' => 1]);
        $this->alert(['product_name' => 'Arrived Product', 'eta' => '2026-10-21', 'status' => 'arrived', 'display_order' => 4]);

        $response = $this->get(route('pre-order-alert.index'))
            ->assertOk()
            ->assertSeeInOrder(['On Time Product', 'Delayed Product', 'Cancelled Product', 'Arrived Product'])
            ->assertSee('20 Oct 2026')
            ->assertSee('25 Nov 2026')
            ->assertSee('bb-preorder-eta is-delayed', false)
            ->assertSee('bb-preorder-mobile-eta is-delayed', false)
            ->assertSee('Delayed')
            ->assertSee('Arrived')
            ->assertDontSee('K.Axxx')
            ->assertDontSee('K.Pxxx')
            ->assertDontSee('>PAX<', false)
            ->assertSee('—')
            ->assertDontSee('02 Jan 2030')
            ->assertDontSee('🇯🇵')
            ->assertDontSee('bb-preorder-flag', false)
            ->assertSee('vertical-align: middle;', false)
            ->assertSee('bb-preorder-mobile-item', false);

        $this->assertSame('2030-01-02', $cancelled->fresh()->eta->format('Y-m-d'));
        $this->assertSame('2026-11-25', $late->fresh()->eta->format('Y-m-d'));
        $this->assertSame('2026-10-20', $onTime->fresh()->eta->format('Y-m-d'));
    }

    public function test_user_entered_content_is_escaped(): void
    {
        $this->alert([
            'product_name' => '<script>alert("product")</script>'.str_repeat(' Long Product', 10),
            'remarks' => '<img src=x onerror=alert("remarks")>'.str_repeat(' Long remarks', 30),
        ]);

        $this->get(route('pre-order-alert.index'))
            ->assertOk()
            ->assertDontSee('<script>alert("product")</script>', false)
            ->assertDontSee('<img src=x onerror=alert("remarks")>', false)
            ->assertSee('&lt;script&gt;alert(&quot;product&quot;)&lt;/script&gt;', false)
            ->assertSee('&lt;img src=x onerror=alert(&quot;remarks&quot;)&gt;', false);
    }

    private function alert(array $overrides = []): PreOrderAlert
    {
        return PreOrderAlert::create(array_merge([
            'origin_country' => 'Japan',
            'product_name' => 'Test Product',
            'pax' => 'K.Pxxx',
            'eta' => '2026-11-25',
            'status' => 'on_time',
            'remarks' => 'Test remarks',
            'display_order' => 0,
        ], $overrides));
    }

    private function ensureFeatureTableExists(): void
    {
        if (Schema::hasTable('pre_order_alerts')) {
            return;
        }

        Schema::create('pre_order_alerts', function (Blueprint $table) {
            $table->id();
            $table->string('origin_country', 100);
            $table->string('product_name');
            $table->string('pax', 150)->nullable();
            $table->date('eta');
            $table->string('status', 20)->default('on_time');
            $table->text('remarks')->nullable();
            $table->unsignedInteger('display_order')->default(0);
            $table->timestamps();
        });
    }

    private function ensureSupportTablesExist(): void
    {
        if (! Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->foreignId('parent_id')->nullable();
                $table->boolean('active')->default(true);
                $table->timestamps();
            });
        }
    }
}
