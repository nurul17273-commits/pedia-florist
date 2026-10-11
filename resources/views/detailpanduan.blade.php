<x-layout-user>
    <x-slot:title>Panduan Perawatan Lengkap - PediaFlorist Pro</x-slot>

    <header class="bg-slate-900 pt-20 pb-32 px-6 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-blue-600/10 skew-x-12 translate-x-20"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <nav class="flex mb-8 text-slate-400 text-sm gap-2">
                <a href="/" class="hover:text-white transition">Beranda</a>
                <span>/</span>
                <span class="text-blue-400">Panduan Lengkap</span>
            </nav>
            <h1 class="text-5xl font-extrabold text-white mb-6">Pusat Bantuan <br><span class="text-blue-500">Perawatan Tanaman</span></h1>
            <p class="text-slate-400 text-lg max-w-2xl">Panduan komprehensif dari para ahli botani untuk memastikan tanaman Anda tumbuh maksimal dan sehat sepanjang tahun.</p>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 -mt-16 relative z-20 pb-28" x-data="{ tab: 'dasar' }">
        <div class="flex flex-col lg:flex-row gap-12">

            <aside class="lg:w-1/4">
                <div class="bg-white rounded-3xl p-8 shadow-xl shadow-slate-200/50 border border-slate-100 sticky top-28">
                    <h3 class="font-bold text-slate-900 mb-6 flex items-center gap-2">
                        <i class="fas fa-list-ul text-blue-600"></i> Kategori Panduan
                    </h3>
                    <div class="flex flex-col gap-2">
                        <button @click="tab = 'dasar'"
                            :class="tab === 'dasar' ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-600 hover:bg-slate-50'"
                            class="flex items-center justify-between p-4 rounded-xl transition-all duration-200 text-left">
                            Dasar Perawatan <i class="fas fa-chevron-right text-xs" x-show="tab === 'dasar'"></i>
                        </button>

                        <button @click="tab = 'penyiraman'"
                            :class="tab === 'penyiraman' ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-600 hover:bg-slate-50'"
                            class="flex items-center justify-between p-4 rounded-xl transition-all duration-200 text-left">
                            Teknik Penyiraman <i class="fas fa-chevron-right text-xs" x-show="tab === 'penyiraman'"></i>
                        </button>

                        <button @click="tab = 'pencahayaan'"
                            :class="tab === 'pencahayaan' ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-600 hover:bg-slate-50'"
                            class="flex items-center justify-between p-4 rounded-xl transition-all duration-200 text-left">
                            Pencahayaan <i class="fas fa-chevron-right text-xs" x-show="tab === 'pencahayaan'"></i>
                        </button>

                        <button @click="tab = 'hama'"
                            :class="tab === 'hama' ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-600 hover:bg-slate-50'"
                            class="flex items-center justify-between p-4 rounded-xl transition-all duration-200 text-left">
                            Penanganan Hama <i class="fas fa-chevron-right text-xs" x-show="tab === 'hama'"></i>
                        </button>
                    </div>
<div class="mt-10 p-5 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl text-white shadow-lg shadow-blue-200">
    <p class="text-xs opacity-80 mb-2">Butuh bantuan khusus?</p>
    <p class="font-bold mb-4 text-sm">Konsultasi langsung dengan ahli kami</p>
    <button @click="tab = 'chat'"
        class="w-full bg-white text-blue-700 py-2.5 rounded-xl text-xs font-bold hover:bg-blue-50 transition-all active:scale-95">
        Chat Sekarang
    </button>
</div>
                </div>
            </aside>

