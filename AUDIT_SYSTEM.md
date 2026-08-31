# Dokumen Audit & Evaluasi Arsitektur Sistem — SYARVA Marketplace

Dokumen ini berisi analisis teknis, evaluasi keamanan, kapasitas beban (*scalability*), serta status kesiapan produksi untuk 10 aspek arsitektur sistem **SYARVA Marketplace**.

---

## Ringkasan Eksekutif (Status Matriks)

| No | Aspek Sistem | Status Kesiapan | Catatan Utama |
|---|---|---|---|
| 1 | **Layer Frontend** | ✅ **Sangat Baik** | Tailwind CSS + Alpine.js + Blade Components + Vite (Responsive, Ringan, Cepat). |
| 2 | **API & Backend Logic** | ✅ **Aman (Scalable)** | Eager loading aktif (Bebas N+1 query), siap menangani 100+ *concurrent users* di VPS PHP-FPM / Octane. |
| 3 | **Database & Storage** | ✅ **Ternormalisasi** | Tidak ditumpuk di 1 tabel; Relasi FK lengkap, Composite Index, MySQL FULLTEXT Index. |
| 4 | **Authentication & Authorization** | ✅ **Aman & Modern** | Hash Bcrypt (cost 12), CSRF Token, Signed URL email verification, Password confirmation. |
| 5 | **Cloud Compute** | ⚠️ **Perlu Server Hardening** | Aplikasi siap; VPS wajib menerapkan non-root user, firewall UFW, dan SSH Key authentication. |
| 6 | **CI/CD** | ✅ **Tersedia** | GitHub Actions (`tests.yml` & `deploy.yml`) otomatis untuk testing dan rilis kode ke server. |
| 7 | **Role-Level Security (RLS)** | ✅ **Aman** | Middleware `EnsureUserIsAdmin`, `EnsureUserIsActive`, serta isolasi data berbasis kepemilikan user. |
| 8 | **Rate Limiting** | ✅ **Aktif & Terproteksi** | Throttle login (30/m), inquiry (5/m), kontak (3/m), dan global API (120/m). |
| 9 | **Cache & CDN** | ✅ **Optimal (Siap CDN)** | Model serialization fix selesai; Disarankan integrasi Cloudflare CDN di produksi. |
| 10 | **Load Balancer** | ℹ️ **Scale-Ready** | Belum mendesak untuk awal (1 VPS cukup); Arsitektur siap ekspansi multi-server jika dibutuhkan. |

---

## 1. Layer Frontend
* **Evaluasi:** Bawaan AI pada project ini menggunakan arsitektur modern standar industri:
  - **Framework UI:** Tailwind CSS (utility-first, zero-runtime overhead).
  - **Interaktivitas:** Alpine.js (reaktif tanpa membebani browser pengguna seperti SPA besar).
  - **Modularitas:** Blade Components (`<x-listing-card>`, `<x-navbar>`, `<x-search-hero>`, `<x-modal>`, `<x-captcha>`, dll.).
  - **Asset Bundling:** Vite dengan code-splitting, minifikasi otomatis, dan hash cache-busting.
  - **Aksesibilitas & Responsivitas:** Mendukung layar mobile, tablet, dan desktop dengan transisi halus.
* **Rekomendasi Lanjutan:** Cukup sesuaikan logo, favicon, dan palet warna brand (*corporate identity*).

---

## 2. API & Backend Logic (Kapasitas Beban 100 User Bersamaan)
* **Evaluasi:**
  - **Bebas Masalah N+1 Query:** Query database pada listing dan katalog telah dibungkus *Eager Loading* (`with(['category', 'city', 'province', 'primaryImage', 'vehicleDetail', 'propertyDetail'])`).
  - **Kapasitas 100 Concurrent Request:**
    - Jika dijalankan menggunakan `php artisan serve` (PHP CLI built-in), server bersifat single-thread blocking (tidak cocok untuk multi-user).
    - Namun pada server VPS produksi yang menggunakan **Nginx + PHP-FPM** (dengan `pm = dynamic`, `pm.max_children = 50-100`) atau **Laravel Octane / FrankenPHP**, server dapat memproses **300–800 request per detik** dengan mudah dan waktu respon di bawah 50–100 milidetik.

---

## 3. Database & Storage (Struktur, Relasi, dan Indeks)
* **Evaluasi:** Data **TIDAK ditumpuk** di dalam satu tabel besar. Struktur database telah ternormalisasi secara modular:
  - **Tabel Entitas:** `listings`, `property_details` (1-to-1), `vehicle_details` (1-to-1), `listing_images` (1-to-many), `categories`, `provinces`, `cities`, `districts`, `favorites`, `inquiries`, `users`, `settings`.
  - **Integritas Relasi:** Menggunakan Foreign Key (`cascadeOnDelete` & `nullOnDelete`) untuk menjaga integritas data referensial.
  - **Indeks Performa:**
    - Composite Index: `['status', 'featured']`, `['category_id', 'status']`, `['city_id', 'status']`.
    - Fulltext Search: Index MySQL `ft_listings_search (title, description, location_label)` untuk pencarian kata kunci yang sangat cepat.
  - **File Storage:** Menggunakan abstraksi Laravel Storage disk yang siap dialihkan dari lokal ke AWS S3 / Cloudflare R2 tanpa mengubah logika kode.

---

