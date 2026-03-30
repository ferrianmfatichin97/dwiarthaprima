<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'Admin Panel') | PT Dwi Artha Prima</title>
    <link rel="icon" type="image/png" href="{{ asset('dap.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Manrope:wght@700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <style type="text/tailwindcss">
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined { font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 24; vertical-align:middle; }
        .sidebar-link { @apply flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium text-slate-400 hover:bg-slate-700 hover:text-white transition-all duration-200; }
        .sidebar-link.active { @apply bg-red-700 text-white shadow-lg; }
        .sidebar-group { @apply rounded-lg; }
        .sidebar-group-summary { @apply flex items-center justify-between gap-3 px-4 py-3 rounded-lg text-sm font-semibold text-slate-300 hover:bg-slate-800 hover:text-white transition-all duration-200 cursor-pointer select-none; }
        .sidebar-sublink { @apply flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium text-slate-400 hover:bg-slate-700 hover:text-white transition-all duration-200 ml-2; }
        .sidebar-sublink.active { @apply bg-red-700 text-white shadow-lg; }
        details[open] .group-chevron { transform: rotate(180deg); }
        .nav-link-inner { @apply flex items-center gap-3; }
        ::-webkit-scrollbar { width: 6px; } ::-webkit-scrollbar-track { background: #1e293b; } ::-webkit-scrollbar-thumb { background: #475569; border-radius: 3px; }
    </style>
</head>
<body class="bg-slate-100 min-h-screen flex">

{{-- SIDEBAR --}}
<aside class="w-64 h-screen bg-slate-900 flex flex-col fixed top-0 left-0 z-50 shadow-2xl" id="sidebar">
    {{-- Logo --}}
    <div class="p-6 border-b border-slate-700/50">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center overflow-hidden">
                <img src="{{ asset('dap.png') }}" alt="DAP" class="h-8 w-auto" loading="eager" decoding="async">
            </div>
            <div>
                <div class="text-white font-bold text-sm font-manrope leading-tight">PT Dwi Artha</div>
                <div class="text-slate-400 text-xs">Admin Panel</div>
            </div>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 min-h-0 p-4 space-y-2 overflow-y-auto overscroll-contain">
        <div class="sidebar-group">
            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="material-symbols-outlined text-xl">dashboard</span>
                <span>Dashboard</span>
            </a>
        </div>

        <details class="sidebar-group" {{ request()->routeIs('admin.pages.home') || request()->routeIs('admin.services.*') || request()->routeIs('admin.clients.*') ? 'open' : '' }}>
            <summary class="sidebar-group-summary">
                <span class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-xl">home</span>
                    <span>Home Page</span>
                </span>
                <span class="material-symbols-outlined text-xl transition-transform group-chevron">expand_more</span>
            </summary>
            <div class="mt-1 space-y-1">
                <a href="{{ route('admin.pages.home') }}"
                   class="sidebar-sublink {{ request()->routeIs('admin.pages.home') ? 'active' : '' }}">
                    <span class="material-symbols-outlined text-xl">web</span>
                    <span>Teks Halaman</span>
                </a>
                <a href="{{ route('admin.services.index') }}"
                   class="sidebar-sublink {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined text-xl">build</span>
                    <span>Layanan</span>
                </a>
                <a href="{{ route('admin.clients.index') }}"
                   class="sidebar-sublink {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined text-xl">handshake</span>
                    <span>Klien (Mitra)</span>
                </a>
            </div>
        </details>

        <details class="sidebar-group" {{ request()->routeIs('admin.pages.about') || request()->routeIs('admin.pages.services') ? 'open' : '' }}>
            <summary class="sidebar-group-summary">
                <span class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-xl">corporate_fare</span>
                    <span>Company Page</span>
                </span>
                <span class="material-symbols-outlined text-xl transition-transform group-chevron">expand_more</span>
            </summary>
            <div class="mt-1 space-y-1">
                <a href="{{ route('admin.pages.about') }}"
                   class="sidebar-sublink {{ request()->routeIs('admin.pages.about') ? 'active' : '' }}">
                    <span class="material-symbols-outlined text-xl">info</span>
                    <span>Teks About</span>
                </a>
                <a href="{{ route('admin.pages.services') }}"
                   class="sidebar-sublink {{ request()->routeIs('admin.pages.services') ? 'active' : '' }}">
                    <span class="material-symbols-outlined text-xl">design_services</span>
                    <span>Teks Services</span>
                </a>
            </div>
        </details>

        <details class="sidebar-group" {{ request()->routeIs('admin.pages.project') || request()->routeIs('admin.projects.*') ? 'open' : '' }}>
            <summary class="sidebar-group-summary">
                <span class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-xl">apartment</span>
                    <span>Project Page</span>
                </span>
                <span class="material-symbols-outlined text-xl transition-transform group-chevron">expand_more</span>
            </summary>
            <div class="mt-1 space-y-1">
                <a href="{{ route('admin.pages.project') }}"
                   class="sidebar-sublink {{ request()->routeIs('admin.pages.project') ? 'active' : '' }}">
                    <span class="material-symbols-outlined text-xl">view_kanban</span>
                    <span>Teks Halaman</span>
                </a>
                <a href="{{ route('admin.projects.index') }}"
                   class="sidebar-sublink {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined text-xl">list_alt</span>
                    <span>Daftar Proyek</span>
                    <span class="ml-auto bg-slate-700 text-slate-300 text-xs px-2 py-0.5 rounded-full">{{ \App\Models\Project::count() }}</span>
                </a>
            </div>
        </details>

        <details class="sidebar-group" {{ request()->routeIs('admin.messages.*') || request()->routeIs('admin.pages.contact') ? 'open' : '' }}>
            <summary class="sidebar-group-summary">
                <span class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-xl">contact_mail</span>
                    <span>Contact Page</span>
                </span>
                <span class="material-symbols-outlined text-xl transition-transform group-chevron">expand_more</span>
            </summary>
            <div class="mt-1 space-y-1">
                <a href="{{ route('admin.messages.index') }}"
                   class="sidebar-sublink {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined text-xl">mail</span>
                    <span>Pesan Masuk</span>
                    @php $unread = \App\Models\Message::where('is_read', false)->count(); @endphp
                    @if($unread > 0)
                    <span class="ml-auto bg-red-600 text-white text-xs px-2 py-0.5 rounded-full animate-pulse">{{ $unread }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.pages.contact') }}"
                   class="sidebar-sublink {{ request()->routeIs('admin.pages.contact') ? 'active' : '' }}">
                    <span class="material-symbols-outlined text-xl">contact_phone</span>
                    <span>Info Kontak</span>
                </a>
            </div>
        </details>

        <div class="pt-3 border-t border-slate-700/50 mt-2">
            <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
                <span class="material-symbols-outlined text-xl">open_in_new</span>
                <span>Lihat Website</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-link w-full text-left hover:bg-red-900/40 hover:text-red-400">
                    <span class="material-symbols-outlined text-xl">logout</span>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </nav>

    {{-- User Info --}}
    <div class="p-4 border-t border-slate-700/50">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-red-700 flex items-center justify-center">
                <span class="text-white text-sm font-bold">{{ substr(auth()->user()->name, 0, 1) }}</span>
            </div>
            <div class="flex-1 min-w-0">
                <div class="text-white text-sm font-semibold truncate">{{ auth()->user()->name }}</div>
                <div class="text-slate-400 text-xs truncate">{{ auth()->user()->email }}</div>
            </div>
        </div>
    </div>
</aside>

{{-- MAIN CONTENT --}}
<div class="flex-1 ml-64 flex flex-col min-h-screen">
    {{-- Top Bar --}}
    <header class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between sticky top-0 z-40 shadow-sm">
        <div>
            <h1 class="text-xl font-bold text-slate-800 font-manrope">@yield('page-title', 'Dashboard')</h1>
            <p class="text-slate-400 text-xs mt-0.5">@yield('page-subtitle', 'PT Dwi Artha Prima Admin Panel')</p>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-slate-400 text-sm">{{ now()->format('l, d F Y') }}</span>
            <div class="w-9 h-9 rounded-full bg-red-700 flex items-center justify-center">
                <span class="text-white text-sm font-bold">{{ substr(auth()->user()->name, 0, 1) }}</span>
            </div>
        </div>
    </header>

    {{-- Flash Messages --}}
    <div class="px-8 pt-6">
        @if(session('success'))
        <div class="mb-4 flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 px-5 py-4 rounded-xl" role="alert">
            <span class="material-symbols-outlined text-green-600">check_circle</span>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
        @endif
        @if($errors->any())
        <div class="mb-4 flex items-start gap-3 bg-red-50 border border-red-200 text-red-800 px-5 py-4 rounded-xl" role="alert">
            <span class="material-symbols-outlined text-red-600 mt-0.5">error</span>
            <ul class="text-sm">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
        @endif
    </div>

    {{-- Page Content --}}
    <main class="flex-1 px-8 pb-8">
        @yield('content')
    </main>
</div>

</body>
</html>
