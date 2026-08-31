# Panduan Deploy — SYARVA Marketplace

Panduan ini mencakup deployment ke **shared hosting (cPanel)** dan **VPS (nginx + PHP-FPM)**.

---

## 1. Persyaratan Server

| Kebutuhan | Versi / Keterangan |
|---|---|
| PHP | 8.3+ (disarankan 8.4) |
| Ekstensi PHP | `mbstring`, `intl`, `gd`, `pdo_mysql`, `openssl`, `fileinfo`, `zip`, `ctype`, `tokenizer`, `xml`, `redis` (phpredis) |
| Database | MySQL 8 (atau MariaDB 10.4+) |
| Redis | 6+ (untuk session, cache, queue) |
| Composer | 2.x |
| Node.js (hanya jika build asset di server) | 20+ |
| Web server | nginx / Apache (document root ke folder `public/`) |
| `pdo_sqlite` | **Tidak dibutuhkan** di produksi (hanya untuk menjalankan test lokal) |

Cek ekstensi di server:

```bash
php -m | grep -E "mbstring|intl|gd|pdo_mysql|openssl|fileinfo|zip"
```

---

## 2. Persiapan di Lingkungan Lokal (sebelum deploy)

```bash
# pastikan build asset terbaru ikut ter-deploy
npm run build

# (opsional) jalankan seluruh test
php -d extension=pdo_sqlite vendor/bin/phpunit
```

File/direktori yang **WAJIB ikut ter-deploy**:
- seluruh kode aplikasi (`app/`, `routes/`, `resources/`, `config/`, `database/`, `public/`, `bootstrap/`, `vendor/` — vendor dibangun ulang di server, tidak perlu di-upload)
- `public/build/` (hasil `npm run build`)
- `composer.json`, `composer.lock`, `package.json`, `package-lock.json`

File yang **JANGAN** ikut:
- `.env` (dibuat di server)
- `storage/` isi lokal (session, log, upload)
- `tests/` (opsional)
- `.git/` (kalau pakai git, eksklusi)

---

## 3. Deploy ke Shared Hosting (cPanel / Webuzo)

1. **Upload** seluruh file ke `public_html` (atau folder aplikasi + arahkan `public/` sebagai document root, misal lewat `public_html` berisi isi folder `public/`).
2. Buka **Terminal** (cPanel → Terminal / SSH), lalu:

```bash
cd ~/nama_folder_app

# install dependensi PHP
composer install --no-dev --optimize-autoloader

# file env
cp .env.example .env
php artisan key:generate

# install Redis (jika belum ada)
sudo apt install -y redis-server php-redis
sudo systemctl enable redis-server
sudo systemctl start redis-server
```

3. **Edit `.env`** (pakai editor cPanel / nano):

```
APP_NAME=SYARVA
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domain-anda.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=nama_user
DB_PASSWORD=password_db

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database

MAIL_MAILER=smtp
MAIL_HOST=smtp.domain-anda.com
MAIL_PORT=587
MAIL_USERNAME=noreply@domain-anda.com
MAIL_PASSWORD=password_email
MAIL_FROM_ADDRESS=noreply@domain-anda.com
MAIL_FROM_NAME="SYARVA"

SEEDER_ADMIN_EMAIL=admin@domain-anda.com
SEEDER_ADMIN_PASSWORD=password_kuat_admin
```

4. **Migrasi + link storage + cache:**

```bash
php artisan migrate --seed --force   # seed = data contoh; tanpa --seed untuk kosong
php artisan storage:link
php artisan optimize
```

5. **Upload gambar di hosting shared**: cek `upload_max_filesize` & `post_max_size` ≥ `8M` (cPanel → Select PHP Version → Options, atau php.ini).

6. **Verifikasi** — lihat bagian 6.

> Catatan shared hosting: jika tidak punya akses SSH, jalankan perintah di atas lewat menu *Cron Jobs* sekali jalan, atau minta bantuan support hosting.

---

## 4. Deploy ke VPS (nginx + PHP-FPM)

Ikuti skrip `deploy.sh` di direktori ini:

```bash
# sesuaikan variabel di atas file (APP_DIR, PHP bin, dll.) lalu:
chmod +x deploy.sh
sudo ./deploy.sh
```

**Konfigurasi nginx** (`/etc/nginx/sites-available/syarva`):

