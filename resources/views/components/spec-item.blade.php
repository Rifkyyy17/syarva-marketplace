@props(['icon' => 'tag', 'label', 'value'])

<div class="flex items-start gap-3.5 rounded-2xl border border-slate-200/80 bg-slate-50/60 p-4 transition-all hover:bg-white hover:border-primary-200 hover:shadow-xs">
    <span class="grid size-9 shrink-0 place-items-center rounded-xl bg-primary-100 text-primary-700 shadow-xs">
        <x-icon :name="$icon" class="size-4.5"/>
    </span>
    <div class="min-w-0 flex-1">
        <dt class="text-[11px] font-bold uppercase tracking-wider text-slate-400">{{ $label }}</dt>
        <dd class="mt-0.5 truncate text-sm font-bold text-slate-900">{{ $value ?? '-' }}</dd>
    </div>
</div>