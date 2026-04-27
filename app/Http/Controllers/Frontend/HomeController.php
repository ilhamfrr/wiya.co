<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function shop()
    {
        return view('frontend.shop');
    }

    public function show($slug)
    {
        return view('frontend.product-detail', compact('slug'));
    }
}
