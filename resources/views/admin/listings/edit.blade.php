<x-layouts.admin>
    <x-slot:title>Edit Listing</x-slot:title>
    <x-slot:pageTitle>Edit: {{ $listing->title }}</x-slot:pageTitle>

    <a href="{{ route('admin.listings.index') }}" class="btn-ghost btn-sm mb-4">
        <x-icon name="chevron-left" class="size-4"/> Kembali
    </a>

    <form method="POST" action="{{ route('admin.listings.update', $listing) }}" enctype="multipart/form-data" class="mx-auto max-w-3xl">
        @csrf
        @method('PUT')

        @include('admin.listings._form-fields', ['categories' => $categories, 'listing' => $listing])
    </form>
</x-layouts.admin>