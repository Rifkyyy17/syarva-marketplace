<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\City;
use App\Models\District;
use App\Models\Listing;
use App\Models\ListingImage;
use App\Models\PropertyDetail;
use App\Models\User;
use App\Models\VehicleDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ListingSeeder extends Seeder
{
    private function placeholder(string $label, string $colorA, string $colorB, int $index): string
    {
        $svgs = [
            "house" => '<rect width="240" height="160" rx="0" fill="#e5e7eb"/><path d="M120 30 L200 90 H175 V130 H65 V90 H40 Z" fill="{colorA}"/><rect x="100" y="105" width="40" height="25" fill="{colorB}"/>',
            "land" => '<rect width="240" height="160" rx="0" fill="#e5e7eb"/><path d="M0 160 L80 60 L160 160 Z" fill="{colorA}"/><path d="M80 60 L200 10 L240 60 L160 160 Z" fill="{colorB}"/>',
            "car" => '<rect width="240" height="160" rx="0" fill="#e5e7eb"/><rect x="30" y="75" width="180" height="45" rx="12" fill="{colorA}"/><path d="M60 75 L85 45 H155 L180 75 Z" fill="{colorA}"/><rect x="115" y="52" width="45" height="22" rx="6" fill="#cbd5e1"/><circle cx="75" cy="122" r="14" fill="#334155"/><circle cx="165" cy="122" r="14" fill="#334155"/>',
        ];

        $shape = match (true) {
            str_contains(strtolower($label), 'tanah') => $svgs['land'],
            str_contains(strtolower($label), 'mobil') => $svgs['car'],
            default => $svgs['house'],
        };

        $svg = str_replace(
            ['{colorA}', '{colorB}'],
            [$colorA, $colorB],
            $shape
        );

        $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="240" height="160" viewBox="0 0 240 160">'.$svg.'<text x="120" y="150" font-family="Arial" font-size="11" fill="#6b7280" text-anchor="middle">'.htmlspecialchars($label, ENT_QUOTES).'</text></svg>';

        $path = 'placeholders/'.Str::slug($label).'-'.$index.'.svg';
        Storage::disk('public')->put($path, $svg);

        return $path;
    }

    public function run(): void
    {
        $admin = User::where('email', 'admin@syarva.test')->firstOrFail();

        $rumah = Category::where('slug', 'rumah')->firstOrFail();
        $tanah = Category::where('slug', 'tanah')->firstOrFail();
        $mobilBaru = Category::where('slug', 'mobil-baru')->firstOrFail();
        $mobilSecond = Category::where('slug', 'mobil-second')->firstOrFail();

        $loc = function (string $cityName, string $districtName): array {
            $district = District::where('name', $districtName)->first();
            if (! $district) {
                return [null, null, null];
            }

            return [$district->city->province_id, $district->city_id, $district->id];
        };

        $listings = [
            [
                'user' => $admin,
                'category' => $rumah,
                'title' => 'Rumah Modern 2 Lantai di Bogor Selatan',
                'price' => 1850000000,
                'status' => 'published',
                'featured' => true,
                'location' => ['Bogor', 'Bogor Selatan'],
                'address' => 'Jl. Pahlawan No. 12, Bogor Selatan',
                'description' => 'Rumah modern 2 lantai dengan desain minimalis dan pencahayaan alami. Lingkungan asri dan aman, dekat dengan pusat kota, sekolah, dan pusat perbelanjaan. Halaman luas cocok untuk keluarga.',
                'placeholder' => ['Rumah Modern Bogor', '#0f766e', '#14b8a6'],
                'property' => ['land_area' => 120, 'building_area' => 180, 'bedrooms' => 4, 'bathrooms' => 3, 'garage' => 2, 'floors' => 2, 'certificate' => 'SHM', 'facilities' => ['Garasi', 'Taman', 'Air PAM', 'Listrik 2200W']],
            ],
            [
                'user' => $admin,
                'category' => $rumah,
                'title' => 'Rumah Minimalis Tipe 45 di Depok',
                'price' => 780000000,
                'status' => 'pending',
                'featured' => false,
                'location' => ['Depok', 'Beji'],
                'address' => 'Perum Griya Asri Blok C2 No. 8, Beji',
                'description' => 'Rumah minimalis tipe 45 dengan SHM, cocok untuk pasangan muda. Lokasi strategis dekat kampus dan akses tol. Sudah termasuk pagar dan keramik.',
                'placeholder' => ['Rumah Minimalis Depok', '#7c3aed', '#a78bfa'],
                'property' => ['land_area' => 60, 'building_area' => 45, 'bedrooms' => 2, 'bathrooms' => 1, 'garage' => 1, 'floors' => 1, 'certificate' => 'SHM', 'facilities' => ['Parkir', 'Listrik 1300W']],
            ],
            [
                'user' => $admin,
                'category' => $rumah,
                'title' => 'Rumah Cluster Modern di Bandung Utara',
                'price' => 2450000000,
                'status' => 'published',
                'featured' => true,
                'location' => ['Bandung', 'Cidadap'],
                'address' => 'Cluster Emerald Residence, Cidadap',
                'description' => 'Rumah dalam cluster premium dengan keamanan 24 jam, clubhouse, dan kolam renang. Udara sejuk khas Bandung Utara. Minimalis elegan dengan material berkualitas.',
                'placeholder' => ['Rumah Cluster Bandung', '#b45309', '#fbbf24'],
                'property' => ['land_area' => 96, 'building_area' => 140, 'bedrooms' => 3, 'bathrooms' => 2, 'garage' => 2, 'floors' => 2, 'certificate' => 'SHM', 'facilities' => ['Keamanan 24 Jam', 'Kolam Renang', 'Clubhouse', 'Listrik 4400W']],
            ],
            [
                'user' => $admin,
                'category' => $tanah,
                'title' => 'Tanah Kavling Siap Bangun 200 m² di Bogor',
                'price' => 950000000,
                'status' => 'published',
                'featured' => true,
                'location' => ['Bogor', 'Tanah Sareal'],
                'address' => 'Kavling Griya Indah, Tanah Sareal',
                'description' => 'Tanah kavling siap bangun dengan SHM, datar, dan dekat jalan utama. Cocok untuk rumah tinggal maupun investasi. Lokasi berkembang dengan akses mudah.',
                'placeholder' => ['Tanah Kavling Bogor', '#059669', '#34d399'],
                'property' => ['land_area' => 200, 'certificate' => 'SHM', 'land_status' => 'Kavling'],
            ],
            [
                'user' => $admin,
                'category' => $tanah,
                'title' => 'Tanah Sawah Strategis di Sleman, Yogyakarta',
                'price' => 450000000,
                'status' => 'published',
                'featured' => false,
                'location' => ['Sleman', 'Ngaglik'],
                'address' => 'Dusun Kembang, Ngaglik, Sleman',
                'description' => 'Tanah sawah 1.500 m² dengan irigasi lancar dan akses mobil. Potensi besar untuk pengembangan perumahan maupun pertanian. Sertifikat lengkap.',
                'placeholder' => ['Tanah Sleman', '#4d7c0f', '#a3e635'],
                'property' => ['land_area' => 1500, 'certificate' => 'SHM', 'land_status' => 'Sawah'],
            ],
            [
                'user' => $admin,
                'category' => $mobilBaru,
                'title' => 'Toyota Avanza 1.5 G CVT Tipe Baru',
                'price' => 265000000,
                'status' => 'published',
                'featured' => true,
                'location' => ['Jakarta Selatan', 'Kebayoran Baru'],
                'address' => 'Jl. Senopati No. 88, Kebayoran Baru',
                'description' => 'Toyota Avanza terbaru dengan mesin 1.5L Dual VVT-i, transmisi CVT, garansi resmi 3 tahun atau 100.000 km. Warna putih metalik, siap STNK dan plat nomor.',
                'placeholder' => ['Avanza Baru', '#1d4ed8', '#60a5fa'],
                'vehicle' => ['brand' => 'Toyota', 'model' => 'Avanza 1.5 G CVT', 'year' => 2026, 'mileage' => 0, 'transmission' => 'CVT', 'fuel_type' => 'Bensin', 'color' => 'Putih', 'condition' => 'new', 'engine_capacity' => '1496 cc'],
            ],
            [
                'user' => $admin,
                'category' => $mobilBaru,
                'title' => 'Honda Brio RS CVT Satya Baru',
                'price' => 195000000,
                'status' => 'published',
                'featured' => false,
                'location' => ['Jakarta Timur', 'Jatinegara'],
                'address' => 'Showroom Honda, Jl. Matraman Raya No. 20',
                'description' => 'Honda Brio RS dengan bodykit sporty, transmisi CVT, fitur lengkap, dan garansi resmi. Irit bahan bakar, ideal untuk mobilitas perkotaan.',
                'placeholder' => ['Brio RS Baru', '#dc2626', '#f87171'],
                'vehicle' => ['brand' => 'Honda', 'model' => 'Brio RS CVT', 'year' => 2026, 'mileage' => 0, 'transmission' => 'CVT', 'fuel_type' => 'Bensin', 'color' => 'Merah', 'condition' => 'new', 'engine_capacity' => '1199 cc'],
            ],
            [
                'user' => $admin,
                'category' => $mobilSecond,
                'title' => 'Toyota Fortuner 2.4 VRZ 4x4 AT 2019',
                'price' => 565000000,
                'status' => 'published',
                'featured' => true,
                'location' => ['Jakarta Selatan', 'Setiabudi'],
                'address' => 'Jl. Kapten Tendean No. 15',
                'description' => 'Fortuner 2.4 VRZ 4x4 tahun 2019, kondisi mulus, pajak panjang, servis rutin di bengkel resmi. Mesin diesel irit dan tangguh. Siap pakai.',
                'placeholder' => ['Fortuner 2019', '#155e75', '#22d3ee'],
                'vehicle' => ['brand' => 'Toyota', 'model' => 'Fortuner 2.4 VRZ 4x4', 'year' => 2019, 'mileage' => 75000, 'transmission' => 'AT', 'fuel_type' => 'Diesel', 'color' => 'Hitam', 'condition' => 'used', 'engine_capacity' => '2393 cc'],
            ],
            [
                'user' => $admin,
                'category' => $mobilSecond,
                'title' => 'Honda Jazz RS CVT 2017 Low KM',
                'price' => 185000000,
                'status' => 'published',
                'featured' => false,
                'location' => ['Jakarta Barat', 'Kebon Jeruk'],
                'address' => 'Jl. Panjang No. 33, Kebon Jeruk',
                'description' => 'Honda Jazz RS 2017 dengan kilometer rendah 45.000 km, kondisi interior bersih seperti baru. Mesin halus, irit, dan handal. Cocok untuk pemakaian harian.',
                'placeholder' => ['Jazz RS 2017', '#9f1239', '#fb7185'],
                'vehicle' => ['brand' => 'Honda', 'model' => 'Jazz RS CVT', 'year' => 2017, 'mileage' => 45000, 'transmission' => 'CVT', 'fuel_type' => 'Bensin', 'color' => 'Abu-abu', 'condition' => 'used', 'engine_capacity' => '1497 cc'],
            ],
            [
                'user' => $admin,
                'category' => $mobilSecond,
                'title' => 'Daihatsu Xenia 1.3 M 2020 Keluarga',
                'price' => 148000000,
                'status' => 'sold',
                'featured' => false,
                'location' => ['Depok', 'Sukmajaya'],
                'address' => 'Jl. Margonda Raya No. 5',
                'description' => 'Daihatsu Xenia 1.3 M tahun 2020, kondisi mulus, perawatan rutin, cocok untuk kebutuhan keluarga. Tersedia dokumen lengkap.',
                'placeholder' => ['Xenia 2020', '#a16207', '#facc15'],
                'vehicle' => ['brand' => 'Daihatsu', 'model' => 'Xenia 1.3 M', 'year' => 2020, 'mileage' => 52000, 'transmission' => 'MT', 'fuel_type' => 'Bensin', 'color' => 'Coklat', 'condition' => 'used', 'engine_capacity' => '1298 cc'],
            ],
        ];

        $imageIndex = 0;

        foreach ($listings as $data) {
            [$provinceId, $cityId, $districtId] = $loc($data['location'][0], $data['location'][1]);

            $listing = Listing::firstOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    'user_id' => $data['user']->id,
                    'category_id' => $data['category']->id,
                    'province_id' => $provinceId,
                    'city_id' => $cityId,
                    'district_id' => $districtId,
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'price' => $data['price'],
                    'location_label' => $data['location'][0].', '.$data['location'][1],
                    'address' => $data['address'],
                    'status' => $data['status'],
                    'featured' => $data['featured'],
                    'view_count' => fake()->numberBetween(50, 900),
                ]
            );

            if ($listing->wasRecentlyCreated) {
                $primary = $this->placeholder($data['placeholder'][0], $data['placeholder'][1], $data['placeholder'][2], ++$imageIndex);
                $extra = $this->placeholder($data['placeholder'][0].' (2)', $data['placeholder'][1], $data['placeholder'][2], ++$imageIndex);

                ListingImage::create([
                    'listing_id' => $listing->id,
                    'image_path' => $primary,
                    'is_primary' => true,
                    'sort_order' => 0,
                ]);
                ListingImage::create([
                    'listing_id' => $listing->id,
                    'image_path' => $extra,
                    'is_primary' => false,
                    'sort_order' => 1,
                ]);

                if (isset($data['property'])) {
                    PropertyDetail::create(array_merge(
                        ['listing_id' => $listing->id],
                        $data['property']
                    ));
                }

                if (isset($data['vehicle'])) {
                    VehicleDetail::create(array_merge(
                        ['listing_id' => $listing->id],
                        $data['vehicle']
                    ));
                }
            }
        }
    }
}