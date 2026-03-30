@extends('layouts.app')

@section('title', 'PT Dwi Artha Prima | Excellence in Construction & Services')
@section('meta_description', 'PT Dwi Artha Prima adalah mitra strategis untuk proyek konstruksi, infrastruktur, dan engineering di Indonesia. Komitmen kami: kualitas, integritas, dan ketepatan waktu.')

@section('content')

{{-- =========================================================
     HERO SECTION — Video Background
     ========================================================= --}}
<section class="relative h-screen w-full flex items-center justify-center overflow-hidden" id="home">
    {{-- Hero Background Video/Image --}}
    <div class="absolute inset-0 w-full h-full overflow-hidden">
        @if(setting('home', 'home_hero_video'))
        <video autoplay loop muted playsinline class="w-full h-full object-cover">
            <source src="{{ Storage::url(setting('home', 'home_hero_video')) }}" type="video/mp4" />
        </video>
        @else
        <video autoplay loop muted playsinline class="w-full h-full object-cover">
            <source src="{{ asset('video/hero.mp4') }}" type="video/mp4" />
        </video>
        @endif
        <div class="absolute inset-0 bg-black/60 backdrop-brightness-75 mix-blend-multiply"></div>
    </div>

    {{-- Hero Content --}}
    <div class="relative z-10 text-center px-6 max-w-5xl">
        <h1 class="hero-text font-headline font-extrabold text-5xl md:text-7xl lg:text-8xl text-white tracking-tighter mb-6 leading-tight text-shadow-hero">
            {{ setting('home', 'home_hero_title', 'PT Dwi Artha Prima') }}
        </h1>
        <p class="hero-text-delay font-headline text-xl md:text-2xl text-white/90 mb-12 tracking-wide font-medium">
            {{ setting('home', 'home_hero_subtitle', 'Solusi Konstruksi dan Jasa Terpercaya') }}
        </p>
        <div class="hero-btn flex flex-col md:flex-row items-center justify-center gap-6">
            <a href="{{ route('projects') }}"
               class="w-full md:w-auto px-10 py-4 bg-red-700 text-white font-bold rounded hover:bg-red-900 transition-all duration-300 text-center shadow-xl transform hover:scale-105">
                Lihat Proyek
            </a>
            <a href="{{ route('contact') }}"
               class="w-full md:w-auto px-10 py-4 border-2 border-white text-white font-bold rounded hover:bg-white/10 transition-all duration-300 text-center backdrop-blur-sm">
                Hubungi Kami
            </a>
        </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 animate-bounce">
        <span class="material-symbols-outlined text-white/60 text-3xl">keyboard_arrow_down</span>
    </div>
</section>

{{-- =========================================================
     ABOUT SECTION
     ========================================================= --}}
<section class="py-32 px-8 bg-surface" id="about">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-start">
            <div class="space-y-8">
                <span class="text-red-700 font-headline font-bold uppercase tracking-widest text-sm">Tentang Kami</span>
                <h2 class="text-4xl md:text-6xl font-headline font-extrabold text-on-surface leading-tight tracking-tight">
                    {{ setting('home', 'home_about_title', 'Membangun Masa Depan Dengan Presisi.') }}
                </h2>
                <p class="text-on-surface-variant text-lg leading-relaxed max-w-xl whitespace-pre-line">
                    {{ setting('home', 'home_about_desc', 'PT Dwi Artha Prima adalah mitra strategis dalam sektor konstruksi dan infrastruktur di Indonesia. Kami menghadirkan integritas, inovasi, dan kualitas kelas dunia dalam setiap proyek yang kami tangani, dari skala menengah hingga mega-proyek nasional.') }}
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="p-8 bg-surface-container-low rounded-xl">
                    <span class="material-symbols-outlined text-red-700 text-4xl mb-4">visibility</span>
                    <h3 class="font-headline font-bold text-xl mb-3">Visi</h3>
                    <p class="text-on-surface-variant text-sm leading-relaxed">Menjadi perusahaan jasa konstruksi terkemuka yang diakui secara nasional atas kualitas dan komitmen terhadap keselamatan kerja.</p>
                </div>
                <div class="p-8 bg-surface-container-low rounded-xl">
                    <span class="material-symbols-outlined text-red-700 text-4xl mb-4">rocket_launch</span>
                    <h3 class="font-headline font-bold text-xl mb-3">Misi</h3>
                    <p class="text-on-surface-variant text-sm leading-relaxed">Memberikan solusi teknis yang inovatif dan efisien untuk memenuhi harapan klien melalui profesionalisme dan keunggulan operasional.</p>
                </div>
            </div>
        </div>
        {{-- Stats --}}
        <div class="mt-24 grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center"><div class="text-4xl font-black text-on-surface mb-2">15+</div><div class="text-red-700 font-bold uppercase text-xs tracking-tighter">Years Experience</div></div>
            <div class="text-center"><div class="text-4xl font-black text-on-surface mb-2">200+</div><div class="text-red-700 font-bold uppercase text-xs tracking-tighter">Completed Projects</div></div>
            <div class="text-center"><div class="text-4xl font-black text-on-surface mb-2">50+</div><div class="text-red-700 font-bold uppercase text-xs tracking-tighter">Corporate Clients</div></div>
            <div class="text-center"><div class="text-4xl font-black text-on-surface mb-2">12+</div><div class="text-red-700 font-bold uppercase text-xs tracking-tighter">Strategic Regions</div></div>
        </div>
    </div>
