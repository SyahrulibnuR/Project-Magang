<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComplaintController extends Controller
{
    // Menampilkan formulir pengaduan
    public function create()
    {
        return view('complaints.create');
    }

    // Menyimpan pengaduan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:Berlangganan E-Paper,Pembayaran,Akses Akun,Layanan,Lainnya',
            'description' => 'required|string|min:10|max:5000',
        ], [
            'title.required' => 'Judul pengaduan wajib diisi.',
            'category.required' => 'Silakan pilih kategori pengaduan.',
            'description.required' => 'Isi pengaduan wajib diisi.',
            'description.min' => 'Isi pengaduan minimal 10 karakter.',
        ]);

        // Membuat nomor tiket unik
        do {
            $ticketNumber = 'SMC-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
        } while (Complaint::where('ticket_number', $ticketNumber)->exists());

        // Menyimpan data pengaduan
        $complaint = Complaint::create([
            'ticket_number' => $ticketNumber,
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'status' => 'Baru',
        ]);

        return redirect()
            ->route('pengaduan.create')
            ->with('success', 'Pengaduan berhasil dikirim!')
            ->with('ticket_number', $complaint->ticket_number);
    }
}
