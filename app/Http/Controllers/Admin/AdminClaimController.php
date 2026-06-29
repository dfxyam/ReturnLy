<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use Illuminate\Http\Request;

class AdminClaimController extends Controller
{
    // Daftar semua klaim
    public function index()
    {
        $claims = Claim::with(['foundItem', 'foundItem.category', 'foundItem.location'])
            ->latest()
            ->paginate(10);
            
        return view('admin.claims.index', compact('claims'));
    }

    // Detail klaim & aksi approve/reject
    public function show($id)
    {
        $claim = Claim::with(['foundItem', 'foundItem.category', 'foundItem.location'])->findOrFail($id);
        return view('admin.claims.show', compact('claim'));
    }

    // Proses Approve/Reject
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', 'in:Disetujui,Ditolak'],
            'admin_notes' => ['nullable', 'string', 'max:255'],
        ]);

        $claim = Claim::findOrFail($id);
        $claim->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
            'processed_at' => now(),
        ]);

        // Update status barang otomatis
        if ($request->status === 'Disetujui') {
            $claim->foundItem->update(['status' => 'Dikembalikan']);
            $message = "Klaim berhasil disetujui dan status barang diubah menjadi Dikembalikan.";
        } else {
            $claim->foundItem->update(['status' => 'Menunggu Pemilik']);
            $message = "Klaim ditolak. Status barang dikembalikan ke Menunggu Pemilik.";
        }

        return redirect()->route('admin.claims.index')->with('success', $message);
    }
}