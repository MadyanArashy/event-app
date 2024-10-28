<h1 align="center">Pengaduan Siswa</h1>

### Konten:
- [Deskripsi](#deskripsi-)
- [Fitur-FItur](#fitur-fitur-)
- [Proses Cloning dan Instalasi](#proses-cloning-dan-instalasi-)

## Deskripsi
**Pengaduan Siswa** adalah sebuah aplikasi web yang dirancang untuk memfasilitasi siswa dalam melaporkan pengaduan atau masalah yang mereka hadapi di lingkungan sekolah. Aplikasi ini memungkinkan siswa untuk dengan mudah menyampaikan keluhan secara online yang kemudian dapat direspon oleh pihak sekolah dengan lebih cepat dan terstruktur.


## Fitur-Fitur:
- **Autentikasi Siswa**: Setiap siswa dapat login untuk melaporkan pengaduan secara aman.
- **Formulir Pengaduan**: Fitur form untuk pengisian keluhan lengkap dengan kategori masalah dan deskripsi.
- **Dashboard Pengaduan**: Tampilan daftar pengaduan siswa yang menampilkan status terbaru (diterima, diproses, atau selesai).
- **Respon Pengaduan**: Admin sekolah dapat memberikan respons pada setiap pengaduan siswa.
- **Notifikasi Status**: Siswa mendapatkan notifikasi ketika pengaduan mereka telah direspon atau diproses lebih lanjut.
- **Pengaturan Profil**: Siswa dan admin dapat mengubah informasi profil masing-masing.

## Proses Cloning dan Instalasi

### 1. Clone Repository
Untuk meng-clone repository ini, buka terminal dan jalankan perintah berikut:

```bash
git clone https://github.com/username/pengaduanSiswa.git
```
### 2. Clone Repository
Setelah proses cloning selesai, ubah nama folder menjadi pengaduanSiswa1:
```bash
mv pengaduanSiswa pengaduanSiswa1
```
### 3. Konfigurasi .env
Jika file .env berbentuk .env.example maka ubah dengan .env lalu jalankan perintah
```bash
php artisan migrate
```
### 4. Instalasi dependensi
Instal seluruh dependensi aplikasi yang diperlukan untuk backend dan frontend.
```bash
composer install
npm install
```
### 5. Generate App Key
Generate app key untuk Laravel:
```bash
php artisan key:generate
```
### 6. Menjalankan Aplikasi
Jalankan aplikasi menggunakan perintah berikut:
```bash
php artisan serve
npm run dev
```
