@extends('layouts.app')

@section('title', 'Order History — WIYA.CO')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
    <div class="flex flex-col lg:flex-row gap-16 items-start">
        {{-- Sidebar --}}
        <aside class="w-full lg:w-64 lg:sticky lg:top-32 space-y-12">
            <div>
                <h1 class="text-3xl font-black text-brand-dark tracking-tighter uppercase mb-2">{{ Auth::user()->name }}</h1>
                <p class="text-[10px] font-bold text-brand-dark/40 uppercase tracking-widest">{{ Auth::user()->email }}</p>
            </div>

            <nav class="flex flex-col gap-4">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-4 p-4 rounded-2xl bg-white border border-brand-dark/5 text-brand-dark hover:border-brand-dark transition-all group">
                    <span class="w-2 h-2 rounded-full bg-brand-dark/10 group-hover:bg-brand-dark"></span>
                    <span class="text-[10px] font-black uppercase tracking-widest">Overview</span>
                </a>
                <a href="{{ route('dashboard.orders') }}" class="flex items-center gap-4 p-4 rounded-2xl bg-brand-dark text-white shadow-xl shadow-brand-dark/10 transition-all group">
                    <span class="w-2 h-2 rounded-full bg-brand-accent"></span>
                    <span class="text-[10px] font-black uppercase tracking-widest">Order History</span>
                </a>
                <a href="{{ route('dashboard.profile') }}" class="flex items-center gap-4 p-4 rounded-2xl bg-white border border-brand-dark/5 text-brand-dark hover:border-brand-dark transition-all group">
                    <span class="w-2 h-2 rounded-full bg-brand-dark/10 group-hover:bg-brand-dark"></span>
                    <span class="text-[10px] font-black uppercase tracking-widest">Personal Details</span>
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-4 p-4 rounded-2xl bg-white border border-brand-dark/5 text-red-500 hover:bg-red-50 transition-all group text-left">
                        <span class="w-2 h-2 rounded-full bg-red-200"></span>
                        <span class="text-[10px] font-black uppercase tracking-widest">Sign Out</span>
                    </button>
                </form>
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 space-y-12">
            <div>
                <h2 class="text-xl font-black text-brand-dark uppercase tracking-tight mb-4">Order History</h2>
                <p class="text-[10px] font-bold text-brand-dark/40 uppercase tracking-widest">Track your past purchases and current shipments.</p>
            </div>

            @forelse($orders as $order)
                <div class="bg-white border border-brand-dark/5 rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-xl transition-all group">
                    <div class="p-8 md:p-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-8 border-b border-brand-dark/5 bg-brand-bg/10">
                        <div class="flex flex-wrap gap-8">
                            <div class="space-y-1">
                                <p class="text-[9px] font-black text-brand-dark/30 uppercase tracking-widest">Order ID</p>
                                <p class="text-sm font-black text-brand-dark uppercase tracking-tighter">#{{ $order->id }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-[9px] font-black text-brand-dark/30 uppercase tracking-widest">Date Placed</p>
                                <p class="text-sm font-black text-brand-dark uppercase tracking-tighter">{{ $order->created_at->format('d M Y') }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-[9px] font-black text-brand-dark/30 uppercase tracking-widest">Total Amount</p>
                                <p class="text-sm font-black text-brand-dark italic tracking-tighter">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="px-6 py-2 rounded-full text-[9px] font-black uppercase tracking-widest {{ $order->payment_status === 'paid' ? 'bg-green-100 text-green-600' : 'bg-brand-dark/5 text-brand-dark/40' }}">
                                {{ $order->payment_status }}
                            </span>
                            <button class="btn-outline py-3 px-6 rounded-xl text-[9px]">Invoice</button>
                        </div>
                    </div>
                    
                    <div class="p-8 md:p-10 space-y-8">
                        @foreach($order->items as $item)
                            <div class="flex gap-6 items-center">
                                <div class="w-16 h-20 bg-brand-bg rounded-xl overflow-hidden flex-shrink-0">
                                    <img src="{{ Str::startsWith($item->product_image, 'http') ? $item->product_image : asset('storage/' . $item->product_image) }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-[11px] font-black text-brand-dark uppercase tracking-tight truncate">{{ $item->product_name }}</h4>
                                    <p class="text-[9px] text-brand-dark/40 font-bold uppercase tracking-widest mt-1">QTY: {{ $item->quantity }} &bull; Size: {{ $item->size }}</p>
                                    <p class="text-[10px] font-black text-brand-dark mt-2 italic">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                </div>
                                <div class="hidden md:block">
                                    <a href="{{ route('product.show', $item->product_id) }}" class="text-[9px] font-black text-brand-accent uppercase tracking-widest hover:underline">Buy Again</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="bg-brand-bg/50 border border-brand-dark/5 rounded-[2.5rem] p-16 text-center space-y-6">
                    <p class="text-[10px] font-black text-brand-dark/20 uppercase tracking-[0.4em]">No orders yet.</p>
                    <a href="{{ route('shop') }}" class="btn-primary inline-flex">Explore Catalog</a>
                </div>
            @endforelse

            <div class="pt-10">
                {{ $orders->links() }}
            </div>
        </main>
    </div>
</div>
@endsection
