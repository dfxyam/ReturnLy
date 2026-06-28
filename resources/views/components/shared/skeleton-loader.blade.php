@props([
    'type' => 'card', // card, text, table, stats
    'count' => 3,
])

@php
    $types = [
        'card' => '
            <div class="bg-white rounded-xl border border-border overflow-hidden">
                <div class="aspect-[4/3] animate-shimmer"></div>
                <div class="p-5 space-y-3">
                    <div class="h-4 w-20 bg-slate-200 rounded animate-shimmer"></div>
                    <div class="h-6 w-3/4 bg-slate-200 rounded animate-shimmer"></div>
                    <div class="space-y-2">
                        <div class="h-4 w-full bg-slate-200 rounded animate-shimmer"></div>
                        <div class="h-4 w-5/6 bg-slate-200 rounded animate-shimmer"></div>
                        <div class="h-4 w-4/6 bg-slate-200 rounded animate-shimmer"></div>
                    </div>
                </div>
            </div>
        ',
        'text' => '
            <div class="space-y-3">
                <div class="h-4 w-3/4 bg-slate-200 rounded animate-shimmer"></div>
                <div class="h-4 w-full bg-slate-200 rounded animate-shimmer"></div>
                <div class="h-4 w-5/6 bg-slate-200 rounded animate-shimmer"></div>
            </div>
        ',
        'stats' => '
            <div class="bg-white rounded-xl border border-border p-6">
                <div class="flex items-start justify-between">
                    <div class="flex-1 space-y-3">
                        <div class="h-4 w-24 bg-slate-200 rounded animate-shimmer"></div>
                        <div class="h-8 w-16 bg-slate-200 rounded animate-shimmer"></div>
                    </div>
                    <div class="w-12 h-12 bg-slate-200 rounded-xl animate-shimmer"></div>
                </div>
            </div>
        ',
    ];
@endphp

@for($i = 0; $i < $count; $i++)
    {!! $types[$type] ?? $types['card'] !!}
@endfor