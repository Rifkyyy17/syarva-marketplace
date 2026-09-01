@props(['category', 'count' => null, 'url' => null])

@php
    $slugKey = 'icon_category_' . str_replace('-', '_', $category->slug);
    $customIcon = \App\Models\Setting::get($slugKey) ?: ($category->icon ?: null);

    $defaultIcons = [
        'rumah' => 'building',
        'tanah' => 'map',
        'mobil-baru' => 'car-front',
        'mobil-second' => 'car-back',
    ];
    $iconName = $customIcon ?: ($defaultIcons[$category->slug] ?? 'tag');

    $accents = [
        'mobil-baru' => 'bg-red-50 text-red-600 border-red-100',
        'mobil-second' => 'bg-amber-50 text-amber-600 border-amber-100',
        'rumah' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
        'tanah' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
    ];
    $accent = $accents[$category->slug] ?? 'bg-slate-50 text-slate-700 border-slate-200';
@endphp

<a href="{{ $url ?? '#' }}" class="card group flex items-center gap-4 rounded-2xl border border-slate-200/80 bg-white p-4 sm:p-5 transition-all duration-200 hover:-translate-y-1 hover:border-slate-300 hover:shadow-md">
    <span class="grid size-12 shrink-0 place-items-center rounded-xl border {{ $accent }} transition-transform duration-200 group-hover:scale-105 shadow-2xs">
        <x-icon :name="$iconName" class="size-6"/>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block truncate text-sm sm:text-base font-bold text-slate-900 group-hover:text-slate-700">{{ $category->name }}</span>
        @if ($category->description)
            <span class="mt-0.5 block truncate text-[11px] text-slate-500 font-normal">{{ $category->description }}</span>
        @endif
        @if ($count !== null)
            <span class="mt-1.5 inline-block text-[10px] font-bold uppercase tracking-wider text-slate-400">
                {{ number_format($count, 0, ',', '.') }} unit aktif
            </span>
        @endif
    </span>
    <span class="grid size-7 shrink-0 place-items-center rounded-lg bg-slate-50 text-slate-400 transition-all group-hover:bg-slate-900 group-hover:text-white group-hover:translate-x-0.5">
        <x-icon name="chevron-right" class="size-3.5"/>
    </span>
</a>

