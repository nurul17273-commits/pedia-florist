<x-layout-user>
<x-slot:title>Chat Admin | PediaFlorist Pro</x-slot:title>

@php
    $messages = \App\Models\Chat::where('user_id', Auth::id())
        ->orderBy('created_at', 'asc')
        ->get();
@endphp

<div class="max-w-6xl mx-auto py-8 px-4 md:px-6"
     x-data="chatApp(@js($messages))"
     x-init="scrollBottom()">

    {{-- HEADER --}}
    <div class="bg-white/80 backdrop-blur-xl border border-slate-100 rounded-[2rem] shadow-[0_10px_40px_rgba(15,23,42,0.06)] px-6 py-5 mb-6 flex items-center justify-between">

        <div class="flex items-center gap-4">

            <div class="relative">

                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-600 to-blue-500 text-white flex items-center justify-center font-black text-lg shadow-lg shadow-blue-500/20">
                    A
                </div>

                <span class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 border-2 border-white rounded-full"></span>

            </div>

            <div>

                <h1 class="text-xl font-black text-slate-800 leading-tight">
                    Admin Support
                </h1>

                <p class="text-sm text-slate-500 mt-1">
                    Konsultasi tanaman & bantuan real-time
                </p>

            </div>

        </div>

        <div class="hidden md:flex items-center gap-3 bg-emerald-50 border border-emerald-100 px-4 py-2 rounded-2xl">

            <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-pulse"></span>

            <div>
                <p class="text-[11px] font-black uppercase tracking-[0.2em] text-emerald-600">
                    Active
                </p>

                <p class="text-[10px] text-emerald-500">
                    Admin sedang online
                </p>
            </div>

        </div>

    </div>

    {{-- CHAT CONTAINER --}}
    <div class="bg-white border border-slate-100 rounded-[2.3rem] overflow-hidden shadow-[0_20px_60px_rgba(15,23,42,0.08)]">

        {{-- CHAT AREA --}}
        <div class="h-[620px] overflow-y-auto px-6 md:px-8 py-8 space-y-6 bg-gradient-to-b from-slate-50 to-white"
             x-ref="chatBox"
             style="background-image: radial-gradient(#dbeafe 1px, transparent 1px); background-size: 24px 24px;">

            {{-- EMPTY --}}
            <template x-if="messages.length === 0">

                <div class="h-full flex flex-col items-center justify-center text-center">

                    <div class="w-24 h-24 rounded-[2rem] bg-blue-100 text-blue-600 flex items-center justify-center text-4xl mb-5">
                        <i class="fas fa-comments"></i>
                    </div>

                    <h3 class="text-2xl font-black text-slate-700">
                        Belum Ada Percakapan
                    </h3>

                    <p class="text-sm text-slate-400 mt-2 max-w-sm">
                        Mulai konsultasi dengan admin mengenai tanaman, perawatan, atau masalah lainnya.
                    </p>

                </div>

            </template>

            {{-- MESSAGES --}}
            <template x-for="msg in messages" :key="msg.id">

                <div class="flex"
                     :class="msg.role === 'user' ? 'justify-end' : 'justify-start'">

                    {{-- USER MESSAGE --}}
                    <template x-if="msg.role === 'user'">

                        <div class="max-w-[80%] md:max-w-[70%]">

                            <div class="bg-gradient-to-r from-blue-600 to-blue-500 text-white px-5 py-4 rounded-[1.8rem] rounded-br-md shadow-lg shadow-blue-500/20">

                                <p class="text-sm leading-relaxed break-words"
                                   x-text="msg.message"></p>

                                <div class="flex items-center justify-end gap-1 mt-2">

                                    <span class="text-[10px] text-blue-100">
                                        You
                                    </span>

                                    <span class="text-[10px] text-blue-200">
                                        •
                                    </span>

                                    <span class="text-[10px] text-blue-100"
                                          x-text="formatTime(msg.created_at)">
                                    </span>

                                </div>

                            </div>

                        </div>

                    </template>

                    {{-- ADMIN MESSAGE --}}
                    <template x-if="msg.role === 'admin'">

                        <div class="flex items-end gap-3 max-w-[80%] md:max-w-[70%]">

                            <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-blue-600 to-blue-500 text-white flex items-center justify-center text-sm font-black shadow-lg shadow-blue-500/20">
                                A
                            </div>

                            <div class="bg-white border border-slate-200 text-slate-700 px-5 py-4 rounded-[1.8rem] rounded-bl-md shadow-sm">

                                <p class="text-sm leading-relaxed break-words"
                                   x-text="msg.message"></p>

                                <div class="flex items-center gap-1 mt-2">

                                    <span class="text-[10px] text-slate-400">
                                        Admin
                                    </span>

                                    <span class="text-[10px] text-slate-300">
                                        •
                                    </span>

                                    <span class="text-[10px] text-slate-400"
                                          x-text="formatTime(msg.created_at)">
                                    </span>

                                </div>

                            </div>

                        </div>

                    </template>

                </div>

            </template>

        </div>

        {{-- INPUT --}}
        <form @submit.prevent="sendMessage"
              class="p-5 bg-white border-t border-slate-100">

            <div class="flex items-center gap-4">

                <div class="flex-1 relative">

                    <input type="text"
                           x-model="input"
                           placeholder="Tulis pesan ke admin..."
                           class="w-full bg-slate-100 border border-transparent rounded-2xl px-5 py-4 pr-14 text-sm outline-none focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition">

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

    </div>

</div>

{{-- SCRIPT --}}
<script>
function chatApp(initialMessages) {

    return {

        input: '',

        messages: initialMessages,

        async sendMessage() {

            if (!this.input.trim()) return;

            let text = this.input;

            // PUSH USER MESSAGE
            this.messages.push({
                id: Date.now(),
                role: 'user',
                message: text,
                created_at: new Date()
            });

            this.input = '';

            this.scrollBottom();

            try {

                await fetch('/chat/send', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        message: text
                    })
                });

            } catch (e) {

                this.messages.push({
                    id: Date.now() + 1,
                    role: 'admin',
                    message: 'Gagal mengirim pesan.',
                    created_at: new Date()
                });

            }

            this.scrollBottom();

        },

        formatTime(date) {

            if (!date) return '';

            return new Date(date).toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit'
            });

        },

        scrollBottom() {

            this.$nextTick(() => {

                this.$refs.chatBox.scrollTop =
                    this.$refs.chatBox.scrollHeight;

            });

        }

    }

}
</script>

</x-layout-user>
```
