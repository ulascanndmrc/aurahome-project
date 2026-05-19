<!DOCTYPE html>

<html lang="tr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<title>AuraHome - Kayıt Ol</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600&amp;family=Manrope:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
  tailwind.config = {
    darkMode: "class",
    theme: {
      extend: {
        "colors": {
                "primary-fixed-dim": "#c8c6c5",
                "secondary": "#6a5d43",
                "on-tertiary-fixed": "#1c1b1a",
                "surface-container-lowest": "#ffffff",
                "on-error": "#ffffff",
                "on-secondary-fixed": "#231a06",
                "on-primary-fixed-variant": "#474746",
                "on-primary-container": "#858383",
                "surface": "#fbf9f8",
                "outline": "#747878",
                "secondary-fixed-dim": "#d6c5a5",
                "on-surface": "#1b1c1c",
                "outline-variant": "#c4c7c7",
                "on-secondary-container": "#6e6147",
                "surface-bright": "#fbf9f8",
                "primary": "#000000",
                "secondary-fixed": "#f3e0bf",
                "on-primary": "#ffffff",
                "error-container": "#ffdad6",
                "on-error-container": "#93000a",
                "tertiary-fixed-dim": "#c9c6c3",
                "on-tertiary-container": "#868381",
                "on-tertiary": "#ffffff",
                "error": "#ba1a1a",
                "inverse-on-surface": "#f2f0f0",
                "surface-container-low": "#f5f3f3",
                "surface-container": "#efeded",
                "on-secondary": "#ffffff",
                "tertiary-fixed": "#e5e2df",
                "surface-tint": "#5f5e5e",
                "on-surface-variant": "#444748",
                "primary-fixed": "#e5e2e1",
                "tertiary-container": "#1c1b1a",
                "on-secondary-fixed-variant": "#51452d",
                "surface-container-high": "#e9e8e7",
                "on-primary-fixed": "#1c1b1b",
                "primary-container": "#1c1b1b",
                "tertiary": "#000000",
                "on-tertiary-fixed-variant": "#484745",
                "on-background": "#1b1c1c",
                "surface-variant": "#e4e2e2",
                "inverse-primary": "#c8c6c5",
                "background": "#fbf9f8",
                "surface-dim": "#dbdad9",
                "surface-container-highest": "#e4e2e2",
                "secondary-container": "#f0debc",
                "inverse-surface": "#303030"
        },
        "borderRadius": {
                "DEFAULT": "0.125rem",
                "lg": "0.25rem",
                "xl": "0.5rem",
                "full": "0.75rem"
        },
        "spacing": {
                "margin-desktop": "48px",
                "gutter": "24px",
                "margin-mobile": "20px",
                "unit": "8px",
                "container-max": "1280px",
                "section-gap": "120px"
        },
        "maxWidth": {
                "container-max": "1280px"
        },
        "fontFamily": {
                "display-xl-mobile": ["EB Garamond"],
                "label-md": ["Manrope"],
                "body-md": ["Manrope"],
                "display-xl": ["EB Garamond"],
                "headline-lg-mobile": ["EB Garamond"],
                "headline-lg": ["EB Garamond"],
                "button": ["Manrope"],
                "body-lg": ["Manrope"]
        },
        "fontSize": {
                "display-xl-mobile": ["40px", { "lineHeight": "48px", "letterSpacing": "-0.01em", "fontWeight": "500" }],
                "label-md": ["14px", { "lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "600" }],
                "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                "display-xl": ["64px", { "lineHeight": "72px", "letterSpacing": "-0.02em", "fontWeight": "500" }],
                "headline-lg-mobile": ["24px", { "lineHeight": "32px", "fontWeight": "500" }],
                "headline-lg": ["32px", { "lineHeight": "40px", "fontWeight": "500" }],
                "button": ["14px", { "lineHeight": "16px", "letterSpacing": "0.08em", "fontWeight": "600" }],
                "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }]
        }
      }
    }
  }
</script>
<style>
  .material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
  }
  input:-webkit-autofill,
  input:-webkit-autofill:hover,
  input:-webkit-autofill:focus,
  input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 30px #ffffff inset !important;
    -webkit-text-fill-color: #1b1c1c !important;
    transition: background-color 5000s ease-in-out 0s;
  }
