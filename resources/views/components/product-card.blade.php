@props(['product'])

<div 
    x-data="{ show: false }" 
    x-init="setTimeout(() => show = true, 50)"
    x-show="show"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 scale-90 translate-y-4"
    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
    class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden hover:shadow-xl hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 group"
>
    <!-- Product Image -->
    <div class="relative aspect-square bg-gray-50 flex items-center justify-center overflow-hidden">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
        @else
            <div class="flex flex-col items-center gap-2 text-gray-300">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="text-xs font-medium uppercase tracking-widest">No Image</span>
            </div>
        @endif

        <!-- Stock Badge -->
        <div class="absolute top-3 right-3">
            <span @class([
                'px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider shadow-sm backdrop-blur-md',
                'bg-emerald-500/10 text-emerald-600 border border-emerald-500/20' => $product->stock > 10,
                'bg-amber-500/10 text-amber-600 border border-amber-500/20' => $product->stock <= 10 && $product->stock > 0,
                'bg-rose-500/10 text-rose-600 border border-rose-500/20' => $product->stock == 0,
            ])>
                {{ $product->stock > 0 ? 'Stock: ' . $product->stock : 'Out of Stock' }}
            </span>
        </div>
    </div>

    <!-- Product Details -->
    <div class="p-5">
        <p class="text-xs font-semibold text-rose-500 uppercase tracking-widest mb-1">
            {{ $product->category->name ?? 'Uncategorized' }}
        </p>
        <h3 class="font-bold text-gray-900 text-lg mb-1 truncate group-hover:text-rose-600 transition-colors">
            {{ $product->name }}
        </h3>
        <p class="text-xl font-extrabold text-black mb-4">
            Rp {{ number_format($product->price, 0, ',', '.') }}
        </p>

        <!-- Action Buttons -->
        <div class="flex items-center gap-2">
            <a 
                href="#" 
                class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2 bg-gray-900 text-white text-xs font-bold rounded-xl hover:bg-black transition-all shadow-sm active:scale-95"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit
            </a>
            <button 
                class="inline-flex items-center justify-center w-10 h-10 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition-all shadow-sm active:scale-95"
                onclick="confirm('Are you sure you want to delete this product?') || event.stopImmediatePropagation()"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
            </button>
        </div>
    </div>
</div>
