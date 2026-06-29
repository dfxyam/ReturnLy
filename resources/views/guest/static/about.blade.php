<x-layouts.app title="Tentang Kami" active="about">
    <x-layout.container class="py-12 sm:py-16">
        {{-- Header --}}
        <div class="max-w-3xl mx-auto text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-primary-100 text-primary-700 text-sm font-semibold rounded-full mb-4">
                Tentang ReturnLy
            </span>
            <h1 class="text-4xl sm:text-5xl font-bold text-navy-800 mb-4">
                Mengembalikan yang Hilang,<br>Menyatukan yang Terpisah
            </h1>
            <p class="text-lg text-text-secondary">
                ReturnLy adalah platform Lost & Found digital yang dirancang khusus untuk lingkungan sekolah, membantu siswa dan guru menemukan barang yang hilang dengan mudah dan efisien.
            </p>
        </div>

        {{-- Vision & Mission --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto mb-12">
            <div class="bg-white rounded-2xl shadow-sm border border-border p-8">
                <div class="w-14 h-14 bg-primary-100 rounded-xl flex items-center justify-center mb-4">
                    <x-icon.eye class="w-7 h-7 text-primary-600" />
                </div>
                <h2 class="text-2xl font-bold text-navy-800 mb-3">Visi Kami</h2>
                <p class="text-text-secondary leading-relaxed">
                    Menjadi platform Lost & Found terdepan yang memudahkan setiap orang untuk menemukan barang yang hilang, menciptakan lingkungan yang lebih peduli dan terhubung.
                </p>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-border p-8">
                <div class="w-14 h-14 bg-emerald-100 rounded-xl flex items-center justify-center mb-4">
                    <x-icon.flag class="w-7 h-7 text-emerald-600" />
                </div>
                <h2 class="text-2xl font-bold text-navy-800 mb-3">Misi Kami</h2>
                <ul class="text-text-secondary space-y-2">
                    <li class="flex items-start gap-2">
                        <span class="text-emerald-500 mt-1">✓</span>
                        Menyediakan platform yang mudah digunakan
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-emerald-500 mt-1">✓</span>
                        Memfasilitasi komunikasi antara penemu dan pemilik
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-emerald-500 mt-1">✓</span>
                        Membangun budaya jujur dan peduli di sekolah
                    </li>
                </ul>
            </div>
        </div>

        {{-- Features --}}
        <div class="max-w-5xl mx-auto mb-12">
            <h2 class="text-3xl font-bold text-navy-800 text-center mb-8">Mengapa ReturnLy?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-primary-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <x-icon.bolt class="w-8 h-8 text-primary-600" />
                    </div>
                    <h3 class="font-bold text-navy-800 mb-2">Cepat & Mudah</h3>
                    <p class="text-sm text-text-secondary">Laporkan barang hilang atau ditemukan hanya dalam beberapa menit</p>
                </div>
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-emerald-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <x-icon.shield-check class="w-8 h-8 text-emerald-600" />
                    </div>
                    <h3 class="font-bold text-navy-800 mb-2">Aman & Terpercaya</h3>
                    <p class="text-sm text-text-secondary">Verifikasi admin memastikan setiap klaim diproses dengan adil</p>
                </div>
                <div class="text-center p-6">
                    <div class="w-16 h-16 bg-warning-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <x-icon.heart class="w-8 h-8 text-warning-600" />
                    </div>
                    <h3 class="font-bold text-navy-800 mb-2">Peduli & Terbuka</h3>
                    <p class="text-sm text-text-secondary">Membangun komunitas yang saling membantu dan jujur</p>
                </div>
            </div>
        </div>

        {{-- CTA --}}
        <div class="bg-gradient-to-br from-primary-500 to-primary-700 rounded-3xl p-8 sm:p-12 text-center text-white max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold mb-4">Siap Membantu atau Mencari?</h2>
            <p class="text-white/80 mb-6 max-w-xl mx-auto">
                Bergabunglah dengan ReturnLy dan jadilah bagian dari komunitas yang peduli.
            </p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ route('report-lost') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white text-primary-600 font-semibold rounded-xl hover:bg-gray-100 transition-colors">
                    Lapor Barang Hilang
                </a>
                <a href="{{ route('report-found') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white/10 backdrop-blur text-white border border-white/30 font-semibold rounded-xl hover:bg-white/20 transition-colors">
                    Lapor Barang Ditemukan
                </a>
            </div>
        </div>
    </x-layout.container>
</x-layouts.app>