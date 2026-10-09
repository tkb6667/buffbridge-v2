<x-guest-layout :seo="$seo">



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

            --yellow: #ffd429;

            --orange: #f5a000;

            --black: #090909;

            --line: #e5e5e5;

            --soft: #f7f7f7;

            --muted: #777;



            width: 100%;

            background: #fff;

            color: #111;



            font-family: Arial, Helvetica, sans-serif;

        }



.bbpd-shell {

    width: 100%;

    max-width: 1500px;



    margin: 0;



    padding-left: clamp(24px, 7vw, 135px);

    padding-right: clamp(24px, 7vw, 135px);

}





        /* =====================================================

           BREADCRUMB

        ===================================================== */



        .bbpd-breadcrumb-wrap {

            border-bottom: 1px solid #eee;

            background: #fafafa;

        }



        .bbpd-breadcrumb {

            min-height: 48px;



            display: flex;

            align-items: center;



            gap: 8px;



            overflow-x: auto;



            white-space: nowrap;



            color: #999;



            font-size: 8px;

            font-weight: 800;

            letter-spacing: .8px;

            text-transform: uppercase;

        }



        .bbpd-breadcrumb a {

            color: #777 !important;

            text-decoration: none !important;

        }



        .bbpd-breadcrumb a:hover {

            color: var(--orange) !important;

        }



        .bbpd-breadcrumb-current {

            color: #111;

        }





        /* =====================================================

           MAIN PRODUCT

        ===================================================== */



        .bbpd-main {

            padding: 38px 0 45px;

        }



.bbpd-product {

    display: grid;



    grid-template-columns:

        minmax(360px, 500px)

        minmax(360px, 540px);



    gap: clamp(45px, 6vw, 85px);



    align-items: start;

    justify-content: start;

}





        /* =====================================================

           GALLERY

        ===================================================== */



        .bbpd-gallery {

            width: 100%;

            max-width: 500px;

        }



        .bbpd-gallery-main {

            position: relative;



            width: 100%;

            height: 470px;



            display: flex;

            align-items: center;

            justify-content: center;



            overflow: hidden;



            border: 1px solid #e9e9e9;



            background: #f8f8f8;



            cursor: zoom-in;

        }



        .bbpd-gallery-main img {

            display: block;



            width: 100%;

            height: 100%;



            padding: 28px;



            object-fit: contain;



            user-select: none;



            transition: transform .25s ease;

        }



        .bbpd-gallery-main:hover img {

            transform: scale(1.018);

        }





        /* magnifier */



        .bbpd-zoom {

            position: absolute;



            top: 13px;

            right: 13px;



            z-index: 3;



            width: 37px;

            height: 37px;



            padding: 0;



            display: flex;

            align-items: center;

            justify-content: center;



            border: 0;



            background: var(--orange);



            color: #111 !important;



            cursor: pointer;



            transition: .2s;

        }



        .bbpd-zoom:hover {

            background: var(--yellow);

        }



        .bbpd-zoom svg {

            width: 16px;

            height: 16px;



            fill: none;



            stroke: currentColor;

            stroke-width: 2;



            stroke-linecap: round;

            stroke-linejoin: round;

        }





        /* thumbnail */



        .bbpd-thumbs {

            margin-top: 9px;



            display: flex;

            flex-wrap: wrap;



            gap: 8px;

        }



.bbpd-thumbs {

    display: flex;

    align-items: center;

    gap: 10px;

    flex-wrap: wrap;

}



.bbpd-thumb {

    position: relative;

    width: 82px;

    height: 70px;

    padding: 4px;

    overflow: hidden;

    cursor: pointer;



    border: 1px solid #d6d6d6 !important;

    background: #eeeeee !important;

    box-shadow: none !important;

    transition: background .18s ease, border-color .18s ease, box-shadow .18s ease;

}



.bbpd-thumb:hover {

    border-color: #bcbcbc !important;

    background: #e4e4e4 !important;

    box-shadow: none !important;

}



