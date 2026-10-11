<x-layout-user>
    <x-slot:title>PediaFlorist Pro - Pusat Bantuan & FAQ</x-slot>

    <div class="bg-slate-50/50 min-h-screen pb-20">

        {{-- HEADER SECTION --}}
        <section class="relative bg-slate-900 pt-32 pb-20 overflow-hidden">
            {{-- Dekorasi Latar --}}
            <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-blue-600/20 to-transparent"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-blue-500/10 blur-[100px] rounded-full"></div>

            <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
                <div class="inline-flex items-center gap-2 bg-blue-500/20 text-blue-300 px-4 py-2 rounded-full text-[10px] font-black tracking-[0.2em] uppercase mb-6 border border-blue-400/20">
                    <i class="fas fa-question-circle"></i> Pusat Informasi
                </div>
                <h1 class="text-5xl md:text-6xl font-black text-white mb-6">Ada yang Bisa <br><span class="text-blue-400">Kami Bantu?</span></h1>
                <p class="text-slate-400 text-lg max-w-2xl mx-auto leading-relaxed">
                    Temukan jawaban cepat seputar perawatan bunga, penggunaan fitur AI, dan manajemen jadwal penyiraman Anda.
                </p>
            </div>
        </section>

        <main class="max-w-4xl mx-auto px-6 -mt-10 relative z-20">

            {{-- SEARCH BAR SIMULASI --}}
            <div class="bg-white p-4 rounded-[2.5rem] shadow-2xl shadow-slate-200/50 border border-slate-100 mb-16">
                <div class="flex items-center gap-4 px-4">
                    <i class="fas fa-search text-slate-300 text-xl"></i>
                    <input type="text" placeholder="Cari topik perawatan (contoh: Anggrek, AI, Nutrisi)..." class="w-full bg-transparent border-none focus:ring-0 py-4 text-slate-600 font-medium">
                </div>
            </div>

            {{-- FAQ ACCORDION GROUP --}}
            <div class="space-y-6" x-data="{ active: null }">

                {{-- FAQ 1 --}}
                <div class="bg-white rounded-[2rem] border border-slate-100 overflow-hidden transition-all duration-300 shadow-sm" :class="active === 1 ? 'shadow-xl ring-2 ring-blue-600/5' : ''">
                    <button @click="active = (active === 1 ? null : 1)" class="w-full p-8 flex items-center justify-between text-left group">
                        <div class="flex items-center gap-5">
                            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-lg group-hover:bg-blue-600 group-hover:text-white transition-all">
                                <i class="fas fa-robot"></i>
                            </div>
                            <span class="text-lg font-black text-slate-900">Bagaimana cara kerja Diagnosa AI?</span>
                        </div>
                        <i class="fas fa-chevron-down text-slate-300 transition-transform duration-300" :class="active === 1 ? 'rotate-180 text-blue-600' : ''"></i>
                    </button>
                    <div x-show="active === 1" x-collapse x-cloak>
                        <div class="px-8 pb-8 pt-0 ml-16">
                            <p class="text-slate-500 leading-relaxed font-medium">
                                AI kami menggunakan teknologi <span class="text-blue-600 font-bold">Neural Networks</span> untuk memindai pola visual pada daun atau batang. Anda cukup mengunggah foto bagian yang terkena penyakit, dan sistem akan membandingkannya dengan ribuan basis data penyakit flora secara instan.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- FAQ 2 --}}
                <div class="bg-white rounded-[2rem] border border-slate-100 overflow-hidden transition-all duration-300 shadow-sm" :class="active === 2 ? 'shadow-xl ring-2 ring-blue-600/5' : ''">
                    <button @click="active = (active === 2 ? null : 2)" class="w-full p-8 flex items-center justify-between text-left group">
                        <div class="flex items-center gap-5">
                            <div class="w-12 h-12 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center text-lg group-hover:bg-green-600 group-hover:text-white transition-all">
                                <i class="fas fa-tint"></i>
                            </div>
                            <span class="text-lg font-black text-slate-900">Kapan waktu terbaik untuk menyiram bunga?</span>
                        </div>
                        <i class="fas fa-chevron-down text-slate-300 transition-transform duration-300" :class="active === 2 ? 'rotate-180 text-green-600' : ''"></i>
                    </button>
                    <div x-show="active === 2" x-collapse x-cloak>
                        <div class="px-8 pb-8 pt-0 ml-16">
                            <p class="text-slate-500 leading-relaxed font-medium">
                                Secara umum, pagi hari antara jam <span class="text-slate-900 font-bold">06:00 - 08:00</span> adalah waktu terbaik karena air memiliki cukup waktu untuk meresap sebelum matahari terik. Hindari menyiram di malam hari karena kelembapan berlebih pada daun bisa memicu jamur.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- FAQ 3 --}}
                <div class="bg-white rounded-[2rem] border border-slate-100 overflow-hidden transition-all duration-300 shadow-sm" :class="active === 3 ? 'shadow-xl ring-2 ring-blue-600/5' : ''">
                    <button @click="active = (active === 3 ? null : 3)" class="w-full p-8 flex items-center justify-between text-left group">
                        <div class="flex items-center gap-5">
                            <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center text-lg group-hover:bg-purple-600 group-hover:text-white transition-all">
                                <i class="fas fa-bell"></i>
                            </div>
                            <span class="text-lg font-black text-slate-900">Mengapa notifikasi jadwal tidak muncul?</span>
                        </div>
                        <i class="fas fa-chevron-down text-slate-300 transition-transform duration-300" :class="active === 3 ? 'rotate-180 text-purple-600' : ''"></i>
                    </button>
                    <div x-show="active === 3" x-collapse x-cloak>
                        <div class="px-8 pb-8 pt-0 ml-16">
                            <p class="text-slate-500 leading-relaxed font-medium">
                                Pastikan Anda telah memberikan izin notifikasi pada browser atau aplikasi seluler Anda. Selain itu, periksa tab "Pengaturan Pengingat" di PediaFlorist untuk memastikan status alarm dalam kondisi <span class="text-purple-600 font-bold">Aktif</span>.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- FAQ 4 --}}
                <div class="bg-white rounded-[2rem] border border-slate-100 overflow-hidden transition-all duration-300 shadow-sm" :class="active === 4 ? 'shadow-xl ring-2 ring-blue-600/5' : ''">
                    <button @click="active = (active === 4 ? null : 4)" class="w-full p-8 flex items-center justify-between text-left group">
                        <div class="flex items-center gap-5">
                            <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center text-lg group-hover:bg-amber-600 group-hover:text-white transition-all">
                                <i class="fas fa-seedling"></i>
                            </div>
                            <span class="text-lg font-black text-slate-900">Tanaman saya tetap layu meski sudah disiram?</span>
                        </div>
                        <i class="fas fa-chevron-down text-slate-300 transition-transform duration-300" :class="active === 4 ? 'rotate-180 text-amber-600' : ''"></i>
                    </button>
                    <div x-show="active === 4" x-collapse x-cloak>
                        <div class="px-8 pb-8 pt-0 ml-16">
                            <p class="text-slate-500 leading-relaxed font-medium">
                                Masalahnya mungkin bukan pada air, melainkan <span class="text-amber-600 font-bold">drainase</span> atau <span class="text-amber-600 font-bold">intensitas cahaya</span>. Gunakan fitur Diagnosa AI kami untuk mengecek apakah ada tanda-tanda pembusukan akar atau kekurangan nutrisi makro seperti nitrogen.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- FOOTER CTA --}}
            <div class="mt-20 bg-blue-600 rounded-[3rem] p-12 text-center text-white relative overflow-hidden shadow-2xl shadow-blue-200">
                <div class="relative z-10">
                    <h4 class="text-2xl font-black mb-4">Masih Butuh Jawaban Lain?</h4>
                    <p class="text-blue-100 mb-8 max-w-md mx-auto">Tim ahli botani kami siap membantu Anda secara langsung melalui sesi konsultasi premium.</p>
                    <a href="/kontak" class="inline-block py-4 px-10 bg-slate-900 text-white rounded-2xl font-black uppercase text-xs tracking-widest hover:bg-white hover:text-blue-600 transition-all shadow-xl">
                        Hubungi Tim Ahli
                    </a>
                </div>
                {{-- Decorative Icon --}}
                <i class="fas fa-comments absolute -right-10 -bottom-10 text-white/10 text-[15rem] -rotate-12"></i>
            </div>
        </main>
    </div>

    {{-- Alpine.js Collapse Plugin (Tambahkan jika belum ada di layout utama) --}}
    @push('scripts')
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    @endpush

</x-layout-user>
