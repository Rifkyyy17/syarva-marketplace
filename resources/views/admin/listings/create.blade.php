<x-layouts.admin>
    <x-slot:title>Tambah Listing</x-slot:title>
    <x-slot:pageTitle>Tambah Listing Baru</x-slot:pageTitle>

    <a href="{{ route('admin.listings.index') }}" class="btn-ghost btn-sm mb-4">
        <x-icon name="chevron-left" class="size-4"/> Kembali
    </a>

    <form method="POST" action="{{ route('admin.listings.store') }}" enctype="multipart/form-data" class="mx-auto max-w-3xl">
        @csrf

        @include('admin.listings._form-fields', ['categories' => $categories])
    </form>
</x-layouts.admin>