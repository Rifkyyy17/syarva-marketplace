<?php

namespace App\Events;

use App\Models\Listing;
use Illuminate\Foundation\Events\Dispatchable;

class ListingViewed
{
    use Dispatchable;

    public function __construct(public Listing $listing) {}
}