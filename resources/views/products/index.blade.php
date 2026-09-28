<x-guest-layout>
    <x-slot name="style">
        <style>
            .new-badge {
                position: absolute;
                top: 10px;
                right: 10px;
                background-color: red;
                color: white;
                font-weight: bold;
                padding: 3px 8px;
                font-size: 12px;
                border-radius: 3px;
                z-index: 10;
                text-transform: capitalize;
            }

            .pre-badge {
                position: absolute;
                top: 10px;
                right: 10px;
                background-color: rgb(41, 53, 167);
                color: white;
                font-weight: bold;
                padding: 3px 8px;
                font-size: 12px;
                border-radius: 3px;
                z-index: 10;
                text-transform: capitalize;
            }

            .instock-badge {
                position: absolute;
                top: 10px;
                right: 10px;
                background-color: #54a729;
                color: white;
                font-weight: bold;
                padding: 3px 8px;
                font-size: 12px;
                border-radius: 3px;
                z-index: 10;
                text-transform: capitalize;
            }

            .post_item_wrap {
                position: relative;
            }

            .woocommerce ul.products li.product {
                position: relative;
                overflow: hidden;
                background: #fff;
            }

            @media (max-width: 767px) {
                .content_wrap {
                    width: 100% !important;
                    padding: 0 5px !important;
                }

                .woocommerce ul.products {
                    display: grid !important;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 0.5rem;
                    /* ลด gap ลง */
                    padding: 0 !important;
                }

                .woocommerce ul.products::before,
                .woocommerce ul.products::after {
                    display: none !important;
                    content: none !important;
                }

                .woocommerce ul.products li.product {
                    width: 100% !important;
                    margin: 0 !important;
                    padding-bottom: 0 !important;
                    /* เพิ่ม padding 0 */
                    min-height: auto !important;
                    /* ป้องกัน min-height เดิม */
                    text-align: center;
                    /* จัดกึ่งกลาง */
                }

                .woocommerce ul.products li.product .post_thumb img {
                    margin: 0 auto;
                }
            }
        </style>
    </x-slot>
    <style>
        .sc_form_address_field {
            text-align: center !important;
        }
    </style>
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/skin.css') }}" type="text/css" media="all" /> --}}
    <div class="top_panel_title top_panel_style_1 title_present breadcrumbs_present scheme_original">
        <div class="top_panel_title_inner top_panel_inner_style_1">
            <div class="content_wrap">
                <h1 class="page_title">Shop</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="/">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Shop</span>
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
                <div class="list_products shop_mode_thumbs">
                    <div class="mode_buttons">
                        <a href="#" class="woocommerce_thumbs icon-th" title="Show products as thumbs"></a>
                        <a href="shop-list.html" class="woocommerce_list icon-th-list"
                            title="Show products as list"></a>
                    </div>
                    <p class="woocommerce-result-count">
                        Showing {{ $products->count() }} results</p>
                    <form class="woocommerce-ordering" method="get">
                        @csrf
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <select name="orderby" class="orderby" onchange="this.form.submit()">
                            <option value="date"
                                {{ request('orderby') == 'date' || !request('orderby') ? 'selected' : '' }}>Sort by
                                newness</option>
                            <option value="price" {{ request('orderby') == 'price' ? 'selected' : '' }}>Sort by price:
                                low to high</option>
                            <option value="price-desc" {{ request('orderby') == 'price-desc' ? 'selected' : '' }}>Sort
                                by price: high to low</option>
                        </select>
                    </form>

                    <!-- Products List -->
                    {{-- <ul class="products">
                       <!-- Product List -->
                        @foreach ($products as $key => $product)
                        <li class="product column-1_3 @if ($key == 0) first @endif">
                            <div class="post_item_wrap">
                                @if ($product->created_at >= now()->subDays(30))
                                <div class="new-badge">NEW</div>
                                @else
                                    @if ($product->availability == 'In Stock')
                                        <div class="instock-badge">{{$product->availability}}</div>
                                    @elseif($product->availability == 'Pre-Order')
                                        <div class="pre-badge">{{$product->availability}}</div>
                                    @endif
                                @endif
                                <div class="post_featured">
                                    <div class="post_thumb">
                                        <a href="{{ route('products.show', $product->id) }}">
                                            @if ($product->images->isNotEmpty())
                                                <img src="{{ env('APP_ADMIN_URL').'/storage/'. $product->images->first()->image_path }}" alt="{{ $product->name }}">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="post_content">
                                    <h2 class="woocommerce-loop-product__title">
                                        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                    </h2>
                                    <div class="star-rating">
                                        <span class="width_80_per">
                                            <strong class="rating">4.00</strong> out of 5
                                        </span>
                                    </div>
                                    <span class="price">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                @if ($product->variants->count() > 0)
                                                <div>
                                                    <span class="woocommerce-Price-currencySymbol"></span>
                                                    {{ number_format($product->variants->first()->price, 2) }}฿
                                                </div>
                                                @else
                                                    <span class="woocommerce-Price-currencySymbol"></span>
                                                    {{ number_format($product->price, 2) }}฿
                                                @endif
                                            </span>
                                        </ins>
                                    </span>
                                    <!-- Add to Cart Form -->
                                    <button type="button" class="button add_to_cart_button"
                                    data-url="{{ route('cart.add', ['id' => $product->id]) }}">
                                    Add to cart
                                </button> 
                                </div>
                            </div>
                        </li>
                        @endforeach

                        <!-- /Product Item -->
                    </ul> --}}
                    <div class="woocommerce columns-3">
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
                                                <a href="{{ route('products.show', $product->id) }}">
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
                                                                <span class="woocommerce-Price-currencySymbol"></span>
                                                                {{ number_format($product->variants->first()->price, 2) }}฿
                                                            </div>
                                                        @else
                                                            <span class="woocommerce-Price-currencySymbol"></span>
                                                            {{ number_format($product->price, 2) }}฿
                                                        @endif
                                                    </span>
                                                </ins>
                                            </span>

                                            @if ($product->availability !== 'Out of Stock')
                                                <button type="button" class="button add_to_cart_button"
                                                    data-url="{{ route('cart.add', ['id' => $product->id]) }}">
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
                    <!-- /Products List -->
                    <!-- Pagination -->
                    {{-- <nav class="pagination_wrap pagination_pages">
                        <span class="pager_current active">1</span>
                        <a href="#" class="">2</a>
                        <a href="#" class="pager_next ">&#8250;</a>
                        <a href="#" class="pager_last ">&raquo;</a>
                    </nav> --}}
                    <!-- /Pagination -->
                </div>
            </div>
            <!-- /Content -->
            <!-- Sidebar -->
            <div class="sidebar widget_area scheme_original">
                <div class="sidebar_inner widget_area_inner">
                    <!-- Widget: Cart -->
                    <aside class="widget woocommerce widget_shopping_cart">
                        <h5 class="widget_title">Cart</h5>
                        <div class="widget_shopping_cart_content">
                            @php
                                $customerId_ = \Auth::guard('customer')->id(); // ดึง ID ของลูกค้าปัจจุบัน

                                $cartItems = \App\Models\CartItem::with(['product', 'variant']) // ดึงข้อมูลสินค้าที่อยู่ในตะกร้า
                                    ->where('customer_id', $customerId_)
                                    ->get();

                                $subtotal = $cartItems->sum(function ($item) {
                                    $price = $item->variant ? $item->variant->price : $item->product->price;
                                    return $price * $item->quantity;
                                });
                            @endphp
                            <ul class="cart_list product_list_widget">
                                @foreach ($cartItems as $item)
                                    <li class="mini_cart_item">
                                        <a class="remove" href="{{ route('cart.remove', $item->id) }}"
                                            aria-label="Remove this item">×</a>
                                        <a href="{{ route('products.show', $item->product->id) }}">
                                            <img src="{{ asset('storage/' . $item->product->images->first()->image_path ?? 'default.jpg') }}"
                                                alt="">
                                            {{ $item->product->name }}
                                        </a>
                                        <span class="quantity">
                                            {{ $item->quantity }} ×
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol"></span>
                                                {{ number_format($item->product->price, 2) }}฿
                                            </span>
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                            <p class="total">
                                <strong>Subtotal:</strong>
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol"></span>
                                    {{ number_format($subtotal, 2) }}฿
                                </span>
                            </p>

                            <p class="buttons">
                                <a class="button wc-forward" href="{{ route('cart.index') }}">View cart</a>
                                <a class="button checkout wc-forward" href="{{ route('checkout.index') }}">Checkout</a>
                            </p>
                        </div>
                    </aside>
                    <!-- /Widget: Cart -->

                    <!-- Widget: Product Categories -->
                    <aside class="widget woocommerce widget_product_categories">
                        <h5 class="widget_title">Categories</h5>
                        <ul class="product-categories">
                            @foreach ($categories_menu as $category)
                                <li>
                                    <a
                                        href="{{ route('products.index', ['category' => $category->id]) }}">{{ $category->name }}</a>
                                    @if ($category->children->where('active', 1)->isNotEmpty())
                                        <ul class="children">
                                            @foreach ($category->children->where('active', 1) as $child)
                                                <li>
                                                    <a
                                                        href="{{ route('products.index', ['category' => $child->id]) }}">{{ $child->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                    <!-- /Widget: Product Categories -->

                    <!-- Widget: Price Filter -->


                    <aside class="widget woocommerce widget_price_filter">
                        <h5 class="widget_title">Filter by price</h5>
                        @php
                            $minPrice = (float) \App\Models\Product::min('price');
                            $maxPrice = (float) \App\Models\Product::max('price');
                        @endphp
                        <form method="get" action="{{ route('products.index') }}">
                            @csrf
                            <div class="price_slider_wrapper">
                                <div class="price_slider" style="display:none;"></div>
                                <div class="price_slider_amount">
                                    <input type="text" id="min_price" name="min_price"
                                        value="{{ request('min_price') }}" data-min="{{ $minPrice }}"
                                        placeholder="Min price" />
                                    <input type="text" id="max_price" name="max_price"
                                        value="{{ request('max_price') }}" data-max="{{ $maxPrice }}"
                                        placeholder="Max price" />
                                    <button type="submit" class="button">Filter</button>
                                    <div class="price_label" style="display:none;">
                                        Price: <span class="from"
                                            style="color:white;">{{ request('min_price') }}</span> &mdash; <span
                                            class="to" style="color:white;">{{ request('max_price') }}</span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </form>
                    </aside>
                    <!-- /Widget: Price Filter -->
                </div>

            </div>
            <!-- /Sidebar -->
        </div>
    </div>
    <x-slot name="script">
        <script type='text/javascript'
            src='{{ asset('js/vendor/woocommerce/js/jquery-ui-touch-punch/jquery-ui-touch-punch.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('js/vendor/woocommerce/js/accounting/accounting.min.js') }}'></script>
        <script type='text/javascript' src='{{ asset('js/vendor/woocommerce/js/price-slider/price-slider.min.js') }}'></script>
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
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
        {{-- <script>
$(function() {
    var min = {{ $minPrice }};
    var max = {{ $maxPrice }};
    var currentMin = {{ request('min_price', $minPrice) }};
    var currentMax = {{ request('max_price', $maxPrice) }};

    $(".price_slider").slider({
        range: true,
        min: min,
        max: max,
        values: [currentMin, currentMax],
        slide: function(event, ui) {
            $("#min_price").val(ui.values[0]);
            $("#max_price").val(ui.values[1]);
        }
    });

    $(".price_slider").show(); // เพราะ style="display:none;"
});
</script> --}}
        <script>
            jQuery(document).ready(function($) {
                function removeCurrencySymbol() {
                    $('.price_slider_amount .price_label .from, .price_slider_amount .price_label .to').each(
                        function() {
                            var cleaned = $(this).text().replace('$', '').replace('฿', '').trim();
                            $(this).text(cleaned);
                        });
                }

                // เรียกทันทีเมื่อโหลด
                removeCurrencySymbol();

                // เรียกใหม่ทุกครั้ง slider เปลี่ยนค่า
                $('.price_slider').on('slidechange slidestop slide', function() {
                    removeCurrencySymbol();
                });
            });
        </script>


    </x-slot>

</x-guest-layout>
