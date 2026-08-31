<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $categories = Category::active()->whereNotNull('parent_id')->get();
        $listings = Listing::published()
            ->select(['slug', 'updated_at'])
            ->get();

        return response()
            ->view('seo.sitemap', compact('categories', 'listings'))
            ->header('Content-Type', 'application/xml');
    }
}