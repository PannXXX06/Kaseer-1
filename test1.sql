-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2025 pada 18.44
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `kode_barang`, `nama_barang`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'BRG-001', 'Laptop ASUS X441UA', 6500000, '2025-08-05 01:08:17', '2025-08-05 01:08:17'),
(2, 'BRG-002', 'Mouse Wireless Logitech M220', 175000, '2025-08-05 01:08:17', '2025-08-05 01:08:17'),
(3, 'BRG-003', 'Keyboard Mechanical Fantech', 350000, '2025-08-05 01:08:17', '2025-08-05 01:08:17'),
(4, 'BRG-004', 'Monitor LG 24 Inch', 1800000, '2025-08-05 01:08:17', '2025-08-05 01:08:17'),
(5, 'BRG-005', 'Flashdisk Sandisk 32GB', 85000, '2025-08-05 01:08:17', '2025-08-05 01:08:17'),
(6, 'BRG-006', 'Harddisk External 1TB', 750000, '2025-08-05 01:08:17', '2025-08-05 01:08:17'),
(7, 'BRG-007', 'Webcam Logitech C920', 950000, '2025-08-05 01:08:17', '2025-08-05 01:08:17'),
(8, 'BRG-008', 'Headset Gaming Rexus', 250000, '2025-08-05 01:08:17', '2025-08-05 01:08:17'),
(9, 'BRG-009', 'Mousepad SteelSeries QcK', 150000, '2025-08-05 01:08:17', '2025-08-05 01:08:17'),
(10, 'BRG-010', 'Router TP-Link Archer C6', 450000, '2025-08-05 01:08:17', '2025-08-05 01:08:17'),
(11, 'BB5', 'kocak', 345, '2025-08-05 01:09:54', '2025-08-05 01:09:54'),
(12, 'QAA-999', 'kue', 445000, '2025-08-05 01:30:17', '2025-08-05 08:35:08'),
(13, 'GOOO', 'kue', 445000, '2025-08-05 01:30:24', '2025-08-05 01:30:24'),
(14, 'Se234', 'kocak', 78000, '2025-08-05 02:58:14', '2025-08-05 02:58:14'),
(15, 'ABB-70', 'Headphone', 70000, '2025-08-05 08:09:26', '2025-08-05 08:09:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksis`
--

CREATE TABLE `detail_transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_transaksis`
--

INSERT INTO `detail_transaksis` (`id`, `transaksi_id`, `barang_id`, `harga`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 85000, 2, '2025-08-05 01:08:18', '2025-08-05 01:08:18'),
(2, 1, 6, 750000, 2, '2025-08-05 01:08:18', '2025-08-05 01:08:18'),
(3, 1, 4, 1800000, 3, '2025-08-05 01:08:18', '2025-08-05 01:08:18'),
(4, 1, 8, 250000, 1, '2025-08-05 01:08:18', '2025-08-05 01:08:18'),
(5, 1, 9, 150000, 3, '2025-08-05 01:08:18', '2025-08-05 01:08:18'),
(6, 2, 9, 150000, 3, '2025-08-05 01:08:18', '2025-08-05 01:08:18'),
(7, 2, 5, 85000, 2, '2025-08-05 01:08:18', '2025-08-05 01:08:18'),
(8, 2, 7, 950000, 2, '2025-08-05 01:08:18', '2025-08-05 01:08:18'),
(9, 2, 6, 750000, 2, '2025-08-05 01:08:18', '2025-08-05 01:08:18'),
(10, 3, 3, 350000, 3, '2025-08-05 01:08:18', '2025-08-05 01:08:18'),
(11, 3, 6, 750000, 1, '2025-08-05 01:08:18', '2025-08-05 01:08:18'),
(12, 3, 5, 85000, 3, '2025-08-05 01:08:18', '2025-08-05 01:08:18'),
(13, 3, 10, 450000, 1, '2025-08-05 01:08:18', '2025-08-05 01:08:18'),
(14, 3, 1, 6500000, 2, '2025-08-05 01:08:18', '2025-08-05 01:08:18'),
(15, 4, 5, 85000, 2, '2025-08-05 01:08:18', '2025-08-05 01:08:18'),
(16, 4, 10, 450000, 1, '2025-08-05 01:08:19', '2025-08-05 01:08:19'),
(17, 5, 8, 250000, 3, '2025-08-05 01:08:19', '2025-08-05 01:08:19'),
(18, 6, 10, 450000, 2, '2025-08-05 01:08:19', '2025-08-05 01:08:19'),
(19, 6, 1, 6500000, 1, '2025-08-05 01:08:19', '2025-08-05 01:08:19'),
(20, 6, 9, 150000, 2, '2025-08-05 01:08:19', '2025-08-05 01:08:19'),
(21, 6, 2, 175000, 1, '2025-08-05 01:08:19', '2025-08-05 01:08:19'),
(22, 6, 7, 950000, 2, '2025-08-05 01:08:19', '2025-08-05 01:08:19'),
(23, 7, 9, 150000, 3, '2025-08-05 01:08:19', '2025-08-05 01:08:19'),
(24, 7, 5, 85000, 1, '2025-08-05 01:08:19', '2025-08-05 01:08:19'),
(25, 7, 1, 6500000, 3, '2025-08-05 01:08:19', '2025-08-05 01:08:19'),
(26, 8, 5, 85000, 2, '2025-08-05 01:08:19', '2025-08-05 01:08:19'),
(27, 8, 1, 6500000, 2, '2025-08-05 01:08:19', '2025-08-05 01:08:19'),
(28, 8, 8, 250000, 1, '2025-08-05 01:08:19', '2025-08-05 01:08:19'),
(29, 9, 2, 175000, 2, '2025-08-05 01:08:19', '2025-08-05 01:08:19'),
(30, 10, 9, 150000, 3, '2025-08-05 01:08:19', '2025-08-05 01:08:19'),
(31, 11, 1, 6500000, 1, '2025-08-05 01:08:27', '2025-08-05 01:08:27'),
(32, 12, 2, 6500000, 1, '2025-08-05 01:09:42', '2025-08-05 01:09:42'),
(33, 13, 12, 6500000, 1, '2025-08-05 01:30:49', '2025-08-05 01:30:49'),
(34, 13, 13, 175000, 1, '2025-08-05 01:30:49', '2025-08-05 01:30:49'),
(35, 14, 1, 6500000, 1, '2025-08-05 01:38:14', '2025-08-05 01:38:14'),
(36, 15, 1, 6500000, 1, '2025-08-05 01:46:48', '2025-08-05 01:46:48'),
(37, 15, 2, 175000, 1, '2025-08-05 01:46:48', '2025-08-05 01:46:48'),
(38, 16, 12, 6500000, 1, '2025-08-05 01:48:09', '2025-08-05 01:48:09'),
(39, 17, 1, 6500000, 1, '2025-08-05 01:49:06', '2025-08-05 01:49:06'),
(40, 18, 14, 6500000, 1, '2025-08-05 02:58:46', '2025-08-05 02:58:46'),
(41, 19, 14, 6500000, 1, '2025-08-05 03:00:34', '2025-08-05 03:00:34'),
(42, 20, 1, 6500000, 1, '2025-08-05 06:53:40', '2025-08-05 06:53:40'),
(43, 21, 13, 445000, 1, '2025-08-05 06:57:35', '2025-08-05 06:57:35'),
(44, 21, 14, 78000, 1, '2025-08-05 06:57:35', '2025-08-05 06:57:35'),
(45, 22, 12, 445000, 1, '2025-08-05 07:07:11', '2025-08-05 07:07:11'),
(46, 23, 1, 6500000, 9, '2025-08-05 07:36:21', '2025-08-05 07:36:21'),
(47, 24, 2, 175000, 1, '2025-08-05 08:02:53', '2025-08-05 08:02:53'),
(48, 25, 5, 85000, 1, '2025-08-05 08:18:34', '2025-08-05 08:18:34'),
(49, 26, 5, 85000, 1, '2025-08-05 08:18:36', '2025-08-05 08:18:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_04_195406_create_barangs_table', 1),
(5, '2025_08_04_213552_create_transaksis_table', 1),
(6, '2025_08_04_213628_create_detail_transaksis_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('NxkRqAZvEewodvKQU7gTuK4H0P0g8KJWXg4wOKUx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTVQ4ODR0U2pBeldTRE9IQjRxM3RITnhWcjk0UDBTMUcxcXFVVW55YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rYXNpciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1754411824);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL,
  `total_barang` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id`, `tanggal`, `total_barang`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, '2025-07-26 00:39:22', 11, 7770000, '2025-08-05 01:08:18', '2025-08-05 01:08:18'),
(2, '2025-07-29 22:06:16', 9, 4020000, '2025-08-05 01:08:18', '2025-08-05 01:08:18'),
(3, '2025-07-09 09:51:23', 10, 15505000, '2025-08-05 01:08:18', '2025-08-05 01:08:18'),
(4, '2025-07-08 17:48:28', 3, 620000, '2025-08-05 01:08:18', '2025-08-05 01:08:19'),
(5, '2025-08-02 21:21:05', 3, 750000, '2025-08-05 01:08:18', '2025-08-05 01:08:19'),
(6, '2025-08-04 14:05:29', 8, 9775000, '2025-08-05 01:08:18', '2025-08-05 01:08:19'),
(7, '2025-07-16 16:00:44', 7, 20035000, '2025-08-05 01:08:18', '2025-08-05 01:08:19'),
(8, '2025-07-24 19:30:38', 5, 13420000, '2025-08-05 01:08:18', '2025-08-05 01:08:19'),
(9, '2025-07-30 04:48:21', 2, 350000, '2025-08-05 01:08:18', '2025-08-05 01:08:19'),
(10, '2025-07-21 21:49:46', 3, 450000, '2025-08-05 01:08:18', '2025-08-05 01:08:19'),
(11, '2025-08-05 08:08:27', 10, 11460000, '2025-08-05 01:08:27', '2025-08-05 01:08:27'),
(12, '2025-08-05 08:09:42', 12, 11810000, '2025-08-05 01:09:42', '2025-08-05 01:09:42'),
(13, '2025-08-05 08:30:49', 16, 13685345, '2025-08-05 01:30:49', '2025-08-05 01:30:49'),
(14, '2025-08-05 08:38:14', 13, 12350345, '2025-08-05 01:38:14', '2025-08-05 01:38:14'),
(15, '2025-08-05 08:46:48', 13, 12350345, '2025-08-05 01:46:48', '2025-08-05 01:46:48'),
(16, '2025-08-05 08:48:09', 16, 13685345, '2025-08-05 01:48:09', '2025-08-05 01:48:09'),
(17, '2025-08-05 08:49:06', 13, 12350345, '2025-08-05 01:49:06', '2025-08-05 01:49:06'),
(18, '2025-08-05 09:58:46', 21, 12974345, '2025-08-05 02:58:46', '2025-08-05 02:58:46'),
(19, '2025-08-05 10:00:34', 14, 12428345, '2025-08-05 03:00:34', '2025-08-05 03:00:34'),
(20, '2025-08-05 13:53:40', 1, 6500000, '2025-08-05 06:53:40', '2025-08-05 06:53:40'),
(21, '2025-08-05 13:57:35', 2, 523000, '2025-08-05 06:57:35', '2025-08-05 06:57:35'),
(22, '2025-08-05 14:07:11', 1, 445000, '2025-08-05 07:07:11', '2025-08-05 07:07:11'),
(23, '2025-08-05 14:36:21', 9, 58500000, '2025-08-05 07:36:21', '2025-08-05 07:36:21'),
(24, '2025-08-05 15:02:53', 1, 175000, '2025-08-05 08:02:53', '2025-08-05 08:02:53'),
(25, '2025-08-05 15:18:34', 1, 85000, '2025-08-05 08:18:34', '2025-08-05 08:18:34'),
(26, '2025-08-05 15:18:36', 1, 85000, '2025-08-05 08:18:36', '2025-08-05 08:18:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transaksis_transaksi_id_foreign` (`transaksi_id`),
  ADD KEY `detail_transaksis_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  ADD CONSTRAINT `detail_transaksis_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`),
  ADD CONSTRAINT `detail_transaksis_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksis` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