</section>

{{-- =========================================================
     SERVICES SECTION — Dynamic
     ========================================================= --}}
<section class="py-32 px-8 bg-surface-container-low" id="services">
    <div class="max-w-7xl mx-auto text-center mb-20">
        <span class="text-red-700 font-headline font-bold uppercase tracking-widest text-sm">Layanan Kami</span>
        <h2 class="text-4xl md:text-5xl font-headline font-extrabold text-on-surface mt-4">Solusi Terintegrasi</h2>
    </div>
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @forelse($services as $service)
        <div class="group bg-white p-10 rounded-xl hover:bg-red-700 transition-all duration-500 hover:-translate-y-2 shadow-sm">
            <div class="w-16 h-16 bg-surface-container flex items-center justify-center rounded-lg mb-8 group-hover:bg-white/20 transition-colors">
                <span class="material-symbols-outlined text-red-700 text-3xl group-hover:text-white transition-colors">{{ $service->icon }}</span>
            </div>
            <h3 class="text-xl font-bold mb-4 group-hover:text-white transition-colors font-headline">{{ $service->name }}</h3>
            <p class="text-on-surface-variant group-hover:text-white/80 transition-colors text-sm leading-relaxed">{{ $service->description }}</p>
        </div>
        @empty
        <div class="col-span-4 text-center text-on-surface-variant py-12">Belum ada layanan tersedia.</div>
        @endforelse
    </div>
</section>

{{-- =========================================================
     PROJECTS SECTION — Dynamic, 16:9 Consistent Grid
     ========================================================= --}}
