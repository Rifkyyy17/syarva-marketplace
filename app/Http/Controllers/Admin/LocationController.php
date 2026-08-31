<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Http\Requests\DistrictRequest;
use App\Http\Requests\ProvinceRequest;
use App\Models\City;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LocationController extends Controller
{
    public function provinces(Request $request)
    {
        $query = Province::withCount(['cities', 'listings'])
            ->when($request->input('q'), function ($q, $term) {
                $like = '%'.mb_strtolower(trim($term)).'%';
                $q->whereRaw('LOWER(name) LIKE ?', [$like]);
            });

        $provinces = $query->orderBy('name')->paginate(20)->withQueryString();

        return view('admin.locations.provinces', compact('provinces'));
    }

    public function storeProvince(ProvinceRequest $request): RedirectResponse
    {
        Province::create(['name' => $request->name, 'slug' => Str::slug($request->slug)]);

        return redirect()->route('admin.locations.provinces')->with('success', 'Provinsi berhasil ditambahkan.');
    }

    public function updateProvince(ProvinceRequest $request, Province $province): RedirectResponse
    {
        $province->update(['name' => $request->name, 'slug' => Str::slug($request->slug)]);

        return redirect()->route('admin.locations.provinces')->with('success', 'Provinsi berhasil diperbarui.');
    }

    public function destroyProvince(Province $province): RedirectResponse
    {
        if ($province->listings()->count() > 0) {
            return back()->with('error', 'Provinsi masih digunakan oleh listing.');
        }

        $province->delete();

        return back()->with('success', 'Provinsi berhasil dihapus.');
    }

    public function cities(Request $request, ?Province $province = null)
    {
        $provinces = Province::orderBy('name')->get();

        $query = City::with(['province'])
            ->withCount(['districts', 'listings'])
            ->when($province?->id, fn ($q, $id) => $q->where('province_id', $id))
            ->when($request->input('province_id'), fn ($q, $id) => $q->where('province_id', $id))
            ->when($request->input('q'), function ($q, $term) {
                $like = '%'.mb_strtolower(trim($term)).'%';
                $q->whereRaw('LOWER(name) LIKE ?', [$like]);
            });

        $cities = $query->orderBy('name')->paginate(20)->withQueryString();

        return view('admin.locations.cities', compact('cities', 'provinces'));
    }

    public function storeCity(CityRequest $request): RedirectResponse
    {
        City::create([
            'province_id' => $request->province_id,
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
        ]);

        return back()->with('success', 'Kota/Kabupaten berhasil ditambahkan.');
    }

    public function updateCity(CityRequest $request, City $city): RedirectResponse
    {
        $city->update([
            'province_id' => $request->province_id,
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
        ]);

        return back()->with('success', 'Kota/Kabupaten berhasil diperbarui.');
    }

    public function destroyCity(City $city): RedirectResponse
    {
        if ($city->listings()->count() > 0) {
            return back()->with('error', 'Kota masih digunakan oleh listing.');
        }

        $city->delete();

        return back()->with('success', 'Kota/Kabupaten berhasil dihapus.');
    }

    public function districts(Request $request, ?City $city = null)
    {
        $cities = City::orderBy('name')->get();

        $query = District::with(['city.province'])
            ->withCount(['listings' => fn ($q) => $q->withTrashed()])
            ->when($city?->id, fn ($q, $id) => $q->where('city_id', $id))
            ->when($request->input('city_id'), fn ($q, $id) => $q->where('city_id', $id))
            ->when($request->input('q'), function ($q, $term) {
                $like = '%'.mb_strtolower(trim($term)).'%';
                $q->whereRaw('LOWER(name) LIKE ?', [$like]);
            });

        $districts = $query->orderBy('name')->paginate(20)->withQueryString();

        return view('admin.locations.districts', compact('districts', 'cities'));
    }

    public function storeDistrict(DistrictRequest $request): RedirectResponse
    {
        District::create([
            'city_id' => $request->city_id,
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
        ]);

        return back()->with('success', 'Kecamatan berhasil ditambahkan.');
    }

    public function updateDistrict(DistrictRequest $request, District $district): RedirectResponse
    {
        $district->update([
            'city_id' => $request->city_id,
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
        ]);

        return back()->with('success', 'Kecamatan berhasil diperbarui.');
    }

    public function destroyDistrict(District $district): RedirectResponse
    {
        if ($district->listings()->withTrashed()->count() > 0) {
            return back()->with('error', 'Kecamatan masih digunakan oleh listing.');
        }

        $district->delete();

        return back()->with('success', 'Kecamatan berhasil dihapus.');
    }

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