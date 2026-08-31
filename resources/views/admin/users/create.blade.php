<x-layouts.admin>
    <x-slot:title>Tambah User</x-slot:title>
    <x-slot:pageTitle>Tambah User Baru</x-slot:pageTitle>

    <div class="card mx-auto max-w-xl p-6 sm:p-8">
        <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="label">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required maxlength="100" class="input {{ $errors->has('name') ? 'input-error' : '' }}">
                @error('name')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required maxlength="150" class="input {{ $errors->has('email') ? 'input-error' : '' }}">
                @error('email')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone" class="label">No. HP</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" maxlength="20" class="input">
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="role" class="label">Role</label>
                    <select id="role" name="role" required class="input">
                        <option value="user" @selected(old('role') === 'user')">Pembeli</option>
                        <option value="admin" @selected(old('role') === 'admin')>Admin</option>
                    </select>
                </div>
                <div>
                    <label for="status" class="label">Status</label>
                    <select id="status" name="status" required class="input">
                        <option value="active" @selected(old('status') !== 'suspended')>Aktif</option>
                        <option value="suspended" @selected(old('status') === 'suspended')>Ditangguhkan</option>
                    </select>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="password" class="label">Password</label>
                    <input type="password" id="password" name="password" minlength="8" class="input {{ $errors->has('password') ? 'input-error' : '' }}" placeholder="Kosongkan = password default">
                    @error('password')
                        <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="label">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="input">
                </div>
            </div>

            <div class="flex justify-end gap-2 pt-2">
                <a href="{{ route('admin.users.index') }}" class="btn-outline">Batal</a>
                <button type="submit" class="btn-primary">Simpan User</button>
            </div>
        </form>
    </div>
</x-layouts.admin>