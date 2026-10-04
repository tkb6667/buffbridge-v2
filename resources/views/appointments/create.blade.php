@php
    $appointmentWeekOptions = [];

    foreach (collect($availableDates)->values()->chunk(7) as $weekIndex => $weekDates) {
        if ($weekDates->isEmpty()) {
            continue;
        }

        $firstTimestamp = strtotime($weekDates->first()['date']);
        $lastTimestamp = strtotime($weekDates->last()['date']);

        $appointmentWeekOptions[(string) $weekIndex] =
            strtoupper(date('d M', $firstTimestamp))
            . ' - '
            . strtoupper(date('d M Y', $lastTimestamp));
    }
@endphp

<x-guest-layout>
    <x-slot name="style">
        <style>
            .bb-booking,
            .bb-booking * {
                box-sizing: border-box;
            }

            .bb-booking {
                --yellow: #ffd21c;
                --black: #111;
                --line: #d9d9d9;
                --soft: #f5f5f5;
                --muted: #8b8b8b;
                min-height: 100vh;
                background: #f5f5f5;
                color: #111;
                font-family: Arial, Helvetica, sans-serif;
            }

            .bb-booking button,
            .bb-booking input,
            .bb-booking textarea,
            .bb-booking select {
                font-family: inherit;
            }

            /* HERO */
            .bb-booking-hero {
                background: #0b0b0b;
                border-bottom: 3px solid var(--yellow);
            }

            .bb-booking-hero-inner {
                width: min(1000px, calc(100% - 40px));
                min-height: 120px;
                margin: auto;
                padding: 24px 0;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 30px;
            }

            .bb-booking-eyebrow {
                margin-bottom: 7px;
                color: var(--yellow);
                font-size: 9px;
                font-weight: 900;
                letter-spacing: 1.8px;
            }

            .bb-booking-hero h1 {
                margin: 0 !important;
                color: #fff !important;
                font-size: clamp(28px, 4vw, 40px) !important;
                line-height: 1 !important;
                font-weight: 900 !important;
                font-style: italic !important;
            }

            .bb-booking-hero h1 span {
                color: var(--yellow);
            }

            .bb-booking-hero p {
                margin: 8px 0 0 !important;
                color: #888 !important;
                font-size: 11px !important;
            }

            .bb-booking-breadcrumb {
                display: flex;
                align-items: center;
                gap: 8px;
                color: #666;
                font-size: 8px;
                font-weight: 900;
                letter-spacing: 1px;
            }

            .bb-booking-breadcrumb a {
                color: #fff !important;
                text-decoration: none !important;
            }

            .bb-booking-breadcrumb strong {
                color: var(--yellow);
            }

            /* PAGE */
            .bb-booking-main {
                padding: 26px 0 48px;
            }

            .bb-booking-shell {
                width: min(900px, calc(100% - 40px));
                margin: auto;
            }

            /* MESSAGE */
            .bb-booking-message {
                margin-bottom: 12px;
                padding: 12px 15px;
                background: #fff;
                border: 1px solid var(--line);
                border-left: 4px solid var(--yellow);
                font-size: 11px;
                line-height: 1.6;
            }

            .bb-booking-message.error {
                border-left-color: #d33;
                color: #a22;
            }

            .bb-booking-message ul {
                margin: 0;
                padding-left: 18px;
            }

            /* PROGRESS */
            .bb-booking-progress {
                position: relative;
                margin-bottom: 10px;
                padding: 13px 20px 11px;
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                background: #fff;
                border: 1px solid var(--line);
            }

            .bb-booking-progress::before {
                content: "";
                position: absolute;
                top: 29px;
                left: 16.66%;
                right: 16.66%;
                height: 1px;
                background: #ddd;
            }

            .bb-progress-item {
                position: relative;
                z-index: 2;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .bb-progress-number {
                width: 32px;
                height: 32px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: #fff;
                border: 1px solid #d8d8d8;
                color: #999;
                font-size: 8px;
                font-weight: 900;
            }

            .bb-progress-label {
                margin-top: 5px;
                color: #999;
                font-size: 7px;
                font-weight: 900;
                letter-spacing: .7px;
            }

            .bb-progress-item.active .bb-progress-number {
                background: var(--yellow);
                border-color: var(--yellow);
                color: #111;
            }

            .bb-progress-item.active .bb-progress-label {
                color: #111;
            }

            .bb-progress-item.completed .bb-progress-number {
                background: #111;
                border-color: #111;
                color: var(--yellow);
            }

            .bb-progress-item.completed .bb-progress-label {
                color: #555;
            }

            /* CARD */
            .bb-booking-card {
                position: relative;
                min-height: 330px;
                padding: 26px 28px 23px;
                background: #fff;
                border: 1px solid var(--line);
            }

            .bb-booking-card::before {
                content: "";
                position: absolute;
                top: -1px;
                left: -1px;
                width: 60px;
                height: 4px;
                background: var(--yellow);
            }

            /* STEP */
            .bb-step {
                display: none;
            }

            .bb-step.active {
                display: block;
            }

            .bb-step-heading {
                margin-bottom: 20px;
            }

            .bb-step-kicker {
                margin-bottom: 5px;
                color: #9d7c00;
                font-size: 8px;
                font-weight: 900;
                letter-spacing: 1.6px;
            }

            .bb-step-heading h2 {
                margin: 0 !important;
                color: #111 !important;
                font-size: clamp(22px, 3vw, 29px) !important;
                line-height: 1 !important;
                font-weight: 900 !important;
                font-style: italic;
            }

            .bb-step-heading p {
                margin: 7px 0 0 !important;
                color: #888 !important;
                font-size: 10px !important;
            }

            .bb-field {
                margin-bottom: 15px;
            }

            .bb-field label,
            .bb-field-label {
                display: block;
                margin-bottom: 7px;
                color: #555;
                font-size: 8px;
                font-weight: 900;
                letter-spacing: 1.1px;
            }

            .bb-required {
                color: #b38d00;
            }

            /* SERVICE */
            .bb-service-options {
                display: grid;
                grid-template-columns: 1fr;
                gap: 9px;
            }

            .bb-service-option {
                width: 100%;
                min-height: 62px;
                padding: 9px 14px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 14px;
                background: #fff !important;
                border: 1px solid #d8d8d8 !important;
                border-radius: 0 !important;
                color: #111 !important;
                text-align: left;
                cursor: pointer;
                box-shadow: none !important;
            }

            .bb-service-option:hover {
                border-color: #999 !important;
            }

            .bb-service-option.active {
                border-color: #111 !important;
                box-shadow: inset 4px 0 0 var(--yellow) !important;
            }

            .bb-service-option-left {
                min-width: 0;
                display: flex;
                align-items: center;
                gap: 13px;
            }

            .bb-service-number {
                width: 34px;
                height: 34px;
                flex: 0 0 34px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: var(--yellow) !important;
                color: #111 !important;
                font-size: 8px;
                font-weight: 900;
            }

            .bb-service-name {
                color: #222 !important;
                font-size: 11px;
                line-height: 1.4;
                font-weight: 900;
                text-transform: uppercase;
            }

            .bb-service-check {
                width: 26px;
                height: 26px;
                flex: 0 0 26px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: #fff !important;
                border: 1px solid #cfcfcf !important;
                color: transparent !important;
            }

            .bb-service-check svg {
                width: 13px;
                height: 13px;
                fill: none;
                stroke: currentColor;
                stroke-width: 2.7;
                stroke-linecap: round;
                stroke-linejoin: round;
            }

            .bb-service-option.active .bb-service-check {
                background: var(--yellow) !important;
                border-color: var(--yellow) !important;
                color: #111 !important;
            }

            /* WEEK DROPDOWN */
            .bb-week-selector {
                margin-bottom: 14px;
            }

            .bb-week-selector .bb-field-label {
                margin-bottom: 7px;
            }

            .bb-week-dropdown {
                width: 100%;
                max-width: 390px;
            }

            .bb-date-section {
                margin-bottom: 22px;
            }

            /* DATE CARDS */
            .bb-date-options {
                display: grid;
                grid-template-columns: repeat(7, minmax(0, 1fr));
                gap: 7px;
            }

            .bb-date-button {
                position: relative;
                min-width: 0;
                min-height: 112px;
                padding: 12px 5px 10px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                background: #fff !important;
                border: 1px solid #d7d7d7 !important;
                border-radius: 0 !important;
                color: #111 !important;
                cursor: pointer;
                overflow: hidden;
            }

            .bb-date-button:hover:not(:disabled) {
                border-color: #888 !important;
            }

            .bb-date-button.active {
                border-color: #111 !important;
                box-shadow: inset 0 -4px 0 var(--yellow) !important;
            }

            .bb-date-button.active::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 3px;
                background: var(--yellow);
            }

            .bb-date-day {
                margin-bottom: 5px;
                color: #999;
                font-size: 7px;
                font-weight: 900;
                letter-spacing: 1px;
            }

            .bb-date-number {
                color: #111;
                font-size: 25px;
                line-height: 1;
                font-weight: 900;
            }

            .bb-date-month {
                margin-top: 3px;
                color: #555;
                font-size: 7px;
                font-weight: 900;
                letter-spacing: .8px;
            }

            .bb-date-status {
                margin-top: 9px;
                color: #8b6c00;
                font-size: 6.5px;
                font-weight: 900;
                letter-spacing: .7px;
            }

            .bb-date-button:disabled {
                background: #f1f1f1 !important;
                border-color: #e0e0e0 !important;
                cursor: not-allowed;
                opacity: 1;
            }

            .bb-date-button:disabled .bb-date-day,
            .bb-date-button:disabled .bb-date-number,
            .bb-date-button:disabled .bb-date-month,
            .bb-date-button:disabled .bb-date-status {
                color: #aaa !important;
            }

            .bb-date-button[data-status="full"] .bb-date-status {
                color: #999 !important;
            }

            .bb-date-hidden {
                display: none !important;
            }

            /* TIME */
            .bb-time-section {
                margin-top: 4px;
            }

            .bb-time-header {
                margin-bottom: 9px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 15px;
            }

            .bb-time-header .bb-field-label {
                margin: 0;
            }

            .bb-time-status {
                color: #999;
                font-size: 8px;
                font-weight: 900;
            }

            .bb-time-options {
                display: grid;
                grid-template-columns: repeat(6, 1fr);
                gap: 8px;
            }

            .bb-time-button {
                min-height: 48px;
                padding: 0 8px;
                background: #fff !important;
                border: 1px solid #d8d8d8 !important;
                border-radius: 0 !important;
                color: #111 !important;
                font-size: 10px;
                font-weight: 900;
                cursor: pointer;
            }

            .bb-time-button:hover {
                border-color: #888 !important;
            }

            .bb-time-button.active {
                background: var(--yellow) !important;
                border-color: #111 !important;
            }

            .bb-time-empty {
                grid-column: 1 / -1;
                padding: 17px;
                background: #fafafa;
                border: 1px solid #e5e5e5;
                color: #999;
                font-size: 10px;
                text-align: center;
            }

            #appointmentSlotMessage {
                margin: 8px 0 0 !important;
                color: #a33 !important;
                font-size: 9px !important;
            }

            /* DETAILS */
            .bb-fields-two {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 12px;
            }

            .bb-field input,
            .bb-field textarea {
                width: 100% !important;
                max-width: none !important;
                margin: 0 !important;
                background: #fff !important;
                border: 1px solid #d8d8d8 !important;
                border-radius: 0 !important;
                color: #111 !important;
                font-size: 13px !important;
                font-weight: 600 !important;
                outline: none !important;
                box-shadow: none !important;
            }

            .bb-field input {
                height: 48px !important;
                padding: 0 14px !important;
            }

            .bb-field textarea {
                min-height: 82px !important;
                padding: 12px 14px !important;
                resize: vertical;
            }

            .bb-field input:focus,
            .bb-field textarea:focus {
                border-color: #111 !important;
            }

            /* SUMMARY */
            .bb-selection-summary {
                margin-bottom: 17px;
                padding: 10px;
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 8px;
                background: #fafafa;
                border: 1px solid #e5e5e5;
            }

            .bb-summary-chip {
                min-height: 44px;
                padding: 8px 10px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                gap: 3px;
                background: #fff;
                border: 1px solid #ddd;
                color: #999;
                font-size: 7px;
                font-weight: 900;
                letter-spacing: .7px;
            }

            .bb-summary-chip strong {
                color: #111;
                font-size: 10px;
                font-weight: 900;
                letter-spacing: 0;
            }

            /* HIDDEN REAL FIELDS */
            .bb-native-booking-select {
                position: absolute !important;
                width: 1px !important;
                height: 1px !important;
                padding: 0 !important;
                margin: -1px !important;
                overflow: hidden !important;
                clip: rect(0, 0, 0, 0) !important;
                clip-path: inset(50%) !important;
                white-space: nowrap !important;
                border: 0 !important;
            }

            /* ACTIONS */
            .bb-step-actions {
                margin-top: 20px;
                padding-top: 16px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 10px;
                border-top: 1px solid #eee;
            }

            .bb-action-spacer {
                flex: 1;
            }

            .bb-btn {
                min-height: 44px;
                padding: 0 18px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 9px;
                border-radius: 0 !important;
                font-size: 9px;
                font-weight: 900;
                letter-spacing: .7px;
                cursor: pointer;
            }

            .bb-btn svg {
                width: 14px;
                height: 14px;
                fill: none;
                stroke: currentColor;
                stroke-width: 2;
            }

            .bb-btn-primary {
                min-width: 155px;
                background: var(--yellow);
                border: 1px solid var(--yellow);
                color: #111;
            }

            .bb-btn-primary:hover {
                background: #111;
                border-color: #111;
                color: #fff;
            }

            .bb-btn-secondary {
                background: #fff;
                border: 1px solid #d8d8d8;
                color: #666;
            }

            .bb-btn-secondary:hover {
                border-color: #111;
                color: #111;
            }

            .bb-step-error {
                display: none;
                margin: 9px 0 0;
                color: #b22;
                font-size: 9px;
                font-weight: 700;
            }

            .bb-step-error.show {
                display: block;
            }

            /* DIALOG */
            .bb-confirm-dialog {
                width: min(500px, calc(100% - 30px));
                max-height: calc(100vh - 30px);
                margin: auto;
                padding: 0;
                overflow: auto;
                background: #fff;
                border: 0;
                border-radius: 0;
                color: #111;
            }

            .bb-confirm-dialog::backdrop {
                background: rgba(0, 0, 0, .78);
            }

            .bb-confirm-head {
                position: relative;
                padding: 21px 24px 18px;
                background: #111;
            }

            .bb-confirm-head::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 60px;
                height: 4px;
                background: var(--yellow);
            }

            .bb-confirm-kicker {
                margin-bottom: 5px;
                color: var(--yellow);
                font-size: 8px;
                font-weight: 900;
                letter-spacing: 1.5px;
            }

            .bb-confirm-head h2 {
                margin: 0 !important;
                color: #fff !important;
                font-size: 23px !important;
                font-weight: 900 !important;
            }

            .bb-confirm-head p {
                margin: 7px 0 0 !important;
                color: #888 !important;
                font-size: 10px !important;
            }

            .bb-confirm-body {
                padding: 15px 24px 4px;
            }

            .bb-confirm-list {
                margin: 0;
            }

            .bb-confirm-row {
                padding: 9px 0;
                display: grid;
                grid-template-columns: 125px 1fr;
                gap: 15px;
                border-bottom: 1px solid #eee;
            }

            .bb-confirm-row dt {
                margin: 0;
                color: #999;
                font-size: 8px;
                font-weight: 900;
            }

            .bb-confirm-row dd {
                margin: 0;
                color: #111;
                font-size: 11px;
                font-weight: 800;
                overflow-wrap: anywhere;
            }

            .bb-confirm-actions {
                padding: 17px 24px 21px;
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 8px;
            }

            .bb-confirm-button {
                min-height: 44px;
                border-radius: 0;
                font-size: 9px;
                font-weight: 900;
                cursor: pointer;
            }

            .bb-confirm-cancel {
                background: #fff;
                border: 1px solid #ddd;
                color: #666;
            }

            .bb-confirm-submit {
                background: var(--yellow);
                border: 1px solid var(--yellow);
                color: #111;
            }

            /* TABLET */
            @media (max-width: 850px) {
                .bb-booking-shell,
                .bb-booking-hero-inner {
                    width: calc(100% - 30px);
                }

                .bb-date-options {
                    grid-template-columns: repeat(4, 1fr);
                }

                .bb-time-options {
                    grid-template-columns: repeat(3, 1fr);
                }
            }

            /* MOBILE */
            @media (max-width: 600px) {
                .bb-booking-hero-inner {
                    min-height: 105px;
                    padding: 19px 0;
                    display: block;
                }

                .bb-booking-breadcrumb {
                    display: none;
                }

                .bb-booking-hero h1 {
                    font-size: 27px !important;
                }

                .bb-booking-main {
                    padding: 15px 0 30px;
                }

                .bb-booking-progress {
                    padding: 11px 7px 10px;
                }

                .bb-booking-progress::before {
                    top: 27px;
                }

                .bb-progress-number {
                    width: 30px;
                    height: 30px;
                }

                .bb-booking-card {
                    min-height: 0;
                    padding: 20px 14px 16px;
                }

                .bb-step-heading h2 {
                    font-size: 21px !important;
                }

                .bb-service-option {
                    min-height: 60px;
                    padding: 8px 11px;
                }

                .bb-date-options {
                    grid-template-columns: repeat(2, 1fr);
                }

                .bb-date-button {
                    min-height: 100px;
                }

                .bb-date-number {
                    font-size: 23px;
                }

                .bb-time-options {
                    grid-template-columns: repeat(2, 1fr);
                }

                .bb-fields-two,
                .bb-selection-summary {
                    grid-template-columns: 1fr;
                }

                .bb-field input,
                .bb-field textarea {
                    font-size: 16px !important;
                }

                .bb-btn {
                    min-height: 44px;
                    padding: 0 13px;
                }

                .bb-btn-primary {
                    flex: 1;
                    min-width: 0;
                }

                .bb-confirm-dialog {
                    width: calc(100% - 20px);
                    max-height: calc(100dvh - 20px);
                }

                .bb-confirm-head,
                .bb-confirm-body,
                .bb-confirm-actions {
                    padding-left: 17px;
                    padding-right: 17px;
                }

                .bb-confirm-row {
                    grid-template-columns: 95px 1fr;
                    gap: 9px;
                }
            }
        </style>
    </x-slot>

    <main class="bb-booking">

        <section class="bb-booking-hero">
            <div class="bb-booking-hero-inner">
                <div>
                    <div class="bb-booking-eyebrow">
                        BUFFBRIDGE CUSTOM CREW
                    </div>

                    <h1>
                        BOOK AN <span>APPOINTMENT</span>
                    </h1>

                    <p>
                        Choose a service, reserve your time and confirm your booking.
                    </p>
                </div>

                <div class="bb-booking-breadcrumb">
                    <a href="{{ url('/') }}">HOME</a>
                    <span>/</span>
                    <strong>APPOINTMENT</strong>
                </div>
            </div>
        </section>

        <section class="bb-booking-main">
            <div class="bb-booking-shell">

                @if(session('success'))
                    <div class="bb-booking-message" role="status">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bb-booking-message error" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="bb-booking-progress">
                    <div class="bb-progress-item active" data-progress="1">
                        <div class="bb-progress-number">01</div>
                        <div class="bb-progress-label">SERVICE</div>
                    </div>

                    <div class="bb-progress-item" data-progress="2">
                        <div class="bb-progress-number">02</div>
                        <div class="bb-progress-label">DATE & TIME</div>
                    </div>

                    <div class="bb-progress-item" data-progress="3">
                        <div class="bb-progress-number">03</div>
                        <div class="bb-progress-label">YOUR DETAILS</div>
                    </div>
                </div>

                <form
                    id="appointmentBookingForm"
                    method="POST"
                    action="{{ route('appointments.store', absolute: false) }}"
                >
                    @csrf

                    <div class="bb-booking-card">

                        {{-- STEP 01 --}}
                        <section class="bb-step active" data-step="1">

                            <div class="bb-step-heading">
                                <div class="bb-step-kicker">STEP 01</div>
                                <h2>WHAT WOULD YOU LIKE TO BOOK?</h2>
                                <p>Choose the appointment type that best matches your visit.</p>
                            </div>

                            <select
                                id="appointment_type_id"
                                name="appointment_type_id"
                                class="bb-native-booking-select"
                                required
                            >
                                <option value="">Select appointment type</option>

                                @foreach($appointmentTypes as $type)
                                    <option
                                        value="{{ $type->id }}"
                                        @selected(
                                            (string) old('appointment_type_id') ===
                                            (string) $type->id
                                        )
                                    >
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>

                            <div class="bb-field">
                                <div class="bb-field-label">
                                    APPOINTMENT TYPE
                                    <span class="bb-required">*</span>
                                </div>

                                <div class="bb-service-options">
                                    @foreach($appointmentTypes as $type)
                                        <button
                                            type="button"
                                            class="bb-service-option {{
                                                (string) old('appointment_type_id') ===
                                                (string) $type->id
                                                    ? 'active'
                                                    : ''
                                            }}"
                                            data-service-id="{{ $type->id }}"
                                        >
                                            <span class="bb-service-option-left">
                                                <span class="bb-service-number">
                                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                                </span>

                                                <span class="bb-service-name">
                                                    {{ $type->name }}
                                                </span>
                                            </span>

                                            <span class="bb-service-check">
                                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                                    <path d="m5 12 4 4L19 6"></path>
                                                </svg>
                                            </span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>

                            <p class="bb-step-error" id="step1Error">
                                Please select an appointment type.
                            </p>

                            <div class="bb-step-actions">
                                <div class="bb-action-spacer"></div>

                                <button
                                    type="button"
                                    class="bb-btn bb-btn-primary"
                                    data-next="2"
                                >
                                    CONTINUE

                                    <svg viewBox="0 0 24 24">
                                        <path d="M5 12h14"></path>
                                        <path d="m13 6 6 6-6 6"></path>
                                    </svg>
                                </button>
                            </div>

                        </section>

                        {{-- STEP 02 --}}
                        <section class="bb-step" data-step="2">

                            <div class="bb-step-heading">
                                <div class="bb-step-kicker">STEP 02</div>
                                <h2>CHOOSE DATE & TIME</h2>
                                <p>Select your preferred booking date and available time.</p>
                            </div>

                            <select
                                id="appointment_date"
                                name="appointment_date"
                                class="bb-native-booking-select"
                                required
                            >
                                <option value="">Select date</option>

                                @foreach($availableDates as $dateOption)
                                    <option
                                        value="{{ $dateOption['date'] }}"
                                        @disabled($dateOption['status'] !== 'available')
                                        @selected(old('appointment_date') === $dateOption['date'])
                                    >
                                        {{ $dateOption['date'] }}
                                        —
                                        {{ strtoupper($dateOption['status']) }}
                                    </option>
                                @endforeach
                            </select>

                            <div class="bb-date-section">

                                <div class="bb-week-selector">
                                    <div class="bb-field-label">SELECT WEEK</div>

                                    <x-bb-dropdown
                                        name="appointment_week"
                                        :options="$appointmentWeekOptions"
                                        value="0"
                                        :placeholder="$appointmentWeekOptions['0'] ?? 'SELECT WEEK'"
                                        class="bb-week-dropdown"
                                    />
                                </div>

                                <div class="bb-field-label">
                                    AVAILABLE DATE
                                    <span class="bb-required">*</span>
                                </div>

                                <div
                                    class="bb-date-options"
                                    id="appointmentDateOptions"
                                >
                                    @foreach($availableDates as $dateOption)
                                        @php
                                            $dateTimestamp = strtotime($dateOption['date']);
                                        @endphp

                                        <button
                                            type="button"
                                            class="bb-date-button {{
                                                old('appointment_date') === $dateOption['date'] &&
                                                $dateOption['status'] === 'available'
                                                    ? 'active'
                                                    : ''
                                            }}"
                                            data-date="{{ $dateOption['date'] }}"
                                            data-status="{{ $dateOption['status'] }}"
                                            data-index="{{ $loop->index }}"
                                            data-week="{{ intdiv($loop->index, 7) }}"
                                            @disabled($dateOption['status'] !== 'available')
                                        >
                                            <span class="bb-date-day">
                                                {{ strtoupper(date('D', $dateTimestamp)) }}
                                            </span>

                                            <span class="bb-date-number">
                                                {{ date('d', $dateTimestamp) }}
                                            </span>

                                            <span class="bb-date-month">
                                                {{ strtoupper(date('M', $dateTimestamp)) }}
                                            </span>

                                            <span class="bb-date-status">
                                                {{ strtoupper($dateOption['status']) }}
                                            </span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>

                            <select
                                id="appointment_slot_id"
                                name="appointment_time"
                                class="bb-native-booking-select"
                                data-old-value="{{ old('appointment_time') }}"
                                required
                                disabled
                            >
                                <option value="">Select a date first</option>
                            </select>

                            <div class="bb-time-section">
                                <div class="bb-time-header">
                                    <div class="bb-field-label">
                                        AVAILABLE TIME
                                        <span class="bb-required">*</span>
                                    </div>

                                    <div
                                        class="bb-time-status"
                                        id="appointmentTimeStatus"
                                    >
                                        SELECT A DATE FIRST
                                    </div>
                                </div>

                                <div
                                    class="bb-time-options"
                                    id="appointmentTimeOptions"
                                >
                                    <div class="bb-time-empty">
                                        Select a date to view available times.
                                    </div>
                                </div>

                                <p
                                    id="appointmentSlotMessage"
                                    role="status"
                                ></p>
                            </div>

                            <p class="bb-step-error" id="step2Error">
                                Please select both a date and available time.
                            </p>

                            <div class="bb-step-actions">
                                <button
                                    type="button"
                                    class="bb-btn bb-btn-secondary"
                                    data-back="1"
                                >
                                    <svg viewBox="0 0 24 24">
                                        <path d="M19 12H5"></path>
                                        <path d="m11 18-6-6 6-6"></path>
                                    </svg>

                                    BACK
                                </button>

                                <button
                                    type="button"
                                    class="bb-btn bb-btn-primary"
                                    data-next="3"
                                >
                                    CONTINUE

                                    <svg viewBox="0 0 24 24">
                                        <path d="M5 12h14"></path>
                                        <path d="m13 6 6 6-6 6"></path>
                                    </svg>
                                </button>
                            </div>

                        </section>

                        {{-- STEP 03 --}}
                        <section class="bb-step" data-step="3">

                            <div class="bb-step-heading">
                                <div class="bb-step-kicker">STEP 03</div>
                                <h2>YOUR DETAILS</h2>
                                <p>Enter your contact information to finish the booking.</p>
                            </div>

                            <div class="bb-selection-summary">
                                <div class="bb-summary-chip">
                                    SERVICE
                                    <strong id="summaryService">-</strong>
                                </div>

                                <div class="bb-summary-chip">
                                    DATE
                                    <strong id="summaryDate">-</strong>
                                </div>

                                <div class="bb-summary-chip">
                                    TIME
                                    <strong id="summaryTime">-</strong>
                                </div>
                            </div>

                            <div class="bb-fields-two">
                                <div class="bb-field">
                                    <label for="customer_name">
                                        NAME
                                        <span class="bb-required">*</span>
                                    </label>

                                    <input
                                        id="customer_name"
                                        name="customer_name"
                                        type="text"
                                        value="{{ old('customer_name') }}"
                                        placeholder="Your name"
                                        maxlength="255"
                                        autocomplete="name"
                                        required
                                    >
                                </div>

                                <div class="bb-field">
                                    <label for="phone">
                                        PHONE
                                        <span class="bb-required">*</span>
                                    </label>

                                    <input
                                        id="phone"
                                        name="phone"
                                        type="tel"
                                        value="{{ old('phone') }}"
                                        placeholder="Phone number"
                                        maxlength="50"
                                        autocomplete="tel"
                                        inputmode="tel"
                                        required
                                    >
                                </div>
                            </div>

                            <div class="bb-field">
                                <label for="comment">
                                    COMMENT
                                </label>

                                <textarea
                                    id="comment"
                                    name="comment"
                                    maxlength="2000"
                                    placeholder="Additional information (optional)"
                                >{{ old('comment') }}</textarea>
                            </div>

                            <div class="bb-step-actions">
                                <button
                                    type="button"
                                    class="bb-btn bb-btn-secondary"
                                    data-back="2"
                                >
                                    <svg viewBox="0 0 24 24">
                                        <path d="M19 12H5"></path>
                                        <path d="m11 18-6-6 6-6"></path>
                                    </svg>

                                    BACK
                                </button>

                                <button
                                    type="submit"
                                    class="bb-btn bb-btn-primary"
                                >
                                    REVIEW BOOKING

                                    <svg viewBox="0 0 24 24">
                                        <path d="M5 12h14"></path>
                                        <path d="m13 6 6 6-6 6"></path>
                                    </svg>
                                </button>
                            </div>

                        </section>

                    </div>
                </form>
            </div>
        </section>

        {{-- CONFIRM --}}
        <dialog
            id="appointmentConfirmation"
            class="bb-confirm-dialog"
        >
            <div class="bb-confirm-head">
                <div class="bb-confirm-kicker">
                    FINAL CHECK
                </div>

                <h2>CONFIRM APPOINTMENT</h2>

                <p>
                    Please review your booking before confirming.
                </p>
            </div>

            <div class="bb-confirm-body">
                <dl class="bb-confirm-list">
                    <div class="bb-confirm-row">
                        <dt>APPOINTMENT TYPE</dt>
                        <dd data-confirm="type"></dd>
                    </div>

                    <div class="bb-confirm-row">
                        <dt>DATE</dt>
                        <dd data-confirm="date"></dd>
                    </div>

                    <div class="bb-confirm-row">
                        <dt>TIME</dt>
                        <dd data-confirm="time"></dd>
                    </div>

                    <div class="bb-confirm-row">
                        <dt>NAME</dt>
                        <dd data-confirm="name"></dd>
                    </div>

                    <div class="bb-confirm-row">
                        <dt>PHONE</dt>
                        <dd data-confirm="phone"></dd>
                    </div>

                    <div class="bb-confirm-row">
                        <dt>COMMENT</dt>
                        <dd data-confirm="comment"></dd>
                    </div>
                </dl>
            </div>

            <div class="bb-confirm-actions">
                <button
                    type="button"
                    id="cancelAppointment"
                    class="bb-confirm-button bb-confirm-cancel"
                >
                    BACK
                </button>

                <button
                    type="button"
                    id="confirmAppointment"
                    class="bb-confirm-button bb-confirm-submit"
                >
                    CONFIRM BOOKING
                </button>
            </div>
        </dialog>

    </main>

    <x-slot name="script">
        <script>
            (async () => {
                const form = document.getElementById('appointmentBookingForm');
                const appointmentType = document.getElementById('appointment_type_id');
                const date = document.getElementById('appointment_date');
                const slot = document.getElementById('appointment_slot_id');

                const slotMessage = document.getElementById('appointmentSlotMessage');
                const timeStatus = document.getElementById('appointmentTimeStatus');
                const timeOptions = document.getElementById('appointmentTimeOptions');

                const dialog = document.getElementById('appointmentConfirmation');

                const endpoint = @json(
                    route('appointments.available-slots', absolute: false)
                );

                const stepKey = 'buffbridgeAppointmentStep';
                const serviceKey = 'buffbridgeAppointmentService';
                const dateKey = 'buffbridgeAppointmentDate';
                const slotKey = 'buffbridgeAppointmentSlot';

                const bookingSucceeded = @json(session('success') !== null);

                const dateButtons = Array.from(
                    document.querySelectorAll('.bb-date-button')
                );

                const pageSize = 7;
                const totalWeeks = Math.ceil(dateButtons.length / pageSize);

                let currentWeek = 0;
                let confirmed = false;
                let slotRequestId = 0;

                /* STORAGE */
                function saveStorage(key, value) {
                    try {
                        if (value) {
                            sessionStorage.setItem(key, String(value));
                        } else {
                            sessionStorage.removeItem(key);
                        }
                    } catch (error) {}
                }

                function getStorage(key) {
                    try {
                        return sessionStorage.getItem(key) || '';
                    } catch (error) {
                        return '';
                    }
                }

                function clearBookingStorage() {
                    try {
                        sessionStorage.removeItem(stepKey);
                        sessionStorage.removeItem(serviceKey);
                        sessionStorage.removeItem(dateKey);
                        sessionStorage.removeItem(slotKey);
                    } catch (error) {}
                }

                /* STEP */
                function showStep(stepNumber, shouldScroll = true) {
                    if (![1, 2, 3].includes(stepNumber)) {
                        stepNumber = 1;
                    }

                    document.querySelectorAll('.bb-step').forEach(step => {
                        step.classList.toggle(
                            'active',
                            Number(step.dataset.step) === stepNumber
                        );
                    });

                    document.querySelectorAll('.bb-progress-item').forEach(item => {
                        const number = Number(item.dataset.progress);

                        item.classList.toggle('active', number === stepNumber);
                        item.classList.toggle('completed', number < stepNumber);
                    });

                    saveStorage(stepKey, stepNumber);

                    if (stepNumber === 3) {
                        updateSummary();
                    }

                    if (shouldScroll) {
                        const main = document.querySelector('.bb-booking-main');

                        if (main) {
                            window.scrollTo({
                                top: main.offsetTop - 20,
                                behavior: 'smooth'
                            });
                        }
                    }
                }

                /* SERVICE */
                document.querySelectorAll('.bb-service-option').forEach(button => {
                    button.addEventListener('click', () => {
                        if (button.disabled) {
                            return;
                        }

                        document.querySelectorAll('.bb-service-option').forEach(item => {
                            item.classList.remove('active');
                        });

                        button.classList.add('active');

                        appointmentType.value = button.dataset.serviceId;

                        saveStorage(serviceKey, appointmentType.value);

                        document
                            .getElementById('step1Error')
                            .classList
                            .remove('show');
                    });
                });

                /* WEEK */
                function renderWeek(weekIndex = currentWeek) {
                    let index = Number(weekIndex);

                    if (Number.isNaN(index) || index < 0) {
                        index = 0;
                    }

                    if (totalWeeks > 0 && index >= totalWeeks) {
                        index = totalWeeks - 1;
                    }

                    currentWeek = index;

                    dateButtons.forEach(button => {
                        button.classList.toggle(
                            'bb-date-hidden',
                            Number(button.dataset.week) !== currentWeek
                        );
                    });
                }

                function openWeekForDate(value) {
                    if (!value) {
                        renderWeek(0);
                        return;
                    }

                    const button = dateButtons.find(
                        item => item.dataset.date === value
                    );

                    renderWeek(button ? Number(button.dataset.week) : 0);
                }

                document.addEventListener('bb-dropdown:change', event => {
                    const detail = event.detail || {};

                    if (detail.name !== 'appointment_week') {
                        return;
                    }

                    const selectedWeek = Number(detail.value);

                    if (!Number.isNaN(selectedWeek)) {
                        renderWeek(selectedWeek);
                    }
                });

                /* DATE */
                dateButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        if (
                            button.disabled ||
                            button.dataset.status !== 'available'
                        ) {
                            return;
                        }

                        dateButtons.forEach(item => {
                            item.classList.remove('active');
                        });

                        button.classList.add('active');

                        date.value = button.dataset.date;

                        slot.dataset.oldValue = '';
                        saveStorage(dateKey, date.value);
                        saveStorage(slotKey, '');

                        document
                            .getElementById('step2Error')
                            .classList
                            .remove('show');

                        loadSlots();
                    });
                });

                /* SLOT */
                async function loadSlots(restoreSlot = '') {
                    const requestId = ++slotRequestId;
                    const requestedDate = date.value;
                    slot.disabled = true;
                    slot.value = '';

                    slot.innerHTML =
                        '<option value="">Loading...</option>';

                    timeOptions.innerHTML =
                        '<div class="bb-time-empty">Loading available times...</div>';

                    timeStatus.textContent = 'LOADING...';
                    slotMessage.textContent = '';

                    if (!date.value) {
                        slot.innerHTML =
                            '<option value="">Select a date first</option>';

                        timeOptions.innerHTML =
                            '<div class="bb-time-empty">Select a date to view available times.</div>';

                        timeStatus.textContent = 'SELECT A DATE FIRST';
                        return;
                    }

                    try {
                        const response = await fetch(
                            `${endpoint}?date=${encodeURIComponent(date.value)}`,
                            {
                                headers: {
                                    'Accept': 'application/json'
                                }
                            }
                        );

                        if (!response.ok) {
                            throw new Error('Unable to load appointment times.');
                        }

                        const data = await response.json();

                        if (requestId !== slotRequestId || date.value !== requestedDate) {
                            return;
                        }

                        const slots = Array.isArray(data.slots)
                            ? data.slots
                            : [];

                        slot.innerHTML =
                            '<option value="">Select time</option>';

                        timeOptions.innerHTML = '';

                        if (!slots.length) {
                            slot.disabled = true;

                            timeStatus.textContent = 'NO TIMES AVAILABLE';

                            timeOptions.innerHTML =
                                '<div class="bb-time-empty">No available times for this date.</div>';

                            slotMessage.textContent =
                                'Please select another date.';

                            saveStorage(slotKey, '');
                            return;
                        }

                        slot.disabled = false;
                        timeStatus.textContent = `${slots.length} AVAILABLE`;

                        slots.forEach(item => {
                            const option = document.createElement('option');

                            option.value = item.id;
                            option.textContent = item.time;

                            slot.appendChild(option);

                            const button = document.createElement('button');

                            button.type = 'button';
                            button.className = 'bb-time-button';
                            button.dataset.slotId = item.id;
                            button.dataset.slotTime = item.time;
                            button.textContent = item.time;

                            if (
                                restoreSlot &&
                                String(item.id) === String(restoreSlot)
                            ) {
                                button.classList.add('active');
                                slot.value = item.id;
                                slot.dataset.oldValue = item.id;
                            }

                            button.addEventListener('click', () => {
                                document
                                    .querySelectorAll('.bb-time-button')
                                    .forEach(timeButton => {
                                        timeButton.classList.remove('active');
                                    });

                                button.classList.add('active');

                                slot.value = item.id;
                                slot.dataset.oldValue = item.id;

                                saveStorage(slotKey, item.id);

                                slotMessage.textContent = '';

                                document
                                    .getElementById('step2Error')
                                    .classList
                                    .remove('show');
                            });

                            timeOptions.appendChild(button);
                        });

                        if (restoreSlot && !slot.value) {
                            saveStorage(slotKey, '');
                        }

                    } catch (error) {
                        if (requestId !== slotRequestId || date.value !== requestedDate) {
                            return;
                        }

                        slot.disabled = true;

                        slot.innerHTML =
                            '<option value="">Unable to load times</option>';

                        timeOptions.innerHTML =
                            '<div class="bb-time-empty">Unable to load available times.</div>';

                        timeStatus.textContent = 'UNAVAILABLE';
                        slotMessage.textContent = error.message;
                    }
                }

                /* VALIDATE */
                function validateStep1() {
                    const error = document.getElementById('step1Error');

                    if (!appointmentType.value) {
                        error.classList.add('show');
                        return false;
                    }

                    error.classList.remove('show');
                    return true;
                }

                function validateStep2() {
                    const error = document.getElementById('step2Error');

                    if (!date.value || !slot.value) {
                        error.classList.add('show');
                        return false;
                    }

                    error.classList.remove('show');
                    return true;
                }

                /* NEXT / BACK */
                document.querySelectorAll('[data-next]').forEach(button => {
                    button.addEventListener('click', () => {
                        const next = Number(button.dataset.next);

                        if (next === 2 && !validateStep1()) {
                            return;
                        }

                        if (next === 3 && !validateStep2()) {
                            return;
                        }

                        showStep(next);
                    });
                });

                document.querySelectorAll('[data-back]').forEach(button => {
                    button.addEventListener('click', () => {
                        showStep(Number(button.dataset.back));
                    });
                });

                /* SUMMARY */
                function selectedTimeText() {
                    if (!slot.value) {
                        return '-';
                    }

                    const active = document.querySelector(
                        '.bb-time-button.active'
                    );

                    if (active) {
                        return active.dataset.slotTime;
                    }

                    return (
                        slot.selectedOptions[0]
                            ?.textContent
                            ?.trim()
                        || '-'
                    );
                }

                function parseLocalDate(value) {
                    const [year, month, day] = value.split('-').map(Number);
                    return new Date(year, month - 1, day);
                }

                function formattedSelectedDate() {
                    if (!date.value) {
                        return '-';
                    }

                    return parseLocalDate(date.value)
                        .toLocaleDateString('en-US', {
                            weekday: 'short',
                            day: '2-digit',
                            month: 'short',
                            year: 'numeric'
                        });
                }

                function updateSummary() {
                    document.getElementById('summaryService').textContent =
                        appointmentType.selectedOptions[0]
                            ?.textContent
                            ?.trim()
                        || '-';

                    document.getElementById('summaryDate').textContent =
                        formattedSelectedDate();

                    document.getElementById('summaryTime').textContent =
                        selectedTimeText();
                }

                function confirmationText(name, value) {
                    const target = dialog.querySelector(
                        `[data-confirm="${name}"]`
                    );

                    if (target) {
                        target.textContent = value || '-';
                    }
                }

                /* SUBMIT */
                form.addEventListener('submit', event => {
                    if (confirmed) {
                        return;
                    }

                    event.preventDefault();

                    if (!validateStep1()) {
                        showStep(1);
                        return;
                    }

                    if (!validateStep2()) {
                        showStep(2);
                        return;
                    }

                    const customerName =
                        document.getElementById('customer_name');

                    const phone =
                        document.getElementById('phone');

                    if (!customerName.checkValidity()) {
                        customerName.reportValidity();
                        return;
                    }

                    if (!phone.checkValidity()) {
                        phone.reportValidity();
                        return;
                    }

                    confirmationText(
                        'type',
                        appointmentType.selectedOptions[0]
                            ?.textContent
                            ?.trim()
                    );

                    confirmationText(
                        'date',
                        formattedSelectedDate()
                    );

                    confirmationText(
                        'time',
                        selectedTimeText()
                    );

                    confirmationText(
                        'name',
                        customerName.value
                    );

                    confirmationText(
                        'phone',
                        phone.value
                    );

                    confirmationText(
                        'comment',
                        document.getElementById('comment').value
                    );

                    dialog.showModal();
                });

                document
                    .getElementById('confirmAppointment')
                    .addEventListener('click', () => {
                        confirmed = true;

                        clearBookingStorage();
                        dialog.close();
                        form.submit();
                    });

                document
                    .getElementById('cancelAppointment')
                    .addEventListener('click', () => {
                        dialog.close();
                    });

                /* RESTORE */
                function restoreService() {
                    const stored =
                        appointmentType.value ||
                        getStorage(serviceKey);

                    if (!stored) {
                        return;
                    }

                    const button = document.querySelector(
                        `.bb-service-option[data-service-id="${CSS.escape(String(stored))}"]`
                    );

                    if (!button) {
                        saveStorage(serviceKey, '');
                        return;
                    }

                    appointmentType.value = stored;

                    document
                        .querySelectorAll('.bb-service-option')
                        .forEach(item => item.classList.remove('active'));

                    button.classList.add('active');

                    saveStorage(serviceKey, stored);
                }

                async function restoreDateAndSlot() {
                    const storedDate =
                        date.value ||
                        getStorage(dateKey);

                    if (!storedDate) {
                        openWeekForDate('');
                        return;
                    }

                    const button = dateButtons.find(
                        item => item.dataset.date === storedDate
                    );

                    if (
                        !button ||
                        button.disabled ||
                        button.dataset.status !== 'available'
                    ) {
                        date.value = '';
                        saveStorage(dateKey, '');
                        saveStorage(slotKey, '');
                        openWeekForDate('');
                        return;
                    }

                    date.value = storedDate;

                    dateButtons.forEach(item => {
                        item.classList.remove('active');
                    });

                    button.classList.add('active');

                    saveStorage(dateKey, storedDate);
                    openWeekForDate(storedDate);

                    const restoreSlot =
                        slot.dataset.oldValue ||
                        getStorage(slotKey);

                    await loadSlots(restoreSlot);
                }

                if (bookingSucceeded) {
                    clearBookingStorage();
                    renderWeek();
                    showStep(1, false);
                } else {
                    restoreService();
                    const savedStep =
                        Number(getStorage(stepKey));

                    await restoreDateAndSlot();

                    showStep(
                        [1, 2, 3].includes(savedStep)
                            ? savedStep
                            : 1,
                        false
                    );
                }

            })();
        </script>
    </x-slot>
</x-guest-layout>
