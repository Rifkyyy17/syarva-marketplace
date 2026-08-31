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
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class ButtonLoopTest extends TestCase
{
    use RefreshDatabase;

    private function assertChainEndsOk(TestResponse $response, int $maxHops = 10): void
    {
        $url = $response->headers->get('Location');
        $seen = [];

        for ($i = 0; $i < $maxHops; $i++) {
            $this->assertNotNull($url, "Rantai redirect putus di hop $i");
            $this->assertNotContains($url, $seen, "REDIRECT LOOP TERDETEKSI: $url");
            $seen[] = $url;
            $response = $this->get($url);

            if ($response->isRedirection()) {
                $url = $response->headers->get('Location');
                continue;
            }

            $response->assertOk();
            $this->assertTrue(true, 'Rantai berhenti dengan 200.');

            return;
        }

        $this->fail("Rantai redirect melebihi $maxHops hop (kemungkinan loop).");
    }

    private function createAdmin(): User
    {
        return User::factory()->create(['role' => 'admin']);
    }

    private function createListing(User $user): Listing
    {
        $property = Category::create(['name' => 'Properti', 'slug' => 'properti', 'type' => 'property', 'status' => 'active']);
        $rumah = Category::create(['name' => 'Rumah', 'slug' => 'rumah', 'type' => 'property', 'status' => 'active', 'parent_id' => $property->id]);
        $province = Province::create(['name' => 'Jawa Barat', 'slug' => 'jawa-barat']);
        $city = City::create(['province_id' => $province->id, 'name' => 'Depok', 'slug' => 'depok']);

        return Listing::create([
            'user_id' => $user->id,
            'category_id' => $rumah->id,
            'province_id' => $province->id,
            'city_id' => $city->id,
            'title' => 'Rumah Uji Loop',
            'slug' => 'rumah-uji-loop-'.uniqid(),
            'price' => 500000000,
            'description' => 'Rumah uji untuk testing loop.',
            'status' => Listing::STATUS_DRAFT,
        ]);
    }

    public function test_submit_button(): void
    {
        $admin = $this->createAdmin();
        $listing = $this->createListing($admin);

        $this->assertChainEndsOk(
            $this->actingAs($admin)->post('/admin/listings/'.$listing->id.'/status', ['status' => 'pending'])
        );
    }

    public function test_archive_button(): void
    {
        $admin = $this->createAdmin();
        $listing = $this->createListing($admin);

        $this->assertChainEndsOk(
            $this->actingAs($admin)->post('/admin/listings/'.$listing->id.'/status', ['status' => 'archived'])
        );
    }

    public function test_delete_button(): void
    {
        $admin = $this->createAdmin();
        $listing = $this->createListing($admin);

        $this->assertChainEndsOk(
            $this->actingAs($admin)->withSession(['auth.password_confirmed_at' => now()->timestamp])->delete('/admin/listings/'.$listing->id)
        );
    }

    public function test_guest_inquiry_button(): void
    {
        $admin = $this->createAdmin();
        $listing = $this->createListing($admin);

        $this->assertChainEndsOk(
            $this->post('/inquiry', [
                'listing_id' => $listing->id,
                'name' => 'Tamu Uji',
                'email' => 'tamu@uji.dev',
                'message' => 'Ini pesan inquiry uji untuk tombol.',
            ])
        );
    }

    public function test_inquiry_replied_button(): void
    {
        $admin = $this->createAdmin();
        $listing = $this->createListing($admin);
        $inquiry = Inquiry::create([
            'listing_id' => $listing->id,
            'user_id' => $admin->id,
            'seller_id' => $admin->id,
            'name' => 'Tamu',
            'email' => 'tamu@uji.dev',
            'message' => 'Apakah masih tersedia?',
            'status' => Inquiry::STATUS_NEW,
        ]);

        $this->assertChainEndsOk(
            $this->actingAs($admin)->post('/dashboard/inquiries/'.$inquiry->id.'/replied')
        );
    }

    public function test_admin_approve_button(): void
    {
        $admin = $this->createAdmin();
        $listing = $this->createListing($admin);

        $this->assertChainEndsOk(
            $this->actingAs($admin)->post('/admin/listings/'.$listing->id.'/approve')
        );
    }

    public function test_admin_reject_button(): void
    {
        $admin = $this->createAdmin();
        $listing = $this->createListing($admin);

        $this->assertChainEndsOk(
            $this->actingAs($admin)->post('/admin/listings/'.$listing->id.'/reject', ['reason' => 'Foto kurang jelas.'])
        );
    }

    public function test_admin_feature_button(): void
    {
        $admin = $this->createAdmin();
        $listing = $this->createListing($admin);

        $this->assertChainEndsOk(
            $this->actingAs($admin)->post('/admin/listings/'.$listing->id.'/feature')
        );
    }

    public function test_admin_user_status_button(): void
    {
        $admin = $this->createAdmin();
        $user = User::factory()->create(['role' => 'user']);

        $this->assertChainEndsOk(
            $this->actingAs($admin)->withSession(['auth.password_confirmed_at' => now()->timestamp])->post('/admin/users/'.$user->id.'/toggle-status')
        );
    }

    public function test_admin_inquiry_status_button(): void
    {
        $admin = $this->createAdmin();
        $listing = $this->createListing($admin);
        $inquiry = Inquiry::create([
            'listing_id' => $listing->id,
            'seller_id' => $admin->id,
            'name' => 'Tamu',
            'email' => 'tamu@uji.dev',
            'message' => 'Apakah masih tersedia?',
            'status' => Inquiry::STATUS_NEW,
        ]);

        $this->assertChainEndsOk(
            $this->actingAs($admin)->post('/admin/inquiries/'.$inquiry->id.'/status', ['status' => 'read'])
        );
    }

    public function test_admin_settings_button(): void
    {
        $admin = $this->createAdmin();

        $this->assertChainEndsOk(
            $this->actingAs($admin)->put('/admin/settings/website', ['site_name' => 'SYARVA Uji', 'tagline' => 'Uji loop', 'logo_url' => null])
        );
    }

    public function test_logout_button(): void
    {
        $this->assertChainEndsOk(
            $this->actingAs($this->createAdmin())->post('/logout')
        );
    }
}