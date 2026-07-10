<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use App\Services\WhatsAppService;
use App\Mail\ClaimStatusMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
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
        
        // 1. Update status klaim di database
        $claim->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
            'processed_at' => now(),
        ]);

        // 2. Kirim Email (Jika sudah disetting sebelumnya)
        try {
            Mail::to($claim->email)->send(new ClaimStatusMail($claim));
        } catch (\Exception $e) {
            Log::error('Email gagal: ' . $e->getMessage());
        }

        // 3. Kirim WhatsApp Notifikasi (BARU)
        try {
            $waService = new WhatsAppService();
            
            if ($request->status === 'Disetujui') {
                $pesan = "Halo {$claim->claimant_name}! \n\n" .
                        "Klaim Anda untuk barang *{$claim->foundItem->item_name}* telah *DISETUJUI*.\n\n" .
                        "Nomor Klaim: {$claim->claim_number}\n\n";
                
                if ($claim->admin_notes) {
                    $pesan .= "Catatan Admin: {$claim->admin_notes}\n\n";
                }
                
                $pesan .= "Silakan hubungi admin untuk pengambilan barang. Terima kasih!";
            } else {
                $pesan = "Halo {$claim->claimant_name}. 😔\n\n" .
                        "Klaim Anda untuk barang *{$claim->foundItem->item_name}* telah *DITOLAK*.\n\n" .
                        "Nomor Klaim: {$claim->claim_number}\n\n";
                
                if ($claim->admin_notes) {
                    $pesan .= "Alasan: {$claim->admin_notes}\n\n";
                }
                
                $pesan .= "Anda bisa mengajukan klaim ulang dengan bukti yang lebih lengkap. Terima kasih.";
            }

            $waService->sendMessage($claim->phone_number, $pesan);
        } catch (\Exception $e) {
            Log::error('WhatsApp gagal: ' . $e->getMessage());
        }

        // 4. Update status barang ditemukan
        if ($request->status === 'Disetujui') {
            $claim->foundItem->update(['status' => 'Dikembalikan']);
            $message = "Klaim disetujui & notifikasi WhatsApp dikirim.";
        } else {
            $claim->foundItem->update(['status' => 'Menunggu Pemilik']);
            $message = "Klaim ditolak & notifikasi WhatsApp dikirim.";
        }

        return redirect()->route('admin.claims.index')->with('success', $message);
    }
}