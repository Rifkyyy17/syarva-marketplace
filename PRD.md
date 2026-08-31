# Product Requirement Document (PRD)
**Project Name**: Honda Sales & Multi-Service Landing Platform (Honda New Cars, Auto Trade-In & Property Hub)  
**Target User / Client**: Shara (Sales Executive & Multi-Service Consultant)  
**Document Version**: 2.0.0  
**Date**: 2026-08-26  
**Status**: Ready for Development (Updated with Multi-Service Bypass Forms)  

---

## 1. Project Overview & Objective
Platform web berbasis landing page dinamis yang dirancang dengan **fokus utama penjualan mobil baru Honda** (katalog, harga OTR/promo, spesifikasi, unduh brosur, dan visualisasi 3D/AR via QR code), sekaligus menyediakan **jalur konversi instan (WhatsApp Bypass)** di bagian bawah (footer/lower sections) untuk:
1. **Jual / Tukar Tambah Mobil Bekas (Multi-Brand / Bebas Merek)**: Mengumpulkan data spesifik unit mobil bekas calon pelanggan lalu otomatis memformat pesan detail ke WhatsApp sales.
2. **Jual / Beli Properti & Rumah**: Jalur konsultasi cepat untuk titip jual atau pencarian properti (beli rumah) yang langsung terhubung ke WhatsApp sales.

---

## 2. User Roles & Personas

### 2.1 Public Visitor / Potential Buyer
- **Honda New Car Shopper**: Mencari info mobil Honda terbaru, unduh brosur PDF, cek promo OTR, scan QR 3D mobil, dan booking test drive.
- **Used Car Seller (Multi-Brand)**: Ingin menjual/tukar-tambah mobil bekas merek apa saja secara cepat tanpa ribet registrasi akun.
- **Property Client (Jual/Beli Rumah)**: Ingin menjual aset rumah atau mencari hunian idaman melalui perantara sales.

### 2.2 Sales / Admin (Shara)
- Mengelola katalog mobil Honda (tambah/edit/hapus), brosur PDF, link/gambar QR 3D, dan banner promo.
- Mengatur data kontak (Nomor WhatsApp utama penerima leads).
- Memantau log pengajuan test drive atau leads yang masuk (opsional/database log).

---

## 3. Scope & Core Features

### 3.1 Public Landing Page (Frontend)

#### A. Hero & Main Showcase (Fokus Utama: Honda Baru)
1. **Hero & Promo Banner Slider**: Promo bulanan mobil Honda (DP ceper, angsuran ringan, bonus aksesoris).
2. **Katalog Mobil Baru Honda**: Grid/Filter kategori mobil (SUV, MPV, Sedan, City Car/Hatchback, Hybrid/EV).
3. **Detail Unit Mobil Honda**:
   - Galeri foto & spesifikasi teknis lengkap.
   - Fitur **Download Brosur Resmi (PDF)**.
   - Fitur **QR Code / Preview 3D Model Mobil**.
   - Tombol CTA instan WhatsApp per unit mobil.
4. **Form / Booking Test Drive**: Form jadwal test drive unit Honda.

---

#### B. Lower Section 1: Form Bypass Jual Mobil Bekas (Multi-Brand)
Section khusus di bagian bawah untuk siapa saja yang ingin menjual mobil bekas (merek apapun, tidak terbatas Honda). Calon penjual mengisi data ringkas di web, lalu ketika tombol *"Kirim ke WhatsApp"* diklik, sistem menyusun teks terstruktur dan membuka aplikasi WhatsApp Shara.

**Field Data Jual Mobil Bekas:**
- **Merek & Tipe Mobil**: (Contoh: Toyota Avanza G 1.3, Honda Jazz RS, Mitsubishi Pajero)
- **Tahun Pembuatan / Perakitan**: (Contoh: 2019)
- **Kilometer (KM) Saat Ini**: (Contoh: 45.000 km)
- **Transmisi**: Manual / Matic
- **STNK Atas Nama**: Pribadi (Tangan Pertama / Kedua) / Perusahaan
- **Status Pajak Kendaraan**: Hidup / Mati / Perlu Perpanjang (Tahun/Bulan)
- **Kondisi / Catatan Tambahan**: (Opsional: Bebas banjir/tabrakan, lokasi unit)

**Format Output WhatsApp Otomatis:**
```text
Halo Shara, saya ingin konsultasi jual / tukar tambah mobil bekas:
• Merek / Tipe : [Merek & Tipe]
• Tahun        : [Tahun]
• Transmisi    : [Manual / Matic]
• Kilometer    : [KM]
• STNK a.n.    : [Pribadi / PT]
• Status Pajak : [Hidup / Mati s/d ...]
• Catatan      : [Catatan]
Mohon info taksiran harga dan prosesnya. Terima kasih!
```

---

#### C. Lower Section 2: Form Bypass Jual / Beli Properti & Rumah
Section interaktif untuk layanan perantara properti (titip jual atau beli/cari rumah).

**Field Data Properti:**
- **Kategori Layanan**: Jual Rumah / Beli (Cari) Rumah
- **Lokasi / Kota Target**: (Contoh: Bogor Kota, Cibinong, Depok, dll.)
- **Tipe Properti**: Rumah Tinggal / Ruko / Tanah
- **Estimasi Budget / Harga Penawaran**: (Contoh: Rp 600 Juta - 1 Miliar)
- **Spesifikasi Singkat / Kebutuhan**: Luas Tanah (LT) / Luas Bangunan (LB), Kamar Tidur, Status Surat (SHM/HGB).
- **Nama & Kontak Pengirim**: Nama Pemohon.

**Format Output WhatsApp Otomatis:**
```text
Halo Shara, saya ingin konsultasi layanan properti:
• Kategori      : [Jual Rumah / Beli Rumah]
• Lokasi / Area : [Lokasi]
• Tipe Properti : [Rumah / Ruko / Tanah]
• Budget / Harga: [Range Budget / Harga]
• Spesifikasi   : [LT/LB, Kamar, Legalitas Surat]
• Nama          : [Nama Klien]
Mohon bantuannya untuk info lebih lanjut. Terima kasih!
```

---

### 3.2 Admin Panel (Laravel Backend)
1. **Katalog Mobil Honda (CRUD)**: Kelola nama unit, harga OTR, promo DP, upload galeri, upload brosur PDF, upload QR Code 3D.
2. **Banner Promo Slider (CRUD)**: Kelola banner promo berjalan di homepage.
3. **Pengaturan Kontak & WhatsApp**: Kelola nomor WhatsApp tujuan untuk semua alur form bypass (Honda, Mobil Bekas, & Properti).
4. **Leads Log (Optional)**: Riwayat klik/submit form untuk arsip internal.

---

## 4. Non-Functional Requirements (NFR)
- **Instant WhatsApp Generator**: Tidak perlu reload halaman saat klik CTA jual mobil/properti; script otomatis menyusun URL encoded WhatsApp `https://wa.me/{phone}?text=...`.
- **Mobile-Friendly**: Layout form di mobile harus nyaman diisi dengan keyboard virtual numerik untuk KM & Tahun.
- **Fast Load**: Kompresi aset gambar & lazy loading agar website ringan.
