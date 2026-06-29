<x-layouts.admin title="Manajemen Klaim" subtitle="Kelola pengajuan klaim dari pengguna">
    <div class="bg-white rounded-2xl shadow-sm border border-border overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Klaim</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengklaim</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Barang</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($claims as $claim)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $claim->claim_number }}</div>
                            <div class="text-xs text-gray-500">{{ $claim->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $claim->claimant_name }}</div>
                            <div class="text-xs text-gray-500">{{ $claim->phone_number }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $claim->foundItem->item_name ?? '-' }}</div>
                            <div class="text-xs text-gray-500">{{ $claim->foundItem->category->name ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $claim->status === 'Pending' ? 'bg-yellow-100 text-yellow-800' : ($claim->status === 'Disetujui' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                {{ $claim->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $claim->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.claims.show', $claim->id) }}" class="text-primary-600 hover:text-primary-900">Verifikasi</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <x-icon.inbox class="w-16 h-16 text-text-secondary opacity-50 mb-4" />
                                <p class="text-text-secondary">Belum ada klaim yang masuk.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($claims->hasPages())
        <div class="mt-6">
            {{ $claims->links() }}
        </div>
    @endif
</x-layouts.admin>