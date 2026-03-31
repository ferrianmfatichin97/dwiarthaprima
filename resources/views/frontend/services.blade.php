@extends('layouts.app')

@section('title', 'Layanan | PT Dwi Artha Prima')
@section('meta_description', 'Layanan PT Dwi Artha Prima: konstruksi infrastruktur, gedung, engineering, general contractor, maintenance, pengadaan, dan QA/QC. Konsultasikan kebutuhan proyek Anda.')

@section('content')
<section class="pt-28 pb-16 bg-surface-container-low">
    <div class="max-w-7xl mx-auto px-8">
        <div class="max-w-4xl">
            <div class="text-xs uppercase tracking-widest font-bold text-primary">Layanan</div>
            <h1 class="mt-4 font-headline font-extrabold text-4xl md:text-6xl text-on-surface tracking-tighter uppercase">
                {{ setting('services', 'services_hero_title', 'Layanan Terintegrasi untuk Proyek Konstruksi') }}
            </h1>
            <p class="mt-5 text-on-surface-variant text-lg leading-relaxed">
                {{ setting('services', 'services_hero_desc', 'Dari perencanaan hingga pelaksanaan — kami menyediakan layanan konstruksi dan engineering dengan fokus pada mutu, keselamatan, dan ketepatan waktu.') }}
            </p>
        </div>
    </div>
</section>

<section class="py-16 bg-surface">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($services as $service)
                <div data-reveal class="reveal bg-white rounded-2xl border border-outline-variant/20 shadow-sm p-8 hover:shadow-md transition">
                    <div class="w-14 h-14 rounded-2xl bg-primary/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-3xl">{{ $service->icon }}</span>
                    </div>
                    <h2 class="mt-6 font-headline font-extrabold text-xl text-on-surface">{{ $service->name }}</h2>
                    <p class="mt-3 text-on-surface-variant text-sm leading-relaxed">{{ $service->description }}</p>
                </div>
            @empty
                <div class="col-span-4 text-center py-20">
                    <span class="material-symbols-outlined text-7xl block mb-4 opacity-20 text-on-surface">build</span>
                    <p class="text-on-surface-variant font-medium">Belum ada layanan tersedia.</p>
                    <p class="text-on-surface-variant/80 text-sm mt-2">Tambahkan layanan dari Admin Panel agar halaman ini terisi.</p>
                    <a href="{{ route('contact') }}" class="mt-6 inline-flex items-center gap-2 text-primary font-bold hover:underline">
                        Konsultasi kebutuhan proyek
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="py-16 bg-surface-container-highest">
    <div class="max-w-7xl mx-auto px-8 flex flex-col md:flex-row items-center justify-between gap-10">
        <div class="max-w-2xl">
            <h2 class="font-headline font-extrabold text-2xl md:text-4xl text-on-surface tracking-tight uppercase">
                {{ setting('services', 'services_cta_title', 'Butuh estimasi dan masukan teknis?') }}
            </h2>
            <p class="mt-4 text-on-surface-variant text-lg leading-relaxed">
                {{ setting('services', 'services_cta_desc', 'Kirim kebutuhan proyek Anda, kami bantu susun rencana kerja awal dan estimasi yang realistis.') }}
            </p>
        </div>
        <a href="{{ route('contact') }}" class="inline-flex items-center gap-3 bg-primary text-on-primary px-10 py-4 rounded-lg font-headline font-extrabold text-sm uppercase tracking-widest shadow-lg hover:bg-on-primary-fixed-variant transition-colors">
            Konsultasi Sekarang
            <span class="material-symbols-outlined">arrow_right_alt</span>
        </a>
    </div>
</section>
@endsection

