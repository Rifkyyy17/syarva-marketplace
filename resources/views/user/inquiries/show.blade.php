<x-layouts.user>
    <x-slot:title>Detail Inquiry</x-slot:title>
    <x-slot:pageTitle>Detail Inquiry</x-slot:pageTitle>

    <div class="mx-auto max-w-3xl">
        <div class="card overflow-hidden">
            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 bg-slate-50/60 px-6 py-4">
                <div class="flex items-center gap-3">
                    <span class="grid size-10 place-items-center rounded-full bg-primary-700 font-bold text-white">
                        {{ strtoupper(substr($inquiry->name, 0, 1)) }}
                    </span>
                    <div>
                        <p class="text-sm font-bold text-slate-900">{{ $inquiry->name }}</p>
                        <p class="text-xs text-slate-500">{{ $inquiry->email }} @if ($inquiry->phone) &middot; {{ $inquiry->phone }} @endif</p>
                    </div>
                </div>
                <x-badge :status="$inquiry->status"/>
            </div>

            <div class="space-y-5 p-6">
                <div class="flex items-center gap-4 rounded-xl border border-slate-100 bg-slate-50 p-4">
                    @if ($inquiry->listing)
                        <div class="flex min-w-0 flex-1 items-center gap-3">
                            <span class="grid size-10 shrink-0 place-items-center rounded-lg bg-white text-primary-700 shadow-sm">
                                <x-icon :name="$inquiry->listing->isVehicle() ? 'car' : 'building'" class="size-5"/>
                            </span>
                            <div class="min-w-0">
                                <a href="{{ route('listings.show', $inquiry->listing->slug) }}" class="block truncate text-sm font-semibold text-slate-800 hover:text-primary-700">{{ $inquiry->listing->title }}</a>
                                <p class="text-xs text-slate-400">Rp {{ number_format((float) $inquiry->listing->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <span class="badge border border-slate-200 bg-white text-slate-600">{{ $inquiry->listing->status }}</span>
                    @else
                        <p class="text-sm text-slate-400">Listing sudah dihapus.</p>
                    @endif
                </div>

                <div>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">Pesan</h3>
                    <p class="mt-2 whitespace-pre-line text-sm leading-relaxed text-slate-700">{{ $inquiry->message }}</p>
                </div>

                <div class="flex items-center justify-between border-t border-slate-100 pt-4">
                    <p class="text-xs text-slate-400">Dikirim {{ $inquiry->created_at->translatedFormat('d M Y, H:i') }}</p>
                    <a href="mailto:{{ $inquiry->email }}" class="btn-outline btn-sm">
                        <x-icon name="mail" class="size-4"/> Balas via Email
                    </a>
                </div>

                @if ($inquiry->status !== 'replied')
                    <form method="POST" action="{{ route('user.inquiries.replied', $inquiry) }}" class="border-t border-slate-100 pt-4">
                        @csrf
                        <button type="submit" class="btn-primary btn-sm">
                            <x-icon name="check-circle" class="size-4"/> Tandai Sudah Dibalas
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <a href="{{ route('user.inquiries.index') }}" class="btn-ghost btn-sm mt-4">
            <x-icon name="chevron-left" class="size-4"/> Kembali
        </a>
    </div>
</x-layouts.user>