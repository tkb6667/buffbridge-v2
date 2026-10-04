<x-guest-layout>

<style>
.bb-history-page,
.bb-history-page * {
    box-sizing: border-box;
}

.bb-history-page {
    --bb-orange: #ffa51f;
    --bb-yellow: #ffd429;
    --bb-dark: #111216;
    --bb-text: #111;
    --bb-muted: #777;
    --bb-line: #e5e5e5;

    width: 100%;
    min-height: calc(100vh - 96px);

    background: #f5f5f5;
    color: var(--bb-text);

    font-family: Arial, Helvetica, sans-serif;
}


/* =========================================================
   HERO
========================================================= */

.bb-history-hero {
    background: var(--bb-dark);
}

.bb-history-hero-inner {
    width: min(1180px, calc(100% - 40px));
    min-height: 118px;

    margin: 0 auto;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 24px;
}

.bb-history-title {
    margin: 0 !important;

    color: #fff !important;

    font-size: 24px !important;
    font-weight: 900 !important;
    font-style: italic;

    line-height: 1;

    text-transform: uppercase;
}

.bb-history-breadcrumb {
    display: flex;
    align-items: center;
    flex-wrap: wrap;

    gap: 10px;

    color: #777;

    font-size: 10px;
    font-weight: 800;

    text-transform: uppercase;
}

.bb-history-breadcrumb a {
    color: #fff !important;
    text-decoration: none !important;
}

.bb-history-breadcrumb .current {
    color: #777;
}


/* =========================================================
   CONTENT
========================================================= */

.bb-history-content {
    width: min(1100px, calc(100% - 40px));

    margin: 0 auto;

    padding: 48px 0 72px;
}

.bb-history-list {
    display: grid;
    gap: 22px;
}


/* =========================================================
   ORDER CARD
========================================================= */

.bb-order-card {
    overflow: hidden;

    background: #fff;

    border: 1px solid var(--bb-line);
    border-top: 3px solid var(--bb-orange);

    box-shadow:
        0 10px 30px rgba(0, 0, 0, .05);
}

.bb-order-head {
    padding: 22px 24px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 24px;

    border-bottom: 1px solid var(--bb-line);
}

.bb-order-info {
    min-width: 0;
}

.bb-order-number {
    margin: 0 0 8px;

    color: #111;

    font-size: 13px;
    font-weight: 900;

    line-height: 1.4;
}

.bb-order-number span {
    color: var(--bb-orange);
}

.bb-order-meta {
    display: flex;
    align-items: center;
    flex-wrap: wrap;

    gap: 10px 18px;

    color: #888;

    font-size: 10px;
}

.bb-order-meta-item {
    display: flex;
    align-items: center;

    gap: 6px;
}

.bb-order-meta-label {
    color: #555;

    font-size: 9px;
    font-weight: 900;

    text-transform: uppercase;
}

.bb-order-status {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    min-height: 25px;

    padding: 0 10px;

    border: 1px solid #d9d9d9;

    background: #f5f5f5;

    color: #555;

    font-size: 8px;
    font-weight: 900;

    letter-spacing: .5px;

    text-transform: uppercase;
}

.bb-order-status.pending {
    border-color: #e5a100;

    background: #fff7dc;

    color: #b17700;
}

.bb-order-status.cancelled,
.bb-order-status.canceled {
    border-color: #d86767;

    background: #fff1f1;

    color: #c44444;
}

.bb-order-status.completed,
.bb-order-status.complete,
.bb-order-status.paid {
    border-color: #54a26f;

    background: #edf8f1;

    color: #30804c;
}

.bb-order-total {
    flex: none;

    text-align: right;
}

.bb-order-total-label {
    margin-bottom: 5px;

    color: #999;

    font-size: 8px;
    font-weight: 900;

    letter-spacing: 1px;

    text-transform: uppercase;
}

.bb-order-total-price {
    color: var(--bb-orange);

    font-size: 22px;
    font-weight: 900;

    line-height: 1;
}


/* =========================================================
   PRODUCT TABLE
========================================================= */

.bb-order-products {
    width: 100%;
}

.bb-order-products-head,
.bb-order-product {
    display: grid;

    grid-template-columns:
        minmax(0, 1fr)
        110px
        140px;

    align-items: center;
}