</style>
</head>
<body class="bg-surface text-on-surface antialiased min-h-screen relative flex items-center justify-center p-margin-mobile md:p-margin-desktop overflow-hidden">
<div class="absolute inset-0 z-0 bg-cover bg-center" data-alt="A softly lit, contemporary minimalist living room featuring warm neutral tones. A plush cream sofa sits against a textured beige wall, illuminated by natural light filtering through sheer curtains. The scene exudes quiet luxury, spaciousness, and high-end interior design elegance." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAkZDBAPSx_ypnstRVq4hXu0VmcKRRTK05LOEUccqRBP5y5Vjxz4qcNhfxRIJQnFDUIUWW2zGK7rarVqvOK0BC5v23eQmYo_1amggUZqBHSIZXe5jFieJxoZozvl7GMjWxp1izYLdAzDmF1iLPpErmApf5kGCZlFxJlI_nqR04X8l9xFZlcKGuNGyrc7cL5YjQGk0D3-dl4-KuFXLKXvhGzY2RZPS-8IPItb-dNtUHEqHt0LLCWCW1ZzjaVdp-GaGc2SmmmAQdrjlXD');"></div>
<div class="absolute inset-0 z-0 bg-surface/50 backdrop-blur-sm"></div>
<main class="z-10 w-full max-w-[480px]">
<div class="bg-surface-container-lowest/95 backdrop-blur-xl shadow-[0_40px_40px_-10px_rgba(27,28,28,0.08)] rounded-xl p-8 md:p-12 border border-surface-variant/40">
<header class="text-center mb-10 flex flex-col items-center">
<a href="{{ url('/') }}" class="inline-block">
<h1 class="font-headline-lg text-headline-lg text-primary tracking-tighter mb-2">AuraHome</h1>
</a>
<p class="font-body-md text-body-md text-on-surface-variant">Ayrıcalıklı dünyaya adım atın.</p>
</header>
<form class="space-y-8" method="POST" action="{{ route('register') }}">
@csrf
<div class="flex flex-col gap-1 group relative">
<label class="font-label-md text-label-md text-on-surface-variant uppercase tracking-widest transition-colors group-focus-within:text-primary" for="name">Ad Soyad</label>
<input class="w-full bg-transparent border-0 border-b border-outline-variant py-2 px-0 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-0 transition-colors @error('name') border-error @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Adınız Soyadınız" required="" type="text" autocomplete="name" autofocus/>
<x-input-error :messages="$errors->get('name')" class="mt-1 font-body-md text-sm text-error"/>
</div>
<div class="flex flex-col gap-1 group relative">
<label class="font-label-md text-label-md text-on-surface-variant uppercase tracking-widest transition-colors group-focus-within:text-primary" for="email">E-posta</label>
<input class="w-full bg-transparent border-0 border-b border-outline-variant py-2 px-0 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-0 transition-colors @error('email') border-error @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="ornek@eposta.com" required="" type="email" autocomplete="username"/>
<x-input-error :messages="$errors->get('email')" class="mt-1 font-body-md text-sm text-error"/>
</div>
<div class="flex flex-col gap-1 group relative">
<label class="font-label-md text-label-md text-on-surface-variant uppercase tracking-widest transition-colors group-focus-within:text-primary" for="password">Şifre</label>
<input class="w-full bg-transparent border-0 border-b border-outline-variant py-2 px-0 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-0 transition-colors @error('password') border-error @enderror" id="password" name="password" placeholder="••••••••" required="" type="password" autocomplete="new-password"/>
<x-input-error :messages="$errors->get('password')" class="mt-1 font-body-md text-sm text-error"/>
</div>
<div class="flex flex-col gap-1 group relative">
<label class="font-label-md text-label-md text-on-surface-variant uppercase tracking-widest transition-colors group-focus-within:text-primary" for="password_confirmation">Şifre Tekrar</label>
<input class="w-full bg-transparent border-0 border-b border-outline-variant py-2 px-0 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-0 transition-colors @error('password_confirmation') border-error @enderror" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required="" type="password" autocomplete="new-password"/>
<x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 font-body-md text-sm text-error"/>
</div>
<button class="w-full mt-4 bg-primary text-on-primary font-button text-button uppercase tracking-widest py-4 rounded-lg hover:bg-on-primary-fixed-variant transition-colors duration-300 active:scale-[0.99] flex justify-center items-center" type="submit">
          Kayıt Ol
        </button>
</form>
<div class="mt-10 text-center border-t border-outline-variant/30 pt-6">
<p class="font-body-md text-body-md text-on-surface-variant">
          Zaten hesabınız var mı?
          <a class="text-secondary font-label-md text-label-md underline underline-offset-4 hover:text-primary transition-colors ml-1" href="{{ route('login') }}">Giriş Yap</a>
</p>
</div>
</div>
</main>
</body></html>
