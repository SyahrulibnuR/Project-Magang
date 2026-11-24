
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telusuri Aduan - SM Customer Care</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f6fa;
            color: #263247;
        }

        .navbar {
            background: white;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,.06);
        }

        .brand {
            color: #bd1720;
            font-size: 22px;
            font-weight: bold;
        }

        .back {
            color: #bd1720;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            max-width: 850px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .heading h1 {
            color: #b5121b;
            margin-bottom: 10px;
        }

        .heading p {
            color: #718096;
            line-height: 1.6;
        }

        .search-box, .result-box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,.06);
            margin-bottom: 25px;
        }

        .search-box label {
            display: block;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .search-form {
            display: flex;
            gap: 10px;
        }

        .search-form input {
            flex: 1;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
        }

        .search-form input:focus {
            border-color: #bd1720;
        }

        .search-form button {
            border: none;
            background: #bd1720;
            color: white;
            padding: 0 25px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        .search-form button:hover {
            background: #970f17;
        }

        .not-found {
            padding: 20px;
            background: #fff2f2;
            color: #a71920;
            border-radius: 10px;
            line-height: 1.6;
        }

        .result-title {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .ticket {
            background: #fff5f5;
            border: 1px dashed #bd1720;
            padding: 18px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .ticket small {
            color: #777;
        }

        .ticket h2 {
            color: #bd1720;
            margin-top: 7px;
            font-size: 21px;
        }

        .detail {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .detail-item {
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .detail-item small {
            color: #7b8492;
            display: block;
            margin-bottom: 7px;
        }

        .detail-item strong {
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .description, .response {
            margin-top: 25px;
            line-height: 1.7;
        }

        .description p, .response p {
            margin-top: 10px;
            color: #596579;
            white-space: pre-line;
        }

        .response {
            background: #f1f8ff;
            border-left: 4px solid #2980b9;
            padding: 18px;
            border-radius: 8px;
        }

        .status {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: bold;
        }

        .status-baru {
            background: #fff1d6;
            color: #a56800;
        }

        .status-diproses {
            background: #e6f1ff;
            color: #1764a5;
        }

        .status-selesai {
            background: #e2f8e9;
            color: #188044;
        }

        .status-ditutup {
            background: #eeeeee;
            color: #555;
        }

        @media(max-width: 600px) {
            .navbar {
                padding: 18px;
            }

            .brand {
                font-size: 17px;
            }

            .search-form {
                flex-direction: column;
            }

            .search-form button {
                padding: 14px;
            }

            .detail {
                grid-template-columns: 1fr;
            }

            .search-box, .result-box {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">SM CUSTOMER CARE</div>
        <a href="{{ route('dashboard') }}" class="back">← Kembali</a>
    </nav>

    <main class="container">

        <div class="heading">
            <h1>Telusuri Aduan</h1>
            <p>
                Masukkan kode tiket pengaduan untuk melihat status
                dan perkembangan penanganan aduan Anda.
            </p>
        </div>

        <div class="search-box">
            <form action="{{ route('pengaduan.telusuri') }}"
                  method="GET"
                  class="search-form">

                <input
                    type="text"
                    name="kode_pengaduan"
                    placeholder="Contoh: SMC-20261124-ABC123"
                    value="{{ $kode }}"
                    required
                >

                <button type="submit">Cari Aduan</button>
            </form>
        </div>

        @if($sudahMencari && $kode !== '' && !$pengaduan)
            <div class="not-found">
                <strong>Pengaduan tidak ditemukan.</strong><br>
                Pastikan kode tiket benar dan pengaduan tersebut
                dibuat menggunakan akun Anda.
            </div>
        @endif

        @if($pengaduan)

            <div class="result-box">

                <h2 class="result-title">Hasil Penelusuran Aduan</h2>

                <div class="ticket">
                    <small>KODE TIKET PENGADUAN</small>
                    <h2>{{ $pengaduan->ticket_number }}</h2>
                </div>

                <div class="detail">

                    <div class="detail-item">
                        <small>Judul Pengaduan</small>
                        <strong>{{ $pengaduan->title }}</strong>
                    </div>

                    <div class="detail-item">
                        <small>Kategori</small>
                        <strong>{{ $pengaduan->category }}</strong>
                    </div>

                    <div class="detail-item">
                        <small>Tanggal Pengaduan</small>
                        <strong>
                            {{ $pengaduan->created_at->format('d-m-Y H:i') }}
                        </strong>
                    </div>

                    <div class="detail-item">
                        <small>Status Pengaduan</small>

                        @php
                            $statusClass = match($pengaduan->status) {
                                'Baru' => 'status-baru',
                                'Diproses' => 'status-diproses',
                                'Selesai' => 'status-selesai',
                                'Ditutup' => 'status-ditutup',
                                default => 'status-baru',
                            };
                        @endphp

                        <span class="status {{ $statusClass }}">
                            {{ $pengaduan->status }}
                        </span>
                    </div>

                </div>

                <div class="description">
                    <strong>Isi Pengaduan</strong>
                    <p>{{ $pengaduan->description }}</p>
                </div>

                <div class="response">
                    <strong>Tanggapan Admin</strong>

                    @if($pengaduan->admin_response)
                        <p>{{ $pengaduan->admin_response }}</p>

                        @if($pengaduan->responded_at)
                            <small>
                                Ditanggapi pada:
                                {{ $pengaduan->responded_at->format('d-m-Y H:i') }}
                            </small>
                        @endif
                    @else
                        <p>
                            Belum ada tanggapan dari Admin.
                            Silakan periksa kembali secara berkala.
                        </p>
                    @endif
                </div>

            </div>

        @endif

    </main>

</body>
</html>
