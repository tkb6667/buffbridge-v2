<x-guest-layout>
<style>
.bb-cart-page,
.bb-cart-page * {
    box-sizing: border-box;
}

.bb-cart-page {
    --bb-orange: #ffa51f;
    --bb-yellow: #ffd429;
    --bb-dark: #111216;
    --bb-line: #e7e7e7;
    --bb-text: #111;
    --bb-muted: #777;
    background: #fff;
    color: var(--bb-text);
    font-family: Arial, Helvetica, sans-serif;
}

.bb-cart-hero {
    background: var(--bb-dark);
    color: #fff;
}

.bb-cart-hero-inner {
    width: min(1180px, calc(100% - 40px));
    min-height: 118px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
}

.bb-cart-title {
    margin: 0 !important;
    color: #fff !important;
    font-size: 24px !important;
    font-weight: 900 !important;
    font-style: italic;
    line-height: 1;
    text-transform: uppercase;
}

.bb-cart-breadcrumb {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
    color: #777;
    font-size: 10px;
    font-weight: 800;
    text-transform: uppercase;
}

.bb-cart-breadcrumb a {
    color: #fff !important;
    text-decoration: none !important;
}

.bb-cart-breadcrumb .is-current {
    color: #777;
}

.bb-cart-content {
    width: min(1180px, calc(100% - 40px));
    margin: 0 auto;
    padding: 52px 0 76px;
}

.bb-cart-list {
    border: 1px solid var(--bb-line);
    background: #fff;
}

.bb-cart-head,
.bb-cart-row {
    display: grid;
    grid-template-columns: 40px 86px minmax(0, 1fr) 120px 100px 120px;
    align-items: center;
    gap: 16px;
}

.bb-cart-head {
    min-height: 42px;
    padding: 0 16px;
    background: #1d1e22;
    color: #fff;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: .9px;
    text-transform: uppercase;
}

.bb-cart-row {
    min-height: 112px;
    padding: 14px 16px;
    border-top: 1px solid var(--bb-line);
}

.bb-cart-row:first-of-type {
    border-top: 0;
}

.bb-cart-remove-form {
    margin: 0;
}

.bb-cart-remove {
    width: 27px;
    height: 27px;
    padding: 0;
    border: 0;
    background: var(--bb-orange);
    color: #fff;
    font-size: 18px;
    line-height: 1;
    cursor: pointer;
}

.bb-cart-thumb {
    width: 78px;
    height: 78px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: #fff;
}

.bb-cart-thumb img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.bb-cart-thumb-placeholder {
    width: 100%;
    height: 100%;
    display: grid;
    place-items: center;
    border: 1px solid var(--bb-line);
    color: #aaa;
    font-size: 9px;
    font-weight: 800;
}

.bb-cart-name a {
    color: #111 !important;
    text-decoration: none !important;
    font-size: 12px;
    font-weight: 800;
    line-height: 1.45;
}

.bb-cart-name a:hover {
    color: var(--bb-orange) !important;
}

.bb-cart-variant {
    margin: 5px 0 0 !important;
    color: #888;
    font-size: 10px;
}

.bb-cart-price,
.bb-cart-total {
    color: #666;
    font-size: 12px;
    text-align: right;
    white-space: nowrap;
}

.bb-cart-total {
    color: #111;
    font-weight: 800;
}

.bb-cart-qty {
    text-align: center;
}

.bb-cart-qty input {
    width: 64px !important;
    height: 38px !important;
    margin: 0 !important;
    padding: 0 8px !important;
    border: 1px solid #ddd !important;
    border-radius: 0 !important;
    outline: 0 !important;
    background: #fff !important;
    color: #111 !important;
    text-align: center;
    box-shadow: none !important;
}

.bb-cart-mobile-label {
    display: none;
}

.bb-cart-bottom {
    margin-top: 28px;
    display: flex;
    justify-content: flex-end;
}

.bb-cart-summary {
    width: min(470px, 100%);
}

.bb-cart-summary h2 {
    margin: 0 0 10px !important;
    color: #111 !important;
    font-size: 22px !important;
    font-weight: 900 !important;
    font-style: italic;
    text-align: right;
    text-transform: uppercase;
}

