<?php

namespace App\Http\Controllers\Frontend;

require_once base_path('vendor/midtrans/midtrans-php/Midtrans.php');

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your bag is empty.');
        }

        $total = 0;
        foreach ($cart as $item) {
            $price = (float) str_replace('.', '', $item['price']);
            $total += $price * $item['quantity'];
        }

        return view('frontend.checkout', compact('cart', 'total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'phone' => 'required|string',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your bag is empty.');
        }

        $total = 0;
        foreach ($cart as $item) {
            $price = (float) str_replace('.', '', $item['price']);
            $total += $price * $item['quantity'];
        }

        DB::beginTransaction();
        try {
            // Create Order
            $order = Order::create([
                'user_id' => Auth::id(),
                'customer_name' => Auth::user()->name,
                'phone' => $request->phone,
                'address' => $request->address . ', ' . $request->city . ' ' . $request->postal_code,
                'total_price' => $total,
                'status' => 'unpaid',
                'payment_status' => 'pending',
            ]);

            // Create Order Items
            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'product_name' => $item['name'],
                    'product_image' => $item['image'],
                    'size' => $item['size'],
                    'quantity' => $item['quantity'],
                    'price' => (float) str_replace('.', '', $item['price']),
                ]);
            }

            // Midtrans Params
            $params = [
                'transaction_details' => [
                    'order_id' => 'WIYA-' . $order->id . '-' . time(),
                    'gross_amount' => (int) $total,
                ],
                'customer_details' => [
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'phone' => $request->phone,
                ],
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $order->update(['snap_token' => $snapToken]);

            DB::commit();

            return response()->json([
                'success' => true,
                'snap_token' => $snapToken,
                'order_id' => $order->id
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function success(Request $request)
    {
        session()->forget('cart');
        return view('frontend.success');
    }
}
