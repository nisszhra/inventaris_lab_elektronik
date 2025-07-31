Laravel Project Setup
Panduan ini menjelaskan cara menginstal Laravel dan melakukan konfigurasi database untuk memulai pengembangan aplikasi web.

Prasyarat
Pastikan kamu sudah menginstal:
- PHP >= 8.1
- Composer
- MySQL
- Node.js dan NPM (untuk frontend)
- Laravel CLI (opsional)

Langkah Instalasi Laravel
1. Clone Repository
git clone https://github.com/username/nama-project.git
cd nama-project

2. Install Dependency Laravel
composer install

3. Copy File .env
cp .env.example .env

4. Generate App Key
php artisan key:generate

Konfigurasi Database
Buka file .env lalu ubah bagian berikut sesuai dengan konfigurasi database lokal kamu:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=

karena saya menggunakan sqlite jadi konfigurasi databasenya seperti ini:
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=

Lalu jalankan migration:
php artisan migrate

Jalankan Server
php artisan serve

Akses proyek di browser:
http://127.0.0.1:8000

Instalasi Frontend (Opsional)
Jika menggunakan Vite atau Tailwind CSS, jalankan perintah berikut:
npm install
npm run dev