<x-layout-user>
    <x-slot:title>PediaFlorist Pro - Perawatan Bunga Jadi Lebih Hidup</x-slot>

    {{-- Bungkus seluruh konten dengan x-data agar state alarmModal bisa diakses dari mana saja --}}
<div x-data="{
    alarmModal: false,

    schedules: [
        {
            plant: 'Anggrek',
            time: '08:00',
            volume: '250ml'
        },
        {
            plant: 'Mawar',
            time: '09:30',
            volume: '300ml'
        }
    ],

    newSchedule: {
        plant: 'Anggrek Bulan',
        time: '',
        days: ['Sen', 'Kam']
    },

    saveSchedule() {

        if (!this.newSchedule.time) {
            alert('Pilih waktu terlebih dahulu!');
            return;
        }

        this.schedules.push({
            plant: this.newSchedule.plant,
            time: this.newSchedule.time,
            volume: '250ml'
        });

        this.alarmModal = false;

        alert('Jadwal berhasil disimpan!');

        this.newSchedule = {
            plant: 'Anggrek Bulan',
            time: '',
            days: ['Sen', 'Kam']
        };
    }
}">

        <section class="relative min-h-[50vh] flex items-center overflow-hidden">
            <div class="absolute inset-0 z-0">
                <img src="/image/image 14.png" class="w-full h-full object-cover" alt="Background Jadwal">
                <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-slate-900/75 to-transparent"></div>
            </div>

            <div class="relative z-10 max-w-7xl mx-auto px-6 w-full pt-20">
                <div data-aos="fade-right" data-aos-duration="1200">
                    <h1 class="text-5xl md:text-6xl font-black text-white leading-tight mb-6">
                        Jadwal & <span class="text-blue-400 relative">Diagnosa AI<span class="absolute -bottom-2 left-0 w-full h-1 bg-yellow-400 rounded-full"></span></span>
                    </h1>
                    <p class="text-slate-300 text-lg md:text-xl max-w-xl leading-relaxed">
                        Manajemen penyiraman rutin sekaligus pastikan kesehatan tanaman Anda terlindungi dengan teknologi AI canggih.
                    </p>
                </div>
            </div>
        </section>

        <main class="max-w-7xl mx-auto px-6 py-20 relative z-20">
            <div class="grid lg:grid-cols-3 gap-12">


{{-- KOLOM KIRI: JADWAL --}}
<div class="lg:col-span-2 space-y-10" data-aos="fade-right">

    {{-- KALENDER REALTIME --}}
    <div class="bg-white p-8 rounded-[2.5rem] shadow-lg border border-slate-100 relative"
         x-data="{
            today: new Date(),

            get formattedDate() {
                return this.today.toLocaleDateString('id-ID', {
                    weekday: 'long',
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                })
            },

            get calendarDays() {

                let days = [];
                let current = new Date();

                for(let i = -3; i <= 3; i++) {

                    let d = new Date();
                    d.setDate(current.getDate() + i);

                    days.push({
                        date: d.getDate(),
                        day: d.toLocaleDateString('id-ID', { weekday: 'short' }),
                        active: i === 0
                    });
                }

                return days;
            }
         }">

        <div class="flex items-center gap-4 mb-10 text-slate-900">

            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-xl">
                <i class="fas fa-calendar-day"></i>
            </div>

            <div class="text-xl md:text-2xl font-black capitalize"
                 x-text="'Hari Ini (' + formattedDate + ')'">
            </div>

        </div>

        <div class="flex justify-between items-center overflow-x-auto no-scrollbar pb-2 gap-6">

            <template x-for="item in calendarDays" :key="item.date">

                <div
                    :class="item.active
                        ? 'bg-blue-600 text-white p-3 px-5 rounded-2xl shadow-lg shadow-blue-200'
                        : 'text-center min-w-[50px] cursor-pointer hover:text-blue-600'"
                    class="transition-all">

                    <p class="text-xs font-bold mb-1"
                       :class="!item.active ? 'text-slate-400' : ''"
                       x-text="item.day">
                    </p>

                    <p class="text-lg font-black"
                       x-text="item.date">
                    </p>

                </div>

            </template>

        </div>

    </div>



                    {{-- List Item Jadwal --}}
{{-- List Item Jadwal --}}
<div class="space-y-6">

    @foreach($schedules as $schedule)

    <div class="bg-white p-6 rounded-3xl border border-slate-100 flex items-center justify-between shadow-sm hover:shadow-md transition-all">

        <div class="flex items-center gap-6">


            <div>
                <h4 class="text-xl font-bold">
                    {{ $schedule->plant }}
                </h4>

                <p class="text-sm text-slate-400">
                    Penyiraman •
                    {{ \Carbon\Carbon::parse($schedule->time)->format('H:i') }}
                    • Volume {{ $schedule->volume }}
                </p>
            </div>

        </div>

        <form action="/jadwal/{{ $schedule->id }}" method="POST">
            @csrf
            @method('DELETE')

            <button class="px-5 py-2.5 rounded-xl border-2 border-red-500 text-red-500 font-black uppercase text-xs tracking-widest hover:bg-red-500 hover:text-white transition-all">
                Selesai
            </button>
        </form>

    </div>

    @endforeach

