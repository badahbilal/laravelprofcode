-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2021 at 10:06 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `title`, `hospital_id`, `created_at`, `updated_at`) VALUES
(2, 'Doctor 2', 'Doctor title 2', 2, NULL, NULL),
(4, 'Doctor 4', 'Doctor title 4', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_service`
--

DROP TABLE IF EXISTS `doctor_service`;
CREATE TABLE IF NOT EXISTS `doctor_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor_service`
--

INSERT INTO `doctor_service` (`id`, `doctor_id`, `service_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 4, 1),
(4, 4, 2),
(5, 2, 3),
(6, 2, 4),
(7, 2, 3),
(8, 2, 4),
(9, 4, 3),
(10, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

DROP TABLE IF EXISTS `hospitals`;
CREATE TABLE IF NOT EXISTS `hospitals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(2, 'Hospital 2', 'Hospital address 2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
CREATE TABLE IF NOT EXISTS `offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `details` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `lang` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name`, `price`, `details`, `photo`, `lang`, `created_at`, `updated_at`) VALUES
(37, 'a ghost', '100', 'a ghosta ghosta ghosta ghost', 'images/offers/1597927957.jpg', NULL, '2020-08-20 12:52:37', '2020-08-20 12:52:37'),
(33, 'Another test', '2222', 'just test', 'images/offers/1597926699.jpg', NULL, '2020-08-20 12:31:39', '2020-08-20 12:31:39'),
(32, 'bilaldh', '1000', 'smljg,ùmql', 'images/offers/1597926640.jpg', NULL, '2020-08-20 12:30:40', '2020-08-20 12:30:40'),
(31, 'sgdfhd', '1000', 'fbhswdfh', 'images/offers/1597926235.jpg', NULL, '2020-08-20 12:23:55', '2020-08-20 12:23:55'),
(30, 'testo', '100', 'test', 'images/offers/1597924794.PNG', NULL, '2020-08-20 11:59:54', '2020-08-20 11:59:54'),
(28, 'a', '100', 'qsdf', 'images/offers/1597910986.PNG', NULL, '2020-08-20 08:09:46', '2020-08-20 08:09:46'),
(27, 'aaaaaaaa', '100', 'Uhdij qojflkqsj sqlkf', 'images/offers/1597910729.jpg', NULL, '2020-08-20 08:05:29', '2020-08-20 08:05:29'),
(26, 'bilal', '100', 'sxdqsdgsdvs sdbv', 'images/offers/1597909671.PNG', NULL, '2020-08-20 07:47:51', '2020-08-20 07:47:51'),
(22, 'ihfdjn dqijflqkdj', '54168156', 'sdjf,sd,ffsqollff lzslk,ffsù dlk,,', 'images/offers/1597923975.PNG', NULL, '2020-08-19 10:33:53', '2020-08-19 10:33:53'),
(23, 'Updated with photo from ajax', '1006', 'Udtated from ajax', 'images/offers/1597922886.jpg', NULL, '2020-08-19 11:00:39', '2020-08-19 11:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kondiro10@gmail.com', '$2y$10$PRfzcVXgwp9zgPPpT3viu.sBWdeH8N.onSB4wa5.UbUl/S3mO4z8C', '2020-08-21 15:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

DROP TABLE IF EXISTS `phones`;
CREATE TABLE IF NOT EXISTS `phones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(3) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `code`, `phone`, `user_id`) VALUES
(1, '212', '010101010', 1),
(2, '213', '0220202020', 4);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'تقويم اسنان', NULL, NULL),
(2, 'تنظيف اسنان', NULL, NULL),
(3, 'حشو عصب', NULL, NULL),
(4, 'حشو عادي', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'bilal', 'aymanbilal2@gmail.com', '2020-08-21 15:14:18', '$2y$10$EYfvxo2Am/dT5xGbiomYnOl/fEyjym2.lMNi6y.Bmnp/jByypihOC', NULL, NULL, '2020-05-15 07:03:24', '2020-08-21 15:14:18'),
(4, 'kondiro', 'kondiro10@gmail.com', '2020-05-15 07:38:44', '$2y$10$EYfvxo2Am/dT5xGbiomYnOl/fEyjym2.lMNi6y.Bmnp/jByypihOC', 'Qt8ZxgHGFCdmKxILS5YfLZiQPtB900MCjdMB7iWKDl0Z7jANpuUxTmHpMdnh', NULL, '2020-05-15 07:40:59', '2020-05-15 07:48:28'),
(3, 'ayman', 'test@gmail.com', '2020-05-15 07:38:44', '$2y$10$EYfvxo2Am/dT5xGbiomYnOl/fEyjym2.lMNi6y.Bmnp/jByypihOC', NULL, NULL, '2020-05-15 07:38:16', '2020-05-15 07:38:44'),
(5, 'abdou', 'abdou@gmail.com', '2020-08-21 15:15:28', '$2y$10$EYfvxo2Am/dT5xGbiomYnOl/fEyjym2.lMNi6y.Bmnp/jByypihOC', NULL, NULL, '2020-08-21 14:53:45', '2020-08-21 15:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(13) NOT NULL,
  `viewers` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `viewers`) VALUES
(1, 'video 1', 8);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
