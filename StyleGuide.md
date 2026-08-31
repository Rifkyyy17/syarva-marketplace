# Style Guide & Design System
**Project**: Honda Sales & Multi-Service Landing Platform  
**Target Brand Identity**: Modern Automotive First, Clean, Dynamic & Trustworthy  
**Version**: 2.0.0  
**Date**: 2026-08-26  

---

## 1. Color Palette

### 1.1 Primary Brand (Honda Automotive Core)
- **Honda Passion Red**: `#CC0000` (Hero highlight, tombol katalog Honda, badge promo)
- **Honda Red Darker**: `#A80000` (Hover state tombol utama)
- **Automotive Charcoal**: `#12161A` (Navbar, dark cards, footer, teks headline)
- **Asphalt Gray**: `#2C343D` (Sub-container dark)

### 1.2 Multi-Service Accent Colors
- **WhatsApp Green**: `#25D366` (Tombol kirim WhatsApp, status online)
- **WhatsApp Green Dark**: `#1EBE5D` (Hover WhatsApp CTA)
- **Used Car Section Accent (Warm Amber / Slate)**: `#2563EB` atau `#D97706` (Aksen pembeda kartu jual mobil bekas)
- **Property Section Accent (Emerald / Modern Teal)**: `#0D9488` (Aksen pembeda kartu jual/beli properti)

### 1.3 Neutral & Backgrounds
- **Pure White**: `#FFFFFF` (Card background, container utama)
- **Soft Cloud Gray**: `#F8F9FA` (Background section bergantian)
- **Border Gray**: `#E5E7EB` (Input border, pemisah kartu)
- **Muted Text**: `#6B7280` (Label info, hint KM/Tahun)

---

## 2. Typography

- **Primary Font**: `'Plus Jakarta Sans'`, `'Inter'`, sans-serif
- **Heading Weight**: 700 (Bold) & 800 (Extra Bold)

| Level | Size | Weight | Usage |
| :--- | :--- | :--- | :--- |
| **Hero Title (H1)** | 2.5rem (40px) | 800 | Headline Promo Mobil Baru Honda |
| **Section Title (H2)** | 1.875rem (30px) | 700 | Judul Section (Katalog, Jual Mobil, Properti) |
| **Sub-section / Card (H3)**| 1.25rem (20px) | 600 | Nama Unit Mobil, Judul Form Layanan |
| **Body Regular** | 1rem (16px) | 400 | Deskripsi, Instruksi Pengisian |
| **Form Label & Meta** | 0.875rem (14px) | 500 | Label Input (KM, STNK, Status Pajak, Budget) |
| **Badge / Microcopy** | 0.75rem (12px) | 600 | Tag Kategori, Badge Multi-Brand |

---

## 3. Component Design Guidelines

### 3.1 Upper Section: Honda Showcase Cards
- Desain kartu mobil bernuansa sporty & premium.
- Gambar mobil clean dengan aspect ratio 16:9.
- Tombol aksi: "Lihat Detail & Brosur" (Outline/Red) dan "Chat Promo WA" (Green WhatsApp).

### 3.2 Lower Section: Dual Bypass Forms (Used Car & Property)
- **Form Card Styling**: Gunakan container berlatar belakang kontras (misal: *Soft Gray* `#F8F9FA` dengan border lembut `#E5E7EB` dan radius `16px`).
- **Input Fields**:
  - Border radius `8px`, border `1px solid #D1D5DB`.
  - Focus state: Aksen border aktif + shadow halus.
  - Untuk pilihan cepat (misal: Transmisi Manual/Matic, Jual/Beli Rumah), gunakan **Pill Toggle Buttons** agar cepat diklik di HP.
- **Submit Button (WhatsApp Direct)**:
  - Tombol berukuran penuh (*full-width*) berwarna hijau WhatsApp (`#25D366`), dilengkapi icon WhatsApp.
  - Microcopy jelas: *"Kirim Data Mobil ke WhatsApp"* / *"Konsultasi Properti via WhatsApp"*.

### 3.3 Sticky Floating Action Button (FAB)
- Terletak di pojok kanan bawah (`bottom: 24px; right: 24px;`).
- Menampilkan tombol bulat WhatsApp hijau berdenyut (*pulse effect*).
- Jika diklik, dapat menampilkan popover menu mini:
  - 🚗 Chat Promo Honda Baru
  - 🔄 Taksasi Jual Mobil Bekas
  - 🏡 Konsultasi Jual/Beli Rumah
