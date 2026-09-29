{{-- =========================================================
    BUFFBRIDGE CUSTOM CREW
    FOOTER - CLEAN / PREMIUM / RESPONSIVE
========================================================= --}}

<footer class="bb-footer" id="contact">

    {{-- =====================================================
        MAIN FOOTER
    ====================================================== --}}
    <div class="bb-footer-main">

        <div class="bb-footer-container">

            {{-- =================================================
                BRAND
            ================================================== --}}
            <div class="bb-footer-brand">

                <a href="{{ url('/') }}" class="bb-footer-brand-link">

                    <img
                        src="{{ asset('BUFF_LOGO.png') }}"
                        alt="Buffbridge Custom Crew"
                        class="bb-footer-logo"
                    >

                    <div class="bb-footer-brand-copy">

                        <div class="bb-footer-brand-name">
                            BUFFBRIDGE
                        </div>

                        <div class="bb-footer-brand-sub">
                            CUSTOM CREW
                        </div>

                        <div class="bb-footer-brand-jp">
                            エアガンの収集家です。
                        </div>

                    </div>

                </a>

                <p class="bb-footer-description">
                    SELECTED GEAR FOR REAL PLAYERS.
                </p>

                {{-- SOCIAL --}}
                <div class="bb-footer-socials">

                    {{-- FACEBOOK --}}
                    <a
                        href="https://www.facebook.com/share/1ABFfSy5QZ/?mibextid=wwXIfr"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="bb-footer-social"
                        aria-label="Facebook"
                    >
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M14 8.5V6.8c0-.8.5-1 1-1h2.5V2.1L14.1 2C10.7 2 9 4 9 6.5v2H6v4h3V22h5v-9.5h3.3l.6-4H14z"
                            />
                        </svg>
                    </a>

                    {{-- LINE --}}
                    <a
                        href="https://lin.ee/FLk15Ps"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="bb-footer-social"
                        aria-label="LINE"
                    >
                        <img
                            src="{{ asset('images/icons8-line.svg') }}"
                            alt="LINE"
                        >
                    </a>

                </div>

            </div>


            {{-- =================================================
                QUICK LINKS
            ================================================== --}}
            <div class="bb-footer-column">

                <h3 class="bb-footer-title">
                    QUICK LINKS
                </h3>

                <nav class="bb-footer-links">

                    <a href="{{ url('/') }}">
                        HOME
                    </a>

                    <a href="{{ route('products.index') }}">
                        PRODUCTS
                    </a>

                    <a href="{{ route('posts.index') }}">
                        PROMOTION
                    </a>

                    <a href="{{ route('products.index', ['category' => 85]) }}">
                        BUFFBRIDGE CUSTOM
                    </a>

                </nav>

            </div>


            {{-- =================================================
                CUSTOMER SERVICE
            ================================================== --}}
            <div class="bb-footer-column">

                <h3 class="bb-footer-title">
                    CUSTOMER SERVICE
                </h3>

                <nav class="bb-footer-links">

                    @if (auth('customer')->check())

                        <a href="{{ route('profile.edit') }}">
                            MY ACCOUNT
                        </a>

                        <a href="{{ route('cart.index') }}">
                            MY CART
                        </a>

                        <a href="{{ route('order.history') }}">
                            ORDER HISTORY
                        </a>

                    @else

                        <a href="{{ route('cart.index') }}">
                            MY CART
                        </a>

                    @endif

                    <a href="{{ route('term') }}">
                        TERMS OF USE
                    </a>

                    <a href="{{ route('privacy') }}">
                        PRIVACY POLICY
                    </a>

                </nav>

            </div>


            {{-- =================================================
                CONTACT
            ================================================== --}}
            <div class="bb-footer-column bb-footer-contact">

                <h3 class="bb-footer-title">
                    CONTACT US
                </h3>

                {{-- ADDRESS --}}
                <div class="bb-footer-contact-item">

                    <div class="bb-footer-contact-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 21s7-6.1 7-12a7 7 0 1 0-14 0c0 5.9 7 12 7 12z"/>
                            <circle cx="12" cy="9" r="2.5"/>
                        </svg>
                    </div>

                    <div>
                        <span class="bb-footer-contact-label">
                            ADDRESS
                        </span>

                        <p>
                            132/2 Cozy6,<br>
                            Ladprao, Bangkok 10230
                        </p>
                    </div>

                </div>


                {{-- PHONE --}}
                <div class="bb-footer-contact-item">

                    <div class="bb-footer-contact-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M5 4h3l2 5-2 1.5a15 15 0 0 0 5.5 5.5L15 14l5 2v3c0 1.1-.9 2-2 2C9.7 21 3 14.3 3 6c0-1.1.9-2 2-2z"/>
                        </svg>
                    </div>

                    <div>
                        <span class="bb-footer-contact-label">
                            PHONE
                        </span>

                        <p>
                            <a href="tel:+66902998211">
                                +66 90 299 8211
                            </a>
                        </p>
                    </div>

                </div>


                {{-- EMAIL --}}
                <div class="bb-footer-contact-item">

                    <div class="bb-footer-contact-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <rect x="3" y="5" width="18" height="14" rx="1"/>
                            <path d="m4 7 8 6 8-6"/>
                        </svg>
                    </div>

                    <div>
                        <span class="bb-footer-contact-label">
                            EMAIL
                        </span>

                        <p>
                            <a href="mailto:info@buffbridge.com">
                                info@buffbridge.com
                            </a>
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
        BOTTOM FOOTER
    ====================================================== --}}
    <div class="bb-footer-bottom">

        <div class="bb-footer-bottom-container">

            <div class="bb-footer-copyright">
                © {{ date('Y') }}
                <strong>BUFFBRIDGE CUSTOM CREW.</strong>
                ALL RIGHTS RESERVED.
            </div>

            <div class="bb-footer-bottom-links">

                <a href="{{ route('term') }}">
                    TERMS OF USE
                </a>

                <span></span>

                <a href="{{ route('privacy') }}">
                    PRIVACY POLICY
                </a>

            </div>

        </div>

    </div>

