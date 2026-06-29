<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\LostItem;
use App\Models\FoundItem;
use App\Models\Claim;

class HomeController extends Controller
{
    public function index()
    {
        $stats = [
            'lost_items' => LostItem::count(),
            'found_items' => FoundItem::count(),
            'returned' => FoundItem::where('status', 'Dikembalikan')->count(),
            'pending_claims' => Claim::where('status', 'Pending')->count(),
        ];

        $latestLost = LostItem::with(['category', 'location'])
            ->latest()
            ->take(6)
            ->get();

        $latestFound = FoundItem::with(['category', 'location'])
            ->latest()
            ->take(6)
            ->get();

        return view('guest.home', compact('stats', 'latestLost', 'latestFound'));
    }
}