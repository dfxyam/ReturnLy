@props(['spacing' => 'normal', 'id' => null])

@php
    $spacings = [
        'small' => 'py-8 sm:py-12',
        'normal' => 'py-12 sm:py-16',
        'large' => 'py-16 sm:py-24',
    ];
@endphp

<section {{ $attributes->merge(['class' => 'w-full ' . $spacings[$spacing] ?? $spacings['normal']]) }} @if($id) id="{{ $id }}" @endif>
    {{ $slot }}
</section>