<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleDetail extends Model
{
    protected $fillable = [
        'listing_id', 'brand', 'model', 'year', 'mileage', 'transmission',
        'fuel_type', 'color', 'condition', 'engine_capacity', 'license_plate',
        'brochure_url', 'promo_package', 'warranty_info', 'honda_features',
        'color_options', 'bonus_accessories',
    ];

    protected function casts(): array
    {
        return [
            'honda_features' => 'array',
            'year' => 'integer',
            'mileage' => 'decimal:2',
        ];
    }

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }

    public function getConditionLabelAttribute(): string
    {
        return $this->condition === 'new' ? 'Baru' : 'Bekas';
    }

    public function getMileageLabelAttribute(): string
    {
        return $this->mileage !== null
            ? number_format((float) $this->mileage, 0, ',', '.') . ' km'
            : '-';
    }
}