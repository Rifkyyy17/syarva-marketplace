<?php

namespace App\Http\Requests;

class UpdateListingRequest extends StoreListingRequest
{
    public function rules(): array
    {
        $rules = parent::rules();

        unset($rules['images']);

        $rules['images'] = ['nullable', 'array', 'max:8'];
        $rules['images.*'] = ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'];

        return $rules;
    }
}