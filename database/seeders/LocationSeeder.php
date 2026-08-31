<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\District;
use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $provinces = [
            'Aceh' => [
                'Banda Aceh' => ['Baiturrahman', 'Kuta Alam', 'Ulee Kareng'],
                'Lhokseumawe' => ['Banda Sakti', 'Muara Satu'],
            ],
            'Sumatera Utara' => [
                'Medan' => ['Medan Polonia', 'Medan Baru', 'Medan Selayang', 'Medan Timur'],
                'Binjai' => ['Binjai Kota', 'Binjai Utara'],
            ],
            'Sumatera Barat' => [
                'Padang' => ['Padang Barat', 'Padang Timur', 'Kuranji'],
                'Bukittinggi' => ['Aur Birugo Tigo Baleh', 'Guguk Panjang'],
            ],
            'Riau' => [
                'Pekanbaru' => ['Tampan', 'Marpoyan Damai', 'Sukajadi'],
                'Dumai' => ['Dumai Kota', 'Bukit Kapur'],
            ],
            'Jambi' => [
                'Jambi' => ['Telanaipura', 'Jambi Selatan', 'Danau Teluk'],
            ],
            'Sumatera Selatan' => [
                'Palembang' => ['Ilir Timur I', 'Ilir Barat I', 'Seberang Ulu I'],
                'Lubuklinggau' => ['Lubuk Linggau Timur I', 'Lubuk Linggau Barat I'],
            ],
            'Bengkulu' => [
                'Bengkulu' => ['Teluk Segara', 'Gading Cempaka', 'Ratu Samban'],
            ],
            'Lampung' => [
                'Bandar Lampung' => ['Tanjung Karang Pusat', 'Kedaton', 'Sukarame'],
                'Metro' => ['Metro Pusat', 'Metro Timur'],
            ],
            'Kepulauan Bangka Belitung' => [
                'Pangkalpinang' => ['Rangkui', 'Bukit Intan'],
            ],
            'Kepulauan Riau' => [
                'Batam' => ['Batam Kota', 'Lubuk Baja', 'Batu Aji', 'Sekupang'],
                'Tanjungpinang' => ['Tanjung Pinang Kota', 'Bukit Bestari'],
            ],
            'DKI Jakarta' => [
                'Jakarta Pusat' => ['Menteng', 'Tanah Abang', 'Gambir', 'Senen'],
                'Jakarta Selatan' => ['Kebayoran Baru', 'Setiabudi', 'Pasar Minggu', 'Cilandak'],
                'Jakarta Timur' => ['Cakung', 'Jatinegara', 'Pasar Rebo'],
                'Jakarta Barat' => ['Kebon Jeruk', 'Palmerah', 'Taman Sari'],
                'Jakarta Utara' => ['Kelapa Gading', 'Penjaringan', 'Tanjung Priok'],
            ],
            'Jawa Barat' => [
                'Bogor' => ['Bogor Barat', 'Bogor Selatan', 'Bogor Timur', 'Bogor Utara', 'Tanah Sareal'],
                'Depok' => ['Sukmajaya', 'Beji', 'Cinere', 'Pancoran Mas'],
                'Bekasi' => ['Bekasi Timur', 'Bekasi Selatan', 'Pondok Gede', 'Jatiasih'],
                'Bandung' => ['Coblong', 'Cidadap', 'Buahbatu', 'Antapani', 'Sukasari'],
                'Cimahi' => ['Cimahi Tengah', 'Cimahi Selatan'],
                'Tasikmalaya' => ['Cihideung', 'Indihiang'],
                'Cirebon' => ['Kejaksan', 'Harjamukti'],
            ],
            'Jawa Tengah' => [
                'Semarang' => ['Banyumanik', 'Gajah Mungkur', 'Tembalang', 'Semarang Utara'],
                'Surakarta' => ['Laweyan', 'Serengan', 'Jebres'],
                'Salatiga' => ['Argomulyo', 'Tingkir'],
                'Magelang' => ['Magelang Utara', 'Magelang Tengah'],
            ],
            'DI Yogyakarta' => [
                'Yogyakarta' => ['Gondokusuman', 'Umbulharjo', 'Mergangsan', 'Danurejan'],
                'Sleman' => ['Depok', 'Mlati', 'Ngaglik', 'Godean'],
                'Bantul' => ['Sewon', 'Kasihan', 'Banguntapan'],
            ],
            'Jawa Timur' => [
                'Surabaya' => ['Sukolilo', 'Wonokromo', 'Rungkut', 'Genteng', 'Tandes'],
                'Malang' => ['Klojen', 'Blimbing', 'Lowokwaru'],
                'Sidoarjo' => ['Sidoarjo Kota', 'Gedangan', 'Taman'],
                'Kediri' => ['Mojoroto', 'Pesantren'],
            ],
            'Banten' => [
                'Tangerang' => ['Cipondoh', 'Karawaci', 'Batuceper', 'Ciledug'],
                'Tangerang Selatan' => ['Serpong', 'Pamulang', 'Ciputat', 'Setu'],
                'Serang' => ['Serang Kota', 'Curug'],
                'Cilegon' => ['Ciwandan', 'Cilegon Kota'],
            ],
            'Bali' => [
                'Denpasar' => ['Denpasar Barat', 'Denpasar Selatan', 'Denpasar Timur', 'Denpasar Utara'],
                'Badung' => ['Kuta', 'Kuta Selatan', 'Mengwi', 'Abiansemal'],
                'Gianyar' => ['Ubud', 'Gianyar Kota', 'Sukawati'],
            ],
            'Nusa Tenggara Barat' => [
                'Mataram' => ['Mataram Kota', 'Cakranegara', 'Selaparang'],
                'Lombok Barat' => ['Gunungsari', 'Gerung'],
            ],
            'Nusa Tenggara Timur' => [
                'Kupang' => ['Oebobo', 'Kota Raja', 'Kota Lama'],
            ],
            'Kalimantan Barat' => [
                'Pontianak' => ['Pontianak Kota', 'Pontianak Timur', 'Pontianak Barat'],
                'Singkawang' => ['Singkawang Barat', 'Singkawang Timur'],
            ],
            'Kalimantan Tengah' => [
                'Palangka Raya' => ['Jekan Raya', 'Pahandut'],
            ],
            'Kalimantan Selatan' => [
                'Banjarmasin' => ['Banjarmasin Barat', 'Banjarmasin Timur', 'Banjarmasin Selatan'],
                'Banjarbaru' => ['Landasan Ulin', 'Cempaka'],
            ],
            'Kalimantan Timur' => [
                'Samarinda' => ['Samarinda Ulu', 'Samarinda Ilir', 'Samarinda Utara'],
                'Balikpapan' => ['Balikpapan Selatan', 'Balikpapan Timur', 'Balikpapan Utara'],
            ],
            'Kalimantan Utara' => [
                'Tarakan' => ['Tarakan Timur', 'Tarakan Barat'],
            ],
            'Sulawesi Utara' => [
                'Manado' => ['Wenang', 'Sario', 'Mapanget'],
            ],
            'Sulawesi Tengah' => [
                'Palu' => ['Palu Timur', 'Palu Selatan', 'Palu Utara'],
            ],
            'Sulawesi Selatan' => [
                'Makassar' => ['Panakkukang', 'Tallo', 'Rappocini', 'Tamalate'],
                'Parepare' => ['Soreang', 'Bacukiki'],
            ],
            'Sulawesi Tenggara' => [
                'Kendari' => ['Kadia', 'Poasia', 'Kendari Barat'],
            ],
            'Gorontalo' => [
                'Gorontalo' => ['Dungingi', 'Kota Barat', 'Kota Timur'],
            ],
            'Sulawesi Barat' => [
                'Mamuju' => ['Mamuju Kota', 'Simboro'],
            ],
            'Maluku' => [
                'Ambon' => ['Sirimau', 'Nusaniwe'],
            ],
            'Maluku Utara' => [
                'Ternate' => ['Ternate Tengah', 'Ternate Selatan'],
            ],
            'Papua Barat' => [
                'Manokwari' => ['Manokwari Barat', 'Manokwari Timur'],
            ],
            'Papua' => [
                'Jayapura' => ['Abepura', 'Heram', 'Jayapura Selatan'],
            ],
        ];

        foreach ($provinces as $provinceName => $cities) {
            $province = Province::firstOrCreate(
                ['slug' => Str::slug($provinceName)],
                ['name' => $provinceName]
            );

            foreach ($cities as $cityName => $districts) {
                $city = City::firstOrCreate(
                    ['slug' => Str::slug($cityName)],
                    ['province_id' => $province->id, 'name' => $cityName]
                );

                foreach ($districts as $districtName) {
                    District::firstOrCreate(
                        ['slug' => Str::slug($districtName)],
                        ['city_id' => $city->id, 'name' => $districtName]
                    );
                }
            }
        }
    }
}