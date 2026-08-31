<x-layouts.user>
    <x-slot:title>Pengaturan</x-slot:title>
    <x-slot:pageTitle>Pengaturan</x-slot:pageTitle>

    <div class="max-w-xl">
        <div class="card p-6 sm:p-8">
            <h2 class="text-lg font-bold text-slate-900">Ubah Password</h2>
            <p class="mt-1 text-sm text-slate-500">Ganti password akun Anda secara berkala untuk keamanan.</p>

            <form method="POST" action="{{ route('user.settings.password') }}" class="mt-6 space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="current_password" class="label">Password Saat Ini</label>
                    <input type="password" id="current_password" name="current_password" required autocomplete="current-password"
                           class="input {{ $errors->has('current_password') ? 'input-error' : '' }}">
                    @error('current_password')
                        <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label for="password" class="label">Password Baru</label>
                        <input type="password" id="password" name="password" required autocomplete="new-password"
                               class="input {{ $errors->has('password') ? 'input-error' : '' }}">
                        @error('password')
                            <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="label">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" class="input">
                    </div>
                </div>

                <button type="submit" class="btn-primary">Simpan Password</button>
            </form>
        </div>
    </div>
</x-layouts.user>