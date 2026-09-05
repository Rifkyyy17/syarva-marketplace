@php
    $isDetailPage = request()->routeIs('listings.show');
    $welcomeMessage = \App\Models\Setting::get('ai_welcome_message') ?: 'Halo! Saya asisten virtual SYARVA. Butuh bantuan mencari unit mobil Honda, taksasi mobil bekas, info properti SHM, atau simulasi kredit? Silakan ketik pertanyaan Anda.';
@endphp

<div x-data="aiChatbot" class="relative">
    {{-- Floating Toggle Button --}}
    <div class="fixed {{ $isDetailPage ? 'hidden lg:flex bottom-5 right-22' : 'bottom-19 sm:bottom-21 right-4 sm:right-6 flex' }} z-30 items-center">
        <button type="button"
                @click="toggleChat()"
                class="group flex items-center gap-2 rounded-full border border-slate-200/90 bg-white/95 px-3.5 py-1.5 text-xs font-semibold text-slate-700 shadow-md backdrop-blur-sm transition-all duration-200 hover:border-slate-300 hover:bg-white hover:text-slate-900 active:scale-95"
                :class="open ? 'ring-2 ring-slate-900 bg-slate-900 text-white' : ''"
                aria-label="Buka Asisten Virtual SYARVA">
            <span class="grid size-5 place-items-center rounded-full" :class="open ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-600'">
                <x-icon name="sparkles" class="size-3"/>
            </span>
            <span class="text-[11px] font-bold" :class="open ? 'text-white' : 'text-slate-700'">Asisten Virtual</span>
            <span class="size-1.5 rounded-full bg-emerald-500"></span>
        </button>
    </div>

    {{-- Chat Window Drawer / Modal --}}
    <div x-show="open"
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-3 scale-98"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-3 scale-98"
         @click.outside="open = false"
         class="fixed bottom-18 sm:bottom-20 right-4 sm:right-6 z-50 w-[calc(100vw-2rem)] sm:w-[400px] max-h-[620px] h-[80vh] sm:h-[580px] flex flex-col rounded-3xl border border-slate-200 bg-white shadow-2xl overflow-hidden ring-1 ring-black/5">

        {{-- Header --}}
        <div class="flex items-center justify-between border-b border-white/10 bg-[#0a1626] px-4 sm:px-5 py-3.5 text-white">
            <div class="flex items-center gap-3">
                <span class="grid size-8 place-items-center rounded-xl bg-white/10 text-white">
                    <x-icon name="sparkles" class="size-4 text-slate-200"/>
                </span>
                <div>
                    <h3 class="text-xs sm:text-sm font-bold text-white flex items-center gap-1.5">
                        SYARVA AI Assistant
                    </h3>
                    <p class="text-[10px] text-emerald-400 flex items-center gap-1 mt-0.5">
                        <span class="size-1.5 rounded-full bg-emerald-400"></span> Online &bull; Rekomendasi Unit &amp; Info OTR
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-1">
                <button type="button" @click="resetChat()" class="rounded-lg p-1.5 text-slate-400 hover:bg-white/10 hover:text-white transition" title="Mulai Baru">
                    <x-icon name="refresh" class="size-3.5"/>
                </button>
                <button type="button" @click="open = false" class="rounded-lg p-1.5 text-slate-400 hover:bg-white/10 hover:text-white transition" title="Tutup">
                    <x-icon name="x" class="size-4"/>
                </button>
            </div>
        </div>

        {{-- Messages Container --}}
        <div x-ref="messagesContainer" class="flex-1 overflow-y-auto p-4 space-y-3.5 bg-slate-50/60">
            <template x-for="(msg, index) in messages" :key="index">
                <div>
                    {{-- User Message --}}
                    <template x-if="msg.role === 'user'">
                        <div class="flex justify-end">
                            <div class="max-w-[85%] rounded-2xl rounded-tr-none bg-slate-900 px-4 py-2.5 text-xs text-white shadow-xs">
                                <p x-text="msg.content" class="whitespace-pre-wrap leading-relaxed"></p>
                            </div>
                        </div>
                    </template>

                    {{-- Assistant Message --}}
                    <template x-if="msg.role === 'assistant'">
                        <div class="flex items-start gap-2.5">
                            <span class="grid size-6.5 shrink-0 place-items-center rounded-lg bg-slate-200 text-slate-800 text-[10px] font-bold mt-0.5">
                                AI
                            </span>
                            <div class="max-w-[88%] space-y-2.5">
                                <div class="rounded-2xl rounded-tl-none bg-white p-3.5 text-xs text-slate-800 shadow-xs border border-slate-200/80 leading-relaxed">
                                    <div x-html="formatMarkdown(msg.content)"></div>
                                </div>

                                {{-- Listing Recommendations Cards (if any) --}}
                                <template x-if="msg.recommendations && msg.recommendations.length > 0">
                                    <div class="space-y-2">
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Rekomendasi Unit Terkait:</p>
                                        <template x-for="item in msg.recommendations" :key="item.id">
                                            <a :href="item.url" target="_blank"
                                               class="flex items-center gap-3 rounded-xl border border-slate-200 bg-white p-2 transition hover:border-slate-400 hover:shadow-sm group">
                                                <img :src="item.image" :alt="item.title" x-on:error="$el.src = '{{ asset('images/placeholder.svg') }}'" class="size-12 rounded-lg object-cover bg-slate-100 shrink-0">
                                                <div class="min-w-0 flex-1">
                                                    <span class="inline-block text-[9px] font-bold text-slate-600 bg-slate-100 px-1.5 py-0.5 rounded" x-text="item.category"></span>
                                                    <p class="truncate text-xs font-bold text-slate-900 group-hover:text-slate-700 mt-0.5" x-text="item.title"></p>
                                                    <p class="text-xs font-black text-slate-900 mt-0.5" x-text="item.price"></p>
                                                </div>
                                                <x-icon name="chevron-right" class="size-4 text-slate-400 group-hover:text-slate-900 shrink-0"/>
                                            </a>
                                        </template>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

            {{-- Typing Indicator --}}
            <div x-show="loading" class="flex items-start gap-2.5" x-cloak>
                <span class="grid size-6.5 shrink-0 place-items-center rounded-lg bg-slate-200 text-slate-800 text-[10px] font-bold mt-0.5">
                    AI
                </span>
                <div class="rounded-2xl rounded-tl-none bg-white p-3 shadow-xs border border-slate-200/80">
                    <div class="flex items-center gap-1.5">
                        <span class="size-1.5 rounded-full bg-slate-400 animate-bounce [animation-delay:-0.3s]"></span>
                        <span class="size-1.5 rounded-full bg-slate-400 animate-bounce [animation-delay:-0.15s]"></span>
                        <span class="size-1.5 rounded-full bg-slate-400 animate-bounce"></span>
                    </div>
                </div>
            </div>

            {{-- Quick Prompts Suggestions (if messages length is 1 initial greeting) --}}
            <div x-show="messages.length <= 1 && !loading" class="pt-2">
                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Contoh Pertanyaan Cepat:</p>
                <div class="flex flex-wrap gap-1.5">
                    <button type="button" @click="sendPrompt('Rekomendasi mobil Honda baru dengan promo DP ringan')"
                            class="rounded-lg border border-slate-200 bg-white px-2.5 py-1.5 text-[11px] font-medium text-slate-700 hover:border-slate-400 hover:bg-slate-50 transition shadow-2xs text-left">
                        🚗 Rekomendasi Honda Baru
                    </button>
                    <button type="button" @click="sendPrompt('Cari rumah siap huni di Bogor budget di bawah 2 Miliar')"
                            class="rounded-lg border border-slate-200 bg-white px-2.5 py-1.5 text-[11px] font-medium text-slate-700 hover:border-slate-400 hover:bg-slate-50 transition shadow-2xs text-left">
                        🏡 Rumah Siap Huni di Bogor
                    </button>
                    <button type="button" @click="sendPrompt('Bagaimana cara titip jual rumah atau mobil via WhatsApp Admin?')"
                            class="rounded-lg border border-slate-200 bg-white px-2.5 py-1.5 text-[11px] font-medium text-slate-700 hover:border-slate-400 hover:bg-slate-50 transition shadow-2xs text-left">
                        ⭐ Titip Jual via WhatsApp
                    </button>
                </div>
            </div>
        </div>

        {{-- Input Footer --}}
        <div class="border-t border-slate-200 bg-white p-3">
            <form @submit.prevent="sendMessage()" class="flex items-center gap-2">
                <input type="text"
                       x-model="input"
                       :disabled="loading"
                       placeholder="Tanya info Honda, rumah, atau DP OTR..."
                       class="flex-1 rounded-xl border border-slate-200 bg-slate-50 px-3.5 py-2.5 text-xs text-slate-900 placeholder:text-slate-400 focus:border-slate-900 focus:bg-white focus:outline-none focus:ring-1 focus:ring-slate-900 disabled:opacity-50">
                <button type="submit"
                        :disabled="loading || !input.trim()"
                        class="grid size-9 place-items-center rounded-xl bg-slate-900 text-white shadow-xs transition hover:bg-slate-800 disabled:opacity-40 disabled:cursor-not-allowed">
                    <x-icon name="send" class="size-3.5"/>
                </button>
            </form>
        </div>
    </div>
