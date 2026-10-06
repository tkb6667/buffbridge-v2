<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $seo['title'] }}</title>
        <meta name="description" content="{{ $seo['description'] }}">
        <meta name="robots" content="{{ $seo['robots'] }}">
        <link rel="canonical" href="{{ $seo['canonical'] }}">
        <meta property="og:title" content="{{ $seo['ogTitle'] }}">
        <meta property="og:description" content="{{ $seo['ogDescription'] }}">
        <meta property="og:image" content="{{ $seo['ogImage'] }}">
        <meta property="og:url" content="{{ $seo['ogUrl'] }}">
        <meta property="og:type" content="{{ $seo['ogType'] }}">
        <meta property="og:site_name" content="Buffbridge">
        <meta name="twitter:card" content="{{ $seo['twitterCard'] }}">
        <meta name="twitter:title" content="{{ $seo['twitterTitle'] }}">
        <meta name="twitter:description" content="{{ $seo['twitterDescription'] }}">
        <meta name="twitter:image" content="{{ $seo['twitterImage'] }}">
        @foreach ($seo['schemas'] as $schema)
            <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>
        @endforeach

        @include('layouts.partials.tracking-head')

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('js/vendor/woocommerce/css/woocommerce-layout.css') }}" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('js/vendor/woocommerce/css/woocommerce-smallscreen.css') }}" type="text/css" media="only screen and (max-width: 768px)" />
        <link rel="stylesheet" href="{{ asset('js/vendor/woocommerce/css/woocommerce.css') }}" type="text/css" media="all" />

        <link rel="stylesheet" href="{{ asset('js/vendor/revslider/css/settings.css') }}" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('css/tpl-revslider.css') }}" type="text/css" media="all" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Hind:300,400,700%7CLato:300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext">
        <link rel="stylesheet" href="{{ asset('css/fontello/css/fontello.css') }}" type="text/css" media="all" />

        <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('css/animation.css') }}" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('css/shortcodes.css') }}" type="text/css" media="all" />

        <link rel="stylesheet" href="{{ asset('css/plugin.woocommerce.css') }}" type="text/css" media="all" />

        <link rel="stylesheet" href="{{ asset('css/skin.css') }}" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" type="text/css" media="all" />

        <link rel="stylesheet" href="{{ asset('css/messages.css') }}" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('js/vendor/magnific/magnific-popup.min.css') }}" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('js/vendor/swiper/swiper.min.css') }}" type="text/css" media="all" />

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}" />
        <link rel="icon" href="{{ asset('favicon_io/favicon.ico') }}" />
        <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @isset($style)
        {{ $style }}
        @endisset
    </head>
    <body class="body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide">
        @include('layouts.partials.tracking-body')
        <div id="page_preloader"></div>
        <!-- Body wrap -->
        <div class="body_wrap">
            <!-- Page wrap -->
            <div class="page_wrap">
                @include('layouts.header')
                {{ $slot }}
                @include('layouts.footer')
            </div>
        </div>

        <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>

        <script type="text/javascript" src="{{ asset('js/jquery/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery/jquery-migrate.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('js/_main.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/trx_utils.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/_packed.js') }}"></script>

        <script type="text/javascript" src="{{ asset('js/vendor/essential-grid/js/lightbox.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/vendor/essential-grid/js/jquery.themepunch.tools.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/vendor/revslider/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/vendor/revslider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/vendor/revslider/js/extensions/revolution.extension.actions.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/vendor/revslider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/vendor/revslider/js/extensions/revolution.extension.navigation.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('js/tpl-revslider-general.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/tpl-revslider-3.js') }}"></script>

        <script type="text/javascript" src="{{ asset('js/vendor/photostack/modernizr.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/vendor/superfish.js') }}"></script>

        <script type="text/javascript" src="{{ asset('js/utils.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/core.init.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/init.js') }}"></script>

        <script type="text/javascript" src="{{ asset('js/shortcodes.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/messages.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/vendor/magnific/jquery.magnific-popup.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/vendor/swiper/swiper.min.js') }}"></script>
        @isset($script)
        {{ $script }}
        @endisset
    </body>
</html>
