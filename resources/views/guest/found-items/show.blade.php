<x-layouts.app title="Detail Barang Ditemukan" active="found">
    <x-layout.container class="py-8 sm:py-12">
        {{-- Breadcrumb --}}
        <x-layout.breadcrumb :items="[
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Barang Ditemukan', 'url' => route('found-items.index')],
            ['label' => 'Detail Barang'],
        ]" />

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Left Column: Image --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-sm border border-border overflow-hidden sticky top-24">
                    @if($item->photo)
                        <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->item_name }}" class="w-full aspect-[4/3] object-cover">
                    @else
                        <div class="w-full aspect-[4/3] bg-surface flex items-center justify-center">
                            <x-icon.photo class="w-16 h-16 text-text-secondary opacity-50" />
                        </div>
                    @endif
                </div>
            </div>

            {{-- Right Column: Information --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Header --}}
                <div class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8">
                    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-6">
                        <div>
                            <h1 class="text-2xl sm:text-3xl font-bold text-navy-800 mb-2">{{ $item->item_name }}</h1>
                            <p class="text-text-secondary text-sm">Ditemukan pada {{ $item->found_date->format('d M Y') }}</p>
                        </div>
                        <x-shared.status-badge :status="$item->status" />
                    </div>

                    {{-- Info Grid --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <x-icon.tag class="w-5 h-5" />
                            </div>
                            <div>
                                <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Kategori</p>
                                <p class="text-text-primary font-medium">{{ $item->category->name }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <x-icon.map-pin class="w-5 h-5" />
                            </div>
                            <div>
                                <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Lokasi Ditemukan</p>
                                <p class="text-text-primary font-medium">{{ $item->location->name }}</p>
                            </div>
                        </div>

                        @if($item->storage_location)
                            <div class="flex items-start gap-3 sm:col-span-2">
                                <div class="w-10 h-10 bg-info-50 text-info-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <x-icon.archive class="w-5 h-5" />
                                </div>
                                <div>
                                    <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Lokasi Penyimpanan</p>
                                    <p class="text-text-primary font-medium">{{ $item->storage_location }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Description --}}
                <div class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8">
                    <h2 class="text-lg font-semibold text-navy-800 mb-4">Deskripsi Barang</h2>
                    <p class="text-text-primary leading-relaxed whitespace-pre-line">{{ $item->description }}</p>
                </div>

                {{-- Action Section (Claim Button) --}}
                <div class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8">
                    @if($item->status === 'Menunggu Pemilik')
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            <div>
                                <h3 class="font-semibold text-navy-800">Apakah ini barang Anda?</h3>
                                <p class="text-sm text-text-secondary mt-1">Ajukan klaim kepemilikan untuk mendapatkan barang ini kembali.</p>
                            </div>
                            <a href="{{ route('claim.create', $item->id) }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-primary-500 hover:bg-primary-600 text-white font-semibold px-6 py-3 rounded-xl transition shadow-sm hover:shadow-md focus:ring-4 focus:ring-primary-100">
                                <x-icon.document-text class="w-5 h-5" />
                                Ajukan Klaim
                            </a>
                        </div>
                    @elseif($item->status === 'Diklaim')
                        <div class="p-4 bg-warning-50 border border-warning-100 rounded-xl text-warning-700 flex items-start gap-2">
                            <x-icon.clock class="w-5 h-5 flex-shrink-0 mt-0.5" />
                            <div>
                                <p class="font-semibold">Barang sedang dalam proses klaim.</p>
                                <p class="text-sm mt-1">Barang ini sedang diverifikasi oleh Admin. Silakan cek kembali nanti.</p>
                            </div>
                        </div>
                    @else
                        <div class="p-4 bg-emerald-50 border border-emerald-100 rounded-xl text-emerald-700 flex items-start gap-2">
                            <x-icon.check-badge class="w-5 h-5 flex-shrink-0 mt-0.5" />
                            <div>
                                <p class="font-semibold">Barang telah dikembalikan.</p>
                                <p class="text-sm mt-1">Barang ini sudah berhasil dikembalikan kepada pemiliknya.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Related Items --}}
        @if($related->isNotEmpty())
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-navy-800 mb-6">Barang Ditemukan Lainnya</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($related as $relItem)
                        <x-shared.item-card :item="$relItem" type="found" :route="route('found-items.show', $relItem->id)" />
                    @endforeach
                </div>
            </div>
        @endif
    </x-layout.container>
</x-layouts.app>