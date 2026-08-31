@php
    $groups = [
        [
            'label' => 'Dashboard',
            'route' => 'admin.dashboard',
            'icon' => 'dashboard',
            'items' => null,
        ],
        [
            'label' => 'Listings',
            'icon' => 'folder',
            'items' => [
                ['label' => 'Tambah Unit', 'route' => 'admin.listings.create', 'icon' => 'plus'],
                ['label' => 'Semua Listing', 'route' => 'admin.listings.index', 'icon' => 'list'],
                ['label' => 'Rumah', 'route' => 'admin.listings.index', 'icon' => 'building', 'params' => ['category' => 'rumah']],
                ['label' => 'Tanah', 'route' => 'admin.listings.index', 'icon' => 'map', 'params' => ['category' => 'tanah']],
                ['label' => 'Honda (Mobil Baru)', 'route' => 'admin.listings.index', 'icon' => 'car-front', 'params' => ['category' => 'mobil-baru']],
                ['label' => 'Mobil Second', 'route' => 'admin.listings.index', 'icon' => 'car-back', 'params' => ['category' => 'mobil-second']],
            ],
        ],
        [
            'label' => 'Users',
            'icon' => 'users',
            'items' => [
                ['label' => 'Semua User', 'route' => 'admin.users.index', 'icon' => 'users'],
                ['label' => 'Pembeli', 'route' => 'admin.users.index', 'icon' => 'user', 'params' => ['role' => 'user']],
                ['label' => 'Admin', 'route' => 'admin.users.index', 'icon' => 'shield', 'params' => ['role' => 'admin']],
            ],
        ],
        [
            'label' => 'Kategori',
            'icon' => 'tag',
            'items' => [
                ['label' => 'Kategori & Subkategori', 'route' => 'admin.categories.index', 'icon' => 'tag'],
            ],
        ],
        [
            'label' => 'Lokasi',
            'icon' => 'map-pin',
            'items' => [
                ['label' => 'Provinsi', 'route' => 'admin.locations.provinces', 'icon' => 'map-pin'],
                ['label' => 'Kota/Kabupaten', 'route' => 'admin.locations.cities', 'icon' => 'map'],
                ['label' => 'Kecamatan', 'route' => 'admin.locations.districts', 'icon' => 'layers'],
            ],
        ],
        [
            'label' => 'Inquiry',
            'icon' => 'send',
            'items' => [
                ['label' => 'Semua Inquiry', 'route' => 'admin.inquiries.index', 'icon' => 'send'],
            ],
        ],
        [
            'label' => 'Reports',
            'icon' => 'chart',
            'items' => [
                ['label' => 'Listing Report', 'route' => 'admin.reports.listings', 'icon' => 'folder'],
                ['label' => 'User Report', 'route' => 'admin.reports.users', 'icon' => 'users'],
                ['label' => 'Inquiry Report', 'route' => 'admin.reports.inquiries', 'icon' => 'send'],
            ],
        ],
        [
            'label' => 'Settings',
            'icon' => 'settings',
            'items' => [
                ['label' => 'Website & SEO', 'route' => 'admin.settings.edit', 'icon' => 'settings'],
            ],
        ],
    ];
@endphp

<aside
    x-data="{ open: false }"
    x-on:sidebar-toggle.window="open = !open"
    class="fixed inset-y-0 left-0 z-50 w-64 -translate-x-full overflow-y-auto border-r border-gray-200 bg-white transition-transform duration-200 lg:translate-x-0"
    :class="open ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
    <div class="flex h-16 items-center justify-between border-b border-gray-200 px-5">
        @php
            $adminLogo = \App\Models\Setting::get('site_logo');
            $adminSiteName = \App\Models\Setting::get('site_name') ?? config('app.name');
        @endphp
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
            @if (!empty($adminLogo))
                <img src="{{ Storage::disk('public')->url($adminLogo) }}" alt="{{ $adminSiteName }}" class="h-8 max-w-[140px] object-contain">
            @else
                <span class="grid size-9 place-items-center rounded-lg bg-primary-500 text-white shadow-sm">
                    <svg viewBox="0 0 24 24" class="size-5" fill="currentColor" aria-hidden="true">
                        <path d="M12 2 21 8l-1.6 1.2V21h-5v-6h-4.8v6H4.6V9.2L3 8z"/>
                    </svg>
                </span>
                <span>
                    <span class="block text-base font-extrabold leading-tight tracking-tight text-gray-900">{{ $adminSiteName }}</span>
                    <span class="block text-[10px] font-semibold uppercase tracking-wider text-primary-500">Panel Admin</span>
                </span>
            @endif
        </a>
        <button type="button" class="rounded-lg p-1.5 text-gray-400 hover:bg-gray-100 lg:hidden" @click="open = false" aria-label="Tutup menu">
            <x-icon name="x" class="size-5"/>
        </button>
    </div>

    <nav class="space-y-1 px-3 py-4" x-data="{ openGroup: '{{ request()->routeIs('admin.listings.*') ? 'Listings' : '' }}' }">
        @foreach ($groups as $group)
            @if ($group['items'] === null)
                <x-sidebar-link :href="route($group['route'])" :icon="$group['icon']" :active="request()->routeIs($group['route'])">
                    {{ $group['label'] }}
                </x-sidebar-link>
            @else
                <div>
                    <button type="button"
                            class="flex w-full items-center justify-between rounded-xl px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-primary-50 hover:text-primary-700 transition-colors"
                            @click="openGroup = openGroup === '{{ $group['label'] }}' ? '' : '{{ $group['label'] }}'">
                        <span class="flex items-center gap-3">
                            <x-icon :name="$group['icon']" class="size-4"/>
                            {{ $group['label'] }}
                        </span>
                        <span :class="openGroup === '{{ $group['label'] }}' ? 'inline-block rotate-180' : 'inline-block'">
                            <x-icon name="chevron-down" class="size-3.5 transition-transform"/>
                        </span>
                    </button>
                    <div x-show="openGroup === '{{ $group['label'] }}'" x-collapse class="mt-1 space-y-0.5 pl-4">
                        @foreach ($group['items'] as $item)
                            @php
                                $isActive = request()->routeIs($item['route']) &&
                                    collect($item['params'] ?? [])->every(fn ($v, $k) => request()->input($k) == $v);
                            @endphp
                            <a href="{{ route($item['route'], $item['params'] ?? []) }}"
                               class="flex items-center gap-2.5 rounded-lg px-3 py-2 text-[13px] {{ $isActive ? 'bg-primary-50 font-semibold text-primary-700' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-800' }} transition-colors">
                                <x-icon :name="$item['icon']" class="size-3.5"/>
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </nav>
</aside>

<div x-data="{ open: false }" x-on:sidebar-toggle.window="open = !open"
     class="fixed inset-0 z-40 bg-gray-900/50 backdrop-blur-sm lg:hidden"
     x-show="open" x-transition @click="open = false" x-cloak></div>
