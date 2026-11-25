
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SM Customer Care - Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
            color: inherit;
        }

        button, input, select, textarea {
            font-family: inherit;
        }

        /* NAVBAR */
        .navbar {
            height: 82px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7.5%;
            border-bottom: 1px solid #eee;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            border-radius: 13px;
            background: #bd171d;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            font-weight: 800;
            box-shadow: 0 4px 10px rgba(189,23,29,.2);
        }

        .brand-name h2 {
            color: #bd171d;
            font-size: 18px;
            font-weight: 800;
        }

        .brand-name span {
            color: #9299a6;
            font-size: 12px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .nav-menu a {
            font-size: 14px;
            font-weight: 600;
            color: #3d4656;
            transition: .2s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #bd171d;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-right: 5px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #fde7e8;
            color: #bd171d;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 800;
        }

        .user-info span {
            font-size: 13px;
            font-weight: 600;
        }

        .btn-login {
            border: 1px solid #bd171d;
            color: #bd171d;
            background: white;
            padding: 11px 19px;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-logout {
            border: none;
            background: #bd171d;
            color: white;
            padding: 12px 18px;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-logout:hover,
        .btn-main:hover {
            background: #9f1117;
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 23px;
            color: #bd171d;
            cursor: pointer;
        }

        /* HERO */
        .hero {
            background: linear-gradient(115deg, #bd171d, #9f151b);
            color: white;
            min-height: 385px;
            padding: 68px 7.5%;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: rgba(255,255,255,.045);
            top: -130px;
            left: -90px;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 240px;
            height: 240px;
            border-radius: 50%;
            background: rgba(255,255,255,.05);
            bottom: -150px;
            right: -40px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 65px;
            align-items: center;
            max-width: 1400px;
            margin: auto;
        }

        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,.18);
            padding: 8px 15px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .hero p {
            color: rgba(255,255,255,.9);
            font-size: 17px;
            line-height: 1.8;
            max-width: 560px;
            margin-bottom: 27px;
        }

        .search-box {
            display: flex;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            max-width: 520px;
            height: 53px;
        }

        .search-box i {
            color: #bd171d;
            align-self: center;
            padding-left: 17px;
        }

        .search-box input {
            flex: 1;
            border: none;
            outline: none;
            padding: 0 15px;
            font-size: 14px;
            min-width: 0;
        }

        .search-box button {
            border: none;
            background: #921117;
            color: white;
            font-weight: 700;
            padding: 0 24px;
            cursor: pointer;
        }

        .hero-shortcuts {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 17px;
        }

        .shortcut {
            min-height: 105px;
            border: 1px solid rgba(255,255,255,.25);
            background: rgba(255,255,255,.14);
            border-radius: 17px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 12px;
            transition: .25s;
        }

        .shortcut:hover {
            background: rgba(255,255,255,.25);
            transform: translateY(-4px);
        }

        .shortcut i {
            font-size: 28px;
        }

        .shortcut span {
            font-size: 14px;
            font-weight: 700;
        }

        /* MAIN CONTENT */
        .container {
            max-width: 1400px;
            margin: auto;
            padding: 35px 7.5% 70px;
        }

        /* GUIDE */
        .guide-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-left: 5px solid #bd171d;
            border-radius: 15px;
            min-height: 118px;
            padding: 23px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
            margin-bottom: 48px;
        }

        .guide-left {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .guide-icon {
            width: 62px;
            height: 62px;
            background: #fde7e8;
            color: #bd171d;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            font-size: 25px;
        }

        .guide-text h3 {
            font-size: 17px;
            margin-bottom: 5px;
        }

        .guide-text p {
            font-size: 13px;
            color: #9299a6;
        }

        .btn-outline {
            border: 1px solid #bd171d;
            color: #bd171d;
            background: white;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 15px;
            transition: .2s;
        }

        .btn-outline:hover {
            background: #bd171d;
            color: white;
        }

        /* CONTENT GRID */
        .content-grid {
            display: grid;
            grid-template-columns: .9fr 1.2fr;
            gap: 28px;
            align-items: start;
        }

        .section-card {
            background: white;
            border: 1px solid #e6e8ed;
            border-radius: 15px;
            padding: 27px;
            box-shadow: 0 3px 12px rgba(0,0,0,.035);
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 5px;
        }

        .section-heading i {
            color: #bd171d;
            font-size: 17px;
        }

        .section-heading h3 {
            font-size: 18px;
            font-weight: 800;
        }

        .section-subtitle {
            font-size: 13px;
            color: #9299a6;
            margin-bottom: 23px;
        }

        /* STEPS */
        .steps {
            display: flex;
            align-items: center;
            margin: 22px 0 27px;
        }

        .step-number {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #bd171d;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 800;
        }

        .step-line {
            flex: 1;
            height: 3px;
            background: #e5e7eb;
            margin: 0 10px;
        }

        .step-number.inactive {
            background: #e5e7eb;
            color: #9299a6;
        }

        .step-label {
            font-size: 12px;
            color: #9299a6;
        }

        /* FORM PREVIEW */
        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .form-group label span {
            color: #bd171d;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            border: 1px solid #dfe3e9;
            border-radius: 8px;
            padding: 13px 14px;
            outline: none;
            font-size: 13px;
            background: white;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #bd171d;
            box-shadow: 0 0 0 3px rgba(189,23,29,.08);
        }

        .form-group textarea {
            min-height: 95px;
            resize: vertical;
        }

        .btn-main {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            width: 100%;
            background: #bd171d;
            color: white;
            border: none;
            border-radius: 9px;
            padding: 14px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        /* LATEST COMPLAINTS */
        .latest-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 22px;
        }

        .latest-header h3 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .latest-header p {
            font-size: 13px;
            color: #9299a6;
        }

        .see-all {
            border: 1px solid #e0e3e9;
            background: white;
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .see-all:hover {
            border-color: #bd171d;
            color: #bd171d;
        }

        .empty-state {
            background: white;
            border: 1px dashed #d9dde5;
            border-radius: 13px;
            padding: 48px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 75px;
            height: 75px;
            background: #fde7e8;
            color: #bd171d;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 auto 18px;
            font-size: 28px;
        }

        .empty-state h4 {
            font-size: 16px;
            margin-bottom: 8px;
        }

        .empty-state p {
            color: #9299a6;
            font-size: 13px;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .empty-state .btn-main {
            width: auto;
            display: inline-flex;
            padding: 12px 20px;
        }

        /* FOOTER */
        footer {
            background: #20232b;
            color: white;
            padding: 35px 7.5%;
        }

        .footer-content {
            max-width: 1400px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .footer-content h3 {
            color: white;
            font-size: 17px;
            margin-bottom: 8px;
        }

        .footer-content p {
            color: #aeb4c0;
            font-size: 12px;
        }

        .footer-right {
            color: #aeb4c0;
            font-size: 12px;
        }

/* DASHBOARD STATISTICS */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 35px;
}

.stat-card {
    background: white;
    border: 1px solid #e6e8ed;
    border-radius: 14px;
    padding: 22px;
    display: flex;
    align-items: center;
    gap: 15px;
    box-shadow: 0 3px 12px rgba(0,0,0,.035);
}

.stat-icon {
    width: 48px;
    height: 48px;
    flex-shrink: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 12px;
    background: #fde7e8;
    color: #bd171d;
    font-size: 20px;
}

.stat-info p {
    color: #9299a6;
    font-size: 12px;
    margin-bottom: 6px;
}

.stat-info h3 {
    color: #202b3c;
    font-size: 25px;
    font-weight: 800;
}

/* RECENT COMPLAINTS */
.recent-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    padding: 17px 0;
    border-bottom: 1px solid #edf0f4;
}

.recent-item:last-child {
    border-bottom: none;
}

.recent-ticket {
    color: #bd171d;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 6px;
}

.recent-title {
    color: #303b4c;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 5px;
}

.recent-date {
    color: #9299a6;
    font-size: 11px;
}

.recent-status {
    padding: 7px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    white-space: nowrap;
}

.recent-baru {
    background: #e0f2fe;
    color: #0369a1;
}

.recent-diproses {
    background: #fef3c7;
    color: #92400e;
}

.recent-selesai {
    background: #dcfce7;
    color: #166534;
}

.recent-ditolak {
    background: #fee2e2;
    color: #991b1b;
}

.recent-lainnya {
    background: #f1f5f9;
    color: #475569;
}

.btn-detail {
    display: inline-block;
    margin-top: 8px;
    color: #bd171d;
    font-size: 12px;
    font-weight: 700;
}

@media(max-width: 1050px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media(max-width: 550px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .stat-card {
        padding: 14px;
        gap: 9px;
    }

    .stat-icon {
        width: 38px;
        height: 38px;
        font-size: 15px;
    }

    .stat-info h3 {
        font-size: 21px;
    }

    .recent-item {
        align-items: flex-start;
        flex-direction: column;
    }
}


        /* RESPONSIVE */
        @media(max-width: 1050px) {
            .navbar {
                padding: 0 4%;
            }

            .nav-menu {
                gap: 15px;
            }

            .nav-menu a {
                font-size: 12px;
            }

            .hero, .container {
                padding-left: 4%;
                padding-right: 4%;
            }
        }

        @media(max-width: 800px) {
            .mobile-toggle {
                display: block;
            }

            .nav-menu {
                display: none;
                position: absolute;
                top: 82px;
                left: 0;
                width: 100%;
                background: white;
                padding: 20px 5%;
                flex-direction: column;
                align-items: flex-start;
                box-shadow: 0 8px 15px rgba(0,0,0,.08);
            }

            .nav-menu.show {
                display: flex;
            }

            .nav-actions {
                display: none;
            }

            .hero-content {
                grid-template-columns: 1fr;
                gap: 35px;
            }

            .hero h1 {
                font-size: 38px;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width: 550px) {
            .navbar {
                height: 72px;
            }

            .brand-logo {
                width: 42px;
                height: 42px;
            }

            .brand-name h2 {
                font-size: 15px;
            }

            .nav-menu {
                top: 72px;
            }

            .hero {
                padding-top: 45px;
                padding-bottom: 45px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .hero p {
                font-size: 14px;
            }

            .hero-shortcuts {
                gap: 10px;
            }

            .shortcut {
                min-height: 95px;
            }

            .container {
                padding-top: 25px;
            }

            .guide-card {
                align-items: flex-start;
                flex-direction: column;
                padding: 20px;
            }

            .guide-left {
                align-items: flex-start;
            }

            .guide-icon {
                width: 48px;
                height: 48px;
                flex-shrink: 0;
            }

            .guide-text h3 {
                font-size: 14px;
            }

            .guide-card .btn-outline {
                width: 100%;
                justify-content: center;
            }

            .section-card {
                padding: 20px;
            }

            .latest-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .footer-content {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

@php
    $user = auth()->user();
    $nama = $user?->name ?? 'Pengguna';
    $inisial = strtoupper(substr($nama, 0, 1));
@endphp

<!-- NAVBAR -->
<header class="navbar">

    <a href="/dashboard" class="brand">
        <div class="brand-logo">SM</div>
        <div class="brand-name">
            <h2>SM CUSTOMER CARE</h2>
            <span>SUARA MERDEKA</span>
        </div>
    </a>

    <nav class="nav-menu" id="navMenu">
        <a href="/dashboard" class="active">Beranda</a>
        <a href="/pengaduan">Telusuri Aduan</a>
        <a href="#statistik">Statistik</a>
        <a href="#informasi">Informasi</a>
        <a href="#panduan">Panduan</a>
    </nav>

    <div class="nav-actions">
        <div class="user-info">
            <div class="avatar">{{ $inisial }}</div>
            <span>{{ $nama }}</span>
        </div>
        <a href="{{ route('profile.edit') }}"
   style="color:#bd171d; font-size:13px; font-weight:700;">
    Profil Saya
</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                Keluar
            </button>
        </form>
    </div>

    <button class="mobile-toggle" onclick="toggleMenu()">
        <i class="fa-solid fa-bars"></i>
    </button>

</header>


<!-- HERO SECTION -->
<section class="hero">

    <div class="hero-content">

        <div>
            <div class="hero-label">
                <i class="fa-solid fa-building"></i>
                LAYANAN PENGADUAN SUARA MERDEKA
            </div>

            <h1>SM CUSTOMER CARE</h1>

            <p>
                Sampaikan pertanyaan, kritik, dan pengaduan Anda
                dengan mudah. Kami siap mendengarkan dan membantu
                memberikan pelayanan terbaik.
            </p>

            <form class="search-box" action="/pengaduan" method="GET">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input
                    type="text"
                    name="kode"
                    placeholder="Cari dengan kode pengaduan..."
                >
                <button type="submit">Cari</button>
            </form>
        </div>

        <div class="hero-shortcuts">

            <a href="/pengaduan/create" class="shortcut">
                <i class="fa-solid fa-circle-plus"></i>
                <span>Buat Pengaduan</span>
            </a>

            <a href="/pengaduan" class="shortcut">
                <i class="fa-solid fa-magnifying-glass"></i>
                <span>Telusuri Aduan</span>
            </a>

            <a href="#statistik" class="shortcut">
                <i class="fa-solid fa-chart-pie"></i>
                <span>Statistik</span>
            </a>

            <a href="#informasi" class="shortcut">
                <i class="fa-solid fa-newspaper"></i>
                <span>Informasi</span>
            </a>

        </div>

    </div>

</section>


<!-- MAIN CONTENT -->
<main class="container">

<!-- STATISTIK PENGADUAN -->
<section class="stats-grid" id="statistik">

    <div class="stat-card">
        <div class="stat-icon">
            <i class="fa-solid fa-file-lines"></i>
        </div>
        <div class="stat-info">
            <p>Total Pengaduan</p>
            <h3>{{ $totalPengaduan }}</h3>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="fa-solid fa-clock"></i>
        </div>
        <div class="stat-info">
            <p>Pengaduan Baru</p>
            <h3>{{ $pengaduanBaru }}</h3>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="fa-solid fa-spinner"></i>
        </div>
        <div class="stat-info">
            <p>Sedang Diproses</p>
            <h3>{{ $pengaduanDiproses }}</h3>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <div class="stat-info">
            <p>Pengaduan Selesai</p>
            <h3>{{ $pengaduanSelesai }}</h3>
        </div>
    </div>

</section>


    <!-- PANDUAN -->
    <section class="guide-card" id="panduan">

        <div class="guide-left">
            <div class="guide-icon">
                <i class="fa-solid fa-book-open"></i>
            </div>

            <div class="guide-text">
                <h3>Buku Panduan SM Customer Care</h3>
                <p>
                    Pelajari cara membuat pengaduan dan memantau
                    proses penanganan laporan Anda.
                </p>
            </div>
        </div>

        <a href="#informasi" class="btn-outline">
            Baca Panduan
            <i class="fa-solid fa-arrow-right"></i>
        </a>

    </section>


    <!-- CONTENT GRID -->
    <div class="content-grid">

        <!-- FORM PENGADUAN -->
        <section class="section-card">

            <div class="section-heading">
                <i class="fa-solid fa-file-circle-plus"></i>
                <h3>Buat Pengaduan</h3>
            </div>

            <p class="section-subtitle">
                Sampaikan pengaduan Anda secara mudah dan cepat.
            </p>

            <div class="steps">
                <div class="step-number">1</div>
                <div class="step-line"></div>
                <div class="step-number inactive">2</div>
                <span class="step-label">Isi Form</span>
            </div>

            <div class="form-group">
                <label>Judul Pengaduan <span>*</span></label>
                <input
                    type="text"
                    placeholder="Contoh: Kendala berlangganan koran"
                    disabled
                >
            </div>

            <div class="form-group">
                <label>Kategori Pengaduan <span>*</span></label>
                <select disabled>
                    <option>Pilih kategori pengaduan</option>
                    <option>Layanan Pelanggan</option>
                    <option>Langganan</option>
                    <option>Pembayaran</option>
                    <option>Produk dan Informasi</option>
                    <option>Lainnya</option>
                </select>
            </div>

            <div class="form-group">
                <label>Deskripsi Pengaduan <span>*</span></label>
                <textarea
                    placeholder="Ceritakan detail pengaduan Anda..."
                    disabled
                ></textarea>
            </div>

            <a href="/pengaduan/create" class="btn-main">
                Lanjutkan Buat Pengaduan
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </section>

<!-- PENGADUAN TERBARU -->
<section id="informasi" class="section-card">

    <div class="latest-header">
        <div>
            <h3>Pengaduan Terbaru</h3>
            <p>Perkembangan laporan yang telah kamu kirimkan</p>
        </div>

        <a href="{{ route('pengaduan.index') }}" class="see-all">
            Lihat Semua
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>

    @forelse($latestPengaduan as $pengaduan)

        @php
            $statusClass = match($pengaduan->status) {
                'Baru' => 'recent-baru',
                'Diproses' => 'recent-diproses',
                'Selesai' => 'recent-selesai',
                'Ditolak' => 'recent-ditolak',
                default => 'recent-lainnya',
            };
        @endphp

        <div class="recent-item">

            <div>
                <div class="recent-ticket">
                    {{ $pengaduan->ticket_number }}
                </div>

                <div class="recent-title">
                    {{ $pengaduan->title }}
                </div>

                <div class="recent-date">
                    {{ $pengaduan->created_at->format('d/m/Y H:i') }}
                    · {{ $pengaduan->category }}
                </div>

                <a href="{{ route('pengaduan.show', $pengaduan->ticket_number) }}"
                   class="btn-detail">
                    Lihat Detail →
                </a>
            </div>

            <span class="recent-status {{ $statusClass }}">
                {{ $pengaduan->status }}
            </span>

        </div>

    @empty

        <div class="empty-state">

            <div class="empty-icon">
                <i class="fa-solid fa-inbox"></i>
            </div>

            <h4>Belum Ada Pengaduan</h4>

            <p>
                Kamu belum pernah mengirimkan pengaduan.
                Silakan buat laporan jika membutuhkan bantuan.
            </p>

            <a href="{{ route('pengaduan.create') }}" class="btn-main">
                <i class="fa-solid fa-plus"></i>
                Buat Pengaduan
            </a>

        </div>

    @endforelse

</section>


<!-- FOOTER -->
<footer>

    <div class="footer-content">

        <div>
            <h3>SM CUSTOMER CARE</h3>
            <p>
                Layanan pengaduan dan bantuan pelanggan
                Suara Merdeka.
            </p>
        </div>

        <div class="footer-right">
            &copy; {{ date('Y') }} SM Customer Care. All Rights Reserved.
        </div>

    </div>

</footer>


<script>
    function toggleMenu() {
        document.getElementById('navMenu').classList.toggle('show');
    }
</script>

</body>
</html>
