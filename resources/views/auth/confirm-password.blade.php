<x-layouts.auth>
    <x-slot:title>Konfirmasi Password</x-slot:title>

    <div class="card p-8">
        <h1 class="text-xl font-extrabold tracking-tight text-slate-900">Konfirmasi Password</h1>
        <p class="mt-1 text-sm text-slate-500">Masukkan password Anda untuk melanjutkan.</p>

        <form method="POST" action="{{ route('password.confirm.post') }}" class="mt-6 space-y-4">
            @csrf

            <div>
                <label for="password" class="label">Password</label>
                <input type="password" id="password" name="password" required autocomplete="current-password"
                       class="input {{ $errors->has('password') ? 'input-error' : '' }}" placeholder="********">
                @error('password')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn-primary w-full">Konfirmasi</button>
        </form>
    </div>
</x-layouts.auth>
