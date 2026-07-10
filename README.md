# 🎒 ReturnLy - Lost & Found Platform

Platform Lost & Found digital untuk lingkungan sekolah yang membantu siswa dan guru menemukan barang yang hilang dengan mudah dan efisien.

![Laravel](https://img.shields.io/badge/Laravel-13.x-red)
![PHP](https://img.shields.io/badge/PHP-8.5+-purple)
![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.x-blue)

## ✨ Fitur Utama

### 👤 Untuk Tamu (Guest)
- 📝 Lapor Barang Hilang dengan detail lengkap
- 🔍 Lapor Barang Ditemukan untuk membantu sesama
- 📋 Cek Status Klaim dengan nomor klaim
- 🖼️ Upload foto sebagai bukti
- 📱 Responsive design untuk mobile

### 👨‍💼 Untuk Admin
- 📊 Dashboard dengan statistik & grafik
- ✅ Verifikasi klaim kepemilikan
- 📦 CRUD Barang Hilang & Ditemukan
- 🏷️ Manajemen Kategori & Lokasi
- 🔄 Auto-update status barang

### 🔔 Notifikasi
- 📧 Email notification via Brevo SMTP
- 📱 WhatsApp notification via Fonnte API

## 🚀 Instalasi

```bash
# Clone repository
git clone https://github.com/username/returnly.git
cd returnly

# Install dependencies
composer install
npm install

# Setup environment
copy .env.example .env
php artisan key:generate

# Konfigurasi database di .env
# Jalankan migration & seeder
php artisan migrate --seed
php artisan storage:link

# Compile assets
npm run dev

# Run server
php artisan serve