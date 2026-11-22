
<x-guest-layout>
    <style>
        .sm-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 35px;
            background: #cbd8e7;
            font-family: Arial, sans-serif;
        }

        .sm-card {
            width: 100%;
            max-width: 1180px;
            min-height: 650px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: white;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(35,48,75,.12);
        }

        .sm-visual {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 50px;
            color: white;
            background: linear-gradient(145deg,#2910ed,#1800a8);
        }

        .sm-brand {
            font-size: 19px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .sm-brand span { color: #ff9298; }

        .sm-art {
            text-align: center;
            padding: 45px 20px;
            border-radius: 25px;
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.18);
        }

        .sm-art-icon {
            font-size: 75px;
            margin-bottom: 15px;
        }

        .sm-visual h2 {
            font-size: 30px;
            line-height: 1.3;
            font-weight: 800;
        }

        .sm-visual h2 span { color: #ff9298; }

        .sm-visual p {
            margin-top: 12px;
            color: #e0e7ff;
            font-size: 13px;
            line-height: 1.9;
        }

        .sm-form-panel {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 45px 65px;
        }

        .sm-form-content {
            width: 100%;
            max-width: 370px;
        }

        .sm-logo {
            text-align: center;
            margin-bottom: 35px;
        }

        .sm-logo h1 {
            font-size: 26px;
            font-weight: 900;
            color: #17395e;
        }

        .sm-logo h1 span { color: #d72c3b; }

        .sm-logo p {
            color: #8792a1;
            font-size: 11px;
            letter-spacing: 3px;
        }

        .sm-heading {
            font-size: 25px;
            font-weight: 800;
            color: #1d2939;
        }

        .sm-description {
            margin: 8px 0 25px;
            font-size: 13px;
            line-height: 1.7;
            color: #929baa;
        }

        .sm-field { margin-bottom: 17px; }

        .sm-field label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 700;
            color: #344054;
        }

        .sm-field input {
            width: 100%;
            height: 46px;
            padding: 0 14px;
            border: 1px solid #e4e8ef;
            border-radius: 9px;
            background: #f7f8fa;
            outline: none;
            font-size: 13px;
        }

        .sm-field input:focus {
            border-color: #3020d9;
            background: white;
            box-shadow: 0 0 0 3px rgba(48,32,217,.08);
        }

        .sm-error {
            margin-top: 5px;
            color: #dc2626;
            font-size: 11px;
        }

        .sm-button {
            width: 100%;
            height: 48px;
            border: 0;
            border-radius: 9px;
            background: #2810df;
            color: white;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 1px;
            cursor: pointer;
            transition: .2s;
        }

        .sm-button:hover {
            background: #1900b8;
        }

        .sm-register-link {
            margin-top: 22px;
            text-align: center;
            color: #929baa;
            font-size: 12px;
        }

        .sm-register-link a {
            color: #3020d9;
            font-weight: 700;
            text-decoration: none;
        }

        .sm-footer {
            border-top: 1px solid #edf0f4;
            margin-top: 28px;
            padding-top: 18px;
            text-align: center;
            color: #a0a8b4;
            font-size: 11px;
            line-height: 1.8;
        }

        @media(max-width:850px) {
            .sm-page { padding: 15px; }
            .sm-card {
                grid-template-columns: 1fr;
                max-width: 520px;
            }
            .sm-visual { display: none; }
            .sm-form-panel { padding: 45px 25px; }
        }
    </style>

    <div class="sm-page">
        <div class="sm-card">

            <!-- PANEL KIRI -->
            <section class="sm-visual">
                <div class="sm-brand">
                    SUARA <span>MERDEKA</span>
                </div>

                <div class="sm-art">
                    <div class="sm-art-icon">✉</div>
                    <h3 class="text-xl font-bold">
                        Customer Care
                    </h3>
                    <p class="text-sm text-blue-100">
                        Your Voice Matters
                    </p>
                </div>

                <div>
                    <h2>
                        Bergabung dan
                        <span>Terhubung</span>
                        Bersama Kami.
                    </h2>

                    <p>
                        Buat akun untuk menyampaikan pengaduan,
                        mendapatkan informasi, dan memantau
                        layanan pelanggan Suara Merdeka.
                    </p>
                </div>

                <div class="text-xs text-blue-200">
                    © {{ date('Y') }} Suara Merdeka Customer Care
                </div>
            </section>

            <!-- PANEL KANAN -->
            <section class="sm-form-panel">
                <div class="sm-form-content">

                    <div class="sm-logo">
                        <h1>SUARA <span>MERDEKA</span></h1>
                        <p>CUSTOMER CARE</p>
                    </div>

                    <h2 class="sm-heading">Create Account</h2>

                    <p class="sm-description">
                        Silakan lengkapi data berikut untuk
                        membuat akun layanan pelanggan.
                    </p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="sm-field">
                            <label for="name">Nama Lengkap</label>
                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Masukkan nama lengkap"
                                required
                                autofocus
                                autocomplete="name"
                            >
                            @error('name')
                                <p class="sm-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm-field">
                            <label for="email">Alamat Email</label>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="nama@email.com"
                                required
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
                                placeholder="Minimal 8 karakter"
                                required
                                autocomplete="new-password"
                            >
                            @error('password')
                                <p class="sm-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm-field">
                            <label for="password_confirmation">
                                Konfirmasi Password
                            </label>
                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                placeholder="Ulangi password"
                                required
                                autocomplete="new-password"
                            >
                        </div>

                        <button type="submit" class="sm-button">
                            CREATE ACCOUNT
                        </button>
                    </form>

                    <div class="sm-register-link">
                        Sudah memiliki akun?
                        <a href="{{ route('login') }}">Sign in</a>
                    </div>

                    <div class="sm-footer">
                        Suara Merdeka Customer Care<br>
                        Layanan Pengaduan dan Informasi Pelanggan
                    </div>

                </div>
            </section>

        </div>
    </div>
</x-guest-layout>
