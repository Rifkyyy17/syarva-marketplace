<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Inquiry;
use App\Models\Listing;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class StatsService
{
    public function userOverview(int $userId): array
    {
        $inquiries = Inquiry::where('user_id', $userId);
        $favorites = \App\Models\Favorite::where('user_id', $userId);

        return [
            'total_inquiries' => (clone $inquiries)->count(),
            'unread_inquiries' => (clone $inquiries)->where('status', Inquiry::STATUS_NEW)->count(),
            'total_favorites' => (clone $favorites)->count(),
            'recent_listings' => Listing::with(['category', 'primaryImage'])
                ->where('status', Listing::STATUS_PUBLISHED)
                ->latest()
                ->limit(5)
                ->get(),
        ];
    }

    public function adminOverview(): array
    {
        $listings = Listing::query();

        return [
            'total_users' => User::count(),
            'total_buyers' => User::where('role', 'user')->count(),
            'total_listings' => (clone $listings)->count(),
            'total_published' => (clone $listings)->where('status', Listing::STATUS_PUBLISHED)->count(),
            'total_featured' => (clone $listings)->where('featured', true)->count(),
            'total_sold' => (clone $listings)->where('status', Listing::STATUS_SOLD)->count(),
            'total_inquiries' => Inquiry::count(),
            'unread_inquiries' => Inquiry::where('status', Inquiry::STATUS_NEW)->count(),
            'total_views' => (clone $listings)->sum('view_count'),
            'recent_listings' => (clone $listings)
                ->with(['category', 'user', 'primaryImage'])
                ->latest()
                ->limit(6)
                ->get(),
            'recent_inquiries' => Inquiry::with(['listing', 'seller'])
                ->latest()
                ->limit(6)
                ->get(),
        ];
    }

    public function listingsByCategory(): Collection
    {
        return Category::active()
            ->whereNotNull('parent_id')
            ->withCount('listings')
            ->orderBy('sort_order')
            ->get()
            ->map(fn (Category $c) => [
                'label' => $c->name,
                'value' => $c->listings_count,
            ]);
    }

    public function listingsByStatus(): Collection
    {
        return collect(Listing::STATUSES)->map(fn (string $status) => [
            'label' => ucfirst($status),
            'value' => Listing::where('status', $status)->count(),
        ]);
    }

    public function listingsPerMonth(int $months = 12): Collection
    {
        return $this->seriesPerMonth($months, fn (Carbon $start, Carbon $end) => Listing::whereBetween('created_at', [$start, $end])->count());
    }

    public function usersPerMonth(int $months = 12): Collection
    {
        return $this->seriesPerMonth($months, fn (Carbon $start, Carbon $end) => User::whereBetween('created_at', [$start, $end])->count());
    }

    public function inquiriesPerMonth(int $months = 12): Collection
    {
        return $this->seriesPerMonth($months, fn (Carbon $start, Carbon $end) => Inquiry::whereBetween('created_at', [$start, $end])->count());
    }

    private function seriesPerMonth(int $months, callable $counter): Collection
    {
        $labels = [];
        $values = [];
        $now = Carbon::now()->startOfMonth();

        for ($i = $months - 1; $i >= 0; $i--) {
            $start = $now->copy()->subMonths($i)->startOfMonth();
            $end = $now->copy()->subMonths($i)->endOfMonth();
            $labels[] = $start->translatedFormat('M Y');
            $values[] = $counter($start, $end);
        }

        return collect(['labels' => $labels, 'values' => $values]);
    }
}