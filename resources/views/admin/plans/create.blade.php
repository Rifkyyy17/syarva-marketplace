<x-layouts.admin>
    <x-slot:title>Tambah Paket Membership</x-slot:title>
    <x-slot:pageTitle>Tambah Paket Membership Baru</x-slot:pageTitle>

    <a href="{{ route('admin.plans.index') }}" class="btn-ghost btn-sm mb-4">
        <x-icon name="chevron-left" class="size-4"/> Kembali ke Daftar Paket
    </a>

    <form method="POST" action="{{ route('admin.plans.store') }}" class="mx-auto max-w-3xl">
        @csrf

        @include('admin.plans._form', ['plan' => $plan])
    </form>
</x-layouts.admin>