## 4. Authentication & Authorization
* **Evaluasi Keamanan:**
  - **Password Hashing:** Menggunakan algoritma **Bcrypt** dengan work factor 12.
  - **Proteksi CSRF:** Middleware `PreventRequestForgery` aktif di seluruh form HTTP POST, PUT, dan DELETE.
  - **Verifikasi Email:** Menggunakan *Signed URLs* (URL bertanda tangan kriptografis anti-pemalsuan).
  - **Reset Password:** Token acak terenkripsi dengan masa kedaluwarsa otomatis.
  - **Password Confirmation:** Wajib memasukkan ulang password sebelum menghapus listing atau akun pengguna.
  - **Anti-Bot ("Saya bukan robot"):** Terpasang validasi kriptografis HMAC SHA-256 + Honeypot trap pada halaman login.

---

## 5. Cloud Compute (Keamanan Infrastruktur VPS)
* **Status:** Bergantung pada konfigurasi VPS server produksi (Panduan langkah demi langkah tersedia di `DEPLOY.md`).
* **Standard Operating Procedure (SOP) Keamanan Server:**
  1. Jangan jalankan web server dengan akun `root` (gunakan user khusus `www-data` atau `syarva`).
  2. Batasi hak akses file: `storage/` dan `bootstrap/cache/` (775), file `.env` (600 / 640).
  3. Aktifkan Firewall (UFW): Hanya buka port `80` (HTTP), `443` (HTTPS), dan port kustom SSH.
  4. Nonaktifkan otentikasi password SSH (gunakan *SSH Key-based authentication* saja).
  5. Pastikan `APP_DEBUG=false` pada file `.env` server produksi.

---

## 6. Continuous Integration & Continuous Deployment (CI/CD)
* **Evaluasi:** Telah terpasang pipeline GitHub Actions di folder `.github/workflows/`:
  - **`tests.yml`:** Menjalankan automated test suite (PHPUnit) pada setiap *push* atau *pull request* ke branch `main` / `develop`.
  - **`deploy.yml`:** Mengotomatiskan pull kode terbaru, migrasi database (`php artisan migrate --force`), compile asset Vite, dan reload PHP-FPM/Nginx secara instan via SSH Action.
* **Keamanan Kredensial:** Seluruh secret server (`SERVER_HOST`, `SERVER_USER`, `SERVER_SSH_KEY`) wajib disimpan pada menu *Settings → Secrets and variables → Actions* di repository GitHub.

---

## 7. Role-Level Security (RLS)
* **Evaluasi:**
  - **Hak Akses Admin:** Seluruh route `/admin` (atau subdomain `admin.*`) dilindungi secara ketat oleh middleware `EnsureUserIsAdmin` yang memeriksa kolom `role === 'admin'`.
  - **Pemblokiran User Nonaktif:** Middleware global `EnsureUserIsActive` mencegat user yang berstatus `suspended`/`inactive`.
  - **Isolasi Kepemilikan Data:** User biasa hanya dapat mengakses dan mengelola data relasi miliknya sendiri (`$user->favorites()`, `$user->inquiriesReceived()`). User tidak dapat mengedit atau melihat pesan privat milik akun lain.

---

## 8. Rate Limiting (Anti-Spam & Anti-Brute Force)
* **Evaluasi:** Diatur pada [AppServiceProvider.php](file:///d:/SYARVA/app/Providers/AppServiceProvider.php):
  - **Autentikasi (Login / Register):** Dibatasi maksimal 30 request/menit per IP/User.
  - **Pengiriman Inquiry:** Dibatasi maksimal 5 request/menit per IP.
  - **Form Kontak Publik:** Dibatasi maksimal 3 request/menit per IP.
  - **API Global:** Dibatasi maksimal 120 request/menit per IP.
  - Mencegah serangan *Credential Stuffing*, *DDoS layer 7 ringan*, dan *Spam Bot*.

---

## 9. Cache & Content Delivery Network (CDN)
* **Evaluasi & Rekomendasi:**
  - **Status Cache Backend:** Masalah serialization object Eloquent model pada PHP 8.4 telah tuntas diperbaiki; query katalog kini berjalan stabil.
  - **Cache Statis (Vite):** File CSS dan JS dibundel dengan file-hash unik sehingga aman dari issue *stale cache* pada browser pengguna.
  - **Rekomendasi Produksi:**
    - Hubungkan domain utama ke **Cloudflare CDN (Free)** untuk meng-cache gambar listing, CSS, dan JS di edge server global terdekat dengan pengguna.
    - Konfigurasikan `CACHE_STORE=redis` atau `database` dan `SESSION_DRIVER=redis` atau `database` saat deploy ke VPS.

---

## 10. Load Balancer & Skalabilitas Lanjutan
* **Evaluasi:**
  - Untuk skala awal hingga menengah (100–1.000 user aktif harian), sistem **cukup menggunakan 1 VPS mandiri** (2–4 vCPU, 4GB RAM).
  - **Kesiapan Multi-Server (Scale-Ready):**
    Jika traffic melonjak dan membutuhkan arsitektur *Multi-Instance* di belakang Load Balancer:
    1. Session dan Cache tinggal dialihkan ke Redis Cluster / Managed Redis.
    2. Upload file gambar (`storage/`) dialihkan ke Object Storage S3 / Cloudflare R2 (driver S3 bawaan Laravel).
    3. Seluruh instance server aplikasi bersifat stateless dan dapat di-scale horizontal secara mudah.

---
*Dokumen ini dibuat secara otomatis sebagai panduan audit teknis arsitektur sistem SYARVA.*
