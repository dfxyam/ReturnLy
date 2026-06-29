<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClaimRequest;
use App\Models\Claim;
use App\Models\FoundItem;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    // Show claim form
    public function create($found_item_id)
    {
        $foundItem = FoundItem::with(['category', 'location'])->findOrFail($found_item_id);

        // Check if item is still available for claim
        if ($foundItem->status !== 'Menunggu Pemilik') {
            return redirect()
                ->route('found-items.show', $found_item_id)
                ->with('error', 'Barang ini tidak dapat diklaim karena sudah dalam proses atau telah dikembalikan.');
        }

        return view('guest.claim.create', compact('foundItem'));
    }

    // Store claim
    public function store(StoreClaimRequest $request, $found_item_id)
    {
        $foundItem = FoundItem::findOrFail($found_item_id);

        // Check if item is still available
        if ($foundItem->status !== 'Menunggu Pemilik') {
            return redirect()
                ->route('found-items.show', $found_item_id)
                ->with('error', 'Barang ini tidak dapat diklaim.');
        }

        $data = $request->validated();
        $data['found_item_id'] = $found_item_id;
        $data['claim_number'] = Claim::generateClaimNumber();
        $data['status'] = 'Pending';

        // Upload proof photo if exists
        if ($request->hasFile('proof_photo')) {
            $data['proof_photo'] = $request->file('proof_photo')->store('claims', 'public');
        }

        // Create claim
        $claim = Claim::create($data);

        // Update found item status
        $foundItem->update(['status' => 'Diklaim']);

        // Redirect ke halaman konfirmasi dengan nomor klaim
        return redirect()
            ->route('claim.success', $claim->id)
            ->with('success', "Klaim berhasil diajukan!");
    }

    // Show claim status page
    public function statusPage()
    {
        return view('guest.claim.status');
    }

    // Check claim status
    public function checkStatus(Request $request)
    {
        $request->validate([
            'claim_number' => ['required', 'string'],
            'email' => ['required', 'email'],
        ], [
            'claim_number.required' => 'Nomor klaim wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
        ]);

        $claim = Claim::with('foundItem.category', 'foundItem.location')
            ->where('claim_number', $request->claim_number)
            ->where('email', $request->email)
            ->first();

        if (!$claim) {
            return back()
                ->withInput()
                ->with('error', 'Nomor klaim atau email tidak ditemukan. Pastikan data yang Anda masukkan benar.');
        }

        return view('guest.claim.detail', compact('claim'));
    }

    // Halaman sukses setelah submit klaim
    public function success($claim_id)
    {
        $claim = Claim::with('foundItem')->findOrFail($claim_id);
        return view('guest.claim.success', compact('claim'));
    }
}