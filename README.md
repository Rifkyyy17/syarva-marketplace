# SYARVA Marketplace

Marketplace properti & otomotif berbasis **Laravel 13** + **Blade** + **Tailwind CSS v4** (Vite) + **Alpine.js** + **Chart.js**.

Fitur utama:

- **Publik** — beranda dengan listing unggulan, pencarian & filter (keyword, kategori, harga, lokasi, kamar, merek kendaraan, dll.), halaman kategori properti (rumah/tanah) & otomotif (mobil baru/second), detail listing dengan galeri foto, form inquiry pembeli, halaman tentang & kontak, sitemap.xml, robots.txt, SEO (meta OG/Twitter + JSON-LD).
- **User / Seller** — registrasi, login, logout, dashboard statistik, kelola listing (buat/edit/hapus, galeri foto, set foto utama, kirim untuk review, arsip), daftar favorit, kotak masuk inquiry (tandai dibalas), profil, ubah password.
- **Admin** — dashboard statistik & grafik (Chart.js), moderasi listing (approve/reject dengan alasan/featured/hapus), kelola pengguna (tambah/ubah status/role), kelola kategori, kelola lokasi (provinsi/kota/kecamatan), kelola semua inquiry, laporan (listing, pengguna, inquiry), pengaturan situs (website/SEO/kontak/sosial).
- **Keamanan** — auth middleware, role admin (`EnsureUserIsAdmin`), akses data berbasis pemilik (seller hanya melihat listing/inquiry miliknya), CSRF, soft delete listing, validasi FormRequest, escaping Blade otomatis.

## Persyaratan

- PHP 8.4+
- Composer
- Node.js 20+
- MySQL 8 (atau SQLite untuk testing)

## Instalasi

```bash
git clone <url-repo> syarva
cd syarva

composer install
npm install

cp .env.example .env
php artisan key:generate
```

Konfigurasi `.env`:

```
APP_NAME=SYARVA
APP_URL=http://localhost:8000
APP_LOCALE=id
DB_CONNECTION=mysql
DB_DATABASE=syarva
DB_USERNAME=root
DB_PASSWORD=
```

> Catatan: ekstensi `pdo_sqlite` diaktifkan untuk menjalankan test suite
> (`php -d extension=pdo_sqlite vendor/bin/phpunit`).

## Migrasi & Seeder

```bash
php artisan migrate --seed
```

Seeder mengisi: 1 admin, 3 seller, pengguna contoh, kategori (Properti → Rumah/Tanah, Otomotif → Mobil Baru/Second), lokasi (provinsi/kota/kecamatan), listing contoh + gambar placeholder, serta pengaturan situs.

Akun default (ubah lewat `.env`):

| Role   | Email             | Password |
|--------|-------------------|----------|
| Admin  | `admin@syarva.test` | `password` |
| Seller | `andi@syarva.test` / `siti@syarva.test` / `budi@syarva.test` | `password` |

Variabel seeder opsional: `SEEDER_ADMIN_EMAIL`, `SEEDER_ADMIN_PASSWORD`, `SEEDER_USER_PASSWORD`.

## Menjalankan Aplikasi

```bash
npm run dev        # terminal 1: Vite (HMR)
php artisan serve  # terminal 2: aplikasi (http://localhost:8000)
```

Untuk produksi:

```bash
npm run build
php artisan optimize
```

## Menjalankan Test

Suite test: `tests/Feature/*` (auth, listing, admin, inquiry, favorit, SEO) dengan SQLite in-memory (`phpunit.xml`).

```bash
# bila pdo_sqlite sudah aktif di php.ini:
php artisan test

# bila belum:
php -d extension=pdo_sqlite vendor/bin/phpunit
```

## Struktur Penting

```
app/Http/Controllers/        # Public, Auth, User (seller), Admin
app/Models/                  # Listing, Category, ListingImage, PropertyDetail,
                             # VehicleDetail, Province, City, District, Inquiry, Favorite, Setting
app/Services/                # InquiryService, FavoriteService, ListingService, dll.
app/Http/Requests/           # FormRequest validasi
app/Http/Middleware/EnsureUserIsAdmin.php
resources/views/
  components/                # layout (app/auth/user/admin) & komponen Blade
  public/                    # halaman publik
  user/                      # dashboard seller
  admin/                     # dashboard admin
routes/web.php               # rute publik & user
routes/admin.php             # rute admin (prefix /admin)
resources/css/app.css        # Tailwind v4
resources/js/app.js, admin-charts.js
database/seeders/            # DatabaseSeeder, UserSeeder, CategorySeeder, dsb.
```

## Lisensi

[The MIT License (MIT)](https://opensource.org/licenses/MIT)