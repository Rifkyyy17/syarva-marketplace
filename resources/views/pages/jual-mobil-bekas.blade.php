@php
    $whatsappNumber = \App\Models\Setting::get('contact_whatsapp', '6281234567890');
@endphp

<x-layouts.app>
    <x-slot:title>Jual Mobil Bekas — Taksasi Gratis</x-slot:title>
    <x-slot:description>Jual mobil bekas Anda dengan mudah. Isi data singkat, dapatkan taksasi harga via WhatsApp.</x-slot:description>

    <section class="bg-charcoal-900 py-12">
        <div class="container-app text-center">
            <span class="inline-flex items-center gap-2 rounded-full border border-primary-500/30 bg-primary-500/10 px-4 py-1.5 text-xs font-semibold text-primary-300">
                <x-icon name="car-back" class="size-3.5"/>
                Multi-Brand Trade-In
            </span>
            <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">Jual Mobil Bekas Anda</h1>
            <p class="mt-3 text-sm text-white/60">Isi data mobil bekas Anda, dapatkan taksasi harga terbaik via WhatsApp.</p>
        </div>
    </section>

    <section class="container-app -mt-6 pb-16">
        <div class="mx-auto max-w-2xl">
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-lg sm:p-8"
                 x-data="usedCarForm()" x-init="init()">

                <h2 class="text-lg font-bold text-charcoal-900">Data Mobil Bekas</h2>
                <p class="mt-1 text-sm text-charcoal-500">Isi data di bawah ini untuk mendapatkan taksasi harga.</p>

                <form @submit.prevent="submit()" class="mt-6 space-y-5">
                    <div>
                        <label class="label">Merek & Tipe Mobil <span class="text-red-500">*</span></label>
                        <input type="text" x-model="form.brand_type" class="input" placeholder="Contoh: Toyota Avanza G 1.5, Honda Jazz RS" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="label">Tahun <span class="text-red-500">*</span></label>
                            <input type="number" x-model="form.year" class="input" placeholder="2020" min="1990" max="2026" required>
                        </div>
                        <div>
                            <label class="label">Kilometer (KM) <span class="text-red-500">*</span></label>
                            <input type="number" x-model="form.km" class="input" placeholder="45000" min="0" required>
                        </div>
                    </div>

                    <div>
                        <label class="label">Transmisi <span class="text-red-500">*</span></label>
                        <div class="flex gap-3">
                            <button type="button" @click="form.transmission = 'Manual'"
                                    :class="form.transmission === 'Manual' ? 'bg-primary-500 text-white border-primary-500' : 'bg-white text-charcoal-700 border-gray-300 hover:border-primary-300'"
                                    class="flex-1 rounded-lg border px-4 py-2.5 text-sm font-semibold transition-all">
                                Manual
                            </button>
                            <button type="button" @click="form.transmission = 'Matic'"
                                    :class="form.transmission === 'Matic' ? 'bg-primary-500 text-white border-primary-500' : 'bg-white text-charcoal-700 border-gray-300 hover:border-primary-300'"
                                    class="flex-1 rounded-lg border px-4 py-2.5 text-sm font-semibold transition-all">
                                Matic
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="label">STNK Atas Nama <span class="text-red-500">*</span></label>
                        <select x-model="form.stnk" class="input" required>
                            <option value="">Pilih...</option>
                            <option value="Pribadi (Tangan Pertama)">Pribadi (Tangan Pertama)</option>
                            <option value="Pribadi (Tangan Kedua)">Pribadi (Tangan Kedua)</option>
                            <option value="Perusahaan / PT">Perusahaan / PT</option>
                        </select>
                    </div>

                    <div>
                        <label class="label">Status Pajak <span class="text-red-500">*</span></label>
                        <select x-model="form.pajak" class="input" required>
                            <option value="">Pilih...</option>
                            <option value="Hidup (Lunas)">Hidup (Lunas)</option>
                            <option value="Hidup (Perlu Perpanjang)">Hidup (Perlu Perpanjang)</option>
                            <option value="Mati">Mati</option>
                        </select>
                    </div>

                    <div>
                        <label class="label">Catatan Tambahan</label>
                        <textarea x-model="form.notes" class="input" rows="3" placeholder="Lokasi unit, kondisi banjir/tabrakan, dll. (opsional)"></textarea>
                    </div>

                    <button type="submit" class="btn-whatsapp w-full py-3 text-base font-bold" :disabled="!isFormValid">
                        <svg viewBox="0 0 24 24" class="size-5" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        Kirim Data Mobil ke WhatsApp
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
                    transmission: '',
                    stnk: '',
                    pajak: '',
                    notes: '',
                },
                init() {},

                get isFormValid() {
                    return this.form.brand_type && this.form.year && this.form.km && this.form.transmission && this.form.stnk && this.form.pajak;
                },

                submit() {
                    if (!this.isFormValid) return;

                    const wa = '{{ $whatsappNumber }}';
                    const text = `Halo Shara, saya ingin konsultasi jual / tukar tambah mobil bekas:\n• Merek / Tipe : ${this.form.brand_type}\n• Tahun : ${this.form.year}\n• Transmisi : ${this.form.transmission}\n• Kilometer : ${this.form.km.toLocaleString('id-ID')} km\n• STNK a.n. : ${this.form.stnk}\n• Status Pajak : ${this.form.pajak}${this.form.notes ? '\n• Catatan : ' + this.form.notes : ''}\n\nMohon info taksiran harga dan prosesnya. Terima kasih!`;

                    window.open(`https://wa.me/${wa}?text=${encodeURIComponent(text)}`, '_blank');
                },
            };
        }
    </script>
    @endpush
</x-layouts.app>
