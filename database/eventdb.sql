-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2025 at 04:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_kegiatan`
--

CREATE TABLE `detail_kegiatan` (
  `id_detail_kegiatan` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `sesi` int(11) NOT NULL,
  `nama_sesi` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `narasumber` varchar(150) NOT NULL,
  `biaya_registrasi` decimal(10,2) DEFAULT NULL,
  `maksimal_peserta` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Coming Soon'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_kegiatan`
--

INSERT INTO `detail_kegiatan` (`id_detail_kegiatan`, `id_kegiatan`, `sesi`, `nama_sesi`, `tanggal`, `waktu_mulai`, `waktu_selesai`, `lokasi`, `narasumber`, `biaya_registrasi`, `maksimal_peserta`, `status`) VALUES
(1, 1, 1, 'asd', '2025-10-06', '17:35:00', '22:38:00', 'Cipatik', 'asd', 12000.00, 300, 'Coming Soon'),
(2, 2, 1, 'HUAWEI AI', '2025-10-07', '18:10:00', '20:13:00', 'Auditorium', 'Kaisar Naufal', 0.00, 200, 'Coming Soon'),
(3, 2, 2, 'HUAWEI ADVANCE', '2025-10-08', '18:11:00', '20:11:00', 'Auditorium', 'Kaisar Naufal', 10000.00, 200, 'Coming Soon');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Coming Soon'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `id_user`, `tanggal_mulai`, `tanggal_selesai`, `status`) VALUES
(1, 'ASD', 6, '2025-10-05', '2025-10-21', 'Sedang Berlangsung'),
(2, 'HUAWEI', 6, '2025-10-07', '2025-10-08', 'Coming Soon');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(11) NOT NULL,
  `id_registrasi` int(11) DEFAULT NULL,
  `dipindai_oleh` int(11) DEFAULT NULL,
  `waktu_pindai` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `id_registrasi`, `dipindai_oleh`, `waktu_pindai`, `status`) VALUES
