-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 11:55 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magangdot`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(2) NOT NULL,
  `title` varchar(150) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `title`, `gambar`, `updated_at`, `created_at`) VALUES
(1, 'DOT TechTalk', 'public/upload/activity/bqzLZP5qtdrKTmeigKDkjkQONWwYO6hxNU3HInS7.jpeg', '2019-01-29 01:05:51', '2019-01-29 01:05:51'),
(3, 'Daily Meeting', 'public/upload/activity/SOoeoyjupJmGVq2ZQDhSFmdbK6f0LCskNd7FGaKm.jpeg', '2019-01-29 01:07:33', '2019-01-29 01:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `calon_magangs`
--

CREATE TABLE `calon_magangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_posisi` int(10) UNSIGNED NOT NULL,
  `kampus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portofolio` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `alasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_posisi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_info` int(10) UNSIGNED NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `flow` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calon_magangs`
--

INSERT INTO `calon_magangs` (`id`, `id_posisi`, `kampus`, `nama`, `jurusan`, `telp`, `email`, `instagram`, `facebook`, `cv`, `portofolio`, `tgl_awal`, `tgl_akhir`, `alasan`, `alasan_posisi`, `id_info`, `status`, `created_at`, `updated_at`, `flow`) VALUES
(16, 30, 'UI', 'Revina', 'IT', '082264595559', 'revinaaniver@gmail.com', 'revinaaniver', 'revina laksmi', 'http:nkcbdcbicb', 'ckdnckebceceknkecec', '2019-02-01', '2019-04-08', 'ssssssssssssssssssssssssssssssssssssssssssssssssssss', 'ssssssssssssssssssssssssssssssssssssssssssssssssssss', 10, 'Tolak', '2019-01-29 21:27:13', '2019-04-11 00:34:51', ''),
(18, 27, 'Polinema', 'Lala', 'IT', '082264595559', 'revinaaniver@gmail.com', 'revinaaniver', 'revina laksmi', 'http:nkcbdcbicb', 'ckdnckebceceknkecec', '2019-01-18', '2019-03-13', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 13, 'Terima', '2019-02-07 01:00:30', '2019-02-07 20:08:08', ''),
(20, 27, 'UI', 'Revina', 'TI', '082264595559', 'alfindarahma@gmail.com', 'revinaaniver', 'revina laksmi', 'http:nkcbdcbicb', 'ckdnckebceceknkecec', '2019-03-12', '2019-05-08', '$range$range$range$range$range$range', '$range$range$range$range$range$range$range', 13, 'Menunggu', '2019-02-07 01:33:17', '2019-02-08 03:26:53', ''),
(21, 27, 'Polinema', 'Revina', 'TI', '082264595559', 'alfindarahma@gmail.com', 'revinaaniver', 'revina laksmi', 'http:nkcbdcbicb', 'ckdnckebceceknkecec', '2019-02-22', '2019-05-17', 'if($quota->remains == 0) {\r\n            \r\n        }if($quota->remains == 0) {\r\n            \r\n        }if($quota->remains == 0) {\r\n            \r\n        }', 'if($quota->remains == 0) {\r\n            \r\n        }if($quota->remains == 0) {\r\n            \r\n        }if($quota->remains == 0) {\r\n            \r\n        }', 13, 'Menunggu', '2019-02-08 02:51:39', '2019-02-08 02:51:39', ''),
(22, 27, 'Polinema', 'Revina Laksmi Permata Hati', 'TI', '082264595559', 'revinaaniver@gmail.com', 'revinaaniver', 'revina laksmi', 'aaaaaaaaaaaaaaaaa', 'ckdnckebceceknkecec', '2019-05-10', '2019-09-28', 'yayaayyayayaayayayayayayayayayayaa', 'yayaayyayayaayayayayayayayayayayaa', 8, 'Menunggu', '2019-02-20 21:06:58', '2019-02-20 21:06:58', ''),
(23, 27, 'Polinema', 'Siska Nur Oktavia', 'TI', '082264595559', 'revinaaniver@gmail.com', 'revinaaniver', 'revina laksmi', 'aaaaaaaaaaaaaaaaa', 'ckdnckebceceknkecec', '2019-05-10', '2019-09-28', 'yayaayyayayaayayayayayayayayayayaa', 'yayaayyayayaayayayayayayayayayayaa', 8, 'Menunggu', '2019-02-20 21:07:48', '2019-02-20 21:07:48', ''),
(24, 27, 'Polinema', 'Suci Anjarwati', 'TI', '082264595559', 'revinaaniver@gmail.com', 'revinaaniver', 'revina laksmi', 'aaaaaaaaaaaaaaaaa', 'ckdnckebceceknkecec', '2019-06-22', '2019-09-28', 'yayaayyayayaayayayayayayayayayayaa', 'yayaayyayayaayayayayayayayayayayaa', 8, 'Menunggu', '2019-02-20 21:08:28', '2019-02-20 21:08:28', ''),
(25, 27, 'UB', 'Diana', 'TI', '082264595559', 'rere2@gmail.com', 'revinaaniver', 'revina laksmi', 'aaaaaaaaaaaaaaaaa', 'ckdnckebceceknkecec', '2019-08-01', '2019-08-31', 'cnkhvccccccccccccccccccccccccccccc', 'cnkhvccccccccccccccccccccccccccccc', 9, 'Registered', '2019-04-11 00:49:09', '2019-04-11 00:49:09', ''),
(26, 27, 'jcbds', 'Diana', 'ti', '082264595559', 'revinaaniver@gmail.com', 'sssssssssssssss', 'sssssssssss', 'aaaaaaaaaaaaaaaaa', 'ckdnckebceceknkecec', '2019-08-01', '2019-10-30', 'ssssssssssssssssssssssssssssssssssssssssssssssss', 'ssssssssssssssssssssssssssssssssssssssssssssssss', 9, 'Registered', '2019-04-11 00:54:32', '2019-04-11 00:54:32', '');

