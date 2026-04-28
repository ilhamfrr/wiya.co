@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl mx-auto animate-fade-in">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Edit Category</h2>
            <p class="text-gray-500 mt-1">Update classification details for your pieces.</p>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="text-xs font-black text-gray-400 hover:text-black transition-colors uppercase tracking-[0.2em]">Back to Archives</a>
    </div>

    <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-gray-100">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-4">Category Name</label>
                <input type="text" name="name" value="{{ $category->name }}" 
                       class="w-full bg-gray-50 border-none rounded-2xl px-8 py-5 text-xl font-bold focus:ring-4 focus:ring-rose-500/10 focus:border-rose-500 transition-all outline-none" 
                       required autofocus>
                @error('name')
                    <p class="text-red-500 text-[10px] font-bold mt-3 uppercase tracking-wider">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-black text-white font-black py-6 rounded-2xl shadow-2xl hover:bg-gray-900 transition-all active:scale-[0.98] uppercase tracking-[0.4em] text-xs">
                    Update Classification
                </button>
                <div class="mt-6 flex items-center justify-center gap-4 opacity-30">
                    <span class="text-[9px] font-black uppercase tracking-widest">Current Slug:</span>
                    <span class="text-[9px] font-bold lowercase tracking-wider bg-gray-100 px-3 py-1 rounded-full">{{ $category->slug }}</span>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