<section class="py-32 px-8 bg-surface" id="projects">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-end mb-16 gap-8">
        <div class="max-w-2xl">
            <span class="text-red-700 font-headline font-bold uppercase tracking-widest text-sm">Portfolio</span>
            <h2 class="text-4xl md:text-5xl font-headline font-extrabold text-on-surface mt-4">Proyek Unggulan</h2>
        </div>
        <a href="{{ route('projects') }}"
           class="text-red-700 font-bold border-b-2 border-red-700 pb-1 hover:text-red-900 hover:border-red-900 transition-all whitespace-nowrap">
            Lihat Semua Proyek &rarr;
        </a>
    </div>

    {{-- Consistent 3-col grid with 16:9 images --}}
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($projects as $project)
        <div class="group relative overflow-hidden rounded-xl shadow-sm bg-surface-container cursor-pointer">
            {{-- 16:9 container --}}
            <div class="aspect-video overflow-hidden">
                @if($project->image)
                    <img src="{{ Storage::url($project->image) }}"
                         alt="{{ $project->title }}"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center">
                        <span class="material-symbols-outlined text-white/30 text-6xl">apartment</span>
                    </div>
                @endif
            </div>
            {{-- Hover overlay --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-8">
                <span class="text-red-400 font-bold text-xs uppercase mb-2 tracking-widest">{{ $project->category }}</span>
                <h3 class="text-white text-xl font-headline font-bold mb-2">{{ $project->title }}</h3>
                @if($project->description)
                <p class="text-white/70 text-sm line-clamp-2">{{ $project->description }}</p>
                @endif
            </div>
            {{-- Category badge (always visible) --}}
            <div class="absolute top-4 left-4">
                <span class="bg-red-700 text-white text-xs font-bold px-3 py-1 rounded uppercase tracking-wide">{{ $project->category }}</span>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center text-on-surface-variant py-16">
            <span class="material-symbols-outlined text-5xl mb-4 block opacity-30">apartment</span>
            <p>Belum ada proyek tersedia.</p>
        </div>
        @endforelse
    </div>
</section>

{{-- =========================================================
     CLIENTS SLIDER — Dynamic
     ========================================================= --}}
<section class="py-20 bg-surface-container-low overflow-hidden">
    <div class="max-w-7xl mx-auto px-8 mb-12 text-center">
        <p class="text-on-surface-variant font-headline font-bold uppercase tracking-widest text-xs opacity-60">Dipercaya Oleh Mitra Strategis</p>
    </div>
    <div class="relative overflow-hidden">
        <div class="flex space-x-20 animate-[scroll_30s_linear_infinite] whitespace-nowrap w-max">
            @php $clientList = $clients->count() ? $clients : collect([['name'=>'PERTAMINA'],['name'=>'WIKA'],['name'=>'ADHI KARYA'],['name'=>'PLN'],['name'=>'PUPR'],['name'=>'TELKOM']]); @endphp
            @foreach([$clientList, $clientList] as $list)
                @foreach($list as $client)
                    @if(is_array($client))
                        <span class="text-2xl font-black font-headline text-on-surface-variant/50 hover:text-red-700 transition-colors cursor-default inline-block">{{ $client['name'] }}</span>
                    @else
                        @if($client->logo)
                            <img src="{{ Storage::url($client->logo) }}" alt="{{ $client->name }}" class="h-10 object-contain opacity-50 grayscale hover:grayscale-0 hover:opacity-100 transition-all inline-block">
                        @else
                            <span class="text-2xl font-black font-headline text-on-surface-variant/50 hover:text-red-700 transition-colors cursor-default inline-block">{{ $client->name }}</span>
                        @endif
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</section>

{{-- =========================================================
     CONTACT SECTION
     ========================================================= --}}
<section class="py-32 px-8 bg-surface" id="contact">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-24">
        <div class="space-y-12">
            <div>
                <span class="text-red-700 font-headline font-bold uppercase tracking-widest text-sm">Hubungi Kami</span>
                <h2 class="text-4xl md:text-5xl font-headline font-extrabold text-on-surface mt-4 mb-6">Mulai Proyek Anda Bersama Kami</h2>
                <p class="text-on-surface-variant text-lg">Konsultasikan kebutuhan konstruksi dan jasa engineering Anda dengan tim ahli kami.</p>
            </div>
            <div class="space-y-6">
                <div class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-red-700">location_on</span>
                    <div><h4 class="font-bold text-on-surface">Alamat Kantor</h4><p class="text-on-surface-variant text-sm">Gedung Artha Prima Lt. 5, Jl. Gatot Subroto No. 12, Jakarta Selatan, 12190</p></div>
                </div>
                <div class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-red-700">call</span>
                    <div><h4 class="font-bold text-on-surface">Telepon</h4><p class="text-on-surface-variant text-sm">+62 (21) 555-0123</p></div>
                </div>
                <div class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-red-700">mail</span>
                    <div><h4 class="font-bold text-on-surface">Email</h4><p class="text-on-surface-variant text-sm">info@dwiarthaprima.com</p></div>
                </div>
            </div>
        </div>

        {{-- Contact Form --}}
        <div class="bg-surface-container-low p-8 md:p-12 rounded-2xl shadow-sm border border-outline-variant/10">
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-800 rounded-lg flex items-center gap-3">
                    <span class="material-symbols-outlined">check_circle</span>
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-on-surface-variant" for="name">Nama Lengkap</label>
                        <input class="w-full bg-white border border-outline-variant/30 rounded focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all p-3 @error('name') border-red-500 @enderror"
                               id="name" name="name" placeholder="Masukkan nama Anda" type="text" value="{{ old('name') }}"/>
                        @error('name')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-on-surface-variant" for="email">Email Bisnis</label>
                        <input class="w-full bg-white border border-outline-variant/30 rounded focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all p-3 @error('email') border-red-500 @enderror"
                               id="email" name="email" placeholder="email@perusahaan.com" type="email" value="{{ old('email') }}"/>
                        @error('email')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-bold text-on-surface-variant" for="subject">Subjek Layanan</label>
                    <select class="w-full bg-white border border-outline-variant/30 rounded focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all p-3" id="subject" name="subject">
                        <option>Construction Services</option>
                        <option>General Contractor</option>
                        <option>Maintenance Services</option>
                        <option>Engineering Services</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-bold text-on-surface-variant" for="message">Pesan / Detail Proyek</label>
                    <textarea class="w-full bg-white border border-outline-variant/30 rounded focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all p-3 @error('message') border-red-500 @enderror"
                              id="message" name="message" placeholder="Ceritakan kebutuhan Anda..." rows="5">{{ old('message') }}</textarea>
                    @error('message')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <button class="w-full py-4 bg-red-700 text-white font-bold rounded hover:bg-red-900 transition-all duration-300 shadow-md transform active:scale-[0.98] font-headline uppercase tracking-wide" type="submit">
                    Kirim Pesan Sekarang
                </button>
            </form>
        </div>
    </div>
</section>

@endsection
