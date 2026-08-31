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
     <?php $__env->slot('title', null, []); ?> Paket &amp; Biaya Pasang Iklan <?php $__env->endSlot(); ?>
     <?php $__env->slot('description', null, []); ?> Pilihan paket iklan properti dan otomotif terbaik untuk perorangan, agen profesional, dan dealer resmi. <?php $__env->endSlot(); ?>

    <div class="bg-gradient-to-b from-slate-900 to-slate-800 py-16 sm:py-24 text-white">
        <div class="container-app text-center">
            <span class="inline-flex items-center gap-2 rounded-full border border-primary-400/30 bg-primary-500/10 px-4 py-1.5 text-xs font-semibold text-primary-200">
                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
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
<?php endif; ?>
                Monetisasi &amp; Membership Listing
            </span>
            <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-5xl">
                Tingkatkan Penjualan Anda Bersama <span class="text-accent-400">SYARVA</span>
            </h1>
            <p class="mx-auto mt-4 max-w-2xl text-sm leading-relaxed text-slate-300 sm:text-base">
                Pilih paket iklan yang sesuai dengan kebutuhan bisnis Anda. Jangkau ribuan calon pembeli potensial di seluruh Indonesia dengan fitur premium dan prioritas pencarian.
            </p>
        </div>
    </div>

    <section class="container-app -mt-10 pb-20">
        <div class="grid gap-8 lg:grid-cols-3 items-stretch">
            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="relative flex flex-col justify-between rounded-3xl border bg-white p-8 shadow-xl transition-all duration-300 hover:-translate-y-1.5
                    <?php echo e($plan->is_featured ? 'border-2 border-primary-600 ring-4 ring-primary-100 shadow-primary-900/10' : 'border-slate-200 shadow-slate-200/50'); ?>">

                    <?php if($plan->badge_label): ?>
                        <div class="absolute -top-3.5 right-6">
                            <span class="rounded-full px-3.5 py-1 text-xs font-bold uppercase tracking-wider
                                <?php echo e($plan->is_featured ? 'bg-primary-600 text-white shadow-md' : 'bg-slate-800 text-white'); ?>">
                                <?php echo e($plan->badge_label); ?>

                            </span>
                        </div>
                    <?php endif; ?>

                    <div>
                        <h3 class="text-xl font-bold text-slate-900"><?php echo e($plan->name); ?></h3>
                        <p class="mt-2 min-h-[48px] text-xs leading-relaxed text-slate-500"><?php echo e($plan->description); ?></p>

                        <div class="mt-6 flex items-baseline gap-1 border-y border-slate-100 py-4">
                            <span class="text-3xl font-black tracking-tight text-slate-900"><?php echo e($plan->formatted_price); ?></span>
                            <?php if($plan->price > 0): ?>
                                <span class="text-xs font-medium text-slate-500">/ <?php echo e($plan->duration_days); ?> hari</span>
                            <?php endif; ?>
                        </div>

                        <div class="mt-6 space-y-3.5 text-sm text-slate-700">
                            <p class="font-bold text-xs uppercase tracking-wider text-slate-400">Fitur Termasuk:</p>
                            <?php if(!empty($plan->features)): ?>
                                <?php $__currentLoopData = $plan->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex items-start gap-3">
                                        <span class="grid size-5 shrink-0 place-items-center rounded-full bg-emerald-50 text-emerald-600">
                                            <svg viewBox="0 0 24 24" class="size-3.5" fill="none" stroke="currentColor" stroke-width="3">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                        </span>
                                        <span class="text-xs font-medium leading-tight text-slate-700"><?php echo e($feature); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mt-8 pt-4">
                        <?php
                            $waMsg = 'Halo Admin SYARVA, saya tertarik untuk berlangganan paket *' . $plan->name . '* (' . $plan->formatted_price . '). Mohon informasi cara aktivasi dan pembayarannya.';
                        ?>

                        <?php if($plan->price <= 0): ?>
                            <a href="<?php echo e(route('register')); ?>" class="btn-outline w-full py-3! text-center font-bold">
                                Mulai Pasang Iklan Gratis
                            </a>
                        <?php else: ?>
                            <a href="https://wa.me/<?php echo e($adminWhatsappClean); ?>?text=<?php echo e(urlencode($waMsg)); ?>" target="_blank" rel="noopener"
                               class="btn w-full py-3! text-center font-bold <?php echo e($plan->is_featured ? 'btn-primary' : 'bg-slate-900 text-white hover:bg-slate-800'); ?>">
                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'whatsapp','class' => 'size-4.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'whatsapp','class' => 'size-4.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Beli / Upgrade Paket
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="mt-20 rounded-3xl border border-slate-200 bg-white p-8 sm:p-12 shadow-sm">
            <h2 class="text-center text-2xl font-extrabold text-slate-900">Pertanyaan yang Sering Diajukan (FAQ)</h2>
            <div class="mt-8 grid gap-6 sm:grid-cols-2">
                <div class="rounded-2xl bg-slate-50 p-5">
                    <h3 class="text-sm font-bold text-slate-900">Bagaimana cara aktivasi paket iklan berbayar?</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600">
                        Klik tombol <strong>Beli / Upgrade Paket</strong> pada paket yang Anda inginkan. Anda akan diarahkan ke WhatsApp Admin untuk verifikasi dan aktivasi slot iklan seketika setelah pembayaran.
                    </p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-5">
                    <h3 class="text-sm font-bold text-slate-900">Apa itu fitur Iklan Unggulan (Featured Listing)?</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600">
                        Iklan Unggulan akan diposisikan di baris teratas halaman Beranda dan pencarian dengan badge khusus, memberikan hingga 5x lipat lebih banyak calon pembeli.
                    </p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-5">
                    <h3 class="text-sm font-bold text-slate-900">Apakah saya bisa mengubah detail listing setelah terbit?</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600">
                        Bisa. Anda memiliki kendali penuh melalui Dashboard Penjual untuk mengedit harga, deskripsi, ataupun menambah foto baru kapan saja.
                    </p>
                </div>
                <div class="rounded-2xl bg-slate-50 p-5">
                    <h3 class="text-sm font-bold text-slate-900">Metode pembayaran apa saja yang didukung?</h3>
                    <p class="mt-2 text-xs leading-relaxed text-slate-600">
                        Kami menerima pembayaran melalui Transfer Bank (BCA, Mandiri, BNI, BRI), QRIS, dan e-Wallet (GoPay, OVO, Dana).
                    </p>
                </div>
            </div>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH D:\SYARVA\resources\views\pages\pricing.blade.php ENDPATH**/ ?>