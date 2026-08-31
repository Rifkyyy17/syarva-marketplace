<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> <?php echo e($listing->title); ?> <?php $__env->endSlot(); ?>
     <?php $__env->slot('description', null, []); ?> <?php echo e(\Illuminate\Support\Str::limit($listing->description, 160)); ?> <?php $__env->endSlot(); ?>
     <?php $__env->slot('image', null, []); ?> <?php echo e($listing->primaryImageUrl); ?> <?php $__env->endSlot(); ?>
     <?php $__env->slot('type', null, []); ?> product <?php $__env->endSlot(); ?>

    <?php
        $rawWa = $listing->user->whatsapp ?: $listing->user->phone ?: \App\Models\Setting::get('contact_whatsapp');
        $cleanWa = $rawWa ? preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $rawWa)) : null;
        $waText = 'Halo ' . $listing->user->name . ', saya tertarik dengan listing "' . $listing->title . '" seharga Rp ' . number_format((float) $listing->price, 0, ',', '.') . ' di ' . config('app.name') . '. Link: ' . url()->current() . ' . Apakah unit ini masih tersedia?';
        $waUrl = $cleanWa ? 'https://wa.me/' . $cleanWa . '?text=' . urlencode($waText) : null;
    ?>

    
    <section class="border-b border-slate-200 bg-white py-6">
        <div class="container-app">
            <?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['items' => [
                'Home' => route('home'),
                $listing->category->name => match ($listing->category->slug) {
                    'rumah' => route('listings.property', 'rumah'),
                    'tanah' => route('listings.property', 'tanah'),
                    'mobil-baru' => route('listings.vehicle', 'baru'),
                    'mobil-second' => route('listings.vehicle', 'second'),
                    default => route('listings.index'),
                },
                $listing->title => null,
            ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                'Home' => route('home'),
                $listing->category->name => match ($listing->category->slug) {
                    'rumah' => route('listings.property', 'rumah'),
                    'tanah' => route('listings.property', 'tanah'),
                    'mobil-baru' => route('listings.vehicle', 'baru'),
                    'mobil-second' => route('listings.vehicle', 'second'),
                    default => route('listings.index'),
                },
                $listing->title => null,
            ])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2)): ?>
