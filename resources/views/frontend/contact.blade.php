@extends('layouts.app')

@section('title', 'Contact Us — WIYA.CO')
@section('meta_description', 'Get in touch with WIYA.CO. We are here to assist you with your orders, inquiries, and styling needs.')

@section('content')

{{-- ===== CONTACT HERO ===== --}}
<section class="relative pt-32 pb-20 bg-brand-bg flex items-center justify-center overflow-hidden">
    <div class="relative z-10 text-center space-y-6 max-w-3xl px-4 mt-10">
        <div class="flex items-center justify-center gap-4 mb-4">
            <div class="w-12 h-[1px] bg-brand-accent"></div>
            <span class="text-[10px] font-black tracking-[0.6em] uppercase text-brand-accent">Get in Touch</span>
            <div class="w-12 h-[1px] bg-brand-accent"></div>
        </div>
        <h1 class="text-5xl md:text-[80px] font-black text-brand-dark leading-none tracking-tighter italic">
            Let's <span class="font-light not-italic text-brand-accent">Connect.</span>
        </h1>
        <p class="text-brand-dark/50 text-base leading-relaxed max-w-lg mx-auto">
            Whether you have a question about our collections, need assistance with an order, or just want to share your thoughts, we're here for you.
        </p>
    </div>
</section>

{{-- ===== CONTACT FORM & INFO ===== --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
            
            {{-- Contact Information --}}
            <div class="space-y-16">
                <div class="space-y-12">
                    {{-- Email --}}
                    <div class="flex items-start gap-6">
                        <div class="w-12 h-12 rounded-full bg-brand-bg flex items-center justify-center flex-shrink-0 text-brand-dark">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-black uppercase tracking-widest text-brand-dark mb-2">Email</h3>
                            <p class="text-brand-dark/60 text-sm leading-relaxed mb-2">For general inquiries and customer support.</p>
                            <a href="mailto:hello@wiya.co" class="text-brand-accent font-bold hover:underline transition-all">hello@wiya.co</a>
                        </div>
                    </div>
                    
                    {{-- WhatsApp --}}
                    <div class="flex items-start gap-6">
                        <div class="w-12 h-12 rounded-full bg-brand-bg flex items-center justify-center flex-shrink-0 text-brand-dark">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-black uppercase tracking-widest text-brand-dark mb-2">WhatsApp</h3>
                            <p class="text-brand-dark/60 text-sm leading-relaxed mb-2">Fast response for order tracking and sizing advice. (Mon-Fri, 9AM-5PM)</p>
                            <a href="#" class="text-brand-accent font-bold hover:underline transition-all">+62 812 3456 7890</a>
                        </div>
                    </div>
                    
                    {{-- Studio --}}
                    <div class="flex items-start gap-6">
                        <div class="w-12 h-12 rounded-full bg-brand-bg flex items-center justify-center flex-shrink-0 text-brand-dark">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-black uppercase tracking-widest text-brand-dark mb-2">Studio & HQ</h3>
                            <p class="text-brand-dark/60 text-sm leading-relaxed">
                                Jl. Fashion Street No. 88<br>
                                Jakarta Selatan, 12345<br>
                                Indonesia
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-8 bg-brand-bg rounded-[2rem] border border-brand-dark/5 relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 opacity-5 pointer-events-none">
                        <span class="text-[15rem] font-black leading-none">W</span>
                    </div>
                    <div class="relative z-10">
                        <h4 class="text-[10px] font-black uppercase tracking-[0.3em] text-brand-accent mb-4">FAQ</h4>
                        <p class="text-brand-dark/70 text-sm leading-relaxed mb-6">Have a quick question? You might find the answer in our Frequently Asked Questions.</p>
                        <a href="#" class="inline-flex items-center gap-2 text-[10px] font-bold uppercase tracking-widest text-brand-dark hover:text-brand-accent transition-colors">
                            Read FAQs
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="bg-brand-bg/50 p-8 md:p-12 rounded-[3rem] border border-brand-dark/5">
                <h3 class="text-2xl font-black text-brand-dark mb-8 tracking-tighter">Send us a message</h3>
                
                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="name" class="block text-[10px] font-bold uppercase tracking-widest text-brand-dark/60">Full Name <span class="text-rose-500">*</span></label>
                            <input type="text" id="name" name="name" required
                                class="w-full bg-white border-transparent focus:border-brand-accent focus:ring-0 rounded-xl px-5 py-4 text-sm transition-all shadow-sm">
                        </div>
                        
                        <div class="space-y-2">
                            <label for="email" class="block text-[10px] font-bold uppercase tracking-widest text-brand-dark/60">Email Address <span class="text-rose-500">*</span></label>
                            <input type="email" id="email" name="email" required
                                class="w-full bg-white border-transparent focus:border-brand-accent focus:ring-0 rounded-xl px-5 py-4 text-sm transition-all shadow-sm">
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <label for="subject" class="block text-[10px] font-bold uppercase tracking-widest text-brand-dark/60">Subject</label>
                        <input type="text" id="subject" name="subject"
                            class="w-full bg-white border-transparent focus:border-brand-accent focus:ring-0 rounded-xl px-5 py-4 text-sm transition-all shadow-sm">
                    </div>
                    
                    <div class="space-y-2">
                        <label for="message" class="block text-[10px] font-bold uppercase tracking-widest text-brand-dark/60">Message <span class="text-rose-500">*</span></label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full bg-white border-transparent focus:border-brand-accent focus:ring-0 rounded-xl px-5 py-4 text-sm transition-all shadow-sm resize-none"></textarea>
                    </div>
                    
                    <button type="submit" class="w-full btn-primary py-5 text-[11px]">
                        Send Message
                    </button>
                    
                    <p class="text-[10px] text-center text-brand-dark/40 mt-4 tracking-wide">
                        We typically reply within 24 hours on business days.
                    </p>
                </form>
            </div>
            
        </div>
    </div>
</section>

{{-- ===== MAP / IMAGE ===== --}}
<section class="h-[50vh] w-full bg-brand-dark relative overflow-hidden">
    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2069&auto=format&fit=crop" class="w-full h-full object-cover opacity-60 mix-blend-overlay" alt="WIYA.CO Studio">
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="bg-white/90 backdrop-blur-md px-10 py-8 rounded-2xl text-center shadow-2xl">
            <h3 class="text-xl font-black text-brand-dark tracking-tighter mb-2">Visit Our Studio</h3>
            <p class="text-sm text-brand-dark/60 mb-4">By appointment only.</p>
            <a href="#" class="text-[10px] font-bold uppercase tracking-widest text-brand-accent hover:text-brand-dark transition-colors">Book an appointment</a>
        </div>
    </div>
</section>

@endsection
