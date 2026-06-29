<x-layouts.app title="Home" active="home">
    {{-- Success Alert --}}
    @if(session('success'))
        <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 mb-6">
            <div class="flex items-start gap-3">
                <x-icon.check-badge class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" />
                <div>
                    <p class="font-semibold text-emerald-800">Berhasil!</p>
                    <p class="text-sm text-emerald-700 mt-1">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-primary-50 via-white to-surface py-16 sm:py-24">
        {{-- ... sisa kode ... --}}
    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-primary-50 via-white to-surface py-16 sm:py-24">
        <x-layout.container>
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl sm:text-5xl font-bold text-navy-800 mb-4 leading-tight">
                    Temukan Barangmu Kembali
                </h1>
                <p class="text-lg text-text-secondary mb-8 max-w-2xl mx-auto">
                    Laporkan barang hilang atau cari barang yang telah ditemukan di lingkungan sekolah.
                </p>

                {{-- Search Form --}}
                <form action="{{ route('lost-items.index') }}" method="GET" class="max-w-2xl mx-auto mb-8">
                    <div class="flex flex-col sm:flex-row gap-3">
                        <div class="flex-1">
                            <x-form.search-box placeholder="Cari nama barang..." :value="request('search')" />
                        </div>
                        <x-button.primary-button type="submit" size="lg">
                            Cari Barang
                        </x-button.primary-button>
                    </div>
                </form>

                {{-- Quick Actions --}}
                <div class="flex flex-wrap gap-3 justify-center">
                    <a href="{{ route('lost-items.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-white border border-border rounded-lg text-sm font-medium text-text-primary hover:bg-surface transition-colors">
                        <x-icon.alert-circle class="w-4 h-4 text-danger-500" />
                        Lihat Barang Hilang
                    </a>
                    <a href="{{ route('found-items.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-white border border-border rounded-lg text-sm font-medium text-text-primary hover:bg-surface transition-colors">
                        <x-icon.search class="w-4 h-4 text-emerald-500" />
                        Lihat Barang Ditemukan
                    </a>
                </div>
            </div>
        </x-layout.container>
    </section>

    {{-- Statistics Section --}}
    <x-layout.section spacing="normal">
        <x-layout.container>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <x-shared.statistic-card
                    title="Barang Hilang"
                    :value="$stats['lost_items']"
                    icon="alert-circle"
                    color="danger"
                />
                <x-shared.statistic-card
                    title="Barang Ditemukan"
                    :value="$stats['found_items']"
                    icon="search"
                    color="success"
                />
                <x-shared.statistic-card
                    title="Berhasil Dikembalikan"
                    :value="$stats['returned']"
                    icon="check-badge"
                    color="info"
                />
                <x-shared.statistic-card
                    title="Klaim Pending"
                    :value="$stats['pending_claims']"
                    icon="document-text"
                    color="warning"
                />
            </div>
        </x-layout.container>
    </x-layout.section>

    {{-- Quick Action Cards --}}
    <x-layout.section spacing="normal">
        <x-layout.container>
            <div class="text-center mb-10">
                <h2 class="text-2xl sm:text-3xl font-bold text-navy-800 mb-2">Aksi Cepat</h2>
                <p class="text-text-secondary">Pilih aksi yang ingin Anda lakukan</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <x-shared.action-card
                    title="Barang Hilang"
                    description="Lihat daftar barang yang dilaporkan hilang"
                    icon="alert-circle"
                    href="{{ route('lost-items.index') }}"
                    color="danger"
                />
                <x-shared.action-card
                    title="Barang Ditemukan"
                    description="Cari barang yang telah ditemukan"
                    icon="search"
                    href="{{ route('found-items.index') }}"
                    color="success"
                />
                <x-shared.action-card
                    title="Lapor Kehilangan"
                    description="Laporkan barang yang hilang"
                    icon="document-text"
                    href="{{ route('report-lost') }}"
                    color="warning"
                />
                <x-shared.action-card
                    title="Lapor Penemuan"
                    description="Laporkan barang yang ditemukan"
                    icon="check-badge"
                    href="{{ route('report-found') }}"
                    color="primary"
                />
            </div>
        </x-layout.container>
    </x-layout.section>

    {{-- Latest Lost Items --}}
    @if($latestLost->isNotEmpty())
        <x-layout.section spacing="normal">
            <x-layout.container>
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-navy-800 mb-2">Barang Hilang Terbaru</h2>
                        <p class="text-text-secondary">Laporan kehilangan terbaru dari warga sekolah</p>
                    </div>
                    <a href="{{ route('lost-items.index') }}" class="hidden sm:inline-flex items-center gap-2 text-sm font-semibold text-primary-500 hover:text-primary-600 transition-colors">
                        Lihat Semua
                        <x-icon.arrow-right class="w-4 h-4" />
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($latestLost as $item)
                        <x-shared.item-card :item="$item" type="lost" :route="route('lost-items.show', $item->id)" />
                    @endforeach
                </div>
                <div class="sm:hidden mt-6 text-center">
                    <a href="{{ route('lost-items.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-primary-500 hover:text-primary-600 transition-colors">
                        Lihat Semua Barang Hilang
                        <x-icon.arrow-right class="w-4 h-4" />
                    </a>
                </div>
            </x-layout.container>
        </x-layout.section>
    @endif

    {{-- Latest Found Items --}}
    @if($latestFound->isNotEmpty())
        <x-layout.section spacing="normal">
            <x-layout.container>
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-navy-800 mb-2">Barang Ditemukan Terbaru</h2>
                        <p class="text-text-secondary">Barang yang telah ditemukan dan menunggu pemiliknya</p>
                    </div>
                    <a href="{{ route('found-items.index') }}" class="hidden sm:inline-flex items-center gap-2 text-sm font-semibold text-primary-500 hover:text-primary-600 transition-colors">
                        Lihat Semua
                        <x-icon.arrow-right class="w-4 h-4" />
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($latestFound as $item)
                        <x-shared.item-card :item="$item" type="found" :route="route('found-items.show', $item->id)" />
                    @endforeach
                </div>
                <div class="sm:hidden mt-6 text-center">
                    <a href="{{ route('found-items.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-primary-500 hover:text-primary-600 transition-colors">
                        Lihat Semua Barang Ditemukan
                        <x-icon.arrow-right class="w-4 h-4" />
                    </a>
                </div>
            </x-layout.container>
        </x-layout.section>
    @endif

    {{-- How It Works --}}
    <x-layout.section spacing="large">
        <x-layout.container>
            <div class="text-center mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold text-navy-800 mb-2">Cara Kerja ReturnLy</h2>
                <p class="text-text-secondary">Proses sederhana untuk menemukan barang hilangmu</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Step 1 --}}
                <div class="relative">
                    <div class="bg-white rounded-2xl shadow-sm border border-border p-6 h-full">
                        <div class="w-12 h-12 bg-primary-500 text-white rounded-xl flex items-center justify-center font-bold text-lg mb-4">1</div>
                        <h3 class="font-semibold text-text-primary text-lg mb-2">Laporkan Barang</h3>
                        <p class="text-sm text-text-secondary">Isi formulir laporan barang hilang atau barang yang Anda temukan.</p>
                    </div>
                </div>

                {{-- Step 2 --}}
                <div class="relative">
                    <div class="bg-white rounded-2xl shadow-sm border border-border p-6 h-full">
                        <div class="w-12 h-12 bg-primary-500 text-white rounded-xl flex items-center justify-center font-bold text-lg mb-4">2</div>
                        <h3 class="font-semibold text-text-primary text-lg mb-2">Admin Verifikasi</h3>
                        <p class="text-sm text-text-secondary">Admin akan memverifikasi laporan sebelum dipublikasikan.</p>
                    </div>
                </div>

                {{-- Step 3 --}}
                <div class="relative">
                    <div class="bg-white rounded-2xl shadow-sm border border-border p-6 h-full">
                        <div class="w-12 h-12 bg-primary-500 text-white rounded-xl flex items-center justify-center font-bold text-lg mb-4">3</div>
                        <h3 class="font-semibold text-text-primary text-lg mb-2">Barang Dipublikasikan</h3>
                        <p class="text-sm text-text-secondary">Laporan tampil di website dan dapat dicari oleh semua orang.</p>
                    </div>
                </div>

                {{-- Step 4 --}}
                <div class="relative">
                    <div class="bg-white rounded-2xl shadow-sm border border-border p-6 h-full">
                        <div class="w-12 h-12 bg-primary-500 text-white rounded-xl flex items-center justify-center font-bold text-lg mb-4">4</div>
                        <h3 class="font-semibold text-text-primary text-lg mb-2">Pemilik Mengklaim</h3>
                        <p class="text-sm text-text-secondary">Pemilik barang menemukan dan mengajukan klaim kepemilikan.</p>
                    </div>
                </div>

                {{-- Step 5 --}}
                <div class="relative">
                    <div class="bg-white rounded-2xl shadow-sm border border-border p-6 h-full">
                        <div class="w-12 h-12 bg-primary-500 text-white rounded-xl flex items-center justify-center font-bold text-lg mb-4">5</div>
                        <h3 class="font-semibold text-text-primary text-lg mb-2">Admin Verifikasi Klaim</h3>
                        <p class="text-sm text-text-secondary">Admin memverifikasi klaim berdasarkan ciri-ciri barang.</p>
                    </div>
                </div>

                {{-- Step 6 --}}
                <div class="relative">
                    <div class="bg-white rounded-2xl shadow-sm border border-border p-6 h-full">
                        <div class="w-12 h-12 bg-emerald-500 text-white rounded-xl flex items-center justify-center font-bold text-lg mb-4">6</div>
                        <h3 class="font-semibold text-text-primary text-lg mb-2">Barang Dikembalikan</h3>
                        <p class="text-sm text-text-secondary">Barang dikembalikan kepada pemilik yang sah.</p>
                    </div>
                </div>
            </div>
        </x-layout.container>
    </x-layout.section>
</x-layouts.app>