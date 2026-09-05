@props(['categories', 'listing' => null])
@php
    $categoryOptions = $categories->map(fn ($c) => ['id' => $c->id, 'name' => $c->name, 'type' => $c->type, 'slug' => $c->slug])->values();
    $old = fn ($key) => old($key, $listing?->$key);
    $pd = fn ($key) => old($key, $listing?->propertyDetail?->$key);
    $vd = fn ($key) => old($key, $listing?->vehicleDetail?->$key);
@endphp

<div x-data="listingForm({{ $categoryOptions->toJson() }}, '{{ (string) $old('category_id') }}', '{{ csrf_token() }}', '{{ route('admin.listings.parse-brochure') }}')"
     x-on:submit="prepareSubmit($event)">

    {{-- Ekstraksi Brosur PDF Honda (Auto-Fill Spesifikasi) --}}
    <div class="card mb-6 border border-slate-700/80 bg-[#0a1626] p-6 sm:p-7 text-white shadow-xl"
         x-show="categoryType === 'vehicle' && (categorySlug === 'mobil-baru' || categorySlug.includes('honda'))"
         x-cloak
         x-transition>
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="space-y-1.5">
                <div class="inline-flex items-center gap-2 rounded-full border border-red-500/30 bg-red-500/10 px-3 py-1 text-xs font-bold text-red-400">
                    <x-icon name="upload" class="size-3.5 text-red-500"/>
                    Auto-Fill Brosur PDF Honda
                </div>
                <h3 class="text-lg sm:text-xl font-extrabold tracking-tight text-white">Ekstraksi Otomatis Brosur PDF Honda</h3>
                <p class="text-xs text-slate-400 max-w-xl leading-relaxed">
                    Unggah file PDF brosur resmi mobil Honda. Sistem akan mengekstrak foto halaman secara otomatis serta melengkapi spesifikasi teknis dan fitur keselamatan unit.
                </p>
            </div>

            <div class="shrink-0 flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <label class="cursor-pointer inline-flex items-center justify-center gap-2 rounded-xl bg-red-600 hover:bg-red-700 px-5 py-2.5 text-xs font-bold text-white shadow-md transition-all hover:scale-102">
                    <template x-if="!parsingPdf">
                        <span class="inline-flex items-center gap-2">
                            <x-icon name="upload" class="size-4.5"/> Pilih File Brosur PDF
                        </span>
                    </template>
                    <template x-if="parsingPdf">
                        <span class="inline-flex items-center gap-2">
                            <svg class="size-4.5 animate-spin text-white" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                            Mengekstrak Brosur PDF...
                        </span>
                    </template>
                    <input type="file" accept="application/pdf" class="sr-only" :disabled="parsingPdf"
                           x-on:change="parsePdfBrochure($event.target.files[0])">
                </label>
            </div>
        </div>

        {{-- Success State Notification --}}
        <div x-show="pdfParseSuccess" x-cloak class="mt-4 rounded-xl border border-emerald-500/30 bg-emerald-500/15 p-3.5 text-xs font-semibold text-emerald-300 flex items-center justify-between gap-3">
            <span class="flex items-center gap-2">
                <x-icon name="check-badge" class="size-4.5 text-emerald-400 shrink-0"/>
                Brosur PDF berhasil dianalisis. Judul, spesifikasi, dan foto galeri telah terisi otomatis di bawah.
            </span>
            <button type="button" @click="pdfParseSuccess = false" class="text-emerald-300 hover:text-white">&times;</button>
        </div>

        {{-- Extracted Images Preview Directly Inside Top Card --}}
        <div x-show="extractedImages.length" x-cloak class="mt-5 rounded-2xl border border-white/10 bg-white/[0.04] p-4 backdrop-blur-md">
            <div class="flex flex-wrap items-center justify-between gap-2 mb-3">
                <span class="inline-flex items-center gap-2 text-xs font-bold text-white">
                    <x-icon name="image" class="size-4 text-slate-300"/>
                    Foto Halaman Brosur Berhasil Diekstrak (<span x-text="extractedImages.length"></span> Gambar)
                </span>
                <span class="rounded-full bg-emerald-500/20 border border-emerald-400/30 px-2.5 py-0.5 text-[10px] font-extrabold text-emerald-300">
                    Siap Disimpan Sebagai Galeri
                </span>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-8 gap-2.5">
                <template x-for="(img, idx) in extractedImages" :key="img.path">
                    <div class="group relative overflow-hidden rounded-xl border border-white/10 bg-slate-900 shadow-md">
                        <div class="aspect-[4/3] bg-slate-800">
                            <img :src="img.url" alt="" class="size-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        <div class="flex items-center justify-between px-1.5 py-1 text-[10px] text-slate-300 bg-charcoal-900">
                            <span class="truncate font-semibold text-accent-300" x-text="idx === 0 ? 'Cover Utama' : `Hal. ${idx + 1}`"></span>
                            <button type="button" @click="extractedImages = extractedImages.filter((_, i) => i !== idx)"
                                    class="text-slate-400 hover:text-red-400 px-1 font-bold text-sm leading-none" title="Hapus foto ini">
                                &times;
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        {{-- Error State Notification --}}
        <div x-show="pdfError" x-cloak class="mt-4 rounded-xl border border-red-500/40 bg-red-500/20 p-3.5 text-xs font-semibold text-red-200 flex items-center justify-between gap-3">
            <span class="flex items-center gap-2" x-text="pdfError"></span>
            <button type="button" @click="pdfError = ''" class="text-red-300 hover:text-white">&times;</button>
        </div>
    </div>

    <div class="card p-6 sm:p-8">
        <h2 class="text-lg font-bold text-slate-900">1. Informasi Dasar</h2>

        <div class="mt-6 space-y-4">
            <div>
                <label for="category_id" class="label">Kategori <span class="text-red-500">*</span></label>
                <select id="category_id" name="category_id" x-model="categoryId" x-on:change="updateType()" required class="input">
                    <option value="">— Pilih Kategori —</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected((string) $old('category_id') === (string) $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="title" class="label">Judul Iklan <span class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" value="{{ $old('title') }}" required minlength="5" maxlength="150"
                       class="input {{ $errors->has('title') ? 'input-error' : '' }}" placeholder="cth: Rumah Modern 2 Lantai di Bogor Selatan">
                @error('title')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="price" class="label">Harga (Rp) <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-xs font-bold text-slate-400">
                            Rp
                        </span>
                        @php
                            $rawPrice = $old('price');
                            if ($rawPrice !== null && $rawPrice !== '') {
                                $str = preg_replace('/[.,]00$/', '', (string) $rawPrice);
                                $cleanPrice = preg_replace('/[^\d]/', '', $str);
                                if ((float) $cleanPrice > 9999999999999 && $listing?->price) {
                                    $cleanPrice = (string) (int) round((float) $listing->price);
                                }
                                $displayPrice = $cleanPrice !== '' ? number_format((float) $cleanPrice, 0, ',', '.') : '';
                            } else {
                                $displayPrice = '';
                            }
                        @endphp
                        <input type="text" id="price" name="price" inputmode="numeric" required
                               value="{{ $displayPrice }}"
                               x-on:input="$el.value = $el.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.')"
                               class="input pl-10 font-bold text-slate-900 {{ $errors->has('price') ? 'input-error' : '' }}" placeholder="cth: 318.500.000">
                    </div>
                    @error('price')
                        <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="location_label" class="label">Label Lokasi</label>
                    <input type="text" id="location_label" name="location_label" value="{{ $old('location_label') }}" maxlength="255"
                           class="input" placeholder="cth: Bogor Selatan, Jawa Barat">
                </div>
            </div>

            <div x-data="{ len: {{ strlen((string) $old('description')) }} }">
                <label for="description" class="label">Deskripsi <span class="text-red-500">*</span></label>
                <textarea id="description" name="description" rows="6" required minlength="20" maxlength="10000"
                          x-on:input="len = $el.value.length"
                          class="input {{ $errors->has('description') ? 'input-error' : '' }}" placeholder="Jelaskan kondisi, keunggulan, dan informasi penting lainnya...">{{ $old('description') }}</textarea>
                <p class="mt-1 text-right text-xs text-slate-400"><span x-text="len"></span>/10000</p>
                @error('description')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    @php
        $selectedProvinceId = $old('province_id');
        $selectedCityId = $old('city_id');
        $selectedDistrictId = $old('district_id');
        $initialCities = $selectedProvinceId ? \App\Models\City::where('province_id', $selectedProvinceId)->orderBy('name')->get(['id', 'name']) : collect();
        $initialDistricts = $selectedCityId ? \App\Models\District::where('city_id', $selectedCityId)->orderBy('name')->get(['id', 'name']) : collect();
    @endphp

    <div class="card mt-6 p-6 sm:p-8">
        <h2 class="text-lg font-bold text-slate-900">2. Lokasi</h2>

        <div x-data="locationCascade({
            province_id: '{{ $selectedProvinceId }}',
            city_id: '{{ $selectedCityId }}',
            district_id: '{{ $selectedDistrictId }}',
            cities: {{ $initialCities->toJson() }},
            districts: {{ $initialDistricts->toJson() }},
        })" class="mt-6 space-y-4">
            <div class="grid gap-4 sm:grid-cols-3">
                <div>
                    <label for="province_id" class="label">Provinsi</label>
                    <select id="province_id" name="province_id" x-model="provinceId" x-on:change="loadCities()" class="input">
                        <option value="">Pilih Provinsi</option>
                        @foreach (\App\Models\Province::orderBy('name')->get() as $province)
                            <option value="{{ $province->id }}" @selected((string) $selectedProvinceId === (string) $province->id)>
                                {{ $province->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="city_id" class="label">Kota/Kabupaten</label>
                    <select id="city_id" name="city_id" x-model="cityId" x-on:change="loadDistricts()" class="input">
                        <option value="">Pilih Kota</option>
                        <template x-for="city in cities" :key="city.id">
                            <option :value="city.id" :selected="String(city.id) === String(cityId)" x-text="city.name"></option>
                        </template>
                    </select>
                </div>
                <div>
                    <label for="district_id" class="label">Kecamatan</label>
                    <select id="district_id" name="district_id" x-model="districtId" class="input">
                        <option value="">Pilih Kecamatan</option>
                        <template x-for="district in districts" :key="district.id">
                            <option :value="district.id" :selected="String(district.id) === String(districtId)" x-text="district.name"></option>
                        </template>
                    </select>
                </div>
            </div>

            <div>
                <label for="address" class="label">Alamat Lengkap</label>
                <input type="text" id="address" name="address" value="{{ $old('address') }}" maxlength="255" class="input" placeholder="cth: Jl. Pahlawan No. 12">
            </div>
        </div>
    </div>

    <div class="card mt-6 p-6 sm:p-8" x-show="categoryType === 'property'" style="display: none;" x-cloak x-transition>
        <h2 class="text-lg font-bold text-slate-900">3. Detail Properti</h2>

        <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <div>
                <label for="land_area" class="label">Luas Tanah (m²)</label>
                <input type="number" id="land_area" name="land_area" min="0" step="0.01" value="{{ $pd('land_area') }}" class="input">
            </div>

            <div x-show="categorySlug === 'rumah'">
                <label for="building_area" class="label">Luas Bangunan (m²)</label>
                <input type="number" id="building_area" name="building_area" min="0" step="0.01" value="{{ $pd('building_area') }}" class="input">
            </div>

            <div x-show="categorySlug === 'rumah'">
                <label for="bedrooms" class="label">Kamar Tidur</label>
                <input type="number" id="bedrooms" name="bedrooms" min="0" max="100" value="{{ $pd('bedrooms') }}" class="input">
            </div>

            <div x-show="categorySlug === 'rumah'">
                <label for="bathrooms" class="label">Kamar Mandi</label>
                <input type="number" id="bathrooms" name="bathrooms" min="0" max="100" value="{{ $pd('bathrooms') }}" class="input">
            </div>

            <div x-show="categorySlug === 'rumah'">
                <label for="garage" class="label">Garasi</label>
                <input type="number" id="garage" name="garage" min="0" max="50" value="{{ $pd('garage') }}" class="input">
            </div>

            <div x-show="categorySlug === 'rumah'">
                <label for="floors" class="label">Jumlah Lantai</label>
                <input type="number" id="floors" name="floors" min="0" max="50" value="{{ $pd('floors') }}" class="input">
            </div>

            <div>
                <label for="certificate" class="label">Sertifikat</label>
                <select id="certificate" name="certificate" class="input">
                    <option value="">Pilih</option>
                    @foreach (['SHM', 'SHGB', 'Girik', 'Akta Jual Beli', 'Lainnya'] as $cert)
                        <option value="{{ $cert }}" @selected($pd('certificate') === $cert)>{{ $cert }}</option>
                    @endforeach
                </select>
            </div>

            <div x-show="categorySlug === 'tanah'">
                <label for="land_status" class="label">Status Tanah</label>
                <input type="text" id="land_status" name="land_status" maxlength="100" value="{{ $pd('land_status') }}" class="input" placeholder="cth: Kavling, Sawah, Pekarangan">
            </div>

            <div x-show="categorySlug === 'rumah'">
                <label for="building_status" class="label">Status Bangunan</label>
                <input type="text" id="building_status" name="building_status" maxlength="100" value="{{ $pd('building_status') }}" class="input" placeholder="cth: Siap Huni, Baru, Renovasi">
            </div>
        </div>

        <div class="mt-6">
            <span class="label">Fasilitas</span>
            <div class="flex flex-wrap gap-2">
                @foreach (['Garasi', 'Carport', 'Taman', 'Halaman', 'Kolam Renang', 'Air PAM', 'Listrik 1300W', 'Listrik 2200W', 'Listrik 4400W', 'Keamanan 24 Jam', 'CCTV', 'Mushola', 'Balkon', 'AC', 'Furnished', 'Semi Furnished'] as $facility)
                    <label class="cursor-pointer rounded-full border border-slate-300 bg-white px-3.5 py-1.5 text-xs font-medium text-slate-600 has-checked:border-primary-600 has-checked:bg-primary-50 has-checked:text-primary-800">
                        <input type="checkbox" name="facilities[]" value="{{ $facility }}" class="sr-only"
                               @checked(in_array($facility, (array) old('facilities', $listing?->propertyDetail?->facilities ?? []), true))>
                        {{ $facility }}
                    </label>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card mt-6 p-6 sm:p-8" x-show="categoryType === 'vehicle'" style="display: none;" x-cloak x-transition>
        <h2 class="text-lg font-bold text-slate-900">3. Detail Kendaraan</h2>

        <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <div>
                <label for="brand" class="label">Merk <span class="text-red-500">*</span></label>
                <input type="text" id="brand" name="brand" :required="categoryType === 'vehicle'" maxlength="100" value="{{ $vd('brand') }}" class="input {{ $errors->has('brand') ? 'input-error' : '' }}" placeholder="cth: Toyota">
                @error('brand')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="model" class="label">Model <span class="text-red-500">*</span></label>
                <input type="text" id="model" name="model" :required="categoryType === 'vehicle'" maxlength="100" value="{{ $vd('model') }}" class="input {{ $errors->has('model') ? 'input-error' : '' }}" placeholder="cth: Avanza 1.5 G CVT">
                @error('model')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="year" class="label">Tahun <span class="text-red-500">*</span></label>
                <select id="year" name="year" :required="categoryType === 'vehicle'" class="input">
                    <option value="">Pilih Tahun</option>
                    @for ($y = now()->year + 1; $y >= 1990; $y--)
                        <option value="{{ $y }}" @selected((string) $vd('year') === (string) $y)>{{ $y }}</option>
                    @endfor
                </select>
                @error('year')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="mileage" class="label">Kilometer</label>
                <input type="number" id="mileage" name="mileage" min="0" max="9999999" value="{{ $vd('mileage') }}" class="input" placeholder="cth: 45000">
            </div>
            <div>
                <label for="transmission" class="label">Transmisi</label>
                <select id="transmission" name="transmission" class="input">
                    <option value="">Pilih</option>
                    @foreach (['MT', 'AT', 'CVT', 'DCT'] as $t)
                        <option value="{{ $t }}" @selected($vd('transmission') === $t)>{{ $t }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="fuel_type" class="label">Bahan Bakar</label>
                <select id="fuel_type" name="fuel_type" class="input">
                    <option value="">Pilih</option>
                    @foreach (['Bensin', 'Diesel', 'Listrik', 'Hybrid'] as $f)
                        <option value="{{ $f }}" @selected($vd('fuel_type') === $f)>{{ $f }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="color" class="label">Warna</label>
                <input type="text" id="color" name="color" maxlength="50" value="{{ $vd('color') }}" class="input" placeholder="cth: Putih">
            </div>
            <div>
                <label for="engine_capacity" class="label">Kapasitas Mesin</label>
                <input type="text" id="engine_capacity" name="engine_capacity" maxlength="20" value="{{ $vd('engine_capacity') }}" class="input" placeholder="cth: 1496 cc">
            </div>
            <div>
                <label for="license_plate" class="label">Plat Nomor</label>
                <input type="text" id="license_plate" name="license_plate" maxlength="20" value="{{ $vd('license_plate') }}" class="input" placeholder="cth: B 1234 XYZ">
            </div>
            <div>
                <label class="label">Kondisi <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-2 gap-2">
                    <label class="flex cursor-pointer items-center gap-2 rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm font-medium text-slate-700 has-checked:border-primary-500 has-checked:bg-primary-50 has-checked:text-primary-800">
                        <input type="radio" name="condition" value="new" class="size-4 accent-primary-600" :required="categoryType === 'vehicle'" @checked($vd('condition') === 'new')>
                        Baru
                    </label>
                    <label class="flex cursor-pointer items-center gap-2 rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm font-medium text-slate-700 has-checked:border-primary-500 has-checked:bg-primary-50 has-checked:text-primary-800">
                        <input type="radio" name="condition" value="used" class="size-4 accent-primary-600" :required="categoryType === 'vehicle'" @checked($vd('condition') === 'used')>
                        Bekas
                    </label>
                </div>
            </div>
        </div>
    </div>

    {{-- Khusus Kategori Honda (Mobil Baru): Aset & Fitur Tambahan --}}
    <div class="card mt-6 border border-slate-200 bg-white p-6 sm:p-8 shadow-xs rounded-2xl"
         x-show="categoryType === 'vehicle' && (categorySlug === 'mobil-baru' || categorySlug.includes('honda'))"
         style="display: none;"
         x-cloak
         x-transition>
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-100 pb-4">
            <div>
                <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 border border-red-200/80 px-2.5 py-0.5 text-xs font-bold text-red-700">
                    <x-icon name="check-badge" class="size-3 text-red-600"/> Spesifikasi Resmi Honda
                </span>
                <h2 class="mt-2 text-lg font-extrabold text-slate-900">4. Spesifikasi Lengkap &amp; Brosur Honda</h2>
                <p class="text-xs text-slate-500">Atur dokumen e-brosur PDF, paket hemat perawatan, promo dealer, dan checklist fitur teknologi Honda Sensing.</p>
            </div>
            <button type="button"
                    @click="
                        document.getElementById('warranty_info').value = 'Garansi Resmi Honda 3 Tahun / 100.000 Km + Garansi Sparepart 12 Bulan + Gratis Paket Perawatan Berkala 4 Tahun / 50.000 Km + 24 Hours Emergency Roadside Assistance';
                        document.getElementById('promo_package').value = '• Promo DP Ringan mulai Rp 20 Jt-an atau Cicilan Rp 4 Jt-an/bln\n• Bunga Kredit Spesial 0% & Tenor s/d 7 Tahun\n• Diskon Cashback & Voucher Belanja Spesial Event';
                        document.getElementById('color_options').value = 'Ignite Red Metallic Two Tone, Ignite Red Metallic, Stellar Diamond Pearl, Crystal Black Pearl, Meteoroid Gray Metallic, Taffeta White';
                        document.getElementById('bonus_accessories').value = '• Kaca Film V-Kool / Solar Gard Full\n• Karpet Eksklusif All New Honda WR-V\n• APAR (Alat Pemadam Api Ringan Standar Resmi)\n• Dudukan Plat Nomor & Kotak P3K + Toolkit\n• Payung Eksklusif Honda';
                        document.querySelectorAll('input[name=\'honda_features[]\']').forEach(el => el.checked = true);
                    "
                    class="btn-outline btn-xs self-start sm:self-auto !border-red-300 !text-red-700 hover:!bg-red-50 shrink-0">
                <x-icon name="refresh" class="size-3.5"/> Isi Otomatis Template Honda
            </button>
        </div>

        <div class="mt-6 space-y-5">
            {{-- E-Brochure PDF & Warranty --}}
            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="brochure_file" class="label text-xs">Unggah File PDF Brosur Resmi (Max 15MB)</label>
                    <input type="file" id="brochure_file" name="brochure_file" accept="application/pdf" class="input text-xs file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
                    @if ($vd('brochure_url'))
                        <div class="mt-2 flex items-center gap-2 text-xs font-semibold text-red-700">
                            <x-icon name="check-badge" class="size-4 text-emerald-600"/>
                            <a href="{{ $vd('brochure_url') }}" target="_blank" class="underline hover:text-red-800">Lihat Brosur Terpasang</a>
                        </div>
                    @endif
                </div>

                <div>
                    <label for="brochure_url" class="label text-xs">Atau Masukkan Link URL Brosur PDF</label>
                    <input type="url" id="brochure_url" name="brochure_url" value="{{ $vd('brochure_url') }}" maxlength="255"
                           class="input text-xs" placeholder="https://domain.com/brosur-honda.pdf">
                </div>
            </div>

            <div>
                <label for="warranty_info" class="label text-xs">Garansi &amp; Paket Hemat Servis Honda</label>
                <input type="text" id="warranty_info" name="warranty_info" value="{{ $vd('warranty_info') }}" maxlength="500"
                       class="input text-xs" placeholder="cth: Garansi Resmi Honda 3 Tahun / 100.000 Km + Gratis Servis Paket Hemat 4 Tahun / 50.000 Km">
            </div>

            <div>
                <label for="promo_package" class="label text-xs">Paket Promo Kredit &amp; DP Dealer Honda</label>
                <textarea id="promo_package" name="promo_package" rows="2" maxlength="1000" class="input text-xs"
                          placeholder="cth: DP Ringan Mulai 20 Jt-an / Angsuran Mulai 4 Jutaan / Bunga Spesial 0% s/d 2 Tahun / Tenor Fleksibel s/d 7 Tahun">{{ $vd('promo_package') }}</textarea>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="color_options" class="label text-xs">Pilihan Warna Resmi Honda</label>
                    <input type="text" id="color_options" name="color_options" value="{{ $vd('color_options') }}" maxlength="500"
                           class="input text-xs" placeholder="cth: Ignite Red Metallic Two Tone, Platinum White Pearl, Crystal Black, Meteoroid Gray">
                </div>

                <div>
                    <label for="bonus_accessories" class="label text-xs">Bonus Pembelian &amp; Aksesoris Resmi</label>
                    <textarea id="bonus_accessories" name="bonus_accessories" rows="2" maxlength="1000" class="input text-xs"
                              placeholder="cth: Gratis Kaca Film V-Kool/Solar Gard, Karpet Eksklusif WR-V, APAR, Dudukan Plat Nomor, Payung Eksklusif">{{ $vd('bonus_accessories') }}</textarea>
                </div>
            </div>

            <div>
                <span class="label text-xs font-bold text-slate-800">Checklist Fitur Spesifikasi Brosur &amp; Honda Sensing™</span>
                <div class="mt-2 grid gap-2 sm:grid-cols-2 lg:grid-cols-3">
                    @php
                        $hondaFeatureList = [
                            'Honda Sensing (CMBS, RDM, ACC, LKAS, LCDN, AHB)',
                            'Honda LaneWatch Blind-Spot Camera',
                            'Remote Engine Start',
                            'One Push Ignition System',
                            '7" Advanced Capacitive Touchscreen (Apple CarPlay & Android Auto)',
                            '6 Audio Speakers with Tweeter',
                            'Full LED Headlights with DRL & Sequential Turning Signal',
                            'Auto Foldable Door Mirror with LED Turning Signal',
                            '17" Two-Tone Sporty Alloy Wheels',
                            'Multi-Angle Rear Parking Camera',
                            'Leather-Fabric Combi Upholstery with Red Stitching',
                            'Auto A/C with Digital Display',
                            'G-CON + ACE with Side Impact Beam',
                            '6 Airbags (Dual Front, Side & Curtain)',
                            'Walk-Away Auto Lock & Smart Key',
                            'Vehicle Stability Assist (VSA) & Hill Start Assist (HSA)',
                        ];
                        $selectedFeatures = (array) old('honda_features', $listing?->vehicleDetail?->honda_features ?? []);
                    @endphp
                    @foreach ($hondaFeatureList as $feat)
                        <label class="flex cursor-pointer items-center gap-2 rounded-xl border border-slate-200 bg-white p-2.5 text-[11px] font-medium text-slate-700 transition hover:bg-red-50/50 has-checked:border-red-500 has-checked:bg-red-50 has-checked:text-red-900">
                            <input type="checkbox" name="honda_features[]" value="{{ $feat }}" class="size-4 rounded accent-red-600"
                                   @checked(in_array($feat, $selectedFeatures, true))>
                            <span class="truncate">{{ $feat }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @php
        $existingImagesData = ($listing && $listing->images)
            ? $listing->images->map(fn($img) => [
                'id' => $img->id,
                'url' => $img->url,
                'is_primary' => (bool)$img->is_primary,
                'delete_url' => \Illuminate\Support\Facades\Route::has('admin.listings.images.destroy')
                    ? route('admin.listings.images.destroy', ['listing' => $listing->id, 'image' => $img->id])
                    : url("/admin/listings/{$listing->id}/images/{$img->id}"),
                'primary_url' => \Illuminate\Support\Facades\Route::has('admin.listings.images.primary')
                    ? route('admin.listings.images.primary', ['listing' => $listing->id, 'image' => $img->id])
                    : url("/admin/listings/{$listing->id}/images/{$img->id}/primary"),
            ])->values()->all()
            : [];
        $existingImagesJson = json_encode($existingImagesData);
        $initialPrimaryId = $listing?->images?->where('is_primary', true)->first()?->id ?? 'null';
    @endphp

    <div class="card mt-6 p-6 sm:p-8"
         x-data="{
             existingImages: {{ $existingImagesJson }},
             deletedImages: [],
             primaryImageId: {{ $initialPrimaryId }},
             isDeleting: null,
             setPrimary(id) {
                 this.primaryImageId = id;
                 this.existingImages.forEach(img => img.is_primary = (img.id === id));
             },
             removeExisting(id) {
                 this.deletedImages.push(id);
                 this.existingImages = this.existingImages.filter(img => img.id !== id);
                 if (this.primaryImageId === id && this.existingImages.length > 0) {
                     this.setPrimary(this.existingImages[0].id);
                 } else if (this.existingImages.length === 0) {
                     this.primaryImageId = null;
                 }
             },
             async deleteImmediately(id, deleteUrl) {
                 if (!confirm('Hapus foto ini secara permanen dari server?')) return;
                 this.isDeleting = id;
                 try {
                     const res = await fetch(deleteUrl, {
                         method: 'DELETE',
                         headers: {
                             'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                             'Accept': 'application/json'
                         }
                     });
                     const data = await res.json();
                     if (data.success) {
                         this.existingImages = this.existingImages.filter(img => img.id !== id);
                         if (this.primaryImageId === id && this.existingImages.length > 0) {
                             this.setPrimary(this.existingImages[0].id);
                         } else if (this.existingImages.length === 0) {
                             this.primaryImageId = null;
                         }
                     }
                 } catch (e) {
                     alert('Gagal menghapus foto: ' + e.message);
                 } finally {
                     this.isDeleting = null;
                 }
             }
         }">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 border-b border-slate-100 pb-4">
            <div>
                <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                    <x-icon name="image" class="size-5 text-red-600"/>
                    <span x-text="(categoryType === 'vehicle' && (categorySlug === 'mobil-baru' || categorySlug.includes('honda'))) ? '5. Foto & Galeri Listing' : '4. Foto & Galeri Listing'">4. Foto & Galeri Listing</span>
                    <span class="text-red-500">*</span>
                </h2>
                <p class="mt-0.5 text-xs text-slate-500">Kelola foto yang sudah terunggah, tentukan foto cover utama, atau tambah foto baru.</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="badge border border-slate-200 bg-slate-50 text-slate-700 text-xs font-semibold">
                    <span x-text="existingImages.length"></span> Foto Tersimpan
                </span>
            </div>
        </div>

        {{-- Hidden inputs for deleted images & primary image ID --}}
        <template x-for="id in deletedImages" :key="id">
            <input type="hidden" name="deleted_images[]" :value="id">
        </template>
        <input type="hidden" name="primary_image_id" :value="primaryImageId">

        {{-- Hidden inputs for PDF extracted images --}}
        <template x-for="(img, idx) in extractedImages" :key="img.path">
            <input type="hidden" name="extracted_images[]" :value="img.path">
        </template>

        {{-- 1. Existing Uploaded Images Grid --}}
        <div x-show="existingImages.length > 0" class="mt-5">
            <div class="flex items-center justify-between mb-3">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-700 flex items-center gap-1.5">
                    <x-icon name="check-badge" class="size-4 text-emerald-600"/>
                    Foto Listing Saat Ini (<span x-text="existingImages.length"></span>)
                </p>
                <p class="text-[11px] text-slate-400">Klik "Jadikan Utama" untuk mengganti cover listing</p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                <template x-for="(img, idx) in existingImages" :key="img.id">
                    <div class="group relative overflow-hidden rounded-2xl border transition-all"
                         :class="img.is_primary ? 'border-emerald-500 ring-2 ring-emerald-500/20 bg-emerald-50/10' : 'border-slate-200 bg-white hover:border-slate-300'">
                        
                        {{-- Photo Thumbnail --}}
                        <div class="aspect-4/3 bg-slate-100 relative overflow-hidden">
                            <img :src="img.url" alt="" class="size-full object-cover">
                            
                            {{-- Cover Badge / Make Primary Button --}}
                            <div class="absolute top-2 left-2 z-10">
                                <template x-if="img.is_primary">
                                    <span class="inline-flex items-center gap-1 rounded-full bg-emerald-600 px-2.5 py-1 text-[10px] font-bold text-white shadow-xs">
                                        <x-icon name="check" class="size-3"/> Foto Utama
                                    </span>
                                </template>
                                <template x-if="!img.is_primary">
                                    <button type="button" @click="setPrimary(img.id)"
                                            class="inline-flex items-center gap-1 rounded-full bg-slate-900/80 px-2 py-1 text-[10px] font-semibold text-white backdrop-blur-sm hover:bg-emerald-600 transition-colors shadow-xs">
                                        <x-icon name="star" class="size-3"/> Jadikan Utama
                                    </button>
                                </template>
                            </div>

                            {{-- Delete Button --}}
                            <div class="absolute top-2 right-2 z-10">
                                <button type="button" @click="removeExisting(img.id)"
                                        class="grid size-7 place-items-center rounded-full bg-red-600 text-white shadow-sm hover:bg-red-700 transition-transform hover:scale-105"
                                        title="Hapus foto ini">
                                    <x-icon name="trash" class="size-3.5"/>
                                </button>
                            </div>
                        </div>

                        {{-- Footer Info --}}
                        <div class="flex items-center justify-between px-2.5 py-1.5 bg-white text-[11px] text-slate-500">
                            <span class="font-medium" x-text="`Foto #${idx + 1}`"></span>
                            <template x-if="img.is_primary">
                                <span class="font-bold text-emerald-600 text-[10px]">COVER</span>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        {{-- Notice if all existing images deleted --}}
        <div x-show="deletedImages.length > 0 && existingImages.length === 0" x-cloak class="mt-4 rounded-xl border border-amber-200 bg-amber-50 p-3 text-xs text-amber-800">
            Semua foto lama ditandai untuk dihapus. Silakan unggah minimal 1 foto baru di bawah ini.
        </div>

        {{-- Extracted Images from PDF Gallery Grid --}}
        <div x-show="extractedImages.length" x-cloak class="mt-5 rounded-2xl border border-slate-200 bg-slate-50/60 p-4">
            <div class="flex items-center justify-between gap-2 mb-3">
                <span class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-900">
                    <x-icon name="image" class="size-3.5 text-slate-600"/>
                    Foto Halaman Brosur PDF (<span x-text="extractedImages.length"></span> Foto)
                </span>
                <span class="text-[11px] text-slate-500">Tersimpan saat listing disimpan</span>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                <template x-for="(img, idx) in extractedImages" :key="img.path">
                    <div class="group relative overflow-hidden rounded-xl border border-primary-200 bg-white shadow-sm">
                        <div class="aspect-4/3 bg-slate-100">
                            <img :src="img.url" alt="" class="size-full object-cover">
                        </div>
                        <div class="flex items-center justify-between gap-1 px-2 py-1.5 bg-white">
                            <span class="truncate text-[10px] font-semibold text-slate-600" x-text="`Hal. ${idx + 1}`"></span>
                            <button type="button" class="shrink-0 rounded p-1 text-slate-400 hover:bg-red-50 hover:text-red-600"
                                    @click="extractedImages = extractedImages.filter((_, i) => i !== idx)" aria-label="Hapus foto">
                                <x-icon name="x" class="size-3.5"/>
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        {{-- 2. Add New Photos Upload Dropzone --}}
        <div x-data="uploadManager(20, 10240)" class="mt-6 border-t border-slate-100 pt-5">
            <div class="mb-3 flex items-center justify-between">
                <label class="label !mb-0 text-xs font-bold text-slate-700 flex items-center gap-1.5">
                    <x-icon name="upload" class="size-4 text-slate-500"/>
                    <span>Tambah Foto Baru (Upload / Drag &amp; Drop)</span>
                </label>
                <span class="text-[11px] text-slate-400">Format: JPG, PNG, WebP (Maks 10 MB/foto)</span>
            </div>

            <input type="file" x-ref="fileInput" name="images[]" accept="image/jpeg,image/png,image/webp" multiple
                   x-on:change="handleFiles($event.target.files)" class="hidden" id="images-input">

            <label for="images-input"
                   class="flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50/80 px-6 py-8 text-center transition-colors hover:border-slate-400 hover:bg-slate-100/80"
                   :class="dragging ? 'border-red-500! bg-red-50/50!' : ''"
                   x-on:dragover.prevent="dragging = true"
                   x-on:dragleave="dragging = false"
                   x-on:drop.prevent="onDrop($event)">
                <span class="grid size-12 place-items-center rounded-2xl bg-white text-slate-700 shadow-xs border border-slate-200">
                    <x-icon name="plus" class="size-6 text-red-600"/>
                </span>
                <span class="mt-3 text-xs sm:text-sm font-bold text-slate-800">Klik untuk memilih foto baru atau seret file ke sini</span>
                <span class="mt-1 text-[11px] text-slate-400">Bisa memilih banyak foto sekaligus (maksimal 20 total foto)</span>
            </label>

            {{-- New Files Preview Grid --}}
            <div x-show="files.length" class="mt-4 grid grid-cols-2 sm:grid-cols-4 gap-3" x-cloak>
                <template x-for="file in files" :key="file.id">
                    <div class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-xs">
                        <div class="aspect-4/3 bg-slate-100 relative">
                            <template x-if="file.url">
                                <img :src="file.url" alt="" class="size-full object-cover">
                            </template>
                            <template x-if="!file.url">
                                <div class="grid h-full place-items-center p-3 text-center text-xs font-medium text-red-600">
                                    <span x-text="file.error"></span>
                                </div>
                            </template>
                            <span class="absolute top-2 left-2 rounded-full bg-blue-600 px-2 py-0.5 text-[9px] font-bold text-white shadow-xs">
                                BARU
                            </span>
                        </div>
                        <div class="flex items-center justify-between gap-1 px-2.5 py-1.5">
                            <span class="truncate text-[11px] text-slate-600 font-medium" x-text="file.name"></span>
                            <button type="button" class="shrink-0 rounded-full p-1 text-slate-400 hover:bg-red-50 hover:text-red-600" @click="remove(file.id)" aria-label="Hapus foto">
                                <x-icon name="x" class="size-3.5"/>
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        @error('images')
            <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
        @enderror
        @error('images.*')
            <p class="mt-2 text-xs font-medium text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
        <a href="{{ route('admin.listings.index') }}" class="btn-outline">Batal</a>
        <button type="submit" class="btn-primary">
            <x-icon name="check" class="size-4"/>
            {{ $listing ? 'Simpan Perubahan' : 'Simpan Listing' }}
        </button>
    </div>
</div>