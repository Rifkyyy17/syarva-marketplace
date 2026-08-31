<x-layouts.admin>
    <x-slot:title>Kelola Provinsi</x-slot:title>
    <x-slot:pageTitle>Kelola Provinsi</x-slot:pageTitle>

    <div class="grid gap-6 lg:grid-cols-[1fr_320px]">
        <div class="min-w-0 space-y-5">
            <form method="GET" action="{{ request()->url() }}" class="flex items-center gap-2">
                <label class="relative">
                    <x-icon name="search" class="pointer-events-none absolute left-3 top-1/2 size-4 -translate-y-1/2 text-slate-400"/>
                    <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari provinsi..." class="input w-56! pl-9! py-2! text-sm">
                </label>
                <button type="submit" class="btn-outline btn-sm">Cari</button>
                @if (request('q'))
                    <a href="{{ request()->url() }}" class="btn-ghost btn-sm">Reset</a>
                @endif
            </form>

            @if ($provinces->isNotEmpty())
                <div class="card overflow-hidden">
                    <div class="table-wrap">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th class="th">Provinsi</th>
                                    <th class="th hidden sm:table-cell">Kota/Kab</th>
                                    <th class="th hidden md:table-cell">Listing</th>
                                    <th class="th text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach ($provinces as $province)
                                    <tr x-data="{ editing: false }" class="hover:bg-slate-50/60">
                                        <td class="td">
                                            <template x-if="!editing">
                                                <p class="font-semibold text-slate-800">{{ $province->name }}</p>
                                            </template>
                                            <form x-show="editing" x-cloak method="POST" action="{{ route('admin.locations.provinces.update', $province) }}" class="flex gap-2">
                                                @csrf
                                                @method('PUT')
                                                <div class="flex-1">
                                                    <input type="text" name="name" value="{{ $province->name }}" required maxlength="100" class="input py-1!.5 text-sm">
                                                    <input type="hidden" name="slug" value="{{ $province->slug }}">
                                                </div>
                                                <button type="submit" class="btn-primary btn-sm px-2!.5" aria-label="Simpan"><x-icon name="check" class="size-4"/></button>
                                            </form>
                                        </td>
                                        <td class="td hidden sm:table-cell">{{ $province->cities_count }}</td>
                                        <td class="td hidden md:table-cell">{{ $province->listings_count }}</td>
                                        <td class="td text-right" x-data="{ open: false }">
                                            <div class="relative inline-block text-left" @click.outside="open = false">
                                                <button type="button" class="btn-outline btn-sm" @click="open = !open">
                                                    Aksi <x-icon name="chevron-down" class="size-3.5"/>
                                                </button>
                                                <div x-show="open" x-transition x-cloak class="absolute right-0 z-20 mt-1 w-44 overflow-hidden rounded-xl border border-slate-200 bg-white py-1 text-left shadow-lg">
                                                    <button type="button" class="block w-full px-4 py-2 text-left text-sm text-slate-600 hover:bg-slate-50" @click="editing = !editing; open = false">
                                                        <x-icon name="pencil" class="mr-1.5 inline size-4"/> Edit
                                                    </button>
                                                    <form method="POST" action="{{ route('admin.locations.provinces.destroy', $province) }}" class="border-t border-slate-100">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50" @click.prevent="$dispatch('confirm-action', { form: $el.closest('form'), message: 'Hapus provinsi ini?' })">
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
                    {{ $provinces->links() }}
                </div>
            @else
                <x-empty-state title="Provinsi tidak ditemukan" message="Tidak ada provinsi yang cocok dengan pencarian." icon="map"/>
            @endif
        </div>

        <aside class="lg:sticky lg:top-24 lg:self-start">
            <div class="card p-5">
                <h2 class="text-sm font-bold uppercase tracking-wide text-slate-800">Tambah Provinsi</h2>
                <form method="POST" action="{{ route('admin.locations.provinces.store') }}" class="mt-4 space-y-3">
                    @csrf
                    <div>
                        <label for="name" class="label mb-1! text-xs">Nama Provinsi</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required maxlength="100" class="input py-2! text-sm {{ $errors->has('name') ? 'input-error' : '' }}">
                        @error('name')
                            <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="slug" class="label mb-1! text-xs">Slug</label>
                        <input type="text" id="slug" name="slug" value="{{ old('slug') }}" required maxlength="100" class="input py-2! text-sm" placeholder="cth: jawa-barat">
                        @error('slug')
                            <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn-primary w-full">Simpan Provinsi</button>
                </form>
            </div>
        </aside>
    </div>
</x-layouts.admin>