<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $favorites = auth()->user()->favorites()
            ->with(['listing.category', 'listing.city', 'listing.province', 'listing.primaryImage'])
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('user.favorites', compact('favorites'));
    }
}