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

class FavoriteTest extends TestCase
{
    use RefreshDatabase;

    private function createListing(): Listing
    {
        $user = User::factory()->create();
        $property = Category::create(['name' => 'Properti', 'slug' => 'properti', 'type' => 'property', 'status' => 'active']);
        $tanah = Category::create(['name' => 'Tanah', 'slug' => 'tanah', 'type' => 'property', 'status' => 'active', 'parent_id' => $property->id]);
        $province = Province::create(['name' => 'Jawa Timur', 'slug' => 'jawa-timur']);
        $city = City::create(['province_id' => $province->id, 'name' => 'Malang', 'slug' => 'malang']);
        $district = District::create(['city_id' => $city->id, 'name' => 'Lowokwaru', 'slug' => 'lowokwaru']);

        return Listing::create([
            'user_id' => $user->id,
            'category_id' => $tanah->id,
            'province_id' => $province->id,
            'city_id' => $city->id,
            'district_id' => $district->id,
            'title' => 'Tanah Kavling 500m2 di Malang',
            'slug' => 'tanah-kavling-500m2-di-malang',
            'description' => 'Tanah kavling siap bangun, dekat kampus.',
            'price' => 750000000,
            'location_label' => 'Malang, Jawa Timur',
            'status' => Listing::STATUS_PUBLISHED,
        ]);
    }

    public function test_guest_cannot_toggle_favorite(): void
    {
        $listing = $this->createListing();

        $this->post('/favorites/'.$listing->id.'/toggle')->assertRedirect('/login');
    }

    public function test_user_can_favorite_and_unfavorite(): void
    {
        $user = User::factory()->create();
        $listing = $this->createListing();

        $this->actingAs($user)
            ->postJson('/favorites/'.$listing->id.'/toggle')
            ->assertOk()
            ->assertJson(['favorited' => true]);

        $this->assertDatabaseHas('favorites', [
            'user_id' => $user->id,
            'listing_id' => $listing->id,
        ]);

        $this->actingAs($user)
            ->postJson('/favorites/'.$listing->id.'/toggle')
            ->assertOk()
            ->assertJson(['favorited' => false]);

        $this->assertDatabaseMissing('favorites', [
            'user_id' => $user->id,
            'listing_id' => $listing->id,
        ]);
    }

    public function test_favorites_page_lists_favorited_listings(): void
    {
        $user = User::factory()->create();
        $listing = $this->createListing();

        $listing->favorites()->create(['user_id' => $user->id]);

        $this->actingAs($user)
            ->get('/dashboard/favorites')
            ->assertOk()
            ->assertSee($listing->title);
    }
}