<article class="lg:w-3/4">
    <div class="bg-white rounded-3xl p-10 md:p-16 shadow-xl shadow-slate-200/50 border border-slate-100 min-h-[800px]">

        <div x-show="tab === 'dasar'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4">
            <div class="inline-block px-4 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold mb-4">MODUL 01: FUNDAMENTAL</div>
            <h2 class="text-4xl font-extrabold text-slate-950 mb-6">Memahami Anatomi & Dasar Pertumbuhan</h2>
            <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed space-y-6">
                <p>Menanam bunga bukan sekadar menaruh benih di tanah. Anda sedang membangun sebuah **mikro-ekosistem**. Untuk berhasil, Anda harus memahami tiga elemen vital yang saling terhubung.</p>

                <div class="space-y-8 mt-8">
                    <div class="flex gap-6">
                        <div class="shrink-0 w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600 text-xl font-bold italic">01</div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-900 mb-2">Media Tanam (The Foundation)</h4>
                            <p class="text-sm">Jangan gunakan tanah taman biasa yang padat. Campuran ideal adalah **Tanah Humus, Sekam Bakar, dan Cocopeat (2:1:1)**. Sekam bakar menjaga porositas (udara masuk), sementara cocopeat menjaga kelembaban tanpa membuat akar tenggelam.</p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="shrink-0 w-12 h-12 bg-green-100 rounded-2xl flex items-center justify-center text-green-600 text-xl font-bold italic">02</div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-900 mb-2">Drainase & Sirkulasi Akar</h4>
                            <p class="text-sm">Akar membutuhkan oksigen untuk bernapas (respirasi). Gunakan pot dengan **lubang drainase samping** dan lapisi dasar pot dengan batu kerikil setebal 2cm sebelum memasukkan tanah untuk mencegah penyumbatan air.</p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="shrink-0 w-12 h-12 bg-purple-100 rounded-2xl flex items-center justify-center text-purple-600 text-xl font-bold italic">03</div>
                        <div>
                            <h4 class="text-xl font-bold text-slate-900 mb-2">Aklimatisasi (Adaptasi Lingkungan)</h4>
                            <p class="text-sm">Saat baru membeli bunga dari toko, jangan langsung ditaruh di bawah terik matahari. Berikan waktu **3-7 hari** di tempat teduh (teras) agar tanaman tidak mengalami *transplant shock* yang menyebabkan daun rontok seketika.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="tab === 'penyiraman'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4">
            <div class="inline-block px-4 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold mb-4">MODUL 02: HIDRASI PINTAR</div>
            <h2 class="text-4xl font-extrabold text-slate-950 mb-6 flex items-center gap-3">
                <i class="fas fa-droplet text-blue-500"></i> Seni Mengelola Kelembaban
            </h2>
            <p class="text-slate-600 leading-relaxed mb-8">Penyiraman yang salah adalah penyebab 80% kegagalan dalam merawat bunga. Berikut adalah teknik yang digunakan oleh para kolektor profesional.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div class="p-8 bg-gradient-to-br from-blue-50 to-white border border-blue-100 rounded-3xl">
                    <h4 class="font-bold text-blue-900 mb-4 flex items-center gap-2 text-lg">
                        <i class="fas fa-clock"></i> Golden Hours
                    </h4>
                    <p class="text-sm text-slate-600 leading-loose">Waktu terbaik adalah **pukul 06:00 - 08:00 pagi**. Air memiliki waktu untuk meresap ke akar dan sisa air di daun akan menguap saat matahari muncul, mencegah pertumbuhan jamur patogen.</p>
                </div>
                <div class="p-8 bg-gradient-to-br from-slate-50 to-white border border-slate-100 rounded-3xl">
                    <h4 class="font-bold text-slate-900 mb-4 flex items-center gap-2 text-lg">
                        <i class="fas fa-temperature-half"></i> Kualitas Air
                    </h4>
                    <p class="text-sm text-slate-600 leading-loose">Hindari air PAM yang mengandung kaporit tinggi. Gunakan **air cucian beras** yang kaya vitamin B1 atau endapkan air keran selama 24 jam sebelum digunakan untuk menetralkan zat kimia.</p>
                </div>
            </div>

            <div class="bg-slate-900 p-8 rounded-3xl text-white">
                <h4 class="text-blue-400 font-bold mb-4 italic text-lg">The "Finger Test" Method:</h4>
                <p class="text-slate-300 text-sm mb-6">Jangan menyiram berdasarkan jadwal kalender (misal: tiap hari). Masukkan jari telunjuk hingga kedalaman dua buku jari (sekitar 3-5 cm):</p>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3 text-sm"><i class="fas fa-circle-check text-green-400"></i> Jika Terasa Basah: Jangan disiram.</li>
                    <li class="flex items-center gap-3 text-sm"><i class="fas fa-circle-check text-yellow-400"></i> Jika Terasa Lembab: Pantau besok pagi.</li>
                    <li class="flex items-center gap-3 text-sm"><i class="fas fa-circle-exclamation text-red-400"></i> Jika Terasa Kering: Siram hingga air mengucur dari bawah pot.</li>
                </ul>
            </div>
        </div>

        <div x-show="tab === 'pencahayaan'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4">
            <div class="inline-block px-4 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-bold mb-4">MODUL 03: FOTOSINTESIS</div>
            <h2 class="text-4xl font-extrabold text-slate-950 mb-6">Manajemen Cahaya & Fototropisme</h2>
            <p class="text-slate-600 leading-relaxed mb-8">Setiap bunga memiliki "durasi paparan" yang berbeda. Memaksa tanaman *indoor* terkena matahari langsung dapat menyebabkan **sunburn** (daun hangus permanen).</p>

            <div class="space-y-6">
                <div class="p-6 border-l-4 border-orange-500 bg-orange-50/50 rounded-r-2xl">
                    <h4 class="font-bold text-slate-900 mb-2">Cahaya Terang Tidak Langsung (Bright Indirect Light)</h4>
                    <p class="text-sm text-slate-600">Ini adalah "Sweet Spot" bagi kebanyakan tanaman hias. Letakkan tanaman di dekat jendela arah utara atau timur. Cahaya harus cukup terang untuk membaca buku, tapi sinar matahari tidak menyentuh daun secara fisik.</p>
                </div>
                <div class="p-6 border-l-4 border-yellow-400 bg-yellow-50/50 rounded-r-2xl">
                    <h4 class="font-bold text-slate-900 mb-2">Cahaya Matahari Penuh (Full Sun)</h4>
                    <p class="text-sm text-slate-600">Cocok untuk Mawar, Adenium, dan Bunga Matahari. Membutuhkan minimal **6-8 jam** cahaya intens. Jika kekurangan cahaya, tanaman akan menjadi *Etolasi* (batang memanjang, kurus, dan lemah).</p>
                </div>
                <div class="mt-8">
                    <h4 class="font-bold text-slate-900 mb-4 italic underline underline-offset-4 decoration-orange-300">Pro-Tip: Rotasi Pot</h4>
                    <p class="text-sm text-slate-600 leading-relaxed">Tanaman tumbuh mengikuti arah cahaya (Fototropisme). **Putar pot 90 derajat setiap minggu** agar pertumbuhan batang seimbang dan tidak miring ke satu sisi saja.</p>
                </div>
            </div>
        </div>

        <div x-show="tab === 'hama'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4">
            <div class="inline-block px-4 py-1 bg-red-100 text-red-700 rounded-full text-xs font-bold mb-4">MODUL 04: PROTEKSI</div>
            <h2 class="text-4xl font-extrabold text-slate-950 mb-6 italic">Diagnosis & Penanganan Penyakit</h2>
            <p class="text-slate-600 leading-relaxed mb-8">Hama seringkali datang karena tanaman sedang dalam kondisi lemah (stres). Kenali musuh Anda sebelum mereka menghancurkan seluruh taman.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="p-6 border border-red-100 rounded-3xl hover:bg-red-50/50 transition">
                    <div class="w-10 h-10 bg-red-100 text-red-600 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-bug"></i></div>
                    <h4 class="font-bold text-slate-900 mb-2">Spider Mites (Tungau Merah)</h4>
                    <p class="text-xs text-slate-500 mb-4 italic">Gejala: Jaring laba-laba halus dan daun berbintik kuning.</p>
                    <p class="text-sm text-slate-700">**Solusi:** Tingkatkan kelembaban udara (mist spray) dan gunakan larutan minyak mimba (neem oil) yang disemprot setiap sore selama 3 hari berturut-turut.</p>
                </div>
                <div class="p-6 border border-slate-200 rounded-3xl hover:bg-slate-50 transition">
                    <div class="w-10 h-10 bg-slate-100 text-slate-600 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-bacteria"></i></div>
                    <h4 class="font-bold text-slate-900 mb-2">Root Rot (Busuk Akar)</h4>
                    <p class="text-xs text-slate-500 mb-4 italic">Gejala: Batang lembek hitam dan bau menyengat dari tanah.</p>
                    <p class="text-sm text-slate-700">**Solusi:** Segera bongkar tanaman, potong akar yang hitam/lembek, cuci dengan fungisida dosis rendah, dan ganti media tanam yang benar-benar kering.</p>
                </div>
            </div>

            <div class="mt-10 p-8 rounded-3xl border-2 border-dashed border-red-200 bg-red-50/20">
                <h4 class="text-red-700 font-extrabold mb-4 uppercase tracking-tighter">Golden Rule: Karantina!</h4>
                <p class="text-sm text-slate-600 leading-relaxed">Jika Anda menemukan satu tanaman terkena hama, segera jauhkan (karantina) minimal **5 meter** dari tanaman lain. Hama seperti kutu putih dapat berpindah dengan bantuan semut atau hembusan angin ke seluruh koleksi Anda dalam waktu satu malam.</p>
            </div>
        </div>
