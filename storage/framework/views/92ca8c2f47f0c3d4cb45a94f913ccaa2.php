<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> Edit User <?php $__env->endSlot(); ?>
     <?php $__env->slot('pageTitle', null, []); ?> Edit User: <?php echo e($user->name); ?> <?php $__env->endSlot(); ?>

    <div class="card mx-auto max-w-xl p-6 sm:p-8">
        <form method="POST" action="<?php echo e(route('admin.users.update', $user)); ?>" class="space-y-4">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                <label for="name" class="label">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="<?php echo e(old('name', $user->name)); ?>" required maxlength="100" class="input <?php echo e($errors->has('name') ? 'input-error' : ''); ?>">
                <?php $__errorArgs = ['name'];
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
                <label for="email" class="label">Email</label>
                <input type="email" id="email" name="email" value="<?php echo e(old('email', $user->email)); ?>" required maxlength="150" class="input <?php echo e($errors->has('email') ? 'input-error' : ''); ?>">
                <?php $__errorArgs = ['email'];
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
                <label for="phone" class="label">No. HP</label>
                <input type="tel" id="phone" name="phone" value="<?php echo e(old('phone', $user->phone)); ?>" maxlength="20" class="input">
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="role" class="label">Role</label>
                    <select id="role" name="role" required class="input" <?php if($user->id === auth()->id()): ?> disabled <?php endif; ?>>
                        <option value="user" <?php if(old('role', $user->role) === 'user'): echo 'selected'; endif; ?>">Pembeli</option>
                        <option value="admin" <?php if(old('role', $user->role) === 'admin'): echo 'selected'; endif; ?>>Admin</option>
                    </select>
                    <?php if($user->id === auth()->id()): ?>
                        <input type="hidden" name="role" value="admin">
                    <?php endif; ?>
                </div>
                <div>
                    <label for="status" class="label">Status</label>
                    <select id="status" name="status" required class="input">
                        <option value="active" <?php if(old('status', $user->status) === 'active'): echo 'selected'; endif; ?>>Aktif</option>
                        <option value="suspended" <?php if(old('status', $user->status) === 'suspended'): echo 'selected'; endif; ?>>Ditangguhkan</option>
                    </select>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="password" class="label">Password Baru</label>
                    <input type="password" id="password" name="password" minlength="8" class="input <?php echo e($errors->has('password') ? 'input-error' : ''); ?>" placeholder="Kosongkan jika tidak diubah">
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
                    <input type="password" id="password_confirmation" name="password_confirmation" class="input">
                </div>
            </div>

            <div class="flex justify-end gap-2 pt-2">
                <a href="<?php echo e(route('admin.users.index')); ?>" class="btn-outline">Batal</a>
                <button type="submit" class="btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $attributes = $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $component = $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?><?php /**PATH D:\SYARVA\resources\views\admin\users\edit.blade.php ENDPATH**/ ?>