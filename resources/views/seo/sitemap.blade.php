<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('listings.index') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('about') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{ route('contact') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    @foreach ($categories as $category)
        @php
            $route = match ($category->slug) {
                'rumah' => route('listings.property', ['kategori' => 'rumah']),
                'tanah' => route('listings.property', ['kategori' => 'tanah']),
                'mobil-baru' => route('listings.vehicle', ['kategori' => 'baru']),
                'mobil-second' => route('listings.vehicle', ['kategori' => 'second']),
                default => route('listings.index', ['category' => $category->slug]),
            };
        @endphp
        <url>
            <loc>{{ $route }}</loc>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach ($listings as $listing)
        <url>
            <loc>{{ route('listings.show', $listing->slug) }}</loc>
            <lastmod>{{ $listing->updated_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach
</urlset>