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

    $tones = [
        'rumah' => 'bg-emerald-50 text-emerald-600',
        'tanah' => 'bg-emerald-50 text-emerald-600',
        'mobil-baru' => 'bg-primary-50 text-primary-600',
        'mobil-second' => 'bg-amber-50 text-amber-600',
    ];
    $tone = $tones[$category->slug] ?? 'bg-slate-100 text-charcoal-600';
@endphp

<a href="{{ $url ?? '#' }}" class="group flex items-center gap-4 rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-primary-200 hover:shadow-lg">
    <span class="grid size-14 shrink-0 place-items-center rounded-xl {{ $tone }} transition-transform duration-200 group-hover:scale-110">
        <x-icon :name="$iconName" class="size-7"/>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block truncate text-base font-bold text-charcoal-900 group-hover:text-primary-500">{{ $category->name }}</span>
        @if ($category->description)
            <span class="mt-0.5 block truncate text-xs text-charcoal-500">{{ $category->description }}</span>
        @endif
        @if ($count !== null)
            <span class="mt-1 block text-xs font-semibold text-primary-500">{{ number_format($count, 0, ',', '.') }} listing</span>
        @endif
    </span>
    <x-icon name="chevron-right" class="size-5 shrink-0 text-gray-300 transition-all group-hover:translate-x-1 group-hover:text-primary-500"/>
</a>
