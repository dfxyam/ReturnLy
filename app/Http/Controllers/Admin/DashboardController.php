<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LostItem;
use App\Models\FoundItem;
use App\Models\Claim;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Utama
        $stats = [
            'lost_items' => LostItem::count(),
            'found_items' => FoundItem::count(),
            'returned' => FoundItem::where('status', 'Dikembalikan')->count(),
            'pending_claims' => Claim::where('status', 'Pending')->count(),
            'approved_claims' => Claim::where('status', 'Disetujui')->count(),
            'rejected_claims' => Claim::where('status', 'Ditolak')->count(),
        ];

        // Data untuk grafik (6 bulan terakhir)
        $monthlyData = $this->getMonthlyData();

        // Aktivitas terbaru
        $recentLost = LostItem::with(['category', 'location'])
            ->latest()
            ->take(5)
            ->get();

        $recentFound = FoundItem::with(['category', 'location'])
            ->latest()
            ->take(5)
            ->get();

        $recentClaims = Claim::with('foundItem')
            ->latest()
            ->take(5)
            ->get();

        // Distribusi kategori
        $categoryDistribution = Category::withCount(['lostItems', 'foundItems'])
            ->orderByDesc('lost_items_count')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats', 
            'monthlyData', 
            'recentLost', 
            'recentFound', 
            'recentClaims',
            'categoryDistribution'
        ));
    }

    private function getMonthlyData()
    {
        $months = [];
        $lostData = [];
        $foundData = [];
        $claimData = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthLabel = $date->format('M Y');
            $monthStart = $date->startOfMonth();
            $monthEnd = $date->copy()->endOfMonth();

            $months[] = $monthLabel;
            $lostData[] = LostItem::whereBetween('created_at', [$monthStart, $monthEnd])->count();
            $foundData[] = FoundItem::whereBetween('created_at', [$monthStart, $monthEnd])->count();
            $claimData[] = Claim::whereBetween('created_at', [$monthStart, $monthEnd])->count();
        }

        return [
            'months' => $months,
            'lost' => $lostData,
            'found' => $foundData,
            'claims' => $claimData,
        ];
    }
}