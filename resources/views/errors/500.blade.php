<x-layouts.app>
    <x-slot:title>Terjadi Kesalahan</x-slot:title>

    <div class="container-app grid min-h-[70vh] place-items-center py-16">
        <div class="max-w-md text-center">
            <p class="text-7xl font-extrabold tracking-tight text-charcoal-300">500</p>
            <h1 class="mt-4 text-2xl font-bold text-charcoal-900">Terjadi Kesalahan</h1>
            <p class="mt-3 text-sm leading-relaxed text-charcoal-500">
                Maaf, terjadi kesalahan pada server. Silakan coba lagi beberapa saat.
            </p>
            <div class="mt-8 flex justify-center gap-3">
                <a href="{{ route('home') }}" class="btn-primary">
                    <x-icon name="home" class="size-4"/> Kembali ke Beranda
                </a>
                <a href="{{ route('contact') }}" class="btn-outline">Hubungi Kami</a>
            </div>
        </div>
    </div>
</x-layouts.app>
