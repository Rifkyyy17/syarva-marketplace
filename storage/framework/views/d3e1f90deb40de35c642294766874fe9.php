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
     <?php $__env->slot('title', null, []); ?> Laporan Inquiry <?php $__env->endSlot(); ?>
     <?php $__env->slot('pageTitle', null, []); ?> Laporan Inquiry <?php $__env->endSlot(); ?>

    <div class="grid gap-6 md:grid-cols-2">
        <div class="card p-6">
            <h2 class="text-base font-bold text-slate-900">Inquiry per Status</h2>
            <dl class="mt-4 space-y-3">
                <?php $__currentLoopData = $perStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center justify-between">
                        <dt><?php if (isset($component)) { $__componentOriginal2ddbc40e602c342e508ac696e52f8719 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ddbc40e602c342e508ac696e52f8719 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.badge','data' => ['status' => $item['status']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item['status'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ddbc40e602c342e508ac696e52f8719)): ?>
<?php $attributes = $__attributesOriginal2ddbc40e602c342e508ac696e52f8719; ?>
<?php unset($__attributesOriginal2ddbc40e602c342e508ac696e52f8719); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ddbc40e602c342e508ac696e52f8719)): ?>
<?php $component = $__componentOriginal2ddbc40e602c342e508ac696e52f8719; ?>
<?php unset($__componentOriginal2ddbc40e602c342e508ac696e52f8719); ?>
<?php endif; ?></dt>
                        <dd class="text-sm font-bold text-slate-800"><?php echo e($item['count']); ?></dd>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </dl>
        </div>

        <div class="card p-6">
            <h2 class="text-base font-bold text-slate-900">Inquiry per Bulan (6 bulan terakhir)</h2>
            <div class="mt-6 grid grid-cols-6 items-end gap-3">
                <?php $max = max($monthly->pluck('count')->max() ?? 0, 1); ?>
                <?php $__currentLoopData = $monthly; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex flex-col items-center gap-2">
                        <span class="text-xs font-bold text-slate-700"><?php echo e($item['count']); ?></span>
                        <div class="flex w-full items-end justify-center">
                            <span class="w-full max-w-10 rounded-t-lg bg-accent-500" style="height: <?php echo e(max(($item['count'] / $max) * 120, 4)); ?>px"></span>
                        </div>
                        <span class="text-[10px] font-medium uppercase tracking-wide text-slate-400"><?php echo e($item['month']); ?></span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="card p-6 md:col-span-2">
            <h2 class="text-base font-bold text-slate-900">Listing Paling Banyak Inquiry</h2>
            <?php if($topListings->isNotEmpty()): ?>
                <ol class="mt-4 space-y-3">
                    <?php $__currentLoopData = $topListings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="flex items-center gap-4">
                            <span class="grid size-8 shrink-0 place-items-center rounded-full bg-slate-100 text-sm font-bold text-slate-600"><?php echo e($index + 1); ?></span>
                            <div class="min-w-0 flex-1">
                                <a href="<?php echo e(route('admin.listings.show', $listing)); ?>" class="block truncate text-sm font-semibold text-slate-800 hover:text-primary-700"><?php echo e($listing->title); ?></a>
                                <p class="text-xs text-slate-400"><?php echo e($listing->user->name); ?></p>
                            </div>
                            <span class="shrink-0 rounded-full bg-primary-50 px-3 py-1 text-xs font-bold text-primary-700"><?php echo e($listing->inquiries_count); ?> inquiry</span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
            <?php else: ?>
                <p class="mt-4 text-sm text-slate-400">Belum ada inquiry.</p>
            <?php endif; ?>
        </div>
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
<?php endif; ?><?php /**PATH D:\SYARVA\resources\views\admin\reports\inquiries.blade.php ENDPATH**/ ?>