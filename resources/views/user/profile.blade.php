<x-layouts.user>
    <x-slot:title>Profil</x-slot:title>
    <x-slot:pageTitle>Profil Saya</x-slot:pageTitle>

    <div class="grid gap-6 lg:grid-cols-[320px_1fr]">
        <div class="card h-fit p-6 text-center">
            <span class="mx-auto grid size-24 place-items-center overflow-hidden rounded-full bg-primary-700 text-3xl font-bold text-white">
                @if (auth()->user()->avatar)
                    <img src="{{ Storage::disk('public')->url(auth()->user()->avatar) }}" alt="" class="size-full object-cover">
                @else
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                @endif
            </span>
            <h2 class="mt-4 text-lg font-bold text-slate-900">{{ auth()->user()->name }}</h2>
            <p class="text-sm text-slate-500">{{ auth()->user()->email }}</p>
            <div class="mt-4 flex justify-center gap-2">
                <x-badge :status="auth()->user()->role"/>
                <x-badge :status="auth()->user()->status"/>
            </div>
            <div class="mt-5 space-y-2 text-left text-sm">
                <p class="flex items-center gap-2 text-slate-600"><x-icon name="phone" class="size-4 text-slate-400"/> {{ auth()->user()->phone ?? '-' }}</p>
                <p class="flex items-center gap-2 text-slate-600"><x-icon name="whatsapp" class="size-4 text-slate-400"/> {{ auth()->user()->whatsapp ?? '-' }}</p>
                <p class="flex items-center gap-2 text-slate-600"><x-icon name="calendar" class="size-4 text-slate-400"/> Bergabung {{ auth()->user()->created_at->translatedFormat('d M Y') }}</p>
            </div>
        </div>

        <div class="card p-6 sm:p-8">
            <h2 class="text-lg font-bold text-slate-900">Informasi Akun</h2>
            <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-4">
                @csrf
                @method('PUT')

                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="label">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required maxlength="100"
                               class="input {{ $errors->has('name') ? 'input-error' : '' }}">
                        @error('name')
                            <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="label">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required maxlength="150"
                               class="input {{ $errors->has('email') ? 'input-error' : '' }}">
                        @error('email')
                            <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="phone" class="label">No. HP</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone', auth()->user()->phone) }}" maxlength="20"
                               class="input" placeholder="08xxxxxxxxxx">
                    </div>
                    <div>
                        <label for="whatsapp" class="label">WhatsApp (format 62...)</label>
                        <input type="tel" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', auth()->user()->whatsapp) }}" maxlength="20"
                               class="input" placeholder="628xxxxxxxxxx">
                        <p class="mt-1 text-xs text-slate-400">Nomor WhatsApp Anda (jika ingin dihubungi penjual).</p>
                    </div>
                </div>

                <div>
                    <label for="bio" class="label">Bio</label>
                    <textarea id="bio" name="bio" rows="4" maxlength="1000" class="input" placeholder="Ceritakan tentang Anda atau bisnis Anda...">{{ old('bio', auth()->user()->bio) }}</textarea>
                </div>

                <div>
                    <label for="avatar" class="label">Foto Profil</label>
                    <input type="file" id="avatar" name="avatar" accept="image/jpeg,image/png,image/webp" class="input p-2!.5">
                    <p class="mt-1 text-xs text-slate-400">JPG, PNG, atau WebP. Maksimal 2 MB.</p>
                    @error('avatar')
                        <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</x-layouts.user>