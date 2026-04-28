@extends('layouts.app')

@section('title', 'Payment Successful — WIYA.CO')

@section('content')
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 text-center">
    <div class="space-y-10 animate-fade-in">
        <div class="w-24 h-24 bg-green-50 rounded-full flex items-center justify-center mx-auto text-green-500 shadow-xl shadow-green-100">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        </div>
        
        <div class="space-y-4">
            <h1 class="text-5xl font-black text-brand-dark tracking-tighter uppercase">Payment Confirmed.</h1>
            <p class="text-brand-dark/40 text-xs font-bold uppercase tracking-[0.4em] max-w-md mx-auto leading-relaxed">
                Thank you for your trust. Your order has been placed successfully and is being prepared for shipment.
            </p>
        </div>

        <div class="pt-10 flex flex-col sm:flex-row items-center justify-center gap-6">
            <a href="{{ route('shop') }}" class="btn-primary">Continue Shopping</a>
            <a href="/" class="text-[10px] font-black uppercase tracking-widest text-brand-dark/30 hover:text-brand-dark transition-colors">Return to Home</a>
        </div>
    </div>
</section>
@endsection
