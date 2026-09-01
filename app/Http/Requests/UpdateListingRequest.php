<?php

namespace App\Http\Requests;

class UpdateListingRequest extends StoreListingRequest
{
    public function rules(): array
    {
        $rules = parent::rules();

        unset($rules['images']);

        $rules['images'] = ['nullable', 'array', 'max:20'];
        $rules['images.*'] = ['image', 'mimes:jpg,jpeg,png,webp', 'max:10240'];
        $rules['deleted_images'] = ['nullable', 'array'];
        $rules['deleted_images.*'] = ['integer', 'exists:listing_images,id'];
        $rules['primary_image_id'] = ['nullable', 'integer', 'exists:listing_images,id'];

        return $rules;
    }
}