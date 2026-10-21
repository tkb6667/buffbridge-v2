
<x-app-layout :seo="$seo">
    <style>
        .bb-preorder, .bb-preorder * {
            box-sizing: border-box;
        }

        .bb-preorder {
            --yellow: #ffd21c;
            min-height: 65vh;
            background: #f5f5f5;
            color: #111;
            font-family: Arial, Helvetica, sans-serif;
        }

        .bb-preorder-shell {
            width: min(1000px, calc(100% - 40px));
            margin: 0 auto;
        }

        /* HERO */
        .bb-preorder-hero {
            background: #0b0b0b;
            border-bottom: 3px solid var(--yellow);
        }

        .bb-preorder-hero-inner {
            width: min(1000px, calc(100% - 40px));
            min-height: 120px;
            margin: auto;
            padding: 24px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .bb-preorder-eyebrow {
            margin: 0 0 7px;
            color: var(--yellow);
            font-size: 9px;
            font-weight: 900;
            letter-spacing: 1.8px;
        }

        .bb-preorder-hero h1 {
            display: block !important;
            position: static !important;
            visibility: visible !important;
            opacity: 1 !important;
            transform: none !important;
            margin: 0 !important;
            padding: 0 !important;
            background: transparent !important;
            color: #fff !important;
            font-size: clamp(28px, 4vw, 40px) !important;
            font-weight: 900 !important;
            font-style: italic !important;
            line-height: 1.1 !important;
            letter-spacing: 0 !important;
            text-align: left !important;
        }

        .bb-preorder-hero h1::before,
        .bb-preorder-hero h1::after {
            display: none !important;
            content: none !important;
        }

        .bb-preorder-hero h1 span {
            color: var(--yellow) !important;
        }

        .bb-preorder-subtitle {
            margin: 8px 0 0 !important;
            color: #999 !important;
            font-size: 11px !important;
            line-height: 1.6 !important;
        }

        .bb-preorder-breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-shrink: 0;
            color: #777;
            font-size: 9px;
            font-weight: 900;
            letter-spacing: .5px;
        }

        .bb-preorder-breadcrumb a {
            color: #fff !important;
            text-decoration: none !important;
        }

        .bb-preorder-breadcrumb strong {
            color: var(--yellow);
        }

        /* CONTENT */
        .bb-preorder-content {
            padding: 26px 0 48px;
        }

        .bb-preorder-board {
            background: #111;
            color: #fff;
            border: 1px solid #222;
            border-radius: 3px;
            overflow: hidden;
        }

        .bb-preorder-board-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 19px 25px 12px;
        }

        .bb-preorder-board-title-wrap {
            display: flex;
            align-items: center;
            gap: 11px;
            min-width: 0;
        }

        .bb-preorder-plane {
            width: 25px;
            height: 25px;
            flex: 0 0 25px;
            color: var(--yellow);
        }

        .bb-preorder-board-title {
            margin: 0 !important;
            color: #fff !important;
            font-size: 21px !important;
            font-weight: 900 !important;
            line-height: 1.2 !important;
        }

        .bb-preorder-count {
            color: #999;
            font-size: 11px;
            white-space: nowrap;
        }

        /* TABLE: 4 EVENLY SPACED COLUMNS */
        .bb-preorder-table-wrap {
            padding: 0 25px 14px;
        }

        .bb-preorder-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            border: 0 !important;
        }

        .bb-preorder .bb-preorder-table th {
            width: 25%;
            padding: 10px 16px;
            background: transparent !important;
            color: #999 !important;
            border: 0 !important;
            border-bottom: 1px solid #363636 !important;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .4px;
            line-height: 1.4;
            text-align: left;
            text-transform: uppercase;
        }

        .bb-preorder .bb-preorder-table td {
            padding: 8px 16px;
            background: transparent !important;
            color: #eee;
            border: 0 !important;
            border-bottom: 1px solid #292929 !important;
            font-size: 12px;
            line-height: 1.5;
            text-align: left;
            vertical-align: middle;
            overflow-wrap: anywhere;
        }

        .bb-preorder .bb-preorder-table tbody tr:last-child td {
            border-bottom: 0 !important;
        }

        .bb-preorder .bb-preorder-table tbody tr:hover td {
            background: #191919 !important;
        }

        .bb-preorder-country {
            color: var(--yellow) !important;
            font-weight: 800;
        }

        .bb-preorder-product {
            color: #fff !important;
            font-weight: 700;
        }

        .bb-preorder-eta {
            color: #eee !important;
            white-space: nowrap;
            font-variant-numeric: tabular-nums;
        }

        .bb-preorder-eta.is-delayed {
            color: #ef7373 !important;
        }

        /* STATUS */
        .bb-preorder-status {
            display: inline-block;
            padding: 0 !important;
            border: 0 !important;
            border-radius: 0 !important;
            background: transparent !important;
            box-shadow: none !important;
            font-size: 11px;
            font-weight: 900;
            line-height: 1.4;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .bb-preorder-status--on_time { color: #48be83 !important; }
        .bb-preorder-status--delayed { color: #ef9a3a !important; }
        .bb-preorder-status--arrived { color: #e2b938 !important; }
        .bb-preorder-status--cancelled { color: #aaa !important; }

        .bb-preorder-remarks {
            margin-top: 2px;
            color: #777;
            font-size: 10px;
            font-weight: 400;
            line-height: 1.45;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .bb-preorder-empty {
            padding: 28px 12px !important;
            color: #aaa !important;
            text-align: center !important;
        }

        .bb-preorder-mobile {
            display: none;
        }

        .bb-preorder-note {
            margin: 12px 0 0 !important;
            color: #888 !important;
            font-size: 10px !important;
            line-height: 1.6 !important;
        }

        /* MOBILE */
        @media (max-width: 700px) {
            .bb-preorder-shell,
            .bb-preorder-hero-inner {
                width: calc(100% - 30px);
            }

            .bb-preorder-hero-inner {
                min-height: 105px;
                padding: 19px 0;
            }

            .bb-preorder-hero h1 {
                font-size: 27px !important;
            }

            .bb-preorder-breadcrumb {
                display: none;
            }

            .bb-preorder-content {
                padding: 15px 0 30px;
            }

            .bb-preorder-board-head {
                padding: 15px 14px 10px;
            }

            .bb-preorder-board-title-wrap {
                gap: 7px;
            }

            .bb-preorder-plane {
                width: 20px;
                height: 20px;
                flex-basis: 20px;
            }

            .bb-preorder-board-title {
                font-size: 16px !important;
            }

            .bb-preorder-count {
                font-size: 9px;
            }

            .bb-preorder-table-wrap {
                display: none;
            }

            .bb-preorder-mobile {
                display: block;
                padding: 0 14px 7px;
            }

            .bb-preorder-mobile-item {
                display: grid;
                grid-template-columns: minmax(0, 1fr) auto;
                align-items: center;
                gap: 10px;
                min-width: 0;
                padding: 10px 0;
                border-bottom: 1px solid #303030;
            }

            .bb-preorder-mobile-item:last-child {
                border-bottom: 0;
            }

            .bb-preorder-mobile-info {
                min-width: 0;
            }

            .bb-preorder-mobile-country {
                color: var(--yellow);
                font-size: 10px;
                font-weight: 800;
                overflow-wrap: anywhere;
            }

            .bb-preorder-mobile-product {
                margin-top: 3px;
                color: #fff;
                font-size: 12px;
                font-weight: 700;
                line-height: 1.5;
                overflow-wrap: anywhere;
            }

            .bb-preorder-mobile-eta {
                margin-top: 4px;
                color: #bbb;
                font-size: 10px;
            }

            .bb-preorder-mobile-eta.is-delayed {
                color: #ef7373;
            }

            .bb-preorder-mobile-remarks {
                margin-top: 2px;
                color: #777;
                font-size: 10px;
                font-weight: 400;
                line-height: 1.45;
                white-space: pre-line;
                overflow-wrap: anywhere;
            }

            .bb-preorder-mobile-status {
                text-align: right;
            }

            .bb-preorder-mobile-status .bb-preorder-status {
                font-size: 9px;
            }

            .bb-preorder-mobile-empty {
                padding: 25px 10px;
                color: #aaa;
                font-size: 11px;
                text-align: center;
            }
        }

        @media (max-width: 360px) {
            .bb-preorder-mobile-item {
                gap: 7px;
            }

            .bb-preorder-mobile-status .bb-preorder-status {
                font-size: 8px;
            }
        }
    </style>

    <main class="bb-preorder">

        <!-- HERO -->
        <section class="bb-preorder-hero">
            <div class="bb-preorder-hero-inner">
                <div>
                    <div class="bb-preorder-eyebrow">BUFFBRIDGE CUSTOM</div>

                    <h1>PRE-ORDER <span>ALERT</span></h1>

                    <p class="bb-preorder-subtitle">
                        Track estimated arrival dates and the latest
                        pre-order shipment updates.
                    </p>
                </div>

                <nav class="bb-preorder-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ url('/') }}">HOME</a>
                    <span>/</span>
                    <strong>PRE-ORDER ALERT</strong>
                </nav>
            </div>
        </section>

        <!-- CONTENT -->
        <section class="bb-preorder-content">
            <div class="bb-preorder-shell">

                <div class="bb-preorder-board">

                    <div class="bb-preorder-board-head">
                        <div class="bb-preorder-board-title-wrap">

                            <svg
                                class="bb-preorder-plane"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >
                                <path d="M2 21h20" />
                                <path d="M3.7 7.2a2 2 0 0 1 2.6-1.1l12.3 5.1a3 3 0 0 1 1.7 3.8 3 3 0 0 1-3.9 1.6L3 11.1a2 2 0 0 1-1.1-2.6l1.8-1.3Z" />
                                <path d="M7.5 12.9 4 16.5" />
                                <path d="m10 8-1.5-5" />
                            </svg>

                            <h2 class="bb-preorder-board-title">
                                ARRIVAL BOARD
                            </h2>
                        </div>

                        <div class="bb-preorder-count">
                            {{ $preOrderAlerts->count() }}
                            {{ $preOrderAlerts->count() === 1 ? 'PRE-ORDER' : 'PRE-ORDERS' }}
                        </div>
                    </div>

                    <!-- DESKTOP -->
                    <div class="bb-preorder-table-wrap">
                        <table class="bb-preorder-table">
                            <thead>
                                <tr>
                                    <th scope="col">ORIGIN COUNTRY</th>
                                    <th scope="col">PRODUCT</th>
                                    <th scope="col">ETA</th>
                                    <th scope="col">REMARKS / STATUS</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($preOrderAlerts as $alert)
                                    <tr>
                                        <td class="bb-preorder-country">
                                            {{ $alert->origin_country ?: '—' }}
                                        </td>

                                        <td class="bb-preorder-product">
                                            {{ $alert->product_name }}
                                        </td>

                                        <td class="bb-preorder-eta {{ $alert->status === 'delayed' ? 'is-delayed' : '' }}">
                                            {{ $alert->status === 'cancelled' || !$alert->eta
                                                ? '—'
                                                : $alert->eta->format('d M Y') }}
                                        </td>

                                        <td>
                                            <span class="bb-preorder-status bb-preorder-status--{{ $alert->status }}">
                                                {{ \App\Models\PreOrderAlert::STATUSES[$alert->status] ?? strtoupper($alert->status) }}
                                            </span>

                                            @if ($alert->remarks)
                                                <div class="bb-preorder-remarks">{{ $alert->remarks }}</div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="bb-preorder-empty">
                                            NO PRE-ORDER UPDATES AVAILABLE
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- MOBILE -->
                    <div class="bb-preorder-mobile">
                        @forelse ($preOrderAlerts as $alert)
                            <article class="bb-preorder-mobile-item">
                                <div class="bb-preorder-mobile-info">

                                    <div class="bb-preorder-mobile-country">
                                        {{ $alert->origin_country ?: '—' }}
                                    </div>

                                    <div class="bb-preorder-mobile-product">
                                        {{ $alert->product_name }}
                                    </div>

                                    <div class="bb-preorder-mobile-eta {{ $alert->status === 'delayed' ? 'is-delayed' : '' }}">
                                        ETA:
                                        {{ $alert->status === 'cancelled' || !$alert->eta
                                            ? '—'
                                            : $alert->eta->format('d M Y') }}
                                    </div>

                                    @if ($alert->remarks)
                                        <div class="bb-preorder-mobile-remarks">
                                            {{ $alert->remarks }}
                                        </div>
                                    @endif
                                </div>

                                <div class="bb-preorder-mobile-status">
                                    <span class="bb-preorder-status bb-preorder-status--{{ $alert->status }}">
                                        {{ \App\Models\PreOrderAlert::STATUSES[$alert->status] ?? strtoupper($alert->status) }}
                                    </span>
                                </div>
                            </article>
                        @empty
                            <div class="bb-preorder-mobile-empty">
                                NO PRE-ORDER UPDATES AVAILABLE
                            </div>
                        @endforelse
                    </div>

                </div>

                <p class="bb-preorder-note">
                    * Estimated arrival dates may change depending on shipment conditions.
                </p>

            </div>
        </section>

    </main>
</x-app-layout>
