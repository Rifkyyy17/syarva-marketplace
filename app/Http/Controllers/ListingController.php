<?php

namespace App\Http\Controllers;

use App\Events\ListingViewed;
use App\Models\Category;
use App\Models\Listing;
use App\Services\SearchService;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function __construct(private readonly SearchService $searchService) {}

    public function index(Request $request, ?string $kategori = null)
    {
        $filters = $request->only([
            'category', 'q', 'type', 'province_id', 'city_id', 'district_id',
            'min_price', 'max_price',
            'min_land_area', 'max_land_area', 'min_building_area', 'bedrooms', 'bathrooms', 'certificate',
            'brand', 'model', 'min_year', 'max_year', 'transmission', 'fuel_type', 'condition',
        ]);

        $category = match ($kategori) {
            'rumah' => Category::where('slug', 'rumah')->first(),
            'tanah' => Category::where('slug', 'tanah')->first(),
            'baru' => Category::where('slug', 'mobil-baru')->first(),
            'second' => Category::where('slug', 'mobil-second')->first(),
            default => null,
        };

        if (! $category && ! empty($filters['category'])) {
            $category = Category::where('slug', $filters['category'])->first();
        }

        $query = $this->searchService->listings($filters, $category);
        $query = $this->searchService->sort($query, $request->input('sort', 'newest'));

        $listings = $query->paginate(12)->withQueryString();

        $subcategories = $category
            ? collect([$category])
            : Category::active()->whereNotNull('parent_id')->orderBy('sort_order')->get();

        $brands = \App\Models\VehicleDetail::query()
            ->distinct()
            ->orderBy('brand')
            ->pluck('brand');

        $cities = \App\Models\City::withCount(['listings' => fn ($q) => $q->published()])
            ->orderByDesc('listings_count')
            ->limit(50)
            ->get()
            ->filter(fn ($city) => $city->listings_count > 0)
            ->values();

        $activeFilters = collect($filters)->filter(fn ($v) => $v !== null && $v !== '' && $v !== [])->count();

        return view('listings.index', compact(
            'listings', 'category', 'filters', 'subcategories', 'brands', 'cities', 'activeFilters'
        ));
    }

    public function show(string $slug)
    {
        $listing = Listing::published()
            ->with([
                'user', 'category', 'province', 'city', 'district',
                'images', 'primaryImage', 'vehicleDetail', 'propertyDetail',
                'inquiries',
            ])
            ->where('slug', $slug)
            ->first();

        if (! $listing) {
            abort(404);
        }

        ListingViewed::dispatch($listing);

        $related = Listing::published()
            ->where('category_id', $listing->category_id)
            ->where('id', '!=', $listing->id)
            ->with(['category', 'city', 'primaryImage', 'vehicleDetail', 'propertyDetail'])
            ->latest()
            ->limit(4)
            ->get();

        return view('listings.show', compact('listing', 'related'));
    }
}