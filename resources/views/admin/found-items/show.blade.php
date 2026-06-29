<x-layouts.admin title="Detail Barang Ditemukan" subtitle="Informasi lengkap barang ditemukan">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-border p-6">
            <div class="flex items-start justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-navy-800">{{ $foundItem->item_name }}</h2>
                    <p class="text-text-secondary mt-1">Ditemukan pada {{ $foundItem->created_at->format('d M Y, H:i') }}</p>
                </div>
                <span class="px-4 py-2 text-sm font-semibold rounded-full {{ $foundItem->status === 'Menunggu Pemilik' ? 'bg-emerald-100 text-emerald-700' : ($foundItem->status === 'Diklaim' ? 'bg-primary-100 text-primary-700' : 'bg-blue-100 text-blue-700') }}">
                    {{ $foundItem->status }}
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Photo --}}
                <div>
                    @if($foundItem->photo)
                        <img src="{{ asset('storage/' . $foundItem->photo) }}" alt="{{ $foundItem->item_name }}" class="w-full rounded-xl border border-border">
                    @else
                        <div class="w-full aspect-[4/3] bg-surface rounded-xl flex items-center justify-center">
                            <x-icon.photo class="w-16 h-16 text-text-secondary opacity-50" />
                        </div>
                    @endif
                </div>

                {{-- Info --}}
                <div class="space-y-4">
                    <div>
                        <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Kategori</p>
                        <p class="text-text-primary font-medium">{{ $foundItem->category->name }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Lokasi Ditemukan</p>
                        <p class="text-text-primary font-medium">{{ $foundItem->location->name }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Tanggal Ditemukan</p>
                        <p class="text-text-primary font-medium">{{ $foundItem->found_date->format('d M Y') }}</p>
                    </div>
                    @if($foundItem->storage_location)
                        <div>
                            <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Lokasi Penyimpanan</p>
                            <p class="text-text-primary font-medium">{{ $foundItem->storage_location }}</p>
                        </div>
                    @endif
                    <div>
                        <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Deskripsi</p>
                        <p class="text-text-primary">{{ $foundItem->description }}</p>
                    </div>
                </div>
            </div>

            {{-- Finder Info --}}
            <div class="mt-6 pt-6 border-t border-border">
                <h3 class="font-semibold text-navy-800 mb-3">Informasi Penemu</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Nama</p>
                        <p class="text-text-primary font-medium">{{ $foundItem->finder_name }}</p>
                    </div>
                    @if($foundItem->class_name)
                        <div>
                            <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Kelas</p>
                            <p class="text-text-primary font-medium">{{ $foundItem->class_name }}</p>
                        </div>
                    @endif
                    <div>
                        <p class="text-xs text-text-secondary uppercase font-semibold mb-1">WhatsApp</p>
                        <p class="text-text-primary font-medium">{{ $foundItem->phone_number }}</p>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="mt-6 flex gap-3">
                <a href="{{ route('admin.found-items.edit', $foundItem) }}" class="px-6 py-2.5 bg-warning-500 text-white rounded-xl hover:bg-warning-600 transition">Edit</a>
                <form action="{{ route('admin.found-items.destroy', $foundItem) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-2.5 bg-danger-500 text-white rounded-xl hover:bg-danger-600 transition">Hapus</button>
                </form>
                <a href="{{ route('admin.found-items.index') }}" class="px-6 py-2.5 bg-white border border-border text-gray-700 rounded-xl hover:bg-gray-50 transition">Kembali</a>
            </div>
        </div>
    </div>
</x-layouts.admin>