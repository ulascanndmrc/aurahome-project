<!DOCTYPE html>

<html class="light" lang="tr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>AuraHome - {{ $product->name }}</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600&amp;family=Manrope:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "surface": "#fbf9f8",
                    "surface-container-low": "#f5f3f3",
                    "secondary-fixed-dim": "#d6c5a5",
                    "on-secondary-fixed": "#231a06",
                    "on-primary-fixed": "#1c1b1b",
                    "error": "#ba1a1a",
                    "on-surface": "#1b1c1c",
                    "error-container": "#ffdad6",
                    "inverse-on-surface": "#f2f0f0",
                    "surface-dim": "#dbdad9",
                    "surface-container": "#efeded",
                    "on-surface-variant": "#444748",
                    "on-tertiary-fixed": "#1c1b1a",
                    "surface-tint": "#5f5e5e",
                    "primary": "#000000",
                    "on-primary-fixed-variant": "#474746",
                    "on-error": "#ffffff",
                    "on-tertiary": "#ffffff",
                    "on-primary-container": "#858383",
                    "surface-container-high": "#e9e8e7",
                    "on-secondary": "#ffffff",
                    "primary-container": "#1c1b1b",
                    "tertiary": "#000000",
                    "primary-fixed": "#e5e2e1",
                    "surface-container-lowest": "#ffffff",
                    "tertiary-container": "#1c1b1a",
                    "on-secondary-fixed-variant": "#51452d",
                    "on-background": "#1b1c1c",
                    "surface-variant": "#e4e2e2",
                    "background": "#fbf9f8",
                    "secondary": "#6a5d43",
                    "secondary-fixed": "#f3e0bf",
                    "surface-bright": "#fbf9f8",
                    "tertiary-fixed": "#e5e2df",
                    "secondary-container": "#f0debc",
                    "inverse-surface": "#303030",
                    "on-tertiary-fixed-variant": "#484745",
                    "tertiary-fixed-dim": "#c9c6c3",
                    "outline-variant": "#c4c7c7",
                    "surface-container-highest": "#e4e2e2",
                    "primary-fixed-dim": "#c8c6c5",
                    "on-secondary-container": "#6e6147",
                    "on-tertiary-container": "#868381",
                    "on-primary": "#ffffff",
                    "on-error-container": "#93000a",
                    "outline": "#747878",
                    "inverse-primary": "#c8c6c5"
            },
            "borderRadius": {
                    "DEFAULT": "0.125rem",
                    "lg": "0.25rem",
                    "xl": "0.5rem",
                    "full": "0.75rem"
            },
            "spacing": {
                    "section-gap": "120px",
                    "margin-desktop": "48px",
                    "margin-mobile": "20px",
                    "unit": "8px",
                    "container-max": "1280px",
                    "gutter": "24px"
            },
            "maxWidth": {
                    "container-max": "1280px"
            },
            "fontFamily": {
                    "body-lg": ["Manrope"],
                    "headline-lg": ["EB Garamond"],
                    "headline-lg-mobile": ["EB Garamond"],
                    "display-xl-mobile": ["EB Garamond"],
                    "body-md": ["Manrope"],
                    "button": ["Manrope"],
                    "display-xl": ["EB Garamond"],
                    "label-md": ["Manrope"]
            },
            "fontSize": {
                    "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }],
                    "headline-lg": ["32px", { "lineHeight": "40px", "fontWeight": "500" }],
                    "headline-lg-mobile": ["24px", { "lineHeight": "32px", "fontWeight": "500" }],
                    "display-xl-mobile": ["40px", { "lineHeight": "48px", "letterSpacing": "-0.01em", "fontWeight": "500" }],
                    "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                    "button": ["14px", { "lineHeight": "16px", "letterSpacing": "0.08em", "fontWeight": "600" }],
                    "display-xl": ["64px", { "lineHeight": "72px", "letterSpacing": "-0.02em", "fontWeight": "500" }],
                    "label-md": ["14px", { "lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "600" }]
            }
          }
        }
      }
    </script>
</head>
<body class="bg-surface text-on-surface font-body-md antialiased pt-20">
@php
    $mainImage = $product->image ? asset('storage/' . $product->image) : null;
@endphp
<!-- TopNavBar -->
<nav class="bg-surface/80 dark:bg-surface-dim/80 backdrop-blur-md text-primary dark:text-on-primary-fixed fixed top-0 w-full z-50 shadow-[0_40px_40px_-10px_rgba(27,28,28,0.05)]">
<div class="max-w-[1280px] mx-auto px-margin-desktop flex justify-between items-center h-20">
<!-- Brand Logo -->
<a class="font-headline-lg text-headline-lg text-primary dark:text-on-primary-fixed tracking-tighter" href="{{ url('/') }}">
                AuraHome
            </a>
