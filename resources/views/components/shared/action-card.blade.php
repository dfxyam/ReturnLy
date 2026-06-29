@props([
    'title' => 'Title',
    'description' => 'Description',
    'icon' => 'home',
    'href' => '#',
    'color' => 'primary',
])

@php
    $colors = [
        'primary' => 'bg-primary-50 text-primary-600 group-hover:bg-primary-500 group-hover:text-white',
        'success' => 'bg-emerald-50 text-emerald-600 group-hover:bg-emerald-500 group-hover:text-white',
        'warning' => 'bg-warning-50 text-warning-600 group-hover:bg-warning-500 group-hover:text-white',
        'danger' => 'bg-danger-50 text-danger-600 group-hover:bg-danger-500 group-hover:text-white',
    ];
@endphp

<a href="{{ $href }}" class="group bg-white rounded-2xl shadow-sm border border-border p-6 hover:shadow-md hover:-translate-y-1 transition-all duration-200">
    <div class="w-12 h-12 {{ $colors[$color] ?? $colors['primary'] }} rounded-xl flex items-center justify-center mb-4 transition-colors">
        <x-dynamic-component :component="'icon.' . $icon" class="w-6 h-6" />
    </div>
    <h3 class="font-semibold text-text-primary mb-1">{{ $title }}</h3>
    <p class="text-sm text-text-secondary">{{ $description }}</p>
</a>