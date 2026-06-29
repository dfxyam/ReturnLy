<x-layouts.app title="Kontak" active="contact">
    <x-layout.container class="py-12 sm:py-16">
        <div class="max-w-3xl mx-auto text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-primary-100 text-primary-700 text-sm font-semibold rounded-full mb-4">
                Hubungi Kami
            </span>
            <h1 class="text-4xl sm:text-5xl font-bold text-navy-800 mb-4">Ada Pertanyaan?</h1>
            <p class="text-lg text-text-secondary">
                Tim kami siap membantu Anda. Silakan hubungi kami melalui kontak di bawah ini.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto mb-12">
            <div class="bg-white rounded-2xl shadow-sm border border-border p-6 text-center">
                <div class="w-14 h-14 bg-primary-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <x-icon.map-pin class="w-7 h-7 text-primary-600" />
                </div>
                <h3 class="font-bold text-navy-800 mb-2">Alamat</h3>
                <p class="text-sm text-text-secondary">
                    SMK Nusantara<br>
                    Jl. Pendidikan No. 123<br>
                    Jakarta Selatan
                </p>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-border p-6 text-center">
                <div class="w-14 h-14 bg-emerald-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <x-icon.phone class="w-7 h-7 text-emerald-600" />
                </div>
                <h3 class="font-bold text-navy-800 mb-2">Telepon</h3>
                <p class="text-sm text-text-secondary">
                    +62 812-3456-7890<br>
                    Senin - Jumat<br>
                    08:00 - 16:00 WIB
                </p>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-border p-6 text-center">
                <div class="w-14 h-14 bg-warning-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <x-icon.envelope class="w-7 h-7 text-warning-600" />
                </div>
                <h3 class="font-bold text-navy-800 mb-2">Email</h3>
                <p class="text-sm text-text-secondary">
                    info@returnly.id<br>
                    support@returnly.id<br>
                    Respon 1x24 jam
                </p>
            </div>
        </div>

        {{-- FAQ --}}
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-navy-800 text-center mb-8">Pertanyaan Umum</h2>
            <div class="space-y-4">
                <details class="bg-white rounded-2xl shadow-sm border border-border p-6 group">
                    <summary class="font-semibold text-navy-800 cursor-pointer flex items-center justify-between">
                        Bagaimana cara melaporkan barang hilang?
                        <span class="group-open:rotate-180 transition-transform">▼</span>
                    </summary>
                    <p class="mt-4 text-text-secondary">
                        Klik menu "Lapor Barang Hilang" di halaman utama, isi formulir dengan detail barang, lalu submit. Admin akan memverifikasi laporan Anda.
                    </p>
                </details>
                <details class="bg-white rounded-2xl shadow-sm border border-border p-6 group">
                    <summary class="font-semibold text-navy-800 cursor-pointer flex items-center justify-between">
                        Berapa lama proses verifikasi klaim?
                        <span class="group-open:rotate-180 transition-transform">▼</span>
                    </summary>
                    <p class="mt-4 text-text-secondary">
                        Admin akan memverifikasi klaim dalam waktu 1x24 jam. Anda akan dihubungi via email/WhatsApp jika klaim disetujui.
                    </p>
                </details>
                <details class="bg-white rounded-2xl shadow-sm border border-border p-6 group">
                    <summary class="font-semibold text-navy-800 cursor-pointer flex items-center justify-between">
                        Apa saja bukti kepemilikan yang diterima?
                        <span class="group-open:rotate-180 transition-transform">▼</span>
                    </summary>
                    <p class="mt-4 text-text-secondary">
                        Foto barang yang jelas, struk pembelian, kartu garansi, atau screenshot chat yang menunjukkan kepemilikan barang.
                    </p>
                </details>
                <details class="bg-white rounded-2xl shadow-sm border border-border p-6 group">
                    <summary class="font-semibold text-navy-800 cursor-pointer flex items-center justify-between">
                        Apakah layanan ini gratis?
                        <span class="group-open:rotate-180 transition-transform">▼</span>
                    </summary>
                    <p class="mt-4 text-text-secondary">
                        Ya, ReturnLy sepenuhnya gratis untuk semua siswa dan guru di lingkungan sekolah kami.
                    </p>
                </details>
            </div>
        </div>
    </x-layout.container>
</x-layouts.app>