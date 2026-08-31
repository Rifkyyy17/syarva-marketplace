<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Inquiry;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function listings(Request $request)
    {
        $perCategory = Category::active()
            ->whereNotNull('parent_id')
            ->withCount('listings')
            ->orderBy('sort_order')
            ->get();

        $perStatus = collect(Listing::STATUSES)->map(fn ($s) => [
            'status' => $s,
            'count' => Listing::where('status', $s)->count(),
        ]);

        $monthly = collect(range(5, 0))->map(function ($i) {
            $month = now()->subMonths($i)->startOfMonth();

            return [
                'month' => $month->translatedFormat('M Y'),
                'count' => Listing::whereBetween('created_at', [$month, $month->copy()->endOfMonth()])->count(),
            ];
        });

        $rows = Listing::with(['category', 'user'])
            ->selectRaw('category_id, status, count(*) as total')
            ->groupBy('category_id', 'status')
            ->get();

        return view('admin.reports.listings', compact('perCategory', 'perStatus', 'monthly', 'rows'));
    }

    public function users(Request $request)
    {
        $perRole = collect(['admin', 'seller'])->map(fn ($r) => [
            'role' => $r,
            'count' => User::where('role', $r)->count(),
        ]);

        $perStatus = collect(['active', 'suspended'])->map(fn ($s) => [
            'status' => $s,
            'count' => User::where('status', $s)->count(),
        ]);

        $monthly = collect(range(5, 0))->map(function ($i) {
            $month = now()->subMonths($i)->startOfMonth();

            return [
                'month' => $month->translatedFormat('M Y'),
                'count' => User::whereBetween('created_at', [$month, $month->copy()->endOfMonth()])->count(),
            ];
        });

        return view('admin.reports.users', compact('perRole', 'perStatus', 'monthly'));
    }

    public function inquiries(Request $request)
    {
        $perStatus = collect([Inquiry::STATUS_NEW, Inquiry::STATUS_READ, Inquiry::STATUS_REPLIED])->map(fn ($s) => [
            'status' => $s,
            'count' => Inquiry::where('status', $s)->count(),
        ]);

        $monthly = collect(range(5, 0))->map(function ($i) {
            $month = now()->subMonths($i)->startOfMonth();

            return [
                'month' => $month->translatedFormat('M Y'),
                'count' => Inquiry::whereBetween('created_at', [$month, $month->copy()->endOfMonth()])->count(),
            ];
        });

        $topListings = Listing::with('inquiries')
            ->withCount('inquiries')
            ->orderByDesc('inquiries_count')
            ->limit(10)
            ->get();

        return view('admin.reports.inquiries', compact('perStatus', 'monthly', 'topListings'));
    }
}