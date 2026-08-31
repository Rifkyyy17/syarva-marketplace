@props(['items' => []])

<nav class="flex items-center gap-1.5 overflow-x-auto pb-2 text-sm text-slate-500 no-scrollbar" aria-label="Breadcrumb">
    <a href="{{ route('home') }}" class="flex items-center gap-1 transition-colors hover:text-primary-700">
        <x-icon name="home" class="size-4"/>
    </a>
    @foreach ($items as $label => $url)
        <x-icon name="chevron-right" class="size-3.5 shrink-0 text-slate-300"/>
        @if ($url && ! $loop->last)
            <a href="{{ $url }}" class="shrink-0 transition-colors hover:text-primary-700">{{ $label }}</a>
        @else
            <span class="shrink-0 font-medium text-slate-800">{{ $label }}</span>
        @endif
    @endforeach
</nav>