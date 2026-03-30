<nav x-data="{ open: false }" class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-xl shadow-sm transition-all duration-300" id="navbar">
    <div class="flex justify-between items-center px-6 md:px-8 py-4 max-w-7xl mx-auto">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img src="{{ asset('dap.png') }}" alt="PT Dwi Artha Prima" class="h-9 w-auto" loading="eager" decoding="async">
            <span class="text-xl font-black tracking-tighter text-on-surface font-headline">PT Dwi Artha Prima</span>
        </a>

        <div class="hidden md:flex items-center gap-8">
            <a href="{{ route('home') }}#home" class="font-headline font-bold tracking-tight text-sm uppercase hover:text-red-600 transition-colors {{ request()->routeIs('home') ? 'text-red-600 border-b-2 border-red-600 pb-1' : 'text-on-surface/70' }}">Home</a>
            <a href="{{ route('about') }}" class="font-headline font-bold tracking-tight text-sm uppercase hover:text-red-600 transition-colors {{ request()->routeIs('about') ? 'text-red-600 border-b-2 border-red-600 pb-1' : 'text-on-surface/70' }}">About</a>
            <a href="{{ route('services') }}" class="font-headline font-bold tracking-tight text-sm uppercase hover:text-red-600 transition-colors {{ request()->routeIs('services') ? 'text-red-600 border-b-2 border-red-600 pb-1' : 'text-on-surface/70' }}">Services</a>
            <a href="{{ route('projects') }}" class="font-headline font-bold tracking-tight text-sm uppercase hover:text-red-600 transition-colors {{ request()->routeIs('projects*') ? 'text-red-600 border-b-2 border-red-600 pb-1' : 'text-on-surface/70' }}">Projects</a>
            <a href="{{ route('contact') }}" class="font-headline font-bold tracking-tight text-sm uppercase hover:text-red-600 transition-colors {{ request()->routeIs('contact') ? 'text-red-600 border-b-2 border-red-600 pb-1' : 'text-on-surface/70' }}">Contact</a>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('contact') }}"
               class="hidden md:inline-flex bg-red-700 hover:bg-red-900 text-white px-6 py-2.5 rounded font-headline font-bold text-sm uppercase tracking-wide transition-all duration-300 shadow-md">
                Hubungi Kami
            </a>
            <button type="button" class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white/60 border border-outline-variant/30 hover:bg-white transition"
                    aria-label="Toggle menu" @click="open = !open">
                <span class="material-symbols-outlined" x-text="open ? 'close' : 'menu'">menu</span>
            </button>
        </div>
    </div>

    <div x-show="open" x-transition.opacity x-cloak @click.outside="open = false"
         class="md:hidden border-t border-outline-variant/20 bg-white/95 backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col gap-3">
            <a href="{{ route('home') }}#home" class="font-headline font-bold text-sm uppercase text-on-surface/80 hover:text-red-700">Home</a>
            <a href="{{ route('about') }}" class="font-headline font-bold text-sm uppercase text-on-surface/80 hover:text-red-700">About</a>
            <a href="{{ route('services') }}" class="font-headline font-bold text-sm uppercase text-on-surface/80 hover:text-red-700">Services</a>
            <a href="{{ route('projects') }}" class="font-headline font-bold text-sm uppercase text-on-surface/80 hover:text-red-700">Projects</a>
            <a href="{{ route('contact') }}" class="font-headline font-bold text-sm uppercase text-on-surface/80 hover:text-red-700">Contact</a>
            <a href="{{ route('contact') }}" class="mt-2 inline-flex justify-center bg-red-700 hover:bg-red-900 text-white px-6 py-3 rounded-lg font-headline font-extrabold text-sm uppercase tracking-wide shadow-md transition">
                Hubungi Kami
            </a>
        </div>
    </div>
</nav>
