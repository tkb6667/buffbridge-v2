<x-guest-layout :seo="$seo">

    <style>
        .bb-blog-detail,
        .bb-blog-detail *,
        .bb-related,
        .bb-related * {
            box-sizing: border-box;
        }

        .bb-blog-detail {
            --yellow: #ffd429;
            --dark: #0f1012;
            --line: #e7e7e7;
            width: 100%;
            background: #fff;
            color: #161616;
            font-family: Arial, Helvetica, sans-serif;
        }

        .bb-blog-shell {
            width: min(1200px, calc(100% - 48px));
            margin: 0 auto;
        }

        /* =========================
           HERO
        ========================= */

        .bb-blog-hero {
            background:
                radial-gradient(
                    circle at 85% 30%,
                    rgba(255, 212, 41, .08),
                    transparent 28%
                ),
                var(--dark);
            border-bottom: 2px solid var(--yellow);
        }

        .bb-blog-hero-inner {
            min-height: 190px;
            padding-top: 35px;
            padding-bottom: 32px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .bb-blog-eyebrow {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--yellow);
            font-size: 9px;
            font-weight: 900;
            letter-spacing: 1.8px;
        }

        .bb-blog-eyebrow::before {
            content: "";
            width: 24px;
            height: 2px;
            background: var(--yellow);
        }

        .bb-blog-title {
            width: min(900px, 100%);
            margin: 0 !important;
            color: #fff !important;
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: clamp(30px, 4vw, 52px) !important;
            font-weight: 900 !important;
            font-style: italic !important;
            line-height: 1.05 !important;
            letter-spacing: -1.5px !important;
            overflow-wrap: anywhere;
        }

        .bb-blog-breadcrumb {
            margin-top: 16px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
            color: #777;
            font-size: 8px;
            font-weight: 800;
            letter-spacing: .8px;
        }

        .bb-blog-breadcrumb a {
            color: #aaa !important;
            text-decoration: none !important;
        }

        .bb-blog-breadcrumb a:hover,
        .bb-blog-breadcrumb span:last-child {
            color: var(--yellow) !important;
        }

        /* =========================
           ARTICLE
        ========================= */

        .bb-blog-main {
            padding: 42px 0 55px;
        }

        .bb-blog-article {
            width: min(960px, 100%);
            margin: 0 auto;
        }

        /* META */

        .bb-blog-meta {
            margin-bottom: 26px;
            padding: 13px 0;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px 24px;
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
            color: #888;
            font-size: 11px;
        }

        .bb-blog-meta-item {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 6px;
        }

        .bb-blog-meta-label {
            color: #aaa;
            font-size: 8px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .bb-blog-meta strong,
        .bb-blog-meta a {
            color: #222 !important;
            font-weight: 800;
            text-decoration: none !important;
        }

        .bb-blog-category {
            padding: 5px 9px;
            background: #111;
            color: var(--yellow) !important;
            font-size: 8px;
            font-weight: 900;
        }

        /* FEATURED IMAGE */

        .bb-blog-featured {
            width: 100%;
            margin-bottom: 34px;
            overflow: hidden;
            background: #f3f3f3;
        }

        .bb-blog-featured img {
            display: block;
            width: 100%;
            max-height: 540px;
            object-fit: cover;
        }

        /* CONTENT */

        .bb-blog-content-wrap {
            width: min(820px, 100%);
            margin: 0 auto;
        }

        .bb-blog-content {
            color: #3f3f3f;
            font-size: 13px;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .bb-blog-content > *:first-child {
            margin-top: 0 !important;
        }

        .bb-blog-content p {
            margin: 0 0 18px !important;
            color: #3f3f3f !important;
            font-size: inherit !important;
            line-height: 1.8 !important;
        }

        .bb-blog-content h1,
        .bb-blog-content h2,
        .bb-blog-content h3,
        .bb-blog-content h4,
        .bb-blog-content h5,
        .bb-blog-content h6 {
            margin: 30px 0 13px !important;
            color: #111 !important;
            font-family: Arial, Helvetica, sans-serif !important;
            font-weight: 900 !important;
            line-height: 1.25 !important;
        }

        .bb-blog-content h1 {
            font-size: 30px !important;
        }

        .bb-blog-content h2 {
            font-size: 25px !important;
        }

        .bb-blog-content h3 {
            font-size: 21px !important;
        }

        .bb-blog-content h4,
        .bb-blog-content h5,
        .bb-blog-content h6 {
            font-size: 18px !important;
        }

        .bb-blog-content img {
            display: block;
            max-width: 100% !important;
            height: auto !important;
            margin: 25px auto !important;
            object-fit: contain;
        }

        .bb-blog-content iframe,
        .bb-blog-content video {
            max-width: 100%;
        }

        .bb-blog-content a {
            color: #bd8200 !important;
            text-decoration: underline;
            text-underline-offset: 2px;
        }

        .bb-blog-content ul,
        .bb-blog-content ol {
            margin: 12px 0 20px 22px;
            padding: 0;
        }

        .bb-blog-content li {
            margin-bottom: 8px;
        }

        .bb-blog-content blockquote {
            margin: 24px 0;
            padding: 16px 20px;
            border-left: 4px solid var(--yellow);
            background: #f6f6f6;
            color: #555;
        }

        .bb-blog-content table {
            display: block;
            width: 100%;
            margin: 22px 0;
            overflow-x: auto;
            border-collapse: collapse;
        }

        .bb-blog-content th,
        .bb-blog-content td {
            padding: 10px 12px;
            border: 1px solid #ddd;
            font-size: 14px;
            text-align: left;
        }

        .bb-blog-content th {
            background: #111;
            color: #fff;
        }

        /* =========================
           SHARE
        ========================= */

        .bb-blog-share {
            margin-top: 38px;
            padding-top: 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            border-top: 1px solid var(--line);
        }

        .bb-blog-share-title {
            color: #111;
            font-size: 9px;
            font-weight: 900;
            letter-spacing: 1.2px;
        }

        .bb-blog-share-links {
            display: flex;
            gap: 7px;
        }

        .bb-blog-share-link {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            background: #fff;
            color: #111 !important;
            text-decoration: none !important;
            transition: .2s;
        }

        .bb-blog-share-link:hover {
            border-color: var(--yellow);
            background: var(--yellow);
        }

        .bb-blog-share-link svg {
            width: 15px;
            height: 15px;
            fill: currentColor;
        }

        .bb-blog-share-link img {
            width: 16px;
            height: 16px;
            margin: 0 !important;
            object-fit: contain;
            filter: brightness(0);
        }

        .bb-blog-share-x {
            font-size: 14px;
            font-weight: 800;
        }

        /* =========================
           RELATED ARTICLES
        ========================= */

        .bb-related {
            padding: 48px 0 55px;
            background: #0d0d0f;
            font-family: Arial, Helvetica, sans-serif;
        }

        .bb-related-head {
            margin-bottom: 22px;
        }

        .bb-related-eyebrow {
            margin-bottom: 6px;
            color: var(--yellow);
            font-size: 8px;
            font-weight: 900;
            letter-spacing: 1.5px;
        }

        .bb-related-title {
            margin: 0 !important;
            color: #fff !important;
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: 28px !important;
            font-weight: 900 !important;
            font-style: italic !important;
        }

        .bb-related-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 15px;
        }

        .bb-related-card {
            min-width: 0;
            overflow: hidden;
            border: 1px solid #292929;
            background: #151515;
            transition: .2s;
        }

        .bb-related-card:hover {
            transform: translateY(-3px);
            border-color: #444;
        }

        .bb-related-image {
            display: block;
            width: 100%;
            aspect-ratio: 16 / 10;
            overflow: hidden;
            background: #f2f2f2;
        }

        .bb-related-image img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .25s;
        }

        .bb-related-card:hover .bb-related-image img {
            transform: scale(1.03);
        }

        .bb-related-content {
            padding: 13px 14px 15px;
        }

        .bb-related-card-title {
            margin: 0 !important;
            color: #fff !important;
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: 11px !important;
            font-weight: 900 !important;
            line-height: 1.45 !important;
        }

        .bb-related-card-title a {
            color: inherit !important;
            text-decoration: none !important;
        }

        .bb-related-card-title a:hover {
            color: var(--yellow) !important;
        }

        /* =========================
           TABLET
        ========================= */

        @media (max-width: 900px) {
            .bb-blog-shell {
                width: min(100% - 40px, 1200px);
            }

            .bb-blog-main {
                padding: 34px 0 45px;
            }

            .bb-blog-featured img {
                max-height: 460px;
            }

            .bb-related-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 650px) {
            .bb-blog-shell {
                width: calc(100% - 32px);
            }

            .bb-blog-hero-inner {
                min-height: 145px;
                padding-top: 25px;
                padding-bottom: 22px;
            }

            .bb-blog-title {
                font-size: 28px !important;
                letter-spacing: -.8px !important;
            }

            .bb-blog-breadcrumb {
                margin-top: 12px;
                font-size: 7px;
            }

            .bb-blog-main {
                padding: 24px 0 34px;
            }

            .bb-blog-meta {
                margin-bottom: 20px;
                padding: 10px 0;
                gap: 8px 15px;
                font-size: 9px;
            }

            .bb-blog-featured {
                margin-bottom: 24px;
            }

            .bb-blog-featured img {
                max-height: none;
                aspect-ratio: 16 / 10;
                object-fit: cover;
            }

            .bb-blog-content {
                font-size: 15px;
                line-height: 1.7;
            }

            .bb-blog-content p {
                margin-bottom: 15px !important;
                line-height: 1.7 !important;
            }

            .bb-blog-content h1 {
                font-size: 25px !important;
            }

            .bb-blog-content h2 {
                font-size: 22px !important;
            }

            .bb-blog-content h3 {
                font-size: 19px !important;
            }

            .bb-blog-content img {
                margin: 20px auto !important;
            }

            .bb-blog-share {
                margin-top: 28px;
            }

            .bb-related {
                padding: 32px 0 38px;
            }

            .bb-related-title {
                font-size: 23px !important;
            }

            .bb-related-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 9px;
            }

            .bb-related-content {
                padding: 10px;
            }

            .bb-related-card-title {
                font-size: 9px !important;
            }
        }

        @media (max-width: 380px) {
            .bb-blog-shell {
                width: calc(100% - 26px);
            }

            .bb-blog-title {
                font-size: 25px !important;
            }
        }
    </style>


    <main class="bb-blog-detail">

        {{-- HERO --}}
        <section class="bb-blog-hero">
            <div class="bb-blog-shell bb-blog-hero-inner">

                <div class="bb-blog-eyebrow">
                    BUFFBRIDGE JOURNAL
                </div>

                <h1 class="bb-blog-title">
                    {{ $post->title }}
                </h1>

                <div class="bb-blog-breadcrumb">
                    <a href="{{ url('/') }}">HOME</a>
                    <span>/</span>

                    <a href="{{ route('posts.index') }}">BLOG</a>
                    <span>/</span>

                    <span>ARTICLE</span>
                </div>

            </div>
        </section>


        {{-- ARTICLE --}}
        <section class="bb-blog-main">
            <div class="bb-blog-shell">

                <article class="bb-blog-article">

                    {{-- META --}}
                    <div class="bb-blog-meta">

                        <div class="bb-blog-meta-item">
                            <span class="bb-blog-meta-label">AUTHOR</span>
                            <strong>
                                {{ $post->user->name ?? 'Admin' }}
                            </strong>
                        </div>

                        <div class="bb-blog-meta-item">
                            <span class="bb-blog-meta-label">DATE</span>
                            <strong>
                                {{ $post->published_at->format('d M Y') }}
                            </strong>
                        </div>

                        @if ($post->postCategories->isNotEmpty())
                            <div class="bb-blog-meta-item">

                                <span class="bb-blog-meta-label">
                                    CATEGORY
                                </span>

                                @foreach ($post->postCategories as $category)
                                    <a
                                        href="{{ route('posts.category', $category->slug) }}"
                                        class="bb-blog-category"
                                    >
                                        {{ $category->name }}
                                    </a>
                                @endforeach

                            </div>
                        @endif

                    </div>


                    {{-- FEATURED IMAGE --}}
                    @if ($post->featured_image_url)
                        <div class="bb-blog-featured">
                            <img
                                src="{{ $post->featured_image_url }}"
                                alt="{{ $post->title }}"
                            >
                        </div>
                    @endif


                    {{-- CONTENT --}}
                    <div class="bb-blog-content-wrap">

                        <div class="bb-blog-content">
                            {!! $post->content_with_media_urls !!}
                        </div>


                        {{-- SHARE --}}
                        <div class="bb-blog-share">

                            <div class="bb-blog-share-title">
                                SHARE ARTICLE
                            </div>

                            <div class="bb-blog-share-links">

                                {{-- FACEBOOK --}}
                                <a
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="bb-blog-share-link"
                                    aria-label="Share on Facebook"
                                >
                                    <svg
                                        viewBox="0 0 24 24"
                                        aria-hidden="true"
                                    >
                                        <path
                                            d="M14 8.5V6.8c0-.8.5-1 1-1h2.5V2.1L14.1 2C10.7 2 9 4 9 6.5v2H6v4h3V22h5v-9.5h3.3l.6-4H14z"
                                        />
                                    </svg>
                                </a>


                                {{-- X --}}
                                <a
                                    href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="bb-blog-share-link bb-blog-share-x"
                                    aria-label="Share on X"
                                >
                                    X
                                </a>


                                {{-- LINE --}}
                                <a
                                    href="https://social-plugins.line.me/lineit/share?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="bb-blog-share-link"
                                    aria-label="Share on LINE"
                                >
                                    <img
                                        src="{{ asset('images/icons8-line.svg') }}"
                                        alt="LINE"
                                    >
                                </a>

                            </div>

                        </div>

                    </div>

                </article>

            </div>
        </section>

    </main>


    {{-- RELATED POSTS --}}
    @if ($relatedPosts->isNotEmpty())

        <section class="bb-related">
            <div class="bb-blog-shell">

                <div class="bb-related-head">

                    <div class="bb-related-eyebrow">
                        KEEP READING
                    </div>

                    <h2 class="bb-related-title">
                        RELATED ARTICLES
                    </h2>

                </div>


                <div class="bb-related-grid">

                    @foreach ($relatedPosts as $related)

                        <article class="bb-related-card">

                            <a
                                href="{{ route('posts.show', $related->slug) }}"
                                class="bb-related-image"
                            >
                                <img
                                    src="{{ $related->featured_image_url ?? 'https://placehold.co/800x600/f1f1f1/999?text=BUFFBRIDGE' }}"
                                    alt="{{ $related->title }}"
                                    loading="lazy"
                                >
                            </a>

                            <div class="bb-related-content">

                                <h3 class="bb-related-card-title">
                                    <a href="{{ route('posts.show', $related->slug) }}">
                                        {{ $related->title }}
                                    </a>
                                </h3>

                            </div>

                        </article>

                    @endforeach

                </div>

            </div>
        </section>

    @endif

</x-guest-layout>