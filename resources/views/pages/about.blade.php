<x-layouts.app>
    <x-slot:title>Tentang Kami</x-slot:title>
    <x-slot:description>Kenali lebih dekat SYARVA Marketplace — platform ekosistem jual beli properti dan otomotif terpercaya di Indonesia.</x-slot:description>

    @php
        $siteName = \App\Models\Setting::get('site_name', 'SYARVA Marketplace');
        $whatsapp = \App\Models\Setting::get('contact_whatsapp', '6281234567890');
    @endphp

    {{-- Hero Header --}}
    <section class="relative overflow-hidden border-b border-white/10 bg-[#0a1626] py-16 sm:py-24 text-white">
        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_60%_50%_at_50%_-10%,rgba(37,99,235,0.18),rgba(10,22,38,0))]"></div>

        <div class="container-app relative text-center max-w-3xl mx-auto">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/[0.04] px-3.5 py-1 text-xs font-semibold text-slate-300 backdrop-blur-sm mb-6">
                Ekosistem Otomotif &amp; Properti Indonesia
            </span>
            <h1 class="text-3xl sm:text-5xl font-black tracking-[-0.03em] leading-tight text-white">
                Membangun Standar Baru <br class="hidden sm:block"/>
                <span class="text-red-500">Jual Beli Otomotif &amp; Properti</span>
            </h1>
            <p class="mx-auto mt-5 max-w-2xl text-xs sm:text-sm leading-relaxed text-slate-400">
                {{ $siteName }} didirikan untuk menghadirkan transparansi harga, kepastian legalitas unit, dan kemudahan komunikasi langsung tanpa perantara fiktif.
            </p>

            {{-- Metric Badges --}}
            <div class="mt-12 grid grid-cols-2 gap-3 sm:grid-cols-4 max-w-3xl mx-auto">
                <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-4 sm:p-5 backdrop-blur-sm">
                    <p class="text-2xl sm:text-3xl font-black text-white">100%</p>
                    <p class="mt-1 text-[11px] font-semibold text-slate-400">Listing Terverifikasi</p>
                </div>
                <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-4 sm:p-5 backdrop-blur-sm">
                    <p class="text-2xl sm:text-3xl font-black text-red-500">Official</p>
                    <p class="mt-1 text-[11px] font-semibold text-slate-400">Honda Certified</p>
                </div>
                <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-4 sm:p-5 backdrop-blur-sm">
                    <p class="text-2xl sm:text-3xl font-black text-white">SHM</p>
                    <p class="mt-1 text-[11px] font-semibold text-slate-400">Legalitas Aman</p>
                </div>
                <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-4 sm:p-5 backdrop-blur-sm">
                    <p class="text-2xl sm:text-3xl font-black text-emerald-400">Direct</p>
                    <p class="mt-1 text-[11px] font-semibold text-slate-400">WhatsApp Sales</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Story & Mission Section --}}
    <section class="container-app py-16 sm:py-20">
        <div class="grid items-center gap-12 lg:grid-cols-2">
            <div>
                <span class="inline-block text-[10px] font-bold uppercase tracking-[0.08em] text-slate-500 mb-2">
                    Komitmen Showroom &amp; Listing
                </span>
                <h2 class="text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3.5xl leading-snug">
                    Transaksi Terpercaya Tanpa Kebingungan dan Biaya Tersembunyi
                </h2>
                <div class="mt-6 space-y-4 text-xs sm:text-sm leading-relaxed text-slate-600">
                    <p>
                        Berangkat dari keluhan masyarakat mengenai penipuan harga OTR yang tidak realistis dan sertifikat ganda pada transaksi properti, <strong>{{ $siteName }}</strong> hadir dengan kurasi ketat oleh konsultan resmi berpengalaman.
                    </p>
                    <p>
                        Kami memadukan katalog unit resmi dealer Honda (mobil baru bergaransi dan mobil bekas siap pakai) dengan listing aset properti berlegalitas jelas di wilayah strategis.
                    </p>
                </div>

                <div class="mt-8 flex flex-wrap gap-4">
                    <div class="flex items-center gap-3">
                        <span class="grid size-10 place-items-center rounded-xl bg-slate-100 text-slate-900">
                            <x-icon name="check-badge" class="size-5 text-red-600"/>
                        </span>
                        <div>
                            <h4 class="text-xs font-bold text-slate-900">Legalitas Dokumen Teruji</h4>
                            <p class="text-[11px] text-slate-500">Pengecekan sertifikat SHM &amp; faktur resmi</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="grid size-10 place-items-center rounded-xl bg-slate-100 text-slate-900">
                            <x-icon name="shield" class="size-5 text-emerald-600"/>
                        </span>
                        <div>
                            <h4 class="text-xs font-bold text-slate-900">Simulasi Finansial Transparan</h4>
                            <p class="text-[11px] text-slate-500">Rincian DP, bunga, dan angsuran jelas</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 sm:gap-5">
                <div class="space-y-4">
                    <div class="rounded-2xl border border-slate-200/80 bg-white p-5 sm:p-6 shadow-xs hover:border-slate-300 transition-all">
                        <span class="grid size-11 place-items-center rounded-xl bg-red-50 text-red-600">
                            <x-icon name="car-front" class="size-5.5"/>
                        </span>
                        <h3 class="mt-4 text-sm sm:text-base font-bold text-slate-900">Katalog Honda Resmi</h3>
                        <p class="mt-1 text-xs leading-relaxed text-slate-500">Akses unit Honda baru dengan simulasi DP fleksibel dan program cashback resmi dealer.</p>
                    </div>

                    <div class="rounded-2xl border border-slate-200/80 bg-white p-5 sm:p-6 shadow-xs hover:border-slate-300 transition-all">
                        <span class="grid size-11 place-items-center rounded-xl bg-emerald-50 text-emerald-600">
                            <x-icon name="building" class="size-5.5"/>
                        </span>
                        <h3 class="mt-4 text-sm sm:text-base font-bold text-slate-900">Konsultasi Properti</h3>
                        <p class="mt-1 text-xs leading-relaxed text-slate-500">Pendampingan titip jual dan pencarian rumah siap huni berlegalitas aman.</p>
                    </div>
                </div>

                <div class="space-y-4 pt-6 sm:pt-8">
                    <div class="rounded-2xl border border-slate-200/80 bg-white p-5 sm:p-6 shadow-xs hover:border-slate-300 transition-all">
                        <span class="grid size-11 place-items-center rounded-xl bg-amber-50 text-amber-600">
                            <x-icon name="car-back" class="size-5.5"/>
                        </span>
                        <h3 class="mt-4 text-sm sm:text-base font-bold text-slate-900">Taksasi Mobil Bekas</h3>
                        <p class="mt-1 text-xs leading-relaxed text-slate-500">Taksasi objektif untuk tukar tambah multi-brand langsung via sales konsultan.</p>
                    </div>

                    <div class="rounded-2xl border border-slate-200/80 bg-white p-5 sm:p-6 shadow-xs hover:border-slate-300 transition-all">
                        <span class="grid size-11 place-items-center rounded-xl bg-blue-50 text-blue-600">
                            <x-icon name="calculator" class="size-5.5"/>
                        </span>
                        <h3 class="mt-4 text-sm sm:text-base font-bold text-slate-900">Simulasi Finansial &amp; DP</h3>
                        <p class="mt-1 text-xs leading-relaxed text-slate-500">Perhitungan rincian DP, angsuran kredit OTR resmi, dan estimasi biaya transaksi yang transparan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Vision & Mission --}}
    <section class="border-y border-white/10 bg-[#0a1626] py-16 text-white">
        <div class="container-app">
            <div class="mx-auto max-w-3xl text-center">
                <span class="inline-block text-[10px] font-bold uppercase tracking-[0.08em] text-slate-400">
                    Nilai &amp; Visi
                </span>
                <h2 class="mt-2 text-2xl font-extrabold tracking-tight sm:text-3xl text-white">Visi &amp; Misi Platform</h2>
                <p class="mt-2 text-xs sm:text-sm text-slate-400">Prinsip dasar yang menggerakkan pelayanan kami di {{ $siteName }}.</p>
            </div>

            <div class="mt-10 grid gap-6 md:grid-cols-2">
                <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-7 backdrop-blur-sm">
                    <div class="flex items-center gap-3">
                        <span class="grid size-9 place-items-center rounded-xl bg-white/10 text-white">
                            <x-icon name="globe" class="size-4.5"/>
                        </span>
                        <h3 class="text-base font-bold text-white">Visi Kami</h3>
                    </div>
                    <p class="mt-4 text-xs sm:text-sm leading-relaxed text-slate-400">
                        Menjadi ekosistem pasar otomotif dan properti nomor satu di Indonesia yang paling dipercaya dengan kemudahan akses langsung ke konsultan resmi.
                    </p>
                </div>

                <div class="rounded-2xl border border-white/10 bg-white/[0.04] p-7 backdrop-blur-sm">
                    <div class="flex items-center gap-3">
                        <span class="grid size-9 place-items-center rounded-xl bg-emerald-500/20 text-emerald-400">
                            <x-icon name="shield" class="size-4.5"/>
                        </span>
                        <h3 class="text-base font-bold text-white">Misi Kami</h3>
                    </div>
                    <ul class="mt-4 space-y-2 text-xs sm:text-sm text-slate-400">
                        <li class="flex items-start gap-2">
                            <span class="text-slate-300 font-bold">&bull;</span>
                            <span>Menyediakan data listing yang terverifikasi keaslian dokumen dan spesifikasinya.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-slate-300 font-bold">&bull;</span>
                            <span>Memudahkan transaksi direct WhatsApp dengan sales dan konsultan resmi showroom.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-slate-300 font-bold">&bull;</span>
                            <span>Memberikan edukasi dan simulasi pembiayaan transparan tanpa biaya tersembunyi.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Bottom --}}
    <section class="container-app py-14 sm:py-18">
        <div class="relative overflow-hidden rounded-3xl border border-white/10 bg-[#0a1626] px-6 py-12 text-center text-white sm:px-12 sm:py-16">
            <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_60%_50%_at_50%_120%,rgba(37,99,235,0.22),rgba(10,22,38,0))]"></div>

            <div class="relative max-w-xl mx-auto">
                <h2 class="text-2xl sm:text-3xl font-black tracking-tight text-white">
                    Siap Menemukan Unit Idaman Anda?
                </h2>
                <p class="mt-3 text-xs sm:text-sm leading-relaxed text-slate-400">
                    Jelajahi seluruh pilihan properti dan mobil Honda terbaik atau hubungi sales konsultan resmi kami.
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