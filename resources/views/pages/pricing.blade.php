<x-layouts.app>
    <x-slot:title>Paket &amp; Biaya Pasang Iklan</x-slot:title>
    <x-slot:description>Pilihan paket iklan properti dan otomotif terbaik untuk perorangan, agen profesional, dan dealer resmi.</x-slot:description>

    {{-- Header --}}
    <section class="relative overflow-hidden border-b border-white/10 bg-[#0a1626] py-14 sm:py-20 text-white">
        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_60%_50%_at_50%_-10%,rgba(37,99,235,0.18),rgba(10,22,38,0))]"></div>

        <div class="container-app relative text-center max-w-3xl mx-auto">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/[0.04] px-3.5 py-1 text-xs font-semibold text-slate-300 backdrop-blur-sm mb-4">
                <x-icon name="tag" class="size-3.5 text-red-500"/>
                Paket Pemasaran &amp; Listing
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight text-white">
                Pilihan Paket Pasang Iklan <span class="text-red-500">Terarah</span>
            </h1>
            <p class="mx-auto mt-4 max-w-2xl text-xs sm:text-sm leading-relaxed text-slate-400">
                Pilih paket promosi unit properti atau kendaraan Anda. Dapatkan prioritas pencarian, badge listing terverifikasi, dan integrasi komunikasi direct WhatsApp.
            </p>
        </div>
    </section>

    <section class="container-app -mt-8 pb-20 relative z-10">
        <div class="grid gap-8 lg:grid-cols-3 items-stretch">
            @foreach ($plans as $plan)
                <div class="relative flex flex-col justify-between rounded-3xl border bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md
                    {{ $plan->is_featured ? 'border-2 border-red-600 ring-4 ring-red-500/10' : 'border-slate-200/80' }}">

                    @if ($plan->badge_label)
                        <div class="absolute -top-3.5 right-6">
                            <span class="rounded-full px-3.5 py-1 text-xs font-bold uppercase tracking-wider
                                {{ $plan->is_featured ? 'bg-red-600 text-white shadow-md' : 'bg-slate-900 text-white' }}">
                                {{ $plan->badge_label }}
                            </span>
                        </div>
                    @endif

                    <div>
                        <h3 class="text-xl font-bold text-slate-900">{{ $plan->name }}</h3>
                        <p class="mt-2 min-h-[48px] text-xs leading-relaxed text-slate-500">{{ $plan->description }}</p>

                        <div class="mt-6 flex items-baseline gap-1 border-y border-slate-100 py-4">
                            <span class="text-3xl font-black tracking-tight text-slate-900">{{ $plan->formatted_price }}</span>
                            @if ($plan->price > 0)
                                <span class="text-xs font-medium text-slate-500">/ {{ $plan->duration_days }} hari</span>
                            @endif
                        </div>

                        <div class="mt-6 space-y-3.5 text-sm text-slate-700">
                            <p class="font-bold text-xs uppercase tracking-wider text-slate-400">Fitur Termasuk:</p>
                            @if (!empty($plan->features))
                                @foreach ($plan->features as $feature)
                                    <div class="flex items-start gap-3">
                                        <span class="grid size-5 shrink-0 place-items-center rounded-full bg-emerald-50 text-emerald-600">
                                            <svg viewBox="0 0 24 24" class="size-3.5" fill="none" stroke="currentColor" stroke-width="3">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                        </span>
                                        <span class="text-xs font-medium leading-tight text-slate-700">{{ $feature }}</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="mt-8 pt-4">
                        @php
                            $waMsg = 'Halo Admin SYARVA, saya tertarik untuk berlangganan paket *' . $plan->name . '* (' . $plan->formatted_price . '). Mohon informasi cara aktivasi dan pembayarannya.';
                        @endphp

                        @if ($plan->price <= 0)
                            <a href="{{ route('register') }}" class="btn-outline w-full py-3! text-center font-bold">
                                Mulai Pasang Iklan Gratis
                            </a>
                        @else
                            <a href="https://wa.me/{{ $adminWhatsappClean }}?text={{ urlencode($waMsg) }}" target="_blank" rel="noopener"
                               class="btn w-full py-3! text-center font-bold justify-center {{ $plan->is_featured ? 'btn-honda' : 'bg-slate-900 text-white hover:bg-slate-800' }}">
                                <x-icon name="whatsapp" class="size-4.5"/> Beli / Upgrade Paket
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-20 rounded-3xl border border-slate-200 bg-white p-8 sm:p-12 shadow-sm">
            <h2 class="text-center text-2xl font-extrabold text-slate-900">Pertanyaan yang Sering Diajukan (FAQ)</h2>
            <div class="mt-8 grid gap-6 sm:grid-cols-2">
                <div class="rounded-2xl bg-slate-50 p-5">
                    <h3 class="text-sm font-bold text-slate-900">Bagaimana cara aktivasi paket iklan berbayar?</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600">
                        Klik tombol <strong>Beli / Upgrade Paket</strong> pada paket yang Anda inginkan. Anda akan diarahkan ke WhatsApp Admin untuk verifikasi dan aktivasi slot iklan seketika setelah pembayaran.
                    </p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-5">
                    <h3 class="text-sm font-bold text-slate-900">Apa itu fitur Iklan Unggulan (Featured Listing)?</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600">
                        Iklan Unggulan akan diposisikan di baris teratas halaman Beranda dan pencarian dengan badge khusus, memberikan hingga 5x lipat lebih banyak calon pembeli.
                    </p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-5">
                    <h3 class="text-sm font-bold text-slate-900">Apakah saya bisa mengubah detail listing setelah terbit?</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600">
                        Bisa. Anda memiliki kendali penuh melalui Dashboard Penjual untuk mengedit harga, deskripsi, ataupun menambah foto baru kapan saja.
                    </p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-5">
                    <h3 class="text-sm font-bold text-slate-900">Metode pembayaran apa saja yang didukung?</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600">
                        Kami menerima pembayaran melalui Transfer Bank (BCA, Mandiri, BNI, BRI), QRIS, dan e-Wallet (GoPay, OVO, Dana).
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
