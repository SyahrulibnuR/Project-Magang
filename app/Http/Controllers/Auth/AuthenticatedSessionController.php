<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Menampilkan halaman pilihan login.
     */
    public function create(): View
{
    return view('auth.pilih-login');
}

    /**
     * Memproses login berdasarkan jenis akun.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $loginType = $request->input('login_type');

        // Validasi jenis akun
        if (!in_array($loginType, ['admin', 'user'], true)) {
            return back()->withErrors([
                'email' => 'Jenis akun tidak valid.'
            ])->onlyInput('email');
        }

        // Proses autentikasi Laravel Breeze
        $request->authenticate();

        $user = Auth::user();

        // Periksa kesesuaian role dengan pilihan login
        if ($user->role !== $loginType) {
            Auth::logout();

            return back()->withErrors([
                'email' => 'Jenis akun yang dipilih tidak sesuai dengan akun Anda.'
            ])->onlyInput('email');
        }

        // Regenerasi session
        $request->session()->regenerate();

        // Arahkan berdasarkan role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('dashboard');
    }

    /**
     * Logout pengguna.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
