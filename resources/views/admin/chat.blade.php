<x-layout-admin>
<x-slot:title>Neural Guide Chat | PediaFlorist Pro</x-slot:title>

<div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">

    <div>
        <h2 class="text-3xl font-black text-slate-800 tracking-tight italic uppercase">
            Neural Guide <span class="text-blue-600">Support.</span>
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Konsultasi botani real-time dengan pengguna PediaFlorist.
        </p>
    </div>

    <div class="flex items-center gap-3 bg-white px-5 py-3 rounded-2xl shadow-sm border border-slate-100">

        <span class="relative flex h-3 w-3">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
        </span>

        <div>
            <p class="text-[11px] font-black text-emerald-600 uppercase tracking-[0.25em]">
                Support Online
            </p>

            <p class="text-[11px] text-slate-400">
                Semua sistem berjalan normal
            </p>
        </div>

    </div>

</div>

<div class="bg-white border border-slate-100 rounded-[2.7rem] shadow-[0_20px_60px_rgba(15,23,42,0.08)] overflow-hidden flex h-[calc(100vh-220px)]">

    {{-- SIDEBAR --}}
    <div class="w-[360px] border-r border-slate-100 bg-gradient-to-b from-slate-50 to-white flex flex-col">

        {{-- SEARCH --}}
        <div class="p-6 border-b border-slate-100">

            <div class="relative">

                <i class="fas fa-search absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>

                <input type="text"
                       placeholder="Search conversation..."
                       class="w-full pl-12 pr-4 py-3.5 bg-white border border-slate-200 rounded-2xl text-sm outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition">

            </div>

        </div>

        {{-- USERS --}}
        <div class="flex-1 overflow-y-auto">

            @foreach($users as $user)

                <a href="/admin/chat/{{ $user->id }}"
                   class="group relative flex items-center gap-4 px-6 py-5 border-b border-slate-100/70 transition duration-300 hover:bg-white
                   {{ isset($activeUser) && $activeUser->id == $user->id ? 'bg-white' : '' }}">

                    {{-- ACTIVE INDICATOR --}}
                    @if(isset($activeUser) && $activeUser->id == $user->id)
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-blue-600 rounded-r-full"></div>
                    @endif

                    {{-- AVATAR --}}
                    <div class="relative">

                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-600 to-blue-500 text-white flex items-center justify-center font-black text-lg shadow-lg shadow-blue-500/20">
                            {{ strtoupper(substr($user->name,0,2)) }}
                        </div>

                        <span class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 border-2 border-white rounded-full"></span>

                    </div>

                    {{-- INFO --}}
                    <div class="flex-1 min-w-0">

                        <div class="flex items-start justify-between gap-3">

                            <div class="min-w-0">

                                <p class="font-black text-[15px] text-slate-800 truncate">
                                    {{ $user->name }}
                                </p>

                                <p class="text-[11px] text-slate-400 truncate">
                                    {{ $user->email }}
                                </p>

                            </div>

                            <span class="text-[10px] text-slate-400 whitespace-nowrap">
                                {{ optional($user->chats->first())->created_at?->diffForHumans() }}
                            </span>

                        </div>

                        <p class="text-xs text-slate-500 truncate mt-1">
                            {{ optional($user->chats->first())->message ?? 'Belum ada chat' }}
                        </p>

                    </div>

                </a>

            @endforeach

        </div>

    </div>

    {{-- CHAT AREA --}}
    <div class="flex-1 flex flex-col bg-slate-50">

        {{-- HEADER --}}
        <div class="px-8 py-5 bg-white border-b border-slate-100 flex items-center justify-between">

            <div class="flex items-center gap-4">

                <div class="relative">

                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-600 to-blue-500 text-white flex items-center justify-center font-black text-lg shadow-lg shadow-blue-500/20">
                        {{ isset($activeUser) ? strtoupper(substr($activeUser->name,0,2)) : 'NA' }}
                    </div>

                    <span class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 border-2 border-white rounded-full"></span>

                </div>

                <div>

                    <p class="font-black text-slate-800 text-lg">
                        {{ $activeUser->name ?? 'Pilih User' }}
                    </p>

                    <p class="text-sm text-slate-400">
                        {{ $activeUser->email ?? 'Tidak ada percakapan aktif' }}
                    </p>

                </div>

            </div>

            <div class="hidden md:flex items-center gap-3">

                <button class="w-11 h-11 rounded-2xl bg-slate-100 text-slate-500 hover:bg-blue-600 hover:text-white transition">
                    <i class="fas fa-phone-alt text-sm"></i>
                </button>

                <button class="w-11 h-11 rounded-2xl bg-slate-100 text-slate-500 hover:bg-blue-600 hover:text-white transition">
                    <i class="fas fa-ellipsis-h text-sm"></i>
                </button>

            </div>

        </div>

        {{-- CHAT BODY --}}
        <div class="flex-1 overflow-y-auto px-8 py-7 space-y-6"
             style="background-image: radial-gradient(#dbeafe 1px, transparent 1px); background-size: 24px 24px;">

            @isset($messages)

                @forelse($messages as $msg)

                    <div class="flex {{ $msg->role == 'admin' ? 'justify-end' : 'justify-start' }}">

                        @if($msg->role == 'user')

                            {{-- USER MESSAGE --}}
                            <div class="flex items-end gap-3 max-w-[75%]">

                                <div class="w-10 h-10 rounded-2xl bg-white border border-slate-200 flex items-center justify-center font-bold text-slate-700 shadow-sm">
                                    {{ strtoupper(substr($activeUser->name,0,1)) }}
                                </div>

                                <div class="bg-white border border-slate-200 text-slate-700 px-5 py-4 rounded-[1.7rem] rounded-bl-md shadow-sm">

                                    <p class="text-sm leading-relaxed break-words">
                                        {{ $msg->message }}
                                    </p>

                                    <p class="text-[10px] text-slate-400 mt-2">
                                        {{ $msg->created_at->format('H:i') }}
                                    </p>

                                </div>

                            </div>

                        @else

                            {{-- ADMIN MESSAGE --}}
                            <div class="max-w-[75%]">

                                <div class="bg-gradient-to-r from-blue-600 to-blue-500 text-white px-5 py-4 rounded-[1.7rem] rounded-br-md shadow-lg shadow-blue-500/20">

                                    <p class="text-sm leading-relaxed break-words">
                                        {{ $msg->message }}
                                    </p>

                                    <p class="text-[10px] text-blue-100 mt-2 text-right">
                                        {{ $msg->created_at->format('H:i') }}
                                    </p>

                                </div>

                            </div>

                        @endif

                    </div>

                @empty

                    {{-- EMPTY --}}
                    <div class="h-full flex flex-col items-center justify-center text-center">

                        <div class="w-24 h-24 rounded-[2rem] bg-blue-100 text-blue-600 flex items-center justify-center text-4xl mb-5">
                            <i class="fas fa-comments"></i>
                        </div>

                        <h3 class="text-xl font-black text-slate-700">
                            Belum Ada Percakapan
                        </h3>

                        <p class="text-sm text-slate-400 mt-2">
                            Percakapan pengguna akan muncul di sini.
                        </p>

                    </div>

                @endforelse

            @else

                {{-- NO USER SELECTED --}}
                <div class="h-full flex flex-col items-center justify-center text-center">

                    <div class="w-24 h-24 rounded-[2rem] bg-blue-100 text-blue-600 flex items-center justify-center text-4xl mb-5">
                        <i class="fas fa-comments"></i>
                    </div>

                    <h3 class="text-xl font-black text-slate-700">
                        Pilih Percakapan
                    </h3>

                    <p class="text-sm text-slate-400 mt-2">
                        Pilih user di sidebar untuk memulai percakapan.
                    </p>

                </div>

            @endisset

        </div>

        {{-- INPUT --}}
        @isset($activeUser)

            <form method="POST"
                  action="/admin/chat/send"
                  class="p-5 bg-white border-t border-slate-100">

                @csrf

                <input type="hidden"
                       name="user_id"
                       value="{{ $activeUser->id }}">

                <div class="flex items-center gap-4">

                    <div class="flex-1 relative">

                        <input type="text"
                               name="message"
                               placeholder="Tulis balasan untuk {{ $activeUser->name }}..."
                               class="w-full bg-slate-100 border border-transparent rounded-2xl px-5 py-4 pr-14 text-sm outline-none focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition"
                               required>

                        <button type="button"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-blue-600 transition">

                            <i class="far fa-smile text-lg"></i>

                        </button>

                    </div>

                    <button type="submit"
                            class="px-7 py-4 rounded-2xl bg-gradient-to-r from-blue-600 to-blue-500 text-white font-black shadow-lg shadow-blue-500/20 hover:scale-[1.03] transition-all duration-300">

                        <span class="flex items-center gap-2">
                            <i class="fas fa-paper-plane"></i>
                            Kirim
                        </span>

                    </button>

                </div>

            </form>

        @endisset

    </div>

</div>

</x-layout-admin>
