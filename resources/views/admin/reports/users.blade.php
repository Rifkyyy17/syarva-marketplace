<x-layouts.admin>
    <x-slot:title>Laporan User</x-slot:title>
    <x-slot:pageTitle>Laporan User</x-slot:pageTitle>

    <div class="grid gap-6 md:grid-cols-2">
        <div class="card p-6">
            <h2 class="text-base font-bold text-slate-900">User per Role</h2>
            <dl class="mt-4 space-y-3">
                @foreach ($perRole as $item)
                    <div class="flex items-center justify-between">
                        <dt><x-badge :status="$item['role']"/></dt>
                        <dd class="text-sm font-bold text-slate-800">{{ $item['count'] }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>

        <div class="card p-6">
            <h2 class="text-base font-bold text-slate-900">User per Status</h2>
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
            <h2 class="text-base font-bold text-slate-900">Registrasi User per Bulan (6 bulan terakhir)</h2>
            <div class="mt-6 grid grid-cols-6 items-end gap-3">
                @php $max = max($monthly->pluck('count')->max() ?? 0, 1); @endphp
                @foreach ($monthly as $item)
                    <div class="flex flex-col items-center gap-2">
                        <span class="text-xs font-bold text-slate-700">{{ $item['count'] }}</span>
                        <div class="flex w-full items-end justify-center">
                            <span class="w-full max-w-10 rounded-t-lg bg-violet-600" style="height: {{ max(($item['count'] / $max) * 120, 4) }}px"></span>
                        </div>
                        <span class="text-[10px] font-medium uppercase tracking-wide text-slate-400">{{ $item['month'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.admin>