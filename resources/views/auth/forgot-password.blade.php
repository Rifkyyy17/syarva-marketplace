<x-layouts.auth>
    <x-slot:title>Lupa Password</x-slot:title>

    <div class="card p-8">
        <div class="grid size-12 place-items-center rounded-2xl bg-primary-50 text-primary-700">
            <x-icon name="mail" class="size-6"/>
        </div>
        <h1 class="mt-4 text-xl font-extrabold tracking-tight text-slate-900">Reset Password</h1>
        <p class="mt-1 text-sm text-slate-500">Masukkan email Anda dan kami akan mengirimkan tautan untuk mengatur ulang password.</p>

        @if (session('status'))
            <p class="mt-4 rounded-lg bg-emerald-50 px-3 py-2 text-sm text-emerald-700">{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="mt-6 space-y-4">
            @csrf

            <div>
                <label for="email" class="label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                       class="input {{ $errors->has('email') ? 'input-error' : '' }}" placeholder="nama@email.com">
                @error('email')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn-primary w-full py-3!">
                <x-icon name="send" class="size-4"/> Kirim Link Reset
            </button>
        </form>

        <p class="mt-6 text-center text-sm">
            <a href="{{ route('login') }}" class="font-semibold text-primary-700 hover:text-primary-800">&larr; Kembali ke login</a>
        </p>
    </div>
</x-layouts.auth>