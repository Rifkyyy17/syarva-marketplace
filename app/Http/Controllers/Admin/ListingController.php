<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ListingStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Models\Category;
use App\Models\Listing;
use App\Models\ListingImage;
use App\Services\ImageService;
use App\Services\ListingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function __construct(
        private readonly ListingService $listingService,
        private readonly ImageService $imageService,
    ) {}

    public function index(Request $request)
    {
        $query = Listing::query()
            ->with(['category', 'user', 'city', 'province', 'primaryImage'])
            ->when($request->input('status'), fn ($q, $s) => $q->where('status', $s))
            ->when($request->input('category_id'), fn ($q, $c) => $q->where('category_id', $c))
            ->when($request->input('category'), fn ($q, $c) => $q->where('category_id', Category::where('slug', $c)->value('id')))
            ->when($request->input('featured'), fn ($q, $f) => $q->where('featured', $f === '1'))
            ->when($request->input('q'), function ($q, $term) {
                $like = '%'.mb_strtolower(trim($term)).'%';
                $q->where(function ($w) use ($like) {
                    $w->whereRaw('LOWER(title) LIKE ?', [$like])
                        ->orWhereRaw('LOWER(location_label) LIKE ?', [$like]);
                });
            });

        $sort = $request->input('sort', 'newest');
        $query = match ($sort) {
            'price_asc' => $query->orderBy('price'),
            'price_desc' => $query->orderByDesc('price'),
            'views' => $query->orderByDesc('view_count'),
            'oldest' => $query->orderBy('created_at'),
            default => $query->orderByDesc('created_at'),
        };

        $listings = $query->paginate(12)->withQueryString();

        $categories = Category::active()->whereNotNull('parent_id')->orderBy('sort_order')->get();
        $statuses = Listing::STATUSES;

        return view('admin.listings.index', compact('listings', 'categories', 'statuses'));
    }

    public function show(Listing $listing)
    {
        $listing->load([
            'user', 'category', 'province', 'city', 'district',
            'images', 'propertyDetail', 'vehicleDetail', 'inquiries' => fn ($q) => $q->latest(),
        ]);

        return view('admin.listings.show', compact('listing'));
    }

    public function create()
    {
        $categories = $this->listingService->categoryOptions();

        return view('admin.listings.create', compact('categories'));
    }

    public function store(StoreListingRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $images = $this->imageService->uploadMany($data['images'] ?? []);
        unset($data['images']);

        if (empty($images) && ! empty($data['extracted_images']) && is_array($data['extracted_images'])) {
            $images = $data['extracted_images'];
        }

        $listing = $this->listingService->create($data, auth()->id(), $images);

        return redirect()
            ->route('admin.listings.index')
            ->with('success', 'Listing berhasil dibuat.');
    }

    public function edit(Listing $listing)
    {
        $listing->load(['images', 'propertyDetail', 'vehicleDetail']);
        $categories = $this->listingService->categoryOptions();

        return view('admin.listings.edit', compact('listing', 'categories'));
    }

    public function update(UpdateListingRequest $request, Listing $listing): RedirectResponse
    {
        $data = $request->validated();
        $images = $this->imageService->uploadMany($data['images'] ?? []);
        unset($data['images']);

        if (empty($images) && ! empty($data['extracted_images']) && is_array($data['extracted_images']) && $listing->images()->count() === 0) {
            $images = $data['extracted_images'];
        }

        $this->listingService->update($listing, $data, $images);
        $this->clearListingCache($listing);

        return redirect()
            ->route('admin.listings.index')
            ->with('success', 'Listing berhasil diperbarui.');
    }

    public function destroyImage(Listing $listing, ListingImage $image): \Illuminate\Http\JsonResponse|RedirectResponse
    {
        if ($image->listing_id !== $listing->id) {
            abort(404);
        }

        $this->listingService->removeImage($image);
        $this->clearListingCache($listing);

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Foto berhasil dihapus.',
                'remaining' => $listing->images()->count(),
            ]);
        }

        return back()->with('success', 'Foto berhasil dihapus.');
    }

    public function setPrimaryImage(Listing $listing, ListingImage $image): \Illuminate\Http\JsonResponse|RedirectResponse
    {
        if ($image->listing_id !== $listing->id) {
            abort(404);
        }

        $this->listingService->setPrimary($image);
        $this->clearListingCache($listing);

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Foto utama berhasil diatur.',
            ]);
        }

        return back()->with('success', 'Foto utama berhasil diatur.');
    }

    public function uploadImages(Request $request, Listing $listing): \Illuminate\Http\JsonResponse|RedirectResponse
    {
        $request->validate([
            'images' => ['required', 'array', 'min:1', 'max:20'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
        ]);

        $uploadedPaths = $this->imageService->uploadMany($request->file('images', []));
        $this->listingService->syncImages($listing, $uploadedPaths);
        $this->clearListingCache($listing);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => count($uploadedPaths).' foto berhasil ditambahkan.',
                'images' => $listing->images()->get()->map(fn ($img) => [
                    'id' => $img->id,
                    'url' => $img->url,
                    'is_primary' => $img->is_primary,
                ]),
            ]);
        }

        return back()->with('success', count($uploadedPaths).' foto berhasil ditambahkan.');
    }

    public function approve(Listing $listing): RedirectResponse
    {
        $listing->update(['status' => ListingStatus::PUBLISHED, 'rejection_reason' => null]);
        $this->clearListingCache($listing);

        return back()->with('success', 'Listing disetujui dan dipublikasikan.');
    }

    public function reject(Request $request, Listing $listing): RedirectResponse
    {
        $data = $request->validate([
            'reason' => ['required', 'string', 'min:5', 'max:1000'],
        ], [
            'reason.required' => 'Alasan penolakan wajib diisi.',
            'reason.min' => 'Alasan minimal 5 karakter.',
        ]);

        $listing->update(['status' => ListingStatus::REJECTED, 'rejection_reason' => $data['reason']]);
        $this->clearListingCache($listing);

        return back()->with('success', 'Listing ditolak.');
    }

    public function changeStatus(Request $request, Listing $listing): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', Rule::in(Listing::STATUSES)],
        ]);

        $listing->update(['status' => $data['status']]);
        $this->clearListingCache($listing);

        return back()->with('success', 'Status listing diubah menjadi '.$data['status'].'.');
    }

    public function toggleFeatured(Listing $listing): RedirectResponse
    {
        $listing->update(['featured' => ! $listing->featured]);
        $this->clearListingCache($listing);

        return back()->with('success', $listing->featured ? 'Listing ditandai sebagai unggulan.' : 'Listing dihapus dari unggulan.');
    }

    public function destroy(Listing $listing): RedirectResponse
    {
        $this->listingService->delete($listing);
        $this->clearListingCache($listing);

        return back()->with('success', 'Listing dihapus (soft delete).');
    }

    public function parseBrochure(Request $request, \App\Services\PdfBrochureParserService $parser)
    {
        $request->validate([
            'brochure_file' => ['required', 'file', 'mimes:pdf', 'max:20480'],
        ], [
            'brochure_file.required' => 'Silakan pilih file PDF brosur terlebih dahulu.',
            'brochure_file.mimes' => 'File harus berupa dokumen PDF.',
            'brochure_file.max' => 'Ukuran file PDF maksimal 20 MB.',
        ]);

        try {
            $data = $parser->parse($request->file('brochure_file'));

            return response()->json([
                'success' => true,
                'message' => 'Brosur berhasil dianalisis! Field formulir telah terisi otomatis.',
                'data' => $data,
            ]);
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('parseBrochure error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Gagal menganalisis file brosur: ' . $e->getMessage(),
            ], 500);
        }
    }

    private function clearListingCache(Listing $listing): void
    {
        Cache::forget("listing.{$listing->slug}");
        Cache::forget("listing.{$listing->slug}.related");
        Cache::forget('home.categories');
        Cache::forget('home.featured');
        Cache::forget('home.latest');
        Cache::forget('home.stats');
    }
}