.bb-cart-summary-table {
    border: 1px solid var(--bb-line);
}

.bb-cart-summary-row {
    min-height: 44px;
    padding: 0 18px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    border-top: 1px solid var(--bb-line);
    font-size: 12px;
}

.bb-cart-summary-row:first-child {
    border-top: 0;
}

.bb-cart-summary-row span:first-child {
    color: #777;
}

.bb-cart-summary-row strong {
    color: #111;
}

.bb-cart-checkout {
    width: 100%;
    min-height: 50px;
    margin-top: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--bb-orange);
    color: #fff !important;
    text-decoration: none !important;
    font-size: 10px;
    font-weight: 900;
    letter-spacing: .5px;
    text-transform: uppercase;
    transition: background .2s ease;
}

.bb-cart-checkout:hover {
    background: #ffb84a;
    color: #fff !important;
}

.bb-cart-empty {
    min-height: 280px;
    padding: 44px 24px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--bb-line);
    text-align: center;
}

.bb-cart-empty h2 {
    margin: 0 0 8px !important;
    color: #111 !important;
    font-size: 26px !important;
    font-weight: 900 !important;
    font-style: italic;
}

.bb-cart-empty p {
    margin: 0 0 22px !important;
    color: #888;
    font-size: 12px;
}

.bb-cart-empty a {
    min-width: 210px;
    min-height: 48px;
    padding: 0 20px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: var(--bb-orange);
    color: #fff !important;
    text-decoration: none !important;
    font-size: 10px;
    font-weight: 900;
}

/* REMOVE ITEM MODAL */

.bb-remove-modal {
    position: fixed;
    inset: 0;
    z-index: 99999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.bb-remove-modal.is-open {
    display: flex;
}

.bb-remove-modal-backdrop {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, .68);
    backdrop-filter: blur(2px);
    -webkit-backdrop-filter: blur(2px);
}

.bb-remove-modal-dialog {
    position: relative;
    z-index: 1;
    width: min(430px, 100%);
    padding: 28px;
    background: #fff;
    border-top: 4px solid var(--bb-yellow);
    box-shadow: 0 20px 60px rgba(0, 0, 0, .28);
    animation: bbRemoveModalIn .18s ease-out;
}

