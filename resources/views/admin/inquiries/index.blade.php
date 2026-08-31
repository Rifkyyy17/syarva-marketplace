<x-layouts.admin>
    <x-slot:title>Kelola Inquiry</x-slot:title>
    <x-slot:pageTitle>Kelola Inquiry</x-slot:pageTitle>

    <form method="GET" action="{{ request()->url() }}" class="mb-5 flex flex-wrap items-center gap-2">
        <label class="relative">
            <x-icon name="search" class="pointer-events-none absolute left-3 top-1/2 size-4 -translate-y-1/2 text-slate-400"/>
            <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari nama, email, listing..." class="input w-64! pl-9! py-2! text-sm">
        </label>
        <select name="status" class="input w-auto! py-2! text-sm" aria-label="Filter status">
            <option value="">Semua Status</option>
            @foreach ($statuses as $status)
                <option value="{{ $status }}" @selected(request('status') === $status)>{{ ucfirst($status) }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn-outline btn-sm">Filter</button>
        @if (request()->hasAny(['q', 'status']))
            <a href="{{ request()->url() }}" class="btn-ghost btn-sm">Reset</a>
        @endif
    </form>

    @if ($inquiries->isNotEmpty())
        <div class="card overflow-hidden">
            <div class="table-wrap">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="th">Pengirim</th>
                            <th class="th hidden md:table-cell">Listing</th>
                            <th class="th hidden lg:table-cell">Penjual</th>
                            <th class="th">Status</th>
                            <th class="th hidden sm:table-cell">Waktu</th>
                            <th class="th text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($inquiries as $inquiry)
                            <tr class="hover:bg-slate-50/60">
                                <td class="td">
                                    <div class="flex items-center gap-3">
                                        <span class="grid size-9 shrink-0 place-items-center rounded-full bg-primary-50 text-sm font-bold text-primary-700">
                                            {{ strtoupper(substr($inquiry->name, 0, 1)) }}
                                        </span>
                                        <div class="min-w-0">
                                            <p class="truncate text-sm font-semibold text-slate-800">{{ $inquiry->name }}</p>
                                            <p class="truncate text-xs text-slate-400">{{ $inquiry->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="td hidden max-w-[220px] truncate md:table-cell">{{ $inquiry->listing?->title ?? '<Listing dihapus>' }}</td>
                                <td class="td hidden lg:table-cell">{{ $inquiry->seller?->name ?? '-' }}</td>
                                <td class="td"><x-badge :status="$inquiry->status"/></td>
                                <td class="td hidden whitespace-nowrap sm:table-cell">{{ $inquiry->created_at->diffForHumans() }}</td>
                                <td class="td text-right">
                                    <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="btn-outline btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-6">
            {{ $inquiries->links() }}
        </div>
    @else
        <x-empty-state title="Inquiry tidak ditemukan" message="Tidak ada inquiry yang cocok dengan filter." icon="send"/>
    @endif
</x-layouts.admin>