</footer>


{{-- =========================================================
    FOOTER STYLE
========================================================= --}}
<style>

    /* =========================================================
       ROOT
    ========================================================= */

    .bb-footer,
    .bb-footer *,
    .bb-footer *::before,
    .bb-footer *::after {
        box-sizing: border-box;
    }

    .bb-footer {
        --bb-footer-yellow: #ffd429;
        --bb-footer-black: #090909;
        --bb-footer-dark: #111113;
        --bb-footer-border: rgba(255, 255, 255, .10);
        --bb-footer-text: #ffffff;
        --bb-footer-muted: #949494;

        position: relative;
        width: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background: var(--bb-footer-dark);
        color: var(--bb-footer-text);
    }

    .bb-footer a {
        text-decoration: none;
    }


    /* =========================================================
       MAIN
    ========================================================= */

    .bb-footer-main {
        position: relative;
        width: 100%;
        background:
            radial-gradient(
                circle at 8% 20%,
                rgba(255, 212, 41, .045),
                transparent 24%
            ),
            #111113;
    }

    .bb-footer-main::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: var(--bb-footer-yellow);
    }


    /* =========================================================
       CONTAINER
    ========================================================= */

    .bb-footer-container {
        width: 100%;
        max-width: none;
        margin: 0 auto;
        padding:
            72px
            clamp(56px, 4.8vw, 96px)
            66px;

        display: grid;
        grid-template-columns:
            minmax(280px, 1.45fr)
            minmax(160px, .7fr)
            minmax(180px, .8fr)
            minmax(260px, 1fr);

        gap: clamp(42px, 5vw, 90px);
    }


    /* =========================================================
       BRAND
    ========================================================= */

    .bb-footer-brand {
        min-width: 0;
    }

    .bb-footer-brand-link {
        display: inline-flex;
        align-items: center;
        gap: 15px;
        color: #fff !important;
    }

    .bb-footer-logo {
        display: block;
        width: 72px;
        height: 72px;
        flex: 0 0 auto;
        object-fit: contain;
    }

    .bb-footer-brand-copy {
        min-width: 0;
    }

    .bb-footer-brand-name {
        margin: 0;
        color: #fff;
        font-size: 22px;
        line-height: .95;
        font-weight: 900;
        letter-spacing: .4px;
    }

    .bb-footer-brand-sub {
        margin-top: 5px;
        color: #fff;
        font-size: 13px;
        line-height: 1;
        font-weight: 800;
        letter-spacing: 1.4px;
    }

    .bb-footer-brand-jp {
        margin-top: 7px;
        color: #b7b7b7;
        font-size: 8px;
        line-height: 1.2;
        letter-spacing: 1px;
    }

    .bb-footer-description {
        max-width: 320px;
        margin: 26px 0 0;
        color: #8e8e8e;
        font-size: 11px;
        line-height: 1.7;
        font-weight: 600;
        letter-spacing: 2px;
    }


    /* =========================================================
       SOCIAL
    ========================================================= */

    .bb-footer-socials {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 25px;
    }

    .bb-footer-social {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border: 1px solid var(--bb-footer-border);
        background: rgba(255, 255, 255, .025);
        color: #fff !important;
        transition:
            background .2s ease,
            border-color .2s ease,
            color .2s ease,
            transform .2s ease;
    }

    .bb-footer-social:hover {
        border-color: var(--bb-footer-yellow);
        background: var(--bb-footer-yellow);
        color: #111 !important;
        transform: translateY(-2px);
    }

    .bb-footer-social svg {
        width: 18px;
        height: 18px;
        fill: currentColor;
    }

    .bb-footer-social img {
        display: block;
        width: 19px;
        height: 19px;
        object-fit: contain;
        filter: brightness(0) invert(1);
    }

    .bb-footer-social:hover img {
        filter: brightness(0);
    }


    /* =========================================================
       COLUMN
    ========================================================= */

    .bb-footer-column {
        min-width: 0;
    }

    .bb-footer-title {
        position: relative;
        margin: 0 0 27px;
        padding-bottom: 15px;
        color: #fff;
        font-size: 13px;
        line-height: 1;
        font-weight: 900;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .bb-footer-title::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 32px;
        height: 3px;
        background: var(--bb-footer-yellow);
    }


    /* =========================================================
       LINKS
    ========================================================= */

    .bb-footer-links {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
    }

    .bb-footer-links a {
        position: relative;
        display: inline-flex;
        align-items: center;
        color: #929292 !important;
        font-size: 11px;
        line-height: 1.4;
        font-weight: 600;
        letter-spacing: .35px;
        transition:
            color .2s ease,
            transform .2s ease;
    }

    .bb-footer-links a::before {
        content: "";
        width: 0;
        height: 1px;
        margin-right: 0;
        background: var(--bb-footer-yellow);
        transition:
            width .2s ease,
            margin-right .2s ease;
    }

    .bb-footer-links a:hover {
        color: #fff !important;
        transform: translateX(2px);
    }

    .bb-footer-links a:hover::before {
        width: 12px;
        margin-right: 8px;
    }


    /* =========================================================
       CONTACT
    ========================================================= */

    .bb-footer-contact-item {
        display: flex;
        align-items: flex-start;
        gap: 13px;
    }

    .bb-footer-contact-item + .bb-footer-contact-item {
        margin-top: 20px;
    }

    .bb-footer-contact-icon {
        display: flex;
        flex: 0 0 35px;
        align-items: center;
        justify-content: center;
        width: 35px;
        height: 35px;
        border: 1px solid rgba(255, 212, 41, .28);
        color: var(--bb-footer-yellow);
    }

    .bb-footer-contact-icon svg {
        width: 16px;
        height: 16px;
        fill: none;
        stroke: currentColor;
        stroke-width: 1.7;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .bb-footer-contact-label {
        display: block;
        margin: 1px 0 6px;
        color: #fff;
        font-size: 9px;
        line-height: 1;
        font-weight: 900;
        letter-spacing: 1.2px;
    }

    .bb-footer-contact-item p {
        margin: 0;
        color: #929292;
        font-size: 11px;
        line-height: 1.7;
        font-style: normal;
    }

    .bb-footer-contact-item a {
        color: #929292 !important;
        transition: color .2s ease;
    }

    .bb-footer-contact-item a:hover {
        color: var(--bb-footer-yellow) !important;
    }


    /* =========================================================
       BOTTOM
    ========================================================= */

    .bb-footer-bottom {
        width: 100%;
        background: #070707;
        border-top: 1px solid rgba(255, 255, 255, .07);
    }

    .bb-footer-bottom-container {
        width: 100%;
        min-height: 70px;
        margin: 0 auto;
        padding:
            0
            clamp(56px, 4.8vw, 96px);

        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
    }

    .bb-footer-copyright {
        color: #737373;
        font-size: 10px;
        line-height: 1.5;
        letter-spacing: .3px;
    }

    .bb-footer-copyright strong {
        color: #b8b8b8;
        font-weight: 700;
    }

    .bb-footer-bottom-links {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .bb-footer-bottom-links a {
        color: #8d8d8d !important;
        font-size: 9px;
        line-height: 1;
        font-weight: 700;
        letter-spacing: .5px;
        transition: color .2s ease;
    }

    .bb-footer-bottom-links a:hover {
        color: var(--bb-footer-yellow) !important;
    }

    .bb-footer-bottom-links span {
        display: block;
        width: 1px;
        height: 12px;
        background: #333;
    }


    /* =========================================================
       LARGE DESKTOP
    ========================================================= */

    @media (min-width: 1920px) {

        .bb-footer-container {
            padding:
                82px
                5vw
                74px;

            grid-template-columns:
                minmax(330px, 1.5fr)
                minmax(190px, .7fr)
                minmax(210px, .8fr)
                minmax(300px, 1fr);
        }

        .bb-footer-logo {
            width: 78px;
            height: 78px;
        }

        .bb-footer-brand-name {
            font-size: 24px;
        }

        .bb-footer-brand-sub {
            font-size: 14px;
        }

        .bb-footer-title {
            font-size: 14px;
        }

        .bb-footer-links a,
        .bb-footer-contact-item p {
            font-size: 12px;
        }

        .bb-footer-bottom-container {
            min-height: 74px;
            padding-left: 5vw;
            padding-right: 5vw;
        }

    }


    /* =========================================================
       NOTEBOOK
    ========================================================= */

    @media (min-width: 1025px) and (max-width: 1366px) {

        .bb-footer-container {
            padding:
                58px
                38px
                54px;

            grid-template-columns:
                minmax(240px, 1.25fr)
                minmax(140px, .65fr)
                minmax(160px, .75fr)
                minmax(230px, 1fr);

            gap: 38px;
        }

        .bb-footer-logo {
            width: 62px;
            height: 62px;
        }

        .bb-footer-brand-name {
            font-size: 19px;
        }

        .bb-footer-brand-sub {
            font-size: 11px;
        }

        .bb-footer-bottom-container {
            padding-left: 38px;
            padding-right: 38px;
        }

    }


    /* =========================================================
       TABLET
    ========================================================= */

    @media (max-width: 1024px) {

        .bb-footer-container {
            padding:
                56px
                32px
                52px;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 48px 42px;
        }

        .bb-footer-brand {
            padding-right: 20px;
        }

        .bb-footer-bottom-container {
            min-height: 76px;
            padding: 18px 32px;

            flex-direction: column;
            justify-content: center;
            gap: 10px;

            text-align: center;
        }

    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 600px) {

        .bb-footer-container {
            padding:
                46px
                22px
                42px;

            grid-template-columns: 1fr;
            gap: 38px;
        }

        .bb-footer-brand {
            padding-right: 0;
        }

        .bb-footer-brand-link {
            gap: 12px;
        }

        .bb-footer-logo {
            width: 58px;
            height: 58px;
        }

        .bb-footer-brand-name {
            font-size: 18px;
        }

        .bb-footer-brand-sub {
            font-size: 10px;
        }

        .bb-footer-description {
            margin-top: 20px;
        }

        .bb-footer-socials {
            margin-top: 20px;
        }

        .bb-footer-title {
            margin-bottom: 22px;
        }

        .bb-footer-links {
            gap: 14px;
        }

        .bb-footer-contact-item + .bb-footer-contact-item {
            margin-top: 17px;
        }

        .bb-footer-bottom-container {
            min-height: auto;
            padding:
                22px
                20px;

            gap: 12px;
        }

        .bb-footer-copyright {
            font-size: 9px;
        }

        .bb-footer-bottom-links {
            flex-wrap: wrap;
            justify-content: center;
        }

    }


    /* =========================================================
       VERY SMALL MOBILE
    ========================================================= */

    @media (max-width: 380px) {

        .bb-footer-container {
            padding-left: 18px;
            padding-right: 18px;
        }

        .bb-footer-logo {
            width: 52px;
            height: 52px;
        }

        .bb-footer-brand-name {
            font-size: 16px;
        }

        .bb-footer-brand-sub {
            font-size: 9px;
        }

        .bb-footer-brand-jp {
            font-size: 7px;
        }

    }

</style>