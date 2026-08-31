<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\City;
use App\Models\District;
use App\Models\Listing;
use App\Models\Province;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeoTest extends TestCase
{
    use RefreshDatabase;

    public function test_robots_txt_is_served(): void
    {
        $this->get('/robots.txt')
            ->assertOk()
            ->assertHeader('Content-Type', 'text/plain; charset=utf-8')
            ->assertSee('Sitemap:');
    }

    public function test_sitemap_xml_is_served(): void
    {
        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml')
            ->assertSee('urlset');
    }

    public function test_sitemap_contains_published_listings(): void
    {
        $user = User::factory()->create();
        $property = Category::create(['name' => 'Properti', 'slug' => 'properti', 'type' => 'property', 'status' => 'active']);
        $rumah = Category::create(['name' => 'Rumah', 'slug' => 'rumah', 'type' => 'property', 'status' => 'active', 'parent_id' => $property->id]);
        $province = Province::create(['name' => 'Sumatera Utara', 'slug' => 'sumatera-utara']);
        $city = City::create(['province_id' => $province->id, 'name' => 'Medan', 'slug' => 'medan']);
        $district = District::create(['city_id' => $city->id, 'name' => 'Medan Baru', 'slug' => 'medan-baru']);

        Listing::create([
            'user_id' => $user->id,
            'category_id' => $rumah->id,
            'province_id' => $province->id,
            'city_id' => $city->id,
            'district_id' => $district->id,
            'title' => 'Rumah di Medan',
            'slug' => 'rumah-di-medan',
            'description' => 'Rumah sederhana namun nyaman.',
            'price' => 900000000,
            'location_label' => 'Medan, Sumatera Utara',
            'status' => Listing::STATUS_PUBLISHED,
        ]);

        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertSee('/listing/rumah-di-medan');
    }

    public function test_about_and_contact_pages_render(): void
    {
        $this->get('/tentang-kami')->assertOk();
        $this->get('/kontak')->assertOk();
    }
}