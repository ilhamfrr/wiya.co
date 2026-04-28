@extends('admin.layouts.app')

@section('content')
<div class="animate-fade-in">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Product Categories</h2>
            <p class="text-gray-500 mt-1">Organize your products into meaningful groups.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center px-6 py-3 bg-rose-600 text-white rounded-2xl font-bold shadow-lg shadow-rose-200 hover:bg-rose-700 transition-all active:scale-95">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add New Category
        </a>
    </div>

    @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 font-bold rounded-r-xl">
            {{ session('error') }}
        </div>
    @endif

    <!-- Category Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($categories as $category)
            <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm p-8 group hover:shadow-xl transition-all duration-300">
                <div class="flex items-start justify-between mb-6">
                    <div class="w-12 h-12 bg-gray-50 rounded-2xl flex items-center justify-center group-hover:bg-rose-50 transition-colors">
                        <svg class="w-6 h-6 text-gray-400 group-hover:text-rose-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <span class="block text-2xl font-black text-black">{{ $category->products_count }}</span>
                        <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">Products</span>
                    </div>
                </div>
                
                <h3 class="text-xl font-black text-gray-900 mb-2 uppercase tracking-tight">{{ $category->name }}</h3>
                <p class="text-xs font-bold text-gray-400 mb-8 lowercase tracking-wide">/{{ $category->slug }}</p>

                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="flex-1 bg-gray-900 text-white text-[10px] font-black py-4 rounded-xl hover:bg-black text-center transition-all uppercase tracking-widest">Edit Details</a>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category? This will fail if there are products attached.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-12 h-12 bg-rose-50 text-rose-600 rounded-xl flex items-center justify-center hover:bg-rose-600 hover:text-white transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full py-20 text-center bg-white rounded-[3rem] border-2 border-dashed border-gray-100">
                <p class="text-gray-400 font-bold uppercase tracking-widest">No categories created yet</p>
            </div>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $categories->links() }}
    </div>
</div>
@endsection
