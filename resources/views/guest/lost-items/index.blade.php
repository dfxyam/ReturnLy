<x-layouts.app title="Barang Hilang" active="lost">
    <x-layout.container class="py-8 sm:py-12">
        {{-- Breadcrumb --}}
        <x-layout.breadcrumb :items="[
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Barang Hilang'],
        ]" />

        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-3xl sm:text-4xl font-bold text-navy-800 mb-2">Barang Hilang</h1>
            <p class="text-text-secondary">Temukan informasi barang yang dilaporkan hilang di lingkungan sekolah.</p>
        </div>

        {{-- Search & Filter --}}
        <form method="GET" action="{{ route('lost-items.index') }}" class="bg-white rounded-2xl shadow-sm border border-border p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                {{-- Search --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-text-primary mb-2">Cari Barang</label>
                    <x-form.search-box placeholder="Cari nama barang..." :value="request('search')" />
                </div>

                {{-- Category Filter --}}
                <div>
                    <label for="category" class="block text-sm font-medium text-text-primary mb-2">Kategori</label>
                    <select name="category" id="category" class="w-full px-4 py-3 rounded-xl border border-border focus:border-primary-500 focus:ring-2 focus:ring-primary-100 outline-none transition bg-white text-text-primary">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Location Filter --}}
                <div>
                    <label for="location" class="block text-sm font-medium text-text-primary mb-2">Lokasi</label>
                    <select name="location" id="location" class="w-full px-4 py-3 rounded-xl border border-border focus:border-primary-500 focus:ring-2 focus:ring-primary-100 outline-none transition bg-white text-text-primary">
                        <option value="">Semua Lokasi</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}" {{ request('location') == $location->id ? 'selected' : '' }}>
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Filter Actions --}}
            <div class="flex flex-col sm:flex-row gap-3 mt-6 pt-6 border-t border-border">
                <x-button.primary-button type="submit" size="md">
                    <x-icon.search class="w-4 h-4" />
                    Cari Barang
                </x-button.primary-button>
                
                <a href="{{ route('lost-items.index') }}" class="inline-flex items-center justify-center gap-2 px-6 py-2.5 text-sm font-semibold text-primary-500 bg-white border border-primary-500 hover:bg-primary-50 rounded-lg transition-all duration-200 h-[44px]">
                    Reset Filter
                </a>
            </div>
        </form>

        {{-- Items Grid --}}
        @if($items->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                @foreach($items as $item)
                    <x-shared.item-card :item="$item" type="lost" :route="route('lost-items.show', $item->id)" />
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="flex justify-center">
                {{ $items->links() }}
            </div>
        @else
            <x-shared.empty-state 
                icon="inbox"
                title="Tidak ada barang hilang"
                description="Belum ada laporan barang hilang yang sesuai dengan pencarian Anda."
            />
        @endif
    </x-layout.container>
</x-layouts.app>