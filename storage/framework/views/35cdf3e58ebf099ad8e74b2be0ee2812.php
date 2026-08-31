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
     <?php $__env->slot('title', null, []); ?> Laporan Listing <?php $__env->endSlot(); ?>
     <?php $__env->slot('pageTitle', null, []); ?> Laporan Listing <?php $__env->endSlot(); ?>

    <div class="grid gap-6 md:grid-cols-2">
        <div class="card p-6">
            <h2 class="text-base font-bold text-slate-900">Listing per Kategori</h2>
            <dl class="mt-4 space-y-3">
                <?php $__currentLoopData = $perCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-center justify-between">
                        <dt class="text-sm text-slate-600"><?php echo e($category->name); ?></dt>
                        <dd class="flex items-center gap-3">
                            <span class="h-2 w-28 overflow-hidden rounded-full bg-slate-100">
                                <span class="block h-full rounded-full bg-primary-600" style="width: <?php echo e($perCategory->max(fn ($c) => $c->listings_count) > 0 ? ($category->listings_count / $perCategory->max(fn ($c) => $c->listings_count) * 100) : 0); ?>%"></span>
                            </span>
                            <span class="w-8 text-right text-sm font-bold text-slate-800"><?php echo e($category->listings_count); ?></span>
                        </dd>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </dl>
        </div>

        <div class="card p-6">
            <h2 class="text-base font-bold text-slate-900">Listing per Status</h2>
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

        <div class="card p-6 md:col-span-2">
            <h2 class="text-base font-bold text-slate-900">Listing per Bulan (6 bulan terakhir)</h2>
            <div class="mt-6 grid grid-cols-6 items-end gap-3">
                <?php $max = max($monthly->pluck('count')->max() ?? 0, 1); ?>
                <?php $__currentLoopData = $monthly; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex flex-col items-center gap-2">
                        <span class="text-xs font-bold text-slate-700"><?php echo e($item['count']); ?></span>
                        <div class="flex w-full items-end justify-center">
                            <span class="w-full max-w-10 rounded-t-lg bg-primary-600" style="height: <?php echo e(max(($item['count'] / $max) * 120, 4)); ?>px"></span>
                        </div>
                        <span class="text-[10px] font-medium uppercase tracking-wide text-slate-400"><?php echo e($item['month']); ?></span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="card p-6 md:col-span-2">
            <h2 class="text-base font-bold text-slate-900">Matriks Kategori &times; Status</h2>
            <div class="mt-4 overflow-x-auto">
                <table class="w-full min-w-[480px] text-sm">
                    <thead>
                        <tr class="border-b border-slate-200 text-left text-xs uppercase tracking-wide text-slate-500">
                            <th class="pb-2 font-semibold">Kategori</th>
                            <?php $__currentLoopData = \App\Models\Listing::STATUSES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th class="pb-2 pr-3 font-semibold capitalize"><?php echo e($status); ?></th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <th class="pb-2 font-semibold">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php $__currentLoopData = $perCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="py-2.5 font-medium text-slate-800"><?php echo e($category->name); ?></td>
                                <?php $__currentLoopData = \App\Models\Listing::STATUSES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $row = $rows->firstWhere(fn ($r) => $r->category_id === $category->id && ($r->status instanceof \App\Enums\ListingStatus ? $r->status->value : $r->status) === $status); ?>
                                    <td class="py-2.5 pr-3 text-slate-600"><?php echo e($row->total ?? 0); ?></td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <td class="py-2.5 font-bold text-slate-900"><?php echo e($category->listings_count); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
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
<?php endif; ?><?php /**PATH D:\SYARVA\resources\views\admin\reports\listings.blade.php ENDPATH**/ ?>