-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2018 at 10:24 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scanfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'Makanan', 'Makanan sehat dan alami', '2018-11-12 17:00:00', '2018-11-12 17:00:00'),
(2, 'Minuman', 'Minuman segar', '2018-11-12 17:00:00', '2018-11-12 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `partner_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `partner_id`, `created_at`, `updated_at`) VALUES
(2, 4, 1, '2018-11-13 06:28:53', '2018-11-13 06:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `partner_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `promo_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `photo1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `partner_id`, `category_id`, `promo_id`, `name`, `price`, `photo1`, `photo2`, `photo3`, `available`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 'Ayam Enak', 10000, 'ayam1.jpg', 'ayam2.jpg', 'ayam3.jpg', 1, NULL, NULL),
(2, 1, 1, NULL, 'Burger Enak', 12000, 'burger1.jpg', 'burger2.jpg', 'burger3.jpg', 1, NULL, NULL),
(3, 1, 1, NULL, 'Frape', 10000, 'frape1.jpg', 'frape2.jpg', 'frape3.jpg', 1, NULL, NULL),
(4, 1, 1, NULL, 'Mie Aceh', 15000, 'mie1.jpg', 'mie2.jpg', 'mie3.jpg', 1, NULL, NULL),
(5, 1, 1, NULL, 'Sop', 8000, 'sop1.jpg', 'sop2.jpg', 'sop3.jpg', 1, NULL, NULL),
(6, 2, 2, NULL, 'Ice Blue', 9000, 'blue1.jpg', 'blue2.jpg', 'blue3.jpg', 1, NULL, NULL),
(7, 2, 2, NULL, 'Kopi Nikmat', 15000, 'cofee1.jpg', 'cofee2.jpg', 'cofee3.jpg', 1, NULL, NULL),
(8, 2, 2, NULL, 'Ice Lemon', 10000, 'lemmonade1.jpg', 'lemmonade2.jpg', 'lemmonade3.jpg', 1, NULL, NULL),
(9, 2, 2, NULL, 'Lime', 8000, 'lime1.jpg', 'lime2.jpg', 'lime3.jpg', 1, NULL, NULL),
(10, 2, 2, NULL, 'Orinal Tea', 9000, 'tea1.jpg', 'tea2.jpg', 'tea3.jpg', 1, NULL, NULL);

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
(3, '2017_05_05_082103_create_partners_table', 1),
(4, '2017_05_25_082104_create_categories_table', 1),
(5, '2017_05_25_082105_create_promotype_table', 1),
(6, '2017_05_25_082106_create_waiters_table', 1),
(7, '2017_05_25_082107_create_news_table', 1),
(8, '2017_05_25_082108_create_reviews_table', 1),
(9, '2017_05_25_082109_create_favorites_table', 1),
(10, '2017_05_25_082110_create_promos_table', 1),
(11, '2017_05_26_055948_create_menus_table', 1),
(12, '2017_05_26_063422_create_transactions_table', 1),
(13, '2017_05_26_064311_create_transaction_items_table', 1),
(14, '2017_05_28_064310_update_users_table_add_api_token_field', 1),
(15, '2017_05_30_140908_create_tables_table', 1),
(16, '2017_05_30_141634_update_transactions_table_add_table_id_field', 1),
(17, '2017_05_30_145223_update_tables_table_add_partner_id_field', 1),
(18, '2017_06_11_111203_update_transaction_table_add_waiter_id_field', 1),
(19, '2017_06_11_121047_update_transaction_items_table_add_desc_field', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `partner_id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `partner_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kami lagi adain promo makan sekali gratis 10 kali, ayo gabung', '2018-11-12 17:00:00', '2018-11-12 17:00:00'),
(2, 2, 'Ayooo minum segar, minum dulu baru makan', '2018-11-12 17:00:00', '2018-11-12 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `open_time` time DEFAULT NULL,
  `close_time` time DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `email`, `password`, `address`, `phone`, `desc`, `latitude`, `longitude`, `open_time`, `close_time`, `photo`, `cover`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Makan Enak', 'makan@makan.makan', '$2y$12$Pl.0e5HW4HCJRkCD9m4A0uN4uuw9EZZVJzjSQdxs99SSG4ymMMQ2e', 'Jalan makan makan', '081111111111', 'Makan enak ya disini', 5.57363685, 95.3563469, '09:00:00', '21:00:00', 'photo_partner1.jpg', 'cover_partner1.jpg', NULL, '2018-11-12 17:00:00', '2018-11-12 17:00:00'),
(2, 'Segar Sari', 'segar@segar.segar', '$2y$12$Pl.0e5HW4HCJRkCD9m4A0uN4uuw9EZZVJzjSQdxs99SSG4ymMMQ2e', 'Jalan segar sari', '08222222222222', 'Makan ya harus minum', 5.57111681, 95.35840683, '10:00:00', '21:00:00', 'photo_partner2.jpg', 'cover_partner2.jpg', NULL, '2018-11-12 17:00:00', '2018-11-12 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `id` int(10) UNSIGNED NOT NULL,
  `promotype_id` int(10) UNSIGNED NOT NULL,
  `promo_value` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotype`
--

CREATE TABLE `promotype` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `partner_id` int(10) UNSIGNED NOT NULL,
  `waiter_id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `partner_id`, `waiter_id`, `content`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Wooow makanannya enak', 5, '2018-11-12 17:00:00', '2018-11-12 17:00:00'),
(2, 2, 1, 1, 'Muraah muraah makanaannya', 5, '2018-11-12 17:00:00', '2018-11-12 17:00:00'),
(3, 3, 2, 2, 'Segeeeeeeer', 5, '2018-11-12 17:00:00', '2018-11-12 17:00:00'),
(4, 4, 1, 1, 'sangat baik', 5, '2018-11-13 06:33:07', '2018-11-13 06:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `partner_id` int(10) UNSIGNED NOT NULL,
  `number` int(10) UNSIGNED NOT NULL,
  `qrcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `partner_id`, `number`, `qrcode`, `available`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'C318D49E0926ADE51DC0EA9BF0E47059', 1, '2018-11-12 17:00:00', '2018-11-12 17:00:00'),
(2, 2, 1, 'D34B1DBD205A79FC8F03A7142243DAF2', 1, '2018-11-12 17:00:00', '2018-11-12 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `partner_id` int(10) UNSIGNED DEFAULT NULL,
  `waiter_id` int(10) UNSIGNED DEFAULT NULL,
  `table_id` int(10) UNSIGNED DEFAULT NULL,
  `finished` tinyint(1) NOT NULL DEFAULT '0',
  `total_price` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `partner_id`, `waiter_id`, `table_id`, `finished`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, 1, 1, 10000, '2018-11-13 06:30:55', '2018-11-13 06:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE `transaction_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`id`, `transaction_id`, `menu_id`, `quantity`, `desc`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'pedas', '2018-11-13 06:30:55', '2018-11-13 06:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `date_of_birth` date DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `api_token`, `password`, `address`, `date_of_birth`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dafik', 'user1@user.user', '123123', '$2y$12$UjBb9UQrgxCJVUIm3ZVX4esHTq9xKw5L1Ud9PMRK5H7vaLqUYWY2a', 'Jalan kenangan', NULL, 'dafik.jpg', NULL, '2018-11-12 17:00:00', '2018-11-12 17:00:00'),
(2, 'Dayat', 'use2r@.user.user', '123', '$2y$12$UjBb9UQrgxCJVUIm3ZVX4esHTq9xKw5L1Ud9PMRK5H7vaLqUYWY2a', NULL, NULL, 'dayat.jpg', NULL, '2018-11-12 17:00:00', '2018-11-12 17:00:00'),
(3, 'Fatur', 'user3@user.user', '123', '$2y$12$UjBb9UQrgxCJVUIm3ZVX4esHTq9xKw5L1Ud9PMRK5H7vaLqUYWY2a', NULL, NULL, 'fatur.jpg', NULL, '2018-11-12 17:00:00', '2018-11-12 17:00:00'),
(4, 'coffee', 'coffee@coffee.coffee', '$2y$10$c2LOlJidP/vfT1sh9/KwT.LND8V/mkyhI8dg3ofd0Jqe7oOtlBQB2', '$2y$10$2nczGLbfEPFi6WDFrMbk3.5q.9fuhq4.avqnjS/040B18PLq9nrAa', 'alamatku', NULL, '1542089394.png', NULL, '2018-11-13 06:09:54', '2018-11-13 06:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `waiters`
--

CREATE TABLE `waiters` (
  `id` int(10) UNSIGNED NOT NULL,
  `partner_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `waiters`
--

INSERT INTO `waiters` (`id`, `partner_id`, `name`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Parjo', 'dafik.jpg', '2018-11-12 17:00:00', '2018-11-12 17:00:00'),
(2, 2, 'Yayan', 'irhas.jpg', '2018-11-12 17:00:00', '2018-11-12 17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_partner_id_foreign` (`partner_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_partner_id_foreign` (`partner_id`),
  ADD KEY `menus_category_id_foreign` (`category_id`),
  ADD KEY `menus_promo_id_foreign` (`promo_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_partner_id_foreign` (`partner_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `partners_email_unique` (`email`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promos_promotype_id_foreign` (`promotype_id`);

--
-- Indexes for table `promotype`
--
ALTER TABLE `promotype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_partner_id_foreign` (`partner_id`),
  ADD KEY `reviews_waiter_id_foreign` (`waiter_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tables_partner_id_foreign` (`partner_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_partner_id_foreign` (`partner_id`),
  ADD KEY `transactions_table_id_foreign` (`table_id`),
  ADD KEY `transactions_waiter_id_foreign` (`waiter_id`);

--
-- Indexes for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_items_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `waiters`
--
ALTER TABLE `waiters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `waiters_partner_id_foreign` (`partner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotype`
--
ALTER TABLE `promotype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction_items`
--
ALTER TABLE `transaction_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `waiters`
--
ALTER TABLE `waiters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `menus_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menus_promo_id_foreign` FOREIGN KEY (`promo_id`) REFERENCES `promos` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `promos`
--
ALTER TABLE `promos`
  ADD CONSTRAINT `promos_promotype_id_foreign` FOREIGN KEY (`promotype_id`) REFERENCES `promotype` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_waiter_id_foreign` FOREIGN KEY (`waiter_id`) REFERENCES `waiters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `tables_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transactions_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transactions_waiter_id_foreign` FOREIGN KEY (`waiter_id`) REFERENCES `waiters` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD CONSTRAINT `transaction_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transaction_items_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `waiters`
--
ALTER TABLE `waiters`
  ADD CONSTRAINT `waiters_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
