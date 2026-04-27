<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — WIYA.CO</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased">

<div class="flex min-h-screen">

    {{-- ===== SIDEBAR ===== --}}
    <aside class="w-64 bg-gray-950 text-white flex flex-col fixed inset-y-0 left-0 z-40 shadow-2xl">
        {{-- Brand --}}
        <div class="px-6 py-5 border-b border-gray-800">
            <p class="text-xl font-extrabold tracking-[0.2em] text-rose-400">WIYA.CO</p>
            <p class="text-xs text-gray-500 mt-0.5">Admin Panel</p>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-3 py-5 space-y-0.5 overflow-y-auto">
            @php
                $menu = [
                    ['label' => 'Dashboard',  'icon' => '📊', 'route' => 'admin.dashboard'],
                    ['label' => 'Products',   'icon' => '👗', 'route' => '#'],
                    ['label' => 'Orders',     'icon' => '📦', 'route' => '#'],
                    ['label' => 'Customers',  'icon' => '👥', 'route' => '#'],
                    ['label' => 'Reports',    'icon' => '📈', 'route' => '#'],
                    ['label' => 'Settings',   'icon' => '⚙️', 'route' => '#'],
                ];
            @endphp

            @foreach($menu as $item)
                @php
                    $href   = ($item['route'] !== '#') ? route($item['route']) : '#';
                    $active = ($item['route'] !== '#') && request()->routeIs($item['route']);
                @endphp
                <a href="{{ $href }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200
                          {{ $active ? 'bg-rose-600 text-white shadow-md' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                    <span class="text-base">{{ $item['icon'] }}</span>
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        {{-- Footer --}}
        <div class="px-5 py-4 border-t border-gray-800">
            <p class="text-xs text-gray-500 text-center">v1.0.0 · Laravel {{ app()->version() }}</p>
        </div>
    </aside>

    {{-- ===== MAIN AREA ===== --}}
    <div class="ml-64 flex-1 flex flex-col min-h-screen">

        {{-- Top Bar --}}
        <header class="sticky top-0 z-30 bg-white border-b border-gray-100 shadow-sm px-8 py-4 flex items-center justify-between">
            <div>
                <h1 class="text-lg font-bold text-gray-900">@yield('page_title', 'Dashboard')</h1>
                <p class="text-xs text-gray-400 mt-0.5">@yield('page_subtitle', 'Welcome back, Admin 👋')</p>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-xs text-gray-400">{{ now()->format('d M Y · H:i') }} WIB</span>
                <div class="w-9 h-9 rounded-full bg-rose-100 flex items-center justify-center text-rose-600 font-bold text-sm">A</div>
            </div>
        </header>

        {{-- Page Content --}}
        <main class="flex-1 p-8">
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>
