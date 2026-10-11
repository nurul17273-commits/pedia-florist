# PEDIA FLORIST

Aplikasi web berbasis Laravel untuk membantu pengguna mempelajari dan merawat tanaman/bunga. Proyek ini menyediakan halaman informasi tanaman, panduan, jadwal, autentikasi, percakapan, serta fitur berbasis AI sesuai konfigurasi aplikasi.

> **Status:** proyek Laravel untuk pengembangan lokal. Integrasi eksternal (misalnya Google OAuth atau layanan AI) memerlukan kredensial milik masing-masing pengembang dan konfigurasi `.env` yang benar.

## Fitur

- Autentikasi pengguna dan pendaftaran akun.
- Login Google melalui OAuth (perlu konfigurasi Google Cloud).
- Informasi/katalog tanaman.
- Panduan perawatan dan halaman informasi.
- Jadwal perawatan tanaman.
- Chat pengguna dan chat AI.
- Analisis/diagnosis tanaman berbasis AI (bergantung pada konfigurasi layanan eksternal).
- Pengajuan keluhan/dukungan.
- Panel admin untuk mengelola tanaman, permintaan akun, chat, dan keluhan.
- Ekspor laporan keluhan ke PDF.

## Teknologi

- **Backend:** PHP 8.3+, Laravel 13.
- **Frontend/build:** Vite, Tailwind CSS 4, JavaScript.
- **Database:** mengikuti konfigurasi Laravel pada `.env` (contoh `.env.example` menggunakan SQLite).
- **Login sosial:** Laravel Socialite.

## Persyaratan

Pastikan perangkat sudah memiliki:

- PHP **8.3 atau lebih baru**.
- Composer.
- Node.js dan npm.
- Ekstensi PHP yang dibutuhkan Laravel dan driver database pilihan.
- Git.

Versi yang tepat dapat dicek dengan:

```bash
php -v
composer --version
node -v
npm -v
```

## Instalasi lokal

Jalankan perintah dari direktori root proyek (direktori yang berisi `artisan`, `composer.json`, dan `package.json`).

### 1. Ambil source code

```bash
git clone https://github.com/nurul17273-commits/pedia-florist.git

```

### 2. Pasang dependency PHP dan JavaScript

```bash
composer install
npm install
```

### 3. Siapkan environment

Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

macOS/Linux/Git Bash:

```bash
cp .env.example .env
```

Buat application key:

```bash
php artisan key:generate
```

Buka `.env` dan sesuaikan pengaturan aplikasi, database, OAuth, serta layanan AI yang memang digunakan. Jangan pernah memasukkan kredensial asli ke `.env.example` atau mengunggah `.env` ke GitHub.

### 4. Siapkan database

Konfigurasi database ditentukan oleh `DB_CONNECTION` di `.env`. Untuk SQLite, pastikan ekstensi SQLite PHP aktif dan buat file database bila belum tersedia.

macOS/Linux/Git Bash:

```bash
touch database/database.sqlite
```

Windows PowerShell:

```powershell
New-Item database/database.sqlite -ItemType File -Force
```

Kemudian jalankan migrasi:

```bash
php artisan migrate
```

Jika proyek menggunakan MySQL, buat database terlebih dahulu lalu sesuaikan `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` di `.env`.

### 5. Build asset dan jalankan aplikasi

Untuk menyiapkan asset produksi:

```bash
npm run build
```

Untuk pengembangan, buka terminal dan jalankan:

```bash
php artisan serve
```

Buka terminal kedua dan jalankan:

```bash
npm run dev
```

Lalu buka alamat lokal yang ditampilkan oleh Laravel (umumnya `http://127.0.0.1:8000`).

## Konfigurasi layanan eksternal

- **Google OAuth:** isi client ID, client secret, dan callback URL sesuai variabel yang dibaca kode aplikasi. Daftarkan callback URL yang sama persis di Google Cloud Console.
- **Layanan AI:** periksa controller AI dan konfigurasi layanan untuk mengetahui provider, endpoint, dan nama variabel environment yang digunakan. Isi API key secara lokal; jangan commit key ke repository.
- **Email:** atur variabel `MAIL_*` jika fitur email akan digunakan.

Fitur yang membutuhkan kredensial eksternal tidak akan berfungsi penuh jika konfigurasi belum tersedia.

## Perintah berguna

```bash
php artisan route:list
php artisan migrate:status
php artisan test
./vendor/bin/pint --test
npm run build
```

Di Windows, gunakan `vendor\bin\pint --test` bila shell tidak mendukung format `./vendor/bin/pint`.

## Struktur proyek

```text
app/Http/Controllers/   # Controller aplikasi
app/Models/             # Model Eloquent
config/                 # Konfigurasi Laravel
database/migrations/    # Struktur database
database/seeders/       # Data awal
resources/css/          # CSS dan Tailwind
resources/js/           # JavaScript
resources/views/        # Template Blade
routes/web.php           # Route web
public/                  # Entry point dan aset publik
tests/                   # Pengujian
```

## Keamanan dan privasi

- `.env` berisi konfigurasi rahasia dan harus tetap lokal.
- Jangan commit API key, OAuth client secret, password, token, atau data pengguna.
- Database lokal, log, `vendor/`, dan `node_modules/` tidak perlu dimasukkan ke repository.
- Jika rahasia pernah terunggah ke repository publik, hapus dari riwayat Git saja tidak cukup: segera rotasi/revoke kredensial tersebut.
- Gunakan `APP_DEBUG=false` dan konfigurasi production yang sesuai saat deployment.

## Kontribusi

1. Buat branch untuk perubahan: `git switch -c feat/nama-fitur`.
2. Lakukan perubahan dan pengujian.
3. Commit dengan pesan yang jelas, misalnya `feat: tambah jadwal perawatan`.
4. Push branch dan ajukan Pull Request.

## Lisensi

Lisensi proyek belum ditetapkan secara eksplisit. Tambahkan file `LICENSE` jika ingin menentukan syarat penggunaan dan distribusi kode.
