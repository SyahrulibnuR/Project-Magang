
<x-guest-layout>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #eaf4ff;
    }

    .login-page {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 25px;
        background: linear-gradient(135deg, #dceeff, #f5faff);
    }

    .login-card {
        width: 100%;
        max-width: 1000px;
        min-height: 590px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        background: white;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(40, 100, 160, .12);
    }

    .login-left {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 50px 40px;
        color: white;
        background: linear-gradient(145deg, #168fe5, #075ca8);
    }

    .left-brand {
        font-size: 19px;
        font-weight: 900;
        letter-spacing: 2px;
    }

    .left-content {
        text-align: center;
        padding: 20px;
    }

    .left-icon {
        width: 125px;
        height: 125px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 30px;
        border-radius: 35px;
        color: #1685d4;
        background: white;
    }

    .left-icon svg {
        width: 65px;
        height: 65px;
    }

    .left-content h2 {
        font-size: 27px;
        line-height: 1.4;
        font-weight: 800;
    }

    .left-content p {
        color: rgba(255,255,255,.8);
        font-size: 13px;
        line-height: 1.9;
    }

    .left-footer {
        font-size: 11px;
        color: rgba(255,255,255,.7);
    }

    .login-right {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 45px;
    }

    .form-content {
        width: 100%;
        max-width: 360px;
    }

    .brand {
        text-align: center;
        margin-bottom: 38px;
    }

    .brand h1 {
        font-size: 27px;
        color: #173e63;
        font-weight: 900;
    }

    .brand h1 span {
        color: #1685d4;
    }

    .brand p {
        color: #91a3b5;
        font-size: 11px;
        letter-spacing: 4px;
        font-weight: bold;
    }

    .form-heading {
        font-size: 24px;
        font-weight: 800;
        color: #173e63;
        margin-bottom: 9px;
    }

    .form-description {
        color: #8798a9;
        font-size: 13px;
        line-height: 1.8;
        margin-bottom: 25px;
    }

    .form-field {
        margin-bottom: 20px;
    }

    .form-field label {
        display: block;
        color: #344054;
        font-size: 13px;
        font-weight: bold;
        margin-bottom: 9px;
    }

    .form-field input {
        width: 100%;
        height: 49px;
        padding: 0 14px;
        border: 1px solid #e0e8f0;
        border-radius: 9px;
        background: #f8fbff;
        outline: none;
        font-size: 13px;
    }

    .form-field input:focus {
        border-color: #1685d4;
        background: white;
        box-shadow: 0 0 0 3px rgba(22,133,212,.1);
    }

    .remember {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #667085;
        font-size: 12px;
        margin: 5px 0 22px;
    }

    .remember input {
        accent-color: #1685d4;
    }

    .login-button {
        width: 100%;
        height: 49px;
        border: none;
        border-radius: 9px;
        background: #1685d4;
        color: white;
        font-size: 13px;
        font-weight: bold;
        letter-spacing: 1px;
        cursor: pointer;
        transition: .3s;
    }

    .login-button:hover {
        background: #086bb4;
        transform: translateY(-2px);
    }

    .form-error {
        color: #dc2626;
        font-size: 11px;
        margin-top: 7px;
    }

    .form-status {
        padding: 12px;
        margin-bottom: 18px;
        border-radius: 8px;
        background: #ecfdf3;
        color: #15803d;
        font-size: 12px;
    }

    .back-link {
        display: block;
        text-align: center;
        margin-top: 22px;
        color: #1685d4;
        text-decoration: none;
        font-size: 12px;
        font-weight: bold;
    }

    .register-link {
        text-align: center;
        margin-top: 22px;
        font-size: 12px;
        color: #8798a9;
    }

    .register-link a,
    .forgot-link {
        color: #1685d4;
        text-decoration: none;
        font-weight: bold;
    }

    .forgot-link {
        font-size: 12px;
    }

    .form-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 23px;
    }

    @media(max-width: 800px) {
        .login-card {
            grid-template-columns: 1fr;
            max-width: 480px;
        }

        .login-left {
            display: none;
        }

        .login-right {
            padding: 45px 30px;
        }
    }

    @media(max-width: 480px) {
        .login-page {
            padding: 12px;
        }

        .login-card {
            border-radius: 18px;
        }

        .login-right {
            padding: 35px 22px;
        }
    }
</style>

<div class="login-page">

    <div class="login-card">

        <!-- PANEL KIRI -->
        <section class="login-left">

            <div class="left-brand">
                SUARA MERDEKA
            </div>

            <div class="left-content">

                <div class="left-icon">
                    @if($loginType === 'admin')
                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="1.5"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11z"/>
                            <path d="m9 12 2 2 4-4"/>
                        </svg>
                    @else
                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="1.5"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <circle cx="12" cy="8" r="4"/>
                            <path d="M5 21v-2a7 7 0 0 1 14 0v2"/>
                        </svg>
                    @endif
                </div>

                <h2>
                    @if($loginType === 'admin')
                        Portal Administrator
                    @else
                        Layanan Pelanggan
                    @endif
                </h2>

                <p>
                    @if($loginType === 'admin')
                        Kelola pengaduan, informasi dan pelayanan
                        pelanggan Suara Merdeka melalui portal admin.
                    @else
                        Sampaikan pertanyaan, masukan dan pengaduan
                        melalui layanan pelanggan Suara Merdeka.
                    @endif
                </p>

            </div>

            <div class="left-footer">
                © {{ date('Y') }} Suara Merdeka Customer Care
            </div>

        </section>

        <!-- PANEL KANAN -->
        <section class="login-right">

            <div class="form-content">

                <div class="brand">
                    <h1>SUARA <span>MERDEKA</span></h1>
                    <p>CUSTOMER CARE</p>
                </div>

                <h2 class="form-heading">
                    Login {{ $loginType === 'admin' ? 'Admin' : 'User' }}
                </h2>

                <p class="form-description">
                    Selamat datang kembali. Silakan masukkan
                    email dan password untuk melanjutkan.
                </p>

                @if(session('status'))
                    <div class="form-status">
                        {{ session('status') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="form-error" style="margin-bottom:15px;">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <input type="hidden"
                           name="login_type"
                           value="{{ $loginType }}">

                    <div class="form-field">
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
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-field">
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
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-options">

                        <label class="remember">
                            <input
                                type="checkbox"
                                name="remember"
                                value="1"
                            >
                            Ingat saya
                        </label>

                        @if($loginType === 'user' && Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="forgot-link">
                                Lupa Password?
                            </a>
                        @endif

                    </div>

                    <button type="submit" class="login-button">
                        SIGN IN
                    </button>

                </form>

                @if($loginType === 'user')
                    <div class="register-link">
                        Belum mempunyai akun?
                        <a href="{{ route('register') }}">
                            Daftar Sekarang
                        </a>
                    </div>
                @endif

                <a href="{{ route('login') }}" class="back-link">
                    ← Kembali ke pilihan login
                </a>

            </div>

        </section>

    </div>

</div>

</x-guest-layout>
