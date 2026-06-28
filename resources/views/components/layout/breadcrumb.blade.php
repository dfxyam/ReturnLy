@props(['items' => []])

@if(count($items) > 0)
    <nav aria-label="Breadcrumb" class="mb-6">
        <ol class="flex flex-wrap items-center gap-2 text-sm">
            @foreach($items as $index => $item)
                <li class="flex items-center gap-2">
                    @if($index > 0)
                        <x-icon.chevron-right class="w-4 h-4 text-text-secondary" />
                    @endif

                    @if($index === count($items) - 1)
                        {{-- Current page (tidak bisa diklik) --}}
                        <span class="text-text-secondary font-medium" aria-current="page">
                            {{ $item['label'] }}
                        </span>
                    @else
                        {{-- Link page --}}
                        <a href="{{ $item['url'] ?? '#' }}" class="text-text-secondary hover:text-primary-500 transition-colors">
                            {{ $item['label'] }}
                        </a>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
@endif