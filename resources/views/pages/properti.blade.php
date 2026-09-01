@php
    $whatsappNumber = \App\Models\Setting::get('contact_whatsapp', '6281234567890');
@endphp

<x-layouts.app>
    <x-slot:title>Konsultasi Properti — Jual & Beli Rumah</x-slot:title>
    <x-slot:description>Layanan konsultasi properti: titip jual atau cari rumah impian Anda.</x-slot:description>

    {{-- Page Header --}}
    <section class="border-b border-white/10 bg-[#090e1a] py-14 text-white">
        <div class="container-app text-center max-w-2xl mx-auto">
            <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-500/30 bg-emerald-500/10 px-3.5 py-1 text-xs font-semibold text-emerald-300">
                <x-icon name="building" class="size-3.5 text-emerald-400"/>
                Property Advisory &amp; Listing Service
            </span>
            <h1 class="mt-4 text-3xl font-black tracking-tight text-white sm:text-4xl">
                Konsultasi Titip Jual &amp; Cari Properti
            </h1>
            <p class="mt-3 text-xs sm:text-sm text-slate-400 leading-relaxed">
                Dapatkan pendampingan legalitas SHM, analisis taksasi nilai pasar, dan pemasaran properti profesional langsung bersama konsultan kami.
            </p>
        </div>
    </section>

    {{-- Form Section --}}
    <section class="container-app -mt-6 pb-16">
        <div class="mx-auto max-w-2xl">
            <div class="rounded-3xl border border-slate-200/80 bg-white p-6 shadow-sm sm:p-8"
                 x-data="propertyForm()" x-init="init()">

                {{-- Mode Switcher (Jual vs Beli) --}}
                <div class="grid grid-cols-2 gap-2 rounded-2xl bg-slate-100 p-1.5 border border-slate-200/60">
                    <button type="button" @click="mode = 'jual'"
                            :class="mode === 'jual' ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:text-slate-900'"
                            class="rounded-xl py-2.5 text-xs font-bold transition-all">
                        Titip Jual Properti
                    </button>
                    <button type="button" @click="mode = 'beli'"
                            :class="mode === 'beli' ? 'bg-slate-900 text-white shadow-xs' : 'text-slate-600 hover:text-slate-900'"
                            class="rounded-xl py-2.5 text-xs font-bold transition-all">
                        Cari / Beli Rumah
                    </button>
                </div>

                <form @submit.prevent="submit()" class="mt-6 space-y-5">
                    <div>
                        <label class="label text-xs font-bold text-slate-700">Area / Lokasi Target <span class="text-red-500">*</span></label>
                        <input type="text" x-model="form.location" class="input text-xs sm:text-sm" placeholder="Contoh: Bogor Kota, Sentul, Cibinong, Depok" required>
                    </div>

                    <div>
                        <label class="label text-xs font-bold text-slate-700">Tipe Aset Properti <span class="text-red-500">*</span></label>
                        <div class="flex flex-wrap gap-2">
                            <template x-for="type in ['Rumah Tinggal', 'Kavling / Tanah', 'Ruko / Komersial', 'Apartemen']">
                                <button type="button" @click="form.property_type = type"
                                        :class="form.property_type === type ? 'bg-slate-900 text-white border-slate-900 shadow-xs' : 'bg-white text-slate-700 border-slate-200 hover:border-slate-300 hover:bg-slate-50'"
                                        class="rounded-xl border px-3.5 py-2 text-xs font-bold transition-all"
                                        x-text="type">
                                </button>
                            </template>
                        </div>
                    </div>

                    <div>
                        <label class="label text-xs font-bold text-slate-700">
                            <span x-text="mode === 'jual' ? 'Ekspektasi Harga Jual' : 'Alokasi Budget Pembelian'"></span>
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" x-model="form.budget" class="input text-xs sm:text-sm" placeholder="Contoh: Rp 800 Juta - 1.5 Miliar" required>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <div>
                            <label class="label text-xs font-bold text-slate-700">LT (m²)</label>
                            <input type="number" x-model="form.land_area" class="input text-xs sm:text-sm" placeholder="120">
                        </div>
                        <div>
                            <label class="label text-xs font-bold text-slate-700">LB (m²)</label>
                            <input type="number" x-model="form.building_area" class="input text-xs sm:text-sm" placeholder="90">
                        </div>
                        <div>
                            <label class="label text-xs font-bold text-slate-700">Kamar Tidur</label>
                            <input type="number" x-model="form.bedrooms" class="input text-xs sm:text-sm" placeholder="3">
                        </div>
                    </div>

                    <div>
                        <label class="label text-xs font-bold text-slate-700">Nama Lengkap Pemilik / Peminat <span class="text-red-500">*</span></label>
                        <input type="text" x-model="form.name" class="input text-xs sm:text-sm" placeholder="Nama Anda" required>
                    </div>

                    {{-- Live WhatsApp Preview Box --}}
                    <div x-show="isFormValid" x-cloak class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Pratinjau Pesan Konsultasi:</p>
                        <p class="mt-2 text-xs font-mono text-slate-700 whitespace-pre-line leading-relaxed bg-white p-3 rounded-xl border border-slate-200/60"
                           x-text="generateMessage()"></p>
                    </div>

                    <button type="submit" class="btn-whatsapp btn-lg w-full !py-3.5 justify-center shadow-sm" :disabled="!isFormValid">
                        <x-icon name="whatsapp" class="size-5"/>
                        <span x-text="mode === 'jual' ? 'Kirim Data Titip Jual ke WhatsApp' : 'Konsultasi Cari Properti via WhatsApp'"></span>
                    </button>
                </form>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        function propertyForm() {
            return {
                mode: 'jual',
                form: {
                    location: '',
                    property_type: 'Rumah Tinggal',
                    budget: '',
                    land_area: '',
                    building_area: '',
                    bedrooms: '',
                    name: '',
                },
                init() {},

                get isFormValid() {
                    return this.form.location && this.form.property_type && this.form.budget && this.form.name;
                },

                generateMessage() {
                    const specs = [];
                    if (this.form.land_area) specs.push(`LT ${this.form.land_area} m²`);
                    if (this.form.building_area) specs.push(`LB ${this.form.building_area} m²`);
                    if (this.form.bedrooms) specs.push(`${this.form.bedrooms} Kamar`);
                    const specsStr = specs.length ? specs.join(', ') : '-';
                    const modeLabel = this.mode === 'jual' ? 'Titip Jual Properti' : 'Cari / Beli Properti';

                    return `Halo Sales SYARVA, saya ingin konsultasi properti:\n• Kategori: ${modeLabel}\n• Lokasi: ${this.form.location}\n• Tipe Aset: ${this.form.property_type}\n• Estimasi Nilai/Budget: ${this.form.budget}\n• Spesifikasi: ${specsStr}\n• Kontak a.n: ${this.form.name}\n\nMohon informasi langkah selanjutnya. Terima kasih!`;
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

