@props(['eyebrow' => null, 'title', 'description' => null, 'link' => null, 'linkLabel' => 'Lihat Semua'])

<div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
    <div>
        @if ($eyebrow)
            <p class="text-xs font-bold uppercase tracking-widest text-primary-500">{{ $eyebrow }}</p>
        @endif
        <h2 class="mt-1.5 text-2xl font-extrabold tracking-tight text-charcoal-900 sm:text-3xl">{{ $title }}</h2>
        @if ($description)
            <p class="mt-2 max-w-2xl text-sm text-charcoal-500">{{ $description }}</p>
        @endif
    </div>
    @if ($link)
        <a href="{{ $link }}" class="btn-outline btn-sm shrink-0">
            {{ $linkLabel }}
            <x-icon name="arrow-right" class="size-4"/>
        </a>
    @endif
</div>
