-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2017 at 09:12 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btl`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `idUser` int(10) NOT NULL,
  `idAlbumf` int(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `idUser`, `idAlbumf`, `created_at`, `updated_at`) VALUES
(31, 'Cường đz', 3, 0, '2017-10-28 09:37:46', '2017-11-02 08:50:07'),
(32, 'duong 14', 3, 0, '2017-10-28 09:40:08', '2017-11-21 08:25:56'),
(34, '123', 4, 0, '2017-11-17 19:31:03', '2017-11-17 19:31:03'),
(35, '145', 3, 32, '2017-11-21 04:50:41', '2017-11-21 04:50:41'),
(36, '315', 5, 32, '2017-11-21 19:32:04', '2017-11-21 19:32:04'),
(37, 'đz', 5, 0, '2017-11-21 21:09:32', '2017-11-21 21:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUser` int(10) NOT NULL,
  `idImg` int(10) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idAlbum` int(10) NOT NULL,
  `idUser` int(10) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode` int(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images_users`
--

CREATE TABLE `images_users` (
  `id` int(10) NOT NULL,
  `idImg` int(10) NOT NULL,
  `idUser` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags_images`
--

CREATE TABLE `tags_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `idTag` int(10) NOT NULL,
  `idImg` int(10) NOT NULL,
  `idUser` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(170) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(170) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lv` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `lv`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Cường', 'admin_10@gmail.com', '$2y$10$Dj1IikoG3dAHrgWZkgIUPOC.m/otiAoAkVnTCJCJeJngbxbSDGKIy', 1, 'Tsprs4NNAWexHRxzHyphoQXZuzO4bCL0r1GYPDnBzlL3SmBDzqRpDZ2EeAag', '2017-10-24 20:27:20', '2017-10-24 20:27:20'),
(4, 'Dương', 'doctor_10@gmail.com', '$2y$10$MbVK2nIiwVYwT.8TuAu.A.kRtPu8lWd2tl0lmGk7dq1iB2EH0MV9K', 0, 'zXACAQwmz8VgaS7mOkM3eovbuXtfWEkWeHiDcZjHigBpr8Ck0S2iEt9S2xZT', '2017-10-24 20:33:11', '2017-11-22 10:04:10'),
(5, 'Cuong', 'osi19972@gmail.com', '$2y$10$.m1KTmIlZDkc.K5slzz/GOxBP3Qc2Mv7.CfRvxLR3RQprsIhEPsTG', -1, '4Z6dDrXvVNRy6247F3E74l1w2nMSLgTzJvRiPyeLNMiPpL6c5vkqyPCPglON', '2017-10-28 09:48:22', '2017-11-23 09:49:36'),
(6, 'Cường Lê   Ngọc', 'osident1997@gmail.com', '$2y$10$Uzs990SyEv1OjNYNQ20luu0Fyrys0.wpvAY4mz/K1aKzQ4kvvlMK.', 0, 'h5pVOnA2lHrbJ85zqpNRpQYNMmV1jk3DZKWmm8zKCruD8u5rY79jRUDzC6yj', '2017-10-29 02:55:37', '2017-11-22 03:47:33'),
(7, 'Hằng', 'nameless2972@gmail.com', '$2y$10$4utCq65gPrDe54FJUPqVjuz..WicBtCiUcWVPHFwwrUy5Q5ZWQq3O', 0, 'zhhZbjhLNf2cKh6p8v8MwgD8ibD2DGhE8Tu8NA2oDUZ5y85o9r4kSVFJN5vp', '2017-11-22 01:03:06', '2017-11-22 03:47:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images_users`
--
ALTER TABLE `images_users`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`content`);

--
-- Indexes for table `tags_images`
--
ALTER TABLE `tags_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`idTag`,`idImg`);

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
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `images_users`
--
ALTER TABLE `images_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tags_images`
--
ALTER TABLE `tags_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
