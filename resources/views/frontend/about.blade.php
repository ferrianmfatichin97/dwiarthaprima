@extends('layouts.app')

@section('title', 'Tentang Kami | PT Dwi Artha Prima')
@section('meta_description', 'Profil PT Dwi Artha Prima: perusahaan konstruksi, infrastruktur, dan engineering. Komitmen pada K3, mutu (QA/QC), dan delivery tepat waktu.')

@section('content')
<section class="pt-28 pb-16 bg-surface-container-low">
    <div class="max-w-7xl mx-auto px-8">
        <div class="max-w-4xl">
            <div class="text-xs uppercase tracking-widest font-bold text-primary">Company Profile</div>
            <h1 class="mt-4 font-headline font-extrabold text-4xl md:text-6xl text-on-surface tracking-tighter uppercase">
                {{ setting('about', 'about_hero_title', 'Mitra Konstruksi & Engineering yang Terukur') }}
            </h1>
            <p class="mt-5 text-on-surface-variant text-lg leading-relaxed">
                {{ setting('about', 'about_hero_desc', 'Kami membantu mewujudkan pekerjaan konstruksi dan infrastruktur dengan standar K3, QA/QC, dan manajemen proyek yang disiplin—sehingga hasilnya andal dan tepat waktu.') }}
            </p>
        </div>
    </div>
</section>

<section class="py-16 bg-surface">
    <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 lg:grid-cols-12 gap-12">
        <div class="lg:col-span-7">
            <h2 class="font-headline font-extrabold text-2xl md:text-3xl text-on-surface tracking-tight uppercase">
                {{ setting('about', 'about_story_title', 'Cerita Perusahaan') }}
            </h2>
            <p class="mt-4 text-on-surface-variant text-lg leading-relaxed whitespace-pre-line">
                {{ setting('about', 'about_story_desc', "PT Dwi Artha Prima berfokus pada pekerjaan konstruksi, infrastruktur, dan jasa engineering. Kami mengutamakan perencanaan yang rapi, kontrol mutu yang konsisten, serta komunikasi progres yang transparan.\n\nPendekatan kami menekankan keselamatan kerja, ketertelusuran material, dan dokumentasi yang baik agar pekerjaan dapat dipertanggungjawabkan.") }}
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
            <a href="{{ route('contact') }}" class="text-sm font-bold text-primary hover:underline">Hubungi kami</a>
        </div>

        @php
            $defaultValues = [
                ['title' => 'Safety First', 'desc' => 'K3 adalah fondasi utama: perencanaan, APD, dan pengawasan di lapangan.'],
                ['title' => 'Quality Assurance', 'desc' => 'Inspeksi dan pengujian mutu untuk memastikan hasil sesuai spesifikasi.'],
                ['title' => 'On-Time Delivery', 'desc' => 'Kontrol schedule dan progres yang disiplin untuk menjaga komitmen waktu.'],
                ['title' => 'Transparansi', 'desc' => 'Komunikasi progres, risiko, dan dokumentasi proyek yang jelas.'],
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

