<x-layout-admin>
    <x-slot:title>User Complaints | PediaFlorist Pro</x-slot:title>

    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-10">
        <div>
            <h2 class="text-3xl font-black text-slate-800 tracking-tight flex items-center gap-3 italic uppercase">
                User <span class="text-rose-600">Complaints.</span>
            </h2>

            <p class="text-[13px] text-slate-500 font-medium mt-2">
                Monitoring pusat kendala teknis, akurasi data flora, dan laporan bug pengguna.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <div class="flex p-1.5 bg-slate-100 rounded-2xl">
                <button class="px-6 py-2.5 bg-white shadow-sm rounded-xl text-[10px] font-black uppercase tracking-widest text-slate-800">
                    All Tickets
                </button>

                <button class="px-6 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-rose-600 transition">
                    High Priority
                </button>
            </div>

            <div class="hidden md:flex items-center gap-2 bg-white px-4 py-3 rounded-2xl border border-slate-100 shadow-sm">
                <span class="relative flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                </span>

                <p class="text-[10px] font-black uppercase tracking-widest text-emerald-600">
                    System Active
                </p>
            </div>
        </div>
    </div>

    {{-- FILTER --}}
    <div class="bg-white p-5 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/50 mb-8 flex flex-wrap items-center justify-between gap-5">

        <div class="flex flex-1 items-center gap-4 min-w-[300px]">

            <div class="relative flex-1 group">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-rose-500 transition"></i>

                <input
                    type="text"
                    placeholder="Cari ticket atau nama pengguna..."
                    class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-100 rounded-2xl text-[12px] font-medium outline-none focus:ring-4 focus:ring-rose-500/5 focus:bg-white transition"
                >
            </div>

            <select class="bg-slate-50 border border-slate-100 rounded-2xl px-5 py-3 text-[11px] font-black text-slate-600 uppercase tracking-widest outline-none cursor-pointer">
                <option>Semua Kategori</option>
                <option>Bug Aplikasi</option>
                <option>Data Tanaman</option>
                <option>AI Engine</option>
            </select>

        </div>

        <div class="flex items-center gap-3">
            <div class="flex -space-x-2">
                <div class="w-9 h-9 rounded-full border-2 border-white bg-slate-200 flex items-center justify-center text-[10px] font-black">
                    AS
                </div>

                <div class="w-9 h-9 rounded-full border-2 border-white bg-blue-600 text-white flex items-center justify-center text-[10px] font-black">
                    ME
                </div>
            </div>

            <p class="text-[10px] font-black text-slate-400 uppercase italic tracking-widest">
                <span class="text-emerald-500">●</span> 2 Admin Online
            </p>
        </div>

    </div>

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="mb-6 bg-emerald-50 border border-emerald-100 text-emerald-700 px-6 py-4 rounded-2xl font-semibold">
            {{ session('success') }}
        </div>
    @endif

    {{-- COMPLAINT LIST --}}
    <div class="grid grid-cols-1 gap-6">

        @forelse($complaints as $c)

            <div class="group bg-white border border-slate-100 rounded-[2.5rem] p-8 hover:shadow-2xl hover:shadow-slate-200/60 transition-all relative overflow-hidden">

                {{-- PRIORITY LINE --}}
                <div class="absolute right-0 top-0 h-full w-2
                    {{ $c->urgency == 'Darurat'
                        ? 'bg-rose-500 shadow-[0_0_20px_rgba(244,63,94,0.4)]'
                        : 'bg-amber-400'
                    }}">
                </div>

                <div class="flex flex-col xl:flex-row gap-8">

                    {{-- LEFT --}}
                    <div class="flex-1">

                        {{-- TOP --}}
                        <div class="flex flex-wrap items-center gap-3 mb-5">

                            <span class="px-3 py-1 bg-slate-900 text-white text-[9px] font-black rounded-lg tracking-widest uppercase italic">
                                #TKT-{{ $c->id }}
                            </span>

                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.15em] flex items-center gap-1">
                                <i class="far fa-clock"></i>
                                {{ $c->created_at->diffForHumans() }}
                            </span>

                            <div class="h-1 w-1 bg-slate-300 rounded-full"></div>

                            <span class="text-[10px] font-black text-rose-500 uppercase tracking-widest italic">
                                {{ $c->topic }}
                            </span>

                        </div>

                        {{-- SUBJECT --}}
                        <h3 class="text-xl font-black text-slate-800 mb-3 leading-tight group-hover:text-blue-600 transition">
                            {{ $c->subject }}
                        </h3>

                        {{-- MESSAGE --}}
                        <p class="text-[13px] text-slate-500 leading-relaxed font-medium italic line-clamp-3">
                            "{{ $c->message }}"
                        </p>

                        {{-- USER --}}
{{-- USER --}}
<div class="flex items-center gap-4 mt-7">

    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center text-sm font-black text-slate-700 border border-white shadow-sm">

        {{ strtoupper(substr($c->user->name ?? 'U', 0, 1)) }}

    </div>

    <div>

        <p class="text-[13px] font-black text-slate-800">

            {{ $c->user->name ?? 'User Tidak Ditemukan' }}

        </p>

        <p class="text-[11px] text-slate-400 font-semibold">

            {{ $c->user->email ?? '-' }}

        </p>

    </div>

