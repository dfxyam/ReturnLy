@props([
    'type' => 'button',
    'size' => 'md',
])

@php
    $sizes = [
        'sm' => 'px-4 py-2 text-sm h-[36px]',
        'md' => 'px-6 py-2.5 text-sm h-[44px]',
        'lg' => 'px-8 py-3 text-base h-[52px]',
    ];
@endphp

<button 
    type="{{ $type }}" 
    {{ $attributes->merge([
        'class' => 'inline-flex items-center justify-center gap-2 font-semibold text-primary-500 bg-white border border-primary-500 hover:bg-primary-50 focus:ring-4 focus:ring-primary-100 rounded-lg transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed ' . ($sizes[$size] ?? $sizes['md'])
    ]) }}
>
    {{ $slot }}
</button>