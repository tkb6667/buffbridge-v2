@php

    $customerId = \Auth::guard('customer')->id();

    $cartCount = $customerId

        ? (int) \App\Models\CartItem::where('customer_id', $customerId)

            ->sum('quantity')

        : 0;

    $categoriesMenu = \App\Models\Category::menuTree();

    $isHome = request()->routeIs('home');

    $isBuffbridgeCustom =

        request()->routeIs('products.index') &&

        (string) request('category') === '85';

    $isProducts =

        request()->routeIs('products.*') &&

        !$isBuffbridgeCustom;

    $isBlog = request()->routeIs('posts.*');

    $isContact = request()->routeIs('contact');
$isAppointment = request()->is('book-appointment');

@endphp

<header class="bb-header">

    <div class="bb-header-container">

        <a href="{{ route('home') }}" class="bb-brand">

            <img

                src="{{ asset('BUFF_LOGO.png') }}"

                alt="Buffbridge Custom Crew"

                class="bb-brand-logo"

            >

            <div class="bb-brand-copy">

                <div class="bb-brand-name">BUFFBRIDGE</div>

                <div class="bb-brand-sub">CUSTOM</div>

                <div class="bb-brand-jp">エアガンの収集家です。</div>

            </div>

        </a>

        <nav class="bb-desktop-nav">

            <a

                href="{{ route('home') }}"

                class="bb-nav-link {{ $isHome ? 'is-active' : '' }}"

            >

                HOME

            </a>

            <a

                href="{{ route('posts.index') }}"

                class="bb-nav-link {{ $isBlog ? 'is-active' : '' }}"

            >

                BLOG

            </a>

            <div class="bb-nav-dropdown">

                <a

                    href="{{ route('products.index') }}"

                    class="bb-nav-link bb-products-link {{ $isProducts ? 'is-active' : '' }}"

                >

                    PRODUCTS

                    <svg viewBox="0 0 24 24" class="bb-chevron">

                        <path d="m6 9 6 6 6-6"/>

                    </svg>

                </a>

                <div class="bb-dropdown-menu">

                    <div class="bb-dropdown-inner">

                        <a

                            href="{{ route('products.index') }}"

                            class="bb-dropdown-all"

                        >

                            <span>ALL PRODUCTS</span>

                            <span>→</span>

                        </a>

                        @foreach ($categoriesMenu->where('active', 1) as $category)

                            @php

                                $activeChildren = $category->children->where('active', 1);

                            @endphp

                            <div class="bb-category">

                                <a

                                    href="{{ route('products.index', ['category' => $category->id]) }}"

                                    class="bb-category-title"

                                >

                                    <span>{{ $category->name }}</span>

                                    @if ($activeChildren->isNotEmpty())

                                        <span class="bb-category-arrow">›</span>

                                    @endif

                                </a>

                                @if ($activeChildren->isNotEmpty())

                                    <div class="bb-subcategory">

                                        @foreach ($activeChildren as $subCategory)

                                            <a href="{{ route('products.index', ['category' => $subCategory->id]) }}">

                                                {{ $subCategory->name }}

                                            </a>

                                        @endforeach

                                    </div>

                                @endif

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

            <a

                href="{{ route('products.index', ['category' => 85]) }}"

                class="bb-nav-link {{ $isBuffbridgeCustom ? 'is-active' : '' }}"

            >

                BUFFBRIDGE CUSTOM

            </a>

            <a
    href="{{ url('/book-appointment') }}"
    class="bb-nav-link {{ $isAppointment ? 'is-active' : '' }}"
>
    BOOK AN APPOINTMENT
</a>

            <a

                href="{{ route('contact') }}"

                class="bb-nav-link {{ $isContact ? 'is-active' : '' }}"

            >

                CONTACT US

            </a>

        </nav>

        <div class="bb-header-actions">

            <button

                type="button"

                class="bb-icon-btn bb-search-button"

                id="bbSearchButton"

                aria-label="Search"

            >

                <svg viewBox="0 0 24 24">

                    <circle cx="11" cy="11" r="7"></circle>

                    <path d="m20 20-4-4"></path>

                </svg>

            </button>

            <div class="bb-account-wrap">

                <button

                    type="button"

                    class="bb-icon-btn bb-account-button"

                    id="bbAccountButton"

                    aria-label="Account"

                >

                    <svg viewBox="0 0 24 24">

                        <circle cx="12" cy="8" r="4"></circle>

                        <path d="M4 21c0-4.4 3.6-8 8-8s8 3.6 8 8"></path>

                    </svg>

                </button>

                <div

                    class="bb-account-dropdown"

                    id="bbAccountDropdown"

                >

                    @guest('customer')

                        <button

                            type="button"

                            class="bb-account-item"

                            data-bb-modal="login"

                        >

                            LOGIN

                        </button>

                        <button

                            type="button"

                            class="bb-account-item"

                            data-bb-modal="register"

                        >

                            REGISTER

                        </button>

                    @else

                        <div class="bb-account-email">

                            {{ auth('customer')->user()->email }}

                        </div>

                        <a

                            href="{{ route('profile.edit') }}"

                            class="bb-account-item"

                        >

                            PROFILE

                        </a>

                        <a

                            href="{{ route('cart.index') }}"

                            class="bb-account-item"

                        >

                            MY CART

                        </a>

                        <a

                            href="{{ route('order.history') }}"

                            class="bb-account-item"

                        >

                            ORDER HISTORY

                        </a>

                        <form

                            action="{{ route('logout2') }}"

                            method="POST"

                        >

                            @csrf

                            <button

                                type="submit"

                                class="bb-account-item bb-logout"

                            >

                                LOGOUT

                            </button>

                        </form>

                    @endguest

                </div>

            </div>

            <a

                href="{{ route('cart.index') }}"

                class="bb-header-cart"

                aria-label="Cart"

            >

                <svg viewBox="0 0 24 24">

                    <path d="M3 3h2l2.4 11.2a2 2 0 0 0 2 1.6h7.9a2 2 0 0 0 2-1.6L21 7H6"></path>

                    <circle cx="10" cy="20" r="1"></circle>

                    <circle cx="18" cy="20" r="1"></circle>

                </svg>

                @if ($cartCount > 0)

                    <span class="bb-cart-count">

                        {{ $cartCount > 99 ? '99+' : $cartCount }}

                    </span>

                @endif

            </a>

            <button

                type="button"

                class="bb-mobile-toggle"

                id="bbMobileToggle"

                aria-label="Menu"

                aria-expanded="false"

            >

                <span></span>

                <span></span>

                <span></span>

            </button>

        </div>

    </div>

<div class="bb-search-panel" id="bbSearchPanel">

    <div class="bb-search-container">

        <div

            class="bb-search-live"

            data-bbls

            data-endpoint="{{ route('products.live-search') }}"

            data-products-url="{{ route('products.index') }}"

        >

            <div class="bbls-field">

                <span class="bbls-icon">

                    <svg viewBox="0 0 24 24" aria-hidden="true">

                        <circle cx="11" cy="11" r="7"></circle>

                        <path d="m20 20-4-4"></path>

                    </svg>

                </span>

                <input

                    type="search"

                    class="bbls-input"

                    data-bbls-input

                    id="bbSearchInput"

                    value="{{ request('search') }}"

                    placeholder="Search products, brands, gear..."

                    autocomplete="off"

                    aria-label="Search products"

                >

            </div>

            <div class="bbls-panel" data-bbls-panel>

                <div class="bbls-head">

                    <strong>SUGGESTIONS</strong>

                    <span data-bbls-count></span>

                </div>

                <div class="bbls-list" data-bbls-list></div>

                <div class="bbls-footer">
                    <a

                        href="{{ route('products.index') }}"

                        class="bbls-all"

                        data-bbls-all

                    >

                        VIEW ALL RESULTS →

                    </a>

                </div>

            </div>

        </div>

        <button

            type="button"

            class="bb-search-close"

            id="bbSearchClose"

            aria-label="Close search"

        >

            ×

        </button>

    </div>

