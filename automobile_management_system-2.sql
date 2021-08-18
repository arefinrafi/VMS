-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 10:35 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automobile_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_holder_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_number` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `type` enum('Super Admin','Admin') COLLATE utf8mb4_unicode_ci DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `pass`, `card_holder_name`, `card_number`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Dream Car', 'e10adc3949ba59abbe56e057f20f883e', 'Dream Car', 123456789123, 1, 'Admin', '2021-02-17 07:20:33', '2021-02-17 07:20:33'),
(2, 'Super Admin', 'e10adc3949ba59abbe56e057f20f883e', 'Super Admin', 0, 1, 'Super Admin', '2021-02-16 18:00:00', '2021-02-16 18:00:00'),
(3, 'Car Heaven', 'e10adc3949ba59abbe56e057f20f883e', 'Car Heaven', 123456789456, 1, 'Admin', '2021-05-24 07:35:54', '2021-05-24 07:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `url`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Car', 'Car', 1, NULL, '2021-05-24 07:36:35', '2021-05-24 07:36:35'),
(2, 1, 'Mercedes-Benz', 'Mercedes-Benz', 1, NULL, '2021-05-24 07:37:10', '2021-05-24 07:37:10'),
(3, 1, 'Toyota', 'Toyota', 1, NULL, '2021-05-24 07:42:01', '2021-05-24 07:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `card_holder_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_number` bigint(20) NOT NULL,
  `showroom_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `showroom_card_number` bigint(20) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(13, '2020_12_10_122054_create_admins_table', 1),
(14, '2020_12_10_122218_create_categories_table', 1),
(15, '2020_12_10_122307_create_vehicles_table', 1),
(16, '2020_12_10_122509_create_vehicles_images_table', 1),
(17, '2021_02_18_144136_create_users_table', 2),
(18, '2021_02_18_144235_create_checkouts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mileage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `engine_capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_power` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_speed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `torque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel_consumption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `door` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drive_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seats` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wheel_base` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel_tank_capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_cylinder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `showroom_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase` bigint(20) NOT NULL,
  `selling` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `category_id`, `admin_id`, `brand`, `model`, `year`, `mileage`, `engine_capacity`, `fuel_type`, `max_power`, `max_speed`, `torque`, `fuel_consumption`, `door`, `drive_type`, `seats`, `wheel_base`, `weight`, `length`, `width`, `height`, `fuel_tank_capacity`, `color`, `no_of_cylinder`, `description`, `price`, `showroom_name`, `address`, `contact`, `image`, `purchase`, `selling`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Mercedes-Benz', 'E-Studio2303A', '2020', '20km', '20', 'Premium gasoline', '194hp@6000rpm(165kw)', '155Mph', '236LB.FT@1450-4200RP', '7.7-9.9L/100km', '4', 'Front Wheel Drive', '6', '2470', '1380', '4680', '1865', '1295', '12', 'red', '2', 'Fresh', 1500000, 'Dream Car', 'Agrabadad', 99, '91986.png', 1400000, 1800000, '2021-05-24 07:40:21', '2021-05-24 07:40:21'),
(2, 3, 3, 'Toyota', '2018', '1997', '10km', '23', 'Octane', '194hp@6000rpm(165kw)', '155Mph', '295 LB-FT', '7.7-9.9L/100km', '4', 'easy', '6', '2470', '1380', '4680', '1877', '1295', '20', 'White', '2', 'Fresh', 2000000, 'Car Heaven', 'Agrabadad', 99, '22753.jpg', 1600000, 1800000, '2021-05-24 07:43:50', '2021-05-24 07:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles_images`
--

CREATE TABLE `vehicles_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkouts_admin_id_index` (`admin_id`),
  ADD KEY `checkouts_user_id_index` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_admin_id_index` (`admin_id`);

--
-- Indexes for table `vehicles_images`
--
ALTER TABLE `vehicles_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicles_images`
--
ALTER TABLE `vehicles_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD CONSTRAINT `checkouts_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `checkouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
