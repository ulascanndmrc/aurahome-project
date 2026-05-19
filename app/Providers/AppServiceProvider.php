<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 1. ADIM: Otomatik Bakiye Sistemi (İster 2.4)
        try {
            if (Schema::hasTable('users')) {
                // Sütun yoksa oluştur (Varsayılan 60.000 TL)
                if (!Schema::hasColumn('users', 'balance')) {
                    Schema::table('users', function ($table) {
                        $table->decimal('balance', 15, 2)->default(60000);
                    });
                    
                    // Sütun ilk kez oluştuğunda mevcut kullanıcılara parayı yükle
                    User::query()->update(['balance' => 60000]);
                }
            }
        } catch (\Exception $e) {
            // Veritabanı hatası durumunda sessiz kal
        }

        // 2. ADIM: Navigasyon Paylaşımı (Header Hatasını Önlemek İçin)
        try {
            if (Schema::hasTable('categories')) {
                View::share('navItems', Category::all());
            }
        } catch (\Exception $e) {
            //
        }
    }
}