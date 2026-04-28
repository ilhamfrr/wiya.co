@extends('admin.layouts.app')

@section('content')
<div class="animate-fade-in">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Orders</h2>
            <p class="text-gray-500 mt-1">Review and manage customer transactions.</p>
        </div>
    </div>

    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-8 py-5 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Order ID</th>
                        <th class="px-8 py-5 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Customer</th>
                        <th class="px-8 py-5 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Total Price</th>
                        <th class="px-8 py-5 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-5 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Date</th>
                        <th class="px-8 py-5 text-[10px] font-bold text-gray-400 uppercase tracking-widest text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($orders as $order)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-8 py-5 font-mono text-sm font-bold">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-8 py-5 font-bold text-gray-900">{{ $order->customer_name }}</td>
                            <td class="px-8 py-5 font-black text-gray-900">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td class="px-8 py-5">
                                <x-status-badge :status="$order->status" />
                            </td>
                            <td class="px-8 py-5 text-xs text-gray-500">{{ $order->created_at->format('d M Y') }}</td>
                            <td class="px-8 py-5 text-right">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="inline-flex items-center justify-center w-10 h-10 bg-gray-100 text-gray-600 rounded-xl hover:bg-black hover:text-white transition-all active:scale-95">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-8 py-20 text-center text-gray-400 font-bold uppercase tracking-widest">No orders found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-8">
        {{ $orders->links() }}
    </div>
</div>
@endsection
