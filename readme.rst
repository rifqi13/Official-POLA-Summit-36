###################################################################
36th POLA Summit 2026 — Presidents of Law Associations in Asia
###################################################################

Aplikasi portal web resmi untuk konferensi internasional **36th POLA Summit 2026** yang diselenggarakan oleh **PERADI** (Perhimpunan Advokat Indonesia) di Jakarta, Indonesia[cite: 1]. 

Sistem ini digunakan untuk menyajikan informasi acara, pendaftaran peserta, materi konferensi, panduan akomodasi/transportasi, hingga galeri dokumentasi kegiatan[cite: 1].

*******************
Informasi Konferensi
*******************

- **Nama Acara**: 36th Presidents of Law Associations in Asia (POLA) Summit 2026[cite: 1]
- **Tema**: *"Criminal Law in Transition: Indonesia's New Code and Global Perspectives"*[cite: 1]
- **Tanggal**: 6 – 8 September 2026[cite: 1]
- **Lokasi**: Jakarta, Indonesia[cite: 1]
- **Penyelenggara**: DPN PERADI[cite: 1]

*******************
Fitur Utama Portal
*******************

1. **Beranda & Landing Page**: Informasi umum mengenai konferensi, tema utama, dan jadwal pelaksanaan[cite: 1].
2. **Sistem Pendaftaran (Registration)**: Formulir registrasi online untuk para delegasi dan peserta konferensi[cite: 1].
3. **Materi & Program Konferensi (Materials & Program)**: Akses berkas materi presentasi, jadwal sesi, dan profil pembicara[cite: 1].
4. **Panduan Akomodasi & Transportasi**: Informasi rekomendasi hotel/penginapan, rute transportasi, dan opsi perjalanan di Jakarta[cite: 1].
5. **Daya Tarik Wisata (Tourist Attractions)**: Rekomendasi destinasi wisata dan budaya lokal di Jakarta untuk delegasi internasional[cite: 1].
6. **Layanan Darurat (Emergency Call)**: Kontak penting dan nomor darurat bagi delegasi selama acara berlangsung[cite: 1].
7. **Dokumentasi & Galeri Album**: Galeri foto dan video rangkaian kegiatan selama summit[cite: 1].

*******************
Teknologi & Modul
*******************

- **Framework**: CodeIgniter 3
- **Frontend**: Bootstrap, HTML5, CSS3, JavaScript / jQuery
- **Database**: MySQL / MariaDB
- **Layanan Email**: SMTP PHPMailer (untuk konfirmasi registrasi)

*******************
Persyaratan Server
*******************

- Web Server: Apache / Nginx (dengan modul ``mod_rewrite`` aktif)
- PHP: Version 7.4 / 8.0 / 8.1+
- Database: MySQL 5.7+ / MariaDB
- Ekstensi PHP Wajib: ``mysqli``, ``curl``, ``json``, ``mbstring``, ``gd``

************
Cara Instalasi
************

1. Kloning repositori ini ke direktori web server Anda:
   .. code-block:: bash

      git clone https://github.com/username/pola-summit-36.git

2. Buat database baru di MySQL (contoh: ``polasummit36_db``) dan import file skema database (``.sql``).
3. Konfigurasikan koneksi database dan `base_url` pada file konfigurasi aplikasi.
4. Pastikan folder ``uploads/`` memiliki izin akses tulis (*write permissions*).
5. Buka peramban (browser) dan akses URL projek Anda.

*******
Lisensi
*******

Hak Cipta (c) 2026 PERADI - POLA Summit Indonesia. All Rights Reserved[cite: 1].