```nginx
server {
    listen 80;
    server_name domain-anda.com www.domain-anda.com;
    root /var/www/syarva/public;

    index index.php;
    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/run/php/php8.4-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    location ^~ /storage/ {
        # file upload hasil storage:link — biarkan statis
    }

    # (wajib) blokir akses langsung ke folder internal
    location ~ ^/(app|bootstrap|config|database|resources|routes|storage|tests|vendor)/ {
        deny all;
    }

    client_max_body_size 16M;   # untuk upload foto (5MB) + form
}
```

HTTPS (opsional tapi disarankan):

```bash
sudo apt install -y certbot python3-certbot-nginx
sudo certbot --nginx -d domain-anda.com -d www.domain-anda.com
```

Sertakan blok `server { listen 443 ssl; ... }` hasil certbot, lalu update `APP_URL=https://domain-anda.com`.

---

## 4b. CDN (Cloudflare) — Opsional tapi Disarankan

1. Buat akun gratis di [cloudflare.com](https://www.cloudflare.com)
2. Tambahkan domain, ikuti petunjuk ubah nameserver di domain registrar
3. Setelah DNS aktif, aktifkan:
   - **SSL/TLS**: Full (Strict)
   - **Caching**: Aggressive (atau Standard untuk free tier)
   - **Auto Minify**: JS, CSS, HTML
   - **Brotli**: On
4. Di Dashboard Cloudflare → Speed → Optimization:
   - **Rocket Loader**: On (mempercepat JS loading)
   - **Early Hints**: On
5. Di caching rules tambahkan:
   ```
   Cache Everything: /build/* (static assets)
   Bypass Cache: /dashboard/*, /admin/*
   ```
6. Gratis untuk 1 domain, sudah termasuk DDoS protection + SSL

---

## 5. Checklist Verifikasi Setelah Deploy

```bash
# health check bawaan Laravel
curl -s -o /dev/null -w "%{http_code}\n" https://domain-anda.com/up   # → 200

# halaman publik
curl -s -o /dev/null -w "%{http_code}\n" https://domain-anda.com/              # 200
curl -s -o /dev/null -w "%{http_code}\n" https://domain-anda.com/sitemap.xml   # 200
curl -s -o /dev/null -w "%{http_code}\n" https://domain-anda.com/robots.txt    # 200

# redirect auth (harus berhenti di /login dengan 200)
curl -s -o /dev/null -w "%{http_code} %{url_effective}\n" -L https://domain-anda.com/dashboard
```

Uji manual di browser:
- [ ] Login admin → dashboard admin tampil dengan grafik
- [ ] Login seller → tambah listing + upload foto
- [ ] Form inquiry mengirim (cek email masuk / log)
- [ ] Foto listing tampil (`/storage/...`)
- [ ] `APP_DEBUG=false` → halaman 404/500 tidak menampilkan stack trace

---

## 6. Pemecahan Masalah Umum

| Gejala | Penyebab | Solusi |
|---|---|---|
| Halaman kosong / 500 | izin folder | `chmod -R 775 storage bootstrap/cache` dan `chown -R www-data:www-data .` (sesuaikan user web server) |
| 419 saat submit form | session tidak tersimpan (folder storage tidak writable) | perbaiki izin `storage/framework/sessions` |
| Foto gagal upload | `upload_max_filesize` / `post_max_size` kecil | set ≥ 8M di php.ini server |
| Gambar `/storage/...` 404 | symlink belum dibuat | jalankan `php artisan storage:link` |
| Email tidak terkirim | SMTP salah / port diblokir | cek `MAIL_MAILER=smtp`, gunakan port 465/587 sesuai provider; uji dengan `php artisan tinker --execute="Mail::raw('tes', fn (\$m) => \$m->to('anda@email.com'));"` |
| `config:cache` error | `.env` belum diisi | isi dulu semua variabel wajib, baru `php artisan optimize` |
| Halaman lama setelah update | cache | `php artisan optimize:clear` lalu `php artisan optimize` |

---

## 7. Keamanan & Pemeliharaan

- `APP_DEBUG=false` wajib di produksi
- Ganti password seeder: set `SEEDER_ADMIN_PASSWORD`/`SEEDER_USER_PASSWORD` sebelum `migrate --seed`
- Backup database terjadwal (mysqldump / panel hosting)
- Update rutin: `composer update` + `npm update` di lingkungan uji, lalu deploy ulang
- Pantau log: `storage/logs/laravel.log` (atau koneksikan ke layanan log eksternal)
- (Opsional) batasi akses `/admin` dari IP kantor, atau pasang akses HTTP Basic Auth via nginx di lokasi `/admin`