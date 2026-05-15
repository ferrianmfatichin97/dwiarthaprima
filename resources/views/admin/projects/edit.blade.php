@extends('layouts.admin')
@section('title','Ubah Data Proyek')
@section('page-title','Ubah Data Proyek')
@section('page-subtitle','Perbarui informasi detail data proyek.')

@section('content')
<div class="mt-2 max-w-3xl">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Proyek *</label>
                    <input type="text" name="title" value="{{ old('title', $project->title) }}"
                           class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent @error('title') border-red-400 @enderror"
                           required/>
                    @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Klien / Instansi</label>
                    <input type="text" name="client_name" value="{{ old('client_name', $project->client_name) }}"
                           class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                           placeholder="Nama Pemilik Proyek"/>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Lokasi Proyek</label>
                    <input type="text" name="location" value="{{ old('location', $project->location) }}"
                           class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                           placeholder="Contoh: Depok, Jawa Barat"/>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tahun Pelaksanaan / Durasi</label>
                    <input type="text" name="year" value="{{ old('year', $project->year) }}"
                           class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                           placeholder="Contoh: 2023 atau 2023 - 2024"/>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Kategori *</label>
                    <input type="text" name="category" value="{{ old('category', $project->category) }}"
                           class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent @error('category') border-red-400 @enderror"
                           required/>
                    @error('category')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Ringkas (Summary)</label>
                <textarea name="description" rows="2"
                          class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">{{ old('description', $project->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Cakupan Pekerjaan (Technical Scope)</label>
                <textarea name="project_scope" rows="5"
                          class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                          placeholder="Rincian teknis cakupan pekerjaan (Scope of Work)...">{{ old('project_scope', $project->project_scope) }}</textarea>
                <p class="text-xs text-slate-400 mt-2 italic">Gunakan baris baru untuk memisahkan poin pekerjaan.</p>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Gambar Proyek</label>
                @if($project->image)
                <div class="mb-4">
                    <p class="text-xs text-slate-400 mb-2">Lampiran gambar saat ini:</p>
                    <div class="aspect-video w-64 rounded-xl overflow-hidden">
                        <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover" alt="{{ $project->title }}">
                    </div>
                </div>
                @endif
                <div class="border-2 border-dashed border-slate-200 rounded-xl p-6 text-center hover:border-red-400 transition-colors cursor-pointer" onclick="document.getElementById('image').click()">
                    <div id="preview-placeholder">
                        <span class="material-symbols-outlined text-slate-300 text-4xl">add_photo_alternate</span>
                        <p class="text-slate-400 text-sm mt-2">{{ $project->image ? 'Klik untuk ganti gambar' : 'Klik untuk unggah gambar' }}</p>
                        <p class="text-slate-300 text-xs mt-1">JPG, PNG, WEBP • Max 2MB • Rekomendasi 16:9</p>
                    </div>
                    <img id="image-preview" src="" class="hidden max-h-48 mx-auto rounded-lg object-cover" alt="Preview"/>
                </div>
                <input type="file" name="image" id="image" class="hidden" accept="image/jpeg,image/png,image/webp" onchange="previewImage(this)"/>
                <div class="mt-3 bg-blue-50/50 p-3 rounded-lg border border-blue-100 flex items-start gap-2">
                    <span class="material-symbols-outlined text-blue-500 text-lg mt-0.5">info</span>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        <strong class="text-slate-700">Tips Unggah:</strong> Gunakan format <span class="font-semibold">JPG, PNG, atau WEBP</span> (Maksimal 2MB).<br>
                        Untuk hasil terbaik tanpa terpotong, gunakan <strong>Rasio 16:9</strong> dengan resolusi ideal <span class="font-semibold text-blue-700">1280 x 720 pixel</span>.
                    </p>
                </div>
                @error('image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="pt-6 border-t border-slate-100">
                <label class="block text-sm font-semibold text-slate-700 mb-4">Galeri Foto Proyek</label>
                
                {{-- List Gambar yang Sudah Ada --}}
                @if($project->images->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    @foreach($project->images as $img)
                    <div class="relative group aspect-square rounded-lg overflow-hidden border border-slate-200">
                        <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-full object-cover" alt="Gallery">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <button type="button" onclick="confirmDeleteGallery('{{ route('admin.projects.gallery.destroy', $img) }}')" 
                                    class="bg-red-600 text-white p-2 rounded-full hover:bg-red-700 shadow-lg">
                                <span class="material-symbols-outlined text-sm">delete</span>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

                {{-- Input Upload Baru --}}
                <div class="space-y-2">
                    <p class="text-xs text-slate-400">Unggah foto tambahan (Bisa banyak sekaligus):</p>
                    <input type="file" name="gallery[]" class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 transition-all"
                           multiple accept="image/jpeg,image/png,image/webp"/>
                    @error('gallery.*')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_featured" id="is_featured" class="w-4 h-4 text-red-600 rounded" {{ $project->is_featured ? 'checked' : '' }}>
                <label for="is_featured" class="text-sm font-medium text-slate-700">Tampilkan sebagai Proyek Unggulan</label>
            </div>
            <div class="flex items-center gap-4 pt-4 border-t border-slate-100">
                <button type="submit" class="bg-red-700 hover:bg-red-800 text-white px-8 py-3 rounded-lg text-sm font-semibold transition-colors">Simpan Perubahan</button>
                <a href="{{ route('admin.projects.index') }}" class="text-slate-500 hover:text-slate-700 text-sm font-medium">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
function previewImage(input) {
    const preview = document.getElementById('image-preview');
    const placeholder = document.getElementById('preview-placeholder');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { preview.src = e.target.result; preview.classList.remove('hidden'); placeholder.classList.add('hidden'); };
        reader.readAsDataURL(input.files[0]);
    }
}
function confirmDeleteGallery(url) {
    if (confirm('Apakah Anda yakin ingin menghapus foto galeri ini?')) {
        const form = document.getElementById('delete-gallery-form');
        form.action = url;
        form.submit();
    }
}
</script>

<form id="delete-gallery-form" method="POST" class="hidden">
    @csrf @method('DELETE')
</form>
@endsection
