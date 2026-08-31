<div x-data="confirmAction" x-cloak @confirm-action.window="ask($event.detail.form, $event.detail.message)">
    <div x-show="modal"
         x-transition.opacity
         class="fixed inset-0 z-[90] flex items-center justify-center bg-slate-900/60 p-4 backdrop-blur-sm">
        <div x-show="modal" x-transition x-on:click.outside="cancel()"
             class="w-full max-w-md overflow-hidden rounded-2xl bg-white shadow-2xl">
            <div class="p-6">
                <span class="grid size-12 place-items-center rounded-2xl bg-red-50 text-red-600">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'alert','class' => 'size-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'alert','class' => 'size-6']); ?>
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
                <h3 class="mt-4 text-lg font-bold text-slate-900">Konfirmasi</h3>
                <p class="mt-1 text-sm text-slate-500" x-text="message"></p>
            </div>
            <div class="flex justify-end gap-2 border-t border-slate-100 bg-slate-50 px-6 py-4">
                <button type="button" class="btn-outline btn-sm" @click="cancel()">Batal</button>
                <button type="button" class="btn-danger btn-sm" @click="confirm()">Ya, Lanjutkan</button>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\SYARVA\resources\views\components\confirm-modal.blade.php ENDPATH**/ ?>