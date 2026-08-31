<x-layouts.admin>
    <x-slot:title>Laporan Inquiry</x-slot:title>
    <x-slot:pageTitle>Laporan Inquiry</x-slot:pageTitle>

    <div class="grid gap-6 md:grid-cols-2">
        <div class="card p-6">
            <h2 class="text-base font-bold text-slate-900">Inquiry per Status</h2>
            <dl class="mt-4 space-y-3">
                @foreach ($perStatus as $item)
                    <div class="flex items-center justify-between">
                        <dt><x-badge :status="$item['status']"/></dt>
                        <dd class="text-sm font-bold text-slate-800">{{ $item['count'] }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>

        <div class="card p-6">
            <h2 class="text-base font-bold text-slate-900">Inquiry per Bulan (6 bulan terakhir)</h2>
            <div class="mt-6 grid grid-cols-6 items-end gap-3">
                @php $max = max($monthly->pluck('count')->max() ?? 0, 1); @endphp
                @foreach ($monthly as $item)
                    <div class="flex flex-col items-center gap-2">
                        <span class="text-xs font-bold text-slate-700">{{ $item['count'] }}</span>
                        <div class="flex w-full items-end justify-center">
                            <span class="w-full max-w-10 rounded-t-lg bg-accent-500" style="height: {{ max(($item['count'] / $max) * 120, 4) }}px"></span>
                        </div>
                        <span class="text-[10px] font-medium uppercase tracking-wide text-slate-400">{{ $item['month'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card p-6 md:col-span-2">
            <h2 class="text-base font-bold text-slate-900">Listing Paling Banyak Inquiry</h2>
            @if ($topListings->isNotEmpty())
                <ol class="mt-4 space-y-3">
                    @foreach ($topListings as $index => $listing)
                        <li class="flex items-center gap-4">
                            <span class="grid size-8 shrink-0 place-items-center rounded-full bg-slate-100 text-sm font-bold text-slate-600">{{ $index + 1 }}</span>
                            <div class="min-w-0 flex-1">
                                <a href="{{ route('admin.listings.show', $listing) }}" class="block truncate text-sm font-semibold text-slate-800 hover:text-primary-700">{{ $listing->title }}</a>
                                <p class="text-xs text-slate-400">{{ $listing->user->name }}</p>
                            </div>
                            <span class="shrink-0 rounded-full bg-primary-50 px-3 py-1 text-xs font-bold text-primary-700">{{ $listing->inquiries_count }} inquiry</span>
                        </li>
                    @endforeach
                </ol>
            @else
                <p class="mt-4 text-sm text-slate-400">Belum ada inquiry.</p>
            @endif
        </div>
    </div>
</x-layouts.admin>