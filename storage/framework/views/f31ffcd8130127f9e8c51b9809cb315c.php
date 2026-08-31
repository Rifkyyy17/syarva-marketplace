<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['listing']));

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

foreach (array_filter((['listing']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $vd = $listing->vehicleDetail;
    $brand = $vd?->brand ?? 'Honda';
    $model = $vd?->model ?? $listing->title;
    $engineCapacity = $vd?->engine_capacity ?: '1.498 cc';
    $transmission = $vd?->transmission ?: 'CVT (Automatic)';
    $year = $vd?->year ?: date('Y');
    $fuel = $vd?->fuel_type ?: 'Bensin (Gasoline)';
?>

<div class="space-y-6">
    
    <div class="overflow-hidden rounded-3xl border border-red-200/30 bg-charcoal-900 text-white shadow-md">
        
        <div class="bg-gradient-to-r from-red-600 to-red-700 px-6 py-3.5 flex flex-wrap items-center justify-between gap-2">
            <div class="flex items-center gap-3">
                <span class="grid size-9 place-items-center rounded-xl bg-white/20 backdrop-blur-md">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'wrench','class' => 'size-5 text-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'wrench','class' => 'size-5 text-white']); ?>
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
                    <h3 class="text-sm sm:text-base font-black uppercase tracking-wider text-white">Paket Hemat+ Honda</h3>
                    <p class="text-[11px] font-medium text-red-100">Perawatan Berkala Bebas Kenaikan Harga &amp; Tetap Prima</p>
                </div>
            </div>
            <span class="rounded-full bg-black/25 px-3 py-1 text-[11px] font-bold text-white backdrop-blur-sm">
                Dealer Resmi Seluruh Indonesia
            </span>
        </div>

        
        <div class="p-5 sm:p-6 grid gap-4 lg:grid-cols-3 items-stretch">
            
            <div class="rounded-2xl border border-white/10 bg-white/5 p-4 sm:p-5 flex flex-col justify-between backdrop-blur-sm hover:border-red-500/40 transition">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="rounded-lg bg-red-600/30 border border-red-500/40 px-2.5 py-0.5 text-[10px] font-extrabold text-red-300 uppercase tracking-wider">
                            Paket Hemat 1
                        </span>
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check-badge','class' => 'size-4 text-accent-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check-badge','class' => 'size-4 text-accent-400']); ?>
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
                    <div class="mt-2">
                        <p class="text-3xl font-black text-white tracking-tight">4 <span class="text-sm font-semibold text-slate-300">Tahun</span></p>
                        <p class="text-xs font-semibold text-accent-300 mt-0.5">atau 50.000 Km</p>
                    </div>
                </div>
                <p class="mt-3 text-[11px] text-slate-400 border-t border-white/10 pt-2.5 leading-relaxed">
                    Gratis biaya jasa &amp; penggantian suku cadang berkala sesuai buku garansi.
                </p>
            </div>

            
            <div class="rounded-2xl border border-white/10 bg-white/5 p-4 sm:p-5 flex flex-col justify-between backdrop-blur-sm hover:border-red-500/40 transition">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="rounded-lg bg-red-600/30 border border-red-500/40 px-2.5 py-0.5 text-[10px] font-extrabold text-red-300 uppercase tracking-wider">
                            Paket Hemat 2
                        </span>
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check-badge','class' => 'size-4 text-accent-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check-badge','class' => 'size-4 text-accent-400']); ?>
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
                    <div class="mt-2">
                        <p class="text-3xl font-black text-white tracking-tight">8 <span class="text-sm font-semibold text-slate-300">Tahun</span></p>
                        <p class="text-xs font-semibold text-accent-300 mt-0.5">atau 100.000 Km</p>
                    </div>
                </div>
                <p class="mt-3 text-[11px] text-slate-400 border-t border-white/10 pt-2.5 leading-relaxed">
                    Perlindungan jangka panjang maksimal dengan efisiensi biaya tertinggi.
                </p>
            </div>

            
            <div class="rounded-2xl border border-white/10 bg-white/5 p-4 sm:p-5 flex flex-col justify-between backdrop-blur-sm">
                <div>
                    <p class="font-extrabold text-white text-xs sm:text-sm flex items-center gap-1.5 text-accent-400 mb-3">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'sparkles','class' => 'size-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'sparkles','class' => 'size-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Mobil Sehat, Hati Tenang:
                    </p>
                    <ul class="space-y-2 text-xs text-slate-300">
                        <li class="flex items-start gap-2">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check','class' => 'size-3.5 text-red-400 shrink-0 mt-0.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check','class' => 'size-3.5 text-red-400 shrink-0 mt-0.5']); ?>
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
                            <span>Biaya perawatan berkala jauh lebih hemat</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check','class' => 'size-3.5 text-red-400 shrink-0 mt-0.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check','class' => 'size-3.5 text-red-400 shrink-0 mt-0.5']); ?>
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
                            <span>Bebas dari risiko kenaikan harga suku cadang</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check','class' => 'size-3.5 text-red-400 shrink-0 mt-0.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check','class' => 'size-3.5 text-red-400 shrink-0 mt-0.5']); ?>
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
                            <span>Dapat dicicil bersama paket kredit mobil</span>
                        </li>
                    </ul>
                </div>
                <div class="mt-3 border-t border-white/10 pt-2.5">
                    <p class="text-[10px] text-slate-400 flex items-center gap-1">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'shield','class' => 'size-3 text-emerald-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'shield','class' => 'size-3 text-emerald-400']); ?>
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
                        Berlaku di seluruh jaringan bengkel resmi Honda
                    </p>
                </div>
            </div>
        </div>
    </div>

    
    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
        
        <div class="flex items-center justify-between bg-charcoal-900 px-6 py-4 text-white border-b-4 border-red-600">
            <div class="flex items-center gap-3">
                <span class="grid size-9 place-items-center rounded-xl bg-red-600 text-white font-black text-sm shadow-md">
                    H
                </span>
                <div>
                    <h2 class="text-base sm:text-lg font-black uppercase tracking-wider text-white">Spesifikasi Lengkap Unit</h2>
                    <p class="text-xs text-slate-400"><?php echo e($brand); ?> <?php echo e($model); ?> &bull; Model Year <?php echo e($year); ?></p>
                </div>
            </div>
            <span class="hidden sm:inline-flex items-center gap-1 rounded-full bg-red-600/20 border border-red-500/30 px-3 py-1 text-xs font-bold text-red-400">
                Official Specifications Table
            </span>
        </div>

        
        <div class="divide-y divide-slate-200">
            
            <div>
                <div class="bg-red-600 px-6 py-2 text-xs font-black uppercase tracking-wider text-white flex items-center justify-between">
                    <span class="flex items-center gap-2"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'gauge','class' => 'size-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'gauge','class' => 'size-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> MESIN (ENGINE)</span>
                    <span class="text-[10px] font-semibold text-red-100">Spesifikasi Teknis</span>
                </div>
                <div class="divide-y divide-slate-100 text-xs">
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Tipe Mesin</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">1.5L DOHC 4 Silinder Segaris, 16 Katup i-VTEC + DBW (Drive By Wire)</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Sistem Suplai Bahan Bakar</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">PGM-FI (Programmed Fuel Injection)</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Diameter x Langkah (mm)</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">73,0 x 89,5 mm</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Isi Silinder / Kapasitas</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900"><?php echo e($engineCapacity); ?></span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Perbandingan Kompresi</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">10,6 : 1</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Daya Maksimum</span>
                        <span class="sm:col-span-2 font-semibold text-red-600 font-extrabold">121 PS / 6.600 rpm</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Momen Puntir Maksimum (Torsi)</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">145 Nm / 4.300 rpm</span>
                    </div>
                </div>
            </div>

            
            <div>
                <div class="bg-red-600 px-6 py-2 text-xs font-black uppercase tracking-wider text-white flex items-center justify-between">
                    <span class="flex items-center gap-2"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'ruler','class' => 'size-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'ruler','class' => 'size-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> DIMENSI &amp; UKURAN (DIMENSIONS)</span>
                    <span class="text-[10px] font-semibold text-red-100">Milimeter (mm)</span>
                </div>
                <div class="divide-y divide-slate-100 text-xs">
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Panjang x Lebar x Tinggi</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">4.060 x 1.780 x 1.608 mm</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Jarak Sumbu Roda (Wheelbase)</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">2.485 mm</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Jarak Pijak Depan / Belakang</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">1.540 mm / 1.540 mm</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Ground Clearance</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">220 mm (High Ground Clearance SUV)</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Kapasitas Tangki Bahan Bakar</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">40 Liter (Bensin Tanpa Timbal)</span>
                    </div>
                </div>
            </div>

            
            <div>
                <div class="bg-red-600 px-6 py-2 text-xs font-black uppercase tracking-wider text-white flex items-center justify-between">
                    <span class="flex items-center gap-2"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'settings','class' => 'size-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'settings','class' => 'size-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> TRANSMISI &amp; KEMUDI</span>
                    <span class="text-[10px] font-semibold text-red-100">Earth Dreams Tech</span>
                </div>
                <div class="divide-y divide-slate-100 text-xs">
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Tipe Transmisi</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900"><?php echo e($transmission); ?> with Earth Dreams Technology</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Sistem Kemudi</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">Electric Power Steering (EPS) + Tilt Steering Wheel</span>
                    </div>
                </div>
            </div>

            
            <div>
                <div class="bg-red-600 px-6 py-2 text-xs font-black uppercase tracking-wider text-white flex items-center justify-between">
                    <span class="flex items-center gap-2"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'car-back','class' => 'size-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'car-back','class' => 'size-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> SISTEM SUSPENSI, PENGEREMAN &amp; BAN</span>
                    <span class="text-[10px] font-semibold text-red-100">Chassis &amp; Wheels</span>
                </div>
                <div class="divide-y divide-slate-100 text-xs">
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Suspensi Depan / Belakang</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">Front: MacPherson Strut &bull; Rear: H-Shape Torsion Beam</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Sistem Pengereman</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">Front: Ventilated Disc &bull; Rear: Drum Brake &bull; ABS + EBD + BA</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Velg &amp; Ukuran Ban</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">17 x 7J Two-Tone Alloy Wheel &bull; Ban 215 / 55 R17</span>
                    </div>
                </div>
            </div>

            
            <div>
                <div class="bg-red-600 px-6 py-2 text-xs font-black uppercase tracking-wider text-white flex items-center justify-between">
                    <span class="flex items-center gap-2"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'sparkles','class' => 'size-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'sparkles','class' => 'size-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> EKSTERIOR &amp; PENCAHAYAAN</span>
                    <span class="text-[10px] font-semibold text-red-100">Exterior Features</span>
                </div>
                <div class="divide-y divide-slate-100 text-xs">
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Lampu Utama (Headlight)</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">Full LED Headlights with LED Daytime Running Light (DRL) + Auto Headlight</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Lampu Kabut &amp; Sein</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">LED Front Fog Lights &bull; Sequential LED Turning Signals</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Spion Samping &amp; Antena</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">Power Retractable Door Mirror with LED Turning Signal (Auto Foldable) &bull; Shark Fin Antenna</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Kamera Parkir Belakang</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">Multi-Angle Rear Parking Camera (Normal, Wide, Top-Down View)</span>
                    </div>
                </div>
            </div>

            
            <div>
                <div class="bg-red-600 px-6 py-2 text-xs font-black uppercase tracking-wider text-white flex items-center justify-between">
                    <span class="flex items-center gap-2"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'home','class' => 'size-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'home','class' => 'size-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> INTERIOR &amp; ENTERTAINMENT</span>
                    <span class="text-[10px] font-semibold text-red-100">Cabin Comfort</span>
                </div>
                <div class="divide-y divide-slate-100 text-xs">
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Engine Start / Ignition</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">Remote Engine Start &bull; One Push Ignition System (Start/Stop Engine)</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Meter Cluster &amp; Display</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">Interactive 4.2" TFT Multi-Information Display (MID)</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Head Unit Audio System</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">7" Advanced Capacitive Touchscreen Display Audio, Apple CarPlay &amp; Android Auto, Bluetooth, Hands-Free Telephone, Voice Command, USB</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Sistem Audio &amp; Kontrol Kemudi</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">6-Speakers (Termasuk 2 Tweeters) &bull; Audio Steering Switch &amp; Hands-Free Telephone Switch</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">AC &amp; Material Jok</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">Auto A/C with Digital Display &bull; Leather-Fabric Combi Upholstery with Red Stitching</span>
                    </div>
                </div>
            </div>

            
            <div>
                <div class="bg-red-600 px-6 py-2 text-xs font-black uppercase tracking-wider text-white flex items-center justify-between">
                    <span class="flex items-center gap-2"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'shield','class' => 'size-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'shield','class' => 'size-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> FITUR KESELAMATAN &amp; HONDA SENSING™</span>
                    <span class="text-[10px] font-semibold text-red-100">Advanced Safety Suite</span>
                </div>
                <div class="divide-y divide-slate-100 text-xs">
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 bg-red-50/50 hover:bg-red-50 transition">
                        <span class="font-extrabold text-red-900">Honda Sensing™ Technology</span>
                        <div class="sm:col-span-2 space-y-1">
                            <span class="font-bold text-red-700 block">Paket Keselamatan Aktif Terlengkap:</span>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-1 text-[11px] text-slate-700 pt-1">
                                <p>&bull; <strong>CMBS™:</strong> Collision Mitigation Brake System</p>
                                <p>&bull; <strong>RDM:</strong> Road Departure Mitigation</p>
                                <p>&bull; <strong>ACC:</strong> Adaptive Cruise Control</p>
                                <p>&bull; <strong>LKAS:</strong> Lane Keeping Assist System</p>
                                <p>&bull; <strong>LCDN:</strong> Lead Car Departure Notification</p>
                                <p>&bull; <strong>AHB:</strong> Auto High-Beam</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Honda LaneWatch™</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">Kamera Blind-Spot Sisi Kiri Terintegrasi Head Unit</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Struktur Rangka &amp; Airbags</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">G-CON + ACE™ with Side Impact Beam &bull; 6 Airbags (Dual Front, Side &amp; Side Curtain)</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Sistem Stabilitas &amp; Pengereman</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">VSA (Vehicle Stability Assist), HSA (Hill Start Assist), ESS (Emergency Stop Signal), BOS (Brake Override System)</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Sabuk Keselamatan &amp; ISOFIX</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">3-Point ELR Seatbelts (Baris 1 &amp; 2) with Pretensioner &amp; Load Limiter &bull; ISOFIX + Tether</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Sensor Parkir &amp; APAR</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">2-Point Rear Parking Sensor &bull; Alat Pemadam Api Ringan (APAR Standar APAR)</span>
                    </div>
                </div>
            </div>

            
            <div>
                <div class="bg-red-600 px-6 py-2 text-xs font-black uppercase tracking-wider text-white flex items-center justify-between">
                    <span class="flex items-center gap-2"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'key','class' => 'size-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'key','class' => 'size-3.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> SISTEM KEAMANAN (SECURITY)</span>
                    <span class="text-[10px] font-semibold text-red-100">Anti-Theft System</span>
                </div>
                <div class="divide-y divide-slate-100 text-xs">
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Kunci &amp; Akses Pintar</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">Smart Key &bull; Keyless Entry &bull; Walk-Away Auto Lock</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 hover:bg-slate-50 transition">
                        <span class="font-bold text-slate-600">Keamanan Otomatis</span>
                        <span class="sm:col-span-2 font-semibold text-slate-900">Auto Lock System by Speed &bull; Rear Seat Reminder &bull; Immobilizer &bull; Security Alarm System</span>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="bg-slate-50 p-4 text-[11px] text-slate-500 italic border-t border-slate-200">
            * Spesifikasi, fitur, dan kelengkapan material dapat berbeda tergantung tipe varian yang dipilih. Hubungi Admin / Konsultan Resmi Honda kami via WhatsApp untuk simulasi kredit, DP ringan, dan jadwal test drive.
        </div>
    </div>
</div>
<?php /**PATH D:\SYARVA\resources\views\components\honda-spec-table.blade.php ENDPATH**/ ?>