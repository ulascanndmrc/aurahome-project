@php
    // Proje İsteri 3.1: Web API Entegrasyonu (wttr.in ücretsiz API kullanımı) 
    $weatherResponse = Illuminate\Support\Facades\Http::get('https://wttr.in/Izmit?format=j1');
    $weather = null;
    if ($weatherResponse->successful()) {
        $data = $weatherResponse->json();
        $weather = [
            'temp' => $data['current_condition'][0]['temp_C'],
            'desc' => $data['current_condition'][0]['lang_tr'][0]['value'] ?? $data['current_condition'][0]['weatherDesc'][0]['value'],
        ];
    }
@endphp

<!DOCTYPE html>
<html class="light" lang="tr">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>AuraHome - Modern & Premium Home Decor</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600&family=EB+Garamond:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              colors: {
                  "surface": "#fbf9f8",
                  "primary": "#000000",
                  "on-primary": "#ffffff",
              }
            }
          }
        }
    </script>
    <style>
        html { scroll-behavior: smooth; }
    </style>
</head>

<body class="bg-surface text-on-surface font-body-md antialiased overflow-x-hidden">

@if($weather)
<div class="bg-black text-white py-2 px-4 text-center text-[10px] font-bold uppercase tracking-[0.2em] relative z-[70]">
    📍 İzmit, Kocaeli: {{ $weather['temp'] }}°C — {{ $weather['desc'] }} 
    <span class="ml-4 opacity-50 italic">(Canlı Web API Bağlantısı Aktif)</span>
</div>
@endif

<header class="bg-surface/80 backdrop-blur-md fixed {{ $weather ? 'top-[31px]' : 'top-0' }} w-full z-[60] shadow-sm border-b border-gray-100 transition-all">
    <div class="max-w-[1280px] mx-auto px-6 md:px-12 flex justify-between items-center h-20">
        <a class="font-headline-lg text-2xl text-primary tracking-tighter" href="/">AuraHome</a>
        
        <nav class="hidden md:flex space-x-8">
            {{-- Linkler /kategori/ olarak güncellendi --}}
            <a class="text-xs uppercase tracking-widest hover:text-gray-500 transition font-bold" href="{{ url('/kategori/mobilya') }}">Mobilya</a>
            <a class="text-xs uppercase tracking-widest hover:text-gray-500 transition font-bold" href="{{ url('/kategori/aydinlatma') }}">Aydınlatma</a>
            <a class="text-xs uppercase tracking-widest hover:text-gray-500 transition font-bold" href="{{ url('/kategori/dekorasyon') }}">Dekorasyon</a>
        </nav>

        <div class="flex items-center space-x-6 text-primary">
            <a href="{{ auth()->check() ? route('dashboard') : route('login') }}" class="hover:opacity-70 transition flex items-center" title="Profil">
                <span class="material-symbols-outlined">person</span>
            </a>
            <a href="{{ route('cart.index') }}" class="hover:opacity-70 transition relative flex items-center" title="Sepetim">
                <span class="material-symbols-outlined">shopping_cart</span>
                @if(session('cart') && count(session('cart')) > 0)
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold">
                        {{ count(session('cart')) }}
                    </span>
                @endif
            </a>
        </div>
    </div>
</header>

<main class="{{ $weather ? 'pt-[111px]' : 'pt-20' }}">
    <section class="relative h-[700px] w-full bg-gray-100 overflow-hidden">
        <img alt="Hero" class="absolute inset-0 w-full h-full object-cover opacity-90" src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=1920&q=80"/>
        <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-6 bg-black/20">
            <h1 class="text-5xl md:text-7xl font-headline-lg text-white mb-6 drop-shadow-2xl">Yaşam Alanınızı Sanata Dönüştürün</h1>
            <p class="text-white text-lg md:text-xl mb-10 max-w-2xl drop-shadow-lg font-light italic">Sade, zarif ve zamansız tasarımlarla evinizde huzur dolu bir atmosfer yaratın.</p>
            <a class="px-10 py-4 bg-white text-black font-bold uppercase tracking-[0.2em] hover:bg-black hover:text-white transition-all duration-300 shadow-xl" href="#koleksiyon">Koleksiyonu Keşfet</a>
        </div>
    </section>

    <section id="koleksiyon" class="py-24 px-6 md:px-12 max-w-[1400px] mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4 tracking-tight">Öne Çıkan Ürünler</h2>
            <div class="h-1 w-16 bg-black mx-auto"></div>
        </div>

        @if(isset($products) && $products->isNotEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
                @foreach($products as $product)
                <div class="group bg-white border border-gray-50 rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-500 flex flex-col">
                    <div class="aspect-[4/5] bg-gray-50 relative overflow-hidden">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/400x500' }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700"/>
                        <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <a href="{{ route('cart.add', $product->id) }}" class="bg-white text-black px-6 py-3 text-xs font-bold uppercase tracking-widest translate-y-8 group-hover:translate-y-0 transition-all duration-500 hover:bg-black hover:text-white">
                                Sepete Ekle
                            </a>
                        </div>
                    </div>
                    <div class="p-8 text-center">
                        <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-2">{{ $product->category->name ?? 'Koleksiyon' }}</p>
                        <h3 class="font-bold text-xl mb-3 group-hover:text-gray-600 transition">{{ $product->name }}</h3>
                        <p class="text-black font-black text-lg">₺{{ number_format($product->price, 2, ',', '.') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-32 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-100">
                <span class="material-symbols-outlined text-6xl text-gray-200 mb-4">inventory_2</span>
                <p class="text-gray-400 italic">Henüz ürün eklenmemiş. Admin panelinden ürün ekleyerek başlayabilirsiniz.</p>
            </div>
        @endif
    </section>
</main>

<footer class="bg-white border-t border-gray-100 py-16 text-center">
    <div class="mb-8">
        <a class="font-headline-lg text-2xl text-primary tracking-tighter" href="/">AuraHome</a>
    </div>
    <p class="text-[11px] text-gray-400 font-bold uppercase tracking-[0.3em]">© 2026 AuraHome — Kocaeli Üniversitesi Projesi</p>
</footer>

</body>
</html>