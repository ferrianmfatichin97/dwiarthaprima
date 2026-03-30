@extends('layouts.app')

@section('title', 'Kontak | PT Dwi Artha Prima')
@section('meta_description', 'Hubungi PT Dwi Artha Prima untuk konsultasi proyek konstruksi, infrastruktur, dan engineering. Tim kami siap membantu kebutuhan proyek Anda.')

@section('content')
<section class="pt-28 pb-16 bg-surface-container-low">
    <div class="max-w-7xl mx-auto px-8">
        <div class="max-w-3xl">
            <h1 class="font-headline font-extrabold text-4xl md:text-6xl text-on-surface tracking-tighter uppercase">
                Kontak Kami
            </h1>
            <p class="mt-4 text-on-surface-variant text-lg leading-relaxed">
                Sampaikan kebutuhan proyek Anda. Kami akan merespons secepatnya untuk membantu perencanaan dan eksekusi yang tepat.
            </p>
        </div>
    </div>
</section>

<section class="py-16 bg-surface">
    <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 lg:grid-cols-12 gap-10">
        <div class="lg:col-span-7 bg-white rounded-2xl border border-surface-container-high shadow-sm p-8">
            <h2 class="font-headline font-extrabold text-2xl text-on-surface tracking-tight">Kirim Pesan</h2>
            <p class="mt-2 text-on-surface-variant">Isi form berikut agar tim kami dapat menghubungi Anda.</p>

            @if (session('success'))
                <div class="mt-6 rounded-lg border border-green-200 bg-green-50 text-green-800 px-4 py-3 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mt-6 rounded-lg border border-red-200 bg-red-50 text-red-800 px-4 py-3 text-sm">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="mt-8 space-y-5">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Nama</label>
                        <input name="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3 rounded-lg bg-surface-container-lowest border border-outline-variant/30 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"
                               placeholder="Nama lengkap" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-on-surface mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-3 rounded-lg bg-surface-container-lowest border border-outline-variant/30 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"
                               placeholder="nama@perusahaan.com" />
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-on-surface mb-2">Subjek</label>
                    <input name="subject" value="{{ old('subject') }}" required
                           class="w-full px-4 py-3 rounded-lg bg-surface-container-lowest border border-outline-variant/30 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"
                           placeholder="Konsultasi proyek / penawaran / kerja sama" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-on-surface mb-2">Pesan</label>
                    <textarea name="message" rows="6" required
                              class="w-full px-4 py-3 rounded-lg bg-surface-container-lowest border border-outline-variant/30 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"
                              placeholder="Jelaskan kebutuhan proyek Anda...">{{ old('message') }}</textarea>
                    <p class="mt-2 text-xs text-on-surface-variant">Maksimal 5000 karakter.</p>
                </div>

                <div class="pt-2">
                    <button type="submit"
                            class="inline-flex items-center gap-3 bg-primary text-on-primary px-8 py-3 rounded-lg font-headline font-extrabold text-sm uppercase tracking-widest shadow-lg hover:bg-on-primary-fixed-variant transition-colors">
                        Kirim Pesan
                        <span class="material-symbols-outlined">send</span>
                    </button>
                </div>
            </form>
        </div>

        <aside class="lg:col-span-5 space-y-6">
            <div class="bg-white rounded-2xl border border-surface-container-high shadow-sm p-8">
                <h2 class="font-headline font-extrabold text-2xl text-on-surface tracking-tight">Informasi</h2>
                <div class="mt-6 space-y-4 text-on-surface-variant">
                    <div class="flex gap-3">
                        <span class="material-symbols-outlined text-primary">mail</span>
                        <div>
                            <div class="text-sm font-semibold text-on-surface">Email</div>
                            <div class="text-sm">admin@dwiarthaprima.com</div>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <span class="material-symbols-outlined text-primary">call</span>
                        <div>
                            <div class="text-sm font-semibold text-on-surface">Telepon</div>
                            <div class="text-sm">+62 21 555 123</div>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <span class="material-symbols-outlined text-primary">schedule</span>
                        <div>
                            <div class="text-sm font-semibold text-on-surface">Jam Operasional</div>
                            <div class="text-sm">Senin–Jumat, 08:00–17:00 WIB</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-surface-container-highest rounded-2xl border border-outline-variant/20 p-8">
                <h3 class="font-headline font-extrabold text-xl text-on-surface tracking-tight">Butuh respons cepat?</h3>
                <p class="mt-2 text-on-surface-variant">Silakan chat via WhatsApp untuk pertanyaan awal.</p>
                <a href="https://wa.me/6221555123" target="_blank" rel="noopener"
                   class="mt-5 inline-flex items-center gap-3 bg-[#25D366] text-white px-6 py-3 rounded-lg font-headline font-extrabold text-sm uppercase tracking-widest shadow-lg hover:brightness-95 transition">
                    WhatsApp
                    <span class="material-symbols-outlined">chat</span>
                </a>
            </div>
        </aside>
    </div>
</section>
@endsection

