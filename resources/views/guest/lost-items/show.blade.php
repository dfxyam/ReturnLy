<x-layouts.app title="Detail Barang Hilang" active="lost">
    <x-layout.container class="py-8 sm:py-12">
        {{-- Breadcrumb --}}
        <x-layout.breadcrumb :items="[
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Barang Hilang', 'url' => route('lost-items.index')],
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
                            <p class="text-text-secondary text-sm">Dilaporkan pada {{ $item->created_at->format('d M Y') }}</p>
                        </div>
                        <x-shared.status-badge :status="$item->status" />
                    </div>

                    {{-- Info Grid --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-primary-50 text-primary-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <x-icon.tag class="w-5 h-5" />
                            </div>
                            <div>
                                <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Kategori</p>
                                <p class="text-text-primary font-medium">{{ $item->category->name }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-primary-50 text-primary-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <x-icon.map-pin class="w-5 h-5" />
                            </div>
                            <div>
                                <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Lokasi Hilang</p>
                                <p class="text-text-primary font-medium">{{ $item->location->name }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-primary-50 text-primary-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                <x-icon.calendar class="w-5 h-5" />
                            </div>
                            <div>
                                <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Tanggal Hilang</p>
                                <p class="text-text-primary font-medium">{{ $item->lost_date->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Description --}}
                <div class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8">
                    <h2 class="text-lg font-semibold text-navy-800 mb-4">Deskripsi Barang</h2>
                    <p class="text-text-primary leading-relaxed whitespace-pre-line">{{ $item->description }}</p>
                </div>

                {{-- Reporter Information (Privasi dijaga) --}}
                <div class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8">
                    <h2 class="text-lg font-semibold text-navy-800 mb-4">Informasi Pelapor</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Nama Pelapor</p>
                            <p class="text-text-primary font-medium">{{ $item->reporter_name }}</p>
                        </div>
                        @if($item->class_name)
                            <div>
                                <p class="text-xs text-text-secondary uppercase font-semibold mb-1">Kelas</p>
                                <p class="text-text-primary font-medium">{{ $item->class_name }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="mt-4 p-4 bg-info-50 border border-info-100 rounded-xl text-sm text-info-700 flex items-start gap-2">
                        <x-icon.information class="w-5 h-5 flex-shrink-0 mt-0.5" />
                        <p>Nomor WhatsApp pelapor tidak ditampilkan untuk menjaga privasi. Admin akan menghubungi jika barang ditemukan.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Related Items --}}
        @if($related->isNotEmpty())
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-navy-800 mb-6">Barang Hilang Lainnya</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($related as $relItem)
                        <x-shared.item-card :item="$relItem" type="lost" :route="route('lost-items.show', $relItem->id)" />
                    @endforeach
                </div>
            </div>
        @endif
    </x-layout.container>
</x-layouts.app>