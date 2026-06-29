<x-layouts.admin title="Edit Barang Ditemukan" subtitle="Perbarui informasi barang ditemukan">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-border p-6">
            <form action="{{ route('admin.found-items.update', $foundItem) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                {{-- Informasi Penemu --}}
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-navy-800 mb-4">Informasi Penemu</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Penemu *</label>
                            <input type="text" name="finder_name" value="{{ old('finder_name', $foundItem->finder_name) }}" class="w-full px-4 py-2.5 rounded-xl border border-border focus:border-primary-500 outline-none transition" required>
                            @error('finder_name') <p class="mt-1 text-sm text-danger-500">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                            <input type="text" name="class_name" value="{{ old('class_name', $foundItem->class_name) }}" class="w-full px-4 py-2.5 rounded-xl border border-border focus:border-primary-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor WhatsApp *</label>
                            <input type="text" name="phone_number" value="{{ old('phone_number', $foundItem->phone_number) }}" class="w-full px-4 py-2.5 rounded-xl border border-border focus:border-primary-500 outline-none transition" required>
                            @error('phone_number') <p class="mt-1 text-sm text-danger-500">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- Informasi Barang --}}
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-navy-800 mb-4">Informasi Barang</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Barang *</label>
                            <input type="text" name="item_name" value="{{ old('item_name', $foundItem->item_name) }}" class="w-full px-4 py-2.5 rounded-xl border border-border focus:border-primary-500 outline-none transition" required>
                            @error('item_name') <p class="mt-1 text-sm text-danger-500">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                            <select name="category_id" class="w-full px-4 py-2.5 rounded-xl border border-border focus:border-primary-500 outline-none transition" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id', $foundItem->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <p class="mt-1 text-sm text-danger-500">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi Ditemukan *</label>
                            <select name="location_id" class="w-full px-4 py-2.5 rounded-xl border border-border focus:border-primary-500 outline-none transition" required>
                                <option value="">Pilih Lokasi</option>
                                @foreach($locations as $loc)
                                    <option value="{{ $loc->id }}" {{ old('location_id', $foundItem->location_id) == $loc->id ? 'selected' : '' }}>{{ $loc->name }}</option>
                                @endforeach
                            </select>
                            @error('location_id') <p class="mt-1 text-sm text-danger-500">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Ditemukan *</label>
                            <input type="date" name="found_date" value="{{ old('found_date', $foundItem->found_date->format('Y-m-d')) }}" class="w-full px-4 py-2.5 rounded-xl border border-border focus:border-primary-500 outline-none transition" required>
                            @error('found_date') <p class="mt-1 text-sm text-danger-500">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                            <select name="status" class="w-full px-4 py-2.5 rounded-xl border border-border focus:border-primary-500 outline-none transition" required>
                                <option value="Menunggu Pemilik" {{ old('status', $foundItem->status) == 'Menunggu Pemilik' ? 'selected' : '' }}>Menunggu Pemilik</option>
                                <option value="Diklaim" {{ old('status', $foundItem->status) == 'Diklaim' ? 'selected' : '' }}>Diklaim</option>
                                <option value="Dikembalikan" {{ old('status', $foundItem->status) == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                            </select>
                            @error('status') <p class="mt-1 text-sm text-danger-500">{{ $message }}</p> @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi Penyimpanan</label>
                            <input type="text" name="storage_location" value="{{ old('storage_location', $foundItem->storage_location) }}" class="w-full px-4 py-2.5 rounded-xl border border-border focus:border-primary-500 outline-none transition" placeholder="Contoh: Ruang BK, Laci Meja, dll">
                            @error('storage_location') <p class="mt-1 text-sm text-danger-500">{{ $message }}</p> @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi *</label>
                            <textarea name="description" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-border focus:border-primary-500 outline-none transition" required>{{ old('description', $foundItem->description) }}</textarea>
                            @error('description') <p class="mt-1 text-sm text-danger-500">{{ $message }}</p> @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Foto</label>
                            @if($foundItem->photo)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $foundItem->photo) }}" alt="Current photo" class="w-32 h-32 object-cover rounded-lg">
                                </div>
                            @endif
                            <input type="file" name="photo" accept="image/*" class="w-full px-4 py-2.5 rounded-xl border border-border focus:border-primary-500 outline-none transition">
                            <p class="text-xs text-text-secondary mt-1">Kosongkan jika tidak ingin mengubah foto</p>
                            @error('photo') <p class="mt-1 text-sm text-danger-500">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.found-items.index') }}" class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50">Batal</a>
                    <button type="submit" class="px-6 py-2.5 text-sm font-medium text-white bg-primary-500 rounded-xl hover:bg-primary-600">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>