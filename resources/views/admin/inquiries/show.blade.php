<x-layouts.admin>
    <x-slot:title>Detail Inquiry</x-slot:title>
    <x-slot:pageTitle>Detail Inquiry</x-slot:pageTitle>

    <a href="{{ route('admin.inquiries.index') }}" class="btn-ghost btn-sm mb-4">
        <x-icon name="chevron-left" class="size-4"/> Kembali
    </a>

    <div class="grid gap-6 lg:grid-cols-[1fr_340px]">
        <div class="min-w-0 space-y-6">
            <div class="card p-6">
                <div class="flex items-start justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <span class="grid size-12 shrink-0 place-items-center rounded-full bg-primary-700 text-lg font-bold text-white">
                            {{ strtoupper(substr($inquiry->name, 0, 1)) }}
                        </span>
                        <div>
                            <h1 class="text-base font-bold text-slate-900">{{ $inquiry->name }}</h1>
                            <a href="mailto:{{ $inquiry->email }}" class="text-sm text-primary-700 hover:underline">{{ $inquiry->email }}</a>
                            @if ($inquiry->phone)
                                <p class="text-sm text-slate-500">{{ $inquiry->phone }}</p>
                            @endif
                        </div>
                    </div>
                    <x-badge :status="$inquiry->status"/>
                </div>

                <div class="mt-6 rounded-xl border border-slate-100 bg-slate-50 p-5">
                    <p class="text-sm font-bold uppercase tracking-wide text-slate-500">Pesan</p>
                    <p class="mt-3 whitespace-pre-line text-sm leading-relaxed text-slate-700">{{ $inquiry->message }}</p>
                </div>

                <p class="mt-4 text-xs text-slate-400">
                    Dikirim {{ $inquiry->created_at->translatedFormat('d M Y H:i') }}
                    @if ($inquiry->isGuest())
                        &middot; sebagai tamu
                    @endif
                </p>
            </div>

            <div class="card p-6">
                <h2 class="text-sm font-bold uppercase tracking-wide text-slate-800">Listing Terkait</h2>
                @if ($inquiry->listing)
                    <div class="mt-4 flex items-center gap-4">
                        <a href="{{ route('admin.listings.show', $inquiry->listing) }}" class="size-16 shrink-0 overflow-hidden rounded-xl bg-slate-100">
                            @if ($inquiry->listing->primaryImage)
                                <img src="{{ $inquiry->listing->primaryImage->url }}" alt="" loading="lazy" class="size-full object-cover">
                            @endif
                        </a>
                        <div class="min-w-0">
                            <a href="{{ route('admin.listings.show', $inquiry->listing) }}" class="block truncate text-sm font-bold text-slate-900 hover:text-primary-700">{{ $inquiry->listing->title }}</a>
                            <p class="text-xs text-slate-500">{{ $inquiry->listing->category?->name }} &middot; {{ $inquiry->listing->location_full }}</p>
                            <p class="mt-1 text-sm font-bold text-primary-700">Rp {{ number_format((float) $inquiry->listing->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @else
                    <p class="mt-3 text-sm text-slate-400">Listing telah dihapus.</p>
                @endif
            </div>
        </div>

        <aside class="space-y-5 lg:sticky lg:top-24 lg:self-start">
            <div class="card p-5">
                <h2 class="text-sm font-bold uppercase tracking-wide text-slate-800">Penjual</h2>
                <div class="mt-3 flex items-center gap-3">
                    <span class="grid size-10 shrink-0 place-items-center rounded-full bg-slate-200 text-sm font-bold text-slate-700">
                        {{ strtoupper(substr($inquiry->seller->name ?? '?', 0, 1)) }}
                    </span>
                    <div class="min-w-0">
                        <p class="truncate text-sm font-bold text-slate-900">{{ $inquiry->seller?->name ?? 'Tidak diketahui' }}</p>
                        @if ($inquiry->seller)
                            <p class="truncate text-xs text-slate-500">{{ $inquiry->seller->email }}</p>
                        @endif
                    </div>
                </div>
                @if ($inquiry->seller?->whatsapp)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inquiry->seller->whatsapp) }}" target="_blank" rel="noopener" class="btn-outline btn-sm mt-4 w-full">
                        <x-icon name="phone" class="size-4"/> WhatsApp Penjual
                    </a>
                @endif
            </div>

            <div class="card p-5">
                <h2 class="text-sm font-bold uppercase tracking-wide text-slate-800">Ubah Status</h2>
                <form method="POST" action="{{ route('admin.inquiries.status', $inquiry) }}" class="mt-3 space-y-3">
                    @csrf
                    <select name="status" required class="input py-2! text-sm">
                        @foreach ([\App\Models\Inquiry::STATUS_NEW, \App\Models\Inquiry::STATUS_READ, \App\Models\Inquiry::STATUS_REPLIED] as $status)
                            <option value="{{ $status }}" @selected($inquiry->status === $status)>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn-primary btn-sm w-full">Simpan Status</button>
                </form>
                <div class="mt-4 grid gap-2 border-t border-slate-100 pt-4">
                    <a href="mailto:{{ $inquiry->email }}" class="btn-outline btn-sm">
                        <x-icon name="mail" class="size-4"/> Balas Email
                    </a>
                    @if ($inquiry->phone)
                        <a href="tel:{{ $inquiry->phone }}" class="btn-outline btn-sm">
                            <x-icon name="phone" class="size-4"/> Hubungi {{ $inquiry->name }}
                        </a>
                    @endif
                </div>
            </div>
        </aside>
    </div>
</x-layouts.admin>