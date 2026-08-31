<x-layouts.user>
    <x-slot:title>Favorit</x-slot:title>
    <x-slot:pageTitle>Favorit Saya</x-slot:pageTitle>

    @if ($favorites->isNotEmpty())
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($favorites as $favorite)
                <x-listing-card :listing="$favorite->listing"/>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $favorites->links() }}
        </div>
    @else
        <x-empty-state
            title="Belum ada favorit"
            message="Simpan listing yang Anda minati dengan menekan tombol hati pada kartu listing."
            icon="heart"
            action="{{ route('listings.index') }}"
            action-label="Jelajahi Listing"
        />
    @endif
</x-layouts.user>