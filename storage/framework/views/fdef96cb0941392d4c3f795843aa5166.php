<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['categories', 'listing' => null]));

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

foreach (array_filter((['categories', 'listing' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>
<?php
    $categoryOptions = $categories->map(fn ($c) => ['id' => $c->id, 'name' => $c->name, 'type' => $c->type, 'slug' => $c->slug])->values();
    $old = fn ($key) => old($key, $listing?->$key);
    $pd = fn ($key) => old($key, $listing?->propertyDetail?->$key);
    $vd = fn ($key) => old($key, $listing?->vehicleDetail?->$key);
?>

<div x-data="listingForm(<?php echo e($categoryOptions->toJson()); ?>, '<?php echo e((string) $old('category_id')); ?>', '<?php echo e(csrf_token()); ?>', '<?php echo e(route('admin.listings.parse-brochure')); ?>')"
     x-on:submit="prepareSubmit($event)">

    
    <div class="card mb-6 border-2 border-primary-300 bg-gradient-to-br from-primary-900 via-primary-950 to-charcoal-900 p-6 sm:p-7 text-white shadow-xl"
         x-show="categoryType === 'vehicle' && (categorySlug === 'mobil-baru' || categorySlug.includes('honda'))"
         x-cloak
         x-transition>
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="space-y-1.5">
                <div class="inline-flex items-center gap-2 rounded-full border border-accent-400/30 bg-accent-400/10 px-3 py-1 text-xs font-bold text-accent-300">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'sparkles','class' => 'size-3.5 text-accent-400 animate-pulse']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'sparkles','class' => 'size-3.5 text-accent-400 animate-pulse']); ?>
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
                    Fitur AI Smart PDF Auto-Fill
                </div>
                <h3 class="text-xl font-extrabold tracking-tight text-white">Upload Brosur PDF Honda (Otomatis Terisi)</h3>
                <p class="text-xs text-slate-300 max-w-xl leading-relaxed">
                    Unggah file PDF brosur resmi mobil Honda apa pun. AI akan menganalisis dokumen dan mengekstrak foto halaman serta otomatis mengisi spesifikasi teknis lengkap unit!
                </p>
            </div>

            <div class="shrink-0 flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <label class="cursor-pointer inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-accent-500 to-amber-500 hover:from-accent-600 hover:to-amber-600 px-5 py-3 text-xs font-black text-charcoal-950 shadow-lg shadow-accent-500/20 transition-all hover:scale-105">
                    <template x-if="!parsingPdf">
                        <span class="inline-flex items-center gap-2">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'upload','class' => 'size-4.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'upload','class' => 'size-4.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Pilih File Brosur PDF
                        </span>
                    </template>
                    <template x-if="parsingPdf">
                        <span class="inline-flex items-center gap-2">
                            <svg class="size-4.5 animate-spin text-charcoal-950" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                            Menganalisis Brosur PDF...
                        </span>
                    </template>
                    <input type="file" accept="application/pdf" class="sr-only" :disabled="parsingPdf"
                           x-on:change="parsePdfBrochure($event.target.files[0])">
                </label>
            </div>
        </div>



        
        <div x-show="pdfParseSuccess" x-cloak class="mt-4 rounded-xl border border-emerald-500/40 bg-emerald-500/20 p-3.5 text-xs font-semibold text-emerald-200 flex items-center justify-between gap-3">
            <span class="flex items-center gap-2">
                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check-badge','class' => 'size-4.5 text-emerald-400 shrink-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check-badge','class' => 'size-4.5 text-emerald-400 shrink-0']); ?>
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
                🎉 Brosur PDF berhasil dianalisis! Judul, spesifikasi, dan foto galeri telah terisi otomatis di bawah.
            </span>
            <button type="button" @click="pdfParseSuccess = false" class="text-emerald-300 hover:text-white">&times;</button>
        </div>

        
        <div x-show="extractedImages.length" x-cloak class="mt-5 rounded-2xl border border-white/20 bg-white/10 p-4 backdrop-blur-md">
            <div class="flex flex-wrap items-center justify-between gap-2 mb-3">
                <span class="inline-flex items-center gap-2 text-xs font-bold text-white">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'sparkles','class' => 'size-4 text-accent-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'sparkles','class' => 'size-4 text-accent-400']); ?>
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
                    📸 Foto Halaman Brosur Berhasil Diekstrak (<span x-text="extractedImages.length"></span> Gambar)
                </span>
                <span class="rounded-full bg-emerald-500/30 border border-emerald-400/40 px-2.5 py-0.5 text-[10px] font-extrabold text-emerald-300">
                    Siap Disimpan Sebagai Galeri
                </span>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-8 gap-2.5">
                <template x-for="(img, idx) in extractedImages" :key="img.path">
                    <div class="group relative overflow-hidden rounded-xl border border-white/20 bg-charcoal-950/80 shadow-md">
                        <div class="aspect-[4/3] bg-slate-800">
                            <img :src="img.url" alt="" class="size-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        <div class="flex items-center justify-between px-1.5 py-1 text-[10px] text-slate-300 bg-charcoal-900">
                            <span class="truncate font-semibold text-accent-300" x-text="idx === 0 ? 'Cover Utama' : `Hal. ${idx + 1}`"></span>
                            <button type="button" @click="extractedImages = extractedImages.filter((_, i) => i !== idx)"
                                    class="text-slate-400 hover:text-red-400 px-1 font-bold text-sm leading-none" title="Hapus foto ini">
                                &times;
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        
        <div x-show="pdfError" x-cloak class="mt-4 rounded-xl border border-red-500/40 bg-red-500/20 p-3.5 text-xs font-semibold text-red-200 flex items-center justify-between gap-3">
            <span class="flex items-center gap-2" x-text="pdfError"></span>
            <button type="button" @click="pdfError = ''" class="text-red-300 hover:text-white">&times;</button>
        </div>
    </div>

    <div class="card p-6 sm:p-8">
        <h2 class="text-lg font-bold text-slate-900">1. Informasi Dasar</h2>

        <div class="mt-6 space-y-4">
            <div>
                <label for="category_id" class="label">Kategori <span class="text-red-500">*</span></label>
                <select id="category_id" name="category_id" x-model="categoryId" x-on:change="updateType()" required class="input">
                    <option value="">— Pilih Kategori —</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php if((string) $old('category_id') === (string) $category->id): echo 'selected'; endif; ?>>
                            <?php echo e($category->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1.5 text-xs font-medium text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="title" class="label">Judul Iklan <span class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" value="<?php echo e($old('title')); ?>" required minlength="5" maxlength="150"
                       class="input <?php echo e($errors->has('title') ? 'input-error' : ''); ?>" placeholder="cth: Rumah Modern 2 Lantai di Bogor Selatan">
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1.5 text-xs font-medium text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="price" class="label">Harga (Rp) <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-xs font-bold text-slate-400">
                            Rp
                        </span>
                        <input type="text" id="price" name="price" inputmode="numeric" required
                               x-data="priceFormat('<?php echo e($old('price')); ?>')"
                               x-on:input="onInput($event)"
                               class="input pl-10 font-bold text-slate-900 <?php echo e($errors->has('price') ? 'input-error' : ''); ?>" placeholder="cth: 318.500.000">
                    </div>
                    <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1.5 text-xs font-medium text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div>
                    <label for="location_label" class="label">Label Lokasi</label>
                    <input type="text" id="location_label" name="location_label" value="<?php echo e($old('location_label')); ?>" maxlength="255"
                           class="input" placeholder="cth: Bogor Selatan, Jawa Barat">
                </div>
            </div>

            <div x-data="{ len: <?php echo e(strlen((string) $old('description'))); ?> }">
                <label for="description" class="label">Deskripsi <span class="text-red-500">*</span></label>
                <textarea id="description" name="description" rows="6" required minlength="20" maxlength="10000"
                          x-on:input="len = $el.value.length"
                          class="input <?php echo e($errors->has('description') ? 'input-error' : ''); ?>" placeholder="Jelaskan kondisi, keunggulan, dan informasi penting lainnya..."><?php echo e($old('description')); ?></textarea>
                <p class="mt-1 text-right text-xs text-slate-400"><span x-text="len"></span>/10000</p>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1.5 text-xs font-medium text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
    </div>

    <div class="card mt-6 p-6 sm:p-8">
        <h2 class="text-lg font-bold text-slate-900">2. Lokasi</h2>

        <div x-data="locationCascade({
            province_id: '<?php echo e($old('province_id')); ?>',
            city_id: '<?php echo e($old('city_id')); ?>',
            district_id: '<?php echo e($old('district_id')); ?>',
        })" class="mt-6 space-y-4">
            <div class="grid gap-4 sm:grid-cols-3">
                <div>
                    <label for="province_id" class="label">Provinsi</label>
                    <select id="province_id" name="province_id" x-model="provinceId" x-on:change="loadCities()" class="input">
                        <option value="">Pilih Provinsi</option>
                        <?php $__currentLoopData = \App\Models\Province::orderBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($province->id); ?>"><?php echo e($province->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div>
                    <label for="city_id" class="label">Kota/Kabupaten</label>
                    <select id="city_id" name="city_id" x-model="cityId" x-on:change="loadDistricts()" class="input">
                        <option value="">Pilih Kota</option>
                        <template x-for="city in cities" :key="city.id">
                            <option :value="city.id" x-text="city.name"></option>
                        </template>
                    </select>
                </div>
                <div>
                    <label for="district_id" class="label">Kecamatan</label>
                    <select id="district_id" name="district_id" x-model="districtId" class="input">
                        <option value="">Pilih Kecamatan</option>
                        <template x-for="district in districts" :key="district.id">
                            <option :value="district.id" x-text="district.name"></option>
                        </template>
                    </select>
                </div>
            </div>

            <div>
                <label for="address" class="label">Alamat Lengkap</label>
                <input type="text" id="address" name="address" value="<?php echo e($old('address')); ?>" maxlength="255" class="input" placeholder="cth: Jl. Pahlawan No. 12">
            </div>
        </div>
    </div>

    <div class="card mt-6 p-6 sm:p-8" x-show="categoryType === 'property'" style="display: none;" x-cloak x-transition>
        <h2 class="text-lg font-bold text-slate-900">3. Detail Properti</h2>

        <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <div>
                <label for="land_area" class="label">Luas Tanah (m²)</label>
                <input type="number" id="land_area" name="land_area" min="0" step="0.01" value="<?php echo e($pd('land_area')); ?>" class="input">
            </div>

            <div x-show="categorySlug === 'rumah'">
                <label for="building_area" class="label">Luas Bangunan (m²)</label>
                <input type="number" id="building_area" name="building_area" min="0" step="0.01" value="<?php echo e($pd('building_area')); ?>" class="input">
            </div>

            <div x-show="categorySlug === 'rumah'">
                <label for="bedrooms" class="label">Kamar Tidur</label>
                <input type="number" id="bedrooms" name="bedrooms" min="0" max="100" value="<?php echo e($pd('bedrooms')); ?>" class="input">
            </div>

            <div x-show="categorySlug === 'rumah'">
                <label for="bathrooms" class="label">Kamar Mandi</label>
                <input type="number" id="bathrooms" name="bathrooms" min="0" max="100" value="<?php echo e($pd('bathrooms')); ?>" class="input">
            </div>

            <div x-show="categorySlug === 'rumah'">
                <label for="garage" class="label">Garasi</label>
                <input type="number" id="garage" name="garage" min="0" max="50" value="<?php echo e($pd('garage')); ?>" class="input">
            </div>

            <div x-show="categorySlug === 'rumah'">
                <label for="floors" class="label">Jumlah Lantai</label>
                <input type="number" id="floors" name="floors" min="0" max="50" value="<?php echo e($pd('floors')); ?>" class="input">
            </div>

            <div>
                <label for="certificate" class="label">Sertifikat</label>
                <select id="certificate" name="certificate" class="input">
                    <option value="">Pilih</option>
                    <?php $__currentLoopData = ['SHM', 'SHGB', 'Girik', 'Akta Jual Beli', 'Lainnya']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cert); ?>" <?php if($pd('certificate') === $cert): echo 'selected'; endif; ?>><?php echo e($cert); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div x-show="categorySlug === 'tanah'">
                <label for="land_status" class="label">Status Tanah</label>
                <input type="text" id="land_status" name="land_status" maxlength="100" value="<?php echo e($pd('land_status')); ?>" class="input" placeholder="cth: Kavling, Sawah, Pekarangan">
            </div>

            <div x-show="categorySlug === 'rumah'">
                <label for="building_status" class="label">Status Bangunan</label>
                <input type="text" id="building_status" name="building_status" maxlength="100" value="<?php echo e($pd('building_status')); ?>" class="input" placeholder="cth: Siap Huni, Baru, Renovasi">
            </div>
        </div>

        <div class="mt-6">
            <span class="label">Fasilitas</span>
            <div class="flex flex-wrap gap-2">
                <?php $__currentLoopData = ['Garasi', 'Carport', 'Taman', 'Halaman', 'Kolam Renang', 'Air PAM', 'Listrik 1300W', 'Listrik 2200W', 'Listrik 4400W', 'Keamanan 24 Jam', 'CCTV', 'Mushola', 'Balkon', 'AC', 'Furnished', 'Semi Furnished']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="cursor-pointer rounded-full border border-slate-300 bg-white px-3.5 py-1.5 text-xs font-medium text-slate-600 has-checked:border-primary-600 has-checked:bg-primary-50 has-checked:text-primary-800">
                        <input type="checkbox" name="facilities[]" value="<?php echo e($facility); ?>" class="sr-only"
                               <?php if(in_array($facility, (array) old('facilities', $listing?->propertyDetail?->facilities ?? []), true)): echo 'checked'; endif; ?>>
                        <?php echo e($facility); ?>

                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <div class="card mt-6 p-6 sm:p-8" x-show="categoryType === 'vehicle'" style="display: none;" x-cloak x-transition>
        <h2 class="text-lg font-bold text-slate-900">3. Detail Kendaraan</h2>

        <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <div>
                <label for="brand" class="label">Merk <span class="text-red-500">*</span></label>
                <input type="text" id="brand" name="brand" :required="categoryType === 'vehicle'" maxlength="100" value="<?php echo e($vd('brand')); ?>" class="input <?php echo e($errors->has('brand') ? 'input-error' : ''); ?>" placeholder="cth: Toyota">
                <?php $__errorArgs = ['brand'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1.5 text-xs font-medium text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div>
                <label for="model" class="label">Model <span class="text-red-500">*</span></label>
                <input type="text" id="model" name="model" :required="categoryType === 'vehicle'" maxlength="100" value="<?php echo e($vd('model')); ?>" class="input <?php echo e($errors->has('model') ? 'input-error' : ''); ?>" placeholder="cth: Avanza 1.5 G CVT">
                <?php $__errorArgs = ['model'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1.5 text-xs font-medium text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div>
                <label for="year" class="label">Tahun <span class="text-red-500">*</span></label>
                <select id="year" name="year" :required="categoryType === 'vehicle'" class="input">
                    <option value="">Pilih Tahun</option>
                    <?php for($y = now()->year + 1; $y >= 1990; $y--): ?>
                        <option value="<?php echo e($y); ?>" <?php if((string) $vd('year') === (string) $y): echo 'selected'; endif; ?>><?php echo e($y); ?></option>
                    <?php endfor; ?>
                </select>
                <?php $__errorArgs = ['year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1.5 text-xs font-medium text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div>
                <label for="mileage" class="label">Kilometer</label>
                <input type="number" id="mileage" name="mileage" min="0" max="9999999" value="<?php echo e($vd('mileage')); ?>" class="input" placeholder="cth: 45000">
            </div>
            <div>
                <label for="transmission" class="label">Transmisi</label>
                <select id="transmission" name="transmission" class="input">
                    <option value="">Pilih</option>
                    <?php $__currentLoopData = ['MT', 'AT', 'CVT', 'DCT']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($t); ?>" <?php if($vd('transmission') === $t): echo 'selected'; endif; ?>><?php echo e($t); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div>
                <label for="fuel_type" class="label">Bahan Bakar</label>
                <select id="fuel_type" name="fuel_type" class="input">
                    <option value="">Pilih</option>
                    <?php $__currentLoopData = ['Bensin', 'Diesel', 'Listrik', 'Hybrid']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($f); ?>" <?php if($vd('fuel_type') === $f): echo 'selected'; endif; ?>><?php echo e($f); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div>
                <label for="color" class="label">Warna</label>
                <input type="text" id="color" name="color" maxlength="50" value="<?php echo e($vd('color')); ?>" class="input" placeholder="cth: Putih">
            </div>
            <div>
                <label for="engine_capacity" class="label">Kapasitas Mesin</label>
                <input type="text" id="engine_capacity" name="engine_capacity" maxlength="20" value="<?php echo e($vd('engine_capacity')); ?>" class="input" placeholder="cth: 1496 cc">
            </div>
            <div>
                <label for="license_plate" class="label">Plat Nomor</label>
                <input type="text" id="license_plate" name="license_plate" maxlength="20" value="<?php echo e($vd('license_plate')); ?>" class="input" placeholder="cth: B 1234 XYZ">
            </div>
            <div>
                <label class="label">Kondisi <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-2 gap-2">
                    <label class="flex cursor-pointer items-center gap-2 rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm font-medium text-slate-700 has-checked:border-primary-500 has-checked:bg-primary-50 has-checked:text-primary-800">
                        <input type="radio" name="condition" value="new" class="size-4 accent-primary-600" :required="categoryType === 'vehicle'" <?php if($vd('condition') === 'new'): echo 'checked'; endif; ?>>
                        Baru
                    </label>
                    <label class="flex cursor-pointer items-center gap-2 rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm font-medium text-slate-700 has-checked:border-primary-500 has-checked:bg-primary-50 has-checked:text-primary-800">
                        <input type="radio" name="condition" value="used" class="size-4 accent-primary-600" :required="categoryType === 'vehicle'" <?php if($vd('condition') === 'used'): echo 'checked'; endif; ?>>
                        Bekas
                    </label>
                </div>
            </div>
        </div>
    </div>

    
    
    <div class="card mt-6 border-2 border-red-100 bg-gradient-to-b from-white to-red-50/20 p-6 sm:p-8 shadow-sm"
         x-show="categoryType === 'vehicle' && (categorySlug === 'mobil-baru' || categorySlug.includes('honda'))"
         style="display: none;"
         x-cloak
         x-transition>
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-red-100 pb-4">
            <div>
                <span class="inline-flex items-center gap-1.5 rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-bold text-red-700">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'sparkles','class' => 'size-3 text-red-600']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'sparkles','class' => 'size-3 text-red-600']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> Spesifikasi Resmi Honda
                </span>
                <h2 class="mt-2 text-lg font-extrabold text-slate-900">4. Spesifikasi Lengkap &amp; Brosur Honda</h2>
                <p class="text-xs text-slate-500">Atur dokumen e-brosur PDF, paket hemat perawatan, promo dealer, dan checklist fitur teknologi Honda Sensing.</p>
            </div>
            <button type="button"
                    @click="
                        document.getElementById('warranty_info').value = 'Garansi Resmi Honda 3 Tahun / 100.000 Km + Garansi Sparepart 12 Bulan + Gratis Paket Perawatan Berkala 4 Tahun / 50.000 Km + 24 Hours Emergency Roadside Assistance';
                        document.getElementById('promo_package').value = '• Promo DP Ringan mulai Rp 20 Jt-an atau Cicilan Rp 4 Jt-an/bln\n• Bunga Kredit Spesial 0% & Tenor s/d 7 Tahun\n• Diskon Cashback & Voucher Belanja Spesial Event';
                        document.getElementById('color_options').value = 'Ignite Red Metallic Two Tone, Ignite Red Metallic, Stellar Diamond Pearl, Crystal Black Pearl, Meteoroid Gray Metallic, Taffeta White';
                        document.getElementById('bonus_accessories').value = '• Kaca Film V-Kool / Solar Gard Full\n• Karpet Eksklusif All New Honda WR-V\n• APAR (Alat Pemadam Api Ringan Standar Resmi)\n• Dudukan Plat Nomor & Kotak P3K + Toolkit\n• Payung Eksklusif Honda';
                        document.querySelectorAll('input[name=\'honda_features[]\']').forEach(el => el.checked = true);
                    "
                    class="btn-outline btn-xs self-start sm:self-auto !border-red-300 !text-red-700 hover:!bg-red-50 shrink-0">
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
<?php endif; ?> Isi Otomatis Template Honda
            </button>
        </div>

        <div class="mt-6 space-y-5">
            
            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="brochure_file" class="label text-xs">Unggah File PDF Brosur Resmi (Max 15MB)</label>
                    <input type="file" id="brochure_file" name="brochure_file" accept="application/pdf" class="input text-xs file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
                    <?php if($vd('brochure_url')): ?>
                        <div class="mt-2 flex items-center gap-2 text-xs font-semibold text-red-700">
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
<?php endif; ?>
                            <a href="<?php echo e($vd('brochure_url')); ?>" target="_blank" class="underline hover:text-red-800">Lihat Brosur Terpasang</a>
                        </div>
                    <?php endif; ?>
                </div>

                <div>
                    <label for="brochure_url" class="label text-xs">Atau Masukkan Link URL Brosur PDF</label>
                    <input type="url" id="brochure_url" name="brochure_url" value="<?php echo e($vd('brochure_url')); ?>" maxlength="255"
                           class="input text-xs" placeholder="https://domain.com/brosur-honda.pdf">
                </div>
            </div>

            <div>
                <label for="warranty_info" class="label text-xs">Garansi &amp; Paket Hemat Servis Honda</label>
                <input type="text" id="warranty_info" name="warranty_info" value="<?php echo e($vd('warranty_info')); ?>" maxlength="500"
                       class="input text-xs" placeholder="cth: Garansi Resmi Honda 3 Tahun / 100.000 Km + Gratis Servis Paket Hemat 4 Tahun / 50.000 Km">
            </div>

            <div>
                <label for="promo_package" class="label text-xs">Paket Promo Kredit &amp; DP Dealer Honda</label>
                <textarea id="promo_package" name="promo_package" rows="2" maxlength="1000" class="input text-xs"
                          placeholder="cth: DP Ringan Mulai 20 Jt-an / Angsuran Mulai 4 Jutaan / Bunga Spesial 0% s/d 2 Tahun / Tenor Fleksibel s/d 7 Tahun"><?php echo e($vd('promo_package')); ?></textarea>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="color_options" class="label text-xs">Pilihan Warna Resmi Honda</label>
                    <input type="text" id="color_options" name="color_options" value="<?php echo e($vd('color_options')); ?>" maxlength="500"
                           class="input text-xs" placeholder="cth: Ignite Red Metallic Two Tone, Platinum White Pearl, Crystal Black, Meteoroid Gray">
                </div>

                <div>
                    <label for="bonus_accessories" class="label text-xs">Bonus Pembelian &amp; Aksesoris Resmi</label>
                    <textarea id="bonus_accessories" name="bonus_accessories" rows="2" maxlength="1000" class="input text-xs"
                              placeholder="cth: Gratis Kaca Film V-Kool/Solar Gard, Karpet Eksklusif WR-V, APAR, Dudukan Plat Nomor, Payung Eksklusif"><?php echo e($vd('bonus_accessories')); ?></textarea>
                </div>
            </div>

            <div>
                <span class="label text-xs font-bold text-slate-800">Checklist Fitur Spesifikasi Brosur &amp; Honda Sensing™</span>
                <div class="mt-2 grid gap-2 sm:grid-cols-2 lg:grid-cols-3">
                    <?php
                        $hondaFeatureList = [
                            'Honda Sensing (CMBS, RDM, ACC, LKAS, LCDN, AHB)',
                            'Honda LaneWatch Blind-Spot Camera',
                            'Remote Engine Start',
                            'One Push Ignition System',
                            '7" Advanced Capacitive Touchscreen (Apple CarPlay & Android Auto)',
                            '6 Audio Speakers with Tweeter',
                            'Full LED Headlights with DRL & Sequential Turning Signal',
                            'Auto Foldable Door Mirror with LED Turning Signal',
                            '17" Two-Tone Sporty Alloy Wheels',
                            'Multi-Angle Rear Parking Camera',
                            'Leather-Fabric Combi Upholstery with Red Stitching',
                            'Auto A/C with Digital Display',
                            'G-CON + ACE with Side Impact Beam',
                            '6 Airbags (Dual Front, Side & Curtain)',
                            'Walk-Away Auto Lock & Smart Key',
                            'Vehicle Stability Assist (VSA) & Hill Start Assist (HSA)',
                        ];
                        $selectedFeatures = (array) old('honda_features', $listing?->vehicleDetail?->honda_features ?? []);
                    ?>
                    <?php $__currentLoopData = $hondaFeatureList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="flex cursor-pointer items-center gap-2 rounded-xl border border-slate-200 bg-white p-2.5 text-[11px] font-medium text-slate-700 transition hover:bg-red-50/50 has-checked:border-red-500 has-checked:bg-red-50 has-checked:text-red-900">
                            <input type="checkbox" name="honda_features[]" value="<?php echo e($feat); ?>" class="size-4 rounded accent-red-600"
                                   <?php if(in_array($feat, $selectedFeatures, true)): echo 'checked'; endif; ?>>
                            <span class="truncate"><?php echo e($feat); ?></span>
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-6 p-6 sm:p-8">
        <h2 class="text-lg font-bold text-slate-900">
            <span x-text="(categoryType === 'vehicle' && (categorySlug === 'mobil-baru' || categorySlug.includes('honda'))) ? '5. Foto Listing' : '4. Foto Listing'">4. Foto Listing</span>
            <span class="text-red-500">*</span>
        </h2>
        <p class="mt-1 text-sm text-slate-500">Unggah minimal 1 foto (maksimal 8). Format JPG, PNG, WebP. Maksimal 5 MB per foto.</p>

        
        <template x-for="(img, idx) in extractedImages" :key="img.path">
            <input type="hidden" name="extracted_images[]" :value="img.path">
        </template>

        
        <div x-show="extractedImages.length" x-cloak class="mt-4 rounded-2xl border border-primary-200 bg-primary-50/50 p-4">
            <div class="flex items-center justify-between gap-2 mb-3">
                <span class="inline-flex items-center gap-1.5 text-xs font-bold text-primary-900">
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
<?php endif; ?>
                    Foto Galeri Otomatis dari Halaman Brosur PDF (<span x-text="extractedImages.length"></span> Foto)
                </span>
                <span class="text-[11px] text-primary-700">Tersimpan otomatis saat listing disimpan</span>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                <template x-for="(img, idx) in extractedImages" :key="img.path">
                    <div class="group relative overflow-hidden rounded-xl border border-primary-200 bg-white shadow-sm">
                        <div class="aspect-[4/3] bg-slate-100">
                            <img :src="img.url" alt="" class="size-full object-cover">
                        </div>
                        <div class="flex items-center justify-between gap-1 px-2 py-1.5 bg-white">
                            <span class="truncate text-[10px] font-semibold text-slate-600" x-text="`Hal. ${idx + 1}`"></span>
                            <button type="button" class="shrink-0 rounded p-1 text-slate-400 hover:bg-red-50 hover:text-red-600"
                                    @click="extractedImages = extractedImages.filter((_, i) => i !== idx)" aria-label="Hapus foto">
                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'x','class' => 'size-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'x','class' => 'size-3.5']); ?>
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
                    </div>
                </template>
            </div>
        </div>

        <div x-data="uploadManager(8, 5120)" class="mt-5">
            <input type="file" x-ref="fileInput" name="images[]" accept="image/jpeg,image/png,image/webp" multiple
                   x-on:change="handleFiles($event.target.files)" class="hidden" id="images-input">

            <label for="images-input"
                   class="flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 px-6 py-8 text-center transition-colors hover:border-primary-400 hover:bg-primary-50"
                   :class="dragging ? 'border-primary-500! bg-primary-50!' : ''"
                   x-on:dragover.prevent="dragging = true"
                   x-on:dragleave="dragging = false"
                   x-on:drop.prevent="onDrop($event)">
                <span class="grid size-11 place-items-center rounded-2xl bg-white text-primary-700 shadow-sm">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'upload','class' => 'size-5.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'upload','class' => 'size-5.5']); ?>
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
                <span class="mt-2 text-xs sm:text-sm font-semibold text-slate-700">Atau unggah foto tambahan lainnya (Opsional)</span>
                <span class="mt-0.5 text-[11px] text-slate-400">Maksimal 8 foto, 5 MB per foto</span>
            </label>

            <div x-show="files.length" class="mt-4 grid grid-cols-3 gap-3 sm:grid-cols-4" x-cloak>
                <template x-for="file in files" :key="file.id">
                    <div class="group relative overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                        <div class="aspect-[4/3] bg-slate-100">
                            <template x-if="file.url">
                                <img :src="file.url" alt="" class="size-full object-cover">
                            </template>
                            <template x-if="!file.url">
                                <div class="grid h-full place-items-center p-3 text-center text-xs font-medium text-red-600">
                                    <span x-text="file.error"></span>
                                </div>
                            </template>
                        </div>
                        <div class="flex items-center justify-between gap-1 px-2 py-1.5">
                            <span class="truncate text-[11px] text-slate-500" x-text="file.name"></span>
                            <button type="button" class="shrink-0 rounded p-1 text-slate-400 hover:bg-red-50 hover:text-red-600" @click="remove(file.id)" aria-label="Hapus foto">
                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'x','class' => 'size-3.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'x','class' => 'size-3.5']); ?>
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
                    </div>
                </template>
            </div>
        </div>

        <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="mt-2 text-xs font-medium text-red-600"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php $__errorArgs = ['images.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="mt-2 text-xs font-medium text-red-600"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
        <a href="<?php echo e(route('admin.listings.index')); ?>" class="btn-outline">Batal</a>
        <button type="submit" class="btn-primary">
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
<?php endif; ?>
            <?php echo e($listing ? 'Simpan Perubahan' : 'Simpan Listing'); ?>

        </button>
    </div>
</div><?php /**PATH D:\SYARVA\resources\views\admin\listings\_form-fields.blade.php ENDPATH**/ ?>