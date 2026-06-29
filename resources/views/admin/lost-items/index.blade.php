<x-layouts.admin title="Barang Hilang" subtitle="Kelola laporan barang hilang">
    {{-- Filter & Search --}}
    <div class="bg-white rounded-2xl shadow-sm border border-border p-6 mb-6">
        <form action="{{ route('admin.lost-items.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="md:col-span-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama barang..." class="w-full px-4 py-2.5 rounded-xl border border-border focus:border-primary-500 focus:ring-2 focus:ring-primary-100 outline-none transition">
            </div>
            <div>
                <select name="category" class="w-full px-4 py-2.5 rounded-xl border border-border focus:border-primary-500 outline-none transition">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <select name="status" class="w-full px-4 py-2.5 rounded-xl border border-border focus:border-primary-500 outline-none transition">
                    <option value="">Semua Status</option>
                    <option value="Belum Ditemukan" {{ request('status') == 'Belum Ditemukan' ? 'selected' : '' }}>Belum Ditemukan</option>
                    <option value="Ditemukan" {{ request('status') == 'Ditemukan' ? 'selected' : '' }}>Ditemukan</option>
                    <option value="Dikembalikan" {{ request('status') == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                </select>
            </div>
            <div class="md:col-span-4 flex gap-3">
                <button type="submit" class="px-6 py-2.5 bg-primary-500 text-white rounded-xl hover:bg-primary-600 transition">Filter</button>
                <a href="{{ route('admin.lost-items.index') }}" class="px-6 py-2.5 bg-white border border-border text-gray-700 rounded-xl hover:bg-gray-50 transition">Reset</a>
                <a href="{{ route('admin.lost-items.create') }}" class="ml-auto px-6 py-2.5 bg-emerald-500 text-white rounded-xl hover:bg-emerald-600 transition inline-flex items-center gap-2">
                    <x-icon.plus class="w-4 h-4" />
                    Tambah Barang
                </a>
            </div>
        </form>
    </div>

    {{-- Items Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($items as $item)
            <div class="bg-white rounded-2xl shadow-sm border border-border overflow-hidden hover:shadow-md transition">
                <div class="aspect-[4/3] bg-surface overflow-hidden">
                    @if($item->photo)
                        <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->item_name }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <x-icon.photo class="w-12 h-12 text-text-secondary opacity-50" />
                        </div>
                    @endif
                </div>
                <div class="p-4">
                    <div class="flex items-start justify-between gap-2 mb-2">
                        <h4 class="font-semibold text-navy-800 truncate flex-1">{{ $item->item_name }}</h4>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $item->status === 'Belum Ditemukan' ? 'bg-danger-100 text-danger-700' : ($item->status === 'Ditemukan' ? 'bg-warning-100 text-warning-700' : 'bg-emerald-100 text-emerald-700') }}">
                            {{ $item->status }}
                        </span>
                    </div>
                    <p class="text-xs text-text-secondary mb-1">{{ $item->category->name }} • {{ $item->location->name }}</p>
                    <p class="text-xs text-text-secondary mb-3">{{ $item->lost_date->format('d M Y') }}</p>
                    
                    <div class="flex gap-2">
                        <a href="{{ route('admin.lost-items.show', $item) }}" class="flex-1 px-3 py-2 text-xs font-medium text-primary-600 bg-primary-50 rounded-lg hover:bg-primary-100 transition text-center">Detail</a>
                        <a href="{{ route('admin.lost-items.edit', $item) }}" class="flex-1 px-3 py-2 text-xs font-medium text-warning-600 bg-warning-50 rounded-lg hover:bg-warning-100 transition text-center">Edit</a>
                        <form action="{{ route('admin.lost-items.destroy', $item) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full px-3 py-2 text-xs font-medium text-danger-600 bg-danger-50 rounded-lg hover:bg-danger-100 transition">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <x-icon.inbox class="w-16 h-16 text-text-secondary opacity-50 mx-auto mb-4" />
                <p class="text-text-secondary">Tidak ada barang hilang.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $items->links() }}
    </div>
</x-layouts.admin>