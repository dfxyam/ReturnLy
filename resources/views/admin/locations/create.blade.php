<x-layouts.admin title="Tambah Lokasi" subtitle="Buat lokasi baru">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-border p-6">
            <form action="{{ route('admin.locations.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lokasi</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-4 py-3 rounded-xl border border-border focus:border-primary-500 focus:ring-2 focus:ring-primary-100 outline-none transition" placeholder="Contoh: Perpustakaan, Kantin, Lapangan" required>
                    @error('name')
                        <p class="mt-1 text-sm text-danger-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.locations.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Batal</a>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-primary-500 rounded-lg hover:bg-primary-600">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>