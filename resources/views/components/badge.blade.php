@props(['status'])

@php
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
@endphp

<span {{ $attributes->merge(['class' => 'badge '.($map[$key] ?? $map['draft'])]) }}>
    {{ $labels[$key] ?? ucfirst($key) }}
</span>
