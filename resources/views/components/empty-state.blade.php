@props(['title' => 'Data tidak ditemukan', 'message' => null, 'icon' => 'folder', 'action' => null, 'actionLabel' => null])

<div class="flex flex-col items-center justify-center rounded-2xl border border-dashed border-slate-300 bg-white/60 px-6 py-14 text-center">
    <span class="grid size-14 place-items-center rounded-2xl bg-slate-100 text-slate-400">
        <x-icon :name="$icon" class="size-7"/>
    </span>
    <h3 class="mt-4 text-base font-bold text-slate-800">{{ $title }}</h3>
    @if ($message)
        <p class="mt-1 max-w-md text-sm text-slate-500">{{ $message }}</p>
    @endif
    @if ($action && $actionLabel)
        <a href="{{ $action }}" class="btn-primary btn-sm mt-5">{{ $actionLabel }}</a>
    @endif
</div>