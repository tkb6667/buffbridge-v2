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
                padding: 22px 25px 20px;
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
                margin-bottom: 14px;
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

            .bb-date-section { margin-bottom: 18px; }

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
                position: relative;
                min-height: 44px;
                padding: 0 8px;
                background: #fff !important;
                border: 1px solid #d8d8d8 !important;
                border-radius: 0 !important;
                color: #111 !important;
                box-shadow: none !important;
                font-size: 10px;
                font-weight: 900;
                cursor: pointer;
            }

            .bb-time-button:hover:not(.active) {
                background: #f7f7f7 !important;
                border-color: #d8d8d8 !important;
            }

            .bb-time-button.active,
            .bb-time-button.active:hover,
            .bb-time-button.active:focus {
                background: #fff !important;
                border: 1.5px solid #111 !important;
                color: #111 !important;
                box-shadow: none !important;
                outline: 0;
            }

            .bb-time-button.active::after {
                content: '';
                position: absolute;
                left: 50%;
                bottom: 5px;
                width: 14px;
                height: 2px;
                background: #111;
                transform: translateX(-50%);
            }

            .bb-selection-bar {
                margin-top: 12px;
                padding: 10px 12px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                background: #f7f7f7;
                border: 1px solid #e1e1e1;
                color: #111;
            }

            .bb-selection-bar-label {
                flex: 0 0 auto;
                font-size: 8px;
                font-weight: 900;
                letter-spacing: .8px;
            }

            .bb-selection-bar-value {
                min-width: 0;
                font-size: 10px;
                font-weight: 800;
                text-align: right;
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

            /* Compact read-only shop calendar */
            .bb-shop-calendar { width: min(100%, 430px); padding: 16px; margin: 0 0 24px; background: #fff; border: 1px solid #e5e5e5; }
            .bb-shop-calendar-head { display:flex; align-items:center; justify-content:space-between; gap:8px; margin-bottom:13px; }
            .bb-shop-calendar-title { color:#111; font-size:13px; font-weight:900; text-align:center; }
            .bb-shop-calendar-nav { display:grid; place-items:center; width:34px; height:34px; padding:0; border:1px solid #e7e7e7; background:white; color:#111; cursor:pointer; }
            .bb-shop-calendar-nav:disabled { color:#ccc; cursor:default; }
            .bb-shop-calendar-days, .bb-shop-calendar-grid { display:grid; grid-template-columns:repeat(7,minmax(0,1fr)); gap:3px; }
            .bb-shop-calendar-days { margin-bottom:6px; }
            .bb-shop-calendar-days span { text-align:center; font-size:9px; font-weight:800; color:#888; }
            .bb-shop-calendar-cell { position:relative; display:flex; align-items:center; justify-content:center; min-height:38px; font-size:12px; font-weight:700; color:#111!important; border-radius:3px; background:#fff!important; box-shadow:none!important; }
            .bb-shop-calendar-cell.is-closed { background:#f0f0f0!important; color:#aaa!important; }
            .bb-shop-calendar-cell.is-full { background:#f0f0f0!important; color:#aaa!important; }
            .bb-shop-calendar-cell.is-full::after { content:''; position:absolute; width:4px; height:4px; bottom:3px; border-radius:50%; background:#888; }
            .bb-shop-calendar-cell.is-outside { color:#ccc; }
            .bb-shop-calendar-legend { display:flex; flex-wrap:wrap; gap:10px; margin-top:8px; font-size:10px; color:#777; }
            .bb-shop-calendar-legend span { display:inline-flex; align-items:center; gap:5px; }
            .bb-shop-calendar-legend i { width:9px; height:9px; display:inline-block; background:#fff; border:1px solid #ddd; border-radius:2px; }
            .bb-shop-calendar-legend .closed { background:#f0f0f0; }
            .bb-shop-calendar-legend .full { position:relative; background:#f0f0f0; }
            .bb-shop-calendar-legend .full::after { content:''; position:absolute; width:3px; height:3px; right:2px; bottom:1px; border-radius:50%; background:#888; }
            @media (max-width:600px) { .bb-shop-calendar { padding:12px; } .bb-shop-calendar-cell { min-height:33px; } }
            /* Minimal two-column opening calendar: display only */
            .bb-shop-opening { margin-bottom: 8px; }
            .bb-shop-opening-heading { margin:0 0 10px!important; color:#111!important; font-size:17px!important; font-weight:900; letter-spacing:.2px; }
            .bb-shop-opening-layout { display:grid; grid-template-columns:minmax(0,1fr) minmax(0,1fr); align-items:start; gap:18px; }
            .bb-shop-calendar { width:100%; margin:0; padding:10px; border:1px solid #e0e0e0; border-radius:7px; }
            .bb-shop-calendar-head { margin-bottom:7px; }
            .bb-shop-calendar-nav, .bb-shop-calendar-nav:hover:not(:disabled) { width:34px; height:34px; border:0!important; background:transparent!important; color:#111!important; box-shadow:none!important; font-size:27px; font-weight:400; line-height:1; }
            .bb-shop-calendar-nav:hover:not(:disabled) { opacity:.55; }
            .bb-shop-calendar-nav:disabled { background:transparent!important; border:0!important; color:#bbb!important; opacity:.5; }
            .bb-shop-calendar-cell { min-height:36px; border:0!important; padding:0; font-family:inherit; cursor:default; }
            button.bb-shop-calendar-cell.is-open { background:#fff!important; color:#111!important; border:0!important; box-shadow:none!important; cursor:pointer; }
            button.bb-shop-calendar-cell.is-open:hover:not(.is-selected) { background:#f7f7f7!important; border:0!important; box-shadow:none!important; }
            button.bb-shop-calendar-cell.is-open.is-selected, button.bb-shop-calendar-cell.is-open.is-selected:hover, button.bb-shop-calendar-cell.is-open.is-selected:focus { background:#fff!important; border:1.5px solid #111!important; color:#111!important; box-shadow:none!important; font-weight:900; }
            button.bb-shop-calendar-cell.is-open.is-selected::before { content:''; position:absolute; left:50%; bottom:4px; width:10px; height:2px; background:#111; transform:translateX(-50%); }
            .bb-shop-calendar-cell:focus-visible { outline:0; }
            .bb-shop-info { padding:9px 8px; }
            .bb-shop-info h3 { margin:0 0 15px!important; color:#111!important; font-size:17px!important; font-weight:900; }
            .bb-shop-info-item { display:flex; align-items:center; gap:11px; margin-bottom:12px; }
            .bb-shop-info-badge { display:flex; align-items:center; justify-content:center; flex:0 0 64px; width:64px; height:25px; border:1px solid #ddd; border-radius:3px; background:#fff; color:#111; font-size:9px; font-weight:900; letter-spacing:.5px; }
            .bb-shop-info-badge.is-closed, .bb-shop-info-badge.is-full { background:#f0f0f0; color:#666; }
            .bb-shop-info-item p { margin:0!important; font-size:11px!important; color:#777!important; line-height:1.45; }
            .bb-shop-booking-title { margin:0 0 10px; padding-top:14px; border-top:1px solid #e6e6e6; }
            @media(max-width:700px) { .bb-shop-opening-layout { grid-template-columns:1fr; gap:10px; } .bb-shop-info { padding:9px 2px 0; } .bb-shop-info h3 { margin-bottom:14px!important; } .bb-shop-info-item { margin-bottom:13px; } }
        </style>
    </x-slot>

    <main class="bb-booking">

        <section class="bb-booking-hero">
            <div class="bb-booking-hero-inner">
                <div>
                    <div class="bb-booking-eyebrow">
                        BUFFBRIDGE CUSTOM
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


                                {{-- Select the booking date directly from the opening calendar. --}}
                                <div class="bb-shop-opening">
                                  <h3 class="bb-shop-opening-heading">SELECT BOOKING DATE <span class="bb-required">*</span></h3>
                                  <div class="bb-shop-opening-layout">
                                <div class="bb-shop-calendar" id="bbShopCalendar" aria-label="Select booking date">
                                    <div class="bb-shop-calendar-head">
                                        <button type="button" class="bb-shop-calendar-nav" id="bbShopPrev" aria-label="Previous month">&#8249;</button>
                                        <span class="bb-shop-calendar-title" id="bbShopMonth" aria-live="polite"></span>
                                        <button type="button" class="bb-shop-calendar-nav" id="bbShopNext" aria-label="Next month">&#8250;</button>
                                    </div>
                                    <div class="bb-shop-calendar-days" aria-hidden="true">
                                        <span>MON</span><span>TUE</span><span>WED</span><span>THU</span><span>FRI</span><span>SAT</span><span>SUN</span>
                                    </div>
                                    <div class="bb-shop-calendar-grid" id="bbShopDays" aria-label="Select an available appointment date"></div>
                                    <div class="bb-shop-calendar-legend">
                                        <span><i></i>OPEN</span><span><i class="closed"></i>CLOSED</span><span><i class="full"></i>FULL</span>
                                    </div>
                                </div>

                                  <div class="bb-shop-info">
                                    <h3>SHOP INFORMATION</h3>
                                    <div class="bb-shop-info-item"><span class="bb-shop-info-badge">OPEN</span><p>สามารถเลือกวันที่เพื่อจองได้</p></div>
                                    <div class="bb-shop-info-item"><span class="bb-shop-info-badge is-closed">CLOSED</span><p>ไม่สามารถจองในวันนี้ได้</p></div>
                                    <div class="bb-shop-info-item"><span class="bb-shop-info-badge is-full">FULL</span><p>ไม่มีเวลาว่างให้จองแล้ว</p></div>
                                  </div>
                                  </div>
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

                                <div class="bb-selection-bar" aria-live="polite">
                                    <span class="bb-selection-bar-label">YOUR SELECTION</span>
                                    <span class="bb-selection-bar-value" id="appointmentSelectionValue">
                                        SELECT A DATE
                                    </span>
                                </div>
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
                const selectionValue = document.getElementById('appointmentSelectionValue');

                const dialog = document.getElementById('appointmentConfirmation');

                const endpoint = @json(
                    route('appointments.available-slots', absolute: false)
                );

                const stepKey = 'buffbridgeAppointmentStep';
                const serviceKey = 'buffbridgeAppointmentService';
                const dateKey = 'buffbridgeAppointmentDate';
                const slotKey = 'buffbridgeAppointmentSlot';

                const bookingSucceeded = @json(session('success') !== null);

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

                function updateSelectionBar() {
                    if (!date.value) {
                        selectionValue.textContent = 'SELECT A DATE';
                        return;
                    }

                    const selectedDate = parseLocalDate(date.value);
                    const dateText = [
                        String(selectedDate.getDate()).padStart(2, '0'),
                        selectedDate.toLocaleDateString('en-US', {month: 'short'}).toUpperCase(),
                        selectedDate.getFullYear()
                    ].join(' ');

                    const timeText = slot.value
                        ? slot.selectedOptions[0]?.textContent?.trim() || slot.value
                        : 'SELECT A TIME';

                    selectionValue.textContent = `${dateText}  |  ${timeText}`;
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

                /* DATE: calendar selection uses the original hidden field and slot API. */
                document.addEventListener('bb-calendar:date', event => {
                    const value = event.detail?.date;
                    const option = Array.from(date.options).find(
                        item => item.value === value && !item.disabled
                    );
                    if (!option) return;
                    date.value = value;
                    slot.dataset.oldValue = '';
                    saveStorage(dateKey, value);
                    saveStorage(slotKey, '');
                    document.getElementById('step2Error').classList.remove('show');
                    loadSlots();
                });

                /* SLOT */
                async function loadSlots(restoreSlot = '') {
                    const requestId = ++slotRequestId;
                    const requestedDate = date.value;
                    slot.disabled = true;
                    slot.value = '';
                    updateSelectionBar();

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
                                updateSelectionBar();

                                slotMessage.textContent = '';

                                document
                                    .getElementById('step2Error')
                                    .classList
                                    .remove('show');
                            });

                            timeOptions.appendChild(button);
                        });

                        updateSelectionBar();

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
                    const storedDate = date.value || getStorage(dateKey);
                    const option = Array.from(date.options).find(
                        item => item.value === storedDate && !item.disabled
                    );
                    if (!option) {
                        date.value = '';
                        saveStorage(dateKey, '');
                        saveStorage(slotKey, '');
                        updateSelectionBar();
                        document.dispatchEvent(new CustomEvent('bb-calendar:restore', {detail: {date: ''}}));
                        return;
                    }
                    date.value = storedDate;
                    saveStorage(dateKey, storedDate);
                    document.dispatchEvent(new CustomEvent('bb-calendar:restore', {detail: {date: storedDate}}));
                    await loadSlots(slot.dataset.oldValue || getStorage(slotKey));
                }

                if (bookingSucceeded) {
                    clearBookingStorage();
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

        <script>
            (() => {
                // Reuse Backend date statuses and existing booking form.
                const dates = @json($availableDates);
                const statuses = new Map(dates.map(item => [item.date, item.status]));
                const months = [...new Set(dates.map(item => item.date.slice(0, 7)))].sort();
                const monthLabel = document.getElementById('bbShopMonth');
                const days = document.getElementById('bbShopDays');
                const prev = document.getElementById('bbShopPrev');
                const next = document.getElementById('bbShopNext');
                let index = 0;
                let selectedDate = '';

                document.addEventListener('bb-calendar:restore', event => {
                    selectedDate = event.detail?.date || '';
                    if (selectedDate) {
                        const monthIndex = months.indexOf(selectedDate.slice(0, 7));
                        if (monthIndex >= 0) index = monthIndex;
                    }
                    render();
                });

                function syncSelectedDate() {
                    days.querySelectorAll('button.bb-shop-calendar-cell.is-open').forEach(cell => {
                        const isSelected = cell.dataset.date === selectedDate;
                        cell.classList.toggle('is-selected', isSelected);
                        cell.setAttribute('aria-pressed', String(isSelected));
                    });
                }

                function render() {
                    const key = months[index];
                    days.replaceChildren();
                    if (!key) {
                        monthLabel.textContent = 'NO DATES AVAILABLE';
                        prev.disabled = next.disabled = true;
                        return;
                    }
                    const [year, month] = key.split('-').map(Number);
                    monthLabel.textContent = new Date(year, month - 1, 1).toLocaleDateString('en-US', {month:'long', year:'numeric'}).toUpperCase();
                    const firstWeekday = (new Date(year, month - 1, 1).getDay() + 6) % 7;
                    for (let i = 0; i < firstWeekday; i++) {
                        const blank = document.createElement('span');
                        blank.className = 'bb-shop-calendar-cell';
                        blank.setAttribute('aria-hidden', 'true');
                        days.append(blank);
                    }
                    const count = new Date(year, month, 0).getDate();
                    for (let day = 1; day <= count; day++) {
                        const keyDate = `${year}-${String(month).padStart(2,'0')}-${String(day).padStart(2,'0')}`;
                        const status = statuses.get(keyDate);
                        const selectable = status === 'available';
                        const cell = document.createElement(selectable ? 'button' : 'span');
                        cell.className = 'bb-shop-calendar-cell';
                        cell.dataset.date = keyDate;
                        if (selectable) {
                            cell.type = 'button';
                            cell.classList.add('is-open');
                            cell.setAttribute('aria-pressed', String(selectedDate === keyDate));
                            cell.addEventListener('click', () => {
                                selectedDate = keyDate;
                                syncSelectedDate();
                                document.dispatchEvent(new CustomEvent('bb-calendar:date', {
                                    detail: {date: keyDate}
                                }));
                            });
                        }
                        if (status === 'closed') cell.classList.add('is-closed');
                        else if (status === 'full') cell.classList.add('is-full');
                        else if (status !== 'available') cell.classList.add('is-outside');
                        cell.textContent = day;
                        cell.title = `${keyDate}: ${status === 'available' ? 'OPEN' : status === 'closed' ? 'CLOSED' : status === 'full' ? 'FULL' : 'NOT AVAILABLE'}`;
                        cell.setAttribute('aria-label', cell.title);
                        days.append(cell);
                    }
                    syncSelectedDate();
                    prev.disabled = index === 0;
                    next.disabled = index === months.length - 1;
                }
                prev.addEventListener('click', () => { if (index > 0) { index--; render(); } });
                next.addEventListener('click', () => { if (index < months.length - 1) { index++; render(); } });
                const currentDate = document.getElementById('appointment_date')?.value || '';
                let storedDate = '';
                try { storedDate = sessionStorage.getItem('buffbridgeAppointmentDate') || ''; } catch (error) {}
                selectedDate = currentDate || storedDate;
                const initialMonth = months.indexOf(selectedDate.slice(0, 7));
                if (initialMonth >= 0) index = initialMonth;
                render();
            })();
        </script>
    </x-slot>
</x-guest-layout>
