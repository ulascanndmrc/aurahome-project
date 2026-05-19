<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ürün Düzenle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-bold text-gray-700">Ürün Adı</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="w-full rounded border-gray-300" required>
                        </div>

                        <div>
                            <label class="block font-bold text-gray-700">Kategori</label>
                            <select name="category_id" class="w-full rounded border-gray-300" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block font-bold text-gray-700">Fiyat (TL)</label>
                            <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="w-full rounded border-gray-300" required>
                        </div>

                        <div>
                            <label class="block font-bold text-gray-700">Stok</label>
                            <input type="number" name="stock" value="{{ $product->stock }}" class="w-full rounded border-gray-300" required>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block font-bold text-gray-700">Mevcut Görsel</label>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="h-20 w-20 object-cover my-2 rounded border">
                            @endif
                            <input type="file" name="image" class="w-full text-sm text-gray-500">
                            <p class="text-xs text-gray-400 mt-1">Yeni fotoğraf seçmezseniz mevcut olan korunur.</p>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end border-t pt-6">
                        <button type="submit" 
                                style="background-color: #16a34a !important; color: white !important; padding: 10px 30px !important; border-radius: 6px !important; border: none !important; cursor: pointer !important; font-weight: bold !important;">
                            Değişiklikleri Kaydet
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>