<x-layouts.auth>
    <x-slot:title>Daftar</x-slot:title>

    <div class="card p-8">
        <h1 class="text-xl font-extrabold tracking-tight text-slate-900">Buat Akun Baru</h1>
        <p class="mt-1 text-sm text-slate-500">Daftar untuk mulai memasang listing atau menyimpan favorit.</p>

        <form method="POST" action="{{ route('register.store') }}" class="mt-6 space-y-4">
            @csrf

            <div>
                <label for="name" class="label">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" maxlength="100"
                       class="input {{ $errors->has('name') ? 'input-error' : '' }}" placeholder="Nama Anda">
                @error('name')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" maxlength="150"
                       class="input {{ $errors->has('email') ? 'input-error' : '' }}" placeholder="nama@email.com">
                @error('email')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone" class="label">No. HP (opsional)</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" maxlength="20"
                       class="input {{ $errors->has('phone') ? 'input-error' : '' }}" placeholder="08xxxxxxxxxx">
                @error('phone')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="label">Password</label>
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

            <button type="submit" class="btn-primary w-full py-3!">Daftar</button>

            <p class="text-center text-xs text-slate-400">Dengan mendaftar, Anda menyetujui ketentuan layanan SYARVA Marketplace.</p>
        </form>

        <p class="mt-6 text-center text-sm text-slate-500">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-semibold text-primary-700 hover:text-primary-800">Masuk</a>
        </p>
    </div>
</x-layouts.auth>