@php
    $siteName = \App\Models\Setting::get('site_name', 'SYARVA Marketplace');
    $tagline = \App\Models\Setting::get('site_tagline') ?: 'Ekosistem Jual Beli Properti & Mobil Honda Resmi Terpercaya';
    $whatsapp = \App\Models\Setting::get('contact_whatsapp', '6281234567890');
    $social = [
        'facebook' => \App\Models\Setting::get('social_facebook'),
        'instagram' => \App\Models\Setting::get('social_instagram'),
        'twitter' => \App\Models\Setting::get('social_twitter'),
        'youtube' => \App\Models\Setting::get('social_youtube'),
    ];
    $contact = [
        'phone' => \App\Models\Setting::get('contact_phone'),
        'email' => \App\Models\Setting::get('contact_email'),
        'address' => \App\Models\Setting::get('contact_address'),
    ];
@endphp

<footer class="mt-auto border-t border-slate-200 bg-[#090e1a] text-white">
    <div class="container-app py-12 lg:py-16">
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-5">
            {{-- Column 1: Brand & Bio --}}
            <div class="lg:col-span-2">
                @php
                    $footerLogo = \App\Models\Setting::get('site_logo');
                @endphp
                <a href="{{ route('home') }}" class="flex items-center gap-2.5">
                    @if (!empty($footerLogo))
                        <img src="{{ Storage::disk('public')->url($footerLogo) }}" alt="{{ $siteName }}" class="h-8 sm:h-9 max-w-[180px] object-contain">
                    @else
                        <span class="grid size-9 place-items-center rounded-xl bg-red-600 text-white font-black text-sm shadow-xs">
                            H
                        </span>
                        <span class="text-lg font-black tracking-tight text-white">{{ $siteName }}</span>
                    @endif
                </a>
                <p class="mt-4 max-w-sm text-xs leading-relaxed text-slate-400">{{ $tagline }}</p>

                <div class="mt-5 flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 rounded-md bg-white/[0.06] border border-white/10 px-2.5 py-1 text-[11px] font-semibold text-slate-300">
                        <x-icon name="check-badge" class="size-3.5 text-red-500"/>
                        Honda Certified Sales
                    </span>
                    <span class="inline-flex items-center gap-1.5 rounded-md bg-white/[0.06] border border-white/10 px-2.5 py-1 text-[11px] font-semibold text-slate-300">
                        <x-icon name="shield" class="size-3.5 text-emerald-400"/>
                        Listing Terverifikasi
                    </span>
                </div>

                <div class="mt-6 flex gap-2">
                    @foreach ($social as $network => $url)
                        @if ($url)
                            <a href="{{ $url }}" target="_blank" rel="noopener" aria-label="{{ ucfirst($network) }}"
                               class="grid size-8.5 place-items-center rounded-lg border border-white/10 bg-white/[0.04] text-slate-400 transition-all hover:border-white/20 hover:bg-white/10 hover:text-white">
                                <x-icon :name="$network" class="size-4"/>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- Column 2: Layanan Otomotif --}}
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Otomotif Honda</p>
                <ul class="mt-4 space-y-2.5 text-xs text-slate-400">
                    <li><a href="{{ route('listings.vehicle', 'baru') }}" class="transition-colors hover:text-white">Katalog Honda Baru</a></li>
                    <li><a href="{{ route('pages.sell-car') }}" class="transition-colors hover:text-white">Taksasi Mobil Bekas</a></li>
                    <li><a href="https://wa.me/{{ $whatsapp }}?text={{ urlencode('Halo Admin, saya ingin info promo DP ringan dan simulasi angsuran Honda.') }}" target="_blank" rel="noopener" class="transition-colors hover:text-white">Simulasi Kredit &amp; DP</a></li>
                    <li><a href="https://wa.me/{{ $whatsapp }}?text={{ urlencode('Halo Admin, saya ingin jadwal booking test drive Honda.') }}" target="_blank" rel="noopener" class="transition-colors hover:text-white">Booking Test Drive</a></li>
                </ul>
            </div>

            {{-- Column 3: Layanan Properti --}}
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Properti</p>
                <ul class="mt-4 space-y-2.5 text-xs text-slate-400">
                    <li><a href="{{ route('listings.property', 'rumah') }}" class="transition-colors hover:text-white">Katalog Rumah Tinggal</a></li>
                    <li><a href="{{ route('listings.property', 'tanah') }}" class="transition-colors hover:text-white">Kavling &amp; Tanah SHM</a></li>
                    <li><a href="{{ route('pages.property') }}" class="transition-colors hover:text-white">Konsultasi Titip Jual</a></li>
                    <li><a href="{{ route('about') }}" class="transition-colors hover:text-white">Tentang SYARVA</a></li>
                </ul>
            </div>

            {{-- Column 4: Kontak & Showroom --}}
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Kontak Resmi</p>
                <ul class="mt-4 space-y-3 text-xs text-slate-400">
                    @if ($contact['phone'])
                        <li class="flex items-center gap-2">
                            <x-icon name="phone" class="size-3.5 shrink-0 text-slate-400"/>
                            <span>{{ $contact['phone'] }}</span>
                        </li>
                    @endif
                    @if ($contact['email'])
                        <li class="flex items-center gap-2">
                            <x-icon name="mail" class="size-3.5 shrink-0 text-slate-400"/>
                            <a href="mailto:{{ $contact['email'] }}" class="truncate hover:text-white">{{ $contact['email'] }}</a>
                        </li>
                    @endif
                    @if ($contact['address'])
                        <li class="flex items-start gap-2">
                            <x-icon name="map-pin" class="mt-0.5 size-3.5 shrink-0 text-slate-400"/>
                            <span class="leading-relaxed">{{ $contact['address'] }}</span>
                        </li>
                    @endif
                    <li>
                        <a href="https://wa.me/{{ $whatsapp }}?text={{ urlencode('Halo Sales SYARVA, saya butuh bantuan.') }}"
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 rounded-lg bg-emerald-600/20 border border-emerald-500/30 px-3 py-1.5 text-xs font-semibold text-emerald-300 hover:bg-emerald-600/30 hover:text-emerald-200 transition">
                            <x-icon name="whatsapp" class="size-3.5 text-emerald-400"/>
                            <span>Chat WhatsApp Sales</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="border-t border-white/[0.06] bg-[#04070e]">
        <div class="container-app flex flex-col items-center justify-between gap-3 py-4 text-[11px] text-slate-500 sm:flex-row">
            <p>&copy; {{ date('Y') }} {{ $siteName }}. Hak cipta dilindungi undang-undang.</p>
            <p class="flex items-center gap-3">
                <a href="{{ route('about') }}" class="hover:text-slate-400">Tentang</a>
                <span>&bull;</span>
                <a href="{{ route('contact') }}" class="hover:text-slate-400">Kontak</a>
                <span>&bull;</span>
                <a href="{{ route('listings.index') }}" class="hover:text-slate-400">Semua Listing</a>
            </p>
        </div>
    </div>
</footer>

