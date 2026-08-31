<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Listing;
use Illuminate\Database\Eloquent\Builder;

class SearchService
{
    public function listings(array $filters, ?Category $category = null): Builder
    {
        $query = Listing::query()
            ->with(['category', 'city', 'province', 'district', 'primaryImage', 'vehicleDetail', 'propertyDetail'])
            ->published();

        if ($category) {
            $query->where('category_id', $category->id);
        } elseif (isset($filters['type'])) {
            $typeIds = Category::active()
                ->where('type', $filters['type'])
                ->whereNotNull('parent_id')
                ->pluck('id');

            if ($typeIds->isNotEmpty()) {
                $query->whereIn('category_id', $typeIds);
            }
        }

        if (! empty($filters['q'])) {
            $query->search($filters['q']);
        }

        if (! empty($filters['city_id'])) {
            $query->where('city_id', $filters['city_id']);
        }

        if (! empty($filters['province_id'])) {
            $query->where('province_id', $filters['province_id']);
        }

        if (! empty($filters['district_id'])) {
            $query->where('district_id', $filters['district_id']);
        }

        if (isset($filters['min_price']) && is_numeric($filters['min_price'])) {
            $query->where('price', '>=', $filters['min_price']);
        }

        if (isset($filters['max_price']) && is_numeric($filters['max_price'])) {
            $query->where('price', '<=', $filters['max_price']);
        }

        if (($category && $category->isProperty()) || ($filters['type'] ?? null) === 'property') {
            $this->applyPropertyFilters($query, $filters);
        }

        if (($category && ! $category->isProperty()) || ($filters['type'] ?? null) === 'vehicle') {
            $this->applyVehicleFilters($query, $filters);
        }

        return $query;
    }

    private function applyPropertyFilters(Builder $query, array $filters): void
    {
        if (! empty($filters['min_land_area']) && is_numeric($filters['min_land_area'])) {
            $query->whereHas('propertyDetail', fn (Builder $q) => $q->where('land_area', '>=', $filters['min_land_area']));
        }

        if (! empty($filters['max_land_area']) && is_numeric($filters['max_land_area'])) {
            $query->whereHas('propertyDetail', fn (Builder $q) => $q->where('land_area', '<=', $filters['max_land_area']));
        }

        if (! empty($filters['min_building_area']) && is_numeric($filters['min_building_area'])) {
            $query->whereHas('propertyDetail', fn (Builder $q) => $q->where('building_area', '>=', $filters['min_building_area']));
        }

        if (! empty($filters['bedrooms']) && is_numeric($filters['bedrooms'])) {
            $query->whereHas('propertyDetail', fn (Builder $q) => $q->where('bedrooms', '>=', $filters['bedrooms']));
        }

        if (! empty($filters['bathrooms']) && is_numeric($filters['bathrooms'])) {
            $query->whereHas('propertyDetail', fn (Builder $q) => $q->where('bathrooms', '>=', $filters['bathrooms']));
        }

        if (! empty($filters['certificate'])) {
            $query->whereHas('propertyDetail', fn (Builder $q) => $q->where('certificate', $filters['certificate']));
        }
    }

    private function applyVehicleFilters(Builder $query, array $filters): void
    {
        if (! empty($filters['brand'])) {
            $query->whereHas('vehicleDetail', fn (Builder $q) => $q->where('brand', $filters['brand']));
        }

        if (! empty($filters['model'])) {
            $query->whereHas('vehicleDetail', fn (Builder $q) => $q->whereRaw('LOWER(model) LIKE ?', ['%'.mb_strtolower($filters['model']).'%']));
        }

        if (! empty($filters['min_year']) && is_numeric($filters['min_year'])) {
            $query->whereHas('vehicleDetail', fn (Builder $q) => $q->where('year', '>=', $filters['min_year']));
        }

        if (! empty($filters['max_year']) && is_numeric($filters['max_year'])) {
            $query->whereHas('vehicleDetail', fn (Builder $q) => $q->where('year', '<=', $filters['max_year']));
        }

        if (! empty($filters['transmission'])) {
            $query->whereHas('vehicleDetail', fn (Builder $q) => $q->where('transmission', $filters['transmission']));
        }

        if (! empty($filters['fuel_type'])) {
            $query->whereHas('vehicleDetail', fn (Builder $q) => $q->where('fuel_type', $filters['fuel_type']));
        }

        if (! empty($filters['condition'])) {
            $query->whereHas('vehicleDetail', fn (Builder $q) => $q->where('condition', $filters['condition']));
        }
    }

    public function sort(Builder $query, ?string $sort): Builder
    {
        return match ($sort) {
            'price_asc' => $query->orderBy('price'),
            'price_desc' => $query->orderByDesc('price'),
            'newest' => $query->orderByDesc('created_at'),
            'oldest' => $query->orderBy('created_at'),
            'popular' => $query->orderByDesc('view_count'),
            default => $query->orderByDesc('created_at'),
        };
    }
}