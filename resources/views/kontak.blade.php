
<x-layout-user>
    <x-slot:title>PediaFlorist Pro - Konsultasi Ahli Botani</x-slot:title>

    <div class="bg-slate-50/50 min-h-screen pb-20">

        {{-- HERO SECTION --}}
        <section class="relative bg-slate-950 pt-32 pb-24 overflow-hidden">

            {{-- Decorative Glow --}}
            <div class="absolute top-0 right-0 w-1/2 h-full bg-blue-600/10 blur-[120px] rounded-full"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-indigo-500/10 blur-[100px] rounded-full"></div>

            <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">

                <div class="inline-flex items-center gap-2 bg-white/5 text-blue-300 px-4 py-2 rounded-full text-[10px] font-black tracking-[0.2em] uppercase mb-6 border border-white/10 backdrop-blur-md">
                    <i class="fas fa-shield-check"></i>
                    Verified Specialists
                </div>

                <h1 class="text-5xl md:text-7xl font-black text-white mb-6 tracking-tight italic">
                    Expert <span class="text-blue-500">Consultation.</span>
                </h1>

                <p class="text-slate-400 text-lg max-w-2xl mx-auto leading-relaxed font-medium">
                    Hubungi kurator flora kami untuk solusi spesifik mengenai kesehatan tanaman hias dan arsitektur taman Anda.
                </p>

            </div>

        </section>

        <main class="max-w-7xl mx-auto px-6 -mt-12 relative z-20">

            <div class="grid lg:grid-cols-12 gap-8">

                {{-- LEFT SIDE --}}
                <div class="lg:col-span-4 space-y-6">

                    <div class="bg-white p-10 rounded-[3rem] shadow-2xl shadow-slate-200/60 border border-white">

                        <h4 class="text-2xl font-black text-slate-900 mb-10 tracking-tight">
                            Hubungi Kami
                        </h4>

                        <div class="space-y-10">

                            {{-- OFFICE --}}
                            <div class="flex gap-6 group">

                                <div class="w-14 h-14 bg-slate-900 text-white rounded-2xl flex items-center justify-center shrink-0 shadow-lg group-hover:bg-blue-600 transition-colors">
                                    <i class="fas fa-map-marked-alt text-xl"></i>
                                </div>

                                <div>
                                    <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-1">
                                        Headquarters
                                    </p>

                                    <p class="text-slate-800 font-bold leading-relaxed">
                                        Green Tower, Lt. 12<br>
                                        Sudirman, Jakarta Pusat
                                    </p>
                                </div>

                            </div>

                            {{-- WHATSAPP --}}
                            <div class="flex gap-6 group">

                                <div class="w-14 h-14 bg-slate-50 text-slate-900 rounded-2xl flex items-center justify-center shrink-0 border border-slate-100 group-hover:border-blue-600 group-hover:text-blue-600 transition-all">
                                    <i class="fab fa-whatsapp text-2xl"></i>
                                </div>

                                <div>
                                    <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-1">
                                        WhatsApp Fast Response
                                    </p>

                                    <p class="text-slate-800 font-black text-lg">
                                        +62 812 9000 1234
                                    </p>
                                </div>

                            </div>

                            {{-- EMAIL --}}
                            <div class="flex gap-6 group">

                                <div class="w-14 h-14 bg-slate-50 text-slate-900 rounded-2xl flex items-center justify-center shrink-0 border border-slate-100 group-hover:border-blue-600 group-hover:text-blue-600 transition-all">
                                    <i class="fas fa-paper-plane text-xl"></i>
                                </div>

                                <div>
                                    <p class="text-[10px] font-black uppercase text-slate-400 tracking-widest mb-1">
                                        Official Email
                                    </p>

                                    <p class="text-slate-800 font-bold">
                                        expert@pediaflorist.pro
                                    </p>
                                </div>

                            </div>

                        </div>

                        <div class="mt-12 p-8 bg-blue-50 rounded-[2.5rem] border border-blue-100/50">

                            <p class="text-blue-900 text-xs font-black uppercase tracking-widest mb-2">
                                Jam Operasional
                            </p>

                            <p class="text-blue-700 text-sm font-bold">
                                Senin - Minggu: 08.00 - 20.00 WIB
                            </p>

                        </div>

                    </div>

                </div>

                {{-- RIGHT SIDE --}}
                <div class="lg:col-span-8">

                    <div class="bg-white p-10 md:p-16 rounded-[3.5rem] shadow-2xl shadow-slate-200/60 border border-white relative overflow-hidden">

                        {{-- Background Decor --}}
                        <div class="absolute top-0 right-0 w-40 h-40 bg-slate-50 rounded-bl-[5rem] -z-0"></div>

                        <div class="relative z-10">

                            {{-- HEADER --}}
                            <div class="mb-12">

                                <h3 class="text-4xl font-black text-slate-900 mb-4 tracking-tight">
                                    Kirim Tiket Konsultasi
                                </h3>

                                <p class="text-slate-400 font-medium max-w-lg leading-relaxed">
                                    Lampirkan detail masalah atau diagnosa AI Anda agar tim kami bisa memberikan solusi yang lebih akurat.
                                </p>

                            </div>

                            {{-- SUCCESS --}}
                            @if(session('success'))

                                <div class="mb-8 bg-emerald-50 border border-emerald-100 text-emerald-700 px-6 py-5 rounded-3xl font-bold">
                                    {{ session('success') }}
                                </div>

                            @endif

                            {{-- ERROR --}}
                            @if($errors->any())

                                <div class="mb-8 bg-rose-50 border border-rose-100 text-rose-700 px-6 py-5 rounded-3xl">

                                    <ul class="space-y-2 text-sm font-semibold">

                                        @foreach($errors->all() as $error)

                                            <li>• {{ $error }}</li>

                                        @endforeach

                                    </ul>

                                </div>

                            @endif

                            {{-- FORM --}}
                            <form method="POST"
                                  action="/complaint/send"
                                  class="space-y-10">

                                @csrf

                                {{-- NAME + EMAIL --}}
                                <div class="grid md:grid-cols-2 gap-10">

                                    {{-- NAME --}}
                                    <div class="space-y-3">

                                        <label class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">
                                            Nama Lengkap
                                        </label>

                                        <input type="text"
                                               value="{{ Auth::user()->name }}"
                                               disabled
                                               class="w-full bg-slate-100 border-none rounded-2xl p-5 font-bold text-slate-500 outline-none">

                                    </div>

                                    {{-- EMAIL --}}
                                    <div class="space-y-3">

                                        <label class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">
                                            Email Aktif
                                        </label>

                                        <input type="email"
                                               value="{{ Auth::user()->email }}"
                                               disabled
                                               class="w-full bg-slate-100 border-none rounded-2xl p-5 font-bold text-slate-500 outline-none">

                                    </div>

                                </div>

                                {{-- TOPIC + URGENCY --}}
                                <div class="grid md:grid-cols-2 gap-10">

                                    {{-- TOPIC --}}
                                    <div class="space-y-3">

                                        <label class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">
                                            Topik Utama
                                        </label>

                                        <div class="relative">

                                            <select name="topic"
                                                    required
                                                    class="w-full bg-slate-50 border-none rounded-2xl p-5 font-bold text-slate-900 appearance-none focus:ring-4 focus:ring-blue-500/10 transition-all outline-none cursor-pointer">

                                                <option value="">Pilih Topik</option>
                                                <option value="Hama & Penyakit">Hama & Penyakit</option>
                                                <option value="Nutrisi & Pupuk">Nutrisi & Pupuk</option>
                                                <option value="Kebutuhan Pencahayaan">Kebutuhan Pencahayaan</option>
                                                <option value="Lainnya">Lainnya</option>

                                            </select>

                                            <i class="fas fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-slate-300 pointer-events-none"></i>

                                        </div>

                                    </div>

                                    {{-- URGENCY --}}
                                    <div class="space-y-3">

                                        <label class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">
                                            Tingkat Urgensi
                                        </label>

                                        <div class="flex gap-4">

                                            <label class="flex-1">

                                                <input type="radio"
                                                       name="urgency"
                                                       value="Normal"
                                                       class="hidden peer"
                                                       checked>

                                                <div class="text-center py-4 rounded-2xl bg-slate-50 text-slate-400 font-black text-[10px] uppercase tracking-widest cursor-pointer peer-checked:bg-blue-600 peer-checked:text-white transition-all shadow-sm">
                                                    Normal
                                                </div>

                                            </label>

                                            <label class="flex-1">

                                                <input type="radio"
                                                       name="urgency"
                                                       value="Darurat"
                                                       class="hidden peer">

                                                <div class="text-center py-4 rounded-2xl bg-slate-50 text-slate-400 font-black text-[10px] uppercase tracking-widest cursor-pointer peer-checked:bg-red-500 peer-checked:text-white transition-all shadow-sm">
                                                    Darurat
                                                </div>

                                            </label>

                                        </div>

                                    </div>

                                </div>

                                {{-- MESSAGE --}}
                                <div class="space-y-3">

                                    <label class="text-[11px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">
                                        Pesan atau Keluhan
                                    </label>

                                    <textarea
                                        name="message"
                                        rows="5"
                                        required
                                        placeholder="Jelaskan kondisi tanaman Anda secara detail..."
                                        class="w-full bg-slate-50 border-none rounded-[2rem] p-6 font-medium text-slate-900 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none resize-none"></textarea>

                                </div>

                                {{-- BUTTON --}}
                                <div class="flex flex-col md:flex-row items-center gap-8 pt-4">

                                    <button type="submit"
                                            class="w-full md:w-auto px-16 py-5 bg-slate-900 text-white rounded-[2rem] font-black uppercase text-xs tracking-[0.2em] hover:bg-blue-600 hover:shadow-2xl hover:shadow-blue-200 transition-all active:scale-95">

                                        Kirim Tiket

                                    </button>

                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest max-w-[200px] leading-loose text-center md:text-left">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        Data Anda aman & terenkripsi oleh PediaFlorist.
                                    </p>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </main>

    </div>
</x-layout-user>

