<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Default OG Meta Tags -->
    <meta property="og:title" content="{{ $metaTitle ?? config('app.name', 'Buffbridge') }}" />
    <meta property="og:description" content="{{ $metaDescription ?? 'Buffbridge BB Gun Store' }}" />
    <meta property="og:image" content="{{ $metaImage ?? asset('BUFF_LOGO.png') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Buffbridge" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- WooCommerce -->
    <link rel="stylesheet"
        href="{{ asset('js/vendor/woocommerce/css/woocommerce-layout.css') }}"
        type="text/css"
        media="all">

    <link rel="stylesheet"
        href="{{ asset('js/vendor/woocommerce/css/woocommerce-smallscreen.css') }}"
        type="text/css"
        media="only screen and (max-width: 768px)">

    <link rel="stylesheet"
        href="{{ asset('js/vendor/woocommerce/css/woocommerce.css') }}"
        type="text/css"
        media="all">

    <!-- Revolution Slider -->
    <link rel="stylesheet"
        href="{{ asset('js/vendor/revslider/css/settings.css') }}"
        type="text/css"
        media="all">

    <link rel="stylesheet"
        href="{{ asset('css/tpl-revslider.css') }}"
        type="text/css"
        media="all">

    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Hind:300,400,700%7CLato:300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext">

    <link rel="stylesheet"
        href="{{ asset('css/fontello/css/fontello.css') }}"
        type="text/css"
        media="all">

    <!-- Theme -->
    <link rel="stylesheet"
        href="{{ asset('css/style.css') }}"
        type="text/css"
        media="all">

    <link rel="stylesheet"
        href="{{ asset('css/animation.css') }}"
        type="text/css"
        media="all">

    <link rel="stylesheet"
        href="{{ asset('css/shortcodes.css') }}"
        type="text/css"
        media="all">

    <link rel="stylesheet"
        href="{{ asset('css/plugin.woocommerce.css') }}"
        type="text/css"
        media="all">

    <link rel="stylesheet"
        href="{{ asset('css/skin.css') }}"
        type="text/css"
        media="all">

    <link rel="stylesheet"
        href="{{ asset('css/responsive.css') }}"
        type="text/css"
        media="all">

    <link rel="stylesheet"
        href="{{ asset('css/messages.css') }}"
        type="text/css"
        media="all">

    <!-- Plugins -->
    <link rel="stylesheet"
        href="{{ asset('js/vendor/magnific/magnific-popup.min.css') }}"
        type="text/css"
        media="all">

    <link rel="stylesheet"
        href="{{ asset('js/vendor/swiper/swiper.min.css') }}"
        type="text/css"
        media="all">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Favicon -->
    <link rel="apple-touch-icon"
        sizes="180x180"
        href="{{ asset('favicon_io/apple-touch-icon.png') }}">

    <link rel="icon"
        type="image/png"
        sizes="32x32"
        href="{{ asset('favicon_io/favicon-32x32.png') }}">

    <link rel="icon"
        type="image/png"
        sizes="16x16"
        href="{{ asset('favicon_io/favicon-16x16.png') }}">

    <link rel="icon"
        href="{{ asset('favicon_io/favicon.ico') }}">

    <link rel="manifest"
        href="{{ asset('favicon_io/site.webmanifest') }}">

    <!-- App CSS + JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #1d1e23;
        }

        .google-login-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 250px;
            padding: 10px 15px;
            background: #fff;
            color: #757575;
            font-size: 16px;
            font-weight: 500;
            border: 1px solid #dadce0;
            border-radius: 5px;
            text-decoration: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
            transition: box-shadow .2s ease-in-out;
        }

        .google-login-btn img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .google-login-btn:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, .15);
        }

        .top_panel_middle .sidebar_cart {
            z-index: 9999;
        }

        .home_cate a img {
            max-height: unset !important;
        }
    </style>

    @isset($style)
        {{ $style }}
    @endisset
</head>

@php
    $r_name = \Request::route()->getName();
@endphp

@if ($r_name == 'products.index')

    <body
        class="woocommerce woocommerce-page body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_show sidebar_left">

@elseif (in_array($r_name, ['posts.index', 'posts.category', 'posts.tag']))

    <body
        class="body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_show sidebar_left">

@elseif ($r_name == 'products.show')

    <body
        class="single-product woocommerce woocommerce-page body_transparent article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide">

@elseif ($r_name == 'posts.show')

    <body
        class="single-post body_transparent article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide">

@elseif ($r_name == 'cart.index')

    <body
        class="woocommerce-cart woocommerce-page body_transparent article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide">

@else

    <body
        class="body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide">

@endif

<div id="page_preloader"></div>

<div class="body_wrap">
    <div class="page_wrap">

        @include('layouts.header')

        {{ $slot }}

        @include('layouts.footer')

    </div>
</div>

<a href="#"
    class="scroll_to_top icon-up"
    title="Scroll to top"></a>

<script src="{{ asset('js/jquery/jquery.js') }}"></script>
<script src="{{ asset('js/jquery/jquery-migrate.min.js') }}"></script>

<!-- Theme -->
<script src="{{ asset('js/_main.js') }}"></script>
<script src="{{ asset('js/trx_utils.js') }}"></script>
<script src="{{ asset('js/_packed.js') }}"></script>

<!-- Essential Grid / Revolution Slider -->
<script src="{{ asset('js/vendor/essential-grid/js/lightbox.js') }}"></script>
<script src="{{ asset('js/vendor/essential-grid/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('js/vendor/revslider/js/jquery.themepunch.revolution.min.js') }}"></script>

<script src="{{ asset('js/vendor/revslider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('js/vendor/revslider/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('js/vendor/revslider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('js/vendor/revslider/js/extensions/revolution.extension.navigation.min.js') }}"></script>

<script src="{{ asset('js/tpl-revslider-general.js') }}"></script>
<script src="{{ asset('js/tpl-revslider-3.js') }}"></script>

<!-- Theme Plugins -->
<script src="{{ asset('js/vendor/photostack/modernizr.min.js') }}"></script>
<script src="{{ asset('js/vendor/superfish.js') }}"></script>

<script src="{{ asset('js/utils.js') }}"></script>
<script src="{{ asset('js/core.init.js') }}"></script>
<script src="{{ asset('js/init.js') }}"></script>

<script src="{{ asset('js/shortcodes.js') }}"></script>
<script src="{{ asset('js/messages.js') }}"></script>

<script src="{{ asset('js/vendor/magnific/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/vendor/swiper/swiper.min.js') }}"></script>

<!-- Toast -->
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
    @if (session('status'))
        Toastify({
            text: @json(session('status')),
            className: 'success',
            style: {
                background: 'linear-gradient(to right, #00b09b, #96c93d)'
            }
        }).showToast();
    @endif

    @if (session('success'))
        Toastify({
            text: @json(session('success')),
            className: 'success',
            style: {
                background: 'linear-gradient(to right, #00b09b, #96c93d)'
            }
        }).showToast();
    @endif

    @if (session('error'))
        Toastify({
            text: @json(session('error')),
            className: 'error',
            style: {
                background: 'linear-gradient(to right, #b71c1c, #f44336)'
            }
        }).showToast();
    @endif

    @if (session('error_auth'))
        const loginLink = document.querySelector('.popup_login_link');

        if (loginLink) {
            loginLink.click();
        }
    @endif
</script>

@isset($script)
    {{ $script }}
@endisset

</body>
</html>
