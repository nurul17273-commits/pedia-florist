<x-layout-user>
    <x-slot:title>Koleksi Bunga - PediaFlorist Pro</x-slot>

    {{-- HERO SECTION --}}
    <section class="relative h-screen w-full flex items-center justify-start overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="/image/image 2.png" class="w-full h-full object-cover hero-bg" alt="Background">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/50 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 w-full pt-20">
            <div data-aos="fade-right" data-aos-duration="1200">
                <h1 class="text-6xl md:text-8xl font-black text-white leading-none mb-6">
                    Jelajahi Koleksi<br><span class="text-blue-400">Bunga Indah</span>
                </h1>
                <p class="text-slate-200 text-lg md:text-xl max-w-xl mb-10 leading-relaxed">
                    Temukan informasi perawatan lengkap untuk berbagai jenis bunga favorit Anda, dari varietas lokal hingga eksotis.
                </p>

                <div class="relative max-w-lg group shadow-2xl">
                    <i class="fas fa-search absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-blue-400 transition-colors"></i>
                    <input type="text" placeholder="Cari bunga favoritmu..."
                           class="w-full pl-14 pr-6 py-5 bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl text-white outline-none focus:ring-2 focus:ring-blue-600 transition-all placeholder:text-slate-400">
                </div>
            </div>
        </div>

        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 text-white/50 animate-bounce">
            <i class="fas fa-chevron-down text-2xl"></i>
        </div>
    </section>

    {{-- MAIN CONTENT DENGAN TAB FILTER --}}
{{-- MAIN CONTENT DENGAN TAB FILTER --}}
    <main class="max-w-7xl mx-auto px-6 py-32" x-data="{ category: 'semua' }">

    <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">

        <div data-aos="fade-right">
            <h2 class="text-4xl font-extrabold text-slate-900 mb-4">
                Koleksi Terpopuler
            </h2>

            <p class="text-slate-500 max-w-md">
                Daftar bunga pilihan yang dikategorikan berdasarkan habitat dan karakteristik uniknya.
            </p>
        </div>

        {{-- FILTER --}}
        <div class="flex gap-3 overflow-x-auto no-scrollbar pb-2" data-aos="fade-left">

            <button
                @click="category = 'semua'"
                :class="category === 'semua'
                    ? 'bg-slate-900 text-white shadow-lg'
                    : 'bg-white text-slate-600 border-slate-200'"
                class="px-6 py-3 rounded-xl font-bold border transition-all duration-300">
                Semua
            </button>

            <button
                @click="category = 'indoor'"
                :class="category === 'indoor'
                    ? 'bg-slate-900 text-white shadow-lg'
                    : 'bg-white text-slate-600 border-slate-200'"
                class="px-6 py-3 rounded-xl font-bold border transition-all duration-300">
                Indoor
            </button>

            <button
                @click="category = 'outdoor'"
                :class="category === 'outdoor'
                    ? 'bg-slate-900 text-white shadow-lg'
                    : 'bg-white text-slate-600 border-slate-200'"
                class="px-6 py-3 rounded-xl font-bold border transition-all duration-300">
                Outdoor
            </button>

            <button
                @click="category = 'herbal'"
                :class="category === 'herbal'
                    ? 'bg-slate-900 text-white shadow-lg'
                    : 'bg-white text-slate-600 border-slate-200'"
                class="px-6 py-3 rounded-xl font-bold border transition-all duration-300">
                Herbal
            </button>

        </div>
    </div>

    {{-- GRID FLOWER --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">

        @forelse($plants as $plant)

        <div
            x-show="category === 'semua' || category === '{{ strtolower($plant->kategori) }}'"
            x-transition
            class="group bg-white rounded-[3rem] border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-500 overflow-hidden">

            <div class="relative h-72 m-4 rounded-[2.5rem] overflow-hidden">

                <img
                    src="{{ $plant->cover ? asset('storage/' . $plant->cover) : 'https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?q=80&w=1200' }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                    alt="{{ $plant->nama_populer }}">

                <div class="absolute top-4 left-4 bg-blue-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase">
                    {{ ucfirst($plant->kategori) }}
                </div>

            </div>

            <div class="p-8 pt-0">

                <h3 class="text-xl font-bold text-slate-900 mb-2">
                    {{ $plant->nama_populer }}
                </h3>

                <p class="text-slate-500 italic text-sm mb-3">
                    {{ $plant->nama_latin }}
                </p>

                <p class="text-slate-500 text-sm mb-6">
                    Tingkat Kesulitan:
                    <span class="font-semibold">
                        {{ ucfirst($plant->tingkat_kesulitan) }}
                    </span>
                </p>

                <button
                    class="w-full py-3 bg-slate-100 text-slate-900 rounded-xl font-bold hover:bg-blue-600 hover:text-white transition-all">
                    Detail
                </button>

            </div>
        </div>

    @empty

    {{-- JIKA BELUM ADA DATA --}}
    <div class="col-span-full">
        <div class="bg-gradient-to-br from-slate-50 to-slate-100 border border-dashed border-slate-300 rounded-[3rem] p-16 md:p-24 text-center shadow-sm">

            <div class="w-28 h-28 mx-auto rounded-full bg-white flex items-center justify-center shadow-md mb-8">
                <i class="fas fa-seedling text-5xl text-slate-300"></i>
            </div>

            <h3 class="text-3xl font-black text-slate-700 mb-4">
                Belum Ada Koleksi Bunga 🌱
            </h3>

            <p class="text-slate-500 text-lg max-w-2xl mx-auto leading-relaxed mb-8">
                Saat ini belum ada data bunga yang tersedia.
                Admin perlu menambahkan koleksi bunga terlebih dahulu
                agar dapat tampil di halaman ini.
            </p>

            <div class="inline-flex items-center gap-3 px-6 py-4 rounded-2xl bg-white border border-slate-200 shadow-sm">
                <i class="fas fa-info-circle text-blue-500"></i>
                <span class="font-semibold text-slate-600">
                    Silakan cek kembali beberapa saat lagi
                </span>
            </div>

        </div>
    </div>

    @endforelse

    </div>

</main>

<section class="bg-slate-900 py-32 px-6 overflow-visible">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-20 items-start">

            {{-- KIRI: TREN TANAMAN --}}
            <div data-aos="fade-right">
                <h2 class="text-5xl font-extrabold text-white mb-8 leading-tight">Tren Tanaman<br><span class="text-blue-400">Indoor 2026</span></h2>
                <div class="space-y-6">
                    <div class="flex gap-6 p-6 rounded-3xl bg-white/5 border border-white/10 hover:bg-white/10 transition-all group">
                        <div class="w-16 h-16 rounded-2xl overflow-hidden flex-shrink-0">
                            <img src="/image/Begonia Rex.jpg" class="w-full h-full object-cover" alt="Begonia">
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-white mb-1 group-hover:text-blue-400">Begonia Rex</h4>
                            <p class="text-slate-400 text-sm">Tanaman dengan corak daun paling artistik tahun ini.</p>
                        </div>
                    </div>
                    <div class="flex gap-6 p-6 rounded-3xl bg-white/5 border border-white/10 hover:bg-white/10 transition-all group">
                        <div class="w-16 h-16 rounded-2xl overflow-hidden flex-shrink-0">
                            <img src="/image/anggrek bulan.jpg" class="w-full h-full object-cover" alt="Orchid">
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-white mb-1 group-hover:text-blue-400">Anggrek Bulan</h4>
                            <p class="text-slate-400 text-sm">Klasik yang tak lekang oleh waktu untuk interior minimalis.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- KANAN: TIPS DENGAN MODAL EXPAND (FIXED VERSION) --}}
