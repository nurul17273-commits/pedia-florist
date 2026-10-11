<x-layout-admin>
    <x-slot:title>Katalog Tanaman | PediaFlorist Pro</x-slot:title>

    <div x-data="{ openModal: false }">

        {{-- HEADER --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tight flex items-center gap-2 italic uppercase">
                    Katalog <span class="text-blue-600">Tanaman.</span>
                </h2>
                <p class="text-[13px] text-slate-500 font-medium">
                    Database flora utama untuk sistem identifikasi dan panduan user.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <button
                    class="flex items-center gap-2 px-5 py-2.5 bg-white border border-slate-200 rounded-xl text-[11px] font-black uppercase tracking-widest text-slate-600 hover:bg-slate-50 transition-all shadow-sm">
                    <i class="fas fa-file-export text-blue-500"></i>
                    Export CSV
                </button>

                <button @click="openModal = true"
                    class="flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white rounded-xl text-[11px] font-black uppercase tracking-widest hover:bg-blue-700 transition-all shadow-lg shadow-blue-200">
                    <i class="fas fa-plus"></i>
                    Tambah Flora
                </button>
            </div>
        </div>

        {{-- SEARCH FILTER --}}
        <div
            class="bg-white p-5 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/50 mb-8 flex flex-wrap items-center justify-between gap-6">

            <form method="GET" class="flex items-center gap-4 flex-1 min-w-[300px]">

                <div class="relative flex-1">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>

                    <input type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari nama latin atau populer..."
                        class="w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-100 rounded-2xl text-[12px] font-medium focus:ring-4 focus:ring-blue-500/10 focus:bg-white outline-none transition-all">
                </div>

                <select
                    name="kategori"
                    onchange="this.form.submit()"
                    class="bg-slate-50 border border-slate-100 rounded-2xl px-4 py-3 text-[12px] font-bold text-slate-600 outline-none focus:ring-4 focus:ring-blue-500/10 transition-all cursor-pointer">

                    <option value="">Semua Kategori</option>

                    <option value="indoor"
                        {{ request('kategori') == 'indoor' ? 'selected' : '' }}>
                        Indoor Plants
                    </option>

                    <option value="outdoor"
                        {{ request('kategori') == 'outdoor' ? 'selected' : '' }}>
                        Outdoor Plants
                    </option>

                    <option value="herbal"
                        {{ request('kategori') == 'herbal' ? 'selected' : '' }}>
                        Medicinal/Herbal
                    </option>
                </select>
            </form>

            <div class="px-4 py-2 bg-blue-50 rounded-lg">
                <span class="text-[10px] font-black text-blue-600 uppercase tracking-widest">
                    Total: {{ $total }} Spesies
                </span>
            </div>
        </div>

        {{-- TABLE --}}
        <div
            class="bg-white rounded-[2.5rem] border border-slate-100 shadow-xl shadow-slate-200/60 overflow-hidden transition-all">

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">

                    <thead>
                        <tr
                            class="bg-slate-50/50 border-b border-slate-100 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">
                            <th class="px-8 py-6">Informasi Flora</th>
                            <th class="px-6 py-6">Kategori</th>
                            <th class="px-6 py-6">Tingkat Kesulitan</th>
                            <th class="px-6 py-6 text-center">Status AI</th>
                            <th class="px-8 py-6 text-right">Manajemen</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-50 text-[13px]">

                        @forelse ($plants as $plant)
                            <tr class="hover:bg-slate-50 transition">

                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">

                                        <img
                                            src="{{ $plant->cover ? asset('storage/' . $plant->cover) : 'https://placehold.co/100x100' }}"
                                            class="w-16 h-16 rounded-2xl object-cover border border-slate-100">

                                        <div>
                                            <h4 class="font-black text-slate-700">
                                                {{ $plant->nama_populer }}
                                            </h4>

                                            <p class="italic text-slate-400 text-sm">
                                                {{ $plant->nama_latin }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-6">
                                    <span
                                        class="px-3 py-2 rounded-xl bg-slate-100 font-bold text-xs uppercase">
                                        {{ $plant->kategori }}
                                    </span>
                                </td>

                                <td class="px-6 py-6 capitalize font-semibold">
                                    {{ $plant->tingkat_kesulitan }}
                                </td>

                                <td class="px-6 py-6 text-center">
                                    @if ($plant->status_ai == 'synced')
                                        <span
                                            class="px-3 py-2 rounded-full bg-emerald-100 text-emerald-600 text-xs font-bold uppercase">
                                            Synced
                                        </span>
                                    @else
                                        <span
                                            class="px-3 py-2 rounded-full bg-orange-100 text-orange-600 text-xs font-bold uppercase">
                                            Pending
                                        </span>
                                    @endif
                                </td>

                                <td class="px-8 py-6 text-right">
                                    <form
                                        action="{{ route('plants.destroy', $plant->id) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Hapus flora ini?')"
                                            class="px-4 py-2 rounded-xl bg-red-50 text-red-500 hover:bg-red-100 text-xs font-black uppercase transition-all">

                                            Hapus
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5"
                                    class="text-center py-14 text-slate-400 font-semibold">
                                    Belum ada data flora
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

        {{-- MODAL --}}
        <template x-teleport="body">
            <div x-show="openModal"
                x-cloak
                class="fixed inset-0 z-50 flex items-center justify-center p-4 transition-all duration-300">

                <div
                    class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm"
                    @click="openModal = false"></div>

                <div
                    x-show="openModal"
                    x-transition
                    class="relative w-full max-w-5xl mx-auto bg-white rounded-[3.5rem] shadow-2xl border border-slate-100 flex flex-col overflow-hidden">

                    {{-- HEADER --}}
                    <div class="px-8 py-6 border-b border-slate-50 flex justify-between items-center bg-white">
                        <div>
                            <h3
                                class="text-xl font-black text-slate-800 uppercase italic tracking-tighter">
                                Entry <span class="text-blue-600">Flora Baru</span>
                            </h3>
                        </div>

                        <button
                            @click="openModal = false"
                            class="w-10 h-10 rounded-full bg-slate-50 text-slate-400 hover:text-rose-500 flex items-center justify-center">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    {{-- FORM --}}
                    <form action="{{ route('plants.store') }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <div class="p-8">

                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                                {{-- INFO --}}
                                <div class="space-y-4">

                                    <h4 class="text-[10px] font-black text-blue-600 uppercase tracking-widest">
                                        Informasi Flora
                                    </h4>

                                    <div>
                                        <label class="text-xs font-bold text-slate-500">
                                            Nama Populer
                                        </label>

                                        <input
                                            type="text"
                                            name="nama_populer"
                                            required
                                            class="w-full mt-2 px-4 py-3 bg-slate-50 rounded-xl text-xs font-bold">
                                    </div>

                                    <div>
                                        <label class="text-xs font-bold text-slate-500">
                                            Nama Latin
                                        </label>

                                        <input
                                            type="text"
                                            name="nama_latin"
                                            required
                                            class="w-full mt-2 px-4 py-3 bg-slate-50 rounded-xl text-xs font-bold italic">
                                    </div>
                                </div>

                                {{-- SPESIFIKASI --}}
                                <div class="space-y-4">

                                    <h4 class="text-[10px] font-black text-blue-600 uppercase tracking-widest">
                                        Spesifikasi
                                    </h4>

                                    <select
                                        name="kategori"
                                        required
                                        class="w-full px-4 py-3 bg-slate-50 rounded-xl text-xs font-bold">

                                        <option value="indoor">Indoor Plants</option>
                                        <option value="outdoor">Outdoor Plants</option>
                                        <option value="herbal">Medicinal/Herbal</option>
                                    </select>

                                    <select
                                        name="tingkat_kesulitan"
                                        required
                                        class="w-full px-4 py-3 bg-slate-50 rounded-xl text-xs font-bold">

                                        <option value="mudah">Mudah</option>
                                        <option value="sedang">Sedang</option>
                                        <option value="sulit">Sulit</option>
                                    </select>
                                </div>

                                {{-- AI --}}
                                <div class="space-y-4">

                                    <h4 class="text-[10px] font-black text-blue-600 uppercase tracking-widest">
                                        Status AI & Media
                                    </h4>

                                    <div class="flex gap-2">

                                        <label class="flex-1">
                                            <input
                                                type="radio"
                                                name="status_ai"
                                                value="synced"
                                                class="hidden peer">

                                            <div
                                                class="py-3 rounded-xl bg-slate-50 text-center text-xs font-black border-2 border-transparent peer-checked:border-emerald-500 uppercase">
                                                Synced
                                            </div>
                                        </label>

                                        <label class="flex-1">
                                            <input
                                                type="radio"
                                                name="status_ai"
                                                value="pending"
                                                checked
                                                class="hidden peer">

                                            <div
                                                class="py-3 rounded-xl bg-slate-50 text-center text-xs font-black border-2 border-transparent peer-checked:border-orange-500 uppercase">
                                                Pending
                                            </div>
                                        </label>
                                    </div>

                                    <input
                                        type="file"
                                        name="cover"
                                        class="w-full p-4 bg-slate-50 rounded-2xl text-xs">
                                </div>
                            </div>
                        </div>

                        {{-- FOOTER --}}
                        <div class="px-8 py-6 border-t border-slate-50 bg-slate-50/50 flex gap-4">

                            <button
                                type="button"
                                @click="openModal = false"
                                class="px-8 py-4 bg-white text-slate-400 rounded-2xl font-black text-[10px] uppercase border border-slate-200">
                                Batal
                            </button>

                            <button
                                type="submit"
                                class="flex-1 py-4 bg-slate-900 text-white rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] hover:bg-blue-600 transition-all">

                                Simpan Spesies Baru
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </template>
    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</x-layout-admin>
