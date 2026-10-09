<footer class="bb-footer">

    <div class="bb-footer-main">

        <div class="bb-footer-container">

            {{-- BRAND --}}
            <div class="bb-footer-brand">

                <a
                    href="{{ route('home') }}"
                    class="bb-footer-brand-link"
                >
                    <img
                        src="{{ asset('BUFF_LOGO.png') }}"
                        alt="Buffbridge Custom Crew"
                        class="bb-footer-logo"
                    >

                    <div>
                        <div class="bb-footer-brand-name">
                            BUFFBRIDGE
                        </div>

                        <div class="bb-footer-brand-sub">
                            CUSTOM
                        </div>

                        <div class="bb-footer-brand-jp">
                            エアガンの収集家です。
                        </div>
                    </div>
                </a>


                <p class="bb-footer-description">
                    SELECTED GEAR FOR REAL PLAYERS.
                </p>


                <div class="bb-footer-socials">

                    <a
                        href="https://www.facebook.com/share/1T8y5fqB3M/?mibextid=wwXIfr"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="bb-footer-social"
                        aria-label="Facebook"
                    >
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M14 8.5V6.8c0-.8.5-1 1-1h2.5V2.1L14.1 2C10.7 2 9 4 9 6.5v2H6v4h3V22h5v-9.5h3.3l.6-4H14z"/>
                        </svg>
                    </a>


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

                    <a
    href="https://t.me/buffv4"
    target="_blank"
    rel="noopener noreferrer"
    class="bb-footer-social"
    aria-label="Telegram"
>
    <svg viewBox="0 0 24 24" aria-hidden="true">
        <path d="M21.6 3.2 18.5 19c-.2 1.1-.9 1.4-1.8.9l-4.8-3.5-2.3 2.2c-.3.3-.5.5-1 .5l.3-4.9 8.9-8c.4-.3-.1-.5-.6-.2L6.2 13l-4.7-1.5c-1-.3-1-1 .2-1.5L20 2.9c.9-.3 1.8.2 1.6.3z"/>
    </svg>
</a>

                </div>

            </div>


            {{-- QUICK LINKS --}}
            <div class="bb-footer-column">

                <h3 class="bb-footer-title">
                    QUICK LINKS
                </h3>

                <nav class="bb-footer-links">

                    <a href="{{ route('home') }}">
                        HOME
                    </a>

                    <a href="{{ route('products.index') }}">
                        PRODUCTS
                    </a>

                    <a href="{{ route('posts.index') }}">
                        BLOG
                    </a>

                    <a href="{{ route('products.index', ['category' => 85]) }}">
                        BUFFBRIDGE CUSTOM
                    </a>

                    <a href="{{ url('/book-appointment') }}">
    BOOK AN APPOINTMENT
</a>

                    <a href="{{ route('contact') }}">
                        CONTACT US
                    </a>

                </nav>

            </div>


            {{-- CUSTOMER SERVICE --}}
            <div class="bb-footer-column">

                <h3 class="bb-footer-title">
                    CUSTOMER SERVICE
                </h3>

                <nav class="bb-footer-links">

                    @auth('customer')

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

                    @endauth


                    <a href="{{ route('term') }}">
                        TERMS OF USE
                    </a>

                    <a href="{{ route('privacy') }}">
                        PRIVACY POLICY
                    </a>

                </nav>

            </div>


            {{-- CONTACT --}}
            <div class="bb-footer-column bb-footer-contact">

                <h3 class="bb-footer-title">
                    CONTACT US
                </h3>


                {{-- LOCATION --}}
                <a
                    href="https://maps.app.goo.gl/1HSmxvLZUxgNo5Ww8?g_st=il"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="bb-footer-contact-item"
                >
                    <div class="bb-footer-contact-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 21s7-6.1 7-12a7 7 0 1 0-14 0c0 5.9 7 12 7 12z"/>
                            <circle cx="12" cy="9" r="2.5"/>
                        </svg>
                    </div>

                    <div>
                        <span class="bb-footer-contact-label">
                            LOCATION
                        </span>

                        <strong class="bb-footer-place">
                            BuffBridge Gallery
                        </strong>

                        <p>
                            132/2 Cozy6, Ladprao<br>
                            Bangkok 10230, Thailand
                        </p>

                        <span class="bb-footer-map-link">
                            GOOGLE MAPS →
                        </span>
                    </div>
                </a>


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
                                +66 65 782 9599
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


                {{-- HOURS --}}
                <div class="bb-footer-contact-item">

                    <div class="bb-footer-contact-icon">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <circle cx="12" cy="12" r="9"/>
                            <path d="M12 7v5l3 2"/>
                        </svg>
                    </div>

                    <div>
                        <span class="bb-footer-contact-label">
                            OPEN HOURS
                        </span>

                        <p>
                            Tuesday - Saturday<br>
                            13:00 - 18:30
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- BOTTOM --}}
    <div class="bb-footer-bottom">

        <div class="bb-footer-bottom-container">

            <div class="bb-footer-copyright">
                © {{ date('Y') }}
                <strong>BUFFBRIDGE CUSTOM .</strong>
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