<div x-data="{ expanded: false }">
    {{-- MODAL AREA (Teleport ke Body supaya tidak kena blur/overflow grid) --}}
    <template x-teleport="body">
        <div x-show="expanded"
             class="fixed inset-0 z- flex items-center justify-center pt-24 pb-12 px-6" {{-- Tambah pt-24 buat jauhin dari navbar --}}
     x-cloak>

            {{-- Background Gelap & Blur --}}
            <div x-show="expanded"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 @click="expanded = false"
                 class="absolute inset-0 bg-slate-950/80 backdrop-blur-md"></div>

            {{-- Kartu Modal Utama --}}
            <div x-show="expanded"
                 x-transition:enter="transition ease-out duration-500 transform"
                 x-transition:enter-start="opacity-0 scale-90 translate-y-10"
                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                 class="relative bg-blue-600 w-full max-w-4xl rounded-[3rem] p-8 md:p-12 shadow-2xl overflow-hidden">

                {{-- Tombol Close X --}}
                <button @click="expanded = false" class="absolute top-6 right-6 text-white/50 hover:text-white transition-colors">
                    <i class="fas fa-times text-2xl"></i>
                </button>

                <div class="flex items-center gap-4 mb-8">
                    <i class="fas fa-lightbulb text-4xl text-yellow-300"></i>
                    <h3 class="text-3xl font-black text-white">Koleksi Tips Perawatan</h3>
                </div>

                <div class="grid md:grid-cols-2 gap-6 mb-10">
                    <div class="bg-white/10 p-6 rounded-3xl border border-white/10 hover:bg-white/20 transition-all">
                        <span class="text-yellow-300 font-bold text-xs tracking-widest uppercase">#01 Penyiraman</span>
                        <p class="text-white mt-2 leading-relaxed">Siram tanaman di area akar, bukan daun, untuk mencegah pertumbuhan jamur.</p>
                    </div>
                    <div class="bg-white/10 p-6 rounded-3xl border border-white/10 hover:bg-white/20 transition-all">
                        <span class="text-yellow-300 font-bold text-xs tracking-widest uppercase">#02 Cahaya</span>
                        <p class="text-white mt-2 leading-relaxed">Putar pot 90 derajat setiap minggu agar tanaman tumbuh tegak lurus.</p>
                    </div>
                    <div class="bg-white/10 p-6 rounded-3xl border border-white/10 hover:bg-white/20 transition-all">
                        <span class="text-yellow-300 font-bold text-xs tracking-widest uppercase">#03 Kebersihan</span>
                        <p class="text-white mt-2 leading-relaxed">Lap debu pada daun dengan kain lembut agar fotosintesis maksimal.</p>
                    </div>
                    <div class="bg-white/10 p-6 rounded-3xl border border-white/10 hover:bg-white/20 transition-all">
                        <span class="text-yellow-300 font-bold text-xs tracking-widest uppercase">#04 Drainase</span>
                        <p class="text-white mt-2 leading-relaxed">Pastikan pot punya lubang air agar akar tidak busuk karena menggenang.</p>
                    </div>
                </div>

                <button @click="expanded = false"
                        class="w-full md:w-auto bg-white text-blue-600 px-10 py-4 rounded-2xl font-black uppercase tracking-widest text-xs hover:scale-105 transition-all">
                    Tutup Tips
                </button>
            </div>
        </div>
    </template>

    {{-- TAMPILAN AWAL (KARTU KECIL DI GRID) --}}
    <div class="relative group">
        <div class="bg-blue-600 p-10 md:p-12 rounded-[3.5rem] shadow-xl transition-all duration-300 group-hover:shadow-blue-500/20">
            <i class="fas fa-lightbulb text-5xl text-yellow-300 mb-8"></i>
            <h3 class="text-3xl font-extrabold text-white mb-6">Tips Hari Ini</h3>
            <p class="text-blue-50 text-xl leading-relaxed mb-10">
                "Periksa kondisi daun secara berkala dan potong daun yang menguning untuk menjaga nutrisi bunga tetap efisien."
            </p>
            <button @click="expanded = true"
                    class="bg-white text-blue-600 px-8 py-4 rounded-2xl font-black uppercase tracking-widest text-xs hover:scale-105 transition-all shadow-lg">
                Lihat Semua Tips
            </button>
        </div>

        {{-- Glow Effect belakang kartu --}}
        <div class="absolute -top-10 -right-10 w-64 h-64 bg-blue-500/20 blur-[100px] -z-10"></div>
    </div>
</div>
    </div>
</section>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</x-layout-user>
