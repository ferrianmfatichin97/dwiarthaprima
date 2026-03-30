<nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-xl shadow-sm transition-all duration-300" id="navbar">
    <div class="flex justify-between items-center px-8 py-4 max-w-7xl mx-auto">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img src="{{ asset('dap.png') }}" alt="PT Dwi Artha Prima" class="h-9 w-auto" loading="eager" decoding="async">
            <span class="text-xl font-black tracking-tighter text-on-surface font-headline">PT Dwi Artha Prima</span>
        </a>
        <div class="hidden md:flex items-center gap-8">
            <a href="{{ route('home') }}#home" class="font-headline font-bold tracking-tight text-sm uppercase hover:text-red-600 transition-colors {{ request()->routeIs('home') ? 'text-red-600 border-b-2 border-red-600 pb-1' : 'text-on-surface/70' }}">Home</a>
            <a href="{{ route('about') }}" class="font-headline font-bold tracking-tight text-sm uppercase hover:text-red-600 transition-colors {{ request()->routeIs('about') ? 'text-red-600 border-b-2 border-red-600 pb-1' : 'text-on-surface/70' }}">About</a>
            <a href="{{ route('services') }}" class="font-headline font-bold tracking-tight text-sm uppercase hover:text-red-600 transition-colors {{ request()->routeIs('services') ? 'text-red-600 border-b-2 border-red-600 pb-1' : 'text-on-surface/70' }}">Services</a>
            <a href="{{ route('projects') }}" class="font-headline font-bold tracking-tight text-sm uppercase hover:text-red-600 transition-colors {{ request()->routeIs('projects') ? 'text-red-600 border-b-2 border-red-600 pb-1' : 'text-on-surface/70' }}">Projects</a>
            <a href="{{ route('contact') }}" class="font-headline font-bold tracking-tight text-sm uppercase hover:text-red-600 transition-colors {{ request()->routeIs('contact') ? 'text-red-600 border-b-2 border-red-600 pb-1' : 'text-on-surface/70' }}">Contact</a>
        </div>
        <a href="{{ route('contact') }}"
           class="bg-red-700 hover:bg-red-900 text-white px-6 py-2.5 rounded font-headline font-bold text-sm uppercase tracking-wide transition-all duration-300 shadow-md">
            Hubungi Kami
        </a>
    </div>
</nav>
