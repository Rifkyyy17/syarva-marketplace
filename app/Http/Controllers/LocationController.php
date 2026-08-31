<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    public function citiesByProvince(Province $province): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $province->cities()->get(['id', 'name']),
        ]);
    }

    public function districtsByCity(City $city): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $city->districts()->get(['id', 'name']),
        ]);
    }
}