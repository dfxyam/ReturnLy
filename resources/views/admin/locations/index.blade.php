<x-layouts.admin title="Lokasi" subtitle="Kelola lokasi penemuan dan kehilangan">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-semibold text-navy-800">Daftar Lokasi</h3>
        <a href="{{ route('admin.locations.create') }}" class="inline-flex items-center gap-2 bg-primary-500 hover:bg-primary-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
            <x-icon.plus class="w-4 h-4" />
            Tambah Lokasi
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-border overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lokasi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Barang</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($locations as $location)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $location->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $location->lostItems()->count() + $location->foundItems()->count() }} item
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                            <a href="{{ route('admin.locations.edit', $location) }}" class="text-primary-600 hover:text-primary-900">Edit</a>
                            <form action="{{ route('admin.locations.destroy', $location) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus lokasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-danger-600 hover:text-danger-900">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada lokasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $locations->links() }}
    </div>
</x-layouts.admin>