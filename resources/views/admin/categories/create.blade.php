<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Yeni Kategori Ekle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Kategori Adı</label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               style="border: 1px solid #ccc !important;"
                               class="block w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 rounded-md shadow-sm" 
                               placeholder="Örn: Aydınlatma" 
                               required>
                    </div>

                    <div class="flex items-center justify-end mt-6 border-t pt-6">
                        <a href="{{ route('admin.categories.index') }}" class="mr-4 text-gray-600 hover:text-gray-900 font-medium">İptal</a>
                        
                        <button type="submit" 
                                style="background-color: #2563eb !important; 
                                       color: white !important; 
                                       padding: 10px 25px !important; 
                                       border-radius: 6px !important; 
                                       display: inline-block !important; 
                                       visibility: visible !important; 
                                       opacity: 1 !important;
                                       border: none !important;
                                       cursor: pointer !important;
                                       font-weight: bold !important;"
                                class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 shadow-md">
                            Kategoriyi Kaydet
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>