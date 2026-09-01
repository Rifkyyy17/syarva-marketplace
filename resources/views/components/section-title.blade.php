@props(['eyebrow' => null, 'title', 'description' => null, 'link' => null, 'linkLabel' => 'Lihat Semua'])

<div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
    <div>
        @if ($eyebrow)
            <span class="inline-block text-[10px] font-bold uppercase tracking-[0.08em] text-slate-500">
                {{ $eyebrow }}
            </span>
        @endif
        <h2 class="mt-1 text-2xl font-extrabold tracking-[-0.02em] text-slate-900 sm:text-3xl">
            {{ $title }}
        </h2>
        @if ($description)
            <p class="mt-1.5 max-w-2xl text-xs sm:text-sm text-slate-500 leading-relaxed">
                {{ $description }}
            </p>
        @endif
    </div>
    @if ($link)
        <a href="{{ $link }}" class="btn-outline btn-sm shrink-0 self-start sm:self-auto !rounded-lg !px-3.5 !py-2 text-xs font-semibold">
            <span>{{ $linkLabel }}</span>
            <x-icon name="arrow-right" class="size-3.5"/>
        </a>
    @endif
</div>

