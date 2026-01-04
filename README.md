# Aplikasi Manajemen Seminar Universitas Kristen Maranatha

Anggota Kelompok:
1. 2372025 - Raymond Rafael Anthony
2. 2372040 - Kaisar Naufal Naratama
3. 2372051 - Muhammad Syehan Alwafa

## Deskripsi Proyek

Aplikasi Manajemen Seminar Universitas Kristen Maranatha adalah sistem informasi berbasis web yang dikembangkan untuk mendukung proses administrasi dan pelaksanaan kegiatan seminar di lingkungan Universitas Kristen Maranatha. Selama ini, proses manajemen seminar seperti publikasi acara, pendaftaran peserta, validasi kehadiran, hingga pembuatan sertifikat masih dilakukan secara terpisah dan sering kali manual, sehingga menimbulkan berbagai kendala seperti keterlambatan informasi, data peserta yang tidak terpusat, risiko human error, dan proses presensi yang kurang efisien.

Proyek ini bertujuan untuk menyediakan sebuah platform terintegrasi yang mampu mengelola seluruh tahapan kegiatan seminar secara digital. Sistem ini memungkinkan panitia untuk membuat dan mempublikasikan seminar, mengelola kuota peserta, memantau registrasi, serta melakukan verifikasi kehadiran melalui QR Code. Selain itu, peserta dapat melakukan pendaftaran secara mandiri, melihat riwayat seminar yang diikuti, serta mengunduh sertifikat yang dihasilkan secara otomatis oleh sistem.

Dengan adanya sistem ini, diharapkan proses penyelenggaraan seminar di Universitas Kristen Maranatha menjadi lebih efektif, transparan, dan terdokumentasi dengan baik.

------------------------------------------------------------------------

## Proses Bisnis

### 1. Peserta

1.  Daftar akun
2.  Login
3.  Melihat daftar seminar
4.  Daftar seminar
5.  Melakukan pembayaran (jika berbayar)
6.  Mengunggah bukti pembayaran
7.  Mengikuti seminar
8.  Absen menggunakan QR Code
9.  Menerima sertifikat

### 2. Admin

1.  Login
2.  Mengelola data user (Panitia, Tim Keuangan, Peserta)

### 3. Panitia

1.  Login
2.  Membuat seminar
3.  Membuat sesi seminar
4.  Melakukan scan QR Code untuk presensi
5.  Mengirim sertifikat ke peserta

### 4. Tim Keuangan

1.  Login
2.  Melihat bukti pembayaran
3.  Menerima atau menolak bukti pembayaran
4.  Memberikan status pembayaran kepada peserta

------------------------------------------------------------------------

## User Roles

-   **Admin**
-   **Panitia**
-   **Tim Keuangan**
-   **Peserta**

------------------------------------------------------------------------

## Tools yang Digunakan

  Tools         Fungsi
  ------------- ---------------------------------
  **Laravel**   Framework utama aplikasi
  **iMagick**   Generate QR Code untuk presensi
  **MySQL**     Penyimpanan data
  **Laragon**   Lingkungan server lokal