</div>

                    </div>

                    {{-- RIGHT --}}
                    <div class="flex flex-col justify-between items-end gap-6 min-w-[240px]">

                        {{-- STATUS --}}
                        <div class="text-right">

                            <p class="text-[9px] font-black text-slate-300 uppercase tracking-[0.2em] mb-3 italic">
                                Current Status
                            </p>

                            @if($c->status == 'Open')

                                <div class="flex items-center gap-2 px-4 py-2 bg-rose-50 border border-rose-100 text-rose-600 rounded-full text-[10px] font-black uppercase italic animate-pulse">
                                    <span class="w-2 h-2 bg-rose-500 rounded-full"></span>
                                    Unresolved
                                </div>

                            @elseif($c->status == 'Process')

                                <div class="flex items-center gap-2 px-4 py-2 bg-amber-50 border border-amber-100 text-amber-600 rounded-full text-[10px] font-black uppercase italic">
                                    <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                                    On Process
                                </div>

                            @else

                                <div class="flex items-center gap-2 px-4 py-2 bg-emerald-50 border border-emerald-100 text-emerald-600 rounded-full text-[10px] font-black uppercase italic">
                                    <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                                    Resolved
                                </div>

                            @endif

                        </div>

                        {{-- ACTION --}}
                        <div class="flex gap-3">

                            @if($c->status != 'Resolved')

                                <form method="POST" action="/keluhan/{{ $c->id }}/process">
                                    @csrf

                                </form>

                            @else

                                <button
                                    disabled
                                    class="px-8 py-3 bg-emerald-500 text-white text-[11px] font-black uppercase tracking-widest rounded-2xl cursor-not-allowed"
                                >
                                    Completed
                                </button>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="bg-white border border-dashed border-slate-200 rounded-[3rem] p-20 text-center">

                <div class="w-24 h-24 mx-auto rounded-[2rem] bg-slate-100 flex items-center justify-center text-slate-300 text-4xl mb-6">
                    <i class="fas fa-inbox"></i>
                </div>

                <h3 class="text-2xl font-black text-slate-700 mb-3">
                    Belum Ada Keluhan
                </h3>

                <p class="text-slate-400 font-medium">
                    Semua tiket pengguna akan muncul di halaman ini.
                </p>

            </div>

        @endforelse

    </div>

    {{-- SLA --}}
    <div class="mt-12 bg-slate-900 rounded-[3rem] p-10 text-white relative overflow-hidden flex flex-col md:flex-row items-center gap-10">

        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-blue-600/20 blur-[100px] rounded-full"></div>

        <div class="w-20 h-20 bg-white/10 backdrop-blur-xl border border-white/20 rounded-[2rem] flex items-center justify-center text-rose-400 text-3xl shrink-0">
            <i class="fas fa-shield-virus"></i>
        </div>

        <div class="flex-1 text-center md:text-left">

            <h4 class="text-xl font-black italic uppercase tracking-tight mb-2 text-rose-500">
                Service Level Agreement (SLA)
            </h4>

            <p class="text-slate-400 text-[14px] leading-relaxed max-w-2xl font-medium">
                Setiap tiket berkategori
                <span class="text-white font-black italic underline decoration-rose-500">
                    High Priority
                </span>
                wajib mendapatkan respon perdana kurang dari 60 menit.
            </p>

        </div>

<a href="{{ route('admin.complaints-pdf') }}"
   class="inline-block px-8 py-4 bg-white text-slate-900 text-[11px] font-black uppercase tracking-[0.2em] rounded-[1.5rem] hover:bg-rose-500 hover:text-white transition-all cursor-pointer shadow-xl">
    Download SOP.PDF
</a>

    </div>

</x-layout-admin>
