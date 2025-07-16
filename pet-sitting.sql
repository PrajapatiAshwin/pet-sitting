-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 16, 2025 at 09:19 AM
-- Server version: 8.3.0
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet-sitting`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

DROP TABLE IF EXISTS `about_us`;
CREATE TABLE IF NOT EXISTS `about_us` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'admin@gmail.com', '$2y$10$vMY93RXouSpMf7Ti9WHsduI3OcZ2heZWIyuXTIIEAOabmXIR.7z4.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `image` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `comment_count` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `date`, `image`, `description`, `comment_count`, `created_at`, `updated_at`) VALUES
(1, 'super admin', '2024-12-13', 'Blogs/1748424887_image_blogs.jpeg', 'A dog’s loyalty is unmatched—they’re not just pets, but family.\nWhether it\'s a walk in the park or a cuddle on the couch, their love is unconditional.\nThey fill your home with joy, energy, and endless tail wags.', 0, '2025-05-28 03:08:49', '2025-05-28 04:04:47'),
(2, 'super admin', '2025-01-02', 'Blogs/1748425192_image_blogs.jpeg', 'Independent yet affectionate, cats are full of personality.\nThey thrive in cozy corners and surprise you with bursts of playfulness.\nTheir calming purr can turn any stressful day into a peaceful evening.', 0, '2025-05-28 03:10:16', '2025-05-28 04:09:52'),
(3, 'super admin', '2025-02-18', 'Blogs/1748425225_image_blogs.jpeg', 'Cats and dogs don’t just warm your heart—they’re good for it too.\nStudies show pets can reduce stress, anxiety, and even improve heart health.\nA furry friend is truly the best kind of therapy.', 0, '2025-05-28 03:57:31', '2025-05-28 04:10:25'),
(4, 'super admin', '2025-03-27', 'Blogs/1748425261_image_blogs.jpeg', 'Dogs communicate through body language, barks, and tail wags.\nPaying attention to their signals builds trust and understanding.\nA happy dog is one who feels heard and loved.', 0, '2025-05-28 04:02:49', '2025-05-28 04:11:01'),
(5, 'super admin', '2025-03-07', 'Blogs/1748425299_image_blogs.jpeg', 'Indoor cats need mental stimulation and exercise to stay healthy.\nTry interactive toys, climbing trees, or hide-and-seek with treats.\nAn active cat is a happy, well-balanced companion.\n', 0, '2025-05-28 03:57:31', '2025-05-28 04:11:39'),
(6, 'super admin', '2025-03-21', 'Blogs/1748425323_image_blogs.jpeg', 'Daily routines like feeding, grooming, or walks build strong bonds.\nBoth cats and dogs feel secure and loved through consistency.\nIt’s the little daily moments that create a lifetime of love.', 0, '2025-05-28 04:02:49', '2025-05-28 04:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `full_name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Lee Jackson', 'kupyx@mailinator.com', 'Proident rerum cons', 'Molestias dolorem un', '2025-06-30 05:45:34', '2025-06-30 05:45:34'),
(2, 'Ashton Robbins', 'admin@123gmail.com', 'Dog Walking', 'Dog Walking is a service where a trained individual takes dogs out for regular walks, providing them with exercise, bathroom breaks, and mental stimulation. It’s especially helpful for busy pet owners, ensuring dogs stay healthy, happy, and well-socialized.\n\nDog Walking is a service where a trained individual takes dogs out for regular walks, providing them with exercise, bathroom breaks, and mental stimulation. It’s especially helpful for busy pet owners, ensuring dogs stay healthy, happy, and well-socialized.', '2025-06-30 06:05:17', '2025-06-30 06:05:17'),
(3, 'Medge Fitzpatrick', 'nisonarab@mailinator.com', 'Ut deserunt elit al', 'Dolore corporis haru', '2025-06-30 06:11:57', '2025-06-30 06:11:57'),
(4, 'Deanna Sosa', 'ruky@mailinator.com', 'Recusandae Adipisci', 'Ut laborum Doloremq', '2025-06-30 06:13:14', '2025-06-30 06:13:14'),
(5, 'Abigail Sykes', 'zyso@mailinator.com', 'Esse qui minima cons', 'Neque ut ut soluta a', '2025-06-30 06:52:44', '2025-06-30 06:52:44'),
(6, 'Jasper Gonzalez', 'jopal@mailinator.com', 'In quo maiores quis', 'Ut et porro voluptat', '2025-06-30 08:40:50', '2025-06-30 08:40:50'),
(7, 'Steel Cantrell', 'xytuqisenu@mailinator.com', 'Possimus et in sequ', 'Eligendi ipsum volu', '2025-06-30 08:42:07', '2025-06-30 08:42:07'),
(8, 'Britanni Mills', 'refyva@mailinator.com', 'Corporis velit aute', 'Nihil fugiat in tem', '2025-07-01 09:04:00', '2025-07-01 09:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_management`
--

DROP TABLE IF EXISTS `gallery_management`;
CREATE TABLE IF NOT EXISTS `gallery_management` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `image` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `gallery_management`
--

INSERT INTO `gallery_management` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Cattitude Corner', NULL, '[\"galleryImages\\/1751108578_685fcbe28243a_image_gallery.jpeg\",\"galleryImages\\/1751108578_685fcbe283549_image_gallery.jpeg\",\"galleryImages\\/1751108578_685fcbe283a3b_image_gallery.jpeg\",\"galleryImages\\/1751108578_685fcbe283e2a_image_gallery.jpeg\",\"galleryImages\\/1751108578_685fcbe28415d_image_gallery.jpeg\",\"galleryImages\\/1751108578_685fcbe284531_image_gallery.jpeg\",\"galleryImages\\/1751108578_685fcbe284efd_image_gallery.jpeg\"]', '2025-05-28 01:18:05', '2025-06-28 05:32:58'),
(2, 'The Curious Cat', NULL, '[\"galleryImages\\/1751108700_685fcc5c7608a_image_gallery.jpeg\",\"galleryImages\\/1751108700_685fcc5c76a92_image_gallery.jpeg\",\"galleryImages\\/1751108700_685fcc5c76e6d_image_gallery.jpeg\",\"galleryImages\\/1751108700_685fcc5c77256_image_gallery.jpeg\",\"galleryImages\\/1751108700_685fcc5c77654_image_gallery.jpeg\"]', '2025-05-28 01:23:31', '2025-06-28 05:35:00'),
(3, 'Catnip Cove', NULL, '[\"galleryImages\\/1748417505_6836bbe1c5335_image_gallery.jpeg\",\"galleryImages\\/1748417505_6836bbe1c5bf7_image_gallery.jpeg\",\"galleryImages\\/1748417505_6836bbe1c5edf_image_gallery.jpeg\",\"galleryImages\\/1748417505_6836bbe1c6c6d_image_gallery.jpeg\",\"galleryImages\\/1748417505_6836bbe1c6f5b_image_gallery.jpeg\",\"galleryImages\\/1748417505_6836bbe1c721c_image_gallery.jpeg\"]', '2025-05-28 02:01:45', '2025-05-28 02:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_05_24_072750_create_about_us_table', 1),
(6, '2025_05_24_074011_create_veterinarians_table', 1),
(7, '2025_05_24_075054_create_galleries_table', 1),
(8, '2025_05_24_075518_create_pricings_table', 1),
(9, '2025_05_24_075909_create_blogs_table', 1),
(10, '2025_05_24_080347_create_contacts_table', 1),
(13, '2025_05_24_082942_create_admins_table', 2),
(14, '2025_05_24_113338_create_veterinarians_table', 2),
(15, '2025_05_24_113937_create_gallery_management_table', 3),
(16, '2025_05_24_114218_create_plan_management_table', 4),
(17, '2025_05_24_175606_create_admins_table', 5),
(18, '2025_05_25_030158_add_description_to_veterinarians_table', 6),
(21, '2025_05_28_044415_create_gallery_management_table', 7),
(22, '2025_05_28_080946_create_blogs_table', 8),
(23, '2025_06_05_081347_create_plan_management_table', 9),
(24, '2025_06_06_114314_create_orders_table', 10),
(25, '2025_06_28_091122_add_fieldname_to_plan_management_table', 11),
(26, '2025_06_28_112430_create_services_table', 12),
(27, '2025_06_30_081806_add_fields_to_contacts_table', 13),
(28, '2025_06_30_103156_create_jobs_table', 14),
(29, '2025_07_01_062646_add_pet_fields_to_orders_table', 15),
(30, '2025_07_02_135922_create_pet_manages_table', 16),
(32, '2025_07_03_074759_add_pet_fields_to_orders_table', 17),
(33, '2025_07_12_070511_add_payment_method_to_orders_table', 18),
(34, '2025_07_12_072318_add_payment_method_to_orders_table', 19),
(35, '2025_07_12_073629_create_payments_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `contact_number` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `pet_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `pet_type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `pet_description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `pet_photo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `plan_id` bigint UNSIGNED DEFAULT NULL,
  `plan_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `duration` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `features` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `payment_method` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_plan_id_foreign` (`plan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `contact_number`, `pet_name`, `pet_type`, `pet_description`, `pet_photo`, `message`, `plan_id`, `plan_name`, `amount`, `duration`, `features`, `payment_method`, `purchase_date`, `expire_date`, `created_at`, `updated_at`) VALUES
(1, 'Ashwin', 'ashwincumulative123@gmail.com', '1234567890', 'Kittu', '8', 'Accusantium  Accusantium Accusantium Accusantium  Accusantium  Accusantium', 'pet-purchase-plan/pet_images/1752306458_pet_photo_.jpeg', NULL, 2, 'Business', 79.00, '1 month', '4 Dog Walk,2 Pet Spa,2 Vet Visit,Free Supports', 'cash', '2025-07-12', '2025-08-11', '2025-07-12 02:17:38', '2025-07-12 02:17:38'),
(2, 'Cecilia Hopkins', 'rebicov@mailinator.com', '1236458790', 'Geraldine Watson', '2', 'Error explicabo Pla', NULL, NULL, 3, 'Ultimate', 119.00, '1 month', '6 Dog Walk,3 Pet Spa,3 Vet Visit,Free Supports', 'cash', '2025-06-12', '2025-07-11', '2025-07-12 02:19:54', '2025-07-12 02:19:54'),
(3, 'Leandra Kelley', 'sapa@mailinator.com', '3216548790', 'Heather Whitaker', '8', 'Laudantium optio f', NULL, NULL, 2, 'Business', 79.00, '1 month', '4 Dog Walk,2 Pet Spa,2 Vet Visit,Free Supports', 'cash', '2025-07-12', '2025-08-11', '2025-07-12 04:36:03', '2025-07-12 04:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint UNSIGNED NOT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_order_id_foreign` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 1, 'cash', '2025-07-12 02:17:38', '2025-07-12 02:17:38'),
(2, 2, 'cash', '2025-07-12 02:19:54', '2025-07-12 02:19:54'),
(3, 3, 'cash', '2025-07-12 04:36:03', '2025-07-12 04:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pet_manages`
--

DROP TABLE IF EXISTS `pet_manages`;
CREATE TABLE IF NOT EXISTS `pet_manages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pet_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `pet_manages`
--

INSERT INTO `pet_manages` (`id`, `pet_name`, `created_at`, `updated_at`) VALUES
(2, 'German Shepherd', '2025-07-02 08:52:17', '2025-07-02 08:52:17'),
(3, 'Golden Retriever', '2025-07-02 08:52:22', '2025-07-02 08:52:22'),
(4, 'Pomeranian', '2025-07-02 08:52:29', '2025-07-02 08:52:29'),
(5, 'Indian Pariah Dog (Desi Dog)', '2025-07-02 08:52:30', '2025-07-02 08:52:30'),
(6, 'Beagle', '2025-07-02 08:52:35', '2025-07-02 08:52:35'),
(7, 'Dachshund', '2025-07-02 08:52:40', '2025-07-02 08:52:40'),
(8, 'Doberman', '2025-07-02 08:52:46', '2025-07-02 08:52:46'),
(9, 'Rottweiler', '2025-07-02 08:52:50', '2025-07-02 08:52:50'),
(10, 'Persian Cat', '2025-07-02 08:52:57', '2025-07-02 08:52:57'),
(11, 'Siamese Cat', '2025-07-02 08:53:02', '2025-07-02 08:53:02'),
(12, 'Maine Coon', '2025-07-02 08:53:07', '2025-07-02 08:53:07'),
(13, 'Indian Billi (Desi Cat)', '2025-07-02 08:53:11', '2025-07-02 08:53:11'),
(14, 'Himalayan Cat', '2025-07-02 08:53:16', '2025-07-02 08:53:16'),
(15, 'Ragdoll', '2025-07-02 08:53:19', '2025-07-02 08:53:19'),
(16, 'Bengal Cat', '2025-07-02 08:53:24', '2025-07-02 08:53:24'),
(17, 'Rabbits', '2025-07-02 08:53:36', '2025-07-02 08:53:36'),
(18, 'Hamsters', '2025-07-02 08:53:41', '2025-07-02 08:53:41'),
(19, 'Guinea Pigs', '2025-07-02 08:53:46', '2025-07-02 08:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `plan_management`
--

DROP TABLE IF EXISTS `plan_management`;
CREATE TABLE IF NOT EXISTS `plan_management` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `plan_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `duration_value` int UNSIGNED NOT NULL,
  `duration_unit` enum('month','year') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `plan_features` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `plan_management`
--

INSERT INTO `plan_management` (`id`, `image`, `plan_name`, `amount`, `duration_value`, `duration_unit`, `plan_features`, `created_at`, `updated_at`) VALUES
(1, 'PlanImage/1749115025_image_plan.jpeg', 'Personal', 49.00, 1, 'month', '2 Dog Walk,1 Vet Visit,1 Pet Spa,Free Supports', '2025-06-05 03:47:05', '2025-07-01 00:49:40'),
(2, 'PlanImage/1749115059_image_plan.jpeg', 'Business', 79.00, 1, 'month', '4 Dog Walk,2 Pet Spa,2 Vet Visit,Free Supports', '2025-06-05 03:47:39', '2025-07-01 00:50:13'),
(3, 'PlanImage/1749115243_image_plan.jpeg', 'Ultimate', 119.00, 1, 'month', '6 Dog Walk,3 Pet Spa,3 Vet Visit,Free Supports', '2025-06-05 03:50:43', '2025-07-01 00:51:07'),
(8, 'PlanImage/1751350517_image_plan.jpeg', 'Personal', 99.00, 1, 'year', '10 Dog Walk,6 Vet Visit,6 Pet Spa,Free Supports,Pet Grooming', '2025-07-01 00:45:17', '2025-07-01 00:45:17'),
(9, 'PlanImage/1751350588_image_plan.jpeg', 'Business', 199.00, 1, 'year', '15 Dog Walk,8 Vet Visit,8 Pet Spa,Free Supports,Pet Daycare', '2025-07-01 00:46:28', '2025-07-01 00:46:28'),
(10, 'PlanImage/1751350669_image_plan.jpeg', 'Ultimate', 299.00, 1, 'year', '20 Dog Walk,10 Vet Visit,10 Pet Spa,Pet Grooming,Pet Daycare', '2025-07-01 00:47:49', '2025-07-01 00:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `icon` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `subject`, `description`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Dog Walking', '\"Dog walking gives your furry friend the physical activity and mental stimulation they need to stay happy and healthy. It\'s a joyful routine that strengthens the bond between dogs and their humans.\"', 'Services/1751270021_Icon_services.jpeg', '2025-06-29 23:09:31', '2025-07-14 05:09:45'),
(2, 'Pet Daycare', '\"Pet daycare provides a fun, safe, and loving environment where your furry friend can play, socialize, and thrive while you\'re away.\"', 'Services/1751270013_Icon_services.jpeg', '2025-06-29 23:09:41', '2025-07-14 05:09:13'),
(3, 'Pet Grooming', '\"Pet grooming not only keeps your furry friend looking great but also promotes their overall health and well-being.\"', 'Services/1751270004_Icon_services.jpeg', '2025-06-29 23:09:54', '2025-07-14 05:08:45'),
(4, 'Dog Walking', '\"Dog walking is more than just exercise—it’s a daily adventure that keeps your dog happy, healthy, and emotionally fulfilled.\"', 'Services/1751269995_Icon_services.jpeg', '2025-06-29 23:10:04', '2025-07-14 05:08:20'),
(5, 'Pet Daycare', '\"Pet daycare offers your beloved companion a joyful, nurturing space to thrive, giving you peace of mind while they enjoy a day filled with care, play, and love.\"', 'Services/1752484462_Icon_services.jpeg', '2025-06-29 23:10:16', '2025-07-14 05:07:40'),
(6, 'Pet Grooming', '\"Pet grooming not only keeps your furry friend looking great but also promotes their overall health and well-being.\"', 'Services/1752489321_Icon_services.jpeg', '2025-06-29 23:10:27', '2025-07-14 05:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', NULL, '$2y$10$QOTmFRnQMrtKS5Ck/ZHicO.Kz3hiK9Y.k9RE8xZvUH6SQMcLGybY2', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `veterinarians`
--

DROP TABLE IF EXISTS `veterinarians`;
CREATE TABLE IF NOT EXISTS `veterinarians` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `speciality` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `veterinarians`
--

INSERT INTO `veterinarians` (`id`, `photo`, `name`, `speciality`, `twitter_link`, `facebook_link`, `instagram_link`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Doctors/1748142643_photo_doctor.jpg', 'Lloyd Wilson', 'Health Coach', 'https://x.com/login', 'https://www.facebook.com/', 'https://www.instagram.com/accounts/login/', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2025-05-24 21:40:43', '2025-05-24 21:40:43'),
(2, 'Doctors/1748142669_photo_doctor.jpg', 'Rachel Parker', 'Life & Business Coach', 'https://x.com/login', 'https://www.facebook.com/', 'https://www.instagram.com/accounts/login/', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2025-05-24 21:41:09', '2025-05-24 21:41:09'),
(3, 'Doctors/1748142698_photo_doctor.jpg', 'Ian Smith', 'Executive Coach', 'https://x.com/login', 'https://www.facebook.com/', 'https://www.instagram.com/accounts/login/', 'I am an ambitious workaholic, but apart from that, pretty simple person.', '2025-05-24 21:41:38', '2025-05-24 21:41:38'),
(4, 'Doctors/1748142722_photo_doctor.jpg', 'Alicia Henderson', 'Health Coach', 'https://x.com/login', 'https://www.facebook.com/', 'https://www.instagram.com/accounts/login/', 'I am an ambitious workaholic, but apart from that, pretty simple person.', '2025-05-24 21:42:02', '2025-05-24 21:42:02'),
(5, 'Doctors/1748142756_photo_doctor.jpg', 'Lloyd Wilson', 'Executive Coach', 'https://x.com/login', 'https://www.facebook.com/', 'https://www.instagram.com/accounts/login/', 'I am an ambitious workaholic, but apart from that, pretty simple person.', '2025-05-24 21:42:36', '2025-05-24 21:42:36'),
(6, 'Doctors/1748142777_photo_doctor.jpg', 'Rachel Parker', 'Health Coach', 'https://x.com/login', 'https://www.facebook.com/', 'https://www.instagram.com/accounts/login/', 'I am an ambitious workaholic, but apart from that, pretty simple person.', '2025-05-24 21:42:57', '2025-05-24 21:42:57'),
(10, 'Doctors/1751262920_photo_doctor.jpeg', 'Ian Smith', 'Health Coach', 'https://x.com/login', 'https://www.facebook.com/', 'https://www.instagram.com/accounts/login/', 'I am an ambitious workaholic, but apart from that, pretty simple person.', '2025-06-30 00:25:20', '2025-06-30 00:25:20'),
(8, 'Doctors/1748142839_photo_doctor.jpg', 'Fred Henderson', 'Executive Coach', 'https://x.com/login', 'https://www.facebook.com/', 'https://www.instagram.com/accounts/login/', 'I am an ambitious workaholic, but apart from that, pretty simple person.', '2025-05-24 21:43:59', '2025-05-24 21:43:59');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
