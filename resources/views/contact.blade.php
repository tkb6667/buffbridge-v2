<x-guest-layout>

<section class="bb-contact">

    <section class="bb-contact-hero">
        <div class="bb-contact-shell bb-contact-hero-inner">
            <div class="bb-eyebrow">BUFFBRIDGE CUSTOM CREW</div>

            <h1>CONTACT <span>US</span></h1>

            <p>
                Need help with products, orders or custom builds?
                Get in touch with our team.
            </p>
        </div>
    </section>


    <section class="bb-contact-main">
        <div class="bb-contact-shell bb-contact-grid">

            {{-- CONTACT INFORMATION --}}
            <div class="bb-contact-info">

                <div class="bb-section-label">GET IN TOUCH</div>

                <h2>
                    WE'RE HERE<br>
                    TO HELP.
                </h2>

                <p class="bb-contact-intro">
                    Questions about products, availability, orders or
                    Buffbridge Custom? Contact us through the channels below.
                </p>


                <div class="bb-contact-list">

                    {{-- LOCATION --}}
                    <a
                        href="https://maps.app.goo.gl/1HSmxvLZUxgNo5Ww8?g_st=il"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="bb-contact-item"
                    >
                        <div class="bb-contact-icon">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12 21s7-5.4 7-12a7 7 0 1 0-14 0c0 6.6 7 12 7 12Z"/>
                                <circle cx="12" cy="9" r="2.5"/>
                            </svg>
                        </div>

                        <div>
                            <div class="bb-contact-item-label">
                                LOCATION
                            </div>

                            <div class="bb-contact-item-title">
                                BuffBridge Gallery
                            </div>

                            <div class="bb-contact-item-value">
                                132/2 Cozy6, Ladprao<br>
                                Bangkok 10230, Thailand
                            </div>

                            <span class="bb-contact-open-map">
                                OPEN GOOGLE MAPS →
                            </span>
                        </div>
                    </a>


                    {{-- PHONE --}}
                    <div class="bb-contact-item">
                        <div class="bb-contact-icon">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M5 4h4l2 5-2.5 1.7a16 16 0 0 0 4.8 4.8L15 13l5 2v4c0 1.1-.9 2-2 2C9.7 21 3 14.3 3 6c0-1.1.9-2 2-2Z"/>
                            </svg>
                        </div>

                        <div>
                            <div class="bb-contact-item-label">
                                PHONE
                            </div>

                            <a
                                href="tel:+66902998211"
                                class="bb-contact-item-value"
                            >
                                +66 90 299 8211
                            </a>
                        </div>
                    </div>


                    {{-- EMAIL --}}
                    <div class="bb-contact-item">
                        <div class="bb-contact-icon">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <rect x="3" y="5" width="18" height="14" rx="1"/>
                                <path d="m4 7 8 6 8-6"/>
                            </svg>
                        </div>

                        <div>
                            <div class="bb-contact-item-label">
                                EMAIL
                            </div>

                            <a
                                href="mailto:info@buffbridge.com"
                                class="bb-contact-item-value"
                            >
                                info@buffbridge.com
                            </a>
                        </div>
                    </div>


                    {{-- OPEN HOURS --}}
                    <div class="bb-contact-item">
                        <div class="bb-contact-icon">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="12" r="9"/>
                                <path d="M12 7v5l3.5 2"/>
                            </svg>
                        </div>

                        <div>
                            <div class="bb-contact-item-label">
                                OPEN HOURS
                            </div>

                            <div class="bb-contact-item-value">
                                Tuesday - Saturday<br>
                                13:00 - 18:30
                            </div>
                        </div>
                    </div>

                </div>


                <div class="bb-contact-social">

                    <div class="bb-contact-social-title">
                        FOLLOW BUFFBRIDGE
                    </div>

                    <div class="bb-social-buttons">

                        <a
                            href="https://www.facebook.com/share/1ABFfSy5QZ/?mibextid=wwXIfr"
                            target="_blank"
                            rel="noopener noreferrer"
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
                            class="bb-social-line"
                        >
                            LINE
                        </a>

                    </div>

                </div>

            </div>


            {{-- CONTACT FORM --}}
            <div class="bb-contact-card">

                <div class="bb-contact-card-head">
                    <div class="bb-section-label">
                        SEND A MESSAGE
                    </div>

                    <h3>HOW CAN WE HELP?</h3>

                    <p>
                        Fill in the form and our team will get back to you.
                    </p>
                </div>


                <form
                    class="bb-contact-form"
                    id="bbContactForm"
                    onsubmit="return false;"
                >

                    <div class="bb-form-row">

                        <div class="bb-form-field">
                            <label for="contactName">
                                NAME
                            </label>

                            <input
                                type="text"
                                id="contactName"
                                placeholder="Your name"
                                autocomplete="name"
                            >
                        </div>


                        <div class="bb-form-field">
                            <label for="contactPhone">
                                PHONE
                            </label>

                            <input
                                type="tel"
                                id="contactPhone"
                                placeholder="Phone number"
                                autocomplete="tel"
                            >
                        </div>

                    </div>


                    <div class="bb-form-field">
                        <label for="contactEmail">
                            EMAIL
                        </label>

                        <input
                            type="email"
                            id="contactEmail"
                            placeholder="Email address"
                            autocomplete="email"
                        >
                    </div>


                    <div class="bb-form-field">
                        <label for="contactSubject">
                            SUBJECT
                        </label>

                        <select id="contactSubject">
                            <option value="">Select subject</option>
                            <option>Product Inquiry</option>
                            <option>Order Inquiry</option>
                            <option>Buffbridge Custom</option>
                            <option>Stock / Availability</option>
                            <option>Other</option>
                        </select>
                    </div>


                    <div class="bb-form-field">
                        <label for="contactMessage">
                            MESSAGE
                        </label>

                        <textarea
                            id="contactMessage"
                            rows="6"
                            placeholder="Tell us how we can help..."
                        ></textarea>
                    </div>


                    <button
                        type="button"
                        class="bb-contact-submit"
                        id="bbContactSubmit"
                    >
                        <span>SEND MESSAGE</span>

                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M5 12h14"/>
                            <path d="m14 7 5 5-5 5"/>
                        </svg>
                    </button>


                    <p class="bb-form-note">
                        For urgent inquiries, please contact us directly by
                        phone, Facebook or LINE.
                    </p>

                </form>

            </div>

        </div>
    </section>


    {{-- LOCATION --}}
    <section class="bb-contact-map">

        <div class="bb-contact-shell">

            <div class="bb-map-info">

                <div>
                    <div class="bb-section-label">
                        OUR LOCATION
                    </div>

                    <h2>VISIT BUFFBRIDGE</h2>

                    <p class="bb-map-location-name">
                        BuffBridge Gallery
                    </p>
                </div>


                <a
                    href="https://maps.app.goo.gl/1HSmxvLZUxgNo5Ww8?g_st=il"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="bb-map-button"
                >
                    <span>OPEN GOOGLE MAPS</span>

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M5 12h14"/>
                        <path d="m14 7 5 5-5 5"/>
                    </svg>
                </a>

            </div>


            <a
                href="https://maps.app.goo.gl/1HSmxvLZUxgNo5Ww8?g_st=il"
                target="_blank"
                rel="noopener noreferrer"
                class="bb-map-frame"
                aria-label="Open BuffBridge Gallery in Google Maps"
            >
                <iframe
                    src="https://www.google.com/maps?q=BuffBridge%20Gallery%20Bangkok&output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="BuffBridge Gallery location"
                ></iframe>

                <span class="bb-map-overlay">
                    <strong>BUFFBRIDGE GALLERY</strong>
                    <small>OPEN IN GOOGLE MAPS →</small>
                </span>
            </a>

        </div>

    </section>

