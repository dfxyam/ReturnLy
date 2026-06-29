<x-layouts.app title="Lapor Barang Hilang" active="lost">
    <x-layout.container class="py-8 sm:py-12">
        {{-- Breadcrumb --}}
        <x-layout.breadcrumb :items="[
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Lapor Barang Hilang'],
        ]" />

        {{-- Page Header --}}
        <div class="mb-8 max-w-[700px] mx-auto text-center">
            <h1 class="text-3xl sm:text-4xl font-bold text-navy-800 mb-2">Lapor Barang Hilang</h1>
            <p class="text-text-secondary">Isi formulir di bawah ini untuk melaporkan barang yang hilang.</p>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="max-w-[700px] mx-auto mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('report-lost') }}" method="POST" enctype="multipart/form-data" class="max-w-[700px] mx-auto space-y-8">
            @csrf

            {{-- Informasi Pelapor --}}
            <div class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8">
                <h2 class="text-lg font-semibold text-navy-800 mb-6 flex items-center gap-2">
                    <x-icon.user class="w-5 h-5 text-primary-500" />
                    Informasi Pelapor
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <x-form.input label="Nama Pelapor" name="reporter_name" placeholder="Masukkan nama lengkap" :required="true" />
                    <x-form.input label="Kelas" name="class_name" placeholder="Contoh: XI RPL 1" />
                    <x-form.input label="Nomor WhatsApp" name="phone_number" type="tel" placeholder="08xxxxxxxxxx" :required="true" class="sm:col-span-2" />
                </div>
            </div>

            {{-- Informasi Barang --}}
            <div class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8">
                <h2 class="text-lg font-semibold text-navy-800 mb-6 flex items-center gap-2">
                    <x-icon.alert-circle class="w-5 h-5 text-danger-500" />
                    Informasi Barang Hilang
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <x-form.input label="Nama Barang" name="item_name" placeholder="Contoh: Dompet Hitam" :required="true" class="sm:col-span-2" />
                    <x-form.select label="Kategori" name="category_id" :options="$categories" placeholder="Pilih Kategori" :required="true" />
                    <x-form.select label="Lokasi Kehilangan" name="location_id" :options="$locations" placeholder="Pilih Lokasi" :required="true" />
                    <x-form.input label="Tanggal Kehilangan" name="lost_date" type="date" :required="true" />
                    
                    <x-form.textarea label="Deskripsi Barang" name="description" placeholder="Jelaskan ciri-ciri barang secara detail..." :required="true" class="sm:col-span-2" />
                    
                    <x-form.image-upload label="Foto Barang (Opsional)" name="photo" class="sm:col-span-2" />
                </div>
            </div>

            {{-- Information Box --}}
            <div class="bg-info-50 border-l-4 border-info-500 p-4 rounded-r-xl">
                <div class="flex gap-3">
                    <x-icon.information class="w-5 h-5 text-info-500 flex-shrink-0 mt-0.5" />
                    <p class="text-sm text-info-700">
                        Pastikan informasi yang Anda berikan benar agar memudahkan proses pencarian barang. Admin akan memverifikasi laporan sebelum dipublikasikan.
                    </p>
                </div>
            </div>

            {{-- Submit Button --}}
            <div class="flex justify-end">
                <x-button.primary-button type="submit" size="lg">
                    <x-icon.paper-airplane class="w-5 h-5" />
                    Kirim Laporan
                </x-button.primary-button>
            </div>
        </form>
    </x-layout.container>
</x-layouts.app>