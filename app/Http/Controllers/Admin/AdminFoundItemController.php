<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoundItem;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminFoundItemController extends Controller
{
    public function index(Request $request)
    {
        $query = FoundItem::with(['category', 'location']);

        if ($request->filled('search')) {
            $query->where('item_name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $items = $query->latest()->paginate(12);
        $categories = Category::orderBy('name')->get();

        return view('admin.found-items.index', compact('items', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $locations = Location::orderBy('name')->get();
        return view('admin.found-items.create', compact('categories', 'locations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'finder_name' => 'required|string|max:100',
            'class_name' => 'nullable|string|max:50',
            'phone_number' => 'required|string|max:20',
            'item_name' => 'required|string|max:150',
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'found_date' => 'required|date',
            'storage_location' => 'nullable|string|max:150',
            'description' => 'required|string|min:10',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'status' => 'required|in:Menunggu Pemilik,Diklaim,Dikembalikan',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('items', 'public');
        }

        FoundItem::create($validated);

        return redirect()->route('admin.found-items.index')->with('success', 'Barang ditemukan berhasil ditambahkan.');
    }

    public function show(FoundItem $foundItem)
    {
        $foundItem->load(['category', 'location']);
        return view('admin.found-items.show', compact('foundItem'));
    }

    public function edit(FoundItem $foundItem)
    {
        $categories = Category::orderBy('name')->get();
        $locations = Location::orderBy('name')->get();
        return view('admin.found-items.edit', compact('foundItem', 'categories', 'locations'));
    }

    public function update(Request $request, FoundItem $foundItem)
    {
        $validated = $request->validate([
            'finder_name' => 'required|string|max:100',
            'class_name' => 'nullable|string|max:50',
            'phone_number' => 'required|string|max:20',
            'item_name' => 'required|string|max:150',
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'found_date' => 'required|date',
            'storage_location' => 'nullable|string|max:150',
            'description' => 'required|string|min:10',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'status' => 'required|in:Menunggu Pemilik,Diklaim,Dikembalikan',
        ]);

        if ($request->hasFile('photo')) {
            if ($foundItem->photo) {
                Storage::disk('public')->delete($foundItem->photo);
            }
            $validated['photo'] = $request->file('photo')->store('items', 'public');
        }

        $foundItem->update($validated);

        return redirect()->route('admin.found-items.index')->with('success', 'Barang ditemukan berhasil diperbarui.');
    }

    public function destroy(FoundItem $foundItem)
    {
        if ($foundItem->photo) {
            Storage::disk('public')->delete($foundItem->photo);
        }

        $foundItem->delete();

        return redirect()->route('admin.found-items.index')->with('success', 'Barang ditemukan berhasil dihapus.');
    }

    public function updateStatus(Request $request, FoundItem $foundItem)
    {
        $request->validate([
            'status' => 'required|in:Menunggu Pemilik,Diklaim,Dikembalikan',
        ]);

        $foundItem->update(['status' => $request->status]);

        return back()->with('success', 'Status barang berhasil diperbarui.');
    }
}