<div x-show="tab === 'chat'"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-y-4">

    <div class="flex flex-col h-[700px]"
         x-data="{
            message: '',
            loading: false,

            chats: [
                {
                    type: 'bot',
                    text: 'Halo! Saya Dr. Aris 🌿 Ada kendala apa dengan tanaman Anda hari ini? Jelaskan gejalanya atau upload foto tanaman.'
                }
            ],

            async sendMessage() {

                if (!this.message.trim()) return;

                let userMessage = this.message;

                // push user chat
                this.chats.push({
                    type: 'user',
                    text: userMessage
                });

                this.message = '';
                this.loading = true;

                try {

                    let response = await fetch('/chat-ai', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                        },
                        body: JSON.stringify({
                            message: userMessage
                        })
                    });

                    let data = await response.json();

                    this.chats.push({
                        type: 'bot',
                        text: data.reply
                    });

                } catch (e) {

                    this.chats.push({
                        type: 'bot',
                        text: 'Maaf, sistem AI sedang bermasalah.'
                    });

                }

                this.loading = false;

                this.$nextTick(() => {
                    this.$refs.chatScroll.scrollTop =
                        this.$refs.chatScroll.scrollHeight;
                });
            }
         }">

        {{-- Header --}}
        <div class="flex items-center justify-between pb-6 border-b border-slate-100">
            <div class="flex items-center gap-4">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=100"
                         class="w-14 h-14 rounded-full object-cover border-2 border-blue-500 p-0.5">

                    <span class="absolute bottom-0 right-0 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></span>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 text-lg">
                        Dr. Aris AI
                    </h4>

                    <p class="text-xs text-green-600 font-semibold">
                        Online
                    </p>
                </div>
            </div>
        </div>

        {{-- Chat Area --}}
        <div class="flex-1 overflow-y-auto py-8 space-y-6 px-2"
             x-ref="chatScroll">

            <template x-for="chat in chats">

                <div :class="chat.type === 'user'
                    ? 'flex justify-end'
                    : 'flex justify-start'">

                    <div :class="chat.type === 'user'
                        ? 'bg-blue-600 text-white rounded-tr-none'
                        : 'bg-slate-100 text-slate-700 rounded-tl-none'"
                        class="max-w-[80%] p-4 rounded-2xl text-sm leading-relaxed shadow">

                        <span x-text="chat.text"></span>

                    </div>
                </div>

            </template>

            {{-- loading --}}
            <div x-show="loading" class="flex justify-start">
                <div class="bg-slate-100 px-4 py-3 rounded-2xl text-sm text-slate-500">
                    AI sedang mengetik...
                </div>
            </div>

        </div>

        {{-- Input --}}
        <div class="pt-6 border-t border-slate-100">
            <div class="relative flex items-center gap-3">

                <input
                    x-model="message"
                    @keydown.enter.prevent="sendMessage()"
                    type="text"
                    placeholder="Tulis pertanyaan Anda..."
                    class="flex-1 bg-slate-50 px-6 py-4 rounded-2xl outline-none focus:ring-2 focus:ring-blue-600 text-sm">

                <button
                    @click="sendMessage()"
                    class="w-14 h-14 bg-blue-600 text-white rounded-2xl hover:bg-blue-700 transition">

                    <i class="fas fa-paper-plane"></i>

                </button>
            </div>

            <p class="text-[10px] text-center text-slate-400 mt-4 italic">
                AI Respon Otomatis • PediaFlorist Pro
            </p>
        </div>
    </div>
</div>
    </div>
</article>

        </div>
    </main>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</x-layout-user>
