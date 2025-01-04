-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 04:07 PM
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
-- Database: `permission`
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
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `groupby` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `name`, `slug`, `groupby`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'Dashboard', 0, '2024-12-01 21:37:09', '2024-12-01 21:37:09'),
(2, 'User', 'User', 1, '2024-12-01 21:38:06', '2024-12-01 21:38:06'),
(3, 'Add User', 'Add User', 1, '2024-12-01 21:39:57', '2024-12-01 21:39:57'),
(4, 'Edit User', 'Edit User', 1, '2024-12-01 21:40:23', '2024-12-01 21:40:23'),
(5, 'Delete User', 'Delete User', 1, '2024-12-01 21:41:02', '2024-12-01 21:41:02'),
(6, 'Role', 'Role', 2, '2024-12-01 21:44:41', '2024-12-01 21:44:41'),
(7, 'Add Role', 'Add Role', 2, '2024-12-01 21:44:41', '2024-12-01 21:44:41'),
(8, 'Edit Role', 'Edit Role', 2, '2024-12-01 21:44:41', '2024-12-01 21:44:41'),
(9, 'Delete Role', 'Delete Role', 2, '2024-12-01 21:44:41', '2024-12-01 21:44:41'),
(10, 'Category', 'Category', 3, '2024-12-01 21:46:03', '2024-12-01 21:46:03'),
(11, 'Add Category', 'Add Category', 3, '2024-12-01 21:46:03', '2024-12-01 21:46:03'),
(12, 'Edit Category', 'Edit Category', 3, '2024-12-01 21:46:03', '2024-12-01 21:46:03'),
(13, 'Delete Category', 'Delete Category', 3, '2024-12-01 21:46:03', '2024-12-01 21:46:03'),
(14, 'Sub Category', 'Sub Category', 4, '2024-12-01 21:48:51', '2024-12-01 21:48:51'),
(15, 'Add Sub Category', 'Add Sub Category', 4, '2024-12-01 21:48:51', '2024-12-01 21:48:51'),
(16, 'Edit Sub Category', 'Edit Sub Category', 4, '2024-12-01 21:48:51', '2024-12-01 21:48:51'),
(17, 'Delete Sub Category', 'Delete Sub Category', 4, '2024-12-01 21:48:51', '2024-12-01 21:48:51'),
(18, 'Product', 'Product', 5, '2024-12-01 21:50:06', '2024-12-01 21:50:06'),
(19, 'Add Product', 'Add Product', 5, '2024-12-01 21:50:06', '2024-12-01 21:50:06'),
(20, 'Edit Product', 'Edit Product', 5, '2024-12-01 21:50:06', '2024-12-01 21:50:06'),
(21, 'Delete Product', 'Delete Product', 5, '2024-12-01 21:50:06', '2024-12-01 21:50:06'),
(22, 'Setting', 'Setting', 6, '2024-12-01 21:50:47', '2024-12-01 21:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 13, 1, '2024-12-02 16:54:30', '2024-12-02 16:54:30'),
(2, 13, 2, '2024-12-02 16:54:30', '2024-12-02 16:54:30'),
(3, 13, 3, '2024-12-02 16:54:30', '2024-12-02 16:54:30'),
(4, 13, 6, '2024-12-02 16:54:30', '2024-12-02 16:54:30'),
(5, 13, 7, '2024-12-02 16:54:30', '2024-12-02 16:54:30'),
(7, 3, 3, '2024-12-05 04:56:20', '2024-12-05 04:56:20'),
(8, 2, 2, '2024-12-05 04:56:38', '2024-12-05 04:56:38'),
(10, 1, 1, '2024-12-05 11:04:24', '2024-12-05 11:04:24'),
(11, 1, 2, '2024-12-05 11:04:24', '2024-12-05 11:04:24'),
(12, 1, 3, '2024-12-05 11:04:24', '2024-12-05 11:04:24'),
(13, 1, 4, '2024-12-05 11:04:24', '2024-12-05 11:04:24'),
(14, 1, 5, '2024-12-08 04:04:02', '2024-12-08 04:04:02'),
(15, 1, 6, '2024-12-08 05:34:40', '2024-12-08 05:34:40'),
(16, 1, 7, '2024-12-08 05:34:40', '2024-12-08 05:34:40'),
(17, 1, 8, '2024-12-08 05:34:40', '2024-12-08 05:34:40'),
(18, 1, 9, '2024-12-08 05:34:40', '2024-12-08 05:34:40'),
(19, 1, 10, '2024-12-08 05:34:40', '2024-12-08 05:34:40'),
(20, 1, 11, '2024-12-08 05:34:40', '2024-12-08 05:34:40'),
(21, 1, 12, '2024-12-08 05:34:40', '2024-12-08 05:34:40'),
(22, 1, 13, '2024-12-08 05:34:40', '2024-12-08 05:34:40'),
(23, 1, 14, '2024-12-08 05:34:40', '2024-12-08 05:34:40'),
(24, 1, 15, '2024-12-08 05:34:40', '2024-12-08 05:34:40'),
(25, 1, 16, '2024-12-08 05:34:40', '2024-12-08 05:34:40'),
(26, 1, 17, '2024-12-08 05:34:40', '2024-12-08 05:34:40'),
(27, 1, 18, '2024-12-08 05:34:40', '2024-12-08 05:34:40'),
(28, 1, 19, '2024-12-08 05:34:40', '2024-12-08 05:34:40'),
(29, 1, 20, '2024-12-08 05:34:40', '2024-12-08 05:34:40'),
(30, 1, 21, '2024-12-08 05:34:40', '2024-12-08 05:34:40'),
(31, 1, 22, '2024-12-08 05:34:40', '2024-12-08 05:34:40'),
(32, 2, 6, '2024-12-08 05:45:14', '2024-12-08 05:45:14'),
(33, 2, 10, '2024-12-08 05:45:14', '2024-12-08 05:45:14'),
(38, 2, 3, '2024-12-08 06:03:41', '2024-12-08 06:03:41'),
(39, 2, 7, '2024-12-16 08:02:11', '2024-12-16 08:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2024-12-01 15:28:06', '2024-12-01 15:28:06'),
(2, 'User', '2024-12-01 15:28:11', '2024-12-01 15:28:11'),
(3, 'Employee', '2024-12-01 15:28:22', '2024-12-01 15:28:22'),
(5, 'Normal', '2024-12-02 16:37:10', '2024-12-02 16:37:10'),
(8, 'd', '2024-12-02 16:48:34', '2024-12-02 16:48:34'),
(13, 'r2', '2024-12-02 16:54:30', '2024-12-02 16:54:30'),
(14, 'ss', '2024-12-04 16:34:33', '2024-12-04 16:34:33');

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
('3uUdCV48wkirLS9yjWy4pf9obvVd9nKbvnfOdtCr', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOTA5QVFyTFF2cXdYZWM5SElJZlhDZU5iUXVUWllvNnZtRm1XQkdqUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYW5lbC9yb2xlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1733637829),
('D49aWe0Z3xMrmwLI6QDEuKWMvmhm2zdIWRKE1PuT', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib1dENnFkemx5a1lkSjNOdHdubkJDNzhwUjRORUhnSWFWc3VkaXVJbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYW5lbC9yb2xlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1734336238),
('FT56hwtcJU4m3JfaYsiQ9u5VGglhLTPCwnRDyYQ7', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVUxiTjd1UU45SGoyZkJoTjFnOE9jUk9uM0ltdk9RVnprS040TkU0aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYW5lbC9yb2xlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1734336131),
('IKvWYa8roYJKiPXtLZnbrUObPCIMQsTCeOakxZo5', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidUZOZHdzVTUzY3lpeWhzZlJ5YzdOdFhtcGpzR2lnSEE2NzFnSGpaRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYW5lbC9yb2xlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1733637821),
('npwZLlTuTxPrBZKtAXrAVMqvhMMA3CAGDvbF71ly', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidGNUOE5mMndsTWJ4ZERiOGRvbG8zdk55SFQxV2s2eWNGQVlZU0FFUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735793360),
('pLcsPTEPCcQy0fS82KJNvlFJEPyRvMKsFased0L9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTg2amJPeHgzbkxQNGs0OGZuUk9RQ0xqVmc2VHBCQjBWdWhPdVlGOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735731483),
('VHwxMjvtAtZTTfSdwC8WgbdJMiY5sp5M9Udt9kJX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMUhQRFZhbnhFOThWNE95bmZWZXRGN3h2T1BhbTZPNkJVanV2bG9pVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735731535);

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
  `role_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$Dxjvtgl613G7AUHr.4mN6uxarugFHwMNYkhKwj8vbmqNxik3UYnba', 1, NULL, NULL, '2024-12-08 00:03:25'),
(3, 'shreyansh', 'sranpariya660@rku.ac.in', NULL, '$2y$12$7Pv6ENvv/stfLlZc8Ko/ie0cfGENddtrNz82zEjUohKoTCfqhKwKO', 2, NULL, '2024-12-06 11:37:39', '2024-12-06 11:37:39');

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
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
