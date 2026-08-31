<x-layouts.auth>
    <x-slot:title>Masuk</x-slot:title>

    <div class="card p-8">
        <h1 class="text-xl font-extrabold tracking-tight text-slate-900">Masuk ke Akun Anda</h1>
        <p class="mt-1 text-sm text-slate-500">Selamat datang kembali di SYARVA Marketplace.</p>

        @if (session('status'))
            <p class="mt-4 rounded-lg bg-emerald-50 px-3 py-2 text-sm text-emerald-700">{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('login.store') }}" class="mt-6 space-y-4">
            @csrf

            <div>
                <label for="email" class="label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                       class="input {{ $errors->has('email') ? 'input-error' : '' }}" placeholder="nama@email.com">
                @error('email')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="label">Password</label>
                    <a href="{{ route('password.request') }}" class="text-xs font-semibold text-primary-700 hover:text-primary-800">Lupa password?</a>
                </div>
                <input type="password" id="password" name="password" required autocomplete="current-password"
                       class="input {{ $errors->has('password') ? 'input-error' : '' }}" placeholder="********">
                @error('password')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <label class="flex items-center gap-2 text-sm text-slate-600">
                <input type="checkbox" name="remember" class="size-4 rounded accent-primary-600">
                Ingat saya
            </label>

            <x-captcha/>

            <button type="submit" class="btn-primary w-full py-3!">Masuk</button>
        </form>

        <p class="mt-6 text-center text-sm text-slate-500">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-semibold text-primary-700 hover:text-primary-800">Daftar sekarang</a>
        </p>
    </div>
</x-layouts.auth>