@props(['active' => false, 'icon' => 'chevron-right'])

@php
    $classes = $active
        ? 'flex items-center gap-3 rounded-xl bg-primary-700 px-3 py-2.5 text-sm font-semibold text-white shadow-sm'
        : 'flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-600 hover:bg-primary-50 hover:text-primary-800';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <x-icon :name="$icon" class="size-4 shrink-0 opacity-90"/>
    <span class="truncate">{{ $slot }}</span>
</a>