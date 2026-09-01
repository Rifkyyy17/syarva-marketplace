<x-layouts.admin>
    <x-slot:title>Detail Listing</x-slot:title>
    <x-slot:pageTitle>Detail Listing</x-slot:pageTitle>

    <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
        <a href="{{ route('admin.listings.index') }}" class="btn-ghost btn-sm">
            <x-icon name="chevron-left" class="size-4"/> Kembali ke Daftar
        </a>
        <div class="flex items-center gap-2">
            <a href="{{ route('listings.show', $listing->slug) }}" target="_blank" class="btn-outline btn-sm">
                <x-icon name="external" class="size-4"/> Lihat di Web
            </a>
            <a href="{{ route('admin.listings.edit', $listing) }}" class="btn-primary btn-sm">
                <x-icon name="pencil" class="size-4"/> Edit Listing &amp; Foto
            </a>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-[1fr_340px]">
        <div class="min-w-0 space-y-6">
            <div class="card overflow-hidden">
                <div class="relative aspect-16/8 bg-slate-100">
                    @if ($listing->primaryImage)
                        <img src="{{ $listing->primaryImage->url }}" alt="" class="size-full object-cover">
                    @else
                        <span class="grid size-full place-items-center text-slate-400"><x-icon name="image" class="size-14"/></span>
                    @endif
                    <div class="absolute inset-x-0 bottom-0 flex items-end justify-between gap-4 bg-linear-to-t from-slate-900/80 to-transparent p-5">
                        <div class="min-w-0">
                            <h1 class="truncate text-lg font-bold text-white sm:text-xl">{{ $listing->title }}</h1>
                            <p class="mt-0.5 flex items-center gap-1.5 text-xs text-slate-200">
                                <x-icon name="map-pin" class="size-3.5"/> {{ $listing->location_full }}
                            </p>
                        </div>
                        <span class="shrink-0 text-lg font-extrabold text-accent-300">Rp {{ number_format((float) $listing->price, 0, ',', '.') }}</span>
                    </div>
                </div>

                {{-- Photo Management Gallery Strip --}}
                <div class="border-t border-slate-100 bg-slate-50/50 p-4">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-700 flex items-center gap-1.5">
                            <x-icon name="image" class="size-4 text-slate-500"/>
                            Galeri Foto ({{ $listing->images->count() }})
                        </h3>
                        <a href="{{ route('admin.listings.edit', $listing) }}" class="text-xs font-semibold text-red-600 hover:text-red-700 flex items-center gap-1">
                            <x-icon name="plus" class="size-3.5"/> Tambah / Edit Foto
                        </a>
                    </div>
                    @if ($listing->images->isNotEmpty())
                        <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-3">
                            @foreach ($listing->images as $image)
                                <div class="group relative overflow-hidden rounded-xl border {{ $image->is_primary ? 'border-emerald-500 ring-2 ring-emerald-500/20' : 'border-slate-200' }} bg-white shadow-xs">
                                    <div class="aspect-4/3 bg-slate-100 relative">
                                        <img src="{{ $image->url }}" alt="" loading="lazy" class="size-full object-cover">
                                        @if ($image->is_primary)
                                            <span class="absolute top-1 left-1 rounded-full bg-emerald-600 px-1.5 py-0.5 text-[9px] font-bold text-white shadow-xs">
                                                Cover
                                            </span>
                                        @endif
                                    </div>
                                    <div class="flex items-center justify-between gap-1 p-1.5 bg-white border-t border-slate-100">
                                        @if (! $image->is_primary)
                                            <form method="POST" action="{{ \Illuminate\Support\Facades\Route::has('admin.listings.images.primary') ? route('admin.listings.images.primary', [$listing, $image]) : url('/admin/listings/'.$listing->id.'/images/'.$image->id.'/primary') }}">
                                                @csrf
                                                <button type="submit" class="rounded px-1.5 py-0.5 text-[10px] font-semibold text-slate-600 hover:bg-slate-100 hover:text-slate-900" title="Jadikan Foto Utama">
                                                    Utama
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-[10px] font-bold text-emerald-600 px-1">Utama</span>
                                        @endif

                                        <form method="POST" action="{{ \Illuminate\Support\Facades\Route::has('admin.listings.images.destroy') ? route('admin.listings.images.destroy', [$listing, $image]) : url('/admin/listings/'.$listing->id.'/images/'.$image->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded p-1 text-slate-400 hover:bg-red-50 hover:text-red-600"
                                                    @click.prevent="$dispatch('confirm-action', { form: $el.closest('form'), message: 'Hapus foto ini dari listing?' })"
                                                    title="Hapus foto">
                                                <x-icon name="trash" class="size-3.5"/>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-xs text-slate-400 py-2">Belum ada foto yang diunggah.</p>
                    @endif
                </div>
            </div>


            <div class="card p-6">
                <h2 class="text-base font-bold text-slate-900">Deskripsi</h2>
                <p class="mt-3 whitespace-pre-line text-sm leading-relaxed text-slate-600">{{ $listing->description }}</p>
            </div>

            @if ($listing->isProperty() && $listing->propertyDetail)
                <div class="card p-6">
                    <h2 class="text-base font-bold text-slate-900">Detail Properti</h2>
                    <dl class="mt-4 grid grid-cols-2 gap-3 sm:grid-cols-3">
                        <x-spec-item icon="ruler" label="Luas Tanah" :value="isset($listing->propertyDetail->land_area) ? number_format($listing->propertyDetail->land_area, 0, ',', '.').' m²' : null"/>
                        <x-spec-item icon="building" label="Luas Bangunan" :value="isset($listing->propertyDetail->building_area) ? number_format($listing->propertyDetail->building_area, 0, ',', '.').' m²' : null"/>
                        <x-spec-item icon="bed" label="Kamar Tidur" :value="$listing->propertyDetail->bedrooms"/>
                        <x-spec-item icon="bath" label="Kamar Mandi" :value="$listing->propertyDetail->bathrooms"/>
                        <x-spec-item icon="car" label="Garasi" :value="$listing->propertyDetail->garage"/>
                        <x-spec-item icon="layers" label="Lantai" :value="$listing->propertyDetail->floors"/>
                        <x-spec-item icon="shield" label="Sertifikat" :value="$listing->propertyDetail->certificate"/>
                        <x-spec-item icon="map" label="Status Tanah" :value="$listing->propertyDetail->land_status"/>
                        <x-spec-item icon="home" label="Status Bangunan" :value="$listing->propertyDetail->building_status"/>
                    </dl>
                    @if (! empty($listing->propertyDetail->facilities))
                        <div class="mt-5 flex flex-wrap gap-2">
                            @foreach ($listing->propertyDetail->facilities as $facility)
                                <span class="badge border border-primary-200 bg-primary-50 text-primary-800"><x-icon name="check" class="size-3"/> {{ $facility }}</span>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            @if ($listing->isVehicle() && $listing->vehicleDetail)
                <div class="card p-6">
                    <h2 class="text-base font-bold text-slate-900">Detail Kendaraan</h2>
                    <dl class="mt-4 grid grid-cols-2 gap-3 sm:grid-cols-3">
                        <x-spec-item icon="car-front" label="Merk" :value="$listing->vehicleDetail->brand"/>
                        <x-spec-item icon="car-back" label="Model" :value="$listing->vehicleDetail->model"/>
                        <x-spec-item icon="calendar" label="Tahun" :value="$listing->vehicleDetail->year"/>
                        <x-spec-item icon="gauge" label="Kilometer" :value="$listing->vehicleDetail->mileage_label"/>
                        <x-spec-item icon="settings" label="Transmisi" :value="$listing->vehicleDetail->transmission"/>
                        <x-spec-item icon="fuel" label="Bahan Bakar" :value="$listing->vehicleDetail->fuel_type"/>
                        <x-spec-item icon="palette" label="Warna" :value="$listing->vehicleDetail->color"/>
                        <x-spec-item icon="check-badge" label="Kondisi" :value="$listing->vehicleDetail->condition_label"/>
                        <x-spec-item icon="gauge" label="Mesin" :value="$listing->vehicleDetail->engine_capacity"/>
                        <x-spec-item icon="tag" label="Plat Nomor" :value="$listing->vehicleDetail->license_plate"/>
                    </dl>
                </div>
            @endif

            @if ($listing->inquiries->isNotEmpty())
                <div class="card p-6">
                    <h2 class="text-base font-bold text-slate-900">Inquiry ({{ $listing->inquiries->count() }})</h2>
                    <ul class="mt-4 space-y-3">
                        @foreach ($listing->inquiries as $inquiry)
                            <li class="flex items-start gap-3 rounded-xl border border-slate-100 bg-slate-50 p-4">
                                <span class="grid size-9 shrink-0 place-items-center rounded-full bg-primary-100 text-sm font-bold text-primary-700">{{ strtoupper(substr($inquiry->name, 0, 1)) }}</span>
                                <div class="min-w-0 flex-1">
                                    <p class="text-sm font-semibold text-slate-800">{{ $inquiry->name }} <span class="font-normal text-slate-400">&lt;{{ $inquiry->email }}&gt;</span></p>
                                    <p class="mt-1 text-sm text-slate-600">{{ $inquiry->message }}</p>
                                    <p class="mt-1 text-xs text-slate-400">{{ $inquiry->created_at->translatedFormat('d M Y H:i') }}</p>
                                </div>
                                <x-badge :status="$inquiry->status" class="shrink-0"/>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <aside class="space-y-5 lg:sticky lg:top-24 lg:self-start">
            <div class="card p-5">
                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-bold uppercase tracking-wide text-slate-800">Status</h2>
                    <x-badge :status="$listing->status"/>
                </div>

                @if ($listing->status === \App\Enums\ListingStatus::PENDING)
                    <div class="mt-4">
                        <form method="POST" action="{{ route('admin.listings.approve', $listing) }}">
                            @csrf
                            <button type="submit" class="btn-primary w-full">
                                <x-icon name="check" class="size-4"/> Approve &amp; Publikasikan
                            </button>
                        </form>
                        <div class="mt-3 rounded-xl border border-red-200 bg-red-50 p-3">
                            <form method="POST" action="{{ route('admin.listings.reject', $listing) }}" class="space-y-2">
                                @csrf
                                <label for="reason" class="label mb-1! text-xs font-semibold text-red-700">Alasan Penolakan</label>
                                <textarea id="reason" name="reason" rows="2" required minlength="5" maxlength="1000" class="input py-2! text-xs" placeholder="cth: Foto tidak jelas, mohon unggah ulang"></textarea>
                                <button type="submit" class="btn-danger btn-sm w-full">
                                    <x-icon name="ban" class="size-4"/> Tolak
                                </button>
                            </form>
                        </div>
                    </div>
                @endif

                @if ($listing->rejection_reason)
                    <div class="mt-4 rounded-xl border border-red-200 bg-red-50 p-3">
                        <p class="text-xs font-bold uppercase text-red-700">Alasan Penolakan</p>
                        <p class="mt-1 text-sm text-red-800">{{ $listing->rejection_reason }}</p>
                    </div>
                @endif

                <div class="mt-4 pt-4 border-t border-slate-100">
                    <a href="{{ route('admin.listings.edit', $listing) }}" class="btn-primary w-full justify-center">
                        <x-icon name="pencil" class="size-4"/> Edit Data &amp; Foto Listing
                    </a>
                </div>

                <form method="POST" action="{{ route('admin.listings.status', $listing) }}" class="mt-4 space-y-2">
                    @csrf
                    <label for="status" class="label mb-1! text-xs font-semibold text-slate-500">Ubah Status</label>
                    <div class="flex gap-2">
                        <select id="status" name="status" class="input py-2! text-sm">
                            @foreach (\App\Models\Listing::STATUSES as $status)
                                <option value="{{ $status }}" @selected($listing->status->value === $status)>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn-outline btn-sm shrink-0">Simpan</button>
                    </div>
                </form>

                <form method="POST" action="{{ route('admin.listings.feature', $listing) }}" class="mt-3">
                    @csrf
                    <button type="submit" class="btn-outline w-full">
                        <x-icon name="star" class="size-4"/> {{ $listing->featured ? 'Hapus dari Unggulan' : 'Jadikan Unggulan' }}
                    </button>
                </form>

                <form method="POST" action="{{ route('admin.listings.destroy', $listing) }}" class="mt-3">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger btn-sm w-full" @click.prevent="$dispatch('confirm-action', { form: $el.closest('form'), message: 'Hapus listing ini? (soft delete)' })">
                        <x-icon name="trash" class="size-4"/> Hapus Listing
                    </button>
                </form>
            </div>

            <div class="card p-5">
                <h2 class="text-sm font-bold uppercase tracking-wide text-slate-800">Penjual</h2>
                <div class="mt-3 flex items-center gap-3">
                    <span class="grid size-11 shrink-0 place-items-center rounded-full bg-primary-700 font-bold text-white">
                        {{ strtoupper(substr($listing->user->name, 0, 1)) }}
                    </span>
                    <div class="min-w-0">
                        <p class="truncate text-sm font-bold text-slate-900">{{ $listing->user->name }}</p>
                        <p class="truncate text-xs text-slate-500">{{ $listing->user->email }}</p>
                    </div>
                </div>
                <dl class="mt-4 space-y-2 text-sm">
                    <div class="flex justify-between"><dt class="text-slate-500">Total Listing</dt><dd class="font-semibold text-slate-800">{{ $listing->user->listings()->count() }}</dd></div>
                    <div class="flex justify-between"><dt class="text-slate-500">Bergabung</dt><dd class="font-semibold text-slate-800">{{ $listing->user->created_at->translatedFormat('d M Y') }}</dd></div>
                    <div class="flex justify-between"><dt class="text-slate-500">Dilihat</dt><dd class="font-semibold text-slate-800">{{ number_format($listing->view_count, 0, ',', '.') }}</dd></div>
                    <div class="flex justify-between"><dt class="text-slate-500">Dibuat</dt><dd class="font-semibold text-slate-800">{{ $listing->created_at->translatedFormat('d M Y') }}</dd></div>
                </dl>
            </div>
        </aside>
    </div>
</x-layouts.admin>