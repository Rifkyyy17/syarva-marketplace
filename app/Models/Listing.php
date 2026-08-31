<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Enums\ListingStatus;

class Listing extends Model
{
    use SoftDeletes;

    public const STATUS_DRAFT = 'draft';

    public const STATUS_PENDING = 'pending';

    public const STATUS_PUBLISHED = 'published';

    public const STATUS_REJECTED = 'rejected';

    public const STATUS_SOLD = 'sold';

    public const STATUS_ARCHIVED = 'archived';

    public const STATUSES = [
        self::STATUS_DRAFT,
        self::STATUS_PENDING,
        self::STATUS_PUBLISHED,
        self::STATUS_REJECTED,
        self::STATUS_SOLD,
        self::STATUS_ARCHIVED,
    ];

    protected $fillable = [
        'user_id', 'category_id', 'province_id', 'city_id', 'district_id',
        'title', 'slug', 'description', 'price', 'location_label', 'address',
        'latitude', 'longitude', 'status', 'rejection_reason', 'featured', 'view_count',
        'brochure_pdf', 'qr_3d_image', 'external_3d_url', 'promo_dp',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'featured' => 'boolean',
        'view_count' => 'integer',
        'status' => ListingStatus::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ListingImage::class)->orderBy('sort_order')->orderBy('id');
    }

    public function primaryImage(): HasOne
    {
        return $this->hasOne(ListingImage::class)->where('is_primary', true);
    }

    public function propertyDetail(): HasOne
    {
        return $this->hasOne(PropertyDetail::class);
    }

    public function vehicleDetail(): HasOne
    {
        return $this->hasOne(VehicleDetail::class);
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    public function inquiries(): HasMany
    {
        return $this->hasMany(Inquiry::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_PUBLISHED);
    }

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('featured', true);
    }

    public function scopeSearch(Builder $query, ?string $term): Builder
    {
        if (! $term) {
            return $query;
        }

        $driver = DB::getDriverName();

        if ($driver === 'mysql') {
            $query->whereRaw('MATCH(title, description, location_label) AGAINST(? IN BOOLEAN MODE)', [$term]);
        } else {
            $like = '%'.mb_strtolower(trim($term)).'%';
            $query->where(function (Builder $q) use ($like) {
                $q->whereRaw('LOWER(title) LIKE ?', [$like])
                    ->orWhereRaw('LOWER(description) LIKE ?', [$like])
                    ->orWhereRaw('LOWER(location_label) LIKE ?', [$like]);
            });
        }

        return $query->orWhereHas('city', fn (Builder $c) => $c->whereRaw('LOWER(name) LIKE ?', ['%'.mb_strtolower($term).'%']))
            ->orWhereHas('province', fn (Builder $c) => $c->whereRaw('LOWER(name) LIKE ?', ['%'.mb_strtolower($term).'%']))
            ->orWhereHas('vehicleDetail', function (Builder $v) use ($term) {
                $like = '%'.mb_strtolower($term).'%';
                $v->whereRaw('LOWER(brand) LIKE ?', [$like])
                    ->orWhereRaw('LOWER(model) LIKE ?', [$like]);
            });
    }

    public function getPrimaryImageUrlAttribute(): string
    {
        return $this->primaryImage?->url ?? $this->images->first()?->url ?? asset('images/placeholder.svg');
    }

    public function getPriceFormattedAttribute(): string
    {
        return 'Rp '.number_format((float) $this->price, 0, ',', '.');
    }

    public function getLocationFullAttribute(): string
    {
        $parts = collect([$this->district?->name, $this->city?->name, $this->province?->name])
            ->filter()
            ->unique()
            ->values();

        return $parts->isEmpty() ? ($this->location_label ?? '-') : $parts->implode(', ');
    }

    public function isVehicle(): bool
    {
        return $this->category?->type === 'vehicle';
    }

    public function isProperty(): bool
    {
        return $this->category?->type === 'property';
    }
}