<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    // Menampilkan daftar pengaduan
    public function index(Request $request)
    {
        $query = Pengaduan::with('user')->latest();

        // Pencarian
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('ticket_number', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    });
            });
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $complaints = $query->paginate(10)->withQueryString();

        // Ringkasan jumlah pengaduan
        $totalComplaints = Pengaduan::count();
        $newComplaints = Pengaduan::where('status', 'Baru')->count();
        $processingComplaints = Pengaduan::where('status', 'Diproses')->count();
        $completedComplaints = Pengaduan::where('status', 'Selesai')->count();

        return view('admin.complaints.index', compact(
            'complaints',
            'totalComplaints',
            'newComplaints',
            'processingComplaints',
            'completedComplaints'
        ));
    }

    // Menampilkan detail pengaduan
    public function show(Pengaduan $complaint)
    {
        $complaint->load(['user', 'responder']);

        return view('admin.complaints.show', compact('complaint'));
    }

    // Memperbarui status dan tanggapan
    public function update(Request $request, Pengaduan $complaint)
    {
        $validated = $request->validate([
            'status' => 'required|in:Baru,Diproses,Selesai,Ditutup',
            'admin_response' => 'nullable|string|max:5000',
        ]);

        $complaint->status = $validated['status'];
        $complaint->admin_response = $validated['admin_response'] ?? null;

        if (!empty($validated['admin_response'])) {
            $complaint->responded_by = Auth::id();
            $complaint->responded_at = now();
        } else {
            $complaint->responded_by = null;
            $complaint->responded_at = null;
        }

        $complaint->save();

        return redirect()
            ->route('admin.complaints.show', $complaint->id)
            ->with('success', 'Pengaduan berhasil diperbarui.');
    }

    // Menghapus pengaduan
    public function destroy(Pengaduan $complaint)
    {
        $complaint->delete();

        return redirect()
            ->route('admin.complaints.index')
            ->with('success', 'Data pengaduan berhasil dihapus.');
    }
}
