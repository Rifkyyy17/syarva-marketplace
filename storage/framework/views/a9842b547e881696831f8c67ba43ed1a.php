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
     <?php $__env->slot('title', null, []); ?> Detail Inquiry <?php $__env->endSlot(); ?>
     <?php $__env->slot('pageTitle', null, []); ?> Detail Inquiry <?php $__env->endSlot(); ?>

    <a href="<?php echo e(route('admin.inquiries.index')); ?>" class="btn-ghost btn-sm mb-4">
        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'chevron-left','class' => 'size-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'chevron-left','class' => 'size-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Kembali
    </a>

    <div class="grid gap-6 lg:grid-cols-[1fr_340px]">
        <div class="min-w-0 space-y-6">
            <div class="card p-6">
                <div class="flex items-start justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <span class="grid size-12 shrink-0 place-items-center rounded-full bg-primary-700 text-lg font-bold text-white">
                            <?php echo e(strtoupper(substr($inquiry->name, 0, 1))); ?>

                        </span>
                        <div>
                            <h1 class="text-base font-bold text-slate-900"><?php echo e($inquiry->name); ?></h1>
                            <a href="mailto:<?php echo e($inquiry->email); ?>" class="text-sm text-primary-700 hover:underline"><?php echo e($inquiry->email); ?></a>
                            <?php if($inquiry->phone): ?>
                                <p class="text-sm text-slate-500"><?php echo e($inquiry->phone); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if (isset($component)) { $__componentOriginal2ddbc40e602c342e508ac696e52f8719 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ddbc40e602c342e508ac696e52f8719 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.badge','data' => ['status' => $inquiry->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($inquiry->status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ddbc40e602c342e508ac696e52f8719)): ?>
<?php $attributes = $__attributesOriginal2ddbc40e602c342e508ac696e52f8719; ?>
<?php unset($__attributesOriginal2ddbc40e602c342e508ac696e52f8719); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ddbc40e602c342e508ac696e52f8719)): ?>
<?php $component = $__componentOriginal2ddbc40e602c342e508ac696e52f8719; ?>
<?php unset($__componentOriginal2ddbc40e602c342e508ac696e52f8719); ?>
<?php endif; ?>
                </div>

                <div class="mt-6 rounded-xl border border-slate-100 bg-slate-50 p-5">
                    <p class="text-sm font-bold uppercase tracking-wide text-slate-500">Pesan</p>
                    <p class="mt-3 whitespace-pre-line text-sm leading-relaxed text-slate-700"><?php echo e($inquiry->message); ?></p>
                </div>

                <p class="mt-4 text-xs text-slate-400">
                    Dikirim <?php echo e($inquiry->created_at->translatedFormat('d M Y H:i')); ?>

                    <?php if($inquiry->isGuest()): ?>
                        &middot; sebagai tamu
                    <?php endif; ?>
                </p>
            </div>

            <div class="card p-6">
                <h2 class="text-sm font-bold uppercase tracking-wide text-slate-800">Listing Terkait</h2>
                <?php if($inquiry->listing): ?>
                    <div class="mt-4 flex items-center gap-4">
                        <a href="<?php echo e(route('admin.listings.show', $inquiry->listing)); ?>" class="size-16 shrink-0 overflow-hidden rounded-xl bg-slate-100">
                            <?php if($inquiry->listing->primaryImage): ?>
                                <img src="<?php echo e($inquiry->listing->primaryImage->url); ?>" alt="" loading="lazy" class="size-full object-cover">
                            <?php endif; ?>
                        </a>
                        <div class="min-w-0">
                            <a href="<?php echo e(route('admin.listings.show', $inquiry->listing)); ?>" class="block truncate text-sm font-bold text-slate-900 hover:text-primary-700"><?php echo e($inquiry->listing->title); ?></a>
                            <p class="text-xs text-slate-500"><?php echo e($inquiry->listing->category?->name); ?> &middot; <?php echo e($inquiry->listing->location_full); ?></p>
                            <p class="mt-1 text-sm font-bold text-primary-700">Rp <?php echo e(number_format((float) $inquiry->listing->price, 0, ',', '.')); ?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <p class="mt-3 text-sm text-slate-400">Listing telah dihapus.</p>
                <?php endif; ?>
            </div>
        </div>

        <aside class="space-y-5 lg:sticky lg:top-24 lg:self-start">
            <div class="card p-5">
                <h2 class="text-sm font-bold uppercase tracking-wide text-slate-800">Penjual</h2>
                <div class="mt-3 flex items-center gap-3">
                    <span class="grid size-10 shrink-0 place-items-center rounded-full bg-slate-200 text-sm font-bold text-slate-700">
                        <?php echo e(strtoupper(substr($inquiry->seller->name ?? '?', 0, 1))); ?>

                    </span>
                    <div class="min-w-0">
                        <p class="truncate text-sm font-bold text-slate-900"><?php echo e($inquiry->seller?->name ?? 'Tidak diketahui'); ?></p>
                        <?php if($inquiry->seller): ?>
                            <p class="truncate text-xs text-slate-500"><?php echo e($inquiry->seller->email); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($inquiry->seller?->whatsapp): ?>
                    <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $inquiry->seller->whatsapp)); ?>" target="_blank" rel="noopener" class="btn-outline btn-sm mt-4 w-full">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'phone','class' => 'size-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'phone','class' => 'size-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> WhatsApp Penjual
                    </a>
                <?php endif; ?>
            </div>

            <div class="card p-5">
                <h2 class="text-sm font-bold uppercase tracking-wide text-slate-800">Ubah Status</h2>
                <form method="POST" action="<?php echo e(route('admin.inquiries.status', $inquiry)); ?>" class="mt-3 space-y-3">
                    <?php echo csrf_field(); ?>
                    <select name="status" required class="input py-2! text-sm">
                        <?php $__currentLoopData = [\App\Models\Inquiry::STATUS_NEW, \App\Models\Inquiry::STATUS_READ, \App\Models\Inquiry::STATUS_REPLIED]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($status); ?>" <?php if($inquiry->status === $status): echo 'selected'; endif; ?>><?php echo e(ucfirst($status)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <button type="submit" class="btn-primary btn-sm w-full">Simpan Status</button>
                </form>
                <div class="mt-4 grid gap-2 border-t border-slate-100 pt-4">
                    <a href="mailto:<?php echo e($inquiry->email); ?>" class="btn-outline btn-sm">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'mail','class' => 'size-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'mail','class' => 'size-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Balas Email
                    </a>
                    <?php if($inquiry->phone): ?>
                        <a href="tel:<?php echo e($inquiry->phone); ?>" class="btn-outline btn-sm">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'phone','class' => 'size-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'phone','class' => 'size-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Hubungi <?php echo e($inquiry->name); ?>

                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </aside>
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
<?php endif; ?><?php /**PATH D:\SYARVA\resources\views\admin\inquiries\show.blade.php ENDPATH**/ ?>