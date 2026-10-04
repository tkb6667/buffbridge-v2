<?php

namespace App\Services;

use App\Models\AppointmentScheduleOverride;
use App\Models\AppointmentSlot;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class AppointmentSchedule
{
    public function availableDates(): Collection
    {
        $dates = collect();

        $firstDate = today()->startOfDay();
        $lastDate = $this->bookingWindowEnd();

        $overrides = AppointmentScheduleOverride::query()
            ->whereBetween('override_date', [
                $firstDate->toDateString(),
                $lastDate->toDateString(),
            ])
            ->pluck('status', 'override_date');

        $bookedTimes = AppointmentSlot::query()
            ->whereBetween('appointment_date', [
                $firstDate->toDateString(),
                $lastDate->toDateString(),
            ])
            ->whereHas('reservation')
            ->get([
                'appointment_date',
                'appointment_time',
            ])
            ->groupBy(
                fn (AppointmentSlot $slot) =>
                    $slot->appointment_date->toDateString()
            )
            ->map(
                fn (Collection $slots) =>
                    $slots
                        ->pluck('appointment_time')
                        ->map(
                            fn ($time) =>
                                substr((string) $time, 0, 5)
                        )
            );

        for (
            $date = $firstDate->copy();
            $date->lte($lastDate);
            $date->addDay()
        ) {
            $dateString = $date->toDateString();

            $isOpen = $this->isOpenDate(
                $date,
                $overrides->get($dateString)
            );

            $availableTimes = $isOpen
                ? $this
                    ->configuredTimesForDate($dateString)
                    ->reject(
                        fn (string $time) =>
                            $bookedTimes
                                ->get($dateString, collect())
                                ->contains($time)
                    )
                : collect();

            $dates->push([
                'date' => $dateString,

                'status' => ! $isOpen
                    ? 'closed'
                    : (
                        $availableTimes->isEmpty()
                            ? 'full'
                            : 'available'
                    ),
            ]);
        }

        return $dates;
    }

    public function availableTimes(string $date): Collection
    {
        try {
            $bookingDate = Carbon::createFromFormat(
                'Y-m-d',
                $date
            )->startOfDay();
        } catch (\Throwable) {
            return collect();
        }

        if (
            ! $this->isWithinBookingWindow($bookingDate) ||
            ! $this->isBookableDate($bookingDate)
        ) {
            return collect();
        }

        return $this->configuredTimesForDate($date);
    }

    public function isBookableDate(Carbon $date): bool
    {
        $override = AppointmentScheduleOverride::query()
            ->whereDate(
                'override_date',
                $date->toDateString()
            )
            ->value('status');

        return $this->isOpenDate(
            $date,
            $override
        );
    }

    public function isBookableDateString(string $date): bool
    {
        try {
            $bookingDate = Carbon::createFromFormat(
                'Y-m-d',
                $date
            )->startOfDay();
        } catch (\Throwable) {
            return false;
        }

        return $bookingDate->toDateString() === $date
            && $this->isWithinBookingWindow($bookingDate)
            && $this->isBookableDate($bookingDate);
    }

    public function isBookableSlot(
        string $date,
        string $time
    ): bool {
        return $this->isBookableDateString($date)
            && in_array(
                $time,
                config('appointments.booking_times', []),
                true
            )
            && Carbon::createFromFormat(
                'Y-m-d H:i',
                $date.' '.$time
            )->isFuture();
    }

    private function isOpenDate(
        Carbon $date,
        ?string $override
    ): bool {
        /*
         * Special Day Override has priority
         * over the normal weekly schedule.
         */
        if ($override !== null) {
            return $override === 'open';
        }

        return in_array(
            $date->dayOfWeekIso,
            config('appointments.booking_weekdays', []),
            true
        );
    }

    private function configuredTimesForDate(
        string $date
    ): Collection {
        return collect(
            config('appointments.booking_times', [])
        )
            ->filter(
                fn (string $time) =>
                    Carbon::createFromFormat(
                        'Y-m-d H:i',
                        $date.' '.$time
                    )->isFuture()
            )
            ->values();
    }

    private function isWithinBookingWindow(
        Carbon $date
    ): bool {
        $bookingDate = $date->copy()->startOfDay();

        return ! $bookingDate->isBefore(today())
            && ! $bookingDate->isAfter(
                $this->bookingWindowEnd()
            );
    }

    private function bookingWindowEnd(): Carbon
    {
        $months = max(
            1,
            (int) config(
                'appointments.booking_window_months',
                3
            )
        );

        return today()
            ->addMonthsNoOverflow($months)
            ->startOfDay();
    }
}