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
     <?php $__env->slot('title', null, []); ?> Tentang Kami <?php $__env->endSlot(); ?>
     <?php $__env->slot('description', null, []); ?> Kenali lebih dekat SYARVA Marketplace — platform ekosistem jual beli properti dan otomotif terpercaya di Indonesia. <?php $__env->endSlot(); ?>

    <?php
        $siteName = \App\Models\Setting::get('site_name', 'SYARVA Marketplace');
        $whatsapp = \App\Models\Setting::get('contact_whatsapp', '6281234567890');
    ?>

    
    <section class="relative overflow-hidden bg-charcoal-900 py-16 sm:py-24 text-white">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -left-32 -top-32 size-96 rounded-full bg-primary-600/20 blur-3xl"></div>
            <div class="absolute -bottom-40 right-0 size-[28rem] rounded-full bg-primary-700/15 blur-3xl"></div>
        </div>

        <div class="container-app relative text-center">
            <div class="inline-flex items-center gap-2 rounded-full border border-primary-400/30 bg-primary-500/10 px-4 py-1.5 text-xs font-semibold text-primary-200 mb-6">
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
                Mengenal Ekosistem SYARVA
            </div>
            <h1 class="text-3xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl text-white">
                Platform Properti &amp; Otomotif <br class="hidden sm:block"/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent-400 via-primary-300 to-primary-100">Masa Depan Indonesia</span>
            </h1>
            <p class="mx-auto mt-6 max-w-2xl text-sm leading-relaxed text-slate-300 sm:text-base">
                <?php echo e($siteName); ?> hadir merevolusi cara masyarakat mencari hunian impian dan kendaraan berkualitas. Menggabungkan transparansi data, kecerdasan buatan (AI), serta transaksi langsung tanpa hambatan.
            </p>

            
            <div class="mt-12 grid grid-cols-2 gap-4 sm:grid-cols-4 max-w-4xl mx-auto">
                <div class="rounded-2xl border border-white/10 bg-white/5 p-4 sm:p-6 backdrop-blur-md">
                    <p class="text-2xl sm:text-3xl font-black text-accent-400">100%</p>
                    <p class="mt-1 text-xs font-medium text-slate-300">Listing Terverifikasi</p>
                </div>
                <div class="rounded-2xl border border-white/10 bg-white/5 p-4 sm:p-6 backdrop-blur-md">
                    <p class="text-2xl sm:text-3xl font-black text-white">Spesialis</p>
                    <p class="mt-1 text-xs font-medium text-slate-300">Honda &amp; Properti</p>
                </div>
                <div class="rounded-2xl border border-white/10 bg-white/5 p-4 sm:p-6 backdrop-blur-md">
                    <p class="text-2xl sm:text-3xl font-black text-accent-400">24/7</p>
                    <p class="mt-1 text-xs font-medium text-slate-300">AI Assistant Cerdas</p>
                </div>
                <div class="rounded-2xl border border-white/10 bg-white/5 p-4 sm:p-6 backdrop-blur-md">
                    <p class="text-2xl sm:text-3xl font-black text-white">Direct</p>
                    <p class="mt-1 text-xs font-medium text-slate-300">WhatsApp Deal Maker</p>
                </div>
            </div>
        </div>
    </section>

    
    <section class="container-app py-16 sm:py-20">
        <div class="grid items-center gap-12 lg:grid-cols-2">
            <div>
                <span class="inline-block text-xs font-bold uppercase tracking-widest text-primary-700 bg-primary-50 px-3 py-1 rounded-full mb-3">
                    Cerita &amp; Komitmen Kami
                </span>
                <h2 class="text-2xl font-extrabold tracking-tight text-charcoal-900 sm:text-4xl leading-snug">
                    Menghadirkan Kemudahan Transaksi Properti &amp; Mobil Dalam Satu Genggaman
                </h2>
                <div class="mt-6 space-y-4 text-sm leading-relaxed text-slate-600">
                    <p>
                        Berangkat dari tantangan pencarian properti dan kendaraan yang seringkali memakan waktu, membingungkan, dan berisiko informasi fiktif, <strong><?php echo e($siteName); ?></strong> didirikan dengan satu tujuan utama: <em>menciptakan ruang transaksi yang aman, jelas, dan serba cepat</em>.
                    </p>
                    <p>
                        Kami memadukan katalog unit resmi dealer Honda (mobil baru dan second bergaransi) dengan listing properti pilihan (rumah tinggal, kavling tanah, ruko, dan villa). Dilengkapi asisten virtual berbasis LLM Google Gemini yang siap membantu Anda 24 jam.
                    </p>
                </div>

                <div class="mt-8 flex flex-wrap gap-4">
                    <div class="flex items-center gap-3">
                        <span class="grid size-10 place-items-center rounded-xl bg-primary-100 text-primary-700">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check-badge','class' => 'size-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check-badge','class' => 'size-5']); ?>
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
                            <h4 class="text-xs font-bold text-slate-900">Legalitas &amp; Dokumen Aman</h4>
                            <p class="text-[11px] text-slate-500">Pengecekan sertifikat SHM &amp; faktur resmi</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="grid size-10 place-items-center rounded-xl bg-emerald-100 text-emerald-700">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'shield','class' => 'size-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'shield','class' => 'size-5']); ?>
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
                            <h4 class="text-xs font-bold text-slate-900">Bebas Biaya Tersembunyi</h4>
                            <p class="text-[11px] text-slate-500">Transparansi harga OTR &amp; simulasi DP</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 sm:gap-6">
                <div class="space-y-4">
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm hover:border-primary-300 transition-all">
                        <span class="grid size-12 place-items-center rounded-2xl bg-primary-50 text-primary-700">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'car-front','class' => 'size-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'car-front','class' => 'size-6']); ?>
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
                        <h3 class="mt-4 text-base font-bold text-slate-900">Katalog Honda Resmi</h3>
                        <p class="mt-1 text-xs leading-relaxed text-slate-500">Akses unit Honda terbaru (Brio, HR-V, CR-V, Civic) dengan promo DP murah dan cashback dealer.</p>
                    </div>

                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm hover:border-primary-300 transition-all">
                        <span class="grid size-12 place-items-center rounded-xl bg-emerald-50 text-emerald-700">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'building','class' => 'size-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'building','class' => 'size-6']); ?>
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
                        <h3 class="mt-4 text-base font-bold text-slate-900">Konsultasi Properti</h3>
                        <p class="mt-1 text-xs leading-relaxed text-slate-500">Pendampingan titip jual dan pencarian rumah siap huni di lokasi-lokasi strategis.</p>
                    </div>
                </div>

                <div class="space-y-4 pt-6 sm:pt-10">
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm hover:border-primary-300 transition-all">
                        <span class="grid size-12 place-items-center rounded-xl bg-amber-50 text-amber-600">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'car-back','class' => 'size-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'car-back','class' => 'size-6']); ?>
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
                        <h3 class="mt-4 text-base font-bold text-slate-900">Taksasi Mobil Bekas</h3>
                        <p class="mt-1 text-xs leading-relaxed text-slate-500">Layanan taksasi harga pasar yang objektif untuk tukar tambah atau jual cepat multi-merek.</p>
                    </div>

                    <div class="rounded-3xl border border-primary-200 bg-gradient-to-br from-primary-50 to-white p-6 shadow-sm hover:border-primary-400 transition-all">
                        <span class="grid size-12 place-items-center rounded-xl bg-primary-700 text-white">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'sparkles','class' => 'size-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'sparkles','class' => 'size-6']); ?>
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
                        <h3 class="mt-4 text-base font-bold text-slate-900">SYARVA AI Assistant</h3>
                        <p class="mt-1 text-xs leading-relaxed text-slate-600">Teknologi pencarian cerdas berbasis LLM untuk rekomendasi unit dan simulasi kredit seketika.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="bg-charcoal-900 py-16 text-white">
        <div class="container-app">
            <div class="mx-auto max-w-3xl text-center">
                <span class="inline-flex items-center gap-2 rounded-full border border-primary-500/30 bg-primary-500/10 px-4 py-1.5 text-xs font-semibold text-primary-300">
                    Fondasi Utama
                </span>
                <h2 class="mt-4 text-2xl font-extrabold tracking-tight sm:text-4xl text-white">Visi &amp; Misi Kami</h2>
                <p class="mt-3 text-sm text-slate-400">Prinsip yang membimbing setiap langkah pengembangan platform <?php echo e($siteName); ?>.</p>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2">
                <div class="rounded-3xl border border-white/10 bg-white/5 p-8 backdrop-blur-md">
                    <div class="flex items-center gap-3">
                        <span class="grid size-10 place-items-center rounded-xl bg-primary-500/20 text-accent-400">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'globe','class' => 'size-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'globe','class' => 'size-5']); ?>
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
                        <h3 class="text-xl font-bold text-white">Visi Kami</h3>
                    </div>
                    <p class="mt-4 text-sm leading-relaxed text-slate-300">
                        Menjadi ekosistem marketplace properti dan otomotif nomor satu di Indonesia yang paling dipercaya, memberikan pengalaman transaksi termudah, tercepat, dan bebas perantara bagi seluruh lapisan masyarakat.
                    </p>
                </div>

                <div class="rounded-3xl border border-white/10 bg-white/5 p-8 backdrop-blur-md">
                    <div class="flex items-center gap-3">
                        <span class="grid size-10 place-items-center rounded-xl bg-emerald-500/20 text-emerald-400">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'shield','class' => 'size-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'shield','class' => 'size-5']); ?>
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
                        <h3 class="text-xl font-bold text-white">Misi Kami</h3>
                    </div>
                    <ul class="mt-4 space-y-2 text-sm text-slate-300">
                        <li class="flex items-start gap-2">
                            <span class="text-accent-400 font-bold">&bull;</span>
                            <span>Menyediakan basis data listing yang terverifikasi, akurat, dan terus diperbarui setiap hari.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-accent-400 font-bold">&bull;</span>
                            <span>Menghadirkan inovasi teknologi AI dan otomasi komunikasi direct WhatsApp untuk kepuasan pengguna.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-accent-400 font-bold">&bull;</span>
                            <span>Memberdayakan agen, dealer resmi, dan penjual individu melalui sistem membership berdaya saing tinggi.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    
    <section class="container-app py-16 sm:py-20">
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-charcoal-900 via-primary-950 to-charcoal-900 px-6 py-12 text-center sm:px-12 shadow-2xl border border-primary-800/40">
            <div class="absolute -right-20 -top-20 size-64 rounded-full bg-primary-600/20 blur-3xl"></div>
            <div class="absolute -left-20 -bottom-20 size-64 rounded-full bg-accent-500/15 blur-3xl"></div>
            
            <h2 class="relative text-2xl font-extrabold tracking-tight text-white sm:text-4xl">
                Siap Menemukan Unit Idaman Anda?
            </h2>
            <p class="relative mx-auto mt-4 max-w-xl text-sm text-slate-300 sm:text-base leading-relaxed">
                Jelajahi ribuan pilihan properti dan mobil Honda terbaik kami atau konsultasikan kebutuhan Anda langsung bersama tim Admin SYARVA.
            </p>
            <div class="relative mt-8 flex flex-col items-center justify-center gap-4 sm:flex-row">
                <a href="<?php echo e(route('listings.index')); ?>" class="btn-primary btn-lg w-full sm:w-auto">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'search','class' => 'size-4.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'search','class' => 'size-4.5']); ?>
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
                    Jelajahi Katalog Listing
                </a>
                <a href="https://wa.me/<?php echo e($whatsapp); ?>?text=<?php echo e(urlencode('Halo Admin SYARVA, saya ingin konsultasi seputar unit listing.')); ?>"
                   target="_blank" rel="noopener" class="btn-whatsapp btn-lg w-full sm:w-auto">
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
<?php endif; ?>
                    Konsultasi via WhatsApp
                </a>
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
<?php endif; ?><?php /**PATH D:\SYARVA\resources\views\pages\about.blade.php ENDPATH**/ ?>