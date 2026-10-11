<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Sandi - PediaFlorist Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }

        @keyframes bloom {
            0% { transform: scale(1) rotate(0deg); filter: drop-shadow(0 0 0px rgba(59, 130, 246, 0)); }
            50% { transform: scale(1.15) rotate(10deg); filter: drop-shadow(0 0 10px rgba(59, 130, 246, 0.5)); }
            100% { transform: scale(1) rotate(0deg); filter: drop-shadow(0 0 0px rgba(59, 130, 246, 0)); }
        }
        .animate-bloom { animation: bloom 3s ease-in-out infinite; display: inline-block; }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased overflow-x-hidden">

    <div class="flex min-h-screen">

        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden items-center justify-center">
            <img src="https://images.pexels.com/photos/39517/rose-flower-blossom-bloom-39517.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                 class="absolute inset-0 w-full h-full object-cover" alt="Bunga Tenang">

            <div class="absolute inset-0 bg-slate-950/50 backdrop-brightness-75"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/20 via-transparent to-slate-950/20"></div>

            <div class="relative z-10 p-12 text-center" data-aos="zoom-in" data-aos-duration="1500">
                <div class="inline-flex flex-col items-center gap-4 mb-8">
                    <div class="p-5 bg-blue-600 rounded-[2rem] text-white shadow-2xl shadow-blue-500/40 animate-bloom mb-2">
                        <i class="fas fa-key text-4xl"></i>
                    </div>
                    <div class="px-6 py-2 rounded-full bg-white/10 border border-white/20 backdrop-blur-md">
                        <span class="text-white font-black text-3xl tracking-tighter">Pedia<span class="text-blue-400">Florist</span></span>
                    </div>
                </div>

                <h2 class="text-white text-6xl font-black leading-tight tracking-tight mb-6">
                    Jangan Khawatir,<br>Kami <span class="text-blue-400">Membantu</span>.
                </h2>

                <div class="w-20 h-1.5 bg-blue-500 mx-auto rounded-full mb-8"></div>

                <p class="text-slate-200 text-xl leading-relaxed max-w-md mx-auto font-medium">
                    Keamanan akun Anda adalah prioritas kami. Ikuti langkah mudah untuk memulihkan akses Anda.
                </p>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 md:p-20 relative bg-white">

            <div class="w-full max-w-[440px]" data-aos="fade-left" data-aos-duration="1000">
                <div class="mb-10 text-center lg:text-left">
                    <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-2xl mb-6 mx-auto lg:mx-0">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h1 class="text-4xl font-black text-slate-900 mb-2">Lupa Kata Sandi?</h1>
                    <p class="text-slate-500 font-medium">Masukkan email yang terdaftar, kami akan mengirimkan instruksi untuk mengatur ulang sandi Anda.</p>
                </div>

                <form action="/forgot-password-request" method="POST" class="space-y-6">
    @csrf
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-700 ml-1">Alamat Email</label>
                        <div class="relative group">
                            <i class="fas fa-envelope absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-blue-600 transition-colors"></i>
                            <input type="email" name="email"
                                   class="w-full pl-14 pr-6 py-4 bg-blue-50/50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-600 transition-all font-medium text-slate-900">
                        </div>
                    </div>

                    <button type="submit" class="w-full py-4 bg-blue-600 text-white rounded-2xl font-black uppercase text-xs tracking-widest hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all active:scale-95">
                        Kirim Instruksi Pemulihan
                    </button>

                    <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 mt-8">
                        <div class="flex gap-4">
                            <i class="fas fa-info-circle text-blue-600 mt-1"></i>
                            <p class="text-xs text-slate-500 leading-relaxed font-medium">
                                Jika Anda tidak menerima email dalam beberapa menit, silakan periksa folder spam Anda atau coba lagi.
                            </p>
                        </div>
                    </div>
                </form>

                <p class="text-center mt-10 text-sm text-slate-500 font-medium">
                    kembali ke halaman <a href="/" class="text-blue-600 font-bold hover:underline">Login</a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 1000,
        });
    </script>
</body>
</html>