<?php $attributes = $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2; ?>
<?php unset($__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale19f62b34dfe0bfdf95075badcb45bc2)): ?>
<?php $component = $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2; ?>
<?php unset($__componentOriginale19f62b34dfe0bfdf95075badcb45bc2); ?>
<?php endif; ?>

            <div class="mt-4 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div>
                    <div class="flex flex-wrap items-center gap-2 mb-2">
                        <span class="badge border border-primary-200 bg-primary-50 text-primary-800 font-bold">
                            <?php echo e($listing->category->name); ?>

                        </span>
                        <?php if($listing->featured): ?>
                            <span class="badge border border-amber-300 bg-amber-50 text-amber-800 font-bold flex items-center gap-1">
                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'star','class' => 'size-3 text-amber-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'star','class' => 'size-3 text-amber-500']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Unggulan
                            </span>
                        <?php endif; ?>
                        <?php if($listing->isVehicle() && $listing->vehicleDetail): ?>
                            <span class="badge border border-slate-200 bg-slate-100 text-slate-700">
                                <?php echo e($listing->vehicleDetail->condition_label); ?>

                            </span>
                        <?php endif; ?>
                    </div>
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-charcoal-900">
                        <?php echo e($listing->title); ?>

                    </h1>
                    <div class="mt-2.5 flex flex-wrap items-center gap-x-5 gap-y-2 text-xs sm:text-sm text-slate-500">
                        <span class="flex items-center gap-1.5 font-medium text-slate-700">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'map-pin','class' => 'size-4 text-primary-600']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'map-pin','class' => 'size-4 text-primary-600']); ?>
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
                            <?php echo e($listing->location_full); ?>

                        </span>
                        <span class="flex items-center gap-1.5">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'eye','class' => 'size-4 text-slate-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'eye','class' => 'size-4 text-slate-400']); ?>
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
                            <?php echo e(number_format($listing->view_count, 0, ',', '.')); ?> dilihat
                        </span>
                        <span class="flex items-center gap-1.5">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'calendar','class' => 'size-4 text-slate-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'calendar','class' => 'size-4 text-slate-400']); ?>
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
                            Diposting <?php echo e($listing->created_at->diffForHumans()); ?>

                        </span>
                        <span class="inline-flex items-center gap-1 text-emerald-700 font-semibold">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check-badge','class' => 'size-4 text-emerald-600']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check-badge','class' => 'size-4 text-emerald-600']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Terverifikasi
                        </span>
                    </div>
                </div>

                
                <div class="flex items-center gap-2 self-start lg:self-center mt-2 sm:mt-0">
                    <button type="button"
                            onclick="window.dispatchEvent(new CustomEvent('open-share-modal'))"
                            class="inline-flex items-center gap-1.5 sm:gap-2 rounded-xl border border-slate-200 bg-white px-3.5 sm:px-4 py-2 text-xs font-bold text-slate-700 hover:bg-slate-50 transition shadow-xs cursor-pointer active:scale-95">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'share','class' => 'size-4 text-slate-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'share','class' => 'size-4 text-slate-500']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Bagikan
                    </button>
                </div>
            </div>
        </div>
    </section>

    
    <section class="container-app py-8 sm:py-10">
        <div class="grid gap-8 lg:grid-cols-[1fr_390px] items-start">
            
            <div class="min-w-0 space-y-8">
                
                <div x-data="gallery('<?php echo e($listing->primaryImage?->url ?? ''); ?>')" class="rounded-3xl border border-slate-200 bg-white p-3 sm:p-4 shadow-sm overflow-hidden">
                    <?php $images = $listing->images; ?>
                    <div class="relative aspect-[16/10] sm:aspect-[16/9] w-full overflow-hidden rounded-2xl bg-slate-900/5 group">
                        <template x-if="current">
                            <img :src="current" alt="<?php echo e($listing->title); ?>" class="size-full object-cover transition-transform duration-500 group-hover:scale-105">
                        </template>
                        <template x-if="!current">
                            <span class="grid size-full place-items-center text-slate-400 bg-slate-100">
                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'camera','class' => 'size-16 opacity-40']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'camera','class' => 'size-16 opacity-40']); ?>
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
                        </template>
                        
                        
                        <div class="absolute top-3 left-3 flex gap-2">
                            <span class="rounded-full bg-charcoal-900/80 px-3 py-1 text-xs font-bold text-white backdrop-blur-md">
                                <?php echo e($listing->category->name); ?>

                            </span>
                        </div>

                        
                        <?php if($images->count() > 0): ?>
                            <span class="absolute bottom-3 right-3 flex items-center gap-1.5 rounded-xl bg-charcoal-900/80 px-3 py-1.5 text-xs font-bold text-white backdrop-blur-md">
                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'camera','class' => 'size-3.5 text-accent-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'camera','class' => 'size-3.5 text-accent-400']); ?>
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
                                <?php echo e($images->count()); ?> Foto
                            </span>
                        <?php endif; ?>
                    </div>

                    
                    <?php if($images->count() > 1): ?>
                        <div class="mt-3 flex gap-2.5 overflow-x-auto pb-1 pt-1 no-scrollbar">
                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <button type="button"
                                        class="relative size-20 sm:size-24 shrink-0 overflow-hidden rounded-xl border-2 transition-all"
                                        :class="current === '<?php echo e($image->url); ?>' ? 'border-primary-600 ring-2 ring-primary-500/30 scale-95' : 'border-slate-200 opacity-70 hover:opacity-100'"
                                        @click="set('<?php echo e($image->url); ?>')"
                                        aria-label="Foto <?php echo e($index + 1); ?>">
                                    <img src="<?php echo e($image->url); ?>" alt="" loading="lazy" class="size-full object-cover">
                                </button>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>

                
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    <?php if($listing->isVehicle() && $listing->vehicleDetail): ?>
                        <div class="rounded-2xl border border-slate-200 bg-white p-3.5 text-center shadow-xs">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Tahun</span>
                            <p class="mt-1 text-sm sm:text-base font-extrabold text-charcoal-900"><?php echo e($listing->vehicleDetail->year); ?></p>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-white p-3.5 text-center shadow-xs">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Transmisi</span>
                            <p class="mt-1 text-sm sm:text-base font-extrabold text-charcoal-900"><?php echo e($listing->vehicleDetail->transmission); ?></p>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-white p-3.5 text-center shadow-xs">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Bahan Bakar</span>
                            <p class="mt-1 text-sm sm:text-base font-extrabold text-charcoal-900"><?php echo e($listing->vehicleDetail->fuel_type); ?></p>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-white p-3.5 text-center shadow-xs">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Jarak Tempuh</span>
                            <p class="mt-1 text-sm sm:text-base font-extrabold text-charcoal-900"><?php echo e($listing->vehicleDetail->mileage_label); ?></p>
                        </div>
                    <?php elseif($listing->isProperty() && $listing->propertyDetail): ?>
                        <div class="rounded-2xl border border-slate-200 bg-white p-3.5 text-center shadow-xs">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Luas Tanah</span>
                            <p class="mt-1 text-sm sm:text-base font-extrabold text-charcoal-900"><?php echo e($listing->propertyDetail->land_area ? number_format($listing->propertyDetail->land_area, 0, ',', '.') . ' m²' : '-'); ?></p>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-white p-3.5 text-center shadow-xs">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Luas Bangunan</span>
                            <p class="mt-1 text-sm sm:text-base font-extrabold text-charcoal-900"><?php echo e($listing->propertyDetail->building_area ? number_format($listing->propertyDetail->building_area, 0, ',', '.') . ' m²' : '-'); ?></p>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-white p-3.5 text-center shadow-xs">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Kamar Tidur</span>
                            <p class="mt-1 text-sm sm:text-base font-extrabold text-charcoal-900"><?php echo e($listing->propertyDetail->bedrooms ?? '-'); ?> KT</p>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-white p-3.5 text-center shadow-xs">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Kamar Mandi</span>
                            <p class="mt-1 text-sm sm:text-base font-extrabold text-charcoal-900"><?php echo e($listing->propertyDetail->bathrooms ?? '-'); ?> KM</p>
                        </div>
                    <?php endif; ?>
                </div>

                
                <div class="rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                    <div class="flex items-center gap-3 border-b border-slate-100 pb-4">
                        <span class="grid size-9 place-items-center rounded-xl bg-primary-100 text-primary-700">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'list','class' => 'size-4.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'list','class' => 'size-4.5']); ?>
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
                        <div>
                            <h2 class="text-lg font-extrabold text-slate-900">Deskripsi Lengkap</h2>
                            <p class="text-xs text-slate-500">Informasi detail mengenai unit listing ini.</p>
                        </div>
                    </div>
                    <div class="prose prose-slate mt-5 max-w-none text-sm leading-relaxed text-slate-700">
                        <?php echo nl2br(e($listing->description)); ?>

                    </div>
                </div>

                
                <?php if($listing->isProperty() && $listing->propertyDetail): ?>
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                        <div class="flex items-center gap-3 border-b border-slate-100 pb-4">
                            <span class="grid size-9 place-items-center rounded-xl bg-emerald-100 text-emerald-700">
                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'building','class' => 'size-4.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'building','class' => 'size-4.5']); ?>
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
                            <div>
                                <h2 class="text-lg font-extrabold text-slate-900">Spesifikasi Properti</h2>
                                <p class="text-xs text-slate-500">Rincian luas, ruangan, dan legalitas dokumen.</p>
                            </div>
                        </div>

                        <dl class="mt-6 grid grid-cols-1 gap-3.5 sm:grid-cols-2 lg:grid-cols-3">
                            <?php if($listing->propertyDetail->land_area): ?>
                                <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'ruler','label' => 'Luas Tanah','value' => number_format($listing->propertyDetail->land_area, 0, ',', '.').' m²']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'ruler','label' => 'Luas Tanah','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(number_format($listing->propertyDetail->land_area, 0, ',', '.').' m²')]); ?>
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
                            <?php endif; ?>
                            <?php if($listing->propertyDetail->building_area): ?>
                                <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'building','label' => 'Luas Bangunan','value' => number_format($listing->propertyDetail->building_area, 0, ',', '.').' m²']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'building','label' => 'Luas Bangunan','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(number_format($listing->propertyDetail->building_area, 0, ',', '.').' m²')]); ?>
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
                            <?php endif; ?>
                            <?php if($listing->propertyDetail->bedrooms !== null): ?>
                                <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'bed','label' => 'Kamar Tidur','value' => $listing->propertyDetail->bedrooms.' Ruang']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'bed','label' => 'Kamar Tidur','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->propertyDetail->bedrooms.' Ruang')]); ?>
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
                            <?php endif; ?>
                            <?php if($listing->propertyDetail->bathrooms !== null): ?>
                                <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'bath','label' => 'Kamar Mandi','value' => $listing->propertyDetail->bathrooms.' Ruang']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'bath','label' => 'Kamar Mandi','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->propertyDetail->bathrooms.' Ruang')]); ?>
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
                            <?php endif; ?>
                            <?php if($listing->propertyDetail->garage): ?>
                                <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'car','label' => 'Kapasitas Garasi','value' => $listing->propertyDetail->garage.' Mobil']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'car','label' => 'Kapasitas Garasi','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->propertyDetail->garage.' Mobil')]); ?>
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
                            <?php endif; ?>
                            <?php if($listing->propertyDetail->floors): ?>
                                <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'layers','label' => 'Jumlah Lantai','value' => $listing->propertyDetail->floors.' Lantai']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'layers','label' => 'Jumlah Lantai','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->propertyDetail->floors.' Lantai')]); ?>
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
                            <?php endif; ?>
                            <?php if($listing->propertyDetail->certificate): ?>
                                <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'shield','label' => 'Legalitas Sertifikat','value' => $listing->propertyDetail->certificate]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'shield','label' => 'Legalitas Sertifikat','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->propertyDetail->certificate)]); ?>
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
                            <?php endif; ?>
                            <?php if($listing->propertyDetail->land_status): ?>
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
                            <?php endif; ?>
                            <?php if($listing->propertyDetail->building_status): ?>
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
                            <?php endif; ?>
                        </dl>

                        <?php if(! empty($listing->propertyDetail->facilities)): ?>
                            <div class="mt-8 border-t border-slate-100 pt-6">
                                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Fasilitas &amp; Fitur Tambahan</h3>
                                <div class="flex flex-wrap gap-2">
                                    <?php $__currentLoopData = $listing->propertyDetail->facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="inline-flex items-center gap-1.5 rounded-xl border border-emerald-200 bg-emerald-50/80 px-3 py-1.5 text-xs font-bold text-emerald-800">
                                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check','class' => 'size-3.5 text-emerald-600']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check','class' => 'size-3.5 text-emerald-600']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> <?php echo e($facility); ?>

                                        </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                
                <?php if($listing->isVehicle() && $listing->vehicleDetail): ?>
                    <?php
                        $isHonda = $listing->category->slug === 'mobil-baru'
                            || str_contains(strtolower($listing->title), 'honda')
                            || str_contains(strtolower($listing->vehicleDetail->brand ?? ''), 'honda');
                    ?>

                    <?php if($isHonda): ?>
                        <?php if (isset($component)) { $__componentOriginal99afa5aba268549da12e46ba2827d2f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal99afa5aba268549da12e46ba2827d2f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.honda-spec-table','data' => ['listing' => $listing]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('honda-spec-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['listing' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal99afa5aba268549da12e46ba2827d2f6)): ?>
