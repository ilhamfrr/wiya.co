@extends('layouts.app')

@section('title', 'My Account — WIYA.CO')

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
                <a href="{{ route('dashboard') }}" class="flex items-center gap-4 p-4 rounded-2xl bg-brand-dark text-white shadow-xl shadow-brand-dark/10 transition-all group">
                    <span class="w-2 h-2 rounded-full bg-brand-accent"></span>
                    <span class="text-[10px] font-black uppercase tracking-widest">Overview</span>
                </a>
                <a href="{{ route('dashboard.orders') }}" class="flex items-center gap-4 p-4 rounded-2xl bg-white border border-brand-dark/5 text-brand-dark hover:border-brand-dark transition-all group">
                    <span class="w-2 h-2 rounded-full bg-brand-dark/10 group-hover:bg-brand-dark"></span>
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
        <main class="flex-1 space-y-16">
            {{-- Stats Overview --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white border border-brand-dark/5 rounded-[2.5rem] p-10 shadow-sm space-y-4">
                    <p class="text-[10px] font-black text-brand-dark/40 uppercase tracking-widest">Total Orders</p>
                    <p class="text-4xl font-black text-brand-dark italic tracking-tighter">{{ Auth::user()->orders()->count() }}</p>
                </div>
                <div class="bg-white border border-brand-dark/5 rounded-[2.5rem] p-10 shadow-sm space-y-4">
                    <p class="text-[10px] font-black text-brand-dark/40 uppercase tracking-widest">Member Since</p>
                    <p class="text-4xl font-black text-brand-dark italic tracking-tighter">{{ Auth::user()->created_at->format('Y') }}</p>
                </div>
                <div class="bg-white border border-brand-dark/5 rounded-[2.5rem] p-10 shadow-sm space-y-4">
                    <p class="text-[10px] font-black text-brand-dark/40 uppercase tracking-widest">Loyalty Level</p>
                    <p class="text-4xl font-black text-brand-accent italic tracking-tighter uppercase">Elite</p>
                </div>
            </div>

            {{-- Recent Orders --}}
            <div class="space-y-8">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-black text-brand-dark uppercase tracking-tight">Recent Orders</h2>
                    <a href="{{ route('dashboard.orders') }}" class="text-[10px] font-black text-brand-accent uppercase tracking-widest hover:underline">View All</a>
                </div>

                @if($recent_orders->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-separate border-spacing-y-4">
                            <thead>
                                <tr class="text-[10px] font-black text-brand-dark/40 uppercase tracking-widest">
                                    <th class="px-8 py-4">Order ID</th>
                                    <th class="px-8 py-4">Date</th>
                                    <th class="px-8 py-4">Total</th>
                                    <th class="px-8 py-4">Status</th>
                                    <th class="px-8 py-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_orders as $order)
                                    <tr class="bg-white group">
                                        <td class="px-8 py-6 rounded-l-[2rem] border-y border-l border-brand-dark/5 group-hover:border-brand-dark transition-all">
                                            <span class="text-xs font-black text-brand-dark">#{{ $order->id }}</span>
                                        </td>
                                        <td class="px-8 py-6 border-y border-brand-dark/5 group-hover:border-brand-dark transition-all">
                                            <span class="text-[11px] font-bold text-brand-dark/50">{{ $order->created_at->format('M d, Y') }}</span>
                                        </td>
                                        <td class="px-8 py-6 border-y border-brand-dark/5 group-hover:border-brand-dark transition-all">
                                            <span class="text-xs font-black text-brand-dark italic">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                        </td>
                                        <td class="px-8 py-6 border-y border-brand-dark/5 group-hover:border-brand-dark transition-all">
                                            <span class="px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest {{ $order->payment_status === 'paid' ? 'bg-green-100 text-green-600' : 'bg-brand-bg text-brand-dark/40' }}">
                                                {{ $order->payment_status }}
                                            </span>
                                        </td>
                                        <td class="px-8 py-6 rounded-r-[2rem] border-y border-r border-brand-dark/5 group-hover:border-brand-dark transition-all">
                                            <button class="text-[10px] font-black text-brand-dark uppercase tracking-widest hover:text-brand-accent transition-colors">Details</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="bg-brand-bg/50 border border-brand-dark/5 rounded-[2.5rem] p-16 text-center space-y-6">
                        <p class="text-[10px] font-black text-brand-dark/20 uppercase tracking-[0.4em]">No transactions found.</p>
                        <a href="{{ route('shop') }}" class="btn-primary inline-flex">Start Shopping</a>
                    </div>
                @endif
            </div>
        </main>
    </div>
</div>
@endsection
