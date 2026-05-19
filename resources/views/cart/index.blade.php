<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sepetim | AuraHome</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 font-[Manrope]">
    <div class="max-w-7xl mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-8 text-gray-900 text-center uppercase tracking-widest">Alışveriş Sepeti</h1>

        @if(session('cart'))
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <div class="lg:col-span-2 space-y-4">
                    @foreach(session('cart') as $id => $details)
                        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                            <div class="flex items-center space-x-6">
                                <img src="{{ $details['image'] ? asset('storage/' . $details['image']) : 'https://via.placeholder.com/100' }}" class="w-20 h-24 object-cover rounded-lg">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-800">{{ $details['name'] }}</h3>
                                    <p class="text-indigo-600 font-semibold">{{ number_format($details['price'], 2) }} TL</p>
                                    <p class="text-sm text-gray-500">Adet: {{ $details['quantity'] }}</p>
                                </div>
                            </div>
                            
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit" class="text-red-500 hover:bg-red-50 p-2 rounded-lg transition">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg border border-indigo-50 h-fit sticky top-32">
                    <h2 class="text-xl font-bold mb-6 text-gray-800 border-b pb-4">Sipariş Özeti</h2>
                    @php $total = 0 @endphp
                    @foreach((array) session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                    @endforeach
                    
                    <div class="flex justify-between text-lg font-semibold mb-8">
                        <span>Toplam Tutar:</span>
                        <span class="text-indigo-600 text-2xl font-black">{{ number_format($total, 2) }} TL</span>
                    </div>

                    <a href="{{ route('checkout') }}" class="block w-full bg-indigo-900 text-white text-center py-4 rounded-xl font-bold hover:bg-black transition-colors shadow-lg">
                        ÖDEME ADIMINA GEÇ
                    </a>
                    <a href="/" class="block text-center mt-4 text-sm text-gray-500 hover:text-indigo-600 underline">Alışverişe Devam Et</a>
                </div>
            </div>
        @else
            <div class="text-center py-20">
                <p class="text-gray-400 text-xl italic mb-6 text-center">Sepetin şu an boş görünüyor.</p>
                <a href="/" class="inline-block bg-indigo-600 text-white px-8 py-3 rounded-full font-bold hover:bg-indigo-700 transition">Ürünlere Göz At</a>
            </div>
        @endif
    </div>
</body>
</html>