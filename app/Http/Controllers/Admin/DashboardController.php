<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\StatsService;

class DashboardController extends Controller
{
    public function __construct(private readonly StatsService $statsService) {}

    public function index()
    {
        $stats = $this->statsService->adminOverview();
        $byCategory = $this->statsService->listingsByCategory();
        $byStatus = $this->statsService->listingsByStatus();
        $listingsPerMonth = $this->statsService->listingsPerMonth(12);
        $usersPerMonth = $this->statsService->usersPerMonth(12);
        $inquiriesPerMonth = $this->statsService->inquiriesPerMonth(12);

        return view('admin.dashboard', compact(
            'stats', 'byCategory', 'byStatus', 'listingsPerMonth', 'usersPerMonth', 'inquiriesPerMonth'
        ));
    }
}