<!DOCTYPE html>
<html class="light" lang="tr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>AuraHome - {{ $category->name }}</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600&amp;family=Manrope:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "tertiary": "#000000",
                      "surface-dim": "#dbdad9",
                      "outline": "#747878",
                      "surface-container-low": "#f5f3f3",
                      "tertiary-container": "#1c1b1a",
                      "on-tertiary-fixed-variant": "#484745",
                      "on-primary-container": "#858383",
                      "surface-variant": "#e4e2e2",
                      "surface-container-high": "#e9e8e7",
                      "primary": "#000000",
                      "on-secondary-fixed-variant": "#51452d",
                      "secondary": "#6a5d43",
                      "tertiary-fixed-dim": "#c9c6c3",
                      "on-secondary": "#ffffff",
                      "on-surface": "#1b1c1c",
                      "on-primary-fixed": "#1c1b1b",
                      "on-secondary-fixed": "#231a06",
                      "error-container": "#ffdad6",
                      "surface-container-highest": "#e4e2e2",
                      "on-primary-fixed-variant": "#474746",
                      "on-primary": "#ffffff",
                      "on-error": "#ffffff",
                      "on-background": "#1b1c1c",
                      "primary-container": "#1c1b1b",
                      "background": "#fbf9f8",
                      "tertiary-fixed": "#e5e2df",
                      "on-tertiary": "#ffffff",
                      "primary-fixed-dim": "#c8c6c5",
                      "surface": "#fbf9f8",
                      "on-tertiary-container": "#868381",
                      "error": "#ba1a1a",
                      "secondary-container": "#f0debc",
                      "outline-variant": "#c4c7c7",
                      "surface-container-lowest": "#ffffff",
                      "surface-tint": "#5f5e5e",
                      "inverse-primary": "#c8c6c5",
                      "surface-bright": "#fbf9f8",
                      "on-tertiary-fixed": "#1c1b1a",
                      "inverse-surface": "#303030",
                      "inverse-on-surface": "#f2f0f0",
                      "on-surface-variant": "#444748",
                      "on-error-container": "#93000a",
                      "surface-container": "#efeded",
                      "on-secondary-container": "#6e6147",
                      "secondary-fixed": "#f3e0bf",
                      "primary-fixed": "#e5e2e1",
                      "secondary-fixed-dim": "#d6c5a5"
              },
              "borderRadius": {
                      "DEFAULT": "0.125rem",
                      "lg": "0.25rem",
                      "xl": "0.5rem",
                      "full": "0.75rem"
              },
              "spacing": {
                      "margin-mobile": "20px",
                      "section-gap": "120px",
                      "margin-desktop": "48px",
                      "gutter": "24px",
                      "unit": "8px",
                      "container-max": "1280px"
              },
              "maxWidth": {
                      "container-max": "1280px"
              },
              "fontFamily": {
                      "label-md": ["Manrope"],
                      "body-lg": ["Manrope"],
                      "display-xl-mobile": ["EB Garamond"],
                      "display-xl": ["EB Garamond"],
                      "headline-lg-mobile": ["EB Garamond"],
                      "button": ["Manrope"],
                      "body-md": ["Manrope"],
                      "headline-lg": ["EB Garamond"]
              },
              "fontSize": {
                      "label-md": ["14px", {"lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                      "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                      "display-xl-mobile": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.01em", "fontWeight": "500"}],
                      "display-xl": ["64px", {"lineHeight": "72px", "letterSpacing": "-0.02em", "fontWeight": "500"}],
                      "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "500"}],
                      "button": ["14px", {"lineHeight": "16px", "letterSpacing": "0.08em", "fontWeight": "600"}],
                      "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                      "headline-lg": ["32px", {"lineHeight": "40px", "fontWeight": "500"}]
              }
            }
          }
        }
      </script>
</head>
<body class="bg-background text-on-background font-body-md antialiased selection:bg-primary-container selection:text-on-primary">
<header class="fixed top-0 left-0 w-full z-50 bg-surface/80 dark:bg-surface-container/80 backdrop-blur-md shadow-sm dark:shadow-none">
<nav class="flex justify-between items-center w-full px-margin-desktop h-20 max-w-container-max mx-auto">
<a class="font-headline-lg text-headline-lg tracking-widest text-primary uppercase" href="{{ url('/') }}">
    AuraHome
</a>
<ul class="hidden md:flex items-center space-x-8">
@foreach (\App\Models\Category::all() as $navItem)
<li>
    <a class="text-on-surface-variant hover:text-primary transition-all duration-300 font-body-md text-body-md {{ Request::is('kategori/'.$navItem->slug) ? 'text-primary border-b border-primary pb-1' : '' }}" 
       href="{{ url('/kategori/' . $navItem->slug) }}">
       {{ $navItem->name }}
    </a>
