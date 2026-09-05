@php
    $whatsappNumber = \App\Models\Setting::get('contact_whatsapp', '6281234567890');
    $isDetailPage = request()->routeIs('listings.show');
@endphp

<div x-data="{ open: false }" class="fixed {{ $isDetailPage ? 'hidden lg:block' : '' }} bottom-5 right-4 sm:right-6 z-40">
    <div x-show="open" x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 scale-95 translate-y-2"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
         x-transition:leave-end="opacity-0 scale-95 translate-y-2"
         @click.outside="open = false"
         x-cloak
         class="absolute bottom-14 right-0 w-[calc(100vw-2rem)] max-w-xs sm:w-72 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xl ring-1 ring-black/5">

        <div class="bg-slate-900 px-4 py-3.5 text-white">
            <h3 class="text-xs font-bold uppercase tracking-wider text-white flex items-center gap-1.5">
                <x-icon name="whatsapp" class="size-3.5 text-emerald-400"/>
                Konsultasi WhatsApp
            </h3>
            <p class="mt-0.5 text-[11px] text-slate-400">Pilih layanan cepat via WhatsApp Sales Resmi</p>
        </div>

        <div class="p-2 space-y-1">
            <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode('Halo Admin, saya tertarik dengan promo mobil Honda terbaru. Bisa info lebih lanjut?') }}"
               target="_blank" rel="noopener"
               class="flex items-center gap-3 rounded-xl p-2.5 text-xs font-semibold text-slate-700 transition hover:bg-slate-50 hover:text-slate-900">
                <span class="grid size-8.5 place-items-center rounded-lg bg-red-50 text-red-600 shrink-0">
                    <x-icon name="car-front" class="size-4"/>
                </span>
                <div>
                    <span class="block text-xs font-bold text-slate-900">Promo Honda Baru</span>
                    <span class="text-[10px] text-slate-500 font-normal">Harga OTR &amp; simulasi DP</span>
                </div>
            </a>

            <a href="{{ route('pages.sell-car') }}"
               class="flex items-center gap-3 rounded-xl p-2.5 text-xs font-semibold text-slate-700 transition hover:bg-slate-50 hover:text-slate-900">
                <span class="grid size-8.5 place-items-center rounded-lg bg-amber-50 text-amber-600 shrink-0">
                    <x-icon name="car-back" class="size-4"/>
                </span>
                <div>
                    <span class="block text-xs font-bold text-slate-900">Taksasi Mobil Bekas</span>
                    <span class="text-[10px] text-slate-500 font-normal">Multi-brand &amp; tukar tambah</span>
                </div>
            </a>

            <a href="{{ route('pages.property') }}"
               class="flex items-center gap-3 rounded-xl p-2.5 text-xs font-semibold text-slate-700 transition hover:bg-slate-50 hover:text-slate-900">
                <span class="grid size-8.5 place-items-center rounded-lg bg-emerald-50 text-emerald-600 shrink-0">
                    <x-icon name="building" class="size-4"/>
                </span>
                <div>
                    <span class="block text-xs font-bold text-slate-900">Konsultasi Properti</span>
                    <span class="text-[10px] text-slate-500 font-normal">Titip jual / cari rumah SHM</span>
                </div>
            </a>
        </div>
    </div>

    <button @click="open = !open"
            type="button"
            class="group flex size-11 sm:size-12 items-center justify-center rounded-full bg-emerald-600 text-white shadow-md transition-all duration-200 hover:bg-emerald-500 hover:scale-105 active:scale-95"
            aria-label="Hubungi WhatsApp Admin">
        <x-icon name="whatsapp" class="size-5 sm:size-5.5 text-white" x-show="!open"/>
        <x-icon name="x" class="size-5 text-white" x-show="open" x-cloak/>
    </button>
</div>

