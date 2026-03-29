<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login - PT Dwi Artha Prima</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              "primary": "#b7000c",
              "on-primary": "#ffffff",
              "surface": "#fcf9f8",
              "on-surface": "#1c1b1b",
              "surface-container": "#f0edec",
              "on-surface-variant": "#5f3f3b",
            },
            fontFamily: {
              "headline": ["Manrope"],
              "body": ["Inter"],
            },
          },
        },
      }
    </script>
    
    <style>
        .material-symbols-outlined { font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24; vertical-align:middle; }
    </style>
</head>
<body class="bg-surface font-body text-on-surface min-h-screen flex selection:bg-primary selection:text-white">

    <!-- Left Side: Cover Image -->
    <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden bg-black">
        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCLSw86U1pEGtzs1uiKWM3FDCxTXUkrkcPQC6F8EtZ8i02xwEA7Bx7FqK58frHxOnKW_pflMOuArTR2buwqA8MMkhz84OHXupEyKPU8HGmilq_wgLB2x2FzOIBDVq_SY5WRMPpJIxHjtecmEvzTTIw55uaOBDPT1PzGT0BiSC_pmO0JxZ75H_j4XVOxVNjF5ahpiCPz_VXxFRSv-Pxpkojkz2MTGmhmeifKLDgJeKBmnbY-IZvspqCT0TiU_G3x8ZW7Rqw5Kp6FadBt" 
             alt="Construction" class="absolute inset-0 w-full h-full object-cover opacity-70 scale-105 transform hover:scale-100 transition-transform duration-[10s] ease-out">
        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent flex flex-col justify-end p-16">
            <h1 class="text-white font-headline font-extrabold text-5xl tracking-tight mb-4 leading-tight">Membangun<br>Masa Depan.</h1>
            <p class="text-white/80 text-lg max-w-md">PT Dwi Artha Prima Secure Administrator Access Panel.</p>
        </div>
    </div>

    <!-- Right Side: Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-16">
        <div class="w-full max-w-md space-y-8">
            
            <!-- Logo area -->
            <div class="text-center sm:text-left">
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center w-14 h-14 bg-primary rounded-xl mb-6 shadow-xl shadow-primary/20 hover:scale-105 transition-transform">
                    <span class="material-symbols-outlined text-white text-3xl">construction</span>
                </a>
                <h2 class="text-3xl font-headline font-extrabold tracking-tight text-on-surface">Selamat Datang</h2>
                <p class="text-on-surface-variant mt-2 text-sm">Masuk ke sistem kontrol pusat PT Dwi Artha Prima.</p>
            </div>

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="bg-red-50 text-red-700 p-4 rounded-lg flex items-start gap-3 border border-red-100">
                    <span class="material-symbols-outlined text-red-600 mt-0.5">error</span>
                    <ul class="text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-on-surface mb-2">Alamat Email</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant/50">mail</span>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                               class="w-full pl-12 pr-4 py-3 bg-surface-container border-2 border-transparent rounded-xl focus:border-primary focus:bg-white focus:ring-4 focus:ring-primary/10 transition-all text-sm outline-none"
                               placeholder="admin@dwiarthaprima.com">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-on-surface mb-2">Kata Sandi</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant/50">lock</span>
                        <input id="password" type="password" name="password" required
                               class="w-full pl-12 pr-4 py-3 bg-surface-container border-2 border-transparent rounded-xl focus:border-primary focus:bg-white focus:ring-4 focus:ring-primary/10 transition-all text-sm outline-none"
                               placeholder="••••••••">
                    </div>
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 text-primary bg-surface-container border-gray-300 rounded focus:ring-primary focus:ring-2 cursor-pointer">
                        <span class="ml-2 text-sm text-on-surface-variant group-hover:text-primary transition-colors">Ingat Saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm font-semibold text-primary hover:text-red-900 transition-colors">Lupa sandi?</a>
                    @endif
                </div>

                <!-- Submit -->
                <button type="submit" class="w-full inline-flex justify-center items-center gap-2 py-3.5 px-4 border border-transparent rounded-xl shadow-lg shadow-primary/20 text-sm font-bold text-white bg-primary hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-primary/30 transition-all transform active:scale-[0.98]">
                    Masuk ke Sistem
                    <span class="material-symbols-outlined text-lg">arrow_forward</span>
                </button>
            </form>
            
            <div class="text-center pt-8 border-t border-surface-container text-xs text-on-surface-variant/60 font-medium">
                &copy; {{ date('Y') }} PT Dwi Artha Prima. All rights reserved.
            </div>
            
        </div>
    </div>

</body>
</html>
