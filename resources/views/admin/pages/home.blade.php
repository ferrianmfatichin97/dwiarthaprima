@extends('layouts.admin')
@section('title','Setting Home Page')
@section('page-title','Teks Halaman Beranda (Home)')
@section('page-subtitle','Atur teks pembuka, visi misi, dan deskripsi di halaman depan')

@section('content')
<div class="mt-2 max-w-3xl">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
        <form action="{{ route('admin.pages.store', 'home') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            
            {{-- Section: Hero Banner --}}
            <div>
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2 mb-4">Area Hero Banner (Paling Atas)</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Video Belakang Layar (Background Video)</label>
                        @if(!empty($settings['home_hero_video']))
                        <div class="mb-3">
                            <p class="text-xs text-slate-500 mb-1">Video yang terpasang saat ini:</p>
                            <video src="{{ \Illuminate\Support\Facades\Storage::url($settings['home_hero_video']) }}" class="h-32 rounded-lg border border-slate-200" muted playsinline></video>
                        </div>
                        @endif
                        <input type="file" name="home_hero_video" accept="video/mp4,video/webm"
                               class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent"/>
                        <p class="text-xs text-slate-500 mt-2">Format: MP4/WebM. Max 20MB. Direkomendasikan tanpa suara (muted), durasi pendek (5–10 detik), dan bitrate tidak besar agar tetap ringan.</p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Poster Video (opsional)</label>
                        @if(!empty($settings['home_hero_video_poster']))
                        <div class="mb-3">
                            <p class="text-xs text-slate-500 mb-1">Poster yang terpasang saat ini:</p>
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($settings['home_hero_video_poster']) }}" alt="Poster hero" class="h-32 w-auto rounded-lg border border-slate-200"/>
                        </div>
                        @endif
                        <input type="file" name="home_hero_video_poster" accept="image/png,image/jpeg,image/webp"
                               class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent"/>
                        <p class="text-xs text-slate-500 mt-2">Dipakai sebagai gambar awal (supaya halaman terasa cepat). Max 4MB.</p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Besar (Hero Title)</label>
                        <input type="text" name="home_hero_title" value="{{ $settings['home_hero_title'] ?? 'PT Dwi Artha Prima' }}"
                               class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent"/>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Sub-Judul (Hero Subtitle)</label>
                        <input type="text" name="home_hero_subtitle" value="{{ $settings['home_hero_subtitle'] ?? 'Solusi Konstruksi dan Jasa Terpercaya' }}"
                               class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent"/>
                    </div>
                </div>
            </div>

            {{-- Section: Tentang Kami --}}
            <div>
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2 mb-4">Area Tentang Kami (About Us)</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Paragraf</label>
                        <input type="text" name="home_about_title" value="{{ $settings['home_about_title'] ?? 'Membangun Masa Depan Dengan Presisi.' }}"
                               class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent"/>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Isi Paragraf Profil</label>
                        <textarea name="home_about_desc" rows="4"
                                  class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent">{{ $settings['home_about_desc'] ?? 'PT Dwi Artha Prima adalah mitra strategis dalam sektor konstruksi dan infrastruktur di Indonesia. Kami menghadirkan integritas, inovasi, dan kualitas kelas dunia dalam setiap proyek yang kami tangani, dari skala menengah hingga mega-proyek nasional.' }}</textarea>
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100">
                <button type="submit" class="bg-red-700 hover:bg-red-800 text-white px-8 py-3 rounded-lg text-sm font-semibold transition-colors shadow-sm">
                    Simpan Perubahan Teks
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
