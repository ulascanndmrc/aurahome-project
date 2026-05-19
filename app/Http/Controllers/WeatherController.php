<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $inputCity = $request->input('city', 'Kocaeli');

        try {
            // 1. Önce kullanıcının yazdığı şehrin koordinatlarını buluyoruz (Geocoding)
            $geoResponse = Http::withoutVerifying()->timeout(5)->get("https://geocoding-api.open-meteo.com/v1/search", [
                'name' => $inputCity,
                'count' => 1,
                'language' => 'tr',
                'format' => 'json'
            ]);

            // Eğer şehir bulunduysa işlemlere devam et
            if ($geoResponse->successful() && isset($geoResponse->json()['results'][0])) {
                $location = $geoResponse->json()['results'][0];
                $lat = $location['latitude'];
                $lon = $location['longitude'];
                $displayCity = $location['name']; // Bulunan şehrin resmi adını al (Örn: aydın -> Aydın)

                // 2. Şimdi bu koordinatlarla Hava Durumunu ve Harita verilerini çekelim
                $weatherResponse = Http::withoutVerifying()->timeout(5)->get("https://api.open-meteo.com/v1/forecast", [
                    'latitude' => $lat,
                    'longitude' => $lon,
                    'current' => 'temperature_2m,surface_pressure,relative_humidity_2m,is_day',
                    'daily' => 'sunrise,sunset',
                    'timezone' => 'auto'
                ]);

                if ($weatherResponse->successful()) {
                    $data = $weatherResponse->json();
                    
                    $weatherData = [
                        'city' => $displayCity,
                        'temp' => $data['current']['temperature_2m'],
                        'pressure' => $data['current']['surface_pressure'],
                        'humidity' => $data['current']['relative_humidity_2m'],
                        'desc' => $data['current']['is_day'] ? 'Gündüz / Açık' : 'Gece / Karanlık',
                        'sunrise' => substr($data['daily']['sunrise'][0], -5), 
                        'sunset' => substr($data['daily']['sunset'][0], -5),
                        'lat' => $lat,
                        'lon' => $lon,
                    ];
                    return view('weather.index', ['weather' => $weatherData]);
                }
            } else {
                 return view('weather.index', ['error' => 'Girdiğiniz şehir bulunamadı. Lütfen geçerli bir şehir adı girin.']);
            }

        } catch (\Exception $e) {
            // Hata olursa alttaki return çalışacak
        }

        return view('weather.index', ['error' => 'API sistemine şu an ulaşılamıyor, lütfen daha sonra tekrar deneyin.']);
    }
}