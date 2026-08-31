@php
    $categories = \App\Models\Category::active()->whereNull('parent_id')->with('children')->orderBy('sort_order')->get();
@endphp

<header class="sticky top-0 z-40 border-b border-white/10 bg-charcoal-900 text-white" x-data="mobileMenu">
    <nav class="container-app flex h-16 items-center justify-between gap-4" aria-label="Navigasi utama">
        @php
            $siteLogo = \App\Models\Setting::get('site_logo');
            $siteName = \App\Models\Setting::get('site_name') ?? config('app.name');
            $siteWhatsapp = \App\Models\Setting::get('contact_whatsapp', '6281234567890');
        @endphp
        <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-2.5" aria-label="Beranda {{ $siteName }}">
            @if (!empty($siteLogo))
                <img src="{{ Storage::disk('public')->url($siteLogo) }}" alt="{{ $siteName }}" class="h-9 max-w-[180px] object-contain"
                     onerror="this.style.display='none'; if (this.nextElementSibling) this.nextElementSibling.classList.remove('hidden');">
                <span class="hidden items-center gap-2.5">
                    <span class="grid size-9 place-items-center rounded-lg bg-primary-500 text-white shadow-sm">
                        <svg viewBox="0 0 24 24" class="size-5" fill="currentColor" aria-hidden="true"><path d="M12 2 21 8l-1.6 1.2V21h-5v-6h-4.8v6H4.6V9.2L3 8z"/></svg>
                    </span>
                    <span class="text-lg font-extrabold tracking-tight">{{ $siteName }}</span>
                </span>
            @else
                <span class="grid size-9 place-items-center rounded-lg bg-primary-500 text-white shadow-sm">
                    <svg viewBox="0 0 24 24" class="size-5" fill="currentColor" aria-hidden="true">
                        <path d="M12 2 21 8l-1.6 1.2V21h-5v-6h-4.8v6H4.6V9.2L3 8z"/>
                    </svg>
                </span>
                <span class="text-lg font-extrabold tracking-tight">{{ $siteName }}</span>
            @endif
        </a>

        <div class="hidden items-center gap-1 lg:flex" x-data="{ dropdown: null }" @click.outside="dropdown = null">
            <a href="{{ route('home') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-white/80 hover:bg-white/10 {{ request()->routeIs('home') ? 'text-white bg-white/10' : '' }}">Home</a>

            <div class="relative">
                <button type="button"
                        class="flex items-center gap-1 rounded-lg px-3 py-2 text-sm font-medium text-white/80 hover:bg-white/10"
                        @click="dropdown = dropdown === 'kendaraan' ? null : 'kendaraan'">
                    Honda Baru
                    <x-icon name="chevron-down" class="size-3.5 text-white/50"/>
                </button>
                <div x-show="dropdown === 'kendaraan'" x-transition class="absolute left-0 top-full z-50 mt-1 w-52 overflow-hidden rounded-xl border border-white/10 bg-charcoal-800 py-1.5 shadow-2xl" x-cloak>
                    <a href="{{ route('listings.vehicle', 'baru') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-white/80 hover:bg-white/10 hover:text-white">
                        <x-icon name="car-front" class="size-4 text-primary-400"/> Katalog Honda
                    </a>
                    <a href="{{ route('pages.sell-car') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-white/80 hover:bg-white/10 hover:text-white">
                        <x-icon name="car-back" class="size-4 text-amber-400"/> Taksasi Mobil Bekas
                    </a>
                </div>
            </div>

            <div class="relative">
                <button type="button"
                        class="flex items-center gap-1 rounded-lg px-3 py-2 text-sm font-medium text-white/80 hover:bg-white/10"
                        @click="dropdown = dropdown === 'properti' ? null : 'properti'">
                    Properti
                    <x-icon name="chevron-down" class="size-3.5 text-white/50"/>
                </button>
                <div x-show="dropdown === 'properti'" x-transition class="absolute left-0 top-full z-50 mt-1 w-52 overflow-hidden rounded-xl border border-white/10 bg-charcoal-800 py-1.5 shadow-2xl" x-cloak>
                    <a href="{{ route('listings.property', 'rumah') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-white/80 hover:bg-white/10 hover:text-white">
                        <x-icon name="building" class="size-4 text-emerald-400"/> Rumah
                    </a>
                    <a href="{{ route('listings.property', 'tanah') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-white/80 hover:bg-white/10 hover:text-white">
                        <x-icon name="map" class="size-4 text-emerald-400"/> Tanah
                    </a>
                    <a href="{{ route('pages.property') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-white/80 hover:bg-white/10 hover:text-white">
                        <x-icon name="building" class="size-4 text-emerald-400"/> Konsultasi Properti
                    </a>
                </div>
            </div>

            <a href="{{ route('about') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-white/80 hover:bg-white/10">Tentang</a>
            <a href="{{ route('contact') }}" class="rounded-lg px-3 py-2 text-sm font-medium text-white/80 hover:bg-white/10">Kontak</a>
        </div>

        <div class="flex items-center gap-2">
            @auth
                {{-- User Profile Dropdown --}}
                <div class="relative" x-data="{ userMenu: false }" @click.outside="userMenu = false">
                    <button type="button"
                            @click="userMenu = !userMenu"
                            class="flex items-center gap-2 rounded-full border border-white/20 bg-white/5 py-1 pl-1 pr-3 text-sm font-medium text-white transition hover:bg-white/10 hover:border-white/40">
                        <span class="grid size-7 place-items-center overflow-hidden rounded-full bg-primary-500 text-xs font-bold text-white shadow-sm">
                            @if (auth()->user()->avatar)
                                <img src="{{ Storage::disk('public')->url(auth()->user()->avatar) }}" alt="" class="size-full object-cover">
                            @else
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            @endif
                        </span>
                        <span class="hidden max-w-[120px] truncate sm:inline-block text-xs font-semibold">{{ auth()->user()->name }}</span>
                        <x-icon name="chevron-down" class="size-3 text-white/60 transition-transform duration-200" ::class="userMenu ? 'rotate-180' : ''"/>
                    </button>

                    <div x-show="userMenu"
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 scale-95 -translate-y-1"
                         class="absolute right-0 top-full z-50 mt-2 w-64 overflow-hidden rounded-2xl border border-white/10 bg-charcoal-800 p-1.5 shadow-2xl backdrop-blur-lg"
                         x-cloak>
                        
                        <div class="border-b border-white/10 px-3.5 py-3">
                            <p class="truncate text-xs font-bold text-white">{{ auth()->user()->name }}</p>
                            <p class="truncate text-[11px] text-white/50">{{ auth()->user()->email }}</p>
                            <span class="mt-2 inline-flex items-center rounded-md bg-primary-500/20 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider text-primary-300">
                                {{ auth()->user()->role === 'admin' ? 'Administrator' : 'Pengguna Terdaftar' }}
                            </span>
                        </div>

                        <div class="py-1 space-y-0.5">
                            @if (auth()->user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 rounded-xl px-3 py-2 text-xs font-semibold text-amber-300 hover:bg-white/10">
                                    <x-icon name="shield" class="size-4 text-amber-400"/> Panel Admin
                                </a>
                            @endif
                            <a href="{{ route('user.profile.edit') }}" class="flex items-center gap-2.5 rounded-xl px-3 py-2 text-xs font-medium text-white/80 hover:bg-white/10 hover:text-white">
                                <x-icon name="user" class="size-4 text-primary-400"/> Profil Saya
                            </a>
                            <a href="{{ route('user.inquiries.index') }}" class="flex items-center gap-2.5 rounded-xl px-3 py-2 text-xs font-medium text-white/80 hover:bg-white/10 hover:text-white">
                                <x-icon name="mail" class="size-4 text-emerald-400"/> Pesan &amp; Inquiry
                            </a>
                            <a href="{{ route('user.favorites.index') }}" class="flex items-center gap-2.5 rounded-xl px-3 py-2 text-xs font-medium text-white/80 hover:bg-white/10 hover:text-white">
                                <x-icon name="heart" class="size-4 text-red-400"/> Listing Favorit
                            </a>
                            <a href="{{ route('user.settings') }}" class="flex items-center gap-2.5 rounded-xl px-3 py-2 text-xs font-medium text-white/80 hover:bg-white/10 hover:text-white">
                                <x-icon name="settings" class="size-4 text-white/50"/> Pengaturan Akun
                            </a>
                        </div>

                        <div class="border-t border-white/10 pt-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex w-full items-center gap-2.5 rounded-xl px-3 py-2 text-xs font-semibold text-red-400 hover:bg-red-500/10 hover:text-red-300">
                                    <x-icon name="logout" class="size-4"/> Keluar (Logout)
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <a href="https://wa.me/{{ $siteWhatsapp }}?text={{ urlencode('Halo Sales SYARVA, saya ingin konsultasi unit mobil Honda / properti.') }}"
                   target="_blank" rel="noopener"
                   class="btn-whatsapp btn-sm !rounded-xl shadow-xs inline-flex items-center gap-1.5">
                    <x-icon name="whatsapp" class="size-4"/>
                    <span class="font-bold">Hubungi Sales</span>
                </a>
            @endauth

            <button type="button" class="rounded-lg p-2 text-white/80 hover:bg-white/10 lg:hidden" @click="open = !open" aria-label="Menu" aria-expanded="open">
                <x-icon name="menu" class="size-6" x-show="!open"/>
                <x-icon name="x" class="size-6" x-show="open" x-cloak/>
            </button>
        </div>
    </nav>

    <div x-show="open" x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="border-t border-white/10 bg-charcoal-900 lg:hidden" x-cloak>
        <div class="container-app space-y-1 py-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-white/80 hover:bg-white/10">
                <x-icon name="home" class="size-5 text-primary-400"/> Home
            </a>

            <div class="pt-2 pb-1 px-2">
                <p class="text-[11px] font-semibold uppercase tracking-wider text-white/30">Honda & Otomotif</p>
            </div>
            <a href="{{ route('listings.vehicle', 'baru') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-white/80 hover:bg-white/10">
                <x-icon name="car-front" class="size-5 text-primary-400"/> Katalog Honda Baru
            </a>
            <a href="{{ route('pages.sell-car') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-white/80 hover:bg-white/10">
                <x-icon name="car-back" class="size-5 text-amber-400"/> Taksasi Jual Mobil Bekas
            </a>

            <div class="pt-2 pb-1 px-2">
                <p class="text-[11px] font-semibold uppercase tracking-wider text-white/30">Properti</p>
            </div>
            <a href="{{ route('listings.property', 'rumah') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-white/80 hover:bg-white/10">
                <x-icon name="building" class="size-5 text-emerald-400"/> Rumah
            </a>
            <a href="{{ route('listings.property', 'tanah') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-white/80 hover:bg-white/10">
                <x-icon name="map" class="size-5 text-emerald-400"/> Tanah
            </a>
            <a href="{{ route('pages.property') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-white/80 hover:bg-white/10">
                <x-icon name="building" class="size-5 text-emerald-400"/> Konsultasi Properti
            </a>

            <div class="pt-2 pb-1 px-2">
                <p class="text-[11px] font-semibold uppercase tracking-wider text-white/30">Lainnya</p>
            </div>
            <a href="{{ route('about') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-white/80 hover:bg-white/10">
                <x-icon name="info" class="size-5 text-white/40"/> Tentang Kami
            </a>
            <a href="{{ route('contact') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-white/80 hover:bg-white/10">
                <x-icon name="mail" class="size-5 text-white/40"/> Kontak
            </a>

            @auth
                <div class="mt-3 border-t border-white/10 pt-3">
                    <div class="flex items-center gap-3 px-3 py-2">
                        <span class="grid size-9 place-items-center overflow-hidden rounded-full bg-primary-500 text-xs font-bold text-white shadow-sm">
                            @if (auth()->user()->avatar)
                                <img src="{{ Storage::disk('public')->url(auth()->user()->avatar) }}" alt="" class="size-full object-cover">
                            @else
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            @endif
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="truncate text-sm font-bold text-white">{{ auth()->user()->name }}</p>
                            <p class="truncate text-xs text-white/50">{{ auth()->user()->email }}</p>
                        </div>
                    </div>

                    <div class="mt-2 space-y-1">
                        @if (auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-semibold text-amber-300 hover:bg-white/10">
                                <x-icon name="shield" class="size-5 text-amber-400"/> Panel Admin
                            </a>
                        @endif
                        <a href="{{ route('user.profile.edit') }}" class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-medium text-white/80 hover:bg-white/10">
                            <x-icon name="user" class="size-5 text-primary-400"/> Profil Saya
                        </a>
                        <a href="{{ route('user.inquiries.index') }}" class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-medium text-white/80 hover:bg-white/10">
                            <x-icon name="mail" class="size-5 text-emerald-400"/> Pesan &amp; Inquiry
                        </a>
                        <a href="{{ route('user.favorites.index') }}" class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-medium text-white/80 hover:bg-white/10">
                            <x-icon name="heart" class="size-5 text-red-400"/> Listing Favorit
                        </a>
                        <a href="{{ route('user.settings') }}" class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-medium text-white/80 hover:bg-white/10">
                            <x-icon name="settings" class="size-5 text-white/50"/> Pengaturan Akun
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="pt-1">
                            @csrf
                            <button type="submit" class="flex w-full items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-semibold text-red-400 hover:bg-red-500/10 hover:text-red-300">
                                <x-icon name="logout" class="size-5"/> Keluar (Logout)
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="pt-3 border-t border-white/10">
                    <a href="https://wa.me/{{ $siteWhatsapp }}?text={{ urlencode('Halo Sales SYARVA, saya ingin konsultasi unit mobil Honda / properti.') }}"
                       target="_blank" rel="noopener"
                       class="btn-whatsapp btn-sm w-full flex items-center justify-center gap-2 !rounded-xl">
                        <x-icon name="whatsapp" class="size-4.5"/>
                        <span>Chat WhatsApp Sales</span>
                    </a>
                </div>
            @endauth
        </div>
    </div>
</header>
