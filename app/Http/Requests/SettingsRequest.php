<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    public function rules(): array
    {
        $section = $this->route('section') ?? 'website';

        return match ($section) {
            'icons' => [
                'icon_category_rumah' => ['nullable', 'string', 'max:50'],
                'icon_category_tanah' => ['nullable', 'string', 'max:50'],
                'icon_category_mobil_baru' => ['nullable', 'string', 'max:50'],
                'icon_category_mobil_second' => ['nullable', 'string', 'max:50'],
                'icon_service_jual_mobil' => ['nullable', 'string', 'max:50'],
                'icon_service_properti' => ['nullable', 'string', 'max:50'],
                'icon_service_test_drive' => ['nullable', 'string', 'max:50'],
                'icon_feature_1' => ['nullable', 'string', 'max:50'],
                'title_feature_1' => ['nullable', 'string', 'max:100'],
                'desc_feature_1' => ['nullable', 'string', 'max:255'],
                'icon_feature_2' => ['nullable', 'string', 'max:50'],
                'title_feature_2' => ['nullable', 'string', 'max:100'],
                'desc_feature_2' => ['nullable', 'string', 'max:255'],
                'icon_feature_3' => ['nullable', 'string', 'max:50'],
                'title_feature_3' => ['nullable', 'string', 'max:100'],
                'desc_feature_3' => ['nullable', 'string', 'max:255'],
            ],
            'seo' => [
                'seo_title' => ['nullable', 'string', 'max:200'],
                'seo_description' => ['nullable', 'string', 'max:300'],
                'seo_keywords' => ['nullable', 'string', 'max:300'],
            ],
            'contact' => [
                'contact_phone' => ['nullable', 'string', 'max:30'],
                'contact_email' => ['nullable', 'email', 'max:150'],
                'contact_address' => ['nullable', 'string', 'max:300'],
                'contact_whatsapp' => ['nullable', 'string', 'max:30'],
            ],
            'social' => [
                'social_facebook' => ['nullable', 'url', 'max:200'],
                'social_instagram' => ['nullable', 'url', 'max:200'],
                'social_twitter' => ['nullable', 'url', 'max:200'],
                'social_youtube' => ['nullable', 'url', 'max:200'],
            ],
            'ai' => [
                'gemini_api_key' => ['nullable', 'string', 'max:255'],
                'gemini_model' => ['nullable', 'string', 'max:50'],
                'ai_welcome_message' => ['nullable', 'string', 'max:500'],
            ],
            default => [
                'site_name' => ['required', 'string', 'max:100'],
                'site_tagline' => ['nullable', 'string', 'max:200'],
                'site_description' => ['nullable', 'string', 'max:500'],
                'site_announcement' => ['nullable', 'string', 'max:500'],
                'site_logo' => ['nullable', 'image', 'mimes:png,jpg,jpeg,svg,webp', 'max:2048'],
                'site_favicon' => ['nullable', 'mimes:ico,png,svg,webp', 'max:1024'],
                'remove_logo' => ['nullable', 'boolean'],
                'remove_favicon' => ['nullable', 'boolean'],
            ],
        };
    }

    public function messages(): array
    {
        return [
            'site_name.required' => 'Nama website wajib diisi.',
        ];
    }
}