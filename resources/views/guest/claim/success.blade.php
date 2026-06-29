<x-layouts.app title="Klaim Berhasil Diajukan" active="claim">
    <x-layout.container class="py-8 sm:py-12">
        <div class="max-w-2xl mx-auto">
            {{-- Success Card --}}
            <div class="bg-white rounded-2xl shadow-sm border border-border p-8 text-center">
                <div class="w-20 h-20 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <x-icon.check-badge class="w-10 h-10" />
                </div>
                
                <h1 class="text-3xl font-bold text-navy-800 mb-2">Klaim Berhasil Diajukan!</h1>
                <p class="text-text-secondary mb-8">
                    Terima kasih telah mengajukan klaim. Silakan simpan nomor klaim Anda untuk mengecek status.
                </p>

                {{-- Claim Number Box --}}
                <div class="bg-primary-50 border-2 border-primary-200 rounded-xl p-6 mb-8">
                    <p class="text-sm text-primary-600 mb-2 font-semibold">Nomor Klaim Anda</p>
                    <p class="text-3xl font-bold text-primary-700 tracking-wider">{{ $claim->claim_number }}</p>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row gap-3 justify-center mb-8">
                    <button onclick="copyToClipboard('{{ $claim->claim_number }}')" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white border-2 border-primary-500 text-primary-500 font-semibold rounded-xl hover:bg-primary-50 transition-colors">
                        <x-icon.clipboard class="w-5 h-5" />
                        Salin Nomor Klaim
                    </button>
                    <a href="{{ route('claim-status') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary-500 text-white font-semibold rounded-xl hover:bg-primary-600 transition-colors">
                        <x-icon.search class="w-5 h-5" />
                        Cek Status Klaim
                    </a>
                </div>

                {{-- Item Info --}}
                <div class="bg-surface rounded-xl p-6 text-left mb-6">
                    <h3 class="font-semibold text-navy-800 mb-3">Barang yang Diklaim:</h3>
                    <div class="flex items-center gap-4">
                        @if($claim->foundItem->photo)
                            <img src="{{ asset('storage/' . $claim->foundItem->photo) }}" alt="{{ $claim->foundItem->item_name }}" class="w-16 h-16 object-cover rounded-lg">
                        @else
                            <div class="w-16 h-16 bg-white rounded-lg flex items-center justify-center">
                                <x-icon.photo class="w-6 h-6 text-text-secondary opacity-50" />
                            </div>
                        @endif
                        <div>
                            <p class="font-medium text-text-primary">{{ $claim->foundItem->item_name }}</p>
                            <p class="text-sm text-text-secondary">{{ $claim->foundItem->category->name }}</p>
                        </div>
                    </div>
                </div>

                {{-- Important Info --}}
                <div class="bg-info-50 border-l-4 border-info-500 p-4 rounded-r-xl text-left">
                    <h4 class="font-semibold text-info-800 mb-2">Penting!</h4>
                    <ul class="text-sm text-info-700 space-y-1 list-disc list-inside">
                        <li><strong>Simpan nomor klaim ini</strong> untuk mengecek status klaim Anda</li>
                        <li>Admin akan memverifikasi klaim dalam 1x24 jam</li>
                        <li>Anda akan dihubungi via email/WhatsApp jika klaim disetujui</li>
                        <li>Cek status klaim Anda di menu <strong>Status Klaim</strong></li>
                    </ul>
                </div>

                <div class="mt-8">
                    <a href="{{ route('home') }}" class="text-primary-500 hover:text-primary-600 font-medium inline-flex items-center gap-2">
                        <x-icon.arrow-left class="w-4 h-4" />
                        Kembali ke Home
                    </a>
                </div>
            </div>
        </div>
    </x-layout.container>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('Nomor klaim berhasil disalin: ' + text);
            }).catch(err => {
                // Fallback untuk browser lama
                const textarea = document.createElement('textarea');
                textarea.value = text;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);
                alert('Nomor klaim berhasil disalin: ' + text);
            });
        }
    </script>
</x-layouts.app>