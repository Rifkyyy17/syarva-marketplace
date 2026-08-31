<x-layouts.auth>
    <x-slot:title>Verifikasi Email</x-slot:title>

    <div class="text-center">
        <span class="mx-auto grid size-12 place-items-center rounded-2xl bg-primary-100 text-primary-600">
            <x-icon name="mail" class="size-6"/>
        </span>
        <h1 class="mt-4 text-2xl font-bold tracking-tight text-slate-900">Verifikasi Alamat Email</h1>
        <p class="mt-2 text-sm text-slate-600">
            Terima kasih telah mendaftar! Silakan cek kotak masuk email Anda dan klik tautan verifikasi yang telah kami kirimkan.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mt-4 rounded-xl bg-emerald-50 p-4 text-xs font-medium text-emerald-800">
            Tautan verifikasi baru telah berhasil dikirimkan ke alamat email Anda.
        </div>
    @endif

    <div class="mt-6 flex flex-col gap-3">
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn-primary w-full py-2.5">
                Kirim Ulang Email Verifikasi
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-ghost w-full py-2 text-slate-500 hover:text-slate-700 text-xs">
                Keluar (Logout)
            </button>
        </form>
    </div>
</x-layouts.auth>