</div>

    <div

        class="bb-mobile-menu"

        id="bbMobileMenu"

    >

        <div class="bb-mobile-menu-inner">

            <div

                class="bb-mobile-search-live"

                data-bbls

                data-endpoint="{{ route('products.live-search') }}"

                data-products-url="{{ route('products.index') }}"

            >

                <div class="bbls-field">

                    <span class="bbls-icon">

                        <svg viewBox="0 0 24 24" aria-hidden="true">

                            <circle cx="11" cy="11" r="7"></circle>

                            <path d="m20 20-4-4"></path>

                        </svg>

                    </span>

                    <input

                        type="search"

                        class="bbls-input"

                        data-bbls-input

                        value="{{ request('search') }}"

                        placeholder="Search products..."

                        autocomplete="off"

                        aria-label="Search products"

                    >

                </div>

                <div class="bbls-panel" data-bbls-panel aria-hidden="true">

                    <div class="bbls-head">

                        <strong>SUGGESTIONS</strong>

                        <span data-bbls-count></span>

                    </div>

                    <div class="bbls-list" data-bbls-list></div>

                    <div class="bbls-footer">

                        <a

                            href="{{ route('products.index') }}"

                            class="bbls-all"

                            data-bbls-all

                        >

                            VIEW ALL RESULTS →

                        </a>

                    </div>

                </div>

            </div>

            <a

                href="{{ route('home') }}"

                class="bb-mobile-link {{ $isHome ? 'is-active' : '' }}"

            >

                HOME

            </a>

            <a

                href="{{ route('posts.index') }}"

                class="bb-mobile-link {{ $isBlog ? 'is-active' : '' }}"

            >

                BLOG

            </a>

            <div class="bb-mobile-products">

                <button

                    type="button"

                    class="bb-mobile-link bb-mobile-product-toggle {{ $isProducts ? 'is-active' : '' }}"

                    id="bbMobileProductToggle"

                    aria-expanded="false"

                >

                    <span>PRODUCTS</span>

                    <span class="bb-mobile-arrow">+</span>

                </button>

                <div

                    class="bb-mobile-categories"

                    id="bbMobileCategories"

                >

                    <a

                        href="{{ route('products.index') }}"

                        class="bb-mobile-category-all"

                    >

                        ALL PRODUCTS

                    </a>

                    @foreach ($categoriesMenu->where('active', 1) as $category)

                        @php

                            $activeChildren = $category->children->where('active', 1);

                            $hasChildren = $activeChildren->isNotEmpty();

                        @endphp

                        <div class="bb-mobile-category-group">

                            <div class="bb-mobile-category-row">

                                <a

                                    href="{{ route('products.index', ['category' => $category->id]) }}"

                                    class="bb-mobile-category"

                                >

                                    {{ $category->name }}

                                </a>

                                @if ($hasChildren)

                                    <button

                                        type="button"

                                        class="bb-mobile-category-toggle"

                                        aria-label="Toggle {{ $category->name }}"

                                        aria-expanded="false"

                                    >

                                        <span>+</span>

                                    </button>

                                @endif

                            </div>

                            @if ($hasChildren)

                                <div class="bb-mobile-subcategories">

                                    @foreach ($activeChildren as $subCategory)

                                        <a

                                            href="{{ route('products.index', ['category' => $subCategory->id]) }}"

                                            class="bb-mobile-subcategory"

                                        >

                                            {{ $subCategory->name }}

                                        </a>

                                    @endforeach

                                </div>

                            @endif

                        </div>

                    @endforeach

                </div>

            </div>

            <a

                href="{{ route('products.index', ['category' => 85]) }}"

                class="bb-mobile-link {{ $isBuffbridgeCustom ? 'is-active' : '' }}"

            >

                BUFFBRIDGE CUSTOM

            </a>

            <a
        href="{{ url('/book-appointment') }}"
        class="bb-mobile-link {{ $isAppointment ? 'is-active' : '' }}"
            >
                BOOK AN APPOINTMENT
            </a>

            <a

                href="{{ route('contact') }}"

                class="bb-mobile-link {{ $isContact ? 'is-active' : '' }}"

            >

                CONTACT US

            </a>

            <div class="bb-mobile-account">

                @guest('customer')

                    <button

                        type="button"

                        class="bb-mobile-account-btn"

                        data-bb-modal="login"

                    >

                        LOGIN

                    </button>

                    <button

                        type="button"

                        class="bb-mobile-account-btn yellow"

                        data-bb-modal="register"

                    >

                        REGISTER

                    </button>

                @else

                    <div class="bb-mobile-user">

                        {{ auth('customer')->user()->email }}

                    </div>

                    <a href="{{ route('profile.edit') }}">

                        PROFILE

                    </a>

                    <a href="{{ route('cart.index') }}">

                        MY CART

                    </a>

                    <a href="{{ route('order.history') }}">

                        ORDER HISTORY

                    </a>

                    <form

                        action="{{ route('logout2') }}"

                        method="POST"

                    >

                        @csrf

                        <button type="submit">

                            LOGOUT

                        </button>

                    </form>

                @endguest

            </div>

        </div>

    </div>

</header>

@guest('customer')

