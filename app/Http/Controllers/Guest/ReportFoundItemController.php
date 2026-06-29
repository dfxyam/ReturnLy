<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFoundItemRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\FoundItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportFoundItemController extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $locations = Location::orderBy('name')->get();

        return view('guest.report-found', compact('categories', 'locations'));
    }

    public function store(StoreFoundItemRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            // Simpan ke public disk (storage/app/public/items)
            $data['photo'] = $request->file('photo')->store('items', 'public');
        }

        $data['status'] = 'Menunggu Pemilik';

        FoundItem::create($data);

        return redirect()->route('home')->with('success', 'Laporan barang ditemukan berhasil dikirim. Terima kasih atas kebaikan Anda.');
    }
}