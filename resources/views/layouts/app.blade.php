<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'WIYA.CO — Curated fashion pieces for modern women.')">
    <title>@yield('title', 'WIYA.CO')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-white font-sans antialiased">

    {{-- ===== NAVBAR ===== --}}
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 shadow-sm">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="text-2xl font-extrabold tracking-[0.2em] text-rose-700 hover:text-rose-600 transition-colors">
                WIYA.CO
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-rose-600 transition-colors duration-200">Home</a>
                <a href="{{ route('shop') }}" class="hover:text-rose-600 transition-colors duration-200">Shop</a>
                <a href="#" class="hover:text-rose-600 transition-colors duration-200">About</a>
                <a href="#" class="hover:text-rose-600 transition-colors duration-200">Contact</a>
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-3">
                <a href="#" class="hidden md:inline-flex items-center gap-1 text-sm text-gray-600 hover:text-rose-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </a>
                <a href="#" class="inline-flex items-center gap-2 px-4 py-2 bg-rose-600 text-white text-sm font-semibold rounded-full hover:bg-rose-700 transition-colors duration-200 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    Cart
                </a>
            </div>
        </nav>
    </header>

    {{-- ===== MAIN CONTENT ===== --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- ===== FOOTER ===== --}}
    <footer class="bg-gray-950 text-gray-400 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-10">
                <div class="md:col-span-2">
                    <p class="text-2xl font-extrabold tracking-[0.2em] text-white mb-3">WIYA.CO</p>
                    <p class="text-sm text-gray-400 leading-relaxed max-w-xs">Curated fashion pieces for modern women — minimal, bold, and effortlessly elegant.</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold text-sm mb-4 tracking-wide uppercase">Shop</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-rose-400 transition-colors">New Arrivals</a></li>
                        <li><a href="#" class="hover:text-rose-400 transition-colors">Collections</a></li>
                        <li><a href="#" class="hover:text-rose-400 transition-colors">Sale</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold text-sm mb-4 tracking-wide uppercase">Info</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-rose-400 transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-rose-400 transition-colors">Size Guide</a></li>
                        <li><a href="#" class="hover:text-rose-400 transition-colors">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-6 flex flex-col md:flex-row items-center justify-between gap-3 text-xs text-gray-500">
                <p>&copy; {{ date('Y') }} WIYA.CO. All rights reserved.</p>
                <p>Made with ❤️ in Indonesia</p>
            </div>
        </div>
    </footer>

</body>
</html>
