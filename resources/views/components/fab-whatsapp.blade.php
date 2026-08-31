@php
    $whatsappNumber = \App\Models\Setting::get('contact_whatsapp', '6281234567890');
    $isDetailPage = request()->routeIs('listings.show');
@endphp

<div x-data="{ open: false }" class="fixed {{ $isDetailPage ? 'hidden lg:block' : '' }} bottom-18 sm:bottom-22 right-4 sm:right-6 z-40">
    <div x-show="open" x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-90 translate-y-2"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
         x-transition:leave-end="opacity-0 scale-90 translate-y-2"
         x-cloak
         class="absolute bottom-16 right-0 w-[calc(100vw-2rem)] max-w-xs sm:w-72 overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-2xl">

        <div class="bg-charcoal-900 px-5 py-4">
            <h3 class="text-sm font-bold text-white">Hubungi Admin SYARVA</h3>
            <p class="mt-0.5 text-xs text-white/60">Pilih layanan yang Anda butuhkan</p>
        </div>

        <div class="p-3 space-y-1.5">
            <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode('Halo Admin, saya tertarik dengan promo mobil Honda terbaru. Bisa info lebih lanjut?') }}"
               target="_blank" rel="noopener"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-charcoal-700 transition-colors hover:bg-gray-50">
                <span class="grid size-10 place-items-center rounded-xl bg-primary-50 text-primary-500">
                    <x-icon name="car-front" class="size-5"/>
                </span>
                <span>
                    <span class="block font-semibold text-charcoal-900">Chat Promo Honda Baru</span>
                    <span class="text-xs text-charcoal-400">Konsultasi &amp; harga OTR</span>
                </span>
            </a>

            <a href="{{ route('pages.sell-car') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-charcoal-700 transition-colors hover:bg-gray-50">
                <span class="grid size-10 place-items-center rounded-xl bg-amber-50 text-amber-600">
                    <x-icon name="car-back" class="size-5"/>
                </span>
                <span>
                    <span class="block font-semibold text-charcoal-900">Taksasi Jual Mobil Bekas</span>
                    <span class="text-xs text-charcoal-400">Multi-brand, taksasi gratis</span>
                </span>
            </a>

            <a href="{{ route('pages.property') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-charcoal-700 transition-colors hover:bg-gray-50">
                <span class="grid size-10 place-items-center rounded-xl bg-emerald-50 text-emerald-600">
                    <x-icon name="building" class="size-5"/>
                </span>
                <span>
                    <span class="block font-semibold text-charcoal-900">Konsultasi Properti</span>
                    <span class="text-xs text-charcoal-400">Jual / beli rumah &amp; tanah</span>
                </span>
            </a>
        </div>
    </div>

    <button @click="open = !open"
            class="group grid size-12 sm:size-14 place-items-center rounded-full bg-whatsapp text-white shadow-lg shadow-whatsapp/30 transition-all duration-300 hover:bg-whatsapp-hover hover:scale-105 active:scale-95 hover:shadow-xl hover:shadow-whatsapp/40"
            :class="open ? 'rotate-0' : ''"
            aria-label="Hubungi WhatsApp Admin">
        <svg x-show="!open" viewBox="0 0 24 24" class="size-5.5 sm:size-6.5" fill="currentColor">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
        <svg x-show="open" x-cloak viewBox="0 0 24 24" class="size-5 sm:size-6" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
            <path d="M18 6L6 18M6 6l12 12"/>
        </svg>
    </button>
</div>

<style>
    @keyframes whatsapp-pulse {
        0%, 100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.4); }
        50% { box-shadow: 0 0 0 12px rgba(37, 211, 102, 0); }
    }
    [x-data] > button:not([class*="rotate"]) {
        animation: whatsapp-pulse 2s infinite;
    }
</style>
