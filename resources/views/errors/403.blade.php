<x-layouts.app>
    <x-slot:title>Akses Ditolak</x-slot:title>

    <div class="container-app grid min-h-[70vh] place-items-center py-16">
        <div class="max-w-md text-center">
            <p class="text-7xl font-extrabold tracking-tight text-red-500">403</p>
            <h1 class="mt-4 text-2xl font-bold text-charcoal-900">Akses Ditolak</h1>
            <p class="mt-3 text-sm leading-relaxed text-charcoal-500">
                Anda tidak memiliki izin untuk mengakses halaman ini.
            </p>
            <div class="mt-8 flex justify-center gap-3">
                <a href="{{ route('home') }}" class="btn-primary">
                    <x-icon name="home" class="size-4"/> Kembali ke Beranda
                </a>
                @auth
                    <a href="{{ route('home') }}" class="btn-outline">Kembali</a>
                @endauth
            </div>
        </div>
    </div>
</x-layouts.app>
