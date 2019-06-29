-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2019 at 10:29 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_phone` varchar(100) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `date_of_birth` timestamp NULL DEFAULT NULL,
  `address` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_phone`, `customer_email`, `gender`, `date_of_birth`, `address`, `created_at`, `updated_at`) VALUES
(1, 'hi', 'hi', 'hi@gmail.com', 'male', '2019-01-30 18:00:00', NULL, '2019-03-28 01:39:44', '2019-03-28 01:39:44'),
(2, 'Shaikot', '01985986986', 'zahidhassanshaikot@gmail.com', 'male', '2019-03-29 18:00:00', NULL, '2019-03-30 00:23:39', '2019-03-30 00:23:39'),
(3, 'Shaikot', '011111111', 'z@gmail.com', 'male', '2019-03-29 18:00:00', 'shukrabadh, Dhaka Bangladesh', '2019-03-30 00:24:54', '2019-03-30 00:24:54'),
(4, 'hiii', '01985986986', 'hi@gmail.com', 'male', '2019-02-28 18:00:00', 'shukrabadh, Dhaka Bangladesh', '2019-03-30 21:28:53', '2019-03-30 21:28:53');

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
(3, '2019_02_25_075217_entrust_setup_tables', 1);

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
('ex@gmail.com', '$2y$10$MMgWzPv06.VLTnf5CLCTWO9uhZ/j7IZfK56/v2FZSG5YddAPbwvo2', '2019-06-23 06:35:45'),
('ex4useonly@gmail.com', '$2y$10$Mq2uY6koxrFTt.YhNJp64ukWqCnYO2aqw4D.IdEOZXwtvwSB1Wg7a', '2019-06-23 06:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `company_name` varchar(191) DEFAULT NULL,
  `group_name` varchar(191) DEFAULT NULL,
  `product_price` float UNSIGNED NOT NULL,
  `product_quantity` int(10) UNSIGNED NOT NULL,
  `product_description` text,
  `product_image` text,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `company_name`, `group_name`, `product_price`, `product_quantity`, `product_description`, `product_image`, `publication_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fff', 'gg', 'gg', 30, 11, '30gfhhhh', 'images/20190325094955PMS5.jpg', 1, '2019-03-23 05:11:59', '2019-05-09 01:18:30', NULL),
(2, 'ggg', NULL, NULL, 30, 1, NULL, NULL, 1, '2019-03-25 23:26:53', '2019-03-30 21:31:20', NULL),
(3, 'napa', NULL, NULL, 2.5, 146, NULL, NULL, 1, '2019-03-25 23:27:10', '2019-06-19 06:13:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_from_app`
--

CREATE TABLE `product_from_app` (
  `id` int(10) NOT NULL,
  `product_name` varchar(191) NOT NULL,
  `company_name` varchar(191) DEFAULT NULL,
  `group_name` varchar(191) DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `product_price` int(100) DEFAULT NULL,
  `product_quantity` int(100) DEFAULT '0',
  `product_need` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_sales`
--

CREATE TABLE `product_sales` (
  `id` int(11) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) DEFAULT '0',
  `product_need` int(100) DEFAULT '0',
  `product_discount` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_sales`
--

INSERT INTO `product_sales` (`id`, `customer_id`, `product_id`, `product_price`, `product_quantity`, `product_need`, `product_discount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 30, 2, 0, 0, '2019-03-28 02:11:52', '2019-03-28 02:11:52', NULL),
(2, 3, 3, 2.5, 2, 0, 0, '2019-03-30 00:25:16', '2019-03-30 00:25:16', NULL),
(3, 3, 2, 30, 1, 0, 0, '2019-03-30 00:26:32', '2019-03-30 00:26:32', NULL),
(4, 4, 2, 30, 2, 0, 0, '2019-03-30 21:31:20', '2019-03-30 21:31:20', NULL),
(5, 4, 3, 2.5, 2, 8, 0, '2019-03-30 21:31:20', '2019-03-30 21:31:20', NULL),
(6, 4, 1, 30, 10, 0, 0, '2019-03-30 21:35:39', '2019-03-30 21:35:39', NULL),
(7, 3, 1, 30, 3, 20, 0, '2019-04-03 01:05:15', '2019-04-03 01:05:15', NULL),
(8, 3, 1, 30, 2, 10, 0, '2019-05-09 01:18:30', '2019-05-09 01:18:30', NULL),
(9, 4, 3, 2.5, 2, 2, 0, '2019-05-11 23:55:08', '2019-05-11 23:55:08', NULL),
(10, 4, 3, 2.5, 2, 2, 0, '2019-06-19 06:13:02', '2019-06-19 06:13:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Super Admin', NULL, NULL, NULL),
(2, 'Admin', 'Admin', NULL, NULL, NULL),
(3, 'Manager', 'Manager', NULL, NULL, NULL),
(4, 'Sells Man', 'sells man', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(2, 1),
(4, 3),
(5, 2),
(6, 2),
(7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_no`, `address`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ex', 'ex@gmail.com', NULL, NULL, NULL, '2019-05-08 18:00:00', '$2y$10$.bL9e64Y9khrc6pRbF0Ry.ETHUAow6BZ9hU7UbWG2CedyqVVnLLrK', 'wxxCQDqf31LUrVB9YCvsM7grbWXYEmQUbbhfrc20fcbRTba5s14PRndk3BUi', '2019-03-21 12:16:30', '2019-03-21 12:16:30'),
(2, 'Super Admin', 'superadmin@gmail.com', '01999999999', 'shukrabadh, Dhaka Bangladesh', 'images/20190402073829ProfilePic10.jpg', '2019-04-27 01:15:50', '$2y$10$80PtdnTih/5TCj92d760OOHXnKai620qpgcVl8sP.2UD1EFaTVKHO', 'iC16r8N1zfO9vvxqqkDM4kdbiABwPg3GrIGSFUPBmJSOwfFzADIpSUf71wTH', '2019-04-02 00:47:39', '2019-04-27 01:15:50'),
(4, 'Manager', 'm@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$7fj6bFbefOEuAMhVgRzayeOaPwc4HL1ul6Wwa5zcnpIx1X0irxF7y', NULL, '2019-04-02 01:27:46', '2019-04-02 01:27:46'),
(5, 'ex', 'ex4useonly@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$XCfOYJcsl5G6gpt4za2zoeJvpB1CF3VhrpzUWvtYP8i1fNQEc6MSi', NULL, '2019-04-27 01:00:39', '2019-04-27 01:00:39'),
(6, 'ex', 'exam@gmail.com', NULL, NULL, NULL, '2019-04-27 01:15:19', '$2y$10$AE4F6fp0vwDYYfK2ke/aYO13544x1ZJuG0hRtUFVzmqvawWnMYuFu', 'MSFutB96NjcKN7fBlemiYN4gO5ef86yHQNp1iuzv8CEDdQXcbXlbPNCipYtt', '2019-04-27 01:04:19', '2019-04-27 01:15:19'),
(7, 'Sells Man', 'sell@gmail.com', NULL, NULL, NULL, '2019-04-30 18:00:00', '$2y$10$Ra3OW2.qaG1.61ij3Ke1TuQLCXvPOZdAoyomRLZlcTRaIEEppPEyG', NULL, '2019-04-30 23:45:01', '2019-04-30 23:45:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_from_app`
--
ALTER TABLE `product_from_app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_from_app`
--
ALTER TABLE `product_from_app`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_sales`
--
ALTER TABLE `product_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
