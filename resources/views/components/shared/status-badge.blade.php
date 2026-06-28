@props([
    'status' => 'pending',
    'type' => 'lost', // lost, found, claim
])

@php
    $styles = [
        // Lost Items Status
        'Belum Ditemukan' => 'bg-danger-100 text-danger-700',
        'Ditemukan' => 'bg-emerald-100 text-emerald-700',
        'Selesai' => 'bg-info-100 text-info-700',
        
        // Found Items Status
        'Menunggu Pemilik' => 'bg-warning-100 text-warning-700',
        'Diklaim' => 'bg-info-100 text-info-700',
        'Dikembalikan' => 'bg-emerald-100 text-emerald-700',
        
        // Claim Status
        'Pending' => 'bg-warning-100 text-warning-700',
        'Disetujui' => 'bg-emerald-100 text-emerald-700',
        'Ditolak' => 'bg-danger-100 text-danger-700',
    ];

    $class = $styles[$status] ?? 'bg-slate-100 text-slate-700';
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center gap-1 px-3 py-1 text-xs font-semibold rounded-full ' . $class]) }}>
    {{ $status }}
</span>