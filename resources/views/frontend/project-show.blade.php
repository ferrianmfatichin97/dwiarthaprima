@extends('layouts.app')

@php
    $pageTitle = $project->title . ' | PT Dwi Artha Prima';
    $pageDescription = $project->description
        ? \Illuminate\Support\Str::limit(strip_tags($project->description), 160)
        : 'Detail proyek PT Dwi Artha Prima pada bidang konstruksi, infrastruktur, dan engineering.';
@endphp

@section('title', $pageTitle)
@section('meta_description', $pageDescription)

@section('content')
<section class="pt-28 pb-14 bg-surface-container-low">
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex flex-col lg:flex-row gap-10 items-start">
            <div class="flex-1">
                <a href="{{ route('projects') }}" class="inline-flex items-center gap-2 text-sm font-bold text-primary hover:underline">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    Kembali ke Portofolio
                </a>

                <div class="mt-6">
                    <div class="inline-flex items-center gap-2 text-xs uppercase tracking-widest font-bold text-on-surface-variant bg-surface-container-lowest px-3 py-1 rounded-full border border-outline-variant/20">
                        <span class="material-symbols-outlined text-[16px]">domain</span>
                        {{ $project->category }}
                    </div>
                    <h1 class="mt-4 font-headline font-extrabold text-3xl md:text-5xl text-on-surface tracking-tighter uppercase">
                        {{ $project->title }}
                    </h1>
                    @if($project->description)
                        <p class="mt-5 text-on-surface-variant text-lg leading-relaxed">
                            {{ $project->description }}
                        </p>
                    @endif

                    <div class="mt-8 flex flex-wrap gap-3">
                        <span class="inline-flex items-center gap-2 bg-white border border-outline-variant/20 rounded-full px-4 py-2 text-sm text-on-surface-variant">
                            <span class="material-symbols-outlined text-[18px] text-primary">verified</span>
                            QA/QC Terukur
                        </span>
                        <span class="inline-flex items-center gap-2 bg-white border border-outline-variant/20 rounded-full px-4 py-2 text-sm text-on-surface-variant">
                            <span class="material-symbols-outlined text-[18px] text-primary">health_and_safety</span>
                            Standar K3
                        </span>
                        <span class="inline-flex items-center gap-2 bg-white border border-outline-variant/20 rounded-full px-4 py-2 text-sm text-on-surface-variant">
                            <span class="material-symbols-outlined text-[18px] text-primary">schedule</span>
                            Delivery Tepat Waktu
                        </span>
                    </div>

                    <div class="mt-10">
                        <a href="{{ route('contact') }}" class="inline-flex items-center gap-3 bg-primary text-on-primary px-8 py-3 rounded-lg font-headline font-extrabold text-sm uppercase tracking-widest shadow-lg hover:bg-on-primary-fixed-variant transition-colors">
                            Konsultasi Proyek
                            <span class="material-symbols-outlined">arrow_right_alt</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-[520px]">
                <div class="rounded-2xl overflow-hidden border border-outline-variant/20 shadow-sm bg-surface-container">
                    @if($project->image)
                        <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full h-[320px] object-cover">
                    @else
                        <div class="w-full h-[320px] bg-gradient-to-br from-inverse-surface via-on-surface-variant to-on-surface flex items-center justify-center">
                            <span class="material-symbols-outlined text-white/25 text-7xl">apartment</span>
                        </div>
                    @endif
                    <div class="p-6">
                        <div class="text-xs uppercase tracking-widest font-bold text-on-surface-variant">Ringkasan</div>
                        <div class="mt-2 grid grid-cols-2 gap-4 text-sm">
                            <div class="bg-white rounded-xl border border-outline-variant/20 p-4">
                                <div class="text-on-surface-variant text-xs font-bold uppercase tracking-widest">Kategori</div>
                                <div class="mt-1 font-bold text-on-surface">{{ $project->category }}</div>
                            </div>
                            <div class="bg-white rounded-xl border border-outline-variant/20 p-4">
                                <div class="text-on-surface-variant text-xs font-bold uppercase tracking-widest">Update</div>
                                <div class="mt-1 font-bold text-on-surface">{{ $project->updated_at->format('d M Y') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($related->count())
<section class="py-16 bg-surface">
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex items-end justify-between gap-6 mb-8">
            <div>
                <div class="text-xs uppercase tracking-widest font-bold text-on-surface-variant">Rekomendasi</div>
                <h2 class="mt-2 font-headline font-extrabold text-2xl md:text-3xl text-on-surface tracking-tight uppercase">
                    Proyek Serupa
                </h2>
            </div>
            <a href="{{ route('projects') }}" class="text-sm font-bold text-primary hover:underline">Lihat semua</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($related as $p)
                <a href="{{ route('projects.show', $p->slug) }}" class="group block rounded-2xl overflow-hidden border border-outline-variant/20 bg-surface-container hover:shadow-md transition">
                    <div class="aspect-video overflow-hidden">
                        @if($p->image)
                            <img src="{{ Storage::url($p->image) }}" alt="{{ $p->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-inverse-surface via-on-surface-variant to-on-surface flex items-center justify-center">
                                <span class="material-symbols-outlined text-white/25 text-6xl">apartment</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="text-xs uppercase tracking-widest font-bold text-primary">{{ $p->category }}</div>
                        <div class="mt-2 font-headline font-extrabold text-lg text-on-surface">{{ $p->title }}</div>
                        @if($p->description)
                            <div class="mt-2 text-sm text-on-surface-variant line-clamp-2">{{ $p->description }}</div>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