<style>
.bb-footer,
.bb-footer *{
    box-sizing:border-box;
}

.bb-footer{
    --yellow:#ffd429;
    --dark:#111113;
    --border:rgba(255,255,255,.10);
    width:100%;
    margin:0;
    background:var(--dark);
    color:#fff;
    font-family:Arial,Helvetica,sans-serif;
}

.bb-footer a{
    text-decoration:none;
}

.bb-footer-main{
    position:relative;
    background:
        radial-gradient(
            circle at 8% 20%,
            rgba(255,212,41,.045),
            transparent 24%
        ),
        var(--dark);
}

.bb-footer-main::before{
    content:"";
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:3px;
    background:var(--yellow);
}

.bb-footer-container{
    width:100%;
    padding:72px clamp(56px,4.8vw,96px) 66px;
    display:grid;
    grid-template-columns:
        minmax(280px,1.45fr)
        minmax(150px,.7fr)
        minmax(170px,.8fr)
        minmax(270px,1fr);
    gap:clamp(38px,5vw,86px);
}

.bb-footer-brand-link{
    display:inline-flex;
    align-items:center;
    gap:15px;
    color:#fff!important;
}

.bb-footer-logo{
    width:72px;
    height:72px;
    flex:none;
    object-fit:contain;
}

.bb-footer-brand-name{
    color:#fff;
    font-size:22px;
    line-height:.95;
    font-weight:900;
}

.bb-footer-brand-sub{
    margin-top:5px;
    color:#fff;
    font-size:13px;
    line-height:1;
    font-weight:800;
    letter-spacing:1.4px;
}

.bb-footer-brand-jp{
    margin-top:7px;
    color:#b7b7b7;
    font-size:8px;
    letter-spacing:1px;
}

.bb-footer-description{
    margin:26px 0 0;
    color:#8e8e8e;
    font-size:11px;
    font-weight:600;
    letter-spacing:2px;
}

.bb-footer-socials{
    margin-top:25px;
    display:flex;
    gap:10px;
}

.bb-footer-social{
    width:42px;
    height:42px;
    display:flex;
    align-items:center;
    justify-content:center;
    border:1px solid var(--border);
    background:rgba(255,255,255,.025);
    color:#fff!important;
    transition:.2s;
}

.bb-footer-social:hover{
    border-color:var(--yellow);
    background:var(--yellow);
    color:#111!important;
    transform:translateY(-2px);
}

.bb-footer-social svg{
    width:18px;
    height:18px;
    fill:currentColor;
}

.bb-footer-social img{
    width:19px;
    height:19px;
    filter:brightness(0) invert(1);
}

.bb-footer-social:hover img{
    filter:brightness(0);
}

.bb-footer-title{
    position:relative;
    margin:0 0 27px;
    padding-bottom:15px;
    color:#fff;
    font-size:13px;
    font-weight:900;
    letter-spacing:1px;
}

.bb-footer-title::after{
    content:"";
    position:absolute;
    bottom:0;
    left:0;
    width:32px;
    height:3px;
    background:var(--yellow);
}

.bb-footer-links{
    display:flex;
    flex-direction:column;
    align-items:flex-start;
    gap:16px;
}

.bb-footer-links a,
.bb-footer-link-button{
    position:relative;
    padding:0;
    display:inline-flex;
    align-items:center;
    border:0;
    background:transparent;
    color:#929292!important;
    font-family:Arial,Helvetica,sans-serif;
    font-size:11px;
    font-weight:600;
    letter-spacing:.35px;
    cursor:pointer;
    transition:.2s;
}

