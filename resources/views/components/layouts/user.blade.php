<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="data:image/svg+xml,{{ urlencode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><rect width="32" height="32" rx="8" fill="#283f67"/><path d="M16 7 L25 14 L22.5 14 L22.5 24 L19.5 24 L19.5 17 L12.5 17 L12.5 24 L9.5 24 L9.5 14 L7 14 Z" fill="#fbbf24"/></svg>') }}">
    <meta name="robots" content="noindex, nofollow">
    <x-seo :title="$title ?? 'Dashboard'"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-slate-100" data-authed="1">
    <div class="flex min-h-screen">
        <x-sidebar-user/>

        <div class="flex min-w-0 flex-1 flex-col lg:pl-64">
            <header class="sticky top-0 z-30 flex h-16 items-center gap-4 border-b border-slate-200 bg-white px-4 sm:px-6">
                <button type="button"
                        class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 lg:hidden"
                        x-data
                        @click="$dispatch('sidebar-toggle')"
                        aria-label="Buka menu">
                    <x-icon name="menu" class="size-6"/>
                </button>

                <div class="min-w-0 flex-1">
                    <h1 class="truncate text-base font-bold text-slate-900 sm:text-lg">{{ $pageTitle ?? 'Dashboard' }}</h1>
                </div>

                <div class="flex items-center gap-3" x-data="userMenu" @click.outside="close()">
                    <span class="hidden text-right sm:block">
                        <span class="block text-sm font-semibold text-slate-800">{{ auth()->user()->name }}</span>
                        <span class="block text-xs capitalize text-slate-500">{{ auth()->user()->role }}</span>
                    </span>
                    <button type="button" @click="open = !open" class="flex items-center gap-2 rounded-full focus:outline-none focus-visible:ring-2 focus-visible:ring-primary-500">
                        <span class="grid size-9 place-items-center overflow-hidden rounded-full bg-primary-700 text-sm font-bold text-white">
                            @if (auth()->user()->avatar)
                                <img src="{{ Storage::disk('public')->url(auth()->user()->avatar) }}" alt="" class="size-full object-cover">
                            @else
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            @endif
                        </span>
                        <x-icon name="chevron-down" class="size-4 text-slate-400"/>
                    </button>

                    <div x-show="open" x-transition class="absolute right-4 top-16 z-40 w-56 overflow-hidden rounded-xl border border-slate-200 bg-white py-1 shadow-lg" x-cloak>
                        <div class="border-b border-slate-100 px-4 py-2.5">
                            <p class="truncate text-sm font-semibold text-slate-800">{{ auth()->user()->name }}</p>
                            <p class="truncate text-xs text-slate-500">{{ auth()->user()->email }}</p>
                        </div>
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-slate-600 hover:bg-slate-50">
                            <x-icon name="dashboard" class="size-4"/> Dashboard
                        </a>
                        <a href="{{ route('user.profile.edit') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-slate-600 hover:bg-slate-50">
                            <x-icon name="user" class="size-4"/> Profil
                        </a>
                        <a href="{{ route('user.settings') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-slate-600 hover:bg-slate-50">
                            <x-icon name="settings" class="size-4"/> Pengaturan
                        </a>
                        @if (auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-primary-700 hover:bg-primary-50">
                                <x-icon name="shield" class="size-4"/> Panel Admin
                            </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex w-full items-center gap-2 px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50">
                                <x-icon name="logout" class="size-4"/> Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            @if (session('success') || session('error') || session('warning'))
                <div data-flash-toast="{{ session('success') ?? session('error') ?? session('warning') }}"
                     data-flash-type="{{ session('success') ? 'success' : (session('error') ? 'error' : 'info') }}"></div>
            @endif

            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                {{ $slot }}
            </main>

            <x-confirm-modal/>

            <footer class="border-t border-slate-200 bg-white px-6 py-4">
                <p class="text-center text-xs text-slate-400">&copy; {{ date('Y') }} {{ \App\Models\Setting::get('site_name', 'SYARVA Marketplace') }}</p>
            </footer>
        </div>
    </div>

    @stack('scripts')
</body>
</html>