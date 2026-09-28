<x-guest-layout>
    <x-slot name="style">
        {{-- Styles for Post Content and Social Share --}}
        <style>
            .post_item_single .post_content img {
                max-width: 100%;
                height: auto;
                margin-top: 1em;
                margin-bottom: 1em;
            }

            .post_info {
                margin: 1em 0;
                color: #888;
                border-top: 1px solid #eee;
                border-bottom: 1px solid #eee;
                padding: 1em 0;
            }

            .post_info_item {
                margin-right: 1.5em;
            }

            .social-share {
                margin-top: 2em;
            }

            .social-share-title {
                font-weight: bold;
                margin-right: 1em;
            }

            .social-share a {
                display: inline-block;
                width: 40px;
                height: 40px;
                line-height: 40px;
                text-align: center;
                color: #fff !important;
                background-color: #ccc;
                border-radius: 50%;
                margin-right: 0.5em;
                text-decoration: none;
            }

            .social-share .facebook {
                background-color: #3b5998;
            }

            .social-share .twitter {
                background-color: #1da1f2;
            }

            .social-share .line {
                background-color: #00c300;
            }

            .related_wrap {
                margin-top: 4em;
            }

            .related_wrap .related_item_title {
                font-size: 1.2em;
            }
        </style>
    </x-slot>

    <!-- Breadcrumbs -->
    <div class="top_panel_title top_panel_style_1 title_present navi_present breadcrumbs_present scheme_original">
        <div class="top_panel_title_inner top_panel_inner_style_1">
            <div class="content_wrap">
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="/">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <a class="breadcrumbs_item all" href="{{ route('posts.index') }}">Blog</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">{{ $post->title }}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumbs -->

    <!-- Page Content -->
    <div class="page_content_wrap page_paddings_yes">
        <div class="content_wrap">
            <!-- Content -->
            <div class="content">
                <article class="post_item post_item_single">

                    <h1 class="post_title">{{ $post->title }}</h1>

                    <div class="post_info">
                        <span class="post_info_item post_info_posted_by">
                            By <a href="#" class="post_info_author">{{ $post->user->name ?? 'Admin' }}</a>
                        </span>
                        <span class="post_info_item post_info_posted">
                            on {{ $post->published_at->format('F d, Y') }}
                        </span>
                        @if ($post->postCategories->isNotEmpty())
                            <span class="post_info_item post_info_tags">
                                in
                                @foreach ($post->postCategories as $category)
                                    <a href="{{ route('posts.category', $category->slug) }}"
                                        class="category_link">{{ $category->name }}</a>{{ !$loop->last ? ',' : '' }}
                                @endforeach
                            </span>
                        @endif
                    </div>

                    @if ($post->featured_image)
                        <div class="post_featured">
                            <div class="post_thumb">
                                <img src="{{ $post->featured_image }}" alt="{{ $post->title }}">
                            </div>
                        </div>
                    @endif

                    <div class="post_content">
                        {{-- Use {!! !!} to render HTML from TinyMCE --}}
                        {!! $post->content !!}
                    </div>

                    <!-- Social Share -->
                    <div class="social-share">
                        <span class="social-share-title">Share:</span>

                        {{-- Facebook Share --}}
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                            target="_blank" class="">
                            <img src="{{ asset('images/facebook2.png') }}" alt="">
                        </a>

                        {{-- Twitter -> X Share --}}
                        {{-- ใช้ URL เดิม แต่เปลี่ยน Class และข้อความแสดงผล --}}
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                            target="_blank" class="">
                            <img src="{{ asset('images/x.jpg') }}" alt="">
                        </a>

                        {{-- LINE Share --}}
                        {{-- **✅ เพิ่มการแชร์ LINE** --}}
                        <a href="https://social-plugins.line.me/lineit/share?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                            target="_blank" class="">
                            <img src="{{ asset('images/line.png') }}" alt="">
                        </a>
                    </div>
                    <!-- /Social Share -->

                </article>

                <!-- Related Posts -->
                @if ($relatedPosts->isNotEmpty())
                    <div class="related_wrap">
                        <h2 class="section_title">Related Posts</h2>
                        <div class="columns_wrap">
                            @foreach ($relatedPosts as $related)
                                <div class="column-1_4">
                                    <article class="post_item post_item_related">
                                        <div class="post_featured">
                                            <div class="post_thumb">
                                                <a href="{{ route('posts.show', $related->slug) }}">
                                                    <img alt="{{ $related->title }}"
                                                        src="{{ $related->featured_image ?? 'https://placehold.co/370x370/f0f0f0/ccc?text=IMG' }}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post_content">
                                            <h5 class="post_title">
                                                <a
                                                    href="{{ route('posts.show', $related->slug) }}">{{ $related->title }}</a>
                                            </h5>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <!-- /Related Posts -->

            </div>
            <!-- /Content -->
        </div>
    </div>
</x-guest-layout>