.bb-footer-links a::before,
.bb-footer-link-button::before{
    content:"";
    width:0;
    height:1px;
    margin-right:0;
    background:var(--yellow);
    transition:.2s;
}

.bb-footer-links a:hover,
.bb-footer-link-button:hover{
    color:#fff!important;
    transform:translateX(2px);
}

.bb-footer-links a:hover::before,
.bb-footer-link-button:hover::before{
    width:12px;
    margin-right:8px;
}

.bb-footer-contact-item{
    display:flex;
    align-items:flex-start;
    gap:13px;
    color:#929292!important;
}

a.bb-footer-contact-item{
    transition:.2s;
}

a.bb-footer-contact-item:hover{
    color:#fff!important;
}

.bb-footer-contact-item + .bb-footer-contact-item{
    margin-top:19px;
}

.bb-footer-contact-icon{
    width:35px;
    height:35px;
    flex:0 0 35px;
    display:flex;
    align-items:center;
    justify-content:center;
    border:1px solid rgba(255,212,41,.28);
    color:var(--yellow);
}

.bb-footer-contact-icon svg{
    width:16px;
    height:16px;
    fill:none;
    stroke:currentColor;
    stroke-width:1.7;
    stroke-linecap:round;
    stroke-linejoin:round;
}

.bb-footer-contact-label{
    display:block;
    margin:1px 0 6px;
    color:#fff;
    font-size:9px;
    font-weight:900;
    letter-spacing:1.2px;
}

.bb-footer-place{
    display:block;
    margin-bottom:4px;
    color:#d5d5d5;
    font-size:11px;
    font-weight:800;
}

.bb-footer-contact-item p{
    margin:0;
    color:#929292;
    font-size:11px;
    line-height:1.7;
}

.bb-footer-contact-item p a{
    color:#929292!important;
}

.bb-footer-contact-item p a:hover{
    color:var(--yellow)!important;
}

.bb-footer-map-link{
    display:block;
    margin-top:6px;
    color:var(--yellow);
    font-size:8px;
    font-weight:900;
    letter-spacing:.6px;
}

.bb-footer-bottom{
    background:#070707;
    border-top:1px solid rgba(255,255,255,.07);
}

.bb-footer-bottom-container{
    min-height:70px;
    padding:0 clamp(56px,4.8vw,96px);
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:30px;
}

.bb-footer-copyright{
    color:#737373;
    font-size:10px;
    line-height:1.5;
}

.bb-footer-copyright strong{
    color:#b8b8b8;
}

.bb-footer-bottom-links{
    display:flex;
    align-items:center;
    gap:14px;
}

.bb-footer-bottom-links a{
    color:#8d8d8d!important;
    font-size:9px;
    font-weight:700;
    letter-spacing:.5px;
}

.bb-footer-bottom-links a:hover{
    color:var(--yellow)!important;
}

.bb-footer-bottom-links span{
    width:1px;
    height:12px;
    background:#333;
}

@media(max-width:1100px){
    .bb-footer-container{
        padding:56px 32px 52px;
        grid-template-columns:repeat(2,minmax(0,1fr));
        gap:48px 42px;
    }

    .bb-footer-bottom-container{
        padding:18px 32px;
    }
}

@media(max-width:600px){
    .bb-footer-container{
        padding:46px 22px 42px;
        grid-template-columns:1fr;
        gap:38px;
    }

    .bb-footer-logo{
        width:58px;
        height:58px;
    }

    .bb-footer-brand-name{
        font-size:18px;
    }

    .bb-footer-brand-sub{
        font-size:10px;
    }

    .bb-footer-title{
        margin-bottom:22px;
    }

    .bb-footer-bottom-container{
        min-height:auto;
        padding:22px 20px;
        flex-direction:column;
        justify-content:center;
        gap:12px;
        text-align:center;
    }

    .bb-footer-bottom-links{
        flex-wrap:wrap;
        justify-content:center;
    }
}

@media(max-width:380px){
    .bb-footer-container{
        padding-left:18px;
        padding-right:18px;
    }

    .bb-footer-logo{
        width:52px;
        height:52px;
    }

    .bb-footer-brand-name{
        font-size:16px;
    }
}
</style>