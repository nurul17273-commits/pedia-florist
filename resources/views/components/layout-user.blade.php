<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'PediaFlorist Pro' }}</title>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body { font-family: 'Outfit', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 antialiased overflow-x-hidden">

<!-- 🔥 GLOBAL STATE -->
<div x-data="{ confirmLogout: false }">

<nav class="bg-white/90 backdrop-blur-md sticky top-0 z-50 shadow-sm border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- LOGO -->
        <div class="flex items-center gap-2">
            <div class="p-2.5 bg-blue-600 rounded-xl text-white">
                <i class="fas fa-seedling"></i>
            </div>
            <a href="/" class="text-blue-700 font-extrabold text-3xl">PediaFlorist</a>
        </div>

        <!-- MENU -->
<div class="hidden md:flex space-x-9 text-[15px] font-semibold text-slate-500">
            @php
$navMenus = [
    ['label' => 'Beranda', 'url' => 'beranda'],
    ['label' => 'Panduan', 'url' => 'panduan'],
    ['label' => 'Jenis Bunga', 'url' => 'jenis'],
    ['label' => 'Jadwal', 'url' => 'jadwal'],
    ['label' => 'Chat', 'url' => 'chat'],   // 🔥 TAMBAHAN INI
    ['label' => 'Tentang', 'url' => 'tentang'],
];
            @endphp

            @foreach($navMenus as $menu)
                @php
                    // Cek apakah url saat ini aktif
                    $isActive = request()->is($menu['url']) || request()->is(ltrim($menu['url'], '/'));
                @endphp

                <a href="/{{ $menu['url'] }}"
                   class="relative py-2 transition-all duration-300 group {{ $isActive ? 'text-blue-600' : 'hover:text-slate-900' }}">
                    {{ $menu['label'] }}

                    {{-- Indikator Garis Bawah Estetik --}}
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 rounded-full transition-all duration-300 {{ $isActive ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0 group-hover:opacity-50 group-hover:scale-x-100' }}"></span>
                </a>
            @endforeach
        </div>

        <!-- AUTH -->
@php
    $userEmail = Auth::check()
        ? Auth::user()->email
        : (session('user.email') ?? null);
@endphp

@if($userEmail)
<div class="relative" x-data="{ open: false }">

    <!-- AVATAR -->
    <button @click="open = !open"
        class="w-11 h-11 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold uppercase shadow-lg">
        {{ strtoupper(substr($userEmail, 0, 1)) }}
    </button>

    <!-- DROPDOWN -->
    <div x-show="open" @click.outside="open = false"
        x-transition
        class="absolute right-0 mt-4 w-64 bg-white rounded-3xl shadow-2xl border overflow-hidden z-50">

        <div class="px-5 py-4 bg-slate-50 border-b">
            <p class="text-xs text-slate-400">Login sebagai</p>
            <p class="text-sm font-semibold truncate">
                {{ $userEmail }}
            </p>
        </div>

        <div class="p-2">
            <button @click="confirmLogout = true; open=false"
                class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold text-red-500 hover:bg-red-50">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </button>
        </div>
    </div>
</div>
@else
<a href="/" class="bg-blue-600 text-white px-7 py-2.5 rounded-full font-semibold text-sm">
    Masuk
</a>
@endif

    </div>
</nav>

<!-- 🔥 MODAL LOGOUT -->
<div x-show="confirmLogout" x-cloak
     x-transition
     class="fixed inset-0 flex items-center justify-center z-[9999]"
     x-cloak>

    <!-- BLUR -->
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"
         @click="confirmLogout = false"></div>

    <!-- BOX -->
    <div class="relative bg-white w-full max-w-md mx-4 rounded-[2rem] shadow-2xl p-8 text-center"
         x-transition>

        <div class="w-16 h-16 mx-auto mb-5 flex items-center justify-center rounded-full bg-red-100 text-red-500 text-2xl">
            <i class="fas fa-sign-out-alt"></i>
        </div>

        <h2 class="text-xl font-black mb-2">Keluar dari akun?</h2>
        <p class="text-slate-500 text-sm mb-6">
            Kamu akan keluar dan perlu login kembali.
        </p>

        <div class="flex gap-3">
            <button @click="confirmLogout = false"
                class="w-1/2 py-3 rounded-xl bg-slate-100 font-semibold">
                Tidak
            </button>

            <form method="POST" action="/logout" class="w-1/2">
                @csrf
                <button type="submit"
                    class="w-full py-3 rounded-xl bg-red-500 text-white font-semibold">
                    Ya
                </button>
            </form>
        </div>
    </div>
</div>

<!-- CONTENT -->
<main>
    {{ $slot }}
</main>
<footer class="bg-white border-t border-slate-100 pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">

            <div class="col-span-1 md:col-span-1">
                <div class="flex items-center gap-2 mb-6">
                    <div class="p-2 bg-blue-600 rounded-lg text-white text-xs">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <span class="text-slate-900 font-extrabold text-xl tracking-tight">Pedia<span class="text-blue-600">Florist.</span></span>
                </div>
                <p class="text-slate-500 text-sm leading-relaxed mb-6">
                    Pendamping setia untuk setiap tunas yang tumbuh. Memberikan edukasi botani berbasis teknologi untuk masa depan yang lebih hijau.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="w-9 h-9 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition-all"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="w-9 h-9 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition-all"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="w-9 h-9 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 hover:bg-blue-600 hover:text-white transition-all"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <div>
                <h4 class="text-slate-900 font-bold text-sm uppercase tracking-[0.15em] mb-6">Eksplorasi</h4>
                <ul class="space-y-4 text-sm font-medium text-slate-500">
                    <li><a href="/beranda" class="hover:text-blue-600 transition-colors">Beranda</a></li>
                    <li><a href="/panduan" class="hover:text-blue-600 transition-colors">Panduan Perawatan</a></li>
                    <li><a href="/jenis" class="hover:text-blue-600 transition-colors">Katalog Bunga</a></li>
                    <li><a href="/jadwal" class="hover:text-blue-600 transition-colors">Penjadwalan Siram</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-slate-900 font-bold text-sm uppercase tracking-[0.15em] mb-6">Bantuan</h4>
                <ul class="space-y-4 text-sm font-medium text-slate-500">
                    <li><a href="/faq" class="hover:text-blue-600 transition-colors">FAQ</a></li>
                    <li><a href="/syarat" class="hover:text-blue-600 transition-colors">Syarat & Ketentuan</a></li>
                    <li><a href="/kontak" class="hover:text-blue-600 transition-colors">Kontak</a></li>
                </ul>
            </div>

            <div class="bg-slate-50 p-6 rounded-[2rem] border border-slate-100">
                <h4 class="text-slate-900 font-bold text-sm mb-2 italic">Tips Hijau Mingguan</h4>
                <p class="text-slate-500 text-[12px] mb-4">Dapatkan tips perawatan tanaman langsung di inbox kamu.</p>
                <div class="relative">
                    <input type="email" placeholder="Email kamu..." class="w-full pl-4 pr-10 py-2.5 bg-white border border-slate-200 rounded-xl text-xs outline-none focus:ring-2 focus:ring-blue-600/10">
                    <button class="absolute right-1.5 top-1.5 w-7 h-7 bg-blue-600 text-white rounded-lg flex items-center justify-center text-[10px]">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>

        </div>
</footer>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init({ once: true });
</script>

</body>
</html>
