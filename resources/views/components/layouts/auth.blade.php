<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="data:image/svg+xml,{{ urlencode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><rect width="32" height="32" rx="8" fill="#283f67"/><path d="M16 7 L25 14 L22.5 14 L22.5 24 L19.5 24 L19.5 17 L12.5 17 L12.5 24 L9.5 24 L9.5 14 L7 14 Z" fill="#fbbf24"/></svg>') }}">
    <x-seo :title="$title ?? 'Masuk'"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col items-center justify-center bg-slate-50 px-4 py-10">
    @php
        $authLogo = \App\Models\Setting::get('site_logo');
        $siteName = \App\Models\Setting::get('site_name', 'SYARVA Marketplace');
    @endphp
    <a href="{{ route('home') }}" class="mb-6 flex items-center gap-2.5">
        @if (!empty($authLogo))
            <img src="{{ Storage::disk('public')->url($authLogo) }}" alt="{{ $siteName }}" class="h-9 max-w-[200px] object-contain">
        @else
            <span class="grid size-10 place-items-center rounded-xl bg-red-600 text-white font-black text-sm shadow-xs">
                H
            </span>
            <span class="text-xl font-black tracking-tight text-slate-900">{{ $siteName }}</span>
        @endif
    </a>

    <div class="w-full max-w-md">
        {{ $slot }}
    </div>

    <p class="mt-8 text-xs text-slate-400">&copy; {{ date('Y') }} {{ $siteName }}. Semua hak dilindungi.</p>
</body>

</html>