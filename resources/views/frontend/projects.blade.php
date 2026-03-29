@extends('layouts.app')
@section('title', 'Proyek Kami | PT Dwi Artha Prima')

@section('head')
    <style>
        .tonal-transition { transition: background-color 0.4s ease-out; }
        .project-card:hover .project-overlay { opacity: 1; }
        .project-card:hover img { transform: scale(1.05); }
    </style>
@endsection

@section('content')
<!-- Hero Banner Section -->
<section class="relative h-[400px] overflow-hidden flex items-center justify-center">
    <img alt="Construction Site Banner" class="absolute inset-0 w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCLSw86U1pEGtzs1uiKWM3FDCxTXUkrkcPQC6F8EtZ8i02xwEA7Bx7FqK58frHxOnKW_pflMOuArTR2buwqA8MMkhz84OHXupEyKPU8HGmilq_wgLB2x2FzOIBDVq_SY5WRMPpJIxHjtecmEvzTTIw55uaOBDPT1PzGT0BiSC_pmO0JxZ75H_j4XVOxVNjF5ahpiCPz_VXxFRSv-Pxpkojkz2MTGmhmeifKLDgJeKBmnbY-IZvspqCT0TiU_G3x8ZW7Rqw5Kp6FadBt"/>
    <div class="absolute inset-0 bg-black/60 backdrop-brightness-75"></div>
    <div class="relative z-10 text-center px-4">
        <h1 class="font-headline font-extrabold text-5xl md:text-7xl text-white tracking-tighter uppercase mb-4">
            {{ setting('project', 'project_hero_title', 'Proyek Kami') }}
        </h1>
        <div class="h-1.5 w-24 bg-primary mx-auto"></div>
        <p class="mt-6 text-white/80 font-body text-lg max-w-2xl mx-auto">{{ setting('project', 'project_hero_desc', 'Membangun masa depan Indonesia melalui infrastruktur yang berkelanjutan dan inovasi konstruksi kelas dunia.') }}</p>
    </div>
</section>

<!-- Filter & Search Section -->
<section class="bg-surface-container-low py-12">
    <div class="max-w-7xl mx-auto px-8 flex flex-col md:flex-row justify-between items-center gap-8">
        <!-- Filters -->
        <div class="flex flex-wrap justify-center md:justify-start gap-3" id="filter-btns">
            <button onclick="filterProjects('all')" data-filter="all" class="filter-btn px-6 py-2 rounded-full text-sm font-bold font-headline transition-all duration-300 bg-primary text-on-primary">
                Semua Proyek
            </button>
            @foreach($categories as $cat)
            <button onclick="filterProjects('{{ Str::slug($cat) }}')" data-filter="{{ Str::slug($cat) }}" class="filter-btn px-6 py-2 rounded-full text-sm font-bold font-headline transition-all duration-300 bg-surface-container-lowest text-on-surface-variant hover:text-primary border border-outline-variant/30">
                {{ $cat }}
            </button>
            @endforeach
        </div>
        <!-- Search Input -->
        <div class="relative w-full md:w-80 group">
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant group-focus-within:text-primary transition-colors">search</span>
            <input id="search-input" oninput="searchProjects(this.value)" class="w-full pl-12 pr-4 py-3 bg-surface-container-lowest border-none rounded-lg focus:ring-2 focus:ring-primary/20 text-on-surface font-body transition-all outline-none shadow-sm" placeholder="Cari Proyek..." type="text"/>
        </div>
    </div>
</section>