.bb-order-products-head {
    min-height: 38px;

    padding: 0 22px;

    background: #f5f5f5;

    color: #777;

    font-size: 8px;
    font-weight: 900;

    letter-spacing: 1px;

    text-transform: uppercase;
}

.bb-order-product {
    min-height: 54px;

    padding: 10px 22px;

    border-top: 1px solid #ededed;
}

.bb-order-product:first-of-type {
    border-top: 0;
}

.bb-order-product-name {
    min-width: 0;

    padding-right: 20px;
}

.bb-order-product-name a {
    color: #111 !important;

    font-size: 11px;
    font-weight: 800;

    line-height: 1.4;

    text-decoration: none !important;
}

.bb-order-product-name a:hover {
    color: var(--bb-orange) !important;
}

.bb-order-product-qty {
    color: #555;

    font-size: 11px;

    text-align: center;
}

.bb-order-product-price {
    color: #111;

    font-size: 11px;
    font-weight: 800;

    text-align: right;
}

.bb-mobile-label {
    display: none;
}


/* =========================================================
   EMPTY
========================================================= */

.bb-history-empty {
    min-height: 300px;

    padding: 48px 24px;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    background: #fff;

    border: 1px solid var(--bb-line);

    text-align: center;
}

.bb-history-empty h2 {
    margin: 0 0 9px !important;

    color: #111 !important;

    font-size: 26px !important;
    font-weight: 900 !important;
    font-style: italic;

    text-transform: uppercase;
}

.bb-history-empty p {
    margin: 0 0 22px !important;

    color: #888;

    font-size: 12px;
}

.bb-history-empty a {
    min-width: 210px;
    min-height: 48px;

    padding: 0 20px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    background: var(--bb-orange);

    color: #fff !important;

    font-size: 10px;
    font-weight: 900;

    text-decoration: none !important;

    text-transform: uppercase;
}


/* =========================================================
   PAGINATION
========================================================= */

.bb-history-pagination {
    margin-top: 30px;

    display: flex;
    justify-content: center;
}

.bb-history-pagination nav {
    width: 100%;
}

.bb-history-pagination svg {
    width: 18px;
    height: 18px;
}


/* =========================================================
   TABLET
========================================================= */

@media (max-width: 1024px) {

    .bb-history-page {
        min-height: calc(100vh - 78px);
    }

    .bb-history-hero-inner,
    .bb-history-content {
        width: min(
            920px,
            calc(100% - 32px)
        );
    }

    .bb-order-products-head,
    .bb-order-product {
        grid-template-columns:
            minmax(0, 1fr)
            90px
            120px;
    }

}


/* =========================================================
   IPAD / SMALL TABLET
========================================================= */

@media (max-width: 768px) {

    .bb-history-hero-inner {
        min-height: 150px;

        padding: 28px 0;

        flex-direction: column;
        align-items: center;
        justify-content: center;

        text-align: center;
    }

    .bb-history-title {
        font-size: 22px !important;
    }

    .bb-history-content {
        width: calc(100% - 28px);

        padding:
            30px
            0
            52px;
    }

    .bb-order-head {
        padding: 20px;
    }

    .bb-order-products-head,
    .bb-order-product {
        padding-right: 18px;
        padding-left: 18px;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 600px) {

    .bb-history-page {
        min-height: calc(100vh - 72px);
    }

    .bb-history-content {
        width: calc(100% - 24px);

        padding:
            24px
            0
            42px;
    }

    .bb-history-list {
        gap: 16px;
    }

    .bb-order-head {
        padding: 18px;

        align-items: flex-start;
        flex-direction: column;

        gap: 17px;
    }

    .bb-order-number {
        font-size: 12px;
    }

    .bb-order-meta {
        gap: 8px 12px;
    }

    .bb-order-total {
        width: 100%;

        padding-top: 15px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        border-top: 1px solid #ededed;

        text-align: left;
    }

    .bb-order-total-label {
        margin: 0;
    }

    .bb-order-total-price {
        font-size: 20px;
    }

    .bb-order-products-head {
        display: none;
    }

    .bb-order-products {
        padding: 0 16px 16px;
    }

    .bb-order-product {
        min-height: 0;

        padding:
            15px
            0;

        display: grid;

        grid-template-columns:
            1fr;

        gap: 10px;

        border-top: 1px solid #ededed;
    }

    .bb-order-product:first-child {
        border-top: 0;
    }

    .bb-order-product-name {
        padding-right: 0;
    }

    .bb-order-product-name a {
        font-size: 11px;
    }

    .bb-order-product-qty,
    .bb-order-product-price {
        display: flex;
        align-items: center;
        justify-content: space-between;

        text-align: right;
    }

    .bb-order-product-price {
        padding-top: 8px;

        border-top: 1px dashed #ededed;
    }

    .bb-mobile-label {
        display: inline-block;

        color: #999;

        font-size: 8px;
        font-weight: 900;

        letter-spacing: .7px;

        text-transform: uppercase;
    }

}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width: 380px) {

    .bb-order-head {
        padding: 16px;
    }

    .bb-order-products {
        padding-right: 14px;
        padding-left: 14px;
    }

    .bb-order-total-price {
        font-size: 18px;
    }

}