<?php $attributes = $__attributesOriginal99afa5aba268549da12e46ba2827d2f6; ?>
<?php unset($__attributesOriginal99afa5aba268549da12e46ba2827d2f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal99afa5aba268549da12e46ba2827d2f6)): ?>
<?php $component = $__componentOriginal99afa5aba268549da12e46ba2827d2f6; ?>
<?php unset($__componentOriginal99afa5aba268549da12e46ba2827d2f6); ?>
<?php endif; ?>
                    <?php else: ?>
                        <div class="rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 shadow-xs">
                            <div class="flex items-center gap-3 border-b border-slate-100 pb-4">
                                <span class="grid size-9 place-items-center rounded-xl bg-primary-100 text-primary-700">
                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'car-front','class' => 'size-4.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'car-front','class' => 'size-4.5']); ?>
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
                                <div>
                                    <h2 class="text-lg font-extrabold text-slate-900">Spesifikasi Kendaraan</h2>
                                    <p class="text-xs text-slate-500">Rincian teknis, transmisi, dan kondisi fisik kendaraan.</p>
                                </div>
                            </div>

                            <dl class="mt-6 grid grid-cols-1 gap-3.5 sm:grid-cols-2 lg:grid-cols-3">
                                <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'car-front','label' => 'Merk / Brand','value' => $listing->vehicleDetail->brand]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'car-front','label' => 'Merk / Brand','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->vehicleDetail->brand)]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'car-back','label' => 'Model / Tipe','value' => $listing->vehicleDetail->model]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'car-back','label' => 'Model / Tipe','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->vehicleDetail->model)]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'calendar','label' => 'Tahun Pembuatan','value' => $listing->vehicleDetail->year]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'calendar','label' => 'Tahun Pembuatan','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->vehicleDetail->year)]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'gauge','label' => 'Jarak Tempuh','value' => $listing->vehicleDetail->mileage_label]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'gauge','label' => 'Jarak Tempuh','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->vehicleDetail->mileage_label)]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'palette','label' => 'Warna Unit','value' => $listing->vehicleDetail->color]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'palette','label' => 'Warna Unit','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->vehicleDetail->color)]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'check-badge','label' => 'Kondisi Fisik','value' => $listing->vehicleDetail->condition_label]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'check-badge','label' => 'Kondisi Fisik','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->vehicleDetail->condition_label)]); ?>
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
                                <?php if($listing->vehicleDetail->engine_capacity): ?>
                                    <?php if (isset($component)) { $__componentOriginal067d2761dcb601d2af902d6afb404503 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal067d2761dcb601d2af902d6afb404503 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spec-item','data' => ['icon' => 'gauge','label' => 'Kapasitas Mesin','value' => $listing->vehicleDetail->engine_capacity]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('spec-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'gauge','label' => 'Kapasitas Mesin','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($listing->vehicleDetail->engine_capacity)]); ?>
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
                                <?php endif; ?>
                                <?php if($listing->vehicleDetail->license_plate): ?>
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
                                <?php endif; ?>
                            </dl>
                        </div>
                    <?php endif; ?>

                    
                    <?php if($listing->vehicleDetail->promo_package || $listing->vehicleDetail->warranty_info || $listing->vehicleDetail->brochure_url || !empty($listing->vehicleDetail->honda_features) || $listing->vehicleDetail->bonus_accessories): ?>
                        <div class="rounded-3xl border border-primary-200 bg-gradient-to-br from-primary-50/40 via-white to-white p-6 sm:p-8 shadow-xs">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-primary-100 pb-5">
                                <div>
                                    <span class="inline-flex items-center gap-1 rounded-full bg-primary-100 px-3 py-1 text-xs font-bold text-primary-800">
                                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'sparkles','class' => 'size-3.5 text-primary-600']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'sparkles','class' => 'size-3.5 text-primary-600']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Penawaran Spesial Dealer
                                    </span>
                                    <h2 class="mt-2 text-xl font-extrabold text-slate-900">Promo, Garansi &amp; Keunggulan</h2>
                                </div>
                                <?php if($listing->vehicleDetail->brochure_url): ?>
                                    <a href="<?php echo e($listing->vehicleDetail->brochure_url); ?>" target="_blank" rel="noopener"
                                       class="btn-outline btn-sm !border-primary-300 !text-primary-700 hover:!bg-primary-50 self-start sm:self-auto">
                                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'external','class' => 'size-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'external','class' => 'size-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Unduh E-Brochure PDF
                                    </a>
                                <?php endif; ?>
                            </div>

                            <div class="mt-6 space-y-4 text-xs">
                                <?php if($listing->vehicleDetail->promo_package): ?>
                                    <div class="rounded-2xl bg-white p-4 sm:p-5 border border-primary-100 shadow-xs">
                                        <p class="font-extrabold text-slate-900 text-sm flex items-center gap-2">
                                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'wallet','class' => 'size-4.5 text-primary-700']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'wallet','class' => 'size-4.5 text-primary-700']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Paket Promo Kredit &amp; DP Ringan
                                        </p>
                                        <p class="mt-2 text-slate-700 leading-relaxed whitespace-pre-line"><?php echo e($listing->vehicleDetail->promo_package); ?></p>
                                    </div>
                                <?php endif; ?>

                                <?php if($listing->vehicleDetail->warranty_info): ?>
                                    <div class="rounded-2xl bg-white p-4 sm:p-5 border border-primary-100 shadow-xs">
                                        <p class="font-extrabold text-slate-900 text-sm flex items-center gap-2">
                                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'shield','class' => 'size-4.5 text-emerald-600']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'shield','class' => 'size-4.5 text-emerald-600']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Garansi &amp; Layanan Purna Jual Resmi
                                        </p>
                                        <p class="mt-2 text-slate-700 leading-relaxed"><?php echo e($listing->vehicleDetail->warranty_info); ?></p>
                                    </div>
                                <?php endif; ?>

                                <?php if($listing->vehicleDetail->color_options): ?>
                                    <div class="rounded-2xl bg-white p-4 sm:p-5 border border-primary-100 shadow-xs">
                                        <p class="font-extrabold text-slate-900 text-sm flex items-center gap-2">
                                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'palette','class' => 'size-4.5 text-amber-600']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'palette','class' => 'size-4.5 text-amber-600']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Pilihan Warna Tersedia
                                        </p>
                                        <p class="mt-2 text-slate-700 leading-relaxed"><?php echo e($listing->vehicleDetail->color_options); ?></p>
                                    </div>
                                <?php endif; ?>

                                <?php if($listing->vehicleDetail->bonus_accessories): ?>
                                    <div class="rounded-2xl bg-white p-4 sm:p-5 border border-primary-100 shadow-xs">
                                        <p class="font-extrabold text-slate-900 text-sm flex items-center gap-2">
                                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'sparkles','class' => 'size-4.5 text-primary-600']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'sparkles','class' => 'size-4.5 text-primary-600']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Bonus Pembelian &amp; Aksesoris Tambahan
                                        </p>
                                        <p class="mt-2 text-slate-700 leading-relaxed whitespace-pre-line"><?php echo e($listing->vehicleDetail->bonus_accessories); ?></p>
                                    </div>
                                <?php endif; ?>

                                <?php if(!empty($listing->vehicleDetail->honda_features)): ?>
                                    <div class="mt-6 border-t border-primary-100 pt-5">
                                        <p class="font-extrabold text-slate-900 text-sm mb-3">Fitur Keselamatan &amp; Honda Sensing</p>
                                        <div class="flex flex-wrap gap-2">
                                            <?php $__currentLoopData = $listing->vehicleDetail->honda_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="inline-flex items-center gap-1.5 rounded-xl border border-primary-200 bg-white px-3 py-1.5 text-xs font-bold text-primary-900 shadow-2xs">
                                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check','class' => 'size-3.5 text-primary-600']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check','class' => 'size-3.5 text-primary-600']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> <?php echo e($hf); ?>

                                                </span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            
            <aside class="space-y-5 lg:sticky lg:top-24 lg:self-start">
                <div class="rounded-3xl border border-slate-200 bg-white shadow-md overflow-hidden">
                    
                    <div class="relative overflow-hidden bg-charcoal-900 p-6 text-white">
                        <div class="absolute -right-10 -top-10 size-32 rounded-full bg-primary-600/20 blur-xl"></div>
                        <p class="text-[11px] font-bold uppercase tracking-wider text-primary-300">Harga Penawaran</p>
                        <p class="mt-1.5 text-3xl sm:text-4xl font-black tracking-tight text-white">
                            Rp <?php echo e(number_format((float) $listing->price, 0, ',', '.')); ?>

                        </p>
                        <?php if($listing->isVehicle()): ?>
                            <p class="mt-2 text-xs font-medium text-slate-300">
                                <?php echo e($listing->vehicleDetail->condition_label); ?> &bull; <?php echo e($listing->vehicleDetail->brand); ?> <?php echo e($listing->vehicleDetail->model); ?>

                            </p>
                        <?php else: ?>
                            <p class="mt-2 text-xs font-medium text-slate-300">
                                <?php echo e($listing->propertyDetail->certificate ?? 'Sertifikat Aman'); ?> &bull; <?php echo e($listing->location_label); ?>

                            </p>
                        <?php endif; ?>
                    </div>

                    <div class="p-6 space-y-6">
                        
                        <div class="flex items-center gap-3.5 rounded-2xl bg-slate-50 p-4 border border-slate-100">
                            <span class="grid size-12 shrink-0 place-items-center overflow-hidden rounded-2xl bg-primary-700 text-lg font-bold text-white shadow-xs">
                                <?php if($listing->user->avatar): ?>
                                    <img src="<?php echo e(Storage::disk('public')->url($listing->user->avatar)); ?>" alt="" class="size-full object-cover">
                                <?php else: ?>
                                    <?php echo e(strtoupper(substr($listing->user->name, 0, 1))); ?>

                                <?php endif; ?>
                            </span>
                            <div class="min-w-0 flex-1">
                                <div class="flex items-center gap-1.5">
                                    <p class="truncate text-sm font-extrabold text-slate-900"><?php echo e($listing->user->name); ?></p>
                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check-badge','class' => 'size-4 text-primary-600 shrink-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check-badge','class' => 'size-4 text-primary-600 shrink-0']); ?>
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
                                </div>
                                <p class="text-xs text-slate-500">Penjual / Admin Terverifikasi</p>
                                <p class="mt-0.5 text-[11px] font-semibold text-emerald-600 flex items-center gap-1">
                                    <span class="size-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Respon Cepat
                                </p>
                            </div>
                        </div>

                        
                        <div class="space-y-3">
                            <?php if($waUrl): ?>
                                <a href="<?php echo e($waUrl); ?>"
                                   target="_blank" rel="noopener"
                                   class="group flex items-center justify-center gap-3 w-full rounded-2xl bg-[#25D366] hover:bg-[#1EBE5D] p-4 text-white font-extrabold shadow-lg shadow-[#25D366]/20 transition-all hover:scale-[1.02] text-center">
                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'whatsapp','class' => 'size-6 text-white group-hover:rotate-12 transition-transform']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'whatsapp','class' => 'size-6 text-white group-hover:rotate-12 transition-transform']); ?>
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
                                    <div class="text-left">
                                        <p class="text-sm leading-tight">Chat WhatsApp Penjual</p>
                                        <p class="text-[11px] font-normal text-white/90">Tanya unit, nego &amp; cek jadwal</p>
                                    </div>
                                </a>
                            <?php endif; ?>

                            <?php if($listing->user->phone): ?>
                                <a href="tel:<?php echo e($listing->user->phone); ?>" class="flex items-center justify-center gap-2.5 w-full rounded-2xl border border-slate-200 bg-white py-3 px-4 text-xs font-bold text-slate-700 hover:bg-slate-50 hover:border-slate-300 transition">
                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'phone','class' => 'size-4 text-primary-700']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'phone','class' => 'size-4 text-primary-700']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Hubungi Telepon: <?php echo e($listing->user->phone); ?>

                                </a>
                            <?php endif; ?>
                        </div>



                        
                        <div class="rounded-2xl bg-primary-50/60 p-3.5 text-center border border-primary-100">
                            <p class="text-[11px] font-bold text-primary-900 flex items-center justify-center gap-1.5">
                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'shield','class' => 'size-3.5 text-primary-700']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'shield','class' => 'size-3.5 text-primary-700']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Transaksi Aman &amp; Terverifikasi
                            </p>
                            <p class="mt-0.5 text-[10px] text-slate-500">Bebas penipuan &bull; Hubungi langsung penjual resmi</p>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </section>

    
    <?php if($related->isNotEmpty()): ?>
        <section class="border-t border-slate-200 bg-slate-50/50 py-12 pb-24 lg:pb-12">
            <div class="container-app">
                <?php if (isset($component)) { $__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-title','data' => ['eyebrow' => 'Rekomendasi Lainnya','title' => 'Listing Serupa yang Mungkin Anda Sukai','description' => 'Pilihan alternatif terbaik dengan kategori dan kriteria sejenis.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['eyebrow' => 'Rekomendasi Lainnya','title' => 'Listing Serupa yang Mungkin Anda Sukai','description' => 'Pilihan alternatif terbaik dengan kategori dan kriteria sejenis.']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78)): ?>
