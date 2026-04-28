<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'orders'    => Order::count(),
            'revenue'   => 'Rp ' . number_format(Order::where('status', '!=', 'cancelled')->sum('total_price'), 0, ',', '.'),
            'products'  => Product::count(),
            'customers' => User::where('role', 'user')->count(),
        ];

        $recentOrders = Order::with('items')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentOrders'));
    }
}
