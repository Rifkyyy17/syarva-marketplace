<x-layouts.admin>
    <x-slot:title>Pengaturan</x-slot:title>
    <x-slot:pageTitle>Pengaturan Website</x-slot:pageTitle>

    <div class="mb-5 flex flex-wrap gap-2">
        @foreach ($sections as $key)
            <a href="{{ route('admin.settings.edit', $key) }}"
               class="rounded-full px-4 py-2 text-sm font-semibold transition
                      {{ $section === $key ? 'bg-primary-700 text-white' : 'bg-white text-slate-600 ring-1 ring-slate-200 hover:bg-slate-50' }}">
                {{ ucfirst($key) }}
            </a>
        @endforeach
    </div>

    <div class="card mx-auto max-w-2xl p-6 sm:p-8">
        <form method="POST" action="{{ route('admin.settings.update', $section) }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            @if ($section === 'website')
                <div class="rounded-2xl border border-slate-200 bg-slate-50/50 p-4 space-y-4">
                    <h3 class="text-sm font-bold text-slate-800">Branding &amp; Identitas Logo</h3>
                    
                    {{-- Logo Upload --}}
                    <div>
                        <label class="label">Logo Website (Format PNG / SVG / WebP, Max 2MB)</label>
                        @if (!empty($settings['site_logo']))
                            <div class="mb-3 flex items-center gap-4 rounded-xl border border-slate-200 bg-white p-3">
                                <img src="{{ Storage::disk('public')->url($settings['site_logo']) }}" alt="Logo Saat Ini" class="h-10 max-w-[160px] object-contain">
                                <label class="flex items-center gap-2 text-xs font-semibold text-red-600 cursor-pointer">
                                    <input type="checkbox" name="remove_logo" value="1" class="rounded accent-red-600"> Hapus Logo (Gunakan Teks Default)
                                </label>
                            </div>
                        @endif
                        <input type="file" name="site_logo" accept="image/png,image/jpeg,image/svg+xml,image/webp" class="input file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                        @error('site_logo')
                            <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Favicon Upload --}}
                    <div>
                        <label class="label">Favicon Browser (Format ICO / PNG, Max 1MB)</label>
                        @if (!empty($settings['site_favicon']))
                            <div class="mb-3 flex items-center gap-4 rounded-xl border border-slate-200 bg-white p-3">
                                <img src="{{ Storage::disk('public')->url($settings['site_favicon']) }}" alt="Favicon Saat Ini" class="size-6 object-contain">
                                <label class="flex items-center gap-2 text-xs font-semibold text-red-600 cursor-pointer">
                                    <input type="checkbox" name="remove_favicon" value="1" class="rounded accent-red-600"> Hapus Favicon
                                </label>
                            </div>
                        @endif
                        <input type="file" name="site_favicon" accept="image/x-icon,image/png,image/svg+xml,image/webp" class="input file:mr-4 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                        @error('site_favicon')
                            <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="site_name" class="label">Nama Website</label>
                    <input type="text" id="site_name" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? config('app.name')) }}" required maxlength="100" class="input {{ $errors->has('site_name') ? 'input-error' : '' }}">
                    @error('site_name')
                        <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="site_tagline" class="label">Tagline</label>
                    <input type="text" id="site_tagline" name="site_tagline" value="{{ old('site_tagline', $settings['site_tagline'] ?? '') }}" maxlength="200" class="input">
                </div>
                <div>
                    <label for="site_description" class="label">Deskripsi</label>
                    <textarea id="site_description" name="site_description" rows="3" maxlength="500" class="input">{{ old('site_description', $settings['site_description'] ?? '') }}</textarea>
                </div>
                <div>
                    <label for="site_announcement" class="label">Pengumuman (tampil di navbar)</label>
                    <textarea id="site_announcement" name="site_announcement" rows="2" maxlength="500" class="input" placeholder="cth: Syarat & ketentuan terbaru...">{{ old('site_announcement', $settings['site_announcement'] ?? '') }}</textarea>
                </div>
            @elseif ($section === 'icons')
                @php
                    $availableIcons = [
                        'building' => 'Building / Gedung',
                        'home' => 'Home / Rumah',
                        'map' => 'Map / Peta / Tanah',
                        'car-front' => 'Mobil Depan (Honda Baru)',
                        'car-back' => 'Mobil Belakang (Mobil Bekas)',
                        'car' => 'Mobil Samping',
                        'sparkles' => 'Sparkles / Kilau',
                        'shield' => 'Shield / Keamanan',
                        'search' => 'Search / Pencarian',
                        'send' => 'Send / Pesawat Kertas',
                        'zap' => 'Zap / Kilat',
                        'star' => 'Star / Bintang',
                        'check-badge' => 'Badge Centang Terverifikasi',
                        'wallet' => 'Wallet / Dompet',
                        'briefcase' => 'Briefcase / Koper Bisnis',
                        'tag' => 'Tag / Label Promo',
                        'ruler' => 'Ruler / Luas Tanah',
                        'gauge' => 'Gauge / Spidometer',
                        'fuel' => 'Fuel / Bensin',
                        'key' => 'Key / Kunci',
                        'refresh' => 'Refresh / Tukar Tambah',
                        'globe' => 'Globe / Jaringan',
                        'truck' => 'Truck / Kendaraan Niaga',
                        'clock' => 'Clock / Jam Cepat',
                        'camera' => 'Camera / Galeri Foto',
                    ];
                @endphp

                <div class="space-y-6">
                    {{-- 1. Icon Kategori Utama --}}
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/50 p-4 sm:p-5 space-y-4">
                        <div class="flex items-center gap-3 border-b border-slate-200 pb-3">
                            <span class="grid size-9 place-items-center rounded-xl bg-primary-700 text-white shadow-xs">
                                <x-icon name="grid" class="size-4.5"/>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Icon Kategori Landing Page</h3>
                                <p class="text-xs text-slate-500">Ubah icon untuk masing-masing kartu kategori di halaman beranda.</p>
                            </div>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <label for="icon_category_rumah" class="label flex items-center gap-2">
                                    <x-icon name="{{ old('icon_category_rumah', $settings['icon_category_rumah'] ?? 'building') }}" class="size-4 text-primary-700"/>
                                    Icon Kategori Rumah
                                </label>
                                <select id="icon_category_rumah" name="icon_category_rumah" class="input text-xs">
                                    @foreach ($availableIcons as $val => $text)
                                        <option value="{{ $val }}" @selected(($settings['icon_category_rumah'] ?? 'building') === $val)>{{ $text }} ({{ $val }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="icon_category_tanah" class="label flex items-center gap-2">
                                    <x-icon name="{{ old('icon_category_tanah', $settings['icon_category_tanah'] ?? 'map') }}" class="size-4 text-primary-700"/>
                                    Icon Kategori Tanah
                                </label>
                                <select id="icon_category_tanah" name="icon_category_tanah" class="input text-xs">
                                    @foreach ($availableIcons as $val => $text)
                                        <option value="{{ $val }}" @selected(($settings['icon_category_tanah'] ?? 'map') === $val)>{{ $text }} ({{ $val }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="icon_category_mobil_baru" class="label flex items-center gap-2">
                                    <x-icon name="{{ old('icon_category_mobil_baru', $settings['icon_category_mobil_baru'] ?? 'car-front') }}" class="size-4 text-primary-700"/>
                                    Icon Honda (Mobil Baru)
                                </label>
                                <select id="icon_category_mobil_baru" name="icon_category_mobil_baru" class="input text-xs">
                                    @foreach ($availableIcons as $val => $text)
                                        <option value="{{ $val }}" @selected(($settings['icon_category_mobil_baru'] ?? 'car-front') === $val)>{{ $text }} ({{ $val }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="icon_category_mobil_second" class="label flex items-center gap-2">
                                    <x-icon name="{{ old('icon_category_mobil_second', $settings['icon_category_mobil_second'] ?? 'car-back') }}" class="size-4 text-primary-700"/>
                                    Icon Mobil Second
                                </label>
                                <select id="icon_category_mobil_second" name="icon_category_mobil_second" class="input text-xs">
                                    @foreach ($availableIcons as $val => $text)
                                        <option value="{{ $val }}" @selected(($settings['icon_category_mobil_second'] ?? 'car-back') === $val)>{{ $text }} ({{ $val }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- 2. Icon Layanan Spesifik --}}
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/50 p-4 sm:p-5 space-y-4">
                        <div class="flex items-center gap-3 border-b border-slate-200 pb-3">
                            <span class="grid size-9 place-items-center rounded-xl bg-amber-600 text-white shadow-xs">
                                <x-icon name="zap" class="size-4.5"/>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Icon Layanan Spesifik</h3>
                                <p class="text-xs text-slate-500">Ubah icon untuk 3 kotak layanan cepat di halaman beranda.</p>
                            </div>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-3">
                            <div>
                                <label for="icon_service_jual_mobil" class="label flex items-center gap-2 text-xs">
                                    <x-icon name="{{ old('icon_service_jual_mobil', $settings['icon_service_jual_mobil'] ?? 'car-back') }}" class="size-4 text-amber-600"/>
                                    Jual Mobil Bekas
                                </label>
                                <select id="icon_service_jual_mobil" name="icon_service_jual_mobil" class="input text-xs">
                                    @foreach ($availableIcons as $val => $text)
                                        <option value="{{ $val }}" @selected(($settings['icon_service_jual_mobil'] ?? 'car-back') === $val)>{{ $text }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="icon_service_properti" class="label flex items-center gap-2 text-xs">
                                    <x-icon name="{{ old('icon_service_properti', $settings['icon_service_properti'] ?? 'building') }}" class="size-4 text-emerald-600"/>
                                    Konsultasi Properti
                                </label>
                                <select id="icon_service_properti" name="icon_service_properti" class="input text-xs">
                                    @foreach ($availableIcons as $val => $text)
                                        <option value="{{ $val }}" @selected(($settings['icon_service_properti'] ?? 'building') === $val)>{{ $text }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="icon_service_test_drive" class="label flex items-center gap-2 text-xs">
                                    <x-icon name="{{ old('icon_service_test_drive', $settings['icon_service_test_drive'] ?? 'car-front') }}" class="size-4 text-primary-600"/>
                                    Test Drive Honda
                                </label>
                                <select id="icon_service_test_drive" name="icon_service_test_drive" class="input text-xs">
                                    @foreach ($availableIcons as $val => $text)
                                        <option value="{{ $val }}" @selected(($settings['icon_service_test_drive'] ?? 'car-front') === $val)>{{ $text }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- 3. Icon & Teks 3 Keunggulan (Value Props) --}}
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/50 p-4 sm:p-5 space-y-4">
                        <div class="flex items-center gap-3 border-b border-slate-200 pb-3">
                            <span class="grid size-9 place-items-center rounded-xl bg-emerald-600 text-white shadow-xs">
                                <x-icon name="check-badge" class="size-4.5"/>
                            </span>
                            <div>
                                <h3 class="text-sm font-bold text-slate-900">Icon &amp; Teks 3 Keunggulan</h3>
                                <p class="text-xs text-slate-500">Atur icon dan teks pada bagian keunggulan transaksi di landing page.</p>
                            </div>
                        </div>

                        {{-- Keunggulan 1 --}}
                        <div class="rounded-xl border border-slate-200 bg-white p-3.5 space-y-3">
                            <span class="text-xs font-bold text-primary-800">Keunggulan 1</span>
                            <div class="grid gap-3 sm:grid-cols-2">
                                <div>
                                    <label class="label text-xs">Pilihan Icon 1</label>
                                    <select name="icon_feature_1" class="input text-xs">
                                        @foreach ($availableIcons as $val => $text)
                                            <option value="{{ $val }}" @selected(($settings['icon_feature_1'] ?? 'shield') === $val)>{{ $text }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="label text-xs">Judul Keunggulan 1</label>
                                    <input type="text" name="title_feature_1" value="{{ old('title_feature_1', $settings['title_feature_1'] ?? 'Transaksi Aman') }}" class="input text-xs">
                                </div>
                            </div>
                            <div>
                                <label class="label text-xs">Deskripsi Singkat 1</label>
                                <input type="text" name="desc_feature_1" value="{{ old('desc_feature_1', $settings['desc_feature_1'] ?? 'Setiap listing diverifikasi oleh admin sebelum dipublikasikan.') }}" class="input text-xs">
                            </div>
                        </div>

                        {{-- Keunggulan 2 --}}
                        <div class="rounded-xl border border-slate-200 bg-white p-3.5 space-y-3">
                            <span class="text-xs font-bold text-primary-800">Keunggulan 2</span>
                            <div class="grid gap-3 sm:grid-cols-2">
                                <div>
                                    <label class="label text-xs">Pilihan Icon 2</label>
                                    <select name="icon_feature_2" class="input text-xs">
                                        @foreach ($availableIcons as $val => $text)
                                            <option value="{{ $val }}" @selected(($settings['icon_feature_2'] ?? 'search') === $val)>{{ $text }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="label text-xs">Judul Keunggulan 2</label>
                                    <input type="text" name="title_feature_2" value="{{ old('title_feature_2', $settings['title_feature_2'] ?? 'Pencarian Cepat') }}" class="input text-xs">
                                </div>
                            </div>
                            <div>
                                <label class="label text-xs">Deskripsi Singkat 2</label>
                                <input type="text" name="desc_feature_2" value="{{ old('desc_feature_2', $settings['desc_feature_2'] ?? 'Filter lengkap untuk menemukan properti atau kendaraan yang tepat.') }}" class="input text-xs">
                            </div>
                        </div>

                        {{-- Keunggulan 3 --}}
                        <div class="rounded-xl border border-slate-200 bg-white p-3.5 space-y-3">
                            <span class="text-xs font-bold text-primary-800">Keunggulan 3</span>
                            <div class="grid gap-3 sm:grid-cols-2">
                                <div>
                                    <label class="label text-xs">Pilihan Icon 3</label>
                                    <select name="icon_feature_3" class="input text-xs">
                                        @foreach ($availableIcons as $val => $text)
                                            <option value="{{ $val }}" @selected(($settings['icon_feature_3'] ?? 'send') === $val)>{{ $text }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="label text-xs">Judul Keunggulan 3</label>
                                    <input type="text" name="title_feature_3" value="{{ old('title_feature_3', $settings['title_feature_3'] ?? 'Hubungi Langsung') }}" class="input text-xs">
                                </div>
                            </div>
                            <div>
                                <label class="label text-xs">Deskripsi Singkat 3</label>
                                <input type="text" name="desc_feature_3" value="{{ old('desc_feature_3', $settings['desc_feature_3'] ?? 'Kirim inquiry dan terhubung langsung dengan penjual via WhatsApp.') }}" class="input text-xs">
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($section === 'seo')
                <div>
                    <label for="seo_title" class="label">SEO Title</label>
                    <input type="text" id="seo_title" name="seo_title" value="{{ old('seo_title', $settings['seo_title'] ?? '') }}" maxlength="200" class="input">
                </div>
                <div>
                    <label for="seo_description" class="label">SEO Description</label>
                    <textarea id="seo_description" name="seo_description" rows="3" maxlength="300" class="input">{{ old('seo_description', $settings['seo_description'] ?? '') }}</textarea>
                </div>
                <div>
                    <label for="seo_keywords" class="label">SEO Keywords</label>
                    <input type="text" id="seo_keywords" name="seo_keywords" value="{{ old('seo_keywords', $settings['seo_keywords'] ?? '') }}" maxlength="300" class="input" placeholder="dipisahkan koma">
                </div>
            @elseif ($section === 'contact')
                <div>
                    <label for="contact_phone" class="label">Telepon</label>
                    <input type="text" id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" maxlength="30" class="input">
                </div>
                <div>
                    <label for="contact_email" class="label">Email</label>
                    <input type="email" id="contact_email" name="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" maxlength="150" class="input">
                </div>
                <div>
                    <label for="contact_address" class="label">Alamat</label>
                    <textarea id="contact_address" name="contact_address" rows="3" maxlength="300" class="input">{{ old('contact_address', $settings['contact_address'] ?? '') }}</textarea>
                </div>
                <div>
                    <label for="contact_whatsapp" class="label">WhatsApp</label>
                    <input type="text" id="contact_whatsapp" name="contact_whatsapp" value="{{ old('contact_whatsapp', $settings['contact_whatsapp'] ?? '') }}" maxlength="30" class="input" placeholder="08xxxxxxxxxx">
                </div>
            @elseif ($section === 'ai')
                <div class="rounded-2xl border border-primary-200 bg-gradient-to-br from-primary-50/50 to-white p-5 space-y-4">
                    <div class="flex items-center gap-3">
                        <span class="grid size-10 place-items-center rounded-xl bg-primary-600 text-white shadow-sm">
                            <x-icon name="sparkles" class="size-5"/>
                        </span>
                        <div>
                            <h3 class="text-sm font-bold text-slate-900">Konfigurasi Google Gemini LLM</h3>
                            <p class="text-xs text-slate-500">Koneksikan chatbot asisten dengan AI Google Gemini untuk pencarian cerdas &amp; rekomendasi listing otomatis.</p>
                        </div>
                    </div>

                    <div>
                        <label for="gemini_api_key" class="label">Google Gemini API Key</label>
                        <input type="text" id="gemini_api_key" name="gemini_api_key"
                               value="{{ old('gemini_api_key', $settings['gemini_api_key'] ?? '') }}"
                               placeholder="AIzaSy..." class="input font-mono text-xs">
                        <p class="mt-1.5 text-[11px] text-slate-500">
                            Dapatkan API Key gratis di <a href="https://aistudio.google.com/app/apikey" target="_blank" rel="noopener" class="font-bold text-primary-700 underline">Google AI Studio</a>.
                        </p>
                    </div>

                    <div>
                        <label for="gemini_model" class="label">Pilihan Model Gemini</label>
                        <select id="gemini_model" name="gemini_model" class="input text-xs">
                            <option value="gemini-2.5-flash" @selected(($settings['gemini_model'] ?? 'gemini-2.5-flash') === 'gemini-2.5-flash')>
                                Gemini 2.5 Flash (Sangat Cepat &amp; Direkomendasikan)
                            </option>
                            <option value="gemini-3.7-flash" @selected(($settings['gemini_model'] ?? '') === 'gemini-3.7-flash')>
                                Gemini 3.7 Flash (Model Generasi Terbaru)
                            </option>
                            <option value="gemini-2.5-pro" @selected(($settings['gemini_model'] ?? '') === 'gemini-2.5-pro')>
                                Gemini 2.5 Pro (Penalaran Kompleks)
                            </option>
                        </select>
                    </div>

                    <div>
                        <label for="ai_welcome_message" class="label">Pesan Sambutan Awal Chatbot</label>
                        <textarea id="ai_welcome_message" name="ai_welcome_message" rows="3" maxlength="500" class="input text-xs"
                                  placeholder="Halo! Saya SYARVA AI Assistant. Ada yang bisa saya bantu rekomendasikan hari ini?">{{ old('ai_welcome_message', $settings['ai_welcome_message'] ?? '') }}</textarea>
                    </div>
                </div>
            @else
                <div>
                    <label for="social_facebook" class="label">Facebook</label>
                    <input type="url" id="social_facebook" name="social_facebook" value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}" maxlength="200" class="input">
                </div>
                <div>
                    <label for="social_instagram" class="label">Instagram</label>
                    <input type="url" id="social_instagram" name="social_instagram" value="{{ old('social_instagram', $settings['social_instagram'] ?? '') }}" maxlength="200" class="input">
                </div>
                <div>
                    <label for="social_twitter" class="label">Twitter / X</label>
                    <input type="url" id="social_twitter" name="social_twitter" value="{{ old('social_twitter', $settings['social_twitter'] ?? '') }}" maxlength="200" class="input">
                </div>
                <div>
                    <label for="social_youtube" class="label">YouTube</label>
                    <input type="url" id="social_youtube" name="social_youtube" value="{{ old('social_youtube', $settings['social_youtube'] ?? '') }}" maxlength="200" class="input">
                </div>
            @endif

            <div class="flex justify-end pt-2">
                <button type="submit" class="btn-primary">Simpan Pengaturan</button>
            </div>
        </form>
    </div>
</x-layouts.admin>