</style>


<div class="bb-history-page">

    <section class="bb-history-hero">

        <div class="bb-history-hero-inner">

            <h1 class="bb-history-title">
                ORDER HISTORY
            </h1>

            <div class="bb-history-breadcrumb">

                <a href="{{ route('home') }}">
                    HOME
                </a>

                <span>/</span>

                <a href="{{ route('products.index') }}">
                    SHOP
                </a>

                <span>/</span>

                <span class="current">
                    HISTORY
                </span>

            </div>

        </div>

    </section>


    <main class="bb-history-content">

        @if ($orders->isEmpty())

            <div class="bb-history-empty">

                <h2>
                    NO ORDERS YET
                </h2>

                <p>
                    Your order history will appear here after you place an order.
                </p>

                <a href="{{ route('products.index') }}">
                    START SHOPPING
                </a>

            </div>

        @else

            <div class="bb-history-list">

                @foreach ($orders as $order)

                    @php
                        $statusClass = strtolower(
                            trim(
                                str_replace(
                                    ' ',
                                    '-',
                                    $order->status ?? 'pending'
                                )
                            )
                        );
                    @endphp

                    <article class="bb-order-card">

                        <div class="bb-order-head">

                            <div class="bb-order-info">

                                <div class="bb-order-number">
                                    ORDER NO:
                                    <span>
                                        #ORD-{{ $order->created_at->timestamp }}
                                    </span>
                                </div>

                                <div class="bb-order-meta">

                                    <div class="bb-order-meta-item">

                                        <span class="bb-order-meta-label">
                                            DATE
                                        </span>

                                        <span>
                                            {{ $order->created_at->format('d M Y H:i') }}
                                        </span>

                                    </div>

                                    <div class="bb-order-meta-item">

                                        <span class="bb-order-meta-label">
                                            STATUS
                                        </span>

                                        <span class="bb-order-status {{ $statusClass }}">
                                            {{ ucfirst($order->status) }}
                                        </span>

                                    </div>

                                </div>

                            </div>


                            <div class="bb-order-total">

                                <div class="bb-order-total-label">
                                    ORDER TOTAL
                                </div>

                                <div class="bb-order-total-price">
                                    {{ number_format($order->total_price, 2) }}฿
                                </div>

                            </div>

                        </div>


                        <div class="bb-order-products">

                            <div class="bb-order-products-head">

                                <div>
                                    PRODUCT
                                </div>

                                <div style="text-align:center;">
                                    QUANTITY
                                </div>

                                <div style="text-align:right;">
                                    PRICE
                                </div>

                            </div>


                            @foreach ($order->orderItems as $item)

                                <div class="bb-order-product">

                                    <div class="bb-order-product-name">

                                        @if ($item->product)

                                            <a href="{{ route('products.show', $item->product->id) }}">
                                                {{ $item->product->name }}
                                            </a>

                                        @else

                                            <span>
                                                Product unavailable
                                            </span>

                                        @endif

                                    </div>


                                    <div class="bb-order-product-qty">

                                        <span class="bb-mobile-label">
                                            QUANTITY
                                        </span>

                                        <span>
                                            {{ $item->quantity }}
                                        </span>

                                    </div>


                                    <div class="bb-order-product-price">

                                        <span class="bb-mobile-label">
                                            PRICE
                                        </span>

                                        <span>
                                            {{ number_format($item->price, 2) }}฿
                                        </span>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </article>

                @endforeach

            </div>


            <div class="bb-history-pagination">
                {{ $orders->links() }}
            </div>

        @endif

    </main>

</div>

</x-guest-layout>