</div>


<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('aiChatbot', () => ({
        open: false,
        loading: false,
        input: '',
        messages: [
            {
                role: 'assistant',
                content: @json($welcomeMessage),
                recommendations: []
            }
        ],
        toggleChat() {
            this.open = !this.open;
            if (this.open) {
                this.scrollToBottom();
            }
        },
        resetChat() {
            this.messages = [
                {
                    role: 'assistant',
                    content: @json($welcomeMessage),
                    recommendations: []
                }
            ];
            this.input = '';
        },
        sendPrompt(text) {
            this.input = text;
            this.sendMessage();
        },
        async sendMessage() {
            const text = this.input.trim();
            if (!text || this.loading) return;

            this.messages.push({
                role: 'user',
                content: text
            });

            this.input = '';
            this.loading = true;
            this.scrollToBottom();

            // Prepare history (last 8 messages)
            const history = this.messages.slice(-8, -1).map(m => ({
                role: m.role,
                content: m.content
            }));

            try {
                const res = await fetch('{{ route("ai.chat") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ?? ''
                    },
                    body: JSON.stringify({
                        message: text,
                        history: history
                    })
                });

                const data = await res.json();

                if (data.success && data.message) {
                    this.messages.push({
                        role: 'assistant',
                        content: data.message,
                        recommendations: data.recommendations || []
                    });
                } else {
                    this.messages.push({
                        role: 'assistant',
                        content: data.message || 'Maaf, terjadi kendala saat memproses jawaban. Silakan coba kembali.',
                        recommendations: []
                    });
                }
            } catch (err) {
                this.messages.push({
                    role: 'assistant',
                    content: 'Maaf, terjadi kendala saat memproses permintaan. Silakan coba kembali atau hubungi konsultan kami langsung melalui WhatsApp.',
                    recommendations: []
                });
            } finally {
                this.loading = false;
                this.scrollToBottom();
            }
        },
        scrollToBottom() {
            this.$nextTick(() => {
                const el = this.$refs.messagesContainer;
                if (el) {
                    el.scrollTop = el.scrollHeight;
                }
            });
        },
        formatMarkdown(text) {
            if (!text) return '';
            // Basic secure markdown formatting: bold, bullets, links, line breaks
            let formatted = text
                .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
                .replace(/\*(.*?)\*/g, '<em>$1</em>')
                .replace(/`([^`]+)`/g, '<code class="bg-slate-100 px-1 py-0.5 rounded text-[11px] font-mono text-primary-700">$1</code>')
                .replace(/\n\n/g, '<br><br>')
                .replace(/\n- /g, '<br>&bull; ')
                .replace(/\n/g, '<br>');
            return formatted;
        }
    }));
});
</script>
