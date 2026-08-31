<x-layouts.app>
    <x-slot:title>Halaman Tidak Ditemukan</x-slot:title>

    <div class="container-app grid min-h-[70vh] place-items-center py-16">
        <div class="max-w-md text-center">
            <p class="text-7xl font-extrabold tracking-tight text-primary-500">404</p>
            <h1 class="mt-4 text-2xl font-bold text-charcoal-900">Halaman Tidak Ditemukan</h1>
            <p class="mt-3 text-sm leading-relaxed text-charcoal-500">
                Halaman yang Anda cari mungkin telah dipindahkan, dihapus, atau alamatnya salah.
            </p>
            <div class="mt-8 flex justify-center gap-3">
                <a href="{{ route('home') }}" class="btn-primary">
                    <x-icon name="home" class="size-4"/> Kembali ke Beranda
                </a>
                <a href="{{ route('listings.index') }}" class="btn-outline">Jelajahi Listing</a>
            </div>
        </div>
    </div>
</x-layouts.app>
