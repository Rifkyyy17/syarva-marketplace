<x-layouts.admin>
    <x-slot:title>Tambah Kategori</x-slot:title>
    <x-slot:pageTitle>Tambah Kategori</x-slot:pageTitle>

    <div class="card mx-auto max-w-xl p-6 sm:p-8">
        <form method="POST" action="{{ route('admin.categories.store') }}" class="space-y-4">
            @csrf

            <div>
                <label for="parent_id" class="label">Kategori Utama</label>
                <select id="parent_id" name="parent_id" class="input">
                    <option value="">— Kategori Utama —</option>
                    @foreach ($parents as $parent)
                        <option value="{{ $parent->id }}" @selected((string) old('parent_id') === (string) $parent->id)>{{ $parent->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="name" class="label">Nama Kategori</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required maxlength="100" class="input {{ $errors->has('name') ? 'input-error' : '' }}">
                @error('name')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="slug" class="label">Slug (URL)</label>
                <input type="text" id="slug" name="slug" value="{{ old('slug') }}" required maxlength="100" class="input {{ $errors->has('slug') ? 'input-error' : '' }}" placeholder="cth: rumah-modern">
                @error('slug')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="type" class="label">Tipe</label>
                    <select id="type" name="type" required class="input">
                        <option value="property" @selected(old('type') === 'property')>Properti</option>
                        <option value="vehicle" @selected(old('type') === 'vehicle')>Kendaraan</option>
                    </select>
                </div>
                <div>
                    <label for="status" class="label">Status</label>
                    <select id="status" name="status" required class="input">
                        <option value="active" @selected(old('status') !== 'inactive')>Aktif</option>
                        <option value="inactive" @selected(old('status') === 'inactive')>Nonaktif</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="icon" class="label">Ikon</label>
                <input type="text" id="icon" name="icon" value="{{ old('icon') }}" maxlength="50" class="input" placeholder="cth: building, map, car-front">
            </div>

            <div>
                <label for="description" class="label">Deskripsi</label>
                <textarea id="description" name="description" rows="3" maxlength="500" class="input">{{ old('description') }}</textarea>
            </div>

            <div>
                <label for="sort_order" class="label">Urutan</label>
                <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', 0) }}" class="input">
            </div>

            <div class="flex justify-end gap-2 pt-2">
                <a href="{{ route('admin.categories.index') }}" class="btn-outline">Batal</a>
                <button type="submit" class="btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</x-layouts.admin>