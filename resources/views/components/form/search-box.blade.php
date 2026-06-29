@props(['name' => 'search', 'placeholder' => 'Cari nama barang...', 'value' => ''])

<div class="relative">
    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
        <x-icon.search class="w-5 h-5 text-text-secondary" />
    </div>
    <input
        type="text"
        name="{{ $name }}"
        value="{{ $value }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'w-full pl-12 pr-4 py-3 rounded-xl border border-border focus:border-primary-500 focus:ring-2 focus:ring-primary-100 outline-none transition bg-white text-text-primary']) }}
    >
</div>