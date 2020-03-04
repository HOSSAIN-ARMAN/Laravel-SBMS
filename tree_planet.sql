-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2020 at 09:18 AM
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
-- Database: `tree_planet`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_code` int(11) NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_code`, `category_name`, `publication_status`, `created_at`, `updated_at`) VALUES
(11, 1234, 'Computer', 1, '2020-03-02 12:18:35', '2020-03-02 12:18:35'),
(12, 1243, 'Mobile', 1, '2020-03-02 12:18:48', '2020-03-02 12:18:48'),
(13, 4212, 'Electronics', 1, '2020-03-02 12:19:44', '2020-03-03 07:01:28'),
(18, 1286, 'Mouse', 1, '2020-03-03 07:01:55', '2020-03-03 07:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loyalty_point` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `code`, `name`, `email`, `contact`, `loyalty_point`, `created_at`, `updated_at`) VALUES
(11, '8963', 'Arman Hossain', 'arman@gmail.com', '01468013722', 43, '2020-03-02 12:33:10', '2020-03-02 12:46:37'),
(12, '7412', 'Sabbir', 'sabbir@gmail.com', '01968014287', 10, '2020-03-02 12:33:40', '2020-03-02 12:33:40'),
(13, '9337', 'Saiful Islam', 'saiful@gmail.com', '01830869771', 63, '2020-03-03 02:14:09', '2020-03-03 02:15:31'),
(14, '8741', 'Akbor', 'akbor@gmail.com', '01968012475', 26, '2020-03-03 07:08:31', '2020-03-03 07:10:00'),
(15, '5591', 'Hasan', 'hasan@gmail.com', '01436978542', 39, '2020-03-03 07:55:15', '2020-03-03 07:56:43'),
(16, '8756', 'arif alom', 'alom@gmial.com', '014785236985', 46, '2020-03-03 08:12:18', '2020-03-03 08:13:59'),
(17, '9933', 'Akash', 'akash@gmail.com', '01968014756', 84, '2020-03-04 01:01:10', '2020-03-04 01:04:59'),
(18, '9911', 'salman', 'salman@gmail.com', '01968123574', 52, '2020-03-04 01:26:36', '2020-03-04 01:29:31');

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
(3, '2020_01_27_052039_create_categories_table', 2),
(4, '2020_01_28_064405_create_products_table', 3),
(5, '2020_01_30_101003_create_suppliers_table', 4),
(8, '2020_02_05_051334_create_test_customers_table', 5),
(9, '2020_02_05_051439_create_test_orders_table', 5),
(10, '2020_02_05_081259_create_purchases_table', 6),
(11, '2020_02_05_081411_create_purchase_details_table', 6),
(12, '2020_02_13_063803_create_customers_table', 7),
(13, '2020_02_16_055847_create_sales_table', 8),
(14, '2020_02_16_062924_create_sales_table', 9),
(15, '2020_02_16_062953_create_sale_details_table', 9),
(18, '2020_02_16_162139_create_sales_table', 10),
(19, '2020_02_16_162203_create_sale_details_table', 10);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reorder_lavel` int(11) NOT NULL,
  `product_discription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_code`, `product_name`, `reorder_lavel`, `product_discription`, `product_img`, `publication_status`, `created_at`, `updated_at`) VALUES
(14, '11', 5511, 'Lenovo', 10, 'this is new', 'Product-img/lenovo.jfif', 1, '2020-03-02 12:21:57', '2020-03-02 12:21:57'),
(15, '11', 5588, 'LgComputer', 10, 'this is good', 'Product-img/lg.jfif', 1, '2020-03-02 12:23:22', '2020-03-02 12:23:22'),
(16, '12', 1144, 'Samsung', 10, 'Samsung A6', 'Product-img/samsung.jfif', 1, '2020-03-02 12:24:30', '2020-03-02 12:24:30'),
(17, '11', 5533, 'Dell', 10, 'nice phone', 'Product-img/dell.jfif', 1, '2020-03-02 12:25:27', '2020-03-02 12:37:29'),
(18, '13', 9966, 'AC', 10, 'nice', 'Product-img/ac.jfif', 1, '2020-03-02 12:27:05', '2020-03-02 12:27:22'),
(19, '13', 5863, 'HardDrive', 10, 'nice', 'Product-img/hradderive.jfif', 1, '2020-03-02 12:32:16', '2020-03-02 12:32:16'),
(20, '12', 9933, 'Redmi', 10, 'china', 'Product-img/redmi.jfif', 1, '2020-03-03 02:08:45', '2020-03-03 02:08:45'),
(22, '18', 7841, 'A4-Tech', 10, 'good', 'Product-img/mouse-2.jpg', 1, '2020-03-03 07:02:32', '2020-03-03 07:03:21'),
(24, '18', 5599, 'ZEUS-UC1', 10, 'gaming mouse', 'Product-img/mouse-1.jpg', 1, '2020-03-03 07:50:15', '2020-03-03 07:50:44'),
(25, '18', 8695, 'Havit-MS997', 10, 'gaming mouse', 'Product-img/habit.jpg', 1, '2020-03-03 08:07:17', '2020-03-03 08:07:43'),
(26, '18', 9911, 'Logitech B100', 10, 'USB mouse', 'Product-img/usb.jfif', 1, '2020-03-04 00:54:48', '2020-03-04 00:55:26'),
(27, '18', 8877, 'KWG Orion P1', 10, 'Gaming Mouse', 'Product-img/kwg.jpg', 1, '2020-03-04 01:21:33', '2020-03-04 01:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `purchase_invoice` int(11) DEFAULT NULL,
  `purchase_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `purchase_invoice`, `purchase_date`, `created_at`, `updated_at`) VALUES
