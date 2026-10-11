<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dukungan Pelanggan - PediaFlorist Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
        [x-cloak] { display: none !important; }

        @keyframes bloom {
            0% { transform: scale(1) rotate(0deg); filter: drop-shadow(0 0 0px rgba(59, 130, 246, 0)); }
            50% { transform: scale(1.15) rotate(10deg); filter: drop-shadow(0 0 10px rgba(59, 130, 246, 0.5)); }
            100% { transform: scale(1) rotate(0deg); filter: drop-shadow(0 0 0px rgba(59, 130, 246, 0)); }
        }
        .animate-bloom { animation: bloom 3s ease-in-out infinite; display: inline-block; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased overflow-x-hidden">

    {{-- HERO SECTION --}}
    <section class="relative bg-slate-950 pt-32 pb-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="absolute top-0 right-0 w-1/2 h-full bg-blue-600/10 blur-[120px] rounded-full"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 text-center" data-aos="zoom-out">
            <div class="inline-flex items-center gap-2 bg-white/5 text-blue-300 px-4 py-2 rounded-full text-[10px] font-black tracking-[0.2em] uppercase mb-6 border border-white/10 backdrop-blur-md">
                <i class="fas fa-headset animate-pulse"></i> 24/7 Priority Support
            </div>
            <h1 class="text-5xl md:text-7xl font-black text-white mb-6 tracking-tight">
                Ada yang Bisa <br><span class="text-blue-500 italic">Kami Bantu?</span>
            </h1>
            <p class="text-slate-400 text-lg max-w-2xl mx-auto leading-relaxed font-medium">
                Tim dukungan PediaFlorist siap menjawab pertanyaan Anda mengenai akun, teknis aplikasi, atau kendala lainnya.
            </p>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-6 -mt-12 relative z-20 pb-20">
        <div class="grid lg:grid-cols-3 gap-8">

            {{-- CONTACT INFO CARDS --}}
            <div class="lg:col-span-1 space-y-6" data-aos="fade-up">
                <div class="bg-white p-10 rounded-[3rem] shadow-xl border border-white h-full">
                    <h4 class="text-2xl font-black text-slate-900 mb-8 tracking-tight">Saluran Bantuan</h4>

                    <div class="space-y-10">
                        {{-- WhatsApp --}}
                        <a href="#" class="flex gap-6 group">
                            <div class="w-14 h-14 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center shrink-0 shadow-sm group-hover:bg-green-600 group-hover:text-white transition-all duration-300">
                                <i class="fab fa-whatsapp text-2xl"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-1">WhatsApp Chat</p>
                                <p class="text-slate-800 font-black">+62 812 9000 1234</p>
                            </div>
                        </a>

                        {{-- Email --}}
                        <a href="#" class="flex gap-6 group">
                            <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center shrink-0 shadow-sm group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                                <i class="fas fa-envelope-open-text text-xl"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-1">Email Resmi</p>
                                <p class="text-slate-800 font-bold">support@pediaflorist.pro</p>
                            </div>
                        </a>

                        {{-- FAQ Hook --}}
                        <div class="flex gap-6 group">
                            <div class="w-14 h-14 bg-slate-900 text-white rounded-2xl flex items-center justify-center shrink-0 shadow-lg">
                                <i class="fas fa-question-circle text-xl"></i>
                            </div>
                            <div>
                                <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-1">Pusat Bantuan</p>
                                <p class="text-slate-800 font-bold leading-relaxed">Cek FAQ kami untuk solusi instan.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12 p-8 bg-blue-600 rounded-[2.5rem] text-white relative overflow-hidden group cursor-pointer shadow-2xl shadow-blue-200">
                        <i class="fas fa-bolt absolute right-[-10px] bottom-[-10px] text-white/10 text-8xl group-hover:scale-110 transition-transform"></i>
                        <p class="relative z-10 text-xs font-black uppercase tracking-widest mb-2 opacity-80">Rata-rata Respon</p>
                        <p class="relative z-10 text-2xl font-black leading-tight italic">Kurang dari <br> 15 Menit</p>
                    </div>
                </div>
            </div>

            {{-- SUPPORT FORM --}}
            <div class="lg:col-span-2" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-white p-10 md:p-16 rounded-[3.5rem] shadow-xl border border-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-bl-full -z-0"></div>

                    <div class="relative z-10">
                        <div class="mb-12">
                            <h3 class="text-4xl font-black text-slate-900 mb-4 tracking-tight">Kirim Tiket Bantuan</h3>
                            <p class="text-slate-400 font-medium leading-relaxed max-w-lg">Sampaikan detail masalah yang Anda hadapi. Lampirkan screenshot jika diperlukan agar kami bisa membantu lebih cepat.</p>
                        </div>

                        <form action="#" class="space-y-8">
                            <div class="grid md:grid-cols-2 gap-8">
                                {{-- Nama --}}
                                <div class="space-y-3">
                                    <label class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Nama Pengguna</label>
                                    <input type="text" placeholder="Nama Anda" class="w-full bg-slate-50 border-none rounded-2xl p-5 font-bold text-slate-900 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none">
                                </div>
                                {{-- Email --}}
                                <div class="space-y-3">
                                    <label class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Alamat Email Terdaftar</label>
                                    <input type="email" placeholder="email@pediaflorist.com" class="w-full bg-slate-50 border-none rounded-2xl p-5 font-bold text-slate-900 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none">
                                </div>
                            </div>

                            <div class="space-y-3">
                                <label class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Kategori Kendala</label>
                                <div class="relative">
                                    <select class="w-full bg-slate-50 border-none rounded-2xl p-5 font-bold text-slate-900 appearance-none focus:ring-4 focus:ring-blue-500/10 transition-all outline-none cursor-pointer">
                                        <option>Masalah Login / Lupa Sandi</option>
                                        <option>Kesalahan Pembayaran / Langganan</option>
                                        <option>Bug pada Fitur AI</option>
                                        <option>Lainnya</option>
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-slate-300 pointer-events-none"></i>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <label class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Detail Masalah</label>
                                <textarea rows="5" placeholder="Ceritakan apa yang terjadi secara detail..." class="w-full bg-slate-50 border-none rounded-[2rem] p-6 font-medium text-slate-900 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none resize-none"></textarea>
                            </div>

                            <div class="flex flex-col md:flex-row items-center gap-8 pt-4">
                                <button type="submit" class="w-full md:w-auto px-16 py-5 bg-blue-600 text-white rounded-[2rem] font-black uppercase text-xs tracking-[0.2em] hover:bg-slate-900 shadow-2xl shadow-blue-200 transition-all active:scale-95">
                                    Kirim Pesan <i class="fas fa-paper-plane ml-2"></i>
                                </button>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-loose max-w-[200px] text-center md:text-left">
                                    Tiket Anda akan masuk ke daftar prioritas antrean.
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- BACK TO HOME --}}
        <div class="mt-16 text-center">
            <a href="/" class="text-slate-400 hover:text-blue-600 transition-colors font-black text-[10px] uppercase tracking-[0.3em]">
                <i class="fas fa-arrow-left mr-2"></i> Kembali Login
            </a>
        </div>
    </main>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, duration: 1000 });
    </script>
</body>
</html>
