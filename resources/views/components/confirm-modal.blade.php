<div x-data="confirmAction" x-cloak @confirm-action.window="ask($event.detail.form, $event.detail.message)">
    <div x-show="modal"
         x-transition.opacity
         class="fixed inset-0 z-[90] flex items-center justify-center bg-slate-900/60 p-4 backdrop-blur-sm">
        <div x-show="modal" x-transition x-on:click.outside="cancel()"
             class="w-full max-w-md overflow-hidden rounded-2xl bg-white shadow-2xl">
            <div class="p-6">
                <span class="grid size-12 place-items-center rounded-2xl bg-red-50 text-red-600">
                    <x-icon name="alert" class="size-6"/>
                </span>
                <h3 class="mt-4 text-lg font-bold text-slate-900">Konfirmasi</h3>
                <p class="mt-1 text-sm text-slate-500" x-text="message"></p>
            </div>
            <div class="flex justify-end gap-2 border-t border-slate-100 bg-slate-50 px-6 py-4">
                <button type="button" class="btn-outline btn-sm" @click="cancel()">Batal</button>
                <button type="button" class="btn-danger btn-sm" @click="confirm()">Ya, Lanjutkan</button>
            </div>
        </div>
    </div>
</div>