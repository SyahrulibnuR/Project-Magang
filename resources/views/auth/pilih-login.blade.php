
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Login - Suara Merdeka Customer Care</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(115deg, #dceeff, #f0f8ff);
        }

        .choice-page {
            min-height: 100vh;
            padding: 35px 25px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .choice-card {
            width: 100%;
            max-width: 1156px;
            min-height: 860px;
            padding: 76px 67px 30px;
            background: white;
            border-radius: 30px;
            box-shadow: 0 20px 60px rgba(40,100,160,.10);
            text-align: center;
        }

        .brand {
            font-size: 36px;
            font-weight: 900;
            color: #173e63;
            letter-spacing: 1px;
        }

        .brand span {
            color: #1685d4;
        }

        .brand-subtitle {
            color: #91a3b5;
            font-size: 12px;
            letter-spacing: 5px;
            margin-top: 16px;
            font-weight: bold;
        }

        .heading {
            margin-top: 64px;
            margin-bottom: 20px;
            color: #173e63;
            font-size: 32px;
            font-weight: 800;
        }

        .description {
            color: #8798a9;
            font-size: 16px;
            line-height: 1.8;
            margin: 0 0 43px;
        }

        .choice-container {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 30px;
        }

        .choice-item {
            display: block;
            text-decoration: none;
            padding: 43px 30px;
            border: 1px solid #dceafa;
            border-radius: 25px;
            background: #fafdff;
            transition: all .3s ease;
        }

        .choice-item:hover {
            transform: translateY(-7px);
            border-color: #54a8e9;
            box-shadow: 0 15px 30px rgba(40,120,190,.12);
        }

        .choice-icon {
            width: 103px;
            height: 103px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 32px;
            border-radius: 27px;
            background: #e3f2ff;
            color: #1685d4;
        }

        .choice-icon svg {
            width: 52px;
            height: 52px;
        }

        .choice-item h3 {
            color: #173e63;
            font-size: 23px;
            font-weight: 500;
            margin: 0 0 19px;
        }

        .choice-item p {
            color: #8798a9;
            font-size: 15px;
            line-height: 1.9;
            min-height: 57px;
            margin: 0;
        }

        .choice-button {
            display: block;
            padding: 18px 14px;
            margin-top: 27px;
            border-radius: 12px;
            background: #1685d4;
            color: white;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 1px;
            transition: .3s;
        }

        .choice-item:hover .choice-button {
            background: #086bb4;
        }

        .footer {
            margin-top: 50px;
            color: #91a3b5;
            font-size: 14px;
            line-height: 1.9;
        }

        @media(max-width: 768px) {
            .choice-page {
                padding: 20px 15px;
            }

            .choice-card {
                min-height: auto;
                padding: 45px 25px 30px;
                border-radius: 22px;
            }

            .brand {
                font-size: 28px;
            }

            .heading {
                margin-top: 40px;
                font-size: 26px;
            }

            .description {
                font-size: 14px;
                margin-bottom: 30px;
            }

            .choice-container {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .choice-item {
                padding: 30px 22px;
            }

            .choice-icon {
                width: 85px;
                height: 85px;
                margin-bottom: 22px;
            }

            .choice-icon svg {
                width: 43px;
                height: 43px;
            }

            .footer {
                margin-top: 35px;
            }
        }
    </style>
</head>

<body>

<div class="choice-page">
    <div class="choice-card">

        <div class="brand">
            SUARA <span>MERDEKA</span>
        </div>

        <div class="brand-subtitle">
            CUSTOMER CARE
        </div>

        <h2 class="heading">Selamat Datang</h2>

        <p class="description">
            Silakan pilih jenis akun untuk masuk ke layanan
            Suara Merdeka Customer Care.
        </p>

        <div class="choice-container">

            <!-- LOGIN ADMIN -->
            <a href="{{ route('login.admin') }}" class="choice-item">

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
            <a href="{{ route('login.user') }}" class="choice-item">

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

</body>
</html>
