<?php

namespace App\Services;

use App\Models\Favorite;
use App\Models\Listing;
use App\Models\User;

class FavoriteService
{
    public function toggle(User $user, Listing $listing): array
    {
        $favorite = Favorite::where('user_id', $user->id)->where('listing_id', $listing->id)->first();

        if ($favorite) {
            $favorite->delete();

            return ['favorited' => false];
        }

        Favorite::create(['user_id' => $user->id, 'listing_id' => $listing->id]);

        return ['favorited' => true];
    }
}