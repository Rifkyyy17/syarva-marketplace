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
<body class="flex min-h-screen flex-col items-center justify-center bg-slate-100 px-4 py-10">
    <a href="{{ route('home') }}" class="mb-6 flex items-center gap-2.5">
        <span class="grid size-10 place-items-center rounded-xl bg-primary-700 text-white">
            <svg viewBox="0 0 24 24" class="size-5" fill="currentColor" aria-hidden="true">
                <path d="M12 2 21 8l-1.6 1.2V21h-5v-6h-4.8v6H4.6V9.2L3 8z"/>
            </svg>
        </span>
        <span class="text-xl font-extrabold tracking-tight text-slate-900">{{ \App\Models\Setting::get('site_name', 'SYARVA Marketplace') }}</span>
    </a>

    <div class="w-full max-w-md">
        {{ $slot }}
    </div>

    <p class="mt-8 text-xs text-slate-400">&copy; {{ date('Y') }} {{ \App\Models\Setting::get('site_name', 'SYARVA Marketplace') }}. Semua hak dilindungi.</p>
</body>
</html>