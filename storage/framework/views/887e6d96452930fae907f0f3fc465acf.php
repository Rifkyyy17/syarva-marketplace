<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['status']));

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

foreach (array_filter((['status']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $key = $status instanceof \App\Enums\ListingStatus ? $status->value : (string) $status;
    $map = [
        'draft' => 'bg-gray-100 text-charcoal-600 border border-gray-200',
        'pending' => 'bg-warning/10 text-warning border border-warning/20',
        'published' => 'bg-success/10 text-success border border-success/20',
        'rejected' => 'bg-red-50 text-red-600 border border-red-200',
        'sold' => 'bg-charcoal-100 text-charcoal-500 border border-charcoal-200',
        'archived' => 'bg-gray-100 text-charcoal-400 border border-gray-200',
        'new' => 'bg-primary-50 text-primary-500 border border-primary-200',
        'read' => 'bg-warning/10 text-warning border border-warning/20',
        'replied' => 'bg-success/10 text-success border border-success/20',
        'active' => 'bg-success/10 text-success border border-success/20',
        'suspended' => 'bg-red-50 text-red-600 border border-red-200',
        'inactive' => 'bg-gray-100 text-charcoal-400 border border-gray-200',
        'admin' => 'bg-primary-50 text-primary-500 border border-primary-200',
        'seller' => 'bg-primary-50 text-primary-500 border border-primary-200',
        'user' => 'bg-primary-50 text-primary-500 border border-primary-200',
    ];
    $labels = [
        'draft' => 'Draft', 'pending' => 'Pending', 'published' => 'Published', 'rejected' => 'Ditolak',
        'sold' => 'Terjual', 'archived' => 'Diarsipkan', 'new' => 'Baru', 'read' => 'Dibaca',
        'replied' => 'Sudah Dibalas', 'active' => 'Aktif', 'suspended' => 'Ditangguhkan',
        'inactive' => 'Nonaktif', 'admin' => 'Admin', 'seller' => 'Pembeli', 'user' => 'Pembeli',
    ];
?>

<span <?php echo e($attributes->merge(['class' => 'badge '.($map[$key] ?? $map['draft'])])); ?>>
    <?php echo e($labels[$key] ?? ucfirst($key)); ?>

</span>
<?php /**PATH D:\SYARVA\resources\views\components\badge.blade.php ENDPATH**/ ?>