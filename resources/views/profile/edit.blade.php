
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna - SM Customer Care</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f6f7f9;
            color: #172033;
        }

        a {
            text-decoration: none;
        }

        .navbar {
            background: white;
            height: 76px;
            padding: 0 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #eee;
        }

        .brand {
            color: #bd171d;
            font-size: 19px;
            font-weight: 800;
        }

        .back {
            color: #bd171d;
            font-size: 13px;
            font-weight: 700;
        }

        .container {
            max-width: 950px;
            margin: 40px auto;
            padding: 0 20px 50px;
        }

        .heading {
            margin-bottom: 25px;
        }

        .heading h1 {
            color: #202b3c;
            font-size: 28px;
            margin-bottom: 8px;
        }

        .heading p {
            color: #9299a6;
            font-size: 14px;
            line-height: 1.7;
        }

        .profile-header {
            background: linear-gradient(115deg, #bd171d, #921117);
            color: white;
            padding: 28px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .avatar {
            width: 68px;
            height: 68px;
            flex-shrink: 0;
            border-radius: 50%;
            background: rgba(255,255,255,.2);
            border: 2px solid rgba(255,255,255,.5);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 26px;
            font-weight: 800;
        }

        .profile-header h2 {
            font-size: 20px;
            margin-bottom: 6px;
        }

        .profile-header p {
            color: rgba(255,255,255,.85);
            font-size: 13px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 14px;
            border: 1px solid #e6e8ed;
            box-shadow: 0 3px 12px rgba(0,0,0,.035);
            margin-bottom: 22px;
        }

        .card-header {
            margin-bottom: 24px;
            padding-bottom: 17px;
            border-bottom: 1px solid #edf0f4;
        }

        .card-header h3 {
            font-size: 17px;
            margin-bottom: 7px;
        }

        .card-header p {
            color: #9299a6;
            font-size: 12px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
            color: #374151;
        }

        .form-group input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #dfe3e9;
            border-radius: 8px;
            font-family: inherit;
            font-size: 13px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #bd171d;
            box-shadow: 0 0 0 3px rgba(189,23,29,.08);
        }

        .form-group small {
            display: block;
            color: #9299a6;
            margin-top: 7px;
            font-size: 11px;
        }

        .error {
            color: #b91c1c;
            font-size: 12px;
            margin-top: 7px;
        }

        .btn {
            border: none;
            padding: 12px 21px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-main {
            background: #bd171d;
            color: white;
        }

        .btn-main:hover {
            background: #9f1117;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 13px 16px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .verification {
            background: #fff7ed;
            padding: 14px;
            border-radius: 8px;
            color: #9a3412;
            font-size: 12px;
            margin-bottom: 18px;
            line-height: 1.7;
        }

        .verification button {
            border: none;
            background: transparent;
            color: #bd171d;
            font-weight: 700;
            cursor: pointer;
        }

        .security-info {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            padding: 17px;
            border-radius: 9px;
            font-size: 12px;
            line-height: 1.8;
            color: #64748b;
        }

        .security-info strong {
            color: #374151;
        }

        @media(max-width: 600px) {
            .navbar {
                padding: 0 5%;
            }

            .brand {
                font-size: 15px;
            }

            .container {
                margin-top: 25px;
            }

            .heading h1 {
                font-size: 23px;
            }

            .profile-header {
                padding: 20px;
            }

            .profile-header h2 {
                font-size: 16px;
            }

            .avatar {
                width: 55px;
                height: 55px;
                font-size: 21px;
            }

            .card {
                padding: 20px;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

@php
    $nama = $user->name ?? 'Pengguna';
    $inisial = strtoupper(substr($nama, 0, 1));
@endphp

<header class="navbar">
    <div class="brand">SM CUSTOMER CARE</div>

    <a href="{{ route('dashboard') }}" class="back">
        ← Kembali ke Dashboard
    </a>
</header>

<main class="container">

    <div class="heading">
        <h1>Profil Saya</h1>
        <p>Kelola informasi akun dan keamanan pribadi kamu.</p>
    </div>

    <section class="profile-header">
        <div class="avatar">{{ $inisial }}</div>

        <div>
            <h2>{{ $user->name }}</h2>
            <p>{{ $user->email }}</p>
            <p>Akun Pengguna SM Customer Care</p>
        </div>
    </section>

    @if(session('status') === 'profile-updated')
        <div class="success">
            Informasi profil berhasil diperbarui.
        </div>
    @endif

    @if(session('status') === 'password-updated')
        <div class="success">
            Password berhasil diperbarui.
        </div>
    @endif

    <!-- INFORMASI PROFIL -->
    <section class="card">

        <div class="card-header">
            <h3>Informasi Akun</h3>
            <p>Perbarui nama dan alamat email akun kamu.</p>
        </div>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    required
                >

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    required
                >

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="verification">
                    Email kamu belum diverifikasi.

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit">Kirim ulang email verifikasi</button>
                    </form>
                </div>
            @endif

            <button type="submit" class="btn btn-main">
                Simpan Perubahan
            </button>
        </form>

    </section>

    <!-- UBAH PASSWORD -->
    <section class="card">

        <div class="card-header">
            <h3>Keamanan Akun</h3>
            <p>Gunakan password yang kuat untuk melindungi akun kamu.</p>
        </div>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="current_password">Password Saat Ini</label>
                <input
                    type="password"
                    id="current_password"
                    name="current_password"
                    autocomplete="current-password"
                    required
                >

                @if($errors->updatePassword->has('current_password'))
                    <div class="error">
                        {{ $errors->updatePassword->first('current_password') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="password">Password Baru</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    autocomplete="new-password"
                    required
                >

                @if($errors->updatePassword->has('password'))
                    <div class="error">
                        {{ $errors->updatePassword->first('password') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password Baru</label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    autocomplete="new-password"
                    required
                >

                @if($errors->updatePassword->has('password_confirmation'))
                    <div class="error">
                        {{ $errors->updatePassword->first('password_confirmation') }}
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-main">
                Perbarui Password
            </button>

        </form>

    </section>

    <!-- INFORMASI KEAMANAN -->
    <section class="card">

        <div class="card-header">
            <h3>Informasi Keamanan</h3>
            <p>Informasi mengenai perlindungan akun kamu.</p>
        </div>

        <div class="security-info">
            <strong>Tips menjaga keamanan akun:</strong><br>
            Gunakan password yang tidak mudah ditebak dan jangan
            membagikan informasi login kepada orang lain.
            Pastikan kamu selalu keluar dari akun setelah menggunakan
            perangkat bersama.
        </div>

    </section>

</main>

</body>
</html>
