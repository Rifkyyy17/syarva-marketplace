import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';

Alpine.plugin(collapse);

window.Alpine = Alpine;

document.addEventListener('alpine:init', () => {
    Alpine.data('mobileMenu', () => ({
        open: false,
        toggle() {
            this.open = !this.open;
        },
    }));

    Alpine.data('userMenu', () => ({
        open: false,
        close() {
            this.open = false;
        },
    }));

    Alpine.data('favoriteButton', (initial = false) => ({
        favorited: initial,
        busy: false,
        async toggle() {
            if (this.busy) {
                return;
            }

            if (!window.__syarvaAuthed) {
                return;
            }

            const listingId = this.$root.dataset.listingId;
            this.busy = true;

            try {
                const res = await fetch(`/favorites/${listingId}/toggle`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'X-Requested-With': 'XMLHttpRequest',
                        Accept: 'application/json',
                    },
                });

                const json = await res.json();

                if (json.success) {
                    this.favorited = json.favorited;
                    window.__toast(json.message, json.favorited ? 'success' : 'info');
                }
            } catch (e) {
                window.__toast('Terjadi kesalahan. Silakan coba lagi.', 'error');
            } finally {
                this.busy = false;
            }
        },
    }));

    Alpine.data('filterDrawer', () => ({
        open: false,
    }));

    Alpine.data('gallery', (primary = '') => ({
        current: primary,
        set(url) {
            this.current = url;
        },
    }));

    Alpine.data('locationCascade', (initial = {}) => ({
        provinceId: initial.province_id ?? '',
        cityId: initial.city_id ?? '',
        districtId: initial.district_id ?? '',
        cities: [],
        districts: [],
        async loadCities() {
            this.cityId = '';
            this.districtId = '';
            this.cities = [];
            this.districts = [];

            if (!this.provinceId) {
                return;
            }

            const res = await fetch(`/lokasi/kota/${this.provinceId}`, {
                headers: { Accept: 'application/json' },
            });
            const json = await res.json();
            this.cities = json.data ?? [];
        },
        async loadDistricts() {
            this.districtId = '';
            this.districts = [];

            if (!this.cityId) {
                return;
            }

            const res = await fetch(`/lokasi/kecamatan/${this.cityId}`, {
                headers: { Accept: 'application/json' },
            });
            const json = await res.json();
            this.districts = json.data ?? [];
        },
    }));

    Alpine.data('uploadManager', (maxFiles = 8, maxSizeKb = 5120) => ({
        files: [],
        dragging: false,
        maxFiles,
        maxSizeKb,
        get input() {
            return this.$refs.fileInput;
        },
        handleFiles(fileList) {
            const incoming = Array.from(fileList ?? []);

            if (this.files.length + incoming.length > this.maxFiles) {
                window.__toast(`Maksimal ${this.maxFiles} foto per listing.`, 'error');

                return;
            }

            const allowed = ['image/jpeg', 'image/png', 'image/webp'];

            for (const file of incoming) {
                const id = crypto.randomUUID();

                if (!allowed.includes(file.type)) {
                    this.files.push({ id, name: file.name, size: file.size, url: null, error: 'Format harus JPG, PNG, atau WebP.' });
                    continue;
                }

                if (file.size > this.maxSizeKb * 1024) {
                    this.files.push({ id, name: file.name, size: file.size, url: null, error: `Ukuran melebihi ${this.maxSizeKb} KB.` });
                    continue;
                }

                this.files.push({ id, name: file.name, size: file.size, url: URL.createObjectURL(file), source: file, error: null });
            }

            this.syncInput();
        },
        syncInput() {
            const dt = new DataTransfer();

            for (const f of this.files) {
                if (f.source) {
                    dt.items.add(f.source);
                }
            }

            this.input.files = dt.files;
        },
        remove(id) {
            const idx = this.files.findIndex((f) => f.id === id);
            if (idx === -1) {
                return;
            }

            const removed = this.files[idx];
            if (removed.url) {
                URL.revokeObjectURL(removed.url);
            }

            this.files.splice(idx, 1);
            this.syncInput();
        },
        onDrop(e) {
            e.preventDefault();
            this.dragging = false;
            this.handleFiles(e.dataTransfer.files);
        },
    }));

    Alpine.data('imageManager', (listingId) => ({
        listingId,
        uploading: false,
        async addImage(e) {
            const file = e.target.files[0];
            if (!file) {
                return;
            }

            this.uploading = true;

            try {
                const fd = new FormData();
                fd.append('image', file);

                const res = await fetch(`/dashboard/listings/${this.listingId}/images`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'X-Requested-With': 'XMLHttpRequest',
                        Accept: 'application/json',
                    },
                    body: fd,
                });

                const json = await res.json();

                if (json.success) {
                    window.location.reload();
                } else {
                    window.__toast(json.message ?? 'Gagal mengunggah foto.', 'error');
                }
            } catch (err) {
                window.__toast('Terjadi kesalahan saat mengunggah.', 'error');
            } finally {
                this.uploading = false;
                e.target.value = '';
            }
        },
        async removeImage(imageId) {
            if (!confirm('Hapus foto ini?')) {
                return;
            }

            const res = await fetch(`/dashboard/listings/${this.listingId}/images/${imageId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'X-Requested-With': 'XMLHttpRequest',
                    Accept: 'application/json',
                },
            });

            const json = await res.json();

            if (json.success) {
                window.location.reload();
            } else {
                window.__toast(json.message ?? 'Gagal menghapus foto.', 'error');
            }
        },
        async setPrimary(imageId) {
            const res = await fetch(`/dashboard/listings/${this.listingId}/images/${imageId}/primary`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'X-Requested-With': 'XMLHttpRequest',
                    Accept: 'application/json',
                },
            });

            const json = await res.json();

            if (json.success) {
                window.location.reload();
            } else {
                window.__toast(json.message ?? 'Gagal mengubah foto utama.', 'error');
            }
        },
    }));

    Alpine.data('confirmAction', () => ({
        modal: false,
        message: '',
        form: null,
        ask(form, message = 'Yakin ingin melanjutkan?') {
            this.form = form;
            this.message = message;
            this.modal = true;
        },
        confirm() {
            this.modal = false;
            if (this.form) {
                this.form.submit();
            }
        },
        cancel() {
            this.modal = false;
            this.form = null;
        },
    }));

    Alpine.data('dynamicForm', () => ({
        categoryId: '',
        categoryType: '',
        categorySlug: '',
        options: [],
        get isHondaNewCar() {
            return this.categorySlug === 'mobil-baru' || (this.categoryType === 'vehicle' && this.categorySlug?.includes('honda'));
        },
        init() {
            const select = this.$refs.categorySelect;
            if (select) {
                this.categoryId = select.value;
                this.options = JSON.parse(this.$root.dataset.options ?? '[]');
                this.updateType();
            }
        },
        updateType() {
            const opt = this.options.find((o) => String(o.id) === String(this.categoryId));
            this.categoryType = opt?.type ?? '';
            this.categorySlug = opt?.slug ?? '';

            if (this.isHondaNewCar) {
                const brandInput = document.getElementById('brand');
                if (brandInput && (!brandInput.value || brandInput.value.trim() === '')) {
                    brandInput.value = 'Honda';
                }
            }
        },
        prepareSubmit(e) {
            const price = e.target.querySelector('input[name="price"]');
            if (price) {
                price.value = price.value.replace(/\./g, '').replace(/\D/g, '');
            }
        },
    }));

    Alpine.data('inquiryForm', () => ({
        sent: false,
        async submit(e) {
            const form = e.target;
            const fd = new FormData(form);

            const res = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'X-Requested-With': 'XMLHttpRequest',
                    Accept: 'application/json',
                },
                body: fd,
            });

            if (res.status === 422) {
                const json = await res.json();
                const errors = Object.values(json.errors ?? {}).flat();
                window.__toast(errors[0] ?? 'Periksa kembali form Anda.', 'error');

                return;
            }

            if (res.redirected) {
                window.location.href = res.url;
                window.__toast('Inquiry berhasil dikirim.', 'success');

                return;
            }

            this.sent = true;
        },
    }));

    Alpine.data('listingForm', (options = [], initialCategoryId = '', csrfToken = '', parseBrochureUrl = '') => ({
        categoryId: String(initialCategoryId || ''),
        categoryType: '',
        categorySlug: '',
        options: options,
        csrfToken: csrfToken,
        parseBrochureUrl: parseBrochureUrl,
        parsingPdf: false,
        pdfParseSuccess: false,
        pdfError: '',
        extractedImages: [],
        init() {
            this.updateType();
        },
        updateType() {
            const opt = this.options.find(o => String(o.id) === String(this.categoryId));
            this.categoryType = opt ? opt.type : '';
            this.categorySlug = opt ? opt.slug : '';
            if (this.categoryType === 'vehicle' && (this.categorySlug === 'mobil-baru' || this.categorySlug.includes('honda'))) {
                const brandInput = document.getElementById('brand');
                if (brandInput && (!brandInput.value || brandInput.value.trim() === '')) {
                    brandInput.value = 'Honda';
                }
            }
        },
        async parsePdfBrochure(file) {
            if (!file) return;
            this.parsingPdf = true;
            this.pdfParseSuccess = false;
            this.pdfError = '';

            const formData = new FormData();
            formData.append('brochure_file', file);
            formData.append('_token', this.csrfToken);

            try {
                const res = await fetch(this.parseBrochureUrl, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });

                const json = await res.json();
                if (json.success && json.data) {
                    const d = json.data;

                    // Auto-fill Title
                    if (d.title) {
                        const titleInput = document.getElementById('title');
                        if (titleInput) titleInput.value = d.title;
                    }

                    // Auto-fill Price
                    if (d.price) {
                        const priceInput = document.getElementById('price');
                        if (priceInput) {
                            priceInput.value = Number(d.price).toLocaleString('id-ID');
                        }
                    }

                    // Auto-fill Description
                    if (d.description) {
                        const descInput = document.getElementById('description');
                        if (descInput) descInput.value = d.description;
                    }

                    // Auto-fill Vehicle Specs
                    if (d.brand) {
                        const brandInput = document.getElementById('brand');
                        if (brandInput) brandInput.value = d.brand;
                    }
                    if (d.model) {
                        const modelInput = document.getElementById('model');
                        if (modelInput) modelInput.value = d.model;
                    }
                    if (d.year) {
                        const yearSelect = document.getElementById('year');
                        if (yearSelect) yearSelect.value = d.year;
                    }
                    if (d.transmission) {
                        const transSelect = document.getElementById('transmission');
                        if (transSelect) transSelect.value = d.transmission;
                    }
                    if (d.fuel_type) {
                        const fuelSelect = document.getElementById('fuel_type');
                        if (fuelSelect) fuelSelect.value = d.fuel_type;
                    }
                    if (d.engine_capacity) {
                        const engineInput = document.getElementById('engine_capacity');
                        if (engineInput) engineInput.value = d.engine_capacity;
                    }
                    if (d.color) {
                        const colorInput = document.getElementById('color');
                        if (colorInput) colorInput.value = d.color;
                    }

                    // Condition -> new
                    const newRadio = document.querySelector('input[name="condition"][value="new"]');
                    if (newRadio) newRadio.checked = true;

                    // Auto-fill Honda specifics
                    if (d.warranty_info) {
                        const warrantyInput = document.getElementById('warranty_info');
                        if (warrantyInput) warrantyInput.value = d.warranty_info;
                    }
                    if (d.promo_package) {
                        const promoInput = document.getElementById('promo_package');
                        if (promoInput) promoInput.value = d.promo_package;
                    }
                    if (d.color_options) {
                        const colorOptInput = document.getElementById('color_options');
                        if (colorOptInput) colorOptInput.value = d.color_options;
                    }
                    if (d.bonus_accessories) {
                        const bonusInput = document.getElementById('bonus_accessories');
                        if (bonusInput) bonusInput.value = d.bonus_accessories;
                    }
                    if (d.brochure_url) {
                        const urlInput = document.getElementById('brochure_url');
                        if (urlInput) urlInput.value = d.brochure_url;
                    }

                    // Checkboxes for honda_features
                    if (Array.isArray(d.honda_features)) {
                        document.querySelectorAll('input[name="honda_features[]"]').forEach(cb => {
                            const matched = d.honda_features.some(f => 
                                f.toLowerCase().includes(cb.value.toLowerCase()) || 
                                cb.value.toLowerCase().includes(f.toLowerCase())
                            );
                            if (matched || d.honda_features.length >= 10) {
                                cb.checked = true;
                            }
                        });
                    }

                    // Set extracted images from PDF
                    if (Array.isArray(d.extracted_images)) {
                        this.extractedImages = d.extracted_images;
                    }

                    this.pdfParseSuccess = true;
                } else {
                    this.pdfError = json.message || 'Gagal membaca isi brosur PDF.';
                }
            } catch (err) {
                this.pdfError = 'Terjadi kesalahan: ' + err.message;
            } finally {
                this.parsingPdf = false;
            }
        },
        prepareSubmit(e) {
            const price = e.target.querySelector('input[name="price"]');
            if (price) {
                price.value = price.value.replace(/\./g, '').replace(/\D/g, '');
            }
        }
    }));
});

window.__syarvaAuthed = document.body.dataset.authed === '1';

window.__toast = function (message, type = 'success') {
    let container = document.getElementById('toast-container');
    if (!container) {
        container = document.createElement('div');
        container.id = 'toast-container';
        container.className = 'fixed top-5 right-5 z-[99999] flex flex-col gap-3 max-w-sm sm:max-w-md w-full pointer-events-none px-4 sm:px-0';
        document.body.appendChild(container);
    }

    const configs = {
        success: {
            title: 'Berhasil!',
            bg: 'bg-emerald-950/95 text-white border-emerald-500/40 shadow-emerald-950/40',
            iconBg: 'bg-emerald-500 text-charcoal-950',
            barBg: 'bg-emerald-400',
            iconSvg: '<svg class="size-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>',
        },
        error: {
            title: 'Gagal Dilakukan!',
            bg: 'bg-rose-950/95 text-white border-rose-500/40 shadow-rose-950/40',
            iconBg: 'bg-rose-500 text-white',
            barBg: 'bg-rose-400',
            iconSvg: '<svg class="size-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>',
        },
        warning: {
            title: 'Perhatian!',
            bg: 'bg-amber-950/95 text-white border-amber-500/40 shadow-amber-950/40',
            iconBg: 'bg-amber-500 text-charcoal-950',
            barBg: 'bg-amber-400',
            iconSvg: '<svg class="size-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>',
        },
        info: {
            title: 'Informasi',
            bg: 'bg-slate-900/95 text-white border-slate-700 shadow-slate-950/40',
            iconBg: 'bg-primary-500 text-white',
            barBg: 'bg-primary-400',
            iconSvg: '<svg class="size-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>',
        },
    };

    const c = configs[type] || configs.info;

    const el = document.createElement('div');
    el.className = `pointer-events-auto relative overflow-hidden rounded-2xl border ${c.bg} p-4 shadow-2xl backdrop-blur-xl transition-all duration-300 transform translate-y-[-10px] opacity-0`;
    
    el.innerHTML = `
        <div class="flex items-start gap-3.5">
            <span class="grid size-9 place-items-center rounded-xl ${c.iconBg} shrink-0 shadow-md">
                ${c.iconSvg}
            </span>
            <div class="flex-1 min-w-0 pr-2">
                <h4 class="text-xs font-black uppercase tracking-wider text-slate-200">${c.title}</h4>
                <p class="mt-0.5 text-xs font-semibold leading-relaxed text-white">${message}</p>
            </div>
            <button type="button" class="shrink-0 rounded-lg p-1 text-slate-400 hover:bg-white/10 hover:text-white transition" aria-label="Tutup">
                <svg class="size-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
            </button>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-white/10">
            <div class="h-full ${c.barBg} transition-all ease-linear" style="width: 100%; transition-duration: 4500ms;"></div>
        </div>
    `;

    container.appendChild(el);

    // Trigger enter animation
    requestAnimationFrame(() => {
        el.classList.remove('translate-y-[-10px]', 'opacity-0');
        el.classList.add('translate-y-0', 'opacity-100');
        const bar = el.querySelector('.absolute div');
        if (bar) {
            requestAnimationFrame(() => bar.style.width = '0%');
        }
    });

    const dismiss = () => {
        el.classList.remove('translate-y-0', 'opacity-100');
        el.classList.add('translate-y-[-10px]', 'opacity-0');
        setTimeout(() => el.remove(), 300);
    };

    const closeBtn = el.querySelector('button');
    if (closeBtn) closeBtn.onclick = dismiss;

    setTimeout(dismiss, 4800);
};

document.addEventListener('DOMContentLoaded', () => {
    const flash = document.querySelector('[data-flash-toast]');
    if (flash) {
        window.__toast(flash.dataset.flashToast, flash.dataset.flashType ?? 'success');
    }

    // Instant Page Pre-fetcher for super-fast mobile & desktop navigation
    const prefetchedUrls = new Set();
    const prefetch = (url) => {
        if (!url || prefetchedUrls.has(url)) return;
        try {
            const parsed = new URL(url, window.location.href);
            if (parsed.origin !== window.location.origin) return;
            if (parsed.pathname.startsWith('/admin') || parsed.pathname.includes('logout')) return;
            prefetchedUrls.add(url);
            const link = document.createElement('link');
            link.rel = 'prefetch';
            link.href = url;
            document.head.appendChild(link);
        } catch (e) {}
    };

    document.addEventListener('mouseover', (e) => {
        const a = e.target.closest('a');
        if (a && a.href) prefetch(a.href);
    }, { passive: true });

    document.addEventListener('touchstart', (e) => {
        const a = e.target.closest('a');
        if (a && a.href) prefetch(a.href);
    }, { passive: true });
});

Alpine.start();