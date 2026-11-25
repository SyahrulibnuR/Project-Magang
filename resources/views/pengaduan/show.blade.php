
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan - Suara Merdeka</title>

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

        a {
            text-decoration: none;
        }

        .navbar {
            background: white;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 12px rgba(0,0,0,.05);
        }

        .brand {
            color: #1684d6;
            font-size: 20px;
            font-weight: 800;
        }

        .back {
            color: #1684d6;
            font-size: 14px;
            font-weight: 600;
        }

        .container {
            max-width: 950px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .heading {
            margin-bottom: 25px;
        }

        .heading h1 {
            color: #123b60;
            font-size: 28px;
            margin-bottom: 8px;
        }

        .heading p {
            color: #64748b;
            font-size: 14px;
            line-height: 1.7;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 22px;
            box-shadow: 0 8px 30px rgba(30,100,160,.07);
        }

        .ticket-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid #edf1f5;
        }

        .ticket-label {
            color: #64748b;
            font-size: 12px;
            margin-bottom: 7px;
        }

        .ticket-number {
            color: #1684d6;
            font-size: 19px;
            font-weight: 800;
        }

        .status {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-baru {
            background: #e0f2fe;
            color: #0369a1;
        }

        .status-diproses {
            background: #fef3c7;
            color: #92400e;
        }

        .status-selesai {
            background: #dcfce7;
            color: #166534;
        }

        .status-ditolak {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-lainnya {
            background: #e2e8f0;
            color: #475569;
        }

        .section-title {
            font-size: 17px;
            font-weight: 800;
            color: #123b60;
            margin-bottom: 22px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .detail-item {
            margin-bottom: 20px;
        }

        .detail-item label {
            display: block;
            color: #64748b;
            font-size: 12px;
            margin-bottom: 8px;
        }

        .detail-item p {
            color: #26384b;
            font-size: 14px;
            font-weight: 600;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .description {
            background: #f8fbff;
            border: 1px solid #e5edf5;
            padding: 20px;
            border-radius: 10px;
            font-size: 14px;
            line-height: 1.8;
            color: #475569;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .response {
            background: #f0f9ff;
            border-left: 4px solid #1684d6;
            border-radius: 9px;
            padding: 22px;
        }

        .response p {
            color: #334155;
            font-size: 14px;
            line-height: 1.8;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        .response-meta {
            color: #64748b;
            font-size: 12px;
            margin-top: 15px;
            padding-top: 12px;
            border-top: 1px solid #dbeafe;
        }

        .waiting {
            background: #fffbeb;
            border-left: 4px solid #eab308;
            padding: 18px;
            border-radius: 9px;
            color: #92400e;
            font-size: 13px;
            line-height: 1.7;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 13px 20px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 700;
        }

        .btn-back {
            color: #475569;
            background: #e2e8f0;
        }

        .btn-primary {
            color: white;
            background: #1684d6;
        }

        .btn-primary:hover {
            background: #096bb5;
        }

        @media(max-width: 600px) {
            .navbar {
                padding: 18px 5%;
            }

            .brand {
                font-size: 16px;
            }

            .container {
                margin: 25px auto;
            }

            .heading h1 {
                font-size: 23px;
            }

            .card {
                padding: 20px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .ticket-number {
                font-size: 16px;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="brand">SUARA MERDEKA</div>

    <a href="{{ route('pengaduan.index') }}" class="back">
        ← Kembali ke Riwayat
    </a>
</nav>

<main class="container">

    @php
        $statusClass = match($pengaduan->status) {
            'Baru' => 'status-baru',
            'Diproses' => 'status-diproses',
            'Selesai' => 'status-selesai',
            'Ditolak' => 'status-ditolak',
            default => 'status-lainnya',
        };
    @endphp

    <div class="heading">
        <h1>Detail Pengaduan</h1>
        <p>
            Berikut adalah informasi dan perkembangan pengaduan
            yang telah kamu kirimkan.
        </p>
    </div>

    <!-- INFORMASI TIKET -->
    <section class="card">

        <div class="ticket-header">
            <div>
                <div class="ticket-label">Nomor Tiket Pengaduan</div>

                <div class="ticket-number">
                    {{ $pengaduan->ticket_number }}
                </div>
            </div>

            <span class="status {{ $statusClass }}">
                {{ $pengaduan->status }}
            </span>
        </div>

        <h3 class="section-title">Informasi Pengaduan</h3>

        <div class="detail-grid">

            <div class="detail-item">
                <label>Judul Pengaduan</label>
                <p>{{ $pengaduan->title }}</p>
            </div>

            <div class="detail-item">
                <label>Kategori</label>
                <p>{{ $pengaduan->category }}</p>
            </div>

            <div class="detail-item">
                <label>Nama Pengguna</label>
                <p>{{ auth()->user()->name }}</p>
            </div>

            <div class="detail-item">
                <label>Tanggal Pengaduan</label>
                <p>
                    {{ $pengaduan->created_at?->format('d F Y, H:i') ?? '-' }}
                </p>
            </div>

            <div class="detail-item">
                <label>Status Terakhir</label>
                <p>{{ $pengaduan->status }}</p>
            </div>

            <div class="detail-item">
                <label>Terakhir Diperbarui</label>
                <p>
                    {{ $pengaduan->updated_at?->format('d F Y, H:i') ?? '-' }}
                </p>
            </div>

        </div>

        <div class="detail-item">
            <label>Isi Pengaduan</label>

            <div class="description">{{ $pengaduan->description }}</div>
        </div>

    </section>

    <!-- TANGGAPAN ADMIN -->
    <section class="card">

        <h3 class="section-title">Tanggapan Customer Care</h3>

        @if($pengaduan->admin_response)

            <div class="response">
                <p>{{ $pengaduan->admin_response }}</p>

                <div class="response-meta">
                    Ditanggapi oleh:
                    <strong>{{ $pengaduan->responder?->name ?? 'Tim Customer Care' }}</strong>

                    <br>

                    Waktu tanggapan:
                    {{ $pengaduan->responded_at?->format('d F Y, H:i') ?? '-' }}
                </div>
            </div>

        @else

            <div class="waiting">
                <strong>Pengaduan sedang menunggu tanggapan.</strong>
                <br>
                Tim Customer Care akan meninjau laporan yang telah
                kamu kirimkan. Silakan periksa halaman ini secara
                berkala untuk mengetahui perkembangan terbaru.
            </div>

        @endif

        <div class="actions">
            <a href="{{ route('pengaduan.index') }}" class="btn btn-back">
                Kembali ke Riwayat
            </a>

            <a href="{{ route('dashboard') }}" class="btn btn-primary">
                Kembali ke Dashboard
            </a>
        </div>

    </section>

</main>

</body>
</html>
