@props([
    'title' => null,
    'description' => null,
    'image' => null,
    'type' => 'website',
])

@php
    $siteName = \App\Models\Setting::get('site_name', config('app.name'));
    $siteTagline = \App\Models\Setting::get('site_tagline');
    $seoTitle = \App\Models\Setting::get('seo_title');
    $seoDescription = \App\Models\Setting::get('seo_description');
    $pageTitle = $title ? ($title.' | '.$siteName) : $seoTitle;
    $pageDescription = $description ?? $seoDescription;
    $pageUrl = url()->current();
@endphp

<title>{{ $pageTitle }}</title>
<meta name="description" content="{{ $pageDescription }}">
<meta name="keywords" content="{{ \App\Models\Setting::get('seo_keywords') }}">

<link rel="canonical" href="{{ $pageUrl }}">
<meta name="robots" content="index, follow">

<meta property="og:type" content="{{ $type }}">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:title" content="{{ $title ?? $seoTitle }}">
<meta property="og:description" content="{{ $pageDescription }}">
<meta property="og:url" content="{{ $pageUrl }}">
@if ($image)
    <meta property="og:image" content="{{ $image }}">
@endif
<meta property="og:locale" content="id_ID">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title ?? $seoTitle }}">
<meta name="twitter:description" content="{{ $pageDescription }}">

<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "WebSite",
    "name": "{{ $siteName }}",
    "description": "{{ $siteTagline }}",
    "url": "{{ url('/') }}"
}
</script>