<!-- Project Grid Section -->
<section class="py-20 bg-surface">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8" id="projects-grid">
            @forelse($projects as $index => $project)
                @php
                    if($index === 0) {
                        $colClass = 'md:col-span-8 h-[500px]';
                    } elseif ($index === 1) {
                        $colClass = 'md:col-span-4 h-[500px]';
                    } else {
                        $colClass = 'col-span-1 md:col-span-6 lg:col-span-4 h-[400px]';
                    }
                @endphp
                
                <div class="{{ $colClass }} project-card group relative overflow-hidden rounded-xl shadow-lg bg-surface-container cursor-pointer"
                     data-category="{{ Str::slug($project->category) }}" data-title="{{ strtolower($project->title) }}">
                    
                    @if($project->image)
                        <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover transition-transform duration-700 ease-out">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center">
                            <span class="material-symbols-outlined text-white/30 text-6xl">apartment</span>
                        </div>
                    @endif
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-0 project-overlay transition-opacity duration-500 flex flex-col justify-end p-8 {{ $index === 0 ? 'md:p-10' : '' }}">
                        <span class="text-primary font-headline font-extrabold uppercase text-sm tracking-widest mb-2">{{ $project->category }}</span>
                        <h3 class="text-white text-{{ $index === 0 ? '3xl' : 'xl' }} font-headline font-bold mb-2">{{ $project->title }}</h3>
                        
                        <p class="text-white/70 font-body {{ $index === 0 ? 'mb-6' : 'mb-4 text-sm' }} flex items-center gap-2 line-clamp-2">
                            {{ $project->description }}
                        </p>
                        
                        <a class="inline-flex items-center text-white font-headline font-bold {{ $index === 0 ? 'group/link' : 'text-sm' }}" href="#">
                            LIHAT DETAIL
                            @if($index === 0)
                            <span class="material-symbols-outlined ml-2 group-hover/link:translate-x-2 transition-transform">arrow_forward</span>
                            @endif
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-12 text-center py-24">
                    <span class="material-symbols-outlined text-6xl block mb-4 opacity-20 text-on-surface">apartment</span>
                    <p class="text-on-surface-variant font-medium">Belum ada proyek tersedia.</p>
                </div>
            @endforelse
        </div>

        @if($projects->hasPages())
        <div class="mt-16 flex justify-center">
            {{ $projects->links() }}
        </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="bg-surface-container-highest py-24 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-primary/5 -skew-x-12 transform translate-x-1/2"></div>
    <div class="max-w-7xl mx-auto px-8 relative z-10 flex flex-col md:flex-row items-center justify-between gap-12">
        <div class="max-w-2xl">
            <h2 class="font-headline font-extrabold text-4xl md:text-5xl text-on-surface tracking-tighter uppercase mb-6">
                {{ setting('project', 'project_cta_title', 'Punya visi untuk proyek Anda berikutnya?') }}
            </h2>
            <p class="text-on-surface-variant text-lg font-body leading-relaxed whitespace-pre-line">
                {{ setting('project', 'project_cta_desc', 'Tim ahli kami siap membantu Anda mewujudkan infrastruktur yang kokoh dan inovatif. Mari kita bangun masa depan bersama.') }}
            </p>
        </div>
        <div>
            <a href="{{ route('contact') }}" class="group inline-flex items-center gap-4 bg-primary text-on-primary px-10 py-5 rounded-md font-headline font-extrabold text-sm uppercase tracking-widest shadow-2xl shadow-primary/20 hover:bg-on-primary-fixed-variant transition-all duration-400">
                Konsultasi Dengan Kami
                <span class="material-symbols-outlined group-hover:translate-x-2 transition-transform">arrow_right_alt</span>
            </a>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
function filterProjects(filter) {
    document.querySelectorAll('.filter-btn').forEach(btn => {
        if (btn.dataset.filter === filter) {
            btn.classList.add('bg-primary','text-on-primary');
            btn.classList.remove('bg-surface-container-lowest','text-on-surface-variant');
        } else {
            btn.classList.remove('bg-primary','text-on-primary');
            btn.classList.add('bg-surface-container-lowest','text-on-surface-variant');
        }
    });
    document.querySelectorAll('.project-card').forEach(card => {
        const show = filter === 'all' || card.dataset.category === filter;
        card.style.display = show ? 'block' : 'none';
        
        // Handling dynamic grid fallback visual bugs when hiding top element 
        // to pretend it's still a well-flowing grid
    });
}
function searchProjects(q) {
    q = q.toLowerCase();
    document.querySelectorAll('.project-card').forEach(card => {
        card.style.display = card.dataset.title.includes(q) ? 'block' : 'none';
    });
}
</script>
@endsection
