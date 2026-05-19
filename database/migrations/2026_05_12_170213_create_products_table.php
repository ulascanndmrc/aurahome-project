<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Kategori bağlantısı (Kategori silinirse ürünler de silinir)
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); 
            
            $table->string('name'); // Ürün adı [cite: 37]
            $table->text('description'); // Ürün tanıtımı/açıklaması [cite: 3]
            $table->decimal('price', 8, 2); // Ürün fiyatı [cite: 37]
            $table->integer('stock'); // Ürün stok adeti [cite: 37, 38]
            $table->string('image')->nullable(); // Ürün fotoğrafı [cite: 39]
            
            // Ürünü satışa sunma veya kaldırma kontrolü için [cite: 38]
            $table->boolean('is_active')->default(true); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};