<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Dress', 'slug' => 'dress'],
            ['name' => 'Pashmina', 'slug' => 'pashmina'],
            ['name' => 'Abaya', 'slug' => 'abaya'],
            ['name' => 'Oneset', 'slug' => 'oneset'],
        ];

        foreach ($categories as $cat) {
            $category = Category::create($cat);

            if ($cat['slug'] === 'dress') {
                Product::create([
                    'category_id' => $category->id,
                    'name' => 'Malika Babydoll Dress',
                    'slug' => 'malika-babydoll-dress',
                    'description' => 'Elegant and flowing babydoll dress for modern modest wear.',
                    'price' => 240000,
                    'stock' => 50,
                    'image' => 'https://assets.evermos.com/public/medium/q:100/evermos-production/product/model/1968c2e1-a3b6-4e5a-a803-88dbcf11a8eb',
                    'colors' => ['Sage', 'Terracotta', 'Black'],
                    'sizes' => ['M', 'L', 'XL']
                ]);
            }

            if ($cat['slug'] === 'pashmina') {
                Product::create([
                    'category_id' => $category->id,
                    'name' => 'Belvina Inner Pashmina',
                    'slug' => 'belvina-inner-pashmina',
                    'description' => 'Premium quality pashmina with built-in inner for ultimate comfort.',
                    'price' => 65000,
                    'stock' => 100,
                    'image' => 'https://assets.evermos.com/public/medium/q:100/evermos-production/product/model/b60b42ca-d52e-43b0-b559-fe8d0e76d73f',
                    'colors' => ['Midnight', 'Dusty', 'Sand'],
                    'sizes' => ['All Size']
                ]);
            }

            if ($cat['slug'] === 'abaya') {
                Product::create([
                    'category_id' => $category->id,
                    'name' => 'Zuhra Silk Abaya',
                    'slug' => 'zuhra-silk-abaya',
                    'description' => 'Luxurious silk abaya with intricate detailing.',
                    'price' => 450000,
                    'stock' => 20,
                    'image' => 'https://assets.evermos.com/public/medium/q:100/evermos-production/product/model/61435c2b-62fd-41dd-8c64-905d4a6ede2a',
                    'colors' => ['Emerald', 'Midnight'],
                    'sizes' => ['S', 'M', 'L']
                ]);
            }

            if ($cat['slug'] === 'oneset') {
                Product::create([
                    'category_id' => $category->id,
                    'name' => 'Yumna Daily Oneset',
                    'slug' => 'yumna-daily-oneset',
                    'description' => 'Comfortable and stylish oneset for daily activities.',
                    'price' => 170000,
                    'stock' => 40,
                    'image' => 'https://assets.evermos.com/public/medium/q:100/evermos-production/product/model/98e7cd4b-eaaf-4fea-85c1-03fa35b092f3',
                    'colors' => ['Lilac', 'Mint', 'Beige'],
                    'sizes' => ['S', 'M', 'L']
                ]);
            }
        }
    }
}
