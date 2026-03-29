<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="PT Dwi Artha Prima - Solusi Konstruksi dan Jasa Terpercaya di Indonesia"/>
    <title>@yield('title', 'PT Dwi Artha Prima | Excellence in Construction & Services')</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <script>
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "secondary-fixed": "#e0e0ff",
              "on-error-container": "#93000a",
              "on-surface": "#1c1b1b",
              "surface": "#fcf9f8",
              "primary": "#b7000c",
              "inverse-on-surface": "#f3f0ef",
              "secondary-fixed-dim": "#bdc2ff",
              "on-tertiary-container": "#f9f8ff",
              "error": "#ba1a1a",
              "surface-container-highest": "#e5e2e1",
              "inverse-surface": "#313030",
              "on-primary-fixed-variant": "#930007",
              "secondary": "#4c56af",
              "surface-variant": "#e5e2e1",
              "primary-fixed-dim": "#ffb4aa",
              "outline": "#946e69",
              "on-tertiary-fixed-variant": "#00458f",
              "surface-dim": "#dcd9d9",
              "surface-container-lowest": "#ffffff",
              "on-tertiary": "#ffffff",
              "on-surface-variant": "#5f3f3b",
              "tertiary": "#0058b2",
              "error-container": "#ffdad6",
              "background": "#fcf9f8",
              "on-primary-container": "#fff7f6",
              "on-secondary": "#ffffff",
              "primary-fixed": "#ffdad5",
              "on-background": "#1c1b1b",
              "on-tertiary-fixed": "#001b3f",
              "tertiary-container": "#0070e0",
              "surface-bright": "#fcf9f8",
              "tertiary-fixed-dim": "#abc7ff",
              "on-secondary-fixed-variant": "#343d96",
              "on-primary-fixed": "#410001",
              "outline-variant": "#e9bcb6",
              "surface-container-high": "#ebe7e7",
              "primary-container": "#e60012",
              "tertiary-fixed": "#d7e3ff",
              "surface-tint": "#c0000d",
              "surface-container-low": "#f6f3f2",
              "on-secondary-fixed": "#000767",
              "surface-container": "#f0edec",
              "on-primary": "#ffffff",
              "on-secondary-container": "#27308a",
              "inverse-primary": "#ffb4aa",
              "secondary-container": "#959efd",
              "on-error": "#ffffff"
            },
            fontFamily: {
              "headline": ["Manrope"],
              "body": ["Inter"],
              "label": ["Inter"]
            },
            borderRadius: {"DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem"},
          },
        },
      }
    </script>

    <style>
        .material-symbols-outlined { font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24; vertical-align:middle; }
        .text-shadow-hero { text-shadow:0 4px 12px rgba(0,0,0,0.6); }
        @keyframes scroll { 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }
        @keyframes fadeInUp { from{opacity:0;transform:translateY(30px)} to{opacity:1;transform:translateY(0)} }
        .hero-text { animation:fadeInUp 0.8s ease forwards; }
        .hero-text-delay { animation:fadeInUp 0.8s ease 0.2s both; }
        .hero-btn { animation:fadeInUp 0.8s ease 0.4s both; }
    </style>
    @yield('head')
</head>
<body class="bg-background text-on-surface font-body selection:bg-primary selection:text-on-primary">

    @include('partials.navbar')
    <main>@yield('content')</main>
    @include('partials.footer')

    <a href="https://wa.me/6221555123" target="_blank"
       class="fixed bottom-8 right-8 z-[100] bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-transform flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.72.94 3.659 1.437 5.634 1.437h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>
    @yield('scripts')
</body>
</html>
