<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="data:image/svg+xml,{{ urlencode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><rect width="32" height="32" rx="8" fill="#0a1626"/><path d="M16 7 L25 14 L22.5 14 L22.5 24 L19.5 24 L19.5 17 L12.5 17 L12.5 24 L9.5 24 L9.5 14 L7 14 Z" fill="#1d4ed8"/></svg>') }}">
    <meta name="robots" content="noindex, nofollow">
    <x-seo :title="$title ?? 'Admin'"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>[x-cloak] { display: none !important; }</style>
    @stack('styles')
</head>
<body class="bg-gray-50" data-authed="1">
    <div class="flex min-h-screen">
        <x-sidebar-admin/>

        <div class="flex min-w-0 flex-1 flex-col lg:pl-64">
            <header class="sticky top-0 z-30 flex h-16 items-center gap-4 border-b border-gray-200 bg-white/80 backdrop-blur-md px-4 sm:px-6">
                <button type="button"
                        class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 lg:hidden"
                        x-data
                        @click="$dispatch('sidebar-toggle')"
                        aria-label="Buka menu">
                    <x-icon name="menu" class="size-6"/>
                </button>

                <div class="min-w-0 flex-1">
                    <h1 class="truncate text-base font-bold text-gray-900 sm:text-lg">{{ $pageTitle ?? 'Admin Dashboard' }}</h1>
                </div>

                <div class="flex items-center gap-3" x-data="userMenu" @click.outside="close()">
                    <a href="{{ route('home') }}" class="btn-outline btn-sm hidden sm:inline-flex">
                        <x-icon name="globe" class="size-4"/> Lihat Situs
                    </a>
                    <span class="hidden text-right sm:block">
                        <span class="block text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</span>
                        <span class="block text-xs capitalize text-gray-500">Administrator</span>
                    </span>
                    <button type="button" @click="open = !open" class="flex items-center gap-2 rounded-full focus:outline-none">
                        <span class="grid size-9 place-items-center overflow-hidden rounded-full bg-primary-500 text-sm font-bold text-white shadow-sm">
                            @if (auth()->user()->avatar)
                                <img src="{{ Storage::disk('public')->url(auth()->user()->avatar) }}" alt="" class="size-full object-cover">
                            @else
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            @endif
                        </span>
                        <x-icon name="chevron-down" class="size-4 text-gray-400"/>
                    </button>

                    <div x-show="open" x-transition class="absolute right-4 top-16 z-40 w-56 overflow-hidden rounded-xl border border-gray-200 bg-white py-1 shadow-xl" x-cloak>
                        <div class="border-b border-gray-100 px-4 py-2.5">
                            <p class="truncate text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                            <p class="truncate text-xs text-gray-500">{{ auth()->user()->email }}</p>
                        </div>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-600 hover:bg-gray-50">
                            <x-icon name="user" class="size-4"/> Dashboard Saya
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex w-full items-center gap-2 px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50">
                                <x-icon name="logout" class="size-4"/> Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            {{-- Global Flash Messages Trigger for Toast --}}
            @if (session('success'))
                <div data-flash-toast="{{ session('success') }}" data-flash-type="success"></div>
            @elseif (session('error'))
                <div data-flash-toast="{{ session('error') }}" data-flash-type="error"></div>
            @elseif (session('warning'))
                <div data-flash-toast="{{ session('warning') }}" data-flash-type="warning"></div>
            @elseif (session('info'))
                <div data-flash-toast="{{ session('info') }}" data-flash-type="info"></div>
            @endif

            {{-- Global Error Validation Summary Banner --}}
            @if ($errors->any())
                <div data-flash-toast="Terdapat kesalahan pengisian form. Silakan periksa kembali." data-flash-type="error"></div>
                <div class="mx-4 sm:mx-6 lg:mx-8 mt-4 rounded-2xl border border-rose-300 bg-rose-50/90 p-4 text-rose-950 shadow-sm" x-data="{ show: true }" x-show="show" x-transition>
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex items-start gap-3">
                            <span class="grid size-8 place-items-center rounded-xl bg-rose-600 text-white shrink-0 mt-0.5 shadow-sm">
                                <x-icon name="x" class="size-4.5"/>
                            </span>
                            <div>
                                <h3 class="text-xs sm:text-sm font-black uppercase tracking-wider text-rose-950">Gagal Memproses Data (Terdapat Kesalahan):</h3>
                                <ul class="mt-1.5 space-y-1 text-xs font-semibold text-rose-800 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <button type="button" @click="show = false" class="text-rose-400 hover:text-rose-700 p-1 text-base leading-none" title="Tutup">&times;</button>
                    </div>
                </div>
            @endif

            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                {{ $slot }}
            </main>

            <x-confirm-modal/>

            <footer class="border-t border-gray-200 bg-white px-6 py-4">
                <p class="text-center text-xs text-gray-400">&copy; {{ date('Y') }} {{ \App\Models\Setting::get('site_name', 'SYARVA Marketplace') }} — Panel Admin</p>
            </footer>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
