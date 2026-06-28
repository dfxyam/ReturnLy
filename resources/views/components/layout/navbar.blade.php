@props(['active' => null])

<nav class="sticky top-0 z-50 bg-white border-b border-border shadow-sm">
    <x-layout.container>
        <div class="flex items-center justify-between h-16 lg:h-[72px]">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <div class="w-8 h-8 bg-primary-500 rounded-lg flex items-center justify-center">
                    <x-icon.home class="w-5 h-5 text-white" />
                </div>
                <span class="text-xl font-bold text-navy-800">ReturnLy</span>
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden lg:flex items-center gap-1">
                <a href="{{ route('home') }}" 
                   class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ $active === 'home' ? 'text-primary-500 bg-primary-50' : 'text-text-primary hover:text-primary-500 hover:bg-surface' }}">
                    Home
                </a>
                <a href="{{ route('lost-items.index') }}" 
                   class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ $active === 'lost' ? 'text-primary-500 bg-primary-50' : 'text-text-primary hover:text-primary-500 hover:bg-surface' }}">
                    Barang Hilang
                </a>
                <a href="{{ route('found-items.index') }}" 
                   class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ $active === 'found' ? 'text-primary-500 bg-primary-50' : 'text-text-primary hover:text-primary-500 hover:bg-surface' }}">
                    Barang Ditemukan
                </a>
                <a href="{{ route('claim-status') }}" 
                   class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ $active === 'claim-status' ? 'text-primary-500 bg-primary-50' : 'text-text-primary hover:text-primary-500 hover:bg-surface' }}">
                    Status Klaim
                </a>

                {{-- Dropdown Lapor Barang --}}
                <div class="relative group">
                    <button class="flex items-center gap-1 px-4 py-2 rounded-lg text-sm font-medium text-text-primary hover:text-primary-500 hover:bg-surface transition-colors">
                        Lapor Barang
                        <x-icon.chevron-down class="w-4 h-4" />
                    </button>
                    <div class="absolute top-full left-0 mt-1 w-56 bg-white border border-border rounded-xl shadow-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                        <a href="{{ route('report-lost') }}" 
                           class="block px-4 py-3 text-sm text-text-primary hover:bg-surface hover:text-primary-500 rounded-t-xl transition-colors">
                            <div class="flex items-center gap-3">
                                <x-icon.alert-circle class="w-4 h-4 text-danger-500" />
                                <span>Lapor Barang Hilang</span>
                            </div>
                        </a>
                        <a href="{{ route('report-found') }}" 
                           class="block px-4 py-3 text-sm text-text-primary hover:bg-surface hover:text-primary-500 rounded-b-xl transition-colors">
                            <div class="flex items-center gap-3">
                                <x-icon.search class="w-4 h-4 text-emerald-500" />
                                <span>Lapor Barang Ditemukan</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Mobile Menu Button --}}
            <button id="mobile-menu-button" class="lg:hidden p-2 rounded-lg text-text-primary hover:bg-surface transition-colors" aria-label="Toggle menu">
                <x-icon.menu class="w-6 h-6" id="menu-icon" />
                <x-icon.x class="w-6 h-6 hidden" id="close-icon" />
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="lg:hidden hidden border-t border-border">
            <div class="py-4 space-y-1">
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-lg text-sm font-medium {{ $active === 'home' ? 'text-primary-500 bg-primary-50' : 'text-text-primary hover:bg-surface' }}">
                    Home
                </a>
                <a href="{{ route('lost-items.index') }}" class="block px-4 py-3 rounded-lg text-sm font-medium {{ $active === 'lost' ? 'text-primary-500 bg-primary-50' : 'text-text-primary hover:bg-surface' }}">
                    Barang Hilang
                </a>
                <a href="{{ route('found-items.index') }}" class="block px-4 py-3 rounded-lg text-sm font-medium {{ $active === 'found' ? 'text-primary-500 bg-primary-50' : 'text-text-primary hover:bg-surface' }}">
                    Barang Ditemukan
                </a>
                <a href="{{ route('claim-status') }}" class="block px-4 py-3 rounded-lg text-sm font-medium {{ $active === 'claim-status' ? 'text-primary-500 bg-primary-50' : 'text-text-primary hover:bg-surface' }}">
                    Status Klaim
                </a>
                <div class="border-t border-border my-2"></div>
                <p class="px-4 py-2 text-xs font-semibold text-text-secondary uppercase">Lapor Barang</p>
                <a href="{{ route('report-lost') }}" class="block px-4 py-3 rounded-lg text-sm font-medium text-text-primary hover:bg-surface">
                    <div class="flex items-center gap-3">
                        <x-icon.alert-circle class="w-4 h-4 text-danger-500" />
                        <span>Lapor Barang Hilang</span>
                    </div>
                </a>
                <a href="{{ route('report-found') }}" class="block px-4 py-3 rounded-lg text-sm font-medium text-text-primary hover:bg-surface">
                    <div class="flex items-center gap-3">
                        <x-icon.search class="w-4 h-4 text-emerald-500" />
                        <span>Lapor Barang Ditemukan</span>
                    </div>
                </a>
            </div>
        </div>
    </x-layout.container>
</nav>

{{-- Vanilla JS untuk Mobile Menu --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        if (menuButton && mobileMenu) {
            menuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                menuIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            });
        }
    });
</script>