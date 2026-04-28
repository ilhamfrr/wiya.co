@extends('layouts.app')

@section('title', 'Lookbook 2026 — WIYA.CO')
@section('meta_description', 'Editorial stories and visual inspiration from the WIYA.CO 2026 Collection.')

@section('content')

{{-- ===== LOOKBOOK HERO ===== --}}
<section class="relative min-h-[80vh] flex items-center justify-center bg-brand-dark overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1594750825015-395e63c6ed30?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover opacity-40 scale-110" alt="Lookbook Cover">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-brand-dark/20 to-brand-dark"></div>
    </div>
    
    <div class="relative z-10 text-center space-y-8 max-w-4xl px-4">
        <div class="flex items-center justify-center gap-4 mb-4">
            <div class="w-12 h-[1px] bg-brand-accent"></div>
            <span class="text-[10px] font-black tracking-[0.6em] uppercase text-brand-accent">Editorial</span>
            <div class="w-12 h-[1px] bg-brand-accent"></div>
        </div>
        <h1 class="text-7xl md:text-[120px] font-black text-white leading-none tracking-tighter italic">
            Refinement <br>
            <span class="font-light not-italic text-brand-accent">in Silence.</span>
        </h1>
        <p class="text-brand-bg/40 text-lg tracking-widest uppercase font-bold">Winter / Spring 2026</p>
    </div>
</section>

{{-- ===== STORY SECTION 1 ===== --}}
<section class="bg-brand-bg py-32 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-20 items-center">
            <div class="lg:col-span-7 space-y-12">
                <div class="relative aspect-[3/4] rounded-[4rem] overflow-hidden shadow-2xl group">
                    <img src="{{ asset('images/ilham.jpg') }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110" alt="Lookbook 1">
                </div>
            </div>
            <div class="lg:col-span-5 space-y-10">
                <span class="text-[10px] font-black tracking-[0.4em] uppercase text-brand-accent">Chapter I</span>
                <h2 class="text-5xl font-black text-brand-dark tracking-tighter leading-tight">The Modern <br> Silhouette</h2>
                <p class="text-brand-dark/50 text-lg leading-relaxed italic">
                    "Fashion is not just about clothes, it's about the space between tradition and progress."
                </p>
                <p class="text-brand-dark/40 text-base leading-relaxed">
                    Explore the collection of flowing silks and structured cottons designed to move with you through every moment of the day.
                </p>
                <div class="pt-6">
                    <a href="{{ route('shop') }}" class="btn-outline">View Pieces</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== MASONRY GALLERY ===== --}}
<section class="py-32 bg-white">
    <div class="max-w-[1600px] mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Column 1 --}}
            <div class="space-y-8">
                <div class="aspect-[4/5] rounded-[3rem] overflow-hidden shadow-xl">
                    <img src="https://images.unsplash.com/photo-1708151729245-fa18bd75727e?q=80&w=626&auto=format&fit=crop" class="w-full h-full object-cover" alt="Gallery 1">
                </div>
                <div class="aspect-square rounded-[3rem] overflow-hidden shadow-xl">
                    <img src="https://images.unsplash.com/photo-1643770515578-66328182d332?q=80&w=687&auto=format&fit=crop" class="w-full h-full object-cover" alt="Gallery 2">
                </div>
            </div>
            {{-- Column 2 (Center - Offset) --}}
            <div class="space-y-8 md:pt-20">
                <div class="aspect-[2/3] rounded-[4rem] overflow-hidden shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1625728273079-27996db5e7f9?q=80&w=687&auto=format&fit=crop" class="w-full h-full object-cover" alt="Gallery 3">
                </div>
                <div class="aspect-[4/5] rounded-[3rem] overflow-hidden shadow-xl">
                    <img src="https://images.unsplash.com/photo-1644085078094-29e8cb70125f?q=80&w=687&auto=format&fit=crop" class="w-full h-full object-cover" alt="Gallery 4">
                </div>
            </div>
            {{-- Column 3 --}}
            <div class="space-y-8">
                <div class="aspect-square rounded-[3rem] overflow-hidden shadow-xl">
                    <img src="{{ asset('images/widya.jpg') }}" class="w-full h-full object-cover" alt="Gallery 5">
                </div>
                <div class="aspect-[4/5] rounded-[3rem] overflow-hidden shadow-xl">
                    <img src="https://images.unsplash.com/photo-1725003326236-effbbd92eabe?q=80&w=764&auto=format&fit=crop" class="w-full h-full object-cover" alt="Gallery 6">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== STORY SECTION 2 ===== --}}
<section class="bg-brand-dark py-40 overflow-hidden relative">
    <div class="absolute top-0 right-0 p-40 opacity-5 pointer-events-none">
        <span class="text-[40rem] font-black text-white leading-none">W</span>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 relative z-10 text-center space-y-12">
        <span class="text-brand-accent text-xs font-black uppercase tracking-[0.8em]">Chapter II</span>
        <h2 class="text-6xl md:text-9xl font-black text-white tracking-tighter leading-none italic">
            TIMELESS <br>
            <span class="font-light not-italic text-brand-accent">Heritage.</span>
        </h2>
        <div class="max-w-xl mx-auto">
            <p class="text-white/40 text-lg leading-relaxed">
                WIYA.CO exists at the intersection of modesty and modernity. Our heritage is rooted in tradition, but our vision is set on the future.
            </p>
        </div>
        <div class="flex justify-center gap-12 pt-12">
            <div class="text-center">
                <p class="text-brand-accent text-3xl font-black">2018</p>
                <p class="text-white/20 text-[10px] font-bold uppercase tracking-[0.2em]">Established</p>
            </div>
            <div class="w-[1px] h-12 bg-white/10"></div>
            <div class="text-center">
                <p class="text-brand-accent text-3xl font-black">Indo</p>
                <p class="text-white/20 text-[10px] font-bold uppercase tracking-[0.2em]">Craftsmanship</p>
            </div>
        </div>
    </div>
</section>

{{-- ===== CTA ===== --}}
<section class="py-32 bg-brand-bg text-center">
    <div class="max-w-2xl mx-auto px-4 space-y-10">
        <h3 class="text-4xl font-black text-brand-dark tracking-tighter">Ready to curate your look?</h3>
        <a href="{{ route('shop') }}" class="btn-primary">Browse All Collection</a>
    </div>
</section>

@endsection
