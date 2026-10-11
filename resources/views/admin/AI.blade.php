<x-layout-admin>
    <x-slot:title>AI Diagnosa Center | PediaFlorist Pro</x-slot:title>

    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 mb-10">
        <div>
            <h2
                class="text-2xl font-black text-slate-800 tracking-tight flex items-center gap-2 italic uppercase">
                AI Neural <span class="text-blue-600">Feed.</span>
            </h2>

            <p class="text-[13px] text-slate-500 font-medium">
                Monitoring real-time aktivitas pemindaian dan kesehatan model AI.
            </p>
        </div>

        {{-- BOX ATAS DINAMIS --}}
        <div class="flex gap-4 flex-wrap">

            <div
                class="bg-white border border-slate-100 rounded-[1.5rem] px-6 py-4 shadow-xl shadow-slate-200/50 min-w-[160px] hover:scale-105 transition-transform">

                <p
                    class="text-[10px] font-black text-slate-400 uppercase tracking-[0.15em] mb-1">
                    Total Scans
                </p>

                <p class="text-2xl font-black text-slate-800 leading-none">
                    {{ $totalScans }}
                </p>
            </div>

            <div
                class="bg-white border border-slate-100 rounded-[1.5rem] px-6 py-4 shadow-xl shadow-slate-200/50 min-w-[160px] border-b-4 border-b-emerald-500">

                <p
                    class="text-[10px] font-black text-slate-400 uppercase tracking-[0.15em] mb-1">
                    Akurasi Global
                </p>

                <div class="flex items-center gap-2">
                    <p class="text-2xl font-black text-emerald-600 leading-none">
                        {{ $avgAccuracy }}%
                    </p>

                    <i
                        class="fas fa-arrow-trend-up text-emerald-400 text-xs"></i>
                </div>
            </div>

            <div
                class="bg-white border border-slate-100 rounded-[1.5rem] px-6 py-4 shadow-xl shadow-slate-200/50 min-w-[160px] border-b-4 border-b-orange-500">

                <p
                    class="text-[10px] font-black text-slate-400 uppercase tracking-[0.15em] mb-1">
                    Need Review
                </p>

                <p class="text-2xl font-black text-orange-500">
                    {{ $needReview }}
                </p>
            </div>

        </div>
    </div>

    {{-- SEARCH BAR --}}
    <div
        class="bg-slate-900 p-4 rounded-[2rem] shadow-2xl mb-8 flex flex-wrap gap-4 items-center justify-between">

        <div class="flex flex-1 gap-3 min-w-[300px]">

            <div class="relative flex-1">
                <i
                    class="fas fa-microscope absolute left-4 top-1/2 -translate-y-1/2 text-blue-400 text-xs"></i>

                <input type="text" id="aiSearch"
                    placeholder="Cari Scan ID atau Diagnosa..."
                    class="w-full pl-11 pr-4 py-3 bg-white/5 border border-white/10 rounded-2xl text-[12px] text-white font-medium outline-none focus:ring-2 focus:ring-blue-500/50 transition-all">
            </div>

        </div>

        <button
            class="px-6 py-3 bg-blue-600 text-white text-[11px] font-black uppercase tracking-widest rounded-xl hover:bg-blue-500 transition-all shadow-lg shadow-blue-500/20">

            <i class="fas fa-rotate mr-2"></i>
            Refresh Feed
        </button>
    </div>

    {{-- TABLE --}}
    <div
        class="bg-white rounded-[2.5rem] border border-slate-100 shadow-2xl shadow-slate-200/60 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-left border-collapse">

                <thead>
                    <tr
                        class="bg-slate-50/50 border-b border-slate-100 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">

                        <th class="px-8 py-6">Analisis Visual</th>
                        <th class="px-6 py-6">AI Prediction</th>
                        <th class="px-6 py-6">Confidence Score</th>
                        <th class="px-6 py-6 text-center">Hasil Deteksi</th>
                        <th class="px-8 py-6 text-right">Review Engine</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-50" id="aiTable">

                    @forelse($diagnoses as $d)
                        <tr class="hover:bg-slate-50/80 transition-all group">

                            <td class="px-8 py-5">
                                <div class="flex items-center gap-4">

                                    <div
                                        class="relative w-16 h-16 rounded-2xl overflow-hidden border-2 border-white shadow-xl">

                                        <img src="{{ asset('storage/' . $d->image) }}"
     class="w-full h-full object-cover">
                                    </div>

                                    <div>
                                        <p
                                            class="text-[11px] font-black text-blue-600 uppercase italic tracking-tighter">
                                            #{{ $d['scan_id'] }}
                                        </p>

                                        <p
                                            class="font-bold text-slate-800 text-[13px]">
                                            {{ $d['user'] }}
                                        </p>
                                    </div>

                                </div>
                            </td>

                            <td class="px-6 py-5">

                                <p
                                    class="font-black text-slate-800 uppercase tracking-tight italic">
                                    {{ $d['prediction'] }}
                                </p>

                                <span
                                    class="text-[9px] font-bold text-slate-400 bg-slate-100 px-1.5 py-0.5 rounded">
                                    AI Controller v1
                                </span>
                            </td>

                            <td class="px-6 py-5">

                                <div class="flex flex-col gap-1.5">

                                    <span
                                        class="text-[10px] font-black {{ $d['confidence'] > 80 ? 'text-emerald-500' : 'text-rose-500' }}">
                                        {{ $d['confidence'] }}%
                                    </span>

                                    <div
                                        class="w-32 h-1.5 bg-slate-100 rounded-full overflow-hidden">

                                        <div
                                            class="h-full rounded-full {{ $d['confidence'] > 80 ? 'bg-emerald-500' : 'bg-rose-500' }}"
                                            style="width: {{ $d['confidence'] }}%">
                                        </div>

                                    </div>
                                </div>

                            </td>

                            <td class="px-6 py-5 text-center">

                                <span
                                    class="px-4 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-widest border {{ str_contains(strtolower($d['result']), 'umum') ? 'bg-orange-50 border-orange-100 text-orange-500' : 'bg-emerald-50 border-emerald-100 text-emerald-600' }}">

                                   {!! nl2br(e($d->result)) !!}
                                </span>

                            </td>

                            <td class="px-8 py-5 text-right">

                                @if($d['status'] == 'Verified')
                                    <button
                                        class="px-4 py-2 bg-slate-100 text-slate-400 rounded-xl text-[10px] font-black uppercase tracking-widest">
                                        Verified
                                    </button>
                                @else
                                    <button
                                        class="px-4 py-2 bg-blue-600 text-white rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-slate-900 transition-all">
                                        Manual Review
                                    </button>
                                @endif

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-20">

                                <i
                                    class="fas fa-brain text-6xl text-slate-200 mb-4"></i>

                                <h3
                                    class="text-2xl font-black text-slate-500 mb-2">
                                    Belum Ada Data Diagnosa AI
                                </h3>

                                <p class="text-slate-400 text-sm">
                                    Upload gambar tanaman dari halaman user
                                    terlebih dahulu.
                                </p>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

    {{-- BOTTOM CARD --}}
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">

        <div
            class="bg-gradient-to-br from-blue-600 to-indigo-700 p-8 rounded-[2.5rem] text-white relative overflow-hidden shadow-xl">

            <i
                class="fas fa-brain absolute -right-4 -bottom-4 text-9xl opacity-10"></i>

            <h4
                class="text-lg font-black italic uppercase tracking-tighter mb-2">
                Dataset Training
            </h4>

            <p class="text-blue-100 text-[12px] leading-relaxed max-w-sm mb-6">
                Sistem AIController membaca file tanaman seperti mawar,
                anggrek, dan melati berdasarkan nama gambar upload.
            </p>

            <button
                class="bg-white text-blue-600 px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest">
                Update Model Engine
            </button>
        </div>

        <div
            class="bg-white border border-slate-100 p-8 rounded-[2.5rem] shadow-xl shadow-slate-200/50 flex flex-col justify-center">

            <div class="flex items-center gap-4 mb-4">

                <div
                    class="w-12 h-12 bg-orange-50 text-orange-500 rounded-2xl flex items-center justify-center text-xl">

                    <i class="fas fa-triangle-exclamation"></i>
                </div>

                <div>
                    <h4
                        class="font-black text-slate-800 text-sm uppercase tracking-tight">
                        Anomali Terdeteksi
                    </h4>

                    <p
                        class="text-[11px] text-slate-400 font-bold uppercase">
                        {{ $needReview }} hasil butuh konfirmasi admin
                    </p>
                </div>
            </div>

            <div class="h-2 bg-slate-50 rounded-full overflow-hidden">
                <div class="h-full bg-orange-500"
                    style="width: {{ $needReview > 0 ? 65 : 0 }}%"></div>
            </div>
        </div>

    </div>

    <script>
        document.getElementById('aiSearch').addEventListener('keyup',
            function() {
                let filter = this.value.toLowerCase();
                let rows = document.querySelectorAll('#aiTable tr');

                rows.forEach(row => {
                    let text = row.innerText.toLowerCase();
                    row.style.display = text.includes(filter) ? '' :
                        'none';
                });
            });
    </script>

</x-layout-admin>
