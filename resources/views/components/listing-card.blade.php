@props(['listing'])

@php
    $listing->loadMissing(['category', 'city', 'province', 'district', 'primaryImage', 'vehicleDetail', 'propertyDetail']);
    $image = $listing->primaryImageUrl ?? null;
    $location = $listing->location_full;
@endphp

<article class="group flex flex-col overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
    <a href="{{ route('listings.show', $listing->slug) }}" class="relative block aspect-[4/3] overflow-hidden bg-gray-100">
        @if ($image)
            <img src="{{ $image }}" alt="{{ $listing->title }}" loading="lazy"
                 onerror="this.onerror=null;this.src='{{ asset('images/placeholder.svg') }}';"
                 class="size-full object-cover transition-transform duration-500 group-hover:scale-105">
        @else
            <span class="grid size-full place-items-center text-gray-300">
                <x-icon name="image" class="size-10"/>
            </span>
        @endif

        <span class="absolute left-3 top-3 rounded-lg border border-white/60 bg-white/90 px-2.5 py-1 text-xs font-semibold text-charcoal-900 backdrop-blur">
            {{ $listing->category->name }}
        </span>

        @if ($listing->featured)
            <span class="absolute right-3 top-3 grid size-8 place-items-center rounded-lg bg-primary-500 text-white shadow-lg shadow-primary-500/30">
                <x-icon name="star" class="size-4"/>
            </span>
        @endif

        <span class="absolute bottom-3 left-3 rounded-lg bg-charcoal-900/90 px-3 py-1.5 text-sm font-bold text-white backdrop-blur">
            Rp {{ number_format((float) $listing->price, 0, ',', '.') }}
        </span>
    </a>

    <div class="flex flex-1 flex-col p-4">
        <h3 class="line-clamp-2 min-h-[2.5rem] text-sm font-bold leading-snug text-charcoal-900">
            <a href="{{ route('listings.show', $listing->slug) }}" class="transition-colors hover:text-primary-500">{{ $listing->title }}</a>
        </h3>

        <p class="mt-1.5 flex items-center gap-1 text-xs text-charcoal-500">
            <x-icon name="map-pin" class="size-3.5 shrink-0 text-charcoal-400"/>
            <span class="truncate">{{ $location }}</span>
        </p>

        @if ($listing->isProperty() && $listing->propertyDetail)
            <div class="mt-3 flex flex-wrap gap-x-4 gap-y-1 text-xs text-charcoal-600">
                @if ($listing->propertyDetail->land_area)
                    <span class="flex items-center gap-1"><x-icon name="ruler" class="size-3.5 text-primary-500"/> Tanah {{ number_format($listing->propertyDetail->land_area, 0, ',', '.') }} m²</span>
                @endif
                @if ($listing->propertyDetail->building_area)
                    <span class="flex items-center gap-1"><x-icon name="building" class="size-3.5 text-primary-500"/> Bangunan {{ number_format($listing->propertyDetail->building_area, 0, ',', '.') }} m²</span>
                @endif
                @if ($listing->propertyDetail->bedrooms)
                    <span class="flex items-center gap-1"><x-icon name="bed" class="size-3.5 text-primary-500"/> {{ $listing->propertyDetail->bedrooms }} KT</span>
                @endif
                @if ($listing->propertyDetail->bathrooms)
                    <span class="flex items-center gap-1"><x-icon name="bath" class="size-3.5 text-primary-500"/> {{ $listing->propertyDetail->bathrooms }} KM</span>
                @endif
                @if (! $listing->propertyDetail->land_area && ! $listing->propertyDetail->bedrooms)
                    <span class="text-charcoal-400">{{ $listing->propertyDetail->land_status ?? 'Lokasi strategis' }}</span>
                @endif
            </div>
        @elseif ($listing->isVehicle() && $listing->vehicleDetail)
            <div class="mt-3 flex flex-wrap gap-x-4 gap-y-1 text-xs text-charcoal-600">
                <span class="flex items-center gap-1"><x-icon name="calendar" class="size-3.5 text-primary-500"/> {{ $listing->vehicleDetail->year }}</span>
                <span class="flex items-center gap-1"><x-icon name="gauge" class="size-3.5 text-primary-500"/> {{ $listing->vehicleDetail->mileage_label }}</span>
                <span class="flex items-center gap-1"><x-icon name="settings" class="size-3.5 text-primary-500"/> {{ $listing->vehicleDetail->transmission }}</span>
                <span class="flex items-center gap-1"><x-icon name="fuel" class="size-3.5 text-primary-500"/> {{ $listing->vehicleDetail->fuel_type }}</span>
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between border-t border-gray-100 pt-3">
            <span class="text-[11px] font-semibold uppercase tracking-wide text-charcoal-400">
                {{ $listing->category->name }}
            </span>
            <a href="{{ route('listings.show', $listing->slug) }}" class="btn-primary btn-sm px-3.5!">
                Detail
            </a>
        </div>
    </div>
</article>
