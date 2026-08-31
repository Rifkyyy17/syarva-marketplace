@props(['filters' => [], 'category' => null, 'brands' => collect(), 'cities' => collect(), 'compact' => false])

<div class="space-y-5">
    <div>
        <label for="q" class="label">Kata Kunci</label>
        <div class="relative">
            <x-icon name="search" class="pointer-events-none absolute left-3.5 top-1/2 size-4 -translate-y-1/2 text-slate-400"/>
            <input type="search" id="q" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Nama, lokasi..." class="input pl-10!">
        </div>
    </div>

    <div>
        <label for="min_price" class="label">Rentang Harga (Rp)</label>
        <div class="flex items-center gap-2">
            <input type="number" id="min_price" name="min_price" min="0" step="100000" value="{{ $filters['min_price'] ?? '' }}" placeholder="Min" class="input">
            <span class="text-slate-400">-</span>
            <input type="number" id="max_price" name="max_price" min="0" step="100000" value="{{ $filters['max_price'] ?? '' }}" placeholder="Maks" class="input">
        </div>
    </div>

    <div>
        <label for="city_id" class="label">Lokasi</label>
        <select id="city_id" name="city_id" class="input">
            <option value="">Semua Kota</option>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}" @selected((string) ($filters['city_id'] ?? '') === (string) $city->id)>{{ $city->name }}</option>
            @endforeach
        </select>
    </div>

    @if (! $category || $category->isProperty())
        <div>
            <label for="min_land_area" class="label">Luas Tanah (m²)</label>
            <div class="flex items-center gap-2">
                <input type="number" id="min_land_area" name="min_land_area" min="0" value="{{ $filters['min_land_area'] ?? '' }}" placeholder="Min" class="input">
                <span class="text-slate-400">-</span>
                <input type="number" id="max_land_area" name="max_land_area" min="0" value="{{ $filters['max_land_area'] ?? '' }}" placeholder="Maks" class="input">
            </div>
        </div>

        <div>
            <label for="min_building_area" class="label">Luas Bangunan (m²)</label>
            <input type="number" id="min_building_area" name="min_building_area" min="0" value="{{ $filters['min_building_area'] ?? '' }}" placeholder="Minimal" class="input">
        </div>

        @if (! $category || $category->slug === 'rumah')
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label for="bedrooms" class="label">Kamar Tidur</label>
                    <select id="bedrooms" name="bedrooms" class="input">
                        <option value="">Berapa saja</option>
                        @foreach ([1, 2, 3, 4, 5, 6] as $n)
                            <option value="{{ $n }}" @selected((string) ($filters['bedrooms'] ?? '') === (string) $n)>{{ $n }}+ kamar</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="bathrooms" class="label">Kamar Mandi</label>
                    <select id="bathrooms" name="bathrooms" class="input">
                        <option value="">Berapa saja</option>
                        @foreach ([1, 2, 3, 4] as $n)
                            <option value="{{ $n }}" @selected((string) ($filters['bathrooms'] ?? '') === (string) $n)>{{ $n }}+ kamar</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endif

        <div>
            <label for="certificate" class="label">Sertifikat</label>
            <select id="certificate" name="certificate" class="input">
                <option value="">Semua</option>
                @foreach (['SHM', 'SHGB', 'Girik', 'Akta Jual Beli', 'Lainnya'] as $cert)
                    <option value="{{ $cert }}" @selected(($filters['certificate'] ?? '') === $cert)>{{ $cert }}</option>
                @endforeach
            </select>
        </div>
    @endif

    @if (! $category || $category->isVehicle())
        <div class="grid grid-cols-2 gap-2">
            <div>
                <label for="brand" class="label">Merk</label>
                <select id="brand" name="brand" class="input">
                    <option value="">Semua merk</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand }}" @selected(($filters['brand'] ?? '') === $brand)>{{ $brand }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="model" class="label">Model</label>
                <input type="text" id="model" name="model" value="{{ $filters['model'] ?? '' }}" placeholder="cth: Avanza" class="input">
            </div>
        </div>

        <div>
            <label for="min_year" class="label">Tahun</label>
            <div class="flex items-center gap-2">
                <select id="min_year" name="min_year" class="input">
                    <option value="">Dari</option>
                    @for ($y = now()->year + 1; $y >= 1990; $y--)
                        <option value="{{ $y }}" @selected((string) ($filters['min_year'] ?? '') === (string) $y)>{{ $y }}</option>
                    @endfor
                </select>
                <span class="text-slate-400">-</span>
                <select id="max_year" name="max_year" class="input">
                    <option value="">Sampai</option>
                    @for ($y = now()->year + 1; $y >= 1990; $y--)
                        <option value="{{ $y }}" @selected((string) ($filters['max_year'] ?? '') === (string) $y)>{{ $y }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-2">
            <div>
                <label for="transmission" class="label">Transmisi</label>
                <select id="transmission" name="transmission" class="input">
                    <option value="">Semua</option>
                    @foreach (['MT', 'AT', 'CVT', 'DCT'] as $t)
                        <option value="{{ $t }}" @selected(($filters['transmission'] ?? '') === $t)>{{ $t }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="fuel_type" class="label">Bahan Bakar</label>
                <select id="fuel_type" name="fuel_type" class="input">
                    <option value="">Semua</option>
                    @foreach (['Bensin', 'Diesel', 'Listrik', 'Hybrid'] as $f)
                        <option value="{{ $f }}" @selected(($filters['fuel_type'] ?? '') === $f)>{{ $f }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label for="condition" class="label">Kondisi</label>
            <div class="grid grid-cols-2 gap-2">
                <label class="flex cursor-pointer items-center gap-2 rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm font-medium text-slate-700 has-checked:border-primary-500 has-checked:bg-primary-50 has-checked:text-primary-800">
                    <input type="radio" name="condition" value="new" class="size-4 accent-primary-600" @checked(($filters['condition'] ?? '') === 'new')>
                    Baru
                </label>
                <label class="flex cursor-pointer items-center gap-2 rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm font-medium text-slate-700 has-checked:border-primary-500 has-checked:bg-primary-50 has-checked:text-primary-800">
                    <input type="radio" name="condition" value="used" class="size-4 accent-primary-600" @checked(($filters['condition'] ?? '') === 'used')>
                    Bekas
                </label>
            </div>
        </div>
    @endif

    <div class="flex gap-2 pt-1">
        <button type="submit" class="btn-primary flex-1">
            <x-icon name="filter" class="size-4"/> Terapkan Filter
        </button>
        <a href="{{ request()->url() }}" class="btn-outline" title="Reset filter">
            <x-icon name="refresh" class="size-4"/>
        </a>
    </div>
</div>