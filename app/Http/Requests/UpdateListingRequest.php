<?php

namespace App\Http\Requests;

class UpdateListingRequest extends StoreListingRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'province_id' => $this->province_id ?: null,
            'city_id' => $this->city_id ?: null,
            'district_id' => $this->district_id ?: null,
            'primary_image_id' => ($this->primary_image_id && $this->primary_image_id !== 'null') ? (int) $this->primary_image_id : null,
            'price' => $this->price !== null ? preg_replace('/[^\d]/', '', (string) $this->price) : null,
        ]);
    }

    public function rules(): array
    {
        $rules = parent::rules();

        unset($rules['images']);

        $rules['images'] = ['nullable', 'array', 'max:20'];
        $rules['images.*'] = ['image', 'mimes:jpg,jpeg,png,webp', 'max:10240'];
        $rules['deleted_images'] = ['nullable', 'array'];
        $rules['deleted_images.*'] = ['nullable', 'integer'];
        $rules['primary_image_id'] = ['nullable', 'integer'];

        return $rules;
    }
}