@extends('layouts.admin')
@section('title','Setting About Page')
@section('page-title','Teks Halaman About')
@section('page-subtitle','Atur judul, deskripsi, visi, dan misi perusahaan')

@section('content')
<div class="mt-2 max-w-3xl">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
        <form action="{{ route('admin.pages.store', 'about') }}" method="POST" class="space-y-8">
            @csrf

            <div>
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2 mb-4">Hero Section</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Judul (Hero Title)</label>
                        <input type="text" name="about_hero_title" value="{{ $settings['about_hero_title'] ?? '' }}"
                               class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent"/>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi (Hero Description)</label>
                        <textarea name="about_hero_desc" rows="3"
                                  class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent">{{ $settings['about_hero_desc'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2 mb-4">Cerita Perusahaan</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Judul</label>
                        <input type="text" name="about_story_title" value="{{ $settings['about_story_title'] ?? '' }}"
                               class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent"/>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi</label>
                        <textarea name="about_story_desc" rows="6"
                                  class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent">{{ $settings['about_story_desc'] ?? '' }}</textarea>
                        <p class="text-xs text-slate-500 mt-2">Gunakan baris baru untuk pemisah paragraf.</p>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2 mb-4">Visi & Misi</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Visi</label>
                        <textarea name="about_vision" rows="3"
                                  class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent">{{ $settings['about_vision'] ?? '' }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Misi</label>
                        <textarea name="about_mission" rows="5"
                                  class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent">{{ $settings['about_mission'] ?? '' }}</textarea>
                        <p class="text-xs text-slate-500 mt-2">Tulis 1 misi per baris (akan tampil sebagai bullet).</p>
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100">
                <button type="submit" class="bg-red-700 hover:bg-red-800 text-white px-8 py-3 rounded-lg text-sm font-semibold transition-colors shadow-sm">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

