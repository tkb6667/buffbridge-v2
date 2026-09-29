<x-guest-layout>

    <x-slot name="style"></x-slot>

    @php
        $adminUrl = rtrim(env('APP_ADMIN_URL', ''), '/');

        $productImages = $product->images->map(function ($image) use ($adminUrl) {
            return $adminUrl . '/storage/' . ltrim($image->image_path, '/');
        });

        $mainImage = $productImages->first();

        $hasVariants = $product->variants->count() > 0;

        $minPrice = $hasVariants
            ? $product->variants->min('price')
            : $product->price;

        $maxPrice = $hasVariants
            ? $product->variants->max('price')
            : $product->price;

        $isOutOfStock = $product->availability === 'Out of Stock';
    @endphp

    <style>
        .bbpd,
        .bbpd *,
        .bbpd-related,
        .bbpd-related * {
            box-sizing: border-box;
        }

        .bbpd {
            --bb-yellow: #ffd429;
            --bb-orange: #f5a000;
            --bb-black: #080808;
            --bb-dark: #111;
            --bb-text: #191919;
            --bb-muted: #777;
            --bb-line: #e6e6e6;
            --bb-bg: #f5f5f5;

            width: 100%;
            background: #fff;
            color: var(--bb-text);
            font-family: Arial, Helvetica, sans-serif;
        }

        .bbpd-shell {
            width: 100%;
            max-width: 1540px;
            margin: 0 auto;
            padding: 0 clamp(24px, 5vw, 82px);
        }

        /* =========================================================
           BREADCRUMB
        ========================================================= */

        .bbpd-breadcrumb-wrap {
            border-bottom: 1px solid #ececec;
            background: #fafafa;
        }

        .bbpd-breadcrumb {
            min-height: 62px;
            display: flex;
            align-items: center;
            gap: 10px;
            overflow-x: auto;
            color: #999;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .8px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .bbpd-breadcrumb a {
            color: #777 !important;
            text-decoration: none !important;
            transition: .2s;
        }

        .bbpd-breadcrumb a:hover {
            color: var(--bb-orange) !important;
        }

        .bbpd-breadcrumb-separator {
            color: #ccc;
        }

        .bbpd-breadcrumb-current {
            color: #222;
        }

        /* =========================================================
           PRODUCT MAIN
        ========================================================= */

        .bbpd-main {
            padding: 58px 0 62px;
        }

        .bbpd-product {
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(400px, .95fr);
            gap: clamp(45px, 5vw, 90px);
            align-items: start;
        }

        /* =========================================================
           GALLERY
        ========================================================= */

        .bbpd-gallery {
            min-width: 0;
        }

        .bbpd-gallery-main {
            position: relative;
            width: 100%;
            aspect-ratio: 1 / .88;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border: 1px solid #ededed;
            background: #f8f8f8;
        }

        .bbpd-gallery-main img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: clamp(20px, 3vw, 45px);
            transition: transform .3s ease;
        }

        .bbpd-gallery-main:hover img {
            transform: scale(1.025);
        }

        .bbpd-zoom {
            position: absolute;
            z-index: 3;
            top: 18px;
            right: 18px;
            width: 42px;
            height: 42px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            background: rgba(255,255,255,.94);
            color: #111 !important;
            cursor: pointer;
            transition: .2s;
        }

        .bbpd-zoom:hover {
            border-color: var(--bb-orange);
            background: var(--bb-orange);
            color: #fff !important;
        }

        .bbpd-zoom svg {
            width: 18px;
            height: 18px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .bbpd-gallery-empty {
            padding: 60px 20px;
            color: #aaa;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            text-align: center;
        }

        .bbpd-thumbs {
            margin-top: 12px;
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 10px;
        }

        .bbpd-thumb {
            position: relative;
            width: 100%;
            aspect-ratio: 1 / 1;
            padding: 0;
            overflow: hidden;
            border: 1px solid #e1e1e1;
            background: #f8f8f8;
            cursor: pointer;
            transition: .2s;
        }

        .bbpd-thumb:hover,
        .bbpd-thumb.is-active {
            border-color: var(--bb-orange);
        }

        .bbpd-thumb.is-active::after {
            content: "";
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
            height: 3px;
            background: var(--bb-orange);
        }

        .bbpd-thumb img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 6px;
        }

        /* =========================================================
           PRODUCT INFO
        ========================================================= */

        .bbpd-info {
            min-width: 0;
            padding-top: 3px;
        }

        .bbpd-eyebrow {
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 9px;
            color: var(--bb-orange);
            font-size: 9px;
            font-weight: 900;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .bbpd-eyebrow::before {
            content: "";
            width: 25px;
            height: 2px;
            background: var(--bb-orange);
        }

        .bbpd-title {
            margin: 0 !important;
            color: #111 !important;
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: clamp(30px, 3vw, 48px) !important;
            font-weight: 900 !important;
            font-style: italic !important;
            letter-spacing: -1.7px !important;
            line-height: 1.04 !important;
            overflow-wrap: anywhere;
        }

        .bbpd-price {
            margin: 22px 0 18px !important;
            color: #111 !important;
            font-size: clamp(24px, 2vw, 34px) !important;
            font-weight: 900 !important;
            line-height: 1 !important;
        }

        .bbpd-price-range {
            color: #777;
            font-size: 17px;
            font-weight: 700;
        }

        .bbpd-divider {
            width: 100%;
            height: 1px;
            margin: 24px 0;
            background: #e7e7e7;
        }

        .bbpd-meta {
            display: grid;
            gap: 12px;
        }

        .bbpd-meta-row {
            display: grid;
            grid-template-columns: 120px minmax(0, 1fr);
            gap: 15px;
            align-items: center;
            font-size: 12px;
            line-height: 1.5;
        }

        .bbpd-meta-label {
            color: #888;
            font-size: 9px;
            font-weight: 900;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .bbpd-meta-value {
            color: #222;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .bbpd-stock {
            width: fit-content;
            min-height: 28px;
            padding: 0 11px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid transparent;
            font-size: 9px;
            font-weight: 900;
            letter-spacing: .8px;
            text-transform: uppercase;
        }

        .bbpd-stock.in-stock,
        .bbpd-stock.available {
            border-color: #b9dec6;
            background: #eef9f1;
            color: #228843;
        }

        .bbpd-stock.out-of-stock {
            border-color: #f1b7b7;
            background: #fff0f0;
            color: #d42b2b;
        }

        .bbpd-stock.pre-order,
        .bbpd-stock.preorder {
            border-color: #f0cf82;
            background: #fff7e1;
            color: #a36b00;
        }

        .bbpd-unavailable {
            margin-top: 18px;
            padding: 15px 16px;
            border-left: 3px solid #d52d2d;
            background: #fff4f4;
            color: #777;
            font-size: 12px;
            line-height: 1.6;
        }

        /* =========================================================
           CART / VARIANT
        ========================================================= */

        .bbpd-buy {
            margin-top: 28px;
        }

        .bbpd-field {
            margin-bottom: 15px;
        }

        .bbpd-field-label {
            display: block;
            margin-bottom: 7px;
            color: #333;
            font-size: 9px;
            font-weight: 900;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .bbpd-select {
            width: 100%;
            height: 49px;
            margin: 0 !important;
            padding: 0 42px 0 14px !important;
            border: 1px solid #d8d8d8 !important;
            border-radius: 0 !important;
            outline: none !important;
            background: #fff !important;
            color: #222 !important;
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: 12px !important;
            box-shadow: none !important;
            cursor: pointer;
        }

        .bbpd-select:focus {
            border-color: var(--bb-orange) !important;
        }

        .bbpd-cart-row {
            display: grid;
            grid-template-columns: 108px minmax(0, 1fr);
            gap: 10px;
        }

        .bbpd-qty {
            width: 100% !important;
            height: 52px !important;
            margin: 0 !important;
            padding: 0 10px !important;
            border: 1px solid #d8d8d8 !important;
            border-radius: 0 !important;
            outline: 0 !important;
            background: #fff !important;
            color: #111 !important;
            font-size: 13px !important;
            font-weight: 800 !important;
            text-align: center !important;
            box-shadow: none !important;
        }

        .bbpd-qty:focus {
            border-color: var(--bb-orange) !important;
        }

        .bbpd-add {
            position: relative;
            width: 100%;
            min-height: 52px;
            padding: 0 54px 0 20px !important;
            display: flex !important;
            align-items: center;
            justify-content: flex-start;
            border: 0 !important;
            border-radius: 0 !important;
            background: var(--bb-orange) !important;
            color: #111 !important;
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: 10px !important;
            font-weight: 900 !important;
            letter-spacing: .8px !important;
            text-transform: uppercase;
            cursor: pointer;
            transition: .2s;
        }

        .bbpd-add::after {
            content: "→";
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            font-size: 18px;
        }

        .bbpd-add:hover {
            background: var(--bb-yellow) !important;
        }

        /* =========================================================
           DESCRIPTION
        ========================================================= */

        .bbpd-description-section {
            padding: 0 0 70px;
        }

        .bbpd-section-heading {
            margin-bottom: 27px;
        }

        .bbpd-section-eyebrow {
            margin-bottom: 8px;
            color: var(--bb-orange);
            font-size: 9px;
            font-weight: 900;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .bbpd-section-title {
            margin: 0 !important;
            color: #111 !important;
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: clamp(25px, 2.2vw, 36px) !important;
            font-weight: 900 !important;
            font-style: italic !important;
            line-height: 1 !important;
        }

        .bbpd-description-card {
            border: 1px solid #e5e5e5;
            background: #fafafa;
        }

        .bbpd-description-head {
            min-height: 58px;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            border-bottom: 1px solid #e5e5e5;
            background: #fff;
        }

        .bbpd-description-label {
            color: #111;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .bbpd-font-control {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .bbpd-font-control button {
            width: 32px;
            height: 32px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            border-radius: 0;
            background: #fff;
            color: #555;
            font-size: 10px;
            font-weight: 800;
            cursor: pointer;
            transition: .2s;
        }

        .bbpd-font-control button:hover {
            border-color: var(--bb-orange);
            background: var(--bb-orange);
            color: #111;
        }

        #product-description-text {
            min-height: 150px;
            padding: clamp(24px, 3vw, 42px);
            color: #555;
            font-size: 16px;
            line-height: 1.85;
            white-space: normal;
            overflow-wrap: anywhere;
        }

        /* =========================================================
           REVIEWS
        ========================================================= */

        .bbpd-reviews {
            padding: 0 0 70px;
        }

        .bbpd-review-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(320px, .8fr);
            gap: 30px;
        }

        .bbpd-review-list,
        .bbpd-review-form {
            border: 1px solid #e7e7e7;
            background: #fff;
            padding: 24px;
        }

        .bbpd-review-card {
            padding: 18px 0;
            border-bottom: 1px solid #eee;
        }

        .bbpd-review-card:first-child {
            padding-top: 0;
        }

        .bbpd-review-card:last-child {
            padding-bottom: 0;
            border-bottom: 0;
        }

        .bbpd-review-name {
            margin-bottom: 7px;
            color: #111;
            font-size: 11px;
            font-weight: 900;
        }

        .bbpd-stars {
            margin-bottom: 7px;
            color: var(--bb-orange);
            font-size: 13px;
            letter-spacing: 1px;
        }

        .bbpd-review-text {
            margin: 0 !important;
            color: #777;
            font-size: 12px;
            line-height: 1.6;
        }

        .bbpd-empty-review {
            margin: 0 !important;
            color: #999;
            font-size: 12px;
        }

        .bbpd-review-form label {
            display: block;
            margin: 0 0 7px;
            color: #333;
            font-size: 9px;
            font-weight: 900;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .bbpd-review-form select,
        .bbpd-review-form textarea {
            width: 100% !important;
            margin: 0 0 15px !important;
            border: 1px solid #ddd !important;
            border-radius: 0 !important;
            outline: none !important;
            background: #fff !important;
            color: #111 !important;
            box-shadow: none !important;
        }

        .bbpd-review-form select {
            height: 46px !important;
            padding: 0 12px !important;
        }

        .bbpd-review-form textarea {
            min-height: 125px;
            padding: 12px !important;
            resize: vertical;
        }

        .bbpd-review-form select:focus,
        .bbpd-review-form textarea:focus {
            border-color: var(--bb-orange) !important;
        }

        .bbpd-review-submit {
            width: 100%;
            height: 46px;
            border: 0 !important;
            border-radius: 0 !important;
            background: var(--bb-orange) !important;
            color: #111 !important;
            font-size: 10px;
            font-weight: 900;
            cursor: pointer;
        }

        .bbpd-review-login {
            margin: 0 !important;
            color: #777;
            font-size: 12px;
            line-height: 1.6;
        }

        .bbpd-review-login button {
            padding: 0;
            border: 0;
            background: transparent;
            color: var(--bb-orange);
            font: inherit;
            font-weight: 800;
            cursor: pointer;
        }

        /* =========================================================
           RELATED PRODUCTS
        ========================================================= */

        .bbpd-related {
            width: 100%;
            padding: 68px 0 76px;
            background: #0c0c0c;
            color: #fff;
            font-family: Arial, Helvetica, sans-serif;
        }

        .bbpd-related .bbpd-section-eyebrow {
            color: var(--bb-yellow);
        }

        .bbpd-related .bbpd-section-title {
            color: #fff !important;
        }

        .bbpd-related-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
        }

        .bbpd-product-card {
            position: relative;
            min-width: 0;
            overflow: hidden;
            background: #151515;
            border: 1px solid #292929;
            transition: transform .22s ease, border-color .22s ease;
        }

        .bbpd-product-card:hover {
            transform: translateY(-3px);
            border-color: #444;
        }

        .bbpd-card-badge {
            position: absolute;
            z-index: 4;
            top: 12px;
            left: 12px;
            min-height: 26px;
            padding: 0 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #111;
            color: #fff;
            font-size: 8px;
            font-weight: 900;
            letter-spacing: .7px;
            text-transform: uppercase;
        }

        .bbpd-card-badge.in-stock,
        .bbpd-card-badge.available {
            background: #268647;
        }

        .bbpd-card-badge.out-of-stock {
            background: #cf2e2e;
        }

        .bbpd-card-badge.pre-order,
        .bbpd-card-badge.preorder {
            background: #d68d00;
        }

        .bbpd-card-image {
            width: 100%;
            aspect-ratio: 1 / .87;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #f5f5f5;
        }

        .bbpd-card-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 16px;
            transition: transform .3s;
        }

        .bbpd-product-card:hover .bbpd-card-image img {
            transform: scale(1.03);
        }

        .bbpd-card-image-empty {
            color: #aaa;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .bbpd-card-body {
            padding: 17px 16px 18px;
        }

        .bbpd-card-title {
            min-height: 34px;
            margin: 0 0 12px !important;
            color: #fff !important;
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: 11px !important;
            font-weight: 900 !important;
            line-height: 1.5 !important;
        }

        .bbpd-card-title a {
            color: inherit !important;
            text-decoration: none !important;
        }

        .bbpd-card-price {
            color: var(--bb-yellow);
            font-size: 13px;
            font-weight: 900;
        }

        .bbpd-card-actions {
            margin-top: 15px;
            display: flex;
            gap: 8px;
        }

        .bbpd-view-product {
            flex: 1;
            min-height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #3a3a3a;
            color: #fff !important;
            font-size: 8px;
            font-weight: 900;
            letter-spacing: .7px;
            text-decoration: none !important;
            transition: .2s;
        }

        .bbpd-view-product:hover {
            border-color: var(--bb-yellow);
            color: var(--bb-yellow) !important;
        }

        .bbpd-related-cart {
            flex: 0 0 40px;
            width: 40px;
            height: 38px;
            padding: 0 !important;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 0 !important;
            border-radius: 0 !important;
            background: var(--bb-orange) !important;
            color: #111 !important;
            font-size: 16px;
            font-weight: 900;
            cursor: pointer;
        }

        /* =========================================================
           IMAGE VIEWER
        ========================================================= */

        .bbpd-lightbox {
            position: fixed;
            z-index: 100000;
            inset: 0;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            background: rgba(0,0,0,.9);
            transition: .2s;
        }

        .bbpd-lightbox.is-open {
            opacity: 1;
            visibility: visible;
        }

        .bbpd-lightbox img {
            max-width: min(1000px, 92vw);
            max-height: 88vh;
            object-fit: contain;
        }

        .bbpd-lightbox-close {
            position: absolute;
            top: 20px;
            right: 22px;
            width: 45px;
            height: 45px;
            border: 0;
            background: var(--bb-orange);
            color: #fff;
            font-size: 26px;
            cursor: pointer;
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1100px) {
            .bbpd-product {
                grid-template-columns: minmax(0, 1fr) minmax(340px, .85fr);
                gap: 40px;
            }

            .bbpd-related-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 850px) {
            .bbpd-main {
                padding: 38px 0 50px;
            }

            .bbpd-product {
                grid-template-columns: 1fr;
                gap: 35px;
            }

            .bbpd-info {
                padding-top: 0;
            }

            .bbpd-gallery-main {
                aspect-ratio: 1 / .82;
            }

            .bbpd-review-layout {
                grid-template-columns: 1fr;
            }

            .bbpd-related-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 600px) {
            .bbpd-shell {
                padding: 0 16px;
            }

            .bbpd-breadcrumb {
                min-height: 52px;
            }

            .bbpd-main {
                padding-top: 24px;
            }

            .bbpd-title {
                font-size: 30px !important;
            }

            .bbpd-price {
                font-size: 24px !important;
            }

            .bbpd-gallery-main {
                aspect-ratio: 1 / 1;
            }

            .bbpd-gallery-main img {
                padding: 14px;
            }

            .bbpd-thumbs {
                grid-template-columns: repeat(4, minmax(0, 1fr));
                gap: 7px;
            }

            .bbpd-meta-row {
                grid-template-columns: 100px minmax(0, 1fr);
            }

            .bbpd-cart-row {
                grid-template-columns: 88px minmax(0, 1fr);
            }

            .bbpd-description-head {
                min-height: auto;
                padding: 13px 15px;
                align-items: flex-start;
                flex-direction: column;
                gap: 10px;
            }

            #product-description-text {
                padding: 22px 17px;
            }

            .bbpd-related {
                padding: 48px 0 55px;
            }

            .bbpd-related-grid {
                gap: 10px;
            }

            .bbpd-card-body {
                padding: 13px 11px 14px;
            }

            .bbpd-card-title {
                font-size: 9px !important;
            }
        }

        @media (max-width: 430px) {
            .bbpd-related-grid {
                grid-template-columns: 1fr;
            }

            .bbpd-card-image {
                aspect-ratio: 1 / .8;
            }

            .bbpd-cart-row {
                grid-template-columns: 80px minmax(0, 1fr);
            }
        }
    </style>


    <main class="bbpd">

        {{-- Breadcrumb --}}
        <section class="bbpd-breadcrumb-wrap">
            <div class="bbpd-shell">
                <div class="bbpd-breadcrumb">
                    <a href="{{ route('home') }}">Home</a>

                    <span class="bbpd-breadcrumb-separator">/</span>

                    <a href="{{ route('products.index') }}">Shop</a>

                    <span class="bbpd-breadcrumb-separator">/</span>

                    <span class="bbpd-breadcrumb-current">
                        {{ $product->name }}
                    </span>
                </div>
            </div>
        </section>


        {{-- Main Product --}}
        <section class="bbpd-main">
            <div class="bbpd-shell">

                <div class="bbpd-product">

                    {{-- Gallery --}}
                    <div class="bbpd-gallery">

                        <div class="bbpd-gallery-main">

                            @if ($mainImage)
                                <img
                                    id="bbpdMainImage"
                                    src="{{ $mainImage }}"
                                    alt="{{ $product->name }}"
                                >

                                <button
                                    type="button"
                                    class="bbpd-zoom"
                                    id="bbpdZoom"
                                    aria-label="View image"
                                >
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <circle cx="11" cy="11" r="7"></circle>
                                        <path d="m20 20-4-4"></path>
                                    </svg>
                                </button>
                            @else
                                <div class="bbpd-gallery-empty">
                                    NO PRODUCT IMAGE
                                </div>
                            @endif

                        </div>


                        @if ($productImages->count() > 0)
                            <div class="bbpd-thumbs">

                                @foreach ($productImages as $index => $imageUrl)
                                    <button
                                        type="button"
                                        class="bbpd-thumb {{ $index === 0 ? 'is-active' : '' }}"
                                        data-image="{{ $imageUrl }}"
                                        aria-label="View product image {{ $index + 1 }}"
                                    >
                                        <img
                                            src="{{ $imageUrl }}"
                                            alt="{{ $product->name }} {{ $index + 1 }}"
                                        >
                                    </button>
                                @endforeach

                            </div>
                        @endif

                    </div>


                    {{-- Product Information --}}
                    <div class="bbpd-info">

                        <div class="bbpd-eyebrow">
                            Product Details
                        </div>

                        <h1 class="bbpd-title">
                            {{ $product->name }}
                        </h1>


                        <div class="bbpd-price">

                            {{ number_format($minPrice, 2) }}฿

                            @if ($hasVariants && $minPrice != $maxPrice)
                                <span class="bbpd-price-range">
                                    – {{ number_format($maxPrice, 2) }}฿
                                </span>
                            @endif

                        </div>


                        <div class="bbpd-divider"></div>


                        <div class="bbpd-meta">

                            <div class="bbpd-meta-row">
                                <div class="bbpd-meta-label">
                                    SKU
                                </div>

                                <div class="bbpd-meta-value">
                                    {{ $product->product_code }}
                                </div>
                            </div>


                            @if (!empty($product->brand))
                                <div class="bbpd-meta-row">
                                    <div class="bbpd-meta-label">
                                        Brand
                                    </div>

                                    <div class="bbpd-meta-value">
                                        {{ $product->brand }}
                                    </div>
                                </div>
                            @endif


                            <div class="bbpd-meta-row">
                                <div class="bbpd-meta-label">
                                    Availability
                                </div>

                                <div>
                                    <span
                                        class="bbpd-stock {{ strtolower(str_replace(' ', '-', $product->availability)) }}"
                                    >
                                        {{ $product->availability }}
                                    </span>
                                </div>
                            </div>

                        </div>


                        @if ($isOutOfStock)

                            <div class="bbpd-unavailable">
                                Sorry, this product is currently unavailable.
                            </div>

                        @else

                            <form
                                method="POST"
                                action="{{ route('cart.add', ['id' => $product->id]) }}"
                                class="bbpd-buy"
                            >
                                @csrf


                                @if ($hasVariants)

                                    <div class="bbpd-field">
                                        <label
                                            for="variant"
                                            class="bbpd-field-label"
                                        >
                                            Choose Type
                                        </label>

                                        <select
                                            name="variant_id"
                                            id="variant"
                                            class="bbpd-select"
                                            required
                                        >
                                            @foreach ($product->variants as $variant)
                                                <option value="{{ $variant->id }}">
                                                    {{ $variant->type }}
                                                    —
                                                    {{ number_format($variant->price, 2) }}฿
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                @endif


                                <div class="bbpd-field">
                                    <label
                                        for="bbpdQuantity"
                                        class="bbpd-field-label"
                                    >
                                        Quantity
                                    </label>

                                    <div class="bbpd-cart-row">

                                        <input
                                            id="bbpdQuantity"
                                            type="number"
                                            class="bbpd-qty"
                                            name="quantity"
                                            value="1"
                                            min="1"
                                            step="1"
                                            required
                                        >

                                        <button
                                            type="submit"
                                            name="add-to-cart"
                                            class="bbpd-add"
                                        >
                                            Add to cart
                                        </button>

                                    </div>
                                </div>

                            </form>

                        @endif

                    </div>

                </div>

            </div>
        </section>


        {{-- Description --}}
        <section class="bbpd-description-section">
            <div class="bbpd-shell">

                <div class="bbpd-section-heading">

                    <div class="bbpd-section-eyebrow">
                        About this product
                    </div>

                    <h2 class="bbpd-section-title">
                        DESCRIPTION
                    </h2>

                </div>


                <div class="bbpd-description-card">

                    <div class="bbpd-description-head">

                        <div class="bbpd-description-label">
                            Product Information
                        </div>


                        <div class="bbpd-font-control">

                            <button
                                type="button"
                                id="font-decrease"
                                title="Smaller"
                            >
                                A−
                            </button>

                            <button
                                type="button"
                                id="font-reset"
                                title="Reset"
                            >
                                ↻
                            </button>

                            <button
                                type="button"
                                id="font-increase"
                                title="Bigger"
                            >
                                A+
                            </button>

                        </div>

                    </div>


                    <div id="product-description-text">

                        @if (!empty($product->description))
                            {!! nl2br(e($product->description)) !!}
                        @else
                            <span style="color:#aaa;">
                                No product description available.
                            </span>
                        @endif

                    </div>

                </div>

            </div>
        </section>


        {{-- Reviews --}}
        <section class="bbpd-reviews">
            <div class="bbpd-shell">

                <div class="bbpd-section-heading">

                    <div class="bbpd-section-eyebrow">
                        Customer Feedback
                    </div>

                    <h2 class="bbpd-section-title">
                        REVIEWS
                    </h2>

                </div>


                <div class="bbpd-review-layout">

                    <div class="bbpd-review-list">

                        @if ($product->reviews->isEmpty())

                            <p class="bbpd-empty-review">
                                There are no reviews yet.
                            </p>

                        @else

                            @foreach ($product->reviews as $review)

                                <div class="bbpd-review-card">

                                    <div class="bbpd-review-name">
                                        {{ optional($review->customer)->name ?? 'Customer' }}
                                    </div>

                                    <div class="bbpd-stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review->rating)
                                                ★
                                            @else
                                                <span style="color:#ddd;">★</span>
                                            @endif
                                        @endfor
                                    </div>

                                    <p class="bbpd-review-text">
                                        {{ $review->review }}
                                    </p>

                                </div>

                            @endforeach

                        @endif

                    </div>


                    <div class="bbpd-review-form">

                        @auth('customer')

                            <form
                                action="{{ route('review.submit', $product) }}"
                                method="POST"
                            >
                                @csrf

                                <label for="rating">
                                    Your Rating
                                </label>

                                <select
                                    name="rating"
                                    id="rating"
                                    required
                                >
                                    <option value="">
                                        Select rating
                                    </option>

                                    <option value="5">
                                        5 — Perfect
                                    </option>

                                    <option value="4">
                                        4 — Good
                                    </option>

                                    <option value="3">
                                        3 — Average
                                    </option>

                                    <option value="2">
                                        2 — Not that bad
                                    </option>

                                    <option value="1">
                                        1 — Very poor
                                    </option>
                                </select>


                                <label for="comment">
                                    Your Review
                                </label>

                                <textarea
                                    id="comment"
                                    name="comment"
                                    required
                                ></textarea>


                                <button
                                    type="submit"
                                    class="bbpd-review-submit"
                                >
                                    SUBMIT REVIEW
                                </button>

                            </form>

                        @else

                            <p class="bbpd-review-login">
                                Please

                                <button
                                    type="button"
                                    data-bb-modal="login"
                                >
                                    login
                                </button>

                                to leave a review.
                            </p>

                        @endauth

                    </div>

                </div>

            </div>
        </section>

    </main>


    {{-- Related Products --}}
    @if ($relatedProducts->isNotEmpty())

        <section class="bbpd-related">

            <div class="bbpd-shell">

                <div class="bbpd-section-heading">

                    <div class="bbpd-section-eyebrow">
                        You may also like
                    </div>

                    <h2 class="bbpd-section-title">
                        RELATED PRODUCTS
                    </h2>

                </div>


                <div class="bbpd-related-grid">

                    @foreach ($relatedProducts as $relatedProduct)

                        @php
                            $relatedImage = $relatedProduct->images->isNotEmpty()
                                ? $adminUrl . '/storage/' . ltrim($relatedProduct->images->first()->image_path, '/')
                                : null;

                            $relatedPrice = $relatedProduct->variants->count() > 0
                                ? $relatedProduct->variants->min('price')
                                : $relatedProduct->price;
                        @endphp


                        <article class="bbpd-product-card">

                            <div
                                class="bbpd-card-badge {{ strtolower(str_replace(' ', '-', $relatedProduct->availability)) }}"
                            >
                                {{ $relatedProduct->availability }}
                            </div>


                            <a
                                href="{{ route('products.show', $relatedProduct->id) }}"
                                class="bbpd-card-image"
                            >
                                @if ($relatedImage)

                                    <img
                                        src="{{ $relatedImage }}"
                                        alt="{{ $relatedProduct->name }}"
                                    >

                                @else

                                    <span class="bbpd-card-image-empty">
                                        NO IMAGE
                                    </span>

                                @endif
                            </a>


                            <div class="bbpd-card-body">

                                <h3 class="bbpd-card-title">
                                    <a href="{{ route('products.show', $relatedProduct->id) }}">
                                        {{ $relatedProduct->name }}
                                    </a>
                                </h3>


                                <div class="bbpd-card-price">
                                    {{ number_format($relatedPrice, 2) }}฿
                                </div>


                                <div class="bbpd-card-actions">

                                    <a
                                        href="{{ route('products.show', $relatedProduct->id) }}"
                                        class="bbpd-view-product"
                                    >
                                        VIEW PRODUCT
                                    </a>


                                    @if ($relatedProduct->availability !== 'Out of Stock')
                                        <button
                                            type="button"
                                            class="bbpd-related-cart button add_to_cart_button"
                                            data-url="{{ route('cart.add', ['id' => $relatedProduct->id]) }}"
                                            aria-label="Add {{ $relatedProduct->name }} to cart"
                                        >
                                            +
                                        </button>
                                    @endif

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>

            </div>

        </section>

    @endif


    {{-- Image Lightbox --}}
    @if ($mainImage)

        <div
            class="bbpd-lightbox"
            id="bbpdLightbox"
            aria-hidden="true"
        >

            <button
                type="button"
                class="bbpd-lightbox-close"
                id="bbpdLightboxClose"
                aria-label="Close image"
            >
                ×
            </button>


            <img
                id="bbpdLightboxImage"
                src="{{ $mainImage }}"
                alt="{{ $product->name }}"
            >

        </div>

    @endif


    <x-slot name="script">

        <script>
            document.addEventListener('DOMContentLoaded', () => {

                /*
                |--------------------------------------------------------------------------
                | Product Gallery
                |--------------------------------------------------------------------------
                */

                const mainImage = document.getElementById('bbpdMainImage');

                const thumbs =
                    document.querySelectorAll('.bbpd-thumb');

                thumbs.forEach(thumb => {

                    thumb.addEventListener('click', () => {

                        const image = thumb.dataset.image;

                        if (!image || !mainImage) {
                            return;
                        }


                        mainImage.src = image;


                        thumbs.forEach(item => {
                            item.classList.remove('is-active');
                        });


                        thumb.classList.add('is-active');


                        const lightboxImage =
                            document.getElementById('bbpdLightboxImage');

                        if (lightboxImage) {
                            lightboxImage.src = image;
                        }

                    });

                });



                /*
                |--------------------------------------------------------------------------
                | Image Lightbox
                |--------------------------------------------------------------------------
                */

                const zoomButton =
                    document.getElementById('bbpdZoom');

                const lightbox =
                    document.getElementById('bbpdLightbox');

                const lightboxImage =
                    document.getElementById('bbpdLightboxImage');

                const lightboxClose =
                    document.getElementById('bbpdLightboxClose');


                function openLightbox() {

                    if (
                        !lightbox ||
                        !lightboxImage ||
                        !mainImage
                    ) {
                        return;
                    }


                    lightboxImage.src = mainImage.src;

                    lightbox.classList.add('is-open');

                    lightbox.setAttribute(
                        'aria-hidden',
                        'false'
                    );

                    document.body.style.overflow = 'hidden';

                }


                function closeLightbox() {

                    if (!lightbox) {
                        return;
                    }


                    lightbox.classList.remove('is-open');

                    lightbox.setAttribute(
                        'aria-hidden',
                        'true'
                    );

                    document.body.style.overflow = '';

                }


                zoomButton?.addEventListener(
                    'click',
                    openLightbox
                );


                mainImage?.addEventListener(
                    'dblclick',
                    openLightbox
                );


                lightboxClose?.addEventListener(
                    'click',
                    closeLightbox
                );


                lightbox?.addEventListener('click', event => {

                    if (event.target === lightbox) {
                        closeLightbox();
                    }

                });



                /*
                |--------------------------------------------------------------------------
                | Description Font Controls
                |--------------------------------------------------------------------------
                */

                const description =
                    document.getElementById(
                        'product-description-text'
                    );

                const increase =
                    document.getElementById(
                        'font-increase'
                    );

                const decrease =
                    document.getElementById(
                        'font-decrease'
                    );

                const reset =
                    document.getElementById(
                        'font-reset'
                    );


                let fontSize = 16;


                function updateDescriptionFont() {

                    if (!description) {
                        return;
                    }

                    description.style.fontSize =
                        `${fontSize}px`;

                }


                increase?.addEventListener('click', () => {

                    if (fontSize >= 26) {
                        return;
                    }

                    fontSize += 2;

                    updateDescriptionFont();

                });


                decrease?.addEventListener('click', () => {

                    if (fontSize <= 12) {
                        return;
                    }

                    fontSize -= 2;

                    updateDescriptionFont();

                });


                reset?.addEventListener('click', () => {

                    fontSize = 16;

                    updateDescriptionFont();

                });



                /*
                |--------------------------------------------------------------------------
                | Keyboard
                |--------------------------------------------------------------------------
                */

                document.addEventListener(
                    'keydown',
                    event => {

                        if (event.key === 'Escape') {
                            closeLightbox();
                        }

                    }
                );

            });
        </script>

    </x-slot>

</x-guest-layout>