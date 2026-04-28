<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(4)->get();
        return view('frontend.home', compact('products'));
    }

    public function shop(Request $request)
    {
        $categories = Category::all();
        $query = Product::query();

        // Search Filter
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Category Filter
        if ($request->has('category') && $request->category != '') {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $products = $query->latest()->paginate(12);

        return view('frontend.shop', compact('products', 'categories'));
    }

    public function show($slug)
    {
        return view('frontend.product-detail', compact('slug'));
    }

    public function lookbook()
    {
        return view('frontend.lookbook');
    }
}