</section>


<style>
.bb-contact,
.bb-contact *{
    box-sizing:border-box;
}

.bb-contact{
    --yellow:#ffd429;
    --orange:#f5a000;
    --black:#080808;
    width:100%;
    overflow:hidden;
    background:#fff;
    color:#111;
    font-family:Arial,Helvetica,sans-serif;
}

.bb-contact-shell{
    width:100%;
    max-width:1700px;
    margin:auto;
    padding-left:clamp(24px,7vw,135px);
    padding-right:clamp(24px,7vw,135px);
}

.bb-contact-hero{
    position:relative;
    min-height:340px;
    display:flex;
    align-items:center;
    overflow:hidden;
    background:
        radial-gradient(circle at 82% 30%,rgba(255,212,41,.12),transparent 30%),
        linear-gradient(120deg,#050505,#111);
}

.bb-contact-hero::after{
    content:"";
    position:absolute;
    right:7%;
    bottom:0;
    width:32%;
    height:4px;
    background:var(--yellow);
}

.bb-contact-hero-inner{
    position:relative;
    z-index:2;
    padding-top:70px;
    padding-bottom:70px;
}

.bb-eyebrow,
.bb-section-label{
    color:#d9ad00;
    font-size:10px;
    font-weight:900;
    letter-spacing:2.4px;
}

.bb-contact-hero h1{
    margin:12px 0 14px!important;
    color:#fff!important;
    font-size:clamp(46px,6vw,92px)!important;
    line-height:.9!important;
    font-weight:900!important;
    font-style:italic!important;
    letter-spacing:-3px;
}

.bb-contact-hero h1 span{
    color:var(--yellow);
}

.bb-contact-hero p{
    width:min(520px,100%);
    margin:0!important;
    color:#aaa!important;
    font-size:13px!important;
    line-height:1.8!important;
}

.bb-contact-main{
    padding:90px 0;
}

.bb-contact-grid{
    display:grid;
    grid-template-columns:minmax(0,.85fr) minmax(460px,1.15fr);
    gap:clamp(60px,8vw,130px);
    align-items:start;
}

.bb-contact-info h2{
    margin:13px 0 20px!important;
    color:#111!important;
    font-size:clamp(38px,4vw,62px)!important;
    line-height:.96!important;
    font-weight:900!important;
    font-style:italic!important;
    letter-spacing:-2px;
}

.bb-contact-intro{
    width:min(510px,100%);
    margin:0 0 42px!important;
    color:#777!important;
    font-size:12px!important;
    line-height:1.8!important;
}

.bb-contact-list{
    display:grid;
    grid-template-columns:1fr 1fr;
    border-top:1px solid #e3e3e3;
}

.bb-contact-item{
    min-height:145px;
    padding:29px 24px 26px 0;
    display:flex;
    gap:17px;
    border-bottom:1px solid #e3e3e3;
    color:#111!important;
    text-decoration:none!important;
}

.bb-contact-item:nth-child(odd){
    border-right:1px solid #e3e3e3;
}

.bb-contact-item:nth-child(even){
    padding-left:24px;
}

a.bb-contact-item{
    transition:.2s;
}

a.bb-contact-item:hover{
    background:#fafafa;
}

.bb-contact-icon{
    flex:0 0 42px;
    width:42px;
    height:42px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#111;
    color:var(--yellow);
}

.bb-contact-icon svg{
    width:20px;
    height:20px;
    fill:none;
    stroke:currentColor;
    stroke-width:1.7;
    stroke-linecap:round;
    stroke-linejoin:round;
}

.bb-contact-item-label{
    margin:2px 0 8px;
    color:#999;
    font-size:8px;
    font-weight:900;
    letter-spacing:1.4px;
}

.bb-contact-item-title{
    margin-bottom:5px;
    color:#111;
    font-size:12px;
    font-weight:900;
}

.bb-contact-item-value{
    color:#111!important;
    font-size:11px;
    font-weight:700;
    line-height:1.65;
    text-decoration:none!important;
}

a.bb-contact-item-value:hover{
    color:#d3a900!important;
}

.bb-contact-open-map{
    display:block;
    margin-top:8px;
    color:#d29b00;
    font-size:8px;
    font-weight:900;
    letter-spacing:.7px;
}

.bb-contact-social{
    margin-top:34px;
}

.bb-contact-social-title{
    margin-bottom:13px;
    color:#777;
    font-size:8px;
    font-weight:900;
    letter-spacing:1.5px;
}

.bb-social-buttons{
    display:flex;
    gap:7px;
}

.bb-social-buttons a{
    min-width:38px;
    height:38px;
    padding:0 12px;
    display:flex;
    align-items:center;
    justify-content:center;
    border:1px solid #ddd;
    background:#fff;
    color:#111!important;
    font-size:8px;
    font-weight:900;
    letter-spacing:.8px;
    text-decoration:none!important;
    transition:.2s;
}

.bb-social-buttons a:hover{
    border-color:#111;
    background:#111;
    color:var(--yellow)!important;
}

.bb-social-buttons svg{
    width:17px;
    height:17px;
    fill:currentColor;
}

.bb-contact-card{
    padding:55px;
    background:#0c0c0c;
    box-shadow:0 30px 70px rgba(0,0,0,.12);
}

.bb-contact-card-head h3{
    margin:10px 0!important;
    color:#fff!important;
    font-size:clamp(27px,2.4vw,39px)!important;
    line-height:1!important;
    font-weight:900!important;
    font-style:italic!important;
    letter-spacing:-1px;
}

.bb-contact-card-head p{
    margin:0 0 32px!important;
    color:#777!important;
    font-size:11px!important;
}

.bb-form-row{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:15px;
}

.bb-form-field{
    margin-bottom:18px;
}

.bb-form-field label{
    display:block;
    margin-bottom:8px;
    color:#999;
    font-size:8px;
    font-weight:900;
    letter-spacing:1.3px;
}

.bb-form-field input,
.bb-form-field select,
.bb-form-field textarea{
    width:100%!important;
    margin:0!important;
    padding:0 16px!important;
    border:1px solid #292929!important;
    border-radius:0!important;
    outline:none!important;
    background:#151515!important;
    color:#fff!important;
    font-family:Arial,Helvetica,sans-serif!important;
    font-size:12px!important;
    box-shadow:none!important;
}

.bb-form-field input,
.bb-form-field select{
    height:50px!important;
}

.bb-form-field textarea{
    min-height:145px!important;
    padding-top:15px!important;
    padding-bottom:15px!important;
    resize:vertical;
}

.bb-form-field input::placeholder,
.bb-form-field textarea::placeholder{
    color:#666;
}

.bb-form-field input:focus,
.bb-form-field select:focus,
.bb-form-field textarea:focus{
    border-color:var(--yellow)!important;
}

.bb-contact-submit{
    width:100%;
    min-height:54px;
    margin-top:4px;
    padding:0 20px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    border:0;
    background:var(--yellow);
    color:#111;
    font-size:9px;
    font-weight:900;
    letter-spacing:1px;
    cursor:pointer;
    transition:.2s;
}

.bb-contact-submit:hover{
    background:#fff;
}

.bb-contact-submit svg,
.bb-map-button svg{
    width:19px;
    height:19px;
    fill:none;
    stroke:currentColor;
    stroke-width:1.8;
    stroke-linecap:round;
    stroke-linejoin:round;
}

.bb-form-note{
    margin:13px 0 0!important;
    color:#555!important;
    font-size:8px!important;
    line-height:1.6!important;
}

.bb-contact-map{
    padding:70px 0 100px;
    background:#f4f4f4;
}

.bb-map-info{
    margin:0 0 27px;
    display:flex;
    align-items:flex-end;
    justify-content:space-between;
    gap:30px;
}

.bb-map-info h2{
    margin:8px 0 0!important;
    color:#111!important;
    font-size:clamp(30px,3vw,46px)!important;
    line-height:1!important;
    font-weight:900!important;
    font-style:italic!important;
    letter-spacing:-1.5px;
}

.bb-map-location-name{
    margin:10px 0 0!important;
    color:#777!important;
    font-size:11px!important;
    font-weight:700!important;
}

.bb-map-button{
    min-height:46px;
    padding:0 20px;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:20px;
    background:#111;
    color:#fff!important;
    font-size:8px;
    font-weight:900;
    letter-spacing:.8px;
    text-decoration:none!important;
    transition:.2s;
}

.bb-map-button:hover{
    background:var(--yellow);
    color:#111!important;
}

.bb-map-frame{
    position:relative;
    display:block;
    width:100%;
    height:430px;
    overflow:hidden;
    background:#ddd;
    text-decoration:none!important;
}

.bb-map-frame iframe{
    display:block;
    width:100%;
    height:100%;
    border:0;
    pointer-events:none;
    filter:grayscale(.35) contrast(1.03);
}

.bb-map-overlay{
    position:absolute;
    left:22px;
    bottom:22px;
    min-width:220px;
    padding:14px 17px;
    display:flex;
    flex-direction:column;
    gap:5px;
    background:#111;
    color:#fff;
    box-shadow:0 10px 30px rgba(0,0,0,.2);
}

.bb-map-overlay strong{
    color:var(--yellow);
    font-size:10px;
    letter-spacing:1px;
}

.bb-map-overlay small{
    color:#aaa;
    font-size:8px;
    font-weight:800;
}

@media(max-width:1100px){
    .bb-contact-grid{
        grid-template-columns:1fr 1fr;
        gap:45px;
    }

    .bb-contact-card{
        padding:40px;
    }

    .bb-contact-list{
        grid-template-columns:1fr;
    }

    .bb-contact-item:nth-child(odd){
        border-right:0;
    }

    .bb-contact-item:nth-child(even){
        padding-left:0;
    }
}

@media(max-width:820px){
    .bb-contact-grid{
        grid-template-columns:1fr;
        gap:55px;
    }

    .bb-contact-list{
        grid-template-columns:1fr 1fr;
    }

    .bb-contact-item:nth-child(odd){
        border-right:1px solid #e3e3e3;
    }

    .bb-contact-item:nth-child(even){
        padding-left:24px;
    }

    .bb-map-frame{
        height:360px;
    }
}

@media(max-width:600px){
    .bb-contact-shell{
        padding-left:20px;
        padding-right:20px;
    }

    .bb-contact-hero{
        min-height:245px;
    }

    .bb-contact-hero-inner{
        padding-top:45px;
        padding-bottom:45px;
    }

    .bb-contact-hero h1{
        letter-spacing:-2px;
    }

    .bb-contact-main{
        padding:55px 0 65px;
    }

    .bb-contact-list{
        grid-template-columns:1fr;
    }

    .bb-contact-item,
    .bb-contact-item:nth-child(even){
        min-height:0;
        padding:22px 0;
        border-right:0;
    }

    .bb-contact-card{
        margin-left:-20px;
        margin-right:-20px;
        padding:40px 20px;
    }

    .bb-form-row{
        grid-template-columns:1fr;
        gap:0;
    }

    .bb-form-field input,
    .bb-form-field select,
    .bb-form-field textarea{
        font-size:16px!important;
    }

    .bb-contact-map{
        padding:50px 0 65px;
    }

    .bb-map-info{
        align-items:flex-start;
        flex-direction:column;
        gap:22px;
    }

    .bb-map-button{
        width:100%;
        justify-content:space-between;
    }

    .bb-map-frame{
        height:300px;
    }

    .bb-map-overlay{
        right:12px;
        bottom:12px;
        left:12px;
        min-width:0;
    }
}
</style>

</x-guest-layout>