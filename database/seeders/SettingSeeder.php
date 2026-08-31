<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name' => 'SYARVA Marketplace',
            'site_tagline' => 'Temukan Rumah, Tanah & Mobil Impian Anda',
            'site_description' => 'Marketplace properti dan otomotif terpercaya di Indonesia. Jual beli rumah, tanah, mobil baru, dan mobil bekas dengan mudah dan aman.',
            'site_logo' => null,
            'site_favicon' => null,
            'seo_title' => 'SYARVA Marketplace — Jual Beli Rumah, Tanah & Mobil',
            'seo_description' => 'Cari dan pasang iklan rumah, tanah, mobil baru, dan mobil bekas di SYARVA Marketplace. Ribuan listing properti dan otomotif dari penjual terpercaya.',
            'seo_keywords' => 'jual rumah, jual tanah, jual mobil, mobil baru, mobil bekas, properti, otomotif, marketplace',
            'contact_phone' => '081234567890',
            'contact_email' => 'halo@syarva.test',
            'contact_address' => 'Jl. Raya Bogor No. 123, Kota Bogor, Jawa Barat',
            'contact_whatsapp' => '6281234567890',
            'social_facebook' => 'https://facebook.com/syarva',
            'social_instagram' => 'https://instagram.com/syarva',
            'social_twitter' => 'https://twitter.com/syarva',
            'social_youtube' => 'https://youtube.com/@syarva',
            'admin_pending_notification' => '1',
            'site_announcement' => null,
        ];

        foreach ($settings as $key => $value) {
            Setting::firstOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}