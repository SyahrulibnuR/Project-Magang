<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Admin\ComplaintController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return redirect()->route('login');
});

// Login Admin
Route::get('/login/admin', function () {
    return view('auth.login-form', ['loginType' => 'admin']);
})->middleware('guest')->name('login.admin');

// Login User
Route::get('/login/user', function () {
    return view('auth.login-form', ['loginType' => 'user']);
})->middleware('guest')->name('login.user');


// Dashboard dan fitur User
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [PengaduanController::class, 'dashboard'])
        ->name('dashboard');

    // Form pengaduan
    Route::get('/pengaduan/create', [PengaduanController::class, 'create'])
        ->name('pengaduan.create');

    // Simpan pengaduan
    Route::post('/pengaduan', [PengaduanController::class, 'store'])
        ->name('pengaduan.store');

    // Riwayat pengaduan
    Route::get('/pengaduan', [PengaduanController::class, 'index'])
        ->name('pengaduan.index');

    // Detail dan pelacakan tiket
    Route::get('/pengaduan/{ticketNumber}', [PengaduanController::class, 'show'])
        ->where('ticketNumber', 'SMC-[0-9]{8}-[A-Z0-9]{6}')
        ->name('pengaduan.show');

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


// Fitur Admin
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/pengaduan', [ComplaintController::class, 'index'])
        ->name('admin.complaints.index');

    Route::get('/admin/pengaduan/{complaint}', [ComplaintController::class, 'show'])
        ->name('admin.complaints.show');

    Route::patch('/admin/pengaduan/{complaint}', [ComplaintController::class, 'update'])
        ->name('admin.complaints.update');

    Route::delete('/admin/pengaduan/{complaint}', [ComplaintController::class, 'destroy'])
        ->name('admin.complaints.destroy');
});

require __DIR__.'/auth.php';
