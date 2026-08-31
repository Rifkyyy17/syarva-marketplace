<?php
    $ts = microtime(true);
    $token = hash_hmac('sha256', $ts . '|' . request()->ip() . '|' . session()->getId(), config('app.key'));
?>

<div x-data="{ checked: false, loading: false, verified: false }" class="my-3">
    <!-- Honeypot field for automated bots -->
    <input type="text" name="_hp_check" value="" style="display:none!important;position:absolute;left:-9999px;" tabindex="-1" autocomplete="off" aria-hidden="true">
    <input type="hidden" name="_captcha_ts" value="<?php echo e($ts); ?>">
    <input type="hidden" name="captcha" :value="verified ? '<?php echo e($token); ?>' : ''">

    <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-slate-50/80 px-4 py-3 shadow-xs transition-colors hover:border-slate-300">
        <label class="flex cursor-pointer items-center gap-3 select-none" @click.prevent="
            if (!verified && !loading) {
                loading = true;
                setTimeout(() => {
                    loading = false;
                    verified = true;
                    checked = true;
                }, 400);
            }
        ">
            <div class="relative grid size-6 place-items-center rounded-md border-2 transition-all duration-200"
                 :class="verified ? 'border-emerald-600 bg-emerald-600' : (loading ? 'border-primary-500 bg-primary-50' : 'border-slate-300 bg-white hover:border-primary-500')">
                <template x-if="loading">
                    <svg class="size-4 animate-spin text-primary-600" viewBox="0 0 24 24" fill="none">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </template>
                <template x-if="verified">
                    <svg class="size-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                </template>
            </div>
            <span class="text-sm font-medium text-slate-700" :class="verified ? 'text-slate-900 font-semibold' : ''">
                Saya bukan robot
            </span>
        </label>

        <div class="flex flex-col items-end pl-3 text-right">
            <div class="flex items-center gap-1 text-[11px] font-semibold text-slate-500">
                <svg viewBox="0 0 24 24" class="size-3.5 text-primary-600" fill="currentColor">
                    <path d="M12 2 4 5v6.09c0 5.05 3.41 9.76 8 10.91 4.59-1.15 8-5.86 8-10.91V5l-8-3zm0 2.18 6 2.25v4.66c0 4.09-2.67 7.9-6 8.91-3.33-1.01-6-4.82-6-8.91V6.43l6-2.25z"/>
                </svg>
                <span>SYARVA Shield</span>
            </div>
            <span class="text-[9px] text-slate-400">Privasi &amp; Keamanan</span>
        </div>
    </div>

    <?php $__errorArgs = ['captcha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="mt-1.5 text-xs font-medium text-red-600"><?php echo e($message); ?></p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<?php /**PATH D:\SYARVA\resources\views\components\captcha.blade.php ENDPATH**/ ?>