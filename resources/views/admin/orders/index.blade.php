<div class="p-6 bg-white rounded-xl shadow-sm">
    <h2 class="text-2xl font-bold mb-6 italic">Sipariş Yönetimi</h2>
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b bg-gray-50">
                <th class="p-4 text-xs font-bold text-gray-500 uppercase">Müşteri</th>
                <th class="p-4 text-xs font-bold text-gray-500 uppercase">Tutar</th>
                <th class="p-4 text-xs font-bold text-gray-500 uppercase">Mevcut Durum</th>
                <th class="p-4 text-xs font-bold text-gray-500 uppercase">İşlem</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="p-4 font-medium">{{ $order->user->name }}</td>
                <td class="p-4 font-bold text-indigo-600">{{ number_format($order->total_price, 2) }} TL</td>
                <td class="p-4">
                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase bg-indigo-100 text-indigo-700">
                        {{ $order->status }}
                    </span>
                </td>
                <td class="p-4">
                    <form action="{{ route('admin.orders.next', $order->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-black text-white px-4 py-2 rounded text-xs font-bold hover:bg-indigo-600 transition uppercase tracking-widest">
                            Süreci İlerlet →
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
