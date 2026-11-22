
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pengaduan - Suara Merdeka</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f0f7ff;
            color: #1e293b;
            min-height: 100vh;
        }

        .navbar {
            background: white;
            padding: 18px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 12px rgba(0,0,0,.05);
        }

        .brand {
            font-size: 20px;
            font-weight: 800;
            color: #1684d6;
        }

        .back {
            text-decoration: none;
            color: #1684d6;
            font-weight: 600;
        }

        .container {
            max-width: 850px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .heading {
            margin-bottom: 25px;
        }

        .heading h1 {
            font-size: 28px;
            margin-bottom: 10px;
            color: #123b60;
        }

        .heading p {
            color: #64748b;
            line-height: 1.6;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(30,100,160,.08);
        }

        .info {
            background: #e8f5ff;
            border-left: 4px solid #2496e3;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            color: #285b80;
            font-size: 13px;
            line-height: 1.7;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .errors {
            background: #fee2e2;
            color: #991b1b;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            margin-bottom: 9px;
            font-size: 14px;
            font-weight: 700;
            color: #334155;
        }

        input, select, textarea {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid #dbe5ef;
            border-radius: 9px;
            font-family: inherit;
            font-size: 14px;
            outline: none;
            background: white;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #2496e3;
            box-shadow: 0 0 0 3px rgba(36,150,227,.12);
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        .readonly {
            background: #f1f5f9;
            color: #64748b;
        }

        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            padding: 13px 22px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn-back {
            background: #e2e8f0;
            color: #475569;
        }

        .btn-submit {
            background: #1684d6;
            color: white;
        }

        .btn-submit:hover {
            background: #096bb5;
        }

        @media(max-width: 600px) {
            .card {
                padding: 22px;
            }

            .heading h1 {
                font-size: 23px;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">SUARA MERDEKA</div>
        <a href="{{ route('dashboard') }}" class="back">← Kembali ke Dashboard</a>
    </nav>

    <main class="container">

        <div class="heading">
            <h1>Buat Pengaduan</h1>
            <p>Sampaikan keluhan atau kendala layanan Suara Merdeka melalui formulir berikut.</p>
        </div>

        <div class="card">

            <div class="info">
                <strong>Informasi:</strong><br>
                Pastikan informasi yang kamu sampaikan jelas dan lengkap agar tim Admin dapat membantu menyelesaikan pengaduan.
            </div>

            @if(session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="errors">
                    <strong>Mohon periksa kembali:</strong>
                    <ul style="margin-left: 20px; margin-top: 8px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pengaduan.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text"
                           value="{{ auth()->user()->name }}"
                           class="readonly"
                           readonly>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email"
                           value="{{ auth()->user()->email }}"
                           class="readonly"
                           readonly>
                </div>

                <div class="form-group">
                    <label for="title">Judul Pengaduan</label>
                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ old('title') }}"
                           placeholder="Contoh: Kendala pembayaran E-Paper"
                           required>
                </div>

                <div class="form-group">
                    <label for="category">Kategori Pengaduan</label>
                    <select name="category" id="category" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach(['Berlangganan E-Paper', 'Pembayaran', 'Akses Akun', 'Layanan', 'Lainnya'] as $category)
                            <option value="{{ $category }}"
                                {{ old('category') == $category ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Isi Pengaduan</label>
                    <textarea
                        id="description"
                        name="description"
                        placeholder="Jelaskan masalah atau keluhan kamu secara lengkap..."
                        required>{{ old('description') }}</textarea>
                </div>

                <div class="buttons">
                    <a href="{{ route('dashboard') }}" class="btn btn-back">
                        Batal
                    </a>

                    <button type="submit" class="btn btn-submit">
                        Kirim Pengaduan
                    </button>
                </div>

            </form>

        </div>
    </main>

</body>
</html>
