@props([
    'title' => 'Title',
    'value' => '0',
    'icon' => 'home',
    'color' => 'primary',
])

@php
    $colors = [
        'primary' => 'bg-primary-50 text-primary-600',
        'success' => 'bg-emerald-50 text-emerald-600',
        'warning' => 'bg-warning-50 text-warning-600',
        'danger' => 'bg-danger-50 text-danger-600',
        'info' => 'bg-info-50 text-info-600',
    ];
@endphp

<div class="bg-white rounded-2xl shadow-sm border border-border p-6 hover:shadow-md transition-shadow">
    <div class="flex items-center gap-4">
        <div class="w-12 h-12 {{ $colors[$color] ?? $colors['primary'] }} rounded-xl flex items-center justify-center flex-shrink-0">
            <x-dynamic-component :component="'icon.' . $icon" class="w-6 h-6" />
        </div>
        <div>
            <p class="text-sm text-text-secondary mb-1">{{ $title }}</p>
            <p class="text-2xl font-bold text-text-primary">{{ $value }}</p>
        </div>
    </div>
</div>