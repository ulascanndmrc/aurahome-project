<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori Düzenle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Kategori Adı</label>
                        <input type="text" name="name" id="name" value="{{ $category->name }}" 
                               style="border: 1px solid #ccc !important;"
                               class="block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="flex items-center justify-end mt-6 border-t pt-6">
                        <a href="{{ route('admin.categories.index') }}" class="mr-4 text-gray-600 hover:text-gray-900 font-medium">İptal</a>
                        <button type="submit" 
                                style="background-color: #2563eb !important; color: white !important; padding: 10px 25px !important; border-radius: 6px !important; border: none !important; cursor: pointer !important; font-weight: bold !important;">
                            Güncelle
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>