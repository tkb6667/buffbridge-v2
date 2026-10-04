<x-guest-layout>

<style>
.bb-checkout-page,
.bb-checkout-page * {
    box-sizing: border-box;
}

.bb-checkout-page {
    --bb-orange: #ffa51f;
    --bb-yellow: #ffd429;
    --bb-dark: #111216;
    --bb-line: #e4e4e4;
    --bb-text: #111;
    --bb-muted: #777;
    background: #f6f6f6;
    color: var(--bb-text);
    font-family: Arial, Helvetica, sans-serif;
}

.bb-checkout-hero {
    background: var(--bb-dark);
    color: #fff;
}

.bb-checkout-hero-inner {
    width: min(1180px, calc(100% - 40px));
    min-height: 118px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
}

.bb-checkout-title {
    margin: 0 !important;
    color: #fff !important;
    font-size: 24px !important;
    font-weight: 900 !important;
    font-style: italic;
    line-height: 1;
    text-transform: uppercase;
}

.bb-checkout-breadcrumb {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
    color: #777;
    font-size: 10px;
    font-weight: 800;
    text-transform: uppercase;
}

.bb-checkout-breadcrumb a {
    color: #fff !important;
    text-decoration: none !important;
}

.bb-checkout-content {
    width: min(1180px, calc(100% - 40px));
    margin: 0 auto;
    padding: 46px 0 72px;
}

.bb-checkout-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.1fr) minmax(360px, .9fr);
    gap: 28px;
    align-items: start;
}

.bb-checkout-stack {
    display: grid;
    gap: 20px;
}

.bb-checkout-card {
    padding: 28px;
    background: #fff;
    border: 1px solid var(--bb-line);
}

.bb-checkout-card-title {
    margin: 0 0 20px !important;
    color: #111 !important;
    font-size: 20px !important;
    font-weight: 900 !important;
    font-style: italic;
    text-transform: uppercase;
}

.bb-checkout-alert {
    border-top: 3px solid var(--bb-orange);
}

.bb-checkout-alert h2 {
    margin: 0 0 10px !important;
    color: #111 !important;
    font-size: 20px !important;
    font-weight: 900 !important;
}

.bb-checkout-alert p {
    margin: 0 0 10px !important;
    color: #777;
    font-size: 12px;
    line-height: 1.65;
}

.bb-contact-buttons {
    margin-top: 18px;
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 10px;
}

.bb-contact-btn {
    min-height: 46px;
    padding: 0 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 0;
    color: #fff !important;
    text-decoration: none !important;
    font-size: 10px;
    font-weight: 900;
    text-transform: uppercase;
}

.bb-contact-btn.facebook {
    background: #1877f2;
}

.bb-contact-btn.line {
    background: #06c755;
}

.bb-contact-btn.telegram {
    background: #229ED9;
}

.bb-order-note {
    margin-top: 14px;
    padding: 12px 14px;
    background: #f7f7f7;
    color: #777;
    font-size: 11px;
    line-height: 1.6;
}

.bb-billing-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 16px;
}

.bb-field-wide {
    grid-column: 1 / -1;
}

.bb-field label {
    display: block;
    margin: 0 0 7px;
    color: #111;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: 1.1px;
    text-transform: uppercase;
}

.bb-required {
    color: var(--bb-orange);
}

.bb-field input {
    width: 100% !important;
    height: 46px !important;
    margin: 0 !important;
    padding: 0 14px !important;
    border: 1px solid #d9d9d9 !important;
    border-radius: 0 !important;
    outline: 0 !important;
    background: #fff !important;
    color: #111 !important;
    font-size: 13px !important;
    box-shadow: none !important;
}

.bb-field input:focus {
    border-color: var(--bb-orange) !important;
}

.bb-payment-options {
    display: grid;
    gap: 9px;
}

.bb-payment-option {
    min-height: 42px;
    padding: 0 12px;
    display: flex;
    align-items: center;
    gap: 10px;
    border: 1px solid var(--bb-line);
    cursor: pointer;
    color: #333;
    font-size: 12px;
}

.bb-payment-option input[type="radio"] {
    width: 17px;
    height: 17px;
    margin: 0;
    accent-color: var(--bb-orange);
}

.bb-payment-qr {
    margin-top: 14px;
    padding: 16px;
    display: none;
    border: 1px solid var(--bb-line);
    background: #fafafa;
    text-align: center;
}

.bb-payment-qr img {
    display: block;
    width: min(330px, 100%);
    max-height: 330px;
    margin: 0 auto 10px;
    object-fit: contain;
}

.bb-payment-qr p {
    margin: 0 !important;
    color: #777;
    font-size: 11px;
}

