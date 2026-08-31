<x-layouts.admin>
    <x-slot:title>Kelola Kategori</x-slot:title>
    <x-slot:pageTitle>Kelola Kategori</x-slot:pageTitle>

    <div class="mb-5 flex items-center justify-between">
        <p class="text-sm text-slate-500">Kelola kategori utama dan subkategori listing.</p>
        <a href="{{ route('admin.categories.create') }}" class="btn-primary btn-sm">
            <x-icon name="plus" class="size-4"/> Tambah Kategori
        </a>
    </div>

    <div class="grid gap-5 md:grid-cols-2">
        @foreach ($categories->whereNull('parent_id') as $parent)
            <div class="card overflow-hidden">
                <div class="flex items-center justify-between border-b border-slate-100 bg-slate-50/60 px-5 py-4">
                    <div class="flex items-center gap-3">
                        <span class="grid size-10 place-items-center rounded-xl bg-primary-50 text-primary-700">
                            <x-icon :name="$parent->icon ?? 'tag'" class="size-5"/>
                        </span>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">{{ $parent->name }}</h3>
                            <p class="text-xs capitalize text-slate-400">{{ $parent->type }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-badge :status="$parent->status"/>
                        <a href="{{ route('admin.categories.edit', $parent) }}" class="btn-outline btn-sm px-2!.5" aria-label="Edit">
                            <x-icon name="pencil" class="size-3.5"/>
                        </a>
                    </div>
                </div>

                <ul class="divide-y divide-slate-100">
                    @foreach ($parent->children as $child)
                        <li class="flex items-center justify-between px-5 py-3">
                            <div class="flex items-center gap-3">
                                <span class="grid size-8 place-items-center rounded-lg bg-slate-100 text-slate-500">
                                    <x-icon :name="$child->icon ?? 'tag'" class="size-4"/>
                                </span>
                                <div>
                                    <p class="text-sm font-semibold text-slate-800">{{ $child->name }}</p>
                                    <p class="text-xs text-slate-400">{{ number_format($child->listings_count, 0, ',', '.') }} listing</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <x-badge :status="$child->status"/>
                                <a href="{{ route('admin.categories.edit', $child) }}" class="btn-outline btn-sm px-2!.5" aria-label="Edit">
                                    <x-icon name="pencil" class="size-3.5"/>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</x-layouts.admin>