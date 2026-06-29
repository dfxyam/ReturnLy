<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LostItem;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminLostItemController extends Controller
{
    public function index(Request $request)
    {
        $query = LostItem::with(['category', 'location']);

        // Search
        if ($request->filled('search')) {
            $query->where('item_name', 'like', '%' . $request->search . '%');
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $items = $query->latest()->paginate(12);
        $categories = Category::orderBy('name')->get();

        return view('admin.lost-items.index', compact('items', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $locations = Location::orderBy('name')->get();
        return view('admin.lost-items.create', compact('categories', 'locations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reporter_name' => 'required|string|max:100',
            'class_name' => 'nullable|string|max:50',
            'phone_number' => 'required|string|max:20',
            'item_name' => 'required|string|max:150',
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'lost_date' => 'required|date',
            'description' => 'required|string|min:10',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'status' => 'required|in:Belum Ditemukan,Ditemukan,Dikembalikan',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('items', 'public');
        }

        LostItem::create($validated);

        return redirect()->route('admin.lost-items.index')->with('success', 'Barang hilang berhasil ditambahkan.');
    }

    public function show(LostItem $lostItem)
    {
        $lostItem->load(['category', 'location']);
        return view('admin.lost-items.show', compact('lostItem'));
    }

    public function edit(LostItem $lostItem)
    {
        $categories = Category::orderBy('name')->get();
        $locations = Location::orderBy('name')->get();
        return view('admin.lost-items.edit', compact('lostItem', 'categories', 'locations'));
    }

    public function update(Request $request, LostItem $lostItem)
    {
        $validated = $request->validate([
            'reporter_name' => 'required|string|max:100',
            'class_name' => 'nullable|string|max:50',
            'phone_number' => 'required|string|max:20',
            'item_name' => 'required|string|max:150',
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'lost_date' => 'required|date',
            'description' => 'required|string|min:10',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'status' => 'required|in:Belum Ditemukan,Ditemukan,Dikembalikan',
        ]);

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($lostItem->photo) {
                Storage::disk('public')->delete($lostItem->photo);
            }
            $validated['photo'] = $request->file('photo')->store('items', 'public');
        }

        $lostItem->update($validated);

        return redirect()->route('admin.lost-items.index')->with('success', 'Barang hilang berhasil diperbarui.');
    }

    public function destroy(LostItem $lostItem)
    {
        // Hapus foto jika ada
        if ($lostItem->photo) {
            Storage::disk('public')->delete($lostItem->photo);
        }

        $lostItem->delete();

        return redirect()->route('admin.lost-items.index')->with('success', 'Barang hilang berhasil dihapus.');
    }

    // Update status via AJAX
    public function updateStatus(Request $request, LostItem $lostItem)
    {
        $request->validate([
            'status' => 'required|in:Belum Ditemukan,Ditemukan,Dikembalikan',
        ]);

        $lostItem->update(['status' => $request->status]);

        return back()->with('success', 'Status barang berhasil diperbarui.');
    }
}