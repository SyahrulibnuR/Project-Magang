
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pelanggan | SM Customer Care</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: #f3f8ff;
            color: #263b53;
        }

        .main {
            margin-left: 255px;
            padding: 30px 38px;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        h1 {
            font-size: 25px;
            color: #25496d;
        }

        .topbar p {
            color: #8ba0b5;
            font-size: 12px;
            margin-top: 7px;
        }

        .back-btn {
            text-decoration: none;
            color: #3689df;
            background: white;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
        }

        .panel {
            background: white;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 22px;
            box-shadow: 0 4px 18px rgba(50,90,130,.04);
        }

        .panel h3 {
            color: #345675;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 17px;
            margin-bottom: 22px;
        }

        .avatar {
            width: 65px;
            height: 65px;
            border-radius: 18px;
            background: #e5f2ff;
            color: #3689df;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 27px;
            font-weight: 800;
        }

        .profile h2 {
            color: #294b6c;
            font-size: 20px;
            margin-bottom: 6px;
        }

        .profile p {
            font-size: 12px;
            color: #91a4b7;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .info-item {
            background: #f7faff;
            padding: 16px;
            border-radius: 10px;
        }

        .info-item small {
            display: block;
            color: #91a6ba;
            font-size: 11px;
            margin-bottom: 7px;
        }

        .info-item strong {
            color: #345675;
            font-size: 13px;
        }

        .count {
            display: inline-block;
            padding: 7px 12px;
            background: #e5f2ff;
            color: #3689df;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th {
            text-align: left;
            font-size: 11px;
            color: #91a6ba;
            padding: 14px 12px;
            background: #f7faff;
        }

        td {
            padding: 16px 12px;
            border-bottom: 1px solid #f0f4f8;
            color: #617d96;
            font-size: 12px;
        }

        .ticket {
            font-weight: 700;
            color: #3689df;
        }

        .status {
            background: #edf5ff;
            color: #398bdc;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
        }

        .status-diproses {
            background: #fff1e4;
            color: #ed9a43;
        }

        .status-selesai {
            background: #e4f8ed;
            color: #39b879;
        }

        .status-ditutup {
            background: #f1eaff;
            color: #9872df;
        }

        .detail-link {
            color: #3689df;
            text-decoration: none;
            font-weight: 600;
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: #91a6ba;
        }

        .empty i {
            display: block;
            font-size: 30px;
            margin-bottom: 12px;
        }

        .pagination {
            margin-top: 20px;
        }

        @media(max-width: 700px) {
            .main {
                margin-left: 0;
                padding: 20px 14px;
            }

            .topbar {
                align-items: flex-start;
                gap: 12px;
            }

            h1 {
                font-size: 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .back-btn {
                white-space: nowrap;
            }
        }
    </style>
</head>

<body>

<main class="main">

    <header class="topbar">
        <div>
            <h1>Detail Pelanggan</h1>
            <p>Informasi akun dan riwayat pengaduan pelanggan.</p>
        </div>

        <a href="{{ route('admin.pelanggan.index') }}" class="back-btn">
            <i class="fa-solid fa-arrow-left"></i>
            Kembali
        </a>
    </header>


    <section class="panel">

        <h3>Informasi Pelanggan</h3>

        <div class="profile">
            <div class="avatar">
                {{ strtoupper(substr($pelanggan->name, 0, 1)) }}
            </div>

            <div>
                <h2>{{ $pelanggan->name }}</h2>
                <p>Pelanggan SM Customer Care</p>
            </div>
        </div>

        <div class="info-grid">

            <div class="info-item">
                <small>Nama Lengkap</small>
                <strong>{{ $pelanggan->name }}</strong>
            </div>

            <div class="info-item">
                <small>Email</small>
                <strong>{{ $pelanggan->email }}</strong>
            </div>

            <div class="info-item">
                <small>Tanggal Bergabung</small>
                <strong>{{ $pelanggan->created_at->format('d F Y') }}</strong>
            </div>

            <div class="info-item">
                <small>Total Pengaduan</small>
                <span class="count">{{ $totalPengaduan }} Pengaduan</span>
            </div>

        </div>

    </section>


    <section class="panel">

        <h3>
            <i class="fa-solid fa-clock-rotate-left"></i>
            Riwayat Pengaduan Pelanggan
        </h3>

        <div class="table-wrap">

            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NOMOR TIKET</th>
                        <th>JUDUL PENGADUAN</th>
                        <th>KATEGORI</th>
                        <th>TANGGAL</th>
                        <th>STATUS</th>
                        <th>DETAIL</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($riwayatPengaduan as $index => $pengaduan)

                        <tr>
                            <td>{{ $riwayatPengaduan->firstItem() + $index }}</td>

                            <td class="ticket">
                                {{ $pengaduan->ticket_number }}
                            </td>

                            <td>{{ $pengaduan->title }}</td>

                            <td>{{ $pengaduan->category }}</td>

                            <td>
                                {{ $pengaduan->created_at->format('d/m/Y') }}
                            </td>

                            <td>
                                @php
                                    $statusClass = match($pengaduan->status) {
                                        'Diproses' => 'status-diproses',
                                        'Selesai' => 'status-selesai',
                                        'Ditutup' => 'status-ditutup',
                                        default => ''
                                    };
                                @endphp

                                <span class="status {{ $statusClass }}">
                                    {{ $pengaduan->status }}
                                </span>
                            </td>

                            <td>
                                <a
                                    href="{{ route('admin.complaints.show', $pengaduan->id) }}"
                                    class="detail-link"
                                >
                                    Lihat
                                </a>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="7">
                                <div class="empty">
                                    <i class="fa-regular fa-folder-open"></i>
                                    Belum ada riwayat pengaduan.
                                </div>
                            </td>
                        </tr>

                    @endforelse
                </tbody>

            </table>

        </div>

        <div class="pagination">
            {{ $riwayatPengaduan->links() }}
        </div>

    </section>

</main>

</body>
</html>
