<?php if (isset($component)) { $__componentOriginal6107cafe1a6b2bb3ae2fbdc60a313162 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6107cafe1a6b2bb3ae2fbdc60a313162 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.auth','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.auth'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> Masuk <?php $__env->endSlot(); ?>

    <div class="card p-8">
        <h1 class="text-xl font-extrabold tracking-tight text-slate-900">Masuk ke Akun Anda</h1>
        <p class="mt-1 text-sm text-slate-500">Selamat datang kembali di SYARVA Marketplace.</p>

        <?php if(session('status')): ?>
            <p class="mt-4 rounded-lg bg-emerald-50 px-3 py-2 text-sm text-emerald-700"><?php echo e(session('status')); ?></p>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('login.store')); ?>" class="mt-6 space-y-4">
            <?php echo csrf_field(); ?>

            <div>
                <label for="email" class="label">Email</label>
                <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus autocomplete="username"
                       class="input <?php echo e($errors->has('email') ? 'input-error' : ''); ?>" placeholder="nama@email.com">
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
                <div class="flex items-center justify-between">
                    <label for="password" class="label">Password</label>
                    <a href="<?php echo e(route('password.request')); ?>" class="text-xs font-semibold text-primary-700 hover:text-primary-800">Lupa password?</a>
                </div>
                <input type="password" id="password" name="password" required autocomplete="current-password"
                       class="input <?php echo e($errors->has('password') ? 'input-error' : ''); ?>" placeholder="********">
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

            <label class="flex items-center gap-2 text-sm text-slate-600">
                <input type="checkbox" name="remember" class="size-4 rounded accent-primary-600">
                Ingat saya
            </label>

            <?php if (isset($component)) { $__componentOriginald29173023e19188bd7142e1eafa34fd3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald29173023e19188bd7142e1eafa34fd3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.captcha','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('captcha'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald29173023e19188bd7142e1eafa34fd3)): ?>
<?php $attributes = $__attributesOriginald29173023e19188bd7142e1eafa34fd3; ?>
<?php unset($__attributesOriginald29173023e19188bd7142e1eafa34fd3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald29173023e19188bd7142e1eafa34fd3)): ?>
<?php $component = $__componentOriginald29173023e19188bd7142e1eafa34fd3; ?>
<?php unset($__componentOriginald29173023e19188bd7142e1eafa34fd3); ?>
<?php endif; ?>

            <button type="submit" class="btn-primary w-full py-3!">Masuk</button>
        </form>

        <p class="mt-6 text-center text-sm text-slate-500">
            Belum punya akun?
            <a href="<?php echo e(route('register')); ?>" class="font-semibold text-primary-700 hover:text-primary-800">Daftar sekarang</a>
        </p>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6107cafe1a6b2bb3ae2fbdc60a313162)): ?>
<?php $attributes = $__attributesOriginal6107cafe1a6b2bb3ae2fbdc60a313162; ?>
<?php unset($__attributesOriginal6107cafe1a6b2bb3ae2fbdc60a313162); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6107cafe1a6b2bb3ae2fbdc60a313162)): ?>
<?php $component = $__componentOriginal6107cafe1a6b2bb3ae2fbdc60a313162; ?>
<?php unset($__componentOriginal6107cafe1a6b2bb3ae2fbdc60a313162); ?>
<?php endif; ?><?php /**PATH D:\SYARVA\resources\views\auth\login.blade.php ENDPATH**/ ?>