@extends('layouts.app')

@section('title', 'WIYA.CO — Fashion Brand')
@section('meta_description', 'Curated fashion pieces for modern women. New collection 2025.')

@section('content')

{{-- ===== HERO ===== --}}
<section class="relative bg-gradient-to-br from-rose-50 via-white to-pink-50 overflow-hidden">
    <div class="absolute inset-0 opacity-30" style="background-image: radial-gradient(circle at 70% 50%, #fce7f3 0%, transparent 60%);"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-28 flex flex-col md:flex-row items-center gap-12">
        <div class="flex-1 text-center md:text-left">
            <span class="inline-block px-4 py-1.5 bg-rose-100 text-rose-600 text-xs font-semibold tracking-widest uppercase rounded-full mb-5">New Collection 2025</span>
            <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight tracking-tight mb-6">
                Dress Your Story<br>
                with <span class="text-rose-600">WIYA.CO</span>
            </h1>
            <p class="text-gray-500 text-lg leading-relaxed mb-8 max-w-md">
                Curated fashion pieces for modern women — minimal, bold, and effortlessly elegant.
            </p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center md:justify-start">
                <a href="{{ route('shop') }}" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-rose-600 text-white font-semibold rounded-full hover:bg-rose-700 transition-all duration-200 shadow-lg hover:shadow-rose-200 hover:-translate-y-0.5">
                    Shop Now
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="#" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-white text-gray-700 font-semibold rounded-full hover:bg-gray-50 transition-all duration-200 border border-gray-200">
                    View Lookbook
                </a>
            </div>
        </div>
        <div class="flex-1 flex items-center justify-center">
            <div class="w-80 h-80 rounded-3xl bg-gradient-to-br from-rose-200 to-pink-300 flex items-center justify-center text-8xl shadow-2xl">
                👗
            </div>
        </div>
    </div>
</section>

{{-- ===== CATEGORIES ===== --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Shop by Category</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach([
            ['name' => 'Dresses',  'icon' => '👗', 'color' => 'from-rose-100 to-pink-100'],
            ['name' => 'Tops',     'icon' => '👚', 'color' => 'from-purple-100 to-indigo-100'],
            ['name' => 'Bottoms',  'icon' => '👖', 'color' => 'from-amber-100 to-yellow-100'],
            ['name' => 'Outer',    'icon' => '🧥', 'color' => 'from-teal-100 to-cyan-100'],
        ] as $cat)
        <a href="{{ route('shop') }}" class="group relative bg-gradient-to-br {{ $cat['color'] }} rounded-2xl p-8 flex flex-col items-center gap-3 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
            <span class="text-4xl group-hover:scale-110 transition-transform duration-300">{{ $cat['icon'] }}</span>
            <span class="font-semibold text-gray-800 text-sm">{{ $cat['name'] }}</span>
        </a>
        @endforeach
    </div>
</section>

{{-- ===== FEATURED PRODUCTS ===== --}}
<section class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Featured Products</h2>
            <a href="{{ route('shop') }}" class="text-sm text-rose-600 font-semibold hover:text-rose-700 transition-colors flex items-center gap-1">
                View All <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach([
                ['name' => 'Floral Maxi Dress',   'price' => '299.000', 'badge' => 'New'],
                ['name' => 'Linen Blouse Set',     'price' => '185.000', 'badge' => 'Bestseller'],
                ['name' => 'Wide Leg Trousers',    'price' => '225.000', 'badge' => 'New'],
                ['name' => 'Oversized Blazer',     'price' => '450.000', 'badge' => 'Limited'],
            ] as $product)
            <div class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="relative bg-gradient-to-br from-rose-50 to-pink-100 h-56 flex items-center justify-center">
                    <span class="text-6xl group-hover:scale-110 transition-transform duration-300">👗</span>
                    <span class="absolute top-3 left-3 px-2.5 py-1 bg-rose-600 text-white text-xs font-semibold rounded-full">{{ $product['badge'] }}</span>
                    <button class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-md opacity-0 group-hover:opacity-100 transition-opacity duration-200 text-gray-400 hover:text-rose-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </button>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-800 text-sm mb-1">{{ $product['name'] }}</h3>
                    <p class="text-rose-600 font-bold">Rp {{ $product['price'] }}</p>
                    <button class="mt-3 w-full py-2 bg-gray-900 text-white text-xs font-semibold rounded-xl hover:bg-rose-600 transition-colors duration-200 opacity-0 group-hover:opacity-100">
                        Add to Cart
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== BRAND BANNER ===== --}}
<section class="bg-gray-950 text-white py-20">
    <div class="max-w-3xl mx-auto px-4 text-center">
        <p class="text-rose-400 text-sm font-semibold tracking-widest uppercase mb-4">Our Philosophy</p>
        <h2 class="text-4xl font-extrabold mb-6 leading-tight">Fashion is not just clothing.<br>It's a <span class="text-rose-400">statement</span>.</h2>
        <p class="text-gray-400 leading-relaxed mb-8">Every piece in WIYA.CO is carefully curated to bring out confidence, elegance, and individuality in every woman.</p>
        <a href="#" class="inline-flex items-center gap-2 px-8 py-3.5 bg-rose-600 text-white font-semibold rounded-full hover:bg-rose-700 transition-all duration-200 shadow-lg">
            Read Our Story
        </a>
    </div>
</section>

@endsection