</div>
                </div>

                {{-- KOLOM KANAN: SIDEBAR --}}
                <div class="space-y-10" data-aos="fade-left">
                    {{-- CARD PENGINGAT PERAWATAN --}}
                    <div class="bg-white p-10 rounded-[2.5rem] border border-slate-100 shadow-xl relative overflow-hidden">
                        <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center text-2xl mb-8">
                            <i class="fas fa-bell"></i>
                        </div>
                        <h4 class="text-2xl font-bold mb-4 text-slate-900">Pengingat Perawatan</h4>
                        <p class="text-slate-600 text-sm mb-10 leading-relaxed">Aktifkan notifikasi untuk selalu menjadikan pengingat jadwal perawatan tepat waktu.</p>

                        <button @click="alarmModal = true" class="w-full py-4 bg-blue-600 text-white rounded-2xl font-black uppercase text-xs tracking-widest hover:shadow-lg hover:shadow-blue-200 transition-all flex items-center gap-3 justify-center relative z-10">
                            <i class="fas fa-power-off"></i> Aktifkan Pengingat
                        </button>

                        <i class="fas fa-shower absolute -right-6 -bottom-6 text-slate-50 text-8xl rotate-12 opacity-50"></i>
                    </div>

                    {{-- CARD AI --}}
<div class="bg-slate-900 p-10 rounded-[2.5rem] shadow-2xl relative overflow-hidden text-white"
x-data="{
    imageUrl: null,
    fileName: '',
    file: null,
    result: '',

    fileChosen(event) {
        const file = event.target.files[0];
        if (!file) return;

        this.file = file;
        this.fileName = file.name;

        const reader = new FileReader();
        reader.readAsDataURL(file);

        reader.onload = (e) => {
            this.imageUrl = e.target.result;
        };
    },

async analyzeImage() {

    if (!this.file) {
        alert('Silakan pilih gambar tanaman terlebih dahulu!');
        return;
    }

    let formData = new FormData();
    formData.append('image', this.file);

    try {

        let response = await fetch('/analyze', {
            method: 'POST',
            body: formData
        });

        let data = await response.json();

        this.result = data.result;

    } catch (e) {

        alert('Gagal mendapatkan konsultasi');
    }
}
}">

    {{-- Background Pattern --}}
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\'20\' height=\'20\' viewBox=\'0 0 20 20\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%233b82f6\' fill-opacity=\'0.1\' fill-rule=\'evenodd\'%3E%3Ccircle cx=\'3\' cy=\'3\' r=\'3\'/%3E%3Ccircle cx=\'13\' cy=\'13\' r=\'3\'/%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>

    <div class="relative z-10">

        {{-- Badge --}}
        <div class="inline-flex gap-2 items-center bg-green-500/20 text-green-300 px-3 py-1 rounded-full text-xs font-bold mb-6 border border-green-400/30 backdrop-blur-sm">
            <i class="fas fa-leaf"></i>
            FITUR INTERAKTIF
        </div>

        {{-- Title --}}
        <h4 class="text-2xl font-bold mb-4">
            Konsultasi Perawatan Tanaman
        </h4>

        {{-- Description --}}
        <p class="text-slate-300 text-sm mb-10 leading-relaxed">
            Upload foto tanaman Anda untuk mendapatkan rekomendasi dan tips perawatan tanaman secara instan.
        </p>

        {{-- Hidden Input --}}
        <input type="file"
               x-ref="fileInput"
               @change="fileChosen"
               class="hidden"
               accept="image/*">

        {{-- Upload Area --}}
        <div @click="$refs.fileInput.click()"
             class="relative group rounded-3xl p-6 text-center cursor-pointer mb-8 bg-white/5 border-2 border-dashed border-white/10 hover:border-green-500 hover:bg-green-900/10 transition-all overflow-hidden min-h-[160px] flex flex-col items-center justify-center">

            {{-- Sebelum Upload --}}
            <template x-if="!imageUrl">
                <div class="space-y-4">

                    <i class="fas fa-seedling text-4xl text-green-400 group-hover:scale-110 transition-transform"></i>

                    <div>
                        <p class="text-xs text-white font-bold">
                            Upload Foto Tanaman
                        </p>

                        <p class="text-[10px] text-slate-400 mt-1 uppercase tracking-widest">
                            Mendukung JPEG, PNG
                        </p>
                    </div>

                </div>
            </template>

            {{-- Setelah Upload --}}
            <template x-if="imageUrl">

                <div class="relative w-full h-full">

                    <img :src="imageUrl"
                         class="w-full h-32 object-cover rounded-xl shadow-lg border border-white/20">

                    {{-- Remove --}}
                    <div class="absolute -top-2 -right-2 bg-red-500 text-white w-6 h-6 rounded-full flex items-center justify-center text-[10px]"
                         @click.stop="imageUrl = null; fileName = ''; file = null; result = ''">

                        <i class="fas fa-times"></i>
                    </div>

                    <p class="mt-2 text-[10px] text-green-300 font-bold truncate"
                       x-text="fileName"></p>

                </div>

            </template>
        </div>

        {{-- Button --}}
        <button
            @click="analyzeImage"
            class="w-full py-4 rounded-2xl font-black uppercase text-xs tracking-widest transition-all active:scale-95 flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white">

            <span>Dapatkan Tips Perawatan</span>

            <i class="fas fa-spa"></i>

        </button>

        {{-- Result --}}
        <div x-show="result"
             x-transition
             class="mt-6 bg-white/5 border border-white/10 rounded-2xl p-5">

            <p class="text-sm font-bold text-green-300 mb-3">
                Hasil Konsultasi:
            </p>

            <div class="text-sm text-slate-200 leading-relaxed"
                 x-html="result"></div>
        </div>

    </div>