.bbpd-thumb.is-active,

.bbpd-thumb.active,

.bbpd-thumb[aria-current="true"] {

    border-color: #6f6f6f !important;

    background: #d9d9d9 !important;

    box-shadow: none !important;

}



.bbpd-thumb img {

    display: block;

    width: 100%;

    height: 100%;

    object-fit: contain;



    border: 0 !important;

    outline: 0 !important;

    box-shadow: none !important;

    background: #ffffff !important;

}



.bbpd-thumb:hover img,

.bbpd-thumb.is-active img,

.bbpd-thumb.active img,

.bbpd-thumb[aria-current="true"] img {

    border: 0 !important;

    outline: 0 !important;

    box-shadow: none !important;

}



        /* =====================================================

           PRODUCT INFORMATION

        ===================================================== */



        .bbpd-info {

            min-width: 0;



            padding-top: 4px;

        }



        .bbpd-eyebrow {

            margin-bottom: 10px;



            display: flex;

            align-items: center;



            gap: 8px;



            color: var(--orange);



            font-size: 8px;

            font-weight: 900;

            letter-spacing: 1.7px;



            text-transform: uppercase;

        }



        .bbpd-eyebrow::before {

            content: "";



            width: 20px;

            height: 2px;



            background: var(--orange);

        }



        .bbpd-title {

            margin: 0 !important;



            color: #111 !important;



            font-family: Arial, Helvetica, sans-serif !important;



            font-size: clamp(29px, 3vw, 42px) !important;

            font-weight: 900 !important;

            font-style: italic !important;



            line-height: 1 !important;

            letter-spacing: -1.5px !important;



            overflow-wrap: anywhere;

        }



        .bbpd-price {

            margin: 18px 0 17px !important;



            color: #111 !important;



            font-size: 29px !important;

            font-weight: 900 !important;



            line-height: 1 !important;

        }



        .bbpd-price-range {

            color: #777;



            font-size: 16px;

            font-weight: 700;

        }



        .bbpd-divider {

            height: 1px;



            margin: 20px 0;



            background: #e7e7e7;

        }





        /* meta */



        .bbpd-meta {

            display: grid;



            gap: 10px;

        }



        .bbpd-meta-row {

            display: grid;



            grid-template-columns: 100px minmax(0, 1fr);



            gap: 12px;



            align-items: center;



            font-size: 11px;

        }



        .bbpd-meta-label {

            color: #888;



            font-size: 8px;

            font-weight: 900;



            letter-spacing: 1px;



            text-transform: uppercase;

        }



        .bbpd-meta-value {

            color: #111;



            font-weight: 700;



            overflow-wrap: anywhere;

        }





        /* Stock */



        .bbpd-stock {

            min-height: 25px;



            padding: 0 9px;



            display: inline-flex;

            align-items: center;

            justify-content: center;



            border: 1px solid transparent;



            font-size: 8px;

            font-weight: 900;



            letter-spacing: .7px;



            text-transform: uppercase;

        }



        .bbpd-stock.in-stock,

        .bbpd-stock.available {

            border-color: #b8dfc4;



            background: #edf8f0;



            color: #228643;

        }



        .bbpd-stock.out-of-stock {

            border-color: #f0b9b9;



            background: #fff1f1;



            color: #d62f2f;

        }



        .bbpd-stock.pre-order,

        .bbpd-stock.preorder {

            border-color: #efcf84;



            background: #fff7df;



            color: #a36b00;

        }



        .bbpd-unavailable {

            margin-top: 17px;



            padding: 13px 14px;



            border-left: 3px solid #df3030;



            background: #fff3f3;



            color: #777;



            font-size: 10px;

            line-height: 1.55;

        }





        /* =====================================================

           CART

        ===================================================== */



        .bbpd-buy {

            margin-top: 23px;

        }



        .bbpd-field {

            margin-bottom: 13px;

        }



        .bbpd-field-label {

            display: block;



            margin-bottom: 6px;



            color: #333;



            font-size: 8px;

            font-weight: 900;



            letter-spacing: 1px;



            text-transform: uppercase;

        }



        .bbpd-select {

            width: 100%;

            height: 44px;



            margin: 0 !important;



            padding: 0 12px !important;



            border: 1px solid #ddd !important;

            border-radius: 0 !important;



            outline: 0 !important;



            background: #fff !important;



            color: #111 !important;



            font-family: Arial, Helvetica, sans-serif !important;

            font-size: 11px !important;



            box-shadow: none !important;

        }



        .bbpd-select:focus {

            border-color: var(--orange) !important;

        }



        .bbpd-cart-row {
            display: grid;
            grid-template-columns: 90px minmax(0, 1fr);
            gap: 8px;
            align-items: stretch;
        }

        .bbpd-qty {
            width: 100% !important;
            height: 40px !important;
            min-height: 40px !important;
            margin: 0 !important;
            padding: 0 8px !important;
            border: 1px solid #ddd !important;
            border-radius: 0 !important;
            background: #fff !important;
            color: #111 !important;
            font-size: 12px !important;
            font-weight: 800 !important;
            line-height: normal !important;
            text-align: center !important;
            box-shadow: none !important;
        }

        .bbpd-add.bb-add-to-cart-ui {
            width: 100% !important;
            height: 40px !important;
            min-height: 40px !important;
            margin: 0 !important;
            padding: 0 18px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            border: 0 !important;
            border-radius: 0 !important;
            background: var(--orange) !important;
            color: #111 !important;
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: 9px !important;
            font-weight: 900 !important;
            line-height: 1 !important;
            letter-spacing: .8px !important;
            text-transform: uppercase;
            cursor: pointer;
        }

        .bbpd-add::after {

            content: "→";



            font-size: 17px;

        }



        .bbpd-add:hover {

            background: var(--yellow) !important;

        }





        /* =====================================================

           DESCRIPTION

        ===================================================== */



        .bbpd-description-section {

            padding: 15px 0 45px;

        }



        .bbpd-section-heading {

            margin-bottom: 17px;

        }



        .bbpd-section-eyebrow {

            margin-bottom: 5px;



            color: var(--orange);



            font-size: 8px;

            font-weight: 900;



            letter-spacing: 1.6px;



            text-transform: uppercase;

        }



        .bbpd-section-title {

            margin: 0 !important;



            color: #111 !important;



            font-family: Arial, Helvetica, sans-serif !important;



            font-size: 27px !important;

            font-weight: 900 !important;

            font-style: italic !important;

        }



        .bbpd-description-card {

            border: 1px solid #e5e5e5;



            background: #fafafa;

        }



        .bbpd-description-head {

            min-height: 49px;



            padding: 0 17px;



            display: flex;

            align-items: center;

            justify-content: space-between;



            border-bottom: 1px solid #e5e5e5;



            background: #fff;

        }



        .bbpd-description-label {

            color: #111;



            font-size: 9px;

            font-weight: 900;



            letter-spacing: .8px;



            text-transform: uppercase;

        }



        .bbpd-font-control {

            display: flex;



            gap: 4px;

        }



        .bbpd-font-control button {

            width: 29px;

            height: 29px;



            padding: 0;



            border: 1px solid #ddd;



            background: #fff;



            color: #555;



            font-size: 9px;

            font-weight: 800;



            cursor: pointer;

        }



        .bbpd-font-control button:hover {

            border-color: var(--orange);



            background: var(--orange);



            color: #111;

        }



        #product-description-text {

            min-height: 100px;



            padding: 24px;



            color: #555;



            font-size: 14px;

            line-height: 1.7;



            overflow-wrap: anywhere;

        }





        /* =====================================================

           REVIEWS

        ===================================================== */



        .bbpd-reviews {

            padding: 0 0 50px;

        }



        .bbpd-review-layout {

            display: grid;



            grid-template-columns:

                minmax(0, 1fr)

                minmax(300px, .75fr);



            gap: 20px;

        }



        .bbpd-review-list,

        .bbpd-review-form {

            padding: 20px;



            border: 1px solid #e7e7e7;



            background: #fff;

        }



        .bbpd-review-card {

            padding: 14px 0;



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

            margin-bottom: 5px;



            color: #111;



            font-size: 10px;

            font-weight: 900;

        }



        .bbpd-stars {

            margin-bottom: 5px;



            color: var(--orange);



            font-size: 12px;

        }



        .bbpd-review-text,

        .bbpd-empty-review {

            margin: 0 !important;



            color: #777;



            font-size: 11px;

            line-height: 1.6;

        }



        .bbpd-review-form label {

            display: block;



            margin-bottom: 6px;



            color: #444;



            font-size: 8px;

            font-weight: 900;

        }



        .bbpd-review-form select,

        .bbpd-review-form textarea {

            width: 100% !important;



            margin: 0 0 12px !important;



            border: 1px solid #ddd !important;

            border-radius: 0 !important;



            background: #fff !important;



            color: #111 !important;



            box-shadow: none !important;

        }



        .bbpd-review-form select {

            height: 42px !important;



            padding: 0 11px !important;

        }



        .bbpd-review-form textarea {

            min-height: 110px;



            padding: 10px !important;



            resize: vertical;

        }



        .bbpd-review-submit {

            width: 100%;

            height: 43px;



            border: 0 !important;



            background: var(--orange) !important;



            color: #111 !important;



            font-size: 9px;

            font-weight: 900;



            cursor: pointer;

        }



        .bbpd-review-login {

            margin: 0 !important;



            color: #777;



            font-size: 11px;

        }



        .bbpd-review-login button {

            padding: 0;



            border: 0;



            background: transparent;



            color: var(--orange);



            font: inherit;

            font-weight: 900;



            cursor: pointer;

        }





        /* =====================================================

           RELATED

        ===================================================== */



        .bbpd-related {

            padding: 45px 0 52px;



            background: #0d0d0f;



            color: #fff;

        }



        .bbpd-related .bbpd-section-title {

            color: #fff !important;

        }



        .bbpd-related .bbpd-section-eyebrow {

            color: var(--yellow);

        }



        .bbpd-related-grid {

            display: grid;



            grid-template-columns:

                repeat(4, minmax(0, 1fr));



            gap: 13px;

        }



        .bbpd-product-card {

            position: relative;



            min-width: 0;



            overflow: hidden;



            border: 1px solid #292929;



            background: #151515;



            transition: .2s;

        }



        .bbpd-product-card:hover {

            transform: translateY(-2px);



            border-color: #444;

        }



        .bbpd-card-badge {

            position: absolute;



            z-index: 3;



            top: 9px;

            left: 9px;



            min-height: 23px;



            padding: 0 8px;



            display: flex;

            align-items: center;



            background: #111;



            color: #fff;



            font-size: 7px;

            font-weight: 900;



            text-transform: uppercase;

        }



        .bbpd-card-badge.in-stock,

        .bbpd-card-badge.available {

            background: #278748;

        }



        .bbpd-card-badge.out-of-stock {

            background: #cf3030;

        }



        .bbpd-card-badge.pre-order,

        .bbpd-card-badge.preorder {

            background: #d68e00;

        }



        .bbpd-card-image {

            width: 100%;

            aspect-ratio: 1 / .8;



            display: flex;

            align-items: center;

            justify-content: center;



            overflow: hidden;



            background: #f4f4f4;

        }



        .bbpd-card-image img {

            width: 100%;

            height: 100%;



            padding: 14px;



            object-fit: contain;



            transition: .25s;

        }



        .bbpd-product-card:hover .bbpd-card-image img {

            transform: scale(1.025);

        }



        .bbpd-card-image-empty {

            color: #999;



            font-size: 8px;

            font-weight: 900;

        }



        .bbpd-card-body {

            padding: 13px;

        }



        .bbpd-card-title {

            min-height: 30px;



            margin: 0 0 8px !important;



            color: #fff !important;



            font-family: Arial, Helvetica, sans-serif !important;



            font-size: 10px !important;

            font-weight: 900 !important;



            line-height: 1.45 !important;

        }



        .bbpd-card-title a {

            color: inherit !important;

            text-decoration: none !important;

        }



        .bbpd-card-price {

            color: var(--yellow);



            font-size: 12px;

            font-weight: 900;

        }



        .bbpd-card-actions {

            margin-top: 11px;



            display: flex;



            gap: 6px;

        }



        .bbpd-view-product {

            flex: 1;



            min-height: 34px;



            display: flex;

            align-items: center;

            justify-content: center;



            border: 1px solid #3a3a3a;



            color: #fff !important;



            font-size: 7px;

            font-weight: 900;



            text-decoration: none !important;

        }



        .bbpd-view-product:hover {

            border-color: var(--yellow);



            color: var(--yellow) !important;

        }



        .bbpd-related-cart {

            width: 36px;

            height: 34px;



            padding: 0 !important;



            border: 0 !important;



            background: var(--orange) !important;



            color: #111 !important;



            font-size: 15px;

            font-weight: 900;

        }





        /* =====================================================

           LIGHTBOX

        ===================================================== */



        .bbpd-lightbox {

            position: fixed;



            z-index: 100000;



            inset: 0;



            padding: 25px;



            display: flex;

            align-items: center;

            justify-content: center;



            opacity: 0;

            visibility: hidden;



            background: rgba(0, 0, 0, .92);



            transition: opacity .2s ease;

        }



        .bbpd-lightbox.is-open {

            opacity: 1;

            visibility: visible;

        }



        .bbpd-lightbox img {

            display: block;



            max-width: min(1000px, 92vw);

            max-height: 88vh;



            object-fit: contain;



            cursor: default;

        }



        .bbpd-lightbox-close {

            position: absolute;



            top: 18px;

            right: 20px;



            width: 40px;

            height: 40px;



            padding: 0;



            border: 0;



            background: var(--orange);



            color: #fff;



            font-size: 24px;



            cursor: pointer;

        }





        /* =====================================================

           TABLET

        ===================================================== */



        @media (max-width: 1050px) {



            .bbpd-product {

                grid-template-columns:

                    minmax(320px, 430px)

                    minmax(320px, 1fr);



                gap: 38px;

            }



            .bbpd-gallery {

                max-width: 430px;

            }



            .bbpd-gallery-main {

                height: 410px;

            }



            .bbpd-related-grid {

                grid-template-columns:

                    repeat(3, minmax(0, 1fr));

            }

        }





        /* =====================================================

           TABLET PORTRAIT

        ===================================================== */



        @media (max-width: 820px) {



            .bbpd-main {

                padding: 28px 0 38px;

            }



            .bbpd-product {

                grid-template-columns: 1fr;



                gap: 28px;

            }



            .bbpd-gallery {

                width: min(100%, 500px);

                max-width: 500px;

            }



            .bbpd-gallery-main {

                height: 420px;

            }



            .bbpd-info {

                width: min(100%, 600px);

            }



            .bbpd-review-layout {

                grid-template-columns: 1fr;

            }



            .bbpd-related-grid {

                grid-template-columns:

                    repeat(2, minmax(0, 1fr));

            }

        }





        /* =====================================================

           MOBILE

        ===================================================== */



        @media (max-width: 600px) {



            .bbpd-shell {

                padding-left: 16px;

                padding-right: 16px;

            }



            .bbpd-breadcrumb {

                min-height: 42px;



                font-size: 7px;

            }



            .bbpd-main {

                padding-top: 19px;

                padding-bottom: 30px;

            }



            .bbpd-product {

                gap: 23px;

            }



            .bbpd-gallery {

                max-width: none;

            }



            .bbpd-gallery-main {

                height: auto;



                aspect-ratio: 1 / .93;

            }



            .bbpd-gallery-main img {

                padding: 15px;

            }



            .bbpd-zoom {

                top: 9px;

                right: 9px;



                width: 34px;

                height: 34px;

            }



            .bbpd-thumbs {

                margin-top: 7px;



                gap: 6px;

            }



            .bbpd-thumb {

                width: 67px;

                height: 59px;

            }



            .bbpd-title {

                font-size: 28px !important;

            }



            .bbpd-price {

                margin-top: 15px !important;



                font-size: 24px !important;

            }



            .bbpd-meta-row {

                grid-template-columns: 90px 1fr;

            }



            .bbpd-description-section {

                padding-bottom: 35px;

            }



            .bbpd-description-head {

                min-height: 47px;



                padding: 0 13px;

            }



            #product-description-text {

                min-height: 80px;



                padding: 17px;



                font-size: 13px;

            }



            .bbpd-related {

                padding: 35px 0 40px;

            }



            .bbpd-related-grid {

                gap: 8px;

            }



            .bbpd-card-body {

                padding: 10px;

            }



            .bbpd-card-title {

                font-size: 8px !important;

            }





            .bbpd-qty {
                height: 40px !important;
                min-height: 40px !important;
                font-size: 16px !important;
                line-height: normal !important;
                -webkit-text-size-adjust: 100%;
                touch-action: manipulation;
            }

            .bbpd-add.bb-add-to-cart-ui {
                height: 40px !important;
                min-height: 40px !important;
            }

        }





        @media (max-width: 380px) {



            .bbpd-thumb {

                width: 59px;

                height: 53px;

            }



            .bbpd-title {

                font-size: 25px !important;

            }



            .bbpd-cart-row {

                grid-template-columns: 75px 1fr;

            }

        }

        /* Prevent iOS Safari auto-zoom on review inputs */
