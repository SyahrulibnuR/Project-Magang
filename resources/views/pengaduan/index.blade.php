
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengaduan - Suara Merdeka</title>

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
            font-weight: 600;
            font-size: 14px;
        }

        .container {
            max-width: 1100px;
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
            line-height: 1.6;
        }

        .card {
            background: white;
            padding: 28px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(30,100,160,.08);
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .search {
            display: flex;
            gap: 8px;
            flex: 1;
            max-width: 500px;
        }

        .search input {
            flex: 1;
            min-width: 0;
            padding: 12px 14px;
            border: 1px solid #dbe5ef;
            border-radius: 8px;
            outline: none;
            font-family: inherit;
        }

        .search input:focus {
            border-color: #1684d6;
        }

        .btn {
            padding: 12px 18px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-weight: 700;
            font-family: inherit;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-search {
            background: #1684d6;
            color: white;
        }

        .btn-create {
            background: #1684d6;
            color: white;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 720px;
        }

        th {
            background: #f1f7fc;
            color: #38536e;
            font-size: 12px;
            text-align: left;
            padding: 15px 12px;
        }

        td {
            padding: 16px 12px;
            border-bottom: 1px solid #edf1f5;
            font-size: 13px;
            vertical-align: middle;
        }

        .ticket {
            color: #1684d6;
            font-weight: 700;
        }

        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
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

        .btn-detail {
            background: #e8f5ff;
            color: #1684d6;
            padding: 8px 13px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 700;
            display: inline-block;
        }

        .empty {
            text-align: center;
            padding: 55px 20px;
        }

        .empty-icon {
            font-size: 42px;
            color: #94a3b8;
            margin-bottom: 15px;
        }

        .empty h3 {
            color: #334155;
            margin-bottom: 8px;
        }

        .empty p {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .pagination {
            margin-top: 25px;
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
                padding: 17px;
            }

            .toolbar {
                flex-direction: column;
            }

            .search {
                max-width: 100%;
            }

            .btn-create {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="brand">SUARA MERDEKA</div>
    <a href="{{ route('dashboard') }}" class="back">
        ← Kembali ke Dashboard
    </a>
</nav>

<main class="container">

    <div class="heading">
        <h1>Riwayat Pengaduan</h1>
        <p>
            Pantau seluruh pengaduan yang telah kamu kirimkan
            melalui layanan SM Customer Care.
        </p>
    </div>

    <div class="card">

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <div class="toolbar">

            <form action="{{ route('pengaduan.index') }}"
                  method="GET" class="search">

                <input
                    type="text"
                    name="kode"
                    value="{{ $keyword }}"
                    placeholder="Cari nomor tiket pengaduan..."
                >

                <button type="submit" class="btn btn-search">
                    Cari
                </button>
            </form>

            <a href="{{ route('pengaduan.create') }}"
               class="btn btn-create">
                + Buat Pengaduan
            </a>

        </div>

        @if($pengaduans->count() > 0)

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Tiket</th>
                            <th>Judul Pengaduan</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($pengaduans as $index => $pengaduan)

                            @php
                                $statusClass = match($pengaduan->status) {
                                    'Baru' => 'status-baru',
                                    'Diproses' => 'status-diproses',
                                    'Selesai' => 'status-selesai',
                                    'Ditolak' => 'status-ditolak',
                                    default => 'status-lainnya',
                                };
                            @endphp

                            <tr>
                                <td>
                                    {{ $pengaduans->firstItem() + $index }}
                                </td>

                                <td class="ticket">
                                    {{ $pengaduan->ticket_number }}
                                </td>

                                <td>{{ $pengaduan->title }}</td>

                                <td>{{ $pengaduan->category }}</td>

                                <td>
                                    {{ $pengaduan->created_at->format('d/m/Y') }}
                                </td>

                                <td>
                                    <span class="status {{ $statusClass }}">
                                        {{ $pengaduan->status }}
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ route('pengaduan.show', $pengaduan->ticket_number) }}"
                                       class="btn-detail">
                                        Detail
                                    </a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                {{ $pengaduans->links() }}
            </div>

        @else

            <div class="empty">
                <div class="empty-icon">📄</div>

                <h3>Belum Ada Pengaduan</h3>

                <p>
                    @if($keyword)
                        Tidak ditemukan pengaduan dengan nomor tiket
                        "{{ $keyword }}".
                    @else
                        Kamu belum pernah mengirimkan pengaduan.
                    @endif
                </p>

                @if($keyword)
                    <a href="{{ route('pengaduan.index') }}"
                       class="btn btn-create">
                        Tampilkan Semua
                    </a>
                @else
                    <a href="{{ route('pengaduan.create') }}"
                       class="btn btn-create">
                        Buat Pengaduan
                    </a>
                @endif
            </div>

        @endif

    </div>

</main>

</body>
</html>
