<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/skin.css') }}" type="text/css" media="all" />
    <style>
        @media (max-width: 767px) {

            .content_wrap {
                width: 100% !important;
                padding: 0 5px !important;
                /* ลด padding ด้านข้างเพื่อให้เต็มจอมากขึ้น */
            }

            .div-products .products,
            .product-category-div .products {
                display: grid !important;
                grid-template-columns: repeat(2, 1fr);
                gap: 0.5rem;
                padding: 0 !important;
                /* สำคัญ — ต้องไม่มี padding */
            }

            .woocommerce ul.products::before,
            .woocommerce ul.products::after {
                display: none !important;
                content: none !important;
            }

            .div-products .product {
                background: #fff;
                overflow: hidden;
                padding-bottom: 10px;
                text-align: center;
                /* จัดกึ่งกลางเนื้อหาและรูปภาพ */
            }

            .div-products .product .post_thumb {
                margin-bottom: 5px;
            }

            .div-products .product .post_thumb img {
                width: 100%;
                height: auto;
                object-fit: cover;
                margin: 0 auto;
                /* จัดรูปกึ่งกลาง */
            }

            .div-products .product h2 {
                font-size: 0.95rem;
                line-height: 1.2rem;
                min-height: 2.4rem;
                margin-top: 0.5rem;
            }

            .div-products .price {
                font-size: 1rem;
                font-weight: 600;
                display: block;
                margin-bottom: 6px;
            }

            .div-products .star-rating {
                display: none !important;
            }

            .div-products .button.add_to_cart_button {
                width: 100%;
                padding: 8px 0;
                font-size: 0.9rem;
            }

            /* Spacing Adjustments for Mobile */
            .product-category-div {
                margin-top: 0.5rem !important;
                padding-top: 0.5rem !important;
            }

            .product-category-div .empty_space {
                display: none !important;
            }

            .custom_texture_bg1 .empty_space {
                height: 1.5rem !important;
            }

            /* Slider Adjustments for Mobile */
            .slider_wrap .rev_slider_wrapper,
            .slider_wrap .rev_slider {
                height: 220px !important;
                min-height: 220px !important;
            }

            .slider_wrap .rev_slider img {
                object-fit: cover !important;
                height: 100% !important;
                width: 100% !important;
            }
        }
    </style>
    <section class="slider_wrap slider_fullwide slider_engine_revo slider_alias_home-4">
        <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-source="gallery">
            <!-- START REVOLUTION SLIDER -->
            <div id="rev_slider_4_1" class="rev_slider fullwidthabanner" data-version="5.4.3">
                <ul>
                    <!-- SLIDE 1 -->
                    <li data-index="rs-12" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                        data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1=""
                        data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""
                        data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="js/vendor/revslider/images/transparent.png" data-bgcolor='rgb(29 30 35)'
                            alt="" title="Home 4" data-bgposition="center center" data-bgfit="contain"
                            data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption tp-resizeme" id="slide-12-layer-1" data-x="center" data-hoffset=""
                            data-y="center" data-voffset="" data-width="['none','none','none','none']"
                            data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on"
                            data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":300,"ease":"Linear.easeNone"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                            <img src="{{ asset('images/slide_1.png') }}" alt="" data-ww="100%" data-hh="100%"
                                style="object-fit: cover; width: 100%; height: 100%;">
                        </div>

                    </li>
                    <!-- SLIDE  2 -->
                    <li data-index="rs-11" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                        data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1=""
                        data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""
                        data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="js/vendor/revslider/images/transparent.png" data-bgcolor='rgb(29 30 35)'
                            alt="" title="Home 4" data-bgposition="center center" data-bgfit="contain"
                            data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 6 -->
                        <div class="tp-caption tp-resizeme" id="slide-11-layer-1" data-x="center" data-hoffset=""
                            data-y="center" data-voffset="" data-width="['none','none','none','none']"
                            data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on"
                            data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":300,"ease":"Linear.easeNone"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                            data-paddingleft="[0,0,0,0]">
                            <img src="{{ asset('images/slide_2.png') }}" alt="" data-ww="100%"
                                data-hh="100%" style="object-fit: cover; width: 100%; height: 100%;">
                        </div>

                    </li>
                    <!-- SLIDE 3 -->
                    <li data-index="rs-13" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                        data-masterspeed="300" data-thumb="" data-rotate="0" data-saveperformance="off"
                        data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4=""
                        data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10=""
                        data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="js/vendor/revslider/images/transparent.png" data-bgcolor='rgb(29 30 35)'
                            alt="" title="Home 4" data-bgposition="center center" data-bgfit="contain"
                            data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 12 -->
                        <div class="tp-caption tp-resizeme" id="slide-13-layer-1" data-x="center" data-hoffset=""
                            data-y="center" data-voffset="" data-width="['none','none','none','none']"
                            data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on"
                            data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":300,"ease":"Linear.easeNone"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                            data-paddingleft="[0,0,0,0]">
                            <img src="{{ asset('images/slide_3.png') }}" alt="" data-ww="100%"
                                data-hh="100%" style="object-fit: cover; width: 100%; height: 100%;">
                        </div>

                    </li>
                    <!-- SLIDE 4 -->
                    <li data-index="rs-14" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                        data-masterspeed="300" data-thumb="" data-rotate="0" data-saveperformance="off"
                        data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4=""
                        data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10=""
                        data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="js/vendor/revslider/images/transparent.png" data-bgcolor='rgb(29 30 35)'
                            alt="" title="Home 4" data-bgposition="center center" data-bgfit="contain"
                            data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 12 -->
                        <div class="tp-caption tp-resizeme" id="slide-14-layer-1" data-x="center" data-hoffset=""
                            data-y="center" data-voffset="" data-width="['none','none','none','none']"
                            data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on"
                            data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":300,"ease":"Linear.easeNone"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                            data-paddingleft="[0,0,0,0]">
                            <img src="{{ asset('images/slide_4.png') }}" alt="" data-ww="100%"
                                data-hh="100%" style="object-fit: cover; width: 100%; height: 100%;">
                        </div>

                    </li>
                </ul>
                <div class="tp-bannertimer tp-bottom"></div>
            </div>
        </div>
        <!-- END REVOLUTION SLIDER -->
        <!-- Page Content -->
        <div class="page_content_wrap page_paddings_no">
            <!-- Content -->
            <div class="content">
                <article class="post_item post_item_single">
                    <section class="post_content">
                        <!-- Product categories -->
                        <div class="bg_dark_style_2 mt-5 product-category-div" style="margin-top:3rem;">
                            <div class="content_wrap">
                                <div class="empty_space height_2_8em"></div>
                                <div class="woocommerce columns-2">
                                    <ul class="products">
                                        <li class="product-category product first"
                                            onclick="window.location.href='/products?category=1'">
                                            <div class="post_item_wrap">
                                                <div class="post_featured">
                                                    <div class="post_thumb home_cate">
                                                        <a href="/products?category=1">
                                                            <img src="{{ asset('images/cate_1.png') }}"
                                                                alt="" />
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>
                                        <li class="product-category product"
                                            onclick="window.location.href='/products?category=28'">
                                            <div class="post_item_wrap">
                                                <div class="post_featured">
                                                    <div class="post_thumb home_cate">
                                                        <a href="/products?category=28">
                                                            <img src="{{ asset('images/cate_2.png') }}"
                                                                alt="" />
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>
                                        <li class="product-category product"
                                            onclick="window.location.href='/products?category=62'">
                                            <div class="post_item_wrap">
                                                <div class="post_featured">
                                                    <div class="post_thumb home_cate">
                                                        <a href="/products?category=62">
                                                            <img src="{{ asset('images/cate_3.png') }}"
                                                                alt="" />
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>
                                        <li class="product-category product last"
                                            onclick="window.location.href='/products?category=84'">
                                            <div class="post_item_wrap">
                                                <div class="post_featured">
                                                    <div class="post_thumb home_cate">
                                                        <a href="/products?category=84">
                                                            <img src="{{ asset('images/cate_4.png') }}"
                                                                alt="" />
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="empty_space height_0_7em"></div>
                            </div>
                        </div>
                        <!-- /Product categories -->
                        <!-- Featured Products -->
                        <div class="custom_texture_bg1">
                            <div class="content_wrap">
                                <div class="empty_space height_5_5em"></div>
                                <div class="sc_section scheme_light">
                                    <div class="sc_section_inner">
                                        <h2 class="sc_section_title sc_item_title text-white"
                                            style="color:white !important;">
                                            NEW ARRIVALS
                                        </h2>
                                        <div class="sc_section_descr sc_item_descr">
                                        </div>
                                        <div class="product-section-header">
                                            <div class="spacer"></div> <!-- ใช้ดัน View All ไปทางขวา -->
                                            <a href="{{ route('products.index') }}" class="product-view-all">View
                                                All</a>
                                        </div>
                                        <div class="woocommerce columns-4 div-products">
                                            <ul class="products">
                                                <!-- Product Item -->
                                                @foreach ($products as $product)
                                                    <li class="product">
                                                        <div
                                                            class="availability-badge {{ strtolower(str_replace(' ', '-', $product->availability)) }}">
                                                            {{ $product->availability }}
                                                        </div>
                                                        <div class="post_item_wrap">
                                                            <div class="post_featured">
                                                                <div class="post_thumb">
                                                                    <a
                                                                        href="{{ route('products.show', $product->id) }}">
                                                                        @if ($product->images->isNotEmpty())
                                                                            <img src="{{ env('APP_ADMIN_URL') . '/storage/' . $product->images->first()->image_path }}"
                                                                                alt="{{ $product->name }}">
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="post_content">
                                                                <h2 class="woocommerce-loop-product__title"><a
                                                                        href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                                                </h2>
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            @if ($product->variants->count() > 0)
                                                                                <div>
                                                                                    <span
                                                                                        class="woocommerce-Price-currencySymbol"></span>
                                                                                    {{ number_format($product->variants->first()->price, 2) }}฿
                                                                                </div>
                                                                            @else
                                                                                <span
                                                                                    class="woocommerce-Price-currencySymbol"></span>
                                                                                {{ number_format($product->price, 2) }}฿
                                                                            @endif
                                                                        </span>
                                                                    </ins>
                                                                </span>

                                                                <button type="button"
                                                                    class="button add_to_cart_button"
                                                                    data-url="{{ route('cart.add', ['id' => $product->id]) }}">
                                                                    Add to cart
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                                <!-- /Product Item -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="empty_space height_2em"></div>
                                <!-- /Featured Products -->
                                <!-- Pre-Order Section -->
                                @if (isset($products_preorder) && $products_preorder->count() > 0)
                                    <div class="empty_space height_2em"></div>
                                    <div class="sc_section scheme_light">
                                        <div class="sc_section_inner">
                                            <h2 class="sc_section_title sc_item_title text-white"
                                                style="color:white !important;">PRE ORDER
                                            </h2>
                                            <div class="sc_section_descr sc_item_descr">
                                            </div>
                                            <div class="product-section-header">
                                                <div class="spacer"></div>
                                                <a href="{{ route('products.index', ['search' => 'Pre-Order']) }}"
                                                    class="product-view-all">View All</a>
                                            </div>
                                            <div class="woocommerce columns-4 div-products">
                                                <ul class="products">
                                                    <!-- Product Item -->
                                                    @foreach ($products_preorder as $product)
                                                        <li class="product">
                                                            <div
                                                                class="availability-badge {{ strtolower(str_replace(' ', '-', $product->availability)) }}">
                                                                {{ $product->availability }}
                                                            </div>
                                                            <div class="post_item_wrap">
                                                                <div class="post_featured">
                                                                    <div class="post_thumb">
                                                                        <a
                                                                            href="{{ route('products.show', $product->id) }}">
                                                                            @if ($product->images->isNotEmpty())
                                                                                <img src="{{ env('APP_ADMIN_URL') . '/storage/' . $product->images->first()->image_path }}"
                                                                                    alt="{{ $product->name }}">
                                                                            @endif
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="post_content">
                                                                    <h2 class="woocommerce-loop-product__title"><a
                                                                            href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                                                    </h2>
                                                                    <span class="price">
                                                                        <ins>
                                                                            <span
                                                                                class="woocommerce-Price-amount amount">
                                                                                @if ($product->variants->count() > 0)
                                                                                    <div>
                                                                                        <span
                                                                                            class="woocommerce-Price-currencySymbol"></span>
                                                                                        {{ number_format($product->variants->first()->price, 2) }}฿
                                                                                    </div>
                                                                                @else
                                                                                    <span
                                                                                        class="woocommerce-Price-currencySymbol"></span>
                                                                                    {{ number_format($product->price, 2) }}฿
                                                                                @endif
                                                                            </span>
                                                                        </ins>
                                                                    </span>

                                                                    <button type="button"
                                                                        class="button add_to_cart_button"
                                                                        data-url="{{ route('cart.add', ['id' => $product->id]) }}">
                                                                        Add to cart
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <!-- /Pre-Order Section -->

                                <!-- Restock Section -->
                                <div class="empty_space height_2em"></div>
                                <div class="sc_section scheme_light">
                                    <div class="sc_section_inner">
                                        <h2 class="sc_section_title sc_item_title text-white"
                                            style="color:white !important;">RE-STOCK
                                        </h2>
                                        <div class="sc_section_descr sc_item_descr">
                                        </div>
                                        <div class="product-section-header">
                                            <div class="spacer"></div> <!-- ใช้ดัน View All ไปทางขวา -->
                                            <a href="/products?restock=true" class="product-view-all">View
                                                All</a>
                                        </div>
                                        <div class="woocommerce columns-4 div-products">
                                            <ul class="products">
                                                <!-- Product Item -->
                                                @foreach ($products_restock as $log)
                                                    <li class="product">
                                                        <div
                                                            class="availability-badge {{ strtolower(str_replace(' ', '-', $log->product->availability)) }}">
                                                            {{ $log->product->availability }}
                                                        </div>
                                                        <div class="post_item_wrap">
                                                            <div class="post_featured">
                                                                <div class="post_thumb">
                                                                    <a
                                                                        href="{{ route('products.show', $log->product->id) }}">
                                                                        @if ($log->product->images->isNotEmpty())
                                                                            <img src="{{ env('APP_ADMIN_URL') . '/storage/' . $log->product->images->first()->image_path }}"
                                                                                alt="{{ $log->product->name }}">
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="post_content">
                                                                <h2 class="woocommerce-loop-product__title"><a
                                                                        href="{{ route('products.show', $log->product->id) }}">{{ $log->product->name }}</a>
                                                                </h2>
                                                                {{-- @php
                                                                $rating = $log->product->average_rating ?? 0;
                                                                $widthPercent = ($rating / 5) * 100;
                                                            @endphp

                                                            <div class="star-rating" title="Rated {{ number_format($rating, 2) }} out of 5">
                                                                <span class="width_100_per" style="width: {{ $widthPercent }}%;">
                                                                    <strong class="rating">{{ number_format($rating, 2) }}</strong> out of 5
                                                                </span>
                                                            </div> --}}
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            @if ($log->product->variants->count() > 0)
                                                                                <div>
                                                                                    <span
                                                                                        class="woocommerce-Price-currencySymbol"></span>
                                                                                    {{ number_format($log->product->variants->first()->price, 2) }}฿
                                                                                </div>
                                                                            @else
                                                                                <span
                                                                                    class="woocommerce-Price-currencySymbol"></span>
                                                                                {{ number_format($log->product->price, 2) }}฿
                                                                            @endif
                                                                        </span>
                                                                    </ins>
                                                                </span>

                                                                @if ($log->product->availability !== 'Out of Stock')
                                                                    <button type="button"
                                                                        class="button add_to_cart_button"
                                                                        data-url="{{ route('cart.add', ['id' => $log->product->id]) }}">
                                                                        Add to cart
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                                <!-- /Product Item -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="empty_space height_5_7em"></div>
                            </div>
                        </div>
                        <!-- /Featured Products -->
                        <!-- Promo section -->
                        <div class="bg_dark_style_2" style="display: none;">
                            <div class="content_wrap">
                                <div class="empty_space height_2_857em"></div>
                                <div
                                    class="columns_wrap sc_columns columns_nofluid sc_columns_count_2 responsive_columns ">
                                    <div class="column-1_2 sc_column_item sc_column_item_1 odd first">
                                        <div class="sc_promo sc_promo_size_small">
                                            <div class="sc_promo_inner">
                                                <div class="sc_promo_image custom_promo_bg1"></div>
                                                <div class="sc_promo_block sc_align_left custom_promo_block_1">
                                                    <div class="sc_promo_block_inner">
                                                        <h2 class="sc_promo_title sc_item_title">Save Up to 40%
                                                        </h2>
                                                        <div class="sc_promo_descr sc_item_descr">on new
                                                            handguns</div>
                                                        <div class="sc_promo_button sc_item_button">
                                                            <a href="#"
                                                                class="sc_button sc_button_square sc_button_style_border sc_button_size_small">Shop
                                                                Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column-1_2 sc_column_item sc_column_item_2 even">
                                        <div class="sc_promo sc_promo_size_small">
                                            <div class="sc_promo_inner">
                                                <div class="sc_promo_image custom_promo_bg2"></div>
                                                <div class="sc_promo_block sc_align_left custom_promo_block_1">
                                                    <div class="sc_promo_block_inner">
                                                        <h2 class="sc_promo_title sc_item_title">Free Shipping
                                                        </h2>
                                                        <div class="sc_promo_descr sc_item_descr">on Order Over
                                                            $500
                                                        </div>
                                                        <div class="sc_promo_button sc_item_button">
                                                            <a href="#"
                                                                class="sc_button sc_button_square sc_button_style_border sc_button_size_small">Shop
                                                                Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="empty_space height_2_857em"></div>
                            </div>
                        </div>

                        <div class="custom_texture_bg1">
                            <div class="content_wrap banner_bottom">
                                <div class="sc_section scheme_light">
                                    {{-- <div class="sc_section_inner">
                                        <img src="{{ asset('images/Bar ล่าง 01.png') }}" alt=""  style="margin-bottom: 1rem;"/>
                                        <img src="{{ asset('images/Bar ล่าง 02.png') }}" alt=""  style="margin-bottom: 1rem;"/>
                                        <img src="{{ asset('images/Bar ล่าง 03.png') }}" alt=""  style="margin-bottom: 1rem;"/>
                                        <img src="{{ asset('images/Bar ล่าง 04.png') }}" alt=""  style="margin-bottom: 1rem;"/>
                                    </div> --}}
                                    <!-- ติดตั้ง swiper -->
                                    <!-- ติดตั้ง Swiper -->
                                    <link rel="stylesheet"
                                        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

                                    <div class="swiper mySwiper">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img
                                                    src="{{ asset('images/Bar ล่าง 01.png') }}" alt=""></div>
                                            <div class="swiper-slide"><img
                                                    src="{{ asset('images/Bar ล่าง 02.png') }}" alt=""></div>
                                            <div class="swiper-slide"><img
                                                    src="{{ asset('images/Bar ล่าง 03.png') }}" alt=""></div>
                                            <div class="swiper-slide"><img
                                                    src="{{ asset('images/Bar ล่าง 04.png') }}" alt=""></div>
                                        </div>
                                    </div>

                                    <!-- ติดตั้ง Swiper Script -->
                                    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

                                    <script>
                                        var swiper = new Swiper(".mySwiper", {
                                            effect: "coverflow",
                                            grabCursor: true,
                                            centeredSlides: true,
                                            slidesPerView: "auto",
                                            loop: true, // แก้ตรงนี้
                                            speed: 800,
                                            autoplay: {
                                                delay: 2000,
                                                disableOnInteraction: false,
                                                waitForTransition: false,
                                            },
                                            coverflowEffect: {
                                                rotate: 30,
                                                stretch: 0,
                                                depth: 100,
                                                modifier: 1,
                                                slideShadows: true,
                                            },
                                        });
                                    </script>
                                    <style>
                                        .swiper {
                                            width: 100%;
                                            /* height: 400px; ปรับความสูงของ Slider */
                                        }

                                        .swiper-slide {
                                            background-position: center;
                                            background-size: cover;
                                            width: 80%;
                                            /* height: 350px; */
                                            overflow: hidden;
                                            border-radius: 10px;
                                        }

                                        .swiper-slide img {
                                            width: 100%;
                                            /* height: 100%; */
                                            object-fit: cover;
                                        }
                                    </style>



                                </div>
                                <div class="empty_space height_5_7em"></div>
                            </div>
                        </div>

                        {{-- <div class="accent2_bg scheme_light">
                            <div class="empty_space height_6_2em"></div>
                            <div class="sc_call_to_action sc_call_to_action_style_1 sc_call_to_action_align_center">
                                <div class="sc_call_to_action_info">
                                    <h2 class="sc_call_to_action_title sc_item_title"><b>Save up to 60%</b></h2>
                                    <div class="sc_call_to_action_descr sc_item_descr">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        <br /> elit. Nunc erat massa, sodales at odio eget</div>
                                    <div class="sc_call_to_action_buttons sc_item_buttons">
                                        <div class="sc_call_to_action_button sc_item_button">
                                            <a href="#" class="sc_button sc_button_square sc_button_style_dark sc_button_size_small">More Information</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="empty_space height_6em"></div>
                        </div> --}}
                        <!-- /Call To Action -->
                    </section>
                </article>
            </div>
            <!-- /Content -->
        </div>
        <!-- /Page Content -->
    </section>
    <x-slot name="script">
        <script>
            $(document).ready(function() {
                $('.add_to_cart_button').click(function() {
                    let url = $(this).data('url'); // ดึง URL จาก data-url ของปุ่ม
                    $.ajax({
                        url: url, // ใช้ Route เดิมที่อยู่ใน data-url
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}", // ส่ง CSRF Token ไปด้วย
                        },
                        success: function(response) {
                            window.location.reload();
                        },
                        error: function(xhr) {
                            if (xhr.responseJSON.message == 'Unauthenticated.') {
                                let l = document.querySelector('.popup_login_link');
                                l.click();
                            } else {
                                alert("Error: " + xhr.responseJSON.message);
                            }
                        }
                    });
                });
            });
        </script>

        @if (request('showLoginModal') || request('showRegisterModal'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    if ({{ request('showLoginModal') ? 'true' : 'false' }}) {
                        const loginBtn = document.querySelector('.popup_login_link');
                        if (loginBtn) loginBtn.click();
                    }

                    if ({{ request('showRegisterModal') ? 'true' : 'false' }}) {
                        const registerBtn = document.querySelector('.popup_register_link');
                        if (registerBtn) registerBtn.click();
                    }
                });
            </script>
        @endif

    </x-slot>
</x-guest-layout>
