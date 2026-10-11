<x-layout-admin>
    <x-slot:title>Permintaan Akun | PediaFlorist Pro</x-slot:title>

    @php
        $forgotCount = $requests->where('type', 'Lupa Password')->count();
        $activationCount = $requests->where('type', 'Aktivasi Baru')->count();
        $solvedCount = \App\Models\PasswordResetRequest::where('status', 'approved')->count();
    @endphp

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <h2 class="text-2xl font-black text-slate-800 tracking-tight flex items-center gap-2 italic uppercase">
                Account <span class="text-blue-600">Requests.</span>
            </h2>
            <p class="text-[13px] text-slate-500 font-medium">
                Manajemen otentikasi, reset password, dan pemulihan akses pengguna.
            </p>
        </div>

        <button onclick="location.reload()"
            class="flex items-center gap-2 px-5 py-2.5 bg-white border border-slate-200 rounded-xl text-[11px] font-black uppercase tracking-widest text-slate-600 hover:text-blue-600 hover:border-blue-200 transition-all shadow-sm">
            <i class="fas fa-rotate text-blue-500"></i>
            Refresh Antrean
        </button>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="mb-6 p-5 rounded-2xl bg-emerald-50 border border-emerald-100 text-emerald-600 font-bold text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">

        {{-- FORGOT PASSWORD --}}
        <div
            class="bg-gradient-to-br from-orange-500 to-orange-400 p-6 rounded-[2rem] shadow-xl shadow-orange-200/50 text-white relative overflow-hidden group hover:scale-[1.02] transition-all">

            <i
                class="fas fa-key absolute -right-2 -bottom-2 text-6xl opacity-20 group-hover:rotate-12 transition-transform"></i>

            <p class="text-[10px] font-black uppercase tracking-[0.2em] mb-1 opacity-80">
                Lupa Password
            </p>

            <div class="flex items-baseline gap-2">
                <h3 class="text-3xl font-black italic">
                    {{ $forgotCount }}
                </h3>

                <span class="text-[11px] font-bold italic">
                    Antrean
                </span>
            </div>
        </div>

        {{-- ACTIVATION --}}
        <div
            class="bg-gradient-to-br from-blue-600 to-blue-500 p-6 rounded-[2rem] shadow-xl shadow-blue-200/50 text-white relative overflow-hidden group hover:scale-[1.02] transition-all">

            <i
                class="fas fa-user-plus absolute -right-2 -bottom-2 text-6xl opacity-20 group-hover:rotate-12 transition-transform"></i>

            <p class="text-[10px] font-black uppercase tracking-[0.2em] mb-1 opacity-80">
                Aktivasi Baru
            </p>

            <div class="flex items-baseline gap-2">
                <h3 class="text-3xl font-black italic">
                    {{ $activationCount }}
                </h3>

                <span class="text-[11px] font-bold italic">
                    Antrean
                </span>
            </div>
        </div>

        {{-- SOLVED --}}
        <div
            class="bg-white border border-slate-100 p-6 rounded-[2rem] shadow-xl shadow-slate-200/50 text-slate-800 relative overflow-hidden group hover:scale-[1.02] transition-all">

            <i class="fas fa-check-circle absolute -right-2 -bottom-2 text-6xl text-slate-50 opacity-10"></i>

            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">
                Solved
            </p>

            <div class="flex items-baseline gap-2">
                <h3 class="text-3xl font-black italic text-slate-900">
                    {{ $solvedCount }}
                </h3>

                <span class="text-[11px] font-bold text-slate-400 italic">
                    Total Approved
                </span>
            </div>
        </div>
    </div>

    {{-- TABLE --}}
    <div
        class="bg-white rounded-[2.5rem] border border-slate-100 shadow-2xl shadow-slate-200/60 overflow-hidden">

        {{-- HEADER --}}
        <div class="p-8 border-b border-slate-50 flex justify-between items-center bg-slate-50/30">
            <div>
                <h4 class="font-black text-slate-800 text-xs uppercase tracking-[0.2em] italic">
                    Pending Authorization Feed
                </h4>

                <p class="text-[10px] text-slate-400 font-bold uppercase mt-1">
                    Verifikasi identitas diperlukan untuk keamanan
                </p>
            </div>

            <div class="relative">
                <i
                    class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-300 text-[10px]"></i>

                <input type="text"
                    id="reqSearch"
                    placeholder="Cari Email..."
                    class="pl-8 pr-4 py-2 bg-white border border-slate-200 rounded-xl text-[11px] outline-none focus:ring-4 focus:ring-blue-500/10 transition-all w-48 md:w-64">
            </div>
        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">

                <thead>
                    <tr
                        class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 bg-slate-50/50">

                        <th class="px-8 py-5">User Account</th>
                        <th class="px-6 py-5">Issue Type</th>
                        <th class="px-6 py-5">Timestamp</th>
                        <th class="px-6 py-5">Security Status</th>
                        <th class="px-8 py-5 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-50" id="reqTable">

                    @forelse($requests as $r)

                        <tr class="hover:bg-blue-50/20 transition-all group">

                            {{-- EMAIL --}}
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">

                                    <div
                                        class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center text-slate-400 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-inner">
                                        <i class="fas fa-envelope-open-text text-sm"></i>
                                    </div>

                                    <div class="flex flex-col">
                                        <span class="font-black text-slate-800 text-[13px]">
                                            {{ $r->email }}
                                        </span>

                                        <span
                                            class="text-[9px] font-bold text-slate-400 uppercase tracking-tighter">
                                            UID: #PDI-{{ str_pad($r->id, 3, '0', STR_PAD_LEFT) }}
                                        </span>
                                    </div>
                                </div>
                            </td>

                            {{-- TYPE --}}
                            <td class="px-6 py-5">
                                <span
                                    class="px-3 py-1 rounded-lg text-[9px] font-black uppercase italic border bg-orange-50 border-orange-100 text-orange-600">
                                    Lupa Password
                                </span>
                            </td>

                            {{-- TIME --}}
                            <td class="px-6 py-5 text-slate-400 font-bold text-[11px] italic">
                                {{ $r->created_at->diffForHumans() }}
                            </td>

                            {{-- STATUS --}}
                            <td class="px-6 py-5">

                                @if($r->status == 'pending')

                                    <div
                                        class="inline-flex items-center gap-2 px-3 py-1 bg-rose-50 text-rose-500 rounded-full text-[9px] font-black uppercase tracking-widest animate-pulse">

                                        <span
                                            class="w-1.5 h-1.5 rounded-full bg-rose-500 shadow-[0_0_8px_rgba(244,63,94,0.6)]"></span>

                                        Pending
                                    </div>

                                @elseif($r->status == 'approved')

                                    <div
                                        class="inline-flex items-center gap-2 px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[9px] font-black uppercase tracking-widest">

                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>

                                        Approved
                                    </div>

                                @else

                                    <div
                                        class="inline-flex items-center gap-2 px-3 py-1 bg-slate-100 text-slate-500 rounded-full text-[9px] font-black uppercase tracking-widest">

                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>

                                        Rejected
                                    </div>

                                @endif

                            </td>

                            {{-- ACTION --}}
                            <td class="px-8 py-5 text-right">

                                <div class="flex items-center justify-end gap-2">

                                    @if($r->status == 'pending')

                                        {{-- APPROVE --}}
                                        <form action="/akun/{{ $r->id }}/approve" method="POST">
                                            @csrf

                                            <button type="submit"
                                                class="px-4 py-2 bg-blue-600 text-white text-[10px] font-black uppercase tracking-widest rounded-xl shadow-lg shadow-blue-200 hover:bg-slate-900 hover:shadow-none transition-all">

                                                Approve
                                            </button>
                                        </form>

                                        {{-- REJECT --}}
                                        <form action="/akun/{{ $r->id }}/reject" method="POST">
                                            @csrf

                                            <button type="submit"
                                                class="px-4 py-2 bg-white border border-slate-200 text-rose-500 text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-rose-50 hover:border-rose-200 transition-all">

                                                Reject
                                            </button>
                                        </form>

                                    @else

                                        <div
                                            class="px-4 py-2 bg-slate-100 text-slate-400 text-[10px] font-black uppercase tracking-widest rounded-xl">
                                            Processed
                                        </div>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="py-20 text-center">

                                <div class="flex flex-col items-center gap-4">

                                    <div
                                        class="w-20 h-20 rounded-[2rem] bg-slate-100 flex items-center justify-center text-slate-300 text-3xl">
                                        <i class="fas fa-inbox"></i>
                                    </div>

                                    <div>
                                        <h3 class="font-black text-slate-700 text-lg">
                                            Tidak Ada Permintaan
                                        </h3>

                                        <p class="text-slate-400 text-sm mt-1">
                                            Semua antrean reset password sudah diproses.
                                        </p>
                                    </div>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

    {{-- SECURITY --}}
    <div
        class="mt-8 bg-slate-900 rounded-[2.5rem] p-8 text-white flex flex-col md:flex-row items-center justify-between gap-6 shadow-2xl relative overflow-hidden">

        <div class="absolute top-0 right-0 p-4 opacity-5">
            <i class="fas fa-user-shield text-9xl"></i>
        </div>

        <div class="flex items-center gap-6 relative z-10 text-center md:text-left">

            <div
                class="w-16 h-16 bg-white/10 rounded-[1.5rem] flex items-center justify-center text-blue-400 text-2xl backdrop-blur-md border border-white/10">
                <i class="fas fa-shield-halved"></i>
            </div>

            <div>
                <h4 class="text-lg font-black uppercase italic tracking-tighter">
                    Protokol Keamanan Admin.
                </h4>

                <p class="text-slate-400 text-[12px] max-w-lg leading-relaxed">
                    Sistem mendeteksi aktivitas mencurigakan secara otomatis.
                    Pastikan Anda melakukan verifikasi manual melalui saluran komunikasi resmi sebelum menyetujui permintaan reset akses.
                </p>
            </div>
        </div>

        <button
            class="px-8 py-4 bg-white text-slate-900 text-[11px] font-black uppercase tracking-[0.2em] rounded-2xl hover:bg-blue-400 hover:text-white transition-all relative z-10">

            Audit Security Log
        </button>
    </div>

    <script>
        document.getElementById('reqSearch').addEventListener('keyup', function() {

            let filter = this.value.toLowerCase();

            let rows = document.querySelectorAll('#reqTable tr');

            rows.forEach(row => {

                let email = row.querySelector('td:first-child');

                if (!email) return;

                let text = email.innerText.toLowerCase();

                row.style.display = text.includes(filter)
                    ? ''
                    : 'none';
            });
        });
    </script>

</x-layout-admin>