.bb-file-upload {
    width: 100%;
    min-height: 48px;
    display: flex;
    align-items: stretch;
    border: 1px solid var(--bb-line);
    background: #fafafa;
}

.bb-file-upload input[type="file"] {
    display: none;
}

.bb-file-upload-button {
    min-width: 128px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
    padding: 0 16px;
    background: var(--bb-orange);
    color: #fff;
    font-size: 9px;
    font-weight: 900;
    letter-spacing: .5px;
    cursor: pointer;
    text-transform: uppercase;
}

.bb-file-upload-button:hover {
    background: #ffb84a;
}

.bb-file-upload-name {
    min-width: 0;
    flex: 1;
    padding: 0 14px;
    display: flex;
    align-items: center;
    overflow: hidden;
    color: #777;
    font-size: 11px;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.bb-slip-preview {
    margin-top: 14px;
    display: none;
}

.bb-slip-preview p {
    margin: 0 0 8px !important;
    color: #777;
    font-size: 11px;
}

.bb-slip-preview img {
    display: block;
    width: min(320px, 100%);
    max-height: 320px;
    object-fit: contain;
    border: 1px solid var(--bb-line);
}

.bb-order-list {
    border: 1px solid var(--bb-line);
}

.bb-order-row {
    padding: 13px 14px;
    display: grid;
    grid-template-columns: minmax(0, 1fr) auto;
    gap: 16px;
    border-top: 1px solid var(--bb-line);
    font-size: 11px;
}

.bb-order-row:first-child {
    border-top: 0;
}

.bb-order-name {
    color: #333;
    line-height: 1.45;
}

.bb-order-name strong {
    color: #888;
    font-weight: 700;
}

.bb-order-price {
    color: #111;
    font-weight: 800;
    white-space: nowrap;
}

.bb-order-totals {
    margin-top: 14px;
    border: 1px solid var(--bb-line);
}

.bb-order-total-row {
    min-height: 42px;
    padding: 0 14px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    border-top: 1px solid var(--bb-line);
    font-size: 11px;
}

.bb-order-total-row:first-child {
    border-top: 0;
}

.bb-order-total-row span:first-child {
    color: #777;
}

.bb-order-total-row.is-total {
    font-size: 13px;
    font-weight: 900;
}

.bb-order-total-row.is-total strong {
    color: var(--bb-orange);
}

.bb-place-order {
    width: 100%;
    min-height: 50px;
    margin-top: 16px;
    border: 0;
    background: var(--bb-orange);
    color: #fff;
    font-size: 10px;
    font-weight: 900;
    letter-spacing: .5px;
    text-transform: uppercase;
    cursor: pointer;
}

.bb-place-order:hover {
    background: #ffb84a;
}

@media (max-width: 1024px) {
    .bb-checkout-hero-inner,
    .bb-checkout-content {
        width: min(920px, calc(100% - 32px));
    }

    .bb-checkout-grid {
        grid-template-columns: 1fr;
    }

    .bb-checkout-stack.is-side {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .bb-checkout-stack.is-side .bb-order-card {
        grid-column: 1 / -1;
    }
}

@media (max-width: 768px) {
    .bb-checkout-hero-inner {
        min-height: 150px;
        padding: 28px 0;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    .bb-checkout-title {
        font-size: 22px !important;
    }

    .bb-checkout-content {
        width: calc(100% - 28px);
        padding: 28px 0 50px;
    }

    .bb-checkout-stack.is-side {
        grid-template-columns: 1fr;
    }

    .bb-checkout-card {
        padding: 22px;
    }

    .bb-contact-buttons {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .bb-payment-qr {
        padding: 18px;
    }

    .bb-payment-qr img {
        width: min(300px, 100%);
        max-height: 300px;
    }
}

@media (max-width: 560px) {

    .bb-checkout-content {
        width: calc(100% - 24px);
    }

    .bb-checkout-card {
        padding: 18px;
    }

    .bb-billing-grid {
        grid-template-columns: 1fr;
    }

    .bb-field-wide {
        grid-column: auto;
    }

    .bb-field input {
        font-size: 16px !important;
    }

    .bb-checkout-card-title {
        font-size: 18px !important;
    }

    .bb-payment-qr {
        padding: 14px;
    }

    .bb-payment-qr img {
        width: min(260px, 100%);
        max-height: 260px;
        margin-bottom: 10px;
    }

    .bb-file-upload {
        flex-direction: column;
    }

    .bb-file-upload-button {
        width: 100%;
        min-height: 44px;
    }

    .bb-file-upload-name {
        min-height: 40px;
    }
}
</style>

<div class="bb-checkout-page">

    <section class="bb-checkout-hero">
        <div class="bb-checkout-hero-inner">

            <h1 class="bb-checkout-title">
                CHECKOUT
            </h1>

            <div class="bb-checkout-breadcrumb">
                <a href="{{ route('home') }}">HOME</a>
                <span>/</span>
                <a href="{{ route('products.index') }}">SHOP</a>
                <span>/</span>
                <span>CHECKOUT</span>
            </div>

        </div>
    </section>

    <main class="bb-checkout-content">

        <form
            name="checkout"
            method="POST"
            action="{{ route('checkout.process') }}"
            enctype="multipart/form-data"
            class="bb-checkout-grid"
        >
            @csrf

            <div class="bb-checkout-stack">

<section class="bb-checkout-card bb-checkout-alert">

    <h2>Payment System Temporarily Unavailable</h2>

    <p>
        Our online payment system is currently experiencing technical difficulties.
        You can complete your purchase by contacting us directly via Facebook, LINE, or Telegram.
    </p>

    <p>
        We apologize for any inconvenience.
    </p>

    <div class="bb-contact-buttons">

        <a
            href="https://www.facebook.com/share/1T8y5fqB3M/?mibextid=wwXIfr"
            target="_blank"
            rel="noopener noreferrer"
            class="bb-contact-btn facebook"
        >
            CONTACT ON FACEBOOK
        </a>

        <a
            href="https://lin.ee/FLk15Ps"
            target="_blank"
            rel="noopener noreferrer"
            class="bb-contact-btn line"
        >
            CONTACT ON LINE
        </a>

        <a
            href="https://t.me/buffv4"
            target="_blank"
            rel="noopener noreferrer"
            class="bb-contact-btn telegram"
        >
            CONTACT ON TELEGRAM
        </a>

    </div>

    <div class="bb-order-note">
        Your order details will remain saved. Please contact us to finalize your purchase.
    </div>

</section>

                <section class="bb-checkout-card">

                    <h2 class="bb-checkout-card-title">
                        BILLING DETAILS
                    </h2>

                    <div class="bb-billing-grid">

                        <div class="bb-field">
                            <label for="billing_first_name">
                                NAME <span class="bb-required">*</span>
                            </label>

                            <input
                                type="text"
                                name="billing_first_name"
                                id="billing_first_name"
                                value="{{ old('billing_first_name', $customer->name ?? '') }}"
                                required
                            >
                        </div>

                        <div class="bb-field">
                            <label for="billing_phone">
                                PHONE <span class="bb-required">*</span>
                            </label>

                            <input
                                type="tel"
                                name="billing_phone"
                                id="billing_phone"
                                value="{{ old('billing_phone', $customer->phone ?? '') }}"
                                required
                            >
                        </div>

                        <div class="bb-field bb-field-wide">
                            <label for="billing_email">
                                EMAIL ADDRESS <span class="bb-required">*</span>
                            </label>

                            <input
                                type="email"
                                name="billing_email"
                                id="billing_email"
                                value="{{ old('billing_email', $customer->email ?? '') }}"
                                required
                            >
                        </div>

                        <div class="bb-field bb-field-wide">
                            <label for="billing_house_number">
                                ADDRESS <span class="bb-required">*</span>
                            </label>

                            <input
                                type="text"
                                name="billing_house_number"
                                id="billing_house_number"
                                value="{{ old('billing_house_number', $customer->house_number ?? '') }}"
                                required
                            >
                        </div>

                        <div class="bb-field">
                            <label for="billing_subdistrict">
                                SUBDISTRICT (ตำบล) <span class="bb-required">*</span>
                            </label>

                            <input
                                type="text"
                                name="billing_subdistrict"
                                id="billing_subdistrict"
                                value="{{ old('billing_subdistrict', $customer->subdistrict ?? '') }}"
                                required
                            >
                        </div>

                        <div class="bb-field">
                            <label for="billing_district">
                                DISTRICT (อำเภอ) <span class="bb-required">*</span>
                            </label>

                            <input
                                type="text"
                                name="billing_district"
                                id="billing_district"
                                value="{{ old('billing_district', $customer->district ?? '') }}"
                                required
                            >
                        </div>

                        <div class="bb-field">
                            <label for="billing_province">
                                PROVINCE (จังหวัด) <span class="bb-required">*</span>
                            </label>

                            <input
                                type="text"
                                name="billing_province"
                                id="billing_province"
                                value="{{ old('billing_province', $customer->province ?? '') }}"
                                required
                            >
                        </div>

                        <div class="bb-field">
                            <label for="billing_postcode">
                                POSTAL CODE <span class="bb-required">*</span>
                            </label>

                            <input
                                type="text"
                                name="billing_postcode"
                                id="billing_postcode"
                                value="{{ old('billing_postcode', $customer->postal_code ?? '') }}"
                                required
                            >
                        </div>

                    </div>

                </section>

            </div>

            <div class="bb-checkout-stack is-side">

                <section class="bb-checkout-card">

                    <h2 class="bb-checkout-card-title">
                        PAYMENT TYPE
                    </h2>

                    <div class="bb-payment-options">

                        <label class="bb-payment-option">
                            <input
                                type="radio"
                                name="payment_type"
                                value="credit_card"
                                id="payment_credit_card"
                            >
                            <span>Credit Card</span>
                        </label>

                        <label class="bb-payment-option">
                            <input
                                type="radio"
                                name="payment_type"
                                value="wechat"
                                id="payment_wechat"
                            >
                            <span>WeChat</span>
                        </label>

                        <label class="bb-payment-option">
                            <input
                                type="radio"
                                name="payment_type"
                                value="alipay"
                                id="payment_alipay"
                            >
                            <span>Alipay</span>
                        </label>

                    </div>

                    <div id="payment_qr_credit_card" class="bb-payment-qr">
                        <img src="/payment/info/credit-card.jpg" alt="Credit Card QR">
                        <p>Scan to pay with Credit Card</p>
                    </div>

                    <div id="payment_qr_wechat" class="bb-payment-qr">
                        <img src="/payment/info/wechat.jpg" alt="WeChat QR">
                        <p>Scan to pay with WeChat</p>
                    </div>

                    <div id="payment_qr_alipay" class="bb-payment-qr">
                        <img src="/payment/info/wechat.jpg" alt="Alipay QR">
                        <p>Scan to pay with Alipay</p>
                    </div>

                </section>

                <section class="bb-checkout-card">

                    <h2 class="bb-checkout-card-title">
                        UPLOAD PAYMENT SLIP
                    </h2>

                    <div class="bb-file-upload">
                        <label for="payment_slip" class="bb-file-upload-button">
                            CHOOSE FILE
                        </label>

                        <span id="payment_slip_name" class="bb-file-upload-name">
                            No file chosen
                        </span>

                        <input
                            type="file"
                            name="payment_slip"
                            id="payment_slip"
                            accept="image/*"
                            onchange="previewSlip(event)"
                        >
                    </div>

                    <div id="slip_preview" class="bb-slip-preview">
                        <p>Preview</p>

                        <img
                            id="slip_img"
                            src="#"
                            alt="Slip Preview"
                        >
                    </div>

                </section>

                <section class="bb-checkout-card bb-order-card">

                    <h2 class="bb-checkout-card-title">
                        YOUR ORDER
                    </h2>

                    <div class="bb-order-list">

                        @foreach ($cartItems as $item)

                            <div class="bb-order-row">

                                <div class="bb-order-name">
                                    {{ $item->product->name }}
                                    <strong>× {{ $item->quantity }}</strong>
                                </div>

                                <div class="bb-order-price">
                                    {{ number_format($item->product->price * $item->quantity, 2) }}฿
                                </div>

                            </div>

                        @endforeach

                    </div>

                    <div class="bb-order-totals">

                        <div class="bb-order-total-row">
                            <span>Subtotal</span>
                            <strong>{{ number_format($subtotal, 2) }}฿</strong>
                        </div>

                        <div class="bb-order-total-row is-total">
                            <span>Total</span>
                            <strong>{{ number_format($subtotal, 2) }}฿</strong>
                        </div>

                    </div>

                    <button
                        type="submit"
                        name="woocommerce_checkout_place_order"
                        id="place_order"
                        class="bb-place-order"
                        value="Place order"
                    >
                        PLACE ORDER
                    </button>

                </section>

            </div>

        </form>

    </main>

</div>

<x-slot name="script">
<script>
document.addEventListener('DOMContentLoaded', function () {
    const qrMap = {
        credit_card: document.getElementById('payment_qr_credit_card'),
        wechat: document.getElementById('payment_qr_wechat'),
        alipay: document.getElementById('payment_qr_alipay')
    };

    document.querySelectorAll('input[name="payment_type"]').forEach(function (radio) {
        radio.addEventListener('change', function () {
            Object.values(qrMap).forEach(function (element) {
                if (element) {
                    element.style.display = 'none';
                }
            });

            if (qrMap[this.value]) {
                qrMap[this.value].style.display = 'block';
            }
        });
    });
});

function previewSlip(event) {
    const input = event.target;
    const fileName = document.getElementById('payment_slip_name');
    const preview = document.getElementById('slip_preview');
    const image = document.getElementById('slip_img');

    if (input.files && input.files[0]) {
        fileName.textContent = input.files[0].name;

        const reader = new FileReader();

        reader.onload = function (e) {
            image.src = e.target.result;
            preview.style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        fileName.textContent = 'No file chosen';
        preview.style.display = 'none';
    }
}
</script>
</x-slot>

</x-guest-layout>
