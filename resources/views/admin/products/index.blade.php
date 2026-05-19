<x-app-layout>
    {{-- İkonların çalışması için gerekli kütüphane --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <x-slot name="header">
        <div class="flex justify-between items-center" style="min-height: 60px;">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">Ürün Yönetimi</h2>
            
            {{-- BUTONU BURADA ZORLAYARAK SİMSİYAH YAPIYORUZ --}}
            <a href="{{ route('admin.products.create') }}" 
               style="background-color: #000000 !important; color: #ffffff !important; display: flex !important; align-items: center !important; padding: 10px 24px !important; border-radius: 8px !important; font-weight: bold !important; text-transform: uppercase !important; letter-spacing: 1px !important; text-decoration: none !important; box-shadow: 0 4px 12px rgba(0,0,0,0.3) !important; font-size: 14px !important;">
                <span class="material-symbols-outlined" style="margin-right: 8px;">add_box</span>
                Yeni Ürün Ekle
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">
                <div class="p-8">
                    <table class="w-full text-left border-separate border-spacing-y-2">
                        <thead>
                            <tr class="text-gray-400 text-[10px] uppercase tracking-[0.2em] font-black">
                                <th class="px-6 py-4 border-b">Görsel</th>
                                <th class="px-6 py-4 border-b">Ürün Adı</th>
                                <th class="px-6 py-4 border-b">Kategori</th>
                                <th class="px-6 py-4 border-b">Fiyat</th>
                                <th class="px-6 py-4 border-b">Stok</th>
                                <th class="px-6 py-4 border-b text-center">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($products as $product)
                                <tr class="bg-white hover:bg-gray-50 transition-all duration-200">
                                    <td class="px-6 py-4">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" class="h-14 w-14 object-cover rounded-xl shadow-md border border-gray-100">
                                        @else
                                            <div class="h-14 w-14 bg-gray-100 rounded-xl flex items-center justify-center text-gray-300">
                                                <span class="material-symbols-outlined text-3xl">image</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-bold text-gray-900">{{ $product->name }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 bg-gray-100 text-gray-600 text-[10px] font-bold uppercase tracking-widest rounded-full italic">
                                            {{ $product->category->name ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 font-black text-gray-900 text-lg">₺{{ number_format($product->price, 2, ',', '.') }}</td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-medium {{ $product->stock < 10 ? 'text-red-500 font-bold' : 'text-gray-500' }}">
                                            {{ $product->stock }} Adet
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center items-center space-x-6">
                                            {{-- Düzenle --}}
                                            <a href="{{ route('admin.products.edit', $product) }}" class="flex items-center text-blue-600 hover:text-blue-800 transition-colors group">
                                                <span class="material-symbols-outlined text-xl mr-1 group-hover:scale-110 transition-transform">edit</span>
                                                <span class="text-[11px] font-black uppercase tracking-tighter">Düzenle</span>
                                            </a>

                                            {{-- Sil --}}
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Bu ürünü silmek istediğinize emin misiniz?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="flex items-center text-red-500 hover:text-red-700 transition-colors group">
                                                    <span class="material-symbols-outlined text-xl mr-1 group-hover:scale-110 transition-transform">delete</span>
                                                    <span class="text-[11px] font-black uppercase tracking-tighter">Sil</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-20 text-center text-gray-400 italic tracking-widest">Henüz ürün eklenmemiş.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>