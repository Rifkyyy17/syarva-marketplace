<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['filters' => [], 'category' => null, 'brands' => collect(), 'cities' => collect(), 'compact' => false]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['filters' => [], 'category' => null, 'brands' => collect(), 'cities' => collect(), 'compact' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="space-y-5">
    <div>
        <label for="q" class="label">Kata Kunci</label>
        <div class="relative">
            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'search','class' => 'pointer-events-none absolute left-3.5 top-1/2 size-4 -translate-y-1/2 text-slate-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'search','class' => 'pointer-events-none absolute left-3.5 top-1/2 size-4 -translate-y-1/2 text-slate-400']); ?>
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
            <input type="search" id="q" name="q" value="<?php echo e($filters['q'] ?? ''); ?>" placeholder="Nama, lokasi..." class="input pl-10!">
        </div>
    </div>

    <div>
        <label for="min_price" class="label">Rentang Harga (Rp)</label>
        <div class="flex items-center gap-2">
            <input type="number" id="min_price" name="min_price" min="0" step="100000" value="<?php echo e($filters['min_price'] ?? ''); ?>" placeholder="Min" class="input">
            <span class="text-slate-400">-</span>
            <input type="number" id="max_price" name="max_price" min="0" step="100000" value="<?php echo e($filters['max_price'] ?? ''); ?>" placeholder="Maks" class="input">
        </div>
    </div>

    <div>
        <label for="city_id" class="label">Lokasi</label>
        <select id="city_id" name="city_id" class="input">
            <option value="">Semua Kota</option>
            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($city->id); ?>" <?php if((string) ($filters['city_id'] ?? '') === (string) $city->id): echo 'selected'; endif; ?>><?php echo e($city->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <?php if(! $category || $category->isProperty()): ?>
        <div>
            <label for="min_land_area" class="label">Luas Tanah (m²)</label>
            <div class="flex items-center gap-2">
                <input type="number" id="min_land_area" name="min_land_area" min="0" value="<?php echo e($filters['min_land_area'] ?? ''); ?>" placeholder="Min" class="input">
                <span class="text-slate-400">-</span>
                <input type="number" id="max_land_area" name="max_land_area" min="0" value="<?php echo e($filters['max_land_area'] ?? ''); ?>" placeholder="Maks" class="input">
            </div>
        </div>

        <div>
            <label for="min_building_area" class="label">Luas Bangunan (m²)</label>
            <input type="number" id="min_building_area" name="min_building_area" min="0" value="<?php echo e($filters['min_building_area'] ?? ''); ?>" placeholder="Minimal" class="input">
        </div>

        <?php if(! $category || $category->slug === 'rumah'): ?>
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label for="bedrooms" class="label">Kamar Tidur</label>
                    <select id="bedrooms" name="bedrooms" class="input">
                        <option value="">Berapa saja</option>
                        <?php $__currentLoopData = [1, 2, 3, 4, 5, 6]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($n); ?>" <?php if((string) ($filters['bedrooms'] ?? '') === (string) $n): echo 'selected'; endif; ?>><?php echo e($n); ?>+ kamar</option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div>
                    <label for="bathrooms" class="label">Kamar Mandi</label>
                    <select id="bathrooms" name="bathrooms" class="input">
                        <option value="">Berapa saja</option>
                        <?php $__currentLoopData = [1, 2, 3, 4]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($n); ?>" <?php if((string) ($filters['bathrooms'] ?? '') === (string) $n): echo 'selected'; endif; ?>><?php echo e($n); ?>+ kamar</option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        <?php endif; ?>

        <div>
            <label for="certificate" class="label">Sertifikat</label>
            <select id="certificate" name="certificate" class="input">
                <option value="">Semua</option>
                <?php $__currentLoopData = ['SHM', 'SHGB', 'Girik', 'Akta Jual Beli', 'Lainnya']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cert); ?>" <?php if(($filters['certificate'] ?? '') === $cert): echo 'selected'; endif; ?>><?php echo e($cert); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    <?php endif; ?>

    <?php if(! $category || $category->isVehicle()): ?>
        <div class="grid grid-cols-2 gap-2">
            <div>
                <label for="brand" class="label">Merk</label>
                <select id="brand" name="brand" class="input">
                    <option value="">Semua merk</option>
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($brand); ?>" <?php if(($filters['brand'] ?? '') === $brand): echo 'selected'; endif; ?>><?php echo e($brand); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div>
                <label for="model" class="label">Model</label>
                <input type="text" id="model" name="model" value="<?php echo e($filters['model'] ?? ''); ?>" placeholder="cth: Avanza" class="input">
            </div>
        </div>

        <div>
            <label for="min_year" class="label">Tahun</label>
            <div class="flex items-center gap-2">
                <select id="min_year" name="min_year" class="input">
                    <option value="">Dari</option>
                    <?php for($y = now()->year + 1; $y >= 1990; $y--): ?>
                        <option value="<?php echo e($y); ?>" <?php if((string) ($filters['min_year'] ?? '') === (string) $y): echo 'selected'; endif; ?>><?php echo e($y); ?></option>
                    <?php endfor; ?>
                </select>
                <span class="text-slate-400">-</span>
                <select id="max_year" name="max_year" class="input">
                    <option value="">Sampai</option>
                    <?php for($y = now()->year + 1; $y >= 1990; $y--): ?>
                        <option value="<?php echo e($y); ?>" <?php if((string) ($filters['max_year'] ?? '') === (string) $y): echo 'selected'; endif; ?>><?php echo e($y); ?></option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-2">
            <div>
                <label for="transmission" class="label">Transmisi</label>
                <select id="transmission" name="transmission" class="input">
                    <option value="">Semua</option>
                    <?php $__currentLoopData = ['MT', 'AT', 'CVT', 'DCT']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($t); ?>" <?php if(($filters['transmission'] ?? '') === $t): echo 'selected'; endif; ?>><?php echo e($t); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div>
                <label for="fuel_type" class="label">Bahan Bakar</label>
                <select id="fuel_type" name="fuel_type" class="input">
                    <option value="">Semua</option>
                    <?php $__currentLoopData = ['Bensin', 'Diesel', 'Listrik', 'Hybrid']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($f); ?>" <?php if(($filters['fuel_type'] ?? '') === $f): echo 'selected'; endif; ?>><?php echo e($f); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div>
            <label for="condition" class="label">Kondisi</label>
            <div class="grid grid-cols-2 gap-2">
                <label class="flex cursor-pointer items-center gap-2 rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm font-medium text-slate-700 has-checked:border-primary-500 has-checked:bg-primary-50 has-checked:text-primary-800">
                    <input type="radio" name="condition" value="new" class="size-4 accent-primary-600" <?php if(($filters['condition'] ?? '') === 'new'): echo 'checked'; endif; ?>>
                    Baru
                </label>
                <label class="flex cursor-pointer items-center gap-2 rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm font-medium text-slate-700 has-checked:border-primary-500 has-checked:bg-primary-50 has-checked:text-primary-800">
                    <input type="radio" name="condition" value="used" class="size-4 accent-primary-600" <?php if(($filters['condition'] ?? '') === 'used'): echo 'checked'; endif; ?>>
                    Bekas
                </label>
            </div>
        </div>
    <?php endif; ?>

    <div class="flex gap-2 pt-1">
        <button type="submit" class="btn-primary flex-1">
            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'filter','class' => 'size-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'filter','class' => 'size-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Terapkan Filter
        </button>
        <a href="<?php echo e(request()->url()); ?>" class="btn-outline" title="Reset filter">
            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'refresh','class' => 'size-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'refresh','class' => 'size-4']); ?>
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
    </div>
</div><?php /**PATH D:\SYARVA\resources\views\components\filter-form.blade.php ENDPATH**/ ?>