<x-guest-layout>

    <div class="bb-forgot-page">

        <div class="bb-forgot-card">

            <div class="bb-forgot-brand">
                BUFFBRIDGE
            </div>

            <h1 class="bb-forgot-title">
                FORGOT PASSWORD
            </h1>

            <p class="bb-forgot-description">
                Enter your email address and we'll send you a password reset link.
            </p>

            @if (session('status'))
                <div class="bb-forgot-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bb-forgot-errors">
                    <strong>REQUEST FAILED</strong>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                method="POST"
                action="{{ route('password.email') }}"
            >
                @csrf

                <div class="bb-forgot-field">

                    <label for="email">
                        E-MAIL
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Email address"
                        autocomplete="email"
                        required
                        autofocus
                    >

                </div>

                <button
                    type="submit"
                    class="bb-forgot-submit"
                >
                    SEND RESET LINK
                </button>

            </form>

            <a
                href="{{ route('home') }}"
                class="bb-forgot-back"
            >
                BACK TO H
            </a>

        </div>

    </div>


    <style>

        .bb-forgot-page,
        .bb-forgot-page * {
            box-sizing: border-box;
        }


        .bb-forgot-page {
            width: 100%;
            min-height: 520px;

            padding: 64px 20px;

            display: flex;
            align-items: flex-start;
            justify-content: center;

            background: #111;

            font-family: Arial, Helvetica, sans-serif;
        }


        .bb-forgot-card {
            width: min(520px, 100%);

            padding: 42px 42px 0;

            background: #fff;
            border: 1px solid #e5e5e5;

            color: #111;

            box-shadow:
                0 24px 65px rgba(0, 0, 0, .28);
        }


        .bb-forgot-brand {
            margin-bottom: 12px;

            display: flex;
            align-items: center;
            gap: 9px;

            color: #d7aa00;

            font-size: 10px;
            font-weight: 900;

            letter-spacing: 2px;

            text-transform: uppercase;
        }


        .bb-forgot-brand::before {
            content: "";

            width: 24px;
            height: 3px;

            flex: none;

            background: #d7aa00;
        }


        .bb-forgot-title {
            margin: 0 !important;

            color: #111 !important;

            font-size: 30px !important;
            font-weight: 900 !important;
            font-style: italic;

            line-height: 1;

            text-transform: uppercase;
        }


        .bb-forgot-description {
            margin: 10px 0 26px !important;

            color: #999;

            font-size: 12px;
            line-height: 1.6;
        }


        .bb-forgot-field label {
            display: block;

            margin: 0 0 8px;

            color: #111;

            font-size: 9px;
            font-weight: 900;

            letter-spacing: 1.7px;

            text-transform: uppercase;
        }


        .bb-forgot-field input {
            width: 100% !important;
            height: 48px !important;

            margin: 0 !important;
            padding: 0 15px !important;

            border: 1px solid #dadada !important;
            border-radius: 0 !important;

            outline: none !important;

            background: #fff !important;
            color: #111 !important;

            font-size: 13px !important;

            box-shadow: none !important;

            transition:
                border-color .2s ease;
        }


        .bb-forgot-field input::placeholder {
            color: #999;

            opacity: 1;
        }


        .bb-forgot-field input:focus {
            border-color: #ffa51f !important;
        }


        .bb-forgot-submit {
            width: 100%;
            height: 48px;

            margin-top: 20px;

            padding: 0;

            border: 0;
            border-radius: 0;

            background: #ffa51f;

            color: #fff;

            font-size: 10px;
            font-weight: 900;

            letter-spacing: .4px;

            cursor: pointer;

            transition:
                background .2s ease;
        }


        .bb-forgot-submit:hover {
            background: #ffb84a;
        }


        .bb-forgot-success {
            margin: 0 0 18px;

            padding: 12px 14px;

            border: 1px solid #d7aa00;

            background: #fff7d1;

            color: #5c4a00;

            font-size: 11px;
            line-height: 1.5;
        }


        .bb-forgot-errors {
            margin: 0 0 18px;

            padding: 12px 14px;

            border: 1px solid #f5a000;

            background: #171717;

            color: #fff;

            font-size: 11px;
            line-height: 1.5;
        }


        .bb-forgot-errors strong {
            display: block;

            margin-bottom: 5px;

            color: #ffd429;

            font-size: 9px;

            letter-spacing: 1.3px;
        }


        .bb-forgot-errors ul {
            margin: 0;

            padding-left: 17px;
        }


        .bb-forgot-back {
            width: calc(100% + 84px);
            height: 52px;

            margin:
                26px -42px 0;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #ffa51f;

            color: #fff !important;

            text-decoration: none !important;

            font-size: 11px;
            font-weight: 800;

            transition:
                background .2s ease;
        }


        .bb-forgot-back:hover {
            background: #ffb84a;

            color: #fff !important;
        }


        @media (max-width: 768px) {

            .bb-forgot-page {
                min-height: 460px;

                padding:
                    40px 16px;
            }

        }


        @media (max-width: 600px) {

            .bb-forgot-page {
                min-height: 420px;

                padding:
                    24px 12px;
            }


            .bb-forgot-card {
                padding:
                    30px 22px 0;
            }


            .bb-forgot-title {
                font-size: 27px !important;
            }


            .bb-forgot-description {
                font-size: 11px;
            }


            .bb-forgot-field input {
                height: 47px !important;

                font-size: 16px !important;
            }


            .bb-forgot-back {
                width: calc(100% + 44px);

                margin-right: -22px;
                margin-left: -22px;
            }

        }

    </style>

</x-guest-layout>