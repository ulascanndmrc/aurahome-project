@php
    $total = 0;
    $cart = session('cart', []);
    foreach($cart as $details) {
        $total += $details['price'] * $details['quantity'];
    }
@endphp

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>AuraHome - Ödeme</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600&family=Manrope:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary": "#000000",
                        "surface": "#fbf9f8",
                        "surface-container-high": "#e9e8e7",
                        "surface-container-lowest": "#ffffff"
                    },
                    "fontFamily": {
                        "headline-lg": ["EB Garamond"],
                        "body-md": ["Manrope"],
                        "button": ["Manrope"]
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-surface text-on-surface font-body-md antialiased">

<header class="w-full border-b border-surface-container-high bg-white/90 sticky top-0 z-50 backdrop-blur-md">
    <div class="flex justify-center items-center h-20 max-w-[1280px] mx-auto px-6">
        <a href="{{ url('/') }}" class="font-headline-lg text-2xl tracking-widest text-primary uppercase">AuraHome</a>
    </div>
</header>

<main class="max-w-[1280px] mx-auto px-6 py-12 md:py-20 min-h-screen">
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <div class="lg:col-span-7">
                <section class="mb-16">
                    <h2 class="font-headline-lg text-3xl mb-8 pb-4 border-b border-gray-200 text-gray-900">1. Teslimat Adresi</h2>
                    <div class="grid grid-cols-1 gap-y-8">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase mb-2">Açık Adres</label>
                            <textarea name="address" required rows="3" class="w-full bg-transparent border-0 border-b border-gray-300 py-3 px-0 text-gray-900 focus:ring-0 focus:border-black transition-colors resize-none" placeholder="Mahalle, Sokak, No, Daire">{{ auth()->user()->address }}</textarea>
                        </div>
                    </div>
                </section>

                <section>
                    <h2 class="font-headline-lg text-3xl mb-8 pb-4 border-b border-gray-200 text-gray-900">2. Ödeme Yöntemi</h2>
                    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                        <div class="flex justify-between items-center mb-8 border-b pb-4">
                            <span class="text-xs font-bold uppercase tracking-widest">Kredi / Banka Kartı</span>
                            <div class="text-right">
                                <span class="block text-[10px] text-gray-400 uppercase font-bold">Mevcut Bakiye</span>
                                <span class="font-bold text-indigo-600">{{ number_format(auth()->user()->balance, 2) }} TL</span>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="md:col-span-2">
                                <label class="block text-[10px] font-bold text-gray-400 uppercase mb-2">Kart Üzerindeki İsim</label>
                                <input type="text" class="w-full bg-transparent border-0 border-b border-gray-200 py-2 focus:ring-0 focus:border-black uppercase">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-[10px] font-bold text-gray-400 uppercase mb-2">Kart Numarası</label>
                                <input type="text" placeholder="XXXX XXXX XXXX XXXX" class="w-full bg-transparent border-0 border-b border-gray-200 py-2 focus:ring-0 focus:border-black">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase mb-2">Son Kullanma</label>
                                <input type="text" placeholder="AA / YY" class="w-full bg-transparent border-0 border-b border-gray-200 py-2 focus:ring-0 focus:border-black">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase mb-2">CVV</label>
                                <input type="password" placeholder="***" class="w-full bg-transparent border-0 border-b border-gray-200 py-2 focus:ring-0 focus:border-black">
                            </div>
                        </div>
                        <p class="text-[10px] text-gray-400 italic mt-6">* Ödemede önce hesabınızdaki bakiyeniz kullanılacaktır.</p>
                    </div>
                </section>
            </div>

            <div class="lg:col-span-5">
                <div class="sticky top-28 bg-white p-8 rounded-xl shadow-lg border border-gray-50">
                    <h3 class="font-headline-lg text-2xl mb-8 border-b pb-4">Sipariş Özeti</h3>
                    
                    <div class="space-y-6 mb-8 max-h-[400px] overflow-y-auto">
                        @foreach($cart as $id => $details)
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-20 bg-gray-100 rounded overflow-hidden flex-shrink-0">
                                <img src="{{ $details['image'] ? asset('storage/' . $details['image']) : 'https://via.placeholder.com/100' }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-grow">
                                <h4 class="font-bold text-sm">{{ $details['name'] }}</h4>
                                <div class="flex justify-between items-center mt-1">
                                    <span class="text-[10px] text-gray-400 uppercase">Adet: {{ $details['quantity'] }}</span>
                                    <span class="font-bold text-sm">{{ number_format($details['price'], 2) }} TL</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="border-t pt-6 space-y-4">
                        <div class="flex justify-between text-sm text-gray-500">
                            <span>Ara Toplam</span>
                            <span>{{ number_format($total, 2) }} TL</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-500">
                            <span>Kargo</span>
                            <span class="text-green-600 font-bold uppercase text-[10px]">Ücretsiz</span>
                        </div>
                        <div class="flex justify-between items-center pt-4 border-t">
                            <span class="font-bold uppercase text-xs tracking-widest">Toplam</span>
                            <span class="text-2xl font-black text-black">{{ number_format($total, 2) }} TL</span>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-black text-white font-bold uppercase tracking-widest py-4 mt-8 rounded-lg hover:bg-gray-800 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-sm">lock</span>
                        Siparişi Tamamla
                    </button>
                </div>
            </div>
        </div>
    </form>
</main>

<footer class="w-full bg-white border-t py-8 mt-12 text-center">
    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">© 2026 AuraHome. Tüm Hakları Saklıdır.</p>
</footer>

</body>
</html>