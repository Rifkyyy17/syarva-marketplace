<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Listing;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::active()
            ->whereNotNull('parent_id')
            ->withCount(['listings' => fn ($q) => $q->published()])
            ->orderBy('sort_order')
            ->get();

        $featured = Listing::published()
            ->featured()
            ->with(['category', 'city', 'province', 'primaryImage', 'vehicleDetail', 'propertyDetail'])
            ->latest()
            ->limit(8)
            ->get();

        $latest = Listing::published()
            ->with(['category', 'city', 'province', 'primaryImage', 'vehicleDetail', 'propertyDetail'])
            ->latest()
            ->limit(8)
            ->get();

        $stats = [
            'listings' => Listing::published()->count(),
            'cities' => City::count(),
            'sellers' => User::where('role', 'user')->where('status', 'active')->count(),
        ];

        $popularCities = City::withCount(['listings' => fn ($q) => $q->published()])
            ->orderByDesc('listings_count')
            ->limit(8)
            ->get()
            ->filter(fn (City $city) => $city->listings_count > 0)
            ->values();

        return view('home.index', compact('categories', 'featured', 'latest', 'stats', 'popularCities'));
    }
}