(1, 1, NULL, '2025-10-05 10:59:45', 'Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `registrasikegiatan`
--

CREATE TABLE `registrasikegiatan` (
  `id_registrasi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_detail_kegiatan` int(11) DEFAULT NULL,
  `tanggal_registrasi` datetime DEFAULT NULL,
  `kode_qr` varchar(255) DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status_konfirmasi` varchar(15) DEFAULT 'Pending',
  `keterangan` varchar(900) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrasikegiatan`
--

INSERT INTO `registrasikegiatan` (`id_registrasi`, `id_user`, `id_detail_kegiatan`, `tanggal_registrasi`, `kode_qr`, `bukti_pembayaran`, `status_konfirmasi`, `keterangan`) VALUES
(1, 7, 1, '2025-10-05 10:39:16', 'qr/qr_1.png', 'bukti_pembayaran/1759660756_Proposal Proyek_2372025_2372040_2372051.pdf', 'Disetujui', NULL),
(2, 7, 2, '2025-10-05 11:16:13', 'qr/qr_2.png', 'bukti_pembayaran/1759662973_logo_universitas-kristen-maranatha.png', 'Disetujui', NULL),
(3, 7, 3, '2025-10-05 11:16:13', 'qr/qr_3.png', 'bukti_pembayaran/1759662973_logo_universitas-kristen-maranatha.png', 'Disetujui', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(3, 'Keuangan'),
(2, 'Panitia'),
(4, 'Peserta');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `id_registrasi` int(11) DEFAULT NULL,
  `sertifikat` varchar(255) DEFAULT NULL,
  `diunggah_oleh` int(11) DEFAULT NULL,
  `waktu_unggah` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id_sertifikat`, `id_registrasi`, `sertifikat`, `diunggah_oleh`, `waktu_unggah`) VALUES
(1, 1, 'sertifikat/i2OZCpwAYaSRBQzJDn8yT9UxBU0tR0x0ucOyq1M6.pdf', 6, '2025-10-05 11:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1b70XAEOVRZp4poLWCZj9L1dUvruc3HBvq0GHMVo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:143.0) Gecko/20100101 Firefox/143.0', 'YTo0OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoicktOT05qazN2MkxDSGJQOFE5STFpaGJqZXVGRTV3M3M5T1doT1VGaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2VyL2luZGV4Ijt9czo0OiJ1c2VyIjthOjU6e3M6MjoiaWQiO2k6NTtzOjQ6Im5hbWEiO3M6NToiYWRtaW4iO3M6NToiZW1haWwiO3M6MjE6ImFkbWluQG1hcmFuYXRoYS5hYy5pZCI7czo5OiJuYW1hX3JvbGUiO3M6NToiQWRtaW4iO3M6NzoiaWRfcm9sZSI7aToxO319', 1759678876),
('FVqD6Zxuaoy0jEy8O5CiDwdy8NyKuhvw80Me7Mk7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:143.0) Gecko/20100101 Firefox/143.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibkVyMEFhUURQUmZqd21renQ1MHFiWkpxVlltbmxWQXNQRTZkeFhHayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoidXNlciI7YTo1OntzOjI6ImlkIjtpOjU7czo0OiJuYW1hIjtzOjU6ImFkbWluIjtzOjU6ImVtYWlsIjtzOjIxOiJhZG1pbkBtYXJhbmF0aGEuYWMuaWQiO3M6OToibmFtYV9yb2xlIjtzOjU6IkFkbWluIjtzOjc6ImlkX3JvbGUiO2k6MTt9fQ==', 1759931193),
('gfHJd1ZEChutqZFv5BCXiRUQD7eS9RrsafWZkdHo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNlVBV0xncGVaNXRjRGxIZGpjb3ZKVkM5VGxqNFZBVDJkVlh1bGIycyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1759659129),
('kGC3jMxpd5rgiwr6APoEinXD0QCXzH0UYuu8LDoi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTo0OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiWVl2eWVlUnNXZWJia3ZWdGQydzNVUTAzOTU1bW5kTEFITVdQNEZGciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rZXVhbmdhbi9sYXBvcmFuUGVtYmF5YXJhbiI7fXM6NDoidXNlciI7YTo1OntzOjI6ImlkIjtpOjg7czo0OiJuYW1hIjtzOjc6IkFudGhvbnkiO3M6NToiZW1haWwiO3M6MjQ6IjIxMDAwMDAxQG1hcmFuYXRoYS5hYy5pZCI7czo5OiJuYW1hX3JvbGUiO3M6ODoiS2V1YW5nYW4iO3M6NzoiaWRfcm9sZSI7aTozO319', 1759663014),
('MwL9By9NEf2B47NyOUxokRiXYzFrOPXBeEqKodnl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:143.0) Gecko/20100101 Firefox/143.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieG53T2lQQkc4bk9meUt4OXZrV01pd3FIMkdveGNLYVAyZ01kcmJlSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3Rlcj9lbWFpbD1hc2Rhc2QlNDBnbWFpbC5jb20mbmFtZT1hc2QmcGFzc3dvcmQ9YXNkJnRlcm1zPW9uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1759932104),
('pIrXd6Eg7tzFImkAf4f0LbUpdv0rLlokjTbZJau5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:143.0) Gecko/20100101 Firefox/143.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamtzbnF4YVBvNDN6RmtDOWx5MEZCMHNFYzhFTFdPd3dzMExZckp4SiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3Rlcj9lbWFpbD1DSVBFTkclNDBnbWFpbC5jb20mbmFtZT1DSVBFTkcmcGFzc3dvcmQ9Q0lQRU5HR0dHR0cmdGVybXM9b24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1759934001),
('UZsciTLGBTp4LGGb4QnoUE91bY5RdOux6JKkelul', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:143.0) Gecko/20100101 Firefox/143.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZjg2ZktGbzFtdmwza2RaQnVoMUg2SzZHaEo3RWZEeGF4NHJLMlVkaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1759933561);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `id_role`) VALUES
(5, 'admin', 'admin@maranatha.ac.id', '$2y$12$bCjZT/2bfHFebmTid5HM7.TtFY7lNbzLE28bNFmFas4dAwuIF9nqK', 1),
(6, 'Nara', '31000001@maranatha.ac.id', '$2y$12$Z5tpY6ZD3b3Xzq36rUUWreFmoQhGdrsTZ4Bk0mU.eBm1HdG9VYtNG', 2),
(7, 'Raymond', '2372025@maranatha.ac.id', '$2y$12$achxVig5L8xifK2.Hvcpp.SnlnU4wWB4DUmqxtNxV0Jxw9Y9aUqhy', 4),
(8, 'Anthony', '21000001@maranatha.ac.id', '$2y$12$/uvScgcmtAK1187TkkeXmeHhfPwJ/TkdRtBJbP.p12X4OhxrKy1Yq', 3),
(9, 'Naratama', 'naratama@gmail.com', '$2y$12$KlzMv7C6mIEftThvd6wCHedncL5uz1J.XdAIb87JpH8zsRFa0/9gS', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `detail_kegiatan`
--
ALTER TABLE `detail_kegiatan`
  ADD PRIMARY KEY (`id_detail_kegiatan`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `id_registrasi` (`id_registrasi`),
  ADD KEY `dipindai_oleh` (`dipindai_oleh`);

--
-- Indexes for table `registrasikegiatan`
--
ALTER TABLE `registrasikegiatan`
  ADD PRIMARY KEY (`id_registrasi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_detail_kegiatan` (`id_detail_kegiatan`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`),
  ADD UNIQUE KEY `nama_role` (`nama_role`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`),
  ADD KEY `id_registrasi` (`id_registrasi`),
  ADD KEY `diunggah_oleh` (`diunggah_oleh`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_kegiatan`
--
ALTER TABLE `detail_kegiatan`
  MODIFY `id_detail_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registrasikegiatan`
--
ALTER TABLE `registrasikegiatan`
  MODIFY `id_registrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_kegiatan`
--
ALTER TABLE `detail_kegiatan`
  ADD CONSTRAINT `detail_kegiatan_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`);

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_1` FOREIGN KEY (`id_registrasi`) REFERENCES `registrasikegiatan` (`id_registrasi`),
  ADD CONSTRAINT `presensi_ibfk_2` FOREIGN KEY (`dipindai_oleh`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `registrasikegiatan`
--
ALTER TABLE `registrasikegiatan`
  ADD CONSTRAINT `registrasikegiatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `registrasikegiatan_ibfk_2` FOREIGN KEY (`id_detail_kegiatan`) REFERENCES `detail_kegiatan` (`id_detail_kegiatan`);

--
-- Constraints for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD CONSTRAINT `sertifikat_ibfk_1` FOREIGN KEY (`id_registrasi`) REFERENCES `registrasikegiatan` (`id_registrasi`),
  ADD CONSTRAINT `sertifikat_ibfk_2` FOREIGN KEY (`diunggah_oleh`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
