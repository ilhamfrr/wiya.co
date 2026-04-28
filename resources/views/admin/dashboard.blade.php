@extends('admin.layouts.app')

@section('content')
<div class="animate-fade-in">
    <!-- Welcome Header -->
    <div class="mb-10">
        <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight">Overview</h2>
        <p class="text-gray-500 mt-2 font-medium">Welcome back, Admin. Here's what's happening with WIYA.CO today.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        @foreach([
            ['label' => 'Total Orders', 'value' => $stats['orders'], 'icon' => '📦', 'color' => 'bg-blue-50 text-blue-600'],
            ['label' => 'Total Revenue', 'value' => $stats['revenue'], 'icon' => '💰', 'color' => 'bg-emerald-50 text-emerald-600'],
            ['label' => 'Products', 'value' => $stats['products'], 'icon' => '👗', 'color' => 'bg-rose-50 text-rose-600'],
            ['label' => 'Active Users', 'value' => $stats['customers'], 'icon' => '👥', 'color' => 'bg-purple-50 text-purple-600'],
        ] as $stat)
            <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="w-14 h-14 {{ $stat['color'] }} rounded-2xl flex items-center justify-center text-2xl mb-6 shadow-sm">
                    {{ $stat['icon'] }}
                </div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em] mb-1">{{ $stat['label'] }}</p>
                <h3 class="text-3xl font-black text-gray-900 tracking-tight">{{ $stat['value'] }}</h3>
            </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent Orders Table -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="font-bold text-gray-900 uppercase tracking-widest text-xs">Recent Activity</h3>
                    <a href="{{ route('admin.orders.index') }}" class="text-xs font-bold text-rose-600 hover:text-rose-700 transition-colors">See all transactions &rarr;</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-50/50">
                                <th class="px-8 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">ID</th>
                                <th class="px-8 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Customer</th>
                                <th class="px-8 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest text-right">Total</th>
                                <th class="px-8 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($recentOrders as $order)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-8 py-5 font-mono text-xs font-bold text-gray-900">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                                    <td class="px-8 py-5 font-bold text-gray-900 text-sm">{{ $order->customer_name }}</td>
                                    <td class="px-8 py-5 text-right font-black text-gray-900 text-sm">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                    <td class="px-8 py-5 text-center">
                                        <x-status-badge :status="$order->status" />
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-20 text-center text-gray-400 font-bold uppercase tracking-widest text-xs">No recent orders</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Quick Actions & System Info -->
        <div class="space-y-8">
            <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-gray-100">
                <h3 class="font-bold text-gray-900 uppercase tracking-widest text-xs mb-6 pb-4 border-b border-gray-50">Quick Actions</h3>
                <div class="grid gap-4">
                    <a href="{{ route('admin.products.create') }}" class="group flex items-center justify-between p-4 bg-gray-50 rounded-2xl hover:bg-black transition-all duration-300">
                        <span class="font-bold text-gray-900 group-hover:text-white transition-colors">Add Product</span>
                        <span class="w-8 h-8 bg-white rounded-xl flex items-center justify-center shadow-sm group-hover:bg-gray-800 transition-colors text-black group-hover:text-white">&plus;</span>
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="group flex items-center justify-between p-4 bg-gray-50 rounded-2xl hover:bg-black transition-all duration-300">
                        <span class="font-bold text-gray-900 group-hover:text-white transition-colors">Manage Catalog</span>
                        <span class="w-8 h-8 bg-white rounded-xl flex items-center justify-center shadow-sm group-hover:bg-gray-800 transition-colors text-black group-hover:text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        </span>
                    </a>
                </div>
            </div>

            <div class="bg-gray-950 rounded-[2.5rem] p-8 text-white shadow-xl">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-3 h-3 bg-emerald-500 rounded-full animate-pulse"></div>
                    <span class="text-[10px] font-black uppercase tracking-widest text-emerald-500">System Live</span>
                </div>
                <h4 class="text-xl font-black mb-2 tracking-tight">Launch Ready</h4>
                <p class="text-gray-400 text-sm leading-relaxed mb-6">Your store is fully configured with Laravel {{ app()->version() }} and ready for production traffic.</p>
                <a href="{{ route('home') }}" target="_blank" class="block w-full bg-white text-black text-center font-black py-4 rounded-2xl hover:bg-rose-500 hover:text-white transition-all">View Public Site</a>
            </div>
        </div>
    </div>
</div>
@endsection
