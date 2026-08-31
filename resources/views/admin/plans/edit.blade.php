<x-layouts.admin>
    <x-slot:title>Edit Paket Membership</x-slot:title>
    <x-slot:pageTitle>Edit Paket: {{ $plan->name }}</x-slot:pageTitle>

    <a href="{{ route('admin.plans.index') }}" class="btn-ghost btn-sm mb-4">
        <x-icon name="chevron-left" class="size-4"/> Kembali ke Daftar Paket
    </a>

    <form method="POST" action="{{ route('admin.plans.update', $plan) }}" class="mx-auto max-w-3xl">
        @csrf
        @method('PUT')

        @include('admin.plans._form', ['plan' => $plan])
    </form>
</x-layouts.admin>
