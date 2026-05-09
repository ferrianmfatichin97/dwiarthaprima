<footer class="bg-surface-container-low w-full py-16 px-8 mt-24 border-t border-outline-variant/10">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-12 max-w-7xl mx-auto">
        {{-- Branding & About --}}
        <div class="md:col-span-1">
            <div class="flex items-center gap-3 mb-6">
                <img src="{{ asset('dap.png') }}" alt="PT Dwi Artha Prima" class="h-10 w-auto" loading="lazy" decoding="async">
                <div class="text-xl font-black text-on-surface uppercase tracking-tighter font-headline">PT Dwi Artha Prima</div>
            </div>
            <p class="text-sm leading-relaxed text-on-surface-variant mb-8">
                Mitra strategis terpercaya untuk pembangunan infrastruktur berkelanjutan dan jasa engineering berkualitas tinggi dengan standar mutu nasional di Indonesia.
            </p>
        </div>

        {{-- Alamat & Kontak --}}
        <div class="md:col-span-1">
            <h4 class="font-headline font-extrabold text-on-surface mb-6 text-xs uppercase tracking-widest">Alamat & Kontak</h4>
            <div class="space-y-4 text-sm text-on-surface-variant leading-relaxed">
                <div class="flex gap-3">
                    <span class="material-symbols-outlined text-red-700 text-lg">location_on</span>
                    <p>{{ setting('contact', 'contact_address', 'Gedung Artha Prima Lt. 5, Jl. Gatot Subroto No. 12, Jakarta Selatan, 12190') }}</p>
                </div>
                <div class="flex gap-3">
                    <span class="material-symbols-outlined text-red-700 text-lg">call</span>
                    <p>{{ setting('contact', 'contact_phone', '+62 (21) 555-0123') }}</p>
                </div>
                <div class="flex gap-3">
                    <span class="material-symbols-outlined text-red-700 text-lg">mail</span>
                    <p>{{ setting('contact', 'contact_email', 'info@dwiarthaprima.com') }}</p>
                </div>
            </div>
        </div>

        {{-- Navigasi Cepat --}}
        <div class="md:col-span-1">
            <h4 class="font-headline font-extrabold text-on-surface mb-6 text-xs uppercase tracking-widest">Navigasi</h4>
            <ul class="space-y-3">
                <li><a class="text-sm text-on-surface-variant hover:text-red-700 transition-all flex items-center gap-2 group" href="{{ route('home') }}">
                    <span class="w-1 h-1 rounded-full bg-outline-variant group-hover:bg-red-700 transition-colors"></span> Beranda</a></li>
                <li><a class="text-sm text-on-surface-variant hover:text-red-700 transition-all flex items-center gap-2 group" href="{{ route('about') }}">
                    <span class="w-1 h-1 rounded-full bg-outline-variant group-hover:bg-red-700 transition-colors"></span> Profil</a></li>
                <li><a class="text-sm text-on-surface-variant hover:text-red-700 transition-all flex items-center gap-2 group" href="{{ route('services') }}">
                    <span class="w-1 h-1 rounded-full bg-outline-variant group-hover:bg-red-700 transition-colors"></span> Layanan</a></li>
                <li><a class="text-sm text-on-surface-variant hover:text-red-700 transition-all flex items-center gap-2 group" href="{{ route('projects') }}">
                    <span class="w-1 h-1 rounded-full bg-outline-variant group-hover:bg-red-700 transition-colors"></span> Portofolio</a></li>
                <li><a class="text-sm text-on-surface-variant hover:text-red-700 transition-all flex items-center gap-2 group" href="{{ route('contact') }}">
                    <span class="w-1 h-1 rounded-full bg-outline-variant group-hover:bg-red-700 transition-colors"></span> Kontak</a></li>
            </ul>
        </div>

        {{-- Media Sosial --}}
        <div class="md:col-span-1">
            <h4 class="font-headline font-extrabold text-on-surface mb-6 text-xs uppercase tracking-widest">Media Sosial</h4>
            <ul class="space-y-3">
                @forelse($socials as $social)
                <li>
                    <a class="text-sm text-on-surface-variant hover:text-red-700 transition-all flex items-center gap-2 group" href="{{ $social->url }}" target="_blank">
                        <span class="material-symbols-outlined text-[18px] group-hover:scale-110 transition-transform">{{ $social->icon }}</span>
                        {{ $social->name }}
                    </a>
                </li>
                @empty
                <li class="text-xs text-on-surface-variant italic">Belum tersedia</li>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="max-w-7xl mx-auto pt-10 mt-16 border-t border-outline-variant/10 flex flex-col md:flex-row justify-between items-center gap-4">
        <p class="text-xs text-on-surface-variant font-medium tracking-wide">
            © {{ date('Y') }} PT Dwi Artha Prima. Hak Cipta Dilindungi.
        </p>
        <div class="flex gap-6">
            <span class="text-[10px] text-on-surface-variant/50 font-bold uppercase tracking-widest">Integritas</span>
            <span class="text-[10px] text-on-surface-variant/50 font-bold uppercase tracking-widest">Kualitas</span>
            <span class="text-[10px] text-on-surface-variant/50 font-bold uppercase tracking-widest">Keamanan</span>
        </div>
    </div>
</footer>
