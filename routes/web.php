
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\Admin\PelangganController;
use App\Services\BeritaSuaraMerdekaService;
use App\Models\Pengaduan;
use App\Models\User;


// ==========================================
// HALAMAN UTAMA
// ==========================================

Route::get('/', function () {
    return redirect()->route('login');
});


// ==========================================
// HALAMAN LOGIN ADMIN DAN USER
// ==========================================

// Halaman Login Admin
Route::get('/login/admin', function () {
    return view('auth.login-form', [
        'loginType' => 'admin'
    ]);
})->middleware('guest')->name('login.admin');

// Halaman Login User
Route::get('/login/user', function () {
    return view('auth.login-form', [
        'loginType' => 'user'
    ]);
})->middleware('guest')->name('login.user');


// ==========================================
// ROUTE UNTUK USER YANG SUDAH LOGIN
// ==========================================

Route::middleware(['auth'])->group(function () {

    // ======================================
    // DASHBOARD USER + BERITA + NOTIFIKASI
    // ======================================

    Route::get('/dashboard', function (BeritaSuaraMerdekaService $beritaService) {

        $berita = $beritaService->ambilBerita();

        // Mengambil 5 notifikasi terbaru milik user
        $notifications = auth()->user()
            ->notifications()
            ->latest()
            ->take(5)
            ->get();

        // Menghitung notifikasi yang belum dibaca
        $unreadNotificationsCount = auth()->user()
            ->unreadNotifications()
            ->count();

        return view('dashboard', compact(
            'berita',
            'notifications',
            'unreadNotificationsCount'
        ));

    })->name('dashboard');


    // ======================================
    // FITUR PENGADUAN USER
    // ======================================

    Route::get('/pengaduan/create', [PengaduanController::class, 'create'])
        ->name('pengaduan.create');

    Route::post('/pengaduan', [PengaduanController::class, 'store'])
        ->name('pengaduan.store');

    Route::get('/telusuri-aduan', [PengaduanController::class, 'telusuri'])
        ->name('pengaduan.telusuri');


    // ======================================
    // FITUR NOTIFIKASI USER
    // ======================================

    Route::post('/notifikasi/{id}/baca', function ($id) {

        $notification = auth()->user()
            ->notifications()
            ->where('id', $id)
            ->firstOrFail();

        $notification->markAsRead();

        return back()->with(
            'success',
            'Notifikasi berhasil dibaca.'
        );

    })->name('notifikasi.baca');


    // ======================================
    // PROFILE USER
    // ======================================

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


// ==========================================
// ROUTE KHUSUS ADMIN
// ==========================================

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // ======================================
        // DASHBOARD ADMIN
        // ======================================

        Route::get('/dashboard', function () {

            // Menghitung total pengaduan
            $totalComplaints = Pengaduan::count();

            // Menghitung pengaduan berdasarkan status
            $newComplaints = Pengaduan::where('status', 'Baru')->count();

            $processingComplaints = Pengaduan::where('status', 'Diproses')->count();

            $completedComplaints = Pengaduan::where('status', 'Selesai')->count();


            // Mengambil 5 pengaduan terbaru beserta data pelanggan
            $latestComplaints = Pengaduan::with('user')
                ->latest()
                ->take(5)
                ->get();


            // Menyiapkan data grafik Januari sampai Desember
            $monthlyComplaintData = array_fill(0, 12, 0);

            $monthlyData = Pengaduan::selectRaw(
                'MONTH(created_at) as bulan, COUNT(*) as total'
            )
                ->whereYear('created_at', now()->year)
                ->groupBy('bulan')
                ->orderBy('bulan')
                ->get();

            foreach ($monthlyData as $data) {
                $monthlyComplaintData[$data->bulan - 1] = $data->total;
            }


            // Menghitung total pelanggan
            $totalPelanggan = User::where('role', 'user')->count();


            // Menampilkan dashboard admin
            return view('admin.dashboard', compact(
                'totalComplaints',
                'newComplaints',
                'processingComplaints',
                'completedComplaints',
                'latestComplaints',
                'monthlyComplaintData',
                'totalPelanggan'
            ));

        })->name('dashboard');


        // ======================================
        // MANAJEMEN PENGADUAN ADMIN
        // ======================================

        Route::get('/pengaduan', [ComplaintController::class, 'index'])
            ->name('complaints.index');

        Route::get('/pengaduan/{complaint}', [ComplaintController::class, 'show'])
            ->name('complaints.show');

        Route::put('/pengaduan/{complaint}', [ComplaintController::class, 'update'])
            ->name('complaints.update');

        Route::delete('/pengaduan/{complaint}', [ComplaintController::class, 'destroy'])
            ->name('complaints.destroy');


        // ======================================
        // MANAJEMEN PELANGGAN ADMIN
        // ======================================

        Route::get('/pelanggan', [PelangganController::class, 'index'])
            ->name('pelanggan.index');

        Route::get('/pelanggan/{pelanggan}', [PelangganController::class, 'show'])
            ->name('pelanggan.show');

});


// ==========================================
// ROUTE AUTHENTICATION BREEZE
// ==========================================

require __DIR__.'/auth.php';
