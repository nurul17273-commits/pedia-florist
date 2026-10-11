<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - PediaFlorist Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
        [x-cloak] { display: none !important; }

        /* Animasi Ikon Mekar */
        @keyframes bloom {
            0% { transform: scale(1) rotate(0deg); filter: drop-shadow(0 0 0px rgba(59, 130, 246, 0)); }
            50% { transform: scale(1.15) rotate(10deg); filter: drop-shadow(0 0 10px rgba(59, 130, 246, 0.5)); }
            100% { transform: scale(1) rotate(0deg); filter: drop-shadow(0 0 0px rgba(59, 130, 246, 0)); }
        }
        .animate-bloom { animation: bloom 3s ease-in-out infinite; display: inline-block; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased overflow-x-hidden">

    <div class="flex min-h-screen">

        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden items-center justify-center">
            <img src="https://images.pexels.com/photos/1083822/pexels-photo-1083822.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                 class="absolute inset-0 w-full h-full object-cover" alt="Bunga Segar">

            <div class="absolute inset-0 bg-slate-950/50 backdrop-brightness-75"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/20 via-transparent to-slate-950/20"></div>

            <div class="relative z-10 p-12 text-center" data-aos="zoom-in" data-aos-duration="1500">
                <div class="inline-flex flex-col items-center gap-4 mb-8">
                    <div class="p-5 bg-blue-600 rounded-[2rem] text-white shadow-2xl shadow-blue-500/40 animate-bloom mb-2">
                        <i class="fas fa-seedling text-4xl"></i>
                    </div>
                    <div class="px-6 py-2 rounded-full bg-white/10 border border-white/20 backdrop-blur-md">
                        <span class="text-white font-black text-3xl tracking-tighter">Pedia<span class="text-blue-400">Florist</span></span>
                    </div>
                </div>

                <h2 class="text-white text-6xl font-black leading-tight tracking-tight mb-6">
                    Mulai Rawat<br>Taman <span class="text-blue-400">Impianmu</span>.
                </h2>

                <div class="w-20 h-1.5 bg-blue-500 mx-auto rounded-full mb-8"></div>

                <p class="text-slate-200 text-xl leading-relaxed max-w-md mx-auto font-medium">
                    Daftar sekarang dan nikmati kemudahan merawat bunga dengan panduan cerdas dan otomatis.
                </p>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 md:p-20 relative bg-white">

            <div class="w-full max-w-[440px]" data-aos="fade-left">
                <div class="mb-10 text-center lg:text-left">
                    <h1 class="text-4xl font-black text-slate-900 mb-2">Buat Akun</h1>
                    <p class="text-slate-500">Bergabunglah dengan komunitas pecinta bunga kami.</p>
                </div>

<form method="POST" action="/register" class="space-y-5">
    @csrf

    {{-- ERROR (tidak mengubah tampilan utama) --}}
    @if($errors->any())
        <div class="p-3 bg-red-100 text-red-600 rounded-xl text-sm font-medium">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="space-y-2">
        <label class="text-sm font-bold text-slate-700 ml-1">Nama Lengkap</label>
        <div class="relative group">
            <i class="fas fa-user absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-blue-600 transition-colors"></i>
            <input type="text" name="name" placeholder="Masukkan nama lengkap"
                   class="w-full pl-14 pr-6 py-4 bg-blue-50/50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-600 transition-all font-medium text-slate-900"
                   required>
        </div>
    </div>

    <div class="space-y-2">
        <label class="text-sm font-bold text-slate-700 ml-1">Email</label>
        <div class="relative group">
            <i class="fas fa-envelope absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-blue-600 transition-colors"></i>
            <input type="email" name="email" placeholder="budi@example.com"
                   class="w-full pl-14 pr-6 py-4 bg-blue-50/50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-600 transition-all font-medium text-slate-900"
                   required>
        </div>
    </div>

    <div class="space-y-2">
        <label class="text-sm font-bold text-slate-700 ml-1">Kata Sandi</label>
        <div class="relative group">
            <i class="fas fa-lock absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-blue-600 transition-colors"></i>
            <input type="password" name="password" placeholder="Minimal 8 karakter"
                   class="w-full pl-14 pr-6 py-4 bg-blue-50/50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-600 transition-all font-medium text-slate-900"
                   required>
        </div>
    </div>

    <div class="space-y-2">
    <label class="text-sm font-bold text-slate-700 ml-1">Konfirmasi Kata Sandi</label>
    <div class="relative group">
        <i class="fas fa-lock absolute left-5 top-1/2 -translate-y-1/2 text-slate-400"></i>
        <input type="password" name="password_confirmation" placeholder="Ulangi password"
               class="w-full pl-14 pr-6 py-4 bg-blue-50/50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-600 transition-all font-medium text-slate-900"
               required>
    </div>
</div>

    <div x-data="{ showTerms: false }">
        <label class="flex items-start gap-3 cursor-pointer group mt-2">
            <input type="checkbox" required class="w-5 h-5 mt-0.5 rounded border-slate-300 text-blue-600 focus:ring-blue-600">
            <span class="text-sm text-slate-600 font-medium leading-relaxed">
                Saya menyetujui
                <button type="button" @click="showTerms = true" class="text-blue-600 font-bold hover:underline">
                    Syarat & Ketentuan
                </button>.
            </span>
        </label>
<template x-teleport="body">
    {{-- Kita beri z-index tertinggi yang dimungkinkan browser --}}
    <div x-show="showTerms"
         class="fixed inset-0"
         style="z-index: 999999 !important;"
         x-cloak>

        {{-- Overlay Hitam Pekat agar teks di belakang hilang --}}
        <div @click="showTerms = false"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             class="absolute inset-0 bg-slate-950/90 shadow-2xl"></div>

        {{-- Modal Box --}}
        <div class="absolute inset-0 flex items-center justify-center p-4 pointer-events-none">
            <div class="relative bg-white w-full max-w-2xl rounded-[2.5rem] shadow-[0_0_50px_rgba(0,0,0,0.5)] overflow-hidden pointer-events-auto"
                 x-show="showTerms"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95 translate-y-10"
                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95">

                {{-- Header --}}
                <div class="p-8 border-b border-slate-100 flex items-center justify-between bg-slate-50">
                    <h3 class="text-xl font-black text-slate-900 uppercase tracking-tight">Syarat & Ketentuan</h3>
                    <button @click="showTerms = false" class="text-slate-400 hover:text-red-500 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                {{-- Body --}}
                <div class="p-8 md:p-10 max-h-[60vh] overflow-y-auto no-scrollbar space-y-6 text-slate-600 leading-relaxed font-medium">
                    <p class="text-sm text-slate-400 font-bold uppercase tracking-widest mb-4">Versi 1.0 - 2026</p>
                    <section>
                        <h4 class="text-slate-900 font-black mb-2">1. Penggunaan Layanan</h4>
                        <p>Dengan mendaftar, Anda setuju untuk memberikan data yang akurat demi keakuratan diagnosa AI PediaFlorist.</p>
                    </section>
                    <section>
                        <h4 class="text-slate-900 font-black mb-2">2. Kebijakan Privasi</h4>
                        <p>Foto tanaman yang Anda unggah digunakan untuk pengembangan model AI dan tidak akan disebarluaskan untuk kepentingan komersial pihak ketiga.</p>
                    </section>
                    <section>
                        <h4 class="text-slate-900 font-black mb-2">3. Batasan Tanggung Jawab</h4>
                        <p>Hasil diagnosa AI bersifat referensi. Kami menyarankan konsultasi dengan ahli botani kami untuk tindakan medis tanaman yang kritis.</p>
                    </section>
                </div>

                {{-- Footer --}}
                <div class="p-8 bg-slate-50 border-t border-slate-100 flex justify-end">
                    <button @click="showTerms = false" class="px-8 py-4 bg-slate-900 text-white rounded-2xl font-black uppercase text-[10px] tracking-widest hover:bg-blue-600 transition-all shadow-lg">
                        SAYA MENGERTI & SETUJU
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
        <!-- SEMUA MODAL TETAP SAMA (TIDAK DISENTUH) -->
    </div>

    <button type="submit" class="w-full py-4 bg-blue-600 text-white rounded-2xl font-black uppercase text-xs tracking-widest hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all active:scale-95">
        Daftar Sekarang
    </button>

    <div class="relative py-2">
        <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-100"></div></div>
        <div class="relative flex justify-center text-[10px] uppercase">
            <span class="bg-white px-4 text-slate-400 font-black tracking-[0.2em]">Atau daftar melalui</span>
        </div>
    </div>

<a href="/auth/google"
   class="w-full flex items-center justify-center gap-3 py-3 rounded-2xl font-bold text-sm shadow-md
          bg-white border border-slate-200
          hover:shadow-lg hover:-translate-y-0.5
          active:scale-95 transition-all duration-200">

    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5">

    <span class="text-slate-700">
        Lanjut dengan Google
    </span>
</a>
</form>

                <p class="text-center mt-8 text-sm text-slate-500 font-medium">
                    Sudah punya akun? <a href="/" class="text-blue-600 font-bold hover:underline">Masuk di sini</a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, duration: 1000 });
    </script>
</body>
</html>
