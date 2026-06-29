<x-layouts.app title="Kebijakan Privasi" active="privacy">
    <x-layout.container class="py-12 sm:py-16">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-1.5 bg-primary-100 text-primary-700 text-sm font-semibold rounded-full mb-4">
                    Kebijakan Privasi
                </span>
                <h1 class="text-4xl sm:text-5xl font-bold text-navy-800 mb-4">Privasi Anda Penting</h1>
                <p class="text-text-secondary">
                    Terakhir diperbarui: {{ now()->format('d F Y') }}
                </p>
            </div>

            <div class="prose prose-lg max-w-none space-y-8">
                <section class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8">
                    <h2 class="text-2xl font-bold text-navy-800 mb-4 flex items-center gap-2">
                        <x-icon.shield-check class="w-6 h-6 text-primary-500" />
                        1. Informasi yang Kami Kumpulkan
                    </h2>
                    <p class="text-text-secondary mb-3">Kami mengumpulkan informasi berikut saat Anda menggunakan ReturnLy:</p>
                    <ul class="list-disc list-inside space-y-2 text-text-secondary">
                        <li>Nama lengkap dan kontak (email, nomor WhatsApp)</li>
                        <li>Informasi barang yang dilaporkan (nama, deskripsi, foto)</li>
                        <li>Bukti kepemilikan saat mengajukan klaim</li>
                        <li>Data penggunaan (log aktivitas, IP address)</li>
                    </ul>
                </section>

                <section class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8">
                    <h2 class="text-2xl font-bold text-navy-800 mb-4 flex items-center gap-2">
                        <x-icon.cog class="w-6 h-6 text-primary-500" />
                        2. Penggunaan Informasi
                    </h2>
                    <p class="text-text-secondary mb-3">Informasi yang kami kumpulkan digunakan untuk:</p>
                    <ul class="list-disc list-inside space-y-2 text-text-secondary">
                        <li>Memfasilitasi proses pencarian dan pengembalian barang</li>
                        <li>Verifikasi klaim kepemilikan barang</li>
                        <li>Meningkatkan kualitas layanan platform</li>
                        <li>Menghubungi Anda terkait laporan yang diajukan</li>
                    </ul>
                </section>

                <section class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8">
                    <h2 class="text-2xl font-bold text-navy-800 mb-4 flex items-center gap-2">
                        <x-icon.lock-closed class="w-6 h-6 text-primary-500" />
                        3. Keamanan Data
                    </h2>
                    <p class="text-text-secondary">
                        Kami mengambil langkah-langkah keamanan yang wajar untuk melindungi informasi pribadi Anda dari akses, penggunaan, atau pengungkapan yang tidak sah. Namun, tidak ada metode transmisi melalui internet yang 100% aman.
                    </p>
                </section>

                <section class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8">
                    <h2 class="text-2xl font-bold text-navy-800 mb-4 flex items-center gap-2">
                        <x-icon.user-group class="w-6 h-6 text-primary-500" />
                        4. Berbagi Informasi
                    </h2>
                    <p class="text-text-secondary">
                        Kami tidak menjual, memperdagangkan, atau menyewakan informasi pribadi Anda kepada pihak ketiga. Informasi hanya dibagikan kepada admin untuk keperluan verifikasi klaim.
                    </p>
                </section>

                <section class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8">
                    <h2 class="text-2xl font-bold text-navy-800 mb-4 flex items-center gap-2">
                        <x-icon.envelope class="w-6 h-6 text-primary-500" />
                        5. Hubungi Kami
                    </h2>
                    <p class="text-text-secondary">
                        Jika Anda memiliki pertanyaan tentang kebijakan privasi ini, silakan hubungi kami di <a href="mailto:privacy@returnly.id" class="text-primary-500 hover:text-primary-600 font-medium">privacy@returnly.id</a>.
                    </p>
                </section>
            </div>
        </div>
    </x-layout.container>
</x-layouts.app>