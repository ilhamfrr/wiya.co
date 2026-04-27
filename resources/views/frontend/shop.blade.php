@extends('layouts.app')

@section('title', 'Shop — WIYA.CO')
@section('meta_description', 'Browse our full collection of curated fashion pieces.')

@section('content')

{{-- Page Header --}}
<section class="bg-gradient-to-r from-rose-50 to-pink-50 border-b border-rose-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-rose-500 text-xs font-semibold tracking-widest uppercase mb-2">Browse</p>
        <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">All Products</h1>
    </div>
</section>

{{-- Shop Grid --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Filters --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
        <div class="flex items-center gap-2 flex-wrap">
            @foreach(['All', 'Dresses', 'Tops', 'Bottoms', 'Outer'] as $i => $filter)
            <button class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200
                {{ $i === 0 ? 'bg-rose-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-rose-50 hover:text-rose-600' }}">
                {{ $filter }}
            </button>
            @endforeach
        </div>
        <select class="text-sm border border-gray-200 rounded-xl px-4 py-2 text-gray-600 focus:outline-none focus:ring-2 focus:ring-rose-300">
            <option>Sort: Newest First</option>
            <option>Price: Low to High</option>
            <option>Price: High to Low</option>
        </select>
    </div>

    {{-- Product Grid --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach([
            ['name' => 'Floral Maxi Dress',      'price' => '299.000', 'badge' => 'New',        'emoji' => '👗'],
            ['name' => 'Linen Blouse Set',        'price' => '185.000', 'badge' => 'Bestseller', 'emoji' => '👚'],
            ['name' => 'Wide Leg Trousers',       'price' => '225.000', 'badge' => 'New',        'emoji' => '👖'],
            ['name' => 'Oversized Blazer',        'price' => '450.000', 'badge' => 'Limited',    'emoji' => '🧥'],
            ['name' => 'Ribbed Crop Top',         'price' => '120.000', 'badge' => 'Sale',       'emoji' => '👕'],
            ['name' => 'Satin Slip Dress',        'price' => '350.000', 'badge' => 'New',        'emoji' => '👗'],
            ['name' => 'Cargo Jogger Pants',      'price' => '200.000', 'badge' => '',           'emoji' => '👖'],
            ['name' => 'Knit Cardigan',           'price' => '280.000', 'badge' => 'Restock',   'emoji' => '🧶'],
        ] as $product)
        <div class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <div class="relative bg-gradient-to-br from-rose-50 to-pink-100 h-52 flex items-center justify-center">
                <span class="text-5xl group-hover:scale-110 transition-transform duration-300">{{ $product['emoji'] }}</span>
                @if($product['badge'])
                    <span class="absolute top-3 left-3 px-2.5 py-1 bg-rose-600 text-white text-xs font-semibold rounded-full">{{ $product['badge'] }}</span>
                @endif
                <button class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-md opacity-0 group-hover:opacity-100 transition-opacity duration-200 text-gray-400 hover:text-rose-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </button>
            </div>
            <div class="p-4">
                <h3 class="font-semibold text-gray-800 text-sm mb-1 truncate">{{ $product['name'] }}</h3>
                <p class="text-rose-600 font-bold text-sm">Rp {{ $product['price'] }}</p>
                <button class="mt-3 w-full py-2 bg-gray-900 text-white text-xs font-semibold rounded-xl hover:bg-rose-600 transition-colors duration-200 opacity-0 group-hover:opacity-100">
                    Add to Cart
                </button>
            </div>
        </div>
        @endforeach
    </div>

</section>
@endsection
