@extends('layouts.app')

@section('title', 'Shopping Bag — WIYA.CO')

@section('content')

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
    {{-- Header --}}
    <div class="mb-12 border-b border-brand-dark/5 pb-8 flex justify-between items-end">
        <div>
            <div class="flex items-center gap-4 mb-4">
                <span class="w-8 h-[2px] bg-brand-accent"></span>
                <span class="text-[10px] font-black text-brand-accent uppercase tracking-[0.4em]">Cart Overview</span>
            </div>
            <h1 class="text-4xl font-black text-brand-dark tracking-tighter uppercase">Your Shopping Bag</h1>
            <p class="text-brand-dark/40 text-[10px] font-bold uppercase tracking-[0.3em] mt-3">You have {{ count($cart) }} items in your selection</p>
        </div>
        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            <button type="submit" class="text-[9px] font-black text-brand-dark/20 hover:text-red-500 uppercase tracking-[0.3em] transition-colors">Clear Entire Bag</button>
        </form>
    </div>

    @if(count($cart) > 0)
        <div class="flex flex-col lg:flex-row gap-16 items-start">
            {{-- Cart List --}}
            <div class="w-full lg:flex-1">
                {{-- Column Headers (Desktop Only) --}}
                <div class="hidden md:grid grid-cols-12 gap-4 border-b border-brand-dark/5 pb-4 mb-8 text-[9px] font-black uppercase tracking-[0.3em] text-brand-dark/30">
                    <div class="col-span-6">Product Details</div>
                    <div class="col-span-2 text-center">Quantity</div>
                    <div class="col-span-2 text-center">Unit Price</div>
                    <div class="col-span-2 text-right">Subtotal</div>
                </div>

                <div class="space-y-10">
                    @foreach($cart as $id => $item)
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 md:gap-4 items-center pb-10 border-b border-brand-dark/5 group animate-fade-in" 
                             style="animation-delay: {{ $loop->index * 0.1 }}s"
                             x-data="{ 
                                quantity: {{ $item['quantity'] }},
                                updating: false,
                                updateQty(newQty) {
                                    if(newQty < 1 || this.updating) return;
                                    this.updating = true;
                                    fetch('{{ route('cart.update') }}', {
                                        method: 'POST',
                                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                        body: JSON.stringify({ id: '{{ $id }}', quantity: newQty })
                                    }).then(() => window.location.reload())
                                },
                                remove() {
                                    fetch('{{ route('cart.remove') }}', {
                                        method: 'POST',
                                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                        body: JSON.stringify({ id: '{{ $id }}' })
                                    }).then(res => res.json()).then(data => {
                                        $store.cart.updateCount(data.cart_count);
                                        window.location.reload();
                                    })
                                }
                             }">
                            {{-- Product Details --}}
                            <div class="col-span-1 md:col-span-6 flex items-center gap-6">
                                <div class="w-20 md:w-28 aspect-[4/5] bg-white rounded-2xl overflow-hidden shadow-sm flex-shrink-0">
                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                                </div>
                                <div class="space-y-2">
                                    <h3 class="text-sm md:text-base font-black text-brand-dark uppercase tracking-tight leading-tight">{{ $item['name'] }}</h3>
                                    <div class="flex flex-wrap gap-x-4 gap-y-1">
                                        @if(isset($item['color']) && $item['color'])
                                            <p class="text-[9px] text-brand-dark/40 font-bold uppercase tracking-widest">Color: <span class="text-brand-dark">{{ $item['color'] }}</span></p>
                                        @endif
                                        @if(isset($item['size']) && $item['size'])
                                            <p class="text-[9px] text-brand-dark/40 font-bold uppercase tracking-widest">Size: <span class="text-brand-dark">{{ $item['size'] }}</span></p>
                                        @endif
                                    </div>
                                    <button @click="remove" class="text-[9px] font-black text-red-500/40 hover:text-red-500 uppercase tracking-[0.2em] pt-2 transition-colors">Remove from bag</button>
                                </div>
                            </div>

                            {{-- Quantity (Responsive) --}}
                            <div class="col-span-1 md:col-span-2 flex justify-between md:justify-center items-center">
                                <span class="md:hidden text-[9px] font-black uppercase tracking-widest text-brand-dark/20">Quantity</span>
                                <div class="flex items-center gap-4 bg-white border border-brand-dark/5 rounded-full px-4 py-2 shadow-sm">
                                    <button @click="updateQty(quantity - 1)" class="text-brand-dark/30 hover:text-brand-dark transition-colors font-bold">-</button>
                                    <span class="text-[11px] font-black w-4 text-center text-brand-dark" x-text="quantity"></span>
                                    <button @click="updateQty(quantity + 1)" class="text-brand-dark/30 hover:text-brand-dark transition-colors font-bold">+</button>
                                </div>
                            </div>

                            {{-- Price (Responsive) --}}
                            <div class="col-span-1 md:col-span-2 flex justify-between md:justify-center items-center">
                                <span class="md:hidden text-[9px] font-black uppercase tracking-widest text-brand-dark/20">Unit Price</span>
                                <span class="text-xs font-bold text-brand-dark/60">Rp {{ $item['price'] }}</span>
                            </div>

                            {{-- Total (Responsive) --}}
                            <div class="col-span-1 md:col-span-2 flex justify-between md:justify-end items-center">
                                <span class="md:hidden text-[9px] font-black uppercase tracking-widest text-brand-dark/20">Subtotal</span>
                                <span class="text-base font-black text-brand-dark italic">
                                    Rp {{ number_format((float) str_replace('.', '', $item['price']) * $item['quantity'], 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="mt-12">
                    <a href="{{ route('shop') }}" class="group inline-flex items-center gap-3 text-[10px] font-black uppercase tracking-[0.3em] text-brand-dark/30 hover:text-brand-dark transition-all">
                        <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
                        Continue Shopping
                    </a>
                </div>
            </div>

            {{-- Summary Sidebar --}}
            <div class="w-full lg:w-96 lg:sticky lg:top-32">
                <div class="bg-white border border-brand-dark/5 rounded-[2.5rem] p-10 shadow-2xl relative overflow-hidden">
                    <h2 class="text-xl font-black text-brand-dark uppercase tracking-tight mb-10">Order Summary</h2>
                    
                    <div class="space-y-6 mb-10">
                        <div class="flex justify-between items-center text-[10px] font-black uppercase tracking-[0.2em] text-brand-dark/40">
                            <span>Subtotal</span>
                            <span class="text-brand-dark">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between items-center text-[10px] font-black uppercase tracking-[0.2em] text-brand-dark/40">
                            <span>Standard Shipping</span>
                            <span class="text-green-600">Calculated</span>
                        </div>
                        <div class="h-[1px] bg-brand-dark/5 my-6"></div>
                        <div class="flex justify-between items-end">
                            <span class="text-xs font-black uppercase tracking-[0.2em] text-brand-dark">Grand Total</span>
                            <span class="text-3xl font-black text-brand-dark italic tracking-tighter">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <a href="{{ route('checkout') }}" class="btn-primary w-full py-6 rounded-2xl group flex items-center justify-center gap-3">
                        Checkout Securely
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    
                    <div class="mt-8 pt-8 border-t border-brand-dark/5">
                        <p class="text-[8px] font-bold text-center text-brand-dark/20 uppercase tracking-[0.4em] leading-loose">
                            Safe & Secure Checkout <br>
                            Verified by WIYA Global
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-40 bg-white border border-brand-dark/5 rounded-[3rem] shadow-sm">
            <div class="w-20 h-20 bg-brand-bg rounded-full flex items-center justify-center mx-auto mb-8">
                <svg class="w-10 h-10 text-brand-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
            </div>
            <h3 class="text-2xl font-black text-brand-dark tracking-tight mb-4 uppercase">Your Bag is Empty</h3>
            <p class="text-brand-dark/40 max-w-sm mx-auto mb-10 text-xs leading-relaxed">It looks like you haven't added anything to your selection yet.</p>
            <a href="{{ route('shop') }}" class="btn-primary inline-flex">Explore Collections</a>
        </div>
    @endif
</section>

@endsection
