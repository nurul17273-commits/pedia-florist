<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - PediaFlorist Pro</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }

        @keyframes bloom {

            0% {
                transform: scale(1) rotate(0deg);
                filter: drop-shadow(0 0 0px rgba(59, 130, 246, 0));
            }

            50% {
                transform: scale(1.1) rotate(5deg);
                filter: drop-shadow(0 0 12px rgba(59, 130, 246, 0.4));
            }

            100% {
                transform: scale(1) rotate(0deg);
                filter: drop-shadow(0 0 0px rgba(59, 130, 246, 0));
            }
        }

        .animate-bloom {
            animation: bloom 4s ease-in-out infinite;
        }

        .glass {
            backdrop-filter: blur(14px);
            background: rgba(255, 255, 255, 0.08);
        }
    </style>
</head>

<body class="bg-white text-slate-900 antialiased overflow-x-hidden">

    <div class="flex min-h-screen">

        {{-- LEFT --}}
        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden items-center justify-center">

            <img src="https://images.unsplash.com/photo-1490750967868-88aa4486c946?q=80&w=1200"
                class="absolute inset-0 w-full h-full object-cover"
                alt="Flower">

            <div class="absolute inset-0 bg-slate-950/70"></div>

            <div class="absolute inset-0 bg-gradient-to-b from-slate-950/20 via-transparent to-slate-950/20"></div>

            <div class="relative z-10 p-12 text-center"
                data-aos="zoom-in"
                data-aos-duration="1500">

                {{-- LOGO --}}
                <div class="inline-flex flex-col items-center gap-4 mb-8">

                    <div
                        class="p-5 bg-blue-600 rounded-[2rem] text-white shadow-2xl shadow-blue-500/40 animate-bloom mb-2">

                        <i class="fas fa-lock-open text-4xl"></i>

                    </div>

                    <div
                        class="px-6 py-2 rounded-full glass border border-white/20">

                        <span class="text-white font-black text-3xl tracking-tighter">
                            Pedia<span class="text-blue-400">Florist</span>
                        </span>

                    </div>

                </div>

                {{-- TITLE --}}
                <h2 class="text-white text-6xl font-black leading-tight tracking-tight mb-6">
                    Buat Password
                    <br>
                    <span class="text-blue-400">Baru</span>.
                </h2>

                <div class="w-20 h-1.5 bg-blue-500 mx-auto rounded-full mb-8"></div>

                {{-- DESC --}}
                <p class="text-slate-200 text-xl leading-relaxed max-w-md mx-auto font-medium">
                    Password baru akan digunakan untuk mengakses kembali akun Anda dengan aman.
                </p>

            </div>
        </div>

        {{-- RIGHT --}}
        <div
            class="w-full lg:w-1/2 flex items-center justify-center p-8 md:p-20 relative bg-white">

            <div class="w-full max-w-[440px]"
                data-aos="fade-left"
                data-aos-duration="1000">

                {{-- HEADER --}}
                <div class="mb-10 text-center lg:text-left">

                    <div
                        class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-2xl mb-6 mx-auto lg:mx-0">

                        <i class="fas fa-key"></i>

                    </div>

                    <h1 class="text-4xl font-black text-slate-900 mb-2">
                        Reset Password
                    </h1>

                    <p class="text-slate-500 font-medium">
                        Masukkan password baru untuk akun Anda.
                    </p>

                </div>

                {{-- SUCCESS --}}
                @if(session('success'))

                    <div
                        class="mb-6 p-5 bg-emerald-50 border border-emerald-100 text-emerald-600 rounded-2xl text-sm font-bold">

                        {{ session('success') }}

                    </div>

                @endif

                {{-- ERROR --}}
                @if($errors->any())

                    <div
                        class="mb-6 p-5 bg-red-50 border border-red-100 text-red-600 rounded-2xl text-sm font-bold">

                        <ul class="space-y-1">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                {{-- FORM --}}
                <form method="POST"
                    action="/reset-password/{{ $token }}"
                    class="space-y-6">

                    @csrf

                    {{-- PASSWORD --}}
                    <div class="space-y-2">

                        <label class="text-sm font-bold text-slate-700 ml-1">
                            Password Baru
                        </label>

                        <div class="relative group">

                            <i
                                class="fas fa-lock absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-blue-600 transition-colors"></i>

                            <input type="password"
                                name="password"
                                placeholder="Minimal 8 karakter"
                                required
                                minlength="8"
                                class="w-full pl-14 pr-6 py-4 bg-blue-50/50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-600 transition-all font-medium text-slate-900">

                        </div>

                    </div>

                    {{-- CONFIRM PASSWORD --}}
                    <div class="space-y-2">

                        <label class="text-sm font-bold text-slate-700 ml-1">
                            Konfirmasi Password
                        </label>

                        <div class="relative group">

                            <i
                                class="fas fa-shield-alt absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-blue-600 transition-colors"></i>

                            <input type="password"
                                name="password_confirmation"
                                placeholder="Ulangi password baru"
                                required
                                minlength="8"
                                class="w-full pl-14 pr-6 py-4 bg-blue-50/50 border-none rounded-2xl outline-none focus:ring-2 focus:ring-blue-600 transition-all font-medium text-slate-900">

                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <button type="submit"
                        class="w-full py-4 bg-blue-600 text-white rounded-2xl font-black uppercase text-xs tracking-widest hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all active:scale-95">

                        Simpan Password Baru

                    </button>

                </form>

                {{-- FOOTER --}}
                <div class="mt-8 bg-slate-50 p-6 rounded-2xl border border-slate-100">

                    <div class="flex gap-4">

                        <i class="fas fa-shield-halved text-blue-600 mt-1"></i>

                        <p class="text-xs text-slate-500 leading-relaxed font-medium">
                            Demi keamanan akun, gunakan kombinasi huruf besar, huruf kecil, angka, dan simbol agar password lebih kuat.
                        </p>

                    </div>

                </div>

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
