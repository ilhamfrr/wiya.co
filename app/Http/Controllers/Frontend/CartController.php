<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'color' => 'nullable',
            'size' => 'nullable',
        ]);

        $cart = session()->get('cart', []);

        // Create a unique key for the cart item based on product ID, color, and size
        $cartKey = $request->id . '_' . ($request->color ?? 'none') . '_' . ($request->size ?? 'none');

        if(isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity']++;
        } else {
            $cart[$cartKey] = [
                "id" => $request->id,
                "name" => $request->name,
                "quantity" => 1,
                "price" => $request->price,
                "image" => $request->image,
                "color" => $request->color,
                "size" => $request->size
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Product added to bag successfully!',
            'cart_count' => count($cart)
        ]);
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach($cart as $item) {
            $total += (float) str_replace('.', '', $item['price']) * $item['quantity'];
        }
        return view('frontend.cart', compact('cart', 'total'));
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart', []);
            $keyToRemove = $request->id;

            // Direct match check
            if(isset($cart[$keyToRemove])) {
                unset($cart[$keyToRemove]);
            } else {
                // Fallback: search for item with matching 'id' property if the key is different
                foreach($cart as $key => $item) {
                    if((isset($item['id']) && $item['id'] == $request->id) || (isset($item['name']) && $item['name'] == $request->id)) {
                        unset($cart[$key]);
                        break;
                    }
                }
            }

            session()->put('cart', $cart);
            
            return response()->json([
                'success' => true,
                'message' => 'Product removed successfully',
                'cart_count' => count($cart)
            ]);
        }
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully');
    }

    public function updateQuantity(Request $request)
    {
        if($request->id && $request->quantity) {
            $cart = session()->get('cart', []);
            $keyToUpdate = $request->id;
            $newQty = max(1, (int) $request->quantity);

            if(isset($cart[$keyToUpdate])) {
                $cart[$keyToUpdate]['quantity'] = $newQty;
            } else {
                // Fallback search
                foreach($cart as $key => $item) {
                    if(isset($item['id']) && $item['id'] == $request->id) {
                        $cart[$key]['quantity'] = $newQty;
                        break;
                    }
                }
            }

            session()->put('cart', $cart);
            return response()->json([
                'success' => true,
                'message' => 'Quantity updated',
                'cart_count' => count($cart)
            ]);
        }
    }

    public function getCount()
    {
        $cart = session()->get('cart', []);
        return response()->json(['count' => count($cart)]);
    }
}
