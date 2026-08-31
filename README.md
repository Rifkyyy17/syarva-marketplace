# 🚗🏢 SYARVA Marketplace & Dealership Portal

Platform marketplace otomotif dan properti modern berbasis **Laravel 12**, **Tailwind CSS v4**, **Alpine.js**, dan **Google Gemini AI**. Dirancang khusus untuk showroom resmi dealer mobil dan portal properti eksklusif.

---

## 🌟 Fitur Utama

### 🤖 1. AI PDF Brochure Parser (Ekstraktor Brosur Otomatis)
- Ekstraksi otomatis spesifikasi teknis mobil Honda (mesin, dimensi, varian, transmisi, fitur keselamatan, dll.) dari file **PDF Brosur Resmi**.
- Pemotongan otomatis gambar resolusi tinggi dari setiap halaman brosur PDF menggunakan **Python PyMuPDF**.
- Pengisian data listing secara otomatis ke form admin menggunakan **Google Gemini AI**.

### 💬 2. SYARVA AI Assistant (Chatbot Konsultasi Pintar)
- Rekomendasi unit mobil dan properti secara kontekstual dan interaktif.
- Pratinjau langsung kartu unit beserta harga dan foto thumbnail.
- Tombol aksi cepat untuk langsung melanjutkan konsultasi ke **WhatsApp Sales Resmi**.

### 📱 3. Mobile-First & Cross-Device Experience
- Bilah kontak bawah interaktif (*Sticky Bottom Bar*) di layar smartphone.
- Modal berbagi interaktif (*Share Modal*) ke WhatsApp, Facebook, Telegram, X (Twitter), dan Salin Tautan.
- Navigasi super cepat dengan teknologi *Instant Link Pre-fetching* (0 ms latency).

### 🛡️ 4. Keamanan & Isolasi Subdomain
- Pemisahan domain publik (`syarva.id`) dan panel manajemen internal (`admin.syarva.id`).
- Rate Limiting pada endpoint Auth, AI Chat, dan formulir kontak.
- Proteksi CSRF, Enkripsi Password Bcrypt (Cost 12), dan sanitasi input Eloquent ORM.

---

## 🛠️ Tech Stack

- **Backend:** PHP 8.4+, Laravel 12 (Eloquent ORM, Multi-Worker Support)
- **Frontend:** Blade Templating, Tailwind CSS v4, Alpine.js, Vite
- **AI & Automation:** Google Gemini 2.5 Flash API, Python 3 (PyMuPDF)
- **Database:** MySQL 8+ (Normalisasi 3NF dengan Fulltext Indexing)

---

## 🚀 Panduan Instalasi Lokal

1. **Clone Repositori:**
   ```bash
   git clone https://github.com/Rifkyyy17/syarva-marketplace.git
   cd syarva-marketplace
   ```

2. **Instal Dependensi:**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Sesuaikan konfigurasi database (`DB_*`) dan kunci API Gemini (`GEMINI_API_KEY`) pada file `.env`.*

4. **Migrasi Database & Seeder:**
   ```bash
   php artisan migrate --seed
   php artisan storage:link
   ```

5. **Jalankan Aplikasi:**
   ```bash
   # Terminal 1: Vite Asset Compiler
   npm run dev

   # Terminal 2: Laravel Server
   php artisan serve
   ```

---

## 📦 Deployment ke Server Produksi (Linux VPS / Ubuntu)

Proyek ini telah dilengkapi dengan skrip otomatisasi 1-klik:

```bash
# Berikan izin eksekusi dan jalankan deployment script
chmod +x deploy.sh
bash deploy.sh
```

Template konfigurasi server web tersedia di `nginx.conf.example`.

---

## 📄 Lisensi
Hak Cipta © 2026 **SYARVA Marketplace**. Semua hak dilindungi undang-undang.