<?php $attributes = $__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78; ?>
<?php unset($__attributesOriginal6a0a1523cc2edf33c83fe20a5d1f7f78); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78)): ?>
<?php $component = $__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78; ?>
<?php unset($__componentOriginal6a0a1523cc2edf33c83fe20a5d1f7f78); ?>
<?php endif; ?>
                <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginal31ec1dc5dadb4835ef50de3d88e519ce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal31ec1dc5dadb4835ef50de3d88e519ce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.listing-card','data' => ['listing' => $item]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('listing-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['listing' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal31ec1dc5dadb4835ef50de3d88e519ce)): ?>
<?php $attributes = $__attributesOriginal31ec1dc5dadb4835ef50de3d88e519ce; ?>
<?php unset($__attributesOriginal31ec1dc5dadb4835ef50de3d88e519ce); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal31ec1dc5dadb4835ef50de3d88e519ce)): ?>
<?php $component = $__componentOriginal31ec1dc5dadb4835ef50de3d88e519ce; ?>
<?php unset($__componentOriginal31ec1dc5dadb4835ef50de3d88e519ce); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php else: ?>
        <div class="h-20 lg:hidden"></div>
    <?php endif; ?>

    
    <div class="fixed bottom-0 inset-x-0 z-40 border-t border-slate-200 bg-white/95 backdrop-blur-md p-3 shadow-2xl lg:hidden">
        <div class="container-app flex items-center justify-between gap-3">
            <div class="min-w-0 flex-1">
                <p class="text-[11px] font-medium text-slate-500 truncate"><?php echo e($listing->title); ?></p>
                <p class="text-base font-extrabold text-charcoal-900 leading-tight">Rp <?php echo e(number_format((float) $listing->price, 0, ',', '.')); ?></p>
            </div>
            <div class="flex items-center gap-2 shrink-0">
                <button type="button"
                        onclick="window.dispatchEvent(new CustomEvent('open-share-modal'))"
                        class="grid size-10 place-items-center rounded-xl border border-slate-200 bg-white text-slate-700 shadow-xs active:scale-95"
                        title="Bagikan">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'share','class' => 'size-4 text-slate-600']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'share','class' => 'size-4 text-slate-600']); ?>
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
                </button>
                <?php if($waUrl): ?>
                    <a href="<?php echo e($waUrl); ?>" target="_blank" rel="noopener"
                       class="flex items-center gap-2 rounded-xl bg-[#25D366] hover:bg-[#1EBE5D] py-2.5 px-4 text-xs font-extrabold text-white shadow-md">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'whatsapp','class' => 'size-4 text-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'whatsapp','class' => 'size-4 text-white']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> WhatsApp
                    </a>
                <?php endif; ?>
                <?php if($listing->user->phone): ?>
                    <a href="tel:<?php echo e($listing->user->phone); ?>" class="grid size-10 place-items-center rounded-xl border border-slate-200 bg-white text-slate-700 shadow-xs">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'phone','class' => 'size-4 text-primary-700']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'phone','class' => 'size-4 text-primary-700']); ?>
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
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    
    <div x-data="{
            open: false,
            copied: false,
            url: window.location.href,
            title: '<?php echo e(addslashes($listing->title)); ?>',
            openModal() {
                this.url = window.location.href;
                this.open = true;
            },
            copyLink() {
                const text = this.url;
                if (navigator.clipboard && window.isSecureContext) {
                    navigator.clipboard.writeText(text).then(() => {
                        this.onCopied();
                    }).catch(() => {
                        this.fallbackCopy(text);
                    });
                } else {
                    this.fallbackCopy(text);
                }
            },
            fallbackCopy(text) {
                const ta = document.createElement('textarea');
                ta.value = text;
                ta.style.position = 'fixed';
                ta.style.left = '-9999px';
                ta.style.opacity = '0';
                document.body.appendChild(ta);
                ta.focus();
                ta.select();
                try {
                    document.execCommand('copy');
                    this.onCopied();
                } catch (err) {
                    if (window.__toast) window.__toast('Silakan salin manual tautan di atas', 'info');
                }
                document.body.removeChild(ta);
            },
            onCopied() {
                this.copied = true;
                if (window.__toast) window.__toast('Tautan berhasil disalin ke clipboard!', 'success');
                setTimeout(() => this.copied = false, 3000);
            }
         }"
         @open-share-modal.window="open = true"
         x-show="open"
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs">

        <div @click.outside="open = false"
             x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95 translate-y-2"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-2"
             class="w-full max-w-md overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl">

            
            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-4">
                <div class="flex items-center gap-2.5">
                    <span class="grid size-9 place-items-center rounded-xl bg-primary-50 text-primary-600">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'share','class' => 'size-4.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'share','class' => 'size-4.5']); ?>
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
                    <h3 class="text-base font-extrabold text-slate-900">Bagikan Listing Ini</h3>
                </div>
                <button type="button" @click="open = false" class="rounded-xl p-1.5 text-slate-400 hover:bg-slate-100 hover:text-slate-700 transition" aria-label="Tutup">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'x','class' => 'size-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'x','class' => 'size-5']); ?>
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
                </button>
            </div>

            <div class="p-6 space-y-5">
                
                <div class="flex items-center gap-3 rounded-2xl border border-slate-100 bg-slate-50/80 p-3">
                    <?php if($listing->primaryImageUrl): ?>
                        <img src="<?php echo e($listing->primaryImageUrl); ?>" alt="<?php echo e($listing->title); ?>" onerror="this.onerror=null;this.src='<?php echo e(asset('images/placeholder.svg')); ?>';" class="size-14 rounded-xl object-cover bg-slate-200 shrink-0">
                    <?php else: ?>
                        <div class="size-14 rounded-xl bg-slate-200 grid place-items-center shrink-0">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'image','class' => 'size-6 text-slate-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'image','class' => 'size-6 text-slate-400']); ?>
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
                        </div>
                    <?php endif; ?>
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-xs font-bold text-slate-900"><?php echo e($listing->title); ?></p>
                        <p class="text-xs font-extrabold text-primary-600 mt-0.5">Rp <?php echo e(number_format((float) $listing->price, 0, ',', '.')); ?></p>
                    </div>
                </div>

                
                <div>
                    <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-3">Pilih Media Sosial:</p>
                    <div class="grid grid-cols-4 gap-2.5 text-center">
                        
                        <a :href="'https://api.whatsapp.com/send?text=' + encodeURIComponent('Lihat listing ' + title + ' di SYARVA: ' + url)"
                           target="_blank" rel="noopener"
                           class="flex flex-col items-center justify-center gap-1.5 rounded-2xl border border-emerald-100 bg-emerald-50/60 p-3 text-emerald-700 hover:bg-emerald-100 hover:scale-105 transition shadow-xs">
                            <span class="grid size-10 place-items-center rounded-xl bg-[#25D366] text-white shadow-xs">
                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'whatsapp','class' => 'size-5.5 text-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'whatsapp','class' => 'size-5.5 text-white']); ?>
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
                            <span class="text-[11px] font-bold">WhatsApp</span>
                        </a>

                        
                        <a :href="'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url)"
                           target="_blank" rel="noopener"
                           class="flex flex-col items-center justify-center gap-1.5 rounded-2xl border border-blue-100 bg-blue-50/60 p-3 text-blue-700 hover:bg-blue-100 hover:scale-105 transition shadow-xs">
                            <span class="grid size-10 place-items-center rounded-xl bg-[#1877F2] text-white shadow-xs">
                                <svg viewBox="0 0 24 24" class="size-5 fill-current"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </span>
                            <span class="text-[11px] font-bold">Facebook</span>
                        </a>

                        
                        <a :href="'https://t.me/share/url?url=' + encodeURIComponent(url) + '&text=' + encodeURIComponent(title)"
                           target="_blank" rel="noopener"
                           class="flex flex-col items-center justify-center gap-1.5 rounded-2xl border border-sky-100 bg-sky-50/60 p-3 text-sky-700 hover:bg-sky-100 hover:scale-105 transition shadow-xs">
                            <span class="grid size-10 place-items-center rounded-xl bg-[#229ED9] text-white shadow-xs">
                                <svg viewBox="0 0 24 24" class="size-5 fill-current"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.121l-6.871 4.326-2.962-.924c-.643-.204-.657-.643.136-.953l11.57-4.461c.537-.194 1.006.131.832.942z"/></svg>
                            </span>
                            <span class="text-[11px] font-bold">Telegram</span>
                        </a>

                        
                        <a :href="'https://twitter.com/intent/tweet?text=' + encodeURIComponent(title) + '&url=' + encodeURIComponent(url)"
                           target="_blank" rel="noopener"
                           class="flex flex-col items-center justify-center gap-1.5 rounded-2xl border border-slate-200 bg-slate-50/60 p-3 text-slate-700 hover:bg-slate-100 hover:scale-105 transition shadow-xs">
                            <span class="grid size-10 place-items-center rounded-xl bg-slate-900 text-white shadow-xs">
                                <svg viewBox="0 0 24 24" class="size-4.5 fill-current"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </span>
                            <span class="text-[11px] font-bold">Twitter (X)</span>
                        </a>
                    </div>
                </div>

                
                <div>
                    <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-2">Atau Salin Tautan:</p>
                    <div class="flex items-center gap-2 rounded-2xl border border-slate-200 bg-slate-50 p-1.5 pl-3.5 focus-within:border-primary-500 focus-within:bg-white focus-within:ring-1 focus-within:ring-primary-500 transition">
                        <input type="text" readonly :value="url" class="min-w-0 flex-1 bg-transparent text-xs text-slate-600 focus:outline-none select-all font-mono truncate">
                        <button type="button"
                                @click="copyLink()"
                                class="inline-flex items-center gap-1.5 rounded-xl px-4 py-2 text-xs font-extrabold text-white transition active:scale-95 shadow-xs shrink-0"
                                :class="copied ? 'bg-emerald-600 hover:bg-emerald-700' : 'bg-primary-700 hover:bg-primary-800'">
                            <template x-if="!copied">
                                <span class="inline-flex items-center gap-1">
                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'copy','class' => 'size-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'copy','class' => 'size-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Salin
                                </span>
                            </template>
                            <template x-if="copied">
                                <span class="inline-flex items-center gap-1">
                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check','class' => 'size-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check','class' => 'size-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Tersalin!
                                </span>
                            </template>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?><?php /**PATH D:\SYARVA\resources\views\listings\show.blade.php ENDPATH**/ ?>