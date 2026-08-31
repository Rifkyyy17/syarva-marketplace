# Task Breakdown & Implementation Roadmap (Laravel Integration)
**Project**: Honda Sales Platform, Auto Trade-In & Property Bypass Hub  
**Document Version**: 2.0.0  
**Last Updated**: 2026-08-26  

---

## Phase 1: Laravel Migration & Database Update
- [ ] **DB-01**: Tambah kolom baru pada tabel mobil yang sudah ada via migration:
  - `brochure_pdf` (string/nullable)
  - `qr_3d_image` (string/nullable)
  - `external_3d_url` (string/nullable)
  - `promo_dp` (string/nullable)
- [ ] **DB-02**: Buat migration tabel `leads` / `form_submissions` (Opsional untuk mencatat log klik/submit leads sebelum lempar ke WA):
  - `type` (enum: 'honda_test_drive', 'used_car_sell', 'property_consultation')
  - `payload` (json: menyimpan rincian form KM, STNK, Pajak, Budget Properti, dll.)
  - `status` (pending, contacted)
- [ ] **DB-03**: Pastikan tabel `settings` / config memiliki key `sales_whatsapp_number`.

---

## Phase 2: Frontend & Lower Section Implementations (Blade Views)

### Focus Utama: Honda Baru
- [ ] **FE-01**: Tampilkan katalog mobil Honda dari database dengan filter kategori.
- [ ] **FE-02**: Tambahkan modal/halaman detail mobil dengan tombol download brosur PDF & gambar QR 3D model.
- [ ] **FE-03**: Sediakan form booking test drive Honda dengan auto-direct WhatsApp.

### Lower Section: Form Jual Mobil Bekas (Multi-Brand)
- [ ] **FE-04**: Bangun UI Form Jual Mobil Bekas:
  - Input: Merek & Tipe, Tahun, Transmisi (Radio/Select), Kilometer (Number), STNK a.n. (Select), Status Pajak (Input/Select), Catatan.
- [ ] **FE-05**: Implementasi JavaScript WhatsApp Link Generator untuk form mobil bekas (merangkai string template & redirect `window.open` ke `wa.me`).

### Lower Section: Form Properti (Jual / Beli Rumah)
- [ ] **FE-06**: Bangun UI Form Properti:
  - Tab Switcher: "Titip Jual Properti" vs "Cari / Beli Rumah".
  - Input: Lokasi Target, Tipe Properti, Range Budget/Harga, Kebutuhan LT/LB/Kamar, Nama Klien.
- [ ] **FE-07**: Implementasi JavaScript WhatsApp Link Generator untuk form properti.

### Profil & Sticky Navigation
- [ ] **FE-08**: Section Profil Shara (Foto, Bio singkat sebagai konsultan otomotif & properti).
- [ ] **FE-09**: Floating Action Button (FAB) WhatsApp dengan opsi menu cepat (Beli Honda / Jual Mobil Bekas / Properti).

---

## Phase 3: Admin Panel Enhancements
- [ ] **ADM-01**: Update form CRUD mobil di Admin Panel (Input upload PDF brosur & upload image QR 3D).
- [ ] **ADM-02**: Update halaman Setting Admin untuk update nomor WhatsApp utama & pesan template default.
- [ ] **ADM-03**: (Opsional) Tampilkan tabel ringkasan leads masuk dari ketiga layanan di Dashboard.

---

## Phase 4: Testing & Verification
- [ ] **QA-01**: Test seluruh generator link WhatsApp pada perangkat mobile Android & iOS (memastikan encoding spasi, enter `\n`, dan karakter khusus rapi).
- [ ] **QA-02**: Validasi input form (KM hanya angka, tahun valid, dll.) sebelum user dialihkan ke WhatsApp.
- [ ] **QA-03**: Verifikasi performa upload file PDF & gambar 3D di storage Laravel (`php artisan storage:link`).
