<x-layouts.auth>
    <x-slot:title>Reset Password</x-slot:title>

    <div class="card p-8">
        <h1 class="text-xl font-extrabold tracking-tight text-slate-900">Buat Password Baru</h1>
        <p class="mt-1 text-sm text-slate-500">Masukkan password baru untuk akun Anda.</p>

        <form method="POST" action="{{ route('password.store') }}" class="mt-6 space-y-4">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div>
                <label for="email" class="label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" required autofocus
                       class="input {{ $errors->has('email') ? 'input-error' : '' }}">
                @error('email')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="label">Password Baru</label>
                <input type="password" id="password" name="password" required autocomplete="new-password"
                       class="input {{ $errors->has('password') ? 'input-error' : '' }}" placeholder="Minimal 8 karakter">
                @error('password')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="label">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"
                       class="input" placeholder="Ulangi password">
            </div>

            <button type="submit" class="btn-primary w-full py-3!">Simpan Password Baru</button>
        </form>
    </div>
</x-layouts.auth>