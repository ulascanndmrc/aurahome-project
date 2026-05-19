<!DOCTYPE html>

<html lang="tr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<title>AuraHome - Giriş Yap</title>
<!-- Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@500&amp;family=Manrope:wght@400;600&amp;display=swap" rel="stylesheet"/>
<!-- Material Symbols -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Tailwind Theme Config -->
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
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        /* Custom styles to handle autofill backgrounds gracefully in minimal design */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus, 
        input:-webkit-autofill:active{
            -webkit-box-shadow: 0 0 0 30px #fbf9f8 inset !important;
            -webkit-text-fill-color: #1b1c1c !important;
            transition: background-color 5000s ease-in-out 0s;
        }
    </style>
</head>
<body class="bg-background text-on-background min-h-screen flex antialiased">
<!-- Left Side: Ambient Imagery (Hidden on mobile for focus) -->
<div class="hidden lg:block lg:w-1/2 relative bg-surface-variant overflow-hidden" data-alt="A serene, high-end architectural interior photography shot featuring a minimalist living space. Sunlight softly washes over textured beige linen curtains and a sculptural travertine coffee table. The lighting is diffused and natural, emphasizing the warm, soft cream palette and creating a sense of quiet luxury and peacefulness. The overall aesthetic is clean, modern, and deeply elegant, perfectly aligned with a premium home decor brand." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD4sGv0EnSNfYKlZbVSN1gZgjiSO8AzhW-LAcR264g84NXKZ6ivL35mlKSc6BFsZuxoXlioT-iE08a8xBcSzlrSZnouCJSHvOrKp8IsM8zJud0x5kdG2TIqcM7w7-bxZVIgepYXK_-amgjAxgjximcQNc08CNHyuFncxh1jY3zIBmtcKoYYR-0-w0bS-cRB351r8SC77PsrpfIkxkqbH1XHttUa2RdWwWex-uJyYQ--AOKjWF6kXb-UNyGGvqrsleb7yuVd8mjWPgG4'); background-size: cover; background-position: center;">
<div class="absolute inset-0 bg-black/5"></div> <!-- Very subtle overlay for contrast if needed -->
</div>
<!-- Right Side: Centered Login Form -->
<div class="w-full lg:w-1/2 flex flex-col justify-center items-center px-margin-mobile md:px-margin-desktop py-12">
<div class="w-full max-w-[400px] flex flex-col gap-12">
<!-- Brand Anchor -->
<div class="text-center">
<a class="inline-block" href="{{ url('/') }}">
<h1 class="font-display-xl-mobile md:font-display-xl text-display-xl-mobile md:text-display-xl text-primary tracking-tighter" style="font-family: 'EB Garamond', serif;">AuraHome</h1>
</a>
<p class="font-body-md text-body-md text-on-surface-variant mt-4">Koleksiyonu keşfetmek için giriş yapın.</p>
</div>
<x-auth-session-status class="text-center font-body-md text-body-md text-secondary" :status="session('status')" />
<!-- Form -->
<form action="{{ route('login') }}" class="flex flex-col gap-8 w-full" method="POST">
@csrf
<!-- Email Field -->
<div class="flex flex-col gap-2 relative">
<label class="font-label-md text-label-md text-on-surface-variant uppercase tracking-widest" for="email" style="font-family: 'Manrope', sans-serif;">E-posta</label>
<input class="w-full bg-transparent border-0 border-b border-outline-variant text-on-surface font-body-md text-body-md px-0 py-2 focus:ring-0 focus:border-primary transition-colors placeholder:text-outline-variant/50 @error('email') border-error @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="ornek@posta.com" required="" autocomplete="username" autofocus type="email"/>
<x-input-error :messages="$errors->get('email')" class="mt-1 font-body-md text-sm text-error"/>
</div>
<!-- Password Field -->
<div class="flex flex-col gap-2 relative">
<div class="flex justify-between items-baseline">
<label class="font-label-md text-label-md text-on-surface-variant uppercase tracking-widest" for="password" style="font-family: 'Manrope', sans-serif;">Şifre</label>
@if (Route::has('password.request'))
<a class="font-label-md text-[12px] text-on-surface-variant hover:text-primary transition-colors underline decoration-outline-variant underline-offset-4 hover:decoration-primary" href="{{ route('password.request') }}">Şifremi Unuttum</a>
@endif
</div>
<input class="w-full bg-transparent border-0 border-b border-outline-variant text-on-surface font-body-md text-body-md px-0 py-2 focus:ring-0 focus:border-primary transition-colors placeholder:text-outline-variant/50 @error('password') border-error @enderror" id="password" name="password" placeholder="••••••••" required="" autocomplete="current-password" type="password"/>
<x-input-error :messages="$errors->get('password')" class="mt-1 font-body-md text-sm text-error"/>
</div>
<!-- Actions -->
<div class="flex flex-col gap-6 mt-4">
<button class="w-full bg-primary text-on-primary font-button text-button uppercase py-4 px-8 rounded flex items-center justify-center gap-2 hover:bg-on-primary-fixed-variant transition-colors active:scale-[0.98] duration-200" type="submit">
<span>Giriş Yap</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</button>
@if (Route::has('register'))
<div class="text-center font-body-md text-body-md text-on-surface-variant">
                        Hesabınız yok mu?
                        <a class="text-primary font-semibold underline decoration-primary/30 underline-offset-4 hover:decoration-primary transition-colors" href="{{ route('register') }}">Kayıt Ol</a>
</div>
@endif
</div>
</form>
</div>
</div>
</body></html>
