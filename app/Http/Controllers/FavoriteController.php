<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Services\FavoriteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct(private readonly FavoriteService $favoriteService)
    {
        $this->middleware('auth');
    }

    public function toggle(Request $request, Listing $listing): JsonResponse
    {
        $result = $this->favoriteService->toggle($request->user(), $listing);

        return response()->json([
            'success' => true,
            'message' => $result['favorited'] ? 'Ditambahkan ke favorit.' : 'Dihapus dari favorit.',
            ...$result,
        ]);
    }
}