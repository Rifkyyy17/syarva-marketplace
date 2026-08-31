<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyDetail extends Model
{
    protected $fillable = [
        'listing_id', 'land_area', 'building_area', 'bedrooms', 'bathrooms',
        'garage', 'floors', 'certificate', 'land_status', 'building_status', 'facilities',
    ];

    protected $casts = [
        'facilities' => 'array',
    ];

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }
}