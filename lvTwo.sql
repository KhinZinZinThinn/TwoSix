-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2019 at 04:15 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lvTwo`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `cat_name`) VALUES
(2, '2019-01-27 01:59:11', '2019-01-27 01:59:11', 'Cosmetics'),
(3, '2019-02-02 02:02:06', '2019-02-02 02:02:06', 'Foods'),
(4, '2019-02-02 02:48:49', '2019-02-02 02:48:49', 'Bags'),
(5, '2019-02-03 00:27:15', '2019-02-03 00:27:15', 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_26_100036_create_categories_table', 2),
(5, '2019_01_27_085302_create_products_table', 3);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `product_name`, `price`, `category_id`, `image`, `user_id`) VALUES
(1, '2019-02-24 02:19:52', '2019-02-24 02:19:52', 'Apple', 700.00, 3, 'Apple.jpg', 5),
(2, '2019-02-28 01:51:46', '2019-02-28 01:51:46', 'Pineapple', 1000.00, 3, 'Pineapple.jpeg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Khin Zin Zin Thinn', 'khinzinzinthinn1@gmail.com', '2019-02-03 02:23:20', '$2y$10$aRLp6/eHPxMUSGAEZInriu.kOoZNcwIgqOwNJVxu3lxONAFhUmVv.', 'pbKrZGGJEYbpzxBgmVDwEufYERDNgiYM4asTWzCD58z69Qidi7BrkHn36tR7', '2019-01-26 01:02:15', '2019-02-03 02:23:20'),
(2, 'Zin Zin', 'zinzin@gmail.com', NULL, '$2y$10$adnBgfUnwCQnFXCxN0GMWeHvAJ83MGPfGLm3F6D0m7V1wRj9QwRMa', 'SQqCvcUQa4iyDoxLmMiZLJpFpAkdqicRGQejp4qfszVTlea0UwYtLRQZSlau', '2019-02-02 02:48:05', '2019-02-02 02:48:05'),
(3, 'Mg Mg', 'mgmg@gmail.com', NULL, '$2y$10$vTMAul87.PjrqdSCDAg2VOcFf/SzJfERB5ggZooCoS2HY0ruaSpeC', 'gEQXEQ65CV8Ddx0eHoIr3qCUG7DA5lJEfWl3Y2EbgRcOjKqugmgRPk40elJZ', '2019-02-03 02:28:56', '2019-02-03 02:28:56'),
(4, 'Ei Thiri Aung', 'eithiriaung123zunzun123@gmail.com', NULL, '$2y$10$57POgBp3cMdf0eFoFQQ0UOCSDqKnYFODrogHYr5zF6WWehN5e/ztu', '7lMYEY1yHnvwHoDKWJpYyagCqJf8mtfqhIlzgcoOata7vS53R2M239RSdPjy', '2019-02-03 02:31:12', '2019-02-03 02:31:12'),
(5, 'Khin Zin Zin Thinn', 'khinzinzinthinn@gmail.com', '2019-02-08 07:42:19', '$2y$10$iRQJnsfQGWfrFtOonGBbueki0qlhl14b2fhtybqMoL3glZe4zjUDG', 'S7YOdA8A7RXDqSiV6rOwEq0V2L9VD8k9JXDB8Y5wBupzlivDYEs71n2fsjCf', '2019-02-08 07:31:35', '2019-02-08 07:42:19'),
(6, 'Myint Moe Kyaw', 'mmk@gmail.com', NULL, '$2y$10$B3Aq9r6EXrd/KAyP8BFUCuoVl/2Gt03sKPyMgayspz2AXqmTxKFoG', NULL, '2019-02-21 02:45:55', '2019-02-21 02:45:55'),
(7, 'Myint Moe Kyaw', 'ngehtut6@gmail.com', NULL, '$2y$10$BUkNehRfyhdopQMGUeUvK.B/kazxebL/kb3.dgaasl50DHpWkyFN.', NULL, '2019-02-21 02:46:23', '2019-02-21 02:46:23'),
(8, 'Myint Moe Kyaw', 'myintmoekyaw1997@gmail.com', '2019-02-21 03:10:46', '$2y$10$rFPOyq4ZP8SLzLlVo/jc.emMjEKehSRQPk0rQdhkBhwhl0SjPWJsm', NULL, '2019-02-21 02:51:30', '2019-02-21 03:10:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