@keyframes bbRemoveModalIn {
    from {
        opacity: 0;
        transform: translateY(8px) scale(.98);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.bb-remove-modal-close {
    position: absolute;
    top: 14px;
    right: 14px;
    width: 32px;
    height: 32px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 0;
    background: transparent;
    color: #777;
    font-size: 22px;
    line-height: 1;
    cursor: pointer;
}

.bb-remove-modal-close:hover {
    color: #111;
}

.bb-remove-modal-kicker {
    margin-bottom: 9px;
    color: #c99700;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: 1.5px;
    text-transform: uppercase;
}

.bb-remove-modal-title {
    margin: 0 36px 10px 0 !important;
    color: #111 !important;
    font-size: 22px !important;
    line-height: 1.1;
    font-weight: 900 !important;
    font-style: italic;
    text-transform: uppercase;
}

.bb-remove-modal-text {
    margin: 0 !important;
    color: #777;
    font-size: 12px;
    line-height: 1.6;
}

.bb-remove-modal-product {
    margin-top: 12px;
    padding: 11px 13px;
    border-left: 3px solid var(--bb-yellow);
    background: #f7f7f7;
    color: #111;
    font-size: 11px;
    line-height: 1.45;
    font-weight: 800;
    word-break: break-word;
}

.bb-remove-modal-actions {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 9px;
    margin-top: 24px;
}

.bb-remove-modal-cancel,
.bb-remove-modal-confirm {
    width: 100%;
    height: 44px;
    padding: 0 14px;
    border-radius: 0;
    cursor: pointer;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: .6px;
    text-transform: uppercase;
}

.bb-remove-modal-cancel {
    border: 1px solid #111;
    background: #fff;
    color: #111;
}

.bb-remove-modal-cancel:hover {
    background: #f3f3f3;
}

.bb-remove-modal-confirm {
    border: 1px solid #111;
    background: #111;
    color: #fff;
}

.bb-remove-modal-confirm:hover {
    border-color: var(--bb-yellow);
    background: var(--bb-yellow);
    color: #111;
}

.bb-remove-modal-confirm:disabled {
    opacity: .65;
    cursor: wait;
}

body.bb-remove-modal-open {
    overflow: hidden;
}

@media (max-width: 1024px) {
    .bb-cart-hero-inner,
    .bb-cart-content {
        width: min(920px, calc(100% - 32px));
    }

    .bb-cart-head,
    .bb-cart-row {
        grid-template-columns: 36px 76px minmax(0, 1fr) 100px 90px 105px;
        gap: 12px;
    }

    .bb-cart-thumb {
        width: 68px;
        height: 68px;
    }
}

@media (max-width: 768px) {
    .bb-cart-hero-inner {
        min-height: 150px;
        padding: 28px 0;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .bb-cart-title {
        font-size: 22px !important;
    }

    .bb-cart-content {
        width: calc(100% - 28px);
        padding: 28px 0 50px;
    }

    .bb-cart-head {
        display: none;
    }

    .bb-cart-list {
        border: 0;
        background: transparent;
    }

    .bb-cart-row {
        position: relative;
        min-height: 0;
        margin-bottom: 14px;
        padding: 16px;
        display: grid;
        grid-template-columns: 92px minmax(0, 1fr);
        grid-template-areas:
            "image name"
            "image price"
            "image qty"
            "image total";
        align-items: start;
        gap: 10px 14px;
        border: 1px solid var(--bb-line);
        background: #fff;
    }

    .bb-cart-remove-form {
        position: absolute;
        top: 8px;
        right: 8px;
        z-index: 2;
    }

    .bb-cart-thumb {
        grid-area: image;
        width: 92px;
        height: 92px;
        align-self: start;
    }

    .bb-cart-name {
        grid-area: name;
        padding-right: 34px;
    }

    .bb-cart-name a {
        font-size: 12px;
    }

    .bb-cart-price,
    .bb-cart-qty,
    .bb-cart-total {
        margin: 0;
        min-height: 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        text-align: right;
    }

    .bb-cart-price {
        grid-area: price;
    }

    .bb-cart-qty {
        grid-area: qty;
    }

    .bb-cart-total {
        grid-area: total;
        padding-top: 4px;
        border-top: 1px solid #eeeeee;
    }

    .bb-cart-mobile-label {
        display: inline;
        color: #999;
        font-size: 9px;
        font-weight: 900;
        letter-spacing: .6px;
        text-transform: uppercase;
    }

    .bb-cart-qty input {
        width: 58px !important;
        height: 34px !important;
        font-size: 16px !important;
    }

    .bb-cart-bottom {
        margin-top: 22px;
    }

    .bb-cart-summary {
        width: 100%;
    }

    .bb-cart-summary h2 {
        font-size: 20px !important;
        text-align: left;
    }
}

@media (max-width: 480px) {
    .bb-cart-content {
        width: calc(100% - 24px);
    }

    .bb-cart-row {
        grid-template-columns: 84px minmax(0, 1fr);
        gap: 10px 12px;
        padding: 14px;
    }

    .bb-cart-thumb {
        width: 84px;
        height: 84px;
    }

    .bb-cart-name a {
        font-size: 11px;
    }

    .bb-cart-price,
    .bb-cart-total {
        font-size: 11px;
    }

    .bb-cart-price,
    .bb-cart-qty,
    .bb-cart-total {
        min-height: 28px;
    }

    .bb-remove-modal {
        padding: 14px;
    }

    .bb-remove-modal-dialog {
        width: 100%;
        padding: 23px 18px 18px;
    }

    .bb-remove-modal-title {
        font-size: 19px !important;
    }

    .bb-remove-modal-text {
        font-size: 11px;
    }

    .bb-remove-modal-product {
        font-size: 10px;
    }

    .bb-remove-modal-actions {
        gap: 7px;
        margin-top: 20px;
    }

    .bb-remove-modal-cancel,
    .bb-remove-modal-confirm {
        height: 42px;
        padding: 0 8px;
        font-size: 8px;
    }
}
</style>

<div class="bb-cart-page">

    <section class="bb-cart-hero">
        <div class="bb-cart-hero-inner">

            <h1 class="bb-cart-title">YOUR CART</h1>

            <div class="bb-cart-breadcrumb">
                <a href="{{ route('home') }}">HOME</a>
                <span>/</span>
                <a href="{{ route('products.index') }}">SHOP</a>
                <span>/</span>
                <span class="is-current">YOUR CART</span>
            </div>

        </div>
    </section>

    <main class="bb-cart-content">

        @if ($cartItems->isEmpty())

            <div class="bb-cart-empty">
                <h2>YOUR CART IS EMPTY</h2>
                <p>Add something you like and come back here when you're ready.</p>
                <a href="{{ route('products.index') }}">CONTINUE SHOPPING</a>
            </div>

        @else

            <div class="bb-cart-list">

                <div class="bb-cart-head">
                    <div></div>
                    <div></div>
                    <div>PRODUCT</div>
                    <div style="text-align:right;">PRICE</div>
                    <div style="text-align:center;">QUANTITY</div>
                    <div style="text-align:right;">TOTAL</div>
                </div>

                @foreach ($cartItems as $item)

                    @php
                        $firstImage = $item->product->images->first();

                        $imageUrl = $firstImage
                            ? rtrim(env('APP_ADMIN_URL'), '/') . '/storage/' . ltrim($firstImage->image_path, '/')
                            : null;
                    @endphp

                    <div class="bb-cart-row">

                        <form
                            class="bb-cart-remove-form"
                            action="{{ route('cart.remove', $item->id) }}"
                            method="POST"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="button"
                                class="bb-cart-remove"
                                aria-label="Remove {{ $item->product->name }}"
                                data-bb-remove-item
                                data-product-name="{{ $item->product->name }}"
                            >
                                ×
                            </button>
                        </form>

                        <a
                            href="{{ route('products.show', $item->product->id) }}"
                            class="bb-cart-thumb"
                        >
                            @if ($imageUrl)
                                <img
                                    src="{{ $imageUrl }}"
                                    alt="{{ $item->product->name }}"
                                    loading="lazy"
                                >
                            @else
                                <span class="bb-cart-thumb-placeholder">NO IMAGE</span>
                            @endif
                        </a>

                        <div class="bb-cart-name">

                            <a href="{{ route('products.show', $item->product->id) }}">
                                {{ $item->product->name }}
                            </a>

                            @if ($item->variant)
                                <p class="bb-cart-variant">
                                    Variant: {{ $item->variant->type }}
                                </p>
                            @endif

                        </div>

                        <div class="bb-cart-price">
                            <span class="bb-cart-mobile-label">PRICE</span>
                            <span>{{ number_format($item->price, 2) }}฿</span>
                        </div>

                        <div class="bb-cart-qty">
                            <span class="bb-cart-mobile-label">QTY</span>

                            <input
                                type="number"
                                class="update-cart"
                                data-id="{{ $item->id }}"
                                min="1"
                                step="1"
                                value="{{ $item->quantity }}"
                                aria-label="Quantity for {{ $item->product->name }}"
                            >
                        </div>

                        <div class="bb-cart-total">
                            <span class="bb-cart-mobile-label">TOTAL</span>
                            <span>{{ number_format($item->price * $item->quantity, 2) }}฿</span>
                        </div>

                    </div>

                @endforeach

            </div>

            @php
                $cartTotal = $cartItems->sum(
                    fn ($item) => $item->price * $item->quantity
                );
            @endphp

            <div class="bb-cart-bottom">

                <div class="bb-cart-summary">

                    <h2>CART TOTALS</h2>

                    <div class="bb-cart-summary-table">

                        <div class="bb-cart-summary-row">
                            <span>Subtotal</span>
                            <strong>{{ number_format($cartTotal, 2) }}฿</strong>
                        </div>

                        <div class="bb-cart-summary-row">
                            <span>Total</span>
                            <strong>{{ number_format($cartTotal, 2) }}฿</strong>
                        </div>

                    </div>

                    <a
                        href="{{ route('checkout.index') }}"
                        class="bb-cart-checkout"
                    >
                        PROCEED TO CHECKOUT
                    </a>

                </div>

            </div>

        @endif

    </main>

    <div
        class="bb-remove-modal"
        id="bbRemoveModal"
        role="dialog"
        aria-modal="true"
        aria-labelledby="bbRemoveModalTitle"
        aria-hidden="true"
    >
        <div
            class="bb-remove-modal-backdrop"
            data-bb-remove-close
        ></div>

        <div class="bb-remove-modal-dialog">

            <button
                type="button"
                class="bb-remove-modal-close"
                data-bb-remove-close
                aria-label="Close"
            >
                ×
            </button>

            <div class="bb-remove-modal-kicker">
                YOUR CART
            </div>

            <h2
                class="bb-remove-modal-title"
                id="bbRemoveModalTitle"
            >
                REMOVE ITEM?
            </h2>

            <p class="bb-remove-modal-text">
                Are you sure you want to remove this product from your cart?
            </p>

            <div
                class="bb-remove-modal-product"
                id="bbRemoveProductName"
            ></div>

            <div class="bb-remove-modal-actions">

                <button
                    type="button"
                    class="bb-remove-modal-cancel"
                    data-bb-remove-close
                >
                    CANCEL
                </button>

                <button
                    type="button"
                    class="bb-remove-modal-confirm"
                    id="bbRemoveConfirm"
                >
                    REMOVE ITEM
                </button>

            </div>

        </div>
    </div>

</div>

<x-slot name="script">
<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.update-cart').forEach(function (input) {

        input.addEventListener('change', function () {

            const itemId = this.dataset.id;
            const newQty = Math.max(
                1,
                parseInt(this.value || '1', 10)
            );

            this.value = newQty;

            fetch("{{ route('cart.update') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    id: itemId,
                    quantity: newQty
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                }
            });

        });

    });


    const modal = document.getElementById('bbRemoveModal');
    const productName = document.getElementById('bbRemoveProductName');
    const confirmButton = document.getElementById('bbRemoveConfirm');

    let pendingRemoveForm = null;
    let lastTrigger = null;


    function openRemoveModal(button) {

        if (!modal) {
            return;
        }

        pendingRemoveForm = button.closest('.bb-cart-remove-form');
        lastTrigger = button;

        if (!pendingRemoveForm) {
            return;
        }

        if (productName) {
            productName.textContent =
                button.dataset.productName || 'Selected product';
        }

        if (confirmButton) {
            confirmButton.disabled = false;
            confirmButton.textContent = 'REMOVE ITEM';
        }

        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');

        document.body.classList.add('bb-remove-modal-open');

        setTimeout(function () {
            confirmButton?.focus();
        }, 0);
    }


    function closeRemoveModal() {

        if (!modal) {
            return;
        }

        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');

        document.body.classList.remove('bb-remove-modal-open');

        pendingRemoveForm = null;

        if (lastTrigger) {
            lastTrigger.focus();
        }

        lastTrigger = null;
    }


    document.querySelectorAll('[data-bb-remove-item]')
        .forEach(function (button) {

            button.addEventListener('click', function () {
                openRemoveModal(this);
            });

        });


    document.querySelectorAll('[data-bb-remove-close]')
        .forEach(function (button) {

            button.addEventListener('click', function () {
                closeRemoveModal();
            });

        });


    confirmButton?.addEventListener('click', function () {

        if (!pendingRemoveForm) {
            return;
        }

        const form = pendingRemoveForm;

        pendingRemoveForm = null;

        confirmButton.disabled = true;
        confirmButton.textContent = 'REMOVING...';

        form.submit();

    });


    document.addEventListener('keydown', function (event) {

        if (
            event.key === 'Escape' &&
            modal?.classList.contains('is-open')
        ) {
            closeRemoveModal();
        }

    });

});
</script>
</x-slot>

</x-guest-layout>