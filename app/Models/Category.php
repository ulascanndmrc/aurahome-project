<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Hata veren kısım tam burası: Hangi alanların kaydedilebileceğini izne bağlıyoruz
    protected $fillable = ['name', 'slug'];

    /**
     * Kategorinin ürünlerini tanımlıyoruz (Hoca ilişkilere bakabilir)
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Vitrin üst menüsü (Mobilya, Aydınlatma, Tekstil, Dekorasyon).
     *
     * @return array<int, array{label: string, href: string, active: bool}>
     */
    public static function storefrontNavigation(?int $activeCategoryId = null): array
    {
        $navSlugs = [
            ['slug' => 'mobilya', 'label' => 'Mobilya'],
            ['slug' => 'aydinlatma', 'label' => 'Aydınlatma'],
            ['slug' => null, 'label' => 'Tekstil'],
            ['slug' => 'dekorasyon', 'label' => 'Dekorasyon'],
        ];
        $items = [];
        foreach ($navSlugs as $row) {
            if ($row['slug'] === null) {
                $items[] = ['label' => $row['label'], 'href' => '#', 'active' => false];

                continue;
            }
            $cat = static::where('slug', $row['slug'])->first();
            if (! $cat) {
                $items[] = ['label' => $row['label'], 'href' => '#', 'active' => false];

                continue;
            }
            $items[] = [
                'label' => $row['label'],
                'href' => route('category.show', $cat->slug),
                'active' => $activeCategoryId !== null && (int) $cat->id === (int) $activeCategoryId,
            ];
        }

        return $items;
    }
}