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
     <?php $__env->slot('title', null, []); ?> Detail Listing <?php $__env->endSlot(); ?>
     <?php $__env->slot('pageTitle', null, []); ?> Detail Listing <?php $__env->endSlot(); ?>

    <a href="<?php echo e(route('admin.listings.index')); ?>" class="btn-ghost btn-sm mb-4">
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
            <div class="card overflow-hidden">
                <div class="relative aspect-16/8 bg-slate-100">
                    <?php if($listing->primaryImage): ?>
                        <img src="<?php echo e($listing->primaryImage->url); ?>" alt="" class="size-full object-cover">
                    <?php else: ?>
                        <span class="grid size-full place-items-center text-slate-400"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'image','class' => 'size-14']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'image','class' => 'size-14']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?></span>
                    <?php endif; ?>
                    <div class="absolute inset-x-0 bottom-0 flex items-end justify-between gap-4 bg-linear-to-t from-slate-900/80 to-transparent p-5">
                        <div class="min-w-0">
                            <h1 class="truncate text-lg font-bold text-white sm:text-xl"><?php echo e($listing->title); ?></h1>
                            <p class="mt-0.5 flex items-center gap-1.5 text-xs text-slate-200">
                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'map-pin','class' => 'size-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'map-pin','class' => 'size-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> <?php echo e($listing->location_full); ?>

                            </p>
                        </div>
                        <span class="shrink-0 text-lg font-extrabold text-accent-300">Rp <?php echo e(number_format((float) $listing->price, 0, ',', '.')); ?></span>
                    </div>
                </div>

                <?php if($listing->images->count() > 1): ?>
                    <div class="flex gap-2 overflow-x-auto p-3 no-scrollbar">
                        <?php $__currentLoopData = $listing->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img src="<?php echo e($image->url); ?>" alt="" loading="lazy" class="size-20 shrink-0 rounded-lg border border-slate-200 object-cover">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="card p-6">
                <h2 class="text-base font-bold text-slate-900">Deskripsi</h2>
                <p class="mt-3 whitespace-pre-line text-sm leading-relaxed text-slate-600"><?php echo e($listing->description); ?></p>
            </div>

            <?php if($listing->isProperty() && $listing->propertyDetail): ?>
                <div class="card p-6">
                    <h2 class="text-base font-bold text-slate-900">Detail Properti</h2>
                    <dl class="mt-4 grid grid-cols-2 gap-3 sm:grid-cols-3">
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'ruler','label' => 'Luas Tanah','value' => isset($listing->propertyDetail->land_area) ? number_format($listing->propertyDetail->land_area, 0, ',', '.').' m²' : null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'ruler','label' => 'Luas Tanah','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(isset($listing->propertyDetail->land_area) ? number_format($listing->propertyDetail->land_area, 0, ',', '.').' m²' : null)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'building','label' => 'Luas Bangunan','value' => isset($listing->propertyDetail->building_area) ? number_format($listing->propertyDetail->building_area, 0, ',', '.').' m²' : null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'building','label' => 'Luas Bangunan','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(isset($listing->propertyDetail->building_area) ? number_format($listing->propertyDetail->building_area, 0, ',', '.').' m²' : null)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'bed','label' => 'Kamar Tidur','value' => $listing->propertyDetail->bedrooms]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'bed','label' => 'Kamar Tidur','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->propertyDetail->bedrooms)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'bath','label' => 'Kamar Mandi','value' => $listing->propertyDetail->bathrooms]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'bath','label' => 'Kamar Mandi','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->propertyDetail->bathrooms)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'car','label' => 'Garasi','value' => $listing->propertyDetail->garage]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'car','label' => 'Garasi','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->propertyDetail->garage)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'layers','label' => 'Lantai','value' => $listing->propertyDetail->floors]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'layers','label' => 'Lantai','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->propertyDetail->floors)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'shield','label' => 'Sertifikat','value' => $listing->propertyDetail->certificate]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'shield','label' => 'Sertifikat','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->propertyDetail->certificate)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'map','label' => 'Status Tanah','value' => $listing->propertyDetail->land_status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'map','label' => 'Status Tanah','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->propertyDetail->land_status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'home','label' => 'Status Bangunan','value' => $listing->propertyDetail->building_status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'home','label' => 'Status Bangunan','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->propertyDetail->building_status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                    </dl>
                    <?php if(! empty($listing->propertyDetail->facilities)): ?>
                        <div class="mt-5 flex flex-wrap gap-2">
                            <?php $__currentLoopData = $listing->propertyDetail->facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="badge border border-primary-200 bg-primary-50 text-primary-800"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check','class' => 'size-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check','class' => 'size-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> <?php echo e($facility); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if($listing->isVehicle() && $listing->vehicleDetail): ?>
                <div class="card p-6">
                    <h2 class="text-base font-bold text-slate-900">Detail Kendaraan</h2>
                    <dl class="mt-4 grid grid-cols-2 gap-3 sm:grid-cols-3">
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'car-front','label' => 'Merk','value' => $listing->vehicleDetail->brand]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'car-front','label' => 'Merk','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->vehicleDetail->brand)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'car-back','label' => 'Model','value' => $listing->vehicleDetail->model]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'car-back','label' => 'Model','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->vehicleDetail->model)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'calendar','label' => 'Tahun','value' => $listing->vehicleDetail->year]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'calendar','label' => 'Tahun','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->vehicleDetail->year)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'gauge','label' => 'Kilometer','value' => $listing->vehicleDetail->mileage_label]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'gauge','label' => 'Kilometer','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->vehicleDetail->mileage_label)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'settings','label' => 'Transmisi','value' => $listing->vehicleDetail->transmission]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'settings','label' => 'Transmisi','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->vehicleDetail->transmission)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'fuel','label' => 'Bahan Bakar','value' => $listing->vehicleDetail->fuel_type]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'fuel','label' => 'Bahan Bakar','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->vehicleDetail->fuel_type)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'palette','label' => 'Warna','value' => $listing->vehicleDetail->color]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'palette','label' => 'Warna','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->vehicleDetail->color)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'check-badge','label' => 'Kondisi','value' => $listing->vehicleDetail->condition_label]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'check-badge','label' => 'Kondisi','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->vehicleDetail->condition_label)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'gauge','label' => 'Mesin','value' => $listing->vehicleDetail->engine_capacity]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'gauge','label' => 'Mesin','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->vehicleDetail->engine_capacity)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'tag','label' => 'Plat Nomor','value' => $listing->vehicleDetail->license_plate]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'tag','label' => 'Plat Nomor','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->vehicleDetail->license_plate)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $attributes = $__attributesOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__attributesOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal067d2761dcb601d2af902d6afb404503)): ?>
<?php $component = $__componentOriginal067d2761dcb601d2af902d6afb404503; ?>
<?php unset($__componentOriginal067d2761dcb601d2af902d6afb404503); ?>
<?php endif; ?>
                    </dl>
                </div>
            <?php endif; ?>

            <?php if($listing->inquiries->isNotEmpty()): ?>
                <div class="card p-6">
                    <h2 class="text-base font-bold text-slate-900">Inquiry (<?php echo e($listing->inquiries->count()); ?>)</h2>
                    <ul class="mt-4 space-y-3">
                        <?php $__currentLoopData = $listing->inquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="flex items-start gap-3 rounded-xl border border-slate-100 bg-slate-50 p-4">
                                <span class="grid size-9 shrink-0 place-items-center rounded-full bg-primary-100 text-sm font-bold text-primary-700"><?php echo e(strtoupper(substr($inquiry->name, 0, 1))); ?></span>
                                <div class="min-w-0 flex-1">
                                    <p class="text-sm font-semibold text-slate-800"><?php echo e($inquiry->name); ?> <span class="font-normal text-slate-400">&lt;<?php echo e($inquiry->email); ?>&gt;</span></p>
                                    <p class="mt-1 text-sm text-slate-600"><?php echo e($inquiry->message); ?></p>
                                    <p class="mt-1 text-xs text-slate-400"><?php echo e($inquiry->created_at->translatedFormat('d M Y H:i')); ?></p>
                                </div>
                                <?php if (isset($component)) { $__componentOriginal2ddbc40e602c342e508ac696e52f8719 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ddbc40e602c342e508ac696e52f8719 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.badge','data' => ['status' => $inquiry->status,'class' => 'shrink-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($inquiry->status),'class' => 'shrink-0']); ?>
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
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

        <aside class="space-y-5 lg:sticky lg:top-24 lg:self-start">
            <div class="card p-5">
                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-bold uppercase tracking-wide text-slate-800">Status</h2>
                    <?php if (isset($component)) { $__componentOriginal2ddbc40e602c342e508ac696e52f8719 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ddbc40e602c342e508ac696e52f8719 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.badge','data' => ['status' => $listing->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->status)]); ?>
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

                <?php if($listing->status === \App\Enums\ListingStatus::PENDING): ?>
                    <div class="mt-4">
                        <form method="POST" action="<?php echo e(route('admin.listings.approve', $listing)); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn-primary w-full">
                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check','class' => 'size-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check','class' => 'size-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Approve &amp; Publikasikan
                            </button>
                        </form>
                        <div class="mt-3 rounded-xl border border-red-200 bg-red-50 p-3">
                            <form method="POST" action="<?php echo e(route('admin.listings.reject', $listing)); ?>" class="space-y-2">
                                <?php echo csrf_field(); ?>
                                <label for="reason" class="label mb-1! text-xs font-semibold text-red-700">Alasan Penolakan</label>
                                <textarea id="reason" name="reason" rows="2" required minlength="5" maxlength="1000" class="input py-2! text-xs" placeholder="cth: Foto tidak jelas, mohon unggah ulang"></textarea>
                                <button type="submit" class="btn-danger btn-sm w-full">
                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'ban','class' => 'size-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'ban','class' => 'size-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Tolak
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($listing->rejection_reason): ?>
                    <div class="mt-4 rounded-xl border border-red-200 bg-red-50 p-3">
                        <p class="text-xs font-bold uppercase text-red-700">Alasan Penolakan</p>
                        <p class="mt-1 text-sm text-red-800"><?php echo e($listing->rejection_reason); ?></p>
                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('admin.listings.status', $listing)); ?>" class="mt-4 space-y-2">
                    <?php echo csrf_field(); ?>
                    <label for="status" class="label mb-1! text-xs font-semibold text-slate-500">Ubah Status</label>
                    <div class="flex gap-2">
                        <select id="status" name="status" class="input py-2! text-sm">
                            <?php $__currentLoopData = \App\Models\Listing::STATUSES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($status); ?>" <?php if($listing->status->value === $status): echo 'selected'; endif; ?>><?php echo e(ucfirst($status)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <button type="submit" class="btn-outline btn-sm shrink-0">Simpan</button>
                    </div>
                </form>

                <form method="POST" action="<?php echo e(route('admin.listings.feature', $listing)); ?>" class="mt-3">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn-outline w-full">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'star','class' => 'size-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'star','class' => 'size-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> <?php echo e($listing->featured ? 'Hapus dari Unggulan' : 'Jadikan Unggulan'); ?>

                    </button>
                </form>

                <form method="POST" action="<?php echo e(route('admin.listings.destroy', $listing)); ?>" class="mt-3">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn-danger btn-sm w-full" @click.prevent="$dispatch('confirm-action', { form: $el.closest('form'), message: 'Hapus listing ini? (soft delete)' })">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'trash','class' => 'size-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'trash','class' => 'size-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Hapus Listing
                    </button>
                </form>
            </div>

            <div class="card p-5">
                <h2 class="text-sm font-bold uppercase tracking-wide text-slate-800">Penjual</h2>
                <div class="mt-3 flex items-center gap-3">
                    <span class="grid size-11 shrink-0 place-items-center rounded-full bg-primary-700 font-bold text-white">
                        <?php echo e(strtoupper(substr($listing->user->name, 0, 1))); ?>

                    </span>
                    <div class="min-w-0">
                        <p class="truncate text-sm font-bold text-slate-900"><?php echo e($listing->user->name); ?></p>
                        <p class="truncate text-xs text-slate-500"><?php echo e($listing->user->email); ?></p>
                    </div>
                </div>
                <dl class="mt-4 space-y-2 text-sm">
                    <div class="flex justify-between"><dt class="text-slate-500">Total Listing</dt><dd class="font-semibold text-slate-800"><?php echo e($listing->user->listings()->count()); ?></dd></div>
                    <div class="flex justify-between"><dt class="text-slate-500">Bergabung</dt><dd class="font-semibold text-slate-800"><?php echo e($listing->user->created_at->translatedFormat('d M Y')); ?></dd></div>
                    <div class="flex justify-between"><dt class="text-slate-500">Dilihat</dt><dd class="font-semibold text-slate-800"><?php echo e(number_format($listing->view_count, 0, ',', '.')); ?></dd></div>
                    <div class="flex justify-between"><dt class="text-slate-500">Dibuat</dt><dd class="font-semibold text-slate-800"><?php echo e($listing->created_at->translatedFormat('d M Y')); ?></dd></div>
                </dl>
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
<?php endif; ?><?php /**PATH D:\SYARVA\resources\views\admin\listings\show.blade.php ENDPATH**/ ?>