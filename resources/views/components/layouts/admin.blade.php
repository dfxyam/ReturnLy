<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin' }} - ReturnLy</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface min-h-screen">
    <div class="flex">
        {{-- Sidebar --}}
        <aside class="w-64 bg-navy-800 text-white min-h-screen fixed left-0 top-0 flex flex-col">
            <div class="p-6 border-b border-white/10">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary-500 rounded-lg flex items-center justify-center">
                        <x-icon.home class="w-6 h-6 text-white" />
                    </div>
                    <div>
                        <h1 class="font-bold text-lg">ReturnLy</h1>
                        <p class="text-xs text-white/60">Admin Panel</p>
                    </div>
                </a>
            </div>

            <nav class="flex-1 p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-primary-500 text-white' : 'text-white/70 hover:bg-white/10' }}">
                    <x-icon.home class="w-5 h-5" />
                    <span>Dashboard</span>
                </a>

                <p class="px-4 pt-4 pb-2 text-xs font-semibold text-white/40 uppercase">Manajemen</p>
                
                <a href="{{ route('admin.lost-items.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.lost-items.*') ? 'bg-primary-500 text-white' : 'text-white/70 hover:bg-white/10' }}">
                    <x-icon.alert-circle class="w-5 h-5" />
                    <span>Barang Hilang</span>
                </a>

                <a href="{{ route('admin.found-items.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.found-items.*') ? 'bg-primary-500 text-white' : 'text-white/70 hover:bg-white/10' }}">
                    <x-icon.search class="w-5 h-5" />
                    <span>Barang Ditemukan</span>
                </a>

                <a href="{{ route('admin.claims.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.claims.*') ? 'bg-primary-500 text-white' : 'text-white/70 hover:bg-white/10' }}">
                    <x-icon.document-text class="w-5 h-5" />
                    <span>Klaim</span>
                    @php $pendingClaims = \App\Models\Claim::where('status', 'Pending')->count(); @endphp
                    @if($pendingClaims > 0)
                        <span class="ml-auto bg-danger-500 text-white text-xs px-2 py-0.5 rounded-full">{{ $pendingClaims }}</span>
                    @endif
                </a>

                <p class="px-4 pt-4 pb-2 text-xs font-semibold text-white/40 uppercase">Data Master</p>

                <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.categories.*') ? 'bg-primary-500 text-white' : 'text-white/70 hover:bg-white/10' }}">
                    <x-icon.tag class="w-5 h-5" />
                    <span>Kategori</span>
                </a>

                <a href="{{ route('admin.locations.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.locations.*') ? 'bg-primary-500 text-white' : 'text-white/70 hover:bg-white/10' }}">
                    <x-icon.map-pin class="w-5 h-5" />
                    <span>Lokasi</span>
                </a>
            </nav>

            <div class="p-4 border-t border-white/10">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center">
                        <x-icon.user class="w-5 h-5" />
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium truncate">{{ auth()->user()->name ?? 'Admin' }}</p>
                        <p class="text-xs text-white/60 truncate">{{ auth()->user()->email ?? 'admin@returnly.com' }}</p>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-2 px-4 py-2 text-sm text-white/70 hover:text-white hover:bg-white/10 rounded-lg transition">
                        <x-icon.arrow-left class="w-4 h-4" />
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 ml-64">
            {{-- Topbar --}}
            <header class="bg-white border-b border-border px-8 py-4 flex items-center justify-between sticky top-0 z-10">
                <div>
                    <h2 class="text-xl font-bold text-navy-800">{{ $title ?? 'Dashboard' }}</h2>
                    <p class="text-sm text-text-secondary">{{ $subtitle ?? 'Selamat datang di panel admin' }}</p>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-2 text-sm text-primary-500 hover:text-primary-600">
                        <x-icon.arrow-right class="w-4 h-4" />
                        Lihat Website
                    </a>
                </div>
            </header>

            {{-- Content --}}
            <div class="p-8">
                @if(session('success'))
                    <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 mb-6 rounded-r-xl">
                        <div class="flex items-start gap-3">
                            <x-icon.check-badge class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" />
                            <p class="text-sm text-emerald-700">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-danger-50 border-l-4 border-danger-500 p-4 mb-6 rounded-r-xl">
                        <div class="flex items-start gap-3">
                            <x-icon.alert-circle class="w-5 h-5 text-danger-500 flex-shrink-0 mt-0.5" />
                            <p class="text-sm text-danger-700">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>