Link Demo Website : ...

# DMS PUTI

Ini merupakan panduan untuk melakukan instalasi dan konfigurasi DMS PUTI pada local machine anda

## Prerequisites

Before you begin, make sure you have the following installed on your system:

- PHP (version 8.0 or higher)
- Composer (version 2.0 or higher)
- MySQL (version 5.7 or higher)
- Node.js (version 14 or higher)
- npm (version 6 or higher)

## Installation

1. Clone repository ini:

    ```bash
    git clone https://github.com/wildanardian/dms-puti.git
    ```

2. Navigasi ke direktori tempat anda clone repository ini:

    ```bash
    cd dms-puti
    ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Buat salinan dari `.env.example` file dan ganti namanya menjadi `.env`:

    ```bash
    cp .env.example .env
    ```

5. Generate sebuah application key:

    ```bash
    php artisan key:generate
    ```

6. Konfigurasi koneksi database di dalam `.env` file:

    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name [default: dms-puti]
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```
7. Buat database baru di phpMyAdmin:

   ```bash
    Import :
   1. Buka phpMyAdmin anda
   2. Klik new pada database
   3. Buat database dengan nama dms-puti
    ```

8. Jalankan migrasi database sekaligus dengan data seed dummy yang dibutuhkan:

    ```bash
    php artisan migrate --seed
    ```

9. Install JavaScript dependencies:

    ```bash
    npm install
    ```

10. Build the assets:

    ```bash
    npm run dev
    ```

11. Mulai development server:

     ```bash
     php artisan serve
     ```

11. Buka web browser anda dan kunjungi `http://localhost:8000` untuk melihat aplikasi.

