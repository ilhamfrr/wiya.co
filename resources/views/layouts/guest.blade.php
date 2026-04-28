<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'WIYA.CO') }} — Authenticate</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans bg-brand-bg text-brand-dark antialiased">
        <div class="min-h-screen flex flex-col lg:flex-row">
            {{-- Visual Side --}}
            <div class="hidden lg:flex lg:w-1/2 bg-brand-dark relative overflow-hidden items-center justify-center p-20">
                <div class="absolute inset-0 opacity-40">
                    <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=1470&auto=format&fit=crop" class="w-full h-full object-cover grayscale">
                </div>
                <div class="relative z-10 text-center space-y-8 max-w-lg">
                    <h1 class="text-7xl font-black text-white tracking-tighter leading-none uppercase">Purely<br>Curated.</h1>
                    <div class="w-20 h-1 bg-brand-accent mx-auto"></div>
                    <p class="text-white/40 text-xs font-bold uppercase tracking-[0.4em] leading-relaxed">
                        Join our exclusive circle of modest fashion enthusiasts. Experience the intersection of tradition and modernity.
                    </p>
                </div>
            </div>

            {{-- Form Side --}}
            <div class="flex-1 flex flex-col items-center justify-center p-8 sm:p-12 lg:p-20 relative">
                <div class="absolute top-12 left-12 lg:left-20">
                    <a href="/" class="text-2xl font-black tracking-[0.3em] text-brand-dark hover:text-brand-accent transition-colors">WIYA.CO</a>
                </div>

                <div class="w-full max-w-md space-y-12 animate-fade-in">
                    {{ $slot }}
                </div>

                <div class="absolute bottom-12 text-[10px] font-bold text-brand-dark/20 uppercase tracking-widest">
                    &copy; {{ date('Y') }} WIYA.CO — All Rights Reserved.
                </div>
            </div>
        </div>
    </body>
</html>
