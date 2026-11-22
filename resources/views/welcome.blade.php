
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
            background: #f2f8ff;
            color: #172b4d;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button, input, select, textarea {
            font-family: inherit;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            min-height: 78px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7.5%;
            border-bottom: 1px solid #e7eef7;
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
            background: linear-gradient(135deg, #168fe5, #075ca8);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            font-weight: 800;
            box-shadow: 0 4px 12px rgba(22, 143, 229, .2);
        }

        .brand-name h2 {
            color: #0868bd;
            font-size: 17px;
            font-weight: 800;
        }

        .brand-name span {
            color: #8998ad;
            font-size: 12px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-menu a {
            font-size: 14px;
            font-weight: 600;
            color: #35445b;
            transition: .2s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #0878d1;
        }

        .nav-menu a.active {
            background: #e7f3ff;
            padding: 12px 15px;
            border-radius: 9px;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #e2f1ff;
            color: #0878d1;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 800;
        }

        .user-info span {
            font-size: 13px;
            font-weight: 600;
        }

        .btn-logout {
            border: none;
            background: #0878d1;
            color: white;
            padding: 12px 18px;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .btn-logout:hover {
            background: #075ca8;
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 23px;
            color: #0878d1;
            cursor: pointer;
        }

        /* ================= HERO ================= */

        .hero {
            background: linear-gradient(115deg, #168fe5, #0872c9 65%, #075ca8);
            color: white;
            min-height: 380px;
            padding: 65px 7.5%;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 330px;
            height: 330px;
            border-radius: 50%;
            background: rgba(255,255,255,.09);
            top: -145px;
            left: -80px;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            background: rgba(255,255,255,.08);
            bottom: -160px;
            right: -40px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 60px;
            align-items: center;
            max-width: 1400px;
            margin: auto;
        }

        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,.2);
            padding: 8px 15px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: 47px;
            font-weight: 800;
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .hero p {
            color: rgba(255,255,255,.94);
            font-size: 16px;
            line-height: 1.8;
            max-width: 570px;
            margin-bottom: 27px;
        }

        .search-box {
            display: flex;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            max-width: 530px;
            height: 53px;
            box-shadow: 0 5px 18px rgba(0,0,0,.08);
        }

        .search-box i {
            color: #0878d1;
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
            color: #26364d;
        }

        .search-box button {
            border: none;
            background: #075ca8;
            color: white;
            font-weight: 700;
            padding: 0 25px;
            cursor: pointer;
            transition: .2s;
        }

        .search-box button:hover {
            background: #064b89;
        }

        .hero-shortcuts {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 17px;
        }

        .shortcut {
            min-height: 105px;
            border: 1px solid rgba(255,255,255,.3);
            background: rgba(255,255,255,.17);
            border-radius: 17px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 12px;
            transition: .25s;
            backdrop-filter: blur(5px);
        }

        .shortcut:hover {
            background: rgba(255,255,255,.28);
            transform: translateY(-4px);
        }

        .shortcut i {
            font-size: 28px;
        }

        .shortcut span {
            font-size: 14px;
            font-weight: 700;
        }

        /* ================= MAIN CONTENT ================= */

        .container {
            max-width: 1400px;
            margin: auto;
            padding: 35px 7.5% 70px;
        }

        /* PANDUAN */

        .guide-card {
            background: white;
            border: 1px solid #e1eaf4;
            border-left: 5px solid #168fe5;
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
            background: #e4f2ff;
            color: #0878d1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            font-size: 25px;
            flex-shrink: 0;
        }

        .guide-text h3 {
            font-size: 17px;
            margin-bottom: 5px;
        }

        .guide-text p {
            font-size: 13px;
            color: #8998ad;
        }

        .btn-outline {
            border: 1px solid #168fe5;
            color: #0878d1;
            background: white;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 15px;
            transition: .2s;
            white-space: nowrap;
        }

        .btn-outline:hover {
            background: #0878d1;
            color: white;
        }

        /* ================= CONTENT GRID ================= */

        .content-grid {
            display: grid;
            grid-template-columns: .9fr 1.2fr;
            gap: 28px;
            align-items: start;
        }

        .section-card {
            background: white;
            border: 1px solid #e1eaf4;
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
            color: #0878d1;
            font-size: 18px;
        }

        .section-heading h3 {
            font-size: 18px;
            font-weight: 800;
        }

        .section-subtitle {
            font-size: 13px;
            color: #8998ad;
            margin-bottom: 23px;
        }

        /* LANGKAH PENGADUAN */

        .steps {
            display: flex;
            align-items: center;
            margin: 22px 0 27px;
        }

        .step-number {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #0878d1;
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
            background: #e3eaf2;
            margin: 0 10px;
        }

        .step-number.inactive {
            background: #e8edf3;
            color: #8998ad;
        }

        .step-label {
            font-size: 12px;
            color: #8998ad;
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
            color: #0878d1;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            border: 1px solid #dfe7f0;
            border-radius: 8px;
            padding: 13px 14px;
            outline: none;
            font-size: 13px;
            background: white;
            color: #35445b;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #168fe5;
            box-shadow: 0 0 0 3px rgba(22,143,229,.09);
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
            background: linear-gradient(110deg, #168fe5, #0868bd);
            color: white;
            border: none;
            border-radius: 9px;
            padding: 14px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .btn-main:hover {
            background: #075ca8;
            transform: translateY(-2px);
        }

        /* PENGADUAN TERBARU */

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
            color: #8998ad;
        }

        .see-all {
            border: 1px solid #e0e8f1;
            background: white;
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
            transition: .2s;
        }

        .see-all:hover {
            border-color: #168fe5;
            color: #0878d1;
        }

        .empty-state {
            background: white;
            border: 1px dashed #cdddeb;
            border-radius: 13px;
            padding: 48px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 75px;
            height: 75px;
            background: #e3f2ff;
            color: #0878d1;
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
            color: #8998ad;
            font-size: 13px;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .empty-state .btn-main {
            width: auto;
            display: inline-flex;
            padding: 12px 20px;
        }

        /* ================= FOOTER ================= */

        footer {
            background: linear-gradient(110deg, #075ca8, #0878d1);
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
            color: #d9edff;
            font-size: 12px;
        }

        .footer-right {
            color: #d9edff;
            font-size: 12px;
        }

        /* ================= RESPONSIVE ================= */

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
                top: 78px;
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
                min-height: 72px;
            }

            .brand-logo {
                width: 42px;
                height: 42px;
            }

            .brand-name h2 {
                font-size: 14px;
            }

            .nav-menu {
                top: 72px;
            }

            .hero {
                padding-top: 45px;
                padding-bottom: 45px;
            }

            .hero h1 {
                font-size: 31px;
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

    <a href="{{ route('dashboard') }}" class="brand">
        <div class="brand-logo">SM</div>

        <div class="brand-name">
            <h2>SM CUSTOMER CARE</h2>
            <span>SUARA MERDEKA</span>
        </div>
    </a>

    <nav class="nav-menu" id="navMenu">
        <a href="{{ route('dashboard') }}" class="active">Beranda</a>
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

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                Keluar
            </button>
        </form>

    </div>

    <button class="mobile-toggle" onclick="toggleMenu()" aria-label="Buka menu">
        <i class="fa-solid fa-bars"></i>
    </button>

</header>


<!-- HERO SECTION -->
<section class="hero">

    <div class="hero-content">

        <div>

            <div class="hero-label">
                <i class="fa-solid fa-headset"></i>
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


        <!-- MENU PINTASAN -->
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
                <i class="fa-solid fa-chart-column"></i>
                <span>Statistik</span>
            </a>

            <a href="#informasi" class="shortcut">
                <i class="fa-solid fa-newspaper"></i>
                <span>Informasi</span>
            </a>

        </div>

    </div>

</section>


<!-- KONTEN UTAMA -->
<main class="container">

    <!-- BUKU PANDUAN -->
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


    <!-- GRID KONTEN -->
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

            <!-- PROGRESS -->
            <div class="steps">

                <div class="step-number">1</div>

                <div class="step-line"></div>

                <div class="step-number inactive">2</div>

                <span class="step-label">Isi Form</span>

            </div>


            <!-- PREVIEW FORM -->
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
        <section id="informasi">

            <div class="latest-header">

                <div>
                    <h3>Pengaduan Terbaru</h3>
                    <p>Lihat perkembangan pengaduan pelanggan</p>
                </div>

                <a href="/pengaduan" class="see-all">
                    Lihat Semua
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>


            <!-- KONDISI KOSONG -->
            <div class="empty-state">

                <div class="empty-icon">
                    <i class="fa-solid fa-inbox"></i>
                </div>

                <h4>Belum Ada Pengaduan</h4>

                <p>
                    Saat ini belum ada informasi pengaduan yang
                    ditampilkan. Silakan buat pengaduan apabila
                    Anda membutuhkan bantuan.
                </p>

                <a href="/pengaduan/create" class="btn-main">
                    <i class="fa-solid fa-plus"></i>
                    Buat Pengaduan
                </a>

            </div>

        </section>

    </div>

</main>


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


<!-- JAVASCRIPT -->
<script>
    function toggleMenu() {
        document.getElementById('navMenu').classList.toggle('show');
    }
</script>

</body>
</html>
