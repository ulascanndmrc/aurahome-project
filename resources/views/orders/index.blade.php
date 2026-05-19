<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight uppercase">Siparişlerim & İade İşlemleri</h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-800 p-4 rounded-lg shadow-sm mb-6 font-bold">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-800 p-4 rounded-lg shadow-sm mb-6 font-bold">{{ session('error') }}</div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl p-8 border border-gray-100">
                @if(isset($orders) && $orders->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 uppercase text-xs font-black tracking-wider">
                                    <th class="p-4 rounded-tl-lg">Sipariş No</th>
                                    <th class="p-4">Tutar</th>
                                    <th class="p-4">Durum</th>
                                    <th class="p-4">Tarih</th>
                                    <th class="p-4 rounded-tr-lg">İşlem</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($orders as $order)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="p-4 font-bold text-gray-800">#{{ $order->id }}</td>
                                    <td class="p-4 font-black text-blue-600 text-lg">{{ $order->total_price }} TL</td>
                                    <td class="p-4">
                                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase {{ $order->status == 'İptal Edildi' ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td class="p-4 text-sm text-gray-500 font-medium">{{ \Carbon\Carbon::parse($order->created_at)->format('d.m.Y H:i') }}</td>
                                    <td class="p-4">
                                        @if($order->status !== 'İptal Edildi')
                                            <form action="{{ route('orders.cancel', $order->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                <button type="submit" onclick="return confirm('Siparişi iptal etmek istediğinize emin misiniz? Tutar cüzdanınıza iade edilecektir.')" class="bg-red-500 text-white px-4 py-2 rounded-lg text-sm font-bold shadow hover:bg-red-600 transition-all">
                                                    Siparişi İptal Et
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-gray-400 text-sm italic font-bold">Cüzdana İade Edildi</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-12">
                        <p class="text-gray-500 text-lg font-medium">Henüz hiç siparişiniz bulunmuyor.</p>
                        <a href="/" class="mt-4 inline-block bg-black text-white px-6 py-2 rounded-lg font-bold hover:bg-gray-800 transition">Alışverişe Başla</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>