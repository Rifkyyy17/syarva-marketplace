@props(['plan'])

<div class="space-y-6">
    <div class="card p-6 sm:p-8">
        <h2 class="text-base font-bold text-slate-900 border-b border-slate-100 pb-3">1. Informasi Utama Paket</h2>

        <div class="mt-5 space-y-4">
            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="name" class="label">Nama Paket <span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name', $plan->name) }}" required maxlength="100"
                           class="input {{ $errors->has('name') ? 'input-error' : '' }}" placeholder="cth: Pro Agen / Enterprise Dealer">
                    @error('name')
                        <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="badge_label" class="label">Badge Label (Opsional)</label>
                    <input type="text" id="badge_label" name="badge_label" value="{{ old('badge_label', $plan->badge_label) }}" maxlength="50"
                           class="input" placeholder="cth: Paling Populer / Best Value">
                    <p class="mt-1 text-[11px] text-slate-400">Pita penanda khusus di atas kartu paket.</p>
                </div>
            </div>

            <div>
                <label for="description" class="label">Deskripsi Singkat</label>
                <textarea id="description" name="description" rows="2" maxlength="500" class="input"
                          placeholder="Jelaskan target pengguna paket ini (cth: Cocok untuk agen properti &amp; sales mobil aktif).">{{ old('description', $plan->description) }}</textarea>
            </div>
        </div>
    </div>

    <div class="card p-6 sm:p-8">
        <h2 class="text-base font-bold text-slate-900 border-b border-slate-100 pb-3">2. Harga, Durasi &amp; Kuota Slot</h2>

        <div class="mt-5 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div>
                <label for="price" class="label">Harga (Rp) <span class="text-red-500">*</span></label>
                <input type="number" id="price" name="price" value="{{ old('price', (int) $plan->price) }}" required min="0" step="1000"
                       class="input {{ $errors->has('price') ? 'input-error' : '' }}" placeholder="cth: 99000 (0 jika Gratis)">
                @error('price')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="duration_days" class="label">Durasi Masa Aktif (Hari) <span class="text-red-500">*</span></label>
                <input type="number" id="duration_days" name="duration_days" value="{{ old('duration_days', $plan->duration_days ?? 30) }}" required min="1" max="3650"
                       class="input {{ $errors->has('duration_days') ? 'input-error' : '' }}" placeholder="30">
                @error('duration_days')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="listing_limit" class="label">Kuota Slot Iklan <span class="text-red-500">*</span></label>
                <input type="number" id="listing_limit" name="listing_limit" value="{{ old('listing_limit', $plan->listing_limit ?? 10) }}" required min="1" max="99999"
                       class="input {{ $errors->has('listing_limit') ? 'input-error' : '' }}" placeholder="10">
                @error('listing_limit')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="featured_limit" class="label">Kuota Iklan Unggulan <span class="text-red-500">*</span></label>
                <input type="number" id="featured_limit" name="featured_limit" value="{{ old('featured_limit', $plan->featured_limit ?? 2) }}" required min="0" max="99999"
                       class="input {{ $errors->has('featured_limit') ? 'input-error' : '' }}" placeholder="2">
                @error('featured_limit')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <div class="card p-6 sm:p-8">
        <h2 class="text-base font-bold text-slate-900 border-b border-slate-100 pb-3">3. Daftar Fitur &amp; Keunggulan</h2>

        <div class="mt-5">
            <label for="features_text" class="label">Fitur Paket (1 baris = 1 poin fitur)</label>
            @php
                $featuresString = old('features_text', is_array($plan->features) ? implode("\n", $plan->features) : '');
            @endphp
            <textarea id="features_text" name="features_text" rows="6" class="input font-mono text-xs"
                      placeholder="Maksimal 10 Listing Aktif&#10;2 Slot Iklan Unggulan (Featured)&#10;Integrasi Tombol WhatsApp Penjual&#10;Lencana Verifikasi Agen&#10;Statistik Pengunjung Lengkap">{{ $featuresString }}</textarea>
            <p class="mt-1 text-[11px] text-slate-400">Tuliskan setiap fitur per baris (tekan Enter untuk fitur baru). Tanda centang otomatis ditambahkan di halaman publik.</p>
        </div>
    </div>

    <div class="card p-6 sm:p-8">
        <h2 class="text-base font-bold text-slate-900 border-b border-slate-100 pb-3">4. Pengaturan Tampilan &amp; Status</h2>

        <div class="mt-5 grid gap-4 sm:grid-cols-3">
            <div>
                <label for="sort_order" class="label">Urutan Tampil <span class="text-red-500">*</span></label>
                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $plan->sort_order ?? 1) }}" required min="0" max="9999"
                       class="input" placeholder="1">
                <p class="mt-1 text-[11px] text-slate-400">Angka lebih kecil tampil lebih awal di kiri.</p>
            </div>

            <div class="sm:col-span-2 flex flex-col sm:flex-row gap-4 pt-3 sm:pt-6">
                <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 bg-white p-3 text-sm font-medium text-slate-800 hover:bg-slate-50 flex-1">
                    <input type="checkbox" name="is_featured" value="1" class="size-4 rounded accent-primary-600"
                           @checked(old('is_featured', $plan->is_featured))>
                    <div>
                        <span class="block font-bold text-xs">Jadikan Paket Rekomendasi (Featured)</span>
                        <span class="block text-[11px] text-slate-400 font-normal">Sorot dengan bingkai berwarna utama</span>
                    </div>
                </label>

                <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 bg-white p-3 text-sm font-medium text-slate-800 hover:bg-slate-50 flex-1">
                    <input type="checkbox" name="is_active" value="1" class="size-4 rounded accent-primary-600"
                           @checked(old('is_active', $plan->is_active ?? true))>
                    <div>
                        <span class="block font-bold text-xs">Aktifkan Paket</span>
                        <span class="block text-[11px] text-slate-400 font-normal">Tampilkan di halaman publik</span>
                    </div>
                </label>
            </div>
        </div>
    </div>

    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
        <a href="{{ route('admin.plans.index') }}" class="btn-outline">Batal</a>
        <button type="submit" class="btn-primary">
            <x-icon name="check" class="size-4"/>
            {{ $plan->exists ? 'Perbarui Paket' : 'Simpan Paket Baru' }}
        </button>
    </div>
</div>
