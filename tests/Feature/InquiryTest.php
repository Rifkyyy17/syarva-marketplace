<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\City;
use App\Models\District;
use App\Models\Inquiry;
use App\Models\Listing;
use App\Models\Province;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InquiryTest extends TestCase
{
    use RefreshDatabase;

    private function createPublishedListing(User $seller): Listing
    {
        $property = Category::create(['name' => 'Properti', 'slug' => 'properti', 'type' => 'property', 'status' => 'active']);
        $rumah = Category::create(['name' => 'Rumah', 'slug' => 'rumah', 'type' => 'property', 'status' => 'active', 'parent_id' => $property->id]);
        $province = Province::create(['name' => 'Yogyakarta', 'slug' => 'yogyakarta']);
        $city = City::create(['province_id' => $province->id, 'name' => 'Sleman', 'slug' => 'sleman']);
        $district = District::create(['city_id' => $city->id, 'name' => 'Depok', 'slug' => 'depok']);

        return Listing::create([
            'user_id' => $seller->id,
            'category_id' => $rumah->id,
            'province_id' => $province->id,
            'city_id' => $city->id,
            'district_id' => $district->id,
            'title' => 'Rumah Kontemporer di Sleman',
            'slug' => 'rumah-kontemporer-di-sleman',
            'description' => 'Rumah kontemporer dengan view gunung.',
            'price' => 2000000000,
            'location_label' => 'Sleman, Yogyakarta',
            'status' => Listing::STATUS_PUBLISHED,
        ]);
    }

    public function test_guest_can_send_inquiry(): void
    {
        $seller = User::factory()->create();
        $listing = $this->createPublishedListing($seller);

        $this->post('/inquiry', [
            'listing_id' => $listing->id,
            'name' => 'Calon Pembeli',
            'email' => 'pembeli@test.dev',
            'phone' => '081234567890',
            'message' => 'Apakah rumah ini masih tersedia? Saya berminat untuk survei.',
        ])->assertRedirect()->assertSessionHas('success');

        $this->assertDatabaseHas('inquiries', [
            'listing_id' => $listing->id,
            'seller_id' => $seller->id,
            'user_id' => null,
            'name' => 'Calon Pembeli',
            'status' => Inquiry::STATUS_NEW,
        ]);
    }

    public function test_logged_in_user_inquiry_is_attached(): void
    {
        $seller = User::factory()->create();
        $buyer = User::factory()->create();
        $listing = $this->createPublishedListing($seller);

        $this->actingAs($buyer)->post('/inquiry', [
            'listing_id' => $listing->id,
            'name' => $buyer->name,
            'email' => $buyer->email,
            'message' => 'Bisakah dilakukan negosiasi harga? Saya serius membeli.',
        ])->assertRedirect();

        $this->assertDatabaseHas('inquiries', [
            'listing_id' => $listing->id,
            'user_id' => $buyer->id,
            'seller_id' => $seller->id,
        ]);
    }

    public function test_inquiry_requires_valid_data(): void
    {
        $this->post('/inquiry', [
            'listing_id' => 999,
            'name' => '',
            'email' => 'invalid',
            'message' => 'singkat',
        ])->assertSessionHasErrors(['listing_id', 'name', 'email', 'message']);
    }

    public function test_buyer_sees_inquiry_on_dashboard(): void
    {
        $seller = User::factory()->create();
        $buyer = User::factory()->create();
        $listing = $this->createPublishedListing($seller);

        $this->actingAs($buyer)->post('/inquiry', [
            'listing_id' => $listing->id,
            'name' => 'Tamu',
            'email' => 'tamu@test.dev',
            'message' => 'Mohon info detail spesifikasi rumah ini ya.',
        ])->assertRedirect();

        $this->actingAs($buyer)
            ->get('/dashboard/inquiries')
            ->assertOk()
            ->assertSee('Tamu');
    }

    public function test_buyer_can_view_inquiry_detail(): void
    {
        $seller = User::factory()->create();
        $buyer = User::factory()->create();
        $listing = $this->createPublishedListing($seller);
        $inquiry = Inquiry::create([
            'listing_id' => $listing->id,
            'user_id' => $buyer->id,
            'seller_id' => $seller->id,
            'name' => 'Tamu',
            'email' => 'tamu@test.dev',
            'message' => 'Mohon info detail spesifikasi rumah ini ya.',
            'status' => Inquiry::STATUS_NEW,
        ]);

        $this->actingAs($buyer)
            ->get('/dashboard/inquiries/'.$inquiry->id)
            ->assertOk()
            ->assertSee('Tamu');
    }
}