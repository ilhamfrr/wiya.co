@extends('layouts.app')

@section('title', 'WIYA.CO — Modest Wear, Modern You')
@section('meta_description', 'Curating timeless pieces that honor tradition while embracing the modern woman’s lifestyle.')

@section('content')

{{-- ===== HERO SECTION ===== --}}
<section class="relative min-h-screen flex items-center overflow-hidden pt-6 md:mt-[-100px] bg-brand-bg">
    {{-- Background Elements --}}
    <div class="absolute inset-0 z-0">
        <div class="absolute top-0 right-0 w-1/2 h-full bg-brand-accent/5 rounded-l-[10rem]"></div>
        <div class="absolute -bottom-20 -left-20 w-96 h-96 bg-brand-accent/10 blur-[120px] rounded-full"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            {{-- Text Content --}}
            <div class="lg:col-span-6 space-y-10 animate-fade-in">
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-[1px] bg-brand-accent"></div>
                        <span class="text-[10px] font-black tracking-[0.4em] uppercase text-brand-accent">Collection 2026</span>
                    </div>
                    <h1 class="text-7xl md:text-[100px] font-black text-brand-dark leading-[0.85] tracking-tighter">
                        MODEST<br>
                        <span class="text-brand-accent italic font-light">Elegance</span><br>
                        REFINED.
                    </h1>
                </div>
                
                <p class="text-brand-dark/60 text-lg leading-relaxed max-w-md">
                    Where tradition meets contemporary silhouette. We create pieces for the woman who speaks through her presence.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-6 pt-4">
                    <a href="{{ route('shop') }}" class="btn-primary">
                        Shop Collection
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="{{ route('lookbook') }}" class="btn-outline">
                        Our Lookbook
                    </a>
                </div>

                {{-- Stats/Trust --}}
                <div class="grid grid-cols-3 gap-8 pt-12 border-t border-brand-dark/5">
                    <div>
                        <p class="text-2xl font-black text-brand-dark">12k+</p>
                        <p class="text-[9px] font-bold text-brand-dark/40 uppercase tracking-widest">Happy Clients</p>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-brand-dark">100%</p>
                        <p class="text-[9px] font-bold text-brand-dark/40 uppercase tracking-widest">Premium Silk</p>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-brand-dark">Global</p>
                        <p class="text-[9px] font-bold text-brand-dark/40 uppercase tracking-widest">Shipping</p>
                    </div>
                </div>
            </div>
            
            {{-- Image Composition --}}
            <div class="lg:col-span-6 relative h-[500px] sm:h-[600px] lg:h-[800px] animate-fade-in" style="animation-delay: 0.3s">
                {{-- Main Image Frame --}}
                <div class="absolute right-0 top-0 md:top-1/2 md:-translate-y-1/2 w-[90%] md:w-4/5 h-[85%] md:h-4/5 rounded-[3rem] md:rounded-[4rem] overflow-hidden shadow-2xl z-10">
                    <img src="https://plus.unsplash.com/premium_photo-1674718917549-798c89726991?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="w-full h-full object-cover" alt="Main Model">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/40 to-transparent"></div>
                </div>
                
                {{-- Detail Image Frame (The one with the border) --}}
                <div class="absolute left-0 bottom-4 md:bottom-0 w-3/5 md:w-1/2 h-[45%] md:h-1/2 rounded-[2.5rem] md:rounded-[3rem] overflow-hidden shadow-2xl z-20 border-[6px] md:border-8 border-brand-bg">
                    <img src="{{ asset('images/hero-model.jpg') }}" class="w-full h-full object-cover scale-110" alt="Detail">
                </div>
                
                {{-- Decorative Elements --}}
                <div class="absolute -top-6 -right-6 md:-top-10 md:-right-10 w-32 h-32 md:w-40 md:h-40 border border-brand-accent/30 rounded-full animate-pulse"></div>
            </div>
        </div>
    </div>
</section>

{{-- ===== LOGO CLOUD ===== --}}
<section class="py-20 border-y border-brand-dark/5 bg-white/50">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="text-[9px] font-black uppercase tracking-[0.5em] text-brand-dark/30 mb-12">Featured In & Trusted By</p>
        <div class="flex flex-wrap justify-center items-center gap-16 opacity-30 grayscale hover:grayscale-0 transition-all duration-500">
            <span class="text-xl font-black tracking-tighter">EVERMOS</span>
            <span class="text-xl font-black tracking-tighter">NUSADIGI</span>
            <span class="text-xl font-black tracking-tighter">ELLE</span>
            <span class="text-xl font-black tracking-tighter">GRAZIA</span>
            <span class="text-xl font-black tracking-tighter">TATLER</span>
        </div>
    </div>
</section>

