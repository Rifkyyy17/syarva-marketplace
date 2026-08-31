<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\City;
use App\Models\District;
use App\Models\Listing;
use App\Models\ListingImage;
use App\Models\PropertyDetail;
use App\Models\Province;
use App\Models\User;
use App\Models\VehicleDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ListingTest extends TestCase
{
    use RefreshDatabase;

    private function createCategory(string $slug, string $type, ?Category $parent = null): Category
    {
        return Category::firstOrCreate(['slug' => $slug], [
            'parent_id' => $parent?->id,
            'name' => ucfirst(str_replace('-', ' ', $slug)),
            'type' => $type,
            'status' => 'active',
            'sort_order' => 1,
        ]);
    }

    private function createListing(array $overrides = []): Listing
    {
        $user = User::factory()->create();
        $property = $this->createCategory('properti', 'property');
        $rumah = $this->createCategory('rumah', 'property', $property);
        $province = Province::firstOrCreate(['slug' => 'jawa-barat'], ['name' => 'Jawa Barat']);
        $city = City::firstOrCreate(['slug' => 'bandung'], ['province_id' => $province->id, 'name' => 'Bandung']);
        $district = District::firstOrCreate(['slug' => 'coblong'], ['city_id' => $city->id, 'name' => 'Coblong']);

        return Listing::create(array_merge([
            'user_id' => $user->id,
            'category_id' => $rumah->id,
            'province_id' => $province->id,
            'city_id' => $city->id,
            'district_id' => $district->id,
            'title' => 'Rumah Minimalis Modern di Bandung',
            'slug' => 'rumah-minimalis-modern-di-bandung',
            'description' => 'Rumah minimalis 2 lantai dengan taman luas dan carport.',
            'price' => 1500000000,
            'location_label' => 'Bandung, Jawa Barat',
            'status' => Listing::STATUS_PUBLISHED,
        ], $overrides));
    }

    public function test_home_page_renders(): void
    {
        $this->get('/')->assertOk()->assertSee('SYARVA');
    }

    public function test_listings_index_renders(): void
    {
        $this->get('/listing')->assertOk();
    }

    public function test_category_urls_render(): void
    {
        $this->createCategory('properti', 'property');
        $this->createCategory('rumah', 'property');
        $this->createCategory('tanah', 'property');
        $this->createCategory('otomotif', 'vehicle');
        $this->createCategory('mobil-baru', 'vehicle');
        $this->createCategory('mobil-second', 'vehicle');

        $this->get('/properti/rumah')->assertOk();
        $this->get('/properti/tanah')->assertOk();
        $this->get('/mobil/baru')->assertOk();
        $this->get('/mobil/second')->assertOk();
    }

    public function test_published_listing_detail_renders(): void
    {
        $listing = $this->createListing();

        $this->get('/listing/'.$listing->slug)
            ->assertOk()
            ->assertSee($listing->title)
            ->assertSee('Rp 1.500.000.000');

        $this->assertSame(1, $listing->fresh()->view_count);
    }

    public function test_draft_listing_is_not_publicly_visible(): void
    {
        $listing = $this->createListing(['status' => Listing::STATUS_DRAFT]);

        $this->get('/listing/'.$listing->slug)->assertNotFound();
    }

    public function test_search_filters_by_keyword(): void
    {
        $this->createListing();
        $other = $this->createListing([
            'title' => 'Kavling Tanah Strategis',
            'slug' => 'kavling-tanah-strategis',
        ]);

        $response = $this->get('/listing?q=tanah');

        $response->assertOk();
        $response->assertSee($other->title);
        $response->assertDontSee('Rumah Minimalis Modern di Bandung');
    }

    public function test_property_search_filters_by_bedrooms(): void
    {
        $listing = $this->createListing();
        PropertyDetail::create([
            'listing_id' => $listing->id,
            'land_area' => 120,
            'building_area' => 90,
            'bedrooms' => 3,
            'bathrooms' => 2,
            'garage' => 1,
            'certificate' => 'SHM',
        ]);

        $this->get('/listing?category=rumah&bedrooms=3')
            ->assertOk()
            ->assertSee($listing->title);

        $this->get('/listing?category=rumah&bedrooms=5')
            ->assertOk()
            ->assertDontSee($listing->title);
    }

    public function test_vehicle_search_filters_by_brand(): void
    {
        $this->createCategory('otomotif', 'vehicle');
        $baru = $this->createCategory('mobil-baru', 'vehicle');
        $user = User::factory()->create();
        $province = Province::create(['name' => 'DKI Jakarta', 'slug' => 'dki-jakarta']);
        $city = City::create(['province_id' => $province->id, 'name' => 'Jakarta Selatan', 'slug' => 'jakarta-selatan']);
        $district = District::create(['city_id' => $city->id, 'name' => 'Kebayoran', 'slug' => 'kebayoran']);

        $listing = Listing::create([
            'user_id' => $user->id,
            'category_id' => $baru->id,
            'province_id' => $province->id,
            'city_id' => $city->id,
            'district_id' => $district->id,
            'title' => 'Mobil Baru Toyota Avanza',
            'slug' => 'mobil-baru-toyota-avanza',
            'description' => 'Mobil baru dengan garansi resmi.',
            'price' => 250000000,
            'location_label' => 'Jakarta Selatan, DKI Jakarta',
            'status' => Listing::STATUS_PUBLISHED,
        ]);

        VehicleDetail::create([
            'listing_id' => $listing->id,
            'brand' => 'Toyota',
            'model' => 'Avanza',
            'year' => 2025,
            'mileage' => 0,
            'transmission' => 'AT',
            'fuel_type' => 'Bensin',
            'color' => 'Putih',
            'condition' => 'new',
        ]);

        $this->get('/mobil/baru?brand=Toyota')
            ->assertOk()
            ->assertSee($listing->title);

        $this->get('/mobil/baru?brand=Honda')
            ->assertOk()
            ->assertDontSee($listing->title);
    }

    public function test_listing_card_shows_primary_image(): void
    {
        $listing = $this->createListing();
        $image = ListingImage::create([
            'listing_id' => $listing->id,
            'image_path' => 'placeholders/rumah.svg',
            'is_primary' => true,
        ]);

        $this->get('/listing')
            ->assertOk()
            ->assertSee('/storage/'.$image->image_path);
    }

    public function test_admin_can_create_listing_with_uploaded_image(): void
    {
        Storage::fake('public');

        $admin = User::factory()->create(['role' => 'admin']);
        $this->createCategory('properti', 'property');
        $this->createCategory('rumah', 'property');
        $province = Province::firstOrCreate(['slug' => 'jawa-barat'], ['name' => 'Jawa Barat']);
        $city = City::firstOrCreate(['slug' => 'depok'], ['province_id' => $province->id, 'name' => 'Depok']);
        District::firstOrCreate(['slug' => 'beji'], ['city_id' => $city->id, 'name' => 'Beji']);

        $response = $this->actingAs($admin)->post('/admin/listings', [
            'category_id' => Category::where('slug', 'rumah')->first()->id,
            'title' => 'Rumah Baru Lewat Upload Web',
            'description' => 'Listing dibuat lewat form web dengan upload foto asli.',
            'price' => 950000000,
            'province_id' => $province->id,
            'city_id' => $city->id,
            'district_id' => District::where('slug', 'beji')->first()->id,
            'location_label' => 'Depok, Jawa Barat',
            'land_area' => 90,
            'building_area' => 72,
            'images' => [
                UploadedFile::fake()->image('foto-rumah.jpg')->size(200),
                UploadedFile::fake()->image('foto-lain.jpg')->size(150),
            ],
        ]);

        $response->assertRedirect(route('admin.listings.index'));

        $listing = Listing::where('title', 'Rumah Baru Lewat Upload Web')->first();

        $this->assertNotNull($listing);
        $this->assertSame(\App\Enums\ListingStatus::PENDING, $listing->status);
        $this->assertSame(2, $listing->images()->count());
        $this->assertTrue($listing->primaryImage->is_primary);
        Storage::disk('public')->assertExists($listing->primaryImage->image_path);
    }
}