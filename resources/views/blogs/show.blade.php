<x-guest-layout>

    <x-slot name="style"></x-slot>

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
            width: 100%;
            max-width: 1500px;
            margin: 0;
            padding-left: clamp(24px, 7vw, 135px);
            padding-right: clamp(24px, 7vw, 135px);
        }

        /* HERO */

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
            min-height: 155px;
            padding-top: 27px;
            padding-bottom: 24px;

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .bb-blog-eyebrow {
            margin-bottom: 9px;

            display: flex;
            align-items: center;
            gap: 8px;

            color: var(--yellow);

            font-size: 7px;
            font-weight: 900;
            letter-spacing: 1.7px;
        }

        .bb-blog-eyebrow::before {
            content: "";

            width: 18px;
            height: 2px;

            background: var(--yellow);
        }

        .bb-blog-title {
            width: min(780px, 100%);

            margin: 0 !important;

            color: #fff !important;

            font-family: Arial, Helvetica, sans-serif !important;
            font-size: clamp(27px, 3vw, 44px) !important;
            font-weight: 900 !important;
            font-style: italic !important;

            line-height: 1 !important;
            letter-spacing: -1.3px !important;

            overflow-wrap: anywhere;
        }

        .bb-blog-breadcrumb {
            margin-top: 12px;

            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 7px;

            color: #777;

            font-size: 7px;
            font-weight: 800;
            letter-spacing: .7px;
        }

        .bb-blog-breadcrumb a {
            color: #aaa !important;
            text-decoration: none !important;
        }

        .bb-blog-breadcrumb a:hover,
        .bb-blog-breadcrumb span:last-child {
            color: var(--yellow) !important;
        }

        /* MAIN */

        .bb-blog-main {
            padding: 25px 0 35px;
        }

        .bb-blog-article {
            width: min(1050px, 100%);
            margin: 0;
        }

        /* META */

        .bb-blog-meta {
            min-height: 42px;

            margin-bottom: 17px;
            padding: 8px 0;

            display: flex;
            flex-wrap: wrap;
            align-items: center;

            gap: 10px 20px;

            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);

            color: #888;

            font-size: 9px;
        }

        .bb-blog-meta-item {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 5px;
        }

        .bb-blog-meta-label {
            color: #aaa;

            font-size: 7px;
            font-weight: 900;
            letter-spacing: .8px;
        }

        .bb-blog-meta strong,
        .bb-blog-meta a {
            color: #222 !important;
            font-weight: 800;
            text-decoration: none !important;
        }

        .bb-blog-category {
            padding: 5px 8px;

            background: #111;

            color: var(--yellow) !important;

            font-size: 7px;
            font-weight: 900;
        }

        /* CONTENT LAYOUT */

        .bb-blog-layout {
            display: grid;

            grid-template-columns:
                minmax(280px, 420px)
                minmax(0, 1fr);

            gap: 32px;

            align-items: start;
        }

        /* FEATURE IMAGE */

        .bb-blog-featured {
            width: 100%;
            overflow: hidden;

            background: #f3f3f3;
        }

        .bb-blog-featured img {
            display: block;

            width: 100%;
            height: 275px;

            object-fit: cover;
        }

        /* CONTENT */

        .bb-blog-content-wrap {
            min-width: 0;
        }

        .bb-blog-content {
            color: #444;

            font-size: 13px;
            line-height: 1.65;

            overflow-wrap: anywhere;
        }

        .bb-blog-content > *:first-child {
            margin-top: 0 !important;
        }

        .bb-blog-content p {
            margin: 0 0 11px !important;

            color: #444 !important;

            font-size: inherit !important;
            line-height: 1.65 !important;
        }

        .bb-blog-content h1,
        .bb-blog-content h2,
        .bb-blog-content h3,
        .bb-blog-content h4,
        .bb-blog-content h5,
        .bb-blog-content h6 {
            margin: 15px 0 7px !important;

            color: #111 !important;

            font-family: Arial, Helvetica, sans-serif !important;
            font-weight: 900 !important;

            line-height: 1.15 !important;
        }

        .bb-blog-content h1 {
            font-size: 24px !important;
        }

        .bb-blog-content h2 {
            font-size: 21px !important;
        }

        .bb-blog-content h3 {
            font-size: 18px !important;
        }

        .bb-blog-content h4,
        .bb-blog-content h5,
        .bb-blog-content h6 {
            font-size: 15px !important;
        }

        .bb-blog-content img {
            display: block;

            max-width: 100% !important;
            max-height: 280px;

            margin: 13px 0 !important;

            object-fit: contain;
        }

        .bb-blog-content a {
            color: #bd8200 !important;
            text-decoration: underline;
            text-underline-offset: 2px;
        }

        .bb-blog-content ul,
        .bb-blog-content ol {
            margin: 8px 0 13px 18px;
            padding: 0;
        }

        .bb-blog-content li {
            margin-bottom: 5px;
        }

        .bb-blog-content blockquote {
            margin: 13px 0;
            padding: 11px 14px;

            border-left: 3px solid var(--yellow);

            background: #f6f6f6;

            color: #555;
        }

        .bb-blog-content table {
            width: 100%;

            margin: 13px 0;

            border-collapse: collapse;
        }

        .bb-blog-content th,
        .bb-blog-content td {
            padding: 8px 10px;

            border: 1px solid #ddd;

            font-size: 12px;

            text-align: left;
        }

        .bb-blog-content th {
            background: #111;
            color: #fff;
        }

        /* SHARE */

        .bb-blog-share {
            margin-top: 20px;
            padding-top: 13px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;

            border-top: 1px solid var(--line);
        }

        .bb-blog-share-title {
            color: #111;

            font-size: 8px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .bb-blog-share-links {
            display: flex;
            gap: 6px;
        }

        .bb-blog-share-link {
            width: 32px;
            height: 32px;

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
            width: 14px;
            height: 14px;

            fill: currentColor;
        }

        .bb-blog-share-link img {
            width: 15px;
            height: 15px;

            margin: 0 !important;

            object-fit: contain;

            filter: brightness(0);
        }

        .bb-blog-share-x {
            font-size: 13px;
        }

        /* RELATED */

        .bb-related {
            padding: 32px 0 38px;

            background: #0d0d0f;

            font-family: Arial, Helvetica, sans-serif;
        }

        .bb-related-head {
            margin-bottom: 17px;
        }

        .bb-related-eyebrow {
            margin-bottom: 5px;

            color: var(--yellow);

            font-size: 7px;
            font-weight: 900;
            letter-spacing: 1.5px;
        }

        .bb-related-title {
            margin: 0 !important;

            color: #fff !important;

            font-family: Arial, Helvetica, sans-serif !important;
            font-size: 24px !important;
            font-weight: 900 !important;
            font-style: italic !important;
        }

        .bb-related-grid {
            width: min(1050px, 100%);

            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));

            gap: 12px;
        }

        .bb-related-card {
            min-width: 0;
            overflow: hidden;

            border: 1px solid #292929;

            background: #151515;

            transition: .2s;
        }

        .bb-related-card:hover {
            transform: translateY(-2px);
            border-color: #444;
        }

        .bb-related-image {
            display: block;

            width: 100%;
            aspect-ratio: 1 / .62;

            overflow: hidden;

            background: #f2f2f2;
        }

        .bb-related-image img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            transition: .25s;
        }

        .bb-related-card:hover .bb-related-image img {
            transform: scale(1.03);
        }

        .bb-related-content {
            padding: 10px 11px 12px;
        }

        .bb-related-card-title {
            margin: 0 !important;

            color: #fff !important;

            font-family: Arial, Helvetica, sans-serif !important;
            font-size: 9px !important;
            font-weight: 900 !important;

            line-height: 1.4 !important;
        }

        .bb-related-card-title a {
            color: inherit !important;
            text-decoration: none !important;
        }

        .bb-related-card-title a:hover {
            color: var(--yellow) !important;
        }

        /* TABLET */

        @media (max-width: 900px) {

            .bb-blog-shell {
                padding-left: 28px;
                padding-right: 28px;
            }

            .bb-blog-article {
                width: 100%;
            }

            .bb-blog-layout {
                grid-template-columns:
                    minmax(250px, 360px)
                    minmax(0, 1fr);

                gap: 24px;
            }

            .bb-blog-featured img {
                height: 245px;
            }

            .bb-related-grid {
                width: 100%;

                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }
        }

        /* MOBILE */

        @media (max-width: 650px) {

            .bb-blog-shell {
                padding-left: 18px;
                padding-right: 18px;
            }

            .bb-blog-hero-inner {
                min-height: 115px;

                padding-top: 20px;
                padding-bottom: 18px;
            }

            .bb-blog-eyebrow {
                margin-bottom: 7px;

                font-size: 6px;
            }

            .bb-blog-title {
                width: 100%;

                font-size: 24px !important;
                letter-spacing: -.7px !important;
            }

            .bb-blog-breadcrumb {
                margin-top: 9px;

                font-size: 6px;
            }

            .bb-blog-main {
                padding-top: 18px;
                padding-bottom: 27px;
            }

            .bb-blog-meta {
                min-height: 0;

                margin-bottom: 14px;

                padding: 8px 0;

                gap: 7px 12px;

                font-size: 8px;
            }

            .bb-blog-layout {
                display: block;
            }

            .bb-blog-featured {
                margin-bottom: 16px;
            }

            .bb-blog-featured img {
                height: 190px;
            }

            .bb-blog-content {
                font-size: 12px;
                line-height: 1.6;
            }

            .bb-blog-content p {
                margin-bottom: 9px !important;
                line-height: 1.6 !important;
            }

            .bb-blog-content h1 {
                font-size: 21px !important;
            }

            .bb-blog-content h2 {
                font-size: 18px !important;
            }

            .bb-blog-content h3 {
                font-size: 16px !important;
            }

            .bb-blog-content img {
                max-height: 220px;

                margin: 10px 0 !important;
            }

            .bb-blog-share {
                margin-top: 16px;
            }

            .bb-related {
                padding: 25px 0 30px;
            }

            .bb-related-title {
                font-size: 21px !important;
            }

            .bb-related-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));

                gap: 8px;
            }

            .bb-related-content {
                padding: 8px;
            }

            .bb-related-card-title {
                font-size: 8px !important;
            }
        }

        @media (max-width: 380px) {

            .bb-blog-shell {
                padding-left: 15px;
                padding-right: 15px;
            }

            .bb-blog-title {
                font-size: 22px !important;
            }

            .bb-blog-featured img {
                height: 170px;
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

                    <a href="{{ url('/') }}">
                        HOME
                    </a>

                    <span>/</span>

                    <a href="{{ route('posts.index') }}">
                        BLOG
                    </a>

                    <span>/</span>

                    <span>
                        ARTICLE
                    </span>

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

                            <span class="bb-blog-meta-label">
                                AUTHOR
                            </span>

                            <strong>
                                {{ $post->user->name ?? 'Admin' }}
                            </strong>

                        </div>


                        <div class="bb-blog-meta-item">

                            <span class="bb-blog-meta-label">
                                DATE
                            </span>

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


                    <div class="bb-blog-layout">

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


                                    <a
                                        href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="bb-blog-share-link bb-blog-share-x"
                                        aria-label="Share on X"
                                    >
                                        X
                                    </a>


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
                                >
                            </a>


                            <div class="bb-related-content">

                                <h3 class="bb-related-card-title">

                                    <a
                                        href="{{ route('posts.show', $related->slug) }}"
                                    >
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