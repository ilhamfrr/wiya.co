<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'orders'    => 0,
            'revenue'   => 'Rp 0',
            'products'  => 0,
            'customers' => 0,
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
