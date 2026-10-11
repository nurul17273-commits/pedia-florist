<x-layout-user>
    <x-slot:title>Syarat & Ketentuan - PediaFlorist Pro</x-slot>

    <div class="bg-slate-50/50 min-h-screen pb-20">

        {{-- HEADER SECTION --}}
        <section class="relative bg-slate-950 pt-32 pb-20 overflow-hidden">
            {{-- Decorative Elements --}}
            <div class="absolute top-0 left-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-blue-600/10 blur-[100px] rounded-full"></div>

            <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
                <div class="inline-flex items-center gap-2 bg-white/5 text-blue-300 px-4 py-2 rounded-full text-[10px] font-black tracking-[0.2em] uppercase mb-6 border border-white/10 backdrop-blur-md">
                    <i class="fas fa-gavel"></i> Legal Document
                </div>
                <h1 class="text-5xl md:text-6xl font-black text-white mb-4 tracking-tight">Syarat & <span class="text-blue-500">Ketentuan.</span></h1>
                <p class="text-slate-400 text-sm font-bold uppercase tracking-[0.3em]">Terakhir Diperbarui: 30 April 2026</p>
            </div>
        </section>

        <main class="max-w-5xl mx-auto px-6 -mt-10 relative z-20">

            {{-- CARD UTAMA --}}
            <div class="bg-white rounded-[3.5rem] shadow-2xl shadow-slate-200/60 border border-white overflow-hidden">

                {{-- RINGKASAN CEPAT --}}
                <div class="p-10 md:p-12 bg-blue-50 border-b border-blue-100">
                    <div class="flex flex-col md:flex-row gap-8 items-center">
                        <div class="w-20 h-20 bg-blue-600 text-white rounded-[2rem] flex items-center justify-center text-3xl shrink-0 shadow-lg shadow-blue-200">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-black text-blue-900 mb-2 tracking-tight">Ringkasan Untuk Pengguna</h3>
                            <p class="text-blue-700/80 leading-relaxed font-medium">
                                Dengan menggunakan layanan PediaFlorist Pro, Anda menyetujui aturan main kami. Dokumen ini menjelaskan hak Anda, tanggung jawab kami, serta penggunaan teknologi AI dalam mendiagnosa tanaman Anda.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- ISI DOKUMEN --}}
                <div class="p-10 md:p-16 space-y-16">

                    {{-- Pasal 1 --}}
                    <div class="group">
                        <div class="flex items-center gap-4 mb-6">
                            <span class="text-4xl font-black text-slate-100 group-hover:text-blue-100 transition-colors">01</span>
                            <h4 class="text-2xl font-black text-slate-900 tracking-tight">Ketentuan Layanan AI</h4>
                        </div>
                        <div class="ml-12 space-y-4 text-slate-600 leading-relaxed font-medium">
                            <p>Fitur Diagnosa AI kami memberikan hasil berdasarkan analisis visual. Meskipun akurasinya tinggi, hasil tersebut bersifat <strong>referensi edukatif</strong> dan bukan jaminan mutlak atas kesehatan tanaman Anda.</p>
                            <p>PediaFlorist tidak bertanggung jawab atas kerugian finansial atau kematian tanaman yang diakibatkan oleh keputusan mandiri pengguna tanpa konsultasi lebih lanjut dengan ahli botani resmi kami.</p>
                        </div>
                    </div>

                    {{-- Pasal 2 --}}
                    <div class="group">
                        <div class="flex items-center gap-4 mb-6">
                            <span class="text-4xl font-black text-slate-100 group-hover:text-blue-100 transition-colors">02</span>
                            <h4 class="text-2xl font-black text-slate-900 tracking-tight">Keamanan Data & Privasi</h4>
                        </div>
                        <div class="ml-12 space-y-4 text-slate-600 leading-relaxed font-medium">
                            <p>Kami sangat menjaga privasi foto tanaman yang Anda unggah. Data gambar hanya digunakan untuk melatih model AI agar lebih akurat bagi komunitas PediaFlorist.</p>
                            <p>Kami tidak akan pernah menjual informasi pribadi, lokasi taman, atau riwayat konsultasi Anda kepada pihak ketiga tanpa persetujuan eksplisit dari Anda.</p>
                        </div>
                    </div>

                    {{-- Pasal 3 --}}
                    <div class="group">
                        <div class="flex items-center gap-4 mb-6">
                            <span class="text-4xl font-black text-slate-100 group-hover:text-blue-100 transition-colors">03</span>
                            <h4 class="text-2xl font-black text-slate-900 tracking-tight">Akun & Langganan</h4>
                        </div>
                        <div class="ml-12 space-y-4 text-slate-600 leading-relaxed font-medium">
                            <ul class="list-disc ml-5 space-y-3 marker:text-blue-500">
                                <li>Satu akun hanya boleh digunakan oleh satu entitas pengguna.</li>
                                <li>Pembatalan langganan premium dapat dilakukan kapan saja melalui dashboard.</li>
                                <li>Kami berhak menonaktifkan akun yang terindikasi melakukan penyalahgunaan sistem atau spam pada fitur konsultasi ahli.</li>
                            </ul>
                        </div>
                    </div>

                    {{-- Pasal 4 --}}
                    <div class="group">
                        <div class="flex items-center gap-4 mb-6">
                            <span class="text-4xl font-black text-slate-100 group-hover:text-blue-100 transition-colors">04</span>
                            <h4 class="text-2xl font-black text-slate-900 tracking-tight">Hukum yang Berlaku</h4>
                        </div>
                        <div class="ml-12 text-slate-600 leading-relaxed font-medium">
                            <p>Syarat dan ketentuan ini tunduk pada hukum Republik Indonesia. Segala sengketa yang timbul akan diselesaikan terlebih dahulu melalui musyawarah untuk mencapai mufakat sebelum menempuh jalur hukum.</p>
                        </div>
                    </div>

                </div>

                {{-- FOOTER CARD --}}
                <div class="p-10 bg-slate-900 text-center">
                    <p class="text-slate-400 text-xs font-bold uppercase tracking-widest mb-6">Punya pertanyaan mengenai hukum?</p>
                    <a href="/kontak" class="inline-block py-4 px-10 bg-blue-600 text-white rounded-2xl font-black uppercase text-[10px] tracking-widest hover:bg-white hover:text-slate-900 transition-all shadow-xl">
                        Hubungi Tim Legal Kami
                    </a>
                </div>
            </div>

            {{-- BACK TO TOP --}}
            <div class="mt-12 text-center">
                <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="text-slate-400 hover:text-blue-600 transition-colors font-black text-[10px] uppercase tracking-[0.3em]">
                    <i class="fas fa-arrow-up mb-2 block text-xl"></i> Kembali Ke Atas
                </button>
            </div>
        </main>
    </div>
</x-layout-user>
