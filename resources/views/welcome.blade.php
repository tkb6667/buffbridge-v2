<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/skin.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" type="text/css" media="all">

    <div class="buffbridge-home">

        {{-- HERO --}}
        <section class="bb-hero">
            <div class="bb-hero-slider">
                <div class="bb-hero-slide active">
                    <img src="{{ asset('images/hero1.png') }}"
                         alt="Buffbridge Custom Crew"
                         class="bb-hero-image">
                </div>

                <div class="bb-hero-slide">
                    <img src="{{ asset('images/hero2.png') }}"
                         alt="Buffbridge Custom Crew"
                         class="bb-hero-image">
                </div>

                <div class="bb-hero-slide">
                    <img src="{{ asset('images/hero3.png') }}"
                         alt="Buffbridge Custom Crew"
                         class="bb-hero-image">
                </div>

                <div class="bb-hero-slide">
                    <img src="{{ asset('images/hero4.png') }}"
                         alt="Buffbridge Custom Crew"
                         class="bb-hero-image">
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

                    <a href="{{ route('products.index') }}" class="bb-primary-btn">
                        VIEW ALL
                        <span>→</span>
                    </a>
                </div>
            </div>

            <div class="bb-hero-dots">
                <button type="button"
                        class="bb-hero-dot active"
                        data-slide="0"
                        aria-label="Slide 1"></button>

                <button type="button"
                        class="bb-hero-dot"
                        data-slide="1"
                        aria-label="Slide 2"></button>

                <button type="button"
                        class="bb-hero-dot"
                        data-slide="2"
                        aria-label="Slide 3"></button>

                <button type="button"
                        class="bb-hero-dot"
                        data-slide="3"
                        aria-label="Slide 4"></button>
            </div>
        </section>

        {{-- CATEGORY NAVIGATION --}}
        <section class="bb-category-bar">
            <div class="bb-page-padding bb-category-inner">

                <nav class="bb-category-list" aria-label="Product categories">
                    <a href="{{ route('products.index') }}"
                       class="bb-category-item active">
                        ALL
                    </a>

                    <a href="/products?category=1"
                       class="bb-category-item">
                        CATEGORY 01
                    </a>

                    <a href="/products?category=28"
                       class="bb-category-item">
                        CATEGORY 02
                    </a>

                    <a href="/products?category=62"
                       class="bb-category-item">
                        CATEGORY 03
                    </a>

                    <a href="/products?category=84"
                       class="bb-category-item">
                        CATEGORY 04
                    </a>
                </nav>

                <div class="bb-sort">
                    <select aria-label="Sort products"
                            onchange="if(this.value) window.location.href=this.value">

                        <option value="{{ route('products.index') }}">
                            NEWEST
                        </option>

                        <option value="{{ route('products.index', ['orderby' => 'price']) }}">
                            PRICE LOW - HIGH
                        </option>

                        <option value="{{ route('products.index', ['orderby' => 'price-desc']) }}">
                            PRICE HIGH - LOW
                        </option>
                    </select>
                </div>
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

                    <a href="{{ route('products.index') }}"
                       class="bb-view-all">
                        VIEW ALL
                    </a>
                </div>

                <ul class="bb-product-grid">
                    @foreach ($products as $product)

                        <li class="bb-product-card">

                            <div class="bb-product-badge {{ strtolower(str_replace(' ', '-', $product->availability)) }}">
                                {{ $product->availability }}
                            </div>

                            <div class="bb-product-image">
                                <a href="{{ route('products.show', $product->id) }}">

                                    @if ($product->images->isNotEmpty())

                                        <img
                                            src="{{ env('APP_ADMIN_URL') . '/storage/' . $product->images->first()->image_path }}"
                                            alt="{{ $product->name }}"
                                            loading="lazy">

                                    @else

                                        <div class="bb-product-image-placeholder">
                                            NO IMAGE
                                        </div>

                                    @endif

                                </a>
                            </div>

                            <div class="bb-product-info">

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
                                            class="button add_to_cart_button bb-cart-button"
                                            aria-label="Add {{ $product->name }} to cart"
                                            data-url="{{ route('cart.add', ['id' => $product->id]) }}">
                                            Add to cart
                                        </button>

                                    @endif

                                    <a href="{{ route('products.show', $product->id) }}"
                                       class="bb-detail-button"
                                       aria-label="View {{ $product->name }}">
                                        ♡
                                    </a>

                                    <a href="{{ route('products.show', $product->id) }}"
                                       class="bb-more"
                                       aria-label="More details">
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

                        <a href="{{ route('products.index', ['search' => 'Pre-Order']) }}"
                           class="bb-view-all">
                            VIEW ALL
                        </a>
                    </div>

                    <ul class="bb-product-grid">

                        @foreach ($products_preorder as $product)

                            <li class="bb-product-card">

                                <div class="bb-product-badge {{ strtolower(str_replace(' ', '-', $product->availability)) }}">
                                    {{ $product->availability }}
                                </div>

                                <div class="bb-product-image">

                                    <a href="{{ route('products.show', $product->id) }}">

                                        @if ($product->images->isNotEmpty())

                                            <img
                                                src="{{ env('APP_ADMIN_URL') . '/storage/' . $product->images->first()->image_path }}"
                                                alt="{{ $product->name }}"
                                                loading="lazy">

                                        @else

                                            <div class="bb-product-image-placeholder">
                                                NO IMAGE
                                            </div>

                                        @endif

                                    </a>
                                </div>

                                <div class="bb-product-info">

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

                                        <button
                                            type="button"
                                            class="button add_to_cart_button bb-cart-button"
                                            aria-label="Add {{ $product->name }} to cart"
                                            data-url="{{ route('cart.add', ['id' => $product->id]) }}">
                                            Add to cart
                                        </button>

                                        <a href="{{ route('products.show', $product->id) }}"
                                           class="bb-detail-button"
                                           aria-label="View {{ $product->name }}">
                                            ♡
                                        </a>

                                        <a href="{{ route('products.show', $product->id) }}"
                                           class="bb-more"
                                           aria-label="More details">
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

                        <a href="/products?restock=true"
                           class="bb-view-all">
                            VIEW ALL
                        </a>
                    </div>

                    <ul class="bb-product-grid">

                        @foreach ($products_restock as $log)

                            @if ($log->product)

                                <li class="bb-product-card">

                                    <div class="bb-product-badge {{ strtolower(str_replace(' ', '-', $log->product->availability)) }}">
                                        {{ $log->product->availability }}
                                    </div>

                                    <div class="bb-product-image">

                                        <a href="{{ route('products.show', $log->product->id) }}">

                                            @if ($log->product->images->isNotEmpty())

                                                <img
                                                    src="{{ env('APP_ADMIN_URL') . '/storage/' . $log->product->images->first()->image_path }}"
                                                    alt="{{ $log->product->name }}"
                                                    loading="lazy">

                                            @else

                                                <div class="bb-product-image-placeholder">
                                                    NO IMAGE
                                                </div>

                                            @endif

                                        </a>
                                    </div>

                                    <div class="bb-product-info">

                                        <h3 class="bb-product-name">
                                            <a href="{{ route('products.show', $log->product->id) }}">
                                                {{ $log->product->name }}
                                            </a>
                                        </h3>

                                        <div class="bb-product-price">

                                            @if ($log->product->variants->count() > 0)

                                                {{ number_format($log->product->variants->first()->price, 2) }}฿

                                            @else

                                                {{ number_format($log->product->price, 2) }}฿

                                            @endif

                                        </div>

                                        <div class="bb-product-actions">

                                            @if ($log->product->availability !== 'Out of Stock')

                                                <button
                                                    type="button"
                                                    class="button add_to_cart_button bb-cart-button"
                                                    aria-label="Add {{ $log->product->name }} to cart"
                                                    data-url="{{ route('cart.add', ['id' => $log->product->id]) }}">
                                                    Add to cart
                                                </button>

                                            @endif

                                            <a href="{{ route('products.show', $log->product->id) }}"
                                               class="bb-detail-button"
                                               aria-label="View {{ $log->product->name }}">
                                                ♡
                                            </a>

                                            <a href="{{ route('products.show', $log->product->id) }}"
                                               class="bb-more"
                                               aria-label="More details">
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

                <a href="{{ route('products.index') }}"
                   class="bb-promo-card">

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

                    {{-- SHIPPING --}}
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

                    {{-- ORIGINAL PRODUCT --}}
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

                    {{-- SUPPORT --}}
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

                /* HERO SLIDER */
                const slides = document.querySelectorAll('.bb-hero-slide');
                const dots = document.querySelectorAll('.bb-hero-dot');

                let currentSlide = 0;
                let sliderTimer = null;

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
                    }
                }

                function nextSlide() {
                    showSlide(currentSlide + 1);
                }

                function stopSlider() {
                    if (sliderTimer) {
                        clearInterval(sliderTimer);
                        sliderTimer = null;
                    }
                }

                function startSlider() {
                    stopSlider();

                    sliderTimer = setInterval(function () {
                        nextSlide();
                    }, 5000);
                }

                dots.forEach(function (dot) {

                    dot.addEventListener('click', function () {

                        const index = Number(this.dataset.slide);

                        showSlide(index);
                        startSlider();
                    });

                });

                const hero = document.querySelector('.bb-hero');

                if (hero) {
                    hero.addEventListener('mouseenter', stopSlider);
                    hero.addEventListener('mouseleave', startSlider);
                }

                showSlide(0);
                startSlider();

                /* ADD TO CART */
                $('.add_to_cart_button').click(function () {

                    let url = $(this).data('url');

                    $.ajax({

                        url: url,
                        type: "POST",

                        data: {
                            _token: "{{ csrf_token() }}"
                        },

                        success: function () {
                            window.location.reload();
                        },

                        error: function (xhr) {

                            if (
                                xhr.responseJSON &&
                                xhr.responseJSON.message === 'Unauthenticated.'
                            ) {

                                let loginButton =
                                    document.querySelector('.popup_login_link');

                                if (loginButton) {
                                    loginButton.click();
                                }

                            } else {

                                alert(
                                    "Error: " +
                                    (
                                        xhr.responseJSON?.message ??
                                        'Unable to add product to cart.'
                                    )
                                );

                            }
                        }
                    });
                });
            });
        </script>

        @if (request('showLoginModal') || request('showRegisterModal'))

            <script>
                document.addEventListener('DOMContentLoaded', function () {

                    if ({{ request('showLoginModal') ? 'true' : 'false' }}) {

                        const loginBtn =
                            document.querySelector('.popup_login_link');

                        if (loginBtn) {
                            loginBtn.click();
                        }
                    }

                    if ({{ request('showRegisterModal') ? 'true' : 'false' }}) {

                        const registerBtn =
                            document.querySelector('.popup_register_link');

                        if (registerBtn) {
                            registerBtn.click();
                        }
                    }

                });
            </script>

        @endif

    </x-slot>
</x-guest-layout>