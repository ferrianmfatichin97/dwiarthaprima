@extends('layouts.admin')
@section('title','Tambah Layanan')
@section('page-title','Tambah Layanan')
@section('page-subtitle','Buat layanan baru yang ditawarkan perusahaan')

@section('content')
<div class="mt-2 max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
        <form action="{{ route('admin.services.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Layanan *</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent @error('name') border-red-400 @enderror"
                       placeholder="e.g. General Contractor"/>
                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Google Material Icon Name *</label>
                <div class="flex gap-4 items-start">
                    <div class="flex-1">
                        <input type="text" name="icon" value="{{ old('icon', 'build') }}" id="icon-input" required
                               class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent @error('icon') border-red-400 @enderror"
                               placeholder="e.g. engineering, architecture, foundation"/>
                        @error('icon')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        <p class="text-xs text-slate-400 mt-2">Cari nama icon di <a href="https://fonts.google.com/icons" target="_blank" class="text-blue-600 hover:underline">Google Fonts</a></p>
                    </div>
                    <div class="w-16 h-12 bg-slate-50 border border-slate-200 rounded-lg flex items-center justify-center">
                        <span id="icon-preview" class="material-symbols-outlined text-slate-600 text-2xl">build</span>
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Layanan *</label>
                <textarea name="description" rows="4" required
                          class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent @error('description') border-red-400 @enderror"
                          placeholder="Deskripsi singkat mengenai layanan ini...">{{ old('description') }}</textarea>
                @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="flex items-center gap-4 pt-4 border-t border-slate-100">
                <button type="submit" class="bg-red-700 hover:bg-red-800 text-white px-8 py-3 rounded-lg text-sm font-semibold transition-colors">Simpan Layanan</button>
                <a href="{{ route('admin.services.index') }}" class="text-slate-500 hover:text-slate-700 text-sm font-medium">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
document.getElementById('icon-input').addEventListener('input', function(e) {
    document.getElementById('icon-preview').textContent = e.target.value.trim() || 'build';
});
</script>
@endsection
