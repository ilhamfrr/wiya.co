@extends('layouts.app')

@section('title', 'Secure Checkout — WIYA.CO')

@section('content')
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24" 
         x-data="{ 
            loading: false,
            submitOrder() {
                this.loading = true;
                const form = document.getElementById('checkout-form');
                const formData = new FormData(form);
                
                fetch('{{ route('checkout.process') }}', {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    this.loading = false;
                    if(data.success) {
                        window.snap.pay(data.snap_token, {
                            onSuccess: function(result) {
                                window.location.href = '{{ route('checkout.success') }}';
                            },
                            onPending: function(result) {
                                alert('Payment pending. Please complete your transaction.');
                            },
                            onError: function(result) {
                                alert('Payment failed. Please try again.');
                            },
                            onClose: function() {
                                alert('You closed the payment popup without finishing.');
                            }
                        });
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(err => {
                    this.loading = false;
                    alert('An unexpected error occurred.');
                });
            }
         }">
    
    {{-- Midtrans Snap JS --}}
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

    <div class="mb-12 border-b border-brand-dark/5 pb-8">
        <div class="flex items-center gap-4 mb-4">
            <span class="w-8 h-[2px] bg-brand-accent"></span>
            <span class="text-[10px] font-black text-brand-accent uppercase tracking-[0.4em]">Transaction</span>
        </div>
        <h1 class="text-4xl font-black text-brand-dark tracking-tighter uppercase">Secure Checkout</h1>
    </div>

    <form id="checkout-form" @submit.prevent="submitOrder" class="flex flex-col lg:flex-row gap-16 items-start">
        @csrf
        {{-- Shipping & Billing Details --}}
        <div class="w-full lg:flex-1 space-y-12">
            {{-- Contact Information --}}
            <div class="space-y-8">
                <div class="flex items-center gap-4">
                    <span class="text-xs font-black text-brand-dark uppercase tracking-widest bg-brand-dark text-white w-8 h-8 rounded-full flex items-center justify-center">1</span>
                    <h2 class="text-lg font-black text-brand-dark uppercase tracking-tight">Contact Information</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-brand-dark/40 uppercase tracking-widest">Full Name</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="w-full bg-white border border-brand-dark/5 rounded-2xl px-6 py-4 text-sm font-bold focus:ring-4 focus:ring-brand-accent/5 focus:border-brand-accent outline-none transition-all shadow-sm">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-brand-dark/40 uppercase tracking-widest">Email Address</label>
                        <input type="email" name="email" value="{{ Auth::user()->email }}" class="w-full bg-brand-bg/50 border border-brand-dark/5 rounded-2xl px-6 py-4 text-sm font-bold text-brand-dark/40 cursor-not-allowed outline-none" readonly>
                    </div>
                </div>
            </div>

            {{-- Shipping Address --}}
            <div class="space-y-8">
                <div class="flex items-center gap-4">
                    <span class="text-xs font-black text-brand-dark uppercase tracking-widest bg-brand-dark text-white w-8 h-8 rounded-full flex items-center justify-center">2</span>
                    <h2 class="text-lg font-black text-brand-dark uppercase tracking-tight">Shipping Address</h2>
                </div>
                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-brand-dark/40 uppercase tracking-widest">Street Address</label>
                        <input type="text" name="address" placeholder="e.g. JL. Sudirman No. 123" class="w-full bg-white border border-brand-dark/5 rounded-2xl px-6 py-4 text-sm font-bold focus:ring-4 focus:ring-brand-accent/5 focus:border-brand-accent outline-none transition-all shadow-sm" required>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-brand-dark/40 uppercase tracking-widest">City</label>
                            <input type="text" name="city" placeholder="Jakarta" class="w-full bg-white border border-brand-dark/5 rounded-2xl px-6 py-4 text-sm font-bold focus:ring-4 focus:ring-brand-accent/5 focus:border-brand-accent outline-none transition-all shadow-sm" required>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-brand-dark/40 uppercase tracking-widest">Postal Code</label>
                            <input type="text" name="postal_code" placeholder="12345" class="w-full bg-white border border-brand-dark/5 rounded-2xl px-6 py-4 text-sm font-bold focus:ring-4 focus:ring-brand-accent/5 focus:border-brand-accent outline-none transition-all shadow-sm" required>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-brand-dark/40 uppercase tracking-widest">Phone</label>
                            <input type="text" name="phone" placeholder="+62..." class="w-full bg-white border border-brand-dark/5 rounded-2xl px-6 py-4 text-sm font-bold focus:ring-4 focus:ring-brand-accent/5 focus:border-brand-accent outline-none transition-all shadow-sm" required>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Payment Method --}}
            <div class="space-y-8">
                <div class="flex items-center gap-4">
                    <span class="text-xs font-black text-brand-dark uppercase tracking-widest bg-brand-dark text-white w-8 h-8 rounded-full flex items-center justify-center">3</span>
                    <h2 class="text-lg font-black text-brand-dark uppercase tracking-tight">Automatic Payment</h2>
                </div>
                <div class="p-8 bg-white border border-brand-dark/5 rounded-[2.5rem] shadow-sm">
                    <div class="flex items-center gap-6">
                        <div class="w-16 h-16 bg-brand-bg rounded-2xl flex items-center justify-center text-brand-dark">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                        </div>
                        <div>
                            <p class="text-[11px] font-black uppercase tracking-widest text-brand-dark">Midtrans Secure Portal</p>
                            <p class="text-[9px] font-bold text-brand-dark/40 uppercase tracking-widest mt-1">Virtual Account, Credit Card, E-Wallet (Gopay/OVO)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Order Summary Sidebar --}}
        <div class="w-full lg:w-96 lg:sticky lg:top-32">
            <div class="bg-white border border-brand-dark/5 rounded-[2.5rem] p-10 shadow-2xl space-y-10">
                <h2 class="text-xl font-black text-brand-dark uppercase tracking-tight">Review Order</h2>
                
                <div class="space-y-6 max-h-60 overflow-y-auto scrollbar-hide">
                    @foreach($cart as $item)
                        <div class="flex gap-4">
                            <div class="w-16 h-20 bg-brand-bg rounded-xl overflow-hidden flex-shrink-0">
                                <img src="{{ Str::startsWith($item['image'], 'http') ? $item['image'] : asset('storage/' . $item['image']) }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-[10px] font-black text-brand-dark uppercase tracking-tight truncate">{{ $item['name'] }}</h4>
                                <p class="text-[8px] text-brand-dark/40 font-bold uppercase tracking-widest mt-1">QTY: {{ $item['quantity'] }} &bull; {{ $item['size'] }}</p>
                                <p class="text-[10px] font-black text-brand-dark mt-2 italic">Rp {{ $item['price'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="h-[1px] bg-brand-dark/5"></div>

                <div class="space-y-4">
                    <div class="flex justify-between items-center text-[10px] font-black uppercase tracking-[0.2em] text-brand-dark/40">
                        <span>Subtotal</span>
                        <span class="text-brand-dark">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center text-[10px] font-black uppercase tracking-[0.2em] text-brand-dark/40">
                        <span>Shipping</span>
                        <span class="text-green-600 font-black">Free</span>
                    </div>
                    <div class="flex justify-between items-end pt-4">
                        <span class="text-xs font-black uppercase tracking-[0.2em] text-brand-dark">Total Amount</span>
                        <span class="text-2xl font-black text-brand-dark italic tracking-tighter">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                </div>

                <button type="submit" 
                        class="btn-primary w-full py-6 rounded-2xl group flex items-center justify-center gap-3 disabled:opacity-50 disabled:cursor-not-allowed"
                        :disabled="loading">
                    <span x-show="!loading" class="flex items-center gap-3">
                        Complete Purchase
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </span>
                    <span x-show="loading" class="flex items-center gap-3">
                        Processing...
                        <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                    </span>
                </button>

                <p class="text-[8px] font-bold text-center text-brand-dark/20 uppercase tracking-[0.4em] leading-relaxed">
                    By completing your purchase, you agree to our <br>
                    <a href="#" class="underline hover:text-brand-dark transition-colors">Terms of Service</a> & <a href="#" class="underline hover:text-brand-dark transition-colors">Privacy Policy</a>
                </p>
            </div>
        </div>
    </form>
</section>
@endsection
