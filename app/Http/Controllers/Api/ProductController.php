<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Exception;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $products = Product::with('category')->latest()->get();

            return response()->json([
                'success' => true,
                'message' => 'List all products',
                'data' => $products
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch products',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(string $slug): JsonResponse
    {
        try {
            $product = Product::with('category')->where('slug', $slug)->firstOrFail();

            return response()->json([
                'success' => true,
                'message' => 'Detail product',
                'data' => $product
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }
}
