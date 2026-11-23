<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\Admin\PelangganController;

use App\Models\Pengaduan;
use App\Models\User;


// ==========================================
// HALAMAN UTAMA
// ==========================================

Route::get('/', function () {
    return redirect()->route('login');
});


// ==========================================
// LOGIN ADMIN
// ==========================================

Route::get('/login/admin', function () {
    return view('auth.login-form', [
        'loginType' => 'admin'
    ]);
})->middleware('guest')->name('login.admin');


// ==========================================
// LOGIN USER
// ==========================================

Route::get('/login/user', function () {
    return view('auth.login-form', [
        'loginType' => 'user'
    ]);
})->middleware('guest')->name('login.user');


// ==========================================
// DASHBOARD DAN FITUR USER
// ==========================================

Route::middleware(['auth'])->group(function () {

    // Dashboard User
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    // Form Pengaduan User
    Route::get('/pengaduan/create', [PengaduanController::class, 'create'])
        ->name('pengaduan.create');

    // Simpan Pengaduan User
    Route::post('/pengaduan', [PengaduanController::class, 'store'])
        ->name('pengaduan.store');


    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


// ==========================================
// FITUR KHUSUS ADMIN
// ==========================================

Route::middleware(['auth', 'admin'])->group(function () {

    // --------------------------------------
    // DASHBOARD ADMIN
    // --------------------------------------

    Route::get('/admin/dashboard', function () {

        $totalComplaints = Pengaduan::count();

        $newComplaints = Pengaduan::where('status', 'Baru')->count();

        $processingComplaints = Pengaduan::where('status', 'Diproses')->count();

        $completedComplaints = Pengaduan::where('status', 'Selesai')->count();

        $totalCustomers = User::where('role', 'user')->count();

        $latestComplaints = Pengaduan::with('user')
            ->latest()
            ->take(5)
            ->get();

        $monthlyCounts = Pengaduan::selectRaw(
            'MONTH(created_at) as bulan, COUNT(*) as total'
        )
            ->whereYear('created_at', now()->year)
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        $monthlyComplaintData = collect(range(1, 12))
            ->map(function ($bulan) use ($monthlyCounts) {
                return (int) ($monthlyCounts[$bulan] ?? 0);
            })
            ->values()
            ->all();

        return view('admin.dashboard', compact(
            'totalComplaints',
            'newComplaints',
            'processingComplaints',
            'completedComplaints',
            'totalCustomers',
            'latestComplaints',
            'monthlyComplaintData'
        ));

    })->name('admin.dashboard');


    // --------------------------------------
    // DATA PENGADUAN
    // --------------------------------------

    Route::get('/admin/pengaduan', [ComplaintController::class, 'index'])
        ->name('admin.complaints.index');

    Route::get('/admin/pengaduan/{complaint}', [ComplaintController::class, 'show'])
        ->name('admin.complaints.show');

    Route::patch('/admin/pengaduan/{complaint}', [ComplaintController::class, 'update'])
        ->name('admin.complaints.update');

    Route::delete('/admin/pengaduan/{complaint}', [ComplaintController::class, 'destroy'])
        ->name('admin.complaints.destroy');


    // --------------------------------------
    // DATA PELANGGAN
    // --------------------------------------

    Route::get('/admin/pelanggan', [PelangganController::class, 'index'])
        ->name('admin.pelanggan.index');

    Route::get('/admin/pelanggan/{pelanggan}', [PelangganController::class, 'show'])
        ->name('admin.pelanggan.show');

});


// ==========================================
// ROUTE AUTHENTICATION BREEZE
// ==========================================

require __DIR__.'/auth.php';
