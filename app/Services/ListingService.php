<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ListingService
{
    public function __construct(private readonly ImageService $imageService) {}

    public function create(array $data, int $userId, array $images = []): Listing
    {
        $listing = Listing::create([
            'user_id' => $userId,
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'slug' => $this->uniqueSlug($data['title']),
            'description' => $data['description'],
            'price' => $data['price'],
            'province_id' => $data['province_id'] ?? null,
            'city_id' => $data['city_id'] ?? null,
            'district_id' => $data['district_id'] ?? null,
            'location_label' => $data['location_label'] ?? null,
            'address' => $data['address'] ?? null,
            'status' => $data['status'] ?? Listing::STATUS_PUBLISHED,
        ]);

        $this->saveDetails($listing, $data);
        $this->syncImages($listing, $images);

        return $listing;
    }

    public function update(Listing $listing, array $data, array $images = []): Listing
    {
        $listing->update([
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'province_id' => $data['province_id'] ?? null,
            'city_id' => $data['city_id'] ?? null,
            'district_id' => $data['district_id'] ?? null,
            'location_label' => $data['location_label'] ?? null,
            'address' => $data['address'] ?? null,
        ]);

        $this->saveDetails($listing, $data);

        if (! empty($images)) {
            $this->syncImages($listing, $images);
        }

        return $listing;
    }

    public function saveDetails(Listing $listing, array $data): void
    {
        if ($listing->isProperty()) {
            $listing->propertyDetail()?->delete();
            $listing->propertyDetail()->create([
                'land_area' => $data['land_area'] ?? null,
                'building_area' => $data['building_area'] ?? null,
                'bedrooms' => $data['bedrooms'] ?? null,
                'bathrooms' => $data['bathrooms'] ?? null,
                'garage' => $data['garage'] ?? null,
                'floors' => $data['floors'] ?? null,
                'certificate' => $data['certificate'] ?? null,
                'land_status' => $data['land_status'] ?? null,
                'building_status' => $data['building_status'] ?? null,
                'facilities' => $data['facilities'] ?? null,
            ]);
        } elseif ($listing->isVehicle()) {
            $brochureUrl = $data['brochure_url'] ?? null;
            if (isset($data['brochure_file']) && $data['brochure_file'] instanceof \Illuminate\Http\UploadedFile) {
                $path = $data['brochure_file']->store('brochures', 'public');
                $brochureUrl = \Illuminate\Support\Facades\Storage::disk('public')->url($path);
            }

            $listing->vehicleDetail()?->delete();
            $listing->vehicleDetail()->create([
                'brand' => $data['brand'],
                'model' => $data['model'],
                'year' => $data['year'],
                'mileage' => $data['mileage'] ?? 0,
                'transmission' => $data['transmission'] ?? null,
                'fuel_type' => $data['fuel_type'] ?? null,
                'color' => $data['color'] ?? null,
                'condition' => $data['condition'] ?? 'used',
                'engine_capacity' => $data['engine_capacity'] ?? null,
                'license_plate' => $data['license_plate'] ?? null,
                'brochure_url' => $brochureUrl,
                'promo_package' => $data['promo_package'] ?? null,
                'warranty_info' => $data['warranty_info'] ?? null,
                'honda_features' => $data['honda_features'] ?? null,
                'color_options' => $data['color_options'] ?? null,
                'bonus_accessories' => $data['bonus_accessories'] ?? null,
            ]);
        }
    }

    public function syncImages(Listing $listing, array $paths): void
    {
        $count = $listing->images()->count();

        foreach ($paths as $i => $path) {
            ListingImage::create([
                'listing_id' => $listing->id,
                'image_path' => $path,
                'is_primary' => $count === 0 && $i === 0,
                'sort_order' => $count + $i,
            ]);
        }
    }

    public function addImage(Listing $listing, string $path): ListingImage
    {
        $image = ListingImage::create([
            'listing_id' => $listing->id,
            'image_path' => $path,
            'is_primary' => $listing->images()->count() === 0,
            'sort_order' => $listing->images()->count(),
        ]);

        return $image;
    }

    public function removeImage(ListingImage $image): void
    {
        $listing = $image->listing;
        $this->imageService->delete($image->image_path);
        $image->delete();

        if ($image->is_primary && ! $listing->images()->where('is_primary', true)->exists()) {
            $listing->images()->orderBy('sort_order')->first()?->update(['is_primary' => true]);
        }
    }

    public function setPrimary(ListingImage $image): void
    {
        $image->listing->images()->update(['is_primary' => false]);
        $image->update(['is_primary' => true]);
    }

    public function delete(Listing $listing): void
    {
        $paths = $listing->images()->pluck('image_path');
        $listing->delete();

        foreach ($paths as $path) {
            $this->imageService->delete($path);
        }
    }

    public function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i = 1;

        while (Listing::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base.'-'.($i++);
        }

        return $slug;
    }

    public function categoryOptions(): Collection
    {
        return Category::active()
            ->whereNotNull('parent_id')
            ->orderBy('sort_order')
            ->get();
    }
}