<!-- Desktop Navigation -->
<ul class="hidden md:flex space-x-8">
@foreach ($navItems as $item)
<li>
@if ($item['href'] === '#')
<a class="text-on-surface-variant dark:text-outline font-body-md text-body-md uppercase tracking-widest hover:text-primary dark:hover:text-on-primary-fixed transition-colors duration-300 scale-100 active:scale-95 transition-transform" href="#">
                        {{ $item['label'] }}
                    </a>
@else
<a class="{{ $item['active'] ? 'text-primary dark:text-on-primary-fixed border-b border-primary dark:border-on-primary-fixed pb-1 font-body-md text-body-md uppercase tracking-widest scale-100 active:scale-95 transition-transform' : 'text-on-surface-variant dark:text-outline font-body-md text-body-md uppercase tracking-widest hover:text-primary dark:hover:text-on-primary-fixed transition-colors duration-300 scale-100 active:scale-95 transition-transform' }}" href="{{ $item['href'] }}">
                        {{ $item['label'] }}
                    </a>
@endif
</li>
@endforeach
</ul>
<!-- Trailing Icon Actions -->
<div class="flex items-center space-x-4">
<button type="button" class="text-on-surface-variant hover:text-primary transition-colors duration-300 scale-100 active:scale-95 transition-transform" aria-label="Ara">
<span class="material-symbols-outlined">search</span>
</button>
<button type="button" class="text-on-surface-variant hover:text-primary transition-colors duration-300 scale-100 active:scale-95 transition-transform" aria-label="Hesap" onclick="window.location.href='{{ auth()->check() ? route('dashboard') : route('login') }}'">
<span class="material-symbols-outlined">person</span>
</button>
<button type="button" class="text-on-surface-variant hover:text-primary transition-colors duration-300 scale-100 active:scale-95 transition-transform" aria-label="Sepet" onclick="window.location.href='{{ route('checkout') }}'">
<span class="material-symbols-outlined">shopping_cart</span>
</button>
</div>
</div>
</nav>
<!-- Main Content -->
<main class="max-w-[1280px] mx-auto px-margin-mobile md:px-margin-desktop py-12 md:py-24">
<!-- Product Detail Section -->
<section class="grid grid-cols-1 md:grid-cols-12 gap-gutter items-start">
<!-- Product Images (Left) -->
<div class="md:col-span-7 flex flex-col gap-unit">
<div class="w-full bg-surface-container-lowest rounded overflow-hidden shadow-[0_40px_40px_-10px_rgba(27,28,28,0.05)]">
@if ($mainImage)
<img alt="{{ $product->name }}" class="w-full h-auto object-cover aspect-[4/5]" src="{{ $mainImage }}" data-alt="{{ e(\Illuminate\Support\Str::limit(strip_tags($product->description), 240)) }}"/>
@else
<div class="w-full aspect-[4/5] flex items-center justify-center bg-surface-container-low text-on-surface-variant">
<span class="material-symbols-outlined text-6xl opacity-40">image_not_supported</span>
</div>
@endif
</div>
@if ($mainImage)
<div class="grid grid-cols-3 gap-unit">
@foreach ([1, 2, 3] as $i)
<div class="w-full bg-surface-container-lowest rounded overflow-hidden shadow-sm cursor-pointer border border-transparent {{ $loop->first ? 'opacity-100' : 'opacity-60 hover:opacity-100 transition-opacity hover:border-outline-variant' }}">
<img alt="{{ $product->name }}" class="w-full h-32 object-cover" src="{{ $mainImage }}"/>
</div>
@endforeach
</div>
@endif
</div>
<!-- Product Info (Right) -->
<div class="md:col-span-5 flex flex-col md:pl-8 pt-8 md:pt-0 sticky top-32">
<!-- Tags -->
<div class="flex items-center gap-2 mb-6 flex-wrap">
@if ($product->created_at && $product->created_at->gt(now()->subDays(45)))
<span class="bg-surface-container-high text-on-surface-variant font-label-md text-label-md px-3 py-1 rounded">YENİ SEZON</span>
@endif
<span class="flex items-center text-secondary font-label-md text-label-md">
<span class="material-symbols-outlined text-[18px] mr-1">{{ $product->stock > 0 ? 'check_circle' : 'cancel' }}</span>
                        {{ $product->stock > 0 ? 'Stokta Var' : 'Stokta Yok' }}
                    </span>
