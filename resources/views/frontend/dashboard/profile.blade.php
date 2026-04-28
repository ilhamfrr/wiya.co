@extends('layouts.app')

@section('title', 'Personal Details — WIYA.CO')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
    <div class="flex flex-col lg:flex-row gap-16 items-start">
        {{-- Sidebar (Same as Dashboard) --}}
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
                <a href="{{ route('dashboard.orders') }}" class="flex items-center gap-4 p-4 rounded-2xl bg-white border border-brand-dark/5 text-brand-dark hover:border-brand-dark transition-all group">
                    <span class="w-2 h-2 rounded-full bg-brand-dark/10 group-hover:bg-brand-dark"></span>
                    <span class="text-[10px] font-black uppercase tracking-widest">Order History</span>
                </a>
                <a href="{{ route('dashboard.profile') }}" class="flex items-center gap-4 p-4 rounded-2xl bg-brand-dark text-white shadow-xl shadow-brand-dark/10 transition-all group">
                    <span class="w-2 h-2 rounded-full bg-brand-accent"></span>
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
        <main class="flex-1 max-w-2xl">
            <div class="space-y-12">
                <div>
                    <h2 class="text-xl font-black text-brand-dark uppercase tracking-tight mb-4">Edit Profile</h2>
                    <p class="text-[10px] font-bold text-brand-dark/40 uppercase tracking-widest leading-relaxed">Update your contact information and default shipping details for a faster checkout experience.</p>
                </div>

                @if(session('success'))
                    <div class="p-6 bg-green-50 border border-green-100 rounded-3xl text-green-600 text-xs font-bold animate-fade-in">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('dashboard.profile.update') }}" method="POST" class="space-y-10">
                    @csrf
                    
                    {{-- Contact Info --}}
                    <div class="space-y-8">
                        <div class="flex items-center gap-4">
                            <span class="text-[8px] font-black uppercase tracking-[0.4em] text-brand-accent">Section 01</span>
                            <div class="flex-1 h-[1px] bg-brand-dark/5"></div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-brand-dark uppercase tracking-widest">Full Name</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full bg-white border border-brand-dark/10 rounded-2xl px-6 py-4 text-sm font-bold focus:ring-4 focus:ring-brand-accent/5 focus:border-brand-accent outline-none transition-all shadow-sm">
                            </div>
                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-brand-dark uppercase tracking-widest">Phone Number</label>
                                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="+62..." class="w-full bg-white border border-brand-dark/10 rounded-2xl px-6 py-4 text-sm font-bold focus:ring-4 focus:ring-brand-accent/5 focus:border-brand-accent outline-none transition-all shadow-sm">
                            </div>
                        </div>
                    </div>

                    {{-- Shipping Address --}}
                    <div class="space-y-8">
                        <div class="flex items-center gap-4">
                            <span class="text-[8px] font-black uppercase tracking-[0.4em] text-brand-accent">Section 02</span>
                            <div class="flex-1 h-[1px] bg-brand-dark/5"></div>
                        </div>

                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-brand-dark uppercase tracking-widest">Street Address</label>
                            <textarea name="address" rows="4" class="w-full bg-white border border-brand-dark/10 rounded-2xl px-6 py-4 text-sm font-bold focus:ring-4 focus:ring-brand-accent/5 focus:border-brand-accent outline-none transition-all shadow-sm resize-none">{{ old('address', $user->address) }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-brand-dark uppercase tracking-widest">City</label>
                                <input type="text" name="city" value="{{ old('city', $user->city) }}" class="w-full bg-white border border-brand-dark/10 rounded-2xl px-6 py-4 text-sm font-bold focus:ring-4 focus:ring-brand-accent/5 focus:border-brand-accent outline-none transition-all shadow-sm">
                            </div>
                            <div class="space-y-3">
                                <label class="text-[10px] font-black text-brand-dark uppercase tracking-widest">Postal Code</label>
                                <input type="text" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}" class="w-full bg-white border border-brand-dark/10 rounded-2xl px-6 py-4 text-sm font-bold focus:ring-4 focus:ring-brand-accent/5 focus:border-brand-accent outline-none transition-all shadow-sm">
                            </div>
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit" class="btn-primary w-full md:w-auto px-12 py-6 rounded-2xl shadow-xl shadow-brand-dark/10">Save Changes</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
