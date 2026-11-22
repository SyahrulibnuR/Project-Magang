<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{
    public function create()
    {
        return view('pengaduan.create');
    }

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
}
