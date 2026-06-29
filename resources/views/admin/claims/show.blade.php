<x-layouts.admin title="Detail Klaim" subtitle="Verifikasi dan proses klaim">
    <div class="max-w-4xl mx-auto">
        <a href="{{ route('admin.claims.index') }}" class="inline-flex items-center gap-2 text-primary-600 hover:text-primary-800 mb-6">
            <x-icon.arrow-left class="w-4 h-4" />
            Kembali ke Daftar Klaim
        </a>

        {{-- Informasi Klaim --}}
        <div class="bg-white rounded-2xl shadow-sm border border-border p-6 mb-6">
            <div class="flex items-start justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-navy-800">{{ $claim->claim_number }}</h2>
                    <p class="text-text-secondary mt-1">Diajukan pada {{ $claim->created_at->format('d M Y, H:i') }}</p>
                </div>
                <span class="px-4 py-2 text-sm font-semibold rounded-full 
                    {{ $claim->status === 'Pending' ? 'bg-yellow-100 text-yellow-800' : ($claim->status === 'Disetujui' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                    {{ $claim->status }}
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Nama Pengklaim</p>
                    <p class="text-text-primary font-medium">{{ $claim->claimant_name }}</p>
                </div>
                <div>
                    <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Email</p>
                    <p class="text-text-primary font-medium">{{ $claim->email }}</p>
                </div>
                <div>
                    <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Nomor WhatsApp</p>
                    <p class="text-text-primary font-medium">{{ $claim->phone_number }}</p>
                </div>
                @if($claim->class_name)
                    <div>
                        <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Kelas</p>
                        <p class="text-text-primary font-medium">{{ $claim->class_name }}</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Barang yang Diklaim --}}
        <div class="bg-white rounded-2xl shadow-sm border border-border p-6 mb-6">
            <h3 class="text-lg font-semibold text-navy-800 mb-4">Barang yang Diklaim</h3>
            <div class="flex gap-4">
                @if($claim->foundItem->photo)
                    <img src="{{ asset('storage/' . $claim->foundItem->photo) }}" alt="{{ $claim->foundItem->item_name }}" class="w-32 h-32 object-cover rounded-xl">
                @else
                    <div class="w-32 h-32 bg-surface rounded-xl flex items-center justify-center">
                        <x-icon.photo class="w-12 h-12 text-text-secondary opacity-50" />
                    </div>
                @endif
                <div class="flex-1">
                    <h4 class="font-semibold text-text-primary text-lg mb-2">{{ $claim->foundItem->item_name ?? '-' }}</h4>
                    <div class="space-y-1 text-sm text-text-secondary">
                        <p><strong>Kategori:</strong> {{ $claim->foundItem->category->name ?? '-' }}</p>
                        <p><strong>Lokasi Ditemukan:</strong> {{ $claim->foundItem->location->name ?? '-' }}</p>
                        <p><strong>Tanggal Ditemukan:</strong> {{ $claim->foundItem->found_date ? $claim->foundItem->found_date->format('d M Y') : '-' }}</p>
                    </div>
                    <p class="mt-3 text-sm text-text-primary">{{ $claim->foundItem->description ?? '-' }}</p>
                </div>
            </div>
        </div>

        {{-- Bukti Kepemilikan --}}
        <div class="bg-white rounded-2xl shadow-sm border border-border p-6 mb-6">
            <h3 class="text-lg font-semibold text-navy-800 mb-4">Bukti Kepemilikan</h3>
            <div class="space-y-4">
                <div>
                    <p class="text-xs text-text-secondary uppercase font-semibold mb-2">Deskripsi Bukti</p>
                    <p class="text-text-primary leading-relaxed whitespace-pre-line">{{ $claim->proof_description }}</p>
                </div>
                @if($claim->proof_photo)
                    <div>
                        <p class="text-xs text-text-secondary uppercase font-semibold mb-2">Foto Bukti</p>
                        <img src="{{ asset('storage/' . $claim->proof_photo) }}" alt="Bukti Kepemilikan" class="max-w-md rounded-xl border border-border">
                    </div>
                @endif
            </div>
        </div>

        {{-- Form Keputusan Admin --}}
        @if($claim->status === 'Pending')
            <div class="bg-white rounded-2xl shadow-sm border border-border p-6">
                <h3 class="text-lg font-semibold text-navy-800 mb-4">Keputusan Admin</h3>
                <form action="{{ route('admin.claims.update-status', $claim->id) }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Catatan Admin (Opsional)</label>
                        <textarea name="admin_notes" rows="3" class="w-full px-4 py-3 rounded-xl border border-border focus:border-primary-500 focus:ring-2 focus:ring-primary-100 outline-none transition" placeholder="Contoh: Silakan ambil barang di ruang BK dengan membawa KTP."></textarea>
                    </div>
                    <div class="flex gap-3">
                        <button type="submit" name="status" value="Disetujui" class="px-6 py-3 bg-emerald-500 text-white font-semibold rounded-xl hover:bg-emerald-600 transition inline-flex items-center gap-2">
                            <x-icon.check-badge class="w-5 h-5" />
                            Setujui Klaim
                        </button>
                        <button type="submit" name="status" value="Ditolak" class="px-6 py-3 bg-danger-500 text-white font-semibold rounded-xl hover:bg-danger-600 transition inline-flex items-center gap-2">
                            <x-icon.x-circle class="w-5 h-5" />
                            Tolak Klaim
                        </button>
                    </div>
                </form>
            </div>
        @else
            <div class="bg-white rounded-2xl shadow-sm border border-border p-6">
                <h3 class="text-lg font-semibold text-navy-800 mb-4">Status Klaim</h3>
                <div class="p-4 rounded-xl {{ $claim->status === 'Disetujui' ? 'bg-emerald-50 border border-emerald-200' : 'bg-danger-50 border border-danger-200' }}">
                    <p class="font-semibold {{ $claim->status === 'Disetujui' ? 'text-emerald-800' : 'text-danger-800' }}">
                        Klaim ini sudah diproses ({{ $claim->status }})
                    </p>
                    @if($claim->processed_at)
                        <p class="text-sm {{ $claim->status === 'Disetujui' ? 'text-emerald-700' : 'text-danger-700' }} mt-1">
                            Diproses pada {{ $claim->processed_at->format('d M Y, H:i') }}
                        </p>
                    @endif
                    @if($claim->admin_notes)
                        <p class="text-sm {{ $claim->status === 'Disetujui' ? 'text-emerald-700' : 'text-danger-700' }} mt-2">
                            <strong>Catatan:</strong> {{ $claim->admin_notes }}
                        </p>
                    @endif
                </div>
            </div>
        @endif
    </div>
</x-layouts.admin>