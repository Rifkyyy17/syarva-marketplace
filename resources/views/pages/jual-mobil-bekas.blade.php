@php
    $whatsappNumber = \App\Models\Setting::get('contact_whatsapp', '6281234567890');
@endphp

<x-layouts.app>
    <x-slot:title>Jual Mobil Bekas — Taksasi Gratis</x-slot:title>
    <x-slot:description>Jual mobil bekas Anda dengan mudah. Isi data singkat, dapatkan taksasi harga via WhatsApp.</x-slot:description>

    {{-- Page Header --}}
    <section class="border-b border-white/10 bg-[#090e1a] py-14 text-white">
        <div class="container-app text-center max-w-2xl mx-auto">
            <span class="inline-flex items-center gap-1.5 rounded-full border border-amber-500/30 bg-amber-500/10 px-3.5 py-1 text-xs font-semibold text-amber-300">
                <x-icon name="car-back" class="size-3.5 text-amber-400"/>
                Multi-Brand Trade-In Concierge
            </span>
            <h1 class="mt-4 text-3xl font-black tracking-tight text-white sm:text-4xl">
                Taksasi &amp; Jual Mobil Bekas
            </h1>
            <p class="mt-3 text-xs sm:text-sm text-slate-400 leading-relaxed">
                Isi estimasi kondisi kendaraan Anda. Konsultan resmi kami akan segera menghitung estimasi taksasi harga objektif atau opsi tukar tambah ke Honda baru.
            </p>
        </div>
    </section>

    {{-- Form Section --}}
    <section class="container-app -mt-6 pb-16">
        <div class="mx-auto max-w-2xl">
            <div class="rounded-3xl border border-slate-200/80 bg-white p-6 shadow-sm sm:p-8"
                 x-data="usedCarForm()" x-init="init()">

                <div class="border-b border-slate-100 pb-4">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900">Formulir Spesifikasi Kendaraan</h2>
                    <p class="mt-1 text-xs text-slate-500">Lengkapi data pokok kendaraan untuk akurasi perhitungan taksasi.</p>
                </div>

                <form @submit.prevent="submit()" class="mt-6 space-y-5">
                    <div>
                        <label class="label text-xs font-bold text-slate-700">Merek &amp; Tipe Mobil <span class="text-red-500">*</span></label>
                        <input type="text" x-model="form.brand_type" class="input text-xs sm:text-sm" placeholder="Contoh: Toyota Avanza 1.5 G, Honda HR-V E CVT, Mitsubishi Xpander" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="label text-xs font-bold text-slate-700">Tahun Pembuatan <span class="text-red-500">*</span></label>
                            <input type="number" x-model="form.year" class="input text-xs sm:text-sm" placeholder="2021" min="1990" max="2026" required>
                        </div>
                        <div>
                            <label class="label text-xs font-bold text-slate-700">Odometer / KM <span class="text-red-500">*</span></label>
                            <input type="number" x-model="form.km" class="input text-xs sm:text-sm" placeholder="35000" min="0" required>
                        </div>
                    </div>

                    <div>
                        <label class="label text-xs font-bold text-slate-700">Transmisi <span class="text-red-500">*</span></label>
                        <div class="grid grid-cols-2 gap-3">
                            <button type="button" @click="form.transmission = 'Manual'"
                                    :class="form.transmission === 'Manual' ? 'bg-slate-900 text-white border-slate-900 shadow-xs' : 'bg-white text-slate-700 border-slate-200 hover:border-slate-300 hover:bg-slate-50'"
                                    class="rounded-xl border py-2.5 px-4 text-xs font-bold transition-all">
                                Manual (MT)
                            </button>
                            <button type="button" @click="form.transmission = 'Matic'"
                                    :class="form.transmission === 'Matic' ? 'bg-slate-900 text-white border-slate-900 shadow-xs' : 'bg-white text-slate-700 border-slate-200 hover:border-slate-300 hover:bg-slate-50'"
                                    class="rounded-xl border py-2.5 px-4 text-xs font-bold transition-all">
                                Automatic (AT / CVT)
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="label text-xs font-bold text-slate-700">Kepemilikan STNK <span class="text-red-500">*</span></label>
                            <select x-model="form.stnk" class="input text-xs sm:text-sm" required>
                                <option value="">Pilih Status...</option>
                                <option value="Pribadi (Tangan Pertama)">Pribadi (Tangan Pertama)</option>
                                <option value="Pribadi (Tangan Kedua)">Pribadi (Tangan Kedua)</option>
                                <option value="Atas Nama PT / Kantor">Atas Nama PT / Kantor</option>
                            </select>
                        </div>

                        <div>
                            <label class="label text-xs font-bold text-slate-700">Status Pajak Kendaraan <span class="text-red-500">*</span></label>
                            <select x-model="form.pajak" class="input text-xs sm:text-sm" required>
                                <option value="">Pilih Kondisi Pajak...</option>
                                <option value="Pajak Hidup Panjang">Pajak Hidup Panjang</option>
                                <option value="Pajak Dekat / Perlu Perpanjang">Pajak Dekat / Perlu Perpanjang</option>
                                <option value="Pajak Mati">Pajak Mati</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="label text-xs font-bold text-slate-700">Catatan Kondisi Fisik &amp; Lokasi</label>
                        <textarea x-model="form.notes" class="input text-xs sm:text-sm" rows="3" placeholder="Lokasi unit (Kota), bebas banjir/tabrakan, service record resmi, dll. (opsional)"></textarea>
                    </div>

                    {{-- Live WhatsApp Preview Box --}}
                    <div x-show="isFormValid" x-cloak class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Pratinjau Pesan Konsultasi:</p>
                        <p class="mt-2 text-xs font-mono text-slate-700 whitespace-pre-line leading-relaxed bg-white p-3 rounded-xl border border-slate-200/60"
                           x-text="generateMessage()"></p>
                    </div>

                    <button type="submit" class="btn-whatsapp btn-lg w-full !py-3.5 justify-center shadow-sm" :disabled="!isFormValid">
                        <x-icon name="whatsapp" class="size-5"/>
                        <span>Kirim ke WhatsApp Sales Resmi</span>
                    </button>
                </form>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        function usedCarForm() {
            return {
                form: {
                    brand_type: '',
                    year: '',
                    km: '',
                    transmission: 'Matic',
                    stnk: '',
                    pajak: '',
                    notes: '',
                },
                init() {},

                get isFormValid() {
                    return this.form.brand_type && this.form.year && this.form.km && this.form.transmission && this.form.stnk && this.form.pajak;
                },

                generateMessage() {
                    return `Halo Sales SYARVA, saya ingin taksasi / jual mobil bekas:\n• Merek/Tipe: ${this.form.brand_type}\n• Tahun: ${this.form.year}\n• Transmisi: ${this.form.transmission}\n• Odometer: ${Number(this.form.km).toLocaleString('id-ID')} km\n• STNK: ${this.form.stnk}\n• Pajak: ${this.form.pajak}${this.form.notes ? '\n• Catatan: ' + this.form.notes : ''}\n\nMohon estimasi taksasi harga dan informasinya. Terima kasih!`;
                },

                submit() {
                    if (!this.isFormValid) return;
                    const wa = '{{ $whatsappNumber }}';
                    const text = this.generateMessage();
                    window.open(`https://wa.me/${wa}?text=${encodeURIComponent(text)}`, '_blank');
                },
            };
        }
    </script>
    @endpush
</x-layouts.app>
