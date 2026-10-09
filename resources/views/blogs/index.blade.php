<x-guest-layout :seo="$seo">
    <x-slot name="style">
        <style>
            .bb-blog,.bb-blog *{box-sizing:border-box}
            .bb-blog{
                --yellow:#ffd21c;
                --dark:#111214;
                --line:#e5e5e5;
                width:100%;
                background:#fff;
                color:#171717;
                font-family:Arial,Helvetica,sans-serif
            }

            .bb-blog a{text-decoration:none}

            /* ใช้ความกว้างชุดเดียวกับหน้า Products */
            .bb-blog-container{
                width:100%;
                max-width:none;
                margin:0;
                padding:0 clamp(20px,4vw,84px)
            }

            /* HERO */
            .bb-blog-hero{
                background:var(--dark);
                color:#fff;
                border-bottom:3px solid var(--yellow)
            }

            .bb-blog-hero-inner{
                min-height:190px;
                display:flex;
                align-items:center;
                justify-content:space-between;
                gap:40px;
                padding:40px 0
            }

            .bb-blog-eyebrow{
                display:flex;
                align-items:center;
                gap:10px;
                margin-bottom:12px;
                color:var(--yellow)!important;
                font-size:11px;
                font-weight:900;
                letter-spacing:2px;
                text-transform:uppercase
            }

            .bb-blog-eyebrow:before{
                content:"";
                width:28px;
                height:3px;
                background:var(--yellow)
            }

            .bb-blog .bb-blog-title{
                margin:0!important;
                color:#fff!important;
                -webkit-text-fill-color:#fff!important;
                font-size:clamp(34px,3.2vw,54px)!important;
                line-height:.95!important;
                font-weight:900!important;
                letter-spacing:-1px;
                text-transform:uppercase;
                opacity:1!important;
                visibility:visible!important
            }

            .bb-blog-subtitle{
                max-width:600px;
                margin:14px 0 0;
                color:#aaa;
                font-size:13px;
                line-height:1.7
            }

            .bb-blog-breadcrumb{
                display:flex;
                align-items:center;
                gap:10px;
                flex-shrink:0;
                font-size:10px;
                font-weight:900;
                letter-spacing:1px;
                text-transform:uppercase
            }

            .bb-blog-breadcrumb a{color:#fff!important}
            .bb-blog-breadcrumb strong,
            .bb-blog-breadcrumb a:hover{color:var(--yellow)!important}
            .bb-blog-breadcrumb span{color:#666}

            /* MAIN */
            .bb-blog-main{
                width:100%;
                padding:55px 0 80px;
                background:#fff
            }

            .bb-blog-layout{
                width:100%;
                display:grid;
                grid-template-columns:clamp(260px,17vw,320px) minmax(0,1fr);
                gap:clamp(28px,2.5vw,48px);
                align-items:start
            }

            .bb-blog-sidebar,
            .bb-blog-content{min-width:0}

            .bb-blog-sidebar{
                position:sticky;
                top:20px
            }

            /* WIDGET */
            .bb-widget{
                margin-bottom:18px;
                padding:22px;
                border:1px solid var(--line);
                background:#fff
            }

            .bb-blog .bb-widget .bb-widget-title{
                display:flex!important;
                align-items:center!important;
                gap:9px!important;
                margin:0 0 18px!important;
                padding:0 0 13px!important;
                border-bottom:1px solid var(--line)!important;
                background:transparent!important;
                color:#111!important;
                -webkit-text-fill-color:#111!important;
                font:900 12px/1.3 Arial,Helvetica,sans-serif!important;
                font-style:normal!important;
                letter-spacing:.8px!important;
                text-transform:uppercase!important;
                opacity:1!important;
                visibility:visible!important
            }

            .bb-blog .bb-widget .bb-widget-title:before{
                content:""!important;
                display:block!important;
                flex:0 0 4px!important;
                width:4px!important;
                height:15px!important;
                background:var(--yellow)!important
            }

            /* SEARCH */
            .bb-blog-search-form{
                display:grid;
                grid-template-columns:minmax(0,1fr) 48px;
                height:46px;
                overflow:hidden;
                border:1px solid #ddd
            }

            .bb-blog-search-input{
                min-width:0;
                width:100%;
                height:100%!important;
                padding:0 14px!important;
                border:0!important;
                outline:0!important;
                box-shadow:none!important;
                background:#fff!important;
                color:#111!important;
                font:12px Arial,Helvetica,sans-serif!important
            }

            .bb-blog-search-input::placeholder{
                color:#999;
                opacity:1
            }

            .bb-blog-search-button{
                width:48px;
                height:46px;
                display:flex;
                align-items:center;
                justify-content:center;
                padding:0;
                border:0;
                cursor:pointer;
                background:var(--yellow);
                color:#111;
                transition:.2s
            }

            .bb-blog-search-button:hover{
                background:#111;
                color:#fff
            }

            .bb-blog-search-button svg{
                width:17px;
                height:17px;
                fill:none;
                stroke:currentColor;
                stroke-width:2;
                stroke-linecap:round
            }

            /* CATEGORIES */
            .bb-category-list{
                list-style:none;
                margin:0;
                padding:0
            }

            .bb-category-list li{
                margin:0;
                border-bottom:1px solid #eee
            }

            .bb-category-list li:last-child{border-bottom:0}

            .bb-blog .bb-category-list a{
                display:flex;
                align-items:center;
                justify-content:space-between;
                gap:10px;
                padding:12px 0;
                color:#333!important;
                -webkit-text-fill-color:#333!important;
                font-size:10px;
                font-weight:800;
                text-transform:uppercase;
                opacity:1!important;
                visibility:visible!important
            }

            .bb-blog .bb-category-list a:hover{
                color:#c99d00!important;
                -webkit-text-fill-color:#c99d00!important
            }

            .bb-category-count{
                min-width:25px;
                height:21px;
                display:flex;
                align-items:center;
                justify-content:center;
                padding:0 6px;
                background:#f2f2f2;
                color:#777;
                font-size:8px;
                font-weight:800
            }

            /* RECENT / POPULAR */
            .bb-mini-post{
                display:grid;
                grid-template-columns:65px minmax(0,1fr);
                gap:12px;
                padding:13px 0;
                border-bottom:1px solid #eee
            }

            .bb-mini-post:first-child{padding-top:0}
            .bb-mini-post:last-child{
                padding-bottom:0;
                border-bottom:0
            }

            .bb-mini-image{
                width:65px;
                height:65px;
                display:block;
                overflow:hidden;
                background:#eee
            }

            .bb-mini-image img{
                width:100%;
                height:100%;
                display:block;
                object-fit:cover
            }

            .bb-mini-placeholder{
                width:100%;
                height:100%;
                display:flex;
                align-items:center;
                justify-content:center;
                background:#f1f1f1;
                color:#aaa;
                font-size:9px;
                font-weight:900;
                letter-spacing:1px
            }

            .bb-mini-content{
                min-width:0;
                align-self:center
            }

            .bb-blog .bb-mini-title{
                display:block!important;
                margin:0 0 7px!important;
                padding:0!important;
                background:transparent!important;
                font:900 10px/1.45 Arial,Helvetica,sans-serif!important;
                opacity:1!important;
                visibility:visible!important
            }

            .bb-blog .bb-mini-title a,
            .bb-blog .bb-mini-content .bb-mini-title a,
            .bb-blog .bb-mini-post .bb-mini-title a{
                display:-webkit-box!important;
                overflow:hidden!important;
                color:#222!important;
                -webkit-text-fill-color:#222!important;
                -webkit-line-clamp:2;
                -webkit-box-orient:vertical;
                opacity:1!important;
                visibility:visible!important;
                text-indent:0!important;
                font:900 10px/1.45 Arial,Helvetica,sans-serif!important
            }

            .bb-blog .bb-mini-title a:hover,
            .bb-blog .bb-mini-content .bb-mini-title a:hover{
                color:#c99d00!important;
                -webkit-text-fill-color:#c99d00!important
            }

            .bb-blog .bb-mini-date{
                display:block!important;
                color:#999!important;
                -webkit-text-fill-color:#999!important;
                font-size:8px!important;
                font-weight:700!important;
                letter-spacing:.5px;
                text-transform:uppercase;
                opacity:1!important;
                visibility:visible!important
            }

            /* LATEST ARTICLES */
            .bb-blog-section-head{
                display:flex;
                align-items:flex-end;
                justify-content:space-between;
                gap:20px;
                margin-bottom:26px;
                padding-bottom:15px;
                border-bottom:1px solid var(--line)
            }

            .bb-blog .bb-blog-section-title{
                display:block!important;
                margin:0!important;
                padding:0!important;
                background:transparent!important;
                color:#111!important;
                -webkit-text-fill-color:#111!important;
                font:900 20px/1.2 Arial,Helvetica,sans-serif!important;
                font-style:normal!important;
                text-transform:uppercase!important;
                opacity:1!important;
                visibility:visible!important;
                text-indent:0!important
            }

            .bb-blog .bb-blog-section-title:after{
                content:""!important;
                display:block!important;
                width:40px!important;
                height:3px!important;
                margin-top:10px!important;
                background:var(--yellow)!important
            }

            .bb-blog-count{
                color:#999!important;
                font-size:10px;
                font-weight:900;
                letter-spacing:1px;
                text-transform:uppercase
            }

            /* CARDS */
            .bb-post-grid{
                width:100%;
                display:grid;
                grid-template-columns:repeat(3,minmax(0,1fr));
                gap:clamp(18px,1.5vw,28px)
            }

            .bb-post-card{
                min-width:0;
                overflow:hidden;
                background:#fff;
                border:1px solid var(--line);
                transition:transform .25s ease,box-shadow .25s ease
            }

            .bb-post-card:hover{
                transform:translateY(-4px);
                box-shadow:0 14px 34px rgba(0,0,0,.08)
            }

            .bb-post-image{
                position:relative;
                display:block;
                width:100%;
                aspect-ratio:16/10;
                overflow:hidden;
                background:#f1f1f1
            }

            .bb-post-image img{
                display:block;
                width:100%;
                height:100%;
                object-fit:cover;
                transition:transform .35s ease
            }

            .bb-post-card:hover .bb-post-image img{
                transform:scale(1.035)
            }

            .bb-post-placeholder{
                width:100%;
                height:100%;
                display:flex;
                align-items:center;
                justify-content:center;
                background:
                    linear-gradient(135deg,#eee 25%,transparent 25%) -15px 0/30px 30px,
                    linear-gradient(225deg,#eee 25%,transparent 25%) -15px 0/30px 30px,
                    linear-gradient(315deg,#eee 25%,transparent 25%) 0 0/30px 30px,
                    linear-gradient(45deg,#eee 25%,#f7f7f7 25%) 0 0/30px 30px
            }

            .bb-post-placeholder span{
                padding:10px 15px;
                background:rgba(255,255,255,.92);
                color:#999;
                font-size:10px;
                font-weight:900;
                letter-spacing:2px
            }

            .bb-post-body{padding:22px}

            .bb-post-meta{
                display:flex;
                flex-wrap:wrap;
                align-items:center;
                gap:7px 12px;
                margin-bottom:13px;
                color:#929292;
                font-size:9px;
                font-weight:700;
                letter-spacing:.7px;
                text-transform:uppercase
            }

            .bb-post-date{
                display:flex;
                align-items:center;
                gap:7px
            }

            .bb-post-date:before{
                content:"";
                width:6px;
                height:6px;
                background:var(--yellow)
            }

            .bb-blog .bb-post-category,
            .bb-blog .bb-post-category a{
                color:#555!important;
                -webkit-text-fill-color:#555!important
            }

            .bb-blog .bb-post-title{
                display:block!important;
                margin:0 0 12px!important;
                padding:0!important;
                background:transparent!important;
                font:900 18px/1.35 Arial,Helvetica,sans-serif!important;
                opacity:1!important;
                visibility:visible!important
            }

            .bb-blog .bb-post-title a{
                display:block!important;
                color:#111!important;
                -webkit-text-fill-color:#111!important;
                opacity:1!important;
                visibility:visible!important;
                text-indent:0!important
            }

            .bb-blog .bb-post-title a:hover,
            .bb-blog .bb-post-category a:hover{
                color:#c99d00!important;
                -webkit-text-fill-color:#c99d00!important
            }

            .bb-post-excerpt{
                min-height:58px;
                margin:0 0 20px;
                color:#737373!important;
                font-size:12px;
                line-height:1.7
            }

            .bb-read-more{
                min-height:40px;
                display:inline-flex;
                align-items:center;
                justify-content:center;
                gap:10px;
                padding:0 18px;
                background:var(--yellow);
                color:#111!important;
                -webkit-text-fill-color:#111!important;
                font-size:9px;
                font-weight:900;
                letter-spacing:.8px;
                text-transform:uppercase;
                transition:.2s
            }

            .bb-read-more:after{
                content:"→";
                font-size:15px
            }

            .bb-read-more:hover{
                background:#111;
                color:#fff!important;
                -webkit-text-fill-color:#fff!important
            }

            /* EMPTY */
            .bb-blog-empty{
                width:100%;
                padding:70px 30px;
                border:1px solid var(--line);
                background:#f6f6f6;
                text-align:center
            }

            .bb-blog-empty-mark{
                width:46px;
                height:4px;
                margin:0 auto 20px;
                background:var(--yellow)
            }

            .bb-blog-empty h3{
                margin:0 0 8px;
                color:#111!important;
                font-size:18px;
                font-weight:900;
                text-transform:uppercase
            }

            .bb-blog-empty p{
                margin:0;
                color:#888;
                font-size:12px
            }

            /* PAGINATION */
            .bb-pagination{margin-top:42px}

            .bb-pagination nav,
            .bb-pagination .pagination{
                display:flex;
                justify-content:center
            }

            .bb-pagination .pagination{
                flex-wrap:wrap;
                gap:6px;
                margin:0;
                padding:0;
                list-style:none
            }

            .bb-pagination .page-item{margin:0}

            .bb-pagination .page-link{
                min-width:38px;
                height:38px;
                display:flex;
                align-items:center;
                justify-content:center;
                padding:0 10px;
                border:1px solid #ddd!important;
                border-radius:0!important;
                box-shadow:none!important;
                background:#fff!important;
                color:#333!important;
                font-size:9px;
                font-weight:900
            }

            .bb-pagination .page-link:hover,
            .bb-pagination .page-item.active .page-link{
                border-color:#111!important;
                background:var(--yellow)!important;
                color:#111!important
            }

            .bb-mobile-secondary{display:none}

            /* ตรงกับ breakpoints หน้า Products */
            @media(min-width:1800px){
                .bb-blog-container{
                    padding-left:4.5%;
                    padding-right:4.5%
                }

                .bb-post-grid{
                    grid-template-columns:repeat(4,minmax(0,1fr))
                }
            }

            @media(max-width:1350px){
                .bb-blog-container{
                    padding-left:30px;
                    padding-right:30px
                }
            }

            @media(max-width:1100px){
                .bb-blog-main{padding:42px 0 60px}

                .bb-blog-layout{
                    display:flex;
                    flex-direction:column;
                    gap:28px
                }

                .bb-blog-sidebar{
                    position:static;
                    order:1;
                    width:100%;
                    display:grid;
                    grid-template-columns:repeat(2,minmax(0,1fr));
                    gap:16px
                }

                .bb-blog-content{
                    order:2;
                    width:100%
                }

                .bb-sidebar-search{grid-column:1/-1}
                .bb-sidebar-secondary{display:none}
                .bb-widget{margin:0}

                .bb-post-grid{
                    grid-template-columns:repeat(2,minmax(0,1fr));
                    gap:20px
                }
            }

            @media(max-width:900px){
                .bb-blog-container{
                    padding-left:20px;
                    padding-right:20px
                }
            }

            @media(max-width:767px){
                .bb-blog-container{
                    padding-left:12px;
                    padding-right:12px
                }

                .bb-blog-hero-inner{
                    min-height:auto;
                    display:block;
                    padding:30px 0
                }

                .bb-blog-eyebrow{
                    margin-bottom:10px;
                    font-size:9px
                }

                .bb-blog .bb-blog-title{
                    font-size:32px!important
                }

                .bb-blog-subtitle{
                    margin-top:10px;
                    font-size:11px;
                    line-height:1.55
                }

                .bb-blog-breadcrumb{
                    margin-top:22px;
                    font-size:8px
                }

                .bb-blog-main{padding:28px 0 45px}
                .bb-blog-layout{gap:25px}
                .bb-blog-sidebar{display:block}

                .bb-sidebar-search{
                    margin-bottom:12px;
                    padding:0;
                    border:0
                }

                .bb-sidebar-search .bb-widget-title,
                .bb-sidebar-category .bb-widget-title{
                    display:none!important
                }

                .bb-blog-search-form{
                    height:50px;
                    grid-template-columns:minmax(0,1fr) 52px
                }

                .bb-blog-search-input{
                    padding:0 16px;
                    font-size:16px!important
                }

                .bb-blog-search-button{
                    width:52px;
                    height:50px
                }

                .bb-sidebar-category{
                    margin:0;
                    padding:0;
                    border:0
                }

                .bb-category-list{
                    display:flex;
                    gap:8px;
                    width:100%;
                    padding-bottom:4px;
                    overflow-x:auto;
                    scrollbar-width:none
                }

                .bb-category-list::-webkit-scrollbar{display:none}

                .bb-category-list li{
                    flex:0 0 auto;
                    border:0
                }

                .bb-blog .bb-category-list a{
                    min-height:38px;
                    padding:0 14px;
                    border:1px solid #ddd;
                    background:#fff;
                    white-space:nowrap;
                    font-size:9px
                }

                .bb-blog .bb-category-list a:hover{
                    border-color:var(--yellow);
                    background:var(--yellow);
                    color:#111!important;
                    -webkit-text-fill-color:#111!important
                }

                .bb-category-count{
                    min-width:21px;
                    height:18px
                }

                .bb-blog-section-head{
                    align-items:center;
                    margin-bottom:18px;
                    padding-bottom:13px
                }

                .bb-blog .bb-blog-section-title{
                    font-size:16px!important
                }

                .bb-blog .bb-blog-section-title:after{
                    width:32px!important;
                    margin-top:8px!important
                }

                .bb-blog-count{font-size:8px}

                .bb-post-grid{
                    grid-template-columns:1fr;
                    gap:18px
                }

                .bb-post-image{aspect-ratio:16/9}
                .bb-post-body{padding:18px}

                .bb-blog .bb-post-title{
                    font-size:17px!important
                }

                .bb-post-excerpt{
                    min-height:0;
                    margin-bottom:17px
                }

                .bb-mobile-secondary{
                    display:grid;
                    grid-template-columns:1fr;
                    gap:15px;
                    margin-top:35px
                }

                .bb-mobile-secondary .bb-widget{
                    padding:18px
                }
            }

            @media(max-width:380px){
                .bb-blog-container{
                    padding-left:9px;
                    padding-right:9px
                }

                .bb-blog .bb-blog-title{
                    font-size:28px!important
                }

                .bb-blog-subtitle{font-size:10px}
                .bb-post-body{padding:16px}

                .bb-blog .bb-post-title{
                    font-size:16px!important
                }
            }
        </style>
    </x-slot>

    <div class="bb-blog">

        <section class="bb-blog-hero">
            <div class="bb-blog-container">
                <div class="bb-blog-hero-inner">

                    <div>
                        <div class="bb-blog-eyebrow">Buffbridge Journal</div>

                        <h1 class="bb-blog-title">
                            {{ $pageTitle ?? 'All Articles' }}
                        </h1>

                        <p class="bb-blog-subtitle">
                            News, guides, updates and stories from Buffbridge Custom.
                        </p>
                    </div>

                    <div class="bb-blog-breadcrumb">
                        <a href="{{ url('/') }}">Home</a>
                        <span>/</span>
                        <strong>Blog</strong>
                    </div>

                </div>
            </div>
        </section>

        <main class="bb-blog-main">
            <div class="bb-blog-container">
                <div class="bb-blog-layout">

                    <aside class="bb-blog-sidebar">

                        <div class="bb-widget bb-sidebar-search">
                            <h3 class="bb-widget-title">Search</h3>

                            <div
                                class="bb-blog-search-live"
                                data-blog-live-search
                                data-endpoint="{{ route('posts.live-search') }}"
                                data-results-url="{{ route('posts.index') }}"
                            >
                                <form
                                    role="search"
                                    method="GET"
                                    class="bb-blog-search-form"
                                    action="{{ route('posts.index') }}"
                                >
                                    <input
                                        type="search"
                                        class="bb-blog-search-input"
                                        name="search"
                                        value="{{ request('search') }}"
                                        placeholder="Search articles..."
                                        aria-label="Search articles"
                                        autocomplete="off"
                                        data-blog-live-search-input
                                    >

                                    <button
                                        type="submit"
                                        class="bb-blog-search-button"
                                        aria-label="Search"
                                    >
                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <circle cx="11" cy="11" r="7"></circle>
                                            <path d="m20 20-4-4"></path>
                                        </svg>
                                    </button>
                                </form>

                                <div
                                    class="bb-blog-search-suggestions"
                                    data-blog-live-search-panel
                                    aria-hidden="true"
                                >
                                    <div class="bb-blog-search-head">
                                        <strong>Suggestions</strong>
                                        <span data-blog-live-search-count></span>
                                    </div>

                                    <div class="bb-blog-search-list" data-blog-live-search-list></div>

                                    <div class="bb-blog-search-footer" data-blog-live-search-footer hidden>
                                        <a
                                            class="bb-blog-search-all"
                                            href="{{ route('posts.index') }}"
                                            data-blog-live-search-all
                                        >
                                            View all results →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bb-widget bb-sidebar-category">
                            <h3 class="bb-widget-title">Categories</h3>

                            <ul class="bb-category-list">
                                @foreach ($categories as $category)
                                    @if ($category->posts_count > 0)
                                        <li>
                                            <a href="{{ route('posts.category', $category->slug) }}">
                                                <span>{{ $category->name }}</span>

                                                <span class="bb-category-count">
                                                    {{ $category->posts_count }}
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        @if ($recentPosts->isNotEmpty())
                            <div class="bb-widget bb-sidebar-secondary">
                                <h3 class="bb-widget-title">Recent Posts</h3>

                                <div class="bb-mini-list">
                                    @foreach ($recentPosts as $recent)
                                        <article class="bb-mini-post">

                                            <a
                                                class="bb-mini-image"
                                                href="{{ route('posts.show', $recent->slug) }}"
                                                aria-label="{{ $recent->title }}"
                                            >
                                                @if ($recent->featured_image_url)
                                                    <img
                                                        src="{{ $recent->featured_image_url }}"
                                                        alt="{{ $recent->title }}"
                                                        loading="lazy"
                                                    >
                                                @else
                                                    <div class="bb-mini-placeholder">IMG</div>
                                                @endif
                                            </a>

                                            <div class="bb-mini-content">
                                                <h4 class="bb-mini-title">
                                                    <a href="{{ route('posts.show', $recent->slug) }}">
                                                        {{ $recent->title }}
                                                    </a>
                                                </h4>

                                                <div class="bb-mini-date">
                                                    {{ $recent->published_at->format('d M, Y') }}
                                                </div>
                                            </div>

                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if (isset($popularPosts) && $popularPosts->isNotEmpty())
                            <div class="bb-widget bb-sidebar-secondary">
                                <h3 class="bb-widget-title">Popular Posts</h3>

                                <div class="bb-mini-list">
                                    @foreach ($popularPosts as $popular)
                                        <article class="bb-mini-post">

                                            <a
                                                class="bb-mini-image"
                                                href="{{ route('posts.show', $popular->slug) }}"
                                                aria-label="{{ $popular->title }}"
                                            >
                                                @if ($popular->featured_image_url)
                                                    <img
                                                        src="{{ $popular->featured_image_url }}"
                                                        alt="{{ $popular->title }}"
                                                        loading="lazy"
                                                    >
                                                @else
                                                    <div class="bb-mini-placeholder">IMG</div>
                                                @endif
                                            </a>

                                            <div class="bb-mini-content">
                                                <h4 class="bb-mini-title">
                                                    <a href="{{ route('posts.show', $popular->slug) }}">
                                                        {{ $popular->title }}
                                                    </a>
                                                </h4>

                                                <div class="bb-mini-date">
                                                    {{ $popular->published_at->format('d M, Y') }}
                                                </div>
                                            </div>

                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </aside>

                    <section class="bb-blog-content">

                        <div class="bb-blog-section-head">
                            <h2 class="bb-blog-section-title">
                                Latest Articles
                            </h2>

                            <div class="bb-blog-count">
                                {{ $posts->total() }}
                                {{ $posts->total() === 1 ? 'Article' : 'Articles' }}
                            </div>
                        </div>

                        @if ($posts->count() > 0)

                            <div class="bb-post-grid">

                                @foreach ($posts as $post)

                                    <article class="bb-post-card">

                                        <a
                                            class="bb-post-image"
                                            href="{{ route('posts.show', $post->slug) }}"
                                            aria-label="{{ $post->title }}"
                                        >
                                            @if ($post->featured_image_url)
                                                <img
                                                    src="{{ $post->featured_image_url }}"
                                                    alt="{{ $post->title }}"
                                                    loading="lazy"
                                                >
                                            @else
                                                <div class="bb-post-placeholder">
                                                    <span>BUFFBRIDGE</span>
                                                </div>
                                            @endif
                                        </a>

                                        <div class="bb-post-body">

                                            <div class="bb-post-meta">

                                                <span class="bb-post-date">
                                                    {{ $post->published_at->format('d M Y') }}
                                                </span>

                                                @if ($post->postCategories->isNotEmpty())
                                                    <span class="bb-post-category">
                                                        @foreach ($post->postCategories as $category)
                                                            <a href="{{ route('posts.category', $category->slug) }}">
                                                                {{ $category->name }}
                                                            </a>{{ !$loop->last ? ' / ' : '' }}
                                                        @endforeach
                                                    </span>
                                                @endif

                                            </div>

                                            <h2 class="bb-post-title">
                                                <a href="{{ route('posts.show', $post->slug) }}">
                                                    {{ $post->title }}
                                                </a>
                                            </h2>

                                            @if (!empty($post->excerpt))
                                                <p class="bb-post-excerpt">
                                                    {{ Str::limit(strip_tags($post->excerpt), 135) }}
                                                </p>
                                            @else
                                                <p class="bb-post-excerpt">
                                                    {{ Str::limit(strip_tags($post->content), 135) }}
                                                </p>
                                            @endif

                                            <a
                                                href="{{ route('posts.show', $post->slug) }}"
                                                class="bb-read-more"
                                            >
                                                Read More
                                            </a>

                                        </div>
                                    </article>

                                @endforeach

                            </div>

                        @else

                            <div class="bb-blog-empty">
                                <div class="bb-blog-empty-mark"></div>

                                <h3>No Articles Found</h3>

                                @if (request('search'))
                                    <p>
                                        No results found for "{{ request('search') }}".
                                    </p>
                                @else
                                    <p>
                                        There are no published articles at the moment.
                                    </p>
                                @endif
                            </div>

                        @endif

                        @if ($posts->hasPages())
                            <div class="bb-pagination">
                                {{ $posts->withQueryString()->links('pagination::bootstrap-4') }}
                            </div>
                        @endif

                        <div class="bb-mobile-secondary">

                            @if ($recentPosts->isNotEmpty())
                                <div class="bb-widget">

                                    <h3 class="bb-widget-title">
                                        Recent Posts
                                    </h3>

                                    <div class="bb-mini-list">

                                        @foreach ($recentPosts as $recent)
                                            <article class="bb-mini-post">

                                                <a
                                                    class="bb-mini-image"
                                                    href="{{ route('posts.show', $recent->slug) }}"
                                                    aria-label="{{ $recent->title }}"
                                                >
                                                    @if ($recent->featured_image_url)
                                                        <img
                                                            src="{{ $recent->featured_image_url }}"
                                                            alt="{{ $recent->title }}"
                                                            loading="lazy"
                                                        >
                                                    @else
                                                        <div class="bb-mini-placeholder">
                                                            IMG
                                                        </div>
                                                    @endif
                                                </a>

                                                <div class="bb-mini-content">

                                                    <h4 class="bb-mini-title">
                                                        <a href="{{ route('posts.show', $recent->slug) }}">
                                                            {{ $recent->title }}
                                                        </a>
                                                    </h4>

                                                    <div class="bb-mini-date">
                                                        {{ $recent->published_at->format('d M, Y') }}
                                                    </div>

                                                </div>
                                            </article>
                                        @endforeach

                                    </div>
                                </div>
                            @endif

                            @if (isset($popularPosts) && $popularPosts->isNotEmpty())
                                <div class="bb-widget">

                                    <h3 class="bb-widget-title">
                                        Popular Posts
                                    </h3>

                                    <div class="bb-mini-list">

                                        @foreach ($popularPosts as $popular)
                                            <article class="bb-mini-post">

                                                <a
                                                    class="bb-mini-image"
                                                    href="{{ route('posts.show', $popular->slug) }}"
                                                    aria-label="{{ $popular->title }}"
                                                >
                                                    @if ($popular->featured_image_url)
                                                        <img
                                                            src="{{ $popular->featured_image_url }}"
                                                            alt="{{ $popular->title }}"
                                                            loading="lazy"
                                                        >
                                                    @else
                                                        <div class="bb-mini-placeholder">
                                                            IMG
                                                        </div>
                                                    @endif
                                                </a>

                                                <div class="bb-mini-content">

                                                    <h4 class="bb-mini-title">
                                                        <a href="{{ route('posts.show', $popular->slug) }}">
                                                            {{ $popular->title }}
                                                        </a>
                                                    </h4>

                                                    <div class="bb-mini-date">
                                                        {{ $popular->published_at->format('d M, Y') }}
                                                    </div>

                                                </div>
                                            </article>
                                        @endforeach

                                    </div>
                                </div>
                            @endif

                        </div>

                    </section>
                </div>
            </div>
        </main>

    </div>

</x-guest-layout>
