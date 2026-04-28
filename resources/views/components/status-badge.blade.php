@props(['status'])

@php
    $colors = [
        'pending'   => 'bg-amber-100 text-amber-600 border-amber-200',
        'paid'      => 'bg-blue-100 text-blue-600 border-blue-200',
        'shipped'   => 'bg-emerald-100 text-emerald-600 border-emerald-200',
        'completed' => 'bg-gray-100 text-gray-600 border-gray-200',
        'cancelled' => 'bg-rose-100 text-rose-600 border-rose-200',
    ];

    $currentColor = $colors[strtolower($status)] ?? 'bg-gray-100 text-gray-500 border-gray-200';
@endphp

<span {{ $attributes->merge(['class' => "px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest border inline-flex items-center justify-center gap-1.5 $currentColor"]) }}>
    <span class="w-1 h-1 rounded-full bg-current opacity-60 shadow-sm"></span>
    {{ $status }}
</span>
