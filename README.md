# 🌸 Petal Registry - Marine Coastal Florist Admin System

<p align="center">
  <img src="https://img.shields.io/badge/Theme-Soft%20Pink-ffb6c1?style=for-the-badge" alt="Theme Soft Pink">
  <img src="https://img.shields.io/badge/Framework-Bootstrap%205-7952b3?style=for-the-badge" alt="Bootstrap 5">
  <img src="https://img.shields.io/badge/Database-MySQL-4479a1?style=for-the-badge" alt="MySQL">
</p>

---

## 📌 Deskripsi Proyek
[cite_start]**Petal Registry** adalah sistem manajemen admin florist berbasis web yang dirancang khusus untuk **Marine Coastal Florist**. [cite_start]Aplikasi ini berfungsi untuk mengelola data stok bunga, mencatat klasifikasi produk, menyematkan dokumentasi video, serta memvalidasi bukti penerimaan menggunakan tanda tangan digital langsung dari kurir atau pelanggan[cite: 1, 2].

---

## ✨ Fitur Utama
Sistem ini mengimplementasikan berbagai modul fungsional penting:
1. [cite_start]**Sistem Autentikasi Keamanan**: Halaman login admin menggunakan enkripsi password MD5 untuk membatasi akses pengelolaan data bunga[cite: 1, 2].
2. [cite_start]**Form Tambah Data (Multiple Upload)**: Mendukung penginputan nama bunga, kategori/klasifikasi, harga, stok, dan unggah banyak file gambar sekaligus[cite: 1, 2].
3. [cite_start]**HTML5 Video Player**: Penyematan video profil rangkaian toko bunga langsung di dalam *dashboard*.
4. [cite_start]**Datatable Stok Produk**: Tabel interaktif untuk menampilkan data komprehensif, konversi format mata uang Rupiah, serta kalkulasi otomatis status kuantitas gudang (*Ready*, *Stok Kritis*, atau *Habis Total*)[cite: 1, 2].
5. [cite_start]**Pencarian Data (Query MySQL)**: Fitur filter pencarian cepat berdasarkan nama bunga atau klasifikasi tertentu[cite: 2].
6. [cite_start]**Data Tersemat (Modal Detail)**: Menampilkan detail log sekunder produk secara dinamis menggunakan Bootstrap Modal tanpa memuat ulang halaman[cite: 2].
7. [cite_start]**Canvas TTD Digital**: Fitur *signature pad* berbasis HTML5 Canvas untuk menggambar tanda tangan digital kurir/penerima log manifest[cite: 2].
8. **Export ke CSV**: Tombol ekstraksi data instan untuk mengunduh seluruh rekapitulasi stok produk ke dalam format Microsoft Excel / CSV.

---

## 🛠️ Spesifikasi Teknologi
* [cite_start]**Frontend**: HTML5, CSS3, JavaScript (ES6), Bootstrap 5, FontAwesome 6 [cite: 2]
* [cite_start]**Backend**: PHP (Versi 8+) [cite: 2]
* [cite_start]**Database**: MySQL / phpMyAdmin [cite: 2]
* [cite_start]**Server Lokal**: Laragon / XAMPP [cite: 2]

---

## 🗂️ Struktur Database (`produk`)
Struktur tabel `produk` yang digunakan untuk menopang sistem ini:

| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id` | INT (AI, PK) | ID Unik Produk |
| `nama` | VARCHAR(255) | Nama Varian Bunga |
| `kategori` | VARCHAR(100) | Klasifikasi Bunga |
| `harga` | INT | Nilai Valuasi Jual |
| `stok` | INT | Kuantitas Gudang |
| `gambar` | TEXT | Nama File Foto (Multiple) |
| `tanda_tangan` | LONGTEXT | Base64 Data TTD Digital |

---

## 🚀 Cara Instalasi & Menjalankan

1. **Clone / Salin Proyek** Pindahkan folder proyek `glowflora_skincare` (atau folder florist kamu) ke direktori server lokal Anda:
   * [cite_start]Jika menggunakan **Laragon**: `C:\laragon\www\` [cite: 2]
   * Jika menggunakan **XAMPP**: `C:\xampp\htdocs\`

2. [cite_start]**Impor Database** * Buka browser dan akses `localhost/phpmyadmin`[cite: 2].
   * [cite_start]Buat database baru bernama `glowflora_db`[cite: 2].
   * [cite_start]Impor file `database.sql` ke dalam database tersebut[cite: 2].

3. **Konfigurasi Koneksi** Pastikan file `koneksi.php` sudah disesuaikan dengan kredensial server lokal Anda:
   ```php
   $conn = mysqli_connect("localhost", "root", "", "glowflora_db");