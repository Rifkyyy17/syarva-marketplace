<x-layouts.app>
    <x-slot:title>Hubungi Kami</x-slot:title>
    <x-slot:description>Hubungi tim SYARVA Marketplace untuk konsultasi properti, pemesanan mobil Honda, titip jual unit, atau kemitraan bisnis.</x-slot:description>

    @php
        $siteName = \App\Models\Setting::get('site_name', 'SYARVA Marketplace');
        $cleanWa = preg_replace('/[^0-9]/', '', $contact['whatsapp'] ?? '6281234567890');
        if (str_starts_with($cleanWa, '0')) {
            $cleanWa = '62' . substr($cleanWa, 1);
        }
    @endphp

    {{-- Hero Header --}}
    <section class="relative overflow-hidden border-b border-white/10 bg-[#090e1a] py-14 sm:py-20 text-white">
        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_60%_50%_at_50%_-10%,rgba(220,38,38,0.12),rgba(9,14,26,0))]"></div>

        <div class="container-app relative text-center max-w-2xl mx-auto">
            <span class="inline-flex items-center gap-1.5 rounded-full border border-white/15 bg-white/[0.04] px-3.5 py-1 text-xs font-semibold text-slate-300 backdrop-blur-sm mb-4">
                <x-icon name="phone" class="size-3.5 text-slate-400"/>
                Layanan Pelanggan &amp; Konsultasi Sales
            </span>
            <h1 class="text-3xl sm:text-4xl font-black tracking-tight text-white">
                Hubungi Showroom &amp; Layanan <span class="text-red-500">{{ $siteName }}</span>
            </h1>
            <p class="mx-auto mt-3 text-xs sm:text-sm leading-relaxed text-slate-400">
                Punya pertanyaan seputar ketersediaan unit, promo Honda terbaru, taksasi mobil bekas, atau konsultasi titip jual properti? Tim konsultan kami siap membantu Anda dengan cepat.
            </p>
        </div>
    </section>


    {{-- Main Content Section --}}
    <section class="container-app -mt-8 pb-16 sm:pb-20 relative z-10">
        <div class="grid gap-8 lg:grid-cols-[380px_1fr] items-start">
            {{-- Left Side: Contact Channels & Operational Info --}}
            <div class="space-y-4">
                {{-- WhatsApp Card (Primary CTA) --}}
                @if ($contact['whatsapp'])
                    <a href="https://wa.me/{{ $cleanWa }}?text={{ urlencode('Halo Admin ' . $siteName . ', saya ingin konsultasi seputar unit/layanan.') }}"
                       target="_blank" rel="noopener"
                       class="card flex items-start gap-4 p-5 bg-gradient-to-br from-emerald-50 to-white border-emerald-200 hover:border-emerald-400 hover:shadow-md transition-all group">
                        <span class="grid size-12 shrink-0 place-items-center rounded-2xl bg-whatsapp text-white shadow-md shadow-whatsapp/20 group-hover:scale-105 transition-transform">
                            <x-icon name="whatsapp" class="size-6"/>
                        </span>
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-bold text-slate-900">WhatsApp Resmi</h3>
                                <span class="inline-flex items-center gap-1 text-[10px] font-bold text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-full">
                                    <span class="size-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Fast Response
                                </span>
                            </div>
                            <p class="mt-1 font-mono text-sm font-bold text-emerald-800">{{ $contact['whatsapp'] }}</p>
                            <span class="mt-2 inline-flex items-center gap-1 text-xs font-semibold text-emerald-700 group-hover:underline">
                                Chat Sekarang <x-icon name="arrow-right" class="size-3.5"/>
                            </span>
                        </div>
                    </a>
                @endif

                {{-- Phone Card --}}
                @if ($contact['phone'])
                    <div class="card flex items-start gap-4 p-5">
                        <span class="grid size-12 shrink-0 place-items-center rounded-2xl bg-primary-50 text-primary-700">
                            <x-icon name="phone" class="size-6"/>
                        </span>
                        <div class="min-w-0">
                            <h3 class="text-sm font-bold text-slate-900">Telepon Kantor</h3>
                            <p class="mt-1 font-mono text-sm font-medium text-slate-700">{{ $contact['phone'] }}</p>
                            <p class="mt-0.5 text-xs text-slate-400">Senin - Sabtu (08.00 - 18.00 WIB)</p>
                        </div>
                    </div>
                @endif

                {{-- Email Card --}}
                @if ($contact['email'])
                    <div class="card flex items-start gap-4 p-5">
                        <span class="grid size-12 shrink-0 place-items-center rounded-2xl bg-primary-50 text-primary-700">
                            <x-icon name="mail" class="size-6"/>
                        </span>
                        <div class="min-w-0">
                            <h3 class="text-sm font-bold text-slate-900">Email Korespondensi</h3>
                            <a href="mailto:{{ $contact['email'] }}" class="mt-1 block truncate text-sm font-medium text-primary-700 hover:underline">{{ $contact['email'] }}</a>
                            <p class="mt-0.5 text-xs text-slate-400">Untuk kemitraan &amp; surat resmi</p>
                        </div>
                    </div>
                @endif

                {{-- Address Card --}}
                @if ($contact['address'])
                    <div class="card flex items-start gap-4 p-5">
                        <span class="grid size-12 shrink-0 place-items-center rounded-2xl bg-primary-50 text-primary-700">
                            <x-icon name="map-pin" class="size-6"/>
                        </span>
                        <div class="min-w-0">
                            <h3 class="text-sm font-bold text-slate-900">Kantor Operasional</h3>
                            <p class="mt-1 text-sm leading-relaxed text-slate-600">{{ $contact['address'] }}</p>
                        </div>
                    </div>
                @endif

                {{-- Social Media & Operational Hours --}}
                <div class="card p-5 space-y-4">
                    <div>
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">Ikuti Media Sosial Kami</h3>
                        <div class="mt-3 flex flex-wrap gap-2">
                            @foreach (['facebook', 'instagram', 'twitter', 'youtube'] as $network)
                                @if ($contact['social'][$network] ?? null)
                                    <a href="{{ $contact['social'][$network] }}" target="_blank" rel="noopener" aria-label="{{ ucfirst($network) }}"
                                       class="grid size-10 place-items-center rounded-xl bg-slate-100 text-slate-600 transition-all hover:bg-primary-700 hover:text-white hover:scale-105">
                                        <x-icon :name="$network" class="size-4.5"/>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-3">
                        <h4 class="text-xs font-bold text-slate-900 flex items-center gap-1.5">
                            <x-icon name="clock" class="size-3.5 text-primary-700"/>
                            Jam Layanan Admin
                        </h4>
                        <div class="mt-2 space-y-1 text-xs text-slate-600">
                            <p class="flex justify-between"><span>Senin - Jumat:</span> <strong class="text-slate-800">08:00 - 18:00 WIB</strong></p>
                            <p class="flex justify-between"><span>Sabtu:</span> <strong class="text-slate-800">09:00 - 16:00 WIB</strong></p>
                            <p class="flex justify-between"><span>Minggu / Libur:</span> <strong class="text-emerald-700">Chat WA Standby</strong></p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Side: Contact Form --}}
            <div class="card p-6 sm:p-10 shadow-sm border border-slate-200">
                <div class="border-b border-slate-100 pb-5">
                    <span class="text-xs font-bold uppercase tracking-wider text-primary-700 bg-primary-50 px-2.5 py-1 rounded-full">Formulir Pesan</span>
                    <h2 class="mt-2 text-xl font-extrabold text-slate-900 sm:text-2xl">Kirimkan Pesan atau Permintaan Anda</h2>
                    <p class="mt-1 text-xs sm:text-sm text-slate-500 leading-relaxed">
                        Silakan lengkapi formulir berikut. Tim representatif kami akan meninjau dan merespons pesan Anda dalam waktu singkat.
                    </p>
                </div>

                <form method="POST" action="{{ route('contact.send') }}" class="mt-6 space-y-5">
                    @csrf
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="name" class="label text-xs">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required maxlength="100"
                                   class="input text-xs {{ $errors->has('name') ? 'input-error' : '' }}" placeholder="Masukkan nama Anda">
                            @error('name')
                                <p class="mt-1 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="label text-xs">Alamat Email <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required maxlength="150"
                                   class="input text-xs {{ $errors->has('email') ? 'input-error' : '' }}" placeholder="nama@email.com">
                            @error('email')
                                <p class="mt-1 text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="subject" class="label text-xs">Subjek / Topik Kebutuhan <span class="text-red-500">*</span></label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required maxlength="200"
                               class="input text-xs {{ $errors->has('subject') ? 'input-error' : '' }}" placeholder="cth: Konsultasi Honda HR-V / Titip Jual Rumah Bogor">
                        @error('subject')
                            <p class="mt-1 text-xs font-medium text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="message" class="label text-xs">Detail Pesan / Pertanyaan <span class="text-red-500">*</span></label>
                        <textarea id="message" name="message" rows="6" required minlength="10" maxlength="3000"
                                  class="input text-xs {{ $errors->has('message') ? 'input-error' : '' }}"
                                  placeholder="Jelaskan kebutuhan unit, estimasi budget, lokasi, atau pertanyaan Anda secara rinci...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-xs font-medium text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-2">
                        <button type="submit" class="btn-primary w-full sm:w-auto">
                            <x-icon name="send" class="size-4"/> Kirim Pesan Sekarang
                        </button>
                        <p class="text-[11px] text-slate-400 text-center sm:text-right">
                            Privasi data Anda terjamin aman &bull; Respon cepat via Email/WA
                        </p>
                    </div>
                </form>
            </div>
        </div>

        {{-- Quick FAQ Section --}}
        <div class="mt-16 rounded-3xl border border-slate-200 bg-white p-8 sm:p-12 shadow-xs">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-xs font-bold uppercase tracking-wider text-primary-700 bg-primary-50 px-3 py-1 rounded-full">Bantuan Cepat</span>
                <h2 class="mt-3 text-2xl font-extrabold text-slate-900">Pertanyaan yang Sering Diajukan</h2>
                <p class="mt-1.5 text-xs text-slate-500">Jawaban cepat untuk pertanyaan umum sebelum Anda menghubungi kami.</p>
            </div>

            <div class="mt-8 grid gap-6 sm:grid-cols-3">
                <div class="rounded-2xl bg-slate-50 p-5 border border-slate-100">
                    <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                        <x-icon name="car-front" class="size-4 text-primary-600"/>
                        Promo Mobil Honda
                    </h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600">
                        Anda dapat langsung meminta simulasi DP, angsuran per bulan, serta e-brochure unit Honda resmi melalui WhatsApp Admin kami.
                    </p>
                </div>

                <div class="rounded-2xl bg-slate-50 p-5 border border-slate-100">
                    <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                        <x-icon name="building" class="size-4 text-emerald-600"/>
                        Titip Jual Properti
                    </h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600">
                        Cukup kirimkan foto properti, lokasi, sertifikat, dan harga penawaran. Tim kami akan membantu memverifikasi dan menayangkannya.
                    </p>
                </div>

                <div class="rounded-2xl bg-slate-50 p-5 border border-slate-100">
                    <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                        <x-icon name="calendar" class="size-4 text-primary-600"/>
                        Jadwal Survey &amp; Test Drive
                    </h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600">
                        Ingin melihat langsung fisik properti atau menjadwalkan test drive mobil Honda? Hubungi konsultan kami untuk penyesuaian jadwal kunjungan Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>