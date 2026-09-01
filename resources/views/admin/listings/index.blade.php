<x-layouts.admin>
    <x-slot:title>Kelola Listing</x-slot:title>
    <x-slot:pageTitle>Kelola Listing</x-slot:pageTitle>

    <form method="GET" action="{{ request()->url() }}" class="mb-5 flex flex-wrap items-center gap-2">
        <label class="relative">
            <x-icon name="search" class="pointer-events-none absolute left-3 top-1/2 size-4 -translate-y-1/2 text-slate-400"/>
            <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari judul, penjual..." class="input w-56! pl-9! py-2! text-sm">
        </label>
        <select name="status" class="input w-auto! py-2! text-sm" aria-label="Filter status">
            <option value="">Semua Status</option>
            @foreach ($statuses as $status)
                <option value="{{ $status }}" @selected(request('status') === $status)>{{ ucfirst($status) }}</option>
            @endforeach
        </select>
        <select name="category_id" class="input w-auto! py-2! text-sm" aria-label="Filter kategori">
            <option value="">Semua Kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected((string) request('category_id') === (string) $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
        <select name="featured" class="input w-auto! py-2! text-sm" aria-label="Filter unggulan">
            <option value="">Semua</option>
            <option value="1" @selected(request('featured') === '1')>Unggulan</option>
            <option value="0" @selected(request('featured') === '0')>Bukan Unggulan</option>
        </select>
        <select name="sort" class="input w-auto! py-2! text-sm" aria-label="Urutkan">
            <option value="newest" @selected(request('sort', 'newest') === 'newest')>Terbaru</option>
            <option value="oldest" @selected(request('sort') === 'oldest')>Terlama</option>
            <option value="price_asc" @selected(request('sort') === 'price_asc')>Harga Terendah</option>
            <option value="price_desc" @selected(request('sort') === 'price_desc')>Harga Tertinggi</option>
            <option value="views" @selected(request('sort') === 'views')>Paling Dilihat</option>
        </select>
        <button type="submit" class="btn-outline btn-sm">Filter</button>
        @if (request()->hasAny(['q', 'status', 'category_id', 'featured', 'sort']))
            <a href="{{ request()->url() }}" class="btn-ghost btn-sm">Reset</a>
        @endif
    </form>

    @if ($listings->isNotEmpty())
        <div class="card overflow-hidden">
            <div class="table-wrap">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="th">Listing</th>
                            <th class="th hidden lg:table-cell">Penjual</th>
                            <th class="th hidden md:table-cell">Harga</th>
                            <th class="th">Status</th>
                            <th class="th hidden sm:table-cell">Dilihat</th>
                            <th class="th hidden xl:table-cell">Dibuat</th>
                            <th class="th text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($listings as $listing)
                            <tr class="hover:bg-slate-50/60">
                                <td class="td">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('admin.listings.show', $listing) }}" class="size-11 shrink-0 overflow-hidden rounded-lg bg-slate-100">
                                            @if ($listing->primaryImage)
                                                <img src="{{ $listing->primaryImage->url }}" alt="" loading="lazy" class="size-full object-cover">
                                            @endif
                                        </a>
                                        <div class="min-w-0">
                                            <a href="{{ route('admin.listings.show', $listing) }}" class="block max-w-60 truncate text-sm font-semibold text-slate-800 hover:text-primary-700">{{ $listing->title }}</a>
                                            <span class="text-xs text-slate-400">{{ $listing->category->name }} @if ($listing->featured) &middot; <span class="font-semibold text-accent-700">★ Unggulan</span> @endif</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="td hidden lg:table-cell">{{ $listing->user->name }}</td>
                                <td class="td hidden whitespace-nowrap md:table-cell">Rp {{ number_format((float) $listing->price, 0, ',', '.') }}</td>
                                <td class="td"><x-badge :status="$listing->status"/></td>
                                <td class="td hidden whitespace-nowrap sm:table-cell">{{ number_format($listing->view_count, 0, ',', '.') }}</td>
                                <td class="td hidden whitespace-nowrap xl:table-cell">{{ $listing->created_at->translatedFormat('d M Y') }}</td>
                                <td class="td text-right" x-data="{ open: false }">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <a href="{{ route('admin.listings.edit', $listing) }}" class="btn-outline btn-sm !p-2 text-slate-700 hover:text-red-600 hover:border-red-300" title="Edit Listing &amp; Foto">
                                            <x-icon name="pencil" class="size-3.5"/>
                                        </a>
                                        <div class="relative inline-block text-left" @click.outside="open = false">
                                            <button type="button" class="btn-outline btn-sm" @click="open = !open">
                                                Aksi <x-icon name="chevron-down" class="size-3.5"/>
                                            </button>
                                        <div x-show="open" x-transition class="absolute right-0 z-20 mt-1 w-48 overflow-hidden rounded-xl border border-slate-200 bg-white py-1 text-left shadow-lg" x-cloak>
                                            <a href="{{ route('admin.listings.show', $listing) }}" class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-50">
                                                <x-icon name="eye" class="mr-1.5 inline size-4"/> Detail
                                            </a>
                                            <a href="{{ route('admin.listings.edit', $listing) }}" class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-50">
                                                <x-icon name="pencil" class="mr-1.5 inline size-4"/> Edit
                                            </a>
                                            @if ($listing->status === \App\Enums\ListingStatus::PENDING)
                                                <form method="POST" action="{{ route('admin.listings.approve', $listing) }}">
                                                    @csrf
                                                    <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-emerald-700 hover:bg-emerald-50">
                                                        <x-icon name="check" class="mr-1.5 inline size-4"/> Approve
                                                    </button>
                                                </form>
                                            @endif
                                            <form method="POST" action="{{ route('admin.listings.feature', $listing) }}">
                                                @csrf
                                                <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-accent-700 hover:bg-amber-50">
                                                    <x-icon name="star" class="mr-1.5 inline size-4"/> {{ $listing->featured ? 'Hapus Unggulan' : 'Jadikan Unggulan' }}
                                                </button>
                                            </form>
                                            <a href="{{ route('listings.show', $listing->slug) }}" target="_blank" class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-50">
                                                <x-icon name="external" class="mr-1.5 inline size-4"/> Lihat di Situs
                                            </a>
                                            <form method="POST" action="{{ route('admin.listings.destroy', $listing) }}" class="border-t border-slate-100">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50" @click.prevent="$dispatch('confirm-action', { form: $el.closest('form'), message: 'Hapus listing ini? Data akan diarsipkan (soft delete).' })">
                                                    <x-icon name="trash" class="mr-1.5 inline size-4"/> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-6">
            {{ $listings->links() }}
        </div>
    @else
        <x-empty-state title="Listing tidak ditemukan" message="Tidak ada listing yang cocok dengan filter Anda." icon="folder"/>
    @endif
</x-layouts.admin>