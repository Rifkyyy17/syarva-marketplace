<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title' => null,
    'description' => null,
    'image' => null,
    'type' => 'website',
]));

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

foreach (array_filter(([
    'title' => null,
    'description' => null,
    'image' => null,
    'type' => 'website',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $siteName = \App\Models\Setting::get('site_name', config('app.name'));
    $siteTagline = \App\Models\Setting::get('site_tagline');
    $seoTitle = \App\Models\Setting::get('seo_title');
    $seoDescription = \App\Models\Setting::get('seo_description');
    $pageTitle = $title ? ($title.' | '.$siteName) : $seoTitle;
    $pageDescription = $description ?? $seoDescription;
    $pageUrl = url()->current();
?>

<title><?php echo e($pageTitle); ?></title>
<meta name="description" content="<?php echo e($pageDescription); ?>">
<meta name="keywords" content="<?php echo e(\App\Models\Setting::get('seo_keywords')); ?>">

<link rel="canonical" href="<?php echo e($pageUrl); ?>">
<meta name="robots" content="index, follow">

<meta property="og:type" content="<?php echo e($type); ?>">
<meta property="og:site_name" content="<?php echo e($siteName); ?>">
<meta property="og:title" content="<?php echo e($title ?? $seoTitle); ?>">
<meta property="og:description" content="<?php echo e($pageDescription); ?>">
<meta property="og:url" content="<?php echo e($pageUrl); ?>">
<?php if($image): ?>
    <meta property="og:image" content="<?php echo e($image); ?>">
<?php endif; ?>
<meta property="og:locale" content="id_ID">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo e($title ?? $seoTitle); ?>">
<meta name="twitter:description" content="<?php echo e($pageDescription); ?>">

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "<?php echo e($siteName); ?>",
    "description": "<?php echo e($siteTagline); ?>",
    "url": "<?php echo e(url('/')); ?>"
}
</script><?php /**PATH D:\SYARVA\resources\views\components\seo.blade.php ENDPATH**/ ?>