@props([
    'item' => null,
    'type' => 'lost', // lost atau found
    'route' => '#',
])

<div {{ $attributes->merge(['class' => 'bg-white rounded-xl shadow-sm border border-border overflow-hidden hover:shadow-md hover:-translate-y-1 transition-all duration-200 group']) }}>
    {{-- Image --}}
    <div class="aspect-[4/3] bg-surface overflow-hidden">
        @if($item && $item->photo)
            <img src="{{ asset('storage/' . $item->photo) }}" 
                 alt="{{ $item->item_name }}" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        @else
            <div class="w-full h-full flex items-center justify-center bg-surface">
                <x-icon.photo class="w-12 h-12 text-text-secondary opacity-50" />
            </div>
        @endif
    </div>

    {{-- Content --}}
    <div class="p-5">
        {{-- Status Badge --}}
        @if($item)
            <div class="mb-3">
                <x-shared.status-badge :status="$item->status" :type="$type" />
            </div>
        @endif

        {{-- Item Name --}}
        <h3 class="font-semibold text-text-primary text-lg mb-2 line-clamp-2">
            {{ $item->item_name ?? 'Nama Barang' }}
        </h3>

        {{-- Meta Info --}}
        <div class="space-y-2 text-sm text-text-secondary">
            @if($item)
                <div class="flex items-center gap-2">
                    <x-icon.tag class="w-4 h-4" />
                    <span>{{ $item->category->name ?? 'Kategori' }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <x-icon.map-pin class="w-4 h-4" />
                    <span>{{ $item->location->name ?? 'Lokasi' }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <x-icon.calendar class="w-4 h-4" />
                    <span>
                        {{ $type === 'lost' ? ($item->lost_date?->format('d M Y') ?? '-') : ($item->found_date?->format('d M Y') ?? '-') }}
                    </span>
                </div>
            @endif
        </div>

        {{-- Action Button --}}
        <div class="mt-4 pt-4 border-t border-border">
            <a href="{{ $route }}" 
               class="inline-flex items-center gap-2 text-sm font-semibold text-primary-500 hover:text-primary-600 transition-colors">
                Lihat Detail
                <x-icon.arrow-right class="w-4 h-4" />
            </a>
        </div>
    </div>
</div>