<x-guest-layout>



    <link rel="stylesheet" href="{{ asset('css/skin.css') }}" type="text/css" media="all">

    <link rel="stylesheet" href="{{ asset('css/home.css') }}" type="text/css" media="all">



    <style>

        .buffbridge-home,

        .buffbridge-home * {

            box-sizing: border-box;

        }



        /* =========================================================

           PRODUCT SECTION

        ========================================================= */



        .buffbridge-home .bb-product-section {

            width: 100%;

            background: #fff;

        }



        .buffbridge-home .bb-product-section .bb-page-padding {

            width: 100%;

        }



        .buffbridge-home .bb-section-heading {

            margin-bottom: 30px !important;

        }



        .buffbridge-home .bb-section-kicker {

            display: block !important;

            color: #bf8a00 !important;

            font-size: 9px !important;

            font-weight: 900 !important;

            letter-spacing: 2px !important;

        }



        .buffbridge-home .bb-section-title {

            display: block !important;

            margin: 10px 0 0 !important;

            color: #111 !important;

            font-size: clamp(28px, 3vw, 42px) !important;

            font-weight: 900 !important;

            font-style: italic !important;

            line-height: 1 !important;

            opacity: 1 !important;

            visibility: visible !important;

        }



        .buffbridge-home .bb-view-all {

            color: #111 !important;

            font-size: 9px !important;

            font-weight: 900 !important;

            letter-spacing: .6px !important;

            text-decoration: none !important;

        }



        .buffbridge-home .bb-view-all:hover {

            color: #bd8700 !important;

        }



        /* =========================================================

           PRODUCT GRID

        ========================================================= */



        .buffbridge-home .bb-product-grid {

            width: 100% !important;

            margin: 0 !important;

            padding: 0 !important;

            display: grid !important;

            grid-template-columns: repeat(5, minmax(0, 1fr)) !important;

            gap: 16px !important;

            list-style: none !important;

        }



        /* =========================================================

           PRODUCT CARD

        ========================================================= */



        .buffbridge-home .bb-product-card {

            position: relative !important;

            width: 100% !important;

            min-width: 0 !important;

            min-height: 455px !important;

            margin: 0 !important;

            padding: 0 !important;



            display: flex !important;

            flex-direction: column !important;



            overflow: hidden !important;

            border: 1px solid #dedede !important;

            border-radius: 0 !important;

            background: #fff !important;

            box-shadow: none !important;



            opacity: 1 !important;

            visibility: visible !important;

            transform: none !important;



            transition:

                border-color .2s ease,

                box-shadow .2s ease,

                transform .2s ease !important;

        }



        .buffbridge-home .bb-product-card:hover {

            border-color: #cfcfcf !important;

            box-shadow: 0 10px 25px rgba(0,0,0,.055) !important;

            transform: translateY(-2px) !important;

        }



        /* =========================================================

           STOCK BADGE

        ========================================================= */



        .buffbridge-home .bb-product-badge {

            position: absolute !important;

            z-index: 6 !important;

            top: 12px !important;

            right: 12px !important;



            min-width: 72px !important;

            min-height: 28px !important;

            padding: 0 10px !important;



            display: inline-flex !important;

            align-items: center !important;

            justify-content: center !important;



            border-radius: 2px !important;

            background: #ffc800 !important;

            color: #111 !important;



            font-size: 8px !important;

            font-weight: 900 !important;

            line-height: 1 !important;

            letter-spacing: .3px !important;

            text-transform: uppercase !important;



            box-shadow: 0 4px 10px rgba(0,0,0,.08) !important;

        }



        .buffbridge-home .bb-product-badge.out-of-stock {

            background: #ed2945 !important;

            color: #fff !important;

        }



        .buffbridge-home .bb-product-badge.pre-order,

        .buffbridge-home .bb-product-badge.preorder {

            background: #ffbd00 !important;

            color: #111 !important;

        }



        .buffbridge-home .bb-product-badge.in-stock {

            background: #ffc800 !important;

            color: #111 !important;

        }



        /* =========================================================

           PRODUCT IMAGE

        ========================================================= */



        .buffbridge-home .bb-product-image {

            position: relative !important;

            width: 100% !important;

            height: 245px !important;

            margin: 0 !important;

            padding: 20px !important;



            display: flex !important;

            align-items: center !important;

            justify-content: center !important;



            overflow: hidden !important;

            background: #fff !important;

        }



        .buffbridge-home .bb-product-image > a {

            width: 100% !important;

            height: 100% !important;



            display: flex !important;

            align-items: center !important;

            justify-content: center !important;

        }



        .buffbridge-home .bb-product-image img {

            display: block !important;

            width: 100% !important;

            height: 100% !important;

            max-width: 100% !important;

            max-height: 100% !important;

            margin: 0 auto !important;

            padding: 0 !important;



            object-fit: contain !important;



            opacity: 1 !important;

            visibility: visible !important;

            transform: none !important;



            transition: transform .25s ease !important;

        }



        .buffbridge-home .bb-product-card:hover .bb-product-image img {

            transform: scale(1.025) !important;

        }



        .buffbridge-home .bb-product-image-placeholder {

            width: 100% !important;

            height: 100% !important;



            display: flex !important;

            align-items: center !important;

            justify-content: center !important;



            color: #aaa !important;

            font-size: 9px !important;

            font-weight: 800 !important;

            letter-spacing: 1px !important;

        }



        /* =========================================================

           PRODUCT INFO

        ========================================================= */



        .buffbridge-home .bb-product-info {

            position: relative !important;

            flex: 1 1 auto !important;

            width: 100% !important;

            min-height: 205px !important;

            margin: 0 !important;

            padding: 19px 16px 0 !important;



            display: flex !important;

            flex-direction: column !important;



            background: #fff !important;



            opacity: 1 !important;

            visibility: visible !important;

            transform: none !important;

        }



        .buffbridge-home .bb-product-brand {

            display: block !important;

            min-height: 14px !important;

            margin: 0 0 8px !important;



            color: #999 !important;

            font-family: Arial, Helvetica, sans-serif !important;

            font-size: 8px !important;

            font-weight: 900 !important;

            line-height: 1.2 !important;

            letter-spacing: 1.1px !important;

            text-transform: uppercase !important;



            opacity: 1 !important;

            visibility: visible !important;

        }



        .buffbridge-home .bb-product-name {

            display: block !important;

            min-height: 48px !important;

            margin: 0 0 14px !important;

            padding: 0 !important;



            color: #686868 !important;

            font-family: Arial, Helvetica, sans-serif !important;

            font-size: 12px !important;

            font-weight: 500 !important;

            font-style: italic !important;

            line-height: 1.48 !important;



            opacity: 1 !important;

            visibility: visible !important;

            transform: none !important;

        }



        .buffbridge-home .bb-product-name a {

            display: block !important;

            color: #686868 !important;

            text-decoration: none !important;

            opacity: 1 !important;

            visibility: visible !important;

            transition: color .2s ease !important;

        }



        .buffbridge-home .bb-product-name a:hover {

            color: #bd8700 !important;

        }



        .buffbridge-home .bb-product-price {

            display: block !important;

            margin: auto 0 15px !important;



            color: #111 !important;

            font-family: Arial, Helvetica, sans-serif !important;

            font-size: 18px !important;

            font-weight: 900 !important;

            line-height: 1.2 !important;



            opacity: 1 !important;

            visibility: visible !important;

            transform: none !important;

        }



        /* =========================================================

           PRODUCT ACTIONS

        ========================================================= */



        .buffbridge-home .bb-product-actions {

            width: 100% !important;

            min-height: 54px !important;

            margin: 0 !important;

            padding: 12px 0 !important;



            display: flex !important;

            align-items: center !important;

            gap: 10px !important;



            border-top: 1px solid #ececec !important;



            opacity: 1 !important;

            visibility: visible !important;

            transform: none !important;

        }



        .buffbridge-home .bb-cart-button {

            width: auto !important;

            min-width: 95px !important;

            height: 34px !important;

            margin: 0 !important;

            padding: 0 13px !important;



            display: inline-flex !important;

            align-items: center !important;

            justify-content: center !important;



            border: 0 !important;

            border-radius: 0 !important;

            background: #111 !important;

            color: #fff !important;



            font-family: Arial, Helvetica, sans-serif !important;

            font-size: 8px !important;

            font-weight: 900 !important;

            letter-spacing: .6px !important;

            text-transform: uppercase !important;



            cursor: pointer !important;



            opacity: 1 !important;

            visibility: visible !important;

        }



        .buffbridge-home .bb-cart-button:hover {

            background: #ffd429 !important;

            color: #111 !important;

        }



        .buffbridge-home .bb-detail-button,

        .buffbridge-home .bb-more {

            width: 34px !important;

            height: 34px !important;

            margin: 0 !important;

            padding: 0 !important;



            display: inline-flex !important;

            align-items: center !important;

            justify-content: center !important;



            border: 0 !important;

            background: transparent !important;

            color: #111 !important;



            font-size: 16px !important;

            font-weight: 500 !important;

            text-decoration: none !important;



            opacity: 1 !important;

            visibility: visible !important;

            transform: none !important;

        }



        .buffbridge-home .bb-detail-button:hover {

            color: #d8a100 !important;

        }



        .buffbridge-home .bb-more {

            margin-left: auto !important;

            background: #f6f6f6 !important;

            font-size: 15px !important;

            font-weight: 900 !important;

        }



        .buffbridge-home .bb-more:hover {

            background: #ffd429 !important;

        }



        /* =========================================================

           RESPONSIVE

        ========================================================= */



        @media (max-width: 1350px) {

            .buffbridge-home .bb-product-grid {

                grid-template-columns: repeat(4, minmax(0, 1fr)) !important;

            }

        }



        @media (max-width: 1050px) {

            .buffbridge-home .bb-product-grid {

                grid-template-columns: repeat(3, minmax(0, 1fr)) !important;

            }



            .buffbridge-home .bb-product-image {

                height: 235px !important;

            }

        }



        @media (max-width: 760px) {

            .buffbridge-home .bb-product-grid {

                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;

                gap: 10px !important;

            }



            .buffbridge-home .bb-product-card {

                min-height: 350px !important;

            }



            .buffbridge-home .bb-product-image {

                height: 175px !important;

                padding: 12px !important;

            }



            .buffbridge-home .bb-product-info {

                min-height: 165px !important;

                padding: 13px 11px 0 !important;

            }



            .buffbridge-home .bb-product-brand {

                margin-bottom: 5px !important;

                font-size: 7px !important;

                letter-spacing: .8px !important;

            }



            .buffbridge-home .bb-product-name {

                min-height: 40px !important;

                margin-bottom: 8px !important;

                font-size: 10px !important;

                line-height: 1.4 !important;

            }



            .buffbridge-home .bb-product-price {

                margin-bottom: 10px !important;

                font-size: 14px !important;

            }



            .buffbridge-home .bb-product-actions {

                min-height: 44px !important;

                padding: 7px 0 !important;

                gap: 5px !important;

            }



            .buffbridge-home .bb-cart-button {

                min-width: 0 !important;

                height: 30px !important;

                padding: 0 8px !important;

                font-size: 6px !important;

            }



            .buffbridge-home .bb-detail-button,

            .buffbridge-home .bb-more {

                width: 30px !important;

                height: 30px !important;

                font-size: 13px !important;

            }



            .buffbridge-home .bb-product-badge {

                top: 8px !important;

                right: 8px !important;

                min-width: 58px !important;

                min-height: 23px !important;

                padding: 0 6px !important;

                font-size: 6px !important;

            }

        }



        @media (max-width: 480px) {

            .buffbridge-home .bb-product-grid {

                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;

                gap: 8px !important;

            }



            .buffbridge-home .bb-product-card {

                min-height: 300px !important;

            }



            .buffbridge-home .bb-product-image {

                height: 145px !important;

                padding: 9px !important;

            }



            .buffbridge-home .bb-product-info {

                min-height: 140px !important;

                padding: 11px 9px 0 !important;

            }



            .buffbridge-home .bb-product-brand {

                min-height: 10px !important;

                margin-bottom: 4px !important;

                font-size: 6px !important;

            }



            .buffbridge-home .bb-product-name {

                min-height: 35px !important;

                margin-bottom: 5px !important;

                font-size: 8.5px !important;

                line-height: 1.35 !important;

            }



            .buffbridge-home .bb-product-price {

                margin-bottom: 7px !important;

                font-size: 12px !important;

            }



            .buffbridge-home .bb-product-actions {

                min-height: 38px !important;

                padding: 5px 0 !important;

                gap: 3px !important;

            }



            .buffbridge-home .bb-cart-button {

                height: 27px !important;

                padding: 0 6px !important;

                font-size: 5.5px !important;

            }



            .buffbridge-home .bb-detail-button,

            .buffbridge-home .bb-more {

                width: 27px !important;

                height: 27px !important;

                font-size: 12px !important;

            }



            .buffbridge-home .bb-product-badge {

                top: 7px !important;

                right: 7px !important;

                min-width: 53px !important;

                min-height: 21px !important;

                padding: 0 5px !important;

                font-size: 5.5px !important;

            }

        }

    </style>





    <div class="buffbridge-home">



        {{-- HERO --}}

        @if ($banners->isNotEmpty())

        <section class="bb-hero" data-banner-slider>



            <div class="bb-hero-slider">

                @foreach ($banners as $banner)

                    <div class="bb-hero-slide {{ $loop->first ? 'active' : '' }}">

                        <picture class="bb-hero-picture">

                            @if ($banner->mobile_image_path)

                                <source media="(max-width: 767px)" srcset="{{ $banner->mobile_image_url }}">

                            @endif

                            <img

                                src="{{ $banner->image_url }}"

                                alt="{{ $banner->title ?: 'Buffbridge banner' }}"

                                class="bb-hero-image"

                                data-fallback="{{ asset('images/hero1.webp') }}"

                                @if ($loop->first)
                                    fetchpriority="high"
                                @else
                                    loading="lazy"
                                    decoding="async"
                                @endif

                                draggable="false"

                            >

                        </picture>

                    </div>

                @endforeach

            </div>



            @foreach ($banners as $banner)

                @php

                    $titleParts = preg_split('/\s+/', trim((string) $banner->title), 2);

                @endphp

                <div class="bb-hero-overlay bb-hero-content-slide {{ $loop->first ? 'active' : '' }}">

                    <div class="bb-hero-content">

                        @if ($banner->title)

                            <h1 class="bb-hero-title">

                                {{ $titleParts[0] }}

                                @if (! empty($titleParts[1]))

                                    <span>{{ $titleParts[1] }}</span>

                                @endif

                            </h1>

                        @endif



                        @if ($banner->title || $banner->subtitle)

                            <div class="bb-hero-line"></div>

                        @endif



                        @if ($banner->subtitle)

                            <p class="bb-hero-subtitle">{!! nl2br(e($banner->subtitle)) !!}</p>

                        @endif



                        @if ($banner->button_text && $banner->link)

                            <a href="{{ $banner->link }}" class="bb-primary-btn">

                                {{ $banner->button_text }}

                                <span>&rarr;</span>

                            </a>

                        @endif

                    </div>

                </div>

            @endforeach



            @if ($banners->count() > 1)

                <button type="button" class="bb-hero-arrow bb-hero-arrow-prev" data-hero-prev aria-label="Previous banner">

                    <span aria-hidden="true">&#8249;</span>

                </button>

                <button type="button" class="bb-hero-arrow bb-hero-arrow-next" data-hero-next aria-label="Next banner">

                    <span aria-hidden="true">&#8250;</span>

                </button>



                <div class="bb-hero-dots">

                    @foreach ($banners as $banner)

                        <button

                            type="button"

                            class="bb-hero-dot {{ $loop->first ? 'active' : '' }}"

                            data-slide="{{ $loop->index }}"

                            aria-label="Slide {{ $loop->iteration }}"

                        ></button>

                    @endforeach

                </div>

            @endif



        </section>

        @else

        <section class="bb-hero">



            <div class="bb-hero-slider">



                <div class="bb-hero-slide active">

                    <img

                        src="{{ asset('images/hero1.webp') }}"

                        alt="Buffbridge Custom Crew"

                        class="bb-hero-image"

                        fetchpriority="high"

                    >

                </div>



                <div class="bb-hero-slide">

                    <img

                        src="{{ asset('images/hero2.webp') }}"

                        alt="Buffbridge Custom Crew"

                        class="bb-hero-image"

                        loading="lazy"

                        decoding="async"

                    >

                </div>



                <div class="bb-hero-slide">

                    <img

                        src="{{ asset('images/hero3.webp') }}"

                        alt="Buffbridge Custom Crew"

                        class="bb-hero-image"

                        loading="lazy"

                        decoding="async"

                    >

                </div>



                <div class="bb-hero-slide">

                    <img

                        src="{{ asset('images/hero4.webp') }}"

                        alt="Buffbridge Custom Crew"

                        class="bb-hero-image"

                        loading="lazy"

                        decoding="async"

                    >

                </div>



            </div>





            <div class="bb-hero-overlay">

                <div class="bb-hero-content">



                    <h1 class="bb-hero-title">

                        NEW

                        <span>ARRIVALS</span>

                    </h1>



                    <div class="bb-hero-line"></div>



                    <p class="bb-hero-subtitle">

                        SELECTED GEAR<br>

                        FOR REAL PLAYERS.

                    </p>



                    <a

                        href="{{ route('products.index') }}"

                        class="bb-primary-btn"

                    >

                        VIEW ALL

                        <span>→</span>

                    </a>



                </div>

            </div>





            <div class="bb-hero-dots">



                <button

                    type="button"

                    class="bb-hero-dot active"

                    data-slide="0"

                    aria-label="Slide 1"

                ></button>



                <button

                    type="button"

                    class="bb-hero-dot"

                    data-slide="1"

                    aria-label="Slide 2"

                ></button>



                <button

                    type="button"

                    class="bb-hero-dot"

                    data-slide="2"

                    aria-label="Slide 3"

                ></button>



                <button

                    type="button"

                    class="bb-hero-dot"

                    data-slide="3"

                    aria-label="Slide 4"

                ></button>



            </div>



        </section>

        @endif





        {{-- CATEGORY / QUICK SHOP --}}
        <section class="bb-category-bar">
            <div class="bb-page-padding bb-category-inner">
                <nav class="bb-category-list" aria-label="Quick product filters">
                    <a
                        href="{{ route('products.index') }}"
                        class="bb-category-item active"
                    >
                        ALL
                    </a>

                    <a
                        href="{{ route('products.index', ['orderby' => 'date']) }}"
                        class="bb-category-item"
                    >
                        NEW ARRIVALS
                    </a>

                    <a
                        href="{{ route('products.index', ['availability' => 'In Stock']) }}"
                        class="bb-category-item"
                    >
                        IN STOCK
                    </a>

                    <a
                        href="{{ route('products.index', ['availability' => 'Pre-Order']) }}"
                        class="bb-category-item"
                    >
                        PRE-ORDER
                    </a>

                    <a
                        href="{{ route('products.index', ['restock' => 'true']) }}"
                        class="bb-category-item"
                    >
                        RESTOCKED
                    </a>
                </nav>

            </div>
        </section>


        {{-- NEW ARRIVALS --}}

        <section class="bb-product-section">



            <div class="bb-page-padding">



                <div class="bb-section-heading">



                    <div class="bb-section-heading-left">



                        <span class="bb-section-kicker">

                            SELECTED GEAR

                        </span>



                        <h2 class="bb-section-title">

                            NEW ARRIVALS

                        </h2>



                    </div>





                    <a

                        href="{{ route('products.index') }}"

                        class="bb-view-all"

                    >

                        VIEW ALL

                    </a>



                </div>





                <ul class="bb-product-grid">



                    @foreach ($products as $product)



                        <li class="bb-product-card">



                            <div

                                class="bb-product-badge {{ strtolower(str_replace(' ', '-', $product->availability)) }}"

                            >

                                {{ $product->availability }}

                            </div>





                            <div class="bb-product-image">



                                <a href="{{ route('products.show', $product->id) }}">



                                    @if ($product->images->isNotEmpty())



                                        <img

                                            src="{{ env('APP_ADMIN_URL') . '/storage/' . $product->images->first()->image_path }}"

                                            alt="{{ $product->name }}"

                                            loading="lazy"

                                        >



                                    @else



                                        <div class="bb-product-image-placeholder">

                                            NO IMAGE

                                        </div>



                                    @endif



                                </a>



                            </div>





                            <div class="bb-product-info">



                                <span class="bb-product-brand">

                                    {{ $product->brand ?? 'BUFFBRIDGE' }}

                                </span>





                                <h3 class="bb-product-name">

                                    <a href="{{ route('products.show', $product->id) }}">

                                        {{ $product->name }}

                                    </a>

                                </h3>





                                <div class="bb-product-price">



                                    @if ($product->variants->count() > 0)



                                        {{ number_format($product->variants->first()->price, 2) }}฿



                                    @else



                                        {{ number_format($product->price, 2) }}฿



                                    @endif



                                </div>





                                <div class="bb-product-actions">



                                    @if ($product->availability !== 'Out of Stock')



                                        <button

                                            type="button"

                                            class="button add_to_cart_button bb-cart-button bb-add-to-cart-ui"

                                            aria-label="Add {{ $product->name }} to cart"

                                            data-url="{{ route('cart.add', ['id' => $product->id], false) }}"

                                            data-bb-cart-add

                                        >

                                            ADD TO CART

                                        </button>



                                    @endif





                                    <a

                                        href="{{ route('products.show', $product->id) }}"

                                        class="bb-detail-button"

                                        aria-label="View {{ $product->name }}"

                                    >

                                        ♡

                                    </a>





                                    <a

                                        href="{{ route('products.show', $product->id) }}"

                                        class="bb-more"

                                        aria-label="More details"

                                    >

                                        ···

                                    </a>



                                </div>



                            </div>



                        </li>



                    @endforeach



                </ul>



            </div>



        </section>





        {{-- PRE ORDER --}}

        @if (isset($products_preorder) && $products_preorder->count() > 0)



            <section class="bb-product-section">



                <div class="bb-page-padding">



                    <div class="bb-section-heading">



                        <div class="bb-section-heading-left">



                            <span class="bb-section-kicker">

                                COMING SOON

                            </span>



                            <h2 class="bb-section-title">

                                PRE ORDER

                            </h2>



                        </div>





                        <a

                            href="{{ route('products.index', ['search' => 'Pre-Order']) }}"

                            class="bb-view-all"

                        >

                            VIEW ALL

                        </a>



                    </div>





                    <ul class="bb-product-grid">



                        @foreach ($products_preorder as $product)



                            <li class="bb-product-card">



                                <div

                                    class="bb-product-badge {{ strtolower(str_replace(' ', '-', $product->availability)) }}"

                                >

                                    {{ $product->availability }}

                                </div>





                                <div class="bb-product-image">



                                    <a href="{{ route('products.show', $product->id) }}">



                                        @if ($product->images->isNotEmpty())



                                            <img

                                                src="{{ env('APP_ADMIN_URL') . '/storage/' . $product->images->first()->image_path }}"

                                                alt="{{ $product->name }}"

                                                loading="lazy"

                                            >



                                        @else



                                            <div class="bb-product-image-placeholder">

                                                NO IMAGE

                                            </div>



                                        @endif



                                    </a>



                                </div>





                                <div class="bb-product-info">



                                    <span class="bb-product-brand">

                                        {{ $product->brand ?? 'BUFFBRIDGE' }}

                                    </span>



                                    <h3 class="bb-product-name">

                                        <a href="{{ route('products.show', $product->id) }}">

                                            {{ $product->name }}

                                        </a>

                                    </h3>



                                    <div class="bb-product-price">



                                        @if ($product->variants->count() > 0)



                                            {{ number_format($product->variants->first()->price, 2) }}฿



                                        @else



                                            {{ number_format($product->price, 2) }}฿



                                        @endif



                                    </div>





                                    <div class="bb-product-actions">



                                        @if ($product->availability !== 'Out of Stock')



                                            <button

                                                type="button"

                                                class="button add_to_cart_button bb-cart-button bb-add-to-cart-ui"

                                                aria-label="Add {{ $product->name }} to cart"

                                                data-url="{{ route('cart.add', ['id' => $product->id], false) }}"

                                                data-bb-cart-add

                                            >

                                                ADD TO CART

                                            </button>



                                        @endif





                                        <a

                                            href="{{ route('products.show', $product->id) }}"

                                            class="bb-detail-button"

                                            aria-label="View {{ $product->name }}"

                                        >

                                            ♡

                                        </a>





                                        <a

                                            href="{{ route('products.show', $product->id) }}"

                                            class="bb-more"

                                            aria-label="More details"

                                        >

                                            ···

                                        </a>



                                    </div>



                                </div>



                            </li>



                        @endforeach



                    </ul>



                </div>



            </section>



        @endif





        {{-- RE-STOCK --}}

        @if (isset($products_restock) && $products_restock->count() > 0)



            <section class="bb-product-section">



                <div class="bb-page-padding">



                    <div class="bb-section-heading">



                        <div class="bb-section-heading-left">



                            <span class="bb-section-kicker">

                                BACK IN STOCK

                            </span>



                            <h2 class="bb-section-title">

                                RE-STOCK

                            </h2>



                        </div>





                        <a

                            href="/products?restock=true"

                            class="bb-view-all"

                        >

                            VIEW ALL

                        </a>



                    </div>





                    <ul class="bb-product-grid">



                        @foreach ($products_restock as $log)



                            @if ($log->product)



                                @php

                                    $product = $log->product;

                                @endphp





                                <li class="bb-product-card">



                                    <div

                                        class="bb-product-badge {{ strtolower(str_replace(' ', '-', $product->availability)) }}"

                                    >

                                        {{ $product->availability }}

                                    </div>





                                    <div class="bb-product-image">



                                        <a href="{{ route('products.show', $product->id) }}">



                                            @if ($product->images->isNotEmpty())



                                                <img

                                                    src="{{ env('APP_ADMIN_URL') . '/storage/' . $product->images->first()->image_path }}"

                                                    alt="{{ $product->name }}"

                                                    loading="lazy"

                                                >



                                            @else



                                                <div class="bb-product-image-placeholder">

                                                    NO IMAGE

                                                </div>



                                            @endif



                                        </a>



                                    </div>





                                    <div class="bb-product-info">



                                        <span class="bb-product-brand">

                                            {{ $product->brand ?? 'BUFFBRIDGE' }}

                                        </span>



                                        <h3 class="bb-product-name">

                                            <a href="{{ route('products.show', $product->id) }}">

                                                {{ $product->name }}

                                            </a>

                                        </h3>



                                        <div class="bb-product-price">



                                            @if ($product->variants->count() > 0)



                                                {{ number_format($product->variants->first()->price, 2) }}฿



                                            @else



                                                {{ number_format($product->price, 2) }}฿



                                            @endif



                                        </div>





                                        <div class="bb-product-actions">



                                            @if ($product->availability !== 'Out of Stock')



                                                <button

                                                    type="button"

                                                    class="button add_to_cart_button bb-cart-button bb-add-to-cart-ui"

                                                    aria-label="Add {{ $product->name }} to cart"

                                                    data-url="{{ route('cart.add', ['id' => $product->id], false) }}"

                                                    data-bb-cart-add

                                                >

                                                    ADD TO CART

                                                </button>



                                            @endif





                                            <a

                                                href="{{ route('products.show', $product->id) }}"

                                                class="bb-detail-button"

                                                aria-label="View {{ $product->name }}"

                                            >

                                                ♡

                                            </a>





                                            <a

                                                href="{{ route('products.show', $product->id) }}"

                                                class="bb-more"

                                                aria-label="More details"

                                            >

                                                ···

                                            </a>



                                        </div>



                                    </div>



                                </li>



                            @endif



                        @endforeach



                    </ul>



                </div>



            </section>



        @endif





        {{-- PROMOTIONAL BANNER --}}

        <section class="bb-promo">



            <div class="bb-page-padding">



                <a

                    href="{{ route('products.index') }}"

                    class="bb-promo-card"

                >



                    <div class="bb-promo-image"></div>



                    <div class="bb-promo-copy">



                        <div class="bb-promo-label">

                            BUFFBRIDGE

                        </div>



                        <div class="bb-promo-subtitle">

                            CUSTOM CREW

                        </div>



                        <div class="bb-promo-jp">

                            エアガンの収集家です。

                        </div>



                        <span class="bb-promo-arrow">

                            →

                        </span>



                    </div>



                </a>



            </div>



        </section>





        {{-- BENEFITS --}}

        <section class="bb-benefits">



            <div class="bb-page-padding">



                <div class="bb-benefits-grid">



                    <div class="bb-benefit">



                        <div class="bb-benefit-icon" aria-hidden="true">

                            <svg viewBox="0 0 24 24">

                                <path d="M3 5h11v10H3V5Zm11 4h3.4L21 12.6V15h-7V9Z"/>

                                <circle cx="7" cy="17" r="2"/>

                                <circle cx="18" cy="17" r="2"/>

                                <path d="M3 15h2M9 15h7"/>

                            </svg>

                        </div>



                        <div class="bb-benefit-content">



                            <h3 class="bb-benefit-title">

                                FAST SHIPPING

                            </h3>



                            <p class="bb-benefit-text">

                                THAILAND WIDE

                            </p>



                        </div>



                    </div>





                    <div class="bb-benefit">



                        <div class="bb-benefit-icon" aria-hidden="true">

                            <svg viewBox="0 0 24 24">

                                <path d="M12 2.5 19 5v5.6c0 4.6-2.8 8.8-7 10.9-4.2-2.1-7-6.3-7-10.9V5l7-2.5Z"/>

                                <path d="m8.5 12 2.2 2.2 4.8-5"/>

                            </svg>

                        </div>



                        <div class="bb-benefit-content">



                            <h3 class="bb-benefit-title">

                                TRUSTED STORE

                            </h3>



                            <p class="bb-benefit-text">

                                100% ORIGINAL PRODUCTS

                            </p>



                        </div>



                    </div>





                    <div class="bb-benefit">



                        <div class="bb-benefit-icon" aria-hidden="true">

                            <svg viewBox="0 0 24 24">

                                <circle cx="12" cy="12" r="8.5"/>

                                <path d="M12 7v5l3.2 2"/>

                            </svg>

                        </div>



                        <div class="bb-benefit-content">



                            <h3 class="bb-benefit-title">

                                SUPPORT

                            </h3>



                            <p class="bb-benefit-text">

                                TUE - SAT 13.00 - 18.30

                            </p>



                        </div>



                    </div>



                </div>



            </div>



        </section>



    </div>





    <x-slot name="script">



        <script>

            document.addEventListener('DOMContentLoaded', function () {
const slides =

                    document.querySelectorAll('.bb-hero-slide');



                const dots =

                    document.querySelectorAll('.bb-hero-dot');



                const contentSlides =

                    document.querySelectorAll('.bb-hero-content-slide');



                const bannerSlider =

                    document.querySelector('[data-banner-slider]');



                const previousButton =

                    document.querySelector('[data-hero-prev]');



                const nextButton =

                    document.querySelector('[data-hero-next]');



                let currentSlide = 0;

                let sliderTimer = null;

                let activePointerId = null;

                let pointerStartX = 0;

                let pointerStartY = 0;

                let pointerDeltaX = 0;

                let isHorizontalDrag = false;





                function showSlide(index) {



                    if (!slides.length) {

                        return;

                    }



                    slides.forEach(function (slide) {

                        slide.classList.remove('active');

                    });



                    dots.forEach(function (dot) {

                        dot.classList.remove('active');

                    });



                    contentSlides.forEach(function (content) {

                        content.classList.remove('active');

                    });



                    currentSlide = index;



                    if (currentSlide >= slides.length) {

                        currentSlide = 0;

                    }



                    if (currentSlide < 0) {

                        currentSlide = slides.length - 1;

                    }



                    slides[currentSlide].classList.add('active');



                    if (dots[currentSlide]) {

                        dots[currentSlide].classList.add('active');



                        const dotTrack = dots[currentSlide].parentElement;



                        if (dotTrack && dotTrack.scrollWidth > dotTrack.clientWidth) {

                            const dotCenter = dots[currentSlide].offsetLeft + (dots[currentSlide].offsetWidth / 2);

                            dotTrack.scrollTo({

                                left: dotCenter - (dotTrack.clientWidth / 2),

                                behavior: 'smooth'

                            });

                        }

                    }



                    if (contentSlides[currentSlide]) {

                        contentSlides[currentSlide].classList.add('active');

                    }

                }





                function nextSlide() {

                    showSlide(currentSlide + 1);

                }





                function stopSlider() {



                    if (!sliderTimer) {

                        return;

                    }



                    clearInterval(sliderTimer);

                    sliderTimer = null;

                }





                function startSlider() {



                    stopSlider();



                    if (slides.length <= 1) {

                        return;

                    }



                    sliderTimer = setInterval(function () {

                        nextSlide();

                    }, 5000);

                }





                dots.forEach(function (dot) {



                    dot.addEventListener('click', function () {



                        const index =

                            Number(this.dataset.slide);



                        showSlide(index);

                        startSlider();

                    });



                });





                if (previousButton) {

                    previousButton.addEventListener('click', function () {

                        stopSlider();

                        showSlide(currentSlide - 1);

                        startSlider();

                    });

                }





                if (nextButton) {

                    nextButton.addEventListener('click', function () {

                        stopSlider();

                        showSlide(currentSlide + 1);

                        startSlider();

                    });

                }





                function finishPointerInteraction(event) {



                    if (activePointerId === null || event.pointerId !== activePointerId) {

                        return;

                    }



                    const shouldChangeSlide =

                        isHorizontalDrag && Math.abs(pointerDeltaX) >= 45;



                    if (shouldChangeSlide) {

                        showSlide(pointerDeltaX < 0 ? currentSlide + 1 : currentSlide - 1);

                    }



                    bannerSlider.classList.remove('bb-hero-dragging');



                    if (bannerSlider.hasPointerCapture(activePointerId)) {

                        bannerSlider.releasePointerCapture(activePointerId);

                    }



                    activePointerId = null;

                    pointerDeltaX = 0;

                    isHorizontalDrag = false;

                    startSlider();

                }





                if (bannerSlider && slides.length > 1) {



                    bannerSlider.addEventListener('pointerdown', function (event) {



                        if (!event.isPrimary || (event.pointerType === 'mouse' && event.button !== 0)) {

                            return;

                        }



                        if (event.target.closest('a, button')) {

                            return;

                        }



                        activePointerId = event.pointerId;

                        pointerStartX = event.clientX;

                        pointerStartY = event.clientY;

                        pointerDeltaX = 0;

                        isHorizontalDrag = false;

                        stopSlider();

                        bannerSlider.setPointerCapture(activePointerId);

                    });



                    bannerSlider.addEventListener('pointermove', function (event) {



                        if (activePointerId === null || event.pointerId !== activePointerId) {

                            return;

                        }



                        pointerDeltaX = event.clientX - pointerStartX;

                        const pointerDeltaY = event.clientY - pointerStartY;



                        if (!isHorizontalDrag && Math.abs(pointerDeltaX) > 8) {

                            isHorizontalDrag = Math.abs(pointerDeltaX) > Math.abs(pointerDeltaY);

                        }



                        if (isHorizontalDrag) {

                            event.preventDefault();

                            bannerSlider.classList.add('bb-hero-dragging');

                        }

                    });



                    bannerSlider.addEventListener('pointerup', finishPointerInteraction);

                    bannerSlider.addEventListener('pointercancel', finishPointerInteraction);

                }





                const hero =

                    document.querySelector('.bb-hero');



                if (hero) {



                    hero.addEventListener(

                        'mouseenter',

                        stopSlider

                    );



                    hero.addEventListener(

                        'mouseleave',

                        startSlider

                    );

                }





                showSlide(0);

                startSlider();



                document.querySelectorAll('.bb-hero-image[data-fallback]').forEach(function (image) {

                    image.addEventListener('error', function () {

                        const picture = this.closest('picture');



                        if (picture) {

                            picture.querySelectorAll('source').forEach(function (source) {

                                source.remove();

                            });

                        }



                        this.src = this.dataset.fallback;

                    }, { once: true });

                });





            });

        </script>





        @if (

            request('showLoginModal') ||

            request('showRegisterModal')

        )



            <script>

                document.addEventListener(

                    'DOMContentLoaded',

                    function () {



                        if (

                            {{ request('showLoginModal') ? 'true' : 'false' }}

                        ) {



                            const loginBtn =

                                document.querySelector(

                                    '.popup_login_link'

                                );



                            if (loginBtn) {

                                loginBtn.click();

                            }

                        }





                        if (

                            {{ request('showRegisterModal') ? 'true' : 'false' }}

                        ) {



                            const registerBtn =

                                document.querySelector(

                                    '.popup_register_link'

                                );



                            if (registerBtn) {

                                registerBtn.click();

                            }

                        }

                    }

                );

            </script>



        @endif



    </x-slot>



</x-guest-layout>
