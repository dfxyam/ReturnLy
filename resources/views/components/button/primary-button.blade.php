@props([
    'type' => 'button',
    'size' => 'md',
    'loading' => false,
    'disabled' => false,
])

@php
    $sizes = [
        'sm' => 'px-4 py-2 text-sm',
        'md' => 'px-6 py-3 text-sm',
        'lg' => 'px-8 py-4 text-base',
    ];
@endphp

<button 
    type="{{ $type }}" 
    {{ $attributes->merge([
        'class' => 'inline-flex items-center justify-center gap-2 font-semibold text-white bg-primary-500 hover:bg-primary-600 focus:ring-4 focus:ring-primary-100 rounded-lg transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed ' . ($sizes[$size] ?? $sizes['md'])
    ]) }}
    @if($disabled || $loading) disabled @endif
>
    @if($loading)
        <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <span>Memproses...</span>
    @else
        {{ $slot }}
    @endif
</button>