
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Dashboard untuk pengguna yang sudah login
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

// Dashboard khusus Admin
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

});

require __DIR__.'/auth.php';
