@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')
@section('page_subtitle', 'Welcome back, Admin 👋')

@section('content')

{{-- Stats Grid --}}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">
    @foreach([
        ['label' => 'Total Orders',  'value' => $stats['orders'],    'icon' => '📦', 'trend' => '+12%', 'color' => 'bg-blue-50 text-blue-600',   'bar' => 'bg-blue-500'],
        ['label' => 'Revenue',       'value' => $stats['revenue'],   'icon' => '💰', 'trend' => '+8%',  'color' => 'bg-green-50 text-green-600',  'bar' => 'bg-green-500'],
        ['label' => 'Products',      'value' => $stats['products'],  'icon' => '👗', 'trend' => '+3',   'color' => 'bg-rose-50 text-rose-600',    'bar' => 'bg-rose-500'],
        ['label' => 'Customers',     'value' => $stats['customers'], 'icon' => '👥', 'trend' => '+24',  'color' => 'bg-purple-50 text-purple-600','bar' => 'bg-purple-500'],
    ] as $stat)
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-200">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 {{ $stat['color'] }} rounded-xl flex items-center justify-center text-2xl">
                {{ $stat['icon'] }}
            </div>
            <span class="text-xs font-semibold text-green-600 bg-green-50 px-2.5 py-1 rounded-full">{{ $stat['trend'] }}</span>
        </div>
        <p class="text-sm text-gray-500 mb-1">{{ $stat['label'] }}</p>
        <p class="text-3xl font-extrabold text-gray-900">{{ $stat['value'] }}</p>
        <div class="mt-4 h-1.5 bg-gray-100 rounded-full overflow-hidden">
            <div class="h-full {{ $stat['bar'] }} rounded-full w-3/4"></div>
        </div>
    </div>
    @endforeach
</div>

{{-- Content Grid --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Recent Orders --}}
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100">
            <h2 class="font-bold text-gray-900">Recent Orders</h2>
            <a href="#" class="text-xs text-rose-600 font-semibold hover:text-rose-700 transition-colors">View all →</a>
        </div>
        <div class="p-6">
            <div class="flex flex-col items-center justify-center py-12 text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center text-3xl mb-4">📦</div>
                <p class="text-gray-500 font-medium">No orders yet</p>
                <p class="text-gray-400 text-sm mt-1">Orders will appear here once customers start buying</p>
            </div>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100">
            <h2 class="font-bold text-gray-900">Quick Actions</h2>
        </div>
        <div class="p-5 space-y-3">
            @foreach([
                ['label' => 'Add New Product',  'icon' => '➕', 'color' => 'bg-rose-600 hover:bg-rose-700 text-white'],
                ['label' => 'View Orders',       'icon' => '📦', 'color' => 'bg-gray-900 hover:bg-gray-800 text-white'],
                ['label' => 'Manage Customers',  'icon' => '👥', 'color' => 'bg-gray-100 hover:bg-gray-200 text-gray-800'],
                ['label' => 'View Reports',      'icon' => '📊', 'color' => 'bg-gray-100 hover:bg-gray-200 text-gray-800'],
            ] as $action)
            <a href="#" class="flex items-center gap-3 px-4 py-3.5 {{ $action['color'] }} rounded-xl text-sm font-semibold transition-all duration-200 hover:-translate-y-0.5 shadow-sm">
                <span>{{ $action['icon'] }}</span>
                {{ $action['label'] }}
            </a>
            @endforeach
        </div>
    </div>

    {{-- System Info --}}
    <div class="lg:col-span-3 bg-gradient-to-br from-gray-900 to-gray-800 text-white rounded-2xl p-6 shadow-sm">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <div>
                <p class="text-rose-400 text-xs font-semibold tracking-widest uppercase mb-2">System Status</p>
                <h3 class="text-xl font-bold mb-1">🚀 WIYA.CO is ready to launch!</h3>
                <p class="text-gray-400 text-sm">Laravel {{ app()->version() }} · PHP {{ phpversion() }} · Asia/Jakarta</p>
            </div>
            <div class="flex items-center gap-3">
                <span class="flex items-center gap-2 px-4 py-2 bg-green-500/20 text-green-400 text-sm font-semibold rounded-full border border-green-500/30">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    Online
                </span>
                <a href="{{ route('home') }}" target="_blank"
                   class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white text-sm font-semibold rounded-full transition-colors duration-200">
                    View Site →
                </a>
            </div>
        </div>
    </div>

</div>

@endsection
