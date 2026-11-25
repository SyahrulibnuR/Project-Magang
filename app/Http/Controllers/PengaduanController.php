<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{
    // Dashboard User
    public function dashboard()
    {
        $userId = auth()->id();

        $totalPengaduan = Pengaduan::where('user_id', $userId)->count();

        $pengaduanBaru = Pengaduan::where('user_id', $userId)
            ->where('status', 'Baru')
            ->count();

        $pengaduanDiproses = Pengaduan::where('user_id', $userId)
            ->where('status', 'Diproses')
            ->count();

        $pengaduanSelesai = Pengaduan::where('user_id', $userId)
            ->where('status', 'Selesai')
            ->count();

        $latestPengaduan = Pengaduan::where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalPengaduan',
            'pengaduanBaru',
            'pengaduanDiproses',
            'pengaduanSelesai',
            'latestPengaduan'
        ));
    }

    // Menampilkan form pengaduan
    public function create()
    {
        return view('pengaduan.create');
    }

    // Menyimpan pengaduan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:Berlangganan E-Paper,Pembayaran,Akses Akun,Layanan,Lainnya',
            'description' => 'required|string|min:10|max:5000',
        ]);

        do {
            $ticketNumber = 'SMC-' . now()->format('Ymd') . '-' .
                strtoupper(Str::random(6));
        } while (
            Pengaduan::where('ticket_number', $ticketNumber)->exists()
        );

        $pengaduan = Pengaduan::create([
            'ticket_number' => $ticketNumber,
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'status' => 'Baru',
        ]);

        return redirect()
            ->route('pengaduan.show', $pengaduan->ticket_number)
            ->with('success', 'Pengaduan berhasil dikirim!');
    }

    // Menampilkan riwayat pengaduan User
    public function index(Request $request)
    {
        $keyword = trim($request->query('kode', ''));

        $query = Pengaduan::where('user_id', auth()->id());

        if ($keyword !== '') {
            $query->where(
                'ticket_number',
                'like',
                '%' . $keyword . '%'
            );
        }

        $pengaduans = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pengaduan.index', compact(
            'pengaduans',
            'keyword'
        ));
    }

    // Menampilkan detail pengaduan berdasarkan nomor tiket
    public function show($ticketNumber)
    {
        $pengaduan = Pengaduan::where('user_id', auth()->id())
            ->where('ticket_number', $ticketNumber)
            ->firstOrFail();

        return view('pengaduan.show', compact('pengaduan'));
    }
}
