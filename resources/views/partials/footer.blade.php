<footer class="bg-surface-container-low w-full py-12 px-8 mt-24">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-12 max-w-7xl mx-auto">
        <div class="md:col-span-1">
            <div class="flex items-center gap-3 mb-4">
                <img src="{{ asset('dap.png') }}" alt="PT Dwi Artha Prima" class="h-9 w-auto" loading="lazy" decoding="async">
                <div class="text-lg font-bold text-on-surface uppercase tracking-tighter font-headline">PT Dwi Artha Prima</div>
            </div>
            <p class="text-sm leading-relaxed text-on-surface-variant mb-6">
                Solusi terpercaya untuk pembangunan infrastruktur berkelanjutan dan jasa engineering berkualitas tinggi di Indonesia.
            </p>
            <div class="flex gap-4">
                <span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:text-red-600">language</span>
                <span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:text-red-600">hub</span>
                <span class="material-symbols-outlined text-on-surface-variant cursor-pointer hover:text-red-600">policy</span>
            </div>
        </div>
        <div class="md:col-span-1">
            <h4 class="font-bold text-on-surface mb-6 text-sm uppercase">Navigation</h4>
            <ul class="space-y-3">
                <li><a class="text-sm text-on-surface-variant hover:text-red-600 transition-all" href="{{ route('home') }}">Home</a></li>
                <li><a class="text-sm text-on-surface-variant hover:text-red-600 transition-all" href="{{ route('home') }}#about">About</a></li>
                <li><a class="text-sm text-on-surface-variant hover:text-red-600 transition-all" href="{{ route('home') }}#services">Services</a></li>
                <li><a class="text-sm text-on-surface-variant hover:text-red-600 transition-all" href="{{ route('projects') }}">Projects</a></li>
            </ul>
        </div>
        <div class="md:col-span-1">
            <h4 class="font-bold text-on-surface mb-6 text-sm uppercase">Quick Links</h4>
            <ul class="space-y-3">
                <li><a class="text-sm text-on-surface-variant hover:text-red-600 transition-all" href="#">Privacy Policy</a></li>
                <li><a class="text-sm text-on-surface-variant hover:text-red-600 transition-all" href="#">Terms of Service</a></li>
                <li><a class="text-sm text-on-surface-variant hover:text-red-600 transition-all" href="#">Careers</a></li>
                <li><a class="text-sm text-on-surface-variant hover:text-red-600 transition-all" href="#">Sustainability</a></li>
            </ul>
        </div>
        <div class="md:col-span-1">
            <h4 class="font-bold text-on-surface mb-6 text-sm uppercase">Newsletter</h4>
            <p class="text-sm text-on-surface-variant mb-4">Dapatkan update terbaru mengenai proyek dan inovasi kami.</p>
            <div class="flex gap-2">
                <input class="bg-surface-container text-sm px-4 py-2 rounded border-none focus:ring-1 focus:ring-red-600 w-full" placeholder="Email" type="email"/>
                <button class="bg-red-700 text-white p-2 rounded hover:bg-red-900 transition-colors">
                    <span class="material-symbols-outlined">send</span>
                </button>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto pt-10 mt-10 border-t border-on-surface-variant/10 text-center">
        <p class="text-sm text-on-surface-variant">© {{ date('Y') }} PT Dwi Artha Prima. All Rights Reserved.</p>
    </div>
</footer>