(16, 11, 5566, '2020-02-05', '2020-03-02 12:41:51', '2020-03-02 12:41:51'),
(17, 12, 8822, '2020-03-02', '2020-03-02 12:44:54', '2020-03-02 12:44:54'),
(18, 13, 4411, '2020-02-10', '2020-03-03 02:12:21', '2020-03-03 02:12:21'),
(19, 14, 1478, '2020-03-03', '2020-03-03 07:06:46', '2020-03-03 07:06:46'),
(21, 15, 8963, '2020-03-04', '2020-03-03 07:53:45', '2020-03-03 07:53:45'),
(22, 16, 8523, '2020-03-05', '2020-03-03 08:10:18', '2020-03-03 08:10:18'),
(23, 17, 8877, '2020-03-04', '2020-03-04 00:58:50', '2020-03-04 00:58:50'),
(24, 18, 8963, '2020-03-04', '2020-03-04 01:25:02', '2020-03-04 01:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufracture_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `purchase_id`, `product_id`, `product_code`, `manufracture_date`, `expire_date`, `quantity`, `unit_price`, `total_price`, `mrp`, `created_at`, `updated_at`) VALUES
(21, 16, 14, '5511', '2020-02-01', '2020-05-31', '7', '26500', '265000', '33125', NULL, '2020-03-04 01:04:59'),
(22, 16, 15, '5588', '2020-02-01', '2020-05-31', '18', '28700', '574000', '35875', NULL, '2020-03-04 01:29:31'),
(23, 16, 17, '5533', '2020-02-01', '2020-05-31', '19', '30500', '610000', '38125', NULL, '2020-03-03 02:15:31'),
(24, 17, 18, '9966', '2020-02-01', '2020-05-31', '15', '38000', '570000', '47500', NULL, NULL),
(25, 17, 19, '5863', '2020-02-01', '2020-05-31', '28', '4100', '123000', '5125', NULL, '2020-03-04 01:29:31'),
(26, 18, 20, '9933', '2020-01-01', '2020-11-30', '28', '12999', '389970', '16248.75', NULL, '2020-03-03 07:10:00'),
(27, 18, 16, '1144', '2020-01-01', '2020-11-30', '12', '16700', '233800', '20875', NULL, '2020-03-04 01:04:59'),
(28, 19, 22, '7841', '2020-01-01', '2020-12-30', '49', '980', '49000', '1225', NULL, '2020-03-03 07:10:00'),
(29, 19, 19, '5863', '2020-01-01', '2020-12-30', '10', '4300', '43000', '5375', NULL, NULL),
(32, 21, 24, '5599', '2020-02-01', '2020-12-31', '59', '1350', '81000', '1687.5', NULL, '2020-03-03 07:56:43'),
(33, 21, 14, '5511', '2020-02-01', '2020-12-31', '11', '28900', '317900', '36125', NULL, NULL),
(34, 22, 25, '8695', '2020-01-01', '2020-12-31', '39', '750', '30000', '937.5', NULL, '2020-03-03 08:14:00'),
(35, 22, 17, '5533', '2020-01-01', '2020-12-31', '6', '32500', '195000', '40625', NULL, NULL),
(36, 23, 26, '9911', '2020-01-01', '2020-12-31', '29', '350', '10500', '437.5', NULL, '2020-03-04 01:04:59'),
(37, 23, 14, '5511', '2020-01-01', '2020-12-31', '1', '30000', '30000', '37500', NULL, NULL),
(38, 24, 27, '8877', '2020-02-01', '2020-12-31', '19', '1600', '32000', '2000', NULL, '2020-03-04 01:29:31'),
(39, 24, 17, '5533', '2020-02-01', '2020-12-31', '5', '33000', '165000', '41250', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `customer_id`, `date`, `created_at`, `updated_at`) VALUES
(28, 11, '2020-03-03', '2020-03-02 12:46:37', '2020-03-02 12:46:37'),
(29, 13, '2020-02-20', '2020-03-03 02:15:31', '2020-03-03 02:15:31'),
(30, 14, '2020-03-03', '2020-03-03 07:10:00', '2020-03-03 07:10:00'),
(31, 15, '2020-03-03', '2020-03-03 07:56:43', '2020-03-03 07:56:43'),
(32, 16, '2020-03-09', '2020-03-03 08:13:59', '2020-03-03 08:13:59'),
(33, 17, '2020-03-04', '2020-03-04 01:04:59', '2020-03-04 01:04:59'),
(34, 18, '2020-03-04', '2020-03-04 01:29:31', '2020-03-04 01:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `sale_details`
--

CREATE TABLE `sale_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_mrp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_details`
--

INSERT INTO `sale_details` (`id`, `sale_id`, `product_id`, `quantity`, `mrp`, `total_mrp`, `unit_price`, `created_at`, `updated_at`) VALUES
(15, 28, 14, '1', '33125', '33125', '26500', NULL, NULL),
(16, 28, 19, '1', '5125', '5125', '4100', NULL, NULL),
(17, 29, 20, '1', '16248.75', '16248.75', '12999', NULL, NULL),
(18, 29, 17, '1', '38125', '38125', '30500', NULL, NULL),
(19, 30, 22, '1', '1225', '1225', '980', NULL, NULL),
(20, 30, 20, '1', '16248.75', '16248.75', '12999', NULL, NULL),
(21, 31, 24, '1', '1687.5', '1687.5', '1350', NULL, NULL),
(22, 31, 14, '1', '33125', '33125', '28900', NULL, NULL),
(23, 32, 25, '1', '937.5', '937.5', '750', NULL, NULL),
(24, 32, 15, '1', '35875', '35875', '28700', NULL, NULL),
(25, 33, 26, '1', '437.5', '437.5', '350', NULL, NULL),
(26, 33, 14, '1', '33125', '33125', '30000', NULL, NULL),
(27, 33, 16, '2', '20875', '41750', '16700', NULL, NULL),
(28, 34, 27, '1', '2000', '2000', '1600', NULL, NULL),
(29, 34, 15, '1', '35875', '35875', '28700', NULL, NULL),
(30, 34, 19, '1', '5125', '5125', '4300', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_code` int(11) NOT NULL,
  `supplier_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` int(11) NOT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_code`, `supplier_name`, `supplier_address`, `contact`, `contact_person`, `publication_status`, `created_at`, `updated_at`) VALUES
(11, 8855, 'Kader', 'Dhaka', 1468013796, 'Rakib', 1, '2020-03-02 12:34:15', '2020-03-02 12:34:15'),
(12, 9966, 'Abir Khan', 'Chittogong', 1430869771, 'abir', 1, '2020-03-02 12:34:55', '2020-03-02 12:34:55'),
(13, 7711, 'Imran Khan', 'agortola', 1732087428, 'Ibrahim', 1, '2020-03-03 02:06:45', '2020-03-03 02:06:45'),
(14, 5321, 'Saiful Khan', 'LalBag', 1732074319, 'saiful', 1, '2020-03-03 07:04:23', '2020-03-03 07:04:23'),
(15, 5588, 'Ikbal khan', 'Uttara', 1968124587, 'ikbal', 1, '2020-03-03 07:51:34', '2020-03-03 07:51:34'),
(16, 7425, 'Basar', 'gupipara', 1968257415, 'rafa', 1, '2020-03-03 08:08:28', '2020-03-03 08:08:28'),
(17, 8877, 'Rafa khan', 'dhaka', 1630125874, 'rafa', 1, '2020-03-04 00:56:20', '2020-03-04 00:56:20'),
(18, 6178, 'Kholil bhai', 'dhaka', 1968012458, 'akib', 1, '2020-03-04 01:22:37', '2020-03-04 01:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `test_customers`
--

CREATE TABLE `test_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_customers`
--

INSERT INTO `test_customers` (`id`, `customer_name`, `customer_address`, `created_at`, `updated_at`) VALUES
(1, 'arman hossain', 'Gopipara, uattar badda, dhaka-1212, Ratanpur, Ramgonj, Lakhipur', '2020-02-05 00:11:16', '2020-02-05 00:11:16'),
(2, 'sabbir khan', 'nai', '2020-02-05 00:12:14', '2020-02-05 00:12:14'),
(3, 'sabbir khan', 'nai', '2020-02-05 00:30:45', '2020-02-05 00:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `test_orders`
--

CREATE TABLE `test_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_orders`
--

INSERT INTO `test_orders` (`id`, `customer_id`, `product_name`, `brand`, `quantity`, `budget`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'sadf', 'asd', '223', '3232', '720736', NULL, NULL),
(2, 2, 'chips', 'bombehe', '22', '121', '2662', NULL, NULL),
(3, 2, 'ki obostha', 'dsfaf', '23', '23', '23', NULL, NULL),
(4, 3, 'chips', 'bombehe', '22', '121', '2662', NULL, NULL),
(5, 3, 'taki', 'sdf', '32', '32', '32', NULL, NULL),
(6, 3, 'arman', 'sdf', '3232', '32', '32', NULL, NULL),
(7, 3, 'rafa', 's', '23', '32', '323', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$vVAyyDVBCTMFAeEqRuEwM.fdocaNuQeJoKVMpy.CzyJVDMaZ.aHaK', NULL, '2020-01-26 21:06:19', '2020-01-26 21:06:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_details_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_details_sale_id_foreign` (`sale_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_customers`
--
ALTER TABLE `test_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_orders`
--
ALTER TABLE `test_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_orders_customer_id_foreign` (`customer_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `test_customers`
--
ALTER TABLE `test_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test_orders`
--
ALTER TABLE `test_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD CONSTRAINT `purchase_details_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`);

--
-- Constraints for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD CONSTRAINT `sale_details_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`);

--
-- Constraints for table `test_orders`
--
ALTER TABLE `test_orders`
  ADD CONSTRAINT `test_orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `test_customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
