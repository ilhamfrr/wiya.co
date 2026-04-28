@extends('admin.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto animate-fade-in">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Order Details</h2>
            <p class="text-gray-500 mt-1">Order #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }} &bull; {{ $order->created_at->format('d M Y, H:i') }}</p>
        </div>
        <a href="{{ route('admin.orders.index') }}" class="text-sm font-bold text-gray-400 hover:text-black transition-colors uppercase tracking-widest">Back to List</a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="font-bold text-gray-900 uppercase tracking-widest text-xs">Items</h3>
                </div>
                <table class="w-full text-left">
                    <tbody class="divide-y divide-gray-50">
                        @foreach($order->items as $item)
                            <tr>
                                <td class="px-8 py-5 flex items-center gap-4">
                                    @if($item->product->image)
                                        <img src="{{ asset('storage/' . $item->product->image) }}" class="w-12 h-12 rounded-xl object-cover">
                                    @endif
                                    <div>
                                        <div class="font-bold text-gray-900">{{ $item->product->name }}</div>
                                        <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Qty: {{ $item->quantity }}</div>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-right font-black text-gray-900">
                                    Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-50/50">
                            <td class="px-8 py-6 font-bold text-gray-400 uppercase tracking-widest text-xs">Total Amount</td>
                            <td class="px-8 py-6 text-right text-2xl font-black text-rose-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="space-y-8">
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100">
                <h3 class="font-bold text-gray-900 uppercase tracking-widest text-xs mb-6 pb-4 border-b border-gray-50">Customer</h3>
                <div class="space-y-4">
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Name</p>
                        <p class="font-bold text-gray-900">{{ $order->customer_name }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Phone</p>
                        <p class="font-medium text-gray-700">{{ $order->phone }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Address</p>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $order->address }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100">
                <h3 class="font-bold text-gray-900 uppercase tracking-widest text-xs mb-6 pb-4 border-b border-gray-50">Status</h3>
                <div class="mb-6">
                    <x-status-badge :status="$order->status" class="py-2 px-4 shadow-sm" />
                </div>
                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <select name="status" class="w-full bg-gray-50 border-none rounded-2xl px-4 py-3 text-sm font-semibold text-gray-700 focus:ring-2 focus:ring-black outline-none appearance-none">
                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    <button type="submit" class="w-full bg-gray-900 text-white font-bold py-4 rounded-2xl hover:bg-black transition-all active:scale-[0.98]">Update Status</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
