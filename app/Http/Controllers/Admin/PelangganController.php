<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Menampilkan daftar pelanggan
    public function index(Request $request)
    {
        $query = User::query()
            ->where('role', 'user')
            ->addSelect([
                'jumlah_pengaduan' => Pengaduan::selectRaw('COUNT(*)')
                    ->whereColumn('pengaduan.user_id', 'users.id')
            ])
            ->latest();

        // Pencarian nama atau email
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $pelanggan = $query->paginate(10)->withQueryString();

        $totalPelanggan = User::where('role', 'user')->count();

        return view('admin.pelanggan.index', compact(
            'pelanggan',
            'totalPelanggan'
        ));
    }

    // Menampilkan detail dan riwayat pengaduan pelanggan
    public function show(User $pelanggan)
    {
        // Pastikan akun yang dibuka merupakan pelanggan
        abort_unless($pelanggan->role === 'user', 404);

        $riwayatPengaduan = Pengaduan::where('user_id', $pelanggan->id)
            ->latest()
            ->paginate(10);

        $totalPengaduan = Pengaduan::where('user_id', $pelanggan->id)
            ->count();

        return view('admin.pelanggan.show', compact(
            'pelanggan',
            'riwayatPengaduan',
            'totalPengaduan'
        ));
    }
}
