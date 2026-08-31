<?php

namespace App\Listeners;

use App\Events\ListingViewed;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class RecordListingView
{
    public function handle(ListingViewed $event): void
    {
        $listing = $event->listing;
        $ip = request()->ip();
        $cacheKey = "viewed.{$listing->id}.{$ip}";

        if (Cache::has($cacheKey)) {
            return;
        }

        DB::table('listings')
            ->where('id', $listing->id)
            ->increment('view_count');

        Cache::put($cacheKey, true, 3600);
    }
}
