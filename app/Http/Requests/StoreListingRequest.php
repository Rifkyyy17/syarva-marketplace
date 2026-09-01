<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreListingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('price')) {
            $rawPrice = preg_replace('/[^\d]/', '', (string) $this->input('price'));
            $this->merge([
                'price' => $rawPrice !== '' ? (float) $rawPrice : null,
            ]);
        }

        if ($this->has('mileage')) {
            $rawMileage = preg_replace('/[^\d]/', '', (string) $this->input('mileage'));
            $this->merge([
                'mileage' => $rawMileage !== '' ? (float) $rawMileage : 0,
            ]);
        }

        $this->merge([
            'province_id' => $this->input('province_id') ?: null,
            'city_id' => $this->input('city_id') ?: null,
            'district_id' => $this->input('district_id') ?: null,
        ]);
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
            'title.required' => 'Judul iklan wajib diisi.',
            'price.required' => 'Harga wajib diisi.',
            'price.numeric' => 'Harga harus berupa nominal angka valid.',
            'description.required' => 'Deskripsi listing wajib diisi.',
            'province_id.exists' => 'Provinsi yang dipilih tidak ditemukan.',
            'city_id.exists' => 'Kota/Kabupaten yang dipilih tidak ditemukan.',
            'district_id.exists' => 'Kecamatan yang dipilih tidak ditemukan.',
            'images.*.image' => 'File harus berupa gambar valid.',
            'images.*.mimes' => 'Format gambar harus JPG, PNG, atau WebP.',
            'images.*.max' => 'Ukuran gambar maksimal 10 MB per file.',
        ];
    }

    public function rules(): array
    {
        $category = Category::find($this->input('category_id'));

        return array_merge($this->baseRules(), $this->typeRules($category));
    }

    private function baseRules(): array
    {
        $hasBrochureOrExtracted = $this->filled('brochure_url') || $this->hasFile('brochure_file') || !empty($this->input('extracted_images'));

        return [
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['required', 'string', 'min:10', 'max:25000'],
            'price' => ['required', 'numeric', 'min:1', 'max:9999999999999'],
            'province_id' => ['nullable', 'exists:provinces,id'],
            'city_id' => ['nullable', 'exists:cities,id'],
            'district_id' => ['nullable', 'exists:districts,id'],
            'location_label' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:500'],
            'images' => [$hasBrochureOrExtracted ? 'nullable' : 'required', 'array', 'max:20'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'extracted_images' => ['nullable', 'array'],
            'extracted_images.*' => ['string'],
        ];
    }

    private function typeRules(?Category $category): array
    {
        if (! $category) {
            return ['category_id' => ['required', 'exists:categories,id']];
        }

        if ($category->isProperty()) {
            return [
                'land_area' => ['nullable', 'numeric', 'min:0', 'max:10000000'],
                'building_area' => ['nullable', 'numeric', 'min:0', 'max:10000000'],
                'bedrooms' => ['nullable', 'integer', 'min:0', 'max:100'],
                'bathrooms' => ['nullable', 'integer', 'min:0', 'max:100'],
                'garage' => ['nullable', 'integer', 'min:0', 'max:50'],
                'floors' => ['nullable', 'integer', 'min:0', 'max:50'],
                'certificate' => ['nullable', 'string', Rule::in(['SHM', 'SHGB', 'Girik', 'Akta Jual Beli', 'Lainnya'])],
                'land_status' => ['nullable', 'string', 'max:255'],
                'building_status' => ['nullable', 'string', 'max:255'],
                'facilities' => ['nullable', 'array', 'max:50'],
                'facilities.*' => ['string', 'max:100'],
            ];
        }

        return [
            'brand' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'year' => ['required', 'integer', 'min:1990', 'max:'.(date('Y') + 1)],
            'mileage' => ['nullable', 'numeric', 'min:0', 'max:9999999'],
            'transmission' => ['nullable', 'string', Rule::in(['MT', 'AT', 'CVT', 'DCT'])],
            'fuel_type' => ['nullable', 'string', Rule::in(['Bensin', 'Diesel', 'Listrik', 'Hybrid'])],
            'condition' => ['required', 'string', Rule::in(['new', 'used'])],
            'engine_capacity' => ['nullable', 'string', 'max:255'],
            'color' => ['nullable', 'string', 'max:255'],
            'license_plate' => ['nullable', 'string', 'max:50'],
            'brochure_url' => ['nullable', 'string', 'max:500'],
            'brochure_file' => ['nullable', 'file', 'mimes:pdf', 'max:25600'],
            'promo_package' => ['nullable', 'string', 'max:5000'],
            'warranty_info' => ['nullable', 'string', 'max:5000'],
            'honda_features' => ['nullable', 'array', 'max:50'],
            'honda_features.*' => ['string', 'max:255'],
            'color_options' => ['nullable', 'string', 'max:5000'],
            'bonus_accessories' => ['nullable', 'string', 'max:5000'],
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Pilih kategori listing.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
            'title.required' => 'Judul iklan listing wajib diisi.',
            'title.min' => 'Judul minimal 3 karakter.',
            'title.max' => 'Judul maksimal 255 karakter.',
            'description.required' => 'Deskripsi listing wajib diisi.',
            'description.min' => 'Deskripsi minimal 10 karakter.',
            'description.max' => 'Deskripsi terlalu panjang (maksimal 25.000 karakter).',
            'price.required' => 'Harga listing wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.min' => 'Harga harus lebih dari 0.',
            'images.required' => 'Minimal unggah 1 foto untuk listing ini.',
            'images.*.image' => 'File yang diunggah harus berupa gambar.',
            'images.*.mimes' => 'Format foto harus JPG, JPEG, PNG, atau WebP.',
            'images.*.max' => 'Ukuran foto maksimal 10 MB per gambar.',
            'brand.required' => 'Merk/Brand kendaraan wajib diisi.',
            'model.required' => 'Model/Tipe kendaraan wajib diisi.',
            'year.required' => 'Tahun pembuatan unit wajib dipilih.',
            'year.min' => 'Tahun minimal 1990.',
            'year.max' => 'Tahun unit tidak valid.',
            'condition.required' => 'Kondisi unit (Baru/Bekas) wajib dipilih.',
            'engine_capacity.max' => 'Spesifikasi kapasitas mesin maksimal 255 karakter.',
            'color.max' => 'Warna unit maksimal 255 karakter.',
            'promo_package.max' => 'Paket promo maksimal 5.000 karakter.',
            'warranty_info.max' => 'Informasi garansi maksimal 5.000 karakter.',
            'color_options.max' => 'Pilihan warna maksimal 5.000 karakter.',
            'bonus_accessories.max' => 'Bonus aksesoris maksimal 5.000 karakter.',
        ];
    }
}