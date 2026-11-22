
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengaduan | SM Customer Care</title>

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

        .sidebar {
            position: fixed;
            width: 255px;
            height: 100vh;
            background: #e1f0ff;
            padding: 28px 18px;
            display: flex;
            flex-direction: column;
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 12px 35px;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            background: #3689df;
            color: white;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .brand h2 {
            font-size: 18px;
            color: #24578b;
            font-weight: 800;
        }

        .brand small {
            color: #7190ad;
            font-size: 11px;
        }

        .menu-title {
            font-size: 10px;
            font-weight: 700;
            color: #8aa4bd;
            padding: 10px 13px;
            letter-spacing: 1.2px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .menu a {
            text-decoration: none;
            padding: 13px 15px;
            border-radius: 11px;
            color: #607d99;
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 13px;
            transition: .25s;
        }

        .menu a i {
            width: 19px;
            font-size: 16px;
        }

        .menu a:hover,
        .menu a.active {
            background: #3689df;
            color: white;
            box-shadow: 0 7px 17px rgba(54,137,223,.2);
        }

        .sidebar-bottom {
            margin-top: auto;
        }

        .admin-card {
            background: rgba(255,255,255,.7);
            border-radius: 13px;
            padding: 13px;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #3689df;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .admin-card strong {
            display: block;
            font-size: 12px;
        }

        .admin-card small {
            color: #8299ad;
            font-size: 10px;
        }

        .logout-btn {
            border: none;
            background: transparent;
            width: 100%;
            text-align: left;
            color: #d65b65;
            padding: 13px 15px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
        }

        .logout-btn i {
            margin-right: 12px;
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

        .topbar h1 {
            font-size: 25px;
            color: #25496d;
            font-weight: 800;
        }

        .topbar p {
            font-size: 12px;
            color: #8ba0b5;
            margin-top: 7px;
        }

        .date {
            background: white;
            padding: 11px 15px;
            border-radius: 10px;
            color: #66839f;
            font-size: 12px;
        }

        .welcome {
            background: linear-gradient(110deg, #398bdc, #76b9f5);
            border-radius: 17px;
            padding: 23px 27px;
            color: white;
            margin-bottom: 25px;
        }

        .welcome h2 {
            font-size: 19px;
            margin-bottom: 8px;
        }

        .welcome p {
            font-size: 12px;
            opacity: .9;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border-radius: 14px;
            padding: 19px;
            box-shadow: 0 4px 18px rgba(50,90,130,.04);
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
        }

        .blue { background: #e5f2ff; color: #3689df; }
        .orange { background: #fff1e4; color: #ed9a43; }
        .purple { background: #f1eaff; color: #9872df; }
        .green { background: #e4f8ed; color: #39b879; }

        .stat-card h2 {
            font-size: 25px;
            color: #294b6c;
            margin-bottom: 5px;
        }

        .stat-card p {
            font-size: 11px;
            color: #91a4b7;
        }

        .table-panel {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 18px rgba(50,90,130,.04);
        }

        .table-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .table-heading h3 {
            color: #345675;
            font-size: 16px;
        }

        .table-heading span {
            font-size: 11px;
            color: #8da5ba;
        }

        .filter-form {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .filter-form input,
        .filter-form select {
            padding: 12px 14px;
            border: 1px solid #e0eaf3;
            border-radius: 9px;
            background: #fafdff;
            outline: none;
            color: #526d87;
            font-size: 12px;
        }

        .filter-form input {
            flex: 1;
            min-width: 150px;
        }

        .filter-form input:focus,
        .filter-form select:focus {
            border-color: #3689df;
        }

        .btn {
            border: none;
            padding: 11px 16px;
            border-radius: 9px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-primary {
            background: #3689df;
            color: white;
        }

        .btn-light {
            background: #edf5ff;
            color: #3689df;
        }

        .btn-danger {
            background: #fff0f0;
            color: #d65b65;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 9px;
            background: #e8f8ef;
            color: #268653;
            font-size: 12px;
            margin-bottom: 18px;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th {
            text-align: left;
            font-size: 10px;
            color: #91a6ba;
            font-weight: 700;
            padding: 14px 12px;
            background: #f7faff;
        }

        td {
            font-size: 11px;
            color: #617d96;
            padding: 16px 12px;
            border-bottom: 1px solid #f0f4f8;
            vertical-align: middle;
        }

        .ticket {
            color: #3689df;
            font-weight: 700;
        }

        .customer strong {
            display: block;
            color: #345675;
            margin-bottom: 4px;
        }

        .customer small {
            color: #9aafc1;
            font-size: 10px;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
        }

        .status-baru {
            background: #fff4df;
            color: #d89526;
        }

        .status-diproses {
            background: #e8f2ff;
            color: #3689df;
        }

        .status-selesai {
            background: #e4f8ed;
            color: #32a56b;
        }

        .status-ditutup {
            background: #f1eff5;
            color: #82768f;
        }

        .action {
            display: flex;
            gap: 6px;
        }

        .action a,
        .action button {
            width: 31px;
            height: 31px;
            border: none;
            border-radius: 8px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            cursor: pointer;
        }

        .empty {
            text-align: center;
            padding: 45px 10px;
            color: #9aafc1;
        }

        .empty i {
            font-size: 32px;
            color: #a9cce9;
            margin-bottom: 12px;
        }

        .empty p {
            font-size: 12px;
        }

        .pagination {
            margin-top: 20px;
        }

        @media(max-width: 1100px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 700px) {
            .sidebar {
                display: none;
            }

            .main {
                margin-left: 0;
                padding: 20px 14px;
            }

            .topbar h1 {
                font-size: 20px;
            }

            .date {
                display: none;
            }

            .filter-form {
                flex-direction: column;
            }

            .stats {
                gap: 10px;
            }

            .stat-card {
                padding: 14px;
            }

            .table-panel {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">

    <div class="brand">
        <div class="brand-icon">
            <i class="fa-solid fa-headset"></i>
        </div>
        <div>
            <h2>SM Care</h2>
            <small>Customer Service System</small>
        </div>
    </div>

    <div class="menu-title">MENU UTAMA</div>

    <nav class="menu">
        <a href="{{ route('admin.dashboard') }}">
            <i class="fa-solid fa-chart-pie"></i>
            Dashboard
        </a>

        <a href="{{ route('admin.complaints.index') }}" class="active">
            <i class="fa-solid fa-inbox"></i>
            Data Pengaduan
        </a>

        <a href="#" title="Menu belum tersedia">
            <i class="fa-solid fa-users"></i>
            Data Pelanggan
        </a>

        <a href="#" title="Menu belum tersedia">
            <i class="fa-solid fa-chart-line"></i>
            Laporan
        </a>
    </nav>

    <div class="menu-title" style="margin-top:25px;">PREFERENSI</div>

    <nav class="menu">
        <a href="#" title="Menu belum tersedia">
            <i class="fa-solid fa-gear"></i>
            Pengaturan
        </a>
    </nav>

    <div class="sidebar-bottom">

        <div class="admin-card">
            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>
            <div>
                <strong>{{ auth()->user()->name ?? 'Administrator' }}</strong>
                <small>Administrator</small>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fa-solid fa-right-from-bracket"></i>
                Keluar
            </button>
        </form>

    </div>
</aside>


<main class="main">

    <header class="topbar">
        <div>
            <h1>Data Pengaduan</h1>
            <p>Kelola dan pantau seluruh pengaduan pelanggan.</p>
        </div>

        <div class="date">
            <i class="fa-regular fa-calendar"></i>
            {{ now()->translatedFormat('l, d F Y') }}
        </div>
    </header>


    <section class="welcome">
        <h2>Manajemen Pengaduan</h2>
        <p>Periksa laporan pelanggan, berikan tanggapan, dan perbarui status pengaduan.</p>
    </section>


    <section class="stats">

        <div class="stat-card">
            <div class="stat-icon blue">
                <i class="fa-solid fa-inbox"></i>
            </div>
            <h2>{{ $totalComplaints }}</h2>
            <p>Total Pengaduan</p>
        </div>

        <div class="stat-card">
            <div class="stat-icon orange">
                <i class="fa-solid fa-clock"></i>
            </div>
            <h2>{{ $newComplaints }}</h2>
            <p>Pengaduan Baru</p>
        </div>

        <div class="stat-card">
            <div class="stat-icon purple">
                <i class="fa-solid fa-spinner"></i>
            </div>
            <h2>{{ $processingComplaints }}</h2>
            <p>Sedang Diproses</p>
        </div>

        <div class="stat-card">
            <div class="stat-icon green">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <h2>{{ $completedComplaints }}</h2>
            <p>Pengaduan Selesai</p>
        </div>

    </section>


    <section class="table-panel">

        <div class="table-heading">
            <div>
                <h3>Daftar Pengaduan Pelanggan</h3>
                <span>Data yang tersimpan di database</span>
            </div>
        </div>

        @if(session('success'))
            <div class="alert">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('success') }}
            </div>
        @endif

        <form method="GET"
              action="{{ route('admin.complaints.index') }}"
              class="filter-form">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari nomor tiket, judul, atau pelanggan..."
            >

            <select name="status">
                <option value="">Semua Status</option>
                <option value="Baru" {{ request('status') === 'Baru' ? 'selected' : '' }}>Baru</option>
                <option value="Diproses" {{ request('status') === 'Diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="Selesai" {{ request('status') === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="Ditutup" {{ request('status') === 'Ditutup' ? 'selected' : '' }}>Ditutup</option>
            </select>

            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-magnifying-glass"></i>
                Cari
            </button>

            <a href="{{ route('admin.complaints.index') }}" class="btn btn-light">
                Reset
            </a>

        </form>


        <div class="table-wrap">
            <table>

                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NOMOR TIKET</th>
                        <th>PELANGGAN</th>
                        <th>JUDUL PENGADUAN</th>
                        <th>KATEGORI</th>
                        <th>TANGGAL</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($complaints as $complaint)

                        <tr>
                            <td>{{ $complaints->firstItem() + $loop->index }}</td>

                            <td class="ticket">
                                {{ $complaint->ticket_number }}
                            </td>

                            <td class="customer">
                                <strong>{{ $complaint->user->name ?? 'Pengguna tidak ditemukan' }}</strong>
                                <small>{{ $complaint->user->email ?? '-' }}</small>
                            </td>

                            <td>{{ $complaint->title }}</td>

                            <td>{{ $complaint->category }}</td>

                            <td>
                                {{ $complaint->created_at->format('d/m/Y') }}
                            </td>

                            <td>
                                @php
                                    $statusClass = match($complaint->status) {
                                        'Baru' => 'status-baru',
                                        'Diproses' => 'status-diproses',
                                        'Selesai' => 'status-selesai',
                                        'Ditutup' => 'status-ditutup',
                                        default => 'status-baru'
                                    };
                                @endphp

                                <span class="status {{ $statusClass }}">
                                    {{ $complaint->status }}
                                </span>
                            </td>

                            <td>
                                <div class="action">

                                    <a href="{{ route('admin.complaints.show', $complaint->id) }}"
                                       class="btn-light"
                                       title="Lihat detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <form method="POST"
                                          action="{{ route('admin.complaints.destroy', $complaint->id) }}"
                                          onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn-danger"
                                                title="Hapus pengaduan">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="8">
                                <div class="empty">
                                    <i class="fa-regular fa-folder-open"></i>
                                    <p>Belum ada data pengaduan.</p>
                                    <p style="margin-top:7px;">
                                        Pengaduan pelanggan akan muncul di halaman ini setelah dikirim.
                                    </p>
                                </div>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

        <div class="pagination">
            {{ $complaints->links() }}
        </div>

    </section>

</main>

</body>
</html>
