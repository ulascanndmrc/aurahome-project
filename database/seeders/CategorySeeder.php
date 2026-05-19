<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Örnek Kategoriler
        $categories = ['Aydınlatma', 'Mobilya', 'Dekorasyon', 'Mutfak', 'Bahçe'];

        foreach ($categories as $catName) {
            $category = Category::create([
                'name' => $catName,
                'slug' => Str::slug($catName),
            ]);

            // Her kategoriye 3 tane rastgele ürün ekleyelim
            for ($i = 1; $i <= 3; $i++) {
                Product::create([
                    'category_id' => $category->id,
                    'name' => $catName . ' Ürünü ' . $i,
                    'description' => 'Bu harika bir ' . $catName . ' ürünüdür. Hocamıza selamlar.',
                    'price' => rand(100, 5000),
                    'stock' => rand(1, 50),
                    'image' => null, // Resimleri elle yükleyebilirsin
                ]);
            }
        }
    }
}