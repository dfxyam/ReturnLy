<x-layouts.app title="Detail Klaim" active="claim-status">
    <x-layout.container class="py-8 sm:py-12">
        <x-layout.breadcrumb :items="[
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Status Klaim', 'url' => route('claim-status')],
            ['label' => 'Detail Klaim'],
        ]" />

        <div class="max-w-3xl mx-auto">
            {{-- Page Header --}}
            <div class="mb-8 text-center">
                <h1 class="text-3xl sm:text-4xl font-bold text-navy-800 mb-2">Detail Klaim</h1>
                <p class="text-text-secondary">Nomor Klaim: <strong class="text-primary-500">{{ $claim->claim_number }}</strong></p>
            </div>

            {{-- Status Card --}}
            <div class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8 mb-6">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
                    <h2 class="text-lg font-semibold text-navy-800">Status Klaim</h2>
                    @php
                        $statusColors = [
                            'Pending' => 'bg-warning-100 text-warning-700',
                            'Disetujui' => 'bg-emerald-100 text-emerald-700',
                            'Ditolak' => 'bg-danger-100 text-danger-700',
                        ];
                        $statusIcons = [
                            'Pending' => 'clock',
                            'Disetujui' => 'check-badge',
                            'Ditolak' => 'x-circle',
                        ];
                    @endphp
                    <span class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold rounded-full {{ $statusColors[$claim->status] }}">
                        <x-dynamic-component :component="'icon.' . $statusIcons[$claim->status]" class="w-4 h-4" />
                        {{ $claim->status }}
                    </span>
                </div>

                {{-- Status Description --}}
                @if($claim->status === 'Pending')
                    <div class="bg-warning-50 border-l-4 border-warning-500 p-4 rounded-r-xl">
                        <p class="text-sm text-warning-700">
                            <strong>Klaim Anda sedang dalam proses verifikasi.</strong><br>
                            Admin akan memeriksa bukti kepemilikan yang Anda berikan. Proses ini biasanya memakan waktu 1x24 jam.
                        </p>
                    </div>
                @elseif($claim->status === 'Disetujui')
                    <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-xl">
                        <p class="text-sm text-emerald-700">
                            <strong>Selamat! Klaim Anda telah disetujui.</strong><br>
                            Silakan hubungi admin untuk mengambil barang Anda. Bawa kartu identitas untuk verifikasi.
                            @if($claim->admin_notes)
                                <br><br><strong>Catatan Admin:</strong> {{ $claim->admin_notes }}
                            @endif
                        </p>
                    </div>
                @elseif($claim->status === 'Ditolak')
                    <div class="bg-danger-50 border-l-4 border-danger-500 p-4 rounded-r-xl">
                        <p class="text-sm text-danger-700">
                            <strong>Mohon maaf, klaim Anda ditolak.</strong><br>
                            @if($claim->admin_notes)
                                <strong>Alasan:</strong> {{ $claim->admin_notes }}<br><br>
                            @endif
                            Silakan hubungi admin jika Anda memiliki pertanyaan atau ingin mengajukan klaim ulang dengan bukti yang lebih lengkap.
                        </p>
                    </div>
                @endif
            </div>

            {{-- Claim Information --}}
            <div class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8 mb-6">
                <h2 class="text-lg font-semibold text-navy-800 mb-6 flex items-center gap-2">
                    <x-icon.user class="w-5 h-5 text-primary-500" />
                    Informasi Pengklaim
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Nama</p>
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
                    <div>
                        <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Tanggal Pengajuan</p>
                        <p class="text-text-primary font-medium">{{ $claim->created_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>
            </div>

            {{-- Claimed Item --}}
            <div class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8 mb-6">
                <h2 class="text-lg font-semibold text-navy-800 mb-6 flex items-center gap-2">
                    <x-icon.package class="w-5 h-5 text-primary-500" />
                    Barang yang Diklaim
                </h2>
                <div class="flex gap-4">
                    @if($claim->foundItem->photo)
                        <img src="{{ asset('storage/' . $claim->foundItem->photo) }}" alt="{{ $claim->foundItem->item_name }}" class="w-24 h-24 object-cover rounded-xl">
                    @else
                        <div class="w-24 h-24 bg-surface rounded-xl flex items-center justify-center">
                            <x-icon.photo class="w-8 h-8 text-text-secondary opacity-50" />
                        </div>
                    @endif
                    <div class="flex-1">
                        <h3 class="font-semibold text-text-primary text-lg mb-1">{{ $claim->foundItem->item_name }}</h3>
                        <div class="space-y-1 text-sm text-text-secondary">
                            <p><strong>Kategori:</strong> {{ $claim->foundItem->category->name }}</p>
                            <p><strong>Lokasi Ditemukan:</strong> {{ $claim->foundItem->location->name }}</p>
                            <p><strong>Tanggal Ditemukan:</strong> {{ $claim->foundItem->found_date->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Proof Information --}}
            <div class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8">
                <h2 class="text-lg font-semibold text-navy-800 mb-6 flex items-center gap-2">
                    <x-icon.document-text class="w-5 h-5 text-warning-500" />
                    Bukti Kepemilikan
                </h2>
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

            {{-- Back Button --}}
            <div class="mt-8 text-center">
                <a href="{{ route('claim-status') }}" class="inline-flex items-center gap-2 text-primary-500 hover:text-primary-600 font-medium">
                    <x-icon.arrow-left class="w-4 h-4" />
                    Kembali ke Cek Status
                </a>
            </div>
        </div>
    </x-layout.container>
</x-layouts.app>