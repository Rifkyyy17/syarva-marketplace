#!/usr/bin/env bash
set -e

echo "🚀 Memulai Otomasi Setup & Deployment SYARVA..."

# 1. Install dependensi Python untuk Ekstrak Brosur PDF
echo "📦 Memeriksa & Menginstal Python PyMuPDF..."
if command -v apt-get &> /dev/null; then
    sudo apt-get update -y
    sudo apt-get install -y python3 python3-pip
    pip3 install pymupdf --break-system-packages || pip3 install pymupdf
fi

# 2. Atur Izin Folder Storage & Cache
echo "🔒 Mengatur Hak Akses Folder Storage & Cache..."
mkdir -p storage/app/public/listings storage/app/public/brochures bootstrap/cache
chmod -R 775 storage bootstrap/cache
if command -v chown &> /dev/null; then
    chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true
fi

# 3. Hubungkan Storage Link
echo "🔗 Membuat Storage Link..."
php artisan storage:link || true

# 4. Migrasi Database
echo "🗄️ Menjalankan Migrasi Database..."
php artisan migrate --force

# 5. Optimasi Cache Laravel
echo "⚡ Mengoptimalkan Cache & Performa..."
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ DEPLOYMENT SYARVA BERHASIL & SIAP DIGUNAKAN!"
