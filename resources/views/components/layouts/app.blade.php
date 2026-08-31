<!DOCTYPE html>
<html lang="id" class="scroll-smooth overflow-x-hidden w-full max-w-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        $favicon = \App\Models\Setting::get('site_favicon');
    @endphp
    @if (!empty($favicon))
        <link rel="icon" href="{{ Storage::disk('public')->url($favicon) }}">
    @else
        <link rel="icon" href="data:image/svg+xml,{{ urlencode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><rect width="32" height="32" rx="8" fill="#0a1626"/><path d="M16 7 L25 14 L22.5 14 L22.5 24 L19.5 24 L19.5 17 L12.5 17 L12.5 24 L9.5 24 L9.5 14 L7 14 Z" fill="#1d4ed8"/></svg>') }}">
    @endif

    <x-seo :title="$title ?? null" :description="$description ?? null" :image="$image ?? null"/>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800|inter:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>[x-cloak] { display: none !important; }</style>
    @stack('styles')
</head>
<body data-authed="{{ auth()->check() ? 1 : 0 }}" class="flex min-h-screen flex-col bg-slate-50 overflow-x-hidden w-full max-w-full">
    <x-navbar/>

    @if (session('success') || session('error') || session('warning') || session('info'))
        <div data-flash-toast="{{ session('success') ?? session('error') ?? session('warning') ?? session('info') }}"
             data-flash-type="{{ session('success') ? 'success' : (session('error') ? 'error' : (session('warning') ? 'info' : 'info')) }}"></div>
    @endif

    <main class="flex-1">
        {{ $slot }}
    </main>

    <x-footer/>

    <x-fab-whatsapp/>
    <x-ai-chatbot/>

    @stack('scripts')
</body>
</html>