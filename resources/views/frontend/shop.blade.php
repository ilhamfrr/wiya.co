@extends('layouts.app')

@section('title', 'Collections — WIYA.CO')

@section('content'){{-- ===== HERO / HEADER ===== --}}
<section class="pt-12 pb-12 lg:pt-26 lg:pb-24 bg-brand-bg relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 lg:gap-12">
            <div class="space-y-4 lg:space-y-6 animate-fade-in text-center md:text-left">
                <div class="flex items-center justify-center md:justify-start gap-4">
                    <span class="w-12 h-[2px] bg-brand-accent"></span>
                    <span class="text-[10px] font-black text-brand-accent uppercase tracking-[0.6em]">Explore All</span>
                </div>
                <h1 class="text-4xl sm:text-5xl md:text-8xl font-black text-brand-dark tracking-tighter leading-none uppercase">Collections.</h1>
                <p class="text-brand-dark/40 text-[10px] sm:text-xs font-bold uppercase tracking-[0.3em] max-w-md mx-auto md:mx-0 leading-relaxed">Discover the intersection of tradition and modernity through our meticulously curated pieces.</p>
            </div>
            
            {{-- Search Bar --}}
            <div class="w-full md:w-[400px] animate-fade-in" style="animation-delay: 0.2s">
                <form action="{{ route('shop') }}" method="GET" class="relative group">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search our archives..." 
                           class="w-full bg-white border border-brand-dark/5 rounded-[2rem] px-6 lg:px-8 py-4 lg:py-5 text-sm font-bold focus:ring-4 focus:ring-brand-accent/5 focus:border-brand-accent outline-none transition-all shadow-sm group-hover:shadow-xl">
                    <button type="submit" class="absolute right-6 top-1/2 -translate-y-1/2 text-brand-dark/40 hover:text-brand-accent transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </button>
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                </form>
            </div>
        </div>
    </div>
</section>

