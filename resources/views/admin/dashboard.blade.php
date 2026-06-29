<x-layouts.admin title="Dashboard" subtitle="Ringkasan sistem ReturnLy">
    {{-- Statistik Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-2xl shadow-sm border border-border p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-danger-50 text-danger-600 rounded-xl flex items-center justify-center">
                    <x-icon.alert-circle class="w-6 h-6" />
                </div>
                <span class="text-xs font-medium text-text-secondary">Total</span>
            </div>
            <p class="text-3xl font-bold text-navy-800">{{ $stats['lost_items'] }}</p>
            <p class="text-sm text-text-secondary mt-1">Barang Hilang</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-border p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center">
                    <x-icon.search class="w-6 h-6" />
                </div>
                <span class="text-xs font-medium text-text-secondary">Total</span>
            </div>
            <p class="text-3xl font-bold text-navy-800">{{ $stats['found_items'] }}</p>
            <p class="text-sm text-text-secondary mt-1">Barang Ditemukan</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-border p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-primary-50 text-primary-600 rounded-xl flex items-center justify-center">
                    <x-icon.check-badge class="w-6 h-6" />
                </div>
                <span class="text-xs font-medium text-text-secondary">Berhasil</span>
            </div>
            <p class="text-3xl font-bold text-navy-800">{{ $stats['returned'] }}</p>
            <p class="text-sm text-text-secondary mt-1">Barang Dikembalikan</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-border p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-warning-50 text-warning-600 rounded-xl flex items-center justify-center">
                    <x-icon.clock class="w-6 h-6" />
                </div>
                <span class="text-xs font-medium text-warning-600">Perlu Aksi</span>
            </div>
            <p class="text-3xl font-bold text-navy-800">{{ $stats['pending_claims'] }}</p>
            <p class="text-sm text-text-secondary mt-1">Klaim Pending</p>
        </div>
    </div>

    {{-- Grafik & Distribusi --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        {{-- Grafik Tren --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-border p-6">
            <h3 class="font-semibold text-navy-800 mb-4">Tren 6 Bulan Terakhir</h3>
            <div class="space-y-4">
                @foreach($monthlyData['months'] as $index => $month)
                    <div class="flex items-center gap-4">
                        <div class="w-16 text-sm font-medium text-text-secondary">{{ $month }}</div>
                        <div class="flex-1 space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="w-20 text-xs text-text-secondary">Hilang</span>
                                <div class="flex-1 bg-surface rounded-full h-2">
                                    <div class="bg-danger-500 h-2 rounded-full" style="width: {{ $monthlyData['lost'][$index] * 10 }}%"></div>
                                </div>
                                <span class="w-8 text-xs font-medium">{{ $monthlyData['lost'][$index] }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-20 text-xs text-text-secondary">Ditemukan</span>
                                <div class="flex-1 bg-surface rounded-full h-2">
                                    <div class="bg-emerald-500 h-2 rounded-full" style="width: {{ $monthlyData['found'][$index] * 10 }}%"></div>
                                </div>
                                <span class="w-8 text-xs font-medium">{{ $monthlyData['found'][$index] }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-20 text-xs text-text-secondary">Klaim</span>
                                <div class="flex-1 bg-surface rounded-full h-2">
                                    <div class="bg-primary-500 h-2 rounded-full" style="width: {{ $monthlyData['claims'][$index] * 10 }}%"></div>
                                </div>
                                <span class="w-8 text-xs font-medium">{{ $monthlyData['claims'][$index] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Distribusi Kategori --}}
        <div class="bg-white rounded-2xl shadow-sm border border-border p-6">
            <h3 class="font-semibold text-navy-800 mb-4">Top 5 Kategori</h3>
            <div class="space-y-3">
                @foreach($categoryDistribution as $category)
                    @php $total = $category->lost_items_count + $category->found_items_count; @endphp
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-sm font-medium text-text-primary">{{ $category->name }}</span>
                            <span class="text-xs text-text-secondary">{{ $total }} item</span>
                        </div>
                        <div class="w-full bg-surface rounded-full h-2">
                            <div class="bg-primary-500 h-2 rounded-full" style="width: {{ min($total * 10, 100) }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Aktivitas Terbaru --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Klaim Terbaru --}}
        <div class="bg-white rounded-2xl shadow-sm border border-border p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-navy-800">Klaim Terbaru</h3>
                <a href="{{ route('admin.claims.index') }}" class="text-sm text-primary-500 hover:text-primary-600">Lihat Semua</a>
            </div>
            <div class="space-y-3">
                @forelse($recentClaims as $claim)
                    <a href="{{ route('admin.claims.show', $claim->id) }}" class="block p-3 rounded-lg hover:bg-surface transition">
                        <div class="flex items-start justify-between gap-2">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-text-primary truncate">{{ $claim->claimant_name }}</p>
                                <p class="text-xs text-text-secondary truncate">{{ $claim->foundItem->item_name ?? '-' }}</p>
                            </div>
                            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $claim->status === 'Pending' ? 'bg-warning-100 text-warning-700' : ($claim->status === 'Disetujui' ? 'bg-emerald-100 text-emerald-700' : 'bg-danger-100 text-danger-700') }}">
                                {{ $claim->status }}
                            </span>
                        </div>
                        <p class="text-xs text-text-secondary mt-1">{{ $claim->created_at->diffForHumans() }}</p>
                    </a>
                @empty
                    <p class="text-sm text-text-secondary text-center py-4">Belum ada klaim</p>
                @endforelse
            </div>
        </div>

        {{-- Barang Hilang Terbaru --}}
        <div class="bg-white rounded-2xl shadow-sm border border-border p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-navy-800">Barang Hilang Terbaru</h3>
                <a href="{{ route('admin.lost-items.index') }}" class="text-sm text-primary-500 hover:text-primary-600">Lihat Semua</a>
            </div>
            <div class="space-y-3">
                @forelse($recentLost as $item)
                    <div class="p-3 rounded-lg hover:bg-surface transition">
                        <p class="text-sm font-medium text-text-primary truncate">{{ $item->item_name }}</p>
                        <p class="text-xs text-text-secondary">{{ $item->category->name }} • {{ $item->location->name }}</p>
                        <p class="text-xs text-text-secondary mt-1">{{ $item->created_at->diffForHumans() }}</p>
                    </div>
                @empty
                    <p class="text-sm text-text-secondary text-center py-4">Belum ada data</p>
                @endforelse
            </div>
        </div>

        {{-- Barang Ditemukan Terbaru --}}
        <div class="bg-white rounded-2xl shadow-sm border border-border p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-navy-800">Barang Ditemukan Terbaru</h3>
                <a href="{{ route('admin.found-items.index') }}" class="text-sm text-primary-500 hover:text-primary-600">Lihat Semua</a>
            </div>
            <div class="space-y-3">
                @forelse($recentFound as $item)
                    <div class="p-3 rounded-lg hover:bg-surface transition">
                        <p class="text-sm font-medium text-text-primary truncate">{{ $item->item_name }}</p>
                        <p class="text-xs text-text-secondary">{{ $item->category->name }} • {{ $item->location->name }}</p>
                        <p class="text-xs text-text-secondary mt-1">{{ $item->created_at->diffForHumans() }}</p>
                    </div>
                @empty
                    <p class="text-sm text-text-secondary text-center py-4">Belum ada data</p>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.admin>