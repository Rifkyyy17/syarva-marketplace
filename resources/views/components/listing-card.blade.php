@props(['listing'])

@php
    $listing->loadMissing(['category', 'city', 'province', 'district', 'primaryImage', 'vehicleDetail', 'propertyDetail']);
    $image = $listing->primaryImageUrl ?? null;
    $location = $listing->city?->name ?? $listing->location_label;
    $rawWa = $listing->user->whatsapp ?: $listing->user->phone ?: \App\Models\Setting::get('contact_whatsapp');
    $cleanWa = $rawWa ? preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $rawWa)) : null;
@endphp

<article class="card group flex flex-col overflow-hidden rounded-2xl border border-slate-200/80 bg-white transition-all duration-300 hover:-translate-y-1 hover:border-slate-300 hover:shadow-md">
    {{-- Photo Container --}}
    <a href="{{ route('listings.show', $listing->slug) }}" class="relative block aspect-[16/10] overflow-hidden bg-slate-100">
        @if ($image)
            <img src="{{ $image }}" alt="{{ $listing->title }}" loading="lazy"
                 onerror="this.onerror=null;this.src='{{ asset('images/placeholder.svg') }}';"
                 class="size-full object-cover transition-transform duration-500 ease-out group-hover:scale-[1.04]">
        @else
            <span class="grid size-full place-items-center text-slate-300">
                <x-icon name="image" class="size-10"/>
            </span>
        @endif

        {{-- Top Badges --}}
        <div class="absolute left-3 top-3 flex flex-wrap items-center gap-1.5">
            <span class="rounded-md bg-slate-900/80 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider text-white backdrop-blur-md">
                {{ $listing->category->name }}
            </span>
            @if ($listing->isVehicle() && $listing->vehicleDetail)
                <span class="rounded-md bg-white/90 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider text-slate-900 backdrop-blur-md shadow-2xs">
                    {{ $listing->vehicleDetail->condition_label }}
                </span>
            @endif
        </div>

        @if ($listing->featured)
            <span class="absolute right-3 top-3 inline-flex items-center gap-1 rounded-md bg-amber-500 px-2 py-0.5 text-[10px] font-black uppercase tracking-wider text-white shadow-xs">
                <x-icon name="star" class="size-2.5 fill-current"/>
                Unggulan
            </span>
        @endif

        @if (auth()->check() && auth()->user()->isAdmin())
            <a href="{{ route('admin.listings.edit', $listing) }}"
               class="absolute {{ $listing->featured ? 'right-24' : 'right-3' }} top-3 z-10 grid size-7 place-items-center rounded-lg bg-slate-900/90 text-white shadow-xs backdrop-blur-md hover:bg-red-600 transition-colors"
               title="Edit Listing ini"
               onclick="event.stopPropagation();">
                <x-icon name="pencil" class="size-3.5"/>
            </a>
        @endif
    </a>

    {{-- Card Body --}}
    <div class="flex flex-1 flex-col p-4">
        {{-- Price --}}
        <div class="flex items-baseline justify-between gap-2">
            <p class="text-base sm:text-lg font-black tracking-tight text-slate-900">
                Rp {{ number_format((float) $listing->price, 0, ',', '.') }}
            </p>
            <span class="text-[10px] font-semibold text-emerald-600 flex items-center gap-0.5">
                <x-icon name="check-badge" class="size-3 text-emerald-500"/> Terverifikasi
            </span>
        </div>

        {{-- Title --}}
        <h3 class="mt-1.5 line-clamp-2 min-h-[2.5rem] text-sm font-bold leading-snug text-slate-900">
            <a href="{{ route('listings.show', $listing->slug) }}" class="transition-colors hover:text-slate-600">
                {{ $listing->title }}
            </a>
        </h3>

        {{-- Location --}}
        <p class="mt-1 flex items-center gap-1 text-xs text-slate-500">
            <x-icon name="map-pin" class="size-3.5 shrink-0 text-slate-400"/>
            <span class="truncate">{{ $location }}</span>
        </p>

        {{-- Specs Pills --}}
        <div class="mt-3 border-t border-slate-100 pt-3">
            @if ($listing->isProperty() && $listing->propertyDetail)
                <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-xs font-medium text-slate-600">
                    @if ($listing->propertyDetail->land_area)
                        <span>LT {{ number_format($listing->propertyDetail->land_area, 0, ',', '.') }} m²</span>
                    @endif
                    @if ($listing->propertyDetail->building_area)
                        <span class="text-slate-300">&bull;</span>
                        <span>LB {{ number_format($listing->propertyDetail->building_area, 0, ',', '.') }} m²</span>
                    @endif
                    @if ($listing->propertyDetail->bedrooms)
                        <span class="text-slate-300">&bull;</span>
                        <span>{{ $listing->propertyDetail->bedrooms }} KT</span>
                    @endif
                    @if ($listing->propertyDetail->bathrooms)
                        <span class="text-slate-300">&bull;</span>
                        <span>{{ $listing->propertyDetail->bathrooms }} KM</span>
                    @endif
                    @if (!$listing->propertyDetail->land_area && !$listing->propertyDetail->bedrooms)
                        <span class="text-slate-500">{{ $listing->propertyDetail->certificate ?? 'SHM Aman' }}</span>
                    @endif
                </div>
            @elseif ($listing->isVehicle() && $listing->vehicleDetail)
                <div class="flex flex-wrap items-center gap-x-2.5 gap-y-1 text-xs font-medium text-slate-600">
                    <span>{{ $listing->vehicleDetail->year }}</span>
                    <span class="text-slate-300">&bull;</span>
                    <span>{{ $listing->vehicleDetail->mileage_label }}</span>
                    <span class="text-slate-300">&bull;</span>
                    <span class="truncate">{{ $listing->vehicleDetail->transmission }}</span>
                </div>
            @endif
        </div>

        {{-- Action Bar --}}
        <div class="mt-4 flex items-center gap-2 border-t border-slate-100 pt-3">
            <a href="{{ route('listings.show', $listing->slug) }}" class="btn-outline btn-sm flex-1 !py-2 text-center justify-center">
                Lihat Detail
            </a>
            @if ($cleanWa)
                <a href="https://wa.me/{{ $cleanWa }}?text={{ urlencode('Halo, saya tertarik dengan listing: ' . $listing->title . ' (Rp ' . number_format((float) $listing->price, 0, ',', '.') . ')') }}"
                   target="_blank" rel="noopener"
                   class="inline-flex items-center justify-center rounded-lg bg-emerald-600 hover:bg-emerald-500 p-2 text-white transition active:scale-95 shadow-2xs"
                   title="Chat WhatsApp">
                    <x-icon name="whatsapp" class="size-4 text-white"/>
                </a>
            @endif
        </div>
    </div>
</article>

