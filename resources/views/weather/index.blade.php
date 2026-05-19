<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight uppercase">
            WEB API Entegrasyonu: Hava Durumu & Konum
        </h2>
    </x-slot>

    <script src="https://cdn.tailwindcss.com"></script>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @if(isset($error))
                <div class="bg-red-100 text-red-700 p-4 rounded-xl font-bold">{{ $error }}</div>
            @endif

            <form action="{{ route('weather.index') }}" method="GET" class="flex gap-4 bg-white p-4 rounded-xl shadow-sm border border-gray-200">
                <input type="text" name="city" placeholder="Şehir İsmi Girin (Örn: İzmit, İstanbul, Fethiye)" class="flex-1 rounded-lg border-gray-300 font-medium text-gray-700 focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="bg-blue-600 text-white px-8 py-2 rounded-lg font-bold uppercase hover:bg-blue-700 transition-all shadow-md">Sorgula</button>
            </form>

            @if(isset($weather))
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-1 bg-white p-6 rounded-2xl shadow-lg border border-gray-100 flex flex-col justify-between">
                    <div>
                        <h3 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-1">Anlık JSON Verisi</h3>
                        <div class="text-3xl font-black text-gray-800 mb-1 uppercase">{{ $weather['city'] }}</div>
                        <div class="text-gray-500 font-medium italic mb-6 text-sm">{{ $weather['desc'] }}</div>
                        
                        <div class="text-6xl font-black text-blue-500 mb-8">{{ round($weather['temp']) }}°C</div>
                    </div>

                    <div class="space-y-3">
                        <div class="flex justify-between border-b border-gray-100 pb-2">
                            <span class="text-xs font-bold text-gray-500 uppercase">Basınç</span>
                            <span class="font-bold text-gray-800">{{ $weather['pressure'] }} hPa</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-100 pb-2">
                            <span class="text-xs font-bold text-gray-500 uppercase">Nemlilik</span>
                            <span class="font-bold text-gray-800">%{{ $weather['humidity'] }}</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-100 pb-2">
                            <span class="text-xs font-bold text-gray-500 uppercase">Gün Doğumu</span>
                            <span class="font-bold text-orange-500">{{ $weather['sunrise'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-xs font-bold text-gray-500 uppercase">Gün Batımı</span>
                            <span class="font-bold text-indigo-500">{{ $weather['sunset'] }}</span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 relative" style="height: 450px; z-index: 1;">
                    <div id="map" style="width: 100%; height: 100%;"></div>
                </div>
            </div>

            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Harita başlatılıyor
                    var map = L.map('map').setView([{{ $weather['lat'] }}, {{ $weather['lon'] }}], 13);
                    
                    // Harita katmanı (Görseller) ekleniyor
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; AuraHome API'
                    }).addTo(map);
                    
                    // İşaretçi (Pin) ekleniyor
                    L.marker([{{ $weather['lat'] }}, {{ $weather['lon'] }}]).addTo(map)
                        .bindPopup('<b class="uppercase">{{ $weather['city'] }}</b><br>Koordinat Noktası')
                        .openPopup();
                });
            </script>
            @endif

        </div>
    </div>
</x-app-layout>