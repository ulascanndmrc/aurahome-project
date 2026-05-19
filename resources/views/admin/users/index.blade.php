<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight uppercase">
            Müşteri Yönetimi
        </h2>
    </x-slot>

    <script src="https://cdn.tailwindcss.com"></script>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-800 p-4 rounded-lg shadow-sm mb-6 font-bold">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-800 p-4 rounded-lg shadow-sm mb-6 font-bold">{{ session('error') }}</div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl p-8 border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600 uppercase text-xs font-black tracking-wider">
                                <th class="p-4 rounded-tl-lg">Kullanıcı</th>
                                <th class="p-4">Email</th>
                                <th class="p-4">Bakiye</th>
                                <th class="p-4">Durum</th>
                                <th class="p-4 rounded-tr-lg">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors border-b border-gray-50">
                                <td class="p-4 font-bold text-gray-800">
                                    {{ $user->name }}
                                    @if($user->is_admin)
                                        <span class="ml-2 px-2 py-1 bg-purple-100 text-purple-700 text-[10px] rounded-full uppercase">Admin</span>
                                    @endif
                                </td>
                                <td class="p-4 text-gray-500 font-medium">{{ $user->email }}</td>
                                <td class="p-4 font-black text-blue-600">{{ $user->balance ?? 0 }} TL</td>
                                <td class="p-4">
                                    @if($user->is_admin)
                                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase bg-gray-200 text-gray-600">Sistem</span>
                                    @else
                                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase {{ ($user->status ?? 'active') == 'active' ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }}">
                                            {{ ($user->status ?? 'active') == 'active' ? 'Aktif' : 'Donduruldu' }}
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4 flex gap-2">
                                    @if(!$user->is_admin)
                                        <form action="{{ route('admin.users.toggle', $user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="px-5 py-2 rounded-lg text-xs font-black uppercase tracking-wider shadow-md transition-all {{ ($user->status ?? 'active') == 'active' ? 'bg-orange-500 hover:bg-orange-600 text-white' : 'bg-green-500 hover:bg-green-600 text-white' }}">
                                                {{ ($user->status ?? 'active') == 'active' ? 'Dondur' : 'Aktif Et' }}
                                            </button>
                                        </form>
                                        
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Kullanıcıyı tamamen silmek istediğinize emin misiniz?')" class="bg-red-600 text-white px-5 py-2 rounded-lg text-xs font-black uppercase tracking-wider shadow-md hover:bg-red-700 transition-all">
                                                Sil
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>