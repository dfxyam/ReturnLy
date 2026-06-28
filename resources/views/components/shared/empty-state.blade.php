@props([
    'icon' => 'inbox',
    'title' => 'Belum ada data',
    'description' => 'Tidak ada data yang tersedia untuk ditampilkan.',
    'action' => null,
    'actionText' => 'Tambah Data',
])

<div class="flex flex-col items-center justify-center py-16 px-4">
    <div class="w-20 h-20 bg-surface rounded-full flex items-center justify-center mb-6">
        <x-dynamic-component :component="'icon.' . $icon" class="w-10 h-10 text-text-secondary" />
    </div>
    <h3 class="text-lg font-semibold text-text-primary mb-2">{{ $title }}</h3>
    <p class="text-sm text-text-secondary text-center max-w-md mb-6">{{ $description }}</p>
    @if($action)
        {{ $action }}
    @endif
</div>