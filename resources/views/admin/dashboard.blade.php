
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | SM Customer Care</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
            transition: .3s;
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
            transform: translateX(3px);
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
            align-items: center;
            justify-content: space-between;
            margin-bottom: 32px;
        }

        .topbar h1 {
            font-size: 25px;
            font-weight: 800;
            color: #25496d;
        }

        .topbar p {
            font-size: 12px;
            color: #8ba0b5;
            margin-top: 7px;
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .date {
            background: white;
            padding: 11px 15px;
            border-radius: 10px;
            color: #66839f;
            font-size: 12px;
            box-shadow: 0 3px 15px rgba(40,90,130,.04);
        }

        .notification {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #398bdc;
        }

        .welcome {
            background: linear-gradient(110deg, #398bdc, #76b9f5);
            border-radius: 19px;
            padding: 27px 30px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 10px 25px rgba(54,137,223,.15);
        }

        .welcome h2 {
            font-size: 21px;
            margin-bottom: 9px;
        }

        .welcome p {
            font-size: 12px;
            opacity: .9;
        }

        .welcome-icon {
            font-size: 65px;
            opacity: .25;
            margin-right: 25px;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 17px;
        }

        .section-heading h3 {
            font-size: 16px;
            color: #345675;
        }

        .section-heading span {
            color: #8da5ba;
            font-size: 11px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 17px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 18px rgba(50,90,130,.04);
            transition: .3s;
            animation: fadeUp .6s ease both;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(50,90,130,.1);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 19px;
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .blue { background: #e5f2ff; color: #3689df; }
        .orange { background: #fff1e4; color: #ed9a43; }
        .purple { background: #f1eaff; color: #9872df; }
        .green { background: #e4f8ed; color: #39b879; }

        .stat-card h2 {
            font-size: 27px;
            color: #294b6c;
            margin-bottom: 6px;
        }

        .stat-card p {
            font-size: 11px;
            color: #91a4b7;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 20px;
            margin-bottom: 25px;
        }

        .panel {
            background: white;
            padding: 23px;
            border-radius: 16px;
            box-shadow: 0 4px 18px rgba(50,90,130,.04);
        }

        .chart-container {
            height: 260px;
            margin-top: 20px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 0;
            border-bottom: 1px solid #f0f4f8;
        }

        .activity-item:last-child {
            border: none;
        }

        .activity-icon {
            width: 37px;
            height: 37px;
            border-radius: 11px;
            background: #e8f3ff;
            color: #3689df;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .activity-item strong {
            font-size: 12px;
            display: block;
            margin-bottom: 5px;
        }

        .activity-item small {
            font-size: 10px;
            color: #94a8ba;
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

        .empty-state p {
            font-size: 12px;
        }

        .table-panel {
            background: white;
            border-radius: 16px;
            padding: 23px;
            box-shadow: 0 4px 18px rgba(50,90,130,.04);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            min-width: 550px;
        }

        th {
            text-align: left;
            font-size: 11px;
            color: #91a6ba;
            font-weight: 600;
            padding: 14px 12px;
            background: #f7faff;
        }

        td {
            font-size: 11px;
            color: #617d96;
            padding: 17px 12px;
            border-bottom: 1px solid #f0f4f8;
        }

        .status {
            background: #edf5ff;
            color: #398bdc;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
        }

        .mobile-toggle {
            display: none;
            border: none;
            background: white;
            color: #3689df;
            padding: 10px 13px;
            border-radius: 9px;
            font-size: 18px;
            cursor: pointer;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media(max-width: 1100px) {
            .stats { grid-template-columns: repeat(2, 1fr); }
            .content-grid { grid-template-columns: 1fr; }
        }

        @media(max-width: 700px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
                padding: 20px 15px;
            }

            .mobile-toggle {
                display: block;
            }

            .topbar {
                gap: 12px;
            }

            .topbar h1 {
                font-size: 19px;
            }

            .date {
                display: none;
            }

            .welcome {
                padding: 22px;
            }

            .welcome h2 {
                font-size: 17px;
            }

            .welcome-icon {
                font-size: 40px;
                margin: 0;
            }

            .stats {
                gap: 11px;
            }

            .stat-card {
                padding: 15px;
            }

            .stat-card h2 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar" id="sidebar">

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
            <a href="{{ route('admin.dashboard') }}" class="active">
                <i class="fa-solid fa-chart-pie"></i>
                Dashboard
            </a>

            <a href="{{ route('admin.complaints.index') }}">
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

            <div style="display:flex;align-items:center;gap:13px;">
                <button class="mobile-toggle" onclick="toggleSidebar()">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <div>
                    <h1>Dashboard Admin</h1>
                    <p>Selamat datang di pusat pengelolaan SM Customer Care.</p>
                </div>
            </div>

            <div class="top-right">
                <div class="date">
                    <i class="fa-regular fa-calendar"></i>
                    {{ now()->translatedFormat('l, d F Y') }}
                </div>

                <div class="notification">
                    <i class="fa-regular fa-bell"></i>
                </div>
            </div>

        </header>


        <section class="welcome">
            <div>
                <h2>Halo, {{ auth()->user()->name ?? 'Administrator' }}! 👋</h2>
                <p>Kelola pengaduan dan layanan pelanggan Suara Merdeka melalui dashboard ini.</p>
            </div>

            <div class="welcome-icon">
                <i class="fa-solid fa-headset"></i>
            </div>
        </section>


        <div class="section-heading">
            <h3>Ringkasan Pengaduan</h3>
            <span>Data akan terhubung dengan database</span>
        </div>


        <section class="stats">

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon blue">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <i class="fa-solid fa-ellipsis" style="color:#b4c7d9"></i>
                </div>
                <h2>0</h2>
                <p>Total Pengaduan</p>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon orange">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <i class="fa-solid fa-ellipsis" style="color:#b4c7d9"></i>
                </div>
                <h2>0</h2>
                <p>Pengaduan Baru</p>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon purple">
                        <i class="fa-solid fa-spinner"></i>
                    </div>
                    <i class="fa-solid fa-ellipsis" style="color:#b4c7d9"></i>
                </div>
                <h2>0</h2>
                <p>Sedang Diproses</p>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon green">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <i class="fa-solid fa-ellipsis" style="color:#b4c7d9"></i>
                </div>
                <h2>0</h2>
                <p>Pengaduan Selesai</p>
            </div>

        </section>


        <section class="content-grid">

            <div class="panel">
                <div class="section-heading">
                    <h3>Statistik Pengaduan</h3>
                    <span>Ilustrasi data bulanan</span>
                </div>

                <div class="chart-container">
                    <canvas id="complaintChart"></canvas>
                </div>
            </div>


            <div class="panel">
                <div class="section-heading">
                    <h3>Aktivitas Terbaru</h3>
                    <span>Aktivitas sistem</span>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                    <div>
                        <strong>Administrator masuk</strong>
                        <small>Anda berhasil masuk ke sistem</small>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fa-solid fa-database"></i>
                    </div>
                    <div>
                        <strong>Sistem Customer Care</strong>
                        <small>Dashboard berhasil dimuat</small>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fa-solid fa-circle-info"></i>
                    </div>
                    <div>
                        <strong>Informasi sistem</strong>
                        <small>Menunggu data pengaduan</small>
                    </div>
                </div>
            </div>

        </section>


        <section class="table-panel">

            <div class="section-heading">
                <h3>Pengaduan Terbaru</h3>
                <span>Data pengaduan pelanggan</span>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID PENGADUAN</th>
                        <th>NAMA PELANGGAN</th>
                        <th>TANGGAL</th>
                        <th>STATUS</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">
                                <i class="fa-regular fa-folder-open"></i>
                                <p>Belum ada data pengaduan.</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </section>

    </main>


    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }

        const chartCanvas = document.getElementById('complaintChart');

        new Chart(chartCanvas, {
            type: 'line',
            data: {
                labels: [
                    'Jan', 'Feb', 'Mar', 'Apr',
                    'Mei', 'Jun', 'Jul', 'Agu',
                    'Sep', 'Okt', 'Nov', 'Des'
                ],
                datasets: [{
                    label: 'Contoh jumlah pengaduan',
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    borderColor: '#398bdc',
                    backgroundColor: 'rgba(57,139,220,0.12)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 3,
                    pointRadius: 4,
                    pointBackgroundColor: '#398bdc'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        },
                        grid: {
                            color: '#f0f4f8'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>

</body>
</html>
