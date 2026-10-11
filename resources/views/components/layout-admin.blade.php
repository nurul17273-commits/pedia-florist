<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Command Center | PediaFlorist Pro' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f8fafc;
            font-size: 13px;
            letter-spacing: -0.01em;
        }

        [x-cloak] {
            display: none !important;
        }

        .sidebar-transition {
            transition: all .3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .glass-dark {
            background: rgba(15, 23, 42, 0.96);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .active-glow {
            box-shadow: 0 0 18px rgba(37, 99, 235, .4);
        }

        .sidebar-closed aside {
            width: 5rem !important;
        }

        .sidebar-closed main {
            margin-left: 5rem !important;
        }

        .sidebar-closed [x-show="sidebarOpen"] {
            display: none !important;
        }
    </style>

    <script>
        if (localStorage.getItem('sidebarStatus') === 'closed') {
            document.documentElement.classList.add('sidebar-closed');
        }
    </script>
</head>

<body
    class="antialiased text-slate-600"
    x-data="{
        sidebarOpen: localStorage.getItem('sidebarStatus') !== 'closed',

        toggleSidebar() {
            this.sidebarOpen = !this.sidebarOpen;

            localStorage.setItem(
                'sidebarStatus',
                this.sidebarOpen ? 'opened' : 'closed'
            );

            if(this.sidebarOpen){
                document.documentElement.classList.remove('sidebar-closed');
            } else {
                document.documentElement.classList.add('sidebar-closed');
            }
        }
    }"
>

    <!-- SIDEBAR -->
    <aside
        :class="sidebarOpen ? 'w-64' : 'w-20'"
        class="fixed left-0 top-0 h-screen glass-dark text-slate-400 sidebar-transition z-50 flex flex-col border-r border-slate-800/50 shadow-2xl">

        {{-- Brand Logo --}}
        <div class="h-20 flex items-center px-6 shrink-0 relative overflow-hidden">
            <div class="flex items-center gap-3.5 relative z-10">
                <div class="w-10 h-10 bg-gradient-to-tr from-blue-700 to-blue-400 rounded-xl flex items-center justify-center text-white shadow-lg rotate-3 group-hover:rotate-0 transition-transform">
                    <i class="fas fa-seedling text-lg"></i>
                </div>
                <div x-show="sidebarOpen" x-transition.opacity class="flex flex-col">
                    <span class="text-white font-black text-[15px] tracking-tight whitespace-nowrap italic uppercase">Pedia<span class="text-blue-500 italic">Florist.</span></span>
                    <span class="text-[9px] font-black text-slate-500 tracking-[0.3em] uppercase leading-none mt-1">Command Pro</span>
                </div>
            </div>
            <div class="absolute -left-4 -top-4 w-24 h-24 bg-blue-600/10 blur-3xl rounded-full"></div>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto no-scrollbar">
            @php
                $mainMenus = [
                    ['label' => 'Overview', 'icon' => 'fa-grid-2', 'url' => '/home', 'raw_icon' => 'fa-chart-pie'],
                    ['label' => 'Flora Database', 'icon' => 'fa-seedling', 'url' => '/tanaman', 'raw_icon' => 'fa-seedling'],
                    ['label' => 'Neural Vision AI', 'icon' => 'fa-microchip', 'url' => '/AI', 'raw_icon' => 'fa-robot'],
                ];

                $supportMenus = [
                    ['label' => 'Auth Requests', 'icon' => 'fa-shield-keyhole', 'url' => '/akun', 'badge' => '4', 'raw_icon' => 'fa-user-lock'],
                    ['label' => 'Neural Chat', 'icon' => 'fa-messages', 'url' => '/admin/chat', 'badge' => 'new', 'raw_icon' => 'fa-comment-dots'],
                    ['label' => 'User Tickets', 'icon' => 'fa-ticket', 'url' => '/keluhan', 'raw_icon' => 'fa-circle-exclamation'],
                ];
            @endphp

            <div x-show="sidebarOpen" class="px-4 text-[10px] font-black text-slate-600 uppercase tracking-[0.25em] mb-4 mt-2">Core Operations</div>
            @foreach($mainMenus as $menu)
                @php $active = request()->is(ltrim($menu['url'], '/')); @endphp
                <a href="{{ $menu['url'] }}"
                   class="flex items-center gap-3.5 px-4 py-3 rounded-2xl transition-all duration-300 group {{ $active ? 'bg-blue-600 text-white active-glow' : 'hover:bg-slate-800/50 hover:text-slate-200' }}">
                    <div class="w-5 flex justify-center shrink-0">
                        <i class="fas {{ $menu['raw_icon'] }} {{ $active ? 'text-white' : 'group-hover:text-blue-400' }} text-[14px]"></i>
                    </div>
                    <span x-show="sidebarOpen" class="font-bold text-[13px] whitespace-nowrap tracking-tight">{{ $menu['label'] }}</span>
                </a>
            @endforeach

            <div x-show="sidebarOpen" class="px-4 text-[10px] font-black text-slate-600 uppercase tracking-[0.25em] mb-4 mt-10">Interaction Hub</div>
            @foreach($supportMenus as $menu)
                @php $active = request()->is(ltrim($menu['url'], '/')); @endphp
                <a href="{{ $menu['url'] }}"
                   class="flex items-center gap-3.5 px-4 py-3 rounded-2xl transition-all duration-300 group {{ $active ? 'bg-blue-600 text-white active-glow' : 'hover:bg-slate-800/50 hover:text-slate-200' }} relative">
                    <div class="w-5 flex justify-center shrink-0">
                        <i class="fas {{ $menu['raw_icon'] }} {{ $active ? 'text-white' : 'group-hover:text-indigo-400' }} text-[14px]"></i>
                    </div>
                    <span x-show="sidebarOpen" class="font-bold text-[13px] whitespace-nowrap tracking-tight">{{ $menu['label'] }}</span>

                    @if(isset($menu['badge']))
                        <span class="absolute right-3 px-2 py-0.5 {{ $menu['badge'] == 'new' ? 'bg-emerald-500' : 'bg-orange-500' }} text-[8px] text-white font-black rounded-lg uppercase tracking-tighter">{{ $menu['badge'] }}</span>
                    @endif
                </a>
            @endforeach
        </nav>

        <!-- FOOTER PROFILE -->
        <div class="p-4 border-t border-slate-800/50 bg-slate-900/30 overflow-visible">

            <div
                x-data="{ openProfile: false }"
                class="relative overflow-visible"
            >

                <!-- DROPDOWN -->
                <div
                    x-show="openProfile"
                    x-cloak
                    x-transition.origin.bottom
                    @click.away="openProfile = false"
                    class="absolute bottom-[72px] left-0 w-full bg-slate-900 border border-slate-700 rounded-2xl shadow-2xl overflow-hidden z-[99999]"
                >

                    <div class="h-px bg-slate-800"></div>

                    <a
                        href="/"
                        class="flex items-center gap-3 px-4 py-3 text-sm text-red-400 hover:bg-red-500/10 transition-all"
                    >
                        <i class="fas fa-right-from-bracket w-4"></i>
                        <span>Logout</span>
                    </a>

                </div>

                <!-- PROFILE BUTTON -->
                <button
                    @click="openProfile = !openProfile"
                    type="button"
                    class="w-full flex items-center justify-between gap-3.5 bg-slate-800/30 p-2.5 rounded-2xl border border-slate-700/30 transition-all hover:bg-slate-800/50"
                >

                    <div class="flex items-center gap-3.5">

                        <div class="relative">

                            <img
                                src="https://ui-avatars.com/api/?name=Alexander+V&size=40&background=2563eb&color=fff"
                                class="w-10 h-10 rounded-xl shadow-lg border border-slate-700"
                                alt="Avatar"
                            >

                            <div class="absolute -bottom-1 -right-1 w-3.5 h-3.5 bg-emerald-500 border-2 border-[#0f172a] rounded-full"></div>

                        </div>

                        <div
                            x-show="sidebarOpen"
                            x-transition.opacity
                            class="overflow-hidden text-left"
                        >

                            <p class="text-white text-[13px] font-bold truncate leading-none">
                                admin@pediaflorist.com
                            </p>

                            <p class="text-[9px] text-slate-500 font-black uppercase tracking-widest mt-1.5 italic">
                                Root Admin
                            </p>

                        </div>

                    </div>

                    <i
                        x-show="sidebarOpen"
                        class="fas fa-chevron-up text-[11px] text-slate-500 transition duration-300"
                        :class="openProfile ? 'rotate-0' : 'rotate-180'"
                    ></i>

                </button>

            </div>

        </div>

    </aside>

    <!-- MAIN -->
    <main
        :class="sidebarOpen ? 'ml-64' : 'ml-20'"
        class="sidebar-transition min-h-screen"
    >

        <!-- HEADER -->
        <header class="h-20 bg-white border-b border-slate-100 sticky top-0 z-40 px-8 flex items-center justify-between">

            <div class="flex items-center gap-5">

                <button
                    @click="toggleSidebar()"
                    class="w-10 h-10 flex items-center justify-center bg-slate-50 text-slate-500 rounded-xl hover:bg-blue-50 hover:text-blue-600 transition-all"
                >
                    <i
                        class="fas"
                        :class="sidebarOpen ? 'fa-align-left' : 'fa-align-justify'"
                    ></i>
                </button>

                <h1 class="text-[15px] font-black text-slate-900 italic">
                    {{ $title ?? 'Dashboard' }}
                </h1>

            </div>

        </header>

        <!-- CONTENT -->
        <div class="p-10">
            {{ $slot }}
        </div>

    </main>

</body>
</html>
