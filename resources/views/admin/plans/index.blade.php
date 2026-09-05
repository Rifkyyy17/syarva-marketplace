<x-layouts.admin>
    <x-slot:title>Kelola Paket Membership</x-slot:title>
    <x-slot:pageTitle>Kelola Paket Membership &amp; Iklan</x-slot:pageTitle>

    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-sm text-slate-500">Kelola daftar harga, kuota iklan, fitur unggulan, dan status paket yang tampil di halaman publik.</p>
        </div>
        <div class="flex items-center gap-2.5">
            <a href="{{ route('pricing') }}" target="_blank" rel="noopener" class="btn-outline btn-sm">
                <x-icon name="globe" class="size-4"/> Lihat Halaman Publik
            </a>
            <a href="{{ route('admin.plans.create') }}" class="btn-primary btn-sm">
                <x-icon name="plus" class="size-4"/> Tambah Paket
            </a>
        </div>
    </div>

    @if ($plans->isEmpty())
        <div class="card p-12 text-center">
            <span class="mx-auto grid size-12 place-items-center rounded-2xl bg-slate-100 text-slate-700 shadow-xs">
                <x-icon name="tag" class="size-6"/>
            </span>
            <h3 class="mt-4 text-base font-bold text-slate-900">Belum ada paket membership</h3>
            <p class="mt-1 text-sm text-slate-500">Buat paket pertama Anda untuk mulai memonetisasi platform listing ini.</p>
            <div class="mt-6">
                <a href="{{ route('admin.plans.create') }}" class="btn-primary btn-sm">
                    <x-icon name="plus" class="size-4"/> Tambah Paket Sekarang
                </a>
            </div>
        </div>
    @else
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($plans as $plan)
                <div class="card relative flex flex-col justify-between overflow-hidden border transition hover:shadow-md {{ $plan->is_featured ? 'border-primary-500 ring-2 ring-primary-500/20' : 'border-slate-200' }}">
                    @if ($plan->badge_label)
                        <div class="absolute right-4 top-4">
                            <span class="rounded-full bg-slate-900 px-3 py-1 text-[11px] font-extrabold uppercase tracking-wider text-white shadow-xs">
                                {{ $plan->badge_label }}
                            </span>
                        </div>
                    @endif

                    <div class="p-6">
                        <div class="flex items-center gap-2">
                            <h3 class="text-lg font-extrabold text-slate-900">{{ $plan->name }}</h3>
                            @if ($plan->is_featured)
                                <span class="rounded bg-amber-50 px-2 py-0.5 text-[10px] font-bold text-amber-700 border border-amber-200">Featured</span>
                            @endif
                        </div>

                        <p class="mt-1 text-xs text-slate-500 min-h-[32px]">{{ $plan->description ?? 'Tidak ada deskripsi.' }}</p>

                        <div class="mt-4 rounded-xl bg-slate-50 p-4 border border-slate-100">
                            <div class="flex items-baseline gap-1">
                                <span class="text-2xl font-black text-slate-900">{{ $plan->formatted_price }}</span>
                                @if ($plan->price > 0)
                                    <span class="text-xs font-semibold text-slate-500">/ {{ $plan->duration_days }} hari</span>
                                @else
                                    <span class="text-xs font-semibold text-slate-500">/ selamanya</span>
                                @endif
                            </div>

                            <div class="mt-3 grid grid-cols-2 gap-2 border-t border-slate-200/60 pt-3 text-xs">
                                <div>
                                    <span class="text-slate-400 block text-[11px]">Kuota Iklan</span>
                                    <span class="font-bold text-slate-800">{{ $plan->listing_limit }} Slot</span>
                                </div>
                                <div>
                                    <span class="text-slate-400 block text-[11px]">Iklan Unggulan</span>
                                    <span class="font-bold text-slate-800">{{ $plan->featured_limit }} Slot</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Fitur &amp; Keunggulan:</p>
                            <ul class="mt-2 space-y-1.5 text-xs text-slate-600">
                                @foreach ((array) ($plan->features ?? []) as $feat)
                                    <li class="flex items-start gap-2">
                                        <x-icon name="check" class="size-3.5 shrink-0 text-emerald-600 mt-0.5"/>
                                        <span>{{ $feat }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="border-t border-slate-100 bg-slate-50/70 px-6 py-4 flex items-center justify-between gap-2">
                        <form method="POST" action="{{ route('admin.plans.toggle-status', $plan) }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-xs font-semibold {{ $plan->is_active ? 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100 border border-emerald-200' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 border border-slate-200' }}" title="Klik untuk ubah status">
                                <span class="size-1.5 rounded-full {{ $plan->is_active ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                {{ $plan->is_active ? 'Aktif' : 'Nonaktif' }}
                            </button>
                        </form>

                        <div class="flex items-center gap-1.5">
                            <a href="{{ route('admin.plans.edit', $plan) }}" class="btn-outline btn-sm !px-2.5" title="Edit Paket">
                                <x-icon name="pencil" class="size-3.5"/> Edit
                            </a>

                            <form method="POST" action="{{ route('admin.plans.destroy', $plan) }}" onsubmit="return confirm('Hapus paket membership {{ $plan->name }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-lg p-2 text-slate-400 hover:bg-red-50 hover:text-red-600 transition" title="Hapus Paket">
                                    <x-icon name="trash" class="size-3.5"/>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-layouts.admin>
