@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl mx-auto animate-fade-in">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">New Category</h2>
            <p class="text-gray-500 mt-1">Create a new group for your collections.</p>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="text-xs font-black text-gray-400 hover:text-black transition-colors uppercase tracking-[0.2em]">Back to Archives</a>
    </div>

    <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-gray-100">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-8">
            @csrf
            <div>
                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] mb-4">Category Name</label>
                <input type="text" name="name" placeholder="e.g. Silk Collection" 
                       class="w-full bg-gray-50 border-none rounded-2xl px-8 py-5 text-xl font-bold focus:ring-4 focus:ring-rose-500/10 focus:border-rose-500 transition-all outline-none" 
                       required autofocus>
                @error('name')
                    <p class="text-red-500 text-[10px] font-bold mt-3 uppercase tracking-wider">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-black text-white font-black py-6 rounded-2xl shadow-2xl hover:bg-gray-900 transition-all active:scale-[0.98] uppercase tracking-[0.4em] text-xs">
                    Register Category
                </button>
                <p class="text-center text-[9px] text-gray-300 mt-6 font-bold uppercase tracking-widest leading-relaxed">
                    Slug will be generated automatically based on the name provided above.
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
