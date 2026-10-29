# Sistem Informasi Geografis (SIG) Pariwisata Kabupaten Hulu Sungai Selatan (Kandangan)

[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-blue.svg)](https://www.php.net/)
[![Database](https://img.shields.io/badge/MySQL%2FMariaDB-10.x-orange.svg)](https://mariadb.org/)
[![Docker](https://img.shields.io/badge/Docker-Ready-2496ED.svg?logo=docker&logoColor=white)](https://www.docker.com/)
[![Mapbox](https://img.shields.io/badge/Mapbox-GL--JS-black.svg?logo=mapbox&logoColor=white)](https://www.mapbox.com/)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](#)

Aplikasi berbasis web **Sistem Informasi Geografis (SIG) Pariwisata / E-Wisata HSS** yang berfungsi untuk memetakan, mengelola, serta menyajikan informasi seputar objek wisata, penginapan, kuliner khas daerah, dan kontak darurat di Kabupaten Hulu Sungai Selatan (Kandangan), Kalimantan Selatan. 

Aplikasi ini juga bertindak sebagai **server backend & API Provider** yang menyuplai data geografis dan katalog pariwisata ke aplikasi mobile (Android).

---

## 📌 Daftar Isi
- [Fitur Utama](#-fitur-utama)
- [Teknologi yang Digunakan](#-teknologi-yang-digunakan)
- [Struktur Direktori](#-struktur-direktori)
- [Petunjuk Instalasi](#-petunjuk-instalasi)
  - [Opsi 1: Menggunakan Docker Compose (Direkomendasikan)](#opsi-1-menggunakan-docker-compose-direkomendasikan)
  - [Opsi 2: Menggunakan Dockerfile Standalone](#opsi-2-menggunakan-dockerfile-standalone)
  - [Opsi 3: Menggunakan Web Server Lokal (XAMPP / Laragon)](#opsi-3-menggunakan-web-server-lokal-xampp--laragon)
- [Kredensial Default Login](#-kredensial-default-login)
- [Dokumentasi API](#-dokumentasi-api-mobile)
- [Variabel Lingkungan (Environment Variables)](#-variabel-lingkungan-environment-variables)

---

## 🌟 Fitur Utama

- 🗺️ **Peta Interaktif (GIS / Mapbox GL JS)**: Pemetaan titik koordinat lokasi wisata, penginapan, dan rumah makan dengan penanda (marker) interaktif.
- 🏖️ **Manajemen Data Wisata**: CRUD data objek wisata (nama, alamat, deskripsi, harga/tiket masuk, foto, latitude, dan longitude).
- 🏨 **Manajemen Penginapan**: Pencatatan hotel, wisma, atau homestay di wilayah Hulu Sungai Selatan beserta estimasi tarif dan koordinat GPS.
- 🍽️ **Manajemen Kuliner & Rumah Makan**: Informasi lokasi rumah makan khas daerah (seperti Ketupat Kandangan, kuliner lokal, dsb).
- 👥 **Statistik Pengunjung**: Pencatatan dan monitoring pengunjung lokal maupun mancanegara.
- 📞 **Buku Kontak Penting**: Informasi kontak darurat dan instansi penting bagi wisatawan.
- 🖨️ **Cetak Laporan**: Fitur cetak rekapitulasi data tempat wisata, penginapan, rumah makan, dan kunjungan.
- 📱 **REST API Service**: Endpoint JSON siap pakai untuk integrasi dengan aplikasi client mobile (Android).

---

## 🛠️ Teknologi yang Digunakan

- **Backend**: PHP 7.4 (Native Procedural & MySQLi)
- **Database**: MySQL / MariaDB
- **Frontend / UI**: Bootstrap 3 (Arise Admin Theme), jQuery, DataTables, Alertify.js, Icomoon Icons
- **Peta Digital**: Mapbox GL JS API
- **Containerization**: Docker & Docker Compose

---

## 📁 Struktur Direktori

```text
Informasi-Wisata-Kandangan/
├── admin/                  # Modul dashboard admin (wisata, penginapan, rmakan, maps, laporan)
│   ├── kontak/             # CRUD data kontak penting
│   ├── laporan/            # Halaman cetak laporan rekapitulasi
│   ├── maps/               # Antarmuka GIS & mapping koordinat
│   ├── penginapan/         # CRUD penginapan
│   ├── pengunjung/         # CRUD data pengunjung
│   ├── rmakan/             # CRUD rumah makan / kuliner
│   └── wisata/             # CRUD objek wisata
├── api/                    # Endpoint REST API untuk aplikasi Android
│   ├── apiload.php         # Handler request JSON (getdata, getpenginapan, dsb)
│   └── config.php          # Konfigurasi koneksi API
├── assets/                 # Aset statis (CSS, JS, fonts, icon)
├── config/                 # Pengaturan global dan koneksi database
│   ├── config.php          # Base URL & session handler
│   ├── database.php        # Konfigurasi host, user, dan password DB (dukung ENV)
│   ├── db.php              # Inisialisasi koneksi MySQLi
│   └── sigkdg (4).sql      # File skema dan dump database MySQL awal
├── img/                    # Penyimpanan foto upload objek wisata, kuliner & penginapan
├── laporan/                # File template laporan cetak
├── Dockerfile              # Konfigurasi build image Docker Apache + PHP 7.4
├── docker-compose.yml      # Orchestration container Web + Database MariaDB
├── header.php              # Template header aplikasi admin
├── footer.php              # Template footer aplikasi admin
├── login.php               # Halaman masuk sistem
└── logout.php              # Handler keluar sistem
```

---

## 🚀 Petunjuk Instalasi

Pilih salah satu metode instalasi berikut sesuai kebutuhan Anda:

### Opsi 1: Menggunakan Docker Compose (Direkomendasikan)

Metode ini otomatis menyiapkan container PHP-Apache dan MariaDB serta meng-import database awal secara instan.

1. **Jalankan container**:
   ```bash
   docker compose up -d --build
   ```
2. **Akses aplikasi melalui browser**:
   - Web App: [http://localhost:8080/sigkdg](http://localhost:8080/sigkdg) atau [http://localhost:8080](http://localhost:8080)
   - Port MySQL dibuka di `3307` jika ingin diakses melalui GUI database (DBeaver/Navicat).
3. **Menghentikan container**:
   ```bash
   docker compose down
   ```

---

### Opsi 2: Menggunakan Dockerfile Standalone

Jika Anda sudah memiliki database MySQL/MariaDB yang sedang berjalan:

1. **Build Docker image**:
   ```bash
   docker build -t ewisata-kandangan .
   ```
2. **Jalankan container**:
   ```bash
   docker run -d -p 8080:80 \
     -e DB_HOST=host.docker.internal \
     -e DB_USER=root \
     -e DB_PASS=password_anda \
     -e DB_NAME=sigkdg \
     -e BASE_URL=http://localhost:8080/sigkdg \
     --name ewisata_app ewisata-kandangan
   ```

---

### Opsi 3: Menggunakan Web Server Lokal (XAMPP / Laragon)

1. Pastikan Anda sudah menginstal **XAMPP / Laragon** dengan versi PHP minimal **7.2 - 7.4**.
2. Gandakan atau pindahkan folder proyek ini ke dalam direktori web server:
   - XAMPP: `C:/xampp/htdocs/sigkdg`
   - Laragon: `C:/laragon/www/sigkdg`
3. Buka **phpMyAdmin** (`http://localhost/phpmyadmin`), buat database baru bernama:
   ```sql
   sigkdg
   ```
4. Import file SQL yang berada di:
   ```text
   config/sigkdg (4).sql
   ```
5. Buka browser dan kunjungi:
   [http://localhost/sigkdg](http://localhost/sigkdg)

---

## 🔑 Kredensial Default Login

Untuk masuk ke Panel Administrasi:

| Parameter | Kredensial |
| :--- | :--- |
| **URL Login** | `/login.php` |
| **Username** | `admin` |
| **Password** | `admin` |

---

## 📱 Dokumentasi API (Mobile)

Backend menyediakan API berbasis format JSON untuk konsumsi aplikasi mobile Android:

- **Endpoint**: `POST /api/apiload.php`
- **Headers**: `Content-Type: application/json`

### Contoh Request (Payload JSON):

**1. Mengambil Daftar Objek Wisata:**
```json
{
  "aksi": "getdata"
}
```

**2. Mengambil Daftar Penginapan:**
```json
{
  "aksi": "getpenginapan"
}
```

**3. Mengambil Daftar Rumah Makan:**
```json
{
  "aksi": "getrmakan"
}
```

**4. Mengambil Daftar Kontak Penting:**
```json
{
  "aksi": "getkontak"
}
```

---

## ⚙️ Variabel Lingkungan (Environment Variables)

Aplikasi mendukung konfigurasi via environment variable:

| Variabel | Default | Keterangan |
| :--- | :--- | :--- |
| `DB_HOST` | `localhost` | Hostname / IP database server |
| `DB_USER` | `root` | Username database |
| `DB_PASS` | ` ` (kosong) | Password database |
| `DB_NAME` | `sigkdg` | Nama database MySQL |
| `BASE_URL` | `http://localhost/sigkdg` | URL dasar untuk routing dan assets web |

---

## 👨‍💻 Kontributor & Pengembangan

Aplikasi ini dikembangkan sebagai prototipe Sistem Informasi Geografis pariwisata di Kabupaten Hulu Sungai Selatan (Kandangan) untuk mempermudah wisatawan menemukan destinasi menarik, fasilitas akomodasi, dan kuliner khas daerah.