-- --------------------------------------------------------

--
-- Table structure for table `info_magangs`
--

CREATE TABLE `info_magangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `info_magangs`
--

INSERT INTO `info_magangs` (`id`, `info`, `created_at`, `updated_at`) VALUES
(8, 'Instagram DOT', '2019-01-29 00:08:36', '2019-01-29 00:08:36'),
(9, 'Facebook DOT', '2019-01-29 00:09:01', '2019-01-29 00:09:01'),
(10, 'DiLo Malang', '2019-01-29 00:09:14', '2019-01-29 00:09:14'),
(11, 'Poster', '2019-01-29 00:09:27', '2019-01-29 00:09:27'),
(12, 'Guru / Dosen', '2019-01-29 00:09:56', '2019-01-29 00:09:56'),
(13, 'Ngalup Co', '2019-01-29 00:10:12', '2019-01-29 00:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `kuotas`
--

CREATE TABLE `kuotas` (
  `id` int(10) UNSIGNED NOT NULL,
  `waktu` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuotas`
--

INSERT INTO `kuotas` (`id`, `waktu`, `jumlah`, `created_at`, `updated_at`) VALUES
(14, '2019-01-11', 1, '2019-02-06 21:20:15', '2019-02-08 03:27:21'),
(15, '2019-02-07', 4, '2019-02-06 21:20:55', '2019-02-06 21:20:55'),
(16, '2019-03-15', 4, '2019-02-06 21:21:13', '2019-02-06 21:22:01'),
(17, '2019-04-13', 4, '2019-02-06 21:22:27', '2019-02-07 20:52:59'),
(18, '2019-05-14', 4, '2019-02-06 21:23:43', '2019-02-07 20:53:16'),
(19, '2019-06-07', 5, '2019-02-06 21:24:01', '2019-02-06 21:24:57'),
(20, '2019-07-05', 3, '2019-02-07 01:10:11', '2019-02-07 01:10:11'),
(21, '2019-08-10', 8, '2019-02-07 01:10:42', '2019-02-07 01:10:42'),
(22, '2019-09-13', 6, '2019-02-07 01:11:01', '2019-02-07 01:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_10_064134_create_info_magangs_table', 1),
(4, '2019_01_10_064200_create_posisis_table', 1),
(5, '2019_01_10_064221_create_calon_magangs_table', 1),
(6, '2019_01_10_064238_create_kuotas_table', 1),
(7, '2019_04_15_094139_states', 2),
(8, '2019_04_15_093816_add_column_flow_to_calon_magangs', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('revinaaniver@gmail.com', '$2y$10$z1I/om7ijaJPooC6rrHrPu1xADtzOYcSfDVraTiZKeqiSnVJFbrYa', '2019-01-21 01:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `posisis`
--

CREATE TABLE `posisis` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_posisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `aksi` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posisis`
--

INSERT INTO `posisis` (`id`, `nama_posisi`, `slug`, `gambar`, `deskripsi`, `aksi`, `created_at`, `updated_at`) VALUES
(27, 'Android', 'android', 'public/upload/posisi/Df78itUiDF3FF1DUKuDM3FMweIap3NbcIRyYcdY1.png', 'Menguasai Android studio dan API', 'true', '2019-01-28 21:59:16', '2019-02-04 02:08:12'),
(28, 'Backend Developer', 'backend-developer', 'public/upload/posisi/shbYYY4bmAeoM4CVugn6K4hMSIL0C3Xe8GEbzzhM.png', 'Menguasai laravel', 'true', '2019-01-28 21:59:48', '2019-02-04 02:28:09'),
(29, 'Copywriter', 'copywriter', 'public/upload/posisi/EzO2Ig4MvyIF7noPS3FxGBaa4h3VfWUEvKYCyiPO.png', 'Menguasai teknik penulisan sistem analis', 'true', '2019-01-28 22:00:20', '2019-02-04 02:36:17'),
(30, 'Designer', 'designer', 'public/upload/posisi/NDWihggqe21RlsHxopcdIqZ928NkSNhREJ8nQg1a.png', 'Menguasai photoshop, corel. UI / UX', 'false', '2019-01-28 22:00:49', '2019-02-04 01:35:27'),
(31, 'Front End Developer', 'front-end-developer', 'public/upload/posisi/g7r3wUZg8fYOogplkJyNaBm9Q1dAjB9dmje1qqJY.png', 'Memguasai bootstrap, json, vue js', 'false', '2019-01-28 22:01:19', '2019-02-04 01:35:27'),
(32, 'iOS Programmer', 'ios-programmer', 'public/upload/posisi/ZMoMHvtNwgVByDtRuJfC80UQOfFu1OZ9r6isif5k.png', 'Menguasai iOS', 'false', '2019-01-28 22:01:59', '2019-02-04 01:35:27'),
(33, 'QA', 'qa', 'public/upload/posisi/eRKdEiekILuGlluM3OmTp37GJpwHOLQ57tUjAFnd.png', 'Handle the quality program', 'false', '2019-01-28 22:02:51', '2019-02-04 01:35:27'),
(34, 'Social Media', 'social-media', 'public/upload/posisi/2kHCD6iW8bQrTrcbzsu1FycdM86BtJ3u9jqvODgv.png', 'instagram facebook', 'false', '2019-01-28 22:03:17', '2019-02-04 01:35:27'),
(35, 'Sys Admin', 'sys-admin', 'public/upload/posisi/xW8UB4kjlLZDKhFRLUr0MEHUTcjLC20OslRFYhiz.png', 'networking', 'false', '2019-01-28 22:03:46', '2019-02-04 01:35:27'),
(36, 'Technical Writer', 'technical-writer', 'public/upload/posisi/gKW9Teu0W6fJL0k8MqANIvGTmiYmkhcBbSMJE52L.png', 'technic writer system', 'false', '2019-01-28 22:04:14', '2019-02-04 01:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `state` enum('registered','review_cv','technical_test','interview','accepted','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonis`
--

CREATE TABLE `testimonis` (
  `id` int(10) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `id_posisi` int(10) UNSIGNED NOT NULL,
  `gambar` varchar(191) NOT NULL,
  `content` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonis`
--

INSERT INTO `testimonis` (`id`, `nama`, `id_posisi`, `gambar`, `content`, `updated_at`, `created_at`) VALUES
(3, 'Lala', 31, 'public/upload/testimoni/YVNmjZ1mxReUABmI3ZllzSjBa0cvvavoHglaiW4x.png', 'Sangat menyenangkan dan dapat ilmu baru tentang programming serta agile', '2019-01-29 00:02:37', '2019-01-29 00:01:51'),
(4, 'Rere', 28, 'public/upload/testimoni/pNVwEKOA8rI4VHs6rci2pzIbQbxQUKJxfXqHNhzn.png', 'Menyenangkan dan dapat ilmu baru', '2019-01-29 00:03:22', '2019-01-29 00:03:22'),
(5, 'Umroh', 36, 'public/upload/testimoni/fSSTuTnQyKXUbe5lSf7R07NBCzuJ9NbGvai145U6.png', 'Get so many knowledge and experiences', '2019-01-29 00:03:52', '2019-01-29 00:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Revina', 'revinaaniver@gmail.com', NULL, '$2y$10$HHvgZcY5eUnmqkKeZLIqtuYB.kcjtAAc.DNygWr1qtm3EeSqbE4/u', 'hceG0XAMxmTED0X12iLDLznbpQezSV4DymORlRlL0vRYUz20lAa9LbvWFW9i', '2019-01-20 20:52:25', '2019-01-20 20:52:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calon_magangs`
--
ALTER TABLE `calon_magangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calon_magangs_id_posisi_foreign` (`id_posisi`),
  ADD KEY `calon_magangs_id_info_foreign` (`id_info`);

--
-- Indexes for table `info_magangs`
--
ALTER TABLE `info_magangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuotas`
--
ALTER TABLE `kuotas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `waktu` (`waktu`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posisis`
--
ALTER TABLE `posisis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_user_id_foreign` (`user_id`);

--
-- Indexes for table `testimonis`
--
ALTER TABLE `testimonis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_posisi` (`id_posisi`);

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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `calon_magangs`
--
ALTER TABLE `calon_magangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `info_magangs`
--
ALTER TABLE `info_magangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kuotas`
--
ALTER TABLE `kuotas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posisis`
--
ALTER TABLE `posisis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonis`
--
ALTER TABLE `testimonis`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calon_magangs`
--
ALTER TABLE `calon_magangs`
  ADD CONSTRAINT `calon_magangs_id_info_foreign` FOREIGN KEY (`id_info`) REFERENCES `info_magangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calon_magangs_id_posisi_foreign` FOREIGN KEY (`id_posisi`) REFERENCES `posisis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `calon_magangs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonis`
--
ALTER TABLE `testimonis`
  ADD CONSTRAINT `testimonis_ibfk_1` FOREIGN KEY (`id_posisi`) REFERENCES `posisis` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
