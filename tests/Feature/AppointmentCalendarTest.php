<?php

namespace Tests\Feature;

use App\Http\Middleware\ComingSoon;
use App\Models\Appointment;
use App\Models\AppointmentScheduleOverride;
use App\Models\AppointmentSlot;
use App\Models\AppointmentType;
use App\Services\AppointmentSchedule;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class AppointmentCalendarTest extends TestCase
{
    use DatabaseTransactions;

    private AppointmentType $type;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware(ComingSoon::class);
        Carbon::setTestNow(Carbon::create(2026, 10, 6, 10, 0, 0, 'Asia/Bangkok'));
        $this->type = AppointmentType::create([
            'name' => 'Calendar test '.uniqid(),
            'active' => true,
        ]);
    }

    protected function tearDown(): void
    {
        Carbon::setTestNow();
        parent::tearDown();
    }

    public function test_page_renders_one_shared_calendar_component_in_two_modes(): void
    {
        $response = $this->get(route('appointments.create'));

        $response->assertOk()
            ->assertSee('data-booking-calendar', false)
            ->assertSee('data-calendar-mode="readonly"', false)
            ->assertSee('data-calendar-mode="selectable"', false)
            ->assertSee('SHOP-WIDE SCHEDULE')
            ->assertSee('SELECTED DATE')
            ->assertSee('SELECTED TIME')
            ->assertSee('OPEN')
            ->assertSee('CLOSED')
            ->assertSee('FULL')
            ->assertDontSee('TODAY');

        $this->assertSame(2, substr_count($response->getContent(), 'data-calendar-mode='));
        $this->assertSame(1, substr_count($response->getContent(), 'class BookingCalendar'));
    }

    public function test_schedule_distinguishes_open_closed_and_full_days(): void
    {
        AppointmentScheduleOverride::create([
            'override_date' => '2026-10-07',
            'status' => 'closed',
        ]);

        foreach (config('appointments.booking_times') as $time) {
            $slot = AppointmentSlot::create([
                'appointment_date' => '2026-10-08',
                'appointment_time' => $time,
                'active' => true,
            ]);
            Appointment::create([
                'appointment_type_id' => $this->type->id,
                'appointment_slot_id' => $slot->id,
                'reserved_slot_id' => $slot->id,
                'customer_name' => 'Calendar test',
                'phone' => '0000000000',
                'status' => 'pending',
            ]);
        }

        $statuses = app(AppointmentSchedule::class)
            ->availableDates()
            ->pluck('status', 'date');

        $this->assertSame('available', $statuses['2026-10-06']);
        $this->assertSame('closed', $statuses['2026-10-07']);
        $this->assertSame('full', $statuses['2026-10-08']);
        $this->assertSame('available', $statuses['2026-10-09']);
        $this->assertSame('closed', $statuses['2026-10-11']);
    }

    public function test_available_slots_accepts_active_service_and_keeps_response_compatible(): void
    {
        $this->getJson(route('appointments.available-slots', [
            'date' => '2026-10-09',
            'appointment_type_id' => $this->type->id,
        ]))
            ->assertOk()
            ->assertJsonCount(count(config('appointments.booking_times')), 'slots')
            ->assertJsonStructure(['slots' => [['id', 'time']]]);

        $inactive = AppointmentType::create([
            'name' => 'Inactive calendar test '.uniqid(),
            'active' => false,
        ]);

        $this->getJson(route('appointments.available-slots', [
            'date' => '2026-10-09',
            'appointment_type_id' => $inactive->id,
        ]))
            ->assertUnprocessable()
            ->assertJsonValidationErrors('appointment_type_id');
    }

    public function test_full_day_returns_no_times_and_closed_day_is_rejected(): void
    {
        foreach (config('appointments.booking_times') as $time) {
            $slot = AppointmentSlot::create([
                'appointment_date' => '2026-10-08',
                'appointment_time' => $time,
                'active' => true,
            ]);
            Appointment::create([
                'appointment_type_id' => $this->type->id,
                'appointment_slot_id' => $slot->id,
                'reserved_slot_id' => $slot->id,
                'customer_name' => 'Full day test',
                'phone' => '0000000000',
                'status' => 'pending',
            ]);
        }

        $this->getJson(route('appointments.available-slots', [
            'date' => '2026-10-08',
            'appointment_type_id' => $this->type->id,
        ]))->assertOk()->assertJsonCount(0, 'slots');

        $this->getJson(route('appointments.available-slots', [
            'date' => '2026-10-11',
            'appointment_type_id' => $this->type->id,
        ]))->assertUnprocessable()->assertJsonValidationErrors('date');
    }
}
