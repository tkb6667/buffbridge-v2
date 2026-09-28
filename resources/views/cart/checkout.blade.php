<x-guest-layout>
    <style>
        .contact-buttons {
            display: flex;
            flex-direction: column;
            /* Stack buttons vertically */
            gap: 15px;
            /* Space between buttons */
        }

        .btn {
            display: inline-flex;
            /* Allows icon and text to sit together */
            align-items: center;
            /* Vertically align icon and text */
            justify-content: center;
            /* Center content horizontally */
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            /* Remove underline from links */
            color: #fff;
            /* White text color */
            transition: background-color 0.3s ease, transform 0.2s ease;
            /* Smooth transitions */
            min-width: 200px;
            /* Ensure buttons have a minimum width */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
        }

        .btn i {
            margin-right: 10px;
            /* Space between icon and text */
            font-size: 20px;
            /* Adjust icon size */
        }

        /* Facebook Button Specific Styles */
        .btn.facebook {
            background-color: #1877F2;
            /* Facebook blue */
        }

        .btn.facebook:hover {
            background-color: #166FE5;
            /* Slightly darker blue on hover */
            transform: translateY(-2px);
            /* Lift effect on hover */
        }

        /* LINE Button Specific Styles */
        .btn.line {
            background-color: #06C755;
            /* LINE green */
        }

        .btn.line:hover {
            background-color: #05B84D;
            /* Slightly darker green on hover */
            transform: translateY(-2px);
            /* Lift effect on hover */
        }
    </style>
    <style>
        /* Wrapper Card */
        .woocommerce-payment-type,
        .woocommerce-upload-slip {
            background: #ffffff;
            padding: 20px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 25px;
        }

        /* Headings */
        .woocommerce-payment-type h3,
        .woocommerce-upload-slip h3 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #333;
        }

        /* Radio Options */
        .woocommerce-payment-type label {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 16px;
            color: #444;
        }

        /* Custom Radio */
        .woocommerce-payment-type input[type="radio"] {
            appearance: none;
            width: 18px;
            height: 18px;
            border: 2px solid #d79600;
            border-radius: 50%;
            position: relative;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .woocommerce-payment-type input[type="radio"]:checked {
            border-color: #b88300;
            background: #d79600;
        }

        .woocommerce-payment-type input[type="radio"]:checked::after {
            content: "";
            width: 8px;
            height: 8px;
            background: #fff;
            border-radius: 50%;
            position: absolute;
            top: 3px;
            left: 3px;
        }

        /* QR Display */
        .payment-qr {
            text-align: center;
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 8px;
            background: #fafafa;
            animation: fadeIn 0.3s ease;
        }

        .payment-qr img {
            max-width: 180px;
            margin-bottom: 10px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Upload Slip */
        .woocommerce-upload-slip input[type="file"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            background: #f9f9f9;
            width: 100%;
        }

        #slip_preview {
            margin-top: 12px;
            padding: 12px;
            background: #fafafa;
            border: 1px solid #eee;
            border-radius: 8px;
        }

        #slip_preview img {
            max-width: 350px;
            border-radius: 6px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.12);
        }

        @media (max-width: 767px) {

            .content_wrap {
                width: 100% !important;
                padding: 0 0.7rem 0 0.7rem !important;
                /* ใช้แค่ตรงนี้พอ */
            }
        }
    </style>
    <!-- Breadcrumbs -->
    <div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
        <div class="top_panel_title_inner top_panel_inner_style_1">
            <div class="content_wrap">
                <h1 class="page_title">Checkout</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="/">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <a class="breadcrumbs_item all" href="/products">Shop</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Checkout</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumbs -->
    <!-- Page Content -->
    <div class="page_content_wrap page_paddings_yes">
        <div class="content_wrap">
            <!-- Content -->
            <div class="content">
                <article class="post_item post_item_single">
                    <section class="post_content">
                        <div class="woocommerce">
                            {{-- <div class="woocommerce-info">Have a coupon?
                                <a href="#" class="showcoupon">Click here to enter your code</a>
                            </div> --}}
                            <form name="checkout" method="post" class="checkout woocommerce-checkout"
                                action="{{ route('checkout.process') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col2-set" id="customer_details">
                                    <!-- Billing Details -->
                                    <div class="col-1">
                                        <div class="payment-alert">
                                            <h2>Payment System Temporarily Unavailable</h2>
                                            <p>Our online payment system is currently experiencing technical
                                                difficulties. You can complete your purchase by contacting us directly
                                                via Facebook or LINE.</p>
                                            <p>We apologize for any inconvenience!</p>
                                        </div>

                                        <div class="contact-buttons">
                                            <a href="https://www.facebook.com/share/1ABFfSy5QZ/?mibextid=wwXIfr"
                                                target="_blank" class="btn facebook">
                                                <i class="fab fa-facebook-f"></i> Contact on Facebook
                                            </a>
                                            <a href="https://lin.ee/FLk15Ps" target="_blank" class="btn line">
                                                <i class="fab fa-line"></i> Contact on LINE
                                            </a>
                                        </div>

                                        <div class="order-summary">
                                            <p>Your order details will remain saved. Please contact us to finalize your
                                                purchase.</p>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Billing details</h3>
                                            <div class="woocommerce-billing-fields__field-wrapper">
                                                <!-- Existing billing fields -->
                                                <p class="form-row form-row-first validate-required">
                                                    <label for="billing_first_name">Name <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <input type="text" class="input-text" name="billing_first_name"
                                                        id="billing_first_name" value="{{ $customer->name ?? '' }}"
                                                        autofocus required />
                                                </p>
                                                <p class="form-row form-row-wide address-field validate-required">
                                                    <label for="billing_house_number">Address <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <input type="text" class="input-text" name="billing_house_number"
                                                        id="billing_house_number"
                                                        value="{{ $customer->house_number ?? '' }}" required />
                                                </p>
                                                <p class="form-row form-row-wide address-field validate-required">
                                                    <label for="billing_subdistrict">Subdistrict (ตำบล) <abbr
                                                            class="required" title="required">*</abbr></label>
                                                    <input type="text" class="input-text" name="billing_subdistrict"
                                                        id="billing_subdistrict"
                                                        value="{{ $customer->subdistrict ?? '' }}" required />
                                                </p>
                                                <p class="form-row form-row-wide address-field validate-required">
                                                    <label for="billing_district">District (อำเภอ) <abbr
                                                            class="required" title="required">*</abbr></label>
                                                    <input type="text" class="input-text" name="billing_district"
                                                        id="billing_district" value="{{ $customer->district ?? '' }}"
                                                        required />
                                                </p>
                                                <p class="form-row form-row-wide address-field validate-required">
                                                    <label for="billing_province">Province (จังหวัด) <abbr
                                                            class="required" title="required">*</abbr></label>
                                                    <input type="text" class="input-text" name="billing_province"
                                                        id="billing_province" value="{{ $customer->province ?? '' }}"
                                                        required />
                                                </p>
                                                <p
                                                    class="form-row form-row-wide address-field validate-required validate-postcode">
                                                    <label for="billing_postcode">Postal Code (รหัสไปรษณีย์) <abbr
                                                            class="required" title="required">*</abbr></label>
                                                    <input type="text" class="input-text" name="billing_postcode"
                                                        id="billing_postcode" value="{{ $customer->postal_code ?? '' }}"
                                                        required />
                                                </p>
                                                <p class="form-row form-row-first validate-required validate-phone">
                                                    <label for="billing_phone">Phone <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <input type="tel" class="input-text" name="billing_phone"
                                                        id="billing_phone" value="{{ $customer->phone ?? '' }}"
                                                        required />
                                                </p>
                                                <p class="form-row form-row-last validate-required validate-email">
                                                    <label for="billing_email">Email address <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <input type="email" class="input-text" name="billing_email"
                                                        id="billing_email" value="{{ $customer->email ?? '' }}"
                                                        required />
                                                </p>

                                                <!-- Payment Type Selection -->


                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <div class="woocommerce-payment-type">
                                    <h3>Payment Type</h3>
                                    <div>
                                        <label>
                                            <input type="radio" name="payment_type" value="credit_card"
                                                id="payment_credit_card">
                                            Credit Card
                                        </label>
                                        <label>
                                            <input type="radio" name="payment_type" value="wechat"
                                                id="payment_wechat">
                                            WeChat
                                        </label>
                                        <label>
                                            <input type="radio" name="payment_type" value="alipay"
                                                id="payment_alipay">
                                            Alipay
                                        </label>
                                    </div>
                                    <div id="payment_qr_credit_card" class="payment-qr"
                                        style="display:none; margin-top:10px;">
                                        <img src="/payment/info/credit-card.jpg" alt="Credit Card QR"
                                            style="max-width:350px;">
                                        <p>Scan to pay with Credit Card</p>
                                    </div>
                                    <div id="payment_qr_wechat" class="payment-qr"
                                        style="display:none; margin-top:10px;">
                                        <img src="/payment/info/wechat.jpg" alt="WeChat QR" style="max-width:350px;">
                                        <p>Scan to pay with WeChat</p>
                                    </div>
                                    <div id="payment_qr_alipay" class="payment-qr"
                                        style="display:none; margin-top:10px;">
                                        <img src="/payment/info/wechat.jpg" alt="Alipay QR" style="max-width:350px;">
                                        <p>Scan to pay with Alipay</p>
                                    </div>
                                </div>

                                <!-- Upload Slip -->
                                <div class="woocommerce-upload-slip" style="margin-top:20px;">
                                    <h3>Upload Payment Slip</h3>
                                    <input type="file" name="payment_slip" id="payment_slip" accept="image/*"
                                        onchange="previewSlip(event)">
                                    <div id="slip_preview" style="margin-top:10px; display:none;">
                                        <p>Preview:</p>
                                        <img id="slip_img" src="#" alt="Slip Preview"
                                            style="max-width:350px;">
                                    </div>
                                </div>
                                <!-- Your Order -->
                                <h3 id="order_review_heading" style="color: white !important;">Your order</h3>
                                <div id="order_review" class="woocommerce-checkout-review-order">
                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cartItems as $item)
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        {{ $item->product->name }} <strong class="product-quantity"
                                                            style="color: white;">&times;
                                                            {{ $item->quantity }}</strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="woocommerce-Price-amount amount"
                                                            style="color: white;">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol"></span>{{ number_format($item->product->price * $item->quantity, 2) }}฿
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th style="color: white;">Subtotal</th>
                                                <td>
                                                    <span class="woocommerce-Price-amount amount"
                                                        style="color: white;">
                                                        <span
                                                            class="woocommerce-Price-currencySymbol"></span>{{ number_format($subtotal, 2) }}฿
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th style="color: #fea526;">Total</th>
                                                <td>
                                                    <strong>
                                                        <span class="woocommerce-Price-amount amount"
                                                            style="color: #fea526;">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol"></span>{{ number_format($subtotal, 2) }}฿
                                                        </span>
                                                    </strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div id="payment" class="woocommerce-checkout-payment">
                                        <div class="form-row place-order">
                                            <input type="submit" class="button alt"
                                                name="woocommerce_checkout_place_order" id="place_order"
                                                value="Place order" />
                                        </div>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </section>
                </article>
            </div>
            <!-- /Content -->
        </div>
    </div>
    <x-slot name="script">
        <script>
            document.addEventListener('DOMContentLoaded', () => {

                const qrMap = {
                    credit_card: document.getElementById('payment_qr_credit_card'),
                    wechat: document.getElementById('payment_qr_wechat'),
                    alipay: document.getElementById('payment_qr_alipay'),
                };

                document.querySelectorAll('input[name="payment_type"]').forEach(radio => {
                    radio.addEventListener('change', () => {

                        // ซ่อนทั้งหมดก่อน
                        Object.values(qrMap).forEach(el => el.style.display = 'none');

                        // เปิดเฉพาะตัวที่เลือก
                        if (qrMap[radio.value]) {
                            qrMap[radio.value].style.display = 'block';
                        }
                    });
                });

            });

            function previewSlip(event) {
                const input = event.target;
                const previewDiv = document.getElementById('slip_preview');
                const previewImg = document.getElementById('slip_img');

                if (input.files && input.files[0]) {

                    const reader = new FileReader();
                    reader.onload = e => {
                        previewImg.src = e.target.result;
                        previewDiv.style.display = 'block';
                    };

                    reader.readAsDataURL(input.files[0]);

                } else {
                    previewDiv.style.display = 'none';
                }
            }
        </script>

    </x-slot>
</x-guest-layout>
