<x-layouts.app title="Ajukan Klaim" active="claim">
    <x-layout.container class="py-8 sm:py-12">
        <x-layout.breadcrumb :items="[
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Barang Ditemukan', 'url' => route('found-items.index')],
            ['label' => 'Ajukan Klaim'],
        ]" />

        <div class="max-w-3xl mx-auto">
            {{-- Page Header --}}
            <div class="mb-8 text-center">
                <h1 class="text-3xl sm:text-4xl font-bold text-navy-800 mb-2">Ajukan Klaim</h1>
                <p class="text-text-secondary">Isi formulir di bawah ini untuk mengajukan klaim kepemilikan barang.</p>
            </div>

            {{-- Item Info Card --}}
            <div class="bg-white rounded-2xl shadow-sm border border-border p-6 mb-8">
                <h2 class="text-lg font-semibold text-navy-800 mb-4 flex items-center gap-2">
                    <x-icon.package class="w-5 h-5 text-primary-500" />
                    Barang yang Diklaim
                </h2>
                <div class="flex gap-4">
                    @if($foundItem->photo)
                        <img src="{{ asset('storage/' . $foundItem->photo) }}" alt="{{ $foundItem->item_name }}" class="w-24 h-24 object-cover rounded-xl">
                    @else
                        <div class="w-24 h-24 bg-surface rounded-xl flex items-center justify-center">
                            <x-icon.photo class="w-8 h-8 text-text-secondary opacity-50" />
                        </div>
                    @endif
                    <div class="flex-1">
                        <h3 class="font-semibold text-text-primary text-lg mb-1">{{ $foundItem->item_name }}</h3>
                        <div class="space-y-1 text-sm text-text-secondary">
                            <p><strong>Kategori:</strong> {{ $foundItem->category->name }}</p>
                            <p><strong>Lokasi Ditemukan:</strong> {{ $foundItem->location->name }}</p>
                            <p><strong>Tanggal Ditemukan:</strong> {{ $foundItem->found_date->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Claim Form --}}
            <form action="{{ route('claim.store', $foundItem->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                {{-- Informasi Pengklaim --}}
                <div class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8">
                    <h2 class="text-lg font-semibold text-navy-800 mb-6 flex items-center gap-2">
                        <x-icon.user class="w-5 h-5 text-primary-500" />
                        Informasi Pengklaim
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <x-form.input label="Nama Lengkap" name="claimant_name" placeholder="Masukkan nama lengkap" :required="true" />
                        <x-form.input label="Email" name="email" type="email" placeholder="contoh@email.com" :required="true" />
                        <x-form.input label="Nomor WhatsApp" name="phone_number" type="tel" placeholder="08xxxxxxxxxx" :required="true" />
                        <x-form.input label="Kelas (Opsional)" name="class_name" placeholder="Contoh: XI RPL 1" />
                    </div>
                </div>

                {{-- Bukti Kepemilikan --}}
                <div class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8">
                    <h2 class="text-lg font-semibold text-navy-800 mb-6 flex items-center gap-2">
                        <x-icon.document-text class="w-5 h-5 text-warning-500" />
                        Bukti Kepemilikan
                    </h2>
                    <div class="space-y-6">
                        <x-form.textarea 
                            label="Deskripsi Bukti Kepemilikan" 
                            name="proof_description" 
                            placeholder="Jelaskan bukti kepemilikan yang Anda miliki. Contoh: Saya memiliki foto barang ini yang diambil sebelum hilang, atau saya memiliki struk pembelian, dll." 
                            :required="true" 
                        />
                        <x-form.image-upload label="Foto Bukti (Opsional)" name="proof_photo" />
                    </div>
                </div>

                {{-- Information Box --}}
                <div class="bg-warning-50 border-l-4 border-warning-500 p-4 rounded-r-xl">
                    <div class="flex gap-3">
                        <x-icon.information class="w-5 h-5 text-warning-500 flex-shrink-0 mt-0.5" />
                        <div class="text-sm text-warning-700">
                            <p class="font-semibold mb-1">Perhatian:</p>
                            <ul class="list-disc list-inside space-y-1">
                                <li>Pastikan bukti kepemilikan yang Anda berikan valid dan dapat dipertanggungjawabkan.</li>
                                <li>Admin akan memverifikasi klaim Anda dalam 1x24 jam.</li>
                                <li>Anda akan dihubungi via email/WhatsApp jika klaim disetujui.</li>
                                <li>Simpan nomor klaim yang akan diberikan setelah submit untuk mengecek status.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="flex flex-col sm:flex-row gap-3 justify-end">
                    <a href="{{ route('found-items.show', $foundItem->id) }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 text-sm font-semibold text-primary-500 bg-white border border-primary-500 hover:bg-primary-50 rounded-xl transition-all duration-200">
                        <x-icon.arrow-left class="w-4 h-4" />
                        Batal
                    </a>
                    <x-button.primary-button type="submit" size="lg">
                        <x-icon.paper-airplane class="w-5 h-5" />
                        Ajukan Klaim
                    </x-button.primary-button>
                </div>
            </form>
        </div>
    </x-layout.container>
</x-layouts.app>