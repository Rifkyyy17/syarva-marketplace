<?php
    $isDetailPage = request()->routeIs('listings.show');
?>

<div x-data="aiChatbot" class="relative">
    
    <div class="fixed <?php echo e($isDetailPage ? 'bottom-20 lg:bottom-6' : 'bottom-3 sm:bottom-6'); ?> right-4 sm:right-6 z-50 flex items-center gap-2">
        <button type="button"
                @click="toggleChat()"
                class="group relative flex items-center gap-2 sm:gap-3 rounded-full bg-gradient-to-r from-slate-900 via-primary-950 to-charcoal-900 py-1.5 sm:py-2.5 pl-2 sm:pl-3.5 pr-3 sm:pr-5 text-white shadow-2xl ring-2 ring-primary-500/30 transition-all duration-300 hover:scale-105 hover:ring-primary-400/60 hover:shadow-primary-900/40 active:scale-95"
                :class="open ? 'ring-primary-500 scale-105' : ''"
                aria-label="Tanya AI SYARVA">
            <span class="relative flex size-8 sm:size-9 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-primary-500 to-accent-500 text-white shadow-md">
                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'sparkles','class' => 'size-4 sm:size-4.5 animate-pulse']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'sparkles','class' => 'size-4 sm:size-4.5 animate-pulse']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                <span class="absolute -top-0.5 -right-0.5 size-2 sm:size-2.5 rounded-full bg-emerald-400 ring-2 ring-slate-900"></span>
            </span>
            <div class="text-left">
                <span class="block text-[9px] sm:text-[10px] font-semibold uppercase tracking-wider text-accent-300 leading-none">Asisten Cerdas</span>
                <span class="block text-[11px] sm:text-xs font-extrabold text-white mt-0.5">Tanya AI SYARVA</span>
            </div>
        </button>
    </div>

    
    <div x-show="open"
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-4 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 scale-95"
         @click.outside="open = false"
         class="fixed bottom-20 right-4 sm:right-6 z-50 w-[calc(100vw-2rem)] sm:w-[420px] max-h-[640px] h-[82vh] sm:h-[600px] flex flex-col rounded-3xl border border-slate-200/80 bg-white shadow-2xl overflow-hidden backdrop-blur-lg">

        
        <div class="flex items-center justify-between border-b border-white/10 bg-gradient-to-r from-slate-900 via-primary-950 to-charcoal-900 px-5 py-4 text-white">
            <div class="flex items-center gap-3">
                <span class="grid size-10 place-items-center rounded-2xl bg-gradient-to-br from-primary-500 to-accent-500 text-white shadow-md">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'sparkles','class' => 'size-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'sparkles','class' => 'size-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                </span>
                <div>
                    <h3 class="text-sm font-extrabold text-white flex items-center gap-1.5">
                        SYARVA AI Assistant
                    </h3>
                    <p class="text-[11px] text-emerald-400 flex items-center gap-1">
                        <span class="size-1.5 rounded-full bg-emerald-400 animate-pulse"></span> Online &bull; Siap Rekomendasikan Unit
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-1">
                <button type="button" @click="resetChat()" class="rounded-lg p-1.5 text-white/60 hover:bg-white/10 hover:text-white transition" title="Mulai Percakapan Baru">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'refresh','class' => 'size-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'refresh','class' => 'size-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                </button>
                <button type="button" @click="open = false" class="rounded-lg p-1.5 text-white/60 hover:bg-white/10 hover:text-white transition" title="Tutup">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'x','class' => 'size-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'x','class' => 'size-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                </button>
            </div>
        </div>

        
        <div x-ref="messagesContainer" class="flex-1 overflow-y-auto p-4 space-y-4 bg-slate-50/50">
            <template x-for="(msg, index) in messages" :key="index">
                <div>
                    
                    <template x-if="msg.role === 'user'">
                        <div class="flex justify-end">
                            <div class="max-w-[85%] rounded-2xl rounded-tr-none bg-gradient-to-r from-primary-800 to-primary-900 px-4 py-2.5 text-xs text-white shadow-sm">
                                <p x-text="msg.content" class="whitespace-pre-wrap leading-relaxed"></p>
                            </div>
                        </div>
                    </template>

                    
                    <template x-if="msg.role === 'assistant'">
                        <div class="flex items-start gap-2.5">
                            <span class="grid size-7 shrink-0 place-items-center rounded-full bg-primary-100 text-primary-700 text-xs font-bold mt-0.5">
                                AI
                            </span>
                            <div class="max-w-[88%] space-y-3">
                                <div class="rounded-2xl rounded-tl-none bg-white p-3.5 text-xs text-slate-700 shadow-sm border border-slate-200/80 leading-relaxed">
                                    <div x-html="formatMarkdown(msg.content)"></div>
                                </div>

                                
                                <template x-if="msg.recommendations && msg.recommendations.length > 0">
                                    <div class="space-y-2">
                                        <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Rekomendasi Unit Terkait:</p>
                                        <template x-for="item in msg.recommendations" :key="item.id">
                                            <a :href="item.url" target="_blank"
                                               class="flex items-center gap-3 rounded-xl border border-slate-200 bg-white p-2 transition hover:border-primary-400 hover:shadow-md group">
                                                <img :src="item.image" :alt="item.title" x-on:error="$el.src = '<?php echo e(asset('images/placeholder.svg')); ?>'" class="size-14 rounded-lg object-cover bg-slate-100 shrink-0">
                                                <div class="min-w-0 flex-1">
                                                    <span class="inline-block text-[9px] font-bold text-primary-700 bg-primary-50 px-1.5 py-0.5 rounded" x-text="item.category"></span>
                                                    <p class="truncate text-xs font-bold text-slate-900 group-hover:text-primary-700 mt-0.5" x-text="item.title"></p>
                                                    <p class="text-xs font-extrabold text-primary-600 mt-0.5" x-text="item.price"></p>
                                                </div>
                                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'chevron-right','class' => 'size-4 text-slate-400 group-hover:text-primary-600 shrink-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'chevron-right','class' => 'size-4 text-slate-400 group-hover:text-primary-600 shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                                            </a>
                                        </template>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

            
            <div x-show="loading" class="flex items-start gap-2.5" x-cloak>
                <span class="grid size-7 shrink-0 place-items-center rounded-full bg-primary-100 text-primary-700 text-xs font-bold mt-0.5">
                    AI
                </span>
                <div class="rounded-2xl rounded-tl-none bg-white p-3 shadow-sm border border-slate-200/80">
                    <div class="flex items-center gap-1.5">
                        <span class="size-2 rounded-full bg-primary-500 animate-bounce [animation-delay:-0.3s]"></span>
                        <span class="size-2 rounded-full bg-primary-500 animate-bounce [animation-delay:-0.15s]"></span>
                        <span class="size-2 rounded-full bg-primary-500 animate-bounce"></span>
                    </div>
                </div>
            </div>

            
            <div x-show="messages.length <= 1 && !loading" class="pt-2">
                <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">Contoh Pertanyaan Cepat:</p>
                <div class="flex flex-wrap gap-1.5">
                    <button type="button" @click="sendPrompt('Rekomendasi mobil Honda baru dengan promo DP ringan')"
                            class="rounded-xl border border-slate-200 bg-white px-3 py-1.5 text-[11px] font-medium text-slate-700 hover:border-primary-500 hover:bg-primary-50 hover:text-primary-800 transition shadow-xs text-left">
                        🚗 Rekomendasi Honda Baru
                    </button>
                    <button type="button" @click="sendPrompt('Cari rumah siap huni di Bogor budget di bawah 2 Miliar')"
                            class="rounded-xl border border-slate-200 bg-white px-3 py-1.5 text-[11px] font-medium text-slate-700 hover:border-primary-500 hover:bg-primary-50 hover:text-primary-800 transition shadow-xs text-left">
                        🏡 Rumah Siap Huni di Bogor
                    </button>
                    <button type="button" @click="sendPrompt('Bagaimana cara titip jual rumah atau mobil via WhatsApp Admin?')"
                            class="rounded-xl border border-slate-200 bg-white px-3 py-1.5 text-[11px] font-medium text-slate-700 hover:border-primary-500 hover:bg-primary-50 hover:text-primary-800 transition shadow-xs text-left">
                        ⭐ Titip Jual via WhatsApp
                    </button>
                    <button type="button" @click="sendPrompt('Jelaskan apa itu fitur keselamatan Honda Sensing')"
                            class="rounded-xl border border-slate-200 bg-white px-3 py-1.5 text-[11px] font-medium text-slate-700 hover:border-primary-500 hover:bg-primary-50 hover:text-primary-800 transition shadow-xs text-left">
                        🛡️ Fitur Honda Sensing
                    </button>
                </div>
            </div>
        </div>

        
        <div class="border-t border-slate-200/80 bg-white p-3">
            <form @submit.prevent="sendMessage()" class="flex items-center gap-2">
                <input type="text"
                       x-model="input"
                       :disabled="loading"
                       placeholder="Ketik pertanyaan properti / mobil Honda..."
                       class="flex-1 rounded-xl border border-slate-200 bg-slate-50 px-3.5 py-2.5 text-xs text-slate-900 placeholder:text-slate-400 focus:border-primary-500 focus:bg-white focus:outline-none focus:ring-1 focus:ring-primary-500 disabled:opacity-50">
                <button type="submit"
                        :disabled="loading || !input.trim()"
                        class="grid size-9 place-items-center rounded-xl bg-primary-700 text-white shadow-sm transition hover:bg-primary-800 disabled:opacity-40 disabled:cursor-not-allowed">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'send','class' => 'size-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'send','class' => 'size-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                </button>
            </form>
            <p class="mt-1.5 text-center text-[10px] text-slate-400">SYARVA AI Assistant &bull; Rekomendasi &amp; data listing real-time</p>
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
                content: 'Halo! Saya **SYARVA AI Assistant** 🤖. Saya siap membantu Anda mencari rumah/tanah impian, mobil Honda baru & bekas bergaransi, menghitung simulasi kredit, hingga informasi paket iklan. Ada yang bisa saya bantu hari ini?',
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
                    content: 'Halo! Percakapan baru telah dimulai. Mau cari properti atau mobil Honda apa hari ini?',
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
                const res = await fetch('<?php echo e(route("ai.chat")); ?>', {
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
                    content: 'Maaf, gagal terhubung ke server AI. Mohon periksa koneksi internet Anda.',
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
<?php /**PATH D:\SYARVA\resources\views\components\ai-chatbot.blade.php ENDPATH**/ ?>