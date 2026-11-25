
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan | SM Customer Care</title>

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
            margin-bottom: 32px;
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
            border-radius: 19px;
            padding: 27px 30px;
            color: white;
            margin-bottom: 28px;
            box-shadow: 0 10px 25px rgba(54,137,223,.15);
        }

        .welcome h2 {
            font-size: 21px;
            margin-bottom: 9px;
        }

        .welcome p {
            font-size: 12px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 17px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            padding: 22px;
            border-radius: 15px;
            box-shadow: 0 4px 18px rgba(50,90,130,.04);
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            border-radius: 12px;
            background: #e5f2ff;
            color: #3689df;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .stat-card h2 {
            font-size: 27px;
            color: #294b6c;
        }

        .stat-card p {
            font-size: 11px;
            color: #91a4b7;
            margin-top: 5px;
        }

        .panel {
            background: white;
            border-radius: 16px;
            padding: 23px;
            box-shadow: 0 4px 18px rgba(50,90,130,.04);
        }

        .panel-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .panel-heading h3 {
            font-size: 16px;
            color: #345675;
        }

        .panel-heading span {
            font-size: 11px;
            color: #8da5ba;
        }

        .search-form {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-box {
            flex: 1;
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 15px;
            color: #91a6ba;
        }

        .search-box input {
            width: 100%;
            padding: 13px 15px 13px 42px;
            border: 1px solid #dce8f5;
            border-radius: 10px;
            outline: none;
            font-size: 12px;
            color: #526f8a;
        }

        .search-box input:focus {
            border-color: #3689df;
        }

        .search-btn {
            border: none;
            background: #3689df;
            color: white;
            padding: 0 22px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 12px;
        }

        .reset-btn {
            text-decoration: none;
            background: #edf5ff;
            color: #3689df;
            padding: 13px 17px;
            border-radius: 10px;
            font-size: 12px;
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
            font-weight: 600;
            padding: 15px 12px;
            background: #f7faff;
        }

        td {
            font-size: 12px;
            color: #617d96;
            padding: 17px 12px;
            border-bottom: 1px solid #f0f4f8;
        }

        .customer-name {
            color: #345675;
            font-weight: 700;
        }

        .count-badge {
            background: #e5f2ff;
            color: #3689df;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .detail-btn {
            display: inline-block;
            text-decoration: none;
            background: #3689df;
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 600;
        }

        .empty-state {
            text-align: center;
            padding: 35px 10px;
            color: #9aafc1;
        }

        .empty-state i {
            font-size: 30px;
            margin-bottom: 12px;
            color: #a9cce9;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .pagination p {
            font-size: 11px;
            color: #8da5ba;
        }

        .pagination a,
        .pagination span[aria-current="page"] span {
            display: inline-block;
            padding: 7px 11px;
            border-radius: 7px;
            background: #edf5ff;
            color: #3689df;
            text-decoration: none;
            font-size: 11px;
        }

        @media(max-width: 900px) {
            .sidebar {
                width: 220px;
            }

            .main {
                margin-left: 220px;
                padding: 25px 20px;
            }
        }

        @media(max-width: 650px) {
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

            .stats {
                grid-template-columns: 1fr;
            }

            .search-form {
                flex-wrap: wrap;
            }

            .search-btn {
                padding: 13px 18px;
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

        <a href="{{ route('admin.complaints.index') }}">
            <i class="fa-solid fa-inbox"></i>
            Data Pengaduan
        </a>

        <a href="{{ route('admin.pelanggan.index') }}" class="active">
            <i class="fa-solid fa-users"></i>
            Data Pelanggan
        </a>

        <a href="#">
            <i class="fa-solid fa-chart-line"></i>
            Laporan
        </a>
    </nav>

    <div class="menu-title" style="margin-top:25px;">PREFERENSI</div>

    <nav class="menu">
        <a href="#">
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
            <h1>Data Pelanggan</h1>
            <p>Kelola dan pantau informasi pelanggan SM Customer Care.</p>
        </div>

        <div class="date">
            <i class="fa-regular fa-calendar"></i>
            {{ now()->translatedFormat('l, d F Y') }}
        </div>
    </header>


    <section class="welcome">
        <h2>Manajemen Data Pelanggan</h2>
        <p>Lihat informasi pelanggan dan periksa riwayat pengaduan yang telah dikirimkan.</p>
    </section>


    <section class="stats">

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-users"></i>
            </div>
            <h2>{{ $totalPelanggan }}</h2>
            <p>Total Pelanggan Terdaftar</p>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-user-check"></i>
            </div>
            <h2>{{ $pelanggan->total() }}</h2>
            <p>Hasil Data Pelanggan</p>
        </div>

    </section>


    <section class="panel">

        <div class="panel-heading">
            <h3>Daftar Pelanggan</h3>
            <span>Data akun pelanggan</span>
        </div>

        <form action="{{ route('admin.pelanggan.index') }}" method="GET" class="search-form">

            <div class="search-box">
                <i class="fa-solid fa-search"></i>
                <input
                    type="text"
                    name="search"
                    placeholder="Cari nama atau email pelanggan..."
                    value="{{ request('search') }}"
                >
            </div>

            <button type="submit" class="search-btn">
                <i class="fa-solid fa-search"></i>
                Cari
            </button>

            @if(request('search'))
                <a href="{{ route('admin.pelanggan.index') }}" class="reset-btn">
                    Reset
                </a>
            @endif

        </form>


        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA PELANGGAN</th>
                        <th>EMAIL</th>
                        <th>TANGGAL BERGABUNG</th>
                        <th>JUMLAH PENGADUAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($pelanggan as $index => $user)
                        <tr>
                            <td>{{ $pelanggan->firstItem() + $index }}</td>

                            <td class="customer-name">
                                {{ $user->name }}
                            </td>

                            <td>{{ $user->email }}</td>

                            <td>
                                {{ $user->created_at->format('d/m/Y') }}
                            </td>

                            <td>
                                <span class="count-badge">
                                    {{ $user->jumlah_pengaduan }} Pengaduan
                                </span>
                            </td>

                            <td>
                                <a
                                    href="{{ route('admin.pelanggan.show', $user->id) }}"
                                    class="detail-btn"
                                >
                                    <i class="fa-solid fa-eye"></i>
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <i class="fa-regular fa-folder-open"></i>
                                    <p>
                                        @if(request('search'))
                                            Pelanggan tidak ditemukan.
                                        @else
                                            Belum ada data pelanggan.
                                        @endif
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination">
            {{ $pelanggan->links() }}
        </div>

    </section>

</main>

</body>
</html>