{{-- ===== FILTER & CONTENT ===== --}}
<section class="pb-32 bg-brand-bg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Category Tabs --}}
        <div class="mb-20 animate-fade-in" style="animation-delay: 0.3s" 
             x-data="{ 
                scrollPercent: 0,
                updateScroll(el) {
                    const max = el.scrollWidth - el.clientWidth;
                    this.scrollPercent = max > 0 ? (el.scrollLeft / max) * 100 : 0;
                }
             }">
            <div class="flex items-center gap-4 pb-4 border-b border-brand-dark/5">
                <span class="hidden md:block text-[9px] font-black uppercase tracking-[0.4em] text-brand-dark/20 mr-4 flex-shrink-0">Filter By</span>
                
                <div @scroll="updateScroll($el)" class="flex flex-nowrap overflow-x-auto gap-4 scrollbar-hide py-2 px-1">
                    <a href="{{ route('shop', ['search' => request('search')]) }}" 
                       class="whitespace-nowrap px-10 py-3.5 rounded-full text-[10px] font-black uppercase tracking-widest transition-all {{ !request('category') ? 'bg-brand-dark text-white shadow-2xl scale-105' : 'bg-white border border-brand-dark/5 text-brand-dark/40 hover:bg-brand-dark hover:text-white' }}">
                        All Pieces
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('shop', ['category' => $category->slug, 'search' => request('search')]) }}" 
                           class="whitespace-nowrap px-10 py-3.5 rounded-full text-[10px] font-black uppercase tracking-widest transition-all {{ request('category') == $category->slug ? 'bg-brand-dark text-white shadow-2xl scale-105' : 'bg-white border border-brand-dark/5 text-brand-dark/40 hover:bg-brand-dark hover:text-white' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Custom Scroll Indicator Line --}}
            <div class="mt-4 flex justify-center md:hidden">
                <div class="w-32 h-[1px] bg-brand-dark/5 relative overflow-hidden rounded-full">
                    <div class="absolute h-full bg-brand-accent transition-all duration-100 ease-out" 
                         :style="`width: 30%; left: ${scrollPercent * 0.7}%` "></div>
                </div>
            </div>
        </div>

        {{-- Product Grid --}}
        @if($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-8 gap-y-20">
                @foreach($products as $index => $product)
                    <div class="group relative animate-fade-in" 
                         style="animation-delay: {{ ($index % 4) * 0.1 }}s"
                         x-data="{ 
                            loading: false,
                            added: false,
                            selectedColor: '{{ count($product->colors ?? []) > 0 ? $product->colors[0] : 'None' }}',
                            selectedSize: '{{ count($product->sizes ?? []) > 0 ? $product->sizes[0] : 'None' }}',
                            addToBag() {
                                this.loading = true;
                                fetch('{{ route('cart.add') }}', {
                                    method: 'POST',
                                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
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
                                        setTimeout(() => this.added = false, 2000);
                                    }
                                })
                            }
                         }">
                        
                        {{-- Image with Overlay --}}
                        <div class="aspect-[4/5] overflow-hidden rounded-[3.5rem] bg-white shadow-sm group-hover:shadow-[0_40px_100px_-20px_rgba(0,0,0,0.15)] transition-all duration-700 relative">
                            <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                            
                            {{-- Selection & Quick Add Overlay --}}
                            <div class="absolute inset-0 bg-brand-dark/70 opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col justify-end p-8 backdrop-blur-sm">
                                
                                {{-- Variations UI --}}
                                <div class="mb-6 space-y-5 transform translate-y-8 group-hover:translate-y-0 transition-all duration-500">
                                    @if(count($product->colors ?? []) > 0)
                                        <div class="flex justify-center flex-wrap gap-2">
                                            @foreach($product->colors as $color)
                                                <button @click="selectedColor = '{{ $color }}'" 
                                                        :class="selectedColor === '{{ $color }}' ? 'bg-brand-accent text-white border-brand-accent' : 'text-white border-white/20 hover:border-white'"
                                                        class="px-3 py-1 text-[8px] font-black border rounded-full transition-all uppercase tracking-widest">{{ $color }}</button>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if(count($product->sizes ?? []) > 0)
                                        <div class="flex justify-center flex-wrap gap-2">
                                            @foreach($product->sizes as $size)
                                                <button @click="selectedSize = '{{ $size }}'" 
                                                        :class="selectedSize === '{{ $size }}' ? 'bg-brand-accent text-white border-brand-accent' : 'text-white border-white/20 hover:border-white'"
                                                        class="px-3 py-1 text-[8px] font-black border rounded-full transition-all uppercase tracking-widest">{{ $size }}</button>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <button @click="addToBag" :disabled="loading" 
                                        class="w-full py-5 bg-white text-brand-dark text-[10px] font-black uppercase tracking-[0.2em] rounded-2xl shadow-2xl transform translate-y-8 group-hover:translate-y-0 transition-all duration-500 delay-100 flex items-center justify-center gap-3">
                                    <template x-if="!loading && !added">
                                        <span>Quick Add to Bag</span>
                                    </template>
                                    <template x-if="loading">
                                        <div class="animate-spin rounded-full h-4 w-4 border-2 border-brand-dark/20 border-t-brand-dark"></div>
                                    </template>
                                    <template x-if="added">
                                        <span class="text-green-600 flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                            Confirmed
                                        </span>
                                    </template>
                                </button>
                            </div>

                            {{-- Floating Badges --}}
                            <div class="absolute top-6 left-6 space-y-2">
                                @if($product->stock < 10)
                                    <span class="block px-4 py-1.5 bg-red-500 text-white text-[8px] font-black uppercase tracking-widest rounded-full shadow-lg">Low Stock</span>
                                @endif
                                <span class="block px-4 py-1.5 bg-white text-brand-dark text-[8px] font-black uppercase tracking-widest rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-500">{{ $product->category->name }}</span>
                            </div>
                        </div>

                        {{-- Details --}}
                        <div class="mt-8 space-y-2 px-2 text-center md:text-left transition-all duration-500 group-hover:translate-x-1">
                            <h4 class="text-sm font-black text-brand-dark uppercase tracking-tight leading-tight group-hover:text-brand-accent transition-colors">{{ $product->name }}</h4>
                            <div class="flex items-center justify-center md:justify-start gap-4">
                                <span class="text-brand-accent font-black text-lg italic tracking-tighter">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination Section --}}
            <div class="mt-32 flex justify-center animate-fade-in" style="animation-delay: 0.5s">
                <div class="bg-white p-4 rounded-[2.5rem] shadow-xl border border-brand-dark/5">
                    {{ $products->appends(request()->all())->links() }}
                </div>
            </div>
        @else
            <div class="text-center py-48 bg-white rounded-[5rem] shadow-sm border border-brand-dark/5 animate-fade-in">
                <div class="w-24 h-24 bg-brand-bg rounded-full flex items-center justify-center mx-auto mb-10">
                    <svg class="w-10 h-10 text-brand-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <h3 class="text-4xl font-black text-brand-dark tracking-tighter mb-6 uppercase">Archive Empty.</h3>
                <p class="text-brand-dark/40 max-w-sm mx-auto mb-12 text-sm leading-relaxed">We couldn't find any pieces matching your search criteria. Try a different term or clear your filters.</p>
                <a href="{{ route('shop') }}" class="btn-primary inline-flex px-16">Clear All Archives</a>
            </div>
        @endif

    </div>
</section>

@endsection
