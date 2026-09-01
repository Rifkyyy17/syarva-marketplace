<x-layouts.app>
    <x-slot:title>{{ $listing->title }}</x-slot:title>
    <x-slot:description>{{ \Illuminate\Support\Str::limit($listing->description, 160) }}</x-slot:description>
    <x-slot:image>{{ $listing->primaryImageUrl }}</x-slot:image>
    <x-slot:type>product</x-slot:type>

    @php
        $rawWa = $listing->user->whatsapp ?: $listing->user->phone ?: \App\Models\Setting::get('contact_whatsapp');
        $cleanWa = $rawWa ? preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $rawWa)) : null;
        $waText = 'Halo ' . $listing->user->name . ', saya tertarik dengan listing "' . $listing->title . '" seharga Rp ' . number_format((float) $listing->price, 0, ',', '.') . ' di ' . config('app.name') . '. Link: ' . url()->current() . ' . Apakah unit ini masih tersedia?';
        $waUrl = $cleanWa ? 'https://wa.me/' . $cleanWa . '?text=' . urlencode($waText) : null;
    @endphp

    @if (auth()->check() && auth()->user()->isAdmin())
        <div class="border-b border-amber-300 bg-amber-50/90 py-2.5 px-4">
            <div class="container-app flex flex-wrap items-center justify-between gap-3 text-xs">
                <div class="flex items-center gap-2 text-amber-900 font-semibold">
                    <span class="inline-flex size-2 rounded-full bg-amber-500 animate-pulse"></span>
                    <span>Admin Mode: Anda memiliki akses cepat untuk mengedit atau menghapus listing ini.</span>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.listings.edit', $listing) }}" class="inline-flex items-center gap-1.5 rounded-lg bg-slate-900 px-3 py-1.5 text-xs font-bold text-white hover:bg-slate-800 transition-all shadow-xs">
                        <x-icon name="pencil" class="size-3.5"/> Edit Listing &amp; Gambar
                    </a>
                    <a href="{{ route('admin.listings.show', $listing) }}" class="inline-flex items-center gap-1.5 rounded-lg border border-amber-400 bg-white px-3 py-1.5 text-xs font-bold text-amber-900 hover:bg-amber-100 transition-all">
                        <x-icon name="cog" class="size-3.5"/> Kelola di Admin
                    </a>
                    <form method="POST" action="{{ route('admin.listings.destroy', $listing) }}" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center gap-1.5 rounded-lg bg-red-600 px-3 py-1.5 text-xs font-bold text-white hover:bg-red-700 transition-all shadow-xs"
                                onclick="return confirm('Hapus listing ini dari marketplace?')">
                            <x-icon name="trash" class="size-3.5"/> Hapus Listing
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endif

    {{-- Breadcrumb & Title Header --}}
    <section class="border-b border-slate-200 bg-white py-6">
        <div class="container-app">
            <x-breadcrumb :items="[
                'Home' => route('home'),
                $listing->category->name => match ($listing->category->slug) {
                    'rumah' => route('listings.property', 'rumah'),
                    'tanah' => route('listings.property', 'tanah'),
                    'mobil-baru' => route('listings.vehicle', 'baru'),
                    'mobil-second' => route('listings.vehicle', 'second'),
                    default => route('listings.index'),
                },
                $listing->title => null,
            ]"/>

            <div class="mt-4 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <div class="flex flex-wrap items-center gap-2 mb-2">
                        <span class="badge border border-primary-200 bg-primary-50 text-primary-800 font-bold">
                            {{ $listing->category->name }}
                        </span>
                        @if ($listing->featured)
                            <span class="badge border border-amber-300 bg-amber-50 text-amber-800 font-bold flex items-center gap-1">
                                <x-icon name="star" class="size-3 text-amber-500"/> Unggulan
                            </span>
                        @endif
                        @if ($listing->isVehicle() && $listing->vehicleDetail)
                            <span class="badge border border-slate-200 bg-slate-100 text-slate-700">
                                {{ $listing->vehicleDetail->condition_label }}
                            </span>
                        @endif
                    </div>
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-charcoal-900">
                        {{ $listing->title }}
                    </h1>
                    <div class="mt-2.5 flex flex-wrap items-center gap-x-5 gap-y-2 text-xs sm:text-sm text-slate-500">
                        <span class="flex items-center gap-1.5 font-medium text-slate-700">
                            <x-icon name="map-pin" class="size-4 text-primary-600"/>
                            {{ $listing->location_full }}
                        </span>
                        <span class="flex items-center gap-1.5">
                            <x-icon name="eye" class="size-4 text-slate-400"/>
                            {{ number_format($listing->view_count, 0, ',', '.') }} dilihat
                        </span>
                        <span class="flex items-center gap-1.5">
                            <x-icon name="calendar" class="size-4 text-slate-400"/>
                            Diposting {{ $listing->created_at->diffForHumans() }}
                        </span>
                        <span class="inline-flex items-center gap-1 text-emerald-700 font-semibold">
                            <x-icon name="check-badge" class="size-4 text-emerald-600"/> Terverifikasi
                        </span>
                    </div>
                </div>

                {{-- Action buttons for header (Desktop & Mobile) --}}
                <div class="flex items-center gap-2 self-start lg:self-center mt-2 sm:mt-0">
                    <button type="button"
                            onclick="window.dispatchEvent(new CustomEvent('open-share-modal'))"
                            class="inline-flex items-center gap-1.5 sm:gap-2 rounded-xl border border-slate-200 bg-white px-3.5 sm:px-4 py-2 text-xs font-bold text-slate-700 hover:bg-slate-50 transition shadow-xs cursor-pointer active:scale-95">
                        <x-icon name="share" class="size-4 text-slate-500"/> Bagikan
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Content Section --}}
    <section class="container-app py-8 sm:py-10">
        <div class="grid gap-8 lg:grid-cols-[1fr_390px] items-start">
            {{-- Left Column: Gallery & Details --}}
            <div class="min-w-0 space-y-8">
                {{-- Image Gallery --}}
                <div x-data="gallery('{{ $listing->primaryImage?->url ?? '' }}')" class="rounded-3xl border border-slate-200 bg-white p-3 sm:p-4 shadow-sm overflow-hidden">
                    @php $images = $listing->images; @endphp
                    <div class="relative aspect-[16/10] sm:aspect-[16/9] w-full overflow-hidden rounded-2xl bg-slate-900/5 group">
                        <template x-if="current">
                            <img :src="current" alt="{{ $listing->title }}" class="size-full object-cover transition-transform duration-500 group-hover:scale-105">
                        </template>
                        <template x-if="!current">
                            <span class="grid size-full place-items-center text-slate-400 bg-slate-100">
                                <x-icon name="camera" class="size-16 opacity-40"/>
                            </span>
                        </template>
                        
                        {{-- Badges on Top of Photo --}}
                        <div class="absolute top-3 left-3 flex gap-2">
                            <span class="rounded-full bg-charcoal-900/80 px-3 py-1 text-xs font-bold text-white backdrop-blur-md">
                                {{ $listing->category->name }}
                            </span>
                        </div>

                        {{-- Photo Counter --}}
                        @if ($images->count() > 0)
                            <span class="absolute bottom-3 right-3 flex items-center gap-1.5 rounded-xl bg-charcoal-900/80 px-3 py-1.5 text-xs font-bold text-white backdrop-blur-md">
                                <x-icon name="camera" class="size-3.5 text-accent-400"/>
                                {{ $images->count() }} Foto
                            </span>
                        @endif
                    </div>

                    {{-- Thumbnail Strip --}}
                    @if ($images->count() > 1)
                        <div class="mt-3 flex gap-2.5 overflow-x-auto pb-1 pt-1 no-scrollbar">
                            @foreach ($images as $index => $image)
                                <button type="button"
                                        class="relative size-20 sm:size-24 shrink-0 overflow-hidden rounded-xl border-2 transition-all"
                                        :class="current === '{{ $image->url }}' ? 'border-primary-600 ring-2 ring-primary-500/30 scale-95' : 'border-slate-200 opacity-70 hover:opacity-100'"
                                        @click="set('{{ $image->url }}')"
                                        aria-label="Foto {{ $index + 1 }}">
                                    <img src="{{ $image->url }}" alt="" loading="lazy" class="size-full object-cover">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Key Spec Highlights Bar --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    @if ($listing->isVehicle() && $listing->vehicleDetail)
                        <div class="rounded-2xl border border-slate-200 bg-white p-3.5 text-center shadow-xs">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Tahun</span>
                            <p class="mt-1 text-sm sm:text-base font-extrabold text-charcoal-900">{{ $listing->vehicleDetail->year }}</p>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-white p-3.5 text-center shadow-xs">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Transmisi</span>
                            <p class="mt-1 text-sm sm:text-base font-extrabold text-charcoal-900">{{ $listing->vehicleDetail->transmission }}</p>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-white p-3.5 text-center shadow-xs">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Bahan Bakar</span>
                            <p class="mt-1 text-sm sm:text-base font-extrabold text-charcoal-900">{{ $listing->vehicleDetail->fuel_type }}</p>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-white p-3.5 text-center shadow-xs">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Jarak Tempuh</span>
                            <p class="mt-1 text-sm sm:text-base font-extrabold text-charcoal-900">{{ $listing->vehicleDetail->mileage_label }}</p>
                        </div>
                    @elseif ($listing->isProperty() && $listing->propertyDetail)
                        <div class="rounded-2xl border border-slate-200 bg-white p-3.5 text-center shadow-xs">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Luas Tanah</span>
                            <p class="mt-1 text-sm sm:text-base font-extrabold text-charcoal-900">{{ $listing->propertyDetail->land_area ? number_format($listing->propertyDetail->land_area, 0, ',', '.') . ' m²' : '-' }}</p>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-white p-3.5 text-center shadow-xs">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Luas Bangunan</span>
                            <p class="mt-1 text-sm sm:text-base font-extrabold text-charcoal-900">{{ $listing->propertyDetail->building_area ? number_format($listing->propertyDetail->building_area, 0, ',', '.') . ' m²' : '-' }}</p>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-white p-3.5 text-center shadow-xs">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Kamar Tidur</span>
                            <p class="mt-1 text-sm sm:text-base font-extrabold text-charcoal-900">{{ $listing->propertyDetail->bedrooms ?? '-' }} KT</p>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-white p-3.5 text-center shadow-xs">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Kamar Mandi</span>
                            <p class="mt-1 text-sm sm:text-base font-extrabold text-charcoal-900">{{ $listing->propertyDetail->bathrooms ?? '-' }} KM</p>
                        </div>
                    @endif
                </div>

                {{-- Deskripsi Unit --}}
                <div class="rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                    <div class="flex items-center gap-3 border-b border-slate-100 pb-4">
                        <span class="grid size-9 place-items-center rounded-xl bg-primary-100 text-primary-700">
                            <x-icon name="list" class="size-4.5"/>
                        </span>
                        <div>
                            <h2 class="text-lg font-extrabold text-slate-900">Deskripsi Lengkap</h2>
                            <p class="text-xs text-slate-500">Informasi detail mengenai unit listing ini.</p>
                        </div>
                    </div>
                    <div class="prose prose-slate mt-5 max-w-none text-sm leading-relaxed text-slate-700">
                        {!! nl2br(e($listing->description)) !!}
                    </div>
                </div>

                {{-- Spesifikasi Teknis (Properti) --}}
                @if ($listing->isProperty() && $listing->propertyDetail)
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                        <div class="flex items-center gap-3 border-b border-slate-100 pb-4">
                            <span class="grid size-9 place-items-center rounded-xl bg-emerald-100 text-emerald-700">
                                <x-icon name="building" class="size-4.5"/>
                            </span>
                            <div>
                                <h2 class="text-lg font-extrabold text-slate-900">Spesifikasi Properti</h2>
                                <p class="text-xs text-slate-500">Rincian luas, ruangan, dan legalitas dokumen.</p>
                            </div>
                        </div>

                        <dl class="mt-6 grid grid-cols-1 gap-3.5 sm:grid-cols-2 lg:grid-cols-3">
                            @if ($listing->propertyDetail->land_area)
                                <x-spec-item icon="ruler" label="Luas Tanah" :value="number_format($listing->propertyDetail->land_area, 0, ',', '.').' m²'"/>
                            @endif
                            @if ($listing->propertyDetail->building_area)
                                <x-spec-item icon="building" label="Luas Bangunan" :value="number_format($listing->propertyDetail->building_area, 0, ',', '.').' m²'"/>
                            @endif
                            @if ($listing->propertyDetail->bedrooms !== null)
                                <x-spec-item icon="bed" label="Kamar Tidur" :value="$listing->propertyDetail->bedrooms.' Ruang'"/>
                            @endif
                            @if ($listing->propertyDetail->bathrooms !== null)
                                <x-spec-item icon="bath" label="Kamar Mandi" :value="$listing->propertyDetail->bathrooms.' Ruang'"/>
                            @endif
                            @if ($listing->propertyDetail->garage)
                                <x-spec-item icon="car" label="Kapasitas Garasi" :value="$listing->propertyDetail->garage.' Mobil'"/>
                            @endif
                            @if ($listing->propertyDetail->floors)
                                <x-spec-item icon="layers" label="Jumlah Lantai" :value="$listing->propertyDetail->floors.' Lantai'"/>
                            @endif
                            @if ($listing->propertyDetail->certificate)
                                <x-spec-item icon="shield" label="Legalitas Sertifikat" :value="$listing->propertyDetail->certificate"/>
                            @endif
                            @if ($listing->propertyDetail->land_status)
                                <x-spec-item icon="map" label="Status Tanah" :value="$listing->propertyDetail->land_status"/>
                            @endif
                            @if ($listing->propertyDetail->building_status)
                                <x-spec-item icon="home" label="Status Bangunan" :value="$listing->propertyDetail->building_status"/>
                            @endif
                        </dl>

                        @if (! empty($listing->propertyDetail->facilities))
                            <div class="mt-8 border-t border-slate-100 pt-6">
                                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Fasilitas &amp; Fitur Tambahan</h3>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($listing->propertyDetail->facilities as $facility)
                                        <span class="inline-flex items-center gap-1.5 rounded-xl border border-emerald-200 bg-emerald-50/80 px-3 py-1.5 text-xs font-bold text-emerald-800">
                                            <x-icon name="check" class="size-3.5 text-emerald-600"/> {{ $facility }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                {{-- Spesifikasi Teknis (Kendaraan) --}}
                @if ($listing->isVehicle() && $listing->vehicleDetail)
                    @php
                        $isHonda = $listing->category->slug === 'mobil-baru'
                            || str_contains(strtolower($listing->title), 'honda')
                            || str_contains(strtolower($listing->vehicleDetail->brand ?? ''), 'honda');
                    @endphp

                    @if ($isHonda)
                        <x-honda-spec-table :listing="$listing"/>
                    @else
                        <div class="rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                            <div class="flex items-center gap-3 border-b border-slate-100 pb-4">
                                <span class="grid size-9 place-items-center rounded-xl bg-primary-100 text-primary-700">
                                    <x-icon name="car-front" class="size-4.5"/>
                                </span>
                                <div>
                                    <h2 class="text-lg font-extrabold text-slate-900">Spesifikasi Kendaraan</h2>
                                    <p class="text-xs text-slate-500">Rincian teknis, transmisi, dan kondisi fisik kendaraan.</p>
                                </div>
                            </div>

                            <dl class="mt-6 grid grid-cols-1 gap-3.5 sm:grid-cols-2 lg:grid-cols-3">
                                <x-spec-item icon="car-front" label="Merk / Brand" :value="$listing->vehicleDetail->brand"/>
                                <x-spec-item icon="car-back" label="Model / Tipe" :value="$listing->vehicleDetail->model"/>
                                <x-spec-item icon="calendar" label="Tahun Pembuatan" :value="$listing->vehicleDetail->year"/>
                                <x-spec-item icon="gauge" label="Jarak Tempuh" :value="$listing->vehicleDetail->mileage_label"/>
                                <x-spec-item icon="settings" label="Transmisi" :value="$listing->vehicleDetail->transmission"/>
                                <x-spec-item icon="fuel" label="Bahan Bakar" :value="$listing->vehicleDetail->fuel_type"/>
                                <x-spec-item icon="palette" label="Warna Unit" :value="$listing->vehicleDetail->color"/>
                                <x-spec-item icon="check-badge" label="Kondisi Fisik" :value="$listing->vehicleDetail->condition_label"/>
                                @if ($listing->vehicleDetail->engine_capacity)
                                    <x-spec-item icon="gauge" label="Kapasitas Mesin" :value="$listing->vehicleDetail->engine_capacity"/>
                                @endif
                                @if ($listing->vehicleDetail->license_plate)
                                    <x-spec-item icon="tag" label="Plat Nomor" :value="$listing->vehicleDetail->license_plate"/>
                                @endif
                            </dl>
                        </div>
                    @endif

                    {{-- Penawaran Eksklusif & Fitur Honda --}}
                    @if ($listing->vehicleDetail->promo_package || $listing->vehicleDetail->warranty_info || $listing->vehicleDetail->brochure_url || !empty($listing->vehicleDetail->honda_features) || $listing->vehicleDetail->bonus_accessories)
                        <div class="rounded-3xl border border-primary-200 bg-gradient-to-br from-primary-50/40 via-white to-white p-6 sm:p-8 shadow-xs">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-primary-100 pb-5">
                                <div>
                                    <span class="inline-flex items-center gap-1 rounded-full bg-primary-100 px-3 py-1 text-xs font-bold text-primary-800">
                                        <x-icon name="sparkles" class="size-3.5 text-primary-600"/> Penawaran Spesial Dealer
                                    </span>
                                    <h2 class="mt-2 text-xl font-extrabold text-slate-900">Promo, Garansi &amp; Keunggulan</h2>
                                </div>
                                @if ($listing->vehicleDetail->brochure_url)
                                    <a href="{{ $listing->vehicleDetail->brochure_url }}" target="_blank" rel="noopener"
                                       class="btn-outline btn-sm !border-primary-300 !text-primary-700 hover:!bg-primary-50 self-start sm:self-auto">
                                        <x-icon name="external" class="size-3.5"/> Unduh E-Brochure PDF
                                    </a>
                                @endif
                            </div>

                            <div class="mt-6 space-y-4 text-xs">
                                @if ($listing->vehicleDetail->promo_package)
                                    <div class="rounded-2xl bg-white p-4 sm:p-5 border border-primary-100 shadow-xs">
                                        <p class="font-extrabold text-slate-900 text-sm flex items-center gap-2">
                                            <x-icon name="wallet" class="size-4.5 text-primary-700"/> Paket Promo Kredit &amp; DP Ringan
                                        </p>
                                        <p class="mt-2 text-slate-700 leading-relaxed whitespace-pre-line">{{ $listing->vehicleDetail->promo_package }}</p>
                                    </div>
                                @endif

                                @if ($listing->vehicleDetail->warranty_info)
                                    <div class="rounded-2xl bg-white p-4 sm:p-5 border border-primary-100 shadow-xs">
                                        <p class="font-extrabold text-slate-900 text-sm flex items-center gap-2">
                                            <x-icon name="shield" class="size-4.5 text-emerald-600"/> Garansi &amp; Layanan Purna Jual Resmi
                                        </p>
                                        <p class="mt-2 text-slate-700 leading-relaxed">{{ $listing->vehicleDetail->warranty_info }}</p>
                                    </div>
                                @endif

                                @if ($listing->vehicleDetail->color_options)
                                    <div class="rounded-2xl bg-white p-4 sm:p-5 border border-primary-100 shadow-xs">
                                        <p class="font-extrabold text-slate-900 text-sm flex items-center gap-2">
                                            <x-icon name="palette" class="size-4.5 text-amber-600"/> Pilihan Warna Tersedia
                                        </p>
                                        <p class="mt-2 text-slate-700 leading-relaxed">{{ $listing->vehicleDetail->color_options }}</p>
                                    </div>
                                @endif

                                @if ($listing->vehicleDetail->bonus_accessories)
                                    <div class="rounded-2xl bg-white p-4 sm:p-5 border border-primary-100 shadow-xs">
                                        <p class="font-extrabold text-slate-900 text-sm flex items-center gap-2">
                                            <x-icon name="sparkles" class="size-4.5 text-primary-600"/> Bonus Pembelian &amp; Aksesoris Tambahan
                                        </p>
                                        <p class="mt-2 text-slate-700 leading-relaxed whitespace-pre-line">{{ $listing->vehicleDetail->bonus_accessories }}</p>
                                    </div>
                                @endif

                                @if (!empty($listing->vehicleDetail->honda_features))
                                    <div class="mt-6 border-t border-primary-100 pt-5">
                                        <p class="font-extrabold text-slate-900 text-sm mb-3">Fitur Keselamatan &amp; Honda Sensing</p>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach ($listing->vehicleDetail->honda_features as $hf)
                                                <span class="inline-flex items-center gap-1.5 rounded-xl border border-primary-200 bg-white px-3 py-1.5 text-xs font-bold text-primary-900 shadow-2xs">
                                                    <x-icon name="check" class="size-3.5 text-primary-600"/> {{ $hf }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                @endif
            </div>

            {{-- Right Column: Sticky Booking & Direct Deal Sidebar --}}
            <aside class="space-y-5 lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-3xl border border-slate-200 bg-white shadow-sm overflow-hidden">
                    {{-- Header Card (Obsidian Showroom Slate) --}}
                    <div class="relative overflow-hidden bg-[#090e1a] p-6 text-white">
                        <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Harga Penawaran</p>
                        <p class="mt-1.5 text-3xl sm:text-4xl font-black tracking-tight text-white">
                            Rp {{ number_format((float) $listing->price, 0, ',', '.') }}
                        </p>
                        @if ($listing->isVehicle())
                            <p class="mt-2 text-xs font-medium text-slate-400">
                                {{ $listing->vehicleDetail->condition_label }} &bull; {{ $listing->vehicleDetail->brand }} {{ $listing->vehicleDetail->model }}
                            </p>
                        @else
                            <p class="mt-2 text-xs font-medium text-slate-400">
                                {{ $listing->propertyDetail->certificate ?? 'Sertifikat Aman' }} &bull; {{ $listing->location_label }}
                            </p>
                        @endif
                    </div>

                    <div class="p-6 space-y-6">
                        {{-- Seller Profile Badge --}}
                        <div class="flex items-center gap-3.5 rounded-2xl bg-slate-50 p-4 border border-slate-100">
                            <span class="grid size-12 shrink-0 place-items-center overflow-hidden rounded-2xl bg-slate-900 text-lg font-bold text-white shadow-xs">
                                @if ($listing->user->avatar)
                                    <img src="{{ Storage::disk('public')->url($listing->user->avatar) }}" alt="" class="size-full object-cover">
                                @else
                                    {{ strtoupper(substr($listing->user->name, 0, 1)) }}
                                @endif
                            </span>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center gap-1.5">
                                    <p class="truncate text-sm font-extrabold text-slate-900">{{ $listing->user->name }}</p>
                                    <x-icon name="check-badge" class="size-4 text-red-600 shrink-0"/>
                                </div>
                                <p class="text-xs text-slate-500">Sales / Penjual Terverifikasi</p>
                                <p class="mt-0.5 text-[11px] font-semibold text-emerald-600 flex items-center gap-1">
                                    <span class="size-1.5 rounded-full bg-emerald-500"></span> Respon Cepat &bull; Siap Konsultasi
                                </p>
                            </div>
                        </div>

                        {{-- Primary Actions: WhatsApp & Call --}}
                        <div class="space-y-3">
                            @if ($waUrl)
                                <a href="{{ $waUrl }}"
                                   target="_blank" rel="noopener"
                                   class="btn-whatsapp w-full !py-3.5 !rounded-2xl justify-center text-center shadow-sm">
                                    <x-icon name="whatsapp" class="size-5"/>
                                    <div class="text-left">
                                        <p class="text-sm font-bold leading-tight">Chat WhatsApp Sales</p>
                                        <p class="text-[11px] font-normal text-emerald-100">Tanya unit, simulasi kredit &amp; OTR</p>
                                    </div>
                                </a>
                            @endif

                            @if ($listing->user->phone)
                                <a href="tel:{{ $listing->user->phone }}" class="flex items-center justify-center gap-2.5 w-full rounded-2xl border border-slate-200 bg-white py-2.5 px-4 text-xs font-bold text-slate-700 hover:bg-slate-50 hover:border-slate-300 transition">
                                    <x-icon name="phone" class="size-4 text-slate-600"/> Hubungi Telepon: {{ $listing->user->phone }}
                                </a>
                            @endif
                        </div>

                        {{-- Trust Guarantee Note --}}
                        <div class="rounded-2xl bg-slate-50 p-3.5 text-center border border-slate-100">
                            <p class="text-[11px] font-bold text-slate-900 flex items-center justify-center gap-1.5">
                                <x-icon name="shield" class="size-3.5 text-slate-700"/> Listing &amp; Harga Terverifikasi
                            </p>
                            <p class="mt-0.5 text-[10px] text-slate-500">Bebas markup &bull; Terhubung langsung ke sales resmi</p>
                        </div>
                    </div>
                </div>
            </aside>

        </div>
    </section>

    {{-- Related Listings Section --}}
    @if ($related->isNotEmpty())
        <section class="border-t border-slate-200 bg-slate-50/50 py-12 pb-24 lg:pb-12">
            <div class="container-app">
                <x-section-title
                    eyebrow="Rekomendasi Lainnya"
                    title="Listing Serupa yang Mungkin Anda Sukai"
                    description="Pilihan alternatif terbaik dengan kategori dan kriteria sejenis."
                />
                <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($related as $item)
                        <x-listing-card :listing="$item"/>
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <div class="h-20 lg:hidden"></div>
    @endif

    {{-- Sticky Floating Contact Bar for Mobile --}}
    <div class="fixed bottom-0 inset-x-0 z-40 border-t border-slate-200 bg-white/95 backdrop-blur-md p-3 shadow-2xl lg:hidden">
        <div class="container-app flex items-center justify-between gap-3">
            <div class="min-w-0 flex-1">
                <p class="text-[11px] font-medium text-slate-500 truncate">{{ $listing->title }}</p>
                <p class="text-base font-extrabold text-charcoal-900 leading-tight">Rp {{ number_format((float) $listing->price, 0, ',', '.') }}</p>
            </div>
            <div class="flex items-center gap-2 shrink-0">
                <button type="button"
                        onclick="window.dispatchEvent(new CustomEvent('open-share-modal'))"
                        class="grid size-10 place-items-center rounded-xl border border-slate-200 bg-white text-slate-700 shadow-xs active:scale-95"
                        title="Bagikan">
                    <x-icon name="share" class="size-4 text-slate-600"/>
                </button>
                @if ($waUrl)
                    <a href="{{ $waUrl }}" target="_blank" rel="noopener"
                       class="flex items-center gap-2 rounded-xl bg-[#25D366] hover:bg-[#1EBE5D] py-2.5 px-4 text-xs font-extrabold text-white shadow-md">
                        <x-icon name="whatsapp" class="size-4 text-white"/> WhatsApp
                    </a>
                @endif
                @if ($listing->user->phone)
                    <a href="tel:{{ $listing->user->phone }}" class="grid size-10 place-items-center rounded-xl border border-slate-200 bg-white text-slate-700 shadow-xs">
                        <x-icon name="phone" class="size-4 text-primary-700"/>
                    </a>
                @endif
            </div>
        </div>
    </div>

    {{-- Interactive Share Modal Dialog --}}
    <div x-data="{
            open: false,
            copied: false,
            url: window.location.href,
            title: '{{ addslashes($listing->title) }}',
            openModal() {
                this.url = window.location.href;
                this.open = true;
            },
            copyLink() {
                const text = this.url;
                if (navigator.clipboard && window.isSecureContext) {
                    navigator.clipboard.writeText(text).then(() => {
                        this.onCopied();
                    }).catch(() => {
                        this.fallbackCopy(text);
                    });
                } else {
                    this.fallbackCopy(text);
                }
            },
            fallbackCopy(text) {
                const ta = document.createElement('textarea');
                ta.value = text;
                ta.style.position = 'fixed';
                ta.style.left = '-9999px';
                ta.style.opacity = '0';
                document.body.appendChild(ta);
                ta.focus();
                ta.select();
                try {
                    document.execCommand('copy');
                    this.onCopied();
                } catch (err) {
                    if (window.__toast) window.__toast('Silakan salin manual tautan di atas', 'info');
                }
                document.body.removeChild(ta);
            },
            onCopied() {
                this.copied = true;
                if (window.__toast) window.__toast('Tautan berhasil disalin ke clipboard!', 'success');
                setTimeout(() => this.copied = false, 3000);
            }
         }"
         @open-share-modal.window="open = true"
         x-show="open"
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs">

        <div @click.outside="open = false"
             x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95 translate-y-2"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-2"
             class="w-full max-w-md overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl">

            {{-- Modal Header --}}
            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-4">
                <div class="flex items-center gap-2.5">
                    <span class="grid size-9 place-items-center rounded-xl bg-primary-50 text-primary-600">
                        <x-icon name="share" class="size-4.5"/>
                    </span>
                    <h3 class="text-base font-extrabold text-slate-900">Bagikan Listing Ini</h3>
                </div>
                <button type="button" @click="open = false" class="rounded-xl p-1.5 text-slate-400 hover:bg-slate-100 hover:text-slate-700 transition" aria-label="Tutup">
                    <x-icon name="x" class="size-5"/>
                </button>
            </div>

            <div class="p-6 space-y-5">
                {{-- Preview Snippet Card --}}
                <div class="flex items-center gap-3 rounded-2xl border border-slate-100 bg-slate-50/80 p-3">
                    @if ($listing->primaryImageUrl)
                        <img src="{{ $listing->primaryImageUrl }}" alt="{{ $listing->title }}" onerror="this.onerror=null;this.src='{{ asset('images/placeholder.svg') }}';" class="size-14 rounded-xl object-cover bg-slate-200 shrink-0">
                    @else
                        <div class="size-14 rounded-xl bg-slate-200 grid place-items-center shrink-0">
                            <x-icon name="image" class="size-6 text-slate-400"/>
                        </div>
                    @endif
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-xs font-bold text-slate-900">{{ $listing->title }}</p>
                        <p class="text-xs font-extrabold text-primary-600 mt-0.5">Rp {{ number_format((float) $listing->price, 0, ',', '.') }}</p>
                    </div>
                </div>

                {{-- Social Share Grid --}}
                <div>
                    <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-3">Pilih Media Sosial:</p>
                    <div class="grid grid-cols-4 gap-2.5 text-center">
                        {{-- WhatsApp --}}
                        <a :href="'https://api.whatsapp.com/send?text=' + encodeURIComponent('Lihat listing ' + title + ' di SYARVA: ' + url)"
                           target="_blank" rel="noopener"
                           class="flex flex-col items-center justify-center gap-1.5 rounded-2xl border border-emerald-100 bg-emerald-50/60 p-3 text-emerald-700 hover:bg-emerald-100 hover:scale-105 transition shadow-xs">
                            <span class="grid size-10 place-items-center rounded-xl bg-[#25D366] text-white shadow-xs">
                                <x-icon name="whatsapp" class="size-5.5 text-white"/>
                            </span>
                            <span class="text-[11px] font-bold">WhatsApp</span>
                        </a>

                        {{-- Facebook --}}
                        <a :href="'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url)"
                           target="_blank" rel="noopener"
                           class="flex flex-col items-center justify-center gap-1.5 rounded-2xl border border-blue-100 bg-blue-50/60 p-3 text-blue-700 hover:bg-blue-100 hover:scale-105 transition shadow-xs">
                            <span class="grid size-10 place-items-center rounded-xl bg-[#1877F2] text-white shadow-xs">
                                <svg viewBox="0 0 24 24" class="size-5 fill-current"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </span>
                            <span class="text-[11px] font-bold">Facebook</span>
                        </a>

                        {{-- Telegram --}}
                        <a :href="'https://t.me/share/url?url=' + encodeURIComponent(url) + '&text=' + encodeURIComponent(title)"
                           target="_blank" rel="noopener"
                           class="flex flex-col items-center justify-center gap-1.5 rounded-2xl border border-sky-100 bg-sky-50/60 p-3 text-sky-700 hover:bg-sky-100 hover:scale-105 transition shadow-xs">
                            <span class="grid size-10 place-items-center rounded-xl bg-[#229ED9] text-white shadow-xs">
                                <svg viewBox="0 0 24 24" class="size-5 fill-current"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.121l-6.871 4.326-2.962-.924c-.643-.204-.657-.643.136-.953l11.57-4.461c.537-.194 1.006.131.832.942z"/></svg>
                            </span>
                            <span class="text-[11px] font-bold">Telegram</span>
                        </a>

                        {{-- Twitter / X --}}
                        <a :href="'https://twitter.com/intent/tweet?text=' + encodeURIComponent(title) + '&url=' + encodeURIComponent(url)"
                           target="_blank" rel="noopener"
                           class="flex flex-col items-center justify-center gap-1.5 rounded-2xl border border-slate-200 bg-slate-50/60 p-3 text-slate-700 hover:bg-slate-100 hover:scale-105 transition shadow-xs">
                            <span class="grid size-10 place-items-center rounded-xl bg-slate-900 text-white shadow-xs">
                                <svg viewBox="0 0 24 24" class="size-4.5 fill-current"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </span>
                            <span class="text-[11px] font-bold">Twitter (X)</span>
                        </a>
                    </div>
                </div>

                {{-- Copy Link Box --}}
                <div>
                    <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">Atau Salin Tautan:</p>
                    <div class="flex items-center gap-2 rounded-2xl border border-slate-200 bg-slate-50 p-1.5 pl-3.5 focus-within:border-primary-500 focus-within:bg-white focus-within:ring-1 focus-within:ring-primary-500 transition">
                        <input type="text" readonly :value="url" class="min-w-0 flex-1 bg-transparent text-xs text-slate-600 focus:outline-none select-all font-mono truncate">
                        <button type="button"
                                @click="copyLink()"
                                class="inline-flex items-center gap-1.5 rounded-xl px-4 py-2 text-xs font-extrabold text-white transition active:scale-95 shadow-xs shrink-0"
                                :class="copied ? 'bg-emerald-600 hover:bg-emerald-700' : 'bg-primary-700 hover:bg-primary-800'">
                            <template x-if="!copied">
                                <span class="inline-flex items-center gap-1">
                                    <x-icon name="copy" class="size-3.5"/> Salin
                                </span>
                            </template>
                            <template x-if="copied">
                                <span class="inline-flex items-center gap-1">
                                    <x-icon name="check" class="size-3.5"/> Tersalin!
                                </span>
                            </template>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>