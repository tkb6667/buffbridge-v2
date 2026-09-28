                <!-- Header -->
                <header class="top_panel_wrap top_panel_style_2 scheme_original">
                    <div class="top_panel_wrap_inner top_panel_inner_style_2 top_panel_position_above">
                        <!-- Top panel 1 -->
                        <div class="top_panel_top">
                            <div class="content_wrap clearfix">
                                <div class="top_panel_top_user_area">
                                    <!-- Socials -->
                                    <div class="top_panel_top_socials" style="margin-top:0px;padding-top:0.5rem;">
                                        <div
                                            class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_tiny">
                                            <div class="sc_socials_item">
                                                <a href="https://www.facebook.com/share/1ABFfSy5QZ/?mibextid=wwXIfr"
                                                    target="_blank" class="social_icons social_facebook">
                                                    <span class="icon-facebook"></span>
                                                </a>
                                            </div>
                                            <div class="sc_socials_item">
                                                <a href="https://lin.ee/FLk15Ps" target="_blank"
                                                    class="social_icons social_facebook">
                                                    <img src="{{ asset('images/icons8-line.svg') }}" alt=""
                                                        style="filter: invert(1);width: 20px;height: 20px;vertical-align: middle;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Socials -->
                                    <ul class="menu_user_nav">
                                        <li></li>
                                    </ul>
                                </div>
                                <!-- Open hours -->
                                <div class="top_panel_top_open_hours" style="margin-top:5px;">
                                    <ul class="menu_user_nav">
                                        <!-- Register -->
                                        @if (!auth('customer')->check())
                                            <li class="menu_user_register">
                                                <a href="#popup_registration_1"
                                                    class="popup_link popup_register_link icon-pencil"
                                                    title="">Register</a>
                                                <div id="popup_registration_1"
                                                    class="popup_wrap popup_registration bg_tint_light">
                                                    <a href="#" class="popup_close"></a>
                                                    <div class="form_wrap">
                                                        <form name="registration_form" action="{{ route('register') }}"
                                                            method="post" class="popup_form registration_form">
                                                            @csrf
                                                            <div class="form_left">
                                                                <div
                                                                    class="popup_form_field login_field iconed_field icon-user">
                                                                    <input type="text" id="registration_username_1"
                                                                        name="name" value=""
                                                                        placeholder="User name (login)">
                                                                </div>
                                                                <div
                                                                    class="popup_form_field email_field iconed_field icon-mail">
                                                                    <input type="text" id="registration_email_1"
                                                                        name="email" value=""
                                                                        placeholder="E-mail">
                                                                </div>
                                                                <div class="popup_form_field agree_field">
                                                                    <input type="checkbox" value="agree"
                                                                        id="registration_agree_1"
                                                                        name="registration_agree">
                                                                    <label for="registration_agree">I agree with</label>
                                                                    <a href="{{ route('term') }}">Terms &amp;
                                                                        Conditions</a>
                                                                </div>
                                                                <div class="popup_form_field submit_field">
                                                                    <input type="submit" class="submit_button"
                                                                        value="Sign Up">
                                                                </div>
                                                            </div>
                                                            <div class="form_right">
                                                                <div
                                                                    class="popup_form_field password_field iconed_field icon-lock">
                                                                    <input type="password" id="registration_pwd_1"
                                                                        name="password" value=""
                                                                        placeholder="Password">
                                                                </div>
                                                                <div
                                                                    class="popup_form_field password_field iconed_field icon-lock">
                                                                    <input type="password" id="registration_pwd2_1"
                                                                        name="password_confirmation" value=""
                                                                        placeholder="Confirm Password">
                                                                </div>
                                                                <div class="popup_form_field description_field">Minimum
                                                                    6 characters</div>
                                                            </div>
                                                        </form>
                                                        <div class="result message_block"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- /Register -->
                                            <!-- Login -->
                                            <li class="menu_user_login">
                                                <a href="#popup_login_1" class="popup_link popup_login_link icon-user"
                                                    title="">Login</a>
                                                <div class="login">
                                                    <div id="popup_login_1"
                                                        class="popup_wrap popup_login bg_tint_light">
                                                        <a href="#" class="popup_close"></a>
                                                        <div class="form_wrap">
                                                            <div class="form_left">
                                                                <form action="{{ route('customer.login.submit') }}"
                                                                    method="post" name="login_form"
                                                                    class="popup_form login_form">
                                                                    @csrf
                                                                    <div
                                                                        class="popup_form_field login_field iconed_field icon-user">
                                                                        <input type="text" id="log_1"
                                                                            name="email" value=""
                                                                            placeholder="Login or Email">
                                                                    </div>
                                                                    <div
                                                                        class="popup_form_field password_field iconed_field icon-lock">
                                                                        <input type="password" id="password_1"
                                                                            name="password" value=""
                                                                            placeholder="Password">
                                                                    </div>
                                                                    <div class="popup_form_field remember_field">
                                                                        <a href="#"
                                                                            class="forgot_password">Forgot
                                                                            password?</a>
                                                                        <input type="checkbox" value="forever"
                                                                            id="rememberme_1" name="rememberme">
                                                                        <label for="rememberme">Remember me</label>
                                                                    </div>
                                                                    <div class="popup_form_field submit_field">
                                                                        <input type="submit" class="submit_button"
                                                                            value="Login">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="form_right">
                                                                <div class="login_socials_title">You can login using
                                                                    your social profile</div>
                                                                <div class="login_socials_list">
                                                                    <div class="social-login-widget">
                                                                        <div class="social-login-connect-with">Connect
                                                                            with:</div>
                                                                        <div class="social-login-provider-list"
                                                                            style="width: fit-content;">
                                                                            <a href="{{ route('google.login') }}"
                                                                                class="google-login-btn">
                                                                                <img src="https://developers.google.com/identity/images/g-logo.png"
                                                                                    alt="Google Logo">
                                                                                With Google
                                                                            </a>


                                                                        </div>
                                                                        <div class="social-login-widget-clearing">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @else
                                            <li class="menu_user_login">
                                            <li class="menu-item menu-item-has-children">
                                                <a href="javascript:void(0);"
                                                    class="popup_link popup_login_link icon-user">{{ auth('customer')->user()->email }}</a>
                                                <ul class="sub-menu">
                                                    <li class="menu-item">
                                                        <a href="{{ route('profile.edit') }}">Profile</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="{{ route('cart.index') }}">My Cart</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="{{ route('order.history') }}">History</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="javascript:void(0);"
                                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                        <form id="logout-form" action="{{ route('logout2') }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
                                            </li>
                                        @endif
                                        <!-- /Login -->
                                    </ul>
                                </div>
                                <!-- /Open hours -->
                            </div>
                        </div>
                        <!-- /Top panel 1 -->
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
                        <!-- Top panel 2 -->
                        <div class="top_panel_middle">
                            <div class="content_wrap">
                                <div class="columns_wrap columns_fluid">
                                    <!-- Contacts -->
                                    <div class="column-1_4 contact_field contact_phone">
                                        <span class="contact_icon icon-iconmonstr-phone-2-icon"></span>
                                        <span class="contact_label contact_phone"><a
                                                href="tel:0902998211">+66902998211</a></span>
                                        <span class="contact_email">Info@buffbridge.com</span>
                                    </div>
                                    <!-- /Contacts -->

                                    <!-- Logo -->
                                    <div class="column-1_3 contact_logo" style="width: 48%;">
                                        <div class="logo">
                                            <a href="{{ url('/') }}">
                                                <img src="{{ asset('BUFF_LOGO.png') }}" class="logo_main"
                                                    alt="Logo">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- /Logo -->

                                    <!-- Cart -->
                                    <div class="column-1_4 contact_field contact_cart">
                                        <a href="{{ route('cart.index') }}" class="top_panel_cart_button">
                                            <span class="cart_item">{{ $cartItems->count() }}</span>
                                            <span class="contact_icon icon-iconmonstr-shopping-cart-4-icon"></span>
                                            <span class="contact_label contact_cart_label">Your cart:</span>
                                            <span class="contact_cart_totals">
                                                <span class="cart_items">{{ $cartItems->count() }} Items</span> -
                                                <span class="cart_summa">{{ number_format($subtotal, 2) }}฿</span>
                                            </span>
                                        </a>

                                        <ul class="widget_area sidebar_cart sidebar">
                                            <li>
                                                <div class="widget woocommerce widget_shopping_cart">
                                                    <div class="hide_cart_widget_if_empty">
                                                        <div class="widget_shopping_cart_content">
                                                            <ul class="cart_list product_list_widget">
                                                                @foreach ($cartItems as $key => $item)
                                                                    <li class="mini_cart_item">
                                                                        <form
                                                                            action="{{ route('cart.remove', $item->id) }}"
                                                                            method="POST"
                                                                            id="h_cart_{{ $key }}"
                                                                            style="display: inline;">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <a class="remove"
                                                                                href="javascript:void(0);"
                                                                                type="submit"
                                                                                onclick="$('#h_cart_{{ $key }}').submit();">×</a>
                                                                        </form>

                                                                        <a
                                                                            href="{{ route('products.show', $item->product->id) }}">
                                                                            {{ $item->product->name }}
                                                                            @if ($item->variant)
                                                                                <br><small
                                                                                    style="color: #666;">Variant:
                                                                                    {{ $item->variant->type }}</small>
                                                                            @endif
                                                                        </a>

                                                                        <span class="quantity">
                                                                            {{ $item->quantity }} ×
                                                                            <span
                                                                                class="woocommerce-Price-amount amount">
                                                                                <span
                                                                                    class="woocommerce-Price-currencySymbol"></span>
                                                                                {{ number_format($item->variant ? $item->variant->price : $item->product->price, 2) }}฿
                                                                            </span>
                                                                        </span>
                                                                    </li>
                                                                @endforeach


                                                            </ul>
                                                            <p class="total">
                                                                <strong>Subtotal:</strong>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol"></span>
                                                                    {{ number_format($subtotal, 2) }}฿
                                                                </span>
                                                            </p>
                                                            <p class="buttons">
                                                                <a class="button wc-forward"
                                                                    href="{{ route('cart.index') }}">View cart</a>
                                                                <a class="button checkout wc-forward"
                                                                    href="{{ route('checkout.index') }}">Checkout</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- /Cart -->
                                </div>
                            </div>
                        </div>

                        <!-- /Top panel 2 -->
                        <!-- Top panel 3 -->
                        <div class="top_panel_bottom">
                            <div class="content_wrap clearfix">
                                <!-- Menu -->
                                <nav class="menu_main_nav_area">
                                    <ul class="menu_main_nav">
                                        <!-- Home -->
                                        <li class="menu-item current-menu-ancestor">
                                            <a href="/">Home</a>
                                        </li>
                                        <!-- /Home -->
                                        <!-- Products -->
                                        {{-- <li class="menu-item">
                                            <a href="/products">Products</a>
                                        </li> --}}
                                        <!-- /Products -->
                                        <!-- Promotion -->
                                        <li class="menu-item">
                                            <a href="{{ route('posts.index') }}">Blogs</a>
                                        </li>
                                        <!-- /Promotion -->
                                        @php
                                            $categories_menu = \App\Models\Category::whereNull('parent_id')
                                                ->with('children.children')
                                                ->get();
                                        @endphp

                                        <li class="menu-item menu-item-has-children">
                                            <a href="/products">Products</a>
                                            <ul class="sub-menu">
                                                @foreach ($categories_menu->where('active', 1) as $category)
                                                    <li class="menu-item menu-item-has-children">
                                                        <a
                                                            href="{{ route('products.index', ['category' => $category->id]) }}">{{ $category->name }}</a>
                                                        @if ($category->children->isNotEmpty())
                                                            <ul class="sub-menu">
                                                                @foreach ($category->children->where('active', 1) as $subCategory)
                                                                    <li class="menu-item menu-item-has-children">
                                                                        <a
                                                                            href="{{ route('products.index', ['category' => $subCategory->id]) }}">{{ $subCategory->name }}</a>
                                                                        @if ($subCategory->children->isNotEmpty())
                                                                            <ul class="sub-menu">
                                                                                @foreach ($subCategory->children->where('active', 1) as $subSubCategory)
                                                                                    <li class="menu-item">
                                                                                        <a
                                                                                            href="{{ route('products.index', ['category' => $subSubCategory->id]) }}">{{ $subSubCategory->name }}</a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>

                                        <!-- Contact Us -->
                                        <li class="menu-item">
                                            <a href="{{ route('products.index', ['category' => 85]) }}">BuffBridge
                                                Custom</a>
                                        </li>
                                        <!-- Contact Us -->
                                        <li class="menu-item">
                                            <a href="javascript:void(0)">Contact us</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#" class="custom-search-trigger"
                                                style="background:#fea526;">
                                                <i class="search_submit icon-iconmonstr-magnifier-2-icon"
                                                    style="color: white;font-size: 20px;margin-left: 5px;"></i>
                                            </a>
                                            <div class="custom-search-form-wrap">
                                                <form role="search" method="get" class="search_form"
                                                    action="{{ route('products.index') }}">
                                                    <input type="text" class="search_field" placeholder="Search"
                                                        value="{{ request('search') }}" name="search" />
                                                    <button type="submit"
                                                        class="search_submit icon-iconmonstr-magnifier-2-icon"
                                                        style="color:white;" title="Start search"></button>
                                                </form>
                                            </div>
                                            <div class="search_results widget_area scheme_original hidden">
                                                <a class="search_results_close icon-cancel"></a>
                                                <div class="search_results_content"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- /Menu -->
                            </div>
                        </div>
                        <!-- /Top panel 3 -->
                    </div>
                </header>
                <style>
                    .menu-item {
                        position: relative;
                    }

                    .custom-search-form-wrap {
                        position: absolute;
                        top: 100%;
                        right: 0;
                        /* จัดให้อยู่ชิดขวาขององค์ประกอบแม่ */
                        width: 300px;
                        padding: 10px;
                        background-color: #333;
                        z-index: 100;
                        opacity: 0;
                        /* ซ่อนและทำให้โปร่งใส */
                        visibility: hidden;
                        /* ซ่อนจากเครื่องมือเข้าถึง */
                        transform: translateY(10px);
                        /* ซ่อนโดยเลื่อนลงมาเล็กน้อย */
                        transition: all 0.3s ease-in-out;
                        /* เพิ่ม animation ให้ดูราบรื่น */
                    }

                    .custom-search-form-wrap.is-active {
                        opacity: 1;
                        /* แสดงผล */
                        visibility: visible;
                        transform: translateY(0);
                        /* เลื่อนกลับมาตำแหน่งปกติ */
                    }

                    #search_submit_mobile {
                        display: block !important;
                        right: -26px !important;
                        top: 8px !important;
                        left: auto !important;
                    }
                </style>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const searchTrigger = document.querySelector('.custom-search-trigger');
                        const searchForm = document.querySelector('.custom-search-form-wrap');

                        if (searchTrigger && searchForm) {
                            searchTrigger.addEventListener('click', function(event) {
                                event.preventDefault();
                                // ใช้แค่การสลับคลาส 'is-active' อย่างเดียว
                                searchForm.classList.toggle('is-active');
                            });

                            document.addEventListener('click', function(event) {
                                const isClickInsideSearchForm = searchForm.contains(event.target);
                                const isClickOnSearchTrigger = searchTrigger.contains(event.target);

                                // ตรวจสอบและลบคลาส 'is-active' เท่านั้น
                                if (!isClickInsideSearchForm && !isClickOnSearchTrigger && searchForm.classList
                                    .contains('is-active')) {
                                    searchForm.classList.remove('is-active');
                                }
                            });
                        }




                    });
                    document.addEventListener('DOMContentLoaded', function() {

                        const searchForm = document.getElementById('searchform_mobile');

                        // ตรวจสอบว่าฟอร์มมีอยู่จริงก่อนที่จะเพิ่ม event listener
                        if (searchForm) {
                            searchForm.addEventListener('submit', function(event) {
                                // เมื่อฟอร์มถูก submit โค้ดส่วนนี้จะทำงาน
                                // event.preventDefault(); // หากต้องการป้องกันไม่ให้ฟอร์มส่งข้อมูลตามปกติ

                                // คุณสามารถเพิ่มโค้ดอื่นๆ ที่นี่ได้ เช่น:
                                const searchInput = searchForm.querySelector('.search_field');
                                const searchValue = searchInput.value;

                                console.log('ข้อมูลที่ต้องการค้นหา:', searchValue);

                                // ตัวอย่าง: ตรวจสอบว่ามีค่าในช่องค้นหาหรือไม่
                                if (searchValue.trim() === '') {
                                    // หากไม่มีข้อมูล ให้แสดงข้อความเตือน
                                    alert('กรุณาป้อนข้อความที่ต้องการค้นหา');
                                    event.preventDefault(); // ป้องกันไม่ให้ฟอร์มส่งข้อมูล
                                }
                            });
                        }




                    });
                </script>
                <!-- /Header -->
                <!-- Header Mobile -->
                <div class="header_mobile">
                    <div class="content_wrap">
                        <div class="menu_button icon-menu"></div>
                        <!-- Logo -->
                        <div class="logo">
                            <a href="/">
                                <img src="{{ asset('BUFF_LOGO.png') }}" class="logo_main" alt="">
                            </a>
                        </div>
                        <!-- /Logo -->
                        <!-- Cart -->
                        <div class="menu_main_cart top_panel_icon">
                            <a href="{{ route('cart.index') }}" class="top_panel_cart_button">
                                <span class="cart_item">{{ $cartItems->count() }}</span>
                                <span class="contact_icon icon-iconmonstr-shopping-cart-4-icon"></span>
                                <span class="contact_label contact_cart_label">Your cart:</span>
                                <span class="contact_cart_totals">
                                    <span class="cart_items">{{ $cartItems->count() }} Items</span> -
                                    <span class="cart_summa">฿{{ number_format($subtotal, 2) }}</span>
                                </span>
                            </a>
                            <ul class="widget_area sidebar_cart sidebar">
                                <li>
                                    <div class="widget woocommerce widget_shopping_cart">
                                        <div class="hide_cart_widget_if_empty">
                                            <div class="widget_shopping_cart_content">
                                                <ul class="cart_list product_list_widget">
                                                    @foreach ($cartItems as $key => $item)
                                                        <li class="mini_cart_item">
                                                            <form action="{{ route('cart.remove', $item->id) }}"
                                                                method="POST" id="h_cart_{{ $key }}"
                                                                style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a class="remove" href="javascript:void(0);"
                                                                    onclick="$('#h_cart_{{ $key }}').submit();">×</a>
                                                            </form>
                                                            <a
                                                                href="{{ route('products.show', $item->product->id) }}">
                                                                {{ $item->product->name }}
                                                            </a>
                                                            <span class="quantity">
                                                                {{ $item->quantity }} ×
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">฿</span>
                                                                    {{ number_format($item->product->price, 2) }}
                                                                </span>
                                                            </span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <p class="total">
                                                    <strong>Subtotal:</strong>
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol">฿</span>
                                                        {{ number_format($subtotal, 2) }}
                                                    </span>
                                                </p>
                                                <p class="buttons">
                                                    <a class="button wc-forward"
                                                        href="{{ route('cart.index') }}">View cart</a>
                                                    <a class="button checkout wc-forward"
                                                        href="{{ route('checkout.index') }}">Checkout</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /Cart -->
                    </div>
                    <!-- Side wrap -->
                    <div class="side_wrap">
                        <div class="close">Close</div>
                        <!-- Top panel -->
                        <div class="panel_top">
                            <!-- Menu -->
                            <nav class="menu_main_nav_area">
                                <ul class="menu_main_nav">
                                    <!-- Home -->
                                    <li class="menu-item current-menu-ancestor current-menu-parent">
                                        <a href="/">Home</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">Promotion</a>
                                    </li>
                                    <!-- /Promotion -->
                                    @php
                                        $categories_menu = \App\Models\Category::whereNull('parent_id')
                                            ->with('children.children')
                                            ->get();
                                    @endphp

                                    <li class="menu-item menu-item-has-children">
                                        <a href="/products">Products</a>
                                        <ul class="sub-menu">
                                            @foreach ($categories_menu as $category)
                                                <li class="menu-item menu-item-has-children">
                                                    <a
                                                        href="{{ route('products.index', ['category' => $category->id]) }}">{{ $category->name }}</a>
                                                    @if ($category->children->isNotEmpty())
                                                        <ul class="sub-menu">
                                                            @foreach ($category->children as $subCategory)
                                                                <li class="menu-item menu-item-has-children">
                                                                    <a
                                                                        href="{{ route('products.index', ['category' => $subCategory->id]) }}">{{ $subCategory->name }}</a>
                                                                    @if ($subCategory->children->isNotEmpty())
                                                                        <ul class="sub-menu">
                                                                            @foreach ($subCategory->children as $subSubCategory)
                                                                                <li class="menu-item">
                                                                                    <a
                                                                                        href="{{ route('products.index', ['category' => $subSubCategory->id]) }}">{{ $subSubCategory->name }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <!-- Contact Us -->
                                    <li class="menu-item">
                                        <a href="{{ route('products.index', ['category' => 85]) }}">BuffBridge
                                            Custom</a>
                                    </li>
                                    <!-- Contact Us -->
                                    <li class="menu-item">
                                        <a href="javascript:void(0)">Contact us</a>
                                    </li>
                                    @if (auth('customer')->check())
                                        <li class="menu-item menu-item-has-children">
                                            <a
                                                href="javascript:void(0);">{{ \Auth::guard('customer')->user()->name }}</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item">
                                                    <a href="{{ route('profile.edit') }}">Profile</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="{{ route('cart.index') }}">My Cart</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="{{ route('order.history') }}">History</a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                            <!-- /Menu -->
                            <!-- Search -->
                            <style>
                                /* .search_submit {
                                    font-size: 20px;
                                } */

                                #search_mobile .search_field {
                                    font-size: 18px !important;
                                }

                                #search_mobile .search_field,
                                #search_mobile .search_field::placeholder {
                                    color: #ffffff !important;
                                    font-size: 20px;
                                }
                            </style>
                            <div class="search_wrap search_style_regular search_state_fixed" id="search_mobile"
                                style="background: #fea526;">
                                <div class="search_form_wrap">
                                    <form role="search" method="get" class="search_form" id="searchform_mobile"
                                        action="{{ route('products.index') }}">
                                        <button type="submit" class="search_submit  icon-iconmonstr-magnifier-2-icon"
                                            id="search_submit_mobile" title="Start search"></button>
                                        <input type="text" class="search_field" placeholder="Search"
                                            value="{{ request('search') }}" name="search" />
                                    </form>

                                </div>
                                <div class="search_results widget_area scheme_original">
                                    <a class="search_results_close icon-cancel"></a>
                                    <div class="search_results_content"></div>
                                </div>
                            </div>
                            <!-- /Search -->
                            @if (!auth('customer')->check())
                                <!-- Login -->
                                <div class="login">
                                    <a href="#popup_login" class="popup_link popup_login_link icon-user"
                                        title="">Login</a>
                                    <div id="popup_login" class="popup_wrap popup_login bg_tint_light">
                                        <a href="#" class="popup_close"></a>
                                        <div class="form_wrap">
                                            <div class="form_left">
                                                <form action="{{ route('customer.login.submit') }}" method="post"
                                                    name="login_form" class="popup_form login_form">
                                                    @csrf
                                                    <div class="popup_form_field login_field iconed_field icon-user">
                                                        <input type="text" id="log" name="email"
                                                            value="" placeholder="Login or Email">
                                                    </div>
                                                    <div
                                                        class="popup_form_field password_field iconed_field icon-lock">
                                                        <input type="password" id="password" name="password"
                                                            value="" placeholder="Password">
                                                    </div>
                                                    <div class="popup_form_field remember_field">
                                                        <a href="#" class="forgot_password">Forgot password?</a>
                                                        <input type="checkbox" value="forever" id="rememberme"
                                                            name="rememberme">
                                                        <label for="rememberme">Remember me111</label>
                                                    </div>
                                                    <div class="popup_form_field submit_field">
                                                        <input type="submit" class="submit_button" value="Login">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="form_right">
                                                <div class="login_socials_title">You can login using your social
                                                    profile</div>
                                                <div class="login_socials_list">
                                                    <div class="social-login-widget">
                                                        <div class="social-login-connect-with">Connect with:</div>
                                                        <div class="social-login-provider-list"
                                                            style="width: fit-content;">
                                                            <a href="{{ route('google.login') }}"
                                                                class="google-login-btn">
                                                                <img src="https://developers.google.com/identity/images/g-logo.png"
                                                                    alt="Google Logo">
                                                                With Google
                                                            </a>


                                                        </div>
                                                        <div class="social-login-widget-clearing"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Login -->
                                <!-- Register -->
                                <div class="login">
                                    <a href="#popup_registration" class="popup_link popup_register_link icon-pencil"
                                        title="">Register</a>
                                    <div id="popup_registration" class="popup_wrap popup_registration bg_tint_light">
                                        <a href="#" class="popup_close"></a>
                                        <div class="form_wrap">
                                            <form name="registration_form" action="{{ route('register') }}"
                                                method="post" class="popup_form registration_form">
                                                @csrf
                                                <div class="form_left">
                                                    <div class="popup_form_field login_field iconed_field icon-user">
                                                        <input type="text" id="registration_username_1"
                                                            name="name" value=""
                                                            placeholder="User name (login)">
                                                    </div>
                                                    <div class="popup_form_field email_field iconed_field icon-mail">
                                                        <input type="text" id="registration_email_1"
                                                            name="email" value="" placeholder="E-mail">
                                                    </div>
                                                    <div class="popup_form_field agree_field">
                                                        <input type="checkbox" value="agree"
                                                            id="registration_agree_1" name="registration_agree">
                                                        <label for="registration_agree">I agree with</label> <a
                                                            href="{{ route('term') }}">Terms &amp; Conditions</a>
                                                    </div>
                                                    <div class="popup_form_field submit_field">
                                                        <input type="submit" class="submit_button" value="Sign Up">
                                                    </div>
                                                </div>
                                                <div class="form_right">
                                                    <div
                                                        class="popup_form_field password_field iconed_field icon-lock">
                                                        <input type="password" id="registration_pwd_1"
                                                            name="password" value="" placeholder="Password">
                                                    </div>
                                                    <div
                                                        class="popup_form_field password_field iconed_field icon-lock">
                                                        <input type="password" id="registration_pwd2_1"
                                                            name="password_confirmation" value=""
                                                            placeholder="Confirm Password">
                                                    </div>
                                                    <div class="popup_form_field description_field">Minimum 6
                                                        characters</div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Register -->
                            @else
                                <div class="login">
                                    <a href="javascript:void(0);" class="popup_link popup_login_link icon-user"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        title="">Logout</a>
                                </div>
                            @endif
                        </div>
                        <!-- /Top panel -->
                        <!-- Middle panel -->
                        <div class="panel_middle">
                            <div class="contact_field contact_address">
                                <span class="contact_icon icon-home"></span>
                                <span class="contact_label contact_address_1">132/2 Cozy6,</span>
                                <span class="contact_address_2">
                                    Ladprao, Bangkok 10230</span>
                            </div>
                            <div class="contact_field contact_phone">
                                <span class="contact_icon icon-phone"></span>
                                <span class="contact_label contact_phone">+66902998211</span>
                                <span class="contact_email">Info@buffbridge.com</span>
                            </div>
                            <div class="top_panel_top_open_hours icon-clock">
                                <span>Open hours: </span>Tue - Sat 13.00-18.30
                            </div>
                        </div>
                        <!-- /Middle panel -->
                        <!-- Bottom panel -->
                        <div class="panel_bottom">
                            <div class="contact_socials">
                                <div
                                    class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_tiny">
                                    <div class="sc_socials_item">
                                        <a href="https://www.facebook.com/share/1ABFfSy5QZ/?mibextid=wwXIfr"
                                            target="_blank" class="social_icons social_facebook">
                                            <span class="icon-facebook"></span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /Bottom panel -->
                    </div>
                    <!-- /Side wrap -->
                    <div class="mask"></div>
                </div>
                <!-- /Header Mobile -->
