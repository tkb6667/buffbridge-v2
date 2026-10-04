<x-guest-layout>

    <div class="bb-profile-page">

        <div class="bb-profile-card">

            <div class="bb-profile-head">
                <div class="bb-profile-brand">
                    BUFFBRIDGE
                </div>

                <h1 class="bb-profile-title">
                    PROFILE
                </h1>

                <p class="bb-profile-description">
                    Manage your personal information and delivery details.
                </p>
            </div>

            @if (session('status'))
                <div class="bb-profile-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bb-profile-errors">
                    <strong>UPDATE FAILED</strong>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                method="POST"
                action="{{ route('profile.update') }}"
                id="profile-form"
                class="bb-profile-form"
            >
                @csrf
                @method('patch')

                <div class="bb-profile-grid">

                    <div class="bb-profile-field">
                        <label for="sc_form_username">
                            NAME
                        </label>

                        <input
                            id="sc_form_username"
                            type="text"
                            name="name"
                            value="{{ old('name', $user->name) }}"
                            placeholder="Name"
                            autocomplete="name"
                            required
                        >
                    </div>

                    <div class="bb-profile-field">
                        <label for="sc_form_email">
                            E-MAIL
                        </label>

                        <input
                            id="sc_form_email"
                            type="email"
                            name="email"
                            value="{{ $user->email }}"
                            placeholder="Email"
                            disabled
                        >
                    </div>

                    <div class="bb-profile-field">
                        <label for="sc_form_phone">
                            PHONE NUMBER
                        </label>

                        <input
                            id="sc_form_phone"
                            type="text"
                            name="phone"
                            value="{{ old('phone', $user->phone) }}"
                            placeholder="Phone number"
                            inputmode="numeric"
                            maxlength="10"
                            minlength="10"
                            oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)"
                            required
                        >
                    </div>

                    <div class="bb-profile-field bb-profile-field-wide">
                        <label for="sc_form_house_number">
                            ADDRESS
                        </label>

                        <input
                            id="sc_form_house_number"
                            type="text"
                            name="house_number"
                            value="{{ old('house_number', $user->house_number) }}"
                            placeholder="Address"
                        >
                    </div>

                    <div class="bb-profile-field">
                        <label for="sc_form_subdistrict">
                            SUBDISTRICT
                        </label>

                        <input
                            id="sc_form_subdistrict"
                            type="text"
                            name="subdistrict"
                            value="{{ old('subdistrict', $user->subdistrict) }}"
                            placeholder="Subdistrict"
                        >
                    </div>

                    <div class="bb-profile-field">
                        <label for="sc_form_district">
                            DISTRICT
                        </label>

                        <input
                            id="sc_form_district"
                            type="text"
                            name="district"
                            value="{{ old('district', $user->district) }}"
                            placeholder="District"
                        >
                    </div>

                    <div class="bb-profile-field">
                        <label for="sc_form_province">
                            PROVINCE
                        </label>

                        <input
                            id="sc_form_province"
                            type="text"
                            name="province"
                            value="{{ old('province', $user->province) }}"
                            placeholder="Province"
                        >
                    </div>

                    <div class="bb-profile-field">
                        <label for="sc_form_postal_code">
                            POSTAL CODE
                        </label>

                        <input
                            id="sc_form_postal_code"
                            type="text"
                            name="postal_code"
                            value="{{ old('postal_code', $user->postal_code) }}"
                            placeholder="Postal code"
                            inputmode="numeric"
                            maxlength="5"
                            oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,5)"
                        >
                    </div>

                </div>

                <div class="bb-profile-actions">

                    <button
                        type="submit"
                        class="bb-profile-submit"
                    >
                        SAVE CHANGES
                    </button>

                </div>

            </form>

        </div>

    </div>

    <style>

        .bb-profile-page,
        .bb-profile-page * {
            box-sizing: border-box;
        }

        .bb-profile-page {
            width: 100%;
            min-height: calc(100vh - 96px);

            padding:
                clamp(42px, 5vw, 72px)
                clamp(20px, 4vw, 56px)
                clamp(55px, 6vw, 88px);

            display: flex;
            justify-content: center;
            align-items: flex-start;

            background: #1d1e22;

            font-family:
                Arial,
                Helvetica,
                sans-serif;
        }

        .bb-profile-card {
            width: min(860px, 100%);

            padding:
                46px
                48px
                0;

            background: #fff;

            border:
                1px solid
                #e6e6e6;

            color: #111;

            box-shadow:
                0 24px 65px
                rgba(0, 0, 0, .28);
        }

        .bb-profile-head {
            margin-bottom: 30px;
        }

        .bb-profile-brand {
            margin-bottom: 11px;

            display: flex;
            align-items: center;
            gap: 9px;

            color: #d7aa00;

            font-size: 10px;
            font-weight: 900;

            letter-spacing: 2px;

            text-transform: uppercase;
        }

        .bb-profile-brand::before {
            content: "";

            width: 24px;
            height: 3px;

            flex: none;

            background: #d7aa00;
        }

        .bb-profile-title {
            margin: 0 !important;

            color: #111 !important;

            font-size:
                clamp(
                    30px,
                    2.2vw,
                    38px
                ) !important;

            font-weight: 900 !important;
            font-style: italic;

            line-height: 1;

            text-transform: uppercase;
        }

        .bb-profile-description {
            margin:
                11px
                0
                0 !important;

            color: #929292;

            font-size: 12px;
            line-height: 1.6;
        }

        .bb-profile-grid {
            display: grid;

            grid-template-columns:
                repeat(
                    2,
                    minmax(0, 1fr)
                );

            gap:
                19px
                22px;
        }

        .bb-profile-field-wide {
            grid-column: 1 / -1;
        }

        .bb-profile-field label {
            display: block;

            margin:
                0
                0
                8px;

            color: #111;

            font-size: 9px;
            font-weight: 900;

            letter-spacing: 1.55px;

            line-height: 1;

            text-transform: uppercase;
        }

        .bb-profile-field input {
            width: 100% !important;
            height: 48px !important;

            margin: 0 !important;

            padding:
                0
                15px !important;

            border:
                1px solid
                #dadada !important;

            border-radius: 0 !important;

            outline: none !important;

            background:
                #fff !important;

            color:
                #111 !important;

            font-size:
                13px !important;

            box-shadow:
                none !important;

            transition:
                border-color .2s ease,
                background .2s ease;
        }

        .bb-profile-field input::placeholder {
            color: #999;

            opacity: 1;
        }

        .bb-profile-field input:focus {
            border-color:
                #ffa51f !important;
        }

        .bb-profile-field input:disabled {
            background:
                #f3f3f3 !important;

            color:
                #777 !important;

            cursor:
                not-allowed;

            opacity: 1;
        }

        .bb-profile-actions {
            margin-top: 28px;
        }

        .bb-profile-submit {
            width: 100%;
            height: 50px;

            padding: 0;

            border: 0;
            border-radius: 0;

            background: #ffa51f;

            color: #fff;

            font-size: 10px;
            font-weight: 900;

            letter-spacing: .5px;

            cursor: pointer;

            transition:
                background .2s ease;
        }

        .bb-profile-submit:hover {
            background: #ffb84a;
        }

        .bb-profile-success {
            margin:
                0
                0
                22px;

            padding:
                13px
                15px;

            border:
                1px solid
                #d7aa00;

            background:
                #fff7d1;

            color:
                #5c4a00;

            font-size:
                11px;

            line-height:
                1.5;
        }

        .bb-profile-errors {
            margin:
                0
                0
                22px;

            padding:
                13px
                15px;

            border:
                1px solid
                #f5a000;

            background:
                #171717;

            color:
                #fff;

            font-size:
                11px;

            line-height:
                1.5;
        }

        .bb-profile-errors strong {
            display: block;

            margin-bottom: 5px;

            color: #ffd429;

            font-size: 9px;

            letter-spacing:
                1.3px;
        }

        .bb-profile-errors ul {
            margin: 0;

            padding-left:
                17px;
        }

        .bb-profile-card::after {
            content: "";

            display: block;

            width:
                calc(
                    100% + 96px
                );

            height: 14px;

            margin:
                34px
                -48px
                0;

            background:
                #ffa51f;
        }


        @media (min-width: 1400px) {

            .bb-profile-card {
                width:
                    min(
                        900px,
                        100%
                    );
            }

        }


        @media (max-width: 1024px) {

            .bb-profile-page {
                min-height:
                    calc(
                        100vh - 78px
                    );

                padding:
                    48px
                    24px
                    70px;
            }

            .bb-profile-card {
                width:
                    min(
                        760px,
                        100%
                    );

                padding:
                    42px
                    40px
                    0;
            }

            .bb-profile-card::after {
                width:
                    calc(
                        100% + 80px
                    );

                margin-right:
                    -40px;

                margin-left:
                    -40px;
            }

        }


        @media (max-width: 768px) {

            .bb-profile-page {
                padding:
                    36px
                    18px
                    56px;
            }

            .bb-profile-card {
                padding:
                    36px
                    30px
                    0;
            }

            .bb-profile-grid {
                gap:
                    17px;
            }

            .bb-profile-card::after {
                width:
                    calc(
                        100% + 60px
                    );

                margin-right:
                    -30px;

                margin-left:
                    -30px;
            }

        }


        @media (max-width: 600px) {

            .bb-profile-page {
                min-height:
                    calc(
                        100vh - 72px
                    );

                padding:
                    22px
                    12px
                    38px;
            }

            .bb-profile-card {
                width:
                    100%;

                padding:
                    30px
                    22px
                    0;
            }

            .bb-profile-head {
                margin-bottom:
                    25px;
            }

            .bb-profile-brand {
                font-size:
                    9px;
            }

            .bb-profile-title {
                font-size:
                    28px !important;
            }

            .bb-profile-description {
                font-size:
                    11px;
            }

            .bb-profile-grid {
                grid-template-columns:
                    1fr;

                gap:
                    16px;
            }

            .bb-profile-field-wide {
                grid-column:
                    auto;
            }

            .bb-profile-field input {
                height:
                    47px !important;

                font-size:
                    16px !important;
            }

            .bb-profile-actions {
                margin-top:
                    24px;
            }

            .bb-profile-submit {
                height:
                    48px;
            }

            .bb-profile-card::after {
                width:
                    calc(
                        100% + 44px
                    );

                height:
                    12px;

                margin:
                    28px
                    -22px
                    0;
            }

        }


        @media (max-width: 380px) {

            .bb-profile-card {
                padding-right:
                    18px;

                padding-left:
                    18px;
            }

            .bb-profile-card::after {
                width:
                    calc(
                        100% + 36px
                    );

                margin-right:
                    -18px;

                margin-left:
                    -18px;
            }

        }

    </style>

</x-guest-layout>