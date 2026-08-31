@php
    $nav = [
        ['label' => 'Profil', 'route' => 'user.profile.edit', 'icon' => 'user'],
        ['label' => 'Favorit', 'route' => 'user.favorites.index', 'icon' => 'heart'],
        ['label' => 'Inquiry', 'route' => 'user.inquiries.index', 'icon' => 'send'],
        ['label' => 'Pengaturan', 'route' => 'user.settings', 'icon' => 'settings'],
    ];
@endphp

<aside
    x-data="{ open: false }"
    x-on:sidebar-toggle.window="open = !open"
    class="fixed inset-y-0 left-0 z-50 w-64 -translate-x-full overflow-y-auto border-r border-slate-200 bg-white transition-transform duration-200 lg:translate-x-0"
    :class="open ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    x-cloak>
    <div class="flex h-16 items-center justify-between border-b border-slate-200 px-5">
        <a href="{{ route('home') }}" class="flex items-center gap-2.5">
            <span class="grid size-9 place-items-center rounded-lg bg-primary-700 text-white">
                <svg viewBox="0 0 24 24" class="size-5" fill="currentColor" aria-hidden="true">
                    <path d="M12 2 21 8l-1.6 1.2V21h-5v-6h-4.8v6H4.6V9.2L3 8z"/>
                </svg>
            </span>
            <span class="text-lg font-extrabold tracking-tight text-slate-900">SYARVA</span>
        </a>
        <button type="button" class="rounded-lg p-1.5 text-slate-400 hover:bg-slate-100 lg:hidden" @click="open = false" aria-label="Tutup menu">
            <x-icon name="x" class="size-5"/>
        </button>
    </div>

    <nav class="space-y-1 px-3 py-4">
        @foreach ($nav as $item)
            <x-sidebar-link :href="route($item['route'])" :icon="$item['icon']" :active="request()->routeIs($item['route'])">
                {{ $item['label'] }}
            </x-sidebar-link>
        @endforeach

        @if (auth()->user()->isAdmin())
            <div class="pt-4">
                <p class="px-3 pb-2 text-[11px] font-semibold uppercase tracking-wider text-slate-400">Administrasi</p>
                <x-sidebar-link :href="route('admin.dashboard')" icon="shield" :active="request()->routeIs('admin.*')">
                    Panel Admin
                </x-sidebar-link>
            </div>
        @endif
    </nav>
</aside>

<div x-data="{ open: false }" x-on:sidebar-toggle.window="open = !open"
     class="fixed inset-0 z-40 bg-slate-900/50 backdrop-blur-sm lg:hidden"
     x-show="open" x-transition @click="open = false" x-cloak></div>