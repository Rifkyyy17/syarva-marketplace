<x-layouts.app>
    <x-slot:title>{{ $category?->name ?? 'Semua Listing' }}</x-slot:title>
    <x-slot:description>{{ $category?->description ?? 'Jelajahi semua listing rumah, tanah, dan mobil di SYARVA Marketplace.' }}</x-slot:description>

    <section class="border-b border-slate-200 bg-white">
        <div class="container-app py-6">
            <x-breadcrumb :items="[
                'Home' => route('home'),
                $category?->name ?? 'Semua Listing' => null,
            ]"/>

            <div class="mt-3 flex flex-wrap items-end justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">
                        {{ $category?->name ?? 'Semua Listing' }}
                    </h1>
                    <p class="mt-1 text-sm text-slate-500">
                        {{ number_format($listings->total(), 0, ',', '.') }} listing ditemukan
                        @if (! empty($filters['q']))
                            untuk <strong class="text-slate-800">"{{ $filters['q'] }}"</strong>
                        @endif
                    </p>
                </div>

                <form method="GET" action="{{ request()->url() }}" class="flex flex-wrap sm:flex-nowrap items-center gap-2 w-full sm:w-auto" x-data>
                    @foreach (request()->except(['sort']) as $key => $value)
                        @if (is_array($value))
                            @foreach ($value as $v)
                                <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                            @endforeach
                        @else
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach
                    <label class="relative block flex-1 sm:flex-initial sm:hidden">
                        <x-icon name="search" class="pointer-events-none absolute left-3 top-1/2 size-4 -translate-y-1/2 text-slate-400"/>
                        <input type="search" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Cari..." class="input w-full! pl-9! py-2! text-sm">
                    </label>
                    <select name="sort" x-on:change="$event.target.form.submit()" class="input shrink-0 w-auto! py-2! text-xs sm:text-sm" aria-label="Urutkan">
                        <option value="newest" @selected(($filters['sort'] ?? 'newest') === 'newest')>Terbaru</option>
                        <option value="oldest" @selected(($filters['sort'] ?? '') === 'oldest')>Terlama</option>
                        <option value="price_asc" @selected(($filters['sort'] ?? '') === 'price_asc')>Harga Terendah</option>
                        <option value="price_desc" @selected(($filters['sort'] ?? '') === 'price_desc')>Harga Tertinggi</option>
                        <option value="popular" @selected(($filters['sort'] ?? '') === 'popular')>Paling Populer</option>
                    </select>
                    <button type="button"
                            class="btn-outline btn-sm shrink-0 lg:hidden"
                            x-data
                            @click="$dispatch('open-filter-drawer')">
                        <x-icon name="filter" class="size-4"/>
                        Filter
                        @if ($activeFilters)
                            <span class="grid size-5 place-items-center rounded-full bg-primary-700 text-[10px] font-bold text-white">{{ $activeFilters }}</span>
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </section>

    <section class="container-app py-8">
        <div class="grid gap-8 lg:grid-cols-[280px_1fr]">
            <aside class="hidden lg:block" aria-label="Filter">
                <div class="sticky top-24 max-h-[calc(100vh-7rem)] overflow-y-auto rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="mb-4 flex items-center justify-between border-b border-slate-100 pb-3">
                        <h2 class="text-sm font-bold uppercase tracking-wide text-slate-800">
                            <x-icon name="filter" class="mr-1.5 inline size-4 text-primary-600"/> Filter
                        </h2>
                        @if ($activeFilters)
                            <span class="text-xs font-semibold text-primary-700">{{ $activeFilters }} aktif</span>
                        @endif
                    </div>
                    <form method="GET" action="{{ request()->url() }}" x-data>
                        @if ($category)
                            <input type="hidden" name="category" value="{{ $category->slug }}">
                        @endif
                        <x-filter-form :filters="$filters" :category="$category" :brands="$brands" :cities="$cities"/>
                    </form>
                </div>
            </aside>

            <div>
                <div class="mb-4 flex flex-wrap items-center gap-2" aria-label="Kategori">
                    <a href="{{ route('listings.index') }}"
                       class="rounded-full border px-4 py-1.5 text-sm font-medium transition-colors {{ ! $category ? 'border-primary-700 bg-primary-700 text-white' : 'border-slate-300 bg-white text-slate-600 hover:border-primary-300' }}">
                        Semua
                    </a>
                    @foreach ($subcategories as $sub)
                        <a href="{{ match ($sub->slug) {
                            'rumah' => route('listings.property', 'rumah'),
                            'tanah' => route('listings.property', 'tanah'),
                            'mobil-baru' => route('listings.vehicle', 'baru'),
                            'mobil-second' => route('listings.vehicle', 'second'),
                            default => route('listings.index'),
                        } }}"
                           class="rounded-full border px-4 py-1.5 text-sm font-medium transition-colors {{ $category?->id === $sub->id ? 'border-primary-700 bg-primary-700 text-white' : 'border-slate-300 bg-white text-slate-600 hover:border-primary-300' }}">
                            {{ $sub->name }}
                        </a>
                    @endforeach
                </div>

                @if ($listings->isNotEmpty())
                    <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-3">
                        @foreach ($listings as $listing)
                            <x-listing-card :listing="$listing"/>
                        @endforeach
                    </div>

                    <div class="mt-10">
                        {{ $listings->links() }}
                    </div>
                @else
                    <x-empty-state
                        title="Listing tidak ditemukan"
                        message="Coba ubah kata kunci atau filter Anda, atau jelajahi seluruh kategori."
                        icon="search"
                        action="{{ route('listings.index') }}"
                        action-label="Lihat Semua Listing"
                    />
                @endif
            </div>
        </div>
    </section>

    <div x-data="filterDrawer"
         @open-filter-drawer.window="open = true"
         x-show="open"
         x-transition.opacity
         class="fixed inset-0 z-50 bg-slate-900/60 lg:hidden"
         x-cloak>
        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
             class="absolute inset-y-0 left-0 flex w-[85%] max-w-sm flex-col bg-white shadow-2xl">
            <div class="flex items-center justify-between border-b border-slate-200 px-5 py-4">
                <h2 class="text-base font-bold text-slate-900">Filter Pencarian</h2>
                <button type="button" class="rounded-lg p-2 text-slate-500 hover:bg-slate-100" @click="open = false" aria-label="Tutup filter">
                    <x-icon name="x" class="size-5"/>
                </button>
            </div>
            <div class="flex-1 overflow-y-auto p-5">
                <form method="GET" action="{{ request()->url() }}">
                    @if ($category)
                        <input type="hidden" name="category" value="{{ $category->slug }}">
                    @endif
                    <x-filter-form :filters="$filters" :category="$category" :brands="$brands" :cities="$cities"/>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>