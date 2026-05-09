@extends('layouts.app')

@section('title', 'Tentang Kami | PT Dwi Artha Prima')
@section('meta_description', 'Profil PT Dwi Artha Prima: perusahaan konstruksi, infrastruktur, dan engineering. Komitmen pada K3, mutu (QA/QC), dan delivery tepat waktu.')

@section('content')
<section class="pt-28 pb-16 bg-surface-container-low">
    <div class="max-w-7xl mx-auto px-8">
        <div class="max-w-4xl">
            <div class="text-xs uppercase tracking-widest font-bold text-primary">Profil Perusahaan</div>
            <h1 class="mt-4 font-headline font-extrabold text-4xl md:text-6xl text-on-surface tracking-tighter uppercase">
                {{ setting('about', 'about_hero_title', 'Mitra Konstruksi & Engineering yang Terukur') }}
            </h1>
            <p class="mt-5 text-on-surface-variant text-lg leading-relaxed">
                {{ setting('about', 'about_hero_desc', 'Berkomitmen menyediakan layanan konstruksi dan infrastruktur dengan standar K3, pengendalian mutu, dan manajemen proyek yang disiplin.') }}
            </p>
        </div>
    </div>
</section>

<section class="py-16 bg-surface">
    <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 lg:grid-cols-12 gap-12">
        <div class="lg:col-span-7">
            <h2 class="font-headline font-extrabold text-2xl md:text-3xl text-on-surface tracking-tight uppercase">
                {{ setting('about', 'about_story_title', 'Profil Perusahaan') }}
            </h2>
            <p class="mt-4 text-on-surface-variant text-lg leading-relaxed whitespace-pre-line">
                {{ setting('about', 'about_story_desc', "PT Dwi Artha Prima berfokus pada pekerjaan konstruksi, infrastruktur, dan jasa engineering. Kami mengutamakan perencanaan yang rapi, kontrol mutu yang konsisten, serta komunikasi progres yang transparan.\n\nSetiap langkah operasional kami berlandaskan pada prinsip profesionalisme dan integritas, di mana aspek keselamatan kerja serta pengendalian mutu (QA/QC) menjadi standar baku yang kami terapkan secara konsisten di setiap pekerjaan.") }}
            </p>
        </div>

        <aside class="lg:col-span-5 space-y-6">
            <div class="bg-white rounded-2xl border border-outline-variant/20 shadow-sm p-8">
                <div class="text-xs uppercase tracking-widest font-bold text-on-surface-variant">Visi</div>
                <div class="mt-2 text-on-surface font-headline font-extrabold text-xl">
                    {{ setting('about', 'about_vision', 'Menjadi mitra konstruksi yang dipercaya untuk proyek bernilai strategis di Indonesia.') }}
                </div>
            </div>
            <div class="bg-white rounded-2xl border border-outline-variant/20 shadow-sm p-8">
                <div class="text-xs uppercase tracking-widest font-bold text-on-surface-variant">Misi</div>
                <ul class="mt-4 space-y-3 text-on-surface-variant">
                    @php
                        $defaultMission = [
                            'Menerapkan K3 dan QA/QC secara konsisten di setiap pekerjaan.',
                            'Menjaga ketepatan waktu melalui perencanaan dan kontrol progres.',
                            'Memberikan solusi teknis yang efisien dan terukur.',
                        ];
                        $missionText = setting('about', 'about_mission', implode("\n", $defaultMission));
                        $missionLines = array_values(array_filter(array_map('trim', preg_split("/\\r?\\n/", (string) $missionText))));
                    @endphp
                    @foreach($missionLines as $line)
                        <li class="flex gap-3">
                            <span class="material-symbols-outlined text-primary text-[20px]">check_circle</span>
                            <span>{{ $line }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>
    </div>
</section>

<section class="py-16 bg-surface-container-highest">
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex items-end justify-between gap-6 mb-10">
            <div>
                <div class="text-xs uppercase tracking-widest font-bold text-on-surface-variant">Nilai Kami</div>
                <h2 class="mt-2 font-headline font-extrabold text-2xl md:text-3xl text-on-surface tracking-tight uppercase">
                    Prinsip Kerja
                </h2>
            </div>
            <a href="{{ route('contact') }}" class="text-sm font-bold text-primary hover:underline">Konsultasi Sekarang</a>
        </div>

        @php
            $defaultValues = [
                ['title' => 'Standar K3', 'desc' => 'Keselamatan adalah prioritas utama melalui perencanaan metode kerja aman dan pengawasan ketat di lapangan.'],
                ['title' => 'Pengendalian Mutu', 'desc' => 'Implementasi QA/QC yang konsisten guna memastikan hasil pekerjaan sesuai dengan spesifikasi teknis.'],
                ['title' => 'Ketepatan Waktu', 'desc' => 'Manajemen proyek yang disiplin untuk menjamin penyelesaian pekerjaan sesuai dengan linimasa yang disepakati.'],
                ['title' => 'Integritas', 'desc' => 'Membangun kepercayaan melalui transparansi komunikasi, dokumentasi yang akurat, dan etika bisnis profesional.'],
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($defaultValues as $v)
                <div class="bg-white rounded-2xl border border-outline-variant/20 shadow-sm p-8">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary">verified</span>
                    </div>
                    <div class="mt-5 font-headline font-extrabold text-lg text-on-surface">{{ $v['title'] }}</div>
                    <div class="mt-2 text-on-surface-variant text-sm leading-relaxed">{{ $v['desc'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

