<x-guest-layout>

    <x-slot name="style">

    </x-slot>
    <style>
        .sc_form_address_field {
            text-align: center !important;
        }

        .mb_1 {
            margin-bottom: 1rem !important;
        }

        .review-sumit {
            background-color: #fea526 !important;
            border-color: #fea526 !important;
            color: white !important;
        }

        .woocommerce div.product .star-rating {
            color: #fea526 !important;
        }

        #tab-description {
            font-size: 20px;
            color: white;
        }

        .font-control {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin: 1rem 0;
        }

        .font-control button {
            width: 24px;
            height: 24px;
            background: #d79600;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.25s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.25);
        }

        .font-control button:hover {
            background: #b88300;
            transform: translateY(-2px);
        }

        .font-control button:active {
            transform: translateY(0);
            box-shadow: none;
        }

        #product-description-text {
            margin-top: 3rem;
        }

        @media (max-width: 767px) {
            .content_wrap {
                width: 350px;
            }

            .font-control button {
                /* width: 30px;
                height: 30px;*/
                font-size: 16px;
                padding: 1.7rem;
            }
        }
    </style>

    <div class="top_panel_title top_panel_style_1  title_present navi_present breadcrumbs_present scheme_original">
        <div class="top_panel_title_inner top_panel_inner_style_1">
            <div class="content_wrap">
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="/">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <a class="breadcrumbs_item all" href="/products">Shop</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">{{ $product->name }}</span>
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
                <article class="post_item post_item_single post_item_product">
                    <div class="product">
                        <!-- Product Image -->
                        <div
                            class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images">
                            <figure class="woocommerce-product-gallery__wrapper">
                                @foreach ($product->images as $image)
                                    <div data-thumb="{{ env('APP_ADMIN_URL') . '/storage/' . $image->image_path }}"
                                        class="woocommerce-product-gallery__image">
                                        <a href="{{ env('APP_ADMIN_URL') . '/storage/' . $image->image_path }}">
                                            <img src="{{ env('APP_ADMIN_URL') . '/storage/' . $image->image_path }}"
                                                data-src="{{ env('APP_ADMIN_URL') . '/storage/' . $image->image_path }}"
                                                data-large_image="{{ env('APP_ADMIN_URL') . '/' . $image->image_path }}"
                                                data-large_image_width="640" data-large_image_height="640"
                                                alt="{{ $product->name }}" title="{{ $product->name }}">
                                        </a>
                                    </div>
                                @endforeach
                            </figure>
                        </div>

                        <!-- Product Details -->
                        <div class="summary entry-summary">
                            <h1 class="product_title">{{ $product->name }}</h1>
                            <p class="price">
                                <span class="woocommerce-Price-amount amount">
                                    @if ($product->variants->count() > 0)
                                        @php
                                            $minPrice = $product->variants->min('price');
                                            $maxPrice = $product->variants->max('price');
                                        @endphp
                                        <span class="woocommerce-Price-currencySymbol"></span>
                                        {{ number_format($minPrice, 2) }}฿
                                        @if ($minPrice != $maxPrice)
                                            - <span
                                                class="woocommerce-Price-currencySymbol"></span>{{ number_format($maxPrice, 2) }}฿
                                        @endif
                                    @else
                                        <span
                                            class="woocommerce-Price-currencySymbol"></span>{{ number_format($product->price, 2) }}฿
                                    @endif
                                </span>
                            </p>

                            <p><strong>Product Code (SKU):</strong> {{ $product->product_code }}</p>

                            @if ($product->availability === 'Out of Stock')
                                <div class="mb_1">
                                    <span class="stock out-of-stock" style="color: #f44336; font-weight: bold; font-size: 1.2em;">Out of Stock</span>
                                </div>
                                <p>Sorry, this product is currently unavailable.</p>
                            @elseif ($product->variants->count() > 0)
                                <form method="post" action="{{ route('cart.add', ['id' => $product->id]) }}"
                                    class="mb_1">
                                    @csrf
                                    <label for="variant">Choose Type:</label>
                                    <select name="variant_id" id="variant" required class="mb_1 ">
                                        @foreach ($product->variants as $variant)
                                            <option value="{{ $variant->id }}">
                                                {{ $variant->type }} - {{ number_format($variant->price, 2) }}฿
                                            </option>
                                        @endforeach
                                    </select>

                                    <div class="quantity mb_1">
                                        <input type="number" class="input-text qty text" step="1" min="1"
                                            name="quantity" value="1" title="Qty" size="4">
                                    </div>
                                    <button type="submit" name="add-to-cart" class="button alt">Add to cart</button>
                                </form>
                            @else
                                <form method="post" action="{{ route('cart.add', ['id' => $product->id]) }}"
                                    class="mb_1">
                                    @csrf
                                    <div class="quantity mb_1">
                                        <input type="number" class="input-text qty text" step="1" min="1"
                                            name="quantity" value="1" title="Qty" size="4">
                                    </div>
                                    <button type="submit" name="add-to-cart" class="button alt">Add to cart</button>
                                </form>
                            @endif
                        </div>
                        <!-- Tabs -->
                        <div class="woocommerce-tabs wc-tabs-wrapper">
                            <ul class="tabs wc-tabs">
                                <li class="description_tab">
                                    <a href="#tab-description">Description</a>
                                </li>
                                {{-- <li class="reviews_tab">
                                <a href="#tab-reviews">Reviews ({{ $product->reviews->count() }})</a>
                            </li> --}}
                                <li>


                                </li>
                            </ul>

                            <!-- Description Tab -->
                            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel wc-tab"
                                id="tab-description">

                                <div class="font-control">
                                    <button id="font-decrease" title="Smaller">
                                        <span>a-</span>
                                    </button>

                                    <button id="font-reset" title="Reset">
                                        <span>⟳</span>
                                    </button>

                                    <button id="font-increase" title="Bigger">
                                        <span>A+</span>
                                    </button>
                                </div>


                                <div id="product-description-text">
                                    {!! nl2br(e($product->description)) !!}
                                </div>
                            </div>

                            <!-- Reviews Tab -->
                            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--reviews panel wc-tab"
                                id="tab-reviews">
                                <div id="reviews" class="woocommerce-Reviews">
                                    <div id="comments">
                                        <h2 class="woocommerce-Reviews-title">Reviews</h2>

                                        @if ($product->reviews->isEmpty())
                                            <p class="woocommerce-noreviews">There are no reviews yet.</p>
                                        @else
                                            @foreach ($product->reviews as $review)
                                                <div class="review">
                                                    <strong>{{ $review->customer->name }}</strong>
                                                    <p>
                                                        Rating:
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $review->rating)
                                                                <span style="color: gold;">&#9733;</span>
                                                                {{-- ดาวเต็ม --}}
                                                            @else
                                                                <span style="color: #ccc;">&#9733;</span>
                                                                {{-- ดาวว่าง --}}
                                                            @endif
                                                        @endfor
                                                    </p>
                                                    <p>{{ $review->review }}</p>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    <div id="review_form_wrapper">
                                        <div id="review_form">
                                            @auth('customer')
                                                <form action="{{ route('review.submit', $product) }}" method="POST"
                                                    id="respond" class="comment-respond">
                                                    @csrf

                                                    <div class="comment-form-rating">
                                                        <label for="rating">Your rating</label>
                                                        <select name="rating" id="rating" required>
                                                            <option value="">Rate&hellip;</option>
                                                            <option value="5">Perfect</option>
                                                            <option value="4">Good</option>
                                                            <option value="3">Average</option>
                                                            <option value="2">Not that bad</option>
                                                            <option value="1">Very poor</option>
                                                        </select>
                                                    </div>

                                                    <p class="comment-form-comment">
                                                        <label for="comment">Your review <span
                                                                class="required">*</span></label>
                                                        <textarea id="comment" name="comment" cols="45" rows="8" required></textarea>
                                                    </p>

                                                    <p class="form-submit">
                                                        <input name="submit" type="submit" id="submit"
                                                            class="submit review-sumit" value="Submit" />
                                                    </p>
                                                </form>
                                            @else
                                                <p>
                                                    <a href="#popup_login_1" class="popup_link popup_login_link"
                                                        title="">Login</a>
                                                    to leave a review.
                                                </p>
                                            @endauth
                                        </div>
                                    </div>

                                    <div class="clear"></div>
                                </div>
                            </div>

                        </div>

                        <!-- Related Products -->

                        <div class="custom_texture_bg1">
                            <div class="content_wrap">
                                <div class="empty_space height_5_5em"></div>
                                <div class="sc_section scheme_light">
                                    <div class="sc_section_inner">
                                        <h2 class="sc_section_title sc_item_title text-white"
                                            style="color:white !important;">Related products
                                        </h2>
                                        <div class="sc_section_descr sc_item_descr">
                                        </div>

                                        <div class="woocommerce columns-4">
                                            <ul class="products">
                                                <!-- Product Item -->
                                                @foreach ($relatedProducts as $product)
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
                                                                {{-- @php
                                                            $rating = $product->average_rating ?? 0;
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
                                <div class="empty_space height_5_7em"></div>
                            </div>
                        </div>

                    </div>
                </article>

            </div>

        </div>
    </div>

    <x-slot name="script">
        <script type="text/javascript" src="{{ asset('js/vendor/woocommerce/js/zoom/jquery.zoom.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/vendor/woocommerce/js/tpl-woocommerce.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/vendor/flexslider/jquery.flexslider.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/vendor/photoswipe/js/photoswipe.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/vendor/photoswipe/js/photoswipe-ui-default.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/vendor/woocommerce/js/single-product.min.js') }}"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const desc = document.getElementById("product-description-text");
                let originalSize = 16;
                let fontSize = originalSize;

                document.getElementById("font-increase").addEventListener("click", function() {
                    fontSize += 2;
                    desc.style.fontSize = fontSize + "px";
                });

                document.getElementById("font-decrease").addEventListener("click", function() {
                    if (fontSize > 10) {
                        fontSize -= 2;
                        desc.style.fontSize = fontSize + "px";
                    }
                });

                document.getElementById("font-reset").addEventListener("click", function() {
                    fontSize = originalSize;
                    desc.style.fontSize = fontSize + "px";
                });
            });
        </script>


    </x-slot>
</x-guest-layout>
