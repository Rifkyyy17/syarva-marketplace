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
     <?php $__env->slot('title', null, []); ?> Edit Kategori <?php $__env->endSlot(); ?>
     <?php $__env->slot('pageTitle', null, []); ?> Edit Kategori: <?php echo e($category->name); ?> <?php $__env->endSlot(); ?>

    <div class="card mx-auto max-w-xl p-6 sm:p-8">
        <form method="POST" action="<?php echo e(route('admin.categories.update', $category)); ?>" class="space-y-4">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                <label for="parent_id" class="label">Kategori Utama</label>
                <select id="parent_id" name="parent_id" class="input">
                    <option value="">— Kategori Utama —</option>
                    <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($parent->id); ?>" <?php if((string) old('parent_id', $category->parent_id) === (string) $parent->id): echo 'selected'; endif; ?>><?php echo e($parent->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div>
                <label for="name" class="label">Nama Kategori</label>
                <input type="text" id="name" name="name" value="<?php echo e(old('name', $category->name)); ?>" required maxlength="100" class="input <?php echo e($errors->has('name') ? 'input-error' : ''); ?>">
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
                <input type="text" id="slug" name="slug" value="<?php echo e(old('slug', $category->slug)); ?>" required maxlength="100" class="input <?php echo e($errors->has('slug') ? 'input-error' : ''); ?>">
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
                        <option value="property" <?php if(old('type', $category->type) === 'property'): echo 'selected'; endif; ?>>Properti</option>
                        <option value="vehicle" <?php if(old('type', $category->type) === 'vehicle'): echo 'selected'; endif; ?>>Kendaraan</option>
                    </select>
                </div>
                <div>
                    <label for="status" class="label">Status</label>
                    <select id="status" name="status" required class="input">
                        <option value="active" <?php if(old('status', $category->status) !== 'inactive'): echo 'selected'; endif; ?>>Aktif</option>
                        <option value="inactive" <?php if(old('status', $category->status) === 'inactive'): echo 'selected'; endif; ?>>Nonaktif</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="icon" class="label">Ikon</label>
                <input type="text" id="icon" name="icon" value="<?php echo e(old('icon', $category->icon)); ?>" maxlength="50" class="input">
            </div>

            <div>
                <label for="description" class="label">Deskripsi</label>
                <textarea id="description" name="description" rows="3" maxlength="500" class="input"><?php echo e(old('description', $category->description)); ?></textarea>
            </div>

            <div>
                <label for="sort_order" class="label">Urutan</label>
                <input type="number" id="sort_order" name="sort_order" min="0" value="<?php echo e(old('sort_order', $category->sort_order)); ?>" class="input">
            </div>

            <div class="flex justify-end gap-2 pt-2">
                <a href="<?php echo e(route('admin.categories.index')); ?>" class="btn-outline">Batal</a>
                <button type="submit" class="btn-primary">Simpan</button>
            </div>
        </form>

        <form method="POST" action="<?php echo e(route('admin.categories.destroy', $category)); ?>" class="mt-6 border-t border-slate-100 pt-6">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn-danger btn-sm" @click.prevent="$dispatch('confirm-action', { form: $el.closest('form'), message: 'Hapus kategori ini?' })">
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
<?php endif; ?> Hapus Kategori
            </button>
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
<?php endif; ?><?php /**PATH D:\SYARVA\resources\views\admin\categories\edit.blade.php ENDPATH**/ ?>