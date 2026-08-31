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

class AdminTest extends TestCase
{
    use RefreshDatabase;

    private function createAdmin(): User
    {
        return User::factory()->create(['role' => 'admin']);
    }

    private function createPendingListing(User $user): Listing
    {
        $property = Category::create(['name' => 'Properti', 'slug' => 'properti', 'type' => 'property', 'status' => 'active']);
        $rumah = Category::create(['name' => 'Rumah', 'slug' => 'rumah', 'type' => 'property', 'status' => 'active', 'parent_id' => $property->id]);
        $province = Province::create(['name' => 'Bali', 'slug' => 'bali']);
        $city = City::create(['province_id' => $province->id, 'name' => 'Denpasar', 'slug' => 'denpasar']);
        $district = District::create(['city_id' => $city->id, 'name' => 'Denpasar Barat', 'slug' => 'denpasar-barat']);

        return Listing::create([
            'user_id' => $user->id,
            'category_id' => $rumah->id,
            'province_id' => $province->id,
            'city_id' => $city->id,
            'district_id' => $district->id,
            'title' => 'Villa Modern di Denpasar',
            'slug' => 'villa-modern-di-denpasar',
            'description' => 'Villa 3 kamar dengan kolam renang pribadi.',
            'price' => 3000000000,
            'location_label' => 'Denpasar, Bali',
            'status' => Listing::STATUS_PENDING,
        ]);
    }

    public function test_guest_is_redirected_from_admin(): void
    {
        $this->get('/admin')->assertRedirect('/login');
        $this->get('/admin/listings')->assertRedirect('/login');
    }

    public function test_user_cannot_access_admin(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($user)
            ->get('/admin')
            ->assertRedirect(route('home'));

        $this->actingAs($user)
            ->get('/admin/listings')
            ->assertRedirect(route('home'));
    }

    public function test_admin_can_access_admin_dashboard(): void
    {
        $this->actingAs($this->createAdmin())
            ->get('/admin')
            ->assertOk();
    }

    public function test_admin_can_manage_listings(): void
    {
        $admin = $this->createAdmin();
        $listing = $this->createPendingListing($admin);

        $this->actingAs($admin)
            ->get('/admin/listings')
            ->assertOk()
            ->assertSee($listing->title);

        $this->actingAs($admin)
            ->post('/admin/listings/'.$listing->id.'/approve')
            ->assertRedirect();

        $this->assertSame(\App\Enums\ListingStatus::PUBLISHED, $listing->fresh()->status);

        $this->actingAs($admin)
            ->post('/admin/listings/'.$listing->id.'/feature')
            ->assertRedirect();

        $this->assertTrue($listing->fresh()->featured);
    }

    public function test_admin_can_reject_listing_with_reason(): void
    {
        $admin = $this->createAdmin();
        $listing = $this->createPendingListing($admin);

        $this->actingAs($admin)
            ->post('/admin/listings/'.$listing->id.'/reject', ['reason' => 'Foto tidak jelas'])
            ->assertRedirect();

        $listing->refresh();

        $this->assertSame(\App\Enums\ListingStatus::REJECTED, $listing->status);
        $this->assertSame('Foto tidak jelas', $listing->rejection_reason);
    }

    public function test_reject_requires_reason(): void
    {
        $admin = $this->createAdmin();
        $listing = $this->createPendingListing($admin);

        $this->actingAs($admin)
            ->post('/admin/listings/'.$listing->id.'/reject', ['reason' => ''])
            ->assertSessionHasErrors('reason');
    }

    public function test_admin_can_soft_delete_listing(): void
    {
        $admin = $this->createAdmin();
        $listing = $this->createPendingListing($admin);

        $this->actingAs($admin)
            ->withSession(['auth.password_confirmed_at' => now()->timestamp])
            ->delete('/admin/listings/'.$listing->id)
            ->assertRedirect();

        $this->assertSoftDeleted('listings', ['id' => $listing->id]);
    }

    public function test_admin_can_toggle_user_status(): void
    {
        $admin = $this->createAdmin();
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($admin)
            ->withSession(['auth.password_confirmed_at' => now()->timestamp])
            ->post('/admin/users/'.$user->id.'/toggle-status')
            ->assertRedirect();

        $this->assertSame('suspended', $user->fresh()->status);

        $this->actingAs($admin)
            ->withSession(['auth.password_confirmed_at' => now()->timestamp])
            ->post('/admin/users/'.$user->id.'/toggle-status')
            ->assertRedirect();

        $this->assertSame('active', $user->fresh()->status);
    }

    public function test_admin_cannot_suspend_self(): void
    {
        $admin = $this->createAdmin();

        $this->actingAs($admin)
            ->withSession(['auth.password_confirmed_at' => now()->timestamp])
            ->post('/admin/users/'.$admin->id.'/toggle-status')
            ->assertRedirect();

        $this->assertSame('active', $admin->fresh()->status);
    }

    public function test_user_dashboard_redirects_to_home(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($user)
            ->get('/dashboard')
            ->assertRedirect('/');
    }
}