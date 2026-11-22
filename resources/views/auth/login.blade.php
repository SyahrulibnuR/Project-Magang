
<x-guest-layout>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .choice-page {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 25px;
        background: linear-gradient(135deg, #dceeff, #f4faff);
    }

    .choice-card {
        width: 100%;
        max-width: 950px;
        padding: 55px;
        background: white;
        border-radius: 25px;
        box-shadow: 0 20px 60px rgba(40, 100, 160, .12);
        text-align: center;
    }

    .brand {
        font-size: 30px;
        font-weight: 900;
        color: #173e63;
        letter-spacing: 1px;
    }

    .brand span {
        color: #1685d4;
    }

    .brand-subtitle {
        color: #91a3b5;
        font-size: 11px;
        letter-spacing: 4px;
        margin-top: 8px;
        font-weight: bold;
    }

    .heading {
        margin-top: 45px;
        color: #173e63;
        font-size: 28px;
        font-weight: 800;
    }

    .description {
        color: #8798a9;
        font-size: 14px;
        margin: 12px 0 38px;
    }

    .choice-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
    }

    .choice-item {
        display: block;
        text-decoration: none;
        padding: 35px 25px;
        border: 1px solid #e1edf8;
        border-radius: 20px;
        background: #fafdff;
        transition: .3s;
    }

    .choice-item:hover {
        transform: translateY(-7px);
        border-color: #54a8e9;
        box-shadow: 0 15px 30px rgba(40, 120, 190, .12);
    }

    .choice-icon {
        width: 85px;
        height: 85px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto 22px;
        border-radius: 22px;
        background: #e3f2ff;
        color: #1685d4;
    }

    .choice-icon svg {
        width: 43px;
        height: 43px;
    }

    .choice-item h3 {
        color: #173e63;
        font-size: 21px;
        margin-bottom: 12px;
    }

    .choice-item p {
        color: #8798a9;
        font-size: 13px;
        line-height: 1.8;
        min-height: 48px;
    }

    .choice-button {
        display: block;
        padding: 14px;
        margin-top: 22px;
        border-radius: 10px;
        background: #1685d4;
        color: white;
        font-size: 12px;
        font-weight: bold;
        letter-spacing: 1px;
        transition: .3s;
    }

    .choice-item:hover .choice-button {
        background: #086bb4;
    }

    .footer {
        margin-top: 40px;
        color: #a0afbd;
        font-size: 12px;
        line-height: 1.8;
    }

    @media(max-width: 650px) {
        .choice-card {
            padding: 35px 20px;
        }

        .choice-container {
            grid-template-columns: 1fr;
        }

        .heading {
            margin-top: 30px;
            font-size: 23px;
        }
    }
</style>

<div class="choice-page">

    <div class="choice-card">

        <div class="brand">
            SUARA <span>MERDEKA</span>
        </div>

        <div class="brand-subtitle">
            CUSTOMER CARE
        </div>

        <h2 class="heading">
            Selamat Datang
        </h2>

        <p class="description">
            Silakan pilih jenis akun untuk masuk ke layanan
            Suara Merdeka Customer Care.
        </p>

        <div class="choice-container">

            <!-- LOGIN ADMIN -->
            <a href="{{ route('login.admin') }}"
               class="choice-item">

                <div class="choice-icon">
                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.7"
                         stroke-linecap="round"
                         stroke-linejoin="round">

                        <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11z"/>
                        <path d="m9 12 2 2 4-4"/>

                    </svg>
                </div>

                <h3>Login Admin</h3>

                <p>
                    Masuk sebagai administrator untuk
                    mengelola pengaduan dan pelayanan pelanggan.
                </p>

                <div class="choice-button">
                    MASUK SEBAGAI ADMIN
                </div>

            </a>

            <!-- LOGIN USER -->
            <a href="{{ route('login.user') }}"
               class="choice-item">

                <div class="choice-icon">
                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.7"
                         stroke-linecap="round"
                         stroke-linejoin="round">

                        <circle cx="12" cy="8" r="4"/>
                        <path d="M5 21v-2a7 7 0 0 1 14 0v2"/>

                    </svg>
                </div>

                <h3>Login User</h3>

                <p>
                    Masuk sebagai pengguna untuk membuat
                    dan memantau pengaduan.
                </p>

                <div class="choice-button">
                    MASUK SEBAGAI USER
                </div>

            </a>

        </div>

        <div class="footer">
            © {{ date('Y') }} Suara Merdeka Customer Care
            <br>
            Layanan Pengaduan dan Informasi Pelanggan
        </div>

    </div>

</div>

</x-guest-layout>
