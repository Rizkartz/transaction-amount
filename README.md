# Expense Tracker

Aplikasi pencatatan keuangan sederhana berbasis Web yang dibuat untuk membantu mencatat pemasukan dan pengeluaran sehari-hari. Data transaksi disimpan ke database MySQL dan ditampilkan kembali secara real-time melalui API PHP.

## Fitur

* Menambahkan transaksi pemasukan (Income)
* Menambahkan transaksi pengeluaran (Expense)
* Menyimpan data ke database MySQL
* Menampilkan riwayat transaksi
* Menampilkan tanggal transaksi otomatis
* Antarmuka sederhana menggunakan Tailwind CSS
* Komunikasi data menggunakan Fetch API

## Teknologi yang Digunakan

### Frontend

* HTML5
* Tailwind CSS
* Vanilla JavaScript

### Backend

* PHP

### Database

* MySQL

### Development Environment

* Laragon
* HeidiSQL

## Struktur Proyek

```text
expense-tracker/
│
├── index.html
├── app.js
├── api.php
├── README.md
│
└── database
    └── expense_tracker.sql
```

## Struktur Database

Database:

```sql
expense_tracker
```

Tabel:

```sql
transactions
```

Struktur tabel:

```sql
CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transaction_type ENUM('income', 'expense') NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    category VARCHAR(50),
    description TEXT,
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## Cara Menjalankan Proyek

1. Install Laragon.
2. Jalankan Apache dan MySQL.
3. Buat database baru dengan nama:

```sql
expense_tracker
```

4. Buat tabel `transactions` sesuai struktur database di atas.
5. Letakkan folder proyek di dalam direktori:

```text
laragon/www/
```

6. Buka browser dan akses:

```text
http://localhost/nama-folder-proyek/
```

## API Endpoint

### GET

Mengambil seluruh data transaksi.

```http
GET /api.php
```

Response:

```json
[
  {
    "id": 1,
    "transaction_type": "income",
    "amount": "10000.00",
    "category": "Jajan",
    "description": "",
    "transaction_date": "2026-06-22 14:59:48"
  }
]
```

### POST

Menambahkan transaksi baru.

Parameter:

```text
type
amount
category
description
```

Contoh:

```http
POST /api.php
```

## Roadmap Pengembangan

Fitur yang direncanakan untuk versi berikutnya:

* Edit transaksi
* Hapus transaksi
* Dashboard saldo
* Total pemasukan dan pengeluaran
* Filter transaksi berdasarkan kategori
* Grafik statistik menggunakan Chart.js
* Budget bulanan
* Multi-dompet (Cash, Dana, GoPay, Bank)
* Analisis pengeluaran otomatis

## Tujuan Proyek

Proyek ini dibuat sebagai sarana belajar Full Stack Web Development dengan menggabungkan Frontend, Backend, Database, dan API dalam satu aplikasi sederhana yang dapat digunakan untuk kebutuhan sehari-hari.
