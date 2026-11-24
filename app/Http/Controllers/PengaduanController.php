<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{
    // Menampilkan form pengaduan
    public function create()
    {
        return view('pengaduan.create');
    }

    // Menyimpan pengaduan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:Berlangganan E-Paper,Pembayaran,Akses Akun,Layanan,Lainnya',
            'description' => 'required|string|min:10|max:5000',
        ]);

        do {
            $ticketNumber = 'SMC-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
        } while (Pengaduan::where('ticket_number', $ticketNumber)->exists());

        Pengaduan::create([
            'ticket_number' => $ticketNumber,
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'status' => 'Baru',
        ]);

        return redirect()
            ->route('pengaduan.create')
            ->with('success', 'Pengaduan berhasil dikirim!');
    }

    // Menelusuri pengaduan berdasarkan kode tiket
    public function telusuri(Request $request)
    {
        $kode = trim($request->query('kode_pengaduan', ''));

        $pengaduan = null;
        $sudahMencari = $request->has('kode_pengaduan');

        if ($sudahMencari && $kode !== '') {
            $pengaduan = Pengaduan::where('ticket_number', $kode)
                ->where('user_id', auth()->id())
                ->first();
        }

        return view('pengaduan.telusuri', compact(
            'kode',
            'pengaduan',
            'sudahMencari'
        ));
    }
}
