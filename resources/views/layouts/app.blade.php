<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', 'WIYA.CO — Modest Wear, Modern You.')">
    <link rel="icon" type="image/png" href="{{ asset('images/logo-wiya.png') }}">
    
    <title>{{ config('app.name', 'WIYA.CO') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('cart', {
                count: 0,
                init() {
                    fetch('{{ route('cart.count') }}')
                        .then(res => res.json())
                        .then(data => this.count = data.count)
                },
                updateCount(newCount) {
                    this.count = newCount;
                }
            })
        })
    </script>
</head>
<body class="min-h-screen flex flex-col bg-brand-bg text-brand-dark font-sans antialiased overflow-x-hidden">

    {{-- ===== TOP ANNOUNCEMENT BAR ===== --}}
    <div class="bg-brand-dark text-white py-2.5 text-center relative z-[60]">
        <p class="text-[9px] font-black uppercase tracking-[0.3em] opacity-90">Free International Shipping on Orders Over Rp 2.000.000</p>
    </div>

    {{-- ===== NAVBAR ===== --}}
    <header class="sticky top-0 z-50 bg-brand-bg/80 backdrop-blur-xl border-b border-brand-dark/5">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-20">
            {{-- Branding --}}
            <a href="{{ route('home') }}" class="text-3xl font-black tracking-[0.2em] text-brand-dark hover:opacity-70 transition-opacity">
                WIYA.CO
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden md:flex items-center gap-10 text-[11px] font-bold uppercase tracking-[0.2em] text-brand-dark/60">
                <a href="{{ route('home') }}" class="hover:text-brand-dark transition-colors duration-300 {{ request()->routeIs('home') ? 'text-brand-dark' : '' }}">Home</a>
                <a href="{{ route('shop') }}" class="hover:text-brand-dark transition-colors duration-300 {{ request()->routeIs('shop') ? 'text-brand-dark' : '' }}">Collections</a>
                <a href="{{ route('lookbook') }}" class="hover:text-brand-dark transition-colors duration-300 {{ request()->routeIs('lookbook') ? 'text-brand-dark' : '' }}">Lookbook</a>
                <a href="{{ route('about') }}" class="hover:text-brand-dark transition-colors duration-300 {{ request()->routeIs('about') ? 'text-brand-dark' : '' }}">About</a>
                <a href="{{ route('contact') }}" class="hover:text-brand-dark transition-colors duration-300 {{ request()->routeIs('contact') ? 'text-brand-dark' : '' }}">Contact</a>
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="text-[11px] font-bold uppercase tracking-widest text-brand-dark hover:text-brand-accent transition-colors">
                                {{ Auth::user()->name }}
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('dashboard')">My Account</x-dropdown-link>
                            @if(Auth::user()->role === 'admin')
                                <x-dropdown-link :href="route('admin.dashboard')">Admin Panel</x-dropdown-link>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Logout</x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="text-[11px] font-bold uppercase tracking-widest text-brand-dark/60 hover:text-brand-dark transition-colors">Login</a>
                @endauth

                <a href="{{ route('cart.index') }}" class="relative p-2 text-brand-dark hover:text-brand-accent transition-colors" x-data>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    <span class="absolute top-0 right-0 w-4 h-4 bg-brand-dark text-white text-[8px] font-black rounded-full flex items-center justify-center" x-text="$store.cart.count"></span>
                </a>
            </div>
        </nav>
    </header>

    {{-- ===== MAIN CONTENT ===== --}}
    <main class="flex-1">
        @if(isset($slot))
            <div class="animate-fade-in">
                {{ $slot }}
            </div>
        @else
            <div class="animate-fade-in">
                @yield('content')
            </div>
        @endif
    </main>

    {{-- ===== FOOTER ===== --}}
    <footer class="bg-brand-dark text-brand-bg py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="md:col-span-2">
                    <p class="text-3xl font-black tracking-[0.3em] mb-4">WIYA.CO</p>
                    <p class="text-xs text-brand-bg/60 tracking-widest uppercase mb-8">Modest Wear, Modern You</p>
                    <p class="text-sm text-brand-bg/40 leading-loose max-w-sm">Curating timeless pieces that honor tradition while embracing the modern woman's lifestyle. Minimal, bold, and effortlessly elegant.</p>
                </div>
                <div>
                    <h4 class="text-[10px] font-black uppercase tracking-[0.3em] mb-6 text-brand-accent">Explore</h4>
                    <ul class="space-y-4 text-xs tracking-widest uppercase">
                        <li><a href="#" class="hover:text-brand-accent transition-colors">New Arrivals</a></li>
                        <li><a href="{{ route('lookbook') }}" class="hover:text-brand-accent transition-colors">Lookbook</a></li>
                        <li><a href="#" class="hover:text-brand-accent transition-colors">Best Sellers</a></li>
                        <li><a href="#" class="hover:text-brand-accent transition-colors">Sale</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-[10px] font-black uppercase tracking-[0.3em] mb-6 text-brand-accent">Support</h4>
                    <ul class="space-y-4 text-xs tracking-widest uppercase">
                        <li><a href="{{ route('contact') }}" class="hover:text-brand-accent transition-colors">Contact</a></li>
                        <li><a href="#" class="hover:text-brand-accent transition-colors">Shipping</a></li>
                        <li><a href="#" class="hover:text-brand-accent transition-colors">Returns</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-brand-bg/10 mt-20 pt-8 flex flex-col md:flex-row items-center justify-between gap-4 text-[10px] font-bold tracking-widest uppercase text-brand-bg/20">
                <p>&copy; {{ date('Y') }} WIYA.CO. All rights reserved.</p>
                <p>Designed with Intent in Wiya Indonesia</p>
            </div>
        </div>
    </footer>

    <x-toast />
</body>
</html>
