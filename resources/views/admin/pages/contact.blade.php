@extends('layouts.admin')
@section('title','Setting Contact Info')
@section('page-title','Informasi Kontak')
@section('page-subtitle','Atur email, telepon, WhatsApp, alamat, dan jam operasional')

@section('content')
<div class="mt-2 max-w-3xl">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
        <form action="{{ route('admin.pages.store', 'contact') }}" method="POST" class="space-y-8">
            @csrf

            <div>
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2 mb-4">Kontak Utama</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                        <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}"
                               class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent"
                               placeholder="info@perusahaan.com"/>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Telepon</label>
                        <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}"
                               class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent"
                               placeholder="+62 21 555 0123"/>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">WhatsApp (link)</label>
                        <input type="text" name="contact_whatsapp" value="{{ $settings['contact_whatsapp'] ?? '' }}"
                               class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent"
                               placeholder="https://wa.me/62xxxxxxxxxxx"/>
                        <p class="text-xs text-slate-500 mt-2">Dipakai untuk tombol WhatsApp di halaman contact.</p>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-2 mb-4">Alamat & Operasional</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Alamat</label>
                        <textarea name="contact_address" rows="3"
                                  class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                  placeholder="Alamat kantor...">{{ $settings['contact_address'] ?? '' }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Jam Operasional</label>
                        <input type="text" name="contact_hours" value="{{ $settings['contact_hours'] ?? '' }}"
                               class="w-full border border-slate-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent"
                               placeholder="Senin–Jumat, 08:00–17:00 WIB"/>
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

