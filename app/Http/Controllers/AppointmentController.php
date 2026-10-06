<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentSlot;
use App\Models\AppointmentType;
use App\Services\AppointmentSchedule;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    public function create(AppointmentSchedule $schedule): View
    {
        $appointmentTypes = AppointmentType::query()
            ->where('active', true)
            ->orderBy('name')
            ->get(['id', 'name']);

        $availableDates = $schedule->availableDates();

        return view('appointments.create', compact('appointmentTypes', 'availableDates'));
    }

    public function availableSlots(Request $request, AppointmentSchedule $schedule): JsonResponse
    {
        $appointmentToday = now(
            config('appointments.timezone')
        )->toDateString();

        $validated = $request->validate([
            'date' => ['required', 'date_format:Y-m-d', 'after_or_equal:'.$appointmentToday],
        ]);

        $availableTimes = $schedule->availableTimes($validated['date']);

        if (! $schedule->isBookableDateString($validated['date'])) {
            throw ValidationException::withMessages([
                'date' => 'Appointments are closed on the selected date.',
            ]);
        }

        $bookedTimes = AppointmentSlot::query()
            ->whereDate('appointment_date', $validated['date'])
            ->whereHas('reservation')
            ->pluck('appointment_time')
            ->map(fn ($time) => substr((string) $time, 0, 5));

        $slots = $availableTimes
            ->reject(fn (string $time) => $bookedTimes->contains($time))
            ->map(fn (string $time) => ['id' => $time, 'time' => $time])
            ->values();

        return response()->json(['slots' => $slots]);
    }

    public function store(Request $request, AppointmentSchedule $schedule): RedirectResponse
    {
        $appointmentToday = now(
            config('appointments.timezone')
        )->toDateString();

        $validated = $request->validate([
            'appointment_type_id' => [
                'required',
                'integer',
                Rule::exists('appointment_types', 'id')->where('active', true),
            ],
            'appointment_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:'.$appointmentToday],
            'appointment_time' => ['required', 'date_format:H:i'],
            'customer_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'comment' => ['nullable', 'string', 'max:2000'],
        ]);

        if (! $schedule->isBookableSlot($validated['appointment_date'], $validated['appointment_time'])) {
            throw ValidationException::withMessages([
                'appointment_time' => 'Appointments are available Tuesday through Saturday from 12:00 to 17:00 in one-hour intervals.',
            ]);
        }

        try {
            $appointment = DB::transaction(function () use ($validated) {
                $type = AppointmentType::query()
                    ->lockForUpdate()
                    ->find($validated['appointment_type_id']);

                if (! $type || ! $type->active) {
                    throw ValidationException::withMessages([
                        'appointment_type_id' => 'The selected appointment type is no longer available.',
                    ]);
                }

                $slot = AppointmentSlot::query()->createOrFirst(
                    [
                        'appointment_date' => $validated['appointment_date'],
                        'appointment_time' => $validated['appointment_time'],
                    ],
                    ['active' => true]
                );

                $slot = AppointmentSlot::query()->lockForUpdate()->findOrFail($slot->id);

                if (Appointment::where('reserved_slot_id', $slot->id)->exists()) {
                    throw ValidationException::withMessages([
                        'appointment_time' => 'The selected appointment slot has already been booked.',
                    ]);
                }

                return Appointment::create([
                    'appointment_type_id' => $type->id,
                    'appointment_slot_id' => $slot->id,
                    'reserved_slot_id' => $slot->id,
                    'customer_name' => $validated['customer_name'],
                    'phone' => $validated['phone'],
                    'comment' => $validated['comment'] ?? null,
                    'status' => 'pending',
                ]);
            }, 3);
        } catch (QueryException $exception) {
            if (($exception->errorInfo[1] ?? null) === 1062) {
                throw ValidationException::withMessages([
                    'appointment_time' => 'The selected appointment slot has already been booked.',
                ]);
            }

            throw $exception;
        }

        return redirect()
            ->route('appointments.create')
            ->with('success', 'Appointment booked successfully. Reference #'.$appointment->id);
    }
}
