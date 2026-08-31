<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Properti', 'slug' => 'properti', 'type' => 'property', 'icon' => 'home', 'sort_order' => 1, 'children' => [
                ['name' => 'Rumah', 'slug' => 'rumah', 'icon' => 'building', 'description' => 'Rumah dijual dengan berbagai ukuran dan tipe.'],
                ['name' => 'Tanah', 'slug' => 'tanah', 'icon' => 'map', 'description' => 'Tanah kavling, tanah sawah, dan tanah industri.'],
            ]],
            ['name' => 'Otomotif', 'slug' => 'otomotif', 'type' => 'vehicle', 'icon' => 'car', 'sort_order' => 2, 'children' => [
                ['name' => 'Honda (Mobil Baru)', 'slug' => 'mobil-baru', 'icon' => 'car-front', 'description' => 'Katalog mobil Honda baru resmi dengan promo dan garansi.'],
                ['name' => 'Mobil Second', 'slug' => 'mobil-second', 'icon' => 'car-back', 'description' => 'Mobil bekas berkualitas dengan harga terbaik.'],
            ]],
        ];

        foreach ($categories as $data) {
            $parent = Category::firstOrCreate(
                ['slug' => $data['slug']],
                collect($data)->except('children')->toArray()
            );

            foreach ($data['children'] as $i => $child) {
                Category::firstOrCreate(
                    ['slug' => $child['slug']],
                    array_merge(
                        collect($child)->except('children')->toArray(),
                        ['parent_id' => $parent->id, 'type' => $data['type'], 'sort_order' => $i + 1]
                    )
                );
            }
        }
    }
}