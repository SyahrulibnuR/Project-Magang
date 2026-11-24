
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SM Customer Care - Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        *{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:'Inter',sans-serif;background:#f6f7f9;color:#172033;}
        a{text-decoration:none;color:inherit;}
        button,input,select,textarea{font-family:inherit;}

        /* NAVBAR */
        .navbar{
            min-height:82px;
            background:white;
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:0 7.5%;
            border-bottom:1px solid #eee;
            position:sticky;
            top:0;
            z-index:100;
        }

        .brand{display:flex;align-items:center;gap:12px;}
        .brand-logo{
            width:48px;height:48px;border-radius:13px;
            background:#bd171d;color:white;
            display:flex;align-items:center;justify-content:center;
            font-size:19px;font-weight:800;
            box-shadow:0 4px 10px rgba(189,23,29,.2);
        }
        .brand-name h2{color:#bd171d;font-size:18px;font-weight:800;}
        .brand-name span{color:#9299a6;font-size:12px;}

        .nav-menu{display:flex;align-items:center;gap:22px;}
        .nav-menu > a{
            font-size:13px;font-weight:600;
            color:#3d4656;transition:.2s;
        }
        .nav-menu > a:hover,.nav-menu > a.active{color:#bd171d;}

        .nav-actions{display:flex;align-items:center;gap:12px;}
        .user-info{display:flex;align-items:center;gap:9px;margin-right:5px;}
        .avatar{
            width:38px;height:38px;border-radius:50%;
            background:#fde7e8;color:#bd171d;
            display:flex;justify-content:center;align-items:center;
            font-weight:800;
        }
        .user-info span{font-size:13px;font-weight:600;}

        .btn-logout{
            border:none;background:#bd171d;color:white;
            padding:12px 18px;border-radius:8px;
            font-weight:700;cursor:pointer;
        }
        .btn-logout:hover,.btn-main:hover{background:#9f1117;}

        .mobile-toggle{
            display:none;background:none;border:none;
            font-size:23px;color:#bd171d;cursor:pointer;
        }

        /* NOTIFIKASI LONCENG */
        .notification-wrapper{
            position:relative;
            display:flex;
            align-items:center;
        }

        .notification-button{
            position:relative;
            width:42px;
            height:42px;
            border:1px solid #eee;
            background:white;
            color:#bd171d;
            border-radius:10px;
            font-size:19px;
            cursor:pointer;
            display:flex;
            align-items:center;
            justify-content:center;
            transition:.2s;
        }

        .notification-button:hover{background:#fde7e8;}

        .notification-badge{
            position:absolute;
            top:-6px;
            right:-6px;
            min-width:19px;
            height:19px;
            padding:0 5px;
            border-radius:20px;
            background:#e32636;
            color:white;
            font-size:10px;
            font-weight:800;
            display:flex;
            align-items:center;
            justify-content:center;
            border:2px solid white;
        }

        .notification-dropdown{
            display:none;
            position:absolute;
            top:52px;
            right:0;
            width:350px;
            max-width:calc(100vw - 30px);
            background:white;
            border:1px solid #e5e7eb;
            border-radius:13px;
            box-shadow:0 10px 30px rgba(0,0,0,.13);
            z-index:999;
            overflow:hidden;
        }

        .notification-dropdown.show{display:block;}

        .notification-header{
            padding:17px;
            border-bottom:1px solid #eee;
            display:flex;
            align-items:center;
            justify-content:space-between;
        }

        .notification-header h3{font-size:15px;font-weight:800;}
        .notification-header span{
            font-size:11px;color:#bd171d;font-weight:700;
        }

        .notification-list{max-height:380px;overflow-y:auto;}

        .notification-item{
            padding:15px;
            border-bottom:1px solid #f0f0f0;
            background:white;
        }

        .notification-item.unread{background:#fff8f8;}
        .notification-item:last-child{border-bottom:none;}

        .notification-item h4{
            font-size:13px;color:#172033;margin-bottom:6px;
        }

        .notification-item p{
            font-size:12px;color:#64748b;
            line-height:1.6;overflow-wrap:anywhere;
        }

        .notification-ticket{
            display:block;font-size:11px;
            color:#bd171d;font-weight:700;margin-top:8px;
        }

        .notification-response{
            margin-top:9px;padding:10px;
            background:#f8fafc;border-radius:8px;
            font-size:12px;color:#334155;
            line-height:1.6;overflow-wrap:anywhere;
        }

        .notification-read-form{margin-top:10px;text-align:right;}

        .notification-read-button{
            border:none;background:#bd171d;color:white;
            padding:7px 11px;border-radius:6px;
            font-size:11px;font-weight:700;cursor:pointer;
        }

        .notification-read-button:hover{background:#9f1117;}

        .notification-empty{
            padding:28px 15px;text-align:center;
            color:#9299a6;font-size:12px;line-height:1.7;
        }

        /* HERO */
        .hero{
            background:linear-gradient(115deg,#bd171d,#9f151b);
            color:white;min-height:385px;
            padding:68px 7.5%;position:relative;overflow:hidden;
        }

        .hero::before{
            content:"";position:absolute;width:320px;height:320px;
            border-radius:50%;background:rgba(255,255,255,.045);
            top:-130px;left:-90px;
        }

        .hero::after{
            content:"";position:absolute;width:240px;height:240px;
            border-radius:50%;background:rgba(255,255,255,.05);
            bottom:-150px;right:-40px;
        }

        .hero-content{
            position:relative;z-index:2;
            display:grid;grid-template-columns:1.2fr 1fr;
            gap:65px;align-items:center;
            max-width:1400px;margin:auto;
        }

        .hero-label{
            display:inline-flex;align-items:center;gap:8px;
            background:rgba(255,255,255,.18);
            padding:8px 15px;border-radius:30px;
            font-size:12px;font-weight:700;margin-bottom:20px;
        }

        .hero h1{font-size:48px;font-weight:800;margin-bottom:15px;line-height:1.2;}
        .hero p{
            color:rgba(255,255,255,.9);font-size:17px;
            line-height:1.8;max-width:560px;margin-bottom:27px;
        }

        .search-box{
            display:flex;background:white;border-radius:12px;
            overflow:hidden;max-width:520px;height:53px;
        }

        .search-box i{color:#bd171d;align-self:center;padding-left:17px;}
        .search-box input{
            flex:1;border:none;outline:none;
            padding:0 15px;font-size:14px;min-width:0;
        }
        .search-box button{
            border:none;background:#921117;color:white;
            font-weight:700;padding:0 24px;cursor:pointer;
        }

        .hero-shortcuts{
            display:grid;grid-template-columns:repeat(2,1fr);gap:17px;
        }

        .shortcut{
            min-height:105px;border:1px solid rgba(255,255,255,.25);
            background:rgba(255,255,255,.14);border-radius:17px;
            color:white;display:flex;flex-direction:column;
            justify-content:center;align-items:center;
            gap:12px;transition:.25s;
        }

        .shortcut:hover{
            background:rgba(255,255,255,.25);
            transform:translateY(-4px);
        }

        .shortcut i{font-size:28px;}
        .shortcut span{font-size:14px;font-weight:700;}

        /* MAIN CONTENT */
        .container{
            max-width:1400px;margin:auto;
            padding:35px 7.5% 70px;
        }

        /* GUIDE */
        .guide-card{
            background:white;border:1px solid #e5e7eb;
            border-left:5px solid #bd171d;border-radius:15px;
            min-height:118px;padding:23px 28px;
            display:flex;align-items:center;
            justify-content:space-between;gap:20px;
            box-shadow:0 3px 12px rgba(0,0,0,.04);
            margin-bottom:48px;
        }

        .guide-left{display:flex;align-items:center;gap:18px;}
        .guide-icon{
            width:62px;height:62px;background:#fde7e8;
            color:#bd171d;display:flex;align-items:center;
            justify-content:center;border-radius:15px;font-size:25px;
        }

        .guide-text h3{font-size:17px;margin-bottom:5px;}
        .guide-text p{font-size:13px;color:#9299a6;}

        .btn-outline{
            border:1px solid #bd171d;color:#bd171d;
            background:white;padding:12px 20px;
            border-radius:8px;font-weight:700;
            display:inline-flex;align-items:center;gap:15px;
            transition:.2s;
        }

        .btn-outline:hover{background:#bd171d;color:white;}

        /* CONTENT GRID */
        .content-grid{
            display:grid;grid-template-columns:.9fr 1.2fr;
            gap:28px;align-items:start;
        }

        .section-card{
            background:white;border:1px solid #e6e8ed;
            border-radius:15px;padding:27px;
            box-shadow:0 3px 12px rgba(0,0,0,.035);
        }

        .section-heading{
            display:flex;align-items:center;gap:10px;margin-bottom:5px;
        }

        .section-heading i{color:#bd171d;font-size:17px;}
        .section-heading h3{font-size:18px;font-weight:800;}
        .section-subtitle{font-size:13px;color:#9299a6;margin-bottom:23px;}

        /* STEPS */
        .steps{display:flex;align-items:center;margin:22px 0 27px;}
        .step-number{
            width:34px;height:34px;border-radius:50%;
            background:#bd171d;color:white;
            display:flex;align-items:center;justify-content:center;
            font-size:13px;font-weight:800;
        }

        .step-line{flex:1;height:3px;background:#e5e7eb;margin:0 10px;}
        .step-number.inactive{background:#e5e7eb;color:#9299a6;}
        .step-label{font-size:12px;color:#9299a6;}

        /* FORM */
        .form-group{margin-bottom:17px;}
        .form-group label{
            display:block;font-size:13px;font-weight:700;margin-bottom:8px;
        }

        .form-group label span{color:#bd171d;}

        .form-group input,.form-group select,.form-group textarea{
            width:100%;border:1px solid #dfe3e9;
            border-radius:8px;padding:13px 14px;
            outline:none;font-size:13px;background:white;
        }

        .form-group input:focus,.form-group textarea:focus,
        .form-group select:focus{
            border-color:#bd171d;
            box-shadow:0 0 0 3px rgba(189,23,29,.08);
        }

        .form-group textarea{min-height:95px;resize:vertical;}

        .btn-main{
            display:flex;justify-content:center;align-items:center;
            gap:10px;width:100%;background:#bd171d;
            color:white;border:none;border-radius:9px;
            padding:14px;font-size:14px;font-weight:700;
            cursor:pointer;transition:.2s;
        }

        /* LATEST COMPLAINTS */
        .latest-header{
            display:flex;justify-content:space-between;
            align-items:center;gap:15px;margin-bottom:22px;
        }

        .latest-header h3{font-size:18px;margin-bottom:5px;}
        .latest-header p{font-size:13px;color:#9299a6;}

        .see-all{
            border:1px solid #e0e3e9;background:white;
            padding:10px 15px;border-radius:8px;
            font-size:12px;font-weight:700;white-space:nowrap;
        }

        .see-all:hover{border-color:#bd171d;color:#bd171d;}

        .empty-state{
            background:white;border:1px dashed #d9dde5;
            border-radius:13px;padding:48px 20px;text-align:center;
        }

        .empty-icon{
            width:75px;height:75px;background:#fde7e8;
            color:#bd171d;display:flex;align-items:center;
            justify-content:center;border-radius:50%;
            margin:0 auto 18px;font-size:28px;
        }

        .empty-state h4{font-size:16px;margin-bottom:8px;}
        .empty-state p{
            color:#9299a6;font-size:13px;
            line-height:1.7;margin-bottom:20px;
        }

        .empty-state .btn-main{
            width:auto;display:inline-flex;padding:12px 20px;
        }

        /* BERITA TERBARU */
        .news-section{
            margin-top:50px;padding:35px;background:#fff;
            border:1px solid #e6e8ed;border-radius:15px;
            box-shadow:0 3px 12px rgba(0,0,0,.035);
        }

        .news-header{
            display:flex;justify-content:space-between;
            align-items:center;gap:15px;margin-bottom:25px;
        }

        .news-header h2{
            font-size:21px;font-weight:800;
            color:#172033;margin-bottom:7px;
        }

        .news-header p{color:#9299a6;font-size:13px;}
        .news-header a{color:#bd171d;font-size:13px;font-weight:700;}

        .news-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px;}

        .news-card{
            background:white;border:1px solid #e6e8ed;
            border-radius:12px;overflow:hidden;transition:.25s;
        }

        .news-card:hover{
            transform:translateY(-5px);
            box-shadow:0 8px 20px rgba(0,0,0,.08);
        }

        .news-image{
            width:100%;height:180px;
            object-fit:cover;display:block;
        }

        .news-no-image{
            height:180px;background:#fde7e8;color:#bd171d;
            display:flex;align-items:center;justify-content:center;
            font-weight:800;
        }

        .news-content{padding:18px;}

        .news-category{
            display:inline-block;background:#fde7e8;
            color:#bd171d;padding:6px 11px;
            border-radius:20px;font-size:11px;font-weight:700;
        }

        .news-content h3{
            font-size:15px;line-height:1.6;
            margin:13px 0;color:#172033;
        }

        .news-date{color:#9299a6;font-size:12px;margin-bottom:13px;}
        .news-link{color:#bd171d;font-size:13px;font-weight:700;}

        .news-empty{
            padding:35px;text-align:center;
            background:#f8fafc;border-radius:12px;color:#64748b;
        }

        /* FOOTER */
        footer{background:#20232b;color:white;padding:35px 7.5%;}
        .footer-content{
            max-width:1400px;margin:auto;
            display:flex;justify-content:space-between;
            align-items:center;gap:20px;
        }

        .footer-content h3{color:white;font-size:17px;margin-bottom:8px;}
        .footer-content p{color:#aeb4c0;font-size:12px;}
        .footer-right{color:#aeb4c0;font-size:12px;}

        /* RESPONSIVE */
        @media(max-width:1050px){
            .navbar{padding:0 4%;}
            .nav-menu{gap:13px;}
            .nav-menu > a{font-size:12px;}
            .hero,.container{padding-left:4%;padding-right:4%;}
        }

        @media(max-width:800px){
            .mobile-toggle{display:block;}

            .nav-menu{
                display:none;position:absolute;top:82px;
                left:0;width:100%;background:white;
                padding:20px 5%;flex-direction:column;
                align-items:flex-start;gap:20px;
                box-shadow:0 8px 15px rgba(0,0,0,.08);
            }

            .nav-menu.show{display:flex;}
            .nav-actions{display:none;}

            .hero-content{grid-template-columns:1fr;gap:35px;}
            .hero h1{font-size:38px;}
            .content-grid{grid-template-columns:1fr;}
            .news-grid{grid-template-columns:repeat(2,1fr);}
        }

        @media(max-width:550px){
            .navbar{height:72px;min-height:72px;}
            .brand-logo{width:42px;height:42px;}
            .brand-name h2{font-size:15px;}
            .nav-menu{top:72px;}
            .hero{padding-top:45px;padding-bottom:45px;}
            .hero h1{font-size:32px;}
            .hero p{font-size:14px;}
            .hero-shortcuts{gap:10px;}
            .shortcut{min-height:95px;}
            .container{padding-top:25px;}
            .guide-card{
                align-items:flex-start;flex-direction:column;padding:20px;
            }
            .guide-left{align-items:flex-start;}
            .guide-icon{width:48px;height:48px;flex-shrink:0;}
            .guide-text h3{font-size:14px;}
            .guide-card .btn-outline{width:100%;justify-content:center;}
            .section-card{padding:20px;}
            .latest-header{align-items:flex-start;flex-direction:column;}
            .news-grid{grid-template-columns:1fr;}
            .news-section{padding:20px;}
            .news-header{align-items:flex-start;flex-direction:column;}
            .footer-content{flex-direction:column;align-items:flex-start;}

            .notification-dropdown{
                left:0;
                right:auto;
                width:min(350px, calc(100vw - 30px));
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

        <a href="{{ route('pengaduan.telusuri') }}">Telusuri Aduan</a>

        <a href="#statistik">Statistik</a>

        <a href="#informasi">Informasi</a>

        <a href="#panduan">Panduan</a>

        <a href="#berita">Berita</a>

        <!-- NOTIFIKASI LONCENG -->
        <div class="notification-wrapper">

            <button type="button"
                    class="notification-button"
                    onclick="toggleNotifications(event)"
                    aria-label="Notifikasi">

                <i class="fa-solid fa-bell"></i>

                @if(($unreadNotificationsCount ?? 0) > 0)
                    <span class="notification-badge">
                        {{ $unreadNotificationsCount > 99 ? '99+' : $unreadNotificationsCount }}
                    </span>
                @endif

            </button>

            <!-- DROPDOWN NOTIFIKASI -->
            <div class="notification-dropdown" id="notificationDropdown">

                <div class="notification-header">
                    <h3>Notifikasi</h3>

                    <span>
                        {{ $unreadNotificationsCount ?? 0 }} belum dibaca
                    </span>
                </div>

                <div class="notification-list">

                    @forelse($notifications ?? [] as $notification)

                        <div class="notification-item {{ $notification->read_at ? '' : 'unread' }}">

                            <h4>
                                <i class="fa-solid fa-message"
                                   style="color:#bd171d;margin-right:5px;"></i>

                                {{ $notification->data['title'] ?? 'Notifikasi Pengaduan' }}
                            </h4>

                            <p>
                                {{ $notification->data['message'] ?? 'Ada informasi baru mengenai pengaduan Anda.' }}
                            </p>

                            <span class="notification-ticket">
                                Tiket:
                                {{ $notification->data['ticket_number'] ?? '-' }}
                            </span>

                            @if(!empty($notification->data['admin_response']))

                                <div class="notification-response">

                                    <strong>Tanggapan Admin:</strong>

                                    <p>
                                        {{ $notification->data['admin_response'] }}
                                    </p>

                                </div>

                            @endif

                            @if(!$notification->read_at)

                                <form method="POST"
                                      action="{{ route('notifikasi.baca', $notification->id) }}"
                                      class="notification-read-form">

                                    @csrf

                                    <button type="submit"
                                            class="notification-read-button">
                                        Tandai Sudah Dibaca
                                    </button>

                                </form>

                            @else

                                <span style="display:block;margin-top:9px;font-size:11px;color:#269b70;">
                                    <i class="fa-solid fa-check"></i>
                                    Sudah dibaca
                                </span>

                            @endif

                        </div>

                    @empty

                        <div class="notification-empty">

                            <i class="fa-regular fa-bell-slash"
                               style="font-size:25px;margin-bottom:10px;"></i>

                            <p>Belum ada notifikasi.</p>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>
        <!-- AKHIR NOTIFIKASI -->

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

            <form class="search-box"
                  action="{{ route('pengaduan.telusuri') }}"
                  method="GET">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    name="kode_pengaduan"
                    placeholder="Cari dengan kode pengaduan..."
                    required
                >

                <button type="submit">Cari</button>

            </form>
        </div>

        <div class="hero-shortcuts">

            <a href="/pengaduan/create" class="shortcut">
                <i class="fa-solid fa-circle-plus"></i>
                <span>Buat Pengaduan</span>
            </a>

            <a href="{{ route('pengaduan.telusuri') }}" class="shortcut">
                <i class="fa-solid fa-magnifying-glass"></i>
                <span>Telusuri Aduan</span>
            </a>

            <a href="#statistik" class="shortcut">
                <i class="fa-solid fa-chart-pie"></i>
                <span>Statistik</span>
            </a>

            <a href="#berita" class="shortcut">
                <i class="fa-solid fa-newspaper"></i>
                <span>Berita Terbaru</span>
            </a>

        </div>

    </div>

</section>


<!-- MAIN CONTENT -->
<main class="container">

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
        <section id="informasi">

            <div class="latest-header">

                <div>
                    <h3>Pengaduan Terbaru</h3>
                    <p>Lihat perkembangan pengaduan pelanggan</p>
                </div>

                <a href="{{ route('pengaduan.telusuri') }}" class="see-all">
                    Lihat Semua
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>

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


<!-- BERITA TERBARU SUARA MERDEKA -->
<section class="container" id="berita" style="padding-top:0;">

    <div class="news-section">

        <div class="news-header">

            <div>
                <h2>
                    <i class="fa-solid fa-newspaper" style="color:#bd171d;"></i>
                    Berita Terbaru
                </h2>

                <p>Informasi dan berita terkini dari Suara Merdeka.</p>
            </div>

            <a href="https://www.suaramerdeka.com/"
               target="_blank"
               rel="noopener noreferrer">

                Lihat Semua Berita
                <i class="fa-solid fa-arrow-up-right-from-square"></i>

            </a>

        </div>

        @if(!empty($berita) && count($berita) > 0)

            <div class="news-grid">

                @foreach($berita as $item)

                    <article class="news-card">

                        @if(!empty($item['gambar']))

                            <img
                                src="{{ $item['gambar'] }}"
                                alt="{{ $item['judul'] }}"
                                class="news-image"
                                loading="lazy"
                            >

                        @else

                            <div class="news-no-image">
                                <i class="fa-solid fa-newspaper"></i>
                                &nbsp; SUARA MERDEKA
                            </div>

                        @endif

                        <div class="news-content">

                            <span class="news-category">
                                {{ $item['kategori'] ?? 'Berita' }}
                            </span>

                            <h3>{{ $item['judul'] }}</h3>

                            @if(!empty($item['tanggal']))

                                <p class="news-date">
                                    <i class="fa-regular fa-calendar"></i>
                                    {{ $item['tanggal'] }}
                                </p>

                            @endif

                            <a
                                href="{{ $item['link'] }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="news-link"
                            >
                                Baca Selengkapnya
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>

                    </article>

                @endforeach

            </div>

        @else

            <div class="news-empty">

                <i class="fa-solid fa-newspaper"
                   style="font-size:35px;color:#bd171d;margin-bottom:12px;">
                </i>

                <p>Berita terbaru belum tersedia saat ini.</p>

                <a href="https://www.suaramerdeka.com/"
                   target="_blank"
                   rel="noopener noreferrer"
                   style="color:#bd171d;font-weight:700;display:inline-block;margin-top:12px;">

                    Kunjungi Website Suara Merdeka

                </a>

            </div>

        @endif

    </div>

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


<!-- JAVASCRIPT -->
<script>

    // Menu navigasi mobile
    function toggleMenu() {
        document.getElementById('navMenu').classList.toggle('show');
    }

    // Membuka dan menutup notifikasi
    function toggleNotifications(event) {

        event.stopPropagation();

        const dropdown = document.getElementById('notificationDropdown');

        if (dropdown) {
            dropdown.classList.toggle('show');
        }

    }

    // Menutup notifikasi jika klik di luar dropdown
    document.addEventListener('click', function(event) {

        const wrapper = document.querySelector('.notification-wrapper');
        const dropdown = document.getElementById('notificationDropdown');

        if (wrapper && dropdown && !wrapper.contains(event.target)) {
            dropdown.classList.remove('show');
        }

    });

</script>

</body>
</html>