</div>
<!-- Title & Price -->
<h1 class="font-headline-lg text-headline-lg md:font-display-xl md:text-display-xl text-primary mb-4 leading-tight">{{ $product->name }}</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant mb-8 font-medium">₺{{ number_format($product->price, 2, ',', '.') }}</p>
<!-- Description -->
<p class="font-body-md text-body-md text-on-surface mb-10 leading-relaxed whitespace-pre-line">{{ $product->description }}</p>
<!-- Actions -->
<div class="flex flex-col gap-4 mb-12">
<button type="button" class="bg-primary text-on-primary font-button text-button h-14 rounded flex items-center justify-center gap-2 hover:bg-primary-container hover:text-on-primary-container transition-colors shadow-[0_4px_14px_0_rgba(0,0,0,0.1)]">
                        SEPETE EKLE
                    </button>
<button type="button" class="bg-transparent text-primary border border-primary font-button text-button h-14 rounded flex items-center justify-center gap-2 hover:bg-surface-container transition-colors">
<span class="material-symbols-outlined text-[20px]">favorite_border</span>
                        FAVORİLERE EKLE
                    </button>
</div>
<!-- Product Details -->
<div class="border-t border-outline-variant pt-6">
<div class="flex justify-between items-center cursor-pointer mb-4">
<h3 class="font-body-lg text-body-lg text-primary">Ürün Özellikleri</h3>
<span class="material-symbols-outlined">expand_more</span>
</div>
<ul class="text-on-surface-variant font-body-md text-body-md space-y-2 pb-6">
<li><strong>Kategori:</strong> {{ $product->category?->name ?? '—' }}</li>
<li><strong>Stok:</strong> {{ $product->stock }} adet</li>
<li><strong>SKU:</strong> #{{ $product->id }}</li>
</ul>
</div>
</div>
</section>
<!-- Related Products Section -->
@if ($relatedProducts->isNotEmpty())
<section class="mt-section-gap">
<h2 class="font-headline-lg text-headline-lg text-primary text-center mb-12">Benzer Ürünler</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter">
@foreach ($relatedProducts as $rel)
<a href="{{ route('products.show', $rel) }}" class="flex flex-col group cursor-pointer">
<div class="w-full bg-surface-container-lowest rounded overflow-hidden shadow-sm mb-4 transition-transform duration-300 group-hover:-translate-y-1 group-hover:shadow-[0_20px_40px_-10px_rgba(27,28,28,0.08)]">
@if ($rel->image)
<img alt="{{ $rel->name }}" class="w-full h-80 object-cover" src="{{ asset('storage/' . $rel->image) }}"/>
@else
<div class="w-full h-80 flex items-center justify-center bg-surface-container-low text-on-surface-variant">
<span class="material-symbols-outlined text-4xl opacity-40">image_not_supported</span>
</div>
@endif
</div>
<h3 class="font-headline-lg-mobile text-headline-lg-mobile text-primary text-center">{{ $rel->name }}</h3>
<p class="font-body-md text-body-md text-on-surface-variant text-center mt-1">₺{{ number_format($rel->price, 2, ',', '.') }}</p>
</a>
@endforeach
</div>
</section>
@endif
</main>
<!-- Footer -->
<footer class="bg-surface-container-high dark:bg-surface-container-highest text-primary dark:text-on-primary-fixed w-full mt-section-gap flat no shadows">
<div class="max-w-[1280px] mx-auto px-margin-desktop py-16 grid grid-cols-1 md:grid-cols-4 gap-gutter">
<!-- Brand -->
<div class="flex flex-col gap-4">
<span class="font-headline-lg text-headline-lg text-primary dark:text-on-primary-fixed">AuraHome</span>
<p class="text-on-surface-variant dark:text-outline font-body-md text-body-md opacity-100 hover:opacity-80 transition-opacity">
                    © 2026 AuraHome. Tüm hakları saklıdır.
                </p>
</div>
<!-- Links -->
<div class="flex flex-col gap-4">
<a class="text-on-surface-variant dark:text-outline font-body-md text-body-md hover:text-primary underline underline-offset-4 transition-all opacity-100 hover:opacity-80" href="#">
                    Hakkımızda
                </a>
</div>
<div class="flex flex-col gap-4">
<a class="text-on-surface-variant dark:text-outline font-body-md text-body-md hover:text-primary underline underline-offset-4 transition-all opacity-100 hover:opacity-80" href="#">
                    Sürdürülebilirlik
                </a>
</div>
<div class="flex flex-col gap-4">
<a class="text-on-surface-variant dark:text-outline font-body-md text-body-md hover:text-primary underline underline-offset-4 transition-all opacity-100 hover:opacity-80" href="#">
                    Teslimat &amp; İade
                </a>
<a class="text-on-surface-variant dark:text-outline font-body-md text-body-md hover:text-primary underline underline-offset-4 transition-all opacity-100 hover:opacity-80" href="#">
                    İletişim
                </a>
</div>
</div>
</footer>
</body></html>