@media (max-width: 600px) {
    .bbpd-review-form textarea,
    .bbpd-review-form select {
        font-size: 16px !important;
    }
}

    </style>





    <main class="bbpd">



        {{-- =====================================================

             BREADCRUMB

        ====================================================== --}}



        <section class="bbpd-breadcrumb-wrap">



            <div class="bbpd-shell">



                <div class="bbpd-breadcrumb">



                    <a href="{{ route('home') }}">

                        HOME

                    </a>



                    <span>/</span>



                    <a href="{{ route('products.index') }}">

                        SHOP

                    </a>



                    <span>/</span>



                    <span class="bbpd-breadcrumb-current">

                        {{ $product->name }}

                    </span>



                </div>



            </div>



        </section>





        {{-- =====================================================

             PRODUCT

        ====================================================== --}}



        <section class="bbpd-main">



            <div class="bbpd-shell">



                <div class="bbpd-product">





                    {{-- ==============================

                         GALLERY

                    =============================== --}}



                    <div class="bbpd-gallery">



                        <div

                            class="bbpd-gallery-main"

                            id="bbpdGalleryMain"

                            role="{{ $mainImage ? 'button' : null }}"

                            tabindex="{{ $mainImage ? '0' : null }}"

                            aria-label="{{ $mainImage ? 'Open product image' : null }}"

                        >



                            @if ($mainImage)



                                <img

                                    id="bbpdMainImage"

                                    src="{{ $mainImage }}"

                                    alt="{{ $product->name }}"

                                    draggable="false"

                                >





                                <button

                                    type="button"

                                    class="bbpd-zoom"

                                    id="bbpdZoom"

                                    aria-label="Zoom product image"

                                >

                                    <svg viewBox="0 0 24 24">

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

                                        aria-label="Select product image {{ $index + 1 }}"

                                    >



                                        <img

                                            src="{{ $imageUrl }}"

                                            alt="{{ $product->name }} {{ $index + 1 }}"

                                            draggable="false"

                                        >



                                    </button>



                                @endforeach



                            </div>



                        @endif



                    </div>





                    {{-- ==============================

                         INFORMATION

                    =============================== --}}



                    <div class="bbpd-info">



                        <div class="bbpd-eyebrow">

                            PRODUCT DETAILS

                        </div>





                        <h1 class="bbpd-title">

                            {{ $product->name }}

                        </h1>





                        <div class="bbpd-price">



                            {{ number_format($minPrice, 2) }}฿



                            @if ($hasVariants && $minPrice != $maxPrice)



                                <span class="bbpd-price-range">

                                    –

                                    {{ number_format($maxPrice, 2) }}฿

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

                                        BRAND

                                    </div>



                                    <div class="bbpd-meta-value">

                                        {{ $product->brand }}

                                    </div>



                                </div>



                            @endif





                            <div class="bbpd-meta-row">



                                <div class="bbpd-meta-label">

                                    AVAILABILITY

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

                                action="{{ route('cart.add', ['id' => $product->id], false) }}"

                                class="bbpd-buy"

                                data-bb-cart-form

                            >



                                @csrf





                                @if ($hasVariants)



                                    <div class="bbpd-field">



                                        <label

                                            for="variant"

                                            class="bbpd-field-label"

                                        >

                                            CHOOSE TYPE

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

                                        QUANTITY

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

                                            class="bbpd-add bb-add-to-cart-ui"

                                        >

                                            ADD TO CART

                                        </button>



                                    </div>



                                </div>



                            </form>



                        @endif



                    </div>



                </div>



            </div>



        </section>





        {{-- =====================================================

             DESCRIPTION

        ====================================================== --}}



        <section class="bbpd-description-section">



            <div class="bbpd-shell">



                <div class="bbpd-section-heading">



                    <div class="bbpd-section-eyebrow">

                        ABOUT THIS PRODUCT

                    </div>



                    <h2 class="bbpd-section-title">

                        DESCRIPTION

                    </h2>



                </div>





                <div class="bbpd-description-card">



                    <div class="bbpd-description-head">



                        <div class="bbpd-description-label">

                            PRODUCT INFORMATION

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





        {{-- =====================================================

             REVIEWS

        ====================================================== --}}



        <section class="bbpd-reviews">



            <div class="bbpd-shell">



                <div class="bbpd-section-heading">



                    <div class="bbpd-section-eyebrow">

                        CUSTOMER FEEDBACK

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



                                                <span style="color:#ddd;">

                                                    ★

                                                </span>



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

                                    YOUR RATING

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

                                    YOUR REVIEW

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





    {{-- =====================================================

         RELATED PRODUCTS

    ====================================================== --}}



    @if ($relatedProducts->isNotEmpty())



        <section class="bbpd-related">



            <div class="bbpd-shell">



                <div class="bbpd-section-heading">



                    <div class="bbpd-section-eyebrow">

                        YOU MAY ALSO LIKE

                    </div>



                    <h2 class="bbpd-section-title">

                        RELATED PRODUCTS

                    </h2>



                </div>





                <div class="bbpd-related-grid">



                    @foreach ($relatedProducts as $relatedProduct)



                        @php

                            $relatedImage = $relatedProduct->images->isNotEmpty()

                                ? $adminUrl . '/storage/' . ltrim(

                                    $relatedProduct->images->first()->image_path,

                                    '/'

                                )

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

                                        loading="lazy"

                                    >



                                @else



                                    <span class="bbpd-card-image-empty">

                                        NO IMAGE

                                    </span>



                                @endif



                            </a>





                            <div class="bbpd-card-body">



                                <h3 class="bbpd-card-title">



                                    <a

                                        href="{{ route('products.show', $relatedProduct->id) }}"

                                    >

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

                                            class="bbpd-related-cart button add_to_cart_button bb-add-to-cart-ui"

                                            data-url="{{ route('cart.add', ['id' => $relatedProduct->id], false) }}"

                                            data-bb-cart-add

                                            aria-label="Add {{ $relatedProduct->name }} to cart"

                                        >

                                            ADD TO CART

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





    {{-- =====================================================

         LIGHTBOX

    ====================================================== --}}



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

            document.addEventListener('DOMContentLoaded', function () {



                const galleryMain =

                    document.getElementById('bbpdGalleryMain');



                const mainImage =

                    document.getElementById('bbpdMainImage');



                const thumbs =

                    document.querySelectorAll('.bbpd-thumb');



                const zoomButton =

                    document.getElementById('bbpdZoom');



                const lightbox =

                    document.getElementById('bbpdLightbox');



                const lightboxImage =

                    document.getElementById('bbpdLightboxImage');



                const closeButton =

                    document.getElementById('bbpdLightboxClose');





                /*

                |--------------------------------------------------------------------------

                | CHANGE MAIN IMAGE

                |--------------------------------------------------------------------------

                */



                thumbs.forEach(function (thumb) {



                    thumb.addEventListener('click', function () {



                        const image = thumb.dataset.image;



                        if (!image || !mainImage) {

                            return;

                        }



                        mainImage.src = image;





                        thumbs.forEach(function (item) {

                            item.classList.remove('is-active');

                        });





                        thumb.classList.add('is-active');





                        if (lightboxImage) {

                            lightboxImage.src = image;

                        }



                    });



                });





                /*

                |--------------------------------------------------------------------------

                | LIGHTBOX

                |--------------------------------------------------------------------------

                */



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





                /*

                 * กดรูปใหญ่ตรงไหนก็เปิดได้

                 */



                galleryMain?.addEventListener(

                    'click',

                    function (event) {



                        /*

                         * ถ้ากดแว่นขยาย

                         * ให้ handler ของปุ่มทำงานเอง

                         */

                        if (

                            event.target.closest('#bbpdZoom')

                        ) {

                            return;

                        }



                        openLightbox();



                    }

                );





                /*

                 * รองรับ keyboard

                 */



                galleryMain?.addEventListener(

                    'keydown',

                    function (event) {



                        if (

                            event.key === 'Enter' ||

                            event.key === ' '

                        ) {

                            event.preventDefault();



                            openLightbox();

                        }



                    }

                );





                zoomButton?.addEventListener(

                    'click',

                    function (event) {



                        event.stopPropagation();



                        openLightbox();



                    }

                );





                closeButton?.addEventListener(

                    'click',

                    closeLightbox

                );





                /*

                 * กดพื้นดำด้านนอกเพื่อปิด

                 */



                lightbox?.addEventListener(

                    'click',

                    function (event) {



                        if (event.target === lightbox) {

                            closeLightbox();

                        }



                    }

                );





                /*

                 * ESC ปิด

                 */



                document.addEventListener(

                    'keydown',

                    function (event) {



                        if (event.key === 'Escape') {

                            closeLightbox();

                        }



                    }

                );

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

                let fontSize = 14;

                function updateFont() {



                    if (!description) {

                        return;

                    }
                    description.style.fontSize =

                        fontSize + 'px';
                }
                increase?.addEventListener(

                    'click',

                    function () {

                        if (fontSize >= 24) {

                            return;
                        }
                        fontSize += 2;
                        updateFont();
                    }
                );
                decrease?.addEventListener(

                    'click',

                    function () {



                        if (fontSize <= 11) {

                            return;

                        }
                        fontSize -= 2;
                        updateFont();
                    }
                );
                reset?.addEventListener(
                    'click',
                    function () {
                        fontSize = 14;
                        updateFont();
                    }
                );
            });
        </script>
    </x-slot>
</x-guest-layout>
