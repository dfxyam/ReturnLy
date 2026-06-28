<footer class="bg-navy-800 text-white mt-auto">
    <x-layout.container>
        <div class="py-12 grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Logo & Deskripsi --}}
            <div class="md:col-span-2">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 bg-primary-500 rounded-lg flex items-center justify-center">
                        <x-icon.home class="w-5 h-5 text-white" />
                    </div>
                    <span class="text-xl font-bold">ReturnLy</span>
                </div>
                <p class="text-slate-300 text-sm max-w-md leading-relaxed">
                    Sistem Lost & Found untuk lingkungan sekolah. Membantu siswa dan pengunjung melaporkan barang hilang atau ditemukan dengan mudah dan terorganisir.
                </p>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="font-semibold mb-4">Menu</h4>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-slate-300 hover:text-white transition-colors">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('lost-items.index') }}" class="text-slate-300 hover:text-white transition-colors">Barang Hilang</a>
                    </li>
                    <li>
                        <a href="{{ route('found-items.index') }}" class="text-slate-300 hover:text-white transition-colors">Barang Ditemukan</a>
                    </li>
                    <li>
                        <a href="{{ route('claim-status') }}" class="text-slate-300 hover:text-white transition-colors">Status Klaim</a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="border-t border-navy-700 py-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-slate-400">
            <p>&copy; {{ date('Y') }} ReturnLy. All rights reserved.</p>
            <p>Version 1.0.0</p>
        </div>
    </x-layout.container>
</footer>