<?php
    $siteName = \App\Models\Setting::get('site_name', 'SYARVA Marketplace');
    $tagline = \App\Models\Setting::get('site_tagline');
    $whatsapp = \App\Models\Setting::get('contact_whatsapp', '6281234567890');
    $social = [
        'facebook' => \App\Models\Setting::get('social_facebook'),
        'instagram' => \App\Models\Setting::get('social_instagram'),
        'twitter' => \App\Models\Setting::get('social_twitter'),
        'youtube' => \App\Models\Setting::get('social_youtube'),
    ];
    $contact = [
        'phone' => \App\Models\Setting::get('contact_phone'),
        'email' => \App\Models\Setting::get('contact_email'),
        'address' => \App\Models\Setting::get('contact_address'),
    ];
?>

<footer class="mt-auto">
    <div class="bg-charcoal-900">
        <div class="container-app py-8">
            <div class="flex flex-col items-center gap-4 rounded-2xl bg-whatsapp/10 px-6 py-8 text-center sm:flex-row sm:justify-between sm:text-left">
                <div>
                    <h3 class="text-lg font-bold text-white">Butuh Bantuan Langsung?</h3>
                    <p class="mt-1 text-sm text-white/60">Chat WhatsApp Shara untuk konsultasi gratis sekarang juga.</p>
                </div>
                <a href="https://wa.me/<?php echo e($whatsapp); ?>?text=<?php echo e(urlencode('Halo Shara, saya butuh bantuan.')); ?>"
                   target="_blank" rel="noopener"
                   class="btn-whatsapp btn-lg shrink-0">
                    <svg viewBox="0 0 24 24" class="size-5" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Chat WhatsApp
                </a>
            </div>
        </div>

        <div class="container-app grid gap-10 py-12 sm:grid-cols-2 lg:grid-cols-4">
            <div>
                <?php
                    $footerLogo = \App\Models\Setting::get('site_logo');
                ?>
                <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-2.5">
                    <?php if(!empty($footerLogo)): ?>
                        <img src="<?php echo e(Storage::disk('public')->url($footerLogo)); ?>" alt="<?php echo e($siteName); ?>" class="h-9 max-w-[180px] object-contain">
                    <?php else: ?>
                        <span class="grid size-9 place-items-center rounded-lg bg-primary-500 text-white">
                            <svg viewBox="0 0 24 24" class="size-5" fill="currentColor" aria-hidden="true">
                                <path d="M12 2 21 8l-1.6 1.2V21h-5v-6h-4.8v6H4.6V9.2L3 8z"/>
                            </svg>
                        </span>
                        <span class="text-lg font-extrabold tracking-tight text-white"><?php echo e($siteName); ?></span>
                    <?php endif; ?>
                </a>
                <p class="mt-4 text-sm leading-relaxed text-white/50"><?php echo e($tagline); ?></p>
                <div class="mt-5 flex gap-2">
                    <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $network => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($url): ?>
                            <a href="<?php echo e($url); ?>" target="_blank" rel="noopener" aria-label="<?php echo e(ucfirst($network)); ?>"
                               class="grid size-9 place-items-center rounded-lg bg-white/5 text-white/40 transition-all hover:bg-primary-500 hover:text-white">
                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => $network,'class' => 'size-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($network),'class' => 'size-4']); ?>
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div>
                <h3 class="text-xs font-bold uppercase tracking-wider text-white/40">Layanan</h3>
                <ul class="mt-4 space-y-3 text-sm">
                    <li><a href="<?php echo e(route('listings.vehicle', 'baru')); ?>" class="text-white/60 transition-colors hover:text-white">Katalog Honda Baru</a></li>
                    <li><a href="<?php echo e(route('pages.sell-car')); ?>" class="text-white/60 transition-colors hover:text-white">Taksasi Mobil Bekas</a></li>
                    <li><a href="<?php echo e(route('pages.property')); ?>" class="text-white/60 transition-colors hover:text-white">Konsultasi Properti</a></li>
                    <li><a href="<?php echo e(route('listings.property', 'rumah')); ?>" class="text-white/60 transition-colors hover:text-white">Jelajahi Rumah</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-xs font-bold uppercase tracking-wider text-white/40">Perusahaan</h3>
                <ul class="mt-4 space-y-3 text-sm">
                    <li><a href="<?php echo e(route('about')); ?>" class="text-white/60 transition-colors hover:text-white">Tentang Kami</a></li>
                    <li><a href="<?php echo e(route('pages.property')); ?>" class="text-white/60 transition-colors hover:text-white">Titip Jual Properti</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-xs font-bold uppercase tracking-wider text-white/40">Kontak</h3>
                <ul class="mt-4 space-y-3 text-sm text-white/50">
                    <?php if($contact['address']): ?>
                        <li class="flex gap-2.5"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'map-pin','class' => 'mt-0.5 size-4 shrink-0 text-primary-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'map-pin','class' => 'mt-0.5 size-4 shrink-0 text-primary-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> <?php echo e($contact['address']); ?></li>
                    <?php endif; ?>
                    <?php if($contact['phone']): ?>
                        <li class="flex items-center gap-2.5"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'phone','class' => 'size-4 shrink-0 text-primary-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'phone','class' => 'size-4 shrink-0 text-primary-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> <?php echo e($contact['phone']); ?></li>
                    <?php endif; ?>
                    <?php if($contact['email']): ?>
                        <li class="flex items-center gap-2.5"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'mail','class' => 'size-4 shrink-0 text-primary-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'mail','class' => 'size-4 shrink-0 text-primary-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> <?php echo e($contact['email']); ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="bg-charcoal-950">
        <div class="container-app flex flex-col items-center justify-between gap-2 py-5 text-xs text-white/30 sm:flex-row">
            <p>&copy; <?php echo e(date('Y')); ?> <?php echo e($siteName); ?>. Semua hak dilindungi.</p>
            <p>Dibangun dengan teknologi modern &amp; aman.</p>
        </div>
    </div>
</footer>
<?php /**PATH D:\SYARVA\resources\views\components\footer.blade.php ENDPATH**/ ?>