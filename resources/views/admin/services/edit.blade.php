@extends('layouts.admin')
@section('title','Edit Layanan')
@section('page-title','Edit Layanan')
@section('page-subtitle','Perbarui data layanan')

@section('content')
<div class="mt-2 max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
        <form action="{{ route('admin.services.update', $service) }}" method="POST" class="space-y-6">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Layanan *</label>
                <input type="text" name="name" value="{{ old('name', $service->name) }}" required
                       class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent @error('name') border-red-400 @enderror"/>
                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Google Material Icon Name *</label>
                <div class="flex gap-4 items-start">
                    <div class="flex-1">
                        <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" id="icon-input" required
                               class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent @error('icon') border-red-400 @enderror"/>
                        @error('icon')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div class="w-16 h-12 bg-slate-50 border border-slate-200 rounded-lg flex items-center justify-center">
                        <span id="icon-preview" class="material-symbols-outlined text-slate-600 text-2xl">{{ old('icon', $service->icon) }}</span>
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Layanan *</label>
                <textarea name="description" rows="4" required
                          class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent @error('description') border-red-400 @enderror">{{ old('description', $service->description) }}</textarea>
                @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="flex items-center gap-4 pt-4 border-t border-slate-100">
                <button type="submit" class="bg-red-700 hover:bg-red-800 text-white px-8 py-3 rounded-lg text-sm font-semibold transition-colors">Perbarui Layanan</button>
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