</li>
@endforeach
</ul>
<div class="flex items-center space-x-6 text-primary">
<button type="button" aria-label="favorite" class="hover:opacity-70 transition-opacity">
<span class="material-symbols-outlined">favorite</span>
</button>
<button type="button" aria-label="shopping_bag" class="hover:opacity-70 transition-opacity" onclick="window.location.href='{{ url('/sepet') }}'">
<span class="material-symbols-outlined">shopping_bag</span>
</button>
<button type="button" aria-label="person" class="hover:opacity-70 transition-opacity hidden md:block" onclick="window.location.href='{{ auth()->check() ? route('dashboard') : route('login') }}'">
<span class="material-symbols-outlined">person</span>
</button>
</div>
</nav>
</header>
<main class="pt-32 pb-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
<header class="mb-16 text-center">
<h1 class="font-display-xl-mobile md:font-display-xl text-display-xl-mobile md:text-display-xl text-primary mb-4">
    {{ $category->name }}
</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">
    Zamanın ötesinde tasarımlar, kaliteli işçilik ve sessiz lüksün evinize yansıması. Özenle seçilmiş {{ $category->name }} koleksiyonumuzu keşfedin.
</p>
</header>
<div class="flex flex-col lg:flex-row gap-12 lg:gap-gutter items-start">
<aside class="w-full lg:w-64 shrink-0 space-y-10 lg:sticky lg:top-32">
<div>
<h3 class="font-label-md text-label-md text-primary uppercase border-b border-surface-variant pb-2 mb-4">Materyal</h3>
<ul class="space-y-3">
<li class="flex items-center"><input class="form-checkbox h-4 w-4 text-primary" type="checkbox" id="mat-masif"/><label class="ml-3 font-body-md text-on-surface-variant" for="mat-masif">Masif Ahşap</label></li>
<li class="flex items-center"><input class="form-checkbox h-4 w-4 text-primary" type="checkbox" id="mat-mermer"/><label class="ml-3 font-body-md text-on-surface-variant" for="mat-mermer">Doğal Mermer</label></li>
<li class="flex items-center"><input class="form-checkbox h-4 w-4 text-primary" type="checkbox" id="mat-keten"/><label class="ml-3 font-body-md text-on-surface-variant" for="mat-keten">Saf Keten</label></li>
</ul>
</div>
<div>
<h3 class="font-label-md text-label-md text-primary uppercase border-b border-surface-variant pb-2 mb-4">Renk</h3>
<ul class="space-y-3">
<li class="flex items-center"><input class="form-checkbox h-4 w-4 text-primary" type="checkbox" id="renk-bej"/><label class="ml-3 font-body-md text-on-surface-variant" for="renk-bej">Sıcak Bej</label></li>
<li class="flex items-center"><input class="form-checkbox h-4 w-4 text-primary" type="checkbox" id="renk-antrasit"/><label class="ml-3 font-body-md text-on-surface-variant" for="renk-antrasit">Derin Antrasit</label></li>
</ul>
</div>
<div>
<h3 class="font-label-md text-label-md text-primary uppercase border-b border-surface-variant pb-2 mb-4">Fiyat</h3>
<ul class="space-y-3">
<li class="flex items-center"><input class="form-radio h-4 w-4 text-primary" name="fiyat" type="radio" id="fiyat-1"/><label class="ml-3 font-body-md text-on-surface-variant" for="fiyat-1">0 - 5.000 TL</label></li>
<li class="flex items-center"><input class="form-radio h-4 w-4 text-primary" name="fiyat" type="radio" id="fiyat-2"/><label class="ml-3 font-body-md text-on-surface-variant" for="fiyat-2">5.000 TL+</label></li>
</ul>
</div>
</aside>
<section class="flex-1 w-full">
@if($products->isNotEmpty())
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-gutter gap-y-16">
@foreach ($products as $product)
<a href="{{ url('/urun/' . $product->id) }}" class="group cursor-pointer flex flex-col items-center">
<div class="w-full aspect-[4/5] bg-surface-container-low overflow-hidden rounded mb-6 relative">
@if ($product->image)
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"/>
@else
<div class="w-full h-full flex items-center justify-center bg-gray-100"><span class="material-symbols-outlined text-4xl opacity-40">image</span></div>
@endif
<button onclick="window.location.href='{{ url('/sepete-ekle/' . $product->id) }}'" class="absolute bottom-4 left-4 right-4 bg-black text-white py-3 opacity-0 group-hover:opacity-100 transition-opacity">Sepete Ekle</button>
</div>
<h2 class="font-headline-lg-mobile text-headline-lg-mobile text-primary text-center">{{ $product->name }}</h2>
<p class="font-body-md text-body-md text-on-surface-variant mt-2 text-center">₺{{ number_format($product->price, 2, ',', '.') }}</p>
</a>
@endforeach
</div>
@else
<p class="font-body-md text-body-md text-on-surface-variant text-center py-16 w-full">Bu kategoride henüz ürün bulunmuyor.</p>
@endif
</section>
</div>
</main>
<footer class="w-full bg-surface-container-low py-section-gap px-margin-desktop border-t">
<div class="max-w-container-max mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
<span class="font-headline-lg text-primary uppercase tracking-widest">AuraHome</span>
<p class="font-label-md text-on-surface-variant">© 2026 AuraHome. Tüm Hakları Saklıdır.</p>
</div>
</footer>
</body></html>