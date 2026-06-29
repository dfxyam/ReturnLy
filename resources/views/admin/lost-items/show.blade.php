<x-layouts.admin title="Detail Barang Hilang" subtitle="Informasi lengkap barang hilang">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-border p-6">
            <div class="flex items-start justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-navy-800">{{ $lostItem->item_name }}</h2>
                    <p class="text-text-secondary mt-1">Dilaporkan pada {{ $lostItem->created_at->format('d M Y, H:i') }}</p>
                </div>
                <span class="px-4 py-2 text-sm font-semibold rounded-full {{ $lostItem->status === 'Belum Ditemukan' ? 'bg-danger-100 text-danger-700' : ($lostItem->status === 'Ditemukan' ? 'bg-warning-100 text-warning-700' : 'bg-emerald-100 text-emerald-700') }}">
                    {{ $lostItem->status }}
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Photo --}}
                <div>
                    @if($lostItem->photo)
                        <img src="{{ asset('storage/' . $lostItem->photo) }}" alt="{{ $lostItem->item_name }}" class="w-full rounded-xl border border-border">
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
                        <p class="text-text-primary font-medium">{{ $lostItem->category->name }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Lokasi</p>
                        <p class="text-text-primary font-medium">{{ $lostItem->location->name }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Tanggal Hilang</p>
                        <p class="text-text-primary font-medium">{{ $lostItem->lost_date->format('d M Y') }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Deskripsi</p>
                        <p class="text-text-primary">{{ $lostItem->description }}</p>
                    </div>
                </div>
            </div>

            {{-- Reporter Info --}}
            <div class="mt-6 pt-6 border-t border-border">
                <h3 class="font-semibold text-navy-800 mb-3">Informasi Pelapor</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Nama</p>
                        <p class="text-text-primary font-medium">{{ $lostItem->reporter_name }}</p>
                    </div>
                    @if($lostItem->class_name)
                        <div>
                            <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Kelas</p>
                            <p class="text-text-primary font-medium">{{ $lostItem->class_name }}</p>
                        </div>
                    @endif
                    <div>
                        <p class="text-xs text-text-secondary uppercase font-semibold mb-1">WhatsApp</p>
                        <p class="text-text-primary font-medium">{{ $lostItem->phone_number }}</p>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="mt-6 flex gap-3">
                <a href="{{ route('admin.lost-items.edit', $lostItem) }}" class="px-6 py-2.5 bg-warning-500 text-white rounded-xl hover:bg-warning-600 transition">Edit</a>
                <form action="{{ route('admin.lost-items.destroy', $lostItem) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-2.5 bg-danger-500 text-white rounded-xl hover:bg-danger-600 transition">Hapus</button>
                </form>
                <a href="{{ route('admin.lost-items.index') }}" class="px-6 py-2.5 bg-white border border-border text-gray-700 rounded-xl hover:bg-gray-50 transition">Kembali</a>
            </div>
        </div>
    </div>
</x-layouts.admin>