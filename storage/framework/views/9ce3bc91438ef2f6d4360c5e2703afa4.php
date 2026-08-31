<?php
    $whatsappNumber = \App\Models\Setting::get('contact_whatsapp', '6281234567890');
?>

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
     <?php $__env->slot('title', null, []); ?> Konsultasi Properti — Jual & Beli Rumah <?php $__env->endSlot(); ?>
     <?php $__env->slot('description', null, []); ?> Layanan konsultasi properti: titip jual atau cari rumah impian Anda. <?php $__env->endSlot(); ?>

    <section class="bg-charcoal-900 py-12">
        <div class="container-app text-center">
            <span class="inline-flex items-center gap-2 rounded-full border border-emerald-500/30 bg-emerald-500/10 px-4 py-1.5 text-xs font-semibold text-emerald-300">
                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'building','class' => 'size-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'building','class' => 'size-3.5']); ?>
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
                Property Service
            </span>
            <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">Konsultasi Properti</h1>
            <p class="mt-3 text-sm text-white/60">Titip jual properti atau cari rumah impian Anda. Kami bantu prosesnya.</p>
        </div>
    </section>

    <section class="container-app -mt-6 pb-16">
        <div class="mx-auto max-w-2xl">
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-lg sm:p-8"
                 x-data="propertyForm()" x-init="init()">

                <div class="flex gap-2 rounded-xl bg-gray-100 p-1">
                    <button type="button" @click="mode = 'jual'"
                            :class="mode === 'jual' ? 'bg-emerald-600 text-white shadow' : 'text-charcoal-600 hover:text-charcoal-900'"
                            class="flex-1 rounded-lg py-2.5 text-sm font-semibold transition-all">
                        Titip Jual Properti
                    </button>
                    <button type="button" @click="mode = 'beli'"
                            :class="mode === 'beli' ? 'bg-emerald-600 text-white shadow' : 'text-charcoal-600 hover:text-charcoal-900'"
                            class="flex-1 rounded-lg py-2.5 text-sm font-semibold transition-all">
                        Cari / Beli Rumah
                    </button>
                </div>

                <form @submit.prevent="submit()" class="mt-6 space-y-5">
                    <div>
                        <label class="label">Kategori Layanan</label>
                        <input type="text" :value="mode === 'jual' ? 'Titip Jual Properti' : 'Cari / Beli Rumah'" class="input bg-gray-50" readonly>
                    </div>

                    <div>
                        <label class="label">Lokasi / Area Target <span class="text-red-500">*</span></label>
                        <input type="text" x-model="form.location" class="input" placeholder="Contoh: Bogor Kota, Cibinong, Depok" required>
                    </div>

                    <div>
                        <label class="label">Tipe Properti <span class="text-red-500">*</span></label>
                        <div class="flex flex-wrap gap-2">
                            <template x-for="type in ['Rumah Tinggal', 'Ruko', 'Tanah', 'Apartemen']">
                                <button type="button" @click="form.property_type = type"
                                        :class="form.property_type === type ? 'bg-emerald-600 text-white border-emerald-600' : 'bg-white text-charcoal-700 border-gray-300 hover:border-emerald-400'"
                                        class="rounded-full border px-4 py-2 text-xs font-semibold transition-all"
                                        x-text="type">
                                </button>
                            </template>
                        </div>
                    </div>

                    <div>
                        <label class="label">Estimasi Budget / Harga <span class="text-red-500">*</span></label>
                        <input type="text" x-model="form.budget" class="input" placeholder="Contoh: Rp 600 Juta - 1 Miliar" required>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <div>
                            <label class="label">LT (m²)</label>
                            <input type="number" x-model="form.land_area" class="input" placeholder="120">
                        </div>
                        <div>
                            <label class="label">LB (m²)</label>
                            <input type="number" x-model="form.building_area" class="input" placeholder="90">
                        </div>
                        <div>
                            <label class="label">Kamar</label>
                            <input type="number" x-model="form.bedrooms" class="input" placeholder="3">
                        </div>
                    </div>

                    <div>
                        <label class="label">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" x-model="form.name" class="input" placeholder="Nama Anda" required>
                    </div>

                    <button type="submit" class="btn-whatsapp w-full py-3 text-base font-bold" :disabled="!isFormValid">
                        <svg viewBox="0 0 24 24" class="size-5" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        <span x-text="mode === 'jual' ? 'Kirim Data Properti ke WhatsApp' : 'Konsultasi Properti via WhatsApp'"></span>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <?php $__env->startPush('scripts'); ?>
    <script>
        function propertyForm() {
            return {
                mode: 'jual',
                form: {
                    location: '',
                    property_type: 'Rumah Tinggal',
                    budget: '',
                    land_area: '',
                    building_area: '',
                    bedrooms: '',
                    name: '',
                },
                init() {},

                get isFormValid() {
                    return this.form.location && this.form.property_type && this.form.budget && this.form.name;
                },

                submit() {
                    if (!this.isFormValid) return;

                    const wa = '<?php echo e($whatsappNumber); ?>';
                    const specs = [];
                    if (this.form.land_area) specs.push(`LT ${this.form.land_area} m²`);
                    if (this.form.building_area) specs.push(`LB ${this.form.building_area} m²`);
                    if (this.form.bedrooms) specs.push(`${this.form.bedrooms} Kamar Tidur`);
                    const specsStr = specs.length ? specs.join(', ') : '-';

                    const modeLabel = this.mode === 'jual' ? 'Jual Rumah' : 'Beli Rumah';
                    const text = `Halo Shara, saya ingin konsultasi layanan properti:\n• Kategori : ${modeLabel}\n• Lokasi / Area : ${this.form.location}\n• Tipe Properti : ${this.form.property_type}\n• Budget / Harga : ${this.form.budget}\n• Spesifikasi : ${specsStr}\n• Nama : ${this.form.name}\n\nMohon bantuannya untuk info lebih lanjut. Terima kasih!`;

                    window.open(`https://wa.me/${wa}?text=${encodeURIComponent(text)}`, '_blank');
                },
            };
        }
    </script>
    <?php $__env->stopPush(); ?>
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
<?php /**PATH D:\SYARVA\resources\views\pages\properti.blade.php ENDPATH**/ ?>