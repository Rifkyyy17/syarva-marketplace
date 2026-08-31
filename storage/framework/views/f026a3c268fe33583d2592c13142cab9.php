<?php if (isset($component)) { $__componentOriginalcc6cf8c0c767853c1d6c226b0af7de7d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcc6cf8c0c767853c1d6c226b0af7de7d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.user','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> Pengaturan <?php $__env->endSlot(); ?>
     <?php $__env->slot('pageTitle', null, []); ?> Pengaturan <?php $__env->endSlot(); ?>

    <div class="max-w-xl">
        <div class="card p-6 sm:p-8">
            <h2 class="text-lg font-bold text-slate-900">Ubah Password</h2>
            <p class="mt-1 text-sm text-slate-500">Ganti password akun Anda secara berkala untuk keamanan.</p>

            <form method="POST" action="<?php echo e(route('user.settings.password')); ?>" class="mt-6 space-y-4">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div>
                    <label for="current_password" class="label">Password Saat Ini</label>
                    <input type="password" id="current_password" name="current_password" required autocomplete="current-password"
                           class="input <?php echo e($errors->has('current_password') ? 'input-error' : ''); ?>">
                    <?php $__errorArgs = ['current_password'];
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

                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label for="password" class="label">Password Baru</label>
                        <input type="password" id="password" name="password" required autocomplete="new-password"
                               class="input <?php echo e($errors->has('password') ? 'input-error' : ''); ?>">
                        <?php $__errorArgs = ['password'];
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
                    <div>
                        <label for="password_confirmation" class="label">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" class="input">
                    </div>
                </div>

                <button type="submit" class="btn-primary">Simpan Password</button>
            </form>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcc6cf8c0c767853c1d6c226b0af7de7d)): ?>
<?php $attributes = $__attributesOriginalcc6cf8c0c767853c1d6c226b0af7de7d; ?>
<?php unset($__attributesOriginalcc6cf8c0c767853c1d6c226b0af7de7d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcc6cf8c0c767853c1d6c226b0af7de7d)): ?>
<?php $component = $__componentOriginalcc6cf8c0c767853c1d6c226b0af7de7d; ?>
<?php unset($__componentOriginalcc6cf8c0c767853c1d6c226b0af7de7d); ?>
<?php endif; ?><?php /**PATH D:\SYARVA\resources\views\user\settings.blade.php ENDPATH**/ ?>