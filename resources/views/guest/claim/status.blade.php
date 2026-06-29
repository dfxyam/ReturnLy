<x-layouts.app title="Status Klaim" active="claim-status">
    <x-layout.container class="py-8 sm:py-12">
        <x-layout.breadcrumb :items="[
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Status Klaim'],
        ]" />

        <div class="max-w-2xl mx-auto">
            {{-- Page Header --}}
            <div class="mb-8 text-center">
                <h1 class="text-3xl sm:text-4xl font-bold text-navy-800 mb-2">Cek Status Klaim</h1>
                <p class="text-text-secondary">Masukkan nomor klaim dan email Anda untuk mengecek status.</p>
            </div>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 mb-6 rounded-r-xl">
                    <div class="flex items-start gap-3">
                        <x-icon.check-badge class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" />
                        <p class="text-sm text-emerald-700">{!! session('success') !!}</p>
                    </div>
                </div>
            @endif

            {{-- Error Message --}}
            @if(session('error'))
                <div class="bg-danger-50 border-l-4 border-danger-500 p-4 mb-6 rounded-r-xl">
                    <div class="flex items-start gap-3">
                        <x-icon.alert-circle class="w-5 h-5 text-danger-500 flex-shrink-0 mt-0.5" />
                        <p class="text-sm text-danger-700">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            {{-- Check Form --}}
            <form action="{{ route('claim.check') }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-border p-6 sm:p-8">
                @csrf
                <div class="space-y-6">
                    <x-form.input 
                        label="Nomor Klaim" 
                        name="claim_number" 
                        placeholder="Contoh: CLM-20260629-A1B2C3" 
                        :value="old('claim_number')"
                        :required="true" 
                    />
                    <x-form.input 
                        label="Email" 
                        name="email" 
                        type="email" 
                        placeholder="contoh@email.com" 
                        :value="old('email')"
                        :required="true" 
                    />
                    <x-button.primary-button type="submit" size="lg" class="w-full">
                        <x-icon.search class="w-5 h-5" />
                        Cek Status Klaim
                    </x-button.primary-button>
                </div>
            </form>

            {{-- Info Box --}}
            <div class="bg-info-50 border-l-4 border-info-500 p-4 rounded-r-xl mt-6">
                <div class="flex gap-3">
                    <x-icon.information class="w-5 h-5 text-info-500 flex-shrink-0 mt-0.5" />
                    <div class="text-sm text-info-700">
                        <p class="font-semibold mb-1">Tips:</p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Nomor klaim diberikan setelah Anda mengajukan klaim berhasil.</li>
                            <li>Gunakan email yang sama saat mengajukan klaim.</li>
                            <li>Hubungi admin jika Anda lupa nomor klaim atau email.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-layout.container>
</x-layouts.app>