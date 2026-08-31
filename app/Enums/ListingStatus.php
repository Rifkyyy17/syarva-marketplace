<?php

namespace App\Enums;

enum ListingStatus: string
{
    case DRAFT = 'draft';
    case PENDING = 'pending';
    case PUBLISHED = 'published';
    case REJECTED = 'rejected';
    case SOLD = 'sold';
    case ARCHIVED = 'archived';

    public function label(): string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::PENDING => 'Menunggu Persetujuan',
            self::PUBLISHED => 'Aktif',
            self::REJECTED => 'Ditolak',
            self::SOLD => 'Terjual',
            self::ARCHIVED => 'Diarsipkan',
        };
    }
}