<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\FoundItem;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;

class FoundItemController extends Controller
{
    public function index(Request $request)
    {
        $query = FoundItem::with(['category', 'location']);

        // Search by item name
        if ($request->filled('search')) {
            $query->where('item_name', 'like', '%' . $request->search . '%');
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter by location
        if ($request->filled('location')) {
            $query->where('location_id', $request->location);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $items = $query->latest()->paginate(12)->withQueryString();
        $categories = Category::orderBy('name')->get();
        $locations = Location::orderBy('name')->get();

        return view('guest.found-items.index', compact('items', 'categories', 'locations'));
    }

    public function show($id)
    {
        $item = FoundItem::with(['category', 'location'])->findOrFail($id);

        $related = FoundItem::with(['category', 'location'])
            ->where('category_id', $item->category_id)
            ->where('id', '!=', $item->id)
            ->latest()
            ->take(4)
            ->get();

        return view('guest.found-items.show', compact('item', 'related'));
    }
}