</div>
                </div>
            </div>
        </main>

        {{-- MODAL (Teleport ke Body) --}}
        <template x-teleport="body">
            <div x-show="alarmModal"
                 class="fixed inset-0 flex items-center justify-center p-6"
                 style="z-index: 999999 !important;"
                 x-cloak>

                {{-- Backdrop --}}
                <div x-show="alarmModal"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     @click="alarmModal = false"
                     class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm"></div>

                {{-- Box Putih --}}
                <div x-show="alarmModal"
                     x-transition:enter="transition ease-out duration-500 transform"
                     x-transition:enter-start="opacity-0 scale-95 translate-y-10"
                     x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                     class="relative bg-white w-full max-w-md rounded-[2.5rem] p-10 shadow-2xl"
                     style="z-index: 1000000 !important;">

                    <div class="text-center mb-8">
                        <div class="w-20 h-20 bg-blue-50 text-blue-600 rounded-3xl flex items-center justify-center text-3xl mx-auto mb-4">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3 class="text-2xl font-black text-slate-900">Atur Pengingat</h3>
                        <p class="text-slate-500 text-sm mt-2">Pilih waktu untuk menyiram tanamanmu</p>
                    </div>

                    <form action="/jadwal" method="POST" class="space-y-8">
    @csrf
        {{-- Baris 1: Nama Bunga & Jam (Sejajar) --}}
        <div class="grid md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Pilih Tanaman</label>
                <div class="relative">
<select name="plant"
class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl p-4 font-bold text-slate-900 appearance-none">

    <option>Anggrek Bulan</option>
    <option>Mawar Hitam</option>
    <option>Lidah Mertua</option>

</select>
                    <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-300 pointer-events-none"></i>
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1">Waktu Penyiraman</label>
                <div class="flex items-center bg-slate-50 border-2 border-slate-100 rounded-2xl px-4 py-3.5 focus-within:ring-2 focus-within:ring-blue-600 transition-all">
                    <i class="fas fa-clock text-blue-500 mr-3"></i>
                    <input type="time"
       name="time"
       required
       class="bg-transparent border-none p-0 text-xl font-black text-slate-900 focus:ring-0 outline-none w-full uppercase">
                </div>
            </div>
        </div>

        {{-- Baris 2: Hari (Full Width) --}}
        <div class="space-y-3" x-data="{ selectedDays: ['Sen', 'Kam'] }">
            <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-1 text-center block md:text-left">Ulangi Jadwal Pada Hari</label>
<div class="flex justify-between md:justify-start gap-2 overflow-x-auto pb-2 no-scrollbar">

    @foreach(['Sen','Sel','Rab','Kam','Jum','Sab','Min'] as $day)

    <label class="cursor-pointer">

        <input
            type="checkbox"
            name="days[]"
            value="{{ $day }}"
            class="hidden peer">

        <div class="flex-1 min-w-[45px] aspect-square rounded-2xl flex items-center justify-center text-xs font-black transition-all
                    bg-slate-50 text-slate-400
                    peer-checked:bg-blue-600
                    peer-checked:text-white
                    peer-checked:shadow-lg
                    peer-checked:shadow-blue-200">

            {{ $day }}

        </div>

    </label>

    @endforeach

</div>


        {{-- Footer: Tombol Aksi (Sejajar) --}}
        <div class="flex items-center gap-4 pt-4 border-t border-slate-50">
            <button type="button" @click="alarmModal = false" class="flex-1 py-4 text-slate-400 font-bold text-xs uppercase tracking-widest hover:bg-slate-50 rounded-2xl transition-all">
                Batalkan
            </button>
            <button type="submit" class="flex-[2] py-4 bg-slate-900 text-white rounded-2xl font-black uppercase text-xs tracking-widest hover:bg-blue-600 shadow-xl transition-all active:scale-95">
                Simpan Jadwal
            </button>
        </div>
    </form>
                </div>
            </div>
        </template>

    </div>
{{-- Akhir x-data --}}
</x-layout-user>
