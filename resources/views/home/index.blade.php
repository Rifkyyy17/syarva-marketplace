@php
    $announcement = \App\Models\Setting::get('site_announcement');
    $whatsapp = \App\Models\Setting::get('contact_whatsapp', '6281234567890');
@endphp

<x-layouts.app>
    <x-slot:title>Home</x-slot:title>
    <x-slot:description>{{ \App\Models\Setting::get('site_tagline') }}</x-slot:description>

    <section class="relative overflow-hidden bg-charcoal-900" x-data="{ activeSlide: 0, total: 3 }" x-init="setInterval(() => { activeSlide = (activeSlide + 1) % total }, 5000)">
        <div class="absolute inset-0">
            <div class="absolute -left-32 -top-32 size-96 rounded-full bg-primary-500/20 blur-3xl"></div>
            <div class="absolute -bottom-40 right-0 size-[28rem] rounded-full bg-primary-600/15 blur-3xl"></div>
        </div>

        <div class="container-app relative py-16 sm:py-20 lg:py-28">
            <div class="grid items-center gap-10 lg:grid-cols-2">
                <div>
                    <span class="inline-flex items-center gap-2 rounded-full border border-primary-500/30 bg-primary-500/10 px-4 py-1.5 text-xs font-semibold text-primary-300">
                        <x-icon name="sparkles" class="size-3.5"/>
                        Honda Authorized Dealer
                    </span>

                    <h1 class="mt-6 text-3xl font-extrabold leading-tight tracking-tight text-white sm:text-4xl lg:text-5xl">
                        Promo Honda
                        <span class="text-primary-500">Terbaru</span>
                        <br class="hidden sm:block"/>
                        DP Ceper &amp; Angsuran Ringan
                    </h1>

                    <p class="mt-4 max-w-lg text-sm leading-relaxed text-white/60 sm:text-base">
                        Dapatkan penawaran terbaik untuk mobil Honda impian Anda. Tersedia CR-V, Civic, BR-V, HR-V, Brio, dan lainnya.
                    </p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <a href="{{ route('listings.vehicle', 'baru') }}" class="btn-primary btn-lg">
                            <x-icon name="car-front" class="size-5"/>
                            Lihat Katalog Honda
                        </a>
                        <a href="https://wa.me/{{ $whatsapp }}?text={{ urlencode('Halo Shara, saya tertarik dengan promo Honda terbaru.') }}"
                           target="_blank" rel="noopener" class="btn-whatsapp btn-lg">
                            <svg viewBox="0 0 24 24" class="size-5" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Chat Promo Honda
                        </a>
                    </div>

                    <div class="mt-8 flex items-center gap-x-6 gap-y-2 text-xs text-white/50">
                        <span class="flex items-center gap-1.5">
                            <x-icon name="folder" class="size-4 text-primary-400"/>
                            <strong class="font-bold text-white">{{ number_format($stats['listings'], 0, ',', '.') }}</strong> listing aktif
                        </span>
                        <span class="flex items-center gap-1.5">
                            <x-icon name="map-pin" class="size-4 text-primary-400"/>
                            <strong class="font-bold text-white">{{ number_format($stats['cities'], 0, ',', '.') }}</strong> kota
                        </span>
                        <span class="flex items-center gap-1.5">
                            <x-icon name="users" class="size-4 text-primary-400"/>
                            <strong class="font-bold text-white">{{ number_format($stats['sellers'], 0, ',', '.') }}</strong> pengguna
                        </span>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <div class="relative rounded-2xl bg-white/5 p-2 backdrop-blur-sm">
                        <div class="overflow-hidden rounded-xl bg-charcoal-800">
                            @if ($featured->filter->isVehicle()->isNotEmpty())
                                @php $heroCar = $featured->filter->isVehicle()->first(); @endphp
                                @if ($heroCar->primaryImageUrl)
                                    <img src="{{ $heroCar->primaryImageUrl }}" alt="{{ $heroCar->title }}" class="aspect-[16/10] w-full object-cover"/>
                                @else
                                    <div class="grid aspect-[16/10] w-full place-items-center bg-charcoal-800">
                                        <x-icon name="car-front" class="size-20 text-white/10"/>
                                    </div>
                                @endif
                            @else
                                <div class="grid aspect-[16/10] w-full place-items-center bg-charcoal-800">
                                    <x-icon name="car-front" class="size-20 text-white/10"/>
                                </div>
                            @endif
                        </div>
                        <div class="absolute bottom-4 left-4 right-4 rounded-xl bg-charcoal-900/90 px-4 py-3 backdrop-blur">
                            <p class="text-xs text-white/50">Unit Pilihan</p>
                            <p class="mt-0.5 text-sm font-bold text-white">{{ $featured->first()->title ?? 'Honda Terbaru' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <svg class="block w-full text-white" viewBox="0 0 1440 48" fill="currentColor" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0 48h1440V16c-120 16-360 32-720 32S120 32 0 16z"/>
        </svg>
    </section>

    @if ($announcement)
        <div class="border-b border-warning/20 bg-warning/5">
            <div class="container-app flex items-center justify-center gap-2 py-2.5 text-sm text-warning">
                <x-icon name="info" class="size-4 shrink-0"/>
                {{ $announcement }}
            </div>
        </div>
    @endif

    <section class="container-app py-10 sm:py-14">
        <x-section-title
            eyebrow="Layanan Kami"
            title="Pilih Kategori"
            description="Temukan apa yang Anda cari."
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

    <section class="bg-white py-10 sm:py-14">
        <div class="container-app">
            <x-section-title
                eyebrow="Pilihan Unggulan"
                title="Listing Terbaik"
                description="Koleksi pilihan kami dari penjual terpercaya."
                :link="route('listings.index')"
                link-label="Lihat Semua"
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

    <section class="bg-charcoal-900 py-12 sm:py-16">
        <div class="container-app">
            <div class="text-center">
                <span class="inline-flex items-center gap-2 rounded-full border border-primary-500/30 bg-primary-500/10 px-4 py-1.5 text-xs font-semibold text-primary-300">
                    <x-icon name="zap" class="size-3.5"/>
                    Layanan Lainnya
                </span>
                <h2 class="mt-4 text-2xl font-extrabold tracking-tight text-white sm:text-3xl">Butuh Layanan Spesifik?</h2>
                <p class="mt-2 text-sm text-white/50">Pilih layanan yang sesuai kebutuhan Anda.</p>
            </div>

            <div class="mt-10 grid gap-5 sm:grid-cols-3">
                <a href="{{ route('pages.sell-car') }}" class="group rounded-2xl border border-white/10 bg-white/5 p-6 transition-all hover:border-amber-400/30 hover:bg-amber-500/5">
                    <span class="grid size-12 place-items-center rounded-xl bg-amber-500/15 text-amber-400 transition-transform group-hover:scale-110">
                        <x-icon name="{{ \App\Models\Setting::get('icon_service_jual_mobil', 'car-back') }}" class="size-6"/>
                    </span>
                    <h3 class="mt-4 text-base font-bold text-white">Jual Mobil Bekas</h3>
                    <p class="mt-1 text-sm text-white/50">Taksasi harga &amp; jual mobil bekas merek apapun via WhatsApp.</p>
                    <span class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-amber-400">
                        Mulai Sekarang <x-icon name="arrow-right" class="size-4"/>
                    </span>
                </a>

                <a href="{{ route('pages.property') }}" class="group rounded-2xl border border-white/10 bg-white/5 p-6 transition-all hover:border-emerald-400/30 hover:bg-emerald-500/5">
                    <span class="grid size-12 place-items-center rounded-xl bg-emerald-500/15 text-emerald-400 transition-transform group-hover:scale-110">
                        <x-icon name="{{ \App\Models\Setting::get('icon_service_properti', 'building') }}" class="size-6"/>
                    </span>
                    <h3 class="mt-4 text-base font-bold text-white">Konsultasi Properti</h3>
                    <p class="mt-1 text-sm text-white/50">Titip jual atau cari rumah impian Anda bersama konsultan kami.</p>
                    <span class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-emerald-400">
                        Mulai Sekarang <x-icon name="arrow-right" class="size-4"/>
                    </span>
                </a>

                <a href="https://wa.me/{{ $whatsapp }}?text={{ urlencode('Halo Admin, saya ingin booking test drive Honda.') }}"
                   target="_blank" rel="noopener" class="group rounded-2xl border border-white/10 bg-white/5 p-6 transition-all hover:border-primary-400/30 hover:bg-primary-500/5">
                    <span class="grid size-12 place-items-center rounded-xl bg-primary-500/15 text-primary-400 transition-transform group-hover:scale-110">
                        <x-icon name="{{ \App\Models\Setting::get('icon_service_test_drive', 'car-front') }}" class="size-6"/>
                    </span>
                    <h3 class="mt-4 text-base font-bold text-white">Test Drive Honda</h3>
                    <p class="mt-1 text-sm text-white/50">Booking jadwal test drive unit Honda langsung via WhatsApp.</p>
                    <span class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-primary-400">
                        Booking Sekarang <x-icon name="arrow-right" class="size-4"/>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <section class="container-app py-10 sm:py-14">
        <x-section-title
            eyebrow="Terbaru"
            title="Listing Terbaru"
            description="Ikhtiar terbaru dari para penjual kami."
            :link="route('listings.index')"
            link-label="Lihat Semua"
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

    <section class="bg-white py-12 sm:py-16">
        <div class="container-app grid gap-8 sm:grid-cols-3">
            <div class="flex items-center gap-4">
                <span class="grid size-12 shrink-0 place-items-center rounded-2xl bg-primary-50 text-primary-600">
                    <x-icon name="{{ \App\Models\Setting::get('icon_feature_1', 'shield') }}" class="size-6"/>
                </span>
                <div>
                    <h3 class="text-sm font-bold text-charcoal-900">{{ \App\Models\Setting::get('title_feature_1', 'Transaksi Aman') }}</h3>
                    <p class="mt-0.5 text-xs leading-relaxed text-charcoal-500">{{ \App\Models\Setting::get('desc_feature_1', 'Setiap listing diverifikasi oleh admin sebelum dipublikasikan.') }}</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <span class="grid size-12 shrink-0 place-items-center rounded-2xl bg-primary-50 text-primary-600">
                    <x-icon name="{{ \App\Models\Setting::get('icon_feature_2', 'search') }}" class="size-6"/>
                </span>
                <div>
                    <h3 class="text-sm font-bold text-charcoal-900">{{ \App\Models\Setting::get('title_feature_2', 'Pencarian Cepat') }}</h3>
                    <p class="mt-0.5 text-xs leading-relaxed text-charcoal-500">{{ \App\Models\Setting::get('desc_feature_2', 'Filter lengkap untuk menemukan properti atau kendaraan yang tepat.') }}</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <span class="grid size-12 shrink-0 place-items-center rounded-2xl bg-emerald-50 text-emerald-600">
                    <x-icon name="{{ \App\Models\Setting::get('icon_feature_3', 'send') }}" class="size-6"/>
                </span>
                <div>
                    <h3 class="text-sm font-bold text-charcoal-900">{{ \App\Models\Setting::get('title_feature_3', 'Hubungi Langsung') }}</h3>
                    <p class="mt-0.5 text-xs leading-relaxed text-charcoal-500">{{ \App\Models\Setting::get('desc_feature_3', 'Kirim inquiry dan terhubung langsung dengan penjual via WhatsApp.') }}</p>
                </div>
            </div>
        </div>
    </section>

    @if ($popularCities->isNotEmpty())
        <section class="bg-charcoal-50 py-10 sm:py-14">
            <div class="container-app">
                <x-section-title
                    eyebrow="Lokasi Populer"
                    title="Kota Paling Dicari"
                    description="Cari listing di kota favorit Anda."
                />

                <div class="mt-8 flex flex-wrap gap-3">
                    @foreach ($popularCities as $city)
                        <a href="{{ route('listings.index', ['city_id' => $city->id]) }}"
                           class="group flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-semibold text-charcoal-700 shadow-sm transition-all hover:border-primary-300 hover:text-primary-600">
                            <x-icon name="map-pin" class="size-4 text-primary-500"/>
                            {{ $city->name }}
                            <span class="text-xs font-medium text-charcoal-400 group-hover:text-primary-500">{{ $city->listings_count }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="container-app py-12 sm:py-16">
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-charcoal-900 to-charcoal-800 px-6 py-12 text-center sm:px-12">
            <div class="absolute -right-20 -top-20 size-64 rounded-full bg-primary-500/20 blur-3xl"></div>
            <div class="absolute -left-20 -bottom-20 size-64 rounded-full bg-whatsapp/10 blur-3xl"></div>
            <h2 class="relative text-2xl font-extrabold tracking-tight text-white sm:text-3xl">Siap Memulai?</h2>
            <p class="relative mx-auto mt-3 max-w-lg text-sm text-white/60 sm:text-base">
                Jelajahi listing terbaik kami atau hubungi langsung Shara untuk konsultasi gratis.
            </p>
            <div class="relative mt-6 flex flex-col items-center justify-center gap-3 sm:flex-row">
                <a href="{{ route('listings.index') }}" class="btn-primary btn-lg w-full sm:w-auto">
                    <x-icon name="search" class="size-4"/> Jelajahi Listing
                </a>
                <a href="https://wa.me/{{ $whatsapp }}?text={{ urlencode('Halo Shara, saya butuh bantuan.') }}"
                   target="_blank" rel="noopener" class="btn-whatsapp btn-lg w-full sm:w-auto">
                    <svg viewBox="0 0 24 24" class="size-5" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Chat WhatsApp
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>
