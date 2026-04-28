@extends('admin.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto animate-fade-in">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Add New Product</h2>
            <p class="text-gray-500 mt-1">List a new item in the store collection.</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="text-sm font-bold text-gray-400 hover:text-black transition-colors uppercase tracking-widest">Back to List</a>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8" x-data="{ preview: null }">
        @csrf
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100 space-y-6">
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Product Name</label>
                    <input type="text" name="name" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 text-lg font-bold focus:ring-2 focus:ring-black transition-all" required>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Category</label>
                        <select name="category_id" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-black outline-none appearance-none" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Price (IDR)</label>
                        <input type="number" name="price" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 text-lg font-bold focus:ring-2 focus:ring-black" required>
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Stock</label>
                    <input type="number" name="stock" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-black" required>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Description</label>
                    <textarea name="description" rows="5" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-black resize-none"></textarea>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Colors</label>
                        <input type="text" name="colors" placeholder="e.g. Sage, Terracotta" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-black">
                        <p class="text-[9px] text-gray-400 mt-2 italic font-bold">Separated by commas</p>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Sizes</label>
                        <input type="text" name="sizes" placeholder="e.g. S, M, L, XL" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-black">
                        <p class="text-[9px] text-gray-400 mt-2 italic font-bold">Separated by commas</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100">
                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-4">Image</label>
                <div class="relative aspect-square rounded-[2rem] bg-gray-50 border-2 border-dashed border-gray-100 flex items-center justify-center overflow-hidden group">
                    <template x-if="preview">
                        <img :src="preview" class="w-full h-full object-cover">
                    </template>
                    <div x-show="!preview" class="text-center text-gray-300">
                        <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span class="text-[10px] font-black uppercase">Upload Image</span>
                    </div>
                    <input type="file" name="image" class="absolute inset-0 opacity-0 cursor-pointer" @change="let file = $event.target.files[0]; let reader = new FileReader(); reader.onload = (e) => preview = e.target.result; reader.readAsDataURL(file)">
                </div>
            </div>
            <button type="submit" class="w-full bg-black text-white font-black py-5 rounded-[2rem] shadow-xl hover:bg-gray-900 transition-all active:scale-[0.98]">Create Product</button>
        </div>
    </form>
</div>
@endsection
