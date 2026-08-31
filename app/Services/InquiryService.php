<?php

namespace App\Services;

use App\Models\Inquiry;
use App\Models\Listing;

class InquiryService
{
    public function create(array $data): Inquiry
    {
        $listing = Listing::findOrFail($data['listing_id']);

        return Inquiry::create([
            'listing_id' => $listing->id,
            'user_id' => $data['user_id'] ?? null,
            'seller_id' => $listing->user_id,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'message' => $data['message'],
            'status' => Inquiry::STATUS_NEW,
        ]);
    }

    public function markStatus(Inquiry $inquiry, string $status): Inquiry
    {
        $inquiry->update(['status' => $status]);

        return $inquiry;
    }
}