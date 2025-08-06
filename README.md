<img width="1891" height="850" alt="image" src="https://github.com/user-attachments/assets/bf3f90e4-023c-4c95-b775-45b062592ae4" /># Point of Sales (POS) System - Laravel
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

A simple Point of Sales (POS) system built with Laravel, featuring cashier management, product catalog, transaction records, and API endpoints.

![Laravel Version](https://img.shields.io/badge/Laravel-10%2B-orange?style=flat-square)
![PHP Version](https://img.shields.io/badge/PHP-8.1%2B-blue?style=flat-square)

## System Requirements
To run this project, ensure your server meets the following:
- **PHP**: 8.2 or higher
- **Laravel**: 11 / 12
- **Database**: MySQL 5.7+ / MariaDB 10.3+ / SQLite
- **Composer**: 2.0+

## Features
- **Cashier Module**: Process sales transactions.
- **Product Management**: Add/edit/delete products.
- **Transaction History**: View all transactions with details.
- **API Endpoints**:
  - `POST /api/products`: Add new products.
  - `GET /api/products`: Retrieve product data.

## Database Structure
### Tables
1. **Barang** (Products):
   - `id` (int, auto-increment)
   - `Kode_Barang` (varchar)
   - `Nama_Barang` (varchar)
   - `Harga` (int)

2. **Transaksi** (Transactions):
   - `ID` (int, auto-increment)
   - `Tanggal` (datetime)
   - `Total_Barang` (int)
   - `Total_Harga` (int)

3. **Detail_Transaksi** (Transaction Details):
   - `ID` (int, auto-increment)
   - `ID_Transaksi` (int, foreign key)
   - `ID_Barang` (int, foreign key)
   - `Harga` (int)
   - `Jumlah` (int)

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/PannXXX06/Kaseer-1.git
   cd Kaseer-1
2. Install dependencies php & dependencies JavaScript :
    ```bash
    composer install
    npm install
3. Run Npm:
    ```bash
    npm run build
    
Or for development with hot-reload:
    ```bash
    npm run dev
    
4. Configure environment:
    Copy .env.example to .env and update database settings:
    DB_DATABASE=your_database_name 
    DB_USERNAME=your_db_username
    DB_PASSWORD=your_db_password
   
5.  Generate key and migrate:
    ```bash
    php artisan key:generate
    php artisan migrate --seed

6. Serve the application:
    ```bash
    php artisan serve
Access via: http://localhost:8000

## Screenshots

### 1. Cashier Interface
[![Cashier Module](blob:https://id.pinterest.com/1cc15c4f-46c3-44df-b88e-cff0866f2fc2)](blob:https://id.pinterest.com/1cc15c4f-46c3-44df-b88e-cff0866f2fc2)  
*Real-time transaction processing*

### 2. Product Management
[![Product List](https://i.imgur.com/EXAMPLE3.jpg)](https://i.imgur.com/EXAMPLE3.jpg)  
*Complete CRUD operations*

### 3. Transaction History
[![Product List](blob:https://id.pinterest.com/df13ed94-5ceb-435e-9db2-4cae33283802)](blob:https://id.pinterest.com/df13ed94-5ceb-435e-9db2-4cae33283802)  



