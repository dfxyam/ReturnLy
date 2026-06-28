@props(['size' => 'default'])

@php
    $sizes = [
        'default' => 'max-w-7xl mx-auto px-4 sm:px-6 lg:px-8',
        'narrow' => 'max-w-4xl mx-auto px-4 sm:px-6 lg:px-8',
        'wide' => 'max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8',
        'full' => 'w-full px-4 sm:px-6 lg:px-8',
    ];
@endphp

<div {{ $attributes->merge(['class' => $sizes[$size] ?? $sizes['default']]) }}>
    {{ $slot }}
</div>