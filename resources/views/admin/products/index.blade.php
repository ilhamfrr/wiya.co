@extends('admin.layouts.app')

@section('content')
<div class="animate-fade-in">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Products Collection</h2>
            <p class="text-gray-500 mt-1">Manage your catalog of items and track their availability.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="inline-flex items-center px-6 py-3 bg-rose-600 text-white rounded-2xl font-bold shadow-lg shadow-rose-200 hover:bg-rose-700 transition-all active:scale-95">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add New Item
        </a>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse($products as $product)
            <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm overflow-hidden group hover:shadow-xl transition-all duration-300">
                <div class="relative aspect-square bg-gray-50 overflow-hidden">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-300">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                    @endif
                    <div class="absolute top-3 right-3 px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-bold text-gray-900 border border-white/20">
                        {{ $product->stock }} in stock
                    </div>
                </div>
                <div class="p-5">
                    <p class="text-[10px] font-bold text-rose-500 uppercase tracking-widest mb-1">{{ $product->category->name ?? 'Uncategorized' }}</p>
                    <h3 class="font-bold text-gray-900 text-lg mb-1 truncate">{{ $product->name }}</h3>
                    <p class="text-xl font-black text-black mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="flex-1 bg-gray-900 text-white text-xs font-bold py-3 rounded-xl hover:bg-black text-center transition-all">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-10 h-10 bg-rose-50 text-rose-600 rounded-xl flex items-center justify-center hover:bg-rose-600 hover:text-white transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-20 text-center bg-white rounded-[3rem] border-2 border-dashed border-gray-100">
                <p class="text-gray-400 font-bold uppercase tracking-widest">No products yet</p>
            </div>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $products->links() }}
    </div>
</div>
@endsection
