<x-guest-layout :bodyClass="'body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_show sidebar_left'">

    <x-slot name="style">
        {{-- Styles for Post Items and Sidebar --}}
        <style>
            .post_item {
                margin-bottom: 2.5em;
                padding-bottom: 2.5em;
                border-bottom: 1px solid #e5e5e5;
            }

            .post_featured {
                margin-bottom: 1.5em;
            }

            .post_featured img {
                width: 100%;
                height: auto;
            }

            .post_title {
                font-size: 1.5em;
                margin-bottom: 0.5em;
            }

            .post_meta {
                color: #888;
                margin-bottom: 1em;
            }

            .post_meta a {
                color: #888;
            }

            .post_meta .post_meta_item {
                margin-right: 1.5em;
            }

            .post_content p {
                color: #666;
            }

            .read_more_button {
                margin-top: 1.5em;
                display: inline-block;
                padding: 0.8em 1.5em;
                background-color: #fea526;
                color: white !important;
                border-radius: 3px;
                text-decoration: none;
                transition: background-color 0.3s ease;
            }

            .read_more_button:hover {
                background-color: #333;
            }

            .widget ul li {
                margin-bottom: 0.5em;
            }

            .pagination_wrap {
                margin-top: 2em;
                text-align: center;
                clear: both;
                /* Added to ensure it appears below the columns */
            }

            .widget_recent_posts .post_item .post_thumb {
                width: 75px;
                height: 75px;
                margin-right: 15px;
                overflow: hidden;
            }

            .widget_recent_posts .post_item .post_thumb img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            /* Add bottom margin to column items for spacing */
            .columns_wrap .column-1_2 {
                margin-bottom: 2em;
            }
        </style>
    </x-slot>

    <!-- Breadcrumbs -->
    <div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
        <div class="top_panel_title_inner top_panel_inner_style_1">
            <div class="content_wrap">
                <h1 class="page_title">{{ $pageTitle }}</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="/">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Blog</span>
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
                @if ($posts->count() > 0)
                    {{-- This wrapper creates the grid container --}}
                    <div class="columns_wrap">
                        @foreach ($posts as $post)
                            {{-- This div creates a 1/2 width column --}}
                            <div class="column-1_2">
                                <article class="post_item">
                                    @if ($post->featured_image)
                                        <div class="post_featured">
                                            <div class="post_thumb">
                                                <a href="{{ route('posts.show', $post->slug) }}">
                                                    <img src="{{ $post->featured_image }}" alt="{{ $post->title }}">
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="post_content_wrap">
                                        <h2 class="post_title">
                                            <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                                        </h2>
                                        <div class="post_meta">
                                            <span class="post_meta_item">
                                                <i class="icon-calendar"></i> {{ $post->published_at->format('d M Y') }}
                                            </span>
                                            @if ($post->postCategories->isNotEmpty())
                                                <span class="post_meta_item">
                                                    <i class="icon-folder-open"></i>
                                                    @foreach ($post->postCategories as $category)
                                                        <a
                                                            href="{{ route('posts.category', $category->slug) }}">{{ $category->name }}</a>{{ !$loop->last ? ',' : '' }}
                                                    @endforeach
                                                </span>
                                            @endif
                                        </div>
                                        <div class="post_content">
                                            <p>{{ Str::limit($post->excerpt, 120) }}</p>
                                        </div>
                                        <a href="{{ route('posts.show', $post->slug) }}" class="read_more_button">Read
                                            More</a>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No posts found.</p>
                @endif

                <!-- Pagination -->
                <div class="pagination_wrap">
                    {{ $posts->links('pagination::bootstrap-4') }}
                </div>
                <!-- /Pagination -->

            </div>
            <!-- /Content -->

            <!-- Sidebar -->
            <div class="sidebar widget_area scheme_original">
                <div class="sidebar_inner widget_area_inner">

                    <!-- Widget: Search -->
                    <aside class="widget widget_search">
                        <h5 class="widget_title">Search</h5>
                        <form role="search" method="get" class="search_form" action="{{ route('posts.index') }}">
                            <input type="text" class="search_field" placeholder="Search for..."
                                value="{{ request('search') }}" name="search">
                            <button type="submit" class="search_button icon-search"></button>
                        </form>
                    </aside>
                    <!-- /Widget: Search -->

                    <!-- Widget: Post Categories -->
                    <aside class="widget widget_categories">
                        <h5 class="widget_title">Categories</h5>
                        <ul>
                            @foreach ($categories as $category)
                                @if ($category->posts_count > 0)
                                    <li>
                                        <a
                                            href="{{ route('posts.category', $category->slug) }}">{{ $category->name }}</a>
                                        ({{ $category->posts_count }})
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </aside>
                    <!-- /Widget: Post Categories -->

                    <!-- Widget: Recent Posts -->
                    <aside class="widget widget_recent_posts">
                        <h5 class="widget_title">Recent Posts</h5>
                        @foreach ($recentPosts as $recent)
                            <article class="post_item with_thumb">
                                <div class="post_thumb">
                                    <a href="{{ route('posts.show', $recent->slug) }}">
                                        <img alt="{{ $recent->title }}"
                                            src="{{ $recent->featured_image ?? 'https://placehold.co/75x75/f0f0f0/ccc?text=IMG' }}">
                                    </a>
                                </div>
                                <div class="post_content">
                                    <h6 class="post_title">
                                        <a href="{{ route('posts.show', $recent->slug) }}">{{ $recent->title }}</a>
                                    </h6>
                                    <div class="post_info">
                                        <span class="post_info_item post_info_posted">
                                            {{ $recent->published_at->format('d M, Y') }}
                                        </span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </aside>
                    <!-- /Widget: Recent Posts -->

                    <!-- Widget: Popular Posts -->
                    @if (isset($popularPosts) && $popularPosts->isNotEmpty())
                        <aside class="widget widget_recent_posts">
                            <h5 class="widget_title">Popular Posts</h5>
                            @foreach ($popularPosts as $popular)
                                <article class="post_item with_thumb">
                                    <div class="post_thumb">
                                        <a href="{{ route('posts.show', $popular->slug) }}">
                                            <img alt="{{ $popular->title }}"
                                                src="{{ $popular->featured_image ?? 'https://placehold.co/75x75/f0f0f0/ccc?text=IMG' }}">
                                        </a>
                                    </div>
                                    <div class="post_content">
                                        <h6 class="post_title">
                                            <a
                                                href="{{ route('posts.show', $popular->slug) }}">{{ $popular->title }}</a>
                                        </h6>
                                        <div class="post_info">
                                            <span class="post_info_item post_info_posted">
                                                {{ $popular->published_at->format('d M, Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </aside>
                    @endif
                    <!-- /Widget: Popular Posts -->

                </div>
            </div>
            <!-- /Sidebar -->
        </div>
    </div>
</x-guest-layout>
