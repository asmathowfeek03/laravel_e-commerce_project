-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 06:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luxe`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'visible=0 , hidden=1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `category_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Glow', 'glow', 0, '2024-01-16 03:14:15', '2024-01-16 03:14:15'),
(2, 1, 'Neutrogena', 'neutrogena', 0, '2024-01-16 05:34:42', '2024-01-16 05:34:42'),
(3, 1, 'Aveeno', 'aveeno', 0, '2024-01-16 05:34:42', '2024-01-16 05:34:42');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'visible=0 , hidden=1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Skin Care', 'skin-care', 'Discover the key to radiant skin with our skincare solutions. From cleansers to serums, our products are crafted to nourish and enhance your skin\'s natural beauty.', '1705394620.jpg', 'Skin Care Products', 'skin care', 'Elevate your skincare routine and embrace a healthier, glowing complexion.', 0, '2024-01-16 03:13:40', '2024-01-16 03:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'visible=0 , hidden=1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Light Salmon', '#FFA07A', 0, '2024-01-16 03:15:23', '2024-01-16 03:15:23'),
(2, 'Blue', '#82eeef', 0, '2024-01-16 03:16:20', '2024-01-16 03:17:51'),
(3, 'OldLace', '#017769', 0, '2024-01-16 03:16:20', '2024-01-16 03:16:20'),
(4, 'Green', '#7f3606', 0, '2024-01-16 03:16:20', '2024-01-16 03:18:02'),
(6, 'Red', '#FF0000', 0, '2024-01-16 03:17:07', '2024-01-16 03:17:07'),
(7, 'Brown', '#A52A2A', 0, '2024-01-16 03:17:07', '2024-01-16 03:17:07'),
(8, 'Purple', '#800080', 0, '2024-01-16 03:17:07', '2024-01-16 03:17:07'),
(9, 'Pink', '#FFC0CB', 0, '2024-01-16 03:17:07', '2024-01-16 03:17:07'),
(10, 'Orange', '#FF8C00', 0, '2024-01-16 03:17:07', '2024-01-16 03:17:07');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_16_092458_create_sessions_table', 1),
(7, '2023_12_17_040230_create_categories_table', 1),
(8, '2023_12_24_035527_create_brands_table', 1),
(9, '2023_12_26_070207_create_products_table', 1),
(10, '2023_12_26_071531_create_product_images_table', 1),
(11, '2023_12_27_111858_create_colors_table', 1),
(12, '2023_12_27_165542_create_product_colors_table', 1),
(13, '2023_12_28_145334_create_sliders_table', 1),
(14, '2023_12_30_172141_create_wishlist_table', 1),
(15, '2023_12_31_132401_create_carts_table', 1),
(16, '2024_01_01_124106_create_orders_table', 1),
(17, '2024_01_01_124611_create_order_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `status_message` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tracking_no`, `fullname`, `email`, `phone`, `pincode`, `address`, `status_message`, `payment_mode`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'luxe-hhIcrLlRx5', 'Asma Thowfeek', 'athowfeek.3@gmail.com', '+94772511003', '123456', '62/1, Kandy Road, Gampola', 'in progress', 'Cash on Delivery', NULL, '2024-01-16 07:32:40', '2024-01-16 07:32:40'),
(2, 1, 'luxe-qI7NAi8aNO', 'Asma Thowfeek', 'athowfeek.3@gmail.com', '+94772511003', '123456', '62/1, Kandy Road, Gampola', 'in progress', 'Cash on Delivery', NULL, '2024-01-16 07:46:44', '2024-01-16 07:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_color_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 5, NULL, 1, 14, '2024-01-16 07:32:40', '2024-01-16 07:32:40'),
(2, 2, 3, 14, 2, 11, '2024-01-16 07:46:44', '2024-01-16 07:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `small_description` mediumtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Not Treanding=0 , Treanding=1',
  `featured` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Not Featured=0 , Featured=1',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Visible=0 , Hidden=1',
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `brand`, `small_description`, `description`, `original_price`, `selling_price`, `quantity`, `trending`, `featured`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hi Butter', 'hi-butter', 'Glow', 'Treat yourself to the ultimate pampering experience for a velvety-soft and radiant glow.', 'Indulge your skin in luxurious hydration with our sumptuous body butter. Formulated with nourishing ingredients, it deeply moisturizes and leaves your skin feeling silky-smooth.', 30, 28, 100, 1, 1, 0, 'hi-butter', 'body butter, skin care, glowing skin, smooth skin', 'Experience the richness of our decadent body butter, a lavish treat for your skin. Enriched with premium ingredients, it provides intense hydration, leaving your skin velvety-soft and luminous.', '2024-01-16 03:21:12', '2024-01-16 08:50:32'),
(3, 1, 'Blossom', 'blossom', 'Glow', 'Say goodbye to dryness and hello to a smooth', 'Revitalize your lips with our moisturizing lip balm. Infused with nourishing ingredients, it replenishes and protects, leaving your lips soft and supple.', 15, 11, 60, 1, 1, 0, 'blossom', 'Lip Blam, skin care, glowing skin,Healthy lips', 'Specially crafted with nourishing elements, it revitalizes and safeguards, giving you irresistibly soft and supple lips.', '2024-01-16 05:36:10', '2024-01-16 05:44:28'),
(4, 1, 'Dewy Rose', 'dewy-rose', 'Glow', 'Indulge in the dewy freshness of our Rose Moisturizer.', 'Experience the hydrating power of roses with our Dewy Rose Moisturizer. Enriched with floral extracts, it leaves your skin supple and beautifully moisturized.', 20, 16, 45, 1, 1, 0, 'dewy-rose', 'Rose Moisturizer, skincare, floral extracts, hydrating skin', 'Immerse yourself in the dewy freshness of our Rose Moisturizer, carefully crafted to leave your skin supple and beautifully moisturized.', '2024-01-16 05:40:41', '2024-01-16 05:46:46'),
(5, 1, 'Silk Elegance', 'silk-elegance', 'Aveeno', 'Indulge in the luxurious feel of our Silk Elegance Hand Cream.', 'Treat your hands to the ultimate luxury with our Silk Elegance Hand Cream. Silky smooth and deeply nourishing, it provides a touch of elegance to your skincare routine.', 18, 14, 54, 1, 1, 0, 'silk-elegance', 'Hand Cream, skincare, silk elegance, luxurious touch', 'Experience the luxury of our Silk Elegance Hand Cream, delivering silky smoothness and deep nourishment for an elegant touch to your skincare routine.', '2024-01-16 05:42:28', '2024-01-16 07:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 20, '2024-01-16 03:21:12', '2024-01-16 03:21:12'),
(2, 1, 6, 10, '2024-01-16 03:21:12', '2024-01-16 03:21:12'),
(3, 1, 7, 20, '2024-01-16 03:21:12', '2024-01-16 03:21:12'),
(4, 1, 8, 10, '2024-01-16 03:21:12', '2024-01-16 03:21:12'),
(5, 1, 9, 30, '2024-01-16 03:21:12', '2024-01-16 03:21:12'),
(6, 1, 10, 10, '2024-01-16 03:21:12', '2024-01-16 03:21:12'),
(12, 3, 6, 10, '2024-01-16 05:44:28', '2024-01-16 05:44:28'),
(13, 3, 7, 20, '2024-01-16 05:44:28', '2024-01-16 05:44:28'),
(14, 3, 8, 8, '2024-01-16 05:44:28', '2024-01-16 07:46:44'),
(15, 3, 9, 10, '2024-01-16 05:44:28', '2024-01-16 05:44:28'),
(16, 3, 10, 10, '2024-01-16 05:44:28', '2024-01-16 05:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/products/17053950721.jpg', '2024-01-16 03:21:12', '2024-01-16 03:21:12'),
(2, 1, 'uploads/products/17053950722.jpg', '2024-01-16 03:21:12', '2024-01-16 03:21:12'),
(3, 1, 'uploads/products/17053950723.jpg', '2024-01-16 03:21:12', '2024-01-16 03:21:12'),
(4, 1, 'uploads/products/17053950724.jpg', '2024-01-16 03:21:12', '2024-01-16 03:21:12'),
(5, 1, 'uploads/products/17053950725.jpg', '2024-01-16 03:21:12', '2024-01-16 03:21:12'),
(6, 1, 'uploads/products/17053950726.jpg', '2024-01-16 03:21:12', '2024-01-16 03:21:12'),
(12, 3, 'uploads/products/17054036681.jpg', '2024-01-16 05:44:28', '2024-01-16 05:44:28'),
(13, 3, 'uploads/products/17054036682.jpg', '2024-01-16 05:44:28', '2024-01-16 05:44:28'),
(14, 3, 'uploads/products/17054036683.jpg', '2024-01-16 05:44:28', '2024-01-16 05:44:28'),
(15, 3, 'uploads/products/17054036684.jpg', '2024-01-16 05:44:28', '2024-01-16 05:44:28'),
(16, 4, 'uploads/products/17054038061.jpg', '2024-01-16 05:46:46', '2024-01-16 05:46:46'),
(17, 4, 'uploads/products/17054038062.jpg', '2024-01-16 05:46:46', '2024-01-16 05:46:46'),
(18, 4, 'uploads/products/17054038063.jpg', '2024-01-16 05:46:46', '2024-01-16 05:46:46'),
(19, 4, 'uploads/products/17054038064.jpg', '2024-01-16 05:46:46', '2024-01-16 05:46:46'),
(20, 4, 'uploads/products/17054038065.jpg', '2024-01-16 05:46:46', '2024-01-16 05:46:46'),
(21, 5, 'uploads/products/17054040051.jpg', '2024-01-16 05:50:05', '2024-01-16 05:50:05'),
(22, 5, 'uploads/products/17054040052.jpg', '2024-01-16 05:50:05', '2024-01-16 05:50:05'),
(23, 5, 'uploads/products/17054040053.jpg', '2024-01-16 05:50:05', '2024-01-16 05:50:05'),
(24, 5, 'uploads/products/17054040054.jpg', '2024-01-16 05:50:05', '2024-01-16 05:50:05'),
(25, 5, 'uploads/products/17054040055.jpg', '2024-01-16 05:50:05', '2024-01-16 05:50:05');

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
('t1uGPNXy4uGSEfptAj8X6lZb8yF1IHwSRNhIUSho', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZjJQZzZoUVgxNGxPTzkzREVCUHg1WjZlc0FGS3FrWllndlhKWlpudiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWRpcmVjdHMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1706895825);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'visible=0 , hidder=1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Your Journey to Pure Radiance!', 'Our luxurious skincare essentials bring a touch of opulence to your beauty routine. Unveil a radiant glow with our carefully crafted hair and skincare products.', 'uploads/slider/1706895248.png', 0, '2024-02-02 12:04:08', '2024-02-02 12:04:08'),
(2, 'Every Shade Speaks Elegance!', 'Our lipstick collection embodies a spectrum of shades to complement every mood and style. Our lipsticks are formulated for long-lasting wear and intense color payoff.', 'uploads/slider/1706895304.png', 0, '2024-02-02 12:05:04', '2024-02-02 12:05:04'),
(3, 'GlamWithConfidence', 'Transform your look and express your individuality with our exquisite makeup collection. Unleash your inner artist and let your beauty shine through, because with our makeup, every day is a canvas for self-expression.', 'uploads/slider/1706895372.png', 0, '2024-02-02 12:06:12', '2024-02-02 12:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` varchar(255) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `address`, `dob`, `phone`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, '0', 'Asma Thowfeek', '62/1, Kandy Road, Gampola', '2001-06-06', '+94772511003', 'athowfeek.3@gmail.com', NULL, '$2y$10$qc9VHaio89rDn6Px94mOm.C4Kz.EO8wydyjjgLRgqjC/shGuTJwbG', NULL, NULL, NULL, NULL, NULL, 'profile-photos/0fYfIOTjeY1igzG8HqEsAdtGbyVWdopBh9dstDl8.jpg', '2024-01-16 00:03:12', '2024-01-16 07:12:08'),
(2, '1', 'Peter', '123,Kandy Road,Kandy', '2001-12-31', '+94773456789', 'asmathowfeek03@gmail.com', NULL, '$2y$10$evkzCd3qMaDi62z1EJ.CDe3djQOLhvd5mV8qk/vv.u6PuXYKorZbC', NULL, NULL, NULL, NULL, NULL, 'profile-photos/XJqk6Fjtmh71v2dFB09xrzeY9efbS5o0hyhPJZM8.jpg', '2024-01-16 00:07:34', '2024-01-16 00:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`),
  ADD KEY `brands_category_id_foreign` (`category_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_product_color_id_foreign` (`product_color_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colors_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_product_color_id_foreign` (`product_color_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_user_id_foreign` (`user_id`),
  ADD KEY `wishlist_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_color_id_foreign` FOREIGN KEY (`product_color_id`) REFERENCES `product_colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_color_id_foreign` FOREIGN KEY (`product_color_id`) REFERENCES `product_colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
