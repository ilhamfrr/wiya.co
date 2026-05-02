@extends('layouts.app')

@section('title', 'About Us — WIYA.CO')
@section('meta_description', 'Discover the story behind WIYA.CO — Modest Wear, Modern You.')

@section('content')

{{-- ===== ABOUT HERO ===== --}}
<section class="relative min-h-[70vh] flex items-center justify-center bg-brand-dark overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1550614000-4b95d4ed1b11?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover opacity-30 scale-105" alt="About WIYA.CO">
        <div class="absolute inset-0  from-transparent via-brand-dark/40 to-brand-bg"></div>
    </div>
    
    <div class="relative z-10 text-center space-y-8 max-w-4xl px-4 mt-20">
        <div class="flex items-center justify-center gap-4 mb-4">
            <div class="w-12 h-[1px] bg-brand-accent"></div>
            <span class="text-[10px] font-black tracking-[0.6em] uppercase text-brand-accent">Our Story</span>
            <div class="w-12 h-[1px] bg-brand-accent"></div>
        </div>
        <h1 class="text-6xl md:text-[90px] font-black text-brand-bg leading-none tracking-tighter italic">
            Modest Wear, <br>
            <span class="font-light not-italic text-brand-accent">Modern You.</span>
        </h1>
    </div>
</section>

{{-- ===== VISION & MISSION ===== --}}
<section class="bg-brand-bg py-24 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
            <div class="space-y-10">
                <span class="text-[10px] font-black tracking-[0.4em] uppercase text-brand-accent">The Vision</span>
                <h2 class="text-4xl md:text-5xl font-black text-brand-dark tracking-tighter leading-tight">Redefining Modesty <br> for the Contemporary Woman</h2>
                <p class="text-brand-dark/60 text-base leading-loose">
                    WIYA.CO was born out of a desire to create fashion that respects tradition while fully embracing the modern lifestyle. We believe that modest clothing shouldn't be a compromise on style. Instead, it is an opportunity for profound self-expression.
                </p>
                <p class="text-brand-dark/60 text-base leading-loose">
                    Every piece is thoughtfully designed to empower women, giving them the confidence to navigate the world with elegance, grace, and unapologetic ambition.
                </p>
            </div>
            <div class="relative aspect-[4/5] rounded-[3rem] overflow-hidden shadow-2xl group">
                <img src="{{ asset('images/widya.jpg') }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" alt="WIYA.CO Vision">
            </div>
        </div>
    </div>
</section>

{{-- ===== VALUES ===== --}}
<section class="py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <span class="text-[10px] font-black tracking-[0.4em] uppercase text-brand-accent mb-6 block">Our Core</span>
        <h2 class="text-5xl font-black text-brand-dark tracking-tighter mb-20">The Pillars of <br> WIYA.CO</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-16">
            <div class="space-y-6">
                <div class="w-16 h-16 rounded-2xl bg-brand-bg flex items-center justify-center mx-auto text-brand-dark">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-brand-dark">Intentional Design</h3>
                <p class="text-sm text-brand-dark/50 leading-relaxed max-w-xs mx-auto">
                    We create pieces that last beyond seasons, focusing on timeless silhouettes rather than fleeting trends.
                </p>
            </div>
            
            <div class="space-y-6">
                <div class="w-16 h-16 rounded-2xl bg-brand-bg flex items-center justify-center mx-auto text-brand-dark">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                </div>
                <h3 class="text-xl font-bold text-brand-dark">Quality Craftsmanship</h3>
                <p class="text-sm text-brand-dark/50 leading-relaxed max-w-xs mx-auto">
                    Partnering with skilled artisans in Indonesia, ensuring every stitch reflects our commitment to excellence.
                </p>
            </div>
            
            <div class="space-y-6">
                <div class="w-16 h-16 rounded-2xl bg-brand-bg flex items-center justify-center mx-auto text-brand-dark">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                </div>
                <h3 class="text-xl font-bold text-brand-dark">Inclusive Elegance</h3>
                <p class="text-sm text-brand-dark/50 leading-relaxed max-w-xs mx-auto">
                    Building a global community of women who share a love for sophisticated, modest fashion.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ===== FOUNDER NOTE ===== --}}
<section class="bg-brand-dark py-32 overflow-hidden relative text-white">
    <div class="absolute -right-20 -top-20 opacity-5 pointer-events-none">
        <span class="text-[30rem] font-black leading-none">W</span>
    </div>
    
    <div class="max-w-4xl mx-auto px-4 relative z-10 text-center space-y-10">
        <svg class="w-12 h-12 text-brand-accent mx-auto opacity-50" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
        <p class="text-2xl md:text-4xl font-light italic leading-snug tracking-wide">
            "We aren't just making clothes. We are shaping a culture where a woman's elegance is her loudest statement."
        </p>
        <div class="pt-8">
            <p class="text-[10px] font-black uppercase tracking-[0.4em] text-brand-accent">Founder of WIYA.CO</p>
        </div>
    </div>
</section>

{{-- ===== CTA ===== --}}
<section class="py-32 bg-brand-bg text-center">
    <div class="max-w-2xl mx-auto px-4 space-y-10">
        <h3 class="text-4xl font-black text-brand-dark tracking-tighter">Become Part of Our Story</h3>
        <a href="{{ route('shop') }}" class="btn-primary">Explore The Collection</a>
    </div>
</section>

@endsection
