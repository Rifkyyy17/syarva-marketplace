<x-layouts.user>
    <x-slot:title>Inquiry</x-slot:title>
    <x-slot:pageTitle>Inquiry Saya</x-slot:pageTitle>

    <form method="GET" action="{{ request()->url() }}" class="mb-5 flex flex-wrap items-center gap-2">
        <label class="relative">
            <x-icon name="search" class="pointer-events-none absolute left-3 top-1/2 size-4 -translate-y-1/2 text-slate-400"/>
            <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari nama, email, listing..." class="input w-64! pl-9! py-2! text-sm">
        </label>
        <select name="status" x-data x-on:change="$event.target.form.submit()" class="input w-auto! py-2! text-sm" aria-label="Filter status">
            <option value="">Semua Status</option>
            @foreach ($statuses as $status)
                <option value="{{ $status }}" @selected(request('status') === $status)>{{ ucfirst($status) }}</option>
            @endforeach
        </select>
    </form>

    @if ($inquiries->isNotEmpty())
        <div class="card overflow-hidden">
            <div class="table-wrap">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="th">Pengirim</th>
                            <th class="th hidden md:table-cell">Listing</th>
                            <th class="th hidden sm:table-cell">Pesan</th>
                            <th class="th">Status</th>
                            <th class="th hidden lg:table-cell">Waktu</th>
                            <th class="th text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($inquiries as $inquiry)
                            <tr class="hover:bg-slate-50/60">
                                <td class="td">
                                    <p class="font-semibold text-slate-800">{{ $inquiry->name }}</p>
                                    <p class="text-xs text-slate-400">{{ $inquiry->email }}</p>
                                </td>
                                <td class="td hidden max-w-[220px] truncate md:table-cell">{{ $inquiry->listing->title ?? 'Listing dihapus' }}</td>
                                <td class="td hidden max-w-[260px] truncate sm:table-cell">{{ $inquiry->message }}</td>
                                <td class="td"><x-badge :status="$inquiry->status"/></td>
                                <td class="td hidden whitespace-nowrap lg:table-cell">{{ $inquiry->created_at->translatedFormat('d M Y H:i') }}</td>
                                <td class="td text-right">
                                    <a href="{{ route('user.inquiries.show', $inquiry) }}" class="btn-primary btn-sm px-3!">Baca</a>
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
        <x-empty-state
            title="Belum ada inquiry"
            message="Ketika Anda menanyakan suatu listing, balasan penjual akan muncul di sini."
            icon="send"
            action="{{ route('listings.index') }}"
            action-label="Jelajahi Listing"
        />
    @endif
</x-layouts.user>