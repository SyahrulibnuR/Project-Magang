
<x-guest-layout>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #cbd8e7;
        }

        .sm-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background: #cbd8e7;
            font-family: Arial, Helvetica, sans-serif;
        }

        .sm-card {
            width: 100%;
            max-width: 1180px;
            min-height: 590px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #fff;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(35, 48, 75, .12);
        }

        /* LEFT PANEL */

        .sm-visual {
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 55px 48px 42px;
            color: white;
            background: linear-gradient(145deg, #2910ed, #1800a8);
        }

        .sm-visual::before {
            content: "";
            position: absolute;
            width: 700px;
            height: 700px;
            border-radius: 50%;
            background: rgba(10, 0, 110, .35);
            top: -100px;
            left: 100px;
        }

        .sm-visual::after {
            content: "";
            position: absolute;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            background: rgba(255,255,255,.08);
            bottom: -110px;
            left: -90px;
        }

        .sm-brand-small {
            position: relative;
            z-index: 2;
            font-size: 18px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .sm-brand-small span {
            color: #ff777d;
        }

        .sm-illustration {
            position: relative;
            z-index: 2;
            margin: 35px auto 20px;
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 25px;
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.18);
            backdrop-filter: blur(8px);
            text-align: center;
        }

        .sm-icon-circle {
            width: 115px;
            height: 115px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 35px;
            background: rgba(255,255,255,.95);
            color: #2910ed;
            box-shadow: 0 15px 35px rgba(0,0,0,.15);
        }

        .sm-icon-circle svg {
            width: 65px;
            height: 65px;
        }

        .sm-bubble {
            display: inline-block;
            margin: 22px 5px 0;
            padding: 9px 15px;
            border-radius: 20px;
            background: rgba(255,255,255,.17);
            font-size: 12px;
        }

        .sm-visual-content {
            position: relative;
            z-index: 2;
            max-width: 400px;
            margin: 0 auto;
            text-align: left;
        }

        .sm-visual-content h2 {
            font-size: 28px;
            line-height: 1.3;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .sm-visual-content h2 span {
            color: #ff9298;
        }

        .sm-visual-content p {
            font-size: 13px;
            line-height: 1.9;
            color: rgba(255,255,255,.78);
        }

        .sm-footer-left {
            position: relative;
            z-index: 2;
            font-size: 11px;
            color: rgba(255,255,255,.65);
            margin-top: 30px;
        }

        /* RIGHT PANEL */

        .sm-form-panel {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 55px 65px;
            background: #fff;
        }

        .sm-form-content {
            width: 100%;
            max-width: 370px;
        }

        .sm-logo-text {
            text-align: center;
            margin-bottom: 45px;
        }

        .sm-logo-text h1 {
            font-size: 27px;
            font-weight: 900;
            letter-spacing: 1px;
            color: #17395e;
        }

        .sm-logo-text h1 span {
            color: #d72c3b;
        }

        .sm-logo-text p {
            margin-top: 5px;
            color: #8792a1;
            font-size: 11px;
            letter-spacing: 3px;
            font-weight: 600;
        }

        .sm-heading {
            font-size: 24px;
            font-weight: 800;
            color: #1d2939;
            margin-bottom: 8px;
        }

        .sm-subheading {
            color: #929baa;
            font-size: 13px;
            margin-bottom: 30px;
            line-height: 1.7;
        }

        .sm-field {
            margin-bottom: 20px;
        }

        .sm-field label {
            display: block;
            margin-bottom: 9px;
            font-size: 13px;
            font-weight: 700;
            color: #344054;
        }

        .sm-field input {
            width: 100%;
            height: 49px;
            border: 1px solid #e4e8ef;
            border-radius: 9px;
            background: #f7f8fa;
            padding: 0 15px;
            outline: none;
            font-size: 13px;
            color: #344054;
            transition: .2s;
        }

        .sm-field input:focus {
            background: white;
            border-color: #3020d9;
            box-shadow: 0 0 0 3px rgba(48,32,217,.08);
        }

        .sm-field input::placeholder {
            color: #b2bac5;
        }

        .sm-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 5px 0 25px;
            font-size: 12px;
        }

        .sm-remember {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #667085;
        }

        .sm-remember input {
            accent-color: #2910ed;
        }

        .sm-link {
            color: #3020d9;
            text-decoration: none;
            font-weight: 600;
        }

        .sm-link:hover {
            color: #d72c3b;
        }

        .sm-button {
            width: 100%;
            height: 49px;
            border: none;
            border-radius: 9px;
            background: #2810df;
            color: white;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 1px;
            cursor: pointer;
            box-shadow: 0 8px 18px rgba(40,16,223,.18);
            transition: .2s;
        }

        .sm-button:hover {
            background: #1900b8;
            transform: translateY(-1px);
        }

        .sm-register {
            margin-top: 27px;
            text-align: center;
            font-size: 12px;
            color: #929baa;
        }

        .sm-divider {
            height: 1px;
            background: #edf0f4;
            margin: 35px 0 18px;
        }

        .sm-bottom {
            text-align: center;
            font-size: 11px;
            color: #a0a8b4;
            line-height: 1.8;
        }

        .sm-error {
            color: #dc2626;
            font-size: 11px;
            margin-top: 6px;
        }

        .sm-status {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            background: #ecfdf3;
            color: #15803d;
            font-size: 12px;
        }

        @media(max-width: 850px) {
            .sm-page {
                padding: 20px;
            }

            .sm-card {
                grid-template-columns: 1fr;
                max-width: 520px;
                min-height: auto;
            }

            .sm-visual {
                display: none;
            }

            .sm-form-panel {
                padding: 55px 30px;
            }
        }

        @media(max-width: 480px) {
            .sm-page {
                padding: 12px;
            }

            .sm-card {
                border-radius: 18px;
            }

            .sm-form-panel {
                padding: 40px 22px;
            }
        }
    </style>

    <div class="sm-page">
        <div class="sm-card">

            <!-- PANEL KIRI -->
            <section class="sm-visual">

                <div class="sm-brand-small">
                    SUARA <span>MERDEKA</span>
                </div>

                <div class="sm-illustration">
                    <div class="sm-icon-circle">
                        <svg viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 13v-2a9 9 0 0 1 18 0v2"/>
                            <path d="M5 13h2v6H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2Z"/>
                            <path d="M17 13h2a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-2v-6Z"/>
                            <path d="M17 19c0 2-2 3-5 3"/>
                        </svg>
                    </div>

                    <div class="sm-bubble">Customer Service</div>
                    <div class="sm-bubble">Help & Support</div>
                </div>

                <div class="sm-visual-content">
                    <h2>
                        Kami Siap <span>Mendengar</span> Anda.
                    </h2>

                    <p>
                        Sampaikan pertanyaan, masukan, dan pengaduan
                        Anda melalui layanan pelanggan Suara Merdeka.
                        Kami hadir untuk memberikan pelayanan terbaik.
                    </p>
                </div>

                <div class="sm-footer-left">
                    © {{ date('Y') }} Suara Merdeka Customer Care
                </div>

            </section>

            <!-- PANEL KANAN -->
            <section class="sm-form-panel">
                <div class="sm-form-content">

                    <div class="sm-logo-text">
                        <h1>SUARA <span>MERDEKA</span></h1>
                        <p>CUSTOMER CARE</p>
                    </div>

                    <h2 class="sm-heading">Sign in</h2>

                    <p class="sm-subheading">
                        Selamat datang kembali. Silakan masuk
                        untuk melanjutkan ke layanan pelanggan.
                    </p>

                    @if (session('status'))
                        <div class="sm-status">
                            {{ session('status') }}
                        </div>
                        
                    @endif

                    

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="sm-field">
                            <label for="email">Email Address</label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email"
                                required
                                autofocus
                                autocomplete="username"
                            >

                            @error('email')
                                <p class="sm-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm-field">
                            <label for="password">Password</label>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                placeholder="Masukkan password"
                                required
                                autocomplete="current-password"
                            >

                            @error('password')
                                <p class="sm-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm-options">
                            <label class="sm-remember">
                                <input
                                    type="checkbox"
                                    name="remember"
                                    value="1"
                                >
                                Ingat saya
                            </label>

                            @if (Route::has('password.request'))
                                <a class="sm-link"
                                   href="{{ route('password.request') }}">
                                    Lupa Password?
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="sm-button">
                            SIGN IN
                        </button>
                    </form>

                    <div class="sm-register">
                        Belum mempunyai akun?
                        <a href="{{ route('register') }}" class="sm-link">
                            Daftar Sekarang
                        </a>
                    </div>

                    <div class="sm-divider"></div>

                    <div class="sm-bottom">
                        Suara Merdeka Customer Care<br>
                        Layanan Pengaduan dan Informasi Pelanggan
                    </div>

                </div>
            </section>

        </div>
    </div>
</x-guest-layout>
