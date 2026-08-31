<x-layouts.admin>
    <x-slot:title>Admin Dashboard</x-slot:title>
    <x-slot:pageTitle>Dashboard</x-slot:pageTitle>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition-all hover:-translate-y-0.5 hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-gray-500">Total User</p>
                    <p class="mt-1 text-2xl font-extrabold text-gray-900">{{ number_format($stats['total_users'], 0, ',', '.') }}</p>
                </div>
                <span class="grid size-10 place-items-center rounded-xl bg-primary-50 text-primary-500">
                    <x-icon name="users" class="size-5"/>
                </span>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition-all hover:-translate-y-0.5 hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-gray-500">Total Listing</p>
                    <p class="mt-1 text-2xl font-extrabold text-gray-900">{{ number_format($stats['total_listings'], 0, ',', '.') }}</p>
                </div>
                <span class="grid size-10 place-items-center rounded-xl bg-violet-50 text-violet-500">
                    <x-icon name="folder" class="size-5"/>
                </span>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition-all hover:-translate-y-0.5 hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-gray-500">Listing Aktif</p>
                    <p class="mt-1 text-2xl font-extrabold text-gray-900">{{ number_format($stats['total_published'], 0, ',', '.') }}</p>
                </div>
                <span class="grid size-10 place-items-center rounded-xl bg-emerald-50 text-emerald-500">
                    <x-icon name="check-badge" class="size-5"/>
                </span>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm transition-all hover:-translate-y-0.5 hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-gray-500">Total Inquiry</p>
                    <p class="mt-1 text-2xl font-extrabold text-gray-900">{{ number_format($stats['total_inquiries'], 0, ',', '.') }}</p>
                </div>
                <span class="grid size-10 place-items-center rounded-xl bg-sky-50 text-sky-500">
                    <x-icon name="send" class="size-5"/>
                </span>
            </div>
        </div>
    </div>

    <div class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-2xl border border-accent-200 bg-accent-50/50 p-5 transition-all hover:-translate-y-0.5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-accent-700">Listing Unggulan</p>
                    <p class="mt-1 text-2xl font-extrabold text-accent-900">{{ number_format($stats['total_featured'] ?? 0, 0, ',', '.') }}</p>
                </div>
                <span class="grid size-10 place-items-center rounded-xl bg-accent-100 text-accent-600">
                    <x-icon name="star" class="size-5"/>
                </span>
            </div>
        </div>

        <div class="rounded-2xl border border-red-200 bg-red-50 p-5 transition-all hover:-translate-y-0.5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-red-700">Terjual</p>
                    <p class="mt-1 text-2xl font-extrabold text-red-900">{{ number_format($stats['total_sold'], 0, ',', '.') }}</p>
                </div>
                <span class="grid size-10 place-items-center rounded-xl bg-red-100 text-red-600">
                    <x-icon name="check-circle" class="size-5"/>
                </span>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-5 transition-all hover:-translate-y-0.5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-gray-500">Inquiry Belum Dibaca</p>
                    <p class="mt-1 text-2xl font-extrabold text-gray-900">{{ number_format($stats['unread_inquiries'], 0, ',', '.') }}</p>
                </div>
                <span class="grid size-10 place-items-center rounded-xl bg-gray-100 text-gray-500">
                    <x-icon name="bell" class="size-5"/>
                </span>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-5 transition-all hover:-translate-y-0.5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-gray-500">Total Dilihat</p>
                    <p class="mt-1 text-2xl font-extrabold text-gray-900">{{ number_format($stats['total_views'], 0, ',', '.') }}</p>
                </div>
                <span class="grid size-10 place-items-center rounded-xl bg-gray-100 text-gray-500">
                    <x-icon name="eye" class="size-5"/>
                </span>
            </div>
        </div>
    </div>

    <div class="mt-8 grid gap-6 lg:grid-cols-2">
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <h2 class="text-base font-bold text-gray-900">Listing per Kategori</h2>
            <div class="mt-4 h-64">
                <canvas data-chart="doughnut"
                        data-labels='{!! json_encode($byCategory->pluck('label')->all()) !!}'
                        data-values='{!! json_encode($byCategory->pluck('value')->all()) !!}'
                        data-label="Listing"></canvas>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <h2 class="text-base font-bold text-gray-900">Listing per Bulan (12 bulan terakhir)</h2>
            <div class="mt-4 h-64">
                <canvas data-chart="bar"
                        data-labels='{!! json_encode($listingsPerMonth['labels']) !!}'
                        data-values='{!! json_encode($listingsPerMonth['values']) !!}'
                        data-label="Listing"></canvas>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <h2 class="text-base font-bold text-gray-900">Registrasi User per Bulan</h2>
            <div class="mt-4 h-64">
                <canvas data-chart="line"
                        data-labels='{!! json_encode($usersPerMonth['labels']) !!}'
                        data-values='{!! json_encode($usersPerMonth['values']) !!}'
                        data-label="User"></canvas>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <h2 class="text-base font-bold text-gray-900">Inquiry per Bulan</h2>
            <div class="mt-4 h-64">
                <canvas data-chart="bar"
                        data-labels='{!! json_encode($inquiriesPerMonth['labels']) !!}'
                        data-values='{!! json_encode($inquiriesPerMonth['values']) !!}'
                        data-label="Inquiry"></canvas>
            </div>
        </div>
    </div>

    <div class="mt-8 grid gap-6 lg:grid-cols-2">
        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm">
            <div class="flex items-center justify-between border-b border-gray-100 px-6 py-4">
                <h2 class="text-base font-bold text-gray-900">Listing Terbaru</h2>
                <a href="{{ route('admin.listings.index') }}" class="btn-ghost btn-sm">Semua Listing</a>
            </div>
            @if ($stats['recent_listings']->isNotEmpty())
                <ul class="divide-y divide-gray-100">
                    @foreach ($stats['recent_listings'] as $listing)
                        <li class="flex items-center gap-4 px-6 py-3.5 transition-colors hover:bg-gray-50">
                            <a href="{{ route('admin.listings.show', $listing) }}" class="size-11 shrink-0 overflow-hidden rounded-xl bg-gray-100">
                                @if ($listing->primaryImage)
                                    <img src="{{ $listing->primaryImage->url }}" alt="" loading="lazy" class="size-full object-cover">
                                @endif
                            </a>
                            <div class="min-w-0 flex-1">
                                <a href="{{ route('admin.listings.show', $listing) }}" class="block truncate text-sm font-semibold text-gray-800 hover:text-primary-600">{{ $listing->title }}</a>
                                <p class="text-xs text-gray-400">{{ $listing->user->name }}</p>
                            </div>
                            <x-badge :status="$listing->status" class="shrink-0"/>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="px-6 py-8 text-center text-sm text-gray-400">Belum ada listing.</p>
            @endif
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm">
            <div class="flex items-center justify-between border-b border-gray-100 px-6 py-4">
                <h2 class="text-base font-bold text-gray-900">Inquiry Terbaru</h2>
                <a href="{{ route('admin.inquiries.index') }}" class="btn-ghost btn-sm">Semua Inquiry</a>
            </div>
            @if ($stats['recent_inquiries']->isNotEmpty())
                <ul class="divide-y divide-gray-100">
                    @foreach ($stats['recent_inquiries'] as $inquiry)
                        <li class="flex items-center gap-4 px-6 py-3.5 transition-colors hover:bg-gray-50">
                            <span class="grid size-10 shrink-0 place-items-center rounded-full bg-primary-50 text-sm font-bold text-primary-600">
                                {{ strtoupper(substr($inquiry->name, 0, 1)) }}
                            </span>
                            <div class="min-w-0 flex-1">
                                <p class="truncate text-sm font-semibold text-gray-800">{{ $inquiry->name }} <span class="font-normal text-gray-400">→ {{ $inquiry->listing->title ?? 'Listing dihapus' }}</span></p>
                                <p class="text-xs text-gray-400">{{ $inquiry->created_at->diffForHumans() }}</p>
                            </div>
                            <x-badge :status="$inquiry->status" class="shrink-0"/>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="px-6 py-8 text-center text-sm text-gray-400">Belum ada inquiry.</p>
            @endif
        </div>
    </div>

    @push('scripts')
        @vite('resources/js/admin-charts.js')
    @endpush
</x-layouts.admin>
