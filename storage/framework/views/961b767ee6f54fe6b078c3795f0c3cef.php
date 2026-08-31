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
     <?php $__env->slot('title', null, []); ?> Tambah Kategori <?php $__env->endSlot(); ?>
     <?php $__env->slot('pageTitle', null, []); ?> Tambah Kategori <?php $__env->endSlot(); ?>

    <div class="card mx-auto max-w-xl p-6 sm:p-8">
        <form method="POST" action="<?php echo e(route('admin.categories.store')); ?>" class="space-y-4">
            <?php echo csrf_field(); ?>

            <div>
                <label for="parent_id" class="label">Kategori Utama</label>
                <select id="parent_id" name="parent_id" class="input">
                    <option value="">— Kategori Utama —</option>
                    <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($parent->id); ?>" <?php if((string) old('parent_id') === (string) $parent->id): echo 'selected'; endif; ?>><?php echo e($parent->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div>
                <label for="name" class="label">Nama Kategori</label>
                <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" required maxlength="100" class="input <?php echo e($errors->has('name') ? 'input-error' : ''); ?>">
                <?php $__errorArgs = ['name'];
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
                <label for="slug" class="label">Slug (URL)</label>
                <input type="text" id="slug" name="slug" value="<?php echo e(old('slug')); ?>" required maxlength="100" class="input <?php echo e($errors->has('slug') ? 'input-error' : ''); ?>" placeholder="cth: rumah-modern">
                <?php $__errorArgs = ['slug'];
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
                    <label for="type" class="label">Tipe</label>
                    <select id="type" name="type" required class="input">
                        <option value="property" <?php if(old('type') === 'property'): echo 'selected'; endif; ?>>Properti</option>
                        <option value="vehicle" <?php if(old('type') === 'vehicle'): echo 'selected'; endif; ?>>Kendaraan</option>
                    </select>
                </div>
                <div>
                    <label for="status" class="label">Status</label>
                    <select id="status" name="status" required class="input">
                        <option value="active" <?php if(old('status') !== 'inactive'): echo 'selected'; endif; ?>>Aktif</option>
                        <option value="inactive" <?php if(old('status') === 'inactive'): echo 'selected'; endif; ?>>Nonaktif</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="icon" class="label">Ikon</label>
                <input type="text" id="icon" name="icon" value="<?php echo e(old('icon')); ?>" maxlength="50" class="input" placeholder="cth: building, map, car-front">
            </div>

            <div>
                <label for="description" class="label">Deskripsi</label>
                <textarea id="description" name="description" rows="3" maxlength="500" class="input"><?php echo e(old('description')); ?></textarea>
            </div>

            <div>
                <label for="sort_order" class="label">Urutan</label>
                <input type="number" id="sort_order" name="sort_order" min="0" value="<?php echo e(old('sort_order', 0)); ?>" class="input">
            </div>

            <div class="flex justify-end gap-2 pt-2">
                <a href="<?php echo e(route('admin.categories.index')); ?>" class="btn-outline">Batal</a>
                <button type="submit" class="btn-primary">Simpan</button>
            </div>
        </form>
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
<?php endif; ?><?php /**PATH D:\SYARVA\resources\views\admin\categories\create.blade.php ENDPATH**/ ?>