<div class="bb-modal" id="bbLoginModal">

    <div class="bb-modal-backdrop"></div>

    <div class="bb-modal-box{{ (session('status') || $errors->getBag('login')->any()) ? ' has-feedback' : '' }}">

        <button

            type="button"

            class="bb-modal-close"

            aria-label="Close"

        >

            ×

        </button>

        <div class="bb-modal-brand">

            BUFFBRIDGE

        </div>

        <h2>LOGIN</h2>

        <p class="bb-modal-description">

            Login to your Buffbridge account

        </p>

        @if (session('status'))

            <div class="bb-modal-status" role="status" aria-live="polite">

                {{ session('status') }}

            </div>

        @endif

        @if ($errors->getBag('login')->any())

            <div class="bb-modal-errors" role="alert" aria-live="polite">

                <strong>LOGIN FAILED</strong>

                <ul>

                    @foreach ($errors->getBag('login')->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form

            action="{{ route('customer.login.submit') }}"

            method="POST"

        >

            @csrf

            <label>EMAIL</label>

            <input

                type="email"

                name="email"

                value="{{ old('email') }}"

                placeholder="Email address"

                autocomplete="email"

                required

            >

            <label>PASSWORD</label>

            <div class="bb-password-field">

                <input

                    type="password"

                    name="password"

                    placeholder="Password"

                    autocomplete="current-password"

                    required

                >

                <button type="button" class="bb-password-toggle" aria-label="Show password" aria-pressed="false">

                    <span class="icon-eye" aria-hidden="true"></span>

                </button>

            </div>

            <div class="bb-login-options">

                <label class="bb-remember">

                    <input

                        type="checkbox"

                        name="rememberme"

                        value="forever"

                        checked

                    >

                    <span>Remember me</span>

                </label>

                <a href="{{ route('password.request') }}" class="bb-forgot-password">

                    Forgot password?

                </a>

            </div>

            <button

                type="submit"

                class="bb-submit"

            >

                LOGIN

            </button>

        </form>

        <div class="bb-or">

            <span>OR</span>

        </div>

        <a

            href="{{ route('google.login') }}"

            class="bb-google"

        >

            <img

                src="https://developers.google.com/identity/images/g-logo.png"

                alt="Google"

            >

            CONTINUE WITH GOOGLE

        </a>

        <button

            type="button"

            class="bb-switch-modal"

            data-bb-modal="register"

        >

            Don't have an account?

            <strong>REGISTER</strong>

        </button>

    </div>

</div>

<div class="bb-modal" id="bbRegisterModal">

    <div class="bb-modal-backdrop"></div>

    <div class="bb-modal-box{{ $errors->getBag('register')->any() ? ' has-feedback' : '' }}">

        <button

            type="button"

            class="bb-modal-close"

            aria-label="Close"

        >

            ×

        </button>

        <div class="bb-modal-brand">

            BUFFBRIDGE

        </div>

        <h2>REGISTER</h2>

        <p class="bb-modal-description">

            Create your Buffbridge account

        </p>

        @if ($errors->getBag('register')->any())

            <div class="bb-modal-errors" role="alert" aria-live="polite">

                <strong>REGISTRATION FAILED</strong>

                <ul>

                    @foreach ($errors->getBag('register')->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form

            action="{{ route('register') }}"

            method="POST"

        >

            @csrf

            <div class="bb-register-grid">

                <div>

                    <label>USER NAME (LOGIN)</label>

                    <input

                        type="text"

                        name="name"

                        value="{{ old('name') }}"

                        placeholder="User name"

                        autocomplete="username"

                        required

                    >

                    <label>E-MAIL</label>

                    <input

                        type="email"

                        name="email"

                        value="{{ old('email') }}"

                        placeholder="Email address"

                        autocomplete="email"

                        required

                    >

                </div>

                <div>

                    <label>PASSWORD</label>

                    <div class="bb-password-field">

                        <input

                            type="password"

                            name="password"

                            placeholder="Password"

                            minlength="8"

                            autocomplete="new-password"

                            required

                        >

                        <button type="button" class="bb-password-toggle" aria-label="Show password" aria-pressed="false">

                            <span class="icon-eye" aria-hidden="true"></span>

                        </button>

                    </div>

                    <label>CONFIRM PASSWORD</label>

                    <div class="bb-password-field">

                        <input

                            type="password"

                            name="password_confirmation"

                            placeholder="Confirm password"

                            minlength="8"

                            autocomplete="new-password"

                            required

                        >

                        <button type="button" class="bb-password-toggle" aria-label="Show password" aria-pressed="false">

                            <span class="icon-eye" aria-hidden="true"></span>

                        </button>

                    </div>

                </div>

            </div>

            <div class="bb-register-meta">

                <label class="bb-remember">

                    <input

                        type="checkbox"

                        name="registration_agree"

                        value="1"

                        required

                    >

                    <span>

                        I agree with

                        <a href="{{ route('term') }}">

                            Terms & Conditions

                        </a>

                    </span>

                </label>

                <span class="bb-password-note">Minimum 8 characters</span>

            </div>

            <button

                type="submit"

                class="bb-submit"

            >

                SIGN UP

            </button>

        </form>

        <button

            type="button"

            class="bb-switch-modal"

            data-bb-modal="login"

        >

            Already have an account?

            <strong>LOGIN</strong>

        </button>

    </div>

</div>

@endguest

<style>

.bb-header,

.bb-header *,

.bb-modal,

.bb-modal * {

    box-sizing:border-box;

}

.bb-header {

    --yellow:#ffd429;

    --orange:#f5a000;

    --black:#080808;

    position:sticky;

    top:0;

    z-index:9990;

    width:100%;

    background:var(--black);

    color:#fff;

    font-family:Arial,Helvetica,sans-serif;

}

.bb-header-container {

    width:100%;

    height:96px;

    padding:0 clamp(56px,4.8vw,96px);

    display:flex;

    align-items:center;

    gap:clamp(28px,2.6vw,52px);

}

.bb-brand {

    flex:none;

    display:flex;

    align-items:center;

    gap:13px;

    color:#fff!important;

    text-decoration:none!important;

}

.bb-brand-logo {

    width:64px;

    height:64px;

    object-fit:contain;

}

.bb-brand-copy {

    line-height:1;

    white-space:nowrap;

}

.bb-brand-name {

    font-size:20px;

    font-weight:900;

}

.bb-brand-sub {

    margin-top:4px;

    font-size:12px;

    font-weight:700;

    letter-spacing:1.35px;

}

.bb-brand-jp {

    margin-top:6px;

    color:#aaa;

    font-size:8px;

    letter-spacing:.6px;

}

.bb-desktop-nav {

    flex:1;

    height:96px;

    display:flex;

    align-items:stretch;

    justify-content:center;

    gap:clamp(26px,2.15vw,44px);

}

.bb-nav-link {

    position:relative;

    height:96px;

    display:flex;

    align-items:center;

    padding:0;

    color:#fff!important;

    font-family:Arial,Helvetica,sans-serif!important;

    font-size:clamp(10px,.7vw,12px);

    font-weight:800!important;

    font-style:normal!important;

    letter-spacing:.5px;

    line-height:1!important;

    text-transform:uppercase;

    text-decoration:none!important;

    white-space:nowrap;

    transition:.2s;

}

.bb-nav-link:hover,

.bb-nav-link.is-active {

    color:var(--yellow)!important;

}

.bb-nav-link::after {

    content:"";

    position:absolute;

    left:0;

    right:100%;

    bottom:20px;

    height:2px;

    background:var(--yellow);

    transition:.2s;

}

.bb-nav-link:hover::after,

.bb-nav-link.is-active::after {

    right:0;

}

.bb-nav-dropdown {

    position:relative;

    display:flex;

}

.bb-products-link {

    gap:5px;

}

.bb-chevron {

    width:11px;

    height:11px;

    fill:none;

    stroke:currentColor;

    stroke-width:2;

    transition:.2s;

}

.bb-nav-dropdown:hover .bb-chevron {

    transform:rotate(180deg);

}

.bb-dropdown-menu {

    position:absolute;

    z-index:100;

    top:calc(100% - 1px);

    left:50%;

    width:290px;

    background:#111;

    border-top:3px solid var(--yellow);

    box-shadow:0 16px 40px rgba(0,0,0,.4);

    opacity:0;

    visibility:hidden;

    pointer-events:none;

    transform:translate(-50%,8px);

    transition:.18s;

}

.bb-nav-dropdown:hover .bb-dropdown-menu {

    opacity:1;

    visibility:visible;

    pointer-events:auto;

    transform:translate(-50%,0);

}

.bb-dropdown-inner {

    padding:8px 0;

}

.bb-dropdown-all,

.bb-category-title,

.bb-subcategory a {

    font-family:Arial,Helvetica,sans-serif!important;

    font-style:normal!important;

    letter-spacing:.45px!important;

    line-height:1.25!important;

    text-transform:uppercase;

    text-decoration:none!important;

}

.bb-dropdown-all {

    min-height:46px;

    padding:0 17px;

    display:flex;

    align-items:center;

    justify-content:space-between;

    color:var(--yellow)!important;

    font-size:10px!important;

    font-weight:800!important;

}

.bb-dropdown-all:hover {

    background:rgba(255,255,255,.04);

}

.bb-category {

    position:relative;

}

.bb-category-title {

    min-height:46px;

    padding:0 17px;

    display:flex;

    align-items:center;

    justify-content:space-between;

    border-top:1px solid rgba(255,255,255,.06);

    color:#fff!important;

    font-size:10px!important;

    font-weight:800!important;

}

.bb-category-title:hover {

    background:rgba(255,255,255,.04);

    color:var(--yellow)!important;

}

.bb-category-arrow {

    margin-left:15px;

    color:var(--yellow);

    font-size:17px;

}

.bb-subcategory {

    position:absolute;

    top:0;

    left:100%;

    width:235px;

    padding:7px 0;

    background:#151515;

    border-left:1px solid rgba(255,255,255,.06);

    box-shadow:10px 12px 28px rgba(0,0,0,.25);

    opacity:0;

    visibility:hidden;

    pointer-events:none;

}

.bb-category:hover .bb-subcategory {

    opacity:1;

    visibility:visible;

    pointer-events:auto;

}

.bb-subcategory a {

    min-height:40px;

    padding:0 16px;

    display:flex;

    align-items:center;

    color:#ccc!important;

    font-size:10px!important;

    font-weight:800!important;

}

.bb-subcategory a:hover {

    background:rgba(255,255,255,.05);

    color:var(--yellow)!important;

}

.bb-header-actions {

    flex:none;

    display:flex;

    align-items:center;

    gap:4px;

}

.bb-icon-btn,

.bb-header-cart,

.bb-mobile-toggle {

    position:relative;

    width:44px;

    height:46px;

    display:flex;

    align-items:center;

    justify-content:center;

    padding:0;

    margin:0;

    border:0;

    border-radius:0;

    background:transparent;

    color:#fff!important;

    text-decoration:none!important;

    cursor:pointer;

}

.bb-search-button,

.bb-account-button {

    background:var(--orange);

}

.bb-icon-btn:hover,

.bb-header-cart:hover {

    background:var(--yellow);

    color:#111!important;

}

.bb-icon-btn svg,

.bb-header-cart svg {

    width:19px;

    height:19px;

    fill:none;

    stroke:currentColor;

    stroke-width:1.8;

    stroke-linecap:round;

    stroke-linejoin:round;

}

.bb-cart-count {

    position:absolute;

    top:-3px;

    right:-4px;

    min-width:17px;

    height:17px;

    padding:0 4px;

    display:flex;

    align-items:center;

    justify-content:center;

    border-radius:20px;

    background:var(--yellow);

    color:#000;

    font-size:8px;

    font-weight:900;

}

.bb-header-cart.bb-cart-bump {

    animation:bb-cart-bump .42s ease;

}

@keyframes bb-cart-bump {

    0%,100% { transform:scale(1) }

    45% { transform:scale(1.12) }

}

[data-bb-cart-add].bb-add-to-cart-ui,
[data-bb-cart-form] .bb-add-to-cart-ui {

    width:auto!important;

    min-width:95px!important;

    height:34px!important;

    min-height:34px!important;

    margin:0!important;

    padding:0 13px!important;

    display:inline-flex!important;

    flex:0 0 auto;

    align-items:center!important;

    justify-content:center!important;

    border:0!important;

    border-radius:0!important;

    background:#111!important;

    color:#fff!important;

    font:900 8px/1 Arial,Helvetica,sans-serif!important;

    letter-spacing:.6px!important;

    text-align:center!important;

    text-transform:uppercase!important;

    white-space:nowrap;

    cursor:pointer!important;

}

[data-bb-cart-add].bb-add-to-cart-ui:hover,
[data-bb-cart-form] .bb-add-to-cart-ui:hover {

    background:var(--yellow)!important;

    color:#111!important;

}

[data-bb-cart-add].bb-add-to-cart-ui:disabled,
[data-bb-cart-form] .bb-add-to-cart-ui:disabled {

    opacity:.78!important;

    cursor:wait!important;

}

[data-bb-cart-form] .bb-add-to-cart-ui {

    width:100%!important;

}

.bb-cart-toast {

    position:fixed;

    z-index:100002;

    top:92px;

    right:20px;

    width:min(340px,calc(100vw - 24px));

    padding:16px 18px;

    border-left:3px solid var(--yellow);

    background:#111;

    color:#fff;

    box-shadow:0 14px 38px rgba(0,0,0,.28);

    opacity:0;

    transform:translateY(-8px);

    visibility:hidden;

    transition:opacity .18s ease,transform .18s ease,visibility .18s ease;

}

.bb-cart-toast.is-visible {

    opacity:1;

    transform:translateY(0);

    visibility:visible;

}

.bb-cart-toast.is-error { border-left-color:#e04b42 }

.bb-cart-toast-title {

    color:var(--yellow);

    font-size:10px;

    font-weight:900;

    letter-spacing:1px;

    text-transform:uppercase;

}

.bb-cart-toast.is-error .bb-cart-toast-title { color:#ff756d }

.bb-cart-toast-product {

    margin-top:6px;

    overflow:hidden;

    color:#ccc;

    font-size:11px;

    line-height:1.45;

    text-overflow:ellipsis;

    white-space:nowrap;

}

.bb-cart-toast-link {

    margin-top:11px;

    display:inline-block;

    color:#fff!important;

    font-size:9px;

    font-weight:900;

    letter-spacing:.8px;

    text-decoration:none!important;

}

.bb-cart-toast-link:hover { color:var(--yellow)!important }

.bb-account-wrap {

    position:relative;

}

.bb-account-dropdown {

    position:absolute;

    z-index:200;

    top:calc(100% + 12px);

    right:0;

    width:210px;

    padding:7px;

    background:#111;

    border-top:3px solid var(--yellow);

    box-shadow:0 15px 40px rgba(0,0,0,.35);

    opacity:0;

    visibility:hidden;

    transform:translateY(7px);

    transition:.18s;

}

.bb-account-dropdown.is-open {

    opacity:1;

    visibility:visible;

    transform:none;

}

.bb-account-email {

    padding:10px;

    overflow:hidden;

    color:#999;

    font-size:10px;

    text-overflow:ellipsis;

    white-space:nowrap;

}

.bb-account-item {

    display:block;

    width:100%;

    padding:11px 10px;

    border:0;

    background:transparent;

    color:#fff!important;

    text-align:left;

    text-decoration:none!important;

    font-family:Arial,Helvetica,sans-serif!important;

    font-size:10px;

    font-weight:800;

    cursor:pointer;

}

.bb-account-item:hover {

    background:rgba(255,255,255,.05);

    color:var(--yellow)!important;

}

.bb-logout {

    border-top:1px solid rgba(255,255,255,.08);

}

.bb-search-panel {

    position:absolute;

    z-index:150;

    top:100%;

    left:0;

    width:100%;

    background:#111;

    border-bottom:3px solid var(--yellow);

    opacity:0;

    visibility:hidden;

    transform:translateY(-7px);

    transition:.18s;

}

.bb-search-panel.is-open {

    opacity:1;

    visibility:visible;

    transform:none;

}

.bb-search-container {

    width:100%;

    padding:18px clamp(56px,4.8vw,96px);

    display:flex;

    align-items:center;

    gap:12px;

}

.bb-search-form {

    flex:1;

    height:48px;

    display:flex;

    align-items:center;

    background:#fff;

}

.bb-search-form svg {

    width:18px;

    height:18px;

    margin-left:17px;

    fill:none;

    stroke:#111;

    stroke-width:2;

}

.bb-search-form input {

    flex:1;

    min-width:0;

    height:48px;

    margin:0!important;

    padding:0 15px!important;

    border:0!important;

    outline:0!important;

    background:transparent!important;

    color:#111!important;

    font-size:13px!important;

    box-shadow:none!important;

}

.bb-search-form button {

    align-self:stretch;

    min-width:115px;

    border:0;

    background:var(--yellow);

    color:#111;

    font-size:10px;

    font-weight:900;

    cursor:pointer;

}

.bb-search-close {

    width:40px;

    height:40px;

    border:0;

    background:transparent;

    color:#fff;

    font-size:28px;

    cursor:pointer;

}

.bb-mobile-toggle {

    display:none;

    flex-direction:column;

    gap:4px;

}

.bb-mobile-toggle span {

    display:block;

    width:21px;

    height:2px;

    background:#fff;

    transition:.2s;

}

.bb-mobile-toggle.is-open span:nth-child(1) {

    transform:translateY(6px) rotate(45deg);

}

.bb-mobile-toggle.is-open span:nth-child(2) {

    opacity:0;

}

.bb-mobile-toggle.is-open span:nth-child(3) {

    transform:translateY(-6px) rotate(-45deg);

}

.bb-mobile-menu {

    display:none;

    max-height:0;

    overflow:hidden;

    background:#0d0d0d;

    border-top:1px solid rgba(255,255,255,.08);

    transition:max-height .3s;

}

.bb-mobile-menu.is-open {

    max-height:calc(100dvh - 72px);

    overflow-y:auto;

    overscroll-behavior:contain;

}

.bb-mobile-menu-inner {

    padding:16px 20px 28px;

}

.bb-mobile-search {

    position:relative;

    width:100%;

    height:48px;

    margin-bottom:14px;

    background:#fff;

    border:1px solid #2a2a2a;

}

.bb-mobile-search input {

    width:100%;

    height:46px;

    margin:0!important;

    padding:0 52px 0 15px!important;

    border:0!important;

    outline:0!important;

    background:#fff!important;

    color:#111!important;

    font-family:Arial,Helvetica,sans-serif!important;

    font-size:13px!important;

    box-shadow:none!important;

    -webkit-appearance:none;

}

.bb-mobile-search input::placeholder {

    color:#888;

    opacity:1;

}

.bb-mobile-search button {

    position:absolute;

    top:4px;

    right:4px;

    width:40px;

    height:40px;

    padding:0!important;

    display:flex;

    align-items:center;

    justify-content:center;

    border:0!important;

    background:var(--yellow)!important;

    color:#111!important;

    cursor:pointer;

}

.bb-mobile-search svg {

    width:17px;

    height:17px;

    fill:none;

    stroke:currentColor;

    stroke-width:2;

    stroke-linecap:round;

    stroke-linejoin:round;

}

.bb-mobile-link {

    width:100%;

    min-height:50px;

    padding:0 4px;

    display:flex;

    align-items:center;

    justify-content:space-between;

    border:0;

    border-bottom:1px solid rgba(255,255,255,.09);

    background:transparent;

    color:#fff!important;

    text-align:left;

    text-decoration:none!important;

    font-family:Arial,Helvetica,sans-serif!important;

    font-size:11px;

    font-weight:800;

    font-style:normal;

    letter-spacing:.45px;

    line-height:1.2;

    text-transform:uppercase;

    cursor:pointer;

}

.bb-mobile-link.is-active {

    color:var(--yellow)!important;

}

.bb-mobile-product-toggle {

    padding:0 12px;

}

.bb-mobile-product-toggle.is-open {

    background:var(--orange);

    color:#fff!important;

}

.bb-mobile-arrow {

    color:var(--yellow);

    font-size:19px;

    line-height:1;

    transition:.2s;

}

.bb-mobile-product-toggle.is-open .bb-mobile-arrow {

    color:#fff;

    transform:rotate(45deg);

}

.bb-mobile-categories {

    display:none;

    padding:4px 0 8px;

    background:#101010;

}

.bb-mobile-categories.is-open {

    display:block;

}

.bb-mobile-category-all {

    min-height:44px;

    padding:0 18px;

    display:flex;

    align-items:center;

    border-bottom:1px solid rgba(255,255,255,.06);

    color:var(--yellow)!important;

    text-decoration:none!important;

    font-size:10px!important;

    font-weight:800!important;

    letter-spacing:.45px;

    text-transform:uppercase;

}

.bb-mobile-category-group {

    border-bottom:1px solid rgba(255,255,255,.06);

}

.bb-mobile-category-row {

    min-height:44px;

    display:flex;

    align-items:stretch;

}

.bb-mobile-category {

    flex:1;

    min-width:0;

    padding:0 18px;

    display:flex;

    align-items:center;

    color:#fff!important;

    text-decoration:none!important;

    font-size:10px!important;

    font-weight:800!important;

    letter-spacing:.45px!important;

    line-height:1.25!important;

    text-transform:uppercase;

}

.bb-mobile-category-toggle {

    flex:0 0 46px;

    width:46px;

    min-width:46px;

    padding:0!important;

    display:flex;

    align-items:center;

    justify-content:center;

    border:0!important;

    border-left:1px solid rgba(255,255,255,.06)!important;

    background:transparent!important;

    color:var(--yellow)!important;

    cursor:pointer;

    box-shadow:none!important;

}

.bb-mobile-category-toggle span {

    display:block;

    font-size:18px;

    font-weight:400;

    line-height:1;

    transition:transform .2s;

}

.bb-mobile-category-group.is-open .bb-mobile-category-toggle span {

    transform:rotate(45deg);

}

.bb-mobile-subcategories {

    display:none;

    padding:3px 0 7px;

    background:#161616;

}

.bb-mobile-category-group.is-open .bb-mobile-subcategories {

    display:block;

}

.bb-mobile-subcategory {

    min-height:40px;

    padding:0 18px 0 34px;

    display:flex;

    align-items:center;

    color:#aaa!important;

    text-decoration:none!important;

    font-size:9px!important;

    font-weight:800!important;

    letter-spacing:.45px!important;

    line-height:1.25!important;

    text-transform:uppercase;

}

.bb-mobile-category-all:hover,

.bb-mobile-category:hover,

.bb-mobile-subcategory:hover {

    color:var(--yellow)!important;

}

.bb-mobile-category-toggle:hover {

    background:rgba(255,255,255,.04)!important;

}

.bb-mobile-account {

    display:flex;

    gap:8px;

    padding-top:18px;

}

.bb-mobile-account-btn {

    flex:1;

    min-height:43px;

    border:1px solid rgba(255,255,255,.25);

    background:transparent;

    color:#fff;

    font-size:10px;

    font-weight:800;

    cursor:pointer;

}

.bb-mobile-account-btn.yellow {

    border-color:var(--yellow);

    background:var(--yellow);

    color:#111;

}

.bb-mobile-user {

    width:100%;

    padding-bottom:10px;

    color:#888;

    font-size:10px;

}

.bb-mobile-account:has(.bb-mobile-user) {

    display:block;

}

.bb-mobile-account > a,

.bb-mobile-account > form button {

    display:block;

    width:100%;

    padding:11px 0;

    border:0;

    background:transparent;

    color:#fff!important;

    text-align:left;

    text-decoration:none!important;

    font-size:10px;

    font-weight:700;

    cursor:pointer;

}

.bb-modal {

    position:fixed;

    z-index:99999;

    inset:0;

    padding:20px;

    display:flex;

    align-items:center;

    justify-content:center;

    opacity:0;

    visibility:hidden;

    transition:.2s;

}

.bb-modal.is-open {

    opacity:1;

    visibility:visible;

}

.bb-modal-backdrop {

    position:absolute;

    inset:0;

    background:rgba(0,0,0,.73);

    backdrop-filter:blur(4px);

}

.bb-modal-box {

    position:relative;

    z-index:2;

    width:min(410px,100%);

    max-height:calc(100vh - 32px);

    max-height:calc(100dvh - 32px);

    overflow-y:auto;

    padding:32px 40px 0;

    border:1px solid #e5e5e5;

    border-radius:0;

    background:#fff;

    color:#111;

    box-shadow:0 24px 65px rgba(0,0,0,.32);

}

#bbRegisterModal .bb-modal-box {

    width:min(600px,100%);

}

.bb-modal-close {

    position:absolute;

    top:0;

    right:0;

    width:44px;

    height:44px;

    border:0;

    border-radius:0;

    background:#ffa51f;

    color:#fff;

    font-size:25px;

    cursor:pointer;

    transition:background .2s ease;

}

.bb-modal-close:hover {

    background:#ffbd58;

    color:#fff;

}

.bb-modal-brand {

    margin-bottom:10px;

    display:flex;

    align-items:center;

    gap:9px;

    color:#d7aa00;

    font-size:10px;

    font-weight:900;

    letter-spacing:2px;

    text-transform:uppercase;

}

.bb-modal-brand::before {

    content:"";

    width:24px;

    height:3px;

    flex:none;

    background:#d7aa00;

}

.bb-modal h2 {

    margin:0!important;

    color:#111!important;

    font-size:30px!important;

    font-weight:900!important;

    font-style:italic;

    line-height:1;

    text-transform:uppercase;

}

.bb-modal-description {

    margin:7px 0 18px!important;

    color:#999;

    font-size:11px;

}

.bb-modal-errors {

    margin:0 0 18px;

    padding:12px 14px;

    border:1px solid #f5a000;

    background:#171717;

    color:#fff;

    font-size:11px;

    line-height:1.5;

}

.bb-modal-errors strong {

    display:block;

    margin-bottom:5px;

    color:#ffd429;

    font-size:9px;

    letter-spacing:1.3px;

}

.bb-modal-errors ul {

    margin:0;

    padding-left:17px;

}

.bb-modal-status {

    margin:0 0 18px;

    padding:12px 14px;

    border:1px solid #ffd429;

    background:#171717;

    color:#fff;

    font-size:11px;

    line-height:1.5;

}

.bb-modal label:not(.bb-remember) {

    display:block;

    margin:12px 0 6px;

    color:#111;

    font-size:9px;

    font-weight:900;

    letter-spacing:1.7px;

    text-transform:uppercase;

}

.bb-modal input[type="email"],

.bb-modal input[type="text"],

.bb-modal input[type="password"] {

    width:100%!important;

    height:46px!important;

    margin:0!important;

    padding:0 15px!important;

    border:1px solid #dadada!important;

    border-radius:0!important;

    outline:0!important;

    background:#fff!important;

    color:#111!important;

    font-size:13px!important;

    box-shadow:none!important;

    transition:border-color .2s ease;

}

.bb-modal input[type="email"]::placeholder,

.bb-modal input[type="text"]::placeholder,

.bb-modal input[type="password"]::placeholder {

    color:#999;

    opacity:1;

}

.bb-modal input[type="email"]:focus,

.bb-modal input[type="text"]:focus,

.bb-modal input[type="password"]:focus {

    border-color:#ffa51f!important;

}

.bb-modal input:-webkit-autofill,

.bb-modal input:-webkit-autofill:hover,

.bb-modal input:-webkit-autofill:focus {

    -webkit-text-fill-color:#111!important;

    -webkit-box-shadow:0 0 0 1000px #fff inset!important;

}

.bb-password-field {

    position:relative;

}

.bb-password-field input[type="password"],

.bb-password-field input[type="text"] {

    padding-right:48px!important;

}

.bb-password-field input::-ms-reveal,

.bb-password-field input::-ms-clear {

    display:none;

}

.bb-password-field input[type="password"]::-webkit-textfield-decoration-container,

.bb-password-field input::-webkit-credentials-auto-fill-button {

    visibility:hidden;

    pointer-events:none;

}

.bb-modal .bb-password-toggle {

    position:absolute;

    top:50%;

    right:4px;

    width:40px;

    height:40px;

    min-width:0;

    margin:0;

    padding:0;

    display:flex;

    align-items:center;

    justify-content:center;

    border:0!important;

    border-radius:0!important;

    outline:0;

    background:transparent!important;

    color:#666!important;

    box-shadow:none!important;

    font-size:16px;

    line-height:1;

    cursor:pointer;

    transform:translateY(-50%);

    appearance:none;

    -webkit-appearance:none;

}

.bb-modal .bb-password-toggle:hover {

    background:transparent!important;

    color:#111!important;

}

.bb-modal .bb-password-toggle:focus-visible {

    outline:2px solid #999;

    outline-offset:-4px;

}

.bb-password-toggle .icon-eye::before {

    margin:0;

}

.bb-password-toggle.is-visible::after {

    content:"";

    position:absolute;

    width:19px;

    height:1.5px;

    background:currentColor;

    transform:rotate(-45deg);

}

.bb-login-options {

    margin:14px 0;

    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:12px;

    flex-wrap:wrap;

}

.bb-remember {

    margin:0;

    display:flex;

    align-items:center;

    gap:8px;

    color:#777;

    font-size:11px;

    cursor:pointer;

}

.bb-remember input[type="checkbox"] {

    display:inline-block!important;

    appearance:auto!important;

    -webkit-appearance:checkbox!important;

    width:14px!important;

    height:14px!important;

    min-width:14px!important;

    margin:0!important;

    padding:0!important;

    opacity:1!important;

    visibility:visible!important;

    accent-color:#f5a000;

    cursor:pointer;

}

.bb-remember a {

    color:#555!important;

    font-weight:700;

    transition:color .2s ease;

}

.bb-remember a:hover {

    color:#ffa51f!important;

}

.bb-forgot-password {

    color:#888!important;

    font-size:11px;

    text-decoration:none!important;

    transition:color .2s ease;

}

.bb-forgot-password:hover {

    color:#ffa51f!important;

}

.bb-register-grid {

    display:grid;

    grid-template-columns:repeat(2,minmax(0,1fr));

    gap:0 24px;

}

.bb-register-meta {

    margin:16px 0;

    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:12px;

    flex-wrap:wrap;

}

.bb-password-note {

    color:#999;

    font-size:10px;

}

.bb-submit {

    width:100%;

    height:47px;

    margin-top:4px;

    border:0;

    border-radius:0;

    background:#ffa51f;

    color:#fff;

    font-size:10px;

    font-weight:900;

    cursor:pointer;

    transition:background .2s ease;

}

.bb-submit:hover {

    background:#ffb84a;

}

.bb-or {

    position:relative;

    margin:20px 0;

    text-align:center;

}

.bb-or::before {

    content:"";

    position:absolute;

    top:50%;

    left:0;

    width:100%;

    height:1px;

    background:#e3e3e3;

}

.bb-or span {

    position:relative;

    padding:0 10px;

    background:#fff;

    color:#999;

    font-size:9px;

}

.bb-google {

    width:100%;

    min-height:46px;

    display:flex;

    align-items:center;

    justify-content:center;

    gap:9px;

    border:1px solid #dadada;

    border-radius:0;

    background:#fff;

    color:#111!important;

    text-decoration:none!important;

    font-size:10px;

    font-weight:800;

    transition:border-color .2s ease,color .2s ease;

}

.bb-google:hover {

    border-color:#dadada;

    background:#fafafa;

    color:#111!important;

}

.bb-google img {

    width:17px;

    height:17px;

}

.bb-switch-modal {

    display:block;

    width:calc(100% + 80px);

    height:50px;

    margin:24px -40px 0;

    border:0;

    border-radius:0;

    background:#ffa51f;

    color:#fff;

    font-size:11px;

    cursor:pointer;

    transition:background .2s ease;

}

.bb-switch-modal strong {

    color:#111;

    font-weight:900;

}

.bb-switch-modal:hover {

    background:#ffb84a;

}

@media (min-width:601px) and (min-height:740px) {

    .bb-modal-box:not(.has-feedback) {

        max-height:none;

        overflow-y:visible;

    }

}

@media (min-width:1025px) and (max-width:1366px) {

    .bb-header-container {

        height:88px;

        padding:0 32px;

        gap:22px;

    }

    .bb-brand-logo {

        width:57px;

        height:57px;

    }

    .bb-brand-name {

        font-size:17px;

    }

    .bb-brand-sub {

        font-size:10px;

    }

    .bb-desktop-nav,

    .bb-nav-link {

        height:88px;

    }

    .bb-desktop-nav {

        gap:clamp(17px,1.55vw,27px);

    }

    .bb-nav-link {

        font-size:9.5px;

    }

    .bb-nav-link::after {

        bottom:17px;

    }

}

@media (max-width:1024px) {

    .bb-header-container {

        height:78px;

        padding:0 20px;

        justify-content:space-between;

        gap:12px;

    }

    .bb-brand {

        min-width:0;

        margin-right:auto;

    }

    .bb-brand-logo {

        width:52px;

        height:52px;

    }

    .bb-brand-name {

        font-size:16px;

    }

    .bb-brand-sub {

        font-size:9px;

    }

    .bb-brand-jp {

        font-size:6px;

    }

    .bb-desktop-nav,

    .bb-search-button,

    .bb-search-panel {

        display:none;

    }

    .bb-header-actions {

        margin-left:auto;

    }

    .bb-mobile-toggle {

        display:flex;

        background:var(--orange);

    }

    .bb-mobile-menu {

        display:block;

    }

}

@media (max-width:600px) {

    .bb-header-container {

        height:72px;

        padding:0 16px;

        gap:8px;

    }

    .bb-brand {

        gap:8px;

    }

    .bb-brand-logo {

        width:46px;

        height:46px;

    }

    .bb-brand-name {

        font-size:14px;

    }

    .bb-brand-sub {

        margin-top:3px;

        font-size:8px;

    }

    .bb-brand-jp {

        margin-top:4px;

        font-size:6px;

    }

    .bb-account-wrap {

        display:none;

    }

    .bb-header-actions {

        margin-left:auto;

        gap:5px;

    }

    .bb-header-cart {

        width:38px;

        height:42px;

    }

    .bb-mobile-toggle {

        width:44px;

        height:44px;

    }

    .bb-mobile-menu-inner {

        padding:14px 16px 24px;

    }

    .bb-modal-box {

        padding:30px 26px 0;

    }

    .bb-switch-modal {

        width:calc(100% + 52px);

        margin-right:-26px;

        margin-left:-26px;

    }

}

@media (max-width:760px) {

    [data-bb-cart-add].bb-add-to-cart-ui,
    [data-bb-cart-form] .bb-add-to-cart-ui {

        min-width:0!important;

        height:30px!important;

        min-height:30px!important;

        padding:0 8px!important;

        font-size:6px!important;

    }

}

@media (max-width:480px) {

    [data-bb-cart-add].bb-add-to-cart-ui,
    [data-bb-cart-form] .bb-add-to-cart-ui {

        height:27px!important;

        min-height:27px!important;

        padding:0 6px!important;

        font-size:5.5px!important;

    }

}

@media (prefers-reduced-motion:reduce) {

    .bb-header-cart.bb-cart-bump { animation:none }

    .bb-cart-toast { transition:none }

}

@media (max-width:600px) {

    .bb-cart-toast {

        top:76px;

        right:12px;

        left:12px;

        width:auto;

    }

    .bb-modal {

        padding:12px;

    }

    .bb-modal-box {

        width:100%;

        max-height:calc(100vh - 24px);

        max-height:calc(100dvh - 24px);

        padding:24px 22px 0;

    }

    .bb-modal h2 {

        font-size:28px!important;

    }

    .bb-modal input[type="email"],

    .bb-modal input[type="text"],

    .bb-modal input[type="password"] {

        font-size:16px!important;

    }

    .bb-register-grid {

        grid-template-columns:1fr;

    }

    .bb-register-meta {

        align-items:flex-start;

        flex-direction:column;

    }

    .bb-switch-modal {

        width:calc(100% + 44px);

        margin-right:-22px;

        margin-left:-22px;

    }

}

@media (max-width:420px) {

    .bb-header-container {

        padding:0 12px;

        gap:6px;

    }

    .bb-brand-logo {

        width:43px;

        height:43px;

    }

    .bb-brand-name {

        font-size:13px;

    }

    .bb-brand-sub {

        font-size:7px;

    }

    .bb-brand-jp {

        font-size:5.5px;

    }

    .bb-header-cart {

        width:34px;

        height:40px;

    }

    .bb-mobile-toggle {

        width:42px;

        height:42px;

    }

}

@media (max-width:350px) {

    .bb-brand-copy {

        display:none;

    }

}

</style>

<script>

document.addEventListener('DOMContentLoaded', () => {

    const searchButton = document.getElementById('bbSearchButton');

    const searchPanel = document.getElementById('bbSearchPanel');

    const searchClose = document.getElementById('bbSearchClose');

    const searchInput = document.getElementById('bbSearchInput');

    const mobileToggle = document.getElementById('bbMobileToggle');

    const mobileMenu = document.getElementById('bbMobileMenu');

    const productToggle = document.getElementById('bbMobileProductToggle');

    const categories = document.getElementById('bbMobileCategories');

    const accountButton = document.getElementById('bbAccountButton');

    const accountDropdown = document.getElementById('bbAccountDropdown');

    const cartLink = document.querySelector('.bb-header-cart');

    let cartToastTimer;

    function setCartButtonState(button, text, disabled) {

        if (!button.dataset.bbCartOriginalHtml) {

            button.dataset.bbCartOriginalHtml = button.innerHTML;

            const rect = button.getBoundingClientRect();

            button.style.setProperty('width', rect.width + 'px', 'important');

            button.style.setProperty('height', rect.height + 'px', 'important');

        }

        button.disabled = disabled;

        button.dataset.bbCartBusy = disabled ? 'true' : 'false';

        button.textContent = text;

    }

    function restoreCartButton(button) {

        button.disabled = false;

        button.dataset.bbCartBusy = 'false';

        delete button.dataset.bbCartStatus;

        if (button.dataset.bbCartOriginalHtml) {

            button.innerHTML = button.dataset.bbCartOriginalHtml;

        }

        button.style.removeProperty('width');

        button.style.removeProperty('height');

    }

    function updateCartBadge(count) {

        if (!cartLink || !Number.isFinite(count)) return;

        let badge = cartLink.querySelector('.bb-cart-count');

        if (count > 0 && !badge) {

            badge = document.createElement('span');

            badge.className = 'bb-cart-count';

            cartLink.appendChild(badge);

        }

        if (badge) {

            if (count > 0) {

                badge.textContent = count > 99 ? '99+' : String(count);

            } else {

                badge.remove();

            }

        }

        cartLink.classList.remove('bb-cart-bump');

        void cartLink.offsetWidth;

        cartLink.classList.add('bb-cart-bump');

        window.setTimeout(() => cartLink.classList.remove('bb-cart-bump'), 450);

    }

    function showCartToast(type, title, productName, cartUrl) {

        let toast = document.querySelector('.bb-cart-toast');

        if (!toast) {

            toast = document.createElement('div');

            toast.className = 'bb-cart-toast';

            toast.setAttribute('role', 'status');

            toast.setAttribute('aria-live', 'polite');

            document.body.appendChild(toast);

        }

        toast.className = 'bb-cart-toast' + (type === 'error' ? ' is-error' : '');

        toast.replaceChildren();

        const titleElement = document.createElement('div');

        titleElement.className = 'bb-cart-toast-title';

        titleElement.textContent = title;

        toast.appendChild(titleElement);

        if (productName) {

            const productElement = document.createElement('div');

            productElement.className = 'bb-cart-toast-product';

            productElement.textContent = productName;

            toast.appendChild(productElement);

        }

        if (type === 'success' && cartUrl) {

            const link = document.createElement('a');

            link.className = 'bb-cart-toast-link';

            link.href = cartUrl;

            link.textContent = 'VIEW CART →';

            toast.appendChild(link);

        }

        window.clearTimeout(cartToastTimer);

        requestAnimationFrame(() => toast.classList.add('is-visible'));

        cartToastTimer = window.setTimeout(() => {

            toast.classList.remove('is-visible');

        }, 2800);

    }

    async function addToCart(button, url, body) {

        if (!button || !url || button.dataset.bbCartBusy === 'true') return;

        setCartButtonState(button, 'ADDING...', true);

        try {

            const response = await fetch(url, {

                method: 'POST',

                headers: {

                    'Accept': 'application/json',

                    'X-Requested-With': 'XMLHttpRequest',

                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}'

                },

                credentials: 'same-origin',

                body

            });

            let data = {};

            try {

                data = await response.json();

            } catch (error) {}

            if (response.status === 401) {

                restoreCartButton(button);

                showCartToast('error', 'Please log in to add items to your cart.');

                openModal('login');

                return;

            }

            if (!response.ok || !data.success) {

                const error = new Error('Cart request failed');

                error.userMessage = response.status === 422 && data.message

                    ? data.message

                    : 'Unable to add item to cart. Please try again.';

                throw error;

            }

            setCartButtonState(button, '✓ ADDED', true);

            updateCartBadge(Number(data.cart_count));

            showCartToast('success', '✓ Added to cart', data.product_name, data.cart_url);

            window.setTimeout(() => restoreCartButton(button), 1300);

        } catch (error) {

            restoreCartButton(button);

            showCartToast('error', error.userMessage || 'Unable to add item to cart. Please try again.');

        }

    }

    document.addEventListener('click', event => {

        const button = event.target.closest('[data-bb-cart-add]');

        if (!button) return;

        event.preventDefault();

        const body = new FormData();

        body.append('_token', document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}');

        addToCart(button, button.dataset.url, body);

    });

    document.addEventListener('submit', event => {

        const form = event.target.closest('[data-bb-cart-form]');

        if (!form) return;

        event.preventDefault();

        const button = event.submitter || form.querySelector('button[type="submit"]');

        addToCart(button, form.action, new FormData(form));

    });

    searchButton?.addEventListener('click', e => {

        e.stopPropagation();

        searchPanel?.classList.toggle('is-open');

        if (searchPanel?.classList.contains('is-open')) {

            setTimeout(() => searchInput?.focus(), 100);

        }

    });

    searchClose?.addEventListener('click', () => {

        searchPanel?.classList.remove('is-open');

    });

    accountButton?.addEventListener('click', e => {

        e.stopPropagation();

        accountDropdown?.classList.toggle('is-open');

    });

    mobileToggle?.addEventListener('click', () => {

        const isOpen = mobileMenu?.classList.toggle('is-open');

        mobileToggle.classList.toggle('is-open', isOpen);

        mobileToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');

    });

    productToggle?.addEventListener('click', () => {

        const isOpen = categories?.classList.toggle('is-open');

        productToggle.classList.toggle('is-open', isOpen);

        productToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');

    });

    document.querySelectorAll('.bb-mobile-category-toggle').forEach(toggle => {

        toggle.addEventListener('click', e => {

            e.preventDefault();

            e.stopPropagation();

            const group = toggle.closest('.bb-mobile-category-group');

            if (!group) return;

            const isOpening = !group.classList.contains('is-open');

            document

                .querySelectorAll('.bb-mobile-category-group.is-open')

                .forEach(openGroup => {

                    if (openGroup === group) return;

                    openGroup.classList.remove('is-open');

                    openGroup

                        .querySelector('.bb-mobile-category-toggle')

                        ?.setAttribute('aria-expanded', 'false');

                });

            group.classList.toggle('is-open', isOpening);

            toggle.setAttribute(

                'aria-expanded',

                isOpening ? 'true' : 'false'

            );

        });

    });

    function closeModals() {

        document.querySelectorAll('.bb-modal').forEach(modal => {

            modal.classList.remove('is-open');

        });

        document.body.style.overflow = '';

    }

    function openModal(type) {

        closeModals();

        const modal =

            type === 'login'

                ? document.getElementById('bbLoginModal')

                : document.getElementById('bbRegisterModal');

        if (!modal) return;

        modal.classList.add('is-open');

        document.body.style.overflow = 'hidden';

        accountDropdown?.classList.remove('is-open');

        mobileMenu?.classList.remove('is-open');

        mobileToggle?.classList.remove('is-open');

        mobileToggle?.setAttribute('aria-expanded', 'false');

    }

    document.querySelectorAll('[data-bb-modal]').forEach(button => {

        button.addEventListener('click', () => {

            openModal(button.dataset.bbModal);

        });

    });

    document.querySelectorAll('.bb-modal-close').forEach(button => {

        button.addEventListener('click', closeModals);

    });

    document.querySelectorAll('.bb-modal-backdrop').forEach(backdrop => {

        backdrop.addEventListener('click', closeModals);

    });

    document.querySelectorAll('.bb-password-toggle').forEach(button => {

        button.addEventListener('click', () => {

            const input = button

                .closest('.bb-password-field')

                ?.querySelector('input');

            if (!input) return;

            const shouldShow = input.type === 'password';

            input.type = shouldShow ? 'text' : 'password';

            button.classList.toggle('is-visible', shouldShow);

            button.setAttribute('aria-pressed', shouldShow ? 'true' : 'false');

            button.setAttribute(

                'aria-label',

                shouldShow ? 'Hide password' : 'Show password'

            );

        });

    });

    document.addEventListener('keydown', e => {

        if (e.key !== 'Escape') return;

        searchPanel?.classList.remove('is-open');

        accountDropdown?.classList.remove('is-open');

        mobileMenu?.classList.remove('is-open');

        mobileToggle?.classList.remove('is-open');

        mobileToggle?.setAttribute('aria-expanded', 'false');

        closeModals();

    });

    document.addEventListener('click', e => {

        if (

            accountDropdown &&

            accountButton &&

            !accountDropdown.contains(e.target) &&

            !accountButton.contains(e.target)

        ) {

            accountDropdown.classList.remove('is-open');

        }

        if (

            searchPanel &&

            searchButton &&

            !searchPanel.contains(e.target) &&

            !searchButton.contains(e.target)

        ) {

            searchPanel.classList.remove('is-open');

        }

    });

    window.addEventListener('resize', () => {

        if (window.innerWidth <= 1024) return;

        mobileMenu?.classList.remove('is-open');

        mobileToggle?.classList.remove('is-open');

        mobileToggle?.setAttribute('aria-expanded', 'false');

        categories?.classList.remove('is-open');

        productToggle?.classList.remove('is-open');

        productToggle?.setAttribute('aria-expanded', 'false');

        document

            .querySelectorAll('.bb-mobile-category-group.is-open')

            .forEach(group => {

                group.classList.remove('is-open');

                group

                    .querySelector('.bb-mobile-category-toggle')

                    ?.setAttribute('aria-expanded', 'false');

            });

        document.body.style.overflow = '';

    });

    @if (session('showLoginModal'))

        openModal('login');

    @endif

    @if (session('showRegisterModal'))

        openModal('register');

    @endif

});

</script>
