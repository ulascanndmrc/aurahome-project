<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">Yeni Ürün Ekle</h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-2xl p-10 border border-gray-100">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="grid grid-cols-1 gap-6">
                        {{-- Ürün Adı --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Ürün Adı</label>
                            <input type="text" name="name" class="w-full border-gray-200 rounded-lg focus:ring-black focus:border-black transition" required>
                        </div>

                        {{-- Kategori --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Kategori</label>
                            <select name="category_id" class="w-full border-gray-200 rounded-lg focus:ring-black focus:border-black transition" required>
                                <option value="">Seçiniz</option>
                                @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            {{-- Fiyat --}}
                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Fiyat (TL)</label>
                                <input type="number" step="0.01" name="price" class="w-full border-gray-200 rounded-lg focus:ring-black focus:border-black transition" required>
                            </div>
                            {{-- Stok --}}
                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Stok Adedi</label>
                                <input type="number" name="stock" class="w-full border-gray-200 rounded-lg focus:ring-black focus:border-black transition" required>
                            </div>
                        </div>

                        {{-- Açıklama --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Açıklama</label>
                            <textarea name="description" rows="4" class="w-full border-gray-200 rounded-lg focus:ring-black focus:border-black transition"></textarea>
                        </div>

                        {{-- Görsel --}}
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Ürün Görseli</label>
                            <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-black file:text-white hover:file:bg-gray-800 transition cursor-pointer">
                        </div>
                    </div>

                    {{-- İŞTE O GÖRÜNMEYEN BUTON --}}
                    <div class="flex justify-end mt-10 pt-6 border-t border-gray-100">
                        <button type="submit" 
                                style="background-color: #000000 !important; color: #ffffff !important; padding: 14px 40px !important; border-radius: 10px !important; font-weight: bold !important; text-transform: uppercase !important; letter-spacing: 2px !important; cursor: pointer !important; border: none !important; box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;">
                            Kaydet ve Yayına Al
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>