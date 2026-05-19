<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. ADMIN HESABI
        $allUsers = User::all();
        $adminExists = false;
        foreach ($allUsers as $user) {
            if ($user->email === 'admin@aurahome.com') {
                $adminExists = true;
            }
        }

        if (!$adminExists) {
            $admin = new User();
            $admin->name = 'Ulaş Can Demirci';
            $admin->email = 'admin@aurahome.com';
            $admin->password = Hash::make('12345678');
            $admin->balance = 60000.00;
            $admin->is_admin = true;
            $admin->save();
        }

        // 2. 10 ADET TEST KULLANICISI
        $newUsers = [
            ['name' => 'Ahmet Yılmaz', 'email' => 'ahmet@example.com'],
            ['name' => 'Mehmet Kaya', 'email' => 'mehmet@example.com'],
            ['name' => 'Ayşe Demir', 'email' => 'ayse@example.com'],
            ['name' => 'Fatma Yıldız', 'email' => 'fatma@example.com'],
            ['name' => 'Can Özkan', 'email' => 'can@example.com'],
            ['name' => 'Burak Şahin', 'email' => 'burak@example.com'],
            ['name' => 'Ece Aydın', 'email' => 'ece@example.com'],
            ['name' => 'Deniz Arslan', 'email' => 'deniz@example.com'],
            ['name' => 'Gamze Kılıç', 'email' => 'gamze@example.com'],
            ['name' => 'Mert Çetin', 'email' => 'mert@example.com'],
        ];

        foreach ($newUsers as $u) {
            $exists = false;
            foreach ($allUsers as $existingUser) {
                if ($existingUser->email === $u['email']) {
                    $exists = true;
                }
            }

            if (!$exists) {
                $userModel = new User();
                $userModel->name = $u['name'];
                $userModel->email = $u['email'];
                $userModel->password = Hash::make('password');
                $userModel->balance = 25000.00;
                $userModel->save();
            }
        }

        // 3. KATEGORİLER VE ÜRÜNLER
        $data = [
            'Mobilya' => ['Modern Koltuk', 'Lüks Masa', 'Minimalist Sandalye', 'Cloud Yatak', 'Ahşap Kitaplık'],
            'Aydınlatma' => ['Bakır Avize', 'Küresel Lambader', 'Art Deco Aplik', 'Masa Lambası'],
            'Dekorasyon' => ['Şık Vazo Seti', 'Soyut Tablo', 'Antik Ayna', 'Seramik Biblo']
        ];

        $allCategories = Category::all();
        $allProducts = Product::all();

        foreach ($data as $catName => $items) {
            $category = null;
            foreach ($allCategories as $c) {
                if ($c->name === $catName) {
                    $category = $c;
                }
            }
            
            if (!$category) {
                $category = new Category();
                $category->name = $catName;
                $category->slug = Str::slug($catName);
                $category->save();
            }
            
            foreach ($items as $itemName) {
                $productExists = false;
                foreach ($allProducts as $p) {
                    if (str_contains($p->name, $itemName)) {
                        $productExists = true;
                    }
                }
                
                if (!$productExists) {
                    for ($i = 1; $i <= 4; $i++) {
                        $newP = new Product();
                        $newP->name = $itemName . " " . $i;
                        $newP->price = (float)rand(1500, 18000);
                        $newP->category_id = $category->id;
                        $newP->description = 'AuraHome özel serisi.';
                        $newP->stock = rand(10, 50);
                        $newP->save();
                    }
                }
            }
        }
    }
}