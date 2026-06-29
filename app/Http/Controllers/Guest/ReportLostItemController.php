<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLostItemRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\LostItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportLostItemController extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $locations = Location::orderBy('name')->get();

        return view('guest.report-lost', compact('categories', 'locations'));
    }

    public function store(StoreLostItemRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            // Simpan ke public disk (storage/app/public/items)
            $data['photo'] = $request->file('photo')->store('items', 'public');
        }

        $data['status'] = 'Belum Ditemukan';

        LostItem::create($data);

        return redirect()->route('home')->with('success', 'Laporan barang hilang berhasil dikirim. Admin akan segera memverifikasi.');
    }
}