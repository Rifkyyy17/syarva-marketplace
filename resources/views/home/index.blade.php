@php
    $announcement = \App\Models\Setting::get('site_announcement');
    $whatsapp = \App\Models\Setting::get('contact_whatsapp', '6281234567890');
@endphp

<x-layouts.app>
    <x-slot:title>Home</x-slot:title>
    <x-slot:description>{{ \App\Models\Setting::get('site_tagline') }}</x-slot:description>

    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-[#0a1626] text-white border-b border-white/10">
        {{-- Subtle Ambient Radial Highlight --}}
        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_60%_50%_at_50%_-10%,rgba(37,99,235,0.2),rgba(10,22,38,0))]"></div>

        <div class="container-app relative py-14 sm:py-20 lg:py-24">
            <div class="grid items-center gap-12 lg:grid-cols-12">
                {{-- Hero Copy --}}
                <div class="lg:col-span-7">
                    <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/[0.04] px-3.5 py-1 text-xs font-semibold text-slate-300 backdrop-blur-sm">
                        <span class="size-2 rounded-full bg-red-500 animate-pulse"></span>
                        Honda Certified Sales &bull; Properti Pilihan
                    </div>

                    <h1 class="mt-5 text-3xl font-black leading-[1.1] tracking-[-0.03em] text-white sm:text-5xl lg:text-5.5xl">
                        Katalog Resmi
                        <span class="text-red-500">Honda Baru</span>
                        &amp; Properti Terpercaya
                    </h1>

                    <p class="mt-4 max-w-xl text-sm leading-relaxed text-slate-400 sm:text-base">
                        Ekosistem jual beli mobil Honda bergaransi resmi, taksasi mobil bekas transparan, serta listing rumah dan tanah berlegalitas aman langsung bersama sales konsultan kami.
                    </p>

                    {{-- Quick Search Dock --}}
                    <div class="mt-8 rounded-2xl border border-white/10 bg-white/[0.04] p-3 backdrop-blur-md">
                        <form action="{{ route('listings.index') }}" method="GET" class="flex flex-col gap-2 sm:flex-row sm:items-center">
                            <div class="relative flex-1">
                                <x-icon name="search" class="absolute left-3.5 top-1/2 -translate-y-1/2 size-4 text-slate-400"/>
                                <input type="text" name="q" placeholder="Cari Honda HR-V, CR-V, Brio, Rumah Bogor..."
                                       class="w-full rounded-xl border border-white/10 bg-white/[0.06] py-2.5 pl-10 pr-3 text-xs sm:text-sm text-white placeholder:text-slate-500 focus:border-white/30 focus:bg-white/10 focus:outline-none focus:ring-1 focus:ring-white/20">
                            </div>

                            <select name="type" class="rounded-xl border border-white/10 bg-slate-900 py-2.5 px-3 text-xs sm:text-sm text-slate-300 focus:border-white/30 focus:outline-none">
                                <option value="">Semua Tipe</option>
                                <option value="vehicle">Mobil (Honda &amp; Bekas)</option>
                                <option value="property">Properti (Rumah &amp; Tanah)</option>
                            </select>

                            <button type="submit" class="btn-honda btn-md shrink-0 !py-2.5 justify-center">
                                <span>Cari Unit</span>
                                <x-icon name="arrow-right" class="size-4"/>
                            </button>
                        </form>
                    </div>

                    {{-- Direct Action Links & Stats --}}
                    <div class="mt-6 flex flex-wrap items-center gap-3">
                        <a href="{{ route('listings.vehicle', 'baru') }}" class="btn-white btn-sm">
                            <x-icon name="car-front" class="size-4 text-red-600"/>
                            Promo Honda Baru
                        </a>
                        <a href="https://wa.me/{{ $whatsapp }}?text={{ urlencode('Halo Sales SYARVA, saya ingin konsultasi promo dan simulasi DP Honda.') }}"
                           target="_blank" rel="noopener" class="btn-whatsapp btn-sm">
                            <x-icon name="whatsapp" class="size-4"/>
                            Chat WhatsApp Sales
                        </a>
                    </div>

                    <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-2 text-xs text-slate-400 border-t border-white/[0.08] pt-5">
                        <span class="flex items-center gap-2">
                            <strong class="font-black text-white text-sm">{{ number_format($stats['listings'], 0, ',', '.') }}</strong>
                            <span class="text-slate-400">Listing Aktif</span>
                        </span>
                        <span class="text-slate-600">&bull;</span>
                        <span class="flex items-center gap-2">
                            <strong class="font-black text-white text-sm">{{ number_format($stats['cities'], 0, ',', '.') }}</strong>
                            <span class="text-slate-400">Kota Terjangkau</span>
                        </span>
                        <span class="text-slate-600">&bull;</span>
                        <span class="inline-flex items-center gap-1 font-semibold text-emerald-400">
                            <x-icon name="check-badge" class="size-4"/>
                            <span>100% Terverifikasi</span>
                        </span>
                    </div>
                </div>

                {{-- Hero Visual (Showroom Preview) --}}
                <div class="lg:col-span-5">
                    <div class="relative rounded-2xl border border-white/10 bg-white/[0.03] p-2.5 shadow-2xl backdrop-blur-sm">
                        <div class="relative overflow-hidden rounded-xl bg-slate-900 aspect-[16/11]">
                            @php
                                $heroUnit = $featured->filter->isVehicle()->first() ?? $featured->first();
                            @endphp

                            @if ($heroUnit && $heroUnit->primaryImageUrl)
                                <img src="{{ $heroUnit->primaryImageUrl }}" alt="{{ $heroUnit->title }}"
                                     class="size-full object-cover transition-transform duration-700 hover:scale-105"/>
                            @else
                                <div class="grid size-full place-items-center bg-slate-900 text-slate-700">
                                    <x-icon name="car-front" class="size-20"/>
                                </div>
                            @endif

                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-transparent to-transparent"></div>

                            <div class="absolute bottom-3.5 left-3.5 right-3.5 flex items-end justify-between gap-3">
                                <div>
                                    <span class="inline-block rounded-md bg-red-600 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider text-white">
                                        Showroom Unit
                                    </span>
                                    <p class="mt-1 text-sm font-bold text-white line-clamp-1">
                                        {{ $heroUnit?->title ?? 'Honda All New Series' }}
                                    </p>
                                    @if ($heroUnit)
                                        <p class="text-xs font-black text-red-400">
                                            Rp {{ number_format((float) $heroUnit->price, 0, ',', '.') }}
                                        </p>
                                    @endif
                                </div>
                                @if ($heroUnit)
                                    <a href="{{ route('listings.show', $heroUnit->slug) }}" class="btn-white btn-xs shrink-0">
                                        Lihat Unit
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($announcement)
        <div class="border-b border-amber-200/60 bg-amber-50">
            <div class="container-app flex items-center justify-center gap-2 py-2.5 text-xs sm:text-sm font-medium text-amber-900">
                <x-icon name="info" class="size-4 shrink-0 text-amber-600"/>
                <span>{{ $announcement }}</span>
            </div>
        </div>
    @endif

    {{-- Kategori Section --}}
    <section class="container-app py-12 sm:py-16">
        <x-section-title
            eyebrow="Eksplorasi Katalog"
            title="Kategori Pilihan"
            description="Pilih kategori kendaraan Honda atau aset properti yang ingin Anda telusuri."
        />

        <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($categories as $category)
                <x-category-card
                    :category="$category"
                    :count="$category->listings_count"
                    :url="match ($category->slug) {
                        'rumah' => route('listings.property', 'rumah'),
                        'tanah' => route('listings.property', 'tanah'),
                        'mobil-baru' => route('listings.vehicle', 'baru'),
                        'mobil-second' => route('listings.vehicle', 'second'),
                        default => route('listings.index'),
                    }"
                />
            @endforeach
        </div>
    </section>

    {{-- Pilihan Unggulan Section --}}
    <section class="border-y border-slate-200/80 bg-slate-50/70 py-12 sm:py-16">
        <div class="container-app">
            <x-section-title
                eyebrow="Unit Rekomendasi"
                title="Pilihan Unggulan Showroom"
                description="Koleksi unit dengan penawaran terbaik dan siap serah terima."
                :link="route('listings.index', ['featured' => 1])"
                link-label="Lihat Semua Unggulan"
            />

            @if ($featured->isNotEmpty())
                <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($featured as $listing)
                        <x-listing-card :listing="$listing"/>
                    @endforeach
                </div>
            @else
                <x-empty-state title="Belum ada listing unggulan" message="Listing unggulan akan tampil di sini." class="mt-8"/>
            @endif
        </div>
    </section>

    {{-- Asymmetric Dual Service Hub (Otomotif & Properti) --}}
    <section class="border-b border-white/10 bg-[#0a1626] py-14 sm:py-20 text-white">
        <div class="container-app">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <span class="text-[10px] font-bold uppercase tracking-[0.08em] text-slate-400">Layanan Spesialis</span>
                    <h2 class="mt-1 text-2xl font-extrabold tracking-tight text-white sm:text-3xl">Ekosistem Otomotif &amp; Properti Terpadu</h2>
                    <p class="mt-1.5 text-xs sm:text-sm text-slate-400">Solusi terintegrasi untuk kebutuhan jual beli mobil Honda dan investasi aset properti Anda.</p>
                </div>
                <a href="https://wa.me/{{ $whatsapp }}?text={{ urlencode('Halo Sales SYARVA, saya butuh konsultasi layanan.') }}"
                   target="_blank" rel="noopener" class="btn-whatsapp btn-sm shrink-0 self-start sm:self-auto">
                    <x-icon name="whatsapp" class="size-4"/>
                    <span>Konsultasi Semua Layanan</span>
                </a>
            </div>

            <div class="mt-10 grid gap-6 lg:grid-cols-3">
                {{-- Card 1: Jual Mobil Bekas --}}
                <div class="group flex flex-col justify-between rounded-2xl border border-white/10 bg-white/[0.04] p-6 sm:p-7 transition-all duration-300 hover:border-amber-400/40 hover:bg-white/[0.06]">
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="grid size-11 place-items-center rounded-xl border border-amber-500/20 bg-amber-500/10 text-amber-400">
                                <x-icon name="car-back" class="size-5"/>
                            </span>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-amber-400">Tukar Tambah</span>
                        </div>
                        <h3 class="mt-5 text-base sm:text-lg font-bold text-white">Taksasi &amp; Jual Mobil Bekas</h3>
                        <p class="mt-2 text-xs leading-relaxed text-slate-400">
                            Dapatkan penawaran harga objektif dan cepat untuk mobil bekas merek apapun dengan proses transparan dan opsi tukar tambah ke Honda baru.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-white/[0.08] flex items-center justify-between">
                        <a href="{{ route('pages.sell-car') }}" class="text-xs font-bold text-amber-400 hover:text-amber-300 flex items-center gap-1">
                            Isi Form Taksasi <x-icon name="arrow-right" class="size-3.5"/>
                        </a>
                        <span class="text-[11px] text-slate-500">Multi-Brand</span>
                    </div>
                </div>

                {{-- Card 2: Konsultasi Properti --}}
                <div class="group flex flex-col justify-between rounded-2xl border border-white/10 bg-white/[0.04] p-6 sm:p-7 transition-all duration-300 hover:border-emerald-400/40 hover:bg-white/[0.06]">
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="grid size-11 place-items-center rounded-xl border border-emerald-500/20 bg-emerald-500/10 text-emerald-400">
                                <x-icon name="building" class="size-5"/>
                            </span>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-400">Legalitas Aman</span>
                        </div>
                        <h3 class="mt-5 text-base sm:text-lg font-bold text-white">Konsultasi Titip Jual Properti</h3>
                        <p class="mt-2 text-xs leading-relaxed text-slate-400">
                            Titip jual rumah tinggal, ruko, atau kavling tanah SHM Anda. Kami bantu verifikasi legalitas, dokumentasi visual, dan pemasaran ke calon pembeli terverifikasi.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-white/[0.08] flex items-center justify-between">
                        <a href="{{ route('pages.property') }}" class="text-xs font-bold text-emerald-400 hover:text-emerald-300 flex items-center gap-1">
                            Konsultasi Properti <x-icon name="arrow-right" class="size-3.5"/>
                        </a>
                        <span class="text-[11px] text-slate-500">Rumah &amp; Tanah</span>
                    </div>
                </div>

                {{-- Card 3: Booking Test Drive Honda --}}
                <div class="group flex flex-col justify-between rounded-2xl border border-white/10 bg-white/[0.04] p-6 sm:p-7 transition-all duration-300 hover:border-red-500/40 hover:bg-white/[0.06]">
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="grid size-11 place-items-center rounded-xl border border-red-500/20 bg-red-500/10 text-red-500">
                                <x-icon name="car-front" class="size-5"/>
                            </span>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-red-400">Official Dealer</span>
                        </div>
                        <h3 class="mt-5 text-base sm:text-lg font-bold text-white">Booking Test Drive Honda</h3>
                        <p class="mt-2 text-xs leading-relaxed text-slate-400">
                            Rasakan kenyamanan berkendara Honda impian Anda langsung dari showroom resmi atau layanan test drive ke lokasi Anda.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-white/[0.08] flex items-center justify-between">
                        <a href="https://wa.me/{{ $whatsapp }}?text={{ urlencode('Halo Admin, saya ingin jadwal booking test drive unit Honda.') }}"
                           target="_blank" rel="noopener" class="text-xs font-bold text-red-400 hover:text-red-300 flex items-center gap-1">
                            Pesan Jadwal Drive <x-icon name="arrow-right" class="size-3.5"/>
                        </a>
                        <span class="text-[11px] text-slate-500">Gratis &bull; Mudah</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Listing Terbaru Section --}}
    <section class="container-app py-12 sm:py-16">
        <x-section-title
            eyebrow="Update Terkini"
            title="Listing Terbaru"
            description="Katalog unit kendaraan dan properti terbaru yang siap Anda tinjau."
            :link="route('listings.index')"
            link-label="Lihat Semua Listing"
        />

        @if ($latest->isNotEmpty())
            <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($latest as $listing)
                    <x-listing-card :listing="$listing"/>
                @endforeach
            </div>
        @else
            <x-empty-state title="Belum ada listing" message="Listing terbaru akan tampil di sini." class="mt-8"/>
        @endif
    </section>

    {{-- Trust & Transparency Strip --}}
    <section class="border-y border-slate-200/80 bg-white py-12 sm:py-14">
        <div class="container-app grid gap-8 sm:grid-cols-3">
            <div class="flex items-start gap-4">
                <span class="grid size-11 shrink-0 place-items-center rounded-xl bg-slate-100 text-slate-900">
                    <x-icon name="shield" class="size-5 text-slate-800"/>
                </span>
                <div>
                    <h3 class="text-sm font-bold text-slate-900">Listing Terverifikasi</h3>
                    <p class="mt-1 text-xs leading-relaxed text-slate-500">Setiap unit properti dan spesifikasi mobil diperiksa sebelum tayang di katalog publik.</p>
                </div>
            </div>
            <div class="flex items-start gap-4">
                <span class="grid size-11 shrink-0 place-items-center rounded-xl bg-slate-100 text-slate-900">
                    <x-icon name="calculator" class="size-5 text-slate-800"/>
                </span>
                <div>
                    <h3 class="text-sm font-bold text-slate-900">Simulasi DP &amp; OTR Resmi</h3>
                    <p class="mt-1 text-xs leading-relaxed text-slate-500">Perhitungan harga on the road dan paket kredit transparan langsung bersama sales konsultan.</p>
                </div>
            </div>
            <div class="flex items-start gap-4">
                <span class="grid size-11 shrink-0 place-items-center rounded-xl bg-emerald-50 text-emerald-700">
                    <x-icon name="whatsapp" class="size-5 text-emerald-600"/>
                </span>
                <div>
                    <h3 class="text-sm font-bold text-slate-900">Komunikasi Cepat WhatsApp</h3>
                    <p class="mt-1 text-xs leading-relaxed text-slate-500">Terhubung langsung dengan penjual atau sales showroom tanpa biaya perantara.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Lokasi Populer --}}
    @if ($popularCities->isNotEmpty())
        <section class="bg-slate-50/70 py-10 sm:py-14">
            <div class="container-app">
                <x-section-title
                    eyebrow="Jangkauan Area"
                    title="Kota Paling Dicari"
                    description="Telusuri unit berdasarkan wilayah terdekat dari tempat tinggal Anda."
                />

                <div class="mt-6 flex flex-wrap gap-2.5">
                    @foreach ($popularCities as $city)
                        <a href="{{ route('listings.index', ['city_id' => $city->id]) }}"
                           class="group flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3.5 py-2 text-xs font-semibold text-slate-700 transition hover:border-slate-400 hover:text-slate-900 shadow-2xs">
                            <x-icon name="map-pin" class="size-3.5 text-slate-400 group-hover:text-slate-700"/>
                            <span>{{ $city->name }}</span>
                            <span class="rounded-full bg-slate-100 px-1.5 py-0.5 text-[10px] font-bold text-slate-500">{{ $city->listings_count }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Bottom Showroom CTA Banner --}}
    <section class="container-app py-14 sm:py-18">
        <div class="relative overflow-hidden rounded-3xl border border-white/10 bg-[#0a1626] px-6 py-12 text-center text-white sm:px-12 sm:py-16">
            <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_60%_50%_at_50%_120%,rgba(37,99,235,0.22),rgba(10,22,38,0))]"></div>

            <div class="relative max-w-xl mx-auto">
                <span class="inline-block rounded-full border border-white/15 bg-white/[0.05] px-3.5 py-1 text-[11px] font-bold uppercase tracking-wider text-slate-300">
                    Showroom &bull; WhatsApp Direct
                </span>
                <h2 class="mt-4 text-2xl sm:text-3xl lg:text-4xl font-black tracking-tight text-white">
                    Siap Menemukan Mobil atau Properti Impian?
                </h2>
                <p class="mt-3 text-xs sm:text-sm leading-relaxed text-slate-400">
                    Jelajahi seluruh katalog kami atau hubungi langsung sales konsultan resmi untuk bantuan simulasi kredit, test drive, dan survey properti.
                </p>

                <div class="mt-7 flex flex-col items-center justify-center gap-3 sm:flex-row">
                    <a href="{{ route('listings.index') }}" class="btn-white btn-lg w-full sm:w-auto">
                        <x-icon name="search" class="size-4 text-slate-900"/>
                        <span>Jelajahi Semua Listing</span>
                    </a>
                    <a href="https://wa.me/{{ $whatsapp }}?text={{ urlencode('Halo Sales SYARVA, saya ingin konsultasi unit.') }}"
                       target="_blank" rel="noopener" class="btn-whatsapp btn-lg w-full sm:w-auto">
                        <x-icon name="whatsapp" class="size-4.5"/>
                        <span>Konsultasi WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
