<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Starter (Gratis)',
                'slug' => 'starter',
                'description' => 'Cocok untuk pemilik pribadi yang ingin mencoba pasang iklan rumah atau kendaraan.',
                'price' => 0,
                'duration_days' => 30,
                'listing_limit' => 3,
                'featured_limit' => 0,
                'badge_label' => 'FREE',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 1,
                'features' => [
                    'Maksimal 3 Listing Aktif',
                    'Durasi Tayang 30 Hari',
                    'Galeri hingga 5 Foto per Listing',
                    'Direct Chat WhatsApp Pembeli',
                    'Formulir Pesan / Inquiry Online',
                    'Statistik Jumlah View Iklan',
                ],
            ],
            [
                'name' => 'Pro Agen',
                'slug' => 'pro-agen',
                'description' => 'Pilihan terfavorit bagi agen properti independen & showroom mobil bekas.',
                'price' => 99000,
                'duration_days' => 30,
                'listing_limit' => 20,
                'featured_limit' => 3,
                'badge_label' => 'POPULER',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
                'features' => [
                    'Maksimal 20 Listing Aktif',
                    '3 Slot Iklan Unggulan (Featured di Home)',
                    'Badge Verified Agent / Penjual Terpercaya',
                    'Galeri hingga 15 Foto HD per Listing',
                    'Prioritas Tampil di Hasil Pencarian',
                    'Direct Chat WhatsApp & Fast Call',
                    'Laporan Kinerja & Leads Masuk',
                ],
            ],
            [
                'name' => 'Enterprise / Dealer',
                'slug' => 'enterprise-dealer',
                'description' => 'Solusi terlengkap untuk kantor broker properti, developer perumahan, dan dealer mobil resmi.',
                'price' => 299000,
                'duration_days' => 30,
                'listing_limit' => 100,
                'featured_limit' => 15,
                'badge_label' => 'TERBAIK',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 3,
                'features' => [
                    'Maksimal 100 Listing Aktif',
                    '15 Slot Iklan Unggulan (Featured Prioritas)',
                    'Badge Official Partner / Developer',
                    'Galeri Foto Unlimited & Video Virtual Tour',
                    'Listing Muncul di Banner Rekomendasi Utama',
                    'Dedicated WhatsApp Leads Routing',
                    'Dukungan Bantuan CS Prioritas 24/7',
                ],
            ],
        ];

        foreach ($plans as $plan) {
            Plan::updateOrCreate(['slug' => $plan['slug']], $plan);
        }
    }
}