{{-- ===== CATEGORIES (Bento Grid) ===== --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
    <div class="flex flex-col md:flex-row items-end justify-between mb-20 gap-8">
        <div class="space-y-4">
            <h2 class="text-xs font-black text-brand-accent uppercase tracking-[0.4em]">Browse</h2>
            <h3 class="text-5xl font-black text-brand-dark tracking-tight">Curated Selection</h3>
        </div>
        <p class="text-brand-dark/40 max-w-xs text-sm leading-relaxed">
            Every piece is selected with intention, ensuring you find the perfect balance of comfort and style.
        </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        @foreach([
            ['name' => 'One Set', 'image' => 'https://images.unsplash.com/photo-1683383600747-1a0cdb7ede39?q=80&w=736&auto=format&fit=crop', 'span' => 'md:col-span-2'],
            ['name' => 'Essential Tops', 'image' => 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=1470&auto=format&fit=crop', 'span' => 'md:col-span-1'],
            ['name' => 'Premium Hijab', 'image' => 'https://images.unsplash.com/photo-1614177919002-8b868f0ac5bb?q=80&w=687&auto=format&fit=crop', 'span' => 'md:col-span-1'],
            ['name' => 'Daily Sets', 'image' => 'https://images.unsplash.com/photo-1643018190368-972e6ce16b75?q=80&w=687&auto=format&fit=crop', 'span' => 'md:col-span-1'],
            ['name' => 'Limited Series', 'image' => 'https://plus.unsplash.com/premium_photo-1664202526559-e21e9c0fb46a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'span' => 'md:col-span-3'],
        ] as $cat)
            <a href="{{ route('shop') }}" class="{{ $cat['span'] }} group relative block h-[400px] rounded-[3rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-700">
                <img src="{{ $cat['image'] }}" alt="{{ $cat['name'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-dark/80 via-transparent to-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
                <div class="absolute bottom-10 left-10">
                    <h4 class="text-xl font-black text-white tracking-tight">{{ $cat['name'] }}</h4>
                    <p class="text-brand-accent text-[10px] font-bold uppercase tracking-widest mt-2 opacity-0 group-hover:opacity-100 transition-all translate-y-2 group-hover:translate-y-0">Explore Collection &rarr;</p>
                </div>
            </a>
        @endforeach
    </div>
</section>

{{-- ===== THE LATESTDrop ===== --}}
<section class="py-32 relative overflow-hidden bg-brand-bg">
    {{-- Decorative Background Text --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 pointer-events-none select-none opacity-[0.03]">
        <span class="text-[40rem] font-black tracking-tighter uppercase leading-none">NEW</span>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row items-end justify-between mb-24 gap-8 border-b border-brand-dark/5 pb-12">
            <div class="space-y-4">
                <div class="flex items-center gap-4">
                    <span class="w-10 h-[2px] bg-brand-accent"></span>
                    <h2 class="text-[10px] font-black text-brand-accent uppercase tracking-[0.6em]">The Latest Drop</h2>
                </div>
                <h3 class="text-5xl md:text-7xl font-black text-brand-dark tracking-tighter">Season Essentials.</h3>
            </div>
            <p class="text-brand-dark/40 max-w-sm text-sm leading-relaxed mb-2">
                Unveiling our most awaited pieces of the season. A fusion of timeless grace and contemporary edge.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16">
            @foreach($products as $index => $product)
                <div class="group relative animate-fade-in" 
                     style="animation-delay: {{ $index * 0.1 }}s"
                     x-data="{ 
                        loading: false,
                        added: false,
                        showOptions: false,
                        selectedColor: '{{ count($product->colors ?? []) > 0 ? $product->colors[0] : 'None' }}',
                        selectedSize: '{{ count($product->sizes ?? []) > 0 ? $product->sizes[0] : 'None' }}',
                        addToBag() {
                            this.loading = true;
                            fetch('{{ route('cart.add') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    id: '{{ $product->id }}',
                                    name: '{{ $product->name }}',
                                    price: '{{ number_format($product->price, 0, ',', '.') }}',
                                    image: '{{ Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}',
                                    color: this.selectedColor,
                                    size: this.selectedSize
                                })
                            })
                            .then(res => res.json())
                            .then(data => {
                                this.loading = false;
                                if(data.success) {
                                    this.added = true;
                                    $store.cart.updateCount(data.cart_count);
                                    setTimeout(() => {
                                        this.added = false;
                                        this.showOptions = false;
                                    }, 2000);
                                }
                            })
                        }
                     }">
                    {{-- Product Image Container --}}
                    <div class="aspect-[4/5] overflow-hidden rounded-[3.5rem] bg-white shadow-sm group-hover:shadow-3xl transition-all duration-700 relative">
                        <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                        
                        {{-- Overlay Options --}}
                        <div class="absolute inset-0 bg-brand-dark/60 opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col justify-end p-8 backdrop-blur-sm">
                            
                            {{-- Selection UI --}}
                            <div class="mb-6 space-y-4 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-100">
                                {{-- Color Selection --}}
                                @if(count($product->colors ?? []) > 0)
                                <div>
                                    <p class="text-[8px] font-black uppercase tracking-widest text-white/50 mb-2 text-center">Select Color</p>
                                    <div class="flex justify-center gap-2">
                                        @foreach($product->colors as $color)
                                            <button @click="selectedColor = '{{ $color }}'" 
                                                    :class="selectedColor === '{{ $color }}' ? 'border-brand-accent bg-brand-accent text-white' : 'border-white/20 text-white hover:border-white'"
                                                    class="px-3 py-1 text-[8px] font-black border rounded-full transition-all">
                                                {{ $color }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                {{-- Size Selection --}}
                                @if(count($product->sizes ?? []) > 0)
                                <div>
                                    <p class="text-[8px] font-black uppercase tracking-widest text-white/50 mb-2 text-center">Select Size</p>
                                    <div class="flex justify-center gap-2">
                                        @foreach($product->sizes as $size)
                                            <button @click="selectedSize = '{{ $size }}'" 
                                                    :class="selectedSize === '{{ $size }}' ? 'border-brand-accent bg-brand-accent text-white' : 'border-white/20 text-white hover:border-white'"
                                                    class="px-3 py-1 text-[8px] font-black border rounded-full transition-all">
                                                {{ $size }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>

                            <button 
                                @click="addToBag"
                                :disabled="loading"
                                class="w-full py-4 bg-white text-brand-dark text-[10px] font-black uppercase tracking-widest rounded-2xl transform translate-y-4 group-hover:translate-y-0 transition-all duration-500 shadow-xl flex items-center justify-center gap-2">
                                <template x-if="!loading && !added">
                                    <span>Add to Bag</span>
                                </template>
                                <template x-if="loading">
                                    <svg class="animate-spin h-4 w-4 text-brand-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </template>
                                <template x-if="added">
                                    <span class="text-green-600 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                        Confirmed
                                    </span>
                                </template>
                            </button>
                        </div>

                        {{-- Floating Label --}}
                        @if($index === 0)
                            <span class="absolute top-6 left-6 px-4 py-1.5 bg-brand-accent text-white text-[9px] font-black uppercase tracking-widest rounded-full shadow-lg z-20">New In</span>
                        @endif
                    </div>
                    
                    {{-- Product Details --}}
                    <div class="mt-8 space-y-2 px-2 text-center lg:text-left">
                        <h4 class="text-sm font-black text-brand-dark tracking-wide uppercase">{{ $product->name }}</h4>
                        <div class="flex items-center justify-center lg:justify-start gap-4">
                            <span class="text-brand-accent font-black text-base italic">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            <span class="w-4 h-[1px] bg-brand-dark/10"></span>
                            <span class="text-[9px] font-bold text-brand-dark/30 uppercase tracking-widest">Available Now</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-24 flex justify-center">
            <a href="{{ route('shop') }}" class="group relative px-12 py-5 bg-brand-dark text-white rounded-full font-black text-[11px] uppercase tracking-[0.3em] overflow-hidden transition-all hover:bg-black">
                <span class="relative z-10">Explore All Collection</span>
                <div class="absolute inset-0 bg-brand-accent translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
            </a>
        </div>
    </div>
</section>

{{-- ===== MANIFESTO ===== --}}
<section class="relative py-40 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1445205170230-053b830c6050?q=80&w=2071&auto=format&fit=crop" class="w-full h-full object-cover opacity-10" alt="Texture">
    </div>
    
    <div class="max-w-4xl mx-auto px-4 relative z-10 text-center">
        <p class="text-brand-accent text-xs font-black uppercase tracking-[0.6em] mb-12">Our Philosophy</p>
        <h2 class="text-6xl md:text-8xl font-black text-brand-dark tracking-tighter leading-[0.9] mb-12">
            MODESTY IS THE <br>
            <span class="italic font-light text-brand-accent">Highest Form</span> <br>
            OF ELEGANCE.
        </h2>
        <p class="text-brand-dark/50 text-xl leading-relaxed max-w-2xl mx-auto mb-16">
            We believe that fashion should be an extension of your values. Every stitch in WIYA.CO is a commitment to quality, comfort, and the confident modern woman.
        </p>
        <div class="flex justify-center">
            <a href="#" class="btn-primary">Our Story</a>
        </div>
    </div>
{{-- ===== NEWSLETTER ===== --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
    <div class="glass-premium rounded-[4rem] p-12 md:p-24 overflow-hidden relative">
        {{-- Decorative background --}}
        <div class="absolute top-0 right-0 w-1/3 h-full bg-brand-accent/10 rounded-l-full blur-3xl"></div>
        <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-brand-accent/5 rounded-full blur-2xl"></div>
        
        <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-6">
                <h2 class="text-xs font-black text-brand-accent uppercase tracking-[0.4em]">Stay Inspired</h2>
                <h3 class="text-5xl font-black text-brand-dark tracking-tighter leading-tight">Join the WIYA <br> Inner Circle</h3>
                <p class="text-brand-dark/40 text-lg leading-relaxed">Be the first to access limited drops, editorial stories, and exclusive community events.</p>
            </div>
            
            <form class="space-y-4">
                <div class="flex flex-col sm:flex-row gap-4">
                    <input type="email" placeholder="Your Email Address" class="input-premium flex-1">
                    <button type="submit" class="btn-primary py-5 whitespace-nowrap">Subscribe</button>
                </div>
                <p class="text-[10px] text-brand-dark/30 uppercase tracking-widest font-bold">By subscribing, you agree to our Privacy Policy.</p>
            </form>
        </div>
    </div>
</section>

@endsection
