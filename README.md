```python?code_reference&code_event_index=5
# Fixed the raw string windows backslash issue by using a normal string without direct backslash escape triggers.

readme_content = """# 🌸 GlowFlora Skincare - Admin Management System

<p align="center">
  <img src="https://img.shields.io/badge/Theme-Soft%20Pink-ffb6c1?style=for-the-badge" alt="Theme Soft Pink">
  <img src="https://img.shields.io/badge/Framework-Bootstrap%205-7952b3?style=for-the-badge" alt="Bootstrap 5">
  <img src="https://img.shields.io/badge/Database-MySQL-4479a1?style=for-the-badge" alt="MySQL">
</p>

---

## 📌 Deskripsi Proyek
**GlowFlora Skincare Hub** adalah sistem manajemen informasi internal berbasis web yang dirancang khusus untuk pencatatan manajemen stok produk kecantikan dan kosmetik. Aplikasi ini mempermudah pengelolaan data varian skincare, pemantauan batas aman kuantitas gudang, integrasi media promosi video, hingga penandatanganan log manifest penerimaan secara digital.

---

## ✨ Fitur Utama
Aplikasi ini mengimplementasikan berbagai fitur interaktif modern:
1. **Sistem Autentikasi Admin**: Pembatasan akses halaman dashboard utama menggunakan form login dengan enkripsi kata sandi berbasis keamanan MD5.
2. **Form Tambah Produk (Multiple Files)**: Antarmuka penginputan nama produk kecantikan, harga, stok, deskripsi formula kandungan, serta dukungan unggah banyak file foto sekaligus.
3. **HTML5 Video Player**: Embed video promosi rangkaian rutinitas produk (skincare routine) langsung di panel dashboard.
4. **Datatable Stok Skincare**: Penyajian tabel responsif dengan pemformatan mata uang Rupiah (Rp) serta penanda otomatis untuk status kuantitas (Ready, Stok Kritis, atau Habis Total).
5. **Fitur Cari & Filter (MySQL Query)**: Mempermudah pencarian cepat varian skincare tertentu melalui pencarian kata kunci nama maupun deskripsi produk.
6. **Modal Detail Dinamis**: Menampilkan data sekunder tersemat dan rincian lengkap berkas foto produk menggunakan Bootstrap Modal tanpa reload halamannya.
7. **Canvas TTD Digital (Signature Pad)**: Fitur tanda tangan digital berbasis HTML5 Canvas untuk validasi log penerimaan barang oleh kurir atau admin.
8. **Export ke CSV**: Ekstraksi seluruh rekapitulasi data produk dari database langsung ke format Microsoft Excel / CSV secara instan.

---

## 🛠️ Spesifikasi Teknologi
* **Frontend**: HTML5, CSS3, JavaScript (ES6), Bootstrap 5, FontAwesome 6 Icons
* **Backend**: PHP (Versi 8+)
* **Database**: MySQL / phpMyAdmin
* **Server Lokal**: Laragon / XAMPP

---

## 🗂️ Struktur Database (`produk`)
Struktur tabel database `produk` yang berjalan di dalam `glowflora_db`:

| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| `id` | INT (AI, PK) | ID Unik Register Produk |
| `nama` | VARCHAR(255) | Nama Varian Skincare |
| `harga` | INT | Harga Jual Produk |
| `stok` | INT | Kuantitas Stok di Gudang |
| `deskripsi` | TEXT | Detail Formula / Kandungan |
| `gambar` | TEXT | Nama File Foto Produk (Multiple) |
| `tanda_tangan` | LONGTEXT | String Base64 Data Gambar TTD Digital |

---

## 🚀 Cara Instalasi & Menjalankan

1. **Salin Folder Proyek** Pindahkan folder proyek `glowflora_skincare` ke direktori server lokal Anda:
   * Jika menggunakan **Laragon**: `C:/laragon/www/`
   * Jika menggunakan **XAMPP**: `C:/xampp/htdocs/`

2. **Impor Database** * Akses `localhost/phpmyadmin` di browser Anda.
   * Buat database baru dengan nama `glowflora_db`.
   * Pilih menu **Import**, lalu unggah file `database.sql` yang ada di folder proyek.

3. **Konfigurasi Koneksi** Pastikan konfigurasi pada file `koneksi.php` sudah sesuai dengan server lokal:
   ```php
   $conn = mysqli_connect("localhost", "root", "", "glowflora_db");
   $conn = mysqli_connect("localhost", "root", "", "glowflora_db");
