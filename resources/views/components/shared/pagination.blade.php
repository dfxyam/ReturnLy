@props(['paginator'])

@if($paginator->hasPages())
    <nav class="flex items-center justify-between px-4 py-3 sm:px-6" aria-label="Pagination">
        <div class="hidden sm:block">
            <p class="text-sm text-text-secondary">
                Menampilkan
                <span class="font-medium">{{ $paginator->firstItem() }}</span>
                sampai
                <span class="font-medium">{{ $paginator->lastItem() }}</span>
                dari
                <span class="font-medium">{{ $paginator->total() }}</span>
                hasil
            </p>
        </div>
        <div class="flex flex-1 justify-between sm:justify-end gap-2">
            {{-- Previous Page --}}
            @if($paginator->onFirstPage())
                <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-text-secondary bg-white border border-border rounded-lg cursor-not-allowed opacity-50">
                    <x-icon.chevron-left class="w-4 h-4 mr-1" />
                    Sebelumnya
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" 
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-text-primary bg-white border border-border rounded-lg hover:bg-surface transition-colors">
                    <x-icon.chevron-left class="w-4 h-4 mr-1" />
                    Sebelumnya
                </a>
            @endif

            {{-- Page Numbers --}}
            @foreach($elements as $element)
                @if(is_string($element))
                    <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-text-secondary">
                        {{ $element }}
                    </span>
                @endif

                @if(is_array($element))
                    @foreach($element as $page => $url)
                        @if($page == $paginator->currentPage())
                            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-primary-500 rounded-lg">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" 
                               class="inline-flex items-center px-4 py-2 text-sm font-medium text-text-primary bg-white border border-border rounded-lg hover:bg-surface transition-colors">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page --}}
            @if($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" 
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-text-primary bg-white border border-border rounded-lg hover:bg-surface transition-colors">
                    Selanjutnya
                    <x-icon.chevron-right class="w-4 h-4 ml-1" />
                </a>
            @else
                <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-text-secondary bg-white border border-border rounded-lg cursor-not-allowed opacity-50">
                    Selanjutnya
                    <x-icon.chevron-right class="w-4 h-4 ml-1" />
                </span>
            @endif
        </div>
    </nav>
@endif