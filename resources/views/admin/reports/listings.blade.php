<x-layouts.admin>
    <x-slot:title>Laporan Listing</x-slot:title>
    <x-slot:pageTitle>Laporan Listing</x-slot:pageTitle>

    <div class="grid gap-6 md:grid-cols-2">
        <div class="card p-6">
            <h2 class="text-base font-bold text-slate-900">Listing per Kategori</h2>
            <dl class="mt-4 space-y-3">
                @foreach ($perCategory as $category)
                    <div class="flex items-center justify-between">
                        <dt class="text-sm text-slate-600">{{ $category->name }}</dt>
                        <dd class="flex items-center gap-3">
                            <span class="h-2 w-28 overflow-hidden rounded-full bg-slate-100">
                                <span class="block h-full rounded-full bg-primary-600" style="width: {{ $perCategory->max(fn ($c) => $c->listings_count) > 0 ? ($category->listings_count / $perCategory->max(fn ($c) => $c->listings_count) * 100) : 0 }}%"></span>
                            </span>
                            <span class="w-8 text-right text-sm font-bold text-slate-800">{{ $category->listings_count }}</span>
                        </dd>
                    </div>
                @endforeach
            </dl>
        </div>

        <div class="card p-6">
            <h2 class="text-base font-bold text-slate-900">Listing per Status</h2>
            <dl class="mt-4 space-y-3">
                @foreach ($perStatus as $item)
                    <div class="flex items-center justify-between">
                        <dt><x-badge :status="$item['status']"/></dt>
                        <dd class="text-sm font-bold text-slate-800">{{ $item['count'] }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>

        <div class="card p-6 md:col-span-2">
            <h2 class="text-base font-bold text-slate-900">Listing per Bulan (6 bulan terakhir)</h2>
            <div class="mt-6 grid grid-cols-6 items-end gap-3">
                @php $max = max($monthly->pluck('count')->max() ?? 0, 1); @endphp
                @foreach ($monthly as $item)
                    <div class="flex flex-col items-center gap-2">
                        <span class="text-xs font-bold text-slate-700">{{ $item['count'] }}</span>
                        <div class="flex w-full items-end justify-center">
                            <span class="w-full max-w-10 rounded-t-lg bg-primary-600" style="height: {{ max(($item['count'] / $max) * 120, 4) }}px"></span>
                        </div>
                        <span class="text-[10px] font-medium uppercase tracking-wide text-slate-400">{{ $item['month'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card p-6 md:col-span-2">
            <h2 class="text-base font-bold text-slate-900">Matriks Kategori &times; Status</h2>
            <div class="mt-4 overflow-x-auto">
                <table class="w-full min-w-[480px] text-sm">
                    <thead>
                        <tr class="border-b border-slate-200 text-left text-xs uppercase tracking-wide text-slate-500">
                            <th class="pb-2 font-semibold">Kategori</th>
                            @foreach (\App\Models\Listing::STATUSES as $status)
                                <th class="pb-2 pr-3 font-semibold capitalize">{{ $status }}</th>
                            @endforeach
                            <th class="pb-2 font-semibold">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($perCategory as $category)
                            <tr>
                                <td class="py-2.5 font-medium text-slate-800">{{ $category->name }}</td>
                                @foreach (\App\Models\Listing::STATUSES as $status)
                                    @php $row = $rows->firstWhere(fn ($r) => $r->category_id === $category->id && ($r->status instanceof \App\Enums\ListingStatus ? $r->status->value : $r->status) === $status); @endphp
                                    <td class="py-2.5 pr-3 text-slate-600">{{ $row->total ?? 0 }}</td>
                                @endforeach
                                <td class="py-2.5 font-bold text-slate-900">{{ $category->listings_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>