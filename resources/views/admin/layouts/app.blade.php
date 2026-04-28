<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'WIYA') }} Admin Panel</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-wiya.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-brand-bg text-brand-dark antialiased font-sans" x-data="{ sidebarOpen: true }">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        <aside 
            class="bg-brand-dark text-white w-72 flex-shrink-0 flex flex-col transition-all duration-500 shadow-2xl z-50"
            :class="{ '-ml-72': !sidebarOpen }"
        >
            {{-- Logo Area --}}
            <a href="{{ route('admin.dashboard') }}" class="p-10 flex flex-col items-center gap-4 group border-b border-white/5">
                <img src="{{ asset('images/logo-wiya.png') }}" class="h-12 w-auto brightness-0 invert opacity-80 group-hover:opacity-100 transition-all" alt="WIYA.CO">
                <span class="text-[8px] font-bold tracking-[0.4em] uppercase text-brand-accent/80">Admin Console</span>
            </a>

            {{-- Navigation --}}
            <nav class="flex-1 px-6 py-10 space-y-3">
                @php
                    $navItems = [
                        ['route' => 'admin.dashboard', 'label' => 'Overview', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                        ['route' => 'admin.products.index', 'label' => 'Products', 'icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'],
                        ['route' => 'admin.categories.index', 'label' => 'Categories', 'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z'],
                        ['route' => 'admin.users.index', 'label' => 'Customers', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
                        ['route' => 'admin.orders.index', 'label' => 'Orders', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01'],
                    ];
                @endphp

                @foreach($navItems as $item)
                    <a href="{{ route($item['route']) }}" 
                       class="flex items-center gap-4 px-6 py-4 rounded-2xl text-[11px] font-bold uppercase tracking-widest transition-all duration-300 {{ request()->routeIs($item['route'] . '*') ? 'bg-white text-brand-dark shadow-xl shadow-black/20' : 'text-white/40 hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $item['icon'] }}"/></svg>
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            {{-- Sidebar Footer --}}
            <div class="p-10 border-t border-white/5">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl bg-brand-accent flex items-center justify-center text-white font-black shadow-lg">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-white">{{ Auth::user()->name }}</p>
                        <p class="text-[8px] font-bold uppercase tracking-[0.2em] text-brand-accent/60 mt-0.5">Administrator</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            
            <!-- Topbar -->
            <header class="bg-brand-bg/80 backdrop-blur-xl border-b border-brand-dark/5 h-20 flex items-center justify-between px-10 z-40">
                <div class="flex items-center gap-8">
                    <button @click="sidebarOpen = !sidebarOpen" class="text-brand-dark hover:text-brand-accent transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h7"/></svg>
                    </button>
                    <div class="hidden lg:block">
                        <h2 class="text-[10px] font-black uppercase tracking-[0.3em] text-brand-dark/40">WIYA.CO Management System</h2>
                    </div>
                </div>

                <div class="flex items-center gap-8">
                    <a href="{{ route('home') }}" target="_blank" class="text-[10px] font-bold uppercase tracking-widest text-brand-dark/60 hover:text-brand-dark transition-colors flex items-center gap-2">
                        View Store
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-[10px] font-black uppercase tracking-widest text-rose-500 hover:text-rose-600 transition-colors">
                            Sign Out
                        </button>
                    </form>
                </div>
            </header>

            <!-- Main Scrollable Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto p-10 lg:p-16">
                <div class="max-w-7xl mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <x-